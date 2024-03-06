<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
	class Users extends CI_Controller
	{

		function __construct()
		{
		   parent::__construct();
		   $this->load->model('mobile/UsersModel');
		}
				
		public function verification()
		{
			echo $this->UsersModel->verification();
		}
        public function verificationCheck()
		{
			echo $this->UsersModel->verificationCheck();
		}
        public function editProfile()
		{
			echo $this->UsersModel->editProfile();
		}
        public function getOneUser()
		{
			echo $this->UsersModel->getOneUser();
		}
        
        public function transaction()
		{
			$sendarray = array();
			$sendarray['status']  = 0;
			$sendarray['message'] = "something went wrong.";
			$sendarray['data']    =  array();
			
			$post = $this->input->post();
			$query = $this->db->where('category',$post['category'])->where('user_id',$post['user_id'])->get('transaction')->result_array();
		
		    if(!empty($query))
			{
				$sendarray['status']  = 1;
				$sendarray['message'] = "get successfully";
				$sendarray['data']    = $query;
			}
			else
			{
				$sendarray['status']  = 0;
				$sendarray['message'] = "no transaction found";
				$sendarray['data']    =  array();
			}
			echo json_encode($sendarray);
		}		
		
		// public function verifyotp()
		// {
		      // echo $this->UsersModel->verifyotp();	
		// }
     		
	}
	
	
?>