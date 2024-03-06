<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Traders extends CI_Controller
{

	function __construct()
		{
			parent::__construct();
			$this->load->model(array('AuthenticationModel','TradersModel'));
				$this->load->model('mobile/App_AuthenticationModel');
			$this->load->helper('common_helper');
		}
			
	public function Get_Trader_Types()
		{
			$this->App_AuthenticationModel->checklogin();
					
				$senddata		=	array();
					$senddata['status']		=	1;
					$senddata['data']		=	Get_Trader_Types();
					$senddata['message']	=	"Trader Type List";
			echo json_encode($senddata);
		}
				
	public function tradersearch()  
		{
			$this->App_AuthenticationModel->checklogin();
				$senddata		=	array();
					$senddata['status']		=	1;
					$senddata['message']	=	"Here are the Traders List."; 
					$senddata['data']		=	$this->TradersModel->GetParty(0,1,'tid,type,name,email,mobile,company',50);
			echo json_encode($senddata);
		}
		
	public function Create_Trader()
		{
			$this->App_AuthenticationModel->checklogin();
			
				$usertype	=	$this->input->post("usertype");
				
					if($usertype!="employee")
						{
							$senddata		=	array();
								$senddata['status']		=	0;
								$senddata['message']	=	"Create Trader can only for the Employee user, You are logged in as a Traders.";
							echo json_encode($senddata);
							return "";
						}
			
				echo $this->TradersModel->saverecords();
		}	


	public function GetMyCredit()
		{
			$this->App_AuthenticationModel->checklogin();
			
			
				$usertype	=	$this->input->post("usertype");
				
					if($usertype!="trader")
						{
							$senddata['message']	=	"Credit Will be only for the Traders user, You are logged in as a Employee.";
							echo json_encode($senddata);
							return "";
						}
				
			
				$this->load->model('TradersModel');
				
				$senddata		=	array();
					$senddata['status']		=	1;
						$GetPartyCredits	=	$this->TradersModel->GetPartyCredits(S_USERID);
						
						
						$details	=	array();
							$details['limit']				=	0;
							$details['outstanding']			=	0;
							$details['available']			=	0;
							$details['used_in_percentages']	=	0;
						
							if(!empty($GetPartyCredits))
								{
									$limit	=	isset($GetPartyCredits[S_USERID]['credit_limit'])?$GetPartyCredits[S_USERID]['credit_limit']:0;
									$credit	=	isset($GetPartyCredits[S_USERID]['credit'])?$GetPartyCredits[S_USERID]['credit']:0;
									$debit	=	isset($GetPartyCredits[S_USERID]['debit'])?$GetPartyCredits[S_USERID]['debit']:0;
								}
								
								
							$details['limit']				=	$limit;
							$details['available']			=	$limit+$credit-$debit;
							$details['outstanding']			=	$details['limit']-$details['available'];
							
								if(!empty($details['limit']))
									{
										$details['used_in_percentages']	=	$details['outstanding']/$details['limit']*100;
											$details['used_in_percentages'] = number_format($details['used_in_percentages'],2,'.','');
									}
						

				//	$senddata['GetPartyCredits']		=	$GetPartyCredits;
					$senddata['data']		=	$details;
					$senddata['message']	=	"Credit Details";
			echo json_encode($senddata);
		}
		
					
}
