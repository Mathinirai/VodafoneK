<?php

/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be 'block-user'.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see template_process()
 *
 * @ingroup themeable
 */
$limit = 20;
if(isset($_GET['page'])) $limit = ($_GET['page'] + 10);
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?> 
        <div class="search">
        <header>
            <h1 class="heading heading--3 search__heading no-gutter--all">
                <?php print $block->title ?>
            </h1>
            <div class="js-component-component component__component component__component--selected"
                data-component="search-form">
                <form method="get" action="#" class="search-form js-validation js-dynamic-content-listener"
                    data-js="_validation" novalidate="novalidate">
                    <fieldset>
                        <legend class="visually-hidden">Search</legend>
                        <div class="search-form__wrapper">
                            <div class="input-group search-form__query">
                                <label>
                                    <span class="visually-hidden">
                                        Search query
                                    </span>
                                    <input type="text" id="search-name" required name="search"
                                        class="form__input input-group__input form__input input-group__input input-group__input--flush"
                                        value="" placeholder="Search">
                                    <button class="input-group__clear" type="reset">
                                        <span class="visually-hidden">
                                            Clear search query
                                        </span>
                                        <svg focusable="false" aria-hidden="true"
                                            class="icon icon--small input-group__clear-icon">
                                            <use xlink:href="#icon-close" />
                                        </svg>
                                    </button>
                                </label>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </header>
        <div class="section section--white flush--top">
            <div class="spring">
                <!-- ACCORDION -->

                <div class="js-accordion-filter accordion accordion--filter " data-js="_accordionFilter">

                    <!-- ACCORDION ITEM 1 | HEADING -->

                    <div class="js-accordion-filter-item accordion__item accordion__item--filter">

                        <div class="grid mb-30">
                            <!-- SORT (SMALL DEVICES) -->
                            <div class="grid__item grid__item--1/1 hide--lg hide--md">
                                <!-- SORT BY -->
                                <form class="actions__sort-by" method="get" action="#">
                                    <label class="form__row">
                                        <span class="form__input form__input--selectable actions__sort">
                                            <select class="form__select" name="sort">
                                                <option value="relevancy" selected>
                                                    Sort by A - Z
                                                </option>
                                                <option value="best customer review">
                                                    Sort by Z - A
                                                </option>
                                            </select>
                                            <svg focusable="false" aria-hidden="true" class="icon  icon--small  form__icon">
                                                <use xlink:href="#icon-chevron-down" />
                                            </svg>
                                        </span>

                                    </label>
                                </form>

                            </div>
                            <!-- FILTERS AREA -->
                            <div class="grid__item grid__item--sm-1/1 grid__item--md-1/2 grid__item--1/3 grid__item--middle">
                                <!-- FILTERS TOGGLE -->
                                <div class="filters__counter-toggle element-hidden">
                                    <button class="js-accordion-filter-heading accordion__heading accordion__heading--filter">
                                        <span class="caption">
                                            <span class="caption__text">
                                                <span class="filters__counter">
                                                    0
                                                </span>
                                                <span>
                                                    Filters
                                                </span>
                                            </span>
                                            <span class="caption__media accordion__chevron">
                                                <svg focusable="false" aria-hidden="true"
                                                    class="icon  icon--small  actions__icon actions__icon--chevron form__icon">
                                                    <use xlink:href="#icon-chevron-down" />
                                                </svg>
                                            </span>
                                        </span>
                                    </button>
                                    <!-- CLEAR (EXCEPT SMALL DEVICES) -->
                                    <button class="filters__clear hide--sm">
                                        Clear filters
                                    </button>
                                </div>
                            </div>
                            <!-- SHOWING (LARGE DEVICES) -->
                            <div class="grid__item grid__item--1/3 grid__item--middle hide--sm hide--md">
                                <p class="heading heading--5 heading--center heading--leading heading--trailing">
                                    Showing
                                    <strong>
                                        <?php echo $apis_listing_display_count; ?> of <?php echo $apis_listing_total_count; ?>
                                    </strong>
                                    APIs
                                </p>
                            </div>

                            <!-- SORT (EXCEPT SMALL DEVICES) -->
                            <div
                                class="grid__item grid__item--md-1/2 grid__item--1/3 grid__item--middle grid__item--align-right hide--sm element-hidden">
                                <!-- SORT BY -->
                                <form class="actions__sort-by" method="get" action="#">
                                    <label class="grid">
                                        <div class="grid__item grid__item--middle grid__item--3/5">
                                            <span class="actions__sort-label">
                                                Sort by
                                            </span>
                                        </div>
                                        <div class="grid__item grid__item--middle grid__item--2/5">
                                            <span class="form__input form__input--light form__input--selectable actions__sort">
                                                <select class="form__select" name="sort">
                                                    <option value="relevancy" selected>
                                                        A - Z
                                                    </option>
                                                    <option value="best customer review">
                                                        Z - A
                                                    </option>
                                                </select>
                                                <svg focusable="false" aria-hidden="true" class="icon  icon--small  form__icon">
                                                    <use xlink:href="#icon-chevron-down" />
                                                </svg>
                                            </span>
                                        </div>
                                    </label>
                                </form>
                            </div>


                        </div>



                        <!-- ACCORDION ITEM 1 | CONTENT -->

                        <div
                            class="js-accordion-filter-content accordion__content accordion__content--filter accordion__content--collapse ">
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

                                    <!-- FILTERS (EXCEPT SMALL DEVICES) -->
                                    <form class="hide--sm">
                                        <div class="grid__item grid__item--gutter grid__item--1/6">

                                            <label class="form__row form__row--leading">
                                                <span class="form__label">
                                                    APIs
                                                </span>
                                            </label>
                                            <label class="form__row form__row--slim">
                                                <input type="radio" class="form__radio" name="form-input-radio-1">
                                                <span class="js-form-label form__label form__label--checkable">
                                                    All APIs
                                                </span>
                                            </label>
                                            <label class="form__row form__row--slim">
                                                <input type="radio" class="form__radio" name="form-input-radio-1">
                                                <span class="js-form-label form__label form__label--checkable">
                                                    TMF
                                                </span>
                                            </label>
                                            <label class="form__row form__row--slim">
                                                <input type="radio" class="form__radio" name="form-input-radio-1">
                                                <span class="js-form-label form__label form__label--checkable">
                                                    CSM
                                                </span>
                                            </label>
                                            <label class="form__row form__row--slim">
                                                <input type="radio" class="form__radio" name="form-input-radio-1">
                                                <span class="js-form-label form__label form__label--checkable">
                                                    Composite
                                                </span>
                                            </label>
                                            <label class="form__row form__row--slim">
                                                <input type="radio" class="form__radio" name="form-input-radio-1">
                                                <span class="js-form-label form__label form__label--checkable">
                                                    Others
                                                </span>
                                            </label>

                                        </div>

                                        <div class="grid__item grid__item--gutter grid__item--3/4 ">
                                            <div class="grid">
                                                <div class="grid__item grid__item--gutter grid__item--1/3">
                                                    <label class="form__row form__row--leading">
                                                        <span class="form__label">
                                                            Markets

                                                        </span>
                                                        <span class="form__input form__input--selectable">
                                                            <select class="form__select" name="form-input-select-1" required>
                                                                <option selected>All Markets</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                            </select>
                                                            <svg focusable="false" aria-hidden="true"
                                                                class="icon  icon--small  form__icon">
                                                                <use xlink:href="#icon-chevron-down" />
                                                            </svg>
                                                        </span>
                                                    </label>

                                                </div>
                                                <div class="grid__item grid__item--gutter grid__item--1/3">

                                                    <label class="form__row form__row--leading">
                                                        <span class="form__label">
                                                            Use Cases

                                                        </span>
                                                        <span class="form__input form__input--selectable">
                                                            <select class="form__select" name="form-input-select-1" required>
                                                                <option selected>All Use Cases</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                            </select>
                                                            <svg focusable="false" aria-hidden="true"
                                                                class="icon  icon--small  form__icon">
                                                                <use xlink:href="#icon-chevron-down" />
                                                            </svg>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="grid__item grid__item--gutter grid__item--1/3">

                                                    <label class="form__row form__row--leading">
                                                        <span class="form__label">
                                                            Channels

                                                        </span>
                                                        <span class="form__input form__input--selectable">
                                                            <select class="form__select" name="form-input-select-1" required>
                                                                <option selected>All Channels</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                            </select>
                                                            <svg focusable="false" aria-hidden="true"
                                                                class="icon  icon--small  form__icon">
                                                                <use xlink:href="#icon-chevron-down" />
                                                            </svg>
                                                        </span>
                                                    </label>

                                                </div>
                                            </div>

                                        </div>

                                    </form>

                                    <!-- CLEAR FILTERS (SMALL DEVICES) -->
                                    <button class="filters__clear">
                                        Clear filters
                                    </button>

                                    <!-- FILTERS (SMALL DEVICES) -->

                                    <form class="hide--lg hide--md">
                                        <!-- ACCORDION -->

                                        <div class="js-accordion accordion " data-js="_accordion">

                                            <!-- FILTER 1 -->

                                            <div class="js-accordion-item accordion__item">
                                                <h3 class="js-accordion-heading accordion__heading">
                                                    <span class="chevron">
                                                        <span class="chevron__text">
                                                            APIs
                                                        </span>
                                                        <span class="chevron__container accordion__chevron">
                                                            <svg focusable="false" aria-hidden="true"
                                                                class="icon  icon--small  chevron__icon">
                                                                <use xlink:href="#icon-chevron-down" />
                                                            </svg>
                                                        </span>
                                                    </span>
                                                </h3>

                                                <!-- FILTER 1 | CONTENT -->

                                                <div class="js-accordion-content accordion__content accordion__content--collapse ">
                                                    Content
                                                </div>
                                            </div>

                                            <!-- FILTER 2 -->

                                            <div class="js-accordion-item accordion__item ">
                                                <h3 class="js-accordion-heading accordion__heading">
                                                    <span class="chevron">
                                                        <span class="chevron__text">
                                                            Markets
                                                        </span>
                                                        <span class="chevron__container accordion__chevron">
                                                            <svg focusable="false" aria-hidden="true"
                                                                class="icon  icon--small  chevron__icon">
                                                                <use xlink:href="#icon-chevron-down" />
                                                            </svg>
                                                        </span>
                                                    </span>
                                                </h3>

                                                <!-- FILTER 2 | CONTENT -->

                                                <div class="js-accordion-content accordion__content   accordion__content--collapse ">
                                                    Content
                                                </div>
                                            </div>

                                            <!-- FILTER 3 -->

                                            <div class="js-accordion-item accordion__item ">
                                                <h3 class="js-accordion-heading accordion__heading">
                                                    <span class="chevron">
                                                        <span class="chevron__text">
                                                            Use Cases
                                                        </span>
                                                        <span class="chevron__container accordion__chevron">
                                                            <svg focusable="false" aria-hidden="true"
                                                                class="icon  icon--small  chevron__icon">
                                                                <use xlink:href="#icon-chevron-down" />
                                                            </svg>
                                                        </span>
                                                    </span>
                                                </h3>

                                                <!-- FILTER 3 | CONTENT -->

                                                <div class="js-accordion-content accordion__content   accordion__content--collapse ">
                                                    Content
                                                </div>
                                            </div>

                                            <!-- FILTER 4 -->

                                            <div class="js-accordion-item accordion__item ">
                                                <h3 class="js-accordion-heading accordion__heading">
                                                    <span class="chevron">
                                                        <span class="chevron__text">
                                                            Channels
                                                        </span>
                                                        <span class="chevron__container accordion__chevron">
                                                            <svg focusable="false" aria-hidden="true"
                                                                class="icon  icon--small  chevron__icon">
                                                                <use xlink:href="#icon-chevron-down" />
                                                            </svg>
                                                        </span>
                                                    </span>
                                                </h3>

                                                <!-- FILTER 4 | CONTENT -->

                                                <div class="js-accordion-content accordion__content   accordion__content--collapse ">
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
                        Showing
                        <strong>
                            <?php echo $apis_listing_display_count; ?> of <?php echo $apis_listing_total_count; ?>
                        </strong>
                        Apis
                    </p>
                </div>
                <table class="table table--alt table--list hide--md hide--sm">
                    <thead class="table__head">
                        <tr class="table__tr">
                            <th class="table__th">
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
                            <th class="table__th">
                                API Correspondence
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table__body" id="product-listing-table">
                      <?php foreach ($apis_listing as $keys => $apis_listing_node) { ?>
                        <tr class="table__tr">
                            <td class="table__td">
                                <a href="/<?php echo  drupal_get_path_alias('node/'.$apis_listing_node->nid); ?>" class=""><?php echo  $apis_listing_node->node_title; ?></a>
                            </td>
                            <td class="table__td">
                                <?php 
                                    $api_croosrespondence = $api_north = $api_north_seemore = array();                                
                                    if(!empty($apis_listing_node->_field_data['nid']['entity']->field_microservices_reference)){ 
                                        $k=1;
                                        foreach ($apis_listing_node->_field_data['nid']['entity']->field_microservices_reference['und'] as $key_apis => $value_apis) {
                                            $link_node_apis = node_load($value_apis['target_id']);
                                            $i=1; 
                                            foreach($link_node_apis->field_apis_reference['und'] as $key => $values ) {
                                                $link_node = node_load($values['target_id']);
                                                if ($link_node->field_api_type['und'][0]['value'] == 'south'){
                                                   $api_croosrespondence_mobile[$apis_listing_node->nid][$link_node->nid] = $link_node->title;
                                                   $api_croosrespondence[$link_node->nid] = $link_node->title;
                                                }else{
                                                    $i--;
                                                }
                                                $i++;
                                            }
                                            $microservices_node_mobile[$apis_listing_node->nid][$link_node->nid] = $link_node->title;
                                            $api_north_mobile[$apis_listing_node->nid][$link_node->nid] = $link_node->title;
                                            if($k < 3 )$api_north[$link_node_apis->nid] = $link_node_apis->title;
                                            else $api_north_seemore[$link_node_apis->nid] = $link_node_apis->title;
                                        $k++;    
                                        }
                                    }
                                    $api_north_seemore = array_filter($api_north_seemore);
                                ?>
                                <ul>
                                    <?php foreach ($api_north as $key => $value) {?>
                                        <li>
                                            <a href="/<?php echo drupal_get_path_alias('node/'.$key); ?>"><?php echo $value; ?></a>
                                        </li>
                                    <?php } ?>
                                    <div data-js="_accordion" data-classes="active=show-more__heading--active"
                                        class=" js-accordion show-more">
                                        <div class="js-accordion-content show-more__content show-more__content--collapse ">
                                            <?php foreach ($api_north_seemore as $key => $value) {?>
                                                <li>
                                                    <a href="/<?php echo drupal_get_path_alias('node/'.$key); ?>"><?php echo $value; ?></a>
                                                </li>
                                            <?php } ?>
                                        </div>
                                        <?php if( !empty($api_north_seemore) ) {?>
                                        <button class="js-accordion-heading show-more__heading">
                                            <span class="show-more__heading-text">
                                                see
                                                <span class="show-more__heading-more">
                                                    more
                                                </span>
                                                <span class="show-more__heading-less">
                                                    less
                                                </span>
                                            </span>
                                            <span class="show-more__heading-chevron">
                                                <svg focusable="false" aria-hidden="true" class="icon  icon--extra-small  ">
                                                    <use xlink:href="#icon-chevron-down"></use>
                                                </svg>
                                            </span>
                                        </button>
                                        <?php } ?>
                                    </div>
                                </ul>
                            </td>
                            <td class="table__td">
                                <?php echo count($apis_listing_node->_field_data['nid']['entity']->field_usecase_reference['und']);?>
                            </td>
                            <td class="table__td">
                                <?php 
                                    $api_north = $api_north_seemore = array();                                
                                    if(!empty($apis_listing_node->_field_data['nid']['entity']->field_channel_reference)){ 
                                        $k=1;
                                        foreach ($apis_listing_node->_field_data['nid']['entity']->field_channel_reference['und'] as $key_apis => $value_apis) {
                                            $link_node = node_load($value_apis['target_id']);
                                            $channel_node_mobile[$apis_listing_node->nid][$link_node->nid] = $link_node->title;
                                            if($k < 3 ) $api_north[$link_node->nid] = $link_node->title;
                                            else $api_north_seemore[$link_node->nid] = $link_node->title;
                                            $k++;
                                        }
                                    }
                                    $api_north_seemore = array_filter($api_north_seemore);
                                ?>
                                <ul>
                                    <?php foreach ($api_north as $key => $value) {?>
                                        <li>
                                            <a href="/<?php echo drupal_get_path_alias('node/'.$key); ?>"><?php echo $value; ?></a>
                                        </li>
                                    <?php } ?>
                                    <div data-js="_accordion" data-classes="active=show-more__heading--active"
                                        class=" js-accordion show-more">
                                        <div class="js-accordion-content show-more__content show-more__content--collapse ">
                                            <?php foreach ($api_north_seemore as $key => $value) {?>
                                                <li>
                                                    <a href="/<?php echo drupal_get_path_alias('node/'.$key); ?>"><?php echo $value; ?></a>
                                                </li>
                                            <?php } ?>
                                        </div>
                                        <?php if( !empty($api_north_seemore) ) {?>
                                        <button class="js-accordion-heading show-more__heading">
                                            <span class="show-more__heading-text">
                                                see
                                                <span class="show-more__heading-more">
                                                    more
                                                </span>
                                                <span class="show-more__heading-less">
                                                    less
                                                </span>
                                            </span>
                                            <span class="show-more__heading-chevron">
                                                <svg focusable="false" aria-hidden="true" class="icon  icon--extra-small  ">
                                                    <use xlink:href="#icon-chevron-down"></use>
                                                </svg>
                                            </span>
                                        </button>
                                        <?php } ?>
                                    </div>
                                </ul>
                            </td>
                            <td class="table__td">
                                <?php echo count($apis_listing_node->field_field_markets); ?>
                            </td>
                            <td class="table__td">
                                <?php 
                                $h = 1;
                                $api_croosrespondence_new =array();
                                foreach ($api_croosrespondence as $keys_api => $croosrespondence) {
                                    if($h < 3) $api_croosrespondence_new['normal'][$keys_api] = $croosrespondence;
                                    else $api_croosrespondence_new['seemore'][$keys_api] = $croosrespondence;
                                    $h++;
                                }
                                ?>
                                    <ul>
                                    <?php if(!empty($api_croosrespondence_new['normal'])) { foreach ($api_croosrespondence_new['normal'] as $key => $value) {?>
                                        <li>
                                            <a href="/<?php echo drupal_get_path_alias('node/'.$key); ?>"><?php echo $value; ?></a>
                                        </li>
                                    <?php }} ?>
                                    <div data-js="_accordion" data-classes="active=show-more__heading--active"
                                        class=" js-accordion show-more">
                                        <div class="js-accordion-content show-more__content show-more__content--collapse ">
                                            <?php if(!empty($api_croosrespondence_new['seemore'])) { foreach ($api_croosrespondence_new['seemore'] as $key => $value) {?>
                                                <li>
                                                    <a href="/<?php echo drupal_get_path_alias('node/'.$key); ?>"><?php echo $value; ?></a>
                                                </li>
                                            <?php }} ?>
                                        </div>
                                        <?php if( !empty($api_croosrespondence_new['seemore']) ) {?>
                                        <button class="js-accordion-heading show-more__heading">
                                            <span class="show-more__heading-text">
                                                see
                                                <span class="show-more__heading-more">
                                                    more
                                                </span>
                                                <span class="show-more__heading-less">
                                                    less
                                                </span>
                                            </span>
                                            <span class="show-more__heading-chevron">
                                                <svg focusable="false" aria-hidden="true" class="icon  icon--extra-small  ">
                                                    <use xlink:href="#icon-chevron-down"></use>
                                                </svg>
                                            </span>
                                        </button>
                                        <?php } ?>
                                    </div>
                                </ul>
                            </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
                <div class="no-result-text align--center element-hidden">There are no results to display</div>
                <div class="js-accordion accordion accordion--spaced hide--lg align--left" data-js="_accordion">

                        <!-- ACCORDION ITEM 1 | HEADING -->
                        <?php foreach ($apis_listing as $apis_listing_node_m) { ?>
                        <div class="js-accordion-item accordion__item">
                            <h3 class="js-accordion-heading accordion__heading">
                                <span class="chevron">
                                    <span class="chevron__text">
                                        <?php echo  $apis_listing_node_m->node_title; ?>
                                    </span>
                                    <span class="chevron__container accordion__chevron">
                                        <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon">
                                            <use xlink:href="#icon-chevron-down" />
                                        </svg>
                                    </span>
                                </span>
                            </h3>

                            <!-- ACCORDION ITEM 1 | CONTENT -->

                            <div class="js-accordion-content accordion__content accordion__content--wide accordion__content--collapse ">
                                <?php if(!empty($microservices_node_mobile[$apis_listing_node_m->nid])){ ?>
                                <!-- SUBGROUP 1 -->
                                <div class="accordion__content--subgroup">
                                    <!-- SUBGROUP TITLE -->
                                    <p class="accordion__content--header">
                                        Microservice
                                    </p>
                                    <!-- LINK TILE -->
                                    <?php foreach ($microservices_node_mobile[$apis_listing_node_m->nid] as $key_mobile => $value_mobile) {?>                                    
                                    <a href="/<?php echo drupal_get_path_alias('node/'.$key_mobile); ?>" class="link link--tile link--tile--accordion">
                                        <span class="chevron">
                                            <span class="chevron__text">
                                                <span class="media media--middle">
                                                    <span class="media__body">
                                                        <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                            <?php echo $value_mobile;?>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="chevron__container">
                                                <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon">
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
                                                        <span
                                                            class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                            <?php echo count($apis_listing_node_m->_field_data['nid']['entity']->field_usecase_reference['und']);?>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="chevron__container">
                                                <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon">
                                                    <use xlink:href="#icon-chevron-right"></use>
                                                </svg>
                                            </span>
                                        </span>
                                    </a>
                                </div>

                                <!-- SUBGROUP 3 -->
                                <?php if(!empty($channel_node_mobile[$apis_listing_node_m->nid])){ ?>
                                <div class="accordion__content--subgroup">
                                    <!-- SUBGROUP TITLE -->
                                    <p class="accordion__content--header">
                                        Channels
                                    </p>
                                    <!-- LINK TILE -->
                                    <?php foreach ($channel_node_mobile[$apis_listing_node_m->nid] as $key_mobile => $value_mobile) {?>                                    
                                    <a href="/<?php echo drupal_get_path_alias('node/'.$key_mobile); ?>" class="link link--tile link--tile--accordion">
                                        <span class="chevron">
                                            <span class="chevron__text">
                                                <span class="media media--middle">
                                                    <span class="media__body">
                                                        <span class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                            <?php echo $value_mobile;?>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="chevron__container">
                                                <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon">
                                                    <use xlink:href="#icon-chevron-right"></use>
                                                </svg>
                                            </span>
                                        </span>
                                    </a>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                                <!-- SUBGROUP 4 -->
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
                                                        <span
                                                            class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                            <?php echo count($apis_listing_node_m->field_field_markets);?>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="chevron__container">
                                                <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon">
                                                    <use xlink:href="#icon-chevron-right"></use>
                                                </svg>
                                            </span>
                                        </span>
                                    </a>
                                </div>

                                <!-- SUBGROUP 5 -->
                                <?php if(!empty($api_croosrespondence_mobile[$apis_listing_node_m->nid])){ ?>
                                <div class="accordion__content--subgroup">
                                    <!-- SUBGROUP TITLE -->
                                    <p class="accordion__content--header">
                                        API Correspondence
                                    </p>
                                   <!-- LINK TILE -->
                                    <?php foreach ($api_croosrespondence_mobile[$apis_listing_node_m->nid] as $key_mobile => $value_mobile) {?>
                                    <a href="/<?php echo drupal_get_path_alias('node/'.$key_mobile); ?>" class="link link--tile link--tile--accordion ">
                                        <span class="chevron">
                                            <span class="chevron__text">
                                                <span class="media media--middle">
                                                    <span class="media__body">
                                                        <span
                                                            class="link__heading heading heading--light heading--5 no-gutter--all ">
                                                            <?php echo $value_mobile; ?>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="chevron__container">
                                                <svg focusable="false" aria-hidden="true" class="icon  icon--small  chevron__icon">
                                                    <use xlink:href="#icon-chevron-right"></use>
                                                </svg>
                                            </span>
                                        </span>
                                    </a>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                <?php if($apis_listing_display_count >= 10 ) { ?>
                <div class="align--center">
                    <a href="/apis?page=<?php echo $limit; ?>" class="button button--primary mt-40">
                        Load more
                    </a>
                </div>
                <?php } elseif($apis_listing_display_count == 0) { ?>
                <div class="align--center">
                    <strong>There are no results to display</strong>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

</div>
</div>