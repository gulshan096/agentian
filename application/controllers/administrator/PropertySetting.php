<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class PropertySetting extends CI_Controller
	{
			function __construct()
			{
				parent::__construct();
				$this->load->model(array('AuthenticationModel','UsersModel','PropertySettingModel','CategoryModel'));
				$this->AuthenticationModel->checklogin();
				$this->load->helper('common_helper');
			}
	
		// Property Filter category
			public function addFilterCategory($id)
			{
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['openform']		=	$id; 
				
				$data['getAllFilterCategory']  =   $this->PropertySettingModel->getAllFilterCategory();
				$data['getFilterCategory']     =   $this->PropertySettingModel->getFilterCategory($id);
				
				$this->load->view('admin/propertysetting/filter_category', $data);
			}

			public function manageFilterCategory()
			{
				echo $this->PropertySettingModel->manageFilterCategory();
			}
		
		    // Property Filter Sub category
		 
	        public function addFilterSubCategory($id)
			{
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['openform']		=	$id; 
				
				$data['getAllFilterCategory']  =   $this->PropertySettingModel->getAllFilterCategory();
				$data['getAllFilterSubCategory']  =   $this->PropertySettingModel->getAllFilterSubCategory();
				$data['getFilterSubCategory']  =   $this->PropertySettingModel->getFilterSubCategory($id);
				
				$this->load->view('admin/propertysetting/filter_subcategory', $data);
			}

			public function manageFilterSubCategory()
			{
				echo $this->PropertySettingModel->manageFilterSubCategory();
			}
			
		    // Property Filter Child Category
		
			public function addFilterChildCategory($id)
			{
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['openform']		=	$id; 
				
				$data['getAllFilterCategory']       =   $this->PropertySettingModel->getAllFilterCategory();
				$data['getAllFilterChildCategory']  =   $this->PropertySettingModel->getAllFilterChildCategory();
				$data['getFilterChildCategory']     =   $this->PropertySettingModel->getFilterChildCategory($id);
				$data['getAllFilterSubCategory']    =   $this->PropertySettingModel->getAllFilterSubCategory();
				$this->load->view('admin/propertysetting/filter_child_category', $data);
			}

            public function manageFilterChildCategory()
			{
				echo $this->PropertySettingModel->manageFilterChildCategory();
			}
		
            public function getSubCategory()
			{
				$data =  $this->PropertySettingModel->getSubCategory();
				echo json_encode($data);
			}

            public function addCategory($id)
			{
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['openform']		=	$id; 
				
				$data['getAllCategory']  =   $this->CategoryModel->getAllCategory();
				$data['getCategory']     =   $this->CategoryModel->getCategory($id);
				$this->load->view('admin/propertysetting/category', $data);
			}

            public function manageCategory()
			{
				echo $this->CategoryModel->manageCategory();
			}

            public function addSubCategory($id)
			{
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['openform']		=	$id;  

                $data['getAllCategory']      =   $this->CategoryModel->getAllCategory();
				$data['getAllSubCategory']   =   $this->CategoryModel->getAllSubCategory();
				$data['getSubCategory']      =   $this->CategoryModel->getOneSubCategory($id);				
				$this->load->view('admin/propertysetting/subcategory',$data);
			}

            public function manageSubCategory()
			{
				echo $this->CategoryModel->manageSubCategory();
			}

            public function addChildcategory($id)
			{
			
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['openform']		=	$id;  

                $data['getAllCategory']       =   $this->CategoryModel->getAllCategory();
				$data['getAllSubCategory']    =   $this->CategoryModel->getAllSubCategory();
				
				$data['getChildCategory']     =   $this->CategoryModel->getChildCategory($id);
				$data['form_fields']          =   $this->CategoryModel->form_fields($id);
				
				$data['property_user']        =   $this->CategoryModel->property_user();
				
				$data['getAllChildCategory']  =   $this->CategoryModel->getAllChildCategory();
                $data['getAllField']  =   $this->CategoryModel->getAllField();					
				$this->load->view('admin/propertysetting/child_category',$data);
			     	
			}
			
			public function manageChildCategory()
			{
				echo $this->CategoryModel->manageChildCategory();
			}
			
			
			public function addForm_field($id)
			{
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['openform']		=	$id;  
				$data['getField']     =   $this->CategoryModel->getField($id);				
				$data['getAllField']  =   $this->CategoryModel->getAllField();				
				$this->load->view('admin/propertysetting/form_field',$data);
			}
			
			public function manageFormField()
			{
				echo $this->CategoryModel->manageFormField();
			}
			
			
			// Delete
			
			
			
			public function delete_category($id)
			{
			    $this->CategoryModel->delete_category($id);
				redirect('administrator/category');
			}
			
			public function delete_subcategory($id)
			{
			    $this->CategoryModel->delete_subcategory($id);
				redirect('administrator/subcategory');
			}
			
			public function delete_chid_category($id)
			{
			    $this->CategoryModel->delete_chid_category($id);
				redirect('administrator/childcategory');
			}
			
			public function delete_fields($id)
			{
				 $this->CategoryModel->delete_fields($id);
				 redirect('administrator/form_field');
			}

            		
	}

