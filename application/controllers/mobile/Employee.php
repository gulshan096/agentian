<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

	    class Employee extends CI_Controller
		{

			function __construct()
			{
				parent::__construct();
				$this->load->model(array('AuthenticationModel','TradersModel'));
				$this->load->model('mobile/App_AuthenticationModel');
				$this->load->helper('common_helper');
			}
				
			function add_checkinout()  
			{
				$this->App_AuthenticationModel->checklogin();	
				echo $this->TradersModel->add_checkinout();     
			}	
		}