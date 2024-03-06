    <?php
        Class LocationModel extends CI_Model
		{
			function __construct()
			{
					parent::__construct();
			}
			
			public function getAllState()
			{
				return $this->db->get('loc_states')->result_array();	
			}
            public function getAllCity()
			{
				$this->db->select('id,name,status');
				return $this->db->get('loc_cities')->result_array();	
			}

            public function getState()
			{
				return $this->db->select('id,name')
								->order_by("name", "asc")
								->get('loc_states')
								->result_array();	
			}

            public function getCityByState()
			{
				$stateId       = $this->input->post('stateId');
				$property_city = $this->input->post('property_city');
				$query = $this->db->select('id,name')->where('state_id',$stateId)->order_by("name", "asc")->get('loc_cities')->result_array();
								 
				$output = '<option value="">select</option>'; 
			  
			    foreach($query as $row)
			    {
				    if($property_city != null && $property_city == $row['id'])
					{
						$output .='<option value="'.$row['id'].'" selected>'.$row['name'].'</option>'; 
					}
					else
					{
					    $output .='<option value="'.$row['id'].'" >'.$row['name'].'</option>'; 	
					}	
			    } 
				return json_encode($output, true);
			}			
		}
		
	?>