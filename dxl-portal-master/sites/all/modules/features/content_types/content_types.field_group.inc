<?php

/**
 * @file
 * content_types.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function content_types_field_group_info() {
  $field_groups = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_details_body|node|apis_detail_page|form';
  $field_group->group_name = 'group_details_body';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'apis_detail_page';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => ' Body',
    'weight' => '5',
    'children' => array(
      0 => 'field_title',
      1 => 'field_description',
      2 => 'field_details_description',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-details-body field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups['group_details_body|node|apis_detail_page|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_details_body|node|channel_detail_page|form';
  $field_group->group_name = 'group_details_body';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'channel_detail_page';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => ' Body',
    'weight' => '5',
    'children' => array(
      0 => 'field_description',
      1 => 'field_title',
      2 => 'field_details_description',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-details-body field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups['group_details_body|node|channel_detail_page|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_details_body|node|product_item_detail_page|form';
  $field_group->group_name = 'group_details_body';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'product_item_detail_page';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => ' Body',
    'weight' => '5',
    'children' => array(
      0 => 'field_description',
      1 => 'field_title',
      2 => 'field_details_description',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-details-body field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups['group_details_body|node|product_item_detail_page|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_details_body|node|usecase_detail_page|form';
  $field_group->group_name = 'group_details_body';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'usecase_detail_page';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Body',
    'weight' => '5',
    'children' => array(
      0 => 'field_description',
      1 => 'field_title',
      2 => 'field_details_description',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-details-body field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups['group_details_body|node|usecase_detail_page|form'] = $field_group;

  // Translatables
  // Included for use with string extractors like potx.
  t(' Body');
  t('Body');

  return $field_groups;
}
