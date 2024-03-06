<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

	    class Membership_controller extends CI_Controller
		{

			function __construct()
			{
				parent::__construct();
				$this->load->model('Membership_model');
			}
			
			public function membership_plan($id)
			{
			    $data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['openform']		=	$id; 
				
				$data['get_all_plan']  =   $this->Membership_model->get_all_membership_plan();
				$data['get_one_plan']  =   $this->Membership_model->get_one_membership_plan($id);
				
				$this->load->view('admin/membership/manage_membership', $data);	
		    }
				
			public function manage_membership_plan()  
			{
				echo $this->Membership_model->manage_membership_plan();     
			}
			
			public function get_all_membership_plan()  
			{
				echo $this->Membership_model->get_all_membership_plan();     
			}

            public function get_one_membership_plan()  
			{
				echo $this->Membership_model->get_one_membership_plan();     
			}
			
			public function remove_membership_plan()  
			{
				echo $this->Membership_model->remove_membership_plan();     
			}
            		
		}