<?php

  // Script to help monitoring health check of the application and database.

  define('DRUPAL_ROOT', getcwd());
  require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
  drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

  // Prints '200 OK' when in good health.
  echo '200 OK';

?>
