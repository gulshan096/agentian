<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller
{

	function __construct()
		{
			parent::__construct();
			$this->load->model(array('AuthenticationModel','UsersModel','PagesModel','CommentsModel'));
			$this->load->helper('common_helper');
		}

		public function saverecords()
		{
			echo $this->CommentsModel->saverecords();
		}
				
		public function list_all($id)
			{ 
				$this->AuthenticationModel->checklogin();	
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['GetComments']  	 	=	$this->CommentsModel->GetComments();
				
				$data['openform']		=	$id; 
				$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				$this->load->view("admin/comments/list",$data);
			}			
}

