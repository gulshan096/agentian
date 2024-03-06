<?php   
defined('BASEPATH') OR exit('No direct script access allowed');

	class Pro_Setting extends CI_Controller
	{
		
		function __construct()
			{
				parent::__construct();
				$this->load->model(array('AuthenticationModel','UsersModel'));
				$this->AuthenticationModel->checklogin();
				$this->load->helper('common_helper');
			}
			
			
			public function addZoneType($id)
			{
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['openform']		=	$id; 
				
				// $data['getAllZoneType']  =   $this->PropertySettingModel->getAllZoneType();
				// $data['getOneZoneType']  =   $this->PropertySettingModel->getOneZoneType($id);
				
				$this->load->view('admin/propertysetting/zone-type', $data);
			}

			public function manageZone()
			{
				echo $this->PropertySettingModel->manageZone();
			}
	}

?>