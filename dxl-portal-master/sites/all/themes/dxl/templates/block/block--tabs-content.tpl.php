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
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

<?php print render($title_prefix); ?>
<?php print render($title_suffix); ?>
<?php 
  $block_array = (array) $block;
  $node = node_load( $block_array['#node']->nid );
  $wrapper = entity_metadata_wrapper('node', $node );
  $title = $wrapper->title->value();
  $body = $wrapper->body->value();
  $tabs = $wrapper->field_tabs->value();
  $tabs_highlights = $wrapper->field_tabs_highlights->value();
  $tab_paragraphs = $wrapper->field_tabs_content->value();
  foreach ($tab_paragraphs as $tab_paragraph_key => $tab_paragraph) { 
    if(!empty($tab_paragraph->field_para_title['und'])){
      foreach($tab_paragraph->field_para_title['und'] as $tab_t_keys => $tabs_title)
        if(isset($tabs_title['value']))$tab_para_array[$tab_paragraph_key][$tab_t_keys]['title'] = $tabs_title['value'];
    }
    if(!empty($tab_paragraph->field_para_description['und'])){
      foreach($tab_paragraph->field_para_description['und'] as $tab_d_keys => $tabs_description)
        if(isset($tabs_description['value']))$tab_para_array[$tab_paragraph_key][$tab_d_keys]['description'] = $tabs_description['value'];
    }
  }    
?>

    <?php //print $content ?>
     <div class="section section--light-gallery flush--bottom">
        <div class="spring mb-40">
            <h4 class="heading heading--4 heading--light heading--center">
                <?php echo $body['value'];?>
            </h4>
        </div>

        <div data-js="_simpleTabs" data-classes="active=circle-tabs__tab--active"
            class="js-tabs circle-tabs circle-tabs--dark">
            <!-- TABS AREA -->
            <div class="circle-tabs__navigation-wrapper">
                <!-- TAB NAVIGATION -->
                <nav class="js-tabs-navigation circle-tabs__navigation circle-tabs__navigation--gutter">
                    <?php $i = 1 ;foreach ($tabs as $tab_key => $tab) {
                        $class = 'js-tabs-tab circle-tabs__tab';
                        if($i == 1 ) $class = 'js-tabs-tab circle-tabs__tab circle-tabs__tab--active';
                        ?>
                    <!-- TAB 1 -->
                    <a href="#tab-<?php echo $i;?>" class="<?php echo $class;?>">
                        <!-- TAB ICON -->
                        <div class="circle-tabs__tab-circle  ">
                            <svg focusable="false" aria-hidden="true" class="icon  icon--small  circle-tabs__icon">
                            <use xlink:href="<?php echo $tab['url'];?>" />
                            </svg>
                        </div>
                        <!-- TAB LABEL -->
                        <div class="circle-tabs__tab-label ">
                         <?php echo wordwrap($tab['title'],14,"<br/>"); ?>   
                        </div>
                    </a>
                    <!-- TAB 2 -->
                    <?php $i++; } ?>
                </nav>
            </div>
            <!-- TABS CONTENT AREA -->

            <!-- TAB 1 | CONTENT -->
            <div id="tab-1" class="js-tabs-content circle-tabs__content circle-tabs__content--dark">
                <div class="spring spring--extra-150">
                    <?php echo $tabs_highlights[0]['value']?>
                    <div class="grid grid--gutter">
                        <?php foreach($tab_para_array[0] as $tab_data) { ?>
                        <div class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/2 grid__item--sm-1/1">
                            <a href="#" class="card card--white card--link card--dark">
                                <div class="card__content card__content--narrow">
                                    <div class="grid grid--gutter">
                                        <div class="grid__item grid__item--gutter grid__item--middle grid__item--6/7">
                                            <h4 class="heading heading--4 no-gutter--all">
                                                <?php echo $tab_data['title'];?>
                                            </h4>
                                        </div>
                                        <div
                                            class="grid__item grid__item--gutter grid__item--middle grid__item--align-right grid__item--1/7">
                                            <svg focusable="false" aria-hidden="true"
                                                class="icon chevron__icon chevron__icon--red ">
                                                <use xlink:href="#icon-chevron-right"></use>
                                            </svg>
                                        </div>
                                        <div class="grid__item grid__item--gutter grid__item--1/1">
                                            <p class="heading heading--6 heading--regular mt-20 mb-30">
                                                <?php echo $tab_data['description'];?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>
                        <?php } ?> 
                    </div>
                </div>
            </div>

            <!-- TAB 2 | CONTENT -->
            <div id="tab-2" class="js-tabs-content circle-tabs__content circle-tabs__content--dark">
                <div class="spring spring--extra-150">
                    <?php echo $tabs_highlights[1]['value']?>
                    <div class="grid grid--gutter">
                        <?php foreach($tab_para_array[1] as $tab_data) { ?>
                        <div class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/2 grid__item--sm-1/1">
                            <a href="#" class="card card--white card--link card--dark">
                                <div class="card__content card__content--narrow">
                                    <div class="grid grid--gutter">
                                        <div class="grid__item grid__item--gutter grid__item--middle grid__item--6/7">
                                            <h4 class="heading heading--4 no-gutter--all">
                                                <?php echo $tab_data['title'];?>
                                            </h4>
                                        </div>
                                        <div
                                            class="grid__item grid__item--gutter grid__item--middle grid__item--align-right grid__item--1/7">
                                            <svg focusable="false" aria-hidden="true"
                                                class="icon chevron__icon chevron__icon--red ">
                                                <use xlink:href="#icon-chevron-right"></use>
                                            </svg>
                                        </div>
                                        <div class="grid__item grid__item--gutter grid__item--1/1">
                                            <p class="heading heading--6 heading--regular mt-20 mb-30">
                                                <?php echo $tab_data['description'];?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- TAB 3 | CONTENT -->
            <div id="tab-3" class="js-tabs-content circle-tabs__content circle-tabs__content--dark">
                <div class="spring spring--extra-150">
                    <?php echo $tabs_highlights[2]['value']?>
                    <div class="grid grid--gutter">
                        <?php if(!empty($tab_para_array[2])){ foreach($tab_para_array[2] as $tab_data) { ?>
                        <div class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/2 grid__item--sm-1/1">
                            <a href="#" class="card card--white card--link card--dark">
                                <div class="card__content card__content--narrow">
                                    <div class="grid grid--gutter">
                                        <div class="grid__item grid__item--gutter grid__item--middle grid__item--6/7">
                                            <h4 class="heading heading--4 no-gutter--all">
                                                <?php echo $tab_data['title'];?>
                                            </h4>
                                        </div>
                                        <div
                                            class="grid__item grid__item--gutter grid__item--middle grid__item--align-right grid__item--1/7">
                                            <svg focusable="false" aria-hidden="true"
                                                class="icon chevron__icon chevron__icon--red ">
                                                <use xlink:href="#icon-chevron-right"></use>
                                            </svg>
                                        </div>
                                        <div class="grid__item grid__item--gutter grid__item--1/1">
                                            <p class="heading heading--6 heading--regular mt-20 mb-30">
                                                <?php echo $tab_data['description'];?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
