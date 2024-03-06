<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
	class PostFilter extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('mobile/PostFilterModel');
		}

		public function getChildBySubCatId()
		{
			echo $this->PostFilterModel->getChildBySubCatId();
		}
        public function getSubCatByCatId()
		{
			echo $this->PostFilterModel->getSubCatByCatId();
		}
        public function getCityByStateId()
		{
			echo $this->PostFilterModel->getCityByStateId();
		}
        public function getState()
		{
			echo $this->PostFilterModel->getState();
		}
        
        public function getSubCategory()
		{
			echo $this->PostFilterModel->getSubCategory();
		}
        
        public function getSub()
		{
			echo $this->PostFilterModel->getSubCat();
		}

        public function getChildCategory()
		{
			echo $this->PostFilterModel->getChildCategory();
		}

        		
	}