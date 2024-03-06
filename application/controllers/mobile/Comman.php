<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

	    class Comman extends CI_Controller
		{

			function __construct()
			{
				parent::__construct();
				$this->load->model('mobile/CommanModel');
				$this->load->helper('common_helper');
			}
				
			function addToWishlist()  
			{
				echo $this->CommanModel->addToWishlist();     
			}
			
			function getWishlist()  
			{
				echo $this->CommanModel->getWishlist();     
			}

            function removeFromWishlist()  
			{
				echo $this->CommanModel->removeFromWishlist();     
			}
            function addFeedbackRating()  
			{
				echo $this->CommanModel->addFeedbackRating();     
			}	
            function getFeedbackRating()  
			{
				echo $this->CommanModel->getFeedbackRating();     
			}

            function addTestimonial()  
			{
				echo $this->CommanModel->addTestimonial();     
			}
			
			function getTestimonial()  
			{
				echo $this->CommanModel->getTestimonial();     
			}
			
			function updateUserToken()
			{
				echo $this->CommanModel->updateUserToken();
			}
				
		}