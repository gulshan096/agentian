<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{

	function __construct()
		{
			parent::__construct();
			$this->load->model(array('AuthenticationModel','UsersModel','PagesModel','CommentsModel','ContactModel'));
			$this->load->helper('common_helper');
		}

		public function saverecords()
		{
			echo $this->ContactModel->saverecords();
		}
				
		public function view($id)
			{ 
				$this->ContactModel->checklogin();	
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['contacts']	  	=	$this->ContactModel->GetContacts($id);
				$data['GetContacts']  	=	$this->ContactModel->GetContacts();
				$data['openform']		=	$id; 
				$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				$this->load->view("admin/contact/list",$data);
			}			
}

