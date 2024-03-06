<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
	class SearchProperty extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('mobile/SearchPropertyModel');
		}
				
		public function searchProperty()
		{
			echo $this->SearchPropertyModel->searchProperty();
		}

        public function searchByUserCategory()
		{
			echo $this->SearchPropertyModel->searchByUserCategory();
		}	    	
	}