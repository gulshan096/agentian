<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{

	function __construct()
		{
			parent::__construct();
			$this->load->model(array('AuthenticationModel','UsersModel','PagesModel'));
			$this->load->helper('common_helper');
		}

		public function saverecords()
		{
			echo $this->PagesModel->saverecords();
		}
				
		public function view($id)
		{ 
			$this->AuthenticationModel->checklogin();	
			$data = array();
			$seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
		    $data['seo']		   	=	$seo;
			$data['pages']	  	 	=	$this->PagesModel->GetPages($id);
			$data['GetPages']  	 	=	$this->PagesModel->GetPages();
			
		
			$data['openform']		=	$id; 
			$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
			$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
			$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
			$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
			$this->load->view("admin/pages/list",$data);
		}
       
	    // FAQ
        public function FAQ($id)
		{
			$data = array();
			$seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['openform']		=	$id; 
				
			$data['get_all_plan']  =   $this->PagesModel->getAllFaq();
			$data['get_one_plan']  =   $this->PagesModel->getOneFaq($id);
				
			$this->load->view('admin/pages/faq', $data);
		}

         // help
        public function help($id)
		{
			$data = array();
			$seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['openform']		=	$id; 
			$p = 'help';			
            $v = 'name';	
			$data['get_content']      =   $this->PagesModel->getPageContent($p,$v);
			$data['get_one_content']  =   $this->PagesModel->getOnePageContent($id);
				
			$this->load->view('admin/pages/help', $data);
		}

         // about
        public function about($id)
		{
			$data = array();
			$seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['openform']		=	$id; 
            
            $p = 'about';			
            $v = 'name';			
			
			$data['get_content']      =   $this->PagesModel->getPageContent($p,$v);
			$data['get_one_content']  =   $this->PagesModel->getOnePageContent($id);
				
			$this->load->view('admin/pages/about', $data);
		}
		
		// Term condition
		public function term_condition($id)
		{
			$data = array();
			$seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['openform']		=	$id; 
            
            $p = 'term_condition';			
            $v = 'name';			
			
			$data['get_content']      =   $this->PagesModel->getPageContent($p,$v);
			$data['get_one_content']  =   $this->PagesModel->getOnePageContent($id);
				
			$this->load->view('admin/pages/term_condition', $data);
		}
        // Term condition
		public function privacy_policy($id)
		{
			$data = array();
			$seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['openform']		=	$id; 
            
            $p = 'privacy_policy';			
            $v = 'name';			
			
			$data['get_content']      =   $this->PagesModel->getPageContent($p,$v);
			$data['get_one_content']  =   $this->PagesModel->getOnePageContent($id);
				
			$this->load->view('admin/pages/privacy_policy', $data);
		}
		
        // Banner
        public function banner($id)
		{
			$data = array();
			$seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['openform']		=	$id; 
				
			$data['get_all_banner']  =   $this->PagesModel->getAllBanner();
			$data['get_one_banner']  =   $this->PagesModel->getOneBanner($id);
				
			$this->load->view('admin/pages/banner', $data);
		}

        public function manageBanner()
		{
			echo $this->PagesModel->manageBanner();
		}

        public function managePages()
	    {
			echo $this->PagesModel->managePages();
		}
		
        public function manageFaq()
		{
			echo $this->PagesModel->manageFaq();
		}		
}

