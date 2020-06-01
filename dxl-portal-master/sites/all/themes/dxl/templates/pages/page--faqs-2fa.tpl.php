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
$headline = $node->field_headline['und'][0]['value'];
$banner_image = $node->field_image['und'][0]['filename'];
$faq_nodes = get_node_listing('faq_page');
$faq_types = get_term_list('faq_types');
?>


  <div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>"><div class="section clearfix">
    <?php if(user_is_anonymous()) { ?>      
    <div class="js-navigation navigation navigation--primary component__icon-background" data-js="_navigation">
            <div class="spring">
                <ul class="navigation__list navigation__spring navigation__hide" role="navigation">

                    <!-- DESKTOP RESPONSIVE NAV -->

                    <!-- LOGO BRAND VODAFONE HOME LINK -->
                    <li class="navigation__item">
                        <a href="<?php echo $base_url; ?>" class="js-brand brand">
                            <svg focusable="false" aria-hidden="true" class="icon icon--small brand__logo">
                            <use xlink:href="#icon-vodafone-logo" />
                            </svg>
                        </a>
                    </li>
                    <li class="js-navigation-item navigation__item hide--sm hide--md mt-20">
                        <span class="h4 font-bold">Vodafone <span class="font-light">DXL</span></span>
                    </li>
                </ul>
                
            </div>
        </div>
    <?php } else { include($theme_path.'/templates/header.tpl.php'); } ?>   
          
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
        
      <div class="hello">
        <div class="background background--cover segmentation__image hello__background--static hello__background">
            <picture>
                <!-- BACKGROUND IMAGE LOADER -->
                <div class="lazyload background__image " data-bgset="
            /sites/all/themes/dxl/assets/images/images-responsive/business-hello-320.jpg [(max-width: 320px)] |
            /sites/all/themes/dxl/assets/images/images-responsive/business-hello-640.jpg [(max-width: 640px)] |
            /sites/all/themes/dxl/assets/images/images-responsive/business-hello-950.jpg [(max-width: 950px)] |
            /sites/default/files/<?php echo $banner_image; ?>">
                </div>
                <!-- NO JS IMAGE LOADER -->
                <noscript>
                    <div class="background__image" style="background-image: url(/sites/all/themes/dxl/assets/images/hero-phone-950.jpg)"></div>
                </noscript>
        </div>
      
        <div class="hello__band hello__band--static">
          <div class="hello__message">
              <h1 class="heading heading--2 heading--light heading--leading hello__heading">
                  <?php echo $headline; ?>
              </h1>
              <h2 class="heading heading--4 heading--light heading--leading hello__sub-message gutter--bottom"></h2>
          </div>
        </div>
      </div>    
    <!-- BREADCRUMBS -->
    <?php include($theme_path.'/templates/breadcrumb.tpl.php'); ?>  
    <div class="content">      

        <div class="search">
            <div class="section section--light-gallery">
                <div class="spring spring--extra-100">

                    <div data-js="_simpleTabs" class="js-tabs tabs tabs--secondary gutter--bottom">
                        <!-- TABS AREA -->
                        <div class="tabs__navigation-wrapper element-hidden">
                            <!-- TAB NAVIGATION  -->
                            <nav class="js-tabs-navigation tabs__navigation tabs__navigation--fixed">
                                <!-- TAB 1 -->
                                <a href="#tab-1" class="js-tabs-tab tabs__tab tabs__tab--active">2FA</a>
                            </nav>
                        </div>
                        <!-- TABS CONTENT AREA -->
                       <?php $k = 1; foreach($faq_types as $faqs) { ?>
                        <?php if($k ==1) {?>
                        <!-- TAB 1 | CONTENT -->
                        <div id="tab-<?php echo $k;?>" class="js-tabs-content tabs__content ">
                            <!-- ACCORDION -->
                            <div class="js-accordion accordion accordion--spaced accordion--faqs" data-js="_accordion">
                                <!-- ACCORDION ITEM 1 | HEADING -->
                                <?php foreach ($faq_nodes as $faq_key => $faq_node) {
                                    if(!empty($faq_node->field_faq_type['und'] )){
                                        $list = false;
                                        foreach ($faq_node->field_faq_type['und'] as $key_faq_type => $value_faq_type_id) {
                                            $faq_term = taxonomy_term_load($value_faq_type_id['tid']);
                                            if($faq_term->name == '2FA'){
                                                $list = true;
                                            }
                                        }
                                    }
                                    if($list) {
                                    ?>
                                        <div class="js-accordion-item accordion__item">
                                            <h3 class="js-accordion-heading accordion__heading">
                                                <span class="chevron">
                                                    <span class="chevron__text heading--light">
                                                        <?php echo $faq_node->title; ?>
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
                                                <?php echo $faq_node->body['und'][0]['value']; ?>
                                            </div>
                                        </div>
                                    <?php }} ?>
                            </div>
                        </div>
                        <?php } $k++; } ?>
                    </div>

                </div>
            </div>
        </div>


    </div>
    <!-- SITE FOOTER -->
    <!-- CLOSING CONTENT DIV -->
    </div>

    <?php print render($page['content']); ?>  
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

