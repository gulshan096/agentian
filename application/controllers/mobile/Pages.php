<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{

	function __construct()
		{
			parent::__construct();
			$this->load->model(array('PagesModel'));
		}

        public function getallfaq()
		{
			echo $this->PagesModel->getAllFaqForMobile();
		}

        public function getAllBannerForMobile()
		{
			echo $this->PagesModel->getAllBannerForMobile();
		}
    
        public function getPageByName()
		{
			echo $this->PagesModel->getPageByName();
		}		
}

