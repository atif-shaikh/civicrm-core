
<?php

require_once 'CRM/Core/Payment.php';

class edu_ucmerced_payment_ucpaymentcollection extends CRM_Core_payment{
	
	static private $_singleton = null;
	
	static protected $_mode = null;
	
	
		function __construct(){
			$this->_mode = $mode;
			$this->_paymentProcessor = $paymentProcessor;
			$this->_processorName = ts('UC merced Payment Collection');
		}
	
	
		static function &singleton($mode,&$paymentProcessor){
			 $processorName = $paymentProcessor['name'];
			  if (self::$_singleton[$processorName] === null ) {
				  self::$_singleton[$processorName] = new edu_ucmerced_payment_ucmpaymentcollection( $mode, $paymentProcessor );
			  }
			  return self::$_singleton[$processorName];
		}
	
	
		function checkConfig() {
		$config = CRM_Core_Config::singleton();
	 
		$error = array();
	 
		if (empty($this->_paymentProcessor['user_name'])) {
		  $error[] = ts('The "Bill To ID" is not set in the Administer CiviCRM Payment Processor.');
		}
	 
		if (!empty($error)) {
		  return implode('<p>', $error);
		}
		else {
		  return NULL;
		}
	  }
	  
	  
	  
	  function doDirectPayment(&$params) {
			CRM_Core_Error::fatal(ts('This function is not implemented'));
	  }
	  
	  
	  function doTransferCheckout( &$params, $component ) {
		  
		  $UCMPaymentCollectionParams['purchaseItemId'] = $this->_paymentProcessor['user_name'];
		  $billID = array(
			  $params['invoiceID'],
			  $params['qfKey'],
			  $params['contactID'],
			  $params['contributionID'],
			  $params['contributionTypeID'],
			  $params['eventID'],
			  $params['participantID'],
			  $params['membershipID'],
		  );
		  
		  $UCMPaymentCollectionParams['billid'] =  implode('-', $billID);
		  $UCMPaymentCollectionParams['amount'] = $params['amount'];
		  
		  
		    if (isset($params['first_name']) || isset($params['last_name'])) {
			  $UCMPaymentCollectionParams['bill_name'] = $params['first_name'] . ' ' . $params['last_name'];
			}
		 
			if (isset($params['street_address-1'])) {
			  $UCMPaymentCollectionParams['bill_addr1'] = $params['street_address-1'];
			}
		 
			if (isset($params['city-1'])) {
			  $UCMPaymentCollectionParams['bill_city'] = $params['city-1'];
			}
		 
			if (isset($params['state_province-1'])) {
			  $UCMPaymentCollectionParams['bill_state'] = CRM_Core_PseudoConstant::stateProvinceAbbreviation(
																   $params['state_province-1'] );
			}
		 
			if (isset($params['postal_code-1'])) {
			  $UCMPaymentCollectionParams['bill_zip'] = $params['postal_code-1'];
			}
		 
			if (isset($params['email-5'])) {
			  $UCMPaymentCollectionParams['bill_email'] = $params['email-5'];
			}
			
			
			
			// Allow further manipulation of the arguments via custom hooks ..
			CRM_Utils_Hook::alterPaymentProcessorParams($this, $params, $UCMPaymentCollectionParams);
		 
			// Build our query string;
			$query_string = '';
			foreach ($UCMPaymentCollectionParams as $name => $value) {
			  $query_string .= $name . '=' . $value . '&';
			}
		 
			// Remove extra &
			$query_string = rtrim($query_string, '&');
		 
			// Redirect the user to the payment url.
			CRM_Utils_System::redirect($this->_paymentProcessor['url_site'] . '?' . $query_string);
		 
			exit();
		 
	   }
	  
	  
}
