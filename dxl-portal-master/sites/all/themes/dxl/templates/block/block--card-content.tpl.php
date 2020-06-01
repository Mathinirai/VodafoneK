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
    $node = node_load($block_array['#node']->nid);
    $wrapper = entity_metadata_wrapper('node', $node);
    $title = $wrapper->title->value();
    $body = $wrapper->body->value();
    $card_paragraphs = $wrapper->field_card_content->value();
    ?>

    <?php //print $content  ?>
    <div class="content">
        <h3 class="heading heading--3 heading--leading heading--center mt-40">
            <?php echo $title; ?>
        </h3>
        <h4 class="heading heading--4 heading--light heading--center">
            <?php echo $body['value']; ?>
        </h4>
        <ul class="grid grid--gutter grid--gutter-vertical" data-js="_equalRows" data-items=".card__content-eqrow" data-sample-height=".card__content-eqrow-inner">
            <?php foreach ($card_paragraphs as $card_key => $card_paragraph) { ?>
                <li class="grid__item aspect-height grid__item--gutter grid__item--md-1/1 aspect-height--md-auto grid__item--1/2 aspect-height--auto grid__item--gutter-vertical">
                    <a href="#" class="aspect-height__content card card--white flush flush--all">
                        <div class="grid">
                            <div class="grid__item aspect-height grid__item--sm-1/1 aspect-height--sm-1/2 grid__item--md-1/2 aspect-height--md-2/3 grid__item--1/1 aspect-height--1/2">
                                <div class="aspect-height__content background">
                                    <div class="background__image lazyloaded" data-bgset="<br />
                                         sites/all/themes/dxl/assets/images/images-responsive/why-vodafone-blue-320.png [(max-width: 320px)] |<br />
                                         sites/all/themes/dxl/assets/images/images-responsive/why-vodafone-blue-640.png [(max-width: 640px)] |<br />
                                         sites/all/themes/dxl/assets/images/images-responsive/why-vodafone-blue.png" style="background-image: url(&quot;sites/all/themes/dxl/assets/images/images-responsive/<?php echo $card_paragraph->field_para_image['und'][0]['filename']; ?>&quot;);"><br>
                                        <picture style="display: none;">
                                            <source data-srcset=" sites/all/themes/dxl/assets/images/images-responsive/why-vodafone-blue-320.png" media="(max-width: 320px)" srcset=" sites/all/themes/dxl/assets/images/images-responsive/why-vodafone-blue-320.png">
                                            <source data-srcset="sites/all/themes/dxl/assets/images/images-responsive/why-vodafone-blue-640.png" media="(max-width: 640px)" srcset="sites/all/themes/dxl/assets/images/images-responsive/why-vodafone-blue-640.png"><source data-srcset="sites/all/themes/dxl/assets/images/images-responsive/why-vodafone-blue.png" srcset="sites/all/themes/dxl/assets/images/images-responsive/why-vodafone-blue.png">
                                            <img alt="" class=" lazyloaded">
                                        </picture>
                                    </div>
                                    <p>                                        </p><noscript><br /><img src="/images/promo-spotify.jpg" alt="" /><br /></noscript>
                                </div>
                            </div>
                            <div class="grid__item aspect-height grid__item--sm-1/1 aspect-height--sm-auto grid__item--md-1/2 aspect-height-md-auto grid__item--1/1 aspect-height--auto business-challenges__tile-content">
                                <div class="aspect-height__content ">
                                    <div class="card__content--narrow">
                                        <div class="card__content-eqrow-inner">
                                            <p class="heading heading--4 contact__text no-gutter--top">
                                                <span class="chevron  chevron--inline "><span class="chevron__text "><?php echo $card_paragraph->field_para_title['und'][0]['value']; ?></span></span>
                                            </p>
                                            <p class="no-gutter--bottom"><?php echo $card_paragraph->field_para_description['und'][0]['value']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>                        </p></a>
                </li>
            <?php } ?>
        </ul>  </div>
</div>