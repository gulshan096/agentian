<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends CI_Controller
{
	    function __construct()
		{
			parent::__construct();
			$this->load->model('AuthenticationModel');
			$this->AuthenticationModel->customer_checklogin();
			$this->load->model('LocationModel');
			$this->load->model('customer/PropertyModel');
			$this->load->model('CategoryModel');
			$this->load->model('mobile/PostFilterModel');
		}

        public function manageproperty()
		{
		
			echo $this->PropertyModel->manageproperty();
		}
        
        public function updateproperty()
		{
			echo $this->PropertyModel->updateproperty();
		}
		
		public function buy_property($id)
		{
			$data = array();
		    $seo  = array();
			$seo['title']			      =	  "Buy - ".APP_NAME;
			$seo['description']		      =	  "".APP_NAME;
			$data['seo']		   	      =	  $seo;
			
			$data['category']             =   $this->CategoryModel->getAllCategory();
			$data['state']                =   $this->LocationModel->getState();
		    $data['getOneProperty']       =   $this->PropertyModel->getOneProperty($id);
		
            $this->load->view('user/property/buy_property', $data);
		}
		
		public function sell_property($id)
		{
			$data = array();
		    $seo  = array();
			$seo['title']			      =	  "Sell Property - ".APP_NAME;
			$seo['description']		      =	  "".APP_NAME;
			$data['seo']		   	      =	  $seo;
			$data['category']             =   $this->CategoryModel->getAllCategory();
			$data['state']                =   $this->LocationModel->getState();
			$data['getOneProperty']       =   $this->PropertyModel->getOneProperty($id);
            $this->load->view('user/property/sell_property', $data);
		}
        
        public function landlord_property($id)
		{
			$data = array();
		    $seo  = array();
			$seo['title']			      =	  "Landlord Property - ".APP_NAME;
			$seo['description']		      =	  "".APP_NAME;
			$data['seo']		          =	  $seo;
			$data['category']             =   $this->CategoryModel->getAllCategory();
			$data['getOneProperty']       =   $this->PropertyModel->getOneProperty($id);
			$data['state']                =   $this->LocationModel->getState();
            $this->load->view('user/property/landlord_property', $data);
		}
        
        public function lessor_property($id)
		{
			$data = array();
		    $seo  = array();
			$seo['title']			      =	  "Lessor Property - ".APP_NAME;
			$seo['description']		      =	  "".APP_NAME;
			$data['seo']		   	      =	  $seo;
			$data['category']             =   $this->CategoryModel->getAllCategory();
			$data['getOneProperty']       =   $this->PropertyModel->getOneProperty($id);
			$data['state']                =   $this->LocationModel->getState();
            $this->load->view('user/property/lessor_property', $data);
		}

        public function tenant_property($id)
		{
		
			$data = array();
		    $seo  = array();
			$seo['title']			      =	  "Tenant Property - ".APP_NAME;
			$seo['description']		      =	  "".APP_NAME;
			$data['seo']		   	      =	  $seo;
			$data['category']             =   $this->CategoryModel->getAllCategory();
			$data['getOneProperty']       =   $this->PropertyModel->getOneProperty($id);
			$data['state']                =   $this->LocationModel->getState();
            $this->load->view('user/property/tenant_property', $data);
		}
        
        public function lessee_property($id)
		{
			$data = array();
		    $seo  = array();
			$seo['title']			      =	  "Lessee Property - ".APP_NAME;
			$seo['description']		      =	  "".APP_NAME;
			$data['seo']		   	      =	  $seo;
			$data['category']             =   $this->CategoryModel->getAllCategory();
			$data['state']                =   $this->LocationModel->getState();
			$data['getOneProperty']       =   $this->PropertyModel->getOneProperty($id);
            $this->load->view('user/property/lessee_property', $data);
			
		}
		    	
}

