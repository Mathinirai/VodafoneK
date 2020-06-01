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
  $headline = $wrapper->field_headline->value();
  $body = $wrapper->body->value();
  $svg_paragraphs = $wrapper->field_svg_content->value();
?>

    <?php //print $content ?>

      
        <div class="section section--gallery">
        <div class="spring spring--extra-100">
            <h2 class="heading heading--2 heading--leading heading--center">
                <?php echo $headline; ?>
            </h2>
            <h4 class="heading heading--4 heading--leading">
                <?php echo $body['value']; ?>
            </h4>

            <div class="spring spring--extra-100">

                <div class="carousel" data-js="_carousel" data-adjust-height="1" data-center=""
                    data-breakpoints="mobile=1&amp;tablet=3&amp;desktop=4">
                    <div class="carousel__wrapper">
                        <!-- CAROUSEL SLIDES -->
                        <ul class="js-carousel-slider carousel__slider carousel__slider--sm-1 carousel__slider--md-3 carousel__slider--4 ">
                            
                            <?php $i = 0; foreach ($svg_paragraphs as $key => $svg_paragraph) { ?>
                            <li class="js-carousel-slide carousel__slide align--center" data-slide="<?php echo $i; ?>">
                                    <!-- ITEM 1 | CIRCLE ICON -->
                                    <a href="<?php echo $svg_paragraph->field_svg_heading['und'][0]['url']; ?>" class="why-vodafone__link">
                                        <svg focusable="false" aria-hidden="true"
                                            class="icon icon--slim icon--fill why-vodafone__link-icon">
                                            <use xlink:href="<?php echo $svg_paragraph->field_svg_image_name['und'][0]['value'];?>" />
                                        </svg>
                                        <br>
                                        <span class="why-vodafone__link-title">
                                            <?php echo $svg_paragraph->field_svg_heading['und'][0]['title'];?>
                                        </span>
                                    </a>
                                </li>
                            <?php $i++; } ?>
                        </ul>
                    </div>

                    <!-- CAROUSEL CONTROLS -->
                    <div class="js-carousel-controls carousel__controls">
                        <button class="js-carousel-control carousel__control carousel__control--left hide--md hide--sm"
                            type="button" data-direction="-1">
                            <span class="visually-hidden">
                                Previous page
                            </span>
                            <svg focusable="false" aria-hidden="true" class="icon  icon--small  carousel__control-icon">
                                <use xlink:href="#icon-chevron-left"></use>
                            </svg>
                        </button>
                        <button class="js-carousel-control carousel__control carousel__control--right hide--md hide--sm"
                            type="button" data-direction="1">
                            <span class="visually-hidden">
                                Next page
                            </span>
                            <svg focusable="false" aria-hidden="true" class="icon  icon--small  carousel__control-icon">
                                <use xlink:href="#icon-chevron-right"></use>
                            </svg>
                        </button>
                    </div>

                    <!-- CAROUSEL PAGINATION -->
                    <div class="js-carousel-pagination carousel__pagination"></div>

                    <script class="js-carousel-slide-template" type="text/x-handlebars-template">
                                            <li class="js-carousel-slide carousel__slide" data-slide="{{ slide }}">
                                                {{{ content }}}
                                            </li>
                                        </script>
                    <script class="js-carousel-page-template" type="text/x-handlebars-template">
                                            <li class="carousel__page-item">
                                                <button type="button" class="js-carousel-page carousel__page {{#if isActive}} carousel__page--active {{/if}} button button--reset"
                                                data-page="{{ page }}" {{#if isActive}} aria-current="page" {{/if}}>
                                                    <span class="visually-hidden">
                                                        {{#if accessibilityLabel}}
                                                            {{ accessibilityLabel }}
                                                        {{else}}
                                                            go to item {{page}}
                                                        {{/if}}
                                                    </span>
                                                </button>
                                            </li>
                                        </script>
                </div>
            </div>

        </div>

    </div>
</div>
