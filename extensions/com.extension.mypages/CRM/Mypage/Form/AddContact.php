<?php

class CRM_Mypage_Form_AddContact extends CRM_Core_Form{


	function preProcess(){
		
		
		
	}
	
	public function buildQuickForm(){
		
	$session = &CRM_Core_Session::singleton();
	$contactID = $session->get('userID');
	$params = array(
		'id' => $contactID,
	 );
	$result = civicrm_api3('contact', 'get', $params);
	$par = array( 'contact_id' => $contactID, 'return.custom_7' => 1,'return.custom_8' => 1,'contact_type'=>'Individual','version'=>3 ) ;
	$res = civicrm_api3('contact', 'get',$par);
	//print_r($res);
	$qaPhoneDate = CRM_Core_BAO_CustomField::getCustomFieldID('Issues');
    CRM_Core_BAO_CustomField::addQuickFormElement($this, 'field1_10', $qaPhoneDate, False, true);
    $qaPhoneDate1 = CRM_Core_BAO_CustomField::getCustomFieldID('Have you previously Donated/Contributed');
    CRM_Core_BAO_CustomField::addQuickFormElement($this, 'field_2_11', $qaPhoneDate1, False,true);
		$this->addElement('text','first_name',ts('First Name:'),array('value'=>$result['values'][$contactID]['first_name']));
		$this->addElement('text','last_name',ts('Last Name:'),array('value' => $result['values'][$contactID]['last_name']));
		$this->addElement('text','email',ts('Email:'),array('value'=>$result['values'][$contactID]['email']));
		$this->addElement('text','phone',ts('Phone'),array('value'=>$result['values'][$contactID]['phone']));
		 $this->assign('field1_10',$res['values'][$contactID]['custom_8']);
		 $this->assign('field_2_11',$res['values'][$contactID]['custom_7']);
		 $this->assign('contactID',$contactID);
		$buttons = array(
		array(
			'type' => 'submit',
			'name' => ts('Save'),
			'subName' => 'view',
			'isDefault' => TRUE,
			),
		   );
		$this->addButtons($buttons);
	}
	
	
	function postProcess(){
		$session = &CRM_Core_Session::singleton();
		$contactID = $session->get('userID');
		$params1 = $this->controller->exportValues($this->_name);
		 
			$params = array(
			'display_name'=> $params1['first_name'].' '.$params1['last_name'],
			'first_name'=>$params1['first_name'],
			'last_name'=>$params1['last_name'],
			'contact_type'=>'Individual',
			'custom_7'=>$params1['field_2_11'],
			'custom_8'=>$params1['field1_10'],
			'api.email.create'=>array(
				'contact_id' => '$value.id',
				'email' => $params1['email'],
			),
			'api.phone.create'=>array(
				'contact_id' => '$value.id',
				'is_primary' => 1,
				'is_billing' => '',
				'mobile_provider_id' => '',
				'phone' => $params1['phone'],
				'phone_ext' => '',
				'phone_numeric' =>$params1['phone'],
				'phone_type_id' => '1',
			),
			'contact_id' =>	$contactID,
		);	
		
		
			$result = civicrm_api3('contact','create',$params);
		
		
		if($result){
			$finalUrl = "civicrm/Mypage/view/Contact&contactid=".$result['id']."";
			
			drupal_goto($finalUrl);
		}
	}
}
