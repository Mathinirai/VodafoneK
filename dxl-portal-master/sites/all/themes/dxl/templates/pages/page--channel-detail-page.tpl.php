<?php

/**
 * @file
 * DXL theme implementation to display a single Drupal page.
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 * @see html.tpl.php
 */
$title = $node->title;
$field_title = $node->field_title['und'][0]['value'];
$description = $node->field_description['und'][0]['value'];
$goals = $node->field_goals['und'];
$operations = $node->field_operations['und'];
$banner_image = $node->field_image['und'][0]['filename'];
$markets = $node->field_markets['und'];
$segment = $node->field_segment['und'];
$relation = $node->field_relation['und'];
$wrapper = entity_metadata_wrapper('node', $node );
$details_description_array = $wrapper->field_details_description->value();
if(!empty($details_description_array)) {
    foreach ($details_description_array as $details_key => $details_value) {
        $details_descriptions[$details_key]['title'] = $details_value->field_para_title['und'][0]['value'];
        $details_descriptions[$details_key]['description'] = $details_value->field_para_description['und'][0]['value'];
    }
}
$contact_array = $wrapper->field_contact_information->value();
if(!empty($contact_array)) {
    foreach ($contact_array as $contact_key => $contact_value) {
        if(isset($contact_value->field_para_title['und'][0]['value']))$contacts[$contact_key]['title'] = $contact_value->field_para_title['und'][0]['value'];
        if(isset($contact_value->field_para_name['und'][0]['value']))$contacts[$contact_key]['name'] = $contact_value->field_para_name['und'][0]['value'];
        if(isset($contact_value->field_para_email['und'][0]['email']))$contacts[$contact_key]['email'] = $contact_value->field_para_email['und'][0]['email'];
    }
}
$sequence = node_sibling($node);
$api_count = count($node->field_apis_reference['und']);
$microservice_count = count($node->field_microservices_reference['und']);
$usecase_count = count($node->field_usecase_reference['und']);
?>


  <div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>"><div class="section clearfix">
    <?php include($theme_path.'/templates/header.tpl.php'); ?>
    <?php print render($page['header']); ?>
  </div></div> <!-- /.section, /#header -->

  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <?php if ($page['featured']): ?>
    <div id="featured"><div class="section clearfix">
      <?php print render($page['featured']); ?>
    </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>

    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_first']); ?>
      </div></div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>

      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
    <div class="content">

    <div class="hero hero--details">

        <!-- BANNER HERO | BACKGROUND -->
        <div class="background background--cover hero__background hero__background--no-tint">

            <!-- BACKGROUND IMAGE LOADER -->
            <div class="lazyload background__image " data-bgset="
                            <?php echo $base_url . '/' . $theme_path; ?>/assets/images/images-responsive/DXL_herobanners_DetailstemplateXL-320.jpg [(max-width: 320px)] |
                            <?php echo $base_url . '/' . $theme_path; ?>/assets/images/images-responsive/DXL_herobanners_DetailstemplateXL-640.jpg [(max-width: 640px)] |
                            <?php echo $base_url . '/' . $theme_path; ?>/assets/images/images-responsive/DXL_herobanners_DetailstemplateXL-950.jpg [(max-width: 950px)] |
                            <?php echo $base_url . '/' . $theme_path; ?>/assets/images/images-responsive/<?php print $banner_image; ?>">
            </div>

            <!-- NO JS IMAGE LOADER -->
            <noscript>
                <div class="background__image" style="background-image: url(<?php echo $base_url . '/' . $theme_path; ?>/assets/images/hero-gradient-950.jpg)"></div>
            </noscript>
        </div>

        <!-- BANNER HERO | CONTENT -->
        <div class="hero__band">
            <div class="spring spring--extra-200">

                <div class="grid hide--sm">
                    <div class="grid__item grid__item--push grid__item--align-left grid__item--1/2">
                        <h4 class="heading heading--4">
                            <?php print $title; ?>
                        </h4>

                        <div class="grid grid--gutter">
                            <div class="grid__item grid__item--gutter grid__item--1/3">
                                <?php if(!empty($relation)) { ?>
                                <small class="heading heading--light">
                                    Relation
                                </small>
                                  <?php foreach ($relation as $relation_key => $relation_value) { ?>                                          
                                        <small class="heading heading--regular">
                                            <?php print $relation_value['taxonomy_term']->name; ?>
                                        </small>
                                  <?php }?>
                                <?php }?>
                            </div>
                            <div class="grid__item grid__item--gutter grid__item--2/3">
                            <?php if(!empty($segment)) { ?>                                
                                <small class="heading heading--light">
                                    Segment
                                </small>
                                  <?php foreach ($segment as $segment_key => $segment_value) { ?>                                          
                                        <small class="heading heading--regular">
                                            <?php print $segment_value['taxonomy_term']->name; ?>
                                        </small>
                                  <?php }?>
                            <?php }?>
                            </div>

                            <div class="grid__item grid__item--gutter grid__item--2/3">
                                <ul class="grid grid--gutter mt-30">
                                    <li
                                        class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/2">
                                        <small class="heading heading--light">
                                            APIs
                                        </small>
                                        <p class="box-item box-item--light">
                                            <?php echo $api_count;?>
                                        </p>


                                    </li>
                                    <li
                                        class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/2">
                                        <small class="heading heading--light">
                                            Use Cases
                                        </small>
                                        <p class="box-item box-item--light">
                                            <?php echo $usecase_count;?>
                                        </p>


                                    </li>
                                    <li
                                        class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/2">
                                        <small class="heading heading--light">
                                            Microservices
                                        </small>
                                        <p class="box-item box-item--light">
                                            <?php echo $microservice_count;?>
                                        </p>


                                    </li>

                                    <?php if(!empty($markets)) { ?>
                                    <li class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/1">
                                        <small class="heading heading--light">
                                            Markets
                                        </small>
                                        <ul class="grid grid--gutter">
                                          <?php  foreach ($markets as $markets_key => $markets_value) { ?>                                          
                                            <li class="grid__item grid__item--gutter grid__item--1/4">
                                                <p class="box-item box-item--light">
                                                    <?php print $markets_value['taxonomy_term']->name; ?>
                                                </p>
                                            </li>
                                          <?php }?>  
                                        </ul>
                                    </li>
                                    <?php }?>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- BREADCRUMBS -->
    <?php include($theme_path.'/templates/breadcrumb.tpl.php'); ?>      

    <div class="section section--gallery">

        <div class="spring">


            <div class="grid grid--gutter">

                <!-- TO BE INCLUDED IN A GRID IN DETAILS PAGE -->
                <div class="grid__item grid__item--gutter grid__item--1/3 grid__item--push grid__item--sm-1/1 grid__item--align-right">

                    <!-- ICON 1 -->
                    <a href="#" class="community__circle community__circle--share">
                        <svg focusable="false" aria-hidden="true" class="icon community__icon community__icon--dark icon--fill">
                            <use xlink:href="#icon-slack"></use>
                        </svg>

                        <!-- TOOLTIP ON HOVER -->
                        <span class="tooltiptext">Share to Slack</span>
                    </a>
                    <!-- ICON 2 -->
                    <a href="javascript:void(0);" onclick="copyUrl()" class="community__circle community__circle--share copy-url">
                        <svg focusable="false" aria-hidden="true" class="icon community__icon community__icon--dark icon--stroke-fill">
                            <use xlink:href="#icon-share"></use>
                        </svg>

                         <!-- TOOLTIP ON HOVER -->
                        <span class="tooltiptext">Copy URL</span>
                    </a>
                </div>

                <!-- LEFT COLUMN -->
                <div class="grid__item grid__item--gutter grid__item--2/3 grid__item--sm-1/1">
                    
                    <!-- DESCRIPTION -->
                    <h4 class="heading heading--leading heading--trailing heading--4">
                        <?php echo $field_title; ?>
                    </h4>

                    <p class="pr-20">
                        <?php print $description; ?>
                    </p>
                    
                    <?php if(!empty($details_descriptions)) { foreach ($details_descriptions as $details_description) {?>
                    <h4 class="heading heading--4 mb-20">
                        <?php echo $details_description['title']; ?>
                    </h4>
                    <?php echo $details_description['description']; ?>
                    <?php }}?>
                    
                    <!-- GOALS (USE COMPONENT DETAILS.LIST ) -->

                    <h4 class="heading heading--4 mb-20">
                        <?php if(!empty($goals)) print get_label('channel_detail_page_field_goals'); ?>
                    </h4>
                    <ul class="list list--reset">
                        <?php if(!empty($goals)){ $i = 1;  foreach ($goals as $goal) {?>
                        <li class="media media--gutter gutter--bottom">
                            <div class="media__image">
                                <div class="steps__number steps__number--blue-lagoon">
                                    <?php echo $i; ?>
                                </div>
                            </div>
                            <div class="media__body">
                                <p>
                                    <?php echo $goal['value']; ?>
                                </p>
                            </div>
                        </li>
                        <?php $i++; }}?>
                    </ul>                    
                    
                    <!-- OPERATIONS (USE COMPONENT DETAILS.LIST ) -->
                    <h4 class="heading heading--4 mb-20">
                        <?php if(!empty($operations)) print get_label('channel_detail_page_field_operations'); ?>
                    </h4>
                    <ul class="list list--reset">
                        <?php if(!empty($operations)) { $k = 1;  foreach ($operations as $operation) {?>
                        <li class="list__item--blue">
                            <?php echo $operation['value']; ?>
                        </li>
                        <?php $k++; }}?>
                    </ul>                  
                    
                    <!-- OPERATIONS (USE COMPONENT DETAILS.LIST  APIS) -->
                    <?php if(!empty($node->field_apis_reference['und'])) : ?>
                    <h4 class="heading heading--4 mb-20">
                        APIs
                    </h4>

                    <div data-js="_simpleTabs" class="js-tabs tabs tabs--secondary js-dynamic-content-listener">
                        <?php if(!empty($market_terms)) { ?>
                                                 <!-- TABS AREA -->
                        <div class="tabs__navigation-wrapper">
                            <!-- TAB NAVIGATION  -->
                            <nav class="js-tabs-navigation tabs__navigation tabs__navigation--fixed" role="tablist">   
                            <!-- TAB 1 -->
                                <a href="#tab-1" class="js-tabs-tab tabs__tab tabs__tab--active" aria-controls="#tab-1" role="tab" aria-selected="true">
                                    All
                                </a>
                                <?php $f = 2; foreach ($market_terms as  $keys_mar => $market_value) { ?>
                                <!-- TAB 2 -->
                                <a href="#tab-<?php echo $f; ?>" class="js-tabs-tab tabs__tab api-tab-<?php echo $market_value->name;?>" style="display: none;" aria-controls="#tab-2" role="tab" aria-selected="false">
                                    <?php echo $market_value->name; ?>
                                </a>
                                <?php $f++;} ?>
                            </nav>
                        </div>
                        <?php } ?>
                        <!-- TABS CONTENT AREA -->

                        <!-- TAB 1 | CONTENT -->
                        <div id="tab-1" class="js-tabs-content tabs__content " style="display: block;">
                            <div class="align--center p-30">
                                <table class="table table--list hide--md hide--sm">
                                    <?php 
                                    $a = 1;
                                    foreach ($node->field_apis_reference['und'] as $key_apis => $value_apis) {
                                        $apis_node = node_load($value_apis['target_id']);
                                        $apis_market = array();
                                        if(!empty($apis_node->field_markets['und'])) {
                                            foreach ($apis_node->field_markets['und'] as $key_mr => $value_mr) {
                                            $apis_market[] = taxonomy_term_load($value_mr['tid'])->name;
                                            }
                                        }
                                        echo '<ul id ="api-table-list" class ="element-hidden" >';
                                        foreach ($apis_market as $all_market) {
                                            echo '<li id="api-table-'.$all_market.'">'.$all_market.'</li>';
                                        }
                                        echo '<ul>';
                                        ?>
                                    <?php if($a ==1): ?>
                                    <thead class="table__head">
                                        <tr class="table__tr">
                                            <th class="table__th table__th--narrow">
                                                API
                                            </th>
                                            <th class="table__th">
                                                Microservice
                                            </th>
                                            <th class="table__th">
                                                Use Cases
                                            </th>
                                            <th class="table__th">
                                                Channels
                                            </th>
                                            <th class="table__th">
                                                Markets
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="table__body">
                                    <?php endif; ?>
                                    
                                        <tr class="table__tr">
                                            <td class="table__td">
                                                <a href="/<?php echo drupal_get_path_alias('node/'.$apis_node->nid); ?>"><?php echo  $apis_node->title; ?></a>
                                            </td>
                                            <td class="table__td">
                                                <ul>
                                                <?php if(!empty($apis_node->field_microservices_reference['und'])){ foreach($apis_node->field_microservices_reference['und'] as $apis_node_microservices) {
                                                    $microservices_name = node_load($apis_node_microservices['target_id'])->title;
                                                    echo '<li>'.$microservices_name.'</li>';
                                                }}?>
                                                </ul>
                                            </td>
                                            <td class="table__td">
                                                <?php echo count($apis_node->field_usecase_reference['und']); ?>
                                            </td>
                                            <td class="table__td">
                                                <ul>
                                                <?php if(!empty($apis_node->field_channel_reference['und'])){ foreach($apis_node->field_channel_reference['und'] as $apis_node_channel) {
                                                    $channel_name = node_load($apis_node_channel['target_id'])->title;
                                                    echo '<li>'.$channel_name.'</li>';
                                                }}?>
                                                </ul>
                                            </td>
                                            <td class="table__td">
                                                <?php if(!empty($apis_market)) echo implode(', ', $apis_market);?>
                                            </td>
                                        </tr>
                                    
                                    <?php $a++;} ?>
                                    </tbody>    
                                </table>
                            </div>

                            <!-- TABLE (MOBILE VIEW) -->
                            <div class="js-accordion accordion accordion--spaced hide--lg align--left" data-js="_accordion">
                                <!-- ACCORDION ITEM 1 | HEADING -->
                                <?php 
                                    foreach ($node->field_apis_reference['und'] as $key_apis_mobile => $value_apis_mobile) {
                                        $apis_node_mobile = node_load($value_apis_mobile['target_id']);
                                        $apis_market_mobile = array();
                                        if(!empty($apis_node_mobile->field_markets['und'])) {
                                            foreach ($apis_node_mobile->field_markets['und'] as $key_mr_mobile => $value_mr_mobile) {
                                            $apis_market_mobile[] = taxonomy_term_load($value_mr_mobile['tid'])->name;
                                            }
                                        }
                                        ?>
                                <div class="js-accordion-item accordion__item">
                                    <h3 class="js-accordion-heading accordion__heading">
                                        <span class="chevron">
                                            <span class="chevron__text">
                                                <?php echo  $apis_node_mobile->title; ?>
                                            </span>
                                            <span class="chevron__container accordion__chevron">
                                                <svg focusable="false" aria-hidden="true"
                                                    class="icon  icon--small  chevron__icon">
                                                    <use xlink:href="#icon-chevron-down" />
                                                </svg>
                                            </span>
                                        </span>
                                    </h3>

                                    <!-- ACCORDION ITEM 1 | CONTENT -->
                                    <div class="js-accordion-content accordion__content accordion__content--wide accordion__content--collapse ">
                                        <!-- SUBGROUP 1 -->
                                        <?php  if(!empty($apis_node_mobile->field_microservices_reference['und'])) { ?>
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Microservices
                                            </p>
                                            <?php foreach($apis_node_mobile->field_microservices_reference['und'] as $apis_node_microservice_mobile) { 
                                                    $microservice_name_mobile = node_load($apis_node_microservice_mobile['target_id'])->title;
                                                    ?>
                                            <!-- LINK TILE -->
                                            <a href="<?php echo '/node/'.$apis_node_microservice_mobile['target_id']; ?>" class="link link--tile link--tile--accordion ">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php echo '<li>'.$microservice_name_mobile.'</li>'; ?>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <span class="chevron__container">
                                                        <svg focusable="false" aria-hidden="true"
                                                            class="icon  icon--small  chevron__icon">
                                                            <use xlink:href="#icon-chevron-right"></use>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </a>
                                            <?php }?>
                                        </div>
                                        <?php }?>
                                        <!-- SUBGROUP 4 -->
                                        <?php if(!empty($apis_node_mobile->field_channel_reference['und'])){ ?>
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Channels
                                            </p>
                                            <?php foreach($apis_node_mobile->field_channel_reference['und'] as $channel_node_apis_mobile) { 
                                                    $api_name_mobile = node_load($channel_node_apis_mobile['target_id'])->title;
                                                    ?>
                                            <!-- LINK TILE -->
                                            <a href="<?php echo '/node/'.$channel_node_apis_mobile['target_id']; ?>" class="link link--tile link--tile--accordion ">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php echo '<li>'.$api_name_mobile.'</li>'; ?>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <span class="chevron__container">
                                                        <svg focusable="false" aria-hidden="true"
                                                            class="icon  icon--small  chevron__icon">
                                                            <use xlink:href="#icon-chevron-right"></use>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </a>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                        <!-- SUBGROUP 2 -->
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Use Cases
                                            </p>
                                            <!-- LINK TILE -->
                                            <a href="#" class="link link--tile link--tile--accordion ">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php echo count($apis_node_mobile->field_usecase_reference['und']); ?>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                        <!-- SUBGROUP 5 -->
                                        <?php if(!empty($apis_market_mobile)) : ?>
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Markets
                                            </p>
                                            <!-- LINK TILE -->
                                            <a href="#" class="link link--tile link--tile--accordion ">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php echo implode(', ', $apis_market_mobile);?>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                        <?php endif;?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        <!-- TABLE (MOBILE VIEW) END --> 
                            
                        </div>
                        
                        <?php $g = 2; foreach ($market_terms as  $keys_mar => $market_value) {
                            $node_apis_market[] = $market_value->name;
                            ?>
                        <!-- TAB 2 | CONTENT -->
                        <div id="tab-<?php echo $g;?>" class="js-tabs-content tabs__content " style="display: none;">
                            <div class="align--center p-30">
                                <table class="table table--list hide--md hide--sm">
                                    <?php 
                                    $b = 1;
                                    $record = FALSE;
                                    foreach ($node->field_apis_reference['und'] as $key_apis => $value_apis) {
                                        $apis_node = node_load($value_apis['target_id']);
                                        $apis_market = array();
                                        if(!empty($apis_node->field_markets['und'])) {
                                            foreach ($apis_node->field_markets['und'] as $key_mr => $value_mr) {
                                                $apis_market[] = taxonomy_term_load($value_mr['tid'])->name;
                                            }
                                        }
                                        if(in_array($market_value->name ,$apis_market)){
                                            $record = TRUE;
                                    ?>
                                    <?php if($b ==1): ?>
                                    <thead class="table__head">
                                        <tr class="table__tr">
                                            <th class="table__th table__th--narrow">
                                                API
                                            </th>
                                            <th class="table__th">
                                                Microservice
                                            </th>
                                            <th class="table__th">
                                                Use Cases
                                            </th>
                                            <th class="table__th">
                                                Channels
                                            </th>
                                            <th class="table__th">
                                                Markets
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="table__body">
                                    <?php endif; ?>
                                    
                                        <tr class="table__tr">
                                            <td class="table__td">
                                                <a href="/<?php echo drupal_get_path_alias('node/'.$apis_node->nid); ?>"><?php echo  $apis_node->title; ?></a>
                                            </td>
                                            <td class="table__td">
                                                <ul>
                                                <?php if(!empty($apis_node->field_microservices_reference['und'])){ foreach($apis_node->field_microservices_reference['und'] as $apis_node_microservices) {
                                                    $microservices_name = node_load($apis_node_microservices['target_id'])->title;
                                                    echo '<li>'.$microservices_name.'</li>';
                                                }}?>
                                                </ul>
                                            </td>
                                            <td class="table__td">
                                                <?php echo count($apis_node->field_usecase_reference['und']); ?>
                                            </td>
                                            <td class="table__td">
                                                <ul>
                                                <?php if(!empty($apis_node->field_channel_reference['und'])){ foreach($apis_node->field_channel_reference['und'] as $apis_node_channel) {
                                                    $channel_name = node_load($apis_node_channel['target_id'])->title;
                                                    echo '<li>'.$channel_name.'</li>';
                                                }}?>
                                                </ul>
                                            </td>
                                            <td class="table__td">
                                                <?php if(!empty($apis_market)) echo implode(', ', $apis_market);?>
                                            </td>
                                        </tr>
                                    
                                        <?php $b++; }} ?>
                                        </tbody>
                                </table>
                                <?php if(!$record) echo '<div class="mt-20">There are no results to display</div>'; ?>
                            </div>
                            
                            <!-- TABLE (MOBILE VIEW) -->
                            
                            <div class="js-accordion accordion accordion--spaced hide--lg align--left" data-js="_accordion">
                                <!-- ACCORDION ITEM 1 | HEADING -->
                                <?php 
                                    $record = FALSE;
                                    foreach ($node->field_apis_reference['und'] as $key_apis_mobile => $value_apis_mobile) {
                                        $apis_node_mobile = node_load($value_apis_mobile['target_id']);
                                        $apis_market_mobile = array();
                                        if(!empty($apis_node_mobile->field_markets['und'])) {
                                            foreach ($apis_node_mobile->field_markets['und'] as $key_mr_mobile => $value_mr_mobile) {
                                            $apis_market_mobile[] = taxonomy_term_load($value_mr_mobile['tid'])->name;
                                            }
                                        }
                                        if(in_array($market_value->name ,$apis_market_mobile)){
                                            $record = TRUE;
                                        ?>
                                <div class="js-accordion-item accordion__item">
                                    <h3 class="js-accordion-heading accordion__heading">
                                        <span class="chevron">
                                            <span class="chevron__text">
                                                <?php echo  $apis_node_mobile->title; ?>
                                            </span>
                                            <span class="chevron__container accordion__chevron">
                                                <svg focusable="false" aria-hidden="true"
                                                    class="icon  icon--small  chevron__icon">
                                                    <use xlink:href="#icon-chevron-down" />
                                                </svg>
                                            </span>
                                        </span>
                                    </h3>

                                    <!-- ACCORDION ITEM 1 | CONTENT -->
                                    <div class="js-accordion-content accordion__content accordion__content--wide accordion__content--collapse ">
                                        <!-- SUBGROUP 1 -->
                                        <?php  if(!empty($apis_node_mobile->field_microservices_reference['und'])) { ?>
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Microservices
                                            </p>
                                            <?php foreach($apis_node_mobile->field_microservices_reference['und'] as $apis_node_microservice_mobile) { 
                                                    $microservice_name_mobile = node_load($apis_node_microservice_mobile['target_id'])->title;
                                                    ?>
                                            <!-- LINK TILE -->
                                            <a href="<?php echo '/node/'.$apis_node_microservice_mobile['target_id']; ?>" class="link link--tile link--tile--accordion ">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php echo '<li>'.$microservice_name_mobile.'</li>'; ?>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <span class="chevron__container">
                                                        <svg focusable="false" aria-hidden="true"
                                                            class="icon  icon--small  chevron__icon">
                                                            <use xlink:href="#icon-chevron-right"></use>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </a>
                                            <?php }?>
                                        </div>
                                        <?php }?>
                                        <!-- SUBGROUP 4 -->
                                        <?php if(!empty($apis_node_mobile->field_channel_reference['und'])){ ?>
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Channels
                                            </p>
                                            <?php foreach($apis_node_mobile->field_channel_reference['und'] as $channel_node_apis_mobile) { 
                                                    $api_name_mobile = node_load($channel_node_apis_mobile['target_id'])->title;
                                                    ?>
                                            <!-- LINK TILE -->
                                            <a href="<?php echo '/node/'.$channel_node_apis_mobile['target_id']; ?>" class="link link--tile link--tile--accordion ">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php echo '<li>'.$api_name_mobile.'</li>'; ?>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <span class="chevron__container">
                                                        <svg focusable="false" aria-hidden="true"
                                                            class="icon  icon--small  chevron__icon">
                                                            <use xlink:href="#icon-chevron-right"></use>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </a>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                        <!-- SUBGROUP 2 -->
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Use Cases
                                            </p>
                                            <!-- LINK TILE -->
                                            <a href="#" class="link link--tile link--tile--accordion ">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php echo count($apis_node_mobile->field_usecase_reference['und']); ?>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                        <!-- SUBGROUP 5 -->
                                        <?php if(!empty($apis_market_mobile)) : ?>
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Markets
                                            </p>
                                            <!-- LINK TILE -->
                                            <a href="#" class="link link--tile link--tile--accordion ">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php echo implode(', ', $apis_market_mobile);?>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                        <?php endif;?>
                                    </div>
                                </div>
                                    <?php }} ?>
                            </div>
                        <!-- TABLE (MOBILE VIEW) END --> 
                            
                        </div>
                        <?php $g++;} ?>
                    </div>
                    <?php endif; ?>
                    
                      <!-- OPERATIONS (USE COMPONENT DETAILS.LIST  Microservices) -->
                    <?php if(!empty($node->field_microservices_reference['und'])) : ?>
                    <h4 class="heading heading--4 mb-20">
                        Microservices
                    </h4>
                    <div data-js="_simpleTabs" class="js-tabs tabs tabs--secondary js-dynamic-content-listener">
                        <?php if(!empty($market_terms)) { ?>
                                                 <!-- TABS AREA -->
                        <div class="tabs__navigation-wrapper">
                            <!-- TAB NAVIGATION  -->
                            <nav class="js-tabs-navigation tabs__navigation tabs__navigation--fixed" role="tablist">   
                            <!-- TAB 1 -->
                                <a href="#tab-1" class="js-tabs-tab tabs__tab tabs__tab--active" aria-controls="#tab-1" role="tab" aria-selected="true">
                                    All
                                </a>
                                <?php $f = 2; foreach ($market_terms as  $keys_mar => $market_value) { ?>
                                <!-- TAB 2 -->
                                <a href="#tab-<?php echo $f; ?>" class="js-tabs-tab tabs__tab ms-tab-<?php echo $market_value->name;?>" style="display: none;" aria-controls="#tab-2" role="tab" aria-selected="false">
                                    <?php echo $market_value->name; ?>
                                </a>
                                <?php $f++;} ?>
                            </nav>
                        </div>
                        <?php } ?>
                        <!-- TABS CONTENT AREA -->

                        <!-- TAB 1 | CONTENT -->
                        <div id="tab-1" class="js-tabs-content tabs__content " style="display: block;">
                            <div class="align--center p-30">
                                <table class="table table--list hide--md hide--sm">
                                    <?php 
                                    $n = 1;
                                    foreach ($node->field_microservices_reference['und'] as $key_microservice => $value_microservice) {
                                        $microservice_node = node_load($value_microservice['target_id']);
                                        $microservice_market = array();
                                        if(!empty($microservice_node->field_markets['und'])) {
                                            foreach ($microservice_node->field_markets['und'] as $key_mr => $value_mr) {
                                            $microservice_market[] = taxonomy_term_load($value_mr['tid'])->name;
                                            }
                                        }
                                        echo '<ul id ="ms-table-list" class ="element-hidden" >';
                                        foreach ($microservice_market as $all_market) {
                                            echo '<li id="ms-table-'.$all_market.'">'.$all_market.'</li>';
                                        }
                                        echo '<ul>';
                                        ?>
                                    <?php if($n ==1): ?>
                                    <thead class="table__head">
                                        <tr class="table__tr">
                                            <th class="table__th table__th--narrow">
                                                Microservice
                                            </th>
                                            <th class="table__th">
                                                Type
                                            </th>
                                            <th class="table__th">
                                                Use Cases
                                            </th>
                                            <th class="table__th">
                                                Channels
                                            </th>
                                            <th class="table__th">
                                                Markets
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="table__body">
                                    <?php endif; ?>
                                    
                                        <tr class="table__tr">
                                            <td class="table__td">
                                                <a href="/<?php echo drupal_get_path_alias('node/'.$microservice_node->nid); ?>"><?php echo  $microservice_node->title; ?></a>
                                            </td>
                                            <td class="table__td">
                                                <ul>
                                                <?php if(!empty($microservice_node->field_type['und'])){ foreach($microservice_node->field_type['und'] as $microservices_type) {
                                                    echo '<li>'.taxonomy_term_load($microservices_type['tid'])->name.'</li>';
                                                }}?>
                                                </ul>
                                            </td>
                                            <td class="table__td">
                                                <?php echo count($microservice_node->field_usecase_reference['und']); ?>
                                            </td>
                                            <td class="table__td">
                                                <ul>
                                                <?php if(!empty($microservice_node->field_channel_reference['und'])){ foreach($microservice_node->field_channel_reference['und'] as $apis_node_channel) {
                                                    $channel_name = node_load($apis_node_channel['target_id'])->title;
                                                    echo '<li>'.$channel_name.'</li>';
                                                }}?>
                                                </ul>
                                            </td>
                                            <td class="table__td">
                                                <?php if(!empty($microservice_market)) echo implode(', ', $microservice_market);?>
                                            </td>
                                        </tr>
                                    
                                    <?php $n++;} ?>
                                    </tbody>    
                                </table>
                            </div>
                            
                            
                            <!-- TABLE (MOBILE VIEW) -->
                            <div class="js-accordion accordion accordion--spaced hide--lg align--left" data-js="_accordion">
                                <!-- ACCORDION ITEM 1 | HEADING -->
                                <?php 
                                    foreach ($node->field_microservices_reference['und'] as $key_microservice_mobile => $value_microservice_mobile) {
                                        $microservice_node_mobile = node_load($value_microservice_mobile['target_id']);
                                        $microservice_market_mobile = array();
                                        if(!empty($microservice_node_mobile->field_markets['und'])) {
                                            foreach ($microservice_node_mobile->field_markets['und'] as $key_mr_mobile => $value_mr_mobile) {
                                            $microservice_market_mobile[] = taxonomy_term_load($value_mr_mobile['tid'])->name;
                                            }
                                        }
                                        ?>
                                <div class="js-accordion-item accordion__item">
                                    <h3 class="js-accordion-heading accordion__heading">
                                        <span class="chevron">
                                            <span class="chevron__text">
                                                <?php echo  $microservice_node_mobile->title; ?>
                                            </span>
                                            <span class="chevron__container accordion__chevron">
                                                <svg focusable="false" aria-hidden="true"
                                                    class="icon  icon--small  chevron__icon">
                                                    <use xlink:href="#icon-chevron-down" />
                                                </svg>
                                            </span>
                                        </span>
                                    </h3>

                                    <!-- ACCORDION ITEM 1 | CONTENT -->
                                    <div class="js-accordion-content accordion__content accordion__content--wide accordion__content--collapse ">
                                        <!-- SUBGROUP 1 -->
                                       <?php if(!empty($microservice_node_mobile->field_type['und'])){ ?>
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Type
                                            </p>
                                            <!-- LINK TILE -->
                                            <div class="link link--tile link--tile--accordion">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <?php foreach($microservice_node_mobile->field_type['und'] as $microservices_type_mobile) { ?>
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php   echo taxonomy_term_load($microservices_type_mobile['tid'])->name; ?>
                                                                </span>
                                                                <?php  } ?>
                                                            </span>
                                                        </span>
                                                    </span>

                                                </span>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <!-- SUBGROUP 4 -->
                                        <?php if(!empty($microservice_node_mobile->field_channel_reference['und'])){ ?>
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Channels
                                            </p>
                                            <?php foreach($microservice_node_mobile->field_channel_reference['und'] as $channel_node_microservice_mobile) { 
                                                    $channel_name_mobile = node_load($channel_node_microservice_mobile['target_id'])->title;
                                                    ?>
                                            <!-- LINK TILE -->
                                            <a href="<?php echo '/node/'.$channel_node_microservice_mobile['target_id']; ?>" class="link link--tile link--tile--accordion ">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php echo '<li>'.$channel_name_mobile.'</li>'; ?>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <span class="chevron__container">
                                                        <svg focusable="false" aria-hidden="true"
                                                            class="icon  icon--small  chevron__icon">
                                                            <use xlink:href="#icon-chevron-right"></use>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </a>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                        <!-- SUBGROUP 2 -->
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Use Cases
                                            </p>
                                            <!-- LINK TILE -->
                                            <a href="#" class="link link--tile link--tile--accordion ">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php echo count($apis_node_mobile->field_usecase_reference['und']); ?>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                        <!-- SUBGROUP 5 -->
                                        <?php if(!empty($apis_market_mobile)) : ?>
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Markets
                                            </p>
                                            <!-- LINK TILE -->
                                            <a href="#" class="link link--tile link--tile--accordion ">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php echo implode(', ', $apis_market_mobile);?>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                        <?php endif;?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        <!-- TABLE (MOBILE VIEW) END --> 
                            
                        </div>
                        
                        <?php $l = 2; foreach ($market_terms as  $keys_mar => $market_value) { ?>
                        <!-- TAB 2 | CONTENT -->
                        <div id="tab-<?php echo $l;?>" class="js-tabs-content tabs__content " style="display: none;">
                            <div class="align--center p-30">
                                <table class="table table--list hide--md hide--sm">
                                    <?php 
                                    $u = 1;
                                    $record = FALSE;
                                    foreach ($node->field_microservices_reference['und'] as $key_apis => $value_apis) {
                                        $microservice_node = node_load($value_apis['target_id']);
                                        $microservice_market = array();
                                        if(!empty($microservice_node->field_markets['und'])) {
                                            foreach ($microservice_node->field_markets['und'] as $key_mr => $value_mr) {
                                                $microservice_market[] = taxonomy_term_load($value_mr['tid'])->name;
                                            }
                                        }
                                        if(in_array($market_value->name ,$microservice_market)){
                                            $record = TRUE;
                                    ?>
                                    <?php if($u ==1): ?>
                                    <thead class="table__head">
                                        <tr class="table__tr">
                                            <th class="table__th table__th--narrow">
                                                Microservice
                                            </th>
                                            <th class="table__th">
                                                Type
                                            </th>
                                            <th class="table__th">
                                                Use Cases
                                            </th>
                                            <th class="table__th">
                                                Channels
                                            </th>
                                            <th class="table__th">
                                                Markets
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="table__body">
                                    <?php endif; ?>
                                    
                                        <tr class="table__tr">
                                            <td class="table__td">
                                                <a href="/<?php echo drupal_get_path_alias('node/'.$microservice_node->nid); ?>"><?php echo  $microservice_node->title; ?></a>
                                            </td>
                                            <td class="table__td">
                                                <ul>
                                                <?php if(!empty($microservice_node->field_type['und'])){ foreach($microservice_node->field_type['und'] as $microservices_type) {
                                                    echo '<li>'.taxonomy_term_load($microservices_type['tid'])->name.'</li>';
                                                }}?>
                                                </ul>
                                            </td>
                                            <td class="table__td">
                                                <?php echo count($microservice_node->field_usecase_reference['und']); ?>
                                            </td>
                                            <td class="table__td">
                                                <ul>
                                                <?php if(!empty($microservice_node->field_channel_reference['und'])){ foreach($microservice_node->field_channel_reference['und'] as $apis_node_channel) {
                                                    $channel_name = node_load($apis_node_channel['target_id'])->title;
                                                    echo '<li>'.$channel_name.'</li>';
                                                }}?>
                                                </ul>
                                            </td>
                                            <td class="table__td">
                                                <?php if(!empty($microservice_market)) echo implode(', ', $microservice_market);?>
                                            </td>
                                        </tr>
                                    
                                        <?php $u++; }} ?>
                                        </tbody>
                                </table>
                                <?php if(!$record) echo '<div class="mt-20">There are no results to display</div>'; ?>
                            </div>
                             <!-- TABLE (MOBILE VIEW) -->
                            <div class="js-accordion accordion accordion--spaced hide--lg align--left" data-js="_accordion">
                                <!-- ACCORDION ITEM 1 | HEADING -->
                                <?php 
                                    $record = FALSE;
                                    foreach ($node->field_microservices_reference['und'] as $key_microservice_mobile => $value_microservice_mobile) {
                                        $microservice_node_mobile = node_load($value_microservice_mobile['target_id']);
                                        $microservice_market_mobile = array();
                                        if(!empty($microservice_node_mobile->field_markets['und'])) {
                                            foreach ($microservice_node_mobile->field_markets['und'] as $key_mr_mobile => $value_mr_mobile) {
                                            $microservice_market_mobile[] = taxonomy_term_load($value_mr_mobile['tid'])->name;
                                            }
                                        }
                                        if(in_array($market_value->name ,$microservice_market_mobile)){
                                            $record = TRUE;
                                        ?>
                                <div class="js-accordion-item accordion__item">
                                    <h3 class="js-accordion-heading accordion__heading">
                                        <span class="chevron">
                                            <span class="chevron__text">
                                                <?php echo  $microservice_node_mobile->title; ?>
                                            </span>
                                            <span class="chevron__container accordion__chevron">
                                                <svg focusable="false" aria-hidden="true"
                                                    class="icon  icon--small  chevron__icon">
                                                    <use xlink:href="#icon-chevron-down" />
                                                </svg>
                                            </span>
                                        </span>
                                    </h3>

                                    <!-- ACCORDION ITEM 1 | CONTENT -->
                                    <div class="js-accordion-content accordion__content accordion__content--wide accordion__content--collapse ">
                                        <!-- SUBGROUP 1 -->
                                        <?php if(!empty($microservice_node_mobile->field_type['und'])){ ?>
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Type
                                            </p>
                                            <!-- LINK TILE -->
                                            <div class="link link--tile link--tile--accordion">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <?php foreach($microservice_node_mobile->field_type['und'] as $microservices_type_mobile) { ?>
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php   echo taxonomy_term_load($microservices_type_mobile['tid'])->name; ?>
                                                                </span>
                                                                <?php  } ?>
                                                            </span>
                                                        </span>
                                                    </span>

                                                </span>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <!-- SUBGROUP 4 -->
                                        <?php if(!empty($microservice_node_mobile->field_channel_reference['und'])){ ?>
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Channels
                                            </p>
                                            <?php foreach($microservice_node_mobile->field_channel_reference['und'] as $channel_node_microservice_mobile) { 
                                                    $channel_name_mobile = node_load($channel_node_microservice_mobile['target_id'])->title;
                                                    ?>
                                            <!-- LINK TILE -->
                                            <a href="<?php echo '/node/'.$channel_node_microservice_mobile['target_id']; ?>" class="link link--tile link--tile--accordion ">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php echo '<li>'.$channel_name_mobile.'</li>'; ?>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <span class="chevron__container">
                                                        <svg focusable="false" aria-hidden="true"
                                                            class="icon  icon--small  chevron__icon">
                                                            <use xlink:href="#icon-chevron-right"></use>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </a>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                        <!-- SUBGROUP 2 -->
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Use Cases
                                            </p>
                                            <!-- LINK TILE -->
                                            <a href="#" class="link link--tile link--tile--accordion ">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php echo count($apis_node_mobile->field_usecase_reference['und']); ?>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                        <!-- SUBGROUP 5 -->
                                        <?php if(!empty($apis_market_mobile)) : ?>
                                        <div class="accordion__content--subgroup">
                                            <!-- SUBGROUP TITLE -->
                                            <p class="accordion__content--header">
                                                Markets
                                            </p>
                                            <!-- LINK TILE -->
                                            <a href="#" class="link link--tile link--tile--accordion ">
                                                <span class="chevron">
                                                    <span class="chevron__text">
                                                        <span class="media media--middle">
                                                            <span class="media__body">
                                                                <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                                    <?php echo implode(', ', $apis_market_mobile);?>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                        <?php endif;?>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        <!-- TABLE (MOBILE VIEW) END -->
                            
                        </div>
                        <?php $l++;} ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(!empty($node->field_usecase_reference['und'])){ ?>
                    <!-- USE CASES -->
                    <h4 class="heading heading--4 mb-20">
                        Use Cases
                    </h4>

                    <ul class="grid grid--gutter">
                    <?php 
                    foreach ($node->field_usecase_reference['und'] as $key_usecase => $value_usecase) {
                        $usecase_node = node_load($value_usecase['target_id']);
                        ?>
                        <li class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/2 grid__item--sm-1/1">
                            <a href="/<?php echo drupal_get_path_alias('node/'.$usecase_node->nid); ?>" class="card card--white card--link">
                                <div class="card__content">
                                    <div class="grid grid--gutter">
                                        <div class="grid__item grid__item--gutter grid__item--middle grid__item--6/7">
                                            <h4 class="heading heading--4 no-gutter--all">
                                                <?php echo  $usecase_node->title; ?>
                                            </h4>
                                        </div>
                                        <div
                                            class="grid__item grid__item--gutter grid__item--middle grid__item--align-right grid__item--1/7">
                                            <svg focusable="false" aria-hidden="true"
                                                class="icon chevron__icon chevron__icon--red ">
                                                <use xlink:href="#icon-chevron-right"></use>
                                            </svg>

                                        </div>

                                        <div class="grid pt-10">

                                            <div
                                                class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/4">
                                                <small class="heading heading--light">
                                                    APIs
                                                </small>
                                                <p class="box-item box-item--dark">
                                                    <?php echo count($usecase_node->field_apis_reference['und']); ?>
                                                </p>

                                            </div>
                                            <div
                                                class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/4">
                                                <small class="heading heading--light">
                                                    Microservices
                                                </small>
                                                <p class="box-item box-item--dark">
                                                    <?php echo count($usecase_node->field_microservices_reference['und']); ?>
                                                </p>

                                            </div>
                                            <div
                                                class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/4">
                                                <small class="heading heading--light">
                                                    Channels
                                                </small>
                                                <p class="box-item box-item--dark">
                                                    <?php echo count($usecase_node->field_channel_reference['und']); ?>
                                                </p>
                                            </div>
                                            <div
                                                class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/4">
                                                <small class="heading heading--light">
                                                    Markets
                                                </small>
                                                <p class="box-item box-item--dark">
                                                    <?php echo count($usecase_node->field_markets['und']); ?>
                                                </p>
                                            </div>

                                        </div>


                                    </div>

                                </div>

                            </a>
                        </li>
                        
                        <?php }?>
                    </ul>
                    <?php }?>
                    
                    
                    

                </div>

                <!-- RIGHT COLUMN -->
                <!-- TO BE INCLUDED AS A GRID ITEM IN THE DETAILS PAGE GRID -->
<!--                <div class="grid__item grid__item--gutter grid__item--1/3 grid__item--push grid__item--sm-1/1">
                    <h4 class="heading  heading--leading heading--trailing heading--4">
                        Data Model
                    </h4>
                    <a href="#" class="link link--tile link--tile--wide link--tile--flat mt-10 ">
                        <span class="chevron">
                            <span class="chevron__text">
                                <span class="media media--gutter media--middle">
                                    <span class="media__body">
                                        <span class="link__heading heading heading--5 no-gutter--all">
                                            Bill Analysis
                                        </span>
                                    </span>
                                </span>
                            </span>
                            <span class="chevron__container">
                                <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon--red">
                                    <use xlink:href="#icon-chevron-right"></use>
                                </svg>
                            </span>
                        </span>
                    </a>

                    <h4 class="heading heading--trailing heading--4">
                        Entities/Resources
                    </h4>
                    <a href="#" class="link link--tile link--tile--wide link--tile--flat mt-10 ">
                        <span class="chevron">
                            <span class="chevron__text">
                                <span class="media media--gutter media--middle">
                                    <span class="media__body">
                                        <span class="link__heading heading heading--5 no-gutter--all">
                                            Customer Bill
                                        </span>
                                    </span>
                                </span>
                            </span>
                            <span class="chevron__container">
                                <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon--red">
                                    <use xlink:href="#icon-chevron-right"></use>
                                </svg>
                            </span>
                        </span>
                    </a>
                    <a href="#" class="link link--tile link--tile--wide link--tile--flat mt-10 ">
                        <span class="chevron">
                            <span class="chevron__text">
                                <span class="media media--gutter media--middle">
                                    <span class="media__body">
                                        <span class="link__heading heading heading--5 no-gutter--all">
                                            Subscription
                                        </span>
                                    </span>
                                </span>
                            </span>
                            <span class="chevron__container">
                                <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon--red">
                                    <use xlink:href="#icon-chevron-right"></use>
                                </svg>
                            </span>
                        </span>
                    </a>

                    <h4 class="heading heading--trailing heading--4">
                        Domains
                    </h4>
                    <a href="#" class="link link--tile link--tile--wide link--tile--flat mt-10 ">
                        <span class="chevron">
                            <span class="chevron__text">
                                <span class="media media--gutter media--middle">
                                    <span class="media__body">
                                        <span class="link__heading heading heading--5 no-gutter--all">
                                            Customer
                                        </span>
                                    </span>
                                </span>
                            </span>
                            <span class="chevron__container">
                                <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon--red">
                                    <use xlink:href="#icon-chevron-right"></use>
                                </svg>
                            </span>
                        </span>
                    </a>

                    <h4 class="heading heading--trailing heading--4">
                        Digital Capabilities
                    </h4>
                    <a href="#" class="link link--tile link--tile--wide link--tile--flat mt-10 ">
                        <span class="chevron">
                            <span class="chevron__text">
                                <span class="media media--gutter media--middle">
                                    <span class="media__body">
                                        <span class="link__heading heading heading--5 no-gutter--all">
                                            Workforce Management
                                        </span>
                                    </span>
                                </span>
                            </span>
                            <span class="chevron__container">
                                <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon--red">
                                    <use xlink:href="#icon-chevron-right"></use>
                                </svg>
                            </span>
                        </span>
                    </a>
                    <a href="#" class="link link--tile link--tile--wide link--tile--flat mt-10 ">
                        <span class="chevron">
                            <span class="chevron__text">
                                <span class="media media--gutter media--middle">
                                    <span class="media__body">
                                        <span class="link__heading heading heading--5 no-gutter--all">
                                            Store Master Data Management
                                        </span>
                                    </span>
                                </span>
                            </span>
                            <span class="chevron__container">
                                <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon--red">
                                    <use xlink:href="#icon-chevron-right"></use>
                                </svg>
                            </span>
                        </span>
                    </a>


                </div>-->
            </div>


            <?php if(!empty($contacts)) : ?>
            <!-- CONTACTS -->
            <h4 class="heading heading--4">
                Contacts
            </h4>
            <div class="grid grid--gutter">
                <?php foreach ($contacts as $contact) {?>
                    <div class="grid__item grid__item--gutter grid__item--1/3 grid__item--sm-1/1">
                    <div class="card card--white">
                        <div class="card__content card__content--narrow">
                            <h5 class="heading heading--5 heading--leading heading--trailing">
                                <?php echo $contact['name']; ?>
                            </h5>
                            <p class="heading heading--6 heading--leading">
                                <?php echo $contact['title']; ?>
                            </p>
                            <p class="heading heading--6 heading--trailing">
                                <a href="mailto:<?php echo $contact['email'];?>"><?php echo $contact['email']; ?></a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <?php endif; ?> 

        </div>
    </div>

   <!-- PREVIOUS / NEXT -->
     <!-- PREVIOUS / NEXT -->
    <div class="section section--gallery flush--top">
        <div class="spring ">
            <div class="grid grid--gutter">
                <div class="grid__item grid__item--gutter grid__item--1/4 grid__item--sm-1/2 grid__item--align-left grid__item--pull">
                    <?php if(!empty($sequence['previous'])) { ?>
                    <a href="/<?php echo drupal_get_path_alias('node/'.$sequence['previous']['nid']); ?>" class="chevron  chevron--inline">
                        <!-- ARROW ICON -->
                        <span class="chevron__container">
                            <svg focusable="false" aria-hidden="true"
                                class="icon  icon--small  chevron__icon">
                                <use xlink:href="#icon-chevron-left" />
                            </svg>
                        </span>
                        <!-- TITLE -->
                        <span class="chevron__text pagination__page-link ">
                            Previous
                        </span>
                    </a>
                    <!-- NAME OF THE PREVIOUS PAGE -->
                    <span class="pagination__page-title">
                        <?php echo $sequence['previous']['title']; ?>
                    </span>
                    
                    <?php } ?>
                </div>

                <div class="grid__item grid__item--gutter grid__item--1/4 grid__item--sm-1/2 grid__item--align-right grid__item--push">
                    <?php if(!empty($sequence['next'])) { ?>
                    <a href="/<?php echo drupal_get_path_alias('node/'.$sequence['next']['nid']); ?>" class="chevron  chevron--inline pagination__page-link">
                        <!-- TITLE -->
                        <span class="chevron__text pagination__page-link ">
                            Next
                        </span>
                        <!-- ARROW ICON -->
                        <span class="chevron__container">
                            <svg focusable="false" aria-hidden="true"
                                class="icon  icon--small  chevron__icon ">
                                <use xlink:href="#icon-chevron-right" />
                            </svg>
                        </span>
                    </a>
                    <!-- NAME OF THE NEXT PAGE -->
                    <span class="pagination__page-title">
                        <?php echo $sequence['next']['title']; ?>
                    </span>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>  


</div> 
    <?php print $feed_icons; ?>

    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_second']); ?>
      </div></div> <!-- /.section, /#sidebar-second -->
    <?php endif; ?>


  <div id="footer-wrapper"><div class="section">
    <?php include($theme_path.'/templates/footer.tpl.php'); ?>
    <?php if ($page['footer']): ?>
      <div id="footer" class="clearfix">   
        <?php print render($page['footer']); ?>
      </div> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

