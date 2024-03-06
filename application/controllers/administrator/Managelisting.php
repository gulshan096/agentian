<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
	class Managelisting extends CI_Controller
	{

		function __construct()
		{
		   parent::__construct();
		   $this->load->model('ManagelistingModel');
		}
		
        public function propertyAll()
		{
			$data = array();
			$seo  = array();
			
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			 
            $data['getRequestProperty'] = $this->ManagelistingModel->getRequestProperty('all');			 
		    $this->load->view('admin/property_request/all_property', $data);
		} 		
        public function propertyBuy()
		{
			$data = array();
			$seo  = array();
			
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			 
            $data['getRequestProperty'] = $this->ManagelistingModel->getRequestProperty(1);			 
		    $this->load->view('admin/property_request/property_buy', $data);
		} 
        
        public function propertySell()
		{
			$data = array();
			$seo  = array();
			
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			
			$data['getRequestProperty'] = $this->ManagelistingModel->getRequestProperty(2);
			
		    $this->load->view('admin/property_request/property_sell', $data);
		}	
		
		public function propertyLandlord()
		{
			$data = array();
			$seo  = array();
			
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			
			$data['getRequestProperty'] = $this->ManagelistingModel->getRequestProperty(3);
			
		    $this->load->view('admin/property_request/property_landlord', $data);
		}
        
		
		public function propertyLessor()
		{
			$data = array();
			$seo  = array();
			
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			
			$data['getRequestProperty'] = $this->ManagelistingModel->getRequestProperty(4);	
			
		    $this->load->view('admin/property_request/property_lessor', $data);
		}
        
		public function propertyRent()
		{
			$data = array();
			$seo  = array();
			
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			
			$data['getRequestProperty'] = $this->ManagelistingModel->getRequestProperty(5);
		    $this->load->view('admin/property_request/property_rent', $data);
		}
		
        public function propertyLease()
		{
			$data = array();
			$seo  = array();
			
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			
			$data['getRequestProperty'] = $this->ManagelistingModel->getRequestProperty(6);	
		    $this->load->view('admin/property_request/property_lease', $data);
		}
		
        
		
       	
	}
	
?>