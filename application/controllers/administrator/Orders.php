<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller
{

	function __construct()
		{
			parent::__construct();
			$this->load->model(array('AuthenticationModel','UsersModel','ProductsModel','OrdersModel'));
			$this->load->helper('common_helper');
		}
				
	public function view($id)
		{ 
			$this->AuthenticationModel->checklogin();	
			$data = array();
			$seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['orders']	  	 	=	$this->OrdersModel->GetOrders($id);
			$data['GetOrders']  	 	=	$this->OrdersModel->GetOrders();
			$data['AddOrders']		=	$this->OrdersModel->AddOrders();
			$data['openform']		=	$id; 
			$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
			$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
			$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
			$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
			$this->load->view("admin/orders/list",$data);
		}

		public function view1($id)
		{ 
			$this->AuthenticationModel->checklogin();	
			$data = array();
			$seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['orders']	  	 	=	$this->OrdersModel->GetOrders($id);
			$data['GetOrders']  	 	=	$this->OrdersModel->GetOrders();
			$data['AddOrders']		=	$this->OrdersModel->AddOrders();
			$data['openform']		=	$id; 
			$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
			$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
			$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
			$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
			$this->load->view("admin/orders/NewOrder",$data);
		}
		
		public function view2($id)
		{ 
			$this->AuthenticationModel->checklogin();	
			$data = array();
			$seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['orders']	  	 	=	$this->OrdersModel->GetOrders($id);
			$data['GetOrders']  	 	=	$this->OrdersModel->GetOrders();
			$data['AddOrders']		=	$this->OrdersModel->AddOrders();
			$data['openform']		=	$id; 
			$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
			$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
			$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
			$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
			$this->load->view("admin/orders/OrderDetails",$data);
		}
					
}

