<?php 
   class Email extends CI_Controller { 
 
      function __construct() { 
         parent::__construct();
         $this->load->model(array('AuthenticationModel','UsersModel','ProductsModel')); 
         $this->load->library('session'); 
         $this->load->helper('form'); 
      } 
		
      public function view($id){
         $this->load->helper('form'); 
         $this->load->view('email_form'); 
      } 
  
      public function send_mail() { 
         $from_email = "rpreeti6102@gmail.com"; 
         //$to_email = $this->input->post('email'); 
         $to_email ="preetiswamy69@gmail.com";

         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email, 'Preeti'); 
         $this->email->to($to_email);
         $this->email->subject('Email Test'); 
         $this->email->message('Testing the email class.'); 
   
         //Send mail 
         if($this->email->send()) 
         $this->session->set_flashdata("email_sent","Email sent successfully."); 
         else 
         $this->session->set_flashdata("email_sent","Error in sending Email."); 
         $this->load->view('email_form'); 
      } 
   } 
?>