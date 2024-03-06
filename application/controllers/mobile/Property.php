<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
	class Property extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('mobile/PropertyModel');
		}
		
        public function manageProperty()
		{
			echo $this->PropertyModel->manageProperty();
		}
		
		public function getOneProperty()
		{
			echo $this->PropertyModel->getOneProperty();
		}
		
		public function updateOneProperty()
		{
			echo $this->PropertyModel->updateOneProperty();
		}
		public function deleteProperty()
		{
			echo $this->PropertyModel->deleteProperty();
		}
        
		public function getAllFeatureProperty()
		{
			echo $this->PropertyModel->getAllFeatureProperty();
		}
		
		public function remove_property_image()
		{
			$sendarray = array();
			$id = $this->input->post('id');

			$query = $this->db->where('id',$id)->delete('property_images');
			
			if(!empty($query))
			{
				$sendarray['status']  = 1;
				$sendarray['message'] = "successfully removeed.";
			}
			else
			{
                $sendarray['status']  = 0;
				$sendarray['message'] = "something went wrong.";
			}
			echo json_encode($sendarray);
		}
	}