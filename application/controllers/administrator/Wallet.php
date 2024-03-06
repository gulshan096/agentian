<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends CI_Controller
{

	    function __construct()
		{
			parent::__construct();
			$this->load->model(array('AuthenticationModel','UsersModel','PropertySettingModel','CategoryModel'));
			$this->AuthenticationModel->checklogin();
			$this->load->helper('common_helper');
		}

		public function manageWallet()
		{
			$sendarray = array();
			$sendarray['status']  = 0;
            $sendarray['message'] = "something went wrong.";
			$post_val  = $this->input->post();
			
			if(!empty($post_val['id']))
			{
				$post_val['updated_at'] = date("Y-m-d H:i:s");
				$this->db->where('id',$post_val['id'])->update('wallet_system',$post_val);
                $sendarray['status']  = 1;
				$senddata['redurl']   = base_url("administrator/pages/wallet");
                $sendarray['message'] = "updated successfully.";
			}
			else
			{
				$data = $this->db->get('wallet_system')->result_array();
				
				if(count($data) > 0)
				{
				    $sendarray['status']  = 0;
				    $senddata['redurl']   = base_url("administrator/pages/wallet");
                    $sendarray['message'] = "already created you can edit.";
				}
				else
				{
					$this->db->insert('wallet_system',$post_val);
				    $sendarray['status']  = 1;
				    $senddata['redurl']   = base_url("administrator/pages/wallet");
                    $sendarray['message'] = "created successfully.";
				}
				
			}
			echo json_encode($sendarray);
		}
				
		public function wallet($id)
		{ 
			$data = array();
			$seo  = array();
		    $seo['title']			=	"Admin Wallet - ".APP_NAME;
			$seo['description']		=	"Wallet system  ".APP_NAME;
			$data['seo']		   	=	$seo;
			
			if($id !== 0)
			{
			   $data['edit_wallet']		=	$this->db->where('id',$id)->get('wallet_system')->row_array();;
			}
			$data['wallet_system']  =	$this->db->get('wallet_system')->result_array();
			$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
			$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
			$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
			$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
			$this->load->view("admin/wallet/wallet",$data);
		}

        public function referal_code($id)
		{ 
			$data = array();
			$seo  = array();
		    $seo['title']			=	"Admin Wallet - ".APP_NAME;
			$seo['description']		=	"Wallet system  ".APP_NAME;
			$data['seo']		   	=	$seo;
			
			if($id !== 0)
			{
			   $data['edit_referal']		=	$this->db->where('id',$id)->get('referal_code')->row_array();;
			}
			$data['referal_system']  =	$this->db->get('referal_code')->result_array();
			
			$this->load->view("admin/referal_code/manage_referal",$data);
		}


        public function manage_referal_code()
		{
			$sendarray = array();
			$sendarray['status']  = 0;
            $sendarray['message'] = "something went wrong.";
			$post_val  = $this->input->post();
			
			if(!empty($post_val['id']))
			{
				$post_val['updated_at'] = date("Y-m-d H:i:s");
				$this->db->where('id',$post_val['id'])->update('referal_code',$post_val);
                $sendarray['status']  = 1;
				$senddata['redurl']   = base_url("administrator/referal_code");
                $sendarray['message'] = "updated successfully.";
			}
			else
			{
				$data = $this->db->get('referal_code')->result_array();
				
				if(count($data) > 0)
				{
				    $sendarray['status']  = 0;
				    $senddata['redurl']   = base_url("administrator/referal_code");
                    $sendarray['message'] = "already created you can edit.";
				}
				else
				{
					$this->db->insert('referal_code',$post_val);
				    $sendarray['status']  = 1;
				    $senddata['redurl']   = base_url("administrator/referal_code");
                    $sendarray['message'] = "created successfully.";
				}
				
			}
			echo json_encode($sendarray);
		}		
}

