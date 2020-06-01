<?php global $base_url; ?>
<div id="page-wrapper"><div id="page">
    <!--new login-->    
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
            <!-- LOGO -->
            <div class="logo-wrapper align--center">
                <svg focusable="false" class="icon icon--extra-large ">
                    <use xlink:href="#icon-vodafone-logo-inverted" />
                </svg>
                <h1 class="heading heading--3 heading--center my-10">
                    <span class="heading--bold">vodafone</span> DXL
                </h1>
            </div>
            
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
                        <p class="no-gutter--top">
                            <strong class="validation__details js-validation-details">
                                Bad login
                            </strong>
                        </p>
                        <?php print str_replace('Error message','',strip_tags($messages)); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php print render($page['content']); ?>
             <div class="grid grid--gutter">
                <div class="grid__item grid__item--gutter grid__item--1/2">
                    <a href="#" class="link link--body mt-20 element-hidden">
                        Forgot password?
                    </a>
                </div>
                <div class="grid__item grid__item--gutter grid__item--align-right grid__item--1/2 element-hidden">
                    <a href="#" class="link link--body mt-20">
                        Reset password
                    </a>
                </div>
            </div>
        </div>
    </div> 
</div>