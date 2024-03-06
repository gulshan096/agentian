<?php

		defined('BASEPATH') OR exit('No direct script access allowed');
	    class Search extends CI_Controller
		{

			    function __construct()
				{
					parent::__construct();
					$this->load->model('customer/SearchPropertyModel');
				}
				
				public function searchProperty()
				{
					$seo['title']		=	"Home - ".APP_NAME;
					$seo['description'] =	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					$search_result      =   $this->SearchPropertyModel->searchProperty();
					
					$res = json_decode($search_result, true);
					
					$count = count($res);
					
					$data['message']    =	$res['message'];
					$data['status']		=	$res['status'];
					$data['property']	=	$res['data'];
					$data['total_result']=  $count;
				    $this->load->view('frontend/search_property',$data);
					
				}
				
				public function getPropertyByRequester($id)
				{
					$data = array();
					$seo  = array();
					$seo['title']		=	"All Properties - ".APP_NAME;
					$seo['description']	=	"Agentian is a premium real estate.".APP_NAME;
					$data['seo']		=	$seo;
					
					$gmp =  json_decode($this->SearchPropertyModel->searchByUserCategory($id), true);
					$data['getMoreProperty']  =  $gmp['data'];
					$this->load->view("frontend/get_more_property",$data);
				}
					
		}