    <?php
        Class PropertyModel extends CI_Model
		{
			function __construct()
		    {
				parent::__construct();
				$this->load->helper('common_helper');
		
			}
			public function manageProperty()
			{
				
		        $sendarray = array(); 
				$property = array();
				$property_address = array();
				$property_images = array();
				$data = $this->input->post();
				
				$wallet  = $this->db->select('wallet_bonus,post_price,')->where('status',1)->get('wallet_system')->row_array();
				$last_av_bal = $this->db->where('user_id',$data['user_id'])->get('transaction')->last_row()->available;
				
		   	
				// $file_path = FCPATH.'test.txt';
				// file_put_contents($file_path, json_encode($data));
				// die();
			
				if(!empty($data))
				{
                   
					if($data['request_from'] ==  2 || $data['request_from'] ==  3 || $data['request_from'] == 4)
					{
					   $property['requested_for'] = 2;
					}
					elseif($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
					{
					   $property['requested_for'] = 1;
					}
					if(isset($data['building_name']) && !empty($data['building_name']))
					{
						$property['building_name']      =  $data['building_name'];
					}
					if(isset($data['dimension']) && !empty($data['dimension']))
					{
						$property['dimension']    =  $data['dimension'];
					}
					
					if(isset($data['dimension_front']) &&!empty($data['dimension_front']))
					{
						$property['dimension_front']          =  $data['dimension_front'];
					}
					if(isset($data['dimension_depth']) &&!empty($data['dimension_depth']))
					{
						$property['dimension_depth']          =  $data['dimension_depth'];
					}
					if(isset($data['dimension_measure']) &&!empty($data['dimension_measure']))
					{
						$property['dimension_measure']          =  $data['dimension_measure'];
					}
					if(isset($data['listing_by']) && !empty($data['listing_by']))
					{
						$property['listing_by']    =  $data['listing_by'];
					}
					if(isset($data['is_negotiable']) && !empty($data['is_negotiable']))
					{
						$property['is_negotiable']          =  $data['is_negotiable'];
					}
					if(isset($data['property_type']) && !empty($data['property_type']))
					{
						$property['property_type']          =  $data['property_type'];
					}
					if(isset($data['property_area']) && !empty($data['property_area']))
					{
						$property['property_area']          =  $data['property_area'];
					}
					if(isset($data['property_state']) && !empty($data['property_state']))
					{
						$property['property_state']          =  $data['property_state'];
					}
					if(isset($data['property_city']) && !empty($data['property_city']))
					{
						$property['property_city']          =  $data['property_city'];
					}
					if(isset($data['sell_type']) && !empty($data['sell_type']))
					{
						$property['sell_type']              =  $data['sell_type'];
					}
					if(isset($data['request_from']) && !empty($data['request_from']))
					{
						$property['request_from']           =  $data['request_from'];
					}
					if(isset($data['property_address1']) && !empty($data['property_address1']))
					{
						$property['property_address1']  =  $data['property_address1'];
					}
					
					if(isset($data['property_address2']) && !empty($data['property_address2']))
					{
						$property['property_address2']   =  $data['property_address2'];
					}
					
					if(isset($data['property_address3']) && !empty($data['property_address3']))
					{
						$property['property_address3']  =  $data['property_address3'];
					}
					
					if(isset($data['project_name']) && !empty($data['project_name']))
					{
						$property['project_name']   =  $data['project_name'];
					}
					
					if(isset($data['map_url']) && !empty($data['map_url']))
					{
						$property['map_url']    =  $data['map_url'];
					}
					
					if(isset($data['measure']) && !empty($data['measure']))
					{
						$property['measure']           =  $data['measure'];
					}
					
					if(isset($data['rera_approved']) && !empty($data['rera_approved']))
					{
						$property['rera_approved']    =     $data['rera_approved'];
						$property['rera_no']          =     $data['rera_no'];
					}
					else
					{
						$property['rera_approved']    =  $data['rera_approved'];
					}
					
					if(isset($data['user_id']) && !empty($data['user_id']))
					{
						$property['user_id']           =  $data['user_id'];
					}
					
				    if(isset($data['floor']) && !empty($data['floor']))
					{
						$split_val =   split_my_data($data['floor']);
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_floor']    =  $split_val['min'];	
								$property['max_floor']    =  $split_val['max'];
							}
							else
							{
								$property['min_floor']    =  $split_val['max'];	
								$property['max_floor']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['lease_period']) && !empty($data['lease_period']))
					{
						$split_val =   split_my_data($data['lease_period']);
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_lease_duration']    =  $split_val['min'];	
								$property['max_lease_duration']    =  $split_val['max'];
							}
							else
							{
								$property['min_lease_duration']    =  $split_val['max'];	
								$property['max_lease_duration']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['rate']) && !empty($data['rate']))
					{
						$split_val =   split_my_data($data['rate']);
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_rate']    =  $split_val['min'];	
								$property['max_rate']    =  $split_val['max'];
							}
							else
							{
								$property['min_rate']    =  $split_val['max'];	
								$property['max_rate']    =  $split_val['max'];
							}
						}
					}
					
			        if(isset($data['carpet_area']) && !empty($data['carpet_area']))
					{
						$split_val =   split_my_data($data['carpet_area']);
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_carpet_area']    =  $split_val['min'];	
								$property['max_carpet_area']    =  $split_val['max'];
							}
							else
							{
								$property['min_carpet_area']    =  $split_val['max'];	
								$property['max_carpet_area']    =  $split_val['max'];
							}
						}
					}						
					
					
					if(isset($data['is_include_dg_ups']) && !empty($data['is_include_dg_ups']))
					{
						$property['is_include_dg_ups']  =  $data['is_include_dg_ups'];
					}
					if(isset($data['is_include_tax']) && !empty($data['is_include_tax']))
					{
					    $property['is_include_tax']     =  $data['is_include_tax'];
					}
					
					if(isset($data['buildup_area']) && !empty($data['buildup_area']))
					{
						$split_val =   split_my_data($data['buildup_area']);
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_buildup_area']    =  $split_val['min'];	
								$property['max_buildup_area']    =  $split_val['max'];
							}
							else
							{
								$property['min_buildup_area']    =  $split_val['max'];	
								$property['max_buildup_area']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['budget']) && !empty($data['budget']))
					{
						$split_val =   split_my_data($data['budget']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_budget']    =  $split_val['min'];	
								$property['max_budget']    =  $split_val['max'];
							}
							else
							{
								$property['min_budget']    =  $split_val['max'];	
								$property['max_budget']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['open_parking']) && !empty($data['open_parking']))
					{
						$split_val =   split_my_data($data['open_parking']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_open_parking']    =  $split_val['min'];  
								$property['max_open_parking']    =  $split_val['max'];
							}
							else
							{
								$property['min_open_parking']    =  $split_val['max'];  
								$property['max_open_parking']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['covered_parking']) && !empty($data['covered_parking']))
					{
						$split_val =   split_my_data($data['covered_parking']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_covered_parking']    =  $split_val['min'];    
								$property['max_covered_parking']    =  $split_val['max'];
							}
							else
							{
								$property['min_covered_parking']    =  $split_val['max'];    
								$property['max_covered_parking']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['ceiling_hight']) && !empty($data['ceiling_hight']))
					{
						$split_val =   split_my_data($data['ceiling_hight']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_ceiling_hight']    =  $split_val['min'];    
								$property['max_ceiling_hight']    =  $split_val['max'];
							}
							else
							{
								$property['min_ceiling_hight']    =  $split_val['max'];    
								$property['max_ceiling_hight']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['balcony']) && !empty($data['balcony']))
					{
						$split_val =   split_my_data($data['balcony']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_balcony']    =  $split_val['min'];    
								$property['max_balcony']    =  $split_val['max'];
							}
							else
							{
								$property['min_balcony']    =  $split_val['max'];    
								$property['max_balcony']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['plot_area']) && !empty($data['plot_area']))
					{
						$split_val =   split_my_data($data['plot_area']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_plot_area']    =  $split_val['min'];    
								$property['max_plot_area']    =  $split_val['max'];
							}
							else
							{
								$property['min_plot_area']    =  $split_val['max'];    
								$property['max_plot_area']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['bathroom']) && !empty($data['bathroom']))
					{
						$split_val =   split_my_data($data['bathroom']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_bathroom']    =  $split_val['min'];  
								$property['max_bathroom']    =  $split_val['max'];
							}
							else
							{
								$property['min_bathroom']    =  $split_val['max'];  
								$property['max_bathroom']    =  $split_val['max'];
							}
						}
					}
					

					
					if(isset($data['age']) && !empty($data['age']))
					{
						$split_val =   split_my_data($data['age']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_property_age']    =  $split_val['min'];  
								$property['max_property_age']    =  $split_val['max'];
							}
							else
							{
								$property['min_property_age']    =  $split_val['max'];  
								$property['max_property_age']    =  $split_val['max'];
							}
						}
					}
					
				
					if(isset($data['description']) && !empty($data['description']))
					{
					    $property['description']            =  $data['description'];
					}
					if(isset($data['available_from_date']) && !empty($data['available_from_date']))
					{
						$property['available_from_date']    =  $data['available_from_date'];
					}
					if(isset($data['available_from_week']) && !empty($data['available_from_week']))
					{
					    $property['available_from_week']    =  $data['available_from_week'];
					}
					
					if(isset($data['entrance_width']) && !empty($data['entrance_width']))
					{
						$property['entrance_width']         =  $data['entrance_width'];
					}
					
			        if(isset($data['lease_unit']) && !empty($data['lease_unit']))
					{
						$property['lease_unit']             =  $data['lease_unit'];
					}
					if(isset($data['lease_period']) && !empty($data['lease_period']))
					{
						$property['lease_period']           =  $data['lease_period'];
					}
	                
					if(isset($data['security_deposit']) && !empty($data['security_deposit']))
					{
						$property['security_deposit']       =  $data['security_deposit'];
					}
			        if(isset($data['maintenance_charge']) && !empty($data['maintenance_charge']))
					{
						$property['maintenance_charge']     =  $data['maintenance_charge'];
					}
					if(isset($data['rent_increase']) && !empty($data['rent_increase']))
					{
						$property['rent_increase']          =  $data['rent_increase'];
					}
	                if(isset($data['lockin_duration']) && !empty($data['lockin_duration']))
					{
						$property['lockin_duration']        =  $data['lockin_duration'];
					}
					if(isset($data['lockin_period']) && !empty($data['lockin_period']))
					{
						$property['lockin_period']          =  $data['lockin_period'];
					}
			        if(isset($data['water_charge']) && !empty($data['water_charge']))
					{
						$property['water_charge']           =  $data['water_charge'];
					}
					if(isset($data['electricity_charge']) && !empty($data['electricity_charge']))
					{
						$property['electricity_charge']     =  $data['electricity_charge'];
					}
					if(isset($data['latitude']) && !empty($data['latitude']))
					{
						$property['latitude']       =  $data['latitude'];
					}
							
					if(isset($data['longitude']) && !empty($data['longitude']))
					{
						$property['longitude']      =  $data['longitude'];
					}
					
					 $property['status']  =  1;
                     $this->db->insert('property',$property);
					 $property_id = $this->db->insert_id();
	
			
					$property_data = $this->db->where('property_id',$property_id)->get('property')->row_array();
				
					
					if(!empty($property_id))
					{
						if(isset($data['zone_type']) && !empty($data['zone_type']))
						{
							$decoded = json_decode($data['zone_type']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$zone_type['property_id']  =  $property_id;
								$zone_type['zone_type']  =  $decoded[$i];
								
								$this->db->insert('zone_type',$zone_type);
							}
						} 
						
						if(isset($data['located_near']) && !empty($data['located_near']))
						{
		
							$decoded = json_decode($data['located_near']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$located_near['property_id']  =   $property_id;
								$located_near['located_near']  =  $decoded[$i];
								
								$this->db->insert('located_near',$located_near);
							}
						}
						if(isset($data['available_from_week']) && !empty($data['available_from_week']))
						{
		
							$decoded = json_decode($data['available_from_week']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$available_from['property_id']     =  $property_id;
								$available_from['available_from']  =  $decoded[$i];
								
								$this->db->insert('available_from',$available_from);
							}
						}
						if(isset($data['available_for']) && !empty($data['available_for']))
						{
							$decoded = json_decode($data['available_for']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$available_for['property_id']  =  $property_id;
								$available_for['available_for']  =  $decoded[$i];
								
								$this->db->insert('available_for',$available_for);
							}
						}
						if(isset($data['construction_status']) && !empty($data['construction_status']))
						{
			
							$decoded = json_decode($data['construction_status']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$construction_status['property_id']  =          $property_id;
								$construction_status['construction_status']  =  $decoded[$i];
								
								$this->db->insert('construction_status',$construction_status);
							}
						}
						if(isset($data['furnishing_status']) && !empty($data['furnishing_status']))
						{
					
							$decoded = json_decode($data['furnishing_status']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$furnishing_status['property_id']  =  $property_id;
								$furnishing_status['furnishing_status']  =  $decoded[$i];
								
								$this->db->insert('furnishing_status',$furnishing_status);
							}
						}
						if(isset($data['amenties']) && !empty($data['amenties']))
						{
							
							$decoded = json_decode($data['amenties']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$amenities['property_id']  =  $property_id;
								$amenities['amenities']    =  $decoded[$i];
								
								$this->db->insert('amenities',$amenities);
							}
						}
						
						
						if(isset($data['facing']) && !empty($data['facing']))
						{
						 
						   $decoded = json_decode($data['facing']);
						   $filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$facing['property_id']  =  $property_id;
								$facing['facing']  =  $decoded[$i];
								
								$this->db->insert('facing',$facing);
							}
						}
						if(isset($data['bhk']) && !empty($data['bhk']))
						{
		
							$decoded = json_decode($data['bhk']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$bhk['property_id']  =  $property_id;
								$bhk['bhk']  =  $decoded[$i];
								
								$this->db->insert('bhk',$bhk);
							}
						}
						
						
						if(isset($data['suitable_for']) && !empty($data['suitable_for']))
						{
					
							$decoded = json_decode($data['suitable_for']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$suitable_for['property_id']  =  $property_id;
								$suitable_for['suitable_for']  =  $decoded[$i];
								
								$this->db->insert('suitable_for',$suitable_for);
							}
						}
						if(isset($data['flooring']) && !empty($data['flooring']))
						{
				
							$decoded = json_decode($data['flooring']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$flooring['property_id']  =  $property_id;
								$flooring['flooring']  =  $decoded[$i];
								
								$this->db->insert('flooring',$flooring);
							}
						}
						if(isset($data['property_status']) && !empty($data['property_status']))
						{
						
							$decoded = json_decode($data['property_status']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$property_status['property_id']  =  $property_id;
								$property_status['property_status']  =  $decoded[$i];
								
								$this->db->insert('property_status',$property_status);
							}
						}
						if(isset($data['hub']) && !empty($data['hub']))
						{
						
							$decoded = json_decode($data['hub']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$hub['property_id']  =  $property_id;
								$hub['hub']  =  $decoded[$i];
								
								$this->db->insert('hub',$hub);
							}
						}
	                }
					
					if(!empty($property_id))
					{
						if($data['request_from'] == 2 || $data['request_from'] == 3  || $data['request_from'] == 4 )
						{
						    if( isset($_FILES['property_image']['name'][0]) && !empty($_FILES['property_image']['name'][0]))
							{
								$filecount = count($_FILES['property_image']['name']);  
								for($i = 0; $i < $filecount; $i++)
								{
									$_FILES['file']['name']       = $_FILES['property_image']['name'][$i];
									$_FILES['file']['type']       = $_FILES['property_image']['type'][$i];
									$_FILES['file']['tmp_name']   = $_FILES['property_image']['tmp_name'][$i];
									$_FILES['file']['error']      = $_FILES['property_image']['error'][$i];
									$_FILES['file']['size']       = $_FILES['property_image']['size'][$i];
									

                                    $file = $_FILES['property_image']['tmp_name'][$i];
									// list($width, $height) = getimagesize($file);
						
									// if($width < "1900" || $width > "1900" || $height > "500" || $height < "500")
									// {
										// $senddata['message'] = "property image size must be 1900 x 500 pixels.";
										// $senddata['status'] = 0;
										// return json_encode($senddata);
									// }
									
									$folderName = date('m-Y');
									$pathToUpload = 'assets/property/images/' . $folderName;
									
									if ( ! file_exists($pathToUpload) )
									{
										$create = mkdir($pathToUpload, 0777);
										$createThumbsFolder = mkdir($pathToUpload . '/thumbs', 0777);
										if ( ! $create || ! $createThumbsFolder)
										return;
									}
													
										// File upload configuration
										$config['upload_path'] = $pathToUpload;
										$config['overwrite'] = TRUE;
										$config['allowed_types'] = 'jpg|jpeg|png|gif';

										// Load and initialize upload library
										$this->load->library('upload', $config);
										$this->upload->initialize($config);

										// Upload file to server
									if($this->upload->do_upload('file'))
									{
										// Uploaded file data
										$imageData = $this->upload->data();
										$property_images[$i]['property_id']          =   $property_id;
										$property_images[$i]['property_image']       =   $pathToUpload.'/'.$imageData['file_name'];
									}	
								}
								if(!empty($property_images))
								{
										$this->db->insert_batch('property_images', $property_images);
										$sendarray['status']            =  1;
										$sendarray['message']           =  'Success! successfully.';
													   
								}  
							}
                            else
							{
								
							}
                            
							$property_address['property_id']    =  $property_id;
							
							if(isset($data['map_location']) && !empty($data['map_location']))
							{
								$property_address['map_location']   =  $data['map_location'];
							}
							if(isset($data['locality']) && !empty($data['locality']))
							{
								$property_address['locality']       =  $data['locality'];
							}
							if(isset($data['pincode']) && !empty($data['pincode']))
							{
								$property_address['pincode']        =  $data['pincode'];
							}
							if(isset($data['city']) && !empty($data['city']))
							{
								$property_address['city']           =  $data['city'];
							}
							if(isset($data['state']) && !empty($data['state']))
							{
								$property_address['state']          =  $data['state'];
							}
							if(isset($data['address2']) && !empty($data['address2']))
							{
								$property_address['address2']       =  $data['address2'];
							}
							
							if(isset($data['latitude']) && !empty($data['latitude']))
							{
								$property_address['latitude']       =  $data['latitude'];
							}
							
							if(isset($data['longitude']) && !empty($data['longitude']))
							{
								$property_address['longitude']      =  $data['longitude'];
							}
							$this->db->insert('property_address', $property_address);				
						}
						else
						{
							
						}
					}
					if(!empty($property_data) || !empty($property_images) || !empty($property_address))
					{
						
						$debited = array(
									
									  'user_id'   => $data['user_id'],
									  'post_id'   => $property_id,
									  'debit'     => $wallet['post_price'],
									  'available' => $last_av_bal - $wallet['post_price']
	
									);
									
						        $this->db->insert('transaction',$debited);
					    $sendarray['status']    =  1;
						
						if($data['request_from'] ==  1 )
						{
							$sendarray['message']   =  "success successfully added buyer property .";
						}
						elseif($data['request_from'] ==  2)
						{
							$sendarray['message']   =  "success successfully added seller property .";
						}
						elseif($data['request_from'] ==  3)
						{
							$sendarray['message']   =  "success successfully added landlord property .";
						}
						elseif($data['request_from'] ==  4)
						{
							$sendarray['message']   =  "success successfully added lessor property .";
						}
						elseif($data['request_from'] ==  5)
						{
							$sendarray['message']   =  "success successfully added tenant property .";
						}
						elseif($data['request_from'] ==  6)
						{
							$sendarray['message']   =  "success successfully added lessee property .";
						}
					    
						if(!empty($property_data))
						{
						  $sendarray['property']   =  $property_data; 
						}
						if(!empty($property_images))
						{
						  $sendarray['property_images']   =  $property_images; 
						}
						if(!empty($property_address))
						{
						  $sendarray['property_address']   =  $property_address; 
						}
					}
					else
					{
						$sendarray['status']    =  0;
					    $sendarray['message']   =  "oops something went wrong";
					    $sendarray['data']      =  array();
					}
				}
				else
				{
					$sendarray['status']    =  0;
					$sendarray['message']   =  "oops all field required";
					$sendarray['data']      =  array();
				}
			    return json_encode($sendarray, true);
		    }

            public function getOneProperty($id=0)
			{
				$sendarray = array();
				$property  = array();
				$property_address = array();
				$property_images  = array();
				
				if(!empty($id))
				{
					$property_id      = $id;
				}
				else
				{
					$property_id      = $this->input->post('property_id');
				}
				
				
				if(!empty($property_id))
				{
					$query = $this->db->where('property_id',$property_id)->get('property')->result_array();
					
					if(!empty($query))
					{
						foreach($query as $row)
						{
							$row['property_link'] = base_url('property_details/'.$property_id);
                            if(!empty($row['requested_for']))
							{
								$row['requested_for'] = $row['requested_for'] ;
							}
                            if(!empty($row['request_from']))
							{
								$row['request_from'] = $row['request_from'];
							}
							
							if(!empty($row['property_id']))
							{
							    $flooring   =  $this->db->select('flooring')->where('property_id',$row['property_id'])->get('flooring')->result_array();
								if(!empty($flooring))
								{
									$fresh = array();
									foreach($flooring as $rw)
									{
									  $fresh[] = $rw['flooring'];	
									}
									$row['flooring'] = $fresh;
								}
								else
								{
									$row['flooring'] =  array();
								}
                                
								$property_status   =  $this->db->select('property_status')->where('property_id',$row['property_id'])->get('property_status')->result_array();
                                if(!empty($property_status))
								{
									$fresh = array();
									foreach($property_status as $rw)
									{
									  $fresh[] = $rw['property_status'];	
									}
									$row['property_status'] = $fresh;
								}
								else
								{
									$row['property_status'] =  array();
								}

                                $zone_type   =  $this->db->select('zone_type')->where('property_id',$row['property_id'])->get('zone_type')->result_array();	
                                if(!empty($zone_type))
								{
									$fresh = array();
									foreach($zone_type as $rw)
									{
									  $fresh[] = $rw['zone_type'];	
									}
									$row['zone_type'] = $fresh;
								}
								else
								{
									$row['zone_type'] =  array();
								} 
								
								$located_near   =  $this->db->select('located_near')->where('property_id',$row['property_id'])->get('located_near')->result_array();	
                                if(!empty($located_near))
								{
									$fresh = array();
									foreach($located_near as $rw)
									{
									  $fresh[] = $rw['located_near'];	
									}
									$row['located_near'] = $fresh;
								}
								else
								{
									$row['located_near'] =  array();
								} 
								
								$available_from   =  $this->db->select('available_from')->where('property_id',$row['property_id'])->get('available_from')->result_array();	
                                if(!empty($available_from))
								{
									$fresh = array();
									foreach($available_from as $rw)
									{
									  $fresh[] = $rw['available_from'];	
									}
									$row['available_from'] = $fresh;
								}
								else
								{
									$row['available_from'] =  array();
								}

                                $construction_status  =  $this->db->select('construction_status')->where('property_id',$row['property_id'])->get('construction_status')->result_array();
								if(!empty($construction_status))
								{
									$fresh = array();
									foreach($construction_status as $rw)
									{
									  $fresh[] = $rw['construction_status'];	
									}
									$row['construction_status'] = $fresh;
								}
								else
								{
									$row['construction_status'] =  array();
								}
                                
								$furnishing_status   =  $this->db->select('furnishing_status')->where('property_id',$row['property_id'])->get('furnishing_status')->result_array();
                                if(!empty($furnishing_status))
								{
									$fresh = array();
									foreach($furnishing_status as $rw)
									{
									  $fresh[] = $rw['furnishing_status'];	
									}
									$row['furnishing_status'] = $fresh;
								}
								else
								{
									$row['furnishing_status'] =  array();
								}

                                $bhk  =  $this->db->select('bhk')->where('property_id',$row['property_id'])->get('bhk')->result_array();	
                                if(!empty($bhk))
								{
									$fresh = array();
									foreach($bhk as $rw)
									{
									  $fresh[] = $rw['bhk'];	
									}
									$row['bhk'] = $fresh;
								}
								else
								{
									$row['bhk'] =  array();
								}

                                $amenities   =  $this->db->select('amenities')->where('property_id',$row['property_id'])->get('amenities')->result_array();
								if(!empty($amenities))
								{
									$fresh = array();
									foreach($amenities as $rw)
									{
									  $fresh[] = $rw['amenities'];	
									}
									$row['amenities'] = $fresh;
								}
								else
								{
									$row['amenities'] =  array();
								}
								
								$available_for   =  $this->db->select('available_for')->where('property_id',$row['property_id'])->get('available_for')->result_array();
								if(!empty($available_for))
								{
									$fresh = array();
									foreach($amenities as $rw)
									{
									  $fresh[] = $rw['available_for'];	
									}
									$row['available_for'] = $fresh;
								}
								else
								{
									$row['available_for'] =  array();
								}
                                
								$suitable_for   =  $this->db->select('suitable_for')->where('property_id',$row['property_id'])->get('suitable_for')->result_array();
                                if(!empty($suitable_for))
								{
									$fresh = array();
									foreach($suitable_for as $rw)
									{
									  $fresh[] = $rw['suitable_for'];	
									}
									$row['suitable_for'] = $fresh;
								}
								else
								{
									$row['suitable_for'] =  array();
								}

                                $hub   =  $this->db->select('hub')->where('property_id',$row['property_id'])->get('hub')->result_array();	
                                if(!empty($hub))
								{
									$fresh = array();
									foreach($hub as $rw)
									{
									  $fresh[] = $rw['hub'];	
									}
									$row['hub'] = $fresh;
								}
								else
								{
									$row['hub'] =  array();
								}

                                $facing  =  $this->db->select('facing')->where('property_id',$row['property_id'])->get('facing')->result_array();
								if(!empty($facing))
								{
									$fresh = array();
									foreach($facing as $rw)
									{
									  $fresh[] = $rw['facing'];	
									}
									$row['facing'] = $fresh;
								}
                                else
								{
									$row['facing'] =  array();
								}								
						    }
						
							
							$propertyImages = $this->db->select('id,property_image as image')->where('property_id',$row['property_id'])->get('property_images')->result_array();
							if(!empty($propertyImages))
							{
							  $fresh = array();
							  foreach($propertyImages as $rw)
							  {
								 array_push($fresh, $rw);
							  }	
                              $row['property_images'] = $fresh;							  
							}
							
							$row['propertyAddress'] = $this->db->select('property_address.map_location,property_address.locality,
							                   property_address.pincode,property_address.city,property_address.state,
											   property_address.address2,property_address.latitude,property_address.longitude,
											   property.building_name')
											   
							            ->join('property','property.property_id = property_address.property_id','left')
							            ->where('property_address.property_id',$row['property_id'])
							            ->get('property_address')->result_array();
						    
							
							
							$this->db->select('name,email,mobile,image');
							$this->db->where('aid',$row['user_id']);
							$row['administrator'] = $this->db->get('administrator')->result_array();
							
							$finalarray[]  =  $row;	
						}
						if(!empty($finalarray))
						{
							$sendarray['status']  =  1;
							$sendarray['message'] =  'successfully get property';
							$sendarray['data']    =  $finalarray;
						}
					}
					else
					{
					   $sendarray['status']  =  0;
					   $sendarray['message'] =  "oops could't find any property";
					   $sendarray['data']    =  array();	
					}
				}
				else
				{
					$sendarray['status']  =  0;
					$sendarray['message'] =  'oops property_id not select';
					$sendarray['data']    =  array();
				}
				return json_encode($sendarray, true);
			}
			
			public function getOnePropertyDetails($id=0)
			{
		
				$sendarray = array();
				$property  = array();
				$property_address = array();
				$property_images  = array();
				
		
				if(!empty($id))
				{
					$property_id      = $id;
				}
				else
				{
					$property_id      = $this->input->post('property_id');
				}
		
				if(!empty($property_id))
				{
					$query = $this->db->select('property.*,ls.name as state, lc.name as city')
					         ->join('loc_states as ls','ls.id = property.property_state','left')
				             ->join('loc_cities as lc','lc.id = property.property_city','left')
					         ->where('property_id',$property_id)
							 ->get('property')->result_array();

					if(!empty($query))
					{
						foreach($query as $row)
						{
						
							$row['property_link'] = base_url('property_details/'.$property_id);
							 
							$row['property_type'] = $this->db->select('subcategory')->where('id',$row['property_type'])->get('subcategory')->row()->subcategory;

                            if(!empty($row['listing_by']))
							{
														
                               $row['listing_by'] = $this->db->select('cc_name')->where('id',$row['listing_by'])->get('field_data')->row()->cc_name;
				            }
                            else
							{
								$row['listing_by'] = "";
							}							
							   
                            if(!empty($row['requested_for']))
							{
								$row['requested_for'] = $row['requested_for'];
							}
                            if(!empty($row['request_from']))
							{
								$row['request_from'] = $row['request_from'];
							}
							
							if(!empty($row['property_id']))
							{
									
								$flooring   =  $this->db->select('fd.cc_name as florings')
								               ->join('field_data as fd','fd.id=flooring.flooring','left')
								               ->where('flooring.property_id',$row['property_id'])
											   ->get('flooring')->result_array();
			
								if(!empty($flooring))
								{
									$fresh = array();
									foreach($flooring as $rw)
									{
									  $fresh[] = $rw['florings'];	
									}
									$row['flooring'] = $fresh;
								}
								else
								{
									$row['flooring'] =  array();
								}
                                
								
								
								$property_status   =  $this->db->select('fd.cc_name as pstatus')
								                         ->join('field_data as fd','fd.id=property_status.property_status','left')
								                         ->where('property_status.property_id',$row['property_id'])
														 ->get('property_status')->result_array();
                                if(!empty($property_status))
								{
									$fresh = array();
									foreach($property_status as $rw)
									{
									  $fresh[] = $rw['pstatus'];	
									}
									$row['property_status'] = $fresh;
								}
								else
								{
									$row['property_status'] =  array();
								}

                               	
								
								$zone_type   =  $this->db->select('fd.cc_name as ztype')
								                         ->join('field_data as fd','fd.id=zone_type.zone_type','left')
								                         ->where('zone_type.property_id',$row['property_id'])
														 ->get('zone_type')->result_array();
                                if(!empty($zone_type))
								{
									$fresh = array();
									foreach($zone_type as $rw)
									{
									  $fresh[] = $rw['ztype'];	
									}
									$row['zone_type'] = $fresh;
								}
								else
								{
									$row['zone_type'] =  array();
								} 

					            $located_near   =  $this->db->select('fd.cc_name as ln')
								                   ->join('field_data as fd','fd.id=located_near.located_near','left')
								                   ->where('located_near.property_id',$row['property_id'])
											       ->get('located_near')->result_array();	
												   
                                if(!empty($located_near))
								{
									$fresh = array();
									foreach($located_near as $rw)
									{
									  $fresh[] = $rw['ln'];	
									}
									$row['located_near'] = $fresh;
								}
								else
								{
									$row['located_near'] =  array();
								} 
								
								$available_from   =  $this->db->select('fd.cc_name as af')
								                         ->join('field_data as fd','fd.id=available_from.available_from','left')
								                         ->where('available_from.property_id',$row['property_id'])
														 ->get('available_from')->result_array();
								
								
                                if(!empty($available_from))
								{
									$fresh = array();
									foreach($available_from as $rw)
									{
									  $fresh[] = $rw['af'];	
									}
									$row['available_from'] = $fresh;
								}
								else
								{
									$row['available_from'] =  array();
								}

                                
								
								$construction_status   =  $this->db->select('fd.cc_name as csts')
								                         ->join('field_data as fd','fd.id=construction_status.construction_status','left')
								                         ->where('construction_status.property_id',$row['property_id'])
														 ->get('construction_status')->result_array();
								
								if(!empty($construction_status))
								{
									$fresh = array();
									foreach($construction_status as $rw)
									{
									  $fresh[] = $rw['csts'];	
									}
									$row['construction_status'] = $fresh;
								}
								else
								{
									$row['construction_status'] =  array();
								}
                                
								$furnishing_status   =  $this->db->select('fd.cc_name as fs')
								                         ->join('field_data as fd','fd.id=furnishing_status.furnishing_status','left')
								                         ->where('furnishing_status.property_id',$row['property_id'])
														 ->get('furnishing_status')->result_array();
								
								
                                if(!empty($furnishing_status))
								{
									$fresh = array();
									foreach($furnishing_status as $rw)
									{
									  $fresh[] = $rw['fs'];	
									}
									$row['furnishing_status'] = $fresh;
								}
								else
								{
									$row['furnishing_status'] =  array();
								}

                                
                                
								$bhk   =  $this->db->select('fd.cc_name as bh')
								          ->join('field_data as fd','fd.id=bhk.bhk','left')
								          ->where('bhk.property_id',$row['property_id'])
										  ->get('bhk')->result_array();
								
                                if(!empty($bhk))
								{
									$fresh = array();
									foreach($bhk as $rw)
									{
									  $fresh[] = $rw['bh'];	
									}
									$row['bhk'] = $fresh;
								}
								else
								{
									$row['bhk'] =  array();
								}

                                $amenities   =  $this->db->select('fd.cc_name as amen')
								                ->join('field_data as fd','fd.id=amenities.amenities','left')
								                ->where('amenities.property_id',$row['property_id'])
										        ->get('amenities')->result_array();
								if(!empty($amenities))
								{
									$fresh = array();
									foreach($amenities as $rw)
									{
									  $fresh[] = $rw['amen'];	
									}
									$row['amenities'] = $fresh;
								}
								else
								{
									$row['amenities'] =  array();
								}
								
								$available_for   =  $this->db->select('fd.cc_name as av_for')
								                     ->join('field_data as fd','fd.id=available_for.available_for','left')
								                     ->where('available_for.property_id',$row['property_id'])
												     ->get('available_for')->result_array();
								
								
								if(!empty($available_for))
								{
									$fresh = array();
									foreach($amenities as $rw)
									{
									  $fresh[] = $rw['av_for'];	
									}
									$row['available_for'] = $fresh;
								}
								else
								{
									$row['available_for'] =  array();
								}
                                
								$suitable_for   =  $this->db->select('fd.cc_name as sf')
								                   ->join('field_data as fd','fd.id=suitable_for.suitable_for','left')
								                   ->where('suitable_for.property_id',$row['property_id'])
												   ->get('suitable_for')->result_array();
								
								
                                if(!empty($suitable_for))
								{
									$fresh = array();
									foreach($suitable_for as $rw)
									{
									  $fresh[] = $rw['sf'];	
									}
									$row['suitable_for'] = $fresh;
								}
								else
								{
									$row['suitable_for'] =  array();
								}

       
								$hub   =  $this->db->select('fd.cc_name as hb')
								          ->join('field_data as fd','fd.id=hub.hub','left')
								          ->where('hub.property_id',$row['property_id'])
										  ->get('hub')->result_array();
										  
                                if(!empty($hub))
								{
									$fresh = array();
									foreach($hub as $rw)
									{
									  $fresh[] = $rw['hb'];	
									}
									$row['hub'] = $fresh;
								}
								else
								{
									$row['hub'] =  array();
								}

                                
								$facing   =  $this->db->select('fd.cc_name as fcng')
								             ->join('field_data as fd','fd.id=facing.facing','left')
								             ->where('facing.property_id',$row['property_id'])
											 ->get('facing')->result_array();
								if(!empty($facing))
								{
									$fresh = array();
									foreach($facing as $rw)
									{
									  $fresh[] = $rw['fcng'];	
									}
									$row['facing'] = $fresh;
								}
                                else
								{
									$row['facing'] =  array();
								}								
						    }
						
							
							$propertyImages = $this->db->select('property_image')->where('property_id',$row['property_id'])->get('property_images')->result_array();
							if(!empty($propertyImages))
							{
							  $fresh = array();
							  foreach($propertyImages as $rw)
							  {
								$fresh[] = $rw['property_image'];  
							  }	
                              $row['property_images'] = $fresh;							  
							}
							
							
							$this->db->select('property_address.map_location,property_address.locality,property_address.pincode,property_address.city,property_address.state,property_address.address2,property_address.latitude,property_address.longitude,property.building_name');
							$this->db->join('property','property.property_id = property_address.property_id','left');
							$this->db->where('property_address.property_id',$row['property_id']);
							$row['propertyAddress'] = $this->db->get('property_address')->result_array();
							
							$this->db->select('name,email,mobile,image');
							$this->db->where('aid',$row['user_id']);
							$row['administrator'] = $this->db->get('administrator')->result_array();
							
							
							$finalarray[]  =  $row;	
						}
						
							$sendarray['status']  =  1;
							$sendarray['message'] =  'successfully get property';
							$sendarray['data']    =  $finalarray;
		
					}
					else
					{
					   $sendarray['status']  =  0;
					   $sendarray['message'] =  "oops could't find any property";
					   $sendarray['data']    =  array();	
					}
				}
				else
				{
					$sendarray['status']  =  0;
					$sendarray['message'] =  'oops property_id not select';
					$sendarray['data']    =  array();
				}
				return json_encode($sendarray, true);
			}
			
			public function updateOneProperty()
			{
				$sendarray          = array();
				$property           = array();
				$property_address   = array();
				$property_images    = array();
				
				$data = $this->input->post(); 
				
                // $file_path = FCPATH.'test.txt';
				// file_put_contents($file_path, json_encode($data));
				// die();
                if(!empty($data['id']))
				{
				    if($data['request_from'] ==  2 || $data['request_from'] ==  3 || $data['request_from'] == 4)
					{
					   $property['requested_for'] = 2;
					}
					elseif($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
					{
					   $property['requested_for'] = 1;
					}
					if(isset($data['building_name']) && !empty($data['building_name']))
					{
						$property['building_name']      =  $data['building_name'];
					}
					if(isset($data['dimension']) && !empty($data['dimension']))
					{
						$property['dimension']    =  $data['dimension'];
					}
					
                    if(isset($data['dimension_front']) &&!empty($data['dimension_front']))
					{
						$property['dimension_front']          =  $data['dimension_front'];
					}
					if(isset($data['dimension_depth']) &&!empty($data['dimension_depth']))
					{
						$property['dimension_depth']          =  $data['dimension_depth'];
					}
					if(isset($data['dimension_measure']) &&!empty($data['dimension_measure']))
					{
						$property['dimension_measure']          =  $data['dimension_measure'];
					}
					if(isset($data['listing_by']) && !empty($data['listing_by']))
					{
						$property['listing_by']    =  $data['listing_by'];
					}
					if(isset($data['is_negotiable']) && !empty($data['is_negotiable']))
					{
						$property['is_negotiable']          =  $data['is_negotiable'];
					}
					if(isset($data['property_type']) && !empty($data['property_type']))
					{
						$property['property_type']          =  $data['property_type'];
					}
					if(isset($data['property_area']) && !empty($data['property_area']))
					{
						$property['property_area']          =  $data['property_area'];
					}
					if(isset($data['property_state']) && !empty($data['property_state']))
					{
						$property['property_state']          =  $data['property_state'];
					}
					if(isset($data['property_city']) && !empty($data['property_city']))
					{
						$property['property_city']          =  $data['property_city'];
					}
					if(isset($data['sell_type']) && !empty($data['sell_type']))
					{
						$property['sell_type']              =  $data['sell_type'];
					}
					if(isset($data['request_from']) && !empty($data['request_from']))
					{
						$property['request_from']           =  $data['request_from'];
					}
					if(isset($data['property_address1']) && !empty($data['property_address1']))
					{
						$property['property_address1']  =  $data['property_address1'];
					}
					
					if(isset($data['property_address2']) && !empty($data['property_address2']))
					{
						$property['property_address2']   =  $data['property_address2'];
					}
					
					if(isset($data['property_address3']) && !empty($data['property_address3']))
					{
						$property['property_address3']  =  $data['property_address3'];
					}
					
					if(isset($data['project_name']) && !empty($data['project_name']))
					{
						$property['project_name']   =  $data['project_name'];
					}
					
					if(isset($data['map_url']) && !empty($data['map_url']))
					{
						$property['map_url']    =  $data['map_url'];
					}
					
					if(isset($data['measure']) && !empty($data['measure']))
					{
						$property['measure']           =  $data['measure'];
					}
					
					if(isset($data['rera_approved']) && !empty($data['rera_approved']))
					{
						$property['rera_approved']    =  $data['rera_approved'];
						$property['rera_no']    =  $data['rera_no'];
					}
					else
					{
						$property['rera_approved']    =  $data['rera_approved'];
					}
					
					if(isset($data['user_id']) && !empty($data['user_id']))
					{
						$property['user_id']           =  $data['user_id'];
					}
					if(isset($data['floor']) && !empty($data['floor']))
					{
						$split_val =   split_my_data($data['floor']);
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_floor']    =  $split_val['min'];	
								$property['max_floor']    =  $split_val['max'];
							}
							else
							{
								$property['min_floor']    =  $split_val['max'];	
								$property['max_floor']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['rate']) && !empty($data['rate']))
					{
						$split_val =   split_my_data($data['rate']);
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_rate']    =  $split_val['min'];	
								$property['max_rate']    =  $split_val['max'];
							}
							else
							{
								$property['min_rate']    =  $split_val['max'];	
								$property['max_rate']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['lease_period']) && !empty($data['lease_period']))
					{
						$split_val =   split_my_data($data['lease_period']);
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_lease_duration']    =  $split_val['min'];	
								$property['max_lease_duration']    =  $split_val['max'];
							}
							else
							{
								$property['min_lease_duration']    =  $split_val['max'];	
								$property['max_lease_duration']    =  $split_val['max'];
							}
						}
					}
					
			        if(isset($data['carpet_area']) && !empty($data['carpet_area']))
					{
						$split_val =   split_my_data($data['carpet_area']);
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_carpet_area']    =  $split_val['min'];	
								$property['max_carpet_area']    =  $split_val['max'];
							}
							else
							{
								$property['min_carpet_area']    =  $split_val['max'];	
								$property['max_carpet_area']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['is_include_dg_ups']) && !empty($data['is_include_dg_ups']))
					{
						$property['is_include_dg_ups']  =  $data['is_include_dg_ups'];
					}
					if(isset($data['is_include_tax']) && !empty($data['is_include_tax']))
					{
					    $property['is_include_tax']     =  $data['is_include_tax'];
					}
					
					if(isset($data['buildup_area']) && !empty($data['buildup_area']))
					{
						$split_val =   split_my_data($data['buildup_area']);
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_buildup_area']    =  $split_val['min'];	
								$property['max_buildup_area']    =  $split_val['max'];
							}
							else
							{
								$property['min_buildup_area']    =  $split_val['max'];	
								$property['max_buildup_area']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['budget']) && !empty($data['budget']))
					{
						$split_val =   split_my_data($data['budget']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_budget']    =  $split_val['min'];	
								$property['max_budget']    =  $split_val['max'];
							}
							else
							{
								$property['min_budget']    =  $split_val['max'];	
								$property['max_budget']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['open_parking']) && !empty($data['open_parking']))
					{
						$split_val =   split_my_data($data['open_parking']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_open_parking']    =  $split_val['min'];  
								$property['max_open_parking']    =  $split_val['max'];
							}
							else
							{
								$property['min_open_parking']    =  $split_val['max'];  
								$property['max_open_parking']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['covered_parking']) && !empty($data['covered_parking']))
					{
						$split_val =   split_my_data($data['covered_parking']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_covered_parking']    =  $split_val['min'];    
								$property['max_covered_parking']    =  $split_val['max'];
							}
							else
							{
								$property['min_covered_parking']    =  $split_val['max'];    
								$property['max_covered_parking']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['ceiling_hight']) && !empty($data['ceiling_hight']))
					{
						$split_val =   split_my_data($data['ceiling_hight']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_ceiling_hight']    =  $split_val['min'];    
								$property['max_ceiling_hight']    =  $split_val['max'];
							}
							else
							{
								$property['min_ceiling_hight']    =  $split_val['max'];    
								$property['max_ceiling_hight']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['balcony']) && !empty($data['balcony']))
					{
						$split_val =   split_my_data($data['balcony']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_balcony']    =  $split_val['min'];    
								$property['max_balcony']    =  $split_val['max'];
							}
							else
							{
								$property['min_balcony']    =  $split_val['max'];    
								$property['max_balcony']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['plot_area']) && !empty($data['plot_area']))
					{
						$split_val =   split_my_data($data['plot_area']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_plot_area']    =  $split_val['min'];    
								$property['max_plot_area']    =  $split_val['max'];
							}
							else
							{
								$property['min_plot_area']    =  $split_val['max'];    
								$property['max_plot_area']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['bathroom']) && !empty($data['bathroom']))
					{
						$split_val =   split_my_data($data['bathroom']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_bathroom']    =  $split_val['min'];  
								$property['max_bathroom']    =  $split_val['max'];
							}
							else
							{
								$property['min_bathroom']    =  $split_val['max'];  
								$property['max_bathroom']    =  $split_val['max'];
							}
						}
					}
					

					
					if(isset($data['age']) && !empty($data['age']))
					{
						$split_val =   split_my_data($data['age']);
						
						if(!empty($split_val['min']) || !empty($split_val['max']))
						{
					
							if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
							{
								$property['min_property_age']    =  $split_val['min'];  
								$property['max_property_age']    =  $split_val['max'];
							}
							else
							{
								$property['min_property_age']    =  $split_val['max'];  
								$property['max_property_age']    =  $split_val['max'];
							}
						}
					}
					
					if(isset($data['description']) && !empty($data['description']))
					{
					    $property['description']            =  $data['description'];
					}
					if(isset($data['available_from_date']) && !empty($data['available_from_date']))
					{
						$property['available_from_date']    =  $data['available_from_date'];
					}
					if(isset($data['available_from_week']) && !empty($data['available_from_week']))
					{
					    $property['available_from_week']    =  $data['available_from_week'];
					}
					
					if(isset($data['entrance_width']) && !empty($data['entrance_width']))
					{
						$property['entrance_width']         =  $data['entrance_width'];
					}
					
			        if(isset($data['lease_unit']) && !empty($data['lease_unit']))
					{
						$property['lease_unit']             =  $data['lease_unit'];
					}
					if(isset($data['lease_period']) && !empty($data['lease_period']))
					{
						$property['lease_period']           =  $data['lease_period'];
					}
	                
					if(isset($data['security_deposit']) && !empty($data['security_deposit']))
					{
						$property['security_deposit']       =  $data['security_deposit'];
					}
			        if(isset($data['maintenance_charge']) && !empty($data['maintenance_charge']))
					{
						$property['maintenance_charge']     =  $data['maintenance_charge'];
					}
					if(isset($data['rent_increase']) && !empty($data['rent_increase']))
					{
						$property['rent_increase']          =  $data['rent_increase'];
					}
	                if(isset($data['lockin_duration']) && !empty($data['lockin_duration']))
					{
						$property['lockin_duration']        =  $data['lockin_duration'];
					}
					if(isset($data['lockin_period']) && !empty($data['lockin_period']))
					{
						$property['lockin_period']          =  $data['lockin_period'];
					}
			        if(isset($data['water_charge']) && !empty($data['water_charge']))
					{
						$property['water_charge']           =  $data['water_charge'];
					}
					if(isset($data['electricity_charge']) && !empty($data['electricity_charge']))
					{
						$property['electricity_charge']     =  $data['electricity_charge'];
					}
					if(isset($data['latitude']) && !empty($data['latitude']))
					{
						$property['latitude']       =  $data['latitude'];
					}
							
					if(isset($data['longitude']) && !empty($data['longitude']))
					{
						$property['longitude']      =  $data['longitude'];
					}
				
					$this->db->where('property_id',$data['id']);
					$this->db->update('property',$property);
				
					$this->db->where('property_id',$data['id']);
					$property_data = $this->db->get('property')->row_array();
					
					
					if(!empty($data['id']))
					{
					
						if(isset($data['zone_type']) && !empty($data['zone_type']))
						{
							$this->db->where('property_id',$data['id'])->delete('zone_type');
				 
							$decoded = json_decode($data['zone_type']);
							$filecount = count($decoded);
                            
							for($i = 0; $i < $filecount; $i++)
							{
								$zone_type['property_id']  =  $data['id'];
								$zone_type['zone_type']    =  $decoded[$i];
								$this->db->insert('zone_type',$zone_type);
							}
						}  
						
						if(isset($data['located_near']) && !empty($data['located_near']))
						{
							$this->db->where('property_id',$data['id'])->delete('located_near');
				 
							$decoded = json_decode($data['located_near']);
							$filecount = count($decoded);
                            
							for($i = 0; $i < $filecount; $i++)
							{
								$located_near['property_id']  =  $data['id'];
								$located_near['located_near']    =  $decoded[$i];
								$this->db->insert('located_near',$located_near);
							}
						}
						
						if(isset($data['available_from_week']) && !empty($data['available_from_week']))
						{
							$this->db->where('property_id',$data['id'])->delete('available_from_week');
				 
							$decoded = json_decode($data['available_from_week']);
							$filecount = count($decoded);
                            
							for($i = 0; $i < $filecount; $i++)
							{
								$available_from['property_id']       =  $data['id'];
								$available_from['available_from']    =  $decoded[$i];
								$this->db->insert('available_from',$available_from);
							}
						}
						
						if(isset($data['available_for']) && !empty($data['available_for']))
						{
							$this->db->where('property_id',$data['id'])->delete('available_for');
				 
							$decoded = json_decode($data['available_for']);
							$filecount = count($decoded);
                            
							for($i = 0; $i < $filecount; $i++)
							{
								$available_for['property_id']      =  $data['id'];
								$available_for['available_for']    =  $decoded[$i];
								$this->db->insert('available_for',$available_for);
							}
						}
						if(isset($data['construction_status']) && !empty($data['construction_status']))
						{
			                $this->db->where('property_id',$data['id'])->delete('construction_status');
							
							$decoded = json_decode($data['construction_status']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$construction_status['property_id']  =          $data['id'];
								$construction_status['construction_status']  =  $decoded[$i];
								
								$this->db->insert('construction_status',$construction_status);
							}
						}
						if(isset($data['furnishing_status']) && !empty($data['furnishing_status']))
						{
					        $this->db->where('property_id',$data['id'])->delete('furnishing_status');
							$decoded = json_decode($data['furnishing_status']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$furnishing_status['property_id']  =  $data['id'];
								$furnishing_status['furnishing_status']  =  $decoded[$i];
								
								$this->db->insert('furnishing_status',$furnishing_status);
							}
						}
						if(isset($data['amenties']) && !empty($data['amenties']))
						{
							$this->db->where('property_id',$data['id'])->delete('amenities');
							$decoded = json_decode($data['amenties']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$amenities['property_id']  =  $data['id'];
								$amenities['amenities']    =  $decoded[$i];
								
								$this->db->insert('amenities',$amenities);
							}
						}
						
						
						if(isset($data['facing']) && !empty($data['facing']))
						{
						   $this->db->where('property_id',$data['id'])->delete('facing');
						   $decoded = json_decode($data['facing']);
						   $filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$facing['property_id']  =  $data['id'];
								$facing['facing']  =  $decoded[$i];
								
								$this->db->insert('facing',$facing);
							}
						}
						if(isset($data['bhk']) && !empty($data['bhk']))
						{
		                    $this->db->where('property_id',$data['id'])->delete('bhk');
							$decoded = json_decode($data['bhk']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$bhk['property_id']  =  $data['id'];
								$bhk['bhk']  =  $decoded[$i];
								
								$this->db->insert('bhk',$bhk);
							}
						}
						
						
						if(isset($data['suitable_for']) && !empty($data['suitable_for']))
						{
					        $this->db->where('property_id',$data['id'])->delete('suitable_for');
							$decoded = json_decode($data['suitable_for']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$suitable_for['property_id']  =  $data['id'];
								$suitable_for['suitable_for']  =  $decoded[$i];
								
								$this->db->insert('suitable_for',$suitable_for);
							}
						}
						if(isset($data['flooring']) && !empty($data['flooring']))
						{
				            $this->db->where('property_id',$data['id'])->delete('flooring');
							$decoded = json_decode($data['flooring']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$flooring['property_id']  =  $data['id'];
								$flooring['flooring']  =  $decoded[$i];
								
								$this->db->insert('flooring',$flooring);
							}
						}
						if(isset($data['property_status']) && !empty($data['property_status']))
						{
						    $this->db->where('property_id',$data['id'])->delete('property_status');
							$decoded = json_decode($data['property_status']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$property_status['property_id']  =  $data['id'];
								$property_status['property_status']  =  $decoded[$i];
								
								$this->db->insert('property_status',$property_status);
							}
						}
						if(isset($data['hub']) && !empty($data['hub']))
						{
						    $this->db->where('property_id',$data['id'])->delete('hub');
							$decoded = json_decode($data['hub']);
							$filecount = count($decoded);

							for($i = 0; $i < $filecount; $i++)
							{
								$hub['property_id']  =  $data['id'];
								$hub['hub']  =  $decoded[$i];
								
								$this->db->insert('hub',$hub);
							}
						}
	                }
					
					if(!empty($data['id']))
					{
						if($data['request_from'] == 2 || $data['request_from'] == 3  || $data['request_from'] == 4 )
						{
						    if(isset($_FILES['property_image']['name'][0]) && !empty($_FILES['property_image']['name'][0]))
							{
								$filecount = count($_FILES['property_image']['name']);  
								for($i = 0; $i < $filecount; $i++)
								{
									$_FILES['file']['name']       = $_FILES['property_image']['name'][$i];
									$_FILES['file']['type']       = $_FILES['property_image']['type'][$i];
									$_FILES['file']['tmp_name']   = $_FILES['property_image']['tmp_name'][$i];
									$_FILES['file']['error']      = $_FILES['property_image']['error'][$i];
									$_FILES['file']['size']       = $_FILES['property_image']['size'][$i];
											
									$folderName = date('m-Y');
									$pathToUpload = 'assets/property/images/' . $folderName;
									
									if ( ! file_exists($pathToUpload) )
									{
										$create = mkdir($pathToUpload, 0777);
										$createThumbsFolder = mkdir($pathToUpload . '/thumbs', 0777);
										if ( ! $create || ! $createThumbsFolder)
										return;
									}
													
										// File upload configuration
										$config['upload_path'] = $pathToUpload;
										$config['overwrite'] = TRUE;
										$config['allowed_types'] = 'jpg|jpeg|png|gif';

										// Load and initialize upload library
										$this->load->library('upload', $config);
										$this->upload->initialize($config);

										// Upload file to server
									if($this->upload->do_upload('file'))
									{
										// Uploaded file data
										$imageData = $this->upload->data();
										$property_images[$i]['property_id']          =   $data['id'];
										$property_images[$i]['property_image']       =   $pathToUpload.'/'.$imageData['file_name'];
									}	
								}
								if(!empty($property_images))
								{
									    // $this->db->where('property_id',$data['id'])->delete('property_images');
										$this->db->insert_batch('property_images', $property_images);
										$sendarray['status']            =  1;
										$sendarray['message']           =  'Success! successfully.';
											   
								}  
							}
                            else
							{
								
							}
                            
							$property_address['property_id']    =  $data['id'];
							
							if(isset($data['map_location']) && !empty($data['map_location']))
							{
								$property_address['map_location']   =  $data['map_location'];
							}
							if(isset($data['locality']) && !empty($data['locality']))
							{
								$property_address['locality']       =  $data['locality'];
							}
							if(isset($data['pincode']) && !empty($data['pincode']))
							{
								$property_address['pincode']        =  $data['pincode'];
							}
							if(isset($data['city']) && !empty($data['city']))
							{
								$property_address['city']           =  $data['city'];
							}
							if(isset($data['state']) && !empty($data['state']))
							{
								$property_address['state']          =  $data['state'];
							}
							if(isset($data['address2']) && !empty($data['address2']))
							{
								$property_address['address2']       =  $data['address2'];
							}
							
							if(isset($data['latitude']) && !empty($data['latitude']))
							{
								$property_address['latitude']       =  $data['latitude'];
							}
							
							if(isset($data['longitude']) && !empty($data['longitude']))
							{
								$property_address['longitude']      =  $data['longitude'];
							}
							$chk = $this->db->where('property_id',$data['id'])->get('property_address')->result_array();
							if(!empty($chk))
							{
                                $this->db->where('property_id',$data['id'])->update('property_address', $property_address);									
							}
							else
							{
								$this->db->insert('property_address', $property_address);
							}			
						}
						else
						{
							
						}
					}
					if(!empty($property_data) || !empty($property_images) || !empty($property_address))
					{
					    $sendarray['status']    =  1;
						
						if($data['request_from'] ==  1 )
						{
							$sendarray['message']   =  "successfully updated buyer property.";
						}
						elseif($data['request_from'] ==  2)
						{
							$sendarray['message']   =  "successfully updated seller property.";
						}
						elseif($data['request_from'] ==  3)
						{
							$sendarray['message']   =  "successfully updated landlord property.";
						}
						elseif($data['request_from'] ==  4)
						{
							$sendarray['message']   =  "ssuccessfully updated lessor property.";
						}
						elseif($data['request_from'] ==  5)
						{
							$sendarray['message']   =  "successfully updated tenant property.";
						}
						elseif($data['request_from'] ==  6)
						{
							$sendarray['message']   =  "successfully updated lessee property.";
						}
						if(!empty($property_data))
						{
						  $sendarray['property']   =  $property_data; 
						}
						if(!empty($property_images))
						{
						  $sendarray['property_images']   =  $property_images; 
						}
						if(!empty($property_address))
						{
						  $sendarray['property_address']   =  $property_address; 
						}
					}
					else
					{
						$sendarray['status']    =  0;
					    $sendarray['message']   =  "oops something went wrong";
					    $sendarray['data']      =  array();
					}
				}
                else
				{
					$sendarray['status']    =  0;
					$sendarray['message']   =  "oops all field required";
					$sendarray['data']      =  array();
				}
			    return json_encode($sendarray, true);				
			}
			
			public function deleteProperty()
			{
			  $sendarray = array();
			  $propertyId = 	$this->input->post('property_id');
			  
			  if(!empty($propertyId))
			  {
				$this->db->where('property_id',$propertyId)->delete('property');  
				$this->db->where('property_id',$propertyId)->delete('zone_type'); 
				$this->db->where('property_id',$propertyId)->delete('available_for'); 
				$this->db->where('property_id',$propertyId)->delete('construction_status'); 
				$this->db->where('property_id',$propertyId)->delete('furnishing_status'); 
				$this->db->where('property_id',$propertyId)->delete('amenities'); 
				$this->db->where('property_id',$propertyId)->delete('facing'); 
				$this->db->where('property_id',$propertyId)->delete('bhk'); 
				$this->db->where('property_id',$propertyId)->delete('suitable_for'); 
				$this->db->where('property_id',$propertyId)->delete('flooring'); 
				$this->db->where('property_id',$propertyId)->delete('property_status'); 
				$this->db->where('property_id',$propertyId)->delete('hub');
				$this->db->where('property_id',$propertyId)->delete('property_images');
				$this->db->where('property_id',$propertyId)->delete('property_address');				
				
				$sendarray['status']    =  1;
				$sendarray['message']   =  "successfully remove property.";
			    $sendarray['data']      =  array();
			  }
			  else
			  {
				$sendarray['status']    =  0;
				$sendarray['message']   =  "oops property required.";
			    $sendarray['data']      =  array();  
			  }
			  return json_encode($sendarray, true);
			}
			
			
		
			public function getAllFeatureProperty()
			{
		       $finalarray = array();
		       $sendarray = array();
			   
				$property = $this->db->where('is_feature',1)->where('status',1)->get('property')->result_array();   
			        if(!empty($property))
				    {
					    foreach($property as $row)
						{

							if($row['request_from'] == 1)
							{
								$row['request_from'] = 'buy property';
							}
							elseif($row['request_from'] == 2)
							{
								$row['request_from'] = 'sell property';
							}
							elseif($row['request_from'] == 3)
							{
								$row['request_from'] = 'landlord'; 
							}
							elseif($row['request_from'] == 4)
							{
								$row['request_from'] = 'lessor';
							}
							elseif($row['request_from'] == 5)
							{
								$row['request_from'] = 'tenant';
							}
							elseif($row['request_from'] == 6)
							{
								$row['request_from'] = 'lessee';
							}
							
							if(!empty($row['sell_type']))
							{
								$sellType = $this->db->select('category')->where('id',$row['sell_type'])->get('category')->row();
								$row['sell_type'] = isset($sellType->category)?$sellType->category:"";
							}
							
							if(!empty($row['property_state']))
							{
								$property_state = $this->db->select('name')->where('id',$row['property_state'])->get('loc_states')->row();
							
								$row['property_state'] =  isset($property_state->name)?$property_state->name:"";  
							}
							if(!empty($row['property_city']))
							{
								$property_city = $this->db->select('name')->where('id', $row['property_city'])->get('loc_cities')->row();
								$row['property_city'] = isset($property_city->name)?$property_city->name:""; 
							}
							if(!empty($row['property_type']))
							{
 
								$property_type = $this->db->select('id,subcategory')->where('id',$row['property_type'])->get('subcategory')->row();
								$row['property_type'] = isset($property_type->subcategory)?$property_type->subcategory:""; 
                                $row['property_type_id'] = isset($property_type->id)?$property_type->id:""; 								
							}
							
							if(!empty($row['listing_by']))
							{
							
								$listing_by = $this->db->select('cc_name')->where('id',$row['listing_by'])->get('field_data')->row();
								
								$row['listing_by'] = isset($listing_by->cc_name)?$listing_by->cc_name:"";  
							}
							
							if(!empty($row['property_id']))
							{
								
							    $available_for   =  $this->db->select('available_for')->where('property_id',$row['property_id'])->get('available_for')->result_array();
								$fresh_available_for = array();
								if(!empty($available_for))
								{
									$temp_available_for = array();
									foreach($available_for as $rw)
									{
										$temp_available_for[] =  $rw['available_for'];
									}
									
									if(!empty($temp_available_for))
									{
										$final_available_for = $this->db->select('cc_name')->where_in('id', $temp_available_for)->get('field_data')->result_array();
										foreach($final_available_for as $rw)
										{
											$fresh_available_for[]  =  $rw['cc_name'];  
										}
									}
								}
                                $row['available_for'] = $fresh_available_for;								
							}
							
							if(!empty($row['property_id']))
							{
							    $flooring   =  $this->db->select('flooring')->where('property_id',$row['property_id'])->get('flooring')->result_array();
								$fresh_flooring = array();
								
								if(!empty($flooring))
								{
									$temp_flooring = array();
									foreach($flooring as $rw)
									{
										$temp_flooring[] =  $rw['flooring'];
									}
									if(!empty($temp_flooring))
									{
										$final_flooring = $this->db->select('cc_name')->where_in('id', $temp_flooring)->get('field_data')->result_array();
										foreach($final_flooring as $rw)
										{
											$fresh_flooring[]  =  $rw['cc_name'];  
										}
										$row['flooring'] = $fresh_flooring;
									}
								}	
						    }
							
							if(!empty($row['property_id']))
							{
							   $property_status   =  $this->db->select('property_status')->where('property_id',$row['property_id'])->get('property_status')->result_array();
							   $fresh_property_status = array();
							   
								if(!empty($property_status))
								{
									$temp_property_status = array();
									foreach($property_status as $rw)
									{
										$temp_property_status[] =  $rw['property_status'];
									}
									if(!empty($temp_property_status))
									{
										$final_property_status = $this->db->select('cc_name')->where_in('id', $temp_property_status)->get('field_data')->result_array();
										foreach($final_property_status as $rw)
										{
											$fresh_property_status[]  =  $rw['cc_name'];  
										}
										$row['property_status'] = $fresh_property_status;
									}
								}	
						    }
							
							
							if(!empty($row['property_id']))
							{
							   $zone_type   =  $this->db->select('zone_type')->where('property_id',$row['property_id'])->get('zone_type')->result_array();
							   $fresh_zone_type = array();
							
								if(!empty($zone_type))
								{
									$temp_zone_type = array();
									foreach($zone_type as $rw)
									{
										$temp_zone_type[] =  $rw['zone_type'];
									}
									if(!empty($temp_zone_type))
									{
										$final_zone_type = $this->db->select('cc_name')->where_in('id', $temp_zone_type)->get('field_data')->result_array();
										foreach($final_zone_type as $rw)
										{
											$fresh_zone_type[]  =  $rw['cc_name'];  
										}
										$row['zone_type'] = $fresh_zone_type;
									}
								}	
						    }
							
							
							if(!empty($row['property_id']))
							{
							    $construction_status  =  $this->db->select('construction_status')->where('property_id',$row['property_id'])->get('construction_status')->result_array();
								$fresh_construction_status = array();
								
								if(!empty($construction_status))
								{
									$temp_construction_status = array();
									foreach($construction_status as $rw)
									{
										$temp_construction_status[] =  $rw['construction_status'];
									}
									if(!empty($temp_construction_status))
									{
										$final_construction_status = $this->db->select('cc_name')->where_in('id', $temp_construction_status)->get('field_data')->result_array();
										foreach($final_construction_status as $rw)
										{
											$fresh_construction_status[]  =  $rw['cc_name'];  
										}
										$row['construction_status'] = $fresh_construction_status;
									}
								}	
						    } 
							
							
							if(!empty($row['property_id']))
							{
							   $furnishing_status   =  $this->db->select('furnishing_status')->where('property_id',$row['property_id'])->get('furnishing_status')->result_array();
							   $fresh_furnishing_status = array();
							
								if(!empty($furnishing_status))
								{
									$temp_furnishing_status = array();
									foreach($furnishing_status as $rw)
									{
										$temp_furnishing_status[] =  $rw['furnishing_status'];
									}
									if(!empty($temp_furnishing_status))
									{
										$final_furnishing_status = $this->db->select('cc_name')->where_in('id', $temp_furnishing_status)->get('field_data')->result_array();
										foreach($final_furnishing_status as $rw)
										{
											$fresh_furnishing_status[]  =  $rw['cc_name'];  
										}
										$row['furnishing_status'] = $fresh_furnishing_status;
									}
								}	
						    }
							
							
							if(!empty($row['property_id']))
							{
							   $bhk  =  $this->db->select('bhk')->where('property_id',$row['property_id'])->get('bhk')->result_array();
							   $fresh_bhk = array();
							
								if(!empty($bhk))
								{
									$temp_bhk = array();
									foreach($bhk as $rw)
									{
										$temp_bhk[] =  $rw['bhk'];
									}
									if(!empty($temp_bhk))
									{
										$final_bhk = $this->db->select('cc_name')->where_in('id', $temp_bhk)->get('field_data')->result_array();
										foreach($final_bhk as $rw)
										{
											$fresh_bhk[]  =  $rw['cc_name'];  
										}
										$row['bhk'] = $fresh_bhk;
									}
								}	
						    }
							
							
							if(!empty($row['property_id']))
							{
							   $facing  =  $this->db->select('facing')->where('property_id',$row['property_id'])->get('facing')->result_array();
							   $fresh_facing = array();
							
								if(!empty($facing))
								{
									$temp_facing = array();
									foreach($facing as $rw)
									{
										$temp_facing[] =  $rw['facing'];
									}
									if(!empty($temp_facing))
									{
										$final_facing = $this->db->select('cc_name')->where_in('id', $temp_facing)->get('field_data')->result_array();
										foreach($final_facing as $rw)
										{
											$fresh_facing[]  =  $rw['cc_name'];  
										}
										$row['facing'] = $fresh_facing;
									}
								}	
						    }
							
							
							if(!empty($row['property_id']))
							{
							   
                                $hub   =  $this->db->select('hub')->where('property_id',$row['property_id'])->get('hub')->result_array();
								$fresh_hub = array();
								if(!empty($hub))
								{
									$temp_hub = array();
									foreach($hub as $rw)
									{
										$temp_hub[] =  $rw['hub'];
									}
									if(!empty($temp_hub))
									{
										$final_hub = $this->db->select('cc_name')->where_in('id', $temp_hub)->get('field_data')->result_array();
										foreach($final_hub as $rw)
										{
											$fresh_hub[]  =  $rw['cc_name'];  
										}
										$row['hub'] = $fresh_hub;
									}
								}							   
							}
							
							
							
							if(!empty($row['property_id']))
							{
								
								$suitable_for   =  $this->db->select('suitable_for')->where('property_id',$row['property_id'])->get('suitable_for')->result_array();
								$fresh_suitable_for = array();
							
								if(!empty($suitable_for))
								{
									$temp_suitable_for = array();
									foreach($suitable_for as $rw)
									{
										$temp_suitable_for[] =  $rw['suitable_for'];
									}
									if(!empty($temp_suitable_for))
									{
										$final_suitable_for = $this->db->select('cc_name')->where_in('id', $temp_suitable_for)->get('field_data')->result_array();
										foreach($final_suitable_for as $rw)
										{
											$fresh_suitable_for[]  =  $rw['cc_name'];  
										}
										$row['suitable_for'] = $fresh_suitable_for;
									}
								}
								
							}
							
							
							if(!empty($row['property_id']))
							{
								
							    $amenities   =  $this->db->select('amenities')->where('property_id',$row['property_id'])->get('amenities')->result_array();
								$fresh_amenities = array();
								if(!empty($amenities))
								{
									$temp_amenities = array();
									foreach($amenities as $rw)
									{
										$temp_amenities[] =  $rw['amenities'];
									}
									if(!empty($temp_amenities))
									{
										$final_amenities = $this->db->select('cc_name')->where_in('id', $temp_amenities)->get('field_data')->result_array();
										foreach($final_amenities as $rw)
										{
											$fresh_amenities[]  =  $rw['cc_name'];  
										}
										
									}
								}
                                $row['amenities'] = $fresh_amenities;								
							}
							
					
							if($row['requested_for'] == 1)
							{
								$row['requested_for'] = "buying" ;
							} 
							else
							{
								$row['requested_for'] = "selling";
							}
							
							$this->db->select('property_image');
							$this->db->where('property_id',$row['property_id']);
							$row['propertyImages'] = $this->db->get('property_images')->result_array();
						
							// $this->db->select('map_location,locality,pincode,city,state,address2');
							// $this->db->where('property_id',$row['property_id']);
							// $row['propertyAddress'] = $this->db->get('property_address')->result_array();
							
							$this->db->select('property_address.map_location,property_address.locality,property_address.pincode,property_address.city,property_address.state,property_address.address2,property_address.latitude,property_address.longitude,property.building_name');
							$this->db->join('property','property.property_id = property_address.property_id','left');
							$this->db->where('property_address.property_id',$row['property_id']);
							$row['propertyAddress'] = $this->db->get('property_address')->result_array();
							
							$this->db->select('name,email,mobile,image');
							$this->db->where('aid',$row['user_id']);
							$row['administrator'] = $this->db->get('administrator')->result_array();
							
							$finalarray[]  =  $row;	
						}
							$sendarray['status']    =  1;
							$sendarray['message']   =  "successfully get feature property.";
							$sendarray['data']      =  $finalarray; 						
					}
					else
					{
						    $sendarray['status']    =  0;
				            $sendarray['message']   =  "oops no feature property.";
			                $sendarray['data']      =  array();  
					}
			        return json_encode($sendarray,true);
					      
		    }
			
			public function test($id=0)
			{
				$sendarray = array();
				$property  = array();
				$property_address = array();
				$property_images  = array();
				
				if(!empty($id))
				{
					$property_id      = $id;
				}
				else
				{
					$property_id      = $this->input->post('property_id');
				}
			
				if(!empty($property_id))
				{
					$query = $this->db->where('property_id',$property_id)->get('property')->result_array();
					if(!empty($query))
					{
						foreach($query as $row)
						{
                            if(!empty($row['requested_for']))
							{
								$row['requested_for'] = $row['requested_for'];
							}
                            if(!empty($row['request_from']))
							{
								$row['request_from'] = $row['request_from'];
							}
							
							if(!empty($row['property_id']))
							{
							$flooring   =  $this->db->select('fs.sub_category as florings')
								                         ->join('filter_subcategory as fs','fs.id=flooring.flooring','left')
								                         ->where('flooring.property_id',$row['property_id'])
														 ->get('flooring')->result_array();
			
								if(!empty($flooring))
								{
									$fresh = array();
									foreach($flooring as $rw)
									{
									  $fresh[] = $rw['florings'];	
									}
									$row['flooring'] = $fresh;
								}
								else
								{
									$row['flooring'] =  array();
								}
                                
								
								
								$property_status   =  $this->db->select('fs.sub_category as pstatus')
								                         ->join('filter_subcategory as fs','fs.id=property_status.property_status','left')
								                         ->where('property_status.property_id',$row['property_id'])
														 ->get('property_status')->result_array();
                                if(!empty($property_status))
								{
									$fresh = array();
									foreach($property_status as $rw)
									{
									  $fresh[] = $rw['pstatus'];	
									}
									$row['property_status'] = $fresh;
								}
								else
								{
									$row['property_status'] =  array();
								}

                               	
								
								$zone_type   =  $this->db->select('fs.sub_category as ztype')
								                         ->join('filter_subcategory as fs','fs.id=zone_type.zone_type','left')
								                         ->where('zone_type.property_id',$row['property_id'])
														 ->get('zone_type')->result_array();
                                if(!empty($zone_type))
								{
									$fresh = array();
									foreach($zone_type as $rw)
									{
									  $fresh[] = $rw['ztype'];	
									}
									$row['zone_type'] = $fresh;
								}
								else
								{
									$row['zone_type'] =  array();
								} 
								
								$located_near   =  $this->db->select('located_near')
								->where('property_id',$row['property_id'])->get('located_near')->result_array();

					            $located_near   =  $this->db->select('fs.sub_category as ln')
								                   ->join('filter_subcategory as fs','fs.id=located_near.located_near','left')
								                   ->where('located_near.property_id',$row['property_id'])
											       ->get('located_near')->result_array();	
												   
                                if(!empty($located_near))
								{
									$fresh = array();
									foreach($located_near as $rw)
									{
									  $fresh[] = $rw['ln'];	
									}
									$row['located_near'] = $fresh;
								}
								else
								{
									$row['located_near'] =  array();
								} 
								
								$construction_status   =  $this->db->select('fs.sub_category as af')
								                         ->join('filter_subcategory as fs','fs.id=available_from.available_from','left')
								                         ->where('available_from.property_id',$row['property_id'])
														 ->get('available_from')->result_array();
								
								
                                if(!empty($available_from))
								{
									$fresh = array();
									foreach($available_from as $rw)
									{
									  $fresh[] = $rw['af'];	
									}
									$row['available_from'] = $fresh;
								}
								else
								{
									$row['available_from'] =  array();
								}

                                
								
								$construction_status   =  $this->db->select('fs.sub_category as csts')
								                         ->join('filter_subcategory as fs','fs.id=construction_status.construction_status','left')
								                         ->where('construction_status.property_id',$row['property_id'])
														 ->get('construction_status')->result_array();
								
								if(!empty($construction_status))
								{
									$fresh = array();
									foreach($construction_status as $rw)
									{
									  $fresh[] = $rw['csts'];	
									}
									$row['construction_status'] = $fresh;
								}
								else
								{
									$row['construction_status'] =  array();
								}
                                
								$furnishing_status   =  $this->db->select('fs.sub_category as fs')
								                         ->join('filter_subcategory as fs','fs.id=furnishing_status.furnishing_status','left')
								                         ->where('furnishing_status.property_id',$row['property_id'])
														 ->get('furnishing_status')->result_array();
								
								
                                if(!empty($furnishing_status))
								{
									$fresh = array();
									foreach($furnishing_status as $rw)
									{
									  $fresh[] = $rw['fs'];	
									}
									$row['furnishing_status'] = $fresh;
								}
								else
								{
									$row['furnishing_status'] =  array();
								}

                                
                                
								$bhk   =  $this->db->select('fs.sub_category as bh')
								          ->join('filter_subcategory as fs','fs.id=bhk.bhk','left')
								          ->where('bhk.property_id',$row['property_id'])
										  ->get('bhk')->result_array();
								
                                if(!empty($bhk))
								{
									$fresh = array();
									foreach($bhk as $rw)
									{
									  $fresh[] = $rw['bh'];	
									}
									$row['bhk'] = $fresh;
								}
								else
								{
									$row['bhk'] =  array();
								}

                                $amenities   =  $this->db->select('fs.sub_category as amen')
								                ->join('filter_subcategory as fs','fs.id=amenities.amenities','left')
								                ->where('amenities.property_id',$row['property_id'])
										        ->get('amenities')->result_array();
								if(!empty($amenities))
								{
									$fresh = array();
									foreach($amenities as $rw)
									{
									  $fresh[] = $rw['amen'];	
									}
									$row['amenities'] = $fresh;
								}
								else
								{
									$row['amenities'] =  array();
								}
								
								$available_for   =  $this->db->select('fs.sub_category as av_for')
								                     ->join('filter_subcategory as fs','fs.id=available_for.available_for','left')
								                     ->where('available_for.property_id',$row['property_id'])
												     ->get('available_for')->result_array();
								
								
								if(!empty($available_for))
								{
									$fresh = array();
									foreach($amenities as $rw)
									{
									  $fresh[] = $rw['av_for'];	
									}
									$row['available_for'] = $fresh;
								}
								else
								{
									$row['available_for'] =  array();
								}
                                
								$suitable_for   =  $this->db->select('fs.sub_category as sf')
								                   ->join('filter_subcategory as fs','fs.id=suitable_for.suitable_for','left')
								                   ->where('suitable_for.property_id',$row['property_id'])
												   ->get('suitable_for')->result_array();
								
								
                                if(!empty($suitable_for))
								{
									$fresh = array();
									foreach($suitable_for as $rw)
									{
									  $fresh[] = $rw['sf'];	
									}
									$row['suitable_for'] = $fresh;
								}
								else
								{
									$row['suitable_for'] =  array();
								}

       
								$hub   =  $this->db->select('fs.sub_category as hb')
								          ->join('filter_subcategory as fs','fs.id=hub.hub','left')
								          ->where('hub.property_id',$row['property_id'])
										  ->get('hub')->result_array();
										  
                                if(!empty($hub))
								{
									$fresh = array();
									foreach($hub as $rw)
									{
									  $fresh[] = $rw['hb'];	
									}
									$row['hub'] = $fresh;
								}
								else
								{
									$row['hub'] =  array();
								}

                                
								$facing   =  $this->db->select('fs.sub_category as fcng')
								             ->join('filter_subcategory as fs','fs.id=facing.facing','left')
								             ->where('facing.property_id',$row['property_id'])
											 ->get('facing')->result_array();
								if(!empty($facing))
								{
									$fresh = array();
									foreach($facing as $rw)
									{
									  $fresh[] = $rw['fcng'];	
									}
									$row['facing'] = $fresh;
								}
                                else
								{
									$row['facing'] =  array();
								}								
						    }
						
							
							$propertyImages = $this->db->select('property_image')->where('property_id',$row['property_id'])->get('property_images')->result_array();
							if(!empty($propertyImages))
							{
							  $fresh = array();
							  foreach($propertyImages as $rw)
							  {
								$fresh[] = $rw['property_image'];  
							  }	
                              $row['property_images'] = $fresh;							  
							}
							
							
							$this->db->select('property_address.map_location,property_address.locality,property_address.pincode,property_address.city,property_address.state,property_address.address2,property_address.latitude,property_address.longitude,property.building_name');
							$this->db->join('property','property.property_id = property_address.property_id','left');
							$this->db->where('property_address.property_id',$row['property_id']);
							$row['propertyAddress'] = $this->db->get('property_address')->result_array();
							
							$this->db->select('name,email,mobile,image');
							$this->db->where('aid',$row['user_id']);
							$row['administrator'] = $this->db->get('administrator')->result_array();
							
							
							$finalarray[]  =  $row;	
						}
			
						
						
						  if(!empty($finalarray))
						  {
							$sendarray['status']  =  1;
							$sendarray['message'] =  'successfully get property';
							$sendarray['data']    =  $finalarray;
						  }
					}
					else
					{
					   $sendarray['status']  =  0;
					   $sendarray['message'] =  "oops could't find any property";
					   $sendarray['data']    =  array();	
					}
				}
				else
				{
					$sendarray['status']  =  0;
					$sendarray['message'] =  'oops property_id not select';
					$sendarray['data']    =  array();
				}
				return json_encode($sendarray, true);
			}
			
			
		}
		
	?>