<?php
require APPPATH . 'libraries/REST_Controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends REST_Controller
{

	function __construct()
		{
			parent::__construct();
			$this->load->model(array('AuthenticationModel','OrdersModel'));
			$this->load->model('mobile/App_AuthenticationModel');
			$this->load->helper('common_helper');
		}
				
	public function create()
		{
			$this->App_AuthenticationModel->checklogin();				
				echo $this->OrdersModel->create();
		}

	public function getlist()
		{
			$this->App_AuthenticationModel->checklogin();				
			echo $this->OrdersModel->getlist();
		}
		
	public function getdetails()
		{
			$this->App_AuthenticationModel->checklogin();				
			echo $this->OrdersModel->getdetails();
		}		
					
}
