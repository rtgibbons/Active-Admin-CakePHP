<?php
class DashboardController extends ActiveAdminAppController {

	var $name = 'Dashboard';
	var $helpers = array('Html', 'Form');
	var $uses = array();
	
	function admin_index() {
		$this->redirect('dashboard');
	}
	
	function admin_dashboard() {
		
	}
}