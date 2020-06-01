<?php

/**
 * @file
 * content_types.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function content_types_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "field_group" && $api == "field_group") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function content_types_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function content_types_node_info() {
  $items = array(
    'apis_detail_page' => array(
      'name' => t('APIs Detail Page'),
      'base' => 'node_content',
      'description' => t('This page type having all APIs pages.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'card_content' => array(
      'name' => t('Add Card Block'),
      'base' => 'node_content',
      'description' => t('This is card block having two column layout with images banner'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'channel_detail_page' => array(
      'name' => t('Channel Detail Page'),
      'base' => 'node_content',
      'description' => t('This page type having all APIs pages.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'circular_content' => array(
      'name' => t('Add Circular Block'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'faq_page' => array(
      'name' => t('FAQ Page'),
      'base' => 'node_content',
      'description' => t('This content type used for frequently asked questions.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'page' => array(
      'name' => t('Basic page'),
      'base' => 'node_content',
      'description' => t('Use <em>basic pages</em> for your static content, such as an \'About us\' page.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'product_item_detail_page' => array(
      'name' => t('Microservice Detail Page'),
      'base' => 'node_content',
      'description' => t('This page type having all microservice pages.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'product_item_page' => array(
      'name' => t('Listing page'),
      'base' => 'node_content',
      'description' => t('This is listing page for all type of pages'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'svg_content' => array(
      'name' => t('Add SVG Block'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'tabs_content' => array(
      'name' => t('Add Tabs Block'),
      'base' => 'node_content',
      'description' => t('This is two column layout for complete pages having tab view'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'tile_content' => array(
      'name' => t('Add Tile Block'),
      'base' => 'node_content',
      'description' => t('This is card layout for banner'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'usecase_detail_page' => array(
      'name' => t('UseCase Detail Page'),
      'base' => 'node_content',
      'description' => t('This page type having all APIs pages.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}

/**
 * Implements hook_paragraphs_info().
 */
function content_types_paragraphs_info() {
  $items = array(
    'card_bundle' => array(
      'name' => 'Card Bundle',
      'bundle' => 'card_bundle',
      'locked' => '1',
    ),
    'circular_bundle' => array(
      'name' => 'Circular Bundle',
      'bundle' => 'circular_bundle',
      'locked' => '1',
    ),
    'contact_information' => array(
      'name' => 'Contact Information',
      'bundle' => 'contact_information',
      'locked' => '1',
    ),
    'details_description' => array(
      'name' => 'Details Description',
      'bundle' => 'details_description',
      'locked' => '1',
    ),
    'svg_bundle' => array(
      'name' => 'SVG Bundle',
      'bundle' => 'svg_bundle',
      'locked' => '1',
    ),
    'tile_bundle' => array(
      'name' => 'Tile Bundle',
      'bundle' => 'tile_bundle',
      'locked' => '1',
    ),
    'two_column_bundle' => array(
      'name' => 'Two Column Bundle',
      'bundle' => 'two_column_bundle',
      'locked' => '1',
    ),
    'updates_bundle' => array(
      'name' => 'Updates Bundle',
      'bundle' => 'updates_bundle',
      'locked' => '1',
    ),
  );
  return $items;
}
