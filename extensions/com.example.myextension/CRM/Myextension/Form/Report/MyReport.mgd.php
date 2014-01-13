<?php
// This file declares a managed database record of type "ReportTemplate".
// The record will be automatically inserted, updated, or deleted from the
// database as appropriate. For more details, see "hook_civicrm_managed" at:
// http://wiki.civicrm.org/confluence/display/CRMDOC42/Hook+Reference
return array (
  0 => 
  array (
    'name' => 'CRM_Myextension_Form_Report_MyReport',
    'entity' => 'ReportTemplate',
    'params' => 
    array (
      'version' => 3,
      'label' => 'MyReport',
      'description' => 'MyReport (com.example.myextension)',
      'class_name' => 'CRM_Myextension_Form_Report_MyReport',
      'report_url' => 'com.example.myextension/myreport',
      'component' => 'CiviContribute',
    ),
  ),
);