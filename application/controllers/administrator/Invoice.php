<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Invoice extends CI_Controller
{

	function __construct()
		{
			parent::__construct();
			$this->load->model(array('AuthenticationModel','UsersModel','InvoiceModel'));
			$this->load->helper('common_helper');
		}
		
	public function saverecords()
		{
			echo $this->InvoiceModel->saverecords();
		}
				
	public function view($inv_id)
		{ 
			$this->AuthenticationModel->checklogin();	
			$data = array();
			$seo  = array();
			$seo['title']			=	"Manage Invoice - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['administrator']	 =	$this->UsersModel->GetUsers($inv_id);
				//if(empty($data['administrator']))
					{
						if(isset($_POST['administrator']))
							{
								$data['administrator'] = $_POST['administrator'];
								//	echo "<pre>"; print_r($data['administrator']);  echo "</pre>"; exit(0);
							}
					}
						if(!empty($inv_id))
							{
								$data['invoice']  	 	=	$this->InvoiceModel->GetInvoice($inv_id);
							}
			$data['GetInvoice']  	 	=	$this->InvoiceModel->GetInvoice();
			//$data['AddCatalogue']		=	$this->CatalogueModel->AddCatalogue();
			$data['openform']		=	$inv_id;
			$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
			$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
			$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
			$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
			$this->load->view("admin/invoice/list",$data);
		}
					
}