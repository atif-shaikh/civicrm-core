<?php

require_once 'mypages.civix.php';

/**
 * Implementation of hook_civicrm_config
 */
function mypages_civicrm_config(&$config) {
  _mypages_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 */
function mypages_civicrm_xmlMenu(&$files) {
  _mypages_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 */
function mypages_civicrm_install() {
  return _mypages_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 */
function mypages_civicrm_uninstall() {
  return _mypages_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 */
function mypages_civicrm_enable() {
  return _mypages_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 */
function mypages_civicrm_disable() {
  return _mypages_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 */
function mypages_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _mypages_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 */
function mypages_civicrm_managed(&$entities) {
  return _mypages_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 */
function mypages_civicrm_caseTypes(&$caseTypes) {
  _mypages_civix_civicrm_caseTypes($caseTypes);
}
