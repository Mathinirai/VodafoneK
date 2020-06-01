<?php

/**
 * Add body classes if certain regions have content.
 */
function dxl_preprocess_html(&$variables) {
  // Add conditional stylesheets for IE
  drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_js(path_to_theme() . '/js/jquery.min.js', 'file');
  drupal_add_js(path_to_theme() . '/js/theme.js', 'file');
}

/**
 * Override or insert variables into the page template for HTML output.
 */
function dxl_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/**
 * Override or insert variables into the page template.
 */
function dxl_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }
}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function dxl_preprocess_maintenance_page(&$variables) {
  // By default, site_name is set to Drupal if no db connection is available
  // or during site installation. Setting site_name to an empty string makes
  // the site and update pages look cleaner.
  // @see template_preprocess_maintenance_page
  if (!$variables['db_is_active']) {
    $variables['site_name'] = '';
  }
  drupal_add_css(drupal_get_path('theme', 'dxl') . '/css/maintenance-page.css');
}

/**
 * Override or insert variables into the maintenance page template.
 */
function dxl_process_maintenance_page(&$variables) {
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}

/**
 * Override or insert variables into the node template.
 */
function dxl_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }  
}

/**
 * Override or insert variables into the block template.
 */
function dxl_preprocess_block(&$variables) {
  global $base_url;
    // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
  // define global variables for all pages
  $variables['theme_path'] = drupal_get_path('theme', 'dxl');
  $variables['base_url'] = $base_url;
  
  if(isset($variables['elements']['#node']) && isset($variables['block']->nid) ) {
    // Theme suggestion for node block module
    $content_type = $variables['elements']['#node']->type;   
    $variables['theme_hook_suggestions'][] = 'block__' . $content_type;    
  }  
  try{
      $views_names = array('microservices_listing','apis_listing','usecases_listing','channel_listing');
      $params = drupal_get_query_parameters();
      $limit =10;
      if(isset($params['page']))$limit = $params['page'];
        foreach ($views_names as $view_name ){
          $exist = $view_name.'-block';   
          if($variables['block']->delta == $exist) {
            $view = views_get_view($view_name,$reset = FALSE);
            $view->set_display($view_name);
            $view->items_per_page = $limit;
            $view->preview();
            $variables[$view_name] = $view->result;
            $variables[$view_name.'_display_count'] = count($view->result);

            //Views count start here 
            $view_count = views_get_view($view_name,$reset = FALSE);
            $view_count->set_display($view_name);
            $view_count->preview();
            $variables[$view_name.'_total_count'] = count($view_count->result);     
          }
        }
       
  }catch (Exception $e) {
    watchdog_exception('View UI not enabled', $e);
  }  
}

/**
 * Implements theme_menu_tree().
 */
function dxl_menu_tree($variables) {
  return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_field__field_type().
 */
function dxl_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '"' . $variables['attributes'] .'>' . $output . '</div>';

  return $output;
}

/**
 * Implements hook_preprocess_page().
 */
function dxl_preprocess_page(&$variables){
  global $theme,$base_url;
  $path = drupal_get_path_alias();// Get current path
  $ignore = array('user/login', 'confirmidentity','faqs-2fa');      
  if(user_is_anonymous() && (!in_array($path,$ignore))){ //check user here
      drupal_goto('user/login'); //redirect to login page.
  }
  // define global variables for all pages
  $variables['theme_path'] = drupal_get_path('theme', 'dxl');
  $variables['base_url'] = $base_url;
  $variables['breadcrumb'] = drupal_get_breadcrumb();
  
  // Define template and variables for contect us page
  if(isset($variables['node']->webform) && $variables['node']->webform['machine_name'] == 'contact_us') {
      $variables['theme_hook_suggestions'][] = 'page__contact_us'; 
      $variables['webform_title'] = $variables['node']->webform['components'][1]['name'];
      $variables['markup_name'] = $variables['node']->webform['components'][2]['name'];
      $variables['markup_description'] = $variables['node']->webform['components'][2]['value'];
      $variables['node']->webform['components'][2]['extra']['css_classes'] = 'element-hidden';
  }

  // Add breadcrumb details
  if(!empty($variables['breadcrumb'][0]) && isset($variables['node']->title))$variables['breadcrumb'][] = $variables['node']->title;
  if(!empty($variables['breadcrumb'][0]) && strip_tags($variables['breadcrumb'][0]) == strip_tags($variables['breadcrumb'][1]) ) unset($variables['breadcrumb'][0]);        
   
  // Theme suggestion for node and content type pages
  if(isset($variables['node']->type)) {
    // Assigne markets term to variables
    $market_vocabulary = taxonomy_vocabulary_machine_name_load('markets');
    $variables['market_terms'] = taxonomy_get_tree($market_vocabulary->vid);
      
    $variables['theme_hook_suggestions'][] = 'page__' . strtolower($variables['node']->type); 
    if(isset($variables['node'])) $variables['theme_hook_suggestions'][] = 'page__' . str_replace(' ', '_', strtolower($variables['node']->title));
  } 
}

/**
 * Implements hook_form_alter().
 */
function dxl_form_alter(&$form, &$form_state, $form_id) {
  global $base_url;
  
  switch ($form_id){
    case 'user_login':
    case 'user_login_block':   
        // alter field data for name
        $form['name']['#title'] = '<span class="js-form-label form__label form__label--required">Email</span>';
        $form['name']['#description'] = '';
        $form['name']['#required'] = FALSE;
        $form['name']['#attributes']['placeholder'] = 'E.g, vodafone@vodafone.com';
        $form['name']['#attributes']['class'] = array('form__input');
        
        
        // alter field data for password
        $form['pass']['#title'] = '<span class="js-form-label form__label form__label--required">Password</span>';
        $form['pass']['#description'] = '';
        $form['pass']['#required'] = FALSE;
        $form['pass']['#attributes']['class'] = array('form__input');
        $form['pass']['#attributes']['id'] = array('pass-input');
        $form['pass']['#prefix'] = '<div class="form__label--passwordWrapper mt-20">';
        $form['pass']['#suffix'] = '<button id="show-pass" type="button" class="form__label--passwordWrapper-icon hide--sm hide--md" disabled="true">
                                        <svg focusable="false" aria-hidden="true" class="icon icon--extra-small mt-40">
                                            <use id="eye" xlink:href="#icon-no-see"></use>
                                        </svg>
                                    </button>
                                    <button id="show-pass-mobile" type="button" class=" form__label--passwordWrapper-icon hide--lg">
                                        <svg focusable="false" aria-hidden="true" class="icon icon--extra-small mt-40">
                                            <use id="eye-mobile" xlink:href="#icon-viewed"></use>
                                        </svg>
                                    </button>
                                    </div>';
        
        $form['remember_me'] = array(
          '#type' => 'markup',
          '#prefix' => '<div class="form-item form-type-remember_me form-item-remember">',
          '#suffix' => '</div>',
          '#markup' => '<label class="form__row mt-20">
                    <input type="checkbox" name="form-input-checkbox-1" class="form__checkbox">
                    <span class="js-form-label form__label form__label--checkable" required>
                        Remember me
                    </span>
                </label>',
        );
        
        // alter field data for login
        $form['actions']['submit']['#value'] = 'Login';
        $form['actions']['submit']['#attributes']['class'] = array('button button--primary button--primary--dark button--full-width mt-20');
    break;

    case 'user_pass':
        // alter field data for name
        $form['name']['#title'] = '<span class="js-form-label form__label">Email</span>';
        $form['name']['#required'] = FALSE;
        $form['name']['#attributes']['class'] = array('form__input');
        
        $form['actions']['submit']['#value'] = 'Reset';
        $form['actions']['submit']['#attributes']['class'] = array('button button--primary button--primary--dark button--full-width mt-30');
        
    case 'vodafone_tfa_form':
         // alter field data for name
        $form['otp']['#title'] = '<span class="js-form-label form__label form__label--required">Security code</span>';
        $form['otp']['#attributes']['class'] = array('form__input');
        $form['otp']['#required'] = FALSE;
        
        $form['submit_button']['#attributes']['class'] = array('button button--primary button--primary--dark button--full-width mt-30');
        $form['cancel']['#attributes']['class'] = array('button button--secondary button--primary--dark button--full-width mt-30');
    break;

  }
}

/**
 * Implements hook_css_alter().
 */
function dxl_css_alter (&$css) {
    unset($css['modules/system/system.theme.css']);
}

/**
 * Implements custom_function().
 */
function node_sibling($node){

    $nodes = get_node_listing($node->type);
    $nids = $text = array();
    foreach ($nodes as  $node_data) {
        if($node_data->type == 'apis_detail_page') {
            if($node_data->field_api_type['und'][0]['value'] == 'north') {
                $nids[$node_data->nid] = $node_data->title;
            }
        } else{
            $nids[$node_data->nid] = $node_data->title;
        }
    }
    if(!empty($nids)) { 
      $previous = getNodeKey($node->nid, $nids ,'previous');
      $next = getNodeKey($node->nid, $nids ,'next');
      if(isset($nodes[$next]->nid)) $text['next']['nid'] = $nodes[$next]->nid;
      if(isset($nodes[$next]->title)) $text['next']['title'] = $nodes[$next]->title;
      if(isset($nodes[$previous]->nid)) $text['previous']['nid'] = $nodes[$previous]->nid;
      if(isset($nodes[$previous]->title)) $text['previous']['title'] = $nodes[$previous]->title;
      return $text;
    } else {
        return FALSE;
    }
}

/**
 * Implements custom_function().
 */
function getNodeKey($key, $hash = array(), $data ) {
    $keys = array_keys($hash);
    $found_index = array_search($key, $keys);
    if($data == 'next'){
        return $keys[$found_index+1];
    }
    if($data == 'previous'){
        return $keys[$found_index-1];
    }else{
        if ($found_index === false || $found_index === 0){
            return false;
        }
    }
}

/**
 * Implements custom_function().
 */
function get_market_dashboard($no_of_days) {

    $proxy = variable_get('proxy_host', '').':'.variable_get('proxy_port', '');
    if($proxy == ':')$proxy = '';
    if(!isset($no_of_days)) $no_of_days = 1;
    $end_point_url = variable_get('market_dashboard_url', '');
    
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $end_point_url );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_PROXY, $proxy );
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"query\": {\"range\": {\"Timestamp\": {\"gte\": \"now-".$no_of_days."d/d\",\"lt\": \"now/d\"}}}}");
    curl_setopt($ch, CURLOPT_USERPWD, 'sebastian.wiehe' . ':' . '5my4EfQOfDIi');

    $headers = array();
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    $responce = json_decode($result, true);
    
    return $responce["hits"]["hits"];    
}
/**
 * Implements template_preprocess_search_result
 * @param type $vars
 */
function dxl_preprocess_search_result(&$vars) {

  $node = $vars['result']['node'];
  if ($node->nid) { 
    $result = db_select('field_data_field_display_blocks', 'fdb')
        ->fields('fdb',array('entity_id'))
        ->condition('field_display_blocks_moddelta', 'nodeblock:'.$node->nid,'=')
        ->execute()
        ->fetchAssoc();
  }
  if(isset($result['entity_id']) && is_numeric($result['entity_id'])) $master_nid = $result['entity_id'];
  else $master_nid = $node->nid;
  $vars['master_url'] = url(drupal_get_path_alias('node/' . $master_nid));
}

/**
 * Implements hook_preprocess_search_results().
 */
function dxl_preprocess_search_results(&$vars) {
  // search.module shows 10 items per page (this isn't customizable)
  $itemsPerPage = 10;

  // Determine which page is being viewed
  // If $_REQUEST['page'] is not set, we are on page 1
  $currentPage = (isset($_REQUEST['page']) ? $_REQUEST['page'] : 0) + 1;

  // Get the total number of results from the global pager
  $total = $GLOBALS['pager_total_items'][0];

  // Determine which results are being shown ("Showing results x through y")
  $start = (10 * $currentPage) - 9;
  // If on the last page, only go up to $total, not the total that COULD be
  // shown on the page. This prevents things like "Displaying 11-20 of 17".
  $end = (($itemsPerPage * $currentPage) >= $total) ? $total : ($itemsPerPage * $currentPage);

  // If there is more than one page of results:
  if ($total > $itemsPerPage) {
    $vars['search_totals'] = t('Showing !start - !end of !total results', array(
      '!start' => $start,
      '!end' => $end,
      '!total' => $total,
    ));
  }
  else {
    // Only one page of results, so make it simpler
    $vars['search_totals'] = t('Showing !total !results_label', array(
      '!total' => $total,
      // Be smart about labels: show "result" for one, "results" for multiple
      '!results_label' => format_plural($total, 'result', 'results'),
    ));
  }
}