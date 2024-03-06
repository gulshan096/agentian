<?php

		defined('BASEPATH') OR exit('No direct script access allowed');
	    class Dashboard extends CI_Controller
		{
			    function __construct()
				{
					parent::__construct();
					$this->load->model('AuthenticationModel');
					$this->load->model('mobile/CommanModel');
					$this->load->model('UsersModel');
					$this->load->model('mobile/Membership_model');
					$this->load->model('LocationModel');
					$this->AuthenticationModel->customer_checklogin();
				}
				
				public function referal_code()
				{
					$data    = array();
					$seo     = array();
					$userid  =  $this->session->userdata('aid');
					$seo['title']		 =	"Your Referal Code - ".APP_NAME;
					$seo['description']  =	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		 =	$seo;
				
	                $data['user_data'] =  $this->db->where('aid',$userid)->get('administrator')->row_array();
					                       
	
					$this->load->view("user/referal_code",$data);
				}
				
				public function transaction()
				{
					$userid  = $this->session->userdata('aid');
					
					$data    = array();
					$seo     = array();
					$seo['title']		 =	"Transaction - ".APP_NAME;
					$seo['description']  =	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		 =	$seo;
				
	                $data['transaction'] =  $this->db->select('transaction.*,administrator.name,administrator.email,administrator.mobile ')
					                        ->join('administrator','administrator.aid = transaction.user_id','left')
					                        ->where('user_id',$userid)
											->get('transaction')->result_array();
	
					$this->load->view("user/transaction",$data);
				}
				
				public function dashboard()
				{
	
					$userid  = $this->session->userdata('aid');
					
					$data    = array();
					$seo     = array();
					$seo['title']		=	"Serach Property - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$data['total_post'] =   count($this->db->where('user_id',$userid)->get('property')->result_array());
	
					
					$this->load->view("user/dashboard",$data);
				}
				
				public function success()
				{
					$data = array();
					$seo = array();
					$seo['title']		=	"Serach Property - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$this->load->view("user/success",$data);
				}
				
				public function wishlist($id)
				{
					$data = array();
					$seo = array();
					$seo['title']		=	"Wishlist - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					if($id == "looking_for")
					{
						$query  =   $this->CommanModel->getWishlist_web(1);
					}
					elseif($id == "available_for")
					{
						$query  =   $this->CommanModel->getWishlist_web(2);
					}
					
                    $decode             =   json_decode($query, true);					
					$data['wishlist']   =   $decode['data'];   
					$this->load->view("user/wishlist",$data);
				}
				
				public function my_profile()
				{
					$userid = $this->session->userdata('aid');
					$data = array();
					$seo = array();
					$seo['title']		=	"My Profile - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$data['getOneUser']	=	$this->UsersModel->getOneUser($userid);
					$data['state']      =   $this->LocationModel->getState();
					
        
					$this->load->view("user/profile/my_profile",$data);
				}
				
				public function update_profile()
				{
					echo $this->UsersModel->update_profile();
				}
				
				public function membership()
				{
					$userid = $this->session->userdata('aid');
					$data = array();
					$seo = array();
					$seo['title']		      =	"Membership - ".APP_NAME;
					$seo['description']	      =	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		      =	$seo;
					$data['getOneUser']	      =	$this->UsersModel->getOneUser($userid);
					$membership_plan          = json_decode($this->Membership_model->get_all_membership_plan(), true); 
					$data['membership_plan']  = $membership_plan['data']; 
					$this->load->view("user/membership/membership_list",$data);
				}
				
				public function my_membership()
				{
					$userid = $this->session->userdata('id');
					$data = array();
					$seo = array();
					$seo['title']		=	"My Membership - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$data['getOneUser']	 =	$this->UsersModel->getOneUser($userid);
					$this->load->view("user/membership/my_membership",$data);
				}
		}