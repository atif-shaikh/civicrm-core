<?php

class CRM_Mypage_Page_View_Contact extends CRM_Core_Page{
	
	function preProcess(){
		 $contactid= $_GET['contactid'];
		 $params = array(
		 'id' => $_GET['contactid'],
		 );
		 $result = civicrm_api3('contact', 'get', $params);
		 $this->assign('first_name',$result['values'][$contactid]['first_name']);
		 $this->assign('last_name',$result['values'][$contactid]['last_name']);
		 $this->assign('email', $result['values'][$contactid]['email']);
		 $this->assign('phone', $result['values'][$contactid]['phone']);
		 $params1 = array(
			'id' => 2,
			'entity_id' => 239,
		);
	}
	
	function run(){
		$this->preProcess();
		return parent::run();
	}
}
