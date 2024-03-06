<?php

		defined('BASEPATH') OR exit('No direct script access allowed');
	    class MyListing extends CI_Controller
		{

			    function __construct()
				{
					parent::__construct();
					$this->load->model('AuthenticationModel');
					$this->AuthenticationModel->customer_checklogin();
					$this->load->model('customer/SearchPropertyModel');
				}
				
				public function looking_for($id)
				{
				
				    $user_id = $this->session->userdata('aid');
					$data    = array();
					$seo     = array();
					
					$seo['title']		   =	"Serach Property - ".APP_NAME;
					$seo['description']	   =	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		   =	$seo;
					
					if($id == "buy")
					{
			
					    $loooking_for      =    $this->SearchPropertyModel->my_listing(1,$user_id);  	
					}
					elseif($id == "rent_in")
					{
			
						$loooking_for      =    $this->SearchPropertyModel->my_listing(5,$user_id);
					}
					elseif($id == "lease_in")
					{
						$loooking_for      =    $this->SearchPropertyModel->my_listing(6,$user_id);
					}
					
					$data['looking_for']   =    $loooking_for['data'] ;
					$this->load->view("user/mylisting/looking_for", $data);
				}
				
				public function available_for($id)
				{
		
					$user_id = $this->session->userdata('aid');
					$data    = array();
					$seo     = array();
					
					$seo['title']		   =	"Serach Property - ".APP_NAME;
					$seo['description']	   =	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		   =	$seo;
					
					if($id == "sell")
					{
					    $available_for     =    $this->SearchPropertyModel->my_listing(2,$user_id);  	
					}
					elseif($id == "rent_out")
					{
						$available_for     =    $this->SearchPropertyModel->my_listing(3,$user_id);
					}
					elseif($id == "lease_out")
					{
						$available_for     =    $this->SearchPropertyModel->my_listing(4,$user_id);
					}
				
					$data['available_for'] =    $available_for['data'];
					$this->load->view("user/mylisting/available_for", $data);
					
				}
				
				
				
		}