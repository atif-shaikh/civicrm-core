<?php

require_once 'myextension.civix.php';

/**
 * Implementation of hook_civicrm_config
 */
function myextension_civicrm_config(&$config) {
  _myextension_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 */
function myextension_civicrm_xmlMenu(&$files) {
  _myextension_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 */
function myextension_civicrm_install() {
  return _myextension_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 */
function myextension_civicrm_uninstall() {
  return _myextension_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 */
function myextension_civicrm_enable() {
  return _myextension_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 */
function myextension_civicrm_disable() {
  return _myextension_civix_civicrm_disable();
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
function myextension_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _myextension_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 */
function myextension_civicrm_managed(&$entities) {
  return _myextension_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 */
function myextension_civicrm_caseTypes(&$caseTypes) {
  _myextension_civix_civicrm_caseTypes($caseTypes);
}


function myextension_civicrm_post($op,$objectName, $objectId, &$objectRef){
	switch($objectName){
		case 'Contribution':
		die('in contri post hook');
		$file = '/tmp/contributions.log';
		$message = strstr("Performed \"@op\" at @time on contribution #@id\n", array(
		'@op'=>$op,
		'@time'=>date('Y-m-d H:i:s'),
		'@id'=>$objectId,
		));
		file_put_contents($file,$message,FILE_APPEND);
		break;
		default:
	}
}

function myextension_civicrm_buildForm($formName, &$form){
	switch($formName){
		case 'CRM_Contribute_Form_ContributionPage_Settings' :
		$file = '/var/www/extensions/tmp/contributions.log';
		$message = "Checking Extension MOdule Working....";
		//echo $message;die;
		file_put_contents($file,$message,FILE_APPEND);
		break;
		default:
	}
	
}
