<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends CI_Controller
{
	    function __construct()
		{
			parent::__construct();
			$this->load->model(array('AuthenticationModel','UsersModel','PropertySettingModel','PropertyModel','LocationModel','CategoryModel'));
			$this->load->model('mobile/PostFilterModel');
		
			$this->AuthenticationModel->checklogin();
			$this->load->helper('common_helper');
		}

		public function saverecords()
		{
			echo $this->PropertyModel->savedata();
		}
				
		public function view($id)
		{ 
				$this->AuthenticationModel->checklogin();	
				$data = array();
				$seo  = array();
				$seo['title']			=	"Admin Dashboard - ".APP_NAME;
				$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
				$data['seo']		   	=	$seo;
				$data['property']	  	 	=	$this->PropertyModel->GetProperty($id);
				$data['GetProperty']  	 	=	$this->PropertyModel->GetProperty();
				//$data['users']	  	=	$this->UsersModel->GetUsers($id);
				//$data['GetUsers']  	=	$this->UsersModel->GetUsers();
				//$data['AddUsers']		=	$this->UsersModel->AddUsers();
				//$data['AddProducts']	=	$this->ProductsModel->AddProducts();
				$data['openform']		=	$id; 
				$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
				$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
				$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
				$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
				$this->load->view("admin/property/list",$data);
		}

        public function propertyadd()
		{
			$data = array();
		    $seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			
            $this->load->view('admin/property/add_property', $data);
		}
		
		
		   public function deleteImage()
		   {
    			if($this->input->post('id'))
    			{
                    $id = $this->input->post('id'); 
                    $delete = $this->PropertyModel->deleteImage($id); 
                    if($delete)
                    { 
                        $status = 'ok';  
                    } 
                } 
                echo $status;die; 
		   }
		
		public function getPropertyImage()
		{
			    $id = $this->input->post('property_id');
				$data =  $this->PropertyModel->getPropertyImage($id);
				
				$output =  "<tr></tr>";
               
			    $index = 0;
				foreach($data['images'] as $item)
				{
				  
				   $index++;
				   $output .="<tr>".
				   
				   "<td class='' colspan=''><label for='doc_".$index."'><i class='fa fa-plus ms'></i></label></td>".
				   "<td style='display:none; visibility:none;' class='target' colspan='' ><input  type='file' id='doc_".$index."' class='form-control' name='doc[]' onchange='getImage(this.value,".$index.");'></td>".
				   "<td class='' colspan=''><textarea style='border:none; outline:none;' id='display_image_".$index."' name='old_doc[]' readonly>$item</textarea></td>".
				   "<td><a href='javascript:void(0)' class='' id='rm'><i class='fa text-danger fa-times-circle fa-2x'></i></a></td>".
				   "</tr>";
				}
				
				echo $output;
		}
        
        public function buy_property($id)
		{
			$data = array();
		    $seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['category']             =   $this->CategoryModel->getAllCategory();
			$data['state']                =   $this->LocationModel->getState();
	       
		    $data['getOneProperty']       =   $this->PropertyModel->getOneProperty($id);
            $this->load->view('admin/property/buy_property', $data);
		}
        
        public function sell_property($id)
		{
			$data = array();
		    $seo  = array();
			$seo['title']			      =	  "Admin Dashboard - ".APP_NAME;
			$seo['description']		      =	  "Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	      =	  $seo;
			$data['category']             =   $this->CategoryModel->getAllCategory();
			$data['state']                =   $this->LocationModel->getState();
			$data['getOneProperty']       =   $this->PropertyModel->getOneProperty($id);
            $this->load->view('admin/property/sell_property', $data);
		}
        
        public function landlord_property($id)
		{
			$data = array();
		    $seo  = array();
			$seo['title']			      =	  "Admin Dashboard - ".APP_NAME;
			$seo['description']		      =	  "Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		          =	  $seo;
			$data['category']             =   $this->CategoryModel->getAllCategory();
			$data['getOneProperty']       =   $this->PropertyModel->getOneProperty($id);
			$data['state']                =   $this->LocationModel->getState();
			
            $this->load->view('admin/property/landlord_property', $data);
		}
        
        public function lessor_property($id)
		{
			
			$data = array();
		    $seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['category']             =   $this->CategoryModel->getAllCategory();
			$data['getOneProperty']       =   $this->PropertyModel->getOneProperty($id);
			$data['state']                =   $this->LocationModel->getState();
			
            $this->load->view('admin/property/lessor_property', $data);
		}

        public function tenant_property($id)
		{
			$data = array();
		    $seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['category']             =   $this->CategoryModel->getAllCategory();
			
			$data['getOneProperty']       =   $this->PropertyModel->getOneProperty($id);
			$data['state']                =   $this->LocationModel->getState();
            $this->load->view('admin/property/tenant_property', $data);
		}
        
        public function lessee_property($id)
		{
			$data = array();
		    $seo  = array();
			$seo['title']			=	"Admin Dashboard - ".APP_NAME;
			$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
			$data['seo']		   	=	$seo;
			$data['category']             =   $this->CategoryModel->getAllCategory();
			$data['state']                =   $this->LocationModel->getState();
			$data['getOneProperty']       =   $this->PropertyModel->getOneProperty($id);
            $this->load->view('admin/property/lessee_property', $data);
		}

        public function manageproperty()
		{
			echo $this->PropertyModel->manageproperty();
		}
        
        public function updateproperty()
		{
			echo $this->PropertyModel->updateproperty();
		}		
}

