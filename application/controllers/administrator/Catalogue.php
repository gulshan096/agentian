<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Catalogue extends CI_Controller
{

	function __construct()
		{
			parent::__construct();
			$this->load->model(array('AuthenticationModel','UsersModel','CatalogueModel'));
			$this->load->helper('common_helper');
		}
		
	public function saverecords()
		{
			//echo '<script>alert(SaveRecords);</script>';
			echo $this->CatalogueModel->saverecords();
		}
				
	public function view($cid)
		{ 
			$this->AuthenticationModel->checklogin();	
			$data = array();
			$seo  = array();
			$seo['title']			=	"Manage Catalogue - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['administrator']	 =	$this->UsersModel->GetUsers($cid);
				//if(empty($data['administrator']))
					{
						if(isset($_POST['administrator']))
							{
								$data['administrator'] = $_POST['administrator'];
								//	echo "<pre>"; print_r($data['administrator']);  echo "</pre>"; exit(0);
							}
					}
			$data['catalogue']  	 	=	$this->CatalogueModel->GetCatalogue($cid);
			$data['GetCatalogue']  	 	=	$this->CatalogueModel->GetCatalogue();
			//$data['AddCatalogue']		=	$this->CatalogueModel->AddCatalogue();
			$data['openform']		=	$cid; 
			$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
			$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
			$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
			$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
			$this->load->view("admin/Catalogue/list",$data);
		}
					
}