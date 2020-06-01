<?php

/**
 * @file
 * roles_permissions.features.user_role.inc
 */

/**
 * Implements hook_user_default_roles().
 */
function roles_permissions_user_default_roles() {
  $roles = array();

  // Exported role: AAA user.
  $roles['AAA user'] = array(
    'name' => 'AAA user',
    'weight' => 6,
  );

  // Exported role: Content Approver.
  $roles['Content Approver'] = array(
    'name' => 'Content Approver',
    'weight' => 5,
  );

  // Exported role: Content Moderator.
  $roles['Content Moderator'] = array(
    'name' => 'Content Moderator',
    'weight' => 4,
  );

  // Exported role: Super Admin.
  $roles['Super Admin'] = array(
    'name' => 'Super Admin',
    'weight' => 3,
  );

  // Exported role: administrator.
  $roles['administrator'] = array(
    'name' => 'administrator',
    'weight' => 2,
  );

  return $roles;
}
