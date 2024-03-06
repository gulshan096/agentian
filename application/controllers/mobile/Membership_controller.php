<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

	    class Membership_controller extends CI_Controller
		{

			function __construct()
			{
				parent::__construct();
				$this->load->model('mobile/Membership_model');
			}
				
			function manage_membership_plan()  
			{
				echo $this->Membership_model->manage_membership_plan();     
			}
			
			function get_all_membership_plan()  
			{
				echo $this->Membership_model->get_all_membership_plan();     
			}

            function get_one_membership_plan()  
			{
				echo $this->Membership_model->get_one_membership_plan();     
			}
			
			function remove_membership_plan()  
			{
				echo $this->Membership_model->remove_membership_plan();     
			}
            		
		}