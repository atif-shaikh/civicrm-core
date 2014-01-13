<?php

session_start();

require_once 'civicrm.config.php';
require_once 'CRM/Core/Config.php';


$config = CRM_Core_Config::singleton();
require_once 'UCMPaymentCollectionIPN.php';

edu_ucmerced_payment_ucmpaymentcollection_UCMPaymentCollectionIPN::main();
