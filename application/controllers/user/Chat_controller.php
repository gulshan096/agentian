<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

	    class Chat_controller extends CI_Controller
		{
			function __construct()
			{
				parent::__construct();
				$this->load->model('AuthenticationModel');
				$this->AuthenticationModel->customer_checklogin();
				$this->load->model('mobile/Chat_model');
			}
				
			public function my_chat()
			{	
			    $seo  = array();
			    $data = array();
				$seo['title'] = "";
				$data['seo']=  $seo;
				$all_chat = $this->Chat_model->get_all_message();
			    $decode   =  json_decode($all_chat, true);
				$data['all_chat']=  $decode['data'];
				$this->load->view('user/chat/all_chat',$data);
			}
			
			public function get_message()
			{
				$query =  $this->Chat_model->get_message();
				$decode = json_decode($query, true);
				$chat =   $decode['data'];
				
				$id = $this->session->userdata('aid');
				$output = ""; 
			  
			    foreach($chat as $row)
			    {
				  if($row['id'] == $id)
				  {
					$color = "style='background-color:#E2F0D7 !important;color:black;' ";
				  }
				  else
				  {
					$color = "style='background-color:#fff !important;color:black;' ";
				  }
					  
				  $time = date('h:i:s', strtotime($row['created']));
				  $output .="<li class='sender'>".   
					        "<p ".$color." >".$row['message']."</p>".
					        "<span class='time'>".$time."</span>".
					        "</li>";
			    } 
				echo $output;
				
			}
			
			public function send_message()
			{
				echo  $this->Chat_model->send_message();			
			}
           
		}