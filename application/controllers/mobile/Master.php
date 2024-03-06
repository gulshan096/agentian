        <?php

            defined('BASEPATH') OR exit('No direct script access allowed');

            class Master extends CI_Controller
	        {

				function __construct()
				{
					parent::__construct();
					$this->load->model('AuthenticationModel');
							$this->load->model('mobile/App_AuthenticationModel');
					$this->load->helper('common_helper');
				}
				
			    public function GetStates()
				{
					$senddata				=	array();
					$senddata['status']		=	1;
					$senddata['data']		=	$this->db->query(" SELECT id,name FROM `loc_states` where country_id = 101 ORDER BY `loc_states`.`name` ASC ")->result_array(); 
					$senddata['message']	=	"States List";
					echo json_encode($senddata);
						
				}
				
				
			    public function GetCities()
				{
					$state_id = $this->input->post("state_id");
					if(!empty($state_id))
					{
						$state_id	=	" state_id = '4040' ";
					} 
					else 
					{
						$state_id	=	1;
					}
					$senddata		=	array();
					$senddata['status']		=	1;
					$senddata['data']		=	$this->db->query(" SELECT id,name FROM `loc_cities` WHERE status = 1 AND $state_id ")->result_array(); 
					$senddata['message']	=	"States List";
					echo json_encode($senddata);
				}
				
			    public function GetProducts()
				{
					$this->App_AuthenticationModel->checklogin();
					$this->load->model('ProductsModel');
					$senddata		=	array();
					$senddata['status']		=	1;
					$senddata['data']		=	$this->ProductsModel->GetProducts(0,1,"pid,title,description,image,unit,price,'KG' as unitname,'INR' as currency,1 as qty"); 
					$senddata['message']	=	"Product List";
					echo json_encode($senddata);
						
				}
				
			    public function GetCatalogues()
				{
					$this->App_AuthenticationModel->checklogin();
					$this->load->model('CatalogueModel');
					$senddata		=	array();
					$senddata['status']		=	1;
					$senddata['data']		=	$this->CatalogueModel->GetCatalogue(0,1,"cid,title,description,image,file");
					$senddata['message']	=	"Catalogues List";
					echo json_encode($senddata);
						
				}
				
			    public function GetSchemes()
				{
					$this->App_AuthenticationModel->checklogin();
					$this->load->model('TradersModel');
					$senddata		=	array();
					$senddata['status']		=	1;
					$senddata['data']		=	$this->TradersModel->GetSchemes(0,1,"sid,quantity,bulkRate,tenure,rateDiscount,cashDiscount");
					$senddata['message']	=	"Schemes List";
					echo json_encode($senddata);
						
				}
									
	        }
	    ?>