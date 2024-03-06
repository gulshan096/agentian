<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{
	
			function __construct()
			{
				parent::__construct();
				$this->load->model(array('AuthenticationModel','UsersModel','PostsModel'));
				$this->load->helper('common_helper');
				$this->load->model('mobile/BlogModel');
				$this->AuthenticationModel->checklogin();
			}
			
			public function saverecords()
			{
				echo $this->PostsModel->saverecords();
			}

			public function saverecords2()
			{
				echo $this->CategoryModel->saverecords();
			}

			public function saverecords3()
			{
				echo $this->TagModel->saverecords();
			}
				
            public function blog($id)
			{ 
			
			
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				
				$data['openform']		=	$id; 
				$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				
				$data['getAllPost']	    =	$this->PostsModel->getAllPost();
				$data['getOneBlog']  	=	$this->PostsModel->getOnePost($id);
				
				
			
				
				$this->load->view("admin/posts/list",$data);
			}
			
			public function  addblog()
			{
				echo $this->BlogModel->addblog();   
			}
			
		
			public function view1($id)
			{ 
				
				$data = array();
				$seo  = array();
				$seo['title']				=	"Admin Dashboard - ".APP_NAME;
				$seo['description']			=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   		=	$seo;
				$data['category']	  	 	=	$this->CategoryModel->GetCategory($id);
				$data['GetCategory']  	 	=	$this->CategoryModel->GetCategory();
				//$data['users']	  	 	=	$this->UsersModel->GetUsers($id);
				//$data['GetUsers']  	 	=	$this->UsersModel->GetUsers();
				//$data['AddUsers']			=	$this->UsersModel->AddUsers();
				//$data['AddProducts']		=	$this->ProductsModel->AddProducts();
				$data['openform']			=	$id; 
				$data['sidemenu']			=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']		=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']		=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']				=	$this->load->view("admin/include/footer",$data,true);
				$this->load->view("admin/posts/category",$data);
			}

			public function view2($id)
			{ 
			
				$data = array();
				$seo  = array();
				$seo['title']				=	"Admin Dashboard - ".APP_NAME;
				$seo['description']			=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   		=	$seo;
				$data['Tag']	  	 	=	$this->TagModel->GetTag($id);
				$data['GetTag']  	 	=	$this->TagModel->GetTag();
				//$data['users']	  	 	=	$this->UsersModel->GetUsers($id);
				//$data['GetUsers']  	 	=	$this->UsersModel->GetUsers();
				//$data['AddUsers']			=	$this->UsersModel->AddUsers();
				//$data['AddProducts']		=	$this->ProductsModel->AddProducts();
				$data['openform']			=	$id; 
				$data['sidemenu']			=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']		=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']		=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']				=	$this->load->view("admin/include/footer",$data,true);
				$this->load->view("admin/posts/tag",$data);
			}			
}

