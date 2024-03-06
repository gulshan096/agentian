<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Generalsetting extends CI_Controller
	{

			function __construct()
			{
				parent::__construct();
				$this->load->model(array('AuthenticationModel','UsersModel','CategoryModel'));
				$this->AuthenticationModel->checklogin();
				$this->load->helper('common_helper');
			}

			public function socialNetwork($id)
			{
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['openform']		=	$id; 
				
		
				$this->load->view('admin/generalsetting/social/add_social', $data);
			}

						
	}

