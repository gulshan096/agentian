    <?php

		defined('BASEPATH') OR exit('No direct script access allowed');
	    class Authentication extends CI_Controller
		{

			    function __construct()
				{
					parent::__construct();
					$this->load->model('AuthenticationModel');
					$this->load->model('PropertyModel');
					// $this->load->helper('common_helper');
					$this->load->model('UsersModel');
				}
				
			    public function sendOtp()
				{
					echo $this->UsersModel->sendOtp();
				}
				
				public function verifyOtp()
				{
					echo $this->UsersModel->verifyOtp();
				}
				public function user_logout()
				{
					$this->session->sess_destroy();
					redirect("login");
				}
				
				public function admin_logout()
				{
					$this->session->sess_destroy();
					redirect("administration");
				}
				
				public function dologin()
				{			
					echo $this->AuthenticationModel->dologin();	
				}
			
			    public function login()
				{
					$data = array();
					$seo  = array();
					$seo['title']		=	"Admin Login - ".APP_NAME;
					$seo['description']	=	"Login here to access Admin Panel of ".APP_NAME;
					$data['seo']		=	$seo;
					
					$checklogin = $this->session->userdata();
					if(isset($checklogin['aid']) && $checklogin['role'] == 1 )
					{
						$previousPage = $_SERVER['HTTP_REFERER'];
                        redirect($previousPage);
					}
					else
					{
						$this->load->view("admin/authentication/login",$data);
					}	
				}
				
			    public function dashboard()
				{
					$this->AuthenticationModel->checklogin();
					
					$data = array();
					$seo  = array();
					$seo['title']		    =	"Admin Dashboard - ".APP_NAME;
					$seo['description']  	=	"Login here to access Admin Panel of ".APP_NAME;
					$data['seo']        	=	$seo;
					$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
					$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
					$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
					$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					$data['totalBuyRequest']      = $this->PropertyModel->totalBuyRequest();
					$data['totalSellRequest']     = $this->PropertyModel->totalSellRequest();
					$data['totalRentRequest']     = $this->PropertyModel->totalRentRequest();
					$data['totalLesseeRequest']   = $this->PropertyModel->totalLesseeRequest();
					$data['totalLessorRequest']   = $this->PropertyModel->totalLessorRequest();
					$data['totalLandlordRequest'] = $this->PropertyModel->totalLandlordRequest();
					$data['latestRequest']        = $this->PropertyModel->latestRequest();
					$data['latestBlog']           = $this->PropertyModel->latestBlog();
					$data['latestWishlist']       = $this->PropertyModel->latestWishlist();
					$this->load->view("admin/dashboard",$data);
				}
				
			    public function blank()
				{
					$this->AuthenticationModel->checklogin();
					$data = array();
					$seo = array();
					$seo['title']			=	"UC Admin - ".APP_NAME;
					$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
					$data['seo']			=	$seo;
					$data['sidemenu']		=	$this->load->view("admin/include/sidemenu",$data,true);
					$data['sidebarleft']	=	$this->load->view("admin/include/sidebar-left",$data,true);
					$data['sidebarright']	=	$this->load->view("admin/include/sidebar-right",$data,true);
					$data['footer']			=	$this->load->view("admin/include/footer",$data,true);
					$this->load->view("admin/blank",$data);
				}
				
				
				public function transaction()
				{
					$this->AuthenticationModel->checklogin();
					$data = array();
					$seo = array();
					$seo['title']			=	"Transaction - ".APP_NAME;
					$seo['description']		=	"Login here to access Admin Panel of ".APP_NAME;
					$data['seo']			=	$seo;
					
					
					$data['transaction'] =  $this->db->select('transaction.*,administrator.name,administrator.email,administrator.mobile ')
					                        ->join('administrator','administrator.aid = transaction.user_id','left')
											->get('transaction')->result_array();
											
					$this->load->view("admin/transaction",$data);
				}
		}
	?>