<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller
    {
		
		public function __construct()
			{
				parent::__construct();
					$this->load->helper("common_helper");
						$this->load->model(array('AuthenticationModel','CommonModel',));
			}
					
    	public function updatestatus()
			{
				$this->AuthenticationModel->checklogin();
					$table		=	$this->input->post("t");
					$index		=	$this->input->post("i");
					$status		=	$this->input->post("s");
					$value		=	$this->input->post("v");
					$array	=	array();
					$array['status']	=	$status;
					$this->db->where($index,$value);
					$this->db->update($table,$array);
					echo "1";				
			}	
			
			public function updatefeaturestatus()
			{
				$this->AuthenticationModel->checklogin();
					$table		=	$this->input->post("t");
					$index		=	$this->input->post("i");
					$status		=	$this->input->post("s");
					$value		=	$this->input->post("v");
					$array	=	array();
					$array['is_feature'] =	$status;
					$this->db->where($index,$value);
					$this->db->update($table,$array);
					echo "1";				
			}
				
			
	}

?>