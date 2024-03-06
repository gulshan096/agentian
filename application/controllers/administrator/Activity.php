<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller
{

	function __construct()
		{
			parent::__construct();
			$this->load->model(array('AuthenticationModel','CommonModel'));
			$this->load->helper('common_helper');
		}
				
	public function all_activity($view)
		{ 
			$this->AuthenticationModel->checklogin();	
			$data = array();
			$seo  = array();
			$seo['title']			=	"All Activity - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			// $data['users']	  	=	$this->UsersModel->GetUsers($id);
			$data['Get_activity']  	=	$this->CommonModel->Get_All_Activity($view);
			// $data['AddUsers']	=	$this->UsersModel->AddUsers();
		   	//$data['openform']		=	$id; 
			$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
			$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
			$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
			$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
			$this->load->view("all_activity.php",$data);
		}
		
	public function view($id)
		{ 
		    // echo "ksdjgoisgho";
			$this->AuthenticationModel->checklogin();	
			$data = array();
			$seo  = array();
			$seo['title']			=	"Admin Activity - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			// $data['users']	  	=	$this->UsersModel->GetUsers($id);
			$data['Getactivity']  	=	$this->CommonModel->Get_activity();
			// $data['AddUsers']	=	$this->UsersModel->AddUsers();
		   	//$data['openform']		=	$id; 
			$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
			$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
			$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
			$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
			$this->load->view("admin/activity.php",$data);
		}
					
}