<?php global $base_url; ?>
<div class="js-component-component component__component" data-component="header">
    <nav class="header" data-js="_language">

        <!-- HEADER DESKTOP TOP NAVIGATION -->
        <?php if (!user_is_anonymous()) : ?>
            <div class="js-navigation-language navigation">
                <div class="spring">
                    <ul class="navigation__list navigation__global navigation__hide no-gutter--all">
                        <li class="navigation__spring">

                            <!-- LANGUAGE NAVIGATION | DESKTOP -->
                            <ul class="navigation__list navigation__global navigation__hide no-gutter--all">
                                <li class="navigation__spring">

                                    <!-- MAIN BRAND AREAS -->
                                    <!-- <ul class="js-navigation navigation navigation__list navigation__global--type">
                                            <li class="js-navigation-item navigation__item hide--sm hide--md hide--hd">
                                                <a href="#" class="js-navigation-link navigation__link navigation__link--slim navigation__site navigation__site--active">
                                                    Area_1
                                                </a>
                                            </li>
                                            <li class="js-navigation-item navigation__item hide--sm hide--md hide--hd">
                                                <a href="#" class="js-navigation-link navigation__link navigation__link--slim navigation__site">
                                                    Area_2
                                                </a>
                                            </li>
                                        </ul> -->

                                    <!-- NAVIGATION | DESKTOP -->
                                    <ul class="js-navigation navigation navigation__list navigation__global--language">
                                        <li
                                            class="js-navigation-item navigation__item navigation__item--right hide--sm hide--md hide--hd">
                                            <!-- LOGOUT BUTTON | DESKTOP  -->
                                            <a href="/user/logout" class="navigation__link navigation__link--slim navigation__site">
                                                <span class="visually-hidden">logout</span>
                                                <span class="language__chosen">
                                                    Logout
                                                </span>
                                                <svg focusable="false" aria-hidden="true"
                                                     class="icon  icon--small  language__icon ">
                                                <use xlink:href="#icon-log-out" />
                                                </svg>
                                            </a>

                                        </li>
                                    </ul>

                                </li>
                            </ul>

                        </li>
                    </ul>
                </div>
            </div>
        <?php endif; ?> 

        <!-- HEADER MAIN MENU -->
        <div class="js-navigation-static navigation-static">&#xA0;</div>
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

                    <?php
                    $user_menu = menu_tree_all_data('user-menu');
                    $parent_menu = array();
                    foreach ($user_menu as $key => $menuItem) {
                        if( $menuItem['link']['hidden'] == 0 ) {
                        
                        $parent_menu[$menuItem['link']['mlid']]['title'] = $menuItem['link']['title'];
                        $parent_menu[$menuItem['link']['mlid']]['link_path'] = $menuItem['link']['link_path'];
                        ?>  
                        <!-- MAIN MENU | SECTION 1 -->
                        <li class="js-navigation-item navigation__item hide--sm hide--md">
                            <a href="/<?php echo drupal_get_path_alias($menuItem['link']['link_path']); ?>" class="js-navigation-link navigation__link navigation__link--main">
                            <?php echo $menuItem['link']['title']; ?>
                                <span class="visually-hidden">menu</span>
                            </a>
                            <div class="js-navigation navigation navigation--secondary">
                                <div class="navigation__spring navigation__spring--primary">
                                    <ul class="navigation__list navigation__content navigation__content--secondary">

                                        <?php
                                        if (isset($menuItem['below']) && is_array($menuItem['below']) && !empty($menuItem['below'])) {
                                            foreach ($menuItem['below'] as $menu_link => $value) {
                                                if( $value['link']['hidden'] == 0 ) {
                                                $parent_menu[$menuItem['link']['mlid']]['submenu'][$value['link']['mlid']]['title'] = $value['link']['title'];
                                                $parent_menu[$menuItem['link']['mlid']]['submenu'][$value['link']['mlid']]['link_path'] = $value['link']['link_path'];
                                                ?>
                                                <li class="js-navigation-item navigation__item  navigation__item--parent ">
                                                    <a href="/<?php echo drupal_get_path_alias( $value['link']['link_path']); ?>"
                                                       class="js-navigation-link js-sub-navigation-link navigation__link navigation__link--main-secondary"
                                                       aria-haspopup="true">
                                                        <?php echo $value['link']['title']; ?>
                                                        <span class="visually-hidden">menu item</span>
                                                    </a>
                                                </li>

                                            <?php
                                                }
                                            }
                                        }
                                        ?>

                                    </ul>
                                </div>
                            </div>
                        </li>                           
                    <?php }} ?>

                    <!-- MOBILE RESPONSIVE NAV -->
                    <li
                        class="js-navigation-item navigation__item navigation__item--right navigation__hide js-navigation-item-clickable navigation__item--clickable hide--tv">

                        <!-- MOBILE NAVIGATION BUTTON - HAMBURGER / CLOSE -->
                        <a href="#"
                           class="js-navigation-link navigation__link navigation__link--icon navigation__link--icon-last navigation__link--menu">
                            <span class="visually-hidden"><span
                                    class="navigation__accessibility">Close</span>Menu</span>
                            <svg focusable="false" aria-hidden="true"
                                 class="icon  icon--small  navigation__icon js-navigation-toggle navigation__toggle">
                            <use xlink:href="#icon-menu" />
                            </svg>
                            <svg focusable="false" aria-hidden="true"
                                 class="icon  icon--small  navigation__icon js-navigation-close navigation__close">
                            <use xlink:href="#icon-close" />
                            </svg>
                        </a>

                        <div class="js-navigation navigation navigation--tertiary">

                            <!-- MOBILE NAVIGATION -->
                            <ul class="js-accordion accordion navigation__accordion" data-js="_accordion">

                                <!-- MAIN MENU | OPTION 1 -->
                                <?php foreach ($parent_menu as $p_key => $p_value) { ?>
                                <li class="js-navigation-item navigation__item navigation__item--tertiary hide--tv">
                                    <a href="/<?php echo drupal_get_path_alias($p_value['link_path']); ?>"
                                       class="js-accordion-heading js-navigation-link navigation__link chevron chevron--inline">
                                        <span class="chevron__text">
                                            <?php echo $p_value['title']; ?>
                                        </span>
                                        <span class="chevron__container chevron__container--float">
                                            <svg focusable="false" aria-hidden="true"
                                                 class="icon  icon--small  chevron__icon accordion__chevron navigation__chevron">
                                            <use xlink:href="#icon-chevron-down" />
                                            </svg>
                                        </span>
                                    </a>

                                    <div class="js-accordion-content accordion__content--collapse">
                                        <ul class="js-navigation navigation__list">

                                            <!-- OPTION 1.1 -->
                                            <?php 
                                              if(isset($p_value['submenu'])){
                                                  foreach ($p_value['submenu'] as $c_key => $c_value) { ?>
                                            
                                                    <li class="js-navigation-item navigation__item navigation__item--nested">
                                                        <p
                                                            class="js-accordion-heading js-navigation-link navigation__link chevron chevron--inline">
                                                            <span class="chevron__text">
                                                                <?php echo $c_value['title']; ?>
                                                            </span>
                                                            <span class="chevron__container chevron__container--float">
                                                                <svg focusable="false" aria-hidden="true"
                                                                     class="icon  icon--small  chevron__icon accordion__chevron navigation__chevron">
                                                                <use xlink:href="#icon-chevron-down" />
                                                                </svg>
                                                            </span>
                                                        </p>
                                                    </li>          
                                                  <?php } ?>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>

                    </li>

                    <!-- DESKTOP & MOBILE ICONS and LOGIN NAV -->


                    <!-- PORTAL SEARCH ICON -->
                    <li class="js-navigation-item navigation__item navigation__item--right navigation__hide">
                        <a href="/search" class="js-navigation-link navigation__link navigation__link--icon">
                            <span class="visually-hidden">
                                Search
                            </span>
                            <svg focusable="false" aria-hidden="true" class="icon  icon--small  navigation__icon">
                                <use xlink:href="#icon-search" />
                            </svg>
                        </a>
                    </li>
                </ul>

            </div>
        </div>

    </nav>
</div>
