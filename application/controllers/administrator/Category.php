<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Category extends CI_Controller
	{

			function __construct()
			{
				parent::__construct();
				$this->load->model(array('AuthenticationModel','UsersModel','CategoryModel'));
				$this->AuthenticationModel->checklogin();
				$this->load->helper('common_helper');
			}

			public function addCategory($id)
			{
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['openform']		=	$id; 
				
				$data['category_list']  =   $this->CategoryModel->getAllCategory();
				$data['getOneCategory']  =   $this->CategoryModel->getOneCategory($id);
				
				$this->load->view('admin/categories/add_category', $data);
			}

			public function managecategory()
			{
				echo $this->CategoryModel->managecategory();
			}
			
			
			public function addSubCategory($id)
			{
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['openform']		=	$id; 
				
				$data['subcategory_list']   =   $this->CategoryModel->getAllSubCategory();
				$data['getOneSubCategory']  =   $this->CategoryModel->getOneSubCategory($id);
				$data['getAllCategory']     =   $this->CategoryModel->getAllCategory();
				
				$this->load->view('admin/subcategory/add_sub_category', $data);
			}
            
            public function managesubcategory()
			{
				echo $this->CategoryModel->managesubcategory();
			}

            public function getAjaxSubCategory()
			{
				echo  $this->CategoryModel->getAjaxSubCategory();
			}			
	}

