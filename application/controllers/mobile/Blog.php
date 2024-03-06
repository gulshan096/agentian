<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

	    class Blog extends CI_Controller
		{

			function __construct()
			{
				parent::__construct();
				$this->load->model('mobile/BlogModel');
				$this->load->helper('common_helper');
			}
				
			function addblog()  
			{
				echo $this->BlogModel->addblog();     
			}
			
			function getAllblog()  
			{
				echo $this->BlogModel->getAllblog();     
			}

            function getOneblog()  
			{
				echo $this->BlogModel->getOneblog();     
			}	
		}