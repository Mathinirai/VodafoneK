
<?php global $base_url; ?>
<div id="page-wrapper"><div id="page">
  <div class="login-block" data-js="_show-password">
  <div class="background background--cover">
        <div class="background__image lazyload" data-bgset="
             <?php echo $base_url . '/' . $theme_path; ?>/assets/images/images-responsive/background-login-man-jumping-in-the-air-320.jpg [(max-width: 320px)] |
             <?php echo $base_url . '/' . $theme_path; ?>/assets/images/images-responsive/background-login-man-jumping-in-the-air-640.jpg [(max-width: 640px)] |
             <?php echo $base_url . '/' . $theme_path; ?>/assets/images/images-responsive/background-login-man-jumping-in-the-air-950.jpg [(max-width: 950px)] |
             <?php echo $base_url . '/' . $theme_path; ?>/assets/images/images-responsive/background-login-man-jumping-in-the-air.jpg">
        </div>
        <noscript>
            <div class="background__image"
                style="background-image: url(<?php echo $base_url . '/' . $theme_path; ?>/assets/images/images-responsive/background-login-man-jumping-in-the-air.jpg)"></div>
        </noscript>
  </div>
  <div class="login-block__wrapper">
        <div class="login-block__inner">
            <?php if ($messages): ?>
            <div class="alert alert--light alert--warning validation__warning">
                <!-- ALERT CONTENT -->
                <div class="caption">
                    <!-- ALERT ICON -->
                    <div class="caption__media caption__media--top alert__media">
                        <svg focusable="false" aria-hidden="true" class="icon  icon--small  alert__icon">
                        <use xlink:href="#icon-block"></use>
                        </svg>
                    </div>
                    <!-- ALERT TEXT -->
                    <div class="caption__text caption__text--top alert__text">
                        <p class="no-gutter--top">
                            <strong class="validation__details js-validation-details">
                                Whoops!
                            </strong>
                        </p>
                        <?php print str_replace('Error message','',strip_tags($messages)); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php print render($page['content']); ?>
        </div>
    </div>  
</div>
</div>
</div>
