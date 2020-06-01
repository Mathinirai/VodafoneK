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
//if(isset($_GET['page'])) $limit = ($_GET['page'] + 10);
$no_of_days = variable_get('market_dashboard_days', '');
$api_responce = get_market_dashboard($no_of_days);
$limit = count($api_responce);
$status_array = array(0 => 'Failed', 1 => 'Warning' ,2 => 'Passed');
$status_color = array(0 => 'red', 1 => 'gray' ,2 => 'green');

$body = field_get_items('node',$node, 'body');
$description = field_get_items('node',$node, 'field_description');
?>


<div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu' : 'without-secondary-menu'; ?>"><div class="section clearfix">
        <?php include($theme_path . '/templates/header.tpl.php'); ?>
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
    <?php include($theme_path . '/templates/breadcrumb.tpl.php'); ?>  
    <?php print $body[0]['value']; ?>  
    <div class="section section--light-gallery flush--bottom">
        <div data-js="_simpleTabs" data-classes="active=circle-tabs__tab--active"
             class="js-tabs circle-tabs circle-tabs--dark">
            <!-- TABS AREA -->
            <div class="circle-tabs__navigation-wrapper">
                <!-- TAB NAVIGATION -->
                <nav class="js-tabs-navigation circle-tabs__navigation circle-tabs__navigation--gutter">
                    <!-- TAB 1 -->
                    <a href="#tab-1" class="js-tabs-tab circle-tabs__tab circle-tabs__tab--active">
                        <div class="circle-tabs__tab-circle  ">
                            <svg focusable="false" aria-hidden="true" class="icon  icon--small  circle-tabs__icon">
                            <use xlink:href="#icon-dashboard" />
                            </svg>
                        </div>
                        <!-- TAB LABEL -->
                        <div class="circle-tabs__tab-label" style="margin-left: -30px;">
                            Static Check Results  
                        </div>
                    </a>
                    <!-- TAB 2 -->
                    <a href="#tab-2" class="js-tabs-tab circle-tabs__tab">
                        <div class="circle-tabs__tab-circle  ">
                            <svg focusable="false" aria-hidden="true" class="icon  icon--small  circle-tabs__icon">
                            <use xlink:href="#icon-diagram-up" />
                            </svg>
                        </div>
                        <!-- TAB LABEL -->
                        <div class="circle-tabs__tab-label ">
                            API Summary  
                        </div>
                    </a>
                    <!-- TAB 2 -->
                </nav>
            </div>
            <!-- TABS CONTENT AREA -->

            <!-- TAB 1 | CONTENT -->
            <div id="tab-1" class="js-tabs-content circle-tabs__content circle-tabs__content--dark">
                <div class="spring">
                    <p class="heading heading--5 heading--center">Static Check Results</p>
                    <div class="section section--white flush--top">
                        <div class="spring">
                            <!-- ACCORDION -->
                            <div class="js-accordion-filter accordion accordion--filter " data-js="_accordionFilter">
                                <!-- ACCORDION ITEM 1 | HEADING -->
                                <div class="js-accordion-filter-item accordion__item accordion__item--filter">
                                    <div class="grid mb-30">
                                        <!-- FILTERS AREA -->
                                        <div class="grid__item grid__item--sm-1/1 grid__item--md-1/2 grid__item--1/3 grid__item--middle">
                                            <!-- FILTERS TOGGLE -->
                                            <div class="filters__counter-toggle">
                                                <button class="js-accordion-filter-heading accordion__heading accordion__heading--filter" aria-expanded="false" aria-selected="false" tabindex="0" role="tab">
                                                    <span class="caption">
                                                        <span class="caption__text">
                                                            <span id="filter-count" class="filters__counter">
                                                                0
                                                            </span>
                                                            <span>
                                                                Filters
                                                            </span>
                                                        </span>
                                                        <span class="caption__media accordion__chevron">
                                                            <svg focusable="false" aria-hidden="true" class="icon  icon--small  actions__icon actions__icon--chevron form__icon">
                                                                <use xlink:href="#icon-chevron-down"></use>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                </button>
                                                <!-- CLEAR (EXCEPT SMALL DEVICES) -->
                                                <button id="clear_filter" class="filters__clear hide--sm">
                                                    Clear filters
                                                </button>
                                            </div>
                                        </div>
                                        <!-- SHOWING (LARGE DEVICES) -->
                                        <div class="grid__item grid__item--1/3 grid__item--middle hide--sm hide--md">
                                            <p class="heading heading--5 heading--center heading--leading heading--trailing">
                                                Showing Last <strong><?php if( $no_of_days == 1 ) {echo $no_of_days.' Day';} else { echo $no_of_days.' Days';}?></strong> Results
                                            </p>
                                        </div>
                                    </div>
                                    <!-- ACCORDION ITEM 1 | CONTENT -->

                                    <div class="js-accordion-filter-content accordion__content accordion__content--filter accordion__content--collapse ">
                                        <div class="grid">
                                            <div class="grid__item grid__item--gutter grid__item--1/1">
                                                <button type="button" class="js-accordion-filter-close accordion-filter-close-button">
                                                    <svg focusable="false" aria-hidden="true" class="icon  icon--small  filter__close-icon">
                                                        <use xlink:href="#icon-close"></use>
                                                    </svg>
                                                    <span class="visually-hidden">
                                                        Close
                                                    </span>
                                                </button>
                                            </div>

                                            <div class="grid__item grid__item--1/1">

                                                <?php 
                                                    $markets_filter = array();
                                                    $api_names_filter = array();
                                                    foreach ($api_responce as $api_responce_value_filter) {
                                                      if(isset($api_responce_value_filter['_source']['market']) && isset($api_responce_value_filter['_source']['apiName']))   {
                                                        $markets_filter[$api_responce_value_filter['_source']['market']] = $api_responce_value_filter['_source']['market'];
                                                        $api_names_filter[$api_responce_value_filter['_source']['apiName']] = $api_responce_value_filter['_source']['apiName'];
                                                      } 
                                                    }
                                                    sort($markets_filter);
                                                    sort($api_names_filter);
                                                ?>

                                                <!-- FILTERS (EXCEPT SMALL DEVICES) -->
                                                <form class="hide--sm">

                                                    <div class="grid__item grid__item--gutter grid__item--3/4 ">
                                                        <div class="grid">
                                                            <div class="grid__item grid__item--gutter grid__item--1/3">

                                                                <label class="form__row form__row--leading">
                                                                    <span class="form__label">
                                                                        Markets

                                                                    </span>
                                                                    <span class="form__input form__input--selectable">
                                                                        <select class="form__select" id="market-dashboard-market" name="form-input-market" required="">
                                                                            <option selected="">All Markets</option>
                                                                            <?php foreach($markets_filter as $market_name ) { ?>
                                                                                <option><?php echo $market_name; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <svg focusable="false" aria-hidden="true" class="icon  icon--small  form__icon">
                                                                            <use xlink:href="#icon-chevron-down"></use>
                                                                        </svg>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="grid__item grid__item--gutter grid__item--1/3">
                                                                <label class="form__row form__row--leading">
                                                                    <span class="form__label">
                                                                      APIs  

                                                                    </span>
                                                                    <span class="form__input form__input--selectable">
                                                                        <select class="form__select" id="market-dashboard-apis" name="form-input-apis" required="">
                                                                            <option selected="">All APIs</option>
                                                                            <?php foreach($api_names_filter as $api_name ) { ?>
                                                                                <option><?php echo $api_name; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <svg focusable="false" aria-hidden="true" class="icon  icon--small  form__icon">
                                                                            <use xlink:href="#icon-chevron-down"></use>
                                                                        </svg>
                                                                    </span>
                                                                </label>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </form>

                                                <!-- CLEAR FILTERS (SMALL DEVICES) -->
                                                <button class="filters__clear hide--lg hide--md">
                                                    Clear filters
                                                </button>
                                                <!-- FILTERS (SMALL DEVICES) -->
                                                <form class="hide--lg hide--md">
                                                    <!-- ACCORDION -->
                                                    <div class="js-accordion accordion " data-js="_accordion">
                                                        <!-- FILTER 1 -->
                                                        <div class="js-accordion-item accordion__item">
                                                            <h3 class="js-accordion-heading accordion__heading" aria-expanded="false" aria-selected="false" tabindex="0" role="tab">
                                                                <span class="chevron">
                                                                    <span class="chevron__text">
                                                                        APIs
                                                                    </span>
                                                                    <span class="chevron__container accordion__chevron">
                                                                        <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon">
                                                                            <use xlink:href="#icon-chevron-down"></use>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                            </h3>
                                                            <!-- FILTER 1 | CONTENT -->
                                                            <div class="js-accordion-content accordion__content" style="display: none;">
                                                                Content
                                                            </div>
                                                        </div>

                                                        <!-- FILTER 2 -->

                                                        <div class="js-accordion-item accordion__item ">
                                                            <h3 class="js-accordion-heading accordion__heading" aria-expanded="false" aria-selected="false" tabindex="0" role="tab">
                                                                <span class="chevron">
                                                                    <span class="chevron__text">
                                                                        Markets
                                                                    </span>
                                                                    <span class="chevron__container accordion__chevron">
                                                                        <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon">
                                                                            <use xlink:href="#icon-chevron-down"></use>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                            </h3>

                                                            <!-- FILTER 2 | CONTENT -->

                                                            <div class="js-accordion-content accordion__content" style="display: none;">
                                                                Content
                                                            </div>
                                                        </div>

                                                        <!-- FILTER 3 -->

                                                        <div class="js-accordion-item accordion__item ">
                                                            <h3 class="js-accordion-heading accordion__heading" aria-expanded="false" aria-selected="false" tabindex="0" role="tab">
                                                                <span class="chevron">
                                                                    <span class="chevron__text">
                                                                        Use Cases
                                                                    </span>
                                                                    <span class="chevron__container accordion__chevron">
                                                                        <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon">
                                                                            <use xlink:href="#icon-chevron-down"></use>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                            </h3>

                                                            <!-- FILTER 3 | CONTENT -->

                                                            <div class="js-accordion-content accordion__content" style="display: none;">
                                                                Content
                                                            </div>
                                                        </div>

                                                        <!-- FILTER 4 -->

                                                        <div class="js-accordion-item accordion__item ">
                                                            <h3 class="js-accordion-heading accordion__heading" aria-expanded="false" aria-selected="false" tabindex="0" role="tab">
                                                                <span class="chevron">
                                                                    <span class="chevron__text">
                                                                        Channels
                                                                    </span>
                                                                    <span class="chevron__container accordion__chevron">
                                                                        <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon">
                                                                            <use xlink:href="#icon-chevron-down"></use>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                            </h3>

                                                            <!-- FILTER 4 | CONTENT -->

                                                            <div class="js-accordion-content accordion__content" style="display: none;">
                                                                Content
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
				<!-- SHOWING (EXCEPT SMALL DEVICES -->
                                <p class="heading heading--5 heading--center heading--trailing hide--lg hide--md">
                                   Showing Last <strong><?php if( $no_of_days == 1 ) {echo $no_of_days.' Day';} else { echo $no_of_days.' Days';}?></strong> Results
                                </p>
                            </div>                             
                            
                            <?php if(!empty($api_responce)) { ?>
                            <table id="market-dashboard-table" class="table table--alt table--list hide--md hide--sm">
                                <thead class="table__head">
                                    <tr class="table__tr">
                                        <th class="table__th">
                                            Markets
                                        </th>
                                        <th class="table__th">
                                            API
                                        </th>
                                        <th class="table__th">
                                            Timestamp
                                        </th>
                                        <th class="table__th">
                                            Compliance
                                        </th>
                                        <th class="table__th">
                                           Status 
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table__body">
                                    <?php 
                                    $markets = array();
                                    $api_names = array();
                                    foreach ($api_responce as $api_responce_value) {
                                      if(isset($api_responce_value['_source']['market']) && isset($api_responce_value['_source']['apiName']))   {
                                        $markets[] = $api_responce_value['_source']['market'];
                                        $api_names[$api_responce_value['_source']['market']][$api_responce_value['_source']['apiName']] = $api_responce_value['_source']['apiName'];
                                        ?>
                                        <tr class="table__tr">
                                           <td class="table__td">
                                               <?php echo $api_responce_value['_source']['market']?>
                                           </td>
                                           <td class="table__td">
                                               <a href="">
                                                   <?php echo $api_responce_value['_source']['apiName']?>
                                               </a>
                                           </td>
                                           <td class="table__td">
                                               <?php echo date('Y-m-d h:i:s',strtotime($api_responce_value['_source']['Timestamp']))?>
                                           </td>
                                           <td class="table__td">
                                               <font color="<?php echo $status_color[$api_responce_value['_source']['compliance']]?>"><?php echo $status_array[$api_responce_value['_source']['compliance']]?></font>
                                           </td>
                                           <td class="table__td">
                                               <?php echo wordwrap($api_responce_value['_source']['statusMessage'], 75, "<br>\n",TRUE)?>
                                           </td>
                                        </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                            <div class="no-result-text-inner align--center element-hidden mt-40">There are no results to display</div>

                            <?php } else { ?>
                            <div class="no-result-text align--center mt-40">There are no results to display</div>
                            <?php } ?>
                            <div class="align--center element-hidden">
                                <a href="/market-dashboard?page=<?php echo $limit; ?>" class="button button--primary mt-40">
                                  Load more
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- TAB 2 | CONTENT -->
            <div id="tab-2" class="js-tabs-content circle-tabs__content circle-tabs__content--dark">
                <div class="spring">
                    <p class="heading heading--5 heading--center">API Summary</p>
                    <div class="section section--white flush--top">
                        <div class="spring">
                            <!-- ACCORDION -->
                            <div class="js-accordion-filter accordion accordion--filter " data-js="_accordionFilter">
                                <!-- ACCORDION ITEM 1 | HEADING -->
                                <div class="js-accordion-filter-item accordion__item accordion__item--filter">
                                    <div class="grid mb-30">
                                        <!-- SHOWING (LARGE DEVICES) -->
                                        <div class="grid__item--middle hide--sm hide--md">
                                            <p class="heading heading--5 heading--center heading--leading heading--trailing">
                                                Showing Last <?php if( $no_of_days == 1 ) {echo $no_of_days.' Day';} else { echo $no_of_days.' Days';}?> Results
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table--alt table--list hide--md hide--sm">
                                <thead class="table__head">
                                    <tr class="table__tr">
                                        <th class="table__th">
                                            Markets
                                        </th>
                                        <th class="table__th">
                                            Total no. of APIs
                                        </th>
                                        <th class="table__th">
                                            Total no. of Status Checks
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table__body">
                                    <?php
                                    $markets_count = array_count_values($markets);
                                    $markets_unique = array_unique($markets);                                    
                                    foreach ($markets_unique as $market) {
                                        ?>
                                        <tr class="table__tr">
                                           <td class="table__td">
                                               <?php echo $market;?>
                                           </td>
                                           <td class="table__td">
                                               <?php echo count($api_names[$market]);?>
                                           </td>
                                           <td class="table__td">
                                               <?php echo $markets_count[$market];?>
                                           </td>
                                        </tr>
                                      <?php  } ?>
                                </tbody>
                            </table>
                            <div class="align--center element-hidden">
                                <a href="/market-dashboard?page=<?php echo $limit; ?>" class="button button--primary mt-40">
                                  Load more
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
          </div>
        </div>
    </div>

    <?php print $description[0]['value']; ?> 
</div>  
<?php print $feed_icons; ?>

<?php if ($page['sidebar_second']): ?>
    <div id="sidebar-second" class="column sidebar"><div class="section">
            <?php print render($page['sidebar_second']); ?>
        </div></div> <!-- /.section, /#sidebar-second -->
<?php endif; ?>


<div id="footer-wrapper"><div class="section">
        <?php include($theme_path . '/templates/footer.tpl.php'); ?>
        <?php if ($page['footer']): ?>
            <div id="footer" class="clearfix">   
                <?php print render($page['footer']); ?>
            </div> <!-- /#footer -->
        <?php endif; ?>

    </div></div> <!-- /.section, /#footer-wrapper -->

