<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

	    class Chat_controller extends CI_Controller
		{

			function __construct()
			{
				parent::__construct();
				$this->load->model('mobile/Chat_model');
			}
				
			function send_message()  
			{
				echo $this->Chat_model->send_message();     
			}
			
			function get_message()  
			{
				echo $this->Chat_model->get_message();     
			}
			function get_all_message()
			{
				echo $this->Chat_model->get_all_message();
			}

            
				
		}