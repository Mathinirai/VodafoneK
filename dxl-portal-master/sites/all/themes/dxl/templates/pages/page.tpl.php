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

?>

<div id="page-wrapper"><div id="page">

  <div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>"><div class="section clearfix">

    <?php include($theme_path.'/templates/header.tpl.php'); ?>
    <?php print render($page['header']); ?>
  </div></div> <!-- /.section, /#header -->

  <?php if ($messages): ?>
            <div class="alert alert--light alert--warning validation__warning">
                <!-- ALERT CONTENT -->
                <div class="caption">
                    <!-- ALERT ICON -->
                    <div class="caption__media caption__media--top alert__media">
                        <svg focusable="false" aria-hidden="true" class="icon  icon--extra-small  alert__icon">
                            <use xlink:href="#icon-block" />
                        </svg>
                    </div>
                    <!-- ALERT TEXT -->
                    <div class="caption__text caption__text--top alert__text">
                        <?php print str_replace('Error message','',strip_tags($messages)); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
       <!-- BREADCRUMBS -->
      <?php if ($breadcrumb): ?>
        <nav class="breadcrumbs breadcrumbs--extrude">
          <div class="spring">
              <!-- BREADCRUMBS LIST -->
              <ol class="breadcrumbs__list hide--sm hide--md">
                  <!-- FIRST CRUMB -->
                  <?php 
                    $count = count($breadcrumb);
                    $counter = 1;
                    foreach ($breadcrumb as $b_value) {
                      if($counter == 1) $class = 'breadcrumbs__crumb  breadcrumbs__crumb--first';
                      else $class = 'breadcrumbs__crumb';
                      ?>
                      <li class="breadcrumbs__item">
                      <!-- NAME -->
                      <a href="#" class="<?php print $class; ?>">
                          <?php print $b_value ; ?>
                      </a>
                      <?php $counter++; if($count >= $counter ) { ?>
                      <!-- ICON ARROW RIGHT -->
                      <svg focusable="false" aria-hidden="true" class="icon  icon--small  breadcrumbs__chevron">
                          <use xlink:href="#icon-chevron-right" />
                      </svg>
                      <?php } ?>
                  </li>
                  <?php }?>
              </ol>
              <span class="hide--lg">
                  <a href="#" class="breadcrumbs__crumb">
                      <?php print $breadcrumb[0]; ?>
                  </a>
                  <svg focusable="false" aria-hidden="true" class="icon  icon--small  breadcrumbs__chevron">
                      <use xlink:href="#icon-chevron-right" />
                  </svg>
              </span>
          </div>
        </nav>
       <?php endif; ?> 
  <?php if ($page['featured']): ?>
    <div id="featured"><div class="section clearfix">
      <?php print render($page['featured']); ?>
    </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>

  <div id="main-wrapper" class="clearfix"><div id="main" class="clearfix">

    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_first']); ?>
      </div></div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>

    <div id="content" class="column"><div class="section">
      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      <div class="content mt-40 mb-40">
        <div class="spring">  
          <?php print render($page['content']); ?>
        </div>   
      </div>    
      <?php print $feed_icons; ?>

    </div></div> <!-- /.section, /#content -->

    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_second']); ?>
      </div></div> <!-- /.section, /#sidebar-second -->
    <?php endif; ?>

  </div></div> <!-- /#main, /#main-wrapper -->

  <div id="footer-wrapper"><div class="section">
    <?php include($theme_path.'/templates/footer.tpl.php'); ?>
    <?php if ($page['footer']): ?>
      <div id="footer" class="clearfix">   
        <?php print render($page['footer']); ?>
      </div> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->