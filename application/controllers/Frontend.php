<?php

		defined('BASEPATH') OR exit('No direct script access allowed');
	    class Frontend extends CI_Controller
		{

			    function __construct()
				{
					parent::__construct();
					$this->load->model('mobile/PropertyModel');
					$this->load->model('mobile/SearchPropertyModel');
					$this->load->model('mobile/BlogModel');
					$this->load->model('mobile/CommanModel');
					$this->load->model('mobile/PostFilterModel');
					$this->load->model('LocationModel');
					$this->load->model('CategoryModel');
					$this->load->model('mobile/Chat_model');
					$this->load->model('AuthenticationModel');
				}
				
				public function getCategory()
				{
					$sendarray = array();
					$category = $this->CategoryModel->getAllCategory();
					
					if(count($category) > 0)
					{
						$sendarray['status'] = 1;
						$sendarray['message'] = "successfully get";
						$sendarray['data'] = $category;
					}
					else
					{
						$sendarray['status'] = 0;
						$sendarray['message'] = "not found";
						$sendarray['data'] =  array();
					}
					echo json_encode($sendarray);
				}
				
				public function getSubCategory()
				{
					$sendarray = array();
					$cid = $this->input->post('category');
					
				    $subcategory = $this->db->select('id,subcategory')
					               ->where('cat_id',$cid)
								   ->where('status',1)
					               ->get('subcategory')
					               ->result_array();
					
					if(count($subcategory) > 0)
					{
						$sendarray['status'] = 1;
						$sendarray['message'] = "successfully get";
						$sendarray['data'] = $subcategory;
					}
					else
					{
						$sendarray['status'] = 0;
						$sendarray['message'] = "not found";
						$sendarray['data'] =  array();
					}
					echo json_encode($sendarray);
				
				}
				
				public function getField()
				{
					$sendarray = array();
	
					
				    $fields = $this->db->select('id,field_name')
					      
								   ->where('status',1)
					               ->get('fields')
					               ->result_array();
					
					if(count($fields) > 0)
					{
						$sendarray['status'] = 1;
						$sendarray['message'] = "successfully get";
						$sendarray['data'] = $fields;
					}
					else
					{
						$sendarray['status'] = 0;
						$sendarray['message'] = "not found";
						$sendarray['data'] =  array();
					}
					echo json_encode($sendarray);
				}
				
				public function getChildCategory()
				{
					
					$sendarray = array();
					$finalarray = array();
				    $temp = array();
					
					$post  = $this->input->post();
					
					$cid  = $post['cid'];
					$sid  = $post['sid'];
					$fid  = $post['fid'];
					// $puid = $post['puid'];
					
					$query = $this->db->select('id,cc_name')
						     ->where('cid',$cid)
						     ->where('sid',$sid)
						     ->where('fid',$fid)
						     // ->where('pu_id',$puid)
						     ->get('field_data')
						     ->result_array();
							 
					if(count($query) > 0)
					{
						$sendarray['status'] = 1;
						$sendarray['message'] = "successfully get";
						$sendarray['data'] = $query;
					}
					else
					{
						$sendarray['status'] = 0;
						$sendarray['message'] = "not found";
						$sendarray['data'] =  array();
					}
					 echo json_encode($sendarray);
						    
				}
				
				public function account_delete()
				{
					$this->AuthenticationModel->customer_checklogin();
					 $data = array();
					 $seo  = array();
					 $seo['title']		=	"Delete Your Account - ".APP_NAME;
					 $seo['description']=	"Agentian is a premium real estate.".APP_NAME;
					 $data['seo']		=	$seo;
				     $this->load->view('frontend/account_delete',$data);	
				}
				
				public function delete_post()
				{
					$sendarray = array();
					$uid = $this->input->post('uid');
					
					$res = $this->db->where('aid',$uid)->update('administrator',['status'=> 0]);
					
					if($res == 1)
					{
						$sendarray['status'] = 1;
						$sendarray['message'] = "your account deleted";
					}
					else
					{
						$sendarray['status'] = 0;
						$sendarray['message'] = "something went wrong";
					}
					echo json_encode($sendarray);
				}				
				
				
				public function keyword_search()
				{
					echo $this->CommanModel->keyword_search();
				}
				
				public function post_property()
				{ 
					 $data = array();
					 $seo  = array();
					 $seo['title']		=	"Home - ".APP_NAME;
					 $seo['description']=	"Agentian is a premium real estate.".APP_NAME;
					 $data['seo']		=	$seo;
				     $this->load->view('frontend/property/add_property',$data);	
				}
				
				public function post_property_buy()
				{
					$this->AuthenticationModel->customer_checklogin();
										
					$data = array();
					$seo  = array();
					
					$seo['title']		          =	  "Home - ".APP_NAME;
					$seo['description']	          =	  "Agentian is a premium real estate.".APP_NAME;
					$data['seo']		          =	  $seo;
					$data['category']             =   $this->CategoryModel->getAllCategory();
					$data['state']                =   $this->LocationModel->getState();
				
					$this->load->view('frontend/property/user_buy',$data);
				}
	            
				
				public function post_property_sell()
				{
					$this->AuthenticationModel->customer_checklogin();
					
					$data = array();
					$seo  = array();
					$seo['title']		=	"Home - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$data['category']             =   $this->CategoryModel->getAllCategory();
					$data['state']                =   $this->LocationModel->getState();
		
				    $this->load->view('frontend/property/seller',$data);	
				}
				public function post_property_landlord()
				{
					$this->AuthenticationModel->customer_checklogin();
					
					$data = array();
					$seo  = array();
					$seo['title']		=	"Home - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$data['category']             =   $this->CategoryModel->getAllCategory();
					$data['state']                =   $this->LocationModel->getState();
					
				    $this->load->view('frontend/property/landlord',$data);	
				}
				public function post_property_lessee()
				{
					$this->AuthenticationModel->customer_checklogin();
					
					$data = array();
					$seo  = array();
					$seo['title']		=	"Home - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$data['category']             =   $this->CategoryModel->getAllCategory();
					$data['state']                =   $this->LocationModel->getState();
	
				    $this->load->view('frontend/property/user_lessee',$data);	
				}
				
				public function post_property_lessor()
				{
					$this->AuthenticationModel->customer_checklogin();
					
					$data = array();
					$seo  = array();
					$seo['title']		=	"Home - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$data['category']             =   $this->CategoryModel->getAllCategory();
					$data['state']                =   $this->LocationModel->getState();
					
				    $this->load->view('frontend/property/lessor',$data);	
				}
				
				public function post_property_tenant()
				{
					$this->AuthenticationModel->customer_checklogin();
					
					$data = array();
					$seo  = array();
					$seo['title']		=	"Home - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					
					$data['category']             =   $this->CategoryModel->getAllCategory();
					$data['state']                =   $this->LocationModel->getState();
					
				    $this->load->view('frontend/property/user_tenant',$data);	
				}
				
				public function home()
				{
					$data = array();
					$seo  = array();
					$seo['title']		=	"Home - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					
					$data['category']   =   $this->db->where('status',1)->get('category')->result_array(); 
					
					$fp =  json_decode($this->PropertyModel->getAllFeatureProperty(), true);
					$data['featured_property']  =  $fp['data'];
					
					$lfp =  json_decode($this->SearchPropertyModel->searchByUserCategory(1,5), true);
					$data['looking_for']  =  $lfp['data'];
					
					$afp =  json_decode($this->SearchPropertyModel->searchByUserCategory(2,5), true);
					$data['available_for']  =  $afp['data'];
					
					$blog = json_decode($this->BlogModel->getAllblog(), true);
					$data['blogs']  =  $blog['data'];
					
					$feedback = json_decode($this->CommanModel->getTestimonial(), true);
					$data['feedbacks']  =  $feedback['data'];
					
					$state = json_decode($this->PostFilterModel->getState(), true);
					$data['state']  =  $state['data'];
					
					$data['banner'] = $this->db->where('device',2)->get('banner')->row_array();
					$this->load->view("frontend/home",$data);
				}
				
				
				public function home_test()
				{
					$data = array();
					$seo  = array();
					$seo['title']		=	"Home - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					
					$fp =  json_decode($this->PropertyModel->getAllFeatureProperty(), true);
					$data['featured_property']  =  $fp['data'];
					
					$lfp =  json_decode($this->SearchPropertyModel->searchByUserCategory(1,5), true);
					$data['looking_for']  =  $lfp['data'];
					
					$afp =  json_decode($this->SearchPropertyModel->searchByUserCategory(2,5), true);
					$data['available_for']  =  $afp['data'];
					
					$blog = json_decode($this->BlogModel->getAllblog(), true);
					$data['blogs']  =  $blog['data'];
					
					$feedback = json_decode($this->CommanModel->getTestimonial(), true);
					$data['feedbacks']  =  $feedback['data'];
					
					$state = json_decode($this->PostFilterModel->getState(), true);
					$data['state']  =  $state['data'];
					
					$data['banner'] = $this->db->where('device',2)->get('banner')->row_array();
		
					$this->load->view("frontend/home_test",$data);
				}
				
				public function getMoreProperty()
				{
					$data = array();
					$seo  = array();
					$seo['title']		=	"All Properties - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					
					$id = $this->input->get('id');
					$gmp =  json_decode($this->SearchPropertyModel->searchByUserCategory($id), true);
					$data['getMoreProperty']  =  $gmp['data'];
					$this->load->view("frontend/get_more_property",$data);
				}
				
				public function property_details($property_id)
				{
					$data = array();
					$seo  = array();
					$seo['title']		=	"Property details - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					// $property_id = $this->input->get('property_id');
					$user_id     = $this->session->userdata('aid');
		
				    $data['property_id']  =  $property_id;
					$data['sender_id']    =  $user_id;
					$data['receiver_id']  =  $this->db->where('property_id',$property_id)->get('property')->row()->user_id;

					$gop =  json_decode($this->PropertyModel->getOnePropertyDetails($property_id), true);
					$data['property_details']  =  $gop['data'][0];
					
					$data['check_wishlist']    =  $this->CommanModel->check_wishlist($property_id,$user_id); 
					$this->load->view("frontend/propertyDetails",$data);
				}
				
				public function test()
				{
					echo $this->PropertyModel->test();
				}
				
				public function login()
				{
					$data = array();
					$seo  = array();
					$seo['title']		=	"login - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$this->load->view("frontend/login",$data);
				}
				
				public function verify_otp()
				{
					$data = array();
					$seo  = array();
					$seo['title']		=	"login - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$this->load->view("frontend/verify_otp",$data);
				}
				
				public function Search_property()
				{
					$data = array();
					$seo = array();
					$seo['title']		=	"Serach Property - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$this->load->view("frontend/search_property");
				}
				
				
				public function get_message_web()
				{
					$query =  $this->Chat_model->get_message();
					$id = $this->session->userdata('aid');
					$decode = json_decode($query, true);
					$chat =   $decode['data'];
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
					  $output .="<p ".$color.">".$row['message']."</p>";
								
					} 
					echo $output;
				}
				
				public function about_us()
				{
					$data = array();
				    $seo  = array();
					$seo['title']		=	"About us - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$data['about_us']   =   $this->db->where('name','about')->where('status',1)->get('pages')->row_array();
					$this->load->view("frontend/about_us",$data);
				}
				
				public function terms_condition()
				{
					$data = array();
				    $seo  = array();
					$seo['title']		=	"About us - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$data['terms_condition']   =   $this->db->where('name','term_condition')->where('status',1)->get('pages')->row_array();
					$this->load->view("frontend/terms_condition",$data);
				}
				
				public function privacy_policy()
				{
			
					$data = array();
				    $seo  = array();
					$seo['title']		=	"About us - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$data['privacy_policy']   =   $this->db->where('name','privacy_policy')->where('status',1)->get('pages')->row_array();
					$this->load->view("frontend/privacy_policy",$data);
				}
				
				public function help()
				{
					$data = array();
				    $seo  = array();
					$seo['title']		=	"Help - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$data['help']   =   $this->db->where('name','help')->where('status',1)->get('pages')->row_array();
	
					$this->load->view("frontend/help",$data);
				}
				
				public function contact()
				{
					$data = array();
				    $seo  = array();
					$seo['title']		=	"Contact - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
	
					$this->load->view("frontend/contact",$data);
				}
				
                public function enqueryFormSubmit()
				{
					echo $this->CommanModel->enqueryFormSubmit();
				}


                function delete_cache()
				{
					preg_match("/(\/index.php)(?<endpoint>\/[\w.-\/]*)/", 
					$_SERVER["HTTP_REFERER"], $result);
					$this->output->delete_cache($result["endpoint"]);
					redirect($result["endpoint"]);
				}				
			
		}