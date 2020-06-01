<footer>
    <div class="footer">
    <div class="footer__curtain">
        <div class="spring">
            <div class="footer__navigation">

                <!-- SOCIAL NETWORK TITLE -->
                <h2 class="visually-hidden">Follow us</h2>
                <div class="grid">
                        <!-- SLOGAN LINK | NAVIGATION SHORTCUTS -->
                        <div class="grid__item grid__item--middle grid__item--sm-1/1 grid__item--1/2">
                            <h4 class="heading heading--4 heading--leading">
                                Collaboration tools
                            </h4>
                            <ul class="list list--reset social__list">
                            <?php
                             $c_tools_menu = menu_tree_all_data('menu-collaboration-tools');
                             $ic = 1;
                             foreach ($c_tools_menu as $mkey => $mvalue) { 
                                if($ic == 1) { $classname = '';}
                                else { $classname = 'icon--fill';}
                                
                                if( $mvalue['link']['hidden'] == 0 ) {
                             ?>
                                <li class="social__item">
                                    <a href="<?php echo $mvalue['link']['link_path']; ?>" target= "_blank">
                                        <svg focusable="false" aria-hidden="true"
                                            class="icon  icon--medium <?php echo $classname;?>">
                                            <use xlink:href="<?php echo $mvalue['link']['options']['attributes']['title']; ?>" />
                                        </svg>
                                        <span class="visually-hidden"><?php echo $mvalue['link']['link_title']; ?></span>
                                    </a>
                                </li>
                                <?php }$ic++; } ?>
                            </ul>

                        </div>

                    <div class="grid__item grid__item--middle grid__item--sm-1/1 hide--lg hide--md gutter--top">

                    </div>

                    <!-- SLOGAN LINK | NAVIGATION SHORTCUTS -->
                    <!-- <div class="grid__item grid__item--middle grid__item--sm-1/1 grid__item--1/2 gutter--top">
                        <div class="grid grid--gutter">
                            <div
                                class="grid__item grid__item--gutter grid__item--align-right grid__item--1/1 grid__item--sm-align-center">
                                <a href="" class="social__item">
                                    <svg focusable="false" aria-hidden="true"
                                        class="icon icon--medium button__icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-world" />
                                    </svg>
                                    Button 1
                                </a>
                                <a href="" class="social__item">
                                    <svg focusable="false" aria-hidden="true"
                                        class="icon icon--medium button__icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-world" />
                                    </svg>
                                    Button 2
                                </a>
                            </div>
                        </div>
                    </div> -->

                </div>

                <!-- DESKTOP RESPONSIVE SITEMAP-->
                <h2 class="visually-hidden">Site map</h2>
                <div class="hide--sm hide--md">
                    <ul class="grid">
                    <?php
                    $user_menu = menu_tree_all_data('menu-footer-menu');
                    $parent_menu = array();
                    foreach ($user_menu as $key => $menuItem) {
                      if( $menuItem['link']['hidden'] == 0 ) {

                        $parent_menu[$menuItem['link']['mlid']]['title'] = $menuItem['link']['title'];
                        $parent_menu[$menuItem['link']['mlid']]['link_path'] = $menuItem['link']['link_path'];
                        ?>
                        <!-- GROUP 1 -->
                        <li class="grid__item grid__item--1/4">
                            <a href="/<?php echo drupal_get_path_alias($menuItem['link']['link_path']); ?>" class="heading heading--light heading--4">
                                <?php echo $menuItem['link']['title']; ?>
                            </a>
                            <ul class="list list--reset footer__list">
                                <?php
                                    if (isset($menuItem['below']) && is_array($menuItem['below']) && !empty($menuItem['below'])) {
                                        foreach ($menuItem['below'] as $menu_link => $value) {
                                            if( $value['link']['hidden'] == 0 ) {
                                            $parent_menu[$menuItem['link']['mlid']]['submenu'][$value['link']['mlid']]['title'] = $value['link']['title'];
                                            $parent_menu[$menuItem['link']['mlid']]['submenu'][$value['link']['mlid']]['link_path'] = $value['link']['link_path'];
                                            ?>
                                            <li class="list__item footer__item no-gutter--top">
                                                <a href="/<?php echo drupal_get_path_alias($value['link']['link_path']); ?>">
                                                    <?php echo $value['link']['title']; ?>
                                                </a>
                                            </li>
                                        <?php
                                            }
                                        }
                                    }
                                    ?>
                            </ul>
                        </li>
                    <?php }} ?>
                    </ul>
                </div>


                <!-- MOBILE RESPONSIVE SITEMAP -->
                <div class="hide--lg">
                    <div class="js-accordion footer-accordion" data-js="_accordion"
                        data-selectors="down=footer-accordion__chevron--down&amp;active=footer-accordion__heading--active&amp;expanded=footer-accordion__content--expanded">
                        <?php foreach ($parent_menu as $p_key => $p_value) { ?>
                        <!-- GROUP 1 -->
                        <div class="js-accordion-item footer-accordion__item">

                            <h3 class="js-accordion-heading footer-accordion__heading footer-accordion__heading--active ">
                                <span class="chevron">
                                    <span class="chevron__text">
                                        <?php echo $p_value['title']; ?>
                                    </span>
                                    <span class="chevron__container accordion__chevron">
                                        <svg focusable="false" aria-hidden="true"
                                            class="icon icon--small chevron__icon chevron__icon--white">
                                            <use xlink:href="#icon-chevron-down" />
                                        </svg>
                                    </span>
                                </span>
                            </h3>

                            <div class="js-accordion-content footer-accordion__content footer-accordion__content--collapse ">
                                <ul class="list list--reset footer__list">
                                    <?php 
                                        if(isset($p_value['submenu'])){
                                          foreach ($p_value['submenu'] as $c_key => $c_value) { ?>
                                            <li class="list__item footer__item no-gutter--top">
                                              <a href="<?php echo $c_value['link_path']; ?>">
                                                <?php echo $c_value['title']; ?>
                                              </a>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- FOOTER BOTTOM LINKS -->
                <div class="footer__aside">

                    <ul class="list list--reset no-gutter--md-bottom no-gutter--lg-bottom footer__contracts">
                        <li class="list__item footer__contract footer__contract--first">
                            <a href="http://www.vodafone.com/content/index/misc/legal-terms.html">
                                Terms & Conditions
                            </a>
                        </li>

                        <li class="list__item footer__contract">
                            <a href="http://www.vodafone.com/content/index/misc/privacy-policy.html">
                                Privacy policy
                            </a>
                        </li>
                    </ul>

                    <!-- COPYRIGHT DISCLAYMER -->
                    <span class="footer__copyright">&#xA9; 2019 Vodafone DXL</span>

                </div>
            </div>

        </div>
    </div>
    </div>
<footer>


