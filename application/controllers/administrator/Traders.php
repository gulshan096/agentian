<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Traders extends CI_Controller
{

	function __construct()
		{
			parent::__construct();
			$this->load->model(array('AuthenticationModel','TradersModel'));
			$this->load->helper('common_helper');
		}
				
	public function tradersearch()  
		{
			$this->TradersModel->tradersearch();
		}
		
	public function saverecords()
		{
			echo $this->TradersModel->saverecords();
		}
	
	public function view($tid)
		{ 
			$this->AuthenticationModel->checklogin();	
			$data = array();
			$seo  = array();
				$seo['title']			=	"View All Traders - ".APP_NAME;
				
					if(!empty($tid))
						{
							$seo['title']			=	"New Trader Registration - ".APP_NAME;
						}
				
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['traders']	  	 	=	$this->TradersModel->GetParty($tid);
			
				if(!empty($data['traders']) && is_numeric($tid) && !empty($tid))
					{
						$seo['title']			=	"Update ". $data['traders']['name']." - ".APP_NAME;
					}
			
			$data['GetDealers']  	 	=	$this->TradersModel->Getparty();
			$data['openform']		=	$tid; 
			
			
					$data['seo']		   	=	$seo;
					$data['get_states'] = $this->AuthenticationModel->get_states();	
			$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
			$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
			$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
			$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
			$this->load->view("admin/traders/list",$data);
		}
		
	public function credits($tid)
		{ 
			$this->AuthenticationModel->checklogin();	
			$data = array();
			$seo  = array();
			$seo['title']			=	"Credit Management for Traders - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['tid']		   	=	$tid;
			$data['seo']		   	=	$seo;
			$data['AddPartyCredits']  	=	$this->TradersModel->AddPartyCredits();
			$data['GetPartyTransaction']  	=	$this->TradersModel->GetPartyTransaction($tid);
			$data['GetDealers']  	=	$this->TradersModel->GetPartyCredits();
			$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
			$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
			$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
			$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
			$this->load->view("admin/traders/credits",$data);
		}
		
	public function schemes($action)
		{ 
			$this->AuthenticationModel->checklogin();	
			$data = array();
			$seo  = array();
			$seo['title']			=	"Scheme Management for Traders - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['schemes']  		=	$this->TradersModel->GetSchemes($action);
			$data['GetSchemes']  	=	$this->TradersModel->GetSchemes();
			//$data['AddSchemes']  	=	$this->TradersModel->AddSchemes($sid,$status);
			$data['openform']		=	$action;  
			$data['get_states'] 	= 	$this->AuthenticationModel->get_states();	
			$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
			$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
			$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
			$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
			$this->load->view("admin/traders/schemes",$data);
		}
		
		public function saveSchemes()
		{
			echo $this->TradersModel->AddSchemes();
		}
				
					
}
