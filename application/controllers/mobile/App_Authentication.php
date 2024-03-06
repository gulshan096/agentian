<?php
        require APPPATH.'libraries/REST_Controller.php';
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Credentials: true');

		defined('BASEPATH') OR exit('No direct script access allowed');

	    class App_Authentication extends CI_Controller
		{
	
			function __construct()
			{
				parent::__construct();
				$this->load->model('AuthenticationModel');
				$this->load->model('mobile/App_AuthenticationModel');
				$this->load->helper('common_helper');
				$rest = new REST_Controller();
			}
			
				
			public function logout()
			{	
				$this->App_AuthenticationModel->checklogin("logout");
				$senddata		=	array();
				$senddata['status']		=	1;
				$senddata['message']	=	"You are logged out.";
				echo json_encode($senddata);
			}
				
			public function checklogin()
			{
				$this->App_AuthenticationModel->checklogin();
				$senddata		=	array();
                $senddata['status']		=	1;
				$senddata['message']	=	"You are logged in.";
				echo json_encode($senddata);		
			}
				
			public function dologin() 
			{
				echo  $this->App_AuthenticationModel->dologin();
			}
		
		}
	
?>