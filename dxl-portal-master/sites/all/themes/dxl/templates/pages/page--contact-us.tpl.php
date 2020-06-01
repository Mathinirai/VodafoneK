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
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
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
      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
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
                            <?php echo $base_url . '/' . $theme_path; ?>/assets/images/images-responsive/DXL_herobanners_contactusXL-320.jpg [(max-width: 320px)] |
                            <?php echo $base_url . '/' . $theme_path; ?>/assets/images/images-responsive/DXL_herobanners_contactusXL-640.jpg [(max-width: 640px)] |
                            <?php echo $base_url . '/' . $theme_path; ?>/assets/images/images-responsive/DXL_herobanners_contactusXL-950.jpg [(max-width: 950px)] |
                            <?php echo $base_url . '/' . $theme_path; ?>/assets/images/images-responsive/DXL_herobanners_contactusXL.jpg">
                        </div>
                        <!-- NO JS IMAGE LOADER -->
                        <noscript>
                            <div class="background__image"
                                style="background-image: url(<?php echo $base_url . '/' . $theme_path; ?>/assets/images/images-responsive/DXL_herobanners_contactusXL.jpg)">
                            </div>
                        </noscript>
                </div>
                <div class="hello__band hello__band--static">
                    <div class="hello__message">
                        <h1 class="heading heading--2 heading--regular heading--leading hello__heading">
                            <?php print $title; ?>
                        </h1>

                        <h2 class="heading heading--4 heading--light heading--leading hello__sub-message gutter--bottom">

                        </h2>

                    </div>
                </div>
            </div>
        <!-- BREADCRUMBS -->
        <?php include($theme_path.'/templates/breadcrumb.tpl.php'); ?>
        
        <div class="section section--light-gallery">
            <div class="spring">
                <h3 class="heading heading--3 heading--leading heading--center">
                    <?php echo $markup_name; ?>
                </h3>

                <div class="card card--white mb-40">

                    <div class="aspect-height aspect-height--md-auto aspect-height--1/4">
                        <a href="#" class="aspect-height__content flush--all">
                            <div class="grid">
                                <div
                                    class="grid__item aspect-height grid__item--sm-1/1 aspect-height--sm-1/2 grid__item--md-1/2 aspect-height--md-5/6 grid__item--1/2 aspect-height--1/2">
                                    <div class="background aspect-height__content">
                                        <div class="lazyload background__image "
                                            data-bgset="<?php echo $base_url . '/' . $theme_path; ?>/assets/images/images-non-responsive/adult-business-computer-2422293.jpg">
                                        </div>
                                        <noscript>
                                            <div class="background__image"
                                                style="background-image: url(../../assets/images/images-non-responsive/adult-business-computer-2422293.jpg)">
                                            </div>
                                        </noscript>
                                    </div>
                                </div>
                                <div
                                    class="grid__item aspect-height grid__item--sm-1/1 aspect-height--sm-auto grid__item--md-1/2 aspect-height--md-5/6 grid__item--1/2 aspect-height--1/2">
                                    <div class="aspect-height__content segmentation__content broadband-tiles__content broadband-tiles__content--white">
                                        <?php echo $markup_description; ?>  
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

            </div>
        </div>

        
        <div class="section section--white flush--bottom">
        <div class="spring spring--extra-250">
    
        <h3 class="heading heading--3 heading--center heading--leading">
            <?php echo $webform_title; ?>
        </h3>
        <?php print render($page['content']); ?>

                <!--        
                    <label class="form__row form__row--upload">
                        <span class="button button--upload">
                            <svg focusable="false" aria-hidden="true" class="icon icon--empty icon--small">
                                <use xlink:href="#icon-cloud-upload-hi"></use>
                            </svg>
                            Upload your files
                        </span>
                        <input type="file">
                    </label>


                    <div class="grid grid--gutter mt-20">
                        <div class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/3 grid__item--sm-1/1">
                            <div class="card card--document">
                                <div class="card__content card__content--document">
                                    <div class="grid">
                                        <div
                                            class="grid__item grid__item--gutter  grid__item--middle flush--sm-all grid__item--3/4">
                                            <p class="document-name">
                                                File name
                                            </p>
                                        </div>
                                        <div
                                            class="grid__item grid__item--gutter grid__item--middle flush--sm-all grid__item--1/4 align--right">
                                            <button type="">
                                                <svg focusable="false" aria-hidden="true"
                                                    class="icon icon--extra-small document-icon">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xlink:href="#icon-delete" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/3 grid__item--sm-1/1">
                            <div class="card card--document">
                                <div class="card__content card__content--document">
                                    <div class="grid">
                                        <div class="grid__item grid__item--gutter flush--sm-all grid__item--3/4">
                                            <p class="document-name">
                                                File name
                                            </p>
                                        </div>
                                        <div
                                            class="grid__item grid__item--gutter flush--sm-all grid__item--1/4 align--right">
                                            <button type="">
                                                <svg focusable="false" aria-hidden="true"
                                                    class="icon icon--extra-small document-icon">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xlink:href="#icon-delete" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/3 grid__item--sm-1/1">
                            <div class="card card--document">
                                <div class="card__content card__content--document">
                                    <div class="grid">
                                        <div class="grid__item grid__item--gutter flush--sm-all grid__item--3/4">
                                            <p class="document-name">
                                                File name
                                            </p>
                                        </div>
                                        <div
                                            class="grid__item grid__item--gutter flush--sm-all grid__item--1/4 align--right">
                                            <button type="">
                                                <svg focusable="false" aria-hidden="true"
                                                    class="icon icon--extra-small document-icon">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xlink:href="#icon-delete" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    -->

                    
        </div>

        </div>

        
        
        <div class="contact-form-wapper">          
            <?php// print render($page['content']); ?>
        </div>   
        
        
        <div class="section section--white">
            <div class="spring spring--extra-250">
                <div class="card card--white mt-20">
                    <div class="card__content card__content--narrow">
                        <?php echo get_label('contact_us_general_support'); ?>
                    </div>
                </div>

            </div>
        </div>
        
        </div> <!-- /.section, /#content -->

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
<style>
.webform-component.webform-component-markup.webform-component--contact--markup {
    display: none;
}
</style>