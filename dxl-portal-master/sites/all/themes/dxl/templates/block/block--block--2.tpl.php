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
$last_updated_content = vf_configs_last_updated();
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
<?php print render($title_prefix); ?>
<?php print render($title_suffix); ?>

    <?php //print $content ?>
    <div class="section section--gallery flush--bottom">
        <div class="spring mb-20">
            <h2 class="heading heading--2 heading--leading heading--center">
                <?php echo $block->subject; ?>
            </h2>
            <?php foreach( $last_updated_content as $p_value ) {
                    $title = $p_value->title;
                    $created = gmdate("jS F Y",$p_value->changed);
            ?>
            <a href="/<?php echo drupal_get_path_alias('node/'.$p_value->nid); ?>" class="link link--tile link--update ">
                <div class="grid grid--gutter">
                    <div
                        class="grid__item grid__item--gutter grid__item--1/12 grid__item--md-1/10 grid__item--sm-1/5 grid__item--middle flush--sm-bottom">

                        <svg focusable="false" aria-hidden="true" class="icon link__icon icon--large icon--empty">
                            <use xlink:href="#icon-data-mid"></use>
                        </svg>
                    </div>
                    <div
                        class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--1/2 grid__item--md-1/2 grid__item--sm-4/5 grid__item--align-left grid__item--middle">
                        <h5 class="heading heading--5 no-gutter--all">
                            <?php echo $title; ?>
                        </h5>
                        <h6 class="heading heading--6 heading--bold heading--inline-block no-gutter--all hide--lg hide--md">
                            <?php echo $created; ?>
                        </h6>
                    </div>
                    <div
                        class="grid__item grid__item--gutter grid__item--gutter-vertical grid__item--5/12 grid__item--md-2/5 hide--sm grid__item--align-right grid__item--middle ">
                        <h6 class="heading heading--6 heading--bold heading--inline-block no-gutter--all">
                            <?php echo 'Modified on '.$created; ?>
                        </h6>
                    </div>
                </div>
            </a>
            <?php } ?> 
        </div>

    </div>
</div>
