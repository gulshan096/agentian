<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Users extends CI_Controller
	{

		function __construct()
		{
				parent::__construct();
				$this->load->model(array('AuthenticationModel','UsersModel'));
				$this->AuthenticationModel->checklogin();
				$this->load->helper('common_helper');
		}
					
		public function view($aid)
		{ 
					// echo "ksdjgoisgho";
					
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['administrator']	 =	$this->UsersModel->GetUsers($aid);
					//if(empty($data['administrator']))
						{
							if(isset($_POST['administrator']))
								{
									$data['administrator'] = $_POST['administrator'];
									//	echo "<pre>"; print_r($data['administrator']);  echo "</pre>"; exit(0);
								}
						}
				$data['GetUsers']  	 	=	$this->UsersModel->GetUsers();
				$data['AddUsers']		=	$this->UsersModel->AddUsers();
				$data['openform']		=	$aid; 
				$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				$this->load->view("admin/users/user_list",$data);
		}
		
		
		public function allusers($id)
		{
			   
			    
				
				$data          =  array();
				$seo           =  array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['openform']		=	$id;
				$data['getallUser']	    =	$this->UsersModel->getallUser();
				$data['getOneUser']	    =	$this->UsersModel->getOneUser($id);
				$this->load->view("admin/users/all_users",$data);
		}
		
		public function buyer($id)
		{
			
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['openform']		=	$id;
				
				$this->load->view("admin/users/buyer",$data);
		}
		
		public function seller($id)
		{
			
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['openform']		=	$id;
				
				$this->load->view("admin/users/seller",$data);
		}
		
		
		public function update_profile()
		{
			echo $this->UsersModel->update_profile();
		}
		
		public function enquire()
		{
			    $data = array();
				$seo  = array();
				$seo['title']			=	"Enquire list - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['enquire_list']	=	$this->db->get('contacts')->result_array();
				$this->load->view("admin/enquire",$data);
		}
						
	}
?>