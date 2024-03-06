<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Location extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model(array('AuthenticationModel','UsersModel','LocationModel'));
			// $this->AuthenticationModel->checklogin();
			$this->load->helper('common_helper');
		}

        public function getState($id)
		{
			$data = array();
			$seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['openform']		=	$id; 
				
			$data['states']           =   $this->LocationModel->getAllState();
			
			$this->load->view('admin/location/state', $data);
		}
		
		public function getCity($id)
		{
			$data = array();
			$seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['openform']		=	$id; 
			$data['cities']         =   $this->LocationModel->getAllCity();
			
			$this->load->view('admin/location/city', $data);
		}
		
		public function getCityByState()
		{
			echo $this->LocationModel->getCityByState();
		}
    }
?>