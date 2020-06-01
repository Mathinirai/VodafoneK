<?php

/**
 * @file
 * roles_permissions.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function roles_permissions_user_default_permissions() {
  $permissions = array();

  // Exported permission: 'access administration menu'.
  $permissions['access administration menu'] = array(
    'name' => 'access administration menu',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'admin_menu',
  );

  // Exported permission: 'access administration pages'.
  $permissions['access administration pages'] = array(
    'name' => 'access administration pages',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'system',
  );

  // Exported permission: 'access all views'.
  $permissions['access all views'] = array(
    'name' => 'access all views',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'views',
  );

  // Exported permission: 'access all webform results'.
  $permissions['access all webform results'] = array(
    'name' => 'access all webform results',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'webform',
  );

  // Exported permission: 'access comments'.
  $permissions['access comments'] = array(
    'name' => 'access comments',
    'roles' => array(
      'administrator' => 'administrator',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'comment',
  );

  // Exported permission: 'access content'.
  $permissions['access content'] = array(
    'name' => 'access content',
    'roles' => array(
      'administrator' => 'administrator',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'node',
  );

  // Exported permission: 'access content overview'.
  $permissions['access content overview'] = array(
    'name' => 'access content overview',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'access contextual links'.
  $permissions['access contextual links'] = array(
    'name' => 'access contextual links',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'contextual',
  );

  // Exported permission: 'access dashboard'.
  $permissions['access dashboard'] = array(
    'name' => 'access dashboard',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'dashboard',
  );

  // Exported permission: 'access own webform results'.
  $permissions['access own webform results'] = array(
    'name' => 'access own webform results',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'webform',
  );

  // Exported permission: 'access own webform submissions'.
  $permissions['access own webform submissions'] = array(
    'name' => 'access own webform submissions',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'webform',
  );

  // Exported permission: 'access site in maintenance mode'.
  $permissions['access site in maintenance mode'] = array(
    'name' => 'access site in maintenance mode',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'system',
  );

  // Exported permission: 'access site reports'.
  $permissions['access site reports'] = array(
    'name' => 'access site reports',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'system',
  );

  // Exported permission: 'access user profiles'.
  $permissions['access user profiles'] = array(
    'name' => 'access user profiles',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'user',
  );

  // Exported permission: 'access workbench'.
  $permissions['access workbench'] = array(
    'name' => 'access workbench',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'workbench',
  );

  // Exported permission: 'administer CAPTCHA settings'.
  $permissions['administer CAPTCHA settings'] = array(
    'name' => 'administer CAPTCHA settings',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'captcha',
  );

  // Exported permission: 'administer aaa integration settings'.
  $permissions['administer aaa integration settings'] = array(
    'name' => 'administer aaa integration settings',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'vodafone_aaa_integration',
  );

  // Exported permission: 'administer actions'.
  $permissions['administer actions'] = array(
    'name' => 'administer actions',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'system',
  );

  // Exported permission: 'administer blocks'.
  $permissions['administer blocks'] = array(
    'name' => 'administer blocks',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'block',
  );

  // Exported permission: 'administer comments'.
  $permissions['administer comments'] = array(
    'name' => 'administer comments',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'comment',
  );

  // Exported permission: 'administer content types'.
  $permissions['administer content types'] = array(
    'name' => 'administer content types',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'administer drafty'.
  $permissions['administer drafty'] = array(
    'name' => 'administer drafty',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'drafty',
  );

  // Exported permission: 'administer features'.
  $permissions['administer features'] = array(
    'name' => 'administer features',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'features',
  );

  // Exported permission: 'administer fields'.
  $permissions['administer fields'] = array(
    'name' => 'administer fields',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'field',
  );

  // Exported permission: 'administer filters'.
  $permissions['administer filters'] = array(
    'name' => 'administer filters',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'filter',
  );

  // Exported permission: 'administer image styles'.
  $permissions['administer image styles'] = array(
    'name' => 'administer image styles',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'image',
  );

  // Exported permission: 'administer imce'.
  $permissions['administer imce'] = array(
    'name' => 'administer imce',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'imce',
  );

  // Exported permission: 'administer login destination settings'.
  $permissions['administer login destination settings'] = array(
    'name' => 'administer login destination settings',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'login_destination',
  );

  // Exported permission: 'administer menu'.
  $permissions['administer menu'] = array(
    'name' => 'administer menu',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'menu',
  );

  // Exported permission: 'administer module filter'.
  $permissions['administer module filter'] = array(
    'name' => 'administer module filter',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'module_filter',
  );

  // Exported permission: 'administer modules'.
  $permissions['administer modules'] = array(
    'name' => 'administer modules',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'system',
  );

  // Exported permission: 'administer nodes'.
  $permissions['administer nodes'] = array(
    'name' => 'administer nodes',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'administer pathauto'.
  $permissions['administer pathauto'] = array(
    'name' => 'administer pathauto',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'pathauto',
  );

  // Exported permission: 'administer permissions'.
  $permissions['administer permissions'] = array(
    'name' => 'administer permissions',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'user',
  );

  // Exported permission: 'administer portal log activity'.
  $permissions['administer portal log activity'] = array(
    'name' => 'administer portal log activity',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'vf_configs',
  );

  // Exported permission: 'administer search'.
  $permissions['administer search'] = array(
    'name' => 'administer search',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'search',
  );

  // Exported permission: 'administer shortcuts'.
  $permissions['administer shortcuts'] = array(
    'name' => 'administer shortcuts',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'shortcut',
  );

  // Exported permission: 'administer site configuration'.
  $permissions['administer site configuration'] = array(
    'name' => 'administer site configuration',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'system',
  );

  // Exported permission: 'administer software updates'.
  $permissions['administer software updates'] = array(
    'name' => 'administer software updates',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'system',
  );

  // Exported permission: 'administer taxonomy'.
  $permissions['administer taxonomy'] = array(
    'name' => 'administer taxonomy',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'taxonomy',
  );

  // Exported permission: 'administer themes'.
  $permissions['administer themes'] = array(
    'name' => 'administer themes',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'system',
  );

  // Exported permission: 'administer two factor auth settings'.
  $permissions['administer two factor auth settings'] = array(
    'name' => 'administer two factor auth settings',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'vodafone_tfa',
  );

  // Exported permission: 'administer url aliases'.
  $permissions['administer url aliases'] = array(
    'name' => 'administer url aliases',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'path',
  );

  // Exported permission: 'administer users'.
  $permissions['administer users'] = array(
    'name' => 'administer users',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'user',
  );

  // Exported permission: 'administer views'.
  $permissions['administer views'] = array(
    'name' => 'administer views',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'views',
  );

  // Exported permission: 'administer vodafone dynamic label'.
  $permissions['administer vodafone dynamic label'] = array(
    'name' => 'administer vodafone dynamic label',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'vodafone_dynamic_label',
  );

  // Exported permission: 'administer workbench'.
  $permissions['administer workbench'] = array(
    'name' => 'administer workbench',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'workbench',
  );

  // Exported permission: 'administer workbench moderation'.
  $permissions['administer workbench moderation'] = array(
    'name' => 'administer workbench moderation',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'workbench_moderation',
  );

  // Exported permission: 'administer_dxl_configs_settings'.
  $permissions['administer_dxl_configs_settings'] = array(
    'name' => 'administer_dxl_configs_settings',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'vf_configs',
  );

  // Exported permission: 'block IP addresses'.
  $permissions['block IP addresses'] = array(
    'name' => 'block IP addresses',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'system',
  );

  // Exported permission: 'bypass node access'.
  $permissions['bypass node access'] = array(
    'name' => 'bypass node access',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'bypass workbench moderation'.
  $permissions['bypass workbench moderation'] = array(
    'name' => 'bypass workbench moderation',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'workbench_moderation',
  );

  // Exported permission: 'cancel account'.
  $permissions['cancel account'] = array(
    'name' => 'cancel account',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'user',
  );

  // Exported permission: 'change own username'.
  $permissions['change own username'] = array(
    'name' => 'change own username',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'user',
  );

  // Exported permission: 'create apis_detail_page content'.
  $permissions['create apis_detail_page content'] = array(
    'name' => 'create apis_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create article content'.
  $permissions['create article content'] = array(
    'name' => 'create article content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create channel_detail_page content'.
  $permissions['create channel_detail_page content'] = array(
    'name' => 'create channel_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create circular_content content'.
  $permissions['create circular_content content'] = array(
    'name' => 'create circular_content content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create news content'.
  $permissions['create news content'] = array(
    'name' => 'create news content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create page content'.
  $permissions['create page content'] = array(
    'name' => 'create page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create product_item_detail_page content'.
  $permissions['create product_item_detail_page content'] = array(
    'name' => 'create product_item_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create product_item_page content'.
  $permissions['create product_item_page content'] = array(
    'name' => 'create product_item_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create svg_content content'.
  $permissions['create svg_content content'] = array(
    'name' => 'create svg_content content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create url aliases'.
  $permissions['create url aliases'] = array(
    'name' => 'create url aliases',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'path',
  );

  // Exported permission: 'create usecase_detail_page content'.
  $permissions['create usecase_detail_page content'] = array(
    'name' => 'create usecase_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create webform content'.
  $permissions['create webform content'] = array(
    'name' => 'create webform content',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'customize shortcut links'.
  $permissions['customize shortcut links'] = array(
    'name' => 'customize shortcut links',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'shortcut',
  );

  // Exported permission: 'delete all webform submissions'.
  $permissions['delete all webform submissions'] = array(
    'name' => 'delete all webform submissions',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'webform',
  );

  // Exported permission: 'delete any apis_detail_page content'.
  $permissions['delete any apis_detail_page content'] = array(
    'name' => 'delete any apis_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any article content'.
  $permissions['delete any article content'] = array(
    'name' => 'delete any article content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any channel_detail_page content'.
  $permissions['delete any channel_detail_page content'] = array(
    'name' => 'delete any channel_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any circular_content content'.
  $permissions['delete any circular_content content'] = array(
    'name' => 'delete any circular_content content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any news content'.
  $permissions['delete any news content'] = array(
    'name' => 'delete any news content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any page content'.
  $permissions['delete any page content'] = array(
    'name' => 'delete any page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any product_item_detail_page content'.
  $permissions['delete any product_item_detail_page content'] = array(
    'name' => 'delete any product_item_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any product_item_page content'.
  $permissions['delete any product_item_page content'] = array(
    'name' => 'delete any product_item_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any svg_content content'.
  $permissions['delete any svg_content content'] = array(
    'name' => 'delete any svg_content content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any usecase_detail_page content'.
  $permissions['delete any usecase_detail_page content'] = array(
    'name' => 'delete any usecase_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any webform content'.
  $permissions['delete any webform content'] = array(
    'name' => 'delete any webform content',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own apis_detail_page content'.
  $permissions['delete own apis_detail_page content'] = array(
    'name' => 'delete own apis_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own article content'.
  $permissions['delete own article content'] = array(
    'name' => 'delete own article content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own channel_detail_page content'.
  $permissions['delete own channel_detail_page content'] = array(
    'name' => 'delete own channel_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own circular_content content'.
  $permissions['delete own circular_content content'] = array(
    'name' => 'delete own circular_content content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own news content'.
  $permissions['delete own news content'] = array(
    'name' => 'delete own news content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own page content'.
  $permissions['delete own page content'] = array(
    'name' => 'delete own page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own product_item_detail_page content'.
  $permissions['delete own product_item_detail_page content'] = array(
    'name' => 'delete own product_item_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own product_item_page content'.
  $permissions['delete own product_item_page content'] = array(
    'name' => 'delete own product_item_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own svg_content content'.
  $permissions['delete own svg_content content'] = array(
    'name' => 'delete own svg_content content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own usecase_detail_page content'.
  $permissions['delete own usecase_detail_page content'] = array(
    'name' => 'delete own usecase_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own webform content'.
  $permissions['delete own webform content'] = array(
    'name' => 'delete own webform content',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own webform submissions'.
  $permissions['delete own webform submissions'] = array(
    'name' => 'delete own webform submissions',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'webform',
  );

  // Exported permission: 'delete revisions'.
  $permissions['delete revisions'] = array(
    'name' => 'delete revisions',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete terms in block_type'.
  $permissions['delete terms in block_type'] = array(
    'name' => 'delete terms in block_type',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'taxonomy',
  );

  // Exported permission: 'delete terms in markets'.
  $permissions['delete terms in markets'] = array(
    'name' => 'delete terms in markets',
    'roles' => array(),
    'module' => 'taxonomy',
  );

  // Exported permission: 'delete terms in page_type'.
  $permissions['delete terms in page_type'] = array(
    'name' => 'delete terms in page_type',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'taxonomy',
  );

  // Exported permission: 'delete terms in tags'.
  $permissions['delete terms in tags'] = array(
    'name' => 'delete terms in tags',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'taxonomy',
  );

  // Exported permission: 'display drupal links'.
  $permissions['display drupal links'] = array(
    'name' => 'display drupal links',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'admin_menu',
  );

  // Exported permission: 'edit all webform submissions'.
  $permissions['edit all webform submissions'] = array(
    'name' => 'edit all webform submissions',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'webform',
  );

  // Exported permission: 'edit any apis_detail_page content'.
  $permissions['edit any apis_detail_page content'] = array(
    'name' => 'edit any apis_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any article content'.
  $permissions['edit any article content'] = array(
    'name' => 'edit any article content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any channel_detail_page content'.
  $permissions['edit any channel_detail_page content'] = array(
    'name' => 'edit any channel_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any circular_content content'.
  $permissions['edit any circular_content content'] = array(
    'name' => 'edit any circular_content content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any news content'.
  $permissions['edit any news content'] = array(
    'name' => 'edit any news content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any page content'.
  $permissions['edit any page content'] = array(
    'name' => 'edit any page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any product_item_detail_page content'.
  $permissions['edit any product_item_detail_page content'] = array(
    'name' => 'edit any product_item_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any product_item_page content'.
  $permissions['edit any product_item_page content'] = array(
    'name' => 'edit any product_item_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any svg_content content'.
  $permissions['edit any svg_content content'] = array(
    'name' => 'edit any svg_content content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any usecase_detail_page content'.
  $permissions['edit any usecase_detail_page content'] = array(
    'name' => 'edit any usecase_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any webform content'.
  $permissions['edit any webform content'] = array(
    'name' => 'edit any webform content',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own apis_detail_page content'.
  $permissions['edit own apis_detail_page content'] = array(
    'name' => 'edit own apis_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own article content'.
  $permissions['edit own article content'] = array(
    'name' => 'edit own article content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own channel_detail_page content'.
  $permissions['edit own channel_detail_page content'] = array(
    'name' => 'edit own channel_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own circular_content content'.
  $permissions['edit own circular_content content'] = array(
    'name' => 'edit own circular_content content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own comments'.
  $permissions['edit own comments'] = array(
    'name' => 'edit own comments',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'comment',
  );

  // Exported permission: 'edit own news content'.
  $permissions['edit own news content'] = array(
    'name' => 'edit own news content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own page content'.
  $permissions['edit own page content'] = array(
    'name' => 'edit own page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own product_item_detail_page content'.
  $permissions['edit own product_item_detail_page content'] = array(
    'name' => 'edit own product_item_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own product_item_page content'.
  $permissions['edit own product_item_page content'] = array(
    'name' => 'edit own product_item_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own svg_content content'.
  $permissions['edit own svg_content content'] = array(
    'name' => 'edit own svg_content content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own usecase_detail_page content'.
  $permissions['edit own usecase_detail_page content'] = array(
    'name' => 'edit own usecase_detail_page content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own webform content'.
  $permissions['edit own webform content'] = array(
    'name' => 'edit own webform content',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own webform submissions'.
  $permissions['edit own webform submissions'] = array(
    'name' => 'edit own webform submissions',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'webform',
  );

  // Exported permission: 'edit terms in block_type'.
  $permissions['edit terms in block_type'] = array(
    'name' => 'edit terms in block_type',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'taxonomy',
  );

  // Exported permission: 'edit terms in markets'.
  $permissions['edit terms in markets'] = array(
    'name' => 'edit terms in markets',
    'roles' => array(),
    'module' => 'taxonomy',
  );

  // Exported permission: 'edit terms in page_type'.
  $permissions['edit terms in page_type'] = array(
    'name' => 'edit terms in page_type',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'taxonomy',
  );

  // Exported permission: 'edit terms in tags'.
  $permissions['edit terms in tags'] = array(
    'name' => 'edit terms in tags',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'taxonomy',
  );

  // Exported permission: 'edit webform components'.
  $permissions['edit webform components'] = array(
    'name' => 'edit webform components',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'webform',
  );

  // Exported permission: 'flush caches'.
  $permissions['flush caches'] = array(
    'name' => 'flush caches',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'admin_menu',
  );

  // Exported permission: 'generate features'.
  $permissions['generate features'] = array(
    'name' => 'generate features',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'features',
  );

  // Exported permission: 'maintain nodeblock'.
  $permissions['maintain nodeblock'] = array(
    'name' => 'maintain nodeblock',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'nodeblock',
  );

  // Exported permission: 'manage features'.
  $permissions['manage features'] = array(
    'name' => 'manage features',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'features',
  );

  // Exported permission: 'moderate content from draft to needs_review'.
  $permissions['moderate content from draft to needs_review'] = array(
    'name' => 'moderate content from draft to needs_review',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'workbench_moderation',
  );

  // Exported permission: 'moderate content from needs_review to draft'.
  $permissions['moderate content from needs_review to draft'] = array(
    'name' => 'moderate content from needs_review to draft',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'workbench_moderation',
  );

  // Exported permission: 'moderate content from needs_review to published'.
  $permissions['moderate content from needs_review to published'] = array(
    'name' => 'moderate content from needs_review to published',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'workbench_moderation',
  );

  // Exported permission: 'notify of path changes'.
  $permissions['notify of path changes'] = array(
    'name' => 'notify of path changes',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'pathauto',
  );

  // Exported permission: 'post comments'.
  $permissions['post comments'] = array(
    'name' => 'post comments',
    'roles' => array(
      'administrator' => 'administrator',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'comment',
  );

  // Exported permission: 'rename features'.
  $permissions['rename features'] = array(
    'name' => 'rename features',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'features',
  );

  // Exported permission: 'revert revisions'.
  $permissions['revert revisions'] = array(
    'name' => 'revert revisions',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'search content'.
  $permissions['search content'] = array(
    'name' => 'search content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'search',
  );

  // Exported permission: 'select account cancellation method'.
  $permissions['select account cancellation method'] = array(
    'name' => 'select account cancellation method',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'user',
  );

  // Exported permission: 'skip CAPTCHA'.
  $permissions['skip CAPTCHA'] = array(
    'name' => 'skip CAPTCHA',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'captcha',
  );

  // Exported permission: 'skip comment approval'.
  $permissions['skip comment approval'] = array(
    'name' => 'skip comment approval',
    'roles' => array(
      'administrator' => 'administrator',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'comment',
  );

  // Exported permission: 'switch shortcut sets'.
  $permissions['switch shortcut sets'] = array(
    'name' => 'switch shortcut sets',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'shortcut',
  );

  // Exported permission: 'use advanced search'.
  $permissions['use advanced search'] = array(
    'name' => 'use advanced search',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'search',
  );

  // Exported permission: 'use ctools import'.
  $permissions['use ctools import'] = array(
    'name' => 'use ctools import',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'ctools',
  );

  // Exported permission: 'use text format filtered_html'.
  $permissions['use text format filtered_html'] = array(
    'name' => 'use text format filtered_html',
    'roles' => array(
      'administrator' => 'administrator',
      'anonymous user' => 'anonymous user',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'filter',
  );

  // Exported permission: 'use text format full_html'.
  $permissions['use text format full_html'] = array(
    'name' => 'use text format full_html',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'filter',
  );

  // Exported permission: 'use workbench_moderation my drafts tab'.
  $permissions['use workbench_moderation my drafts tab'] = array(
    'name' => 'use workbench_moderation my drafts tab',
    'roles' => array(),
    'module' => 'workbench_moderation',
  );

  // Exported permission: 'use workbench_moderation needs review tab'.
  $permissions['use workbench_moderation needs review tab'] = array(
    'name' => 'use workbench_moderation needs review tab',
    'roles' => array(),
    'module' => 'workbench_moderation',
  );

  // Exported permission: 'view all unpublished content'.
  $permissions['view all unpublished content'] = array(
    'name' => 'view all unpublished content',
    'roles' => array(
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'workbench_moderation',
  );

  // Exported permission: 'view moderation history'.
  $permissions['view moderation history'] = array(
    'name' => 'view moderation history',
    'roles' => array(),
    'module' => 'workbench_moderation',
  );

  // Exported permission: 'view moderation messages'.
  $permissions['view moderation messages'] = array(
    'name' => 'view moderation messages',
    'roles' => array(),
    'module' => 'workbench_moderation',
  );

  // Exported permission: 'view own unpublished content'.
  $permissions['view own unpublished content'] = array(
    'name' => 'view own unpublished content',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'view revisions'.
  $permissions['view revisions'] = array(
    'name' => 'view revisions',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'view the administration theme'.
  $permissions['view the administration theme'] = array(
    'name' => 'view the administration theme',
    'roles' => array(
      'Content Approver' => 'Content Approver',
      'Content Moderator' => 'Content Moderator',
      'Super Admin' => 'Super Admin',
      'administrator' => 'administrator',
    ),
    'module' => 'system',
  );

  return $permissions;
}
