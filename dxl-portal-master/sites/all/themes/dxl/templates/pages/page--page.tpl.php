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

