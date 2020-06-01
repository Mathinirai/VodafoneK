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
  $tile_paragraph = $wrapper->field_tile_content->value();
  $headline = $node->field_headline['und'][0]['value'];
?>

    <?php //print $content ?>
      <div class="section section--gallery">
        <div class="spring">
            <h2 class="heading heading--2 heading--leading heading--center">
                <?php echo $headline; ?>
            </h2>
            <div class="grid grid--gutter">
                
                <?php foreach( $tile_paragraph as $c_value ) {
                        $headline = $c_value->field_tile_title['und'][0]['value'];
                        $details = $c_value->field_tile_description['und'][0]['value'];
                ?>
                
                <div class="grid__item grid__item--gutter flush--sm-bottom grid__item--1/3 grid__item--md-1/1">
                    <a href="#" class="link link--tile link--tile--dark ">
                        <div class="grid grid--gutter">
                            <div class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/1">
                                <h5 class="heading heading--5 no-gutter--all">
                                    <?php echo $headline; ?>
                                </h5>
                            </div>

                            <div class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/1">
                                <h6 class="heading heading--6 no-gutter--all">
                                    <?php echo $details; ?>
                                </h6>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
