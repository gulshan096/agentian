   <?php
        Class PropertyModel extends CI_Model
		{
			    function __construct()
				{
					parent::__construct();
				}
			   
			    
			   
			    public function GetProperty($id=0,$status=0)
				{
					if(!empty($id))
						{
						$temp	=	$this->db->query("SELECT * FROM `property` where propertyId = '1'")->result_array();
						if(!empty($temp))
						{
							return $temp[0];
						}
						return array();
						}
						$this->db->select("*");
						$keyword	=	$this->input->post('keyword');
						if(!empty($keyword))
						{
							$this->db->where(" lower(name) like '%$keyword%' ");
						}
						if(!empty($status))
						{
							$this->db->where("status",$status);
						}
						$this->db->from("property");
					return $this->db->get()->result_array();
				}
				public function latestBlog()
				{
				   $this->db->select('blog.*,administrator.name');
                   $this->db->join('administrator','administrator.aid = blog.user_id','left');
				   $this->db->order_by("blog.created", "desc");
				   $this->db->limit(5);
				   return $this->db->get('blog')->result_array();
				   
				}
				public function latestWishlist()
				{
				   $this->db->select('administrator.name,property.building_name,wishlist.created');
                   $this->db->join('administrator','administrator.aid = wishlist.user_id','left');
                   $this->db->join('property','property.property_id   = wishlist.property_id','left');
				   $this->db->order_by("wishlist.created", "desc");
				   $this->db->limit(5);
				   return $this->db->get('wishlist')->result_array();
				}
				
				public function latestRequest()
				{
					$this->db->select('property.*,administrator.name,filter_subcategory.sub_category as sellType, filter_child_category.child_category as proType');
					$this->db->join('administrator','administrator.aid = property.user_id','left');
					$this->db->join('filter_subcategory','filter_subcategory.id = property.sell_type','left');
					$this->db->join('filter_child_category','filter_child_category.id = property.property_type','left');
				    $this->db->order_by("property.created", "desc");
					$this->db->limit(5);
					return $this->db->get('property')->result_array();	
				}
				
				public function totalBuyRequest()
				{
					$result = $this->db->where('request_from',1)
					               ->get('property')
                                   ->num_rows();
								   		   
					return $result;
				}
				
				public function totalSellRequest()
				{
					$result = $this->db->where('request_from',2)
					               ->get('property')
                                   ->num_rows();
								   
					return $result;
				}
				
				public function totalRentRequest()
				{
					$result = $this->db->where('request_from',5)
					               ->get('property')
                                   ->num_rows();
								   
					return $result;
				}
				
				public function totalLesseeRequest()
				{
					$result = $this->db->where('request_from',6)
					               ->get('property')
                                   ->num_rows();
								   
					return $result;
				}
				public function totalLessorRequest()
				{
					$result = $this->db->where('request_from',4)
					               ->get('property')
                                   ->num_rows();
								   
					return $result;
				}
				public function totalLandlordRequest()
				{
					$result = $this->db->where('request_from',3)
					               ->get('property')
                                   ->num_rows();
								   
					return $result;
				}
				
				public function manageproperty()
				{  
				
					$sendarray = array();
					$property = array();
					$property_address = array();
					$property_images = array();
					$data = $this->input->post();
					$userid = $this->session->userdata("aid");
					$data['user_id'] = $userid;
					
				
					$wallet  = $this->db->select('wallet_bonus,post_price,')->where('status',1)->get('wallet_system')->row_array();
					$last_av_bal = $this->db->where('user_id',$userid)->get('transaction')->last_row()->available;
					
					   
					
					
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
							if(!empty($data['building_name']))
							{
								$property['building_name']      =  $data['building_name'];
							}
							if(!empty($data['listing_by']))
							{
								$property['listing_by']    =  $data['listing_by'];
							}
							if(!empty($data['is_negotiable']))
							{
								$property['is_negotiable']          =  $data['is_negotiable'];
							}
							if(!empty($data['property_type']))
							{
								$property['property_type']          =  $data['property_type'];
							}
							
							if(!empty($data['property_state']))
							{
								$property['property_state']          =  $data['property_state'];
							}
							if(!empty($data['property_city']))
							{
								$property['property_city']          =  $data['property_city'];
							}
							if(!empty($data['sell_type']))
							{
								$property['sell_type']              =  $data['sell_type'];
							}
							
							if(!empty($data['property_address1']))
							{
								$property['property_address1']      =  $data['property_address1'];
							}
							if(!empty($data['property_address2']))
							{
								$property['property_address2']      =  $data['property_address2'];
							}
							if(!empty($data['property_address3']))
							{
								$property['property_address3']      =  $data['property_address3'];
							}
									
							if(!empty($data['dimension']))
							{
								$property['dimension']              =  $data['dimension'];
							}
							
							if(!empty($data['dimension_front']))
							{
								$property['dimension_front']        =  $data['dimension_front'];
							}
							
							if(!empty($data['dimension_depth']))
							{
								$property['dimension_depth']        =  $data['dimension_depth'];
							}
							
			
							if(!empty($data['min_plot_area']) || !empty($data['max_plot_area']))
							{
								if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
								{
									$property['min_plot_area']    =  $data['min_plot_area'];	
									$property['max_plot_area']    =  $data['max_plot_area'];
								}
								else
								{
									$property['min_plot_area']    =  $data['max_plot_area'];	
									$property['max_plot_area']    =  $data['max_plot_area'];
								}
								
								if(!empty($data['measure']))
								{
									$property['measure']    =  $data['measure'];	
								}
							}
									
							if(!empty($data['min_rate']) || !empty($data['max_rate']))
							{
								
								if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
								{
									$property['min_rate']    =  $data['min_rate'];	
									$property['max_rate']    =  $data['max_rate'];
								}
								else
								{
									$property['min_rate']    =  $data['max_rate'];	
									$property['max_rate']    =  $data['max_rate'];
								}
								
							}
							
									
							if(!empty($data['min_bedroom']) || !empty($data['max_bedroom']))
							{
								
								if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
								{
									$property['min_bedroom']    =  $data['min_bedroom'];	
									$property['max_bedroom']    =  $data['max_bedroom'];
								}
								else
								{
									$property['min_bedroom']    =  $data['max_bedroom'];	
									$property['max_bedroom']    =  $data['max_bedroom'];
								}
							}
							// if(!empty($data['rera_approved']) && !empty($data['rera_approved'] == 1))
							// {
								// $property['rera_approved']   =  $data['rera_approved'];
										
								// if(!empty($data['rera_no']))
								// {
									// $property['rera_no']    =  $data['rera_no'];
								// }
							// }
							// elseif($data['rera_approved'] == 0)
							// {
								// $property['rera_approved']   =  $data['rera_approved'];
							// }
							
							if(!empty($data['request_from']))
							{
								$property['request_from']           =  $data['request_from'];
							}
							
							if(!empty($data['user_id']))
							{
								$property['user_id']                =  $data['user_id'];
							}
							if(!empty($data['min_floor']) || !empty($data['max_floor']))
							{
						
								if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
								{
									$property['min_floor']    =  $data['min_floor'];	
									$property['max_floor']    =  $data['max_floor'];
								}
								else
								{
									$property['min_floor']    =  $data['max_floor'];	
									$property['max_floor']    =  $data['max_floor'];
								}
							}
							if(!empty($data['min_lease_duration']) || !empty($data['max_lease_duration']))
							{
						
								if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
								{
									$property['min_lease_duration']    =  $data['min_lease_duration'];	
									$property['max_lease_duration']    =  $data['max_lease_duration'];
								}
								else
								{
									$property['min_lease_duration']    =  $data['max_lease_duration'];	
									$property['max_lease_duration']    =  $data['max_lease_duration'];
								}
							}
							
							
							if(!empty($data['min_carpet_area']) || !empty($data['max_carpet_area']))
							{
						
								if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
								{
									$property['min_carpet_area']    =  $data['min_carpet_area'];	
									$property['max_carpet_area']    =  $data['max_carpet_area'];
								}
								else
								{
									$property['min_carpet_area']    =  $data['max_carpet_area'];	
									$property['max_carpet_area']    =  $data['max_carpet_area'];
								}
							}
							
							if(!empty($data['is_include_dg_ups']))
							{
								$property['is_include_dg_ups']  =  $data['is_include_dg_ups'];
							}
							if(!empty($data['is_include_tax']))
							{
								$property['is_include_tax']     =  $data['is_include_tax'];
							}
							
							if(!empty($data['min_buildup_area']) || !empty($data['max_buildup_area']))
							{
						
								if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
								{
									$property['min_buildup_area']    =  $data['min_buildup_area'];	
									$property['max_buildup_area']    =  $data['max_buildup_area'];
								}
								else
								{
									$property['min_buildup_area']    =  $data['max_buildup_area'];	
									$property['max_buildup_area']    =  $data['max_buildup_area'];
								}
							}
							
							
							
							if(!empty($data['min_budget']) || !empty($data['max_budget']))
							{
						
								if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
								{
									$property['min_budget']    =  $data['min_budget'];	
									$property['max_budget']    =  $data['max_budget'];
								}
								else
								{
									$property['min_budget']    =  $data['max_budget'];	
									$property['max_budget']    =  $data['max_budget'];
								}
							}
							
							if(!empty($data['min_open_parking']) || !empty($data['max_open_parking']))
							{
						
								if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
								{
									$property['min_open_parking']    =  $data['min_open_parking'];	
									$property['max_open_parking']    =  $data['max_open_parking'];
								}
								else
								{
									$property['min_open_parking']    =  $data['max_open_parking'];	
									$property['max_open_parking']    =  $data['max_open_parking'];
								}
							}
							
							if(!empty($data['min_covered_parking']) || !empty($data['max_covered_parking']))
							{
						
								if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
								{
									$property['min_covered_parking']    =  $data['min_covered_parking'];	
									$property['max_covered_parking']    =  $data['max_covered_parking'];
								}
								else
								{
									$property['min_covered_parking']    =  $data['max_covered_parking'];	
									$property['max_covered_parking']    =  $data['max_covered_parking'];
								}
							}
							
							if(!empty($data['min_ceiling_hight']) || !empty($data['max_ceiling_hight']))
							{
						
								if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
								{
									$property['min_ceiling_hight']    =  $data['min_ceiling_hight'];	
									$property['max_ceiling_hight']    =  $data['max_ceiling_hight'];
								}
								else
								{
									$property['min_ceiling_hight']    =  $data['max_ceiling_hight'];	
									$property['max_ceiling_hight']    =  $data['max_ceiling_hight'];
								}
							}
							
							if(!empty($data['min_balcony']) || !empty($data['max_balcony']))
							{
						
								if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
								{
									$property['min_balcony']    =  $data['min_balcony'];	
									$property['max_balcony']    =  $data['max_balcony'];
								}
								else
								{
									$property['min_balcony']    =  $data['max_balcony'];	
									$property['max_balcony']    =  $data['max_balcony'];
								}
							}
							
							if(!empty($data['min_bathroom']) || !empty($data['max_bathroom']))
							{
						
								if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
								{
									$property['min_bathroom']    =  $data['min_bathroom'];	
									$property['max_bathroom']    =  $data['max_bathroom'];
								}
								else
								{
									$property['min_bathroom']    =  $data['max_bathroom'];	
									$property['max_bathroom']    =  $data['max_bathroom'];
								}
							}
							
							
							if(!empty($data['min_property_age']) || !empty($data['max_property_age']))
							{
						
								if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
								{
									$property['min_property_age']    =  $data['min_property_age'];	
									$property['max_property_age']    =  $data['max_property_age'];
								}
								else
								{
									$property['min_property_age']    =  $data['max_property_age'];	
									$property['max_property_age']    =  $data['max_property_age'];
								}
							}
							
							if(!empty($data['description']))
							{
								$property['description']            =  $data['description'];
							}
							
							
							if(!empty($data['available_from_date']))
							{
								$property['available_from_date']    =  $data['available_from_date'];
							}
							if(!empty($data['available_from_week']))
							{
								$property['available_from_week']    =  $data['available_from_week'];
							}
							
							if(!empty($data['entrance_width']))
							{
								$property['entrance_width']     =  $data['entrance_width'];
							}
							
							if(!empty($data['lease_unit']))
							{
								$property['lease_unit']         =  $data['lease_unit'];
							}
							if(!empty($data['lease_period']))
							{
								$property['lease_period']           =  $data['lease_period'];
							}
							
							if(!empty($data['security_deposit']))
							{
								$property['security_deposit']       =  $data['security_deposit'];
							}
							if(!empty($data['maintenance_charge']))
							{
								$property['maintenance_charge']     =  $data['maintenance_charge'];
							}
							if(!empty($data['rent_increase']))
							{
								$property['rent_increase']          =  $data['rent_increase'];
							}
							
							if(!empty($data['rent_increase_unit']))
							{
								$property['rent_increase_unit']          =  $data['rent_increase_unit'];
							}
							
							
							
							if(!empty($data['lockin_duration']))
							{
								$property['lockin_duration']        =  $data['lockin_duration'];
							}
							
							if(!empty($data['project_name']))
							{
								$property['project_name']        =  $data['project_name'];
							}
							
							if(!empty($data['lockin_period']))
							{
								$property['lockin_period']          =  $data['lockin_period'];
							}
							if(!empty($data['water_charge']))
							{
								$property['water_charge']           =  $data['water_charge'];
							}
							if(!empty($data['electricity_charge']))
							{
								$property['electricity_charge']     =  $data['electricity_charge'];
							}
							if(!empty($data['latitude']))
							{
								$property['latitude']       =  $data['latitude'];
							}
									
							if(!empty($data['longitude']))
							{
								$property['longitude']      =  $data['longitude'];
							}
					
							$this->db->insert('property',$property);
							$property_id = $this->db->insert_id();
							
							$this->db->where('property_id',$property_id);
							$property_data = $this->db->get('property')->row_array();
							
							if(!empty($property_id))
							{
									if(!empty($data['zone_type']))
									{
										$filecount = count($data['zone_type']);
										for($i = 0; $i < $filecount; $i++)
										{
											$zone_type['property_id']  =  $property_id;
											$zone_type['zone_type']  =    $data['zone_type'][$i];
											$this->db->insert('zone_type',$zone_type);
										}
									}
									if(!empty($data['available_for']))
									{
								
										$filecount = count($data['available_for']);

										for($i = 0; $i < $filecount; $i++)
										{
											$available_for['property_id']    =  $property_id;
											$available_for['available_for']  =  $data['available_for'][$i];
											
											$this->db->insert('available_for',$available_for);
										}
									}
									if(!empty($data['construction_status']))
									{
						
							
										$filecount = count($data['construction_status']);

										for($i = 0; $i < $filecount; $i++)
										{
											$construction_status['property_id']  =          $property_id;
											$construction_status['construction_status']  =  $data['construction_status'][$i];
											
											$this->db->insert('construction_status',$construction_status);
										}
									}
									if(!empty($data['furnishing_status']))
									{
								
										$filecount = count($data['furnishing_status']);

										for($i = 0; $i < $filecount; $i++)
										{
											$furnishing_status['property_id']  =  $property_id;
											$furnishing_status['furnishing_status']  =  $data['furnishing_status'][$i];
											
											$this->db->insert('furnishing_status',$furnishing_status);
										}
									}
									if(!empty($data['amenties']))
									{
										
							
										$filecount = count($data['amenties']);

										for($i = 0; $i < $filecount; $i++)
										{
											$amenities['property_id']  =  $property_id;
											$amenities['amenities']    =  $data['amenties'][$i];
											
											$this->db->insert('amenities',$amenities);
										}
									}
									
									
									if(!empty($data['facing']))
									{
									 
									   $filecount = count($data['facing']);

										for($i = 0; $i < $filecount; $i++)
										{
											$facing['property_id']  =  $property_id;
											$facing['facing']       =  $data['facing'][$i];
											
											$this->db->insert('facing',$facing);
										}
									}
									if(!empty($data['bhk']))
									{
				
										$filecount = count($data['bhk']);

										for($i = 0; $i < $filecount; $i++)
										{
											$bhk['property_id']  =  $property_id;
											$bhk['bhk']          =  $data['bhk'][$i];
											
											$this->db->insert('bhk',$bhk);
										}
									}
									
									
									if(!empty($data['suitable_for']))
									{
								
										$filecount = count($data['suitable_for']);

										for($i = 0; $i < $filecount; $i++)
										{
											$suitable_for['property_id']   =  $property_id;
											$suitable_for['suitable_for']  =  $data['suitable_for'][$i];
											
											$this->db->insert('suitable_for',$suitable_for);
										}
									}
									if(!empty($data['flooring']))
									{
							
										$filecount = count($data['flooring']);

										for($i = 0; $i < $filecount; $i++)
										{
											$flooring['property_id']  =  $property_id;
											$flooring['flooring']     =  $data['flooring'][$i];
											
											$this->db->insert('flooring',$flooring);
										}
									}
									if(!empty($data['property_status']))
									{
									
										$filecount = count($data['property_status']);

										for($i = 0; $i < $filecount; $i++)
										{
											$property_status['property_id']      =  $property_id;
											$property_status['property_status']  =  $data['property_status'][$i];
											
											$this->db->insert('property_status',$property_status);
										}
									}
									if(!empty($data['hub']))
									{
										$filecount = count($data['hub']);

										for($i = 0; $i < $filecount; $i++)
										{
											$hub['property_id']  =  $property_id;
											$hub['hub']          =  $data['hub'][$i];
											
											$this->db->insert('hub',$hub);
										}
									}
								
								if($data['request_from'] == 2 || $data['request_from'] == 3  || $data['request_from'] == 4 )
								{
						
									
									
									if(!empty($_FILES['property_image']['name'][0]))
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
											list($width, $height) = getimagesize($file);
								
											if($width < "1900" || $width > "1900" || $height > "500" || $height < "500")
											{
												$senddata['message'] = "property image size must be 1900 x 1000 pixels.";
												$senddata['status'] = 0;
												return json_encode($senddata);
											}
                                            											
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
												$sendarray['status']   =  1;
												$sendarray['message']  =  'Success! successfully.';
															   
										}  
									}
									else
									{
										
									}
									
									$property_address['property_id']    =  $property_id;
									
									if(!empty($data['map_location']))
									{
										$property_address['map_location']   =  $data['map_location'];
									}
									if(!empty($data['locality']))
									{
										$property_address['locality']       =  $data['locality'];
									}
									if(!empty($data['pincode']))
									{
										$property_address['pincode']        =  $data['pincode'];
									}
									if(!empty($data['property_city']))
									{
										$property_address['city']           =  $data['property_city'];
									}
									if(!empty($data['property_state']))
									{
										$property_address['state']          =  $data['property_state'];
									}
									
									if(!empty($data['address2']))
									{
										$property_address['address2']       =  $data['address2'];
									}
									
									if(!empty($data['latitude']))
									{
										$property_address['latitude']       =  $data['latitude'];
									}
									
									if(!empty($data['longitude']))
									{
										$property_address['longitude']      =  $data['longitude'];
									}
									
									$this->db->insert('property_address', $property_address);
													
								}
							}
							
							if(!empty($property_data) || !empty($property_images) || !empty($property_address))
							{
								
								$debited = array(
									
									  'user_id'   => $userid,
									  'post_id'   => $property_id,
									  'debit'     => $wallet['post_price'],
									  'available' => $last_av_bal - $wallet['post_price']
	
									);
									
						        $this->db->insert('transaction',$debited);
								
								$sendarray['status']    =  1;
								
								if($data['request_from'] ==  1 )
								{
									$sendarray['message']    =  "success successfully added buyer property .";
									$sendarray['redurl']     =  site_url("success");
								}
								elseif($data['request_from'] ==  2)
								{
									$sendarray['message']    =  "success successfully added seller property .";
									$sendarray['redurl']     =  site_url("success");
								}
								elseif($data['request_from'] ==  3)
								{
									$sendarray['message']    =  "success successfully added landlord property .";
									$sendarray['redurl']     =  site_url("success");
								}
								elseif($data['request_from'] ==  4)
								{
									$sendarray['message']   =  "success successfully added lessor property .";
									$sendarray['redurl']     =  site_url("success");
								}
								elseif($data['request_from'] ==  5)
								{
									$sendarray['message']   =  "success successfully added tenant property .";
									$sendarray['redurl']     =  site_url("success");
								}
								elseif($data['request_from'] ==  6)
								{
									$sendarray['message']    =  "success successfully added lessee property .";
									$sendarray['redurl']     =  site_url("success");
								}
							}
							else
							{
								$sendarray['status']    =  0;
								$sendarray['message']   =  "oops something went wrong";
							   
							}
						}
						else
						{
							$sendarray['status']    =  0;
							$sendarray['message']   =  "oops all field required";
					
						}
			            return json_encode($sendarray, true);
		        }
				
				public function getOneProperty($id)
				{
					$sendarray = array();
    
	                $query = $this->db->where('property_id',$id)->get('property')->result_array();
					
					foreach($query as $row)
					{
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
									foreach($available_for as $rw)
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
								
								if($row['request_from'] == 2 || $row['request_from'] == 3  || $row['request_from'] == 4)
								{
									$propertyImages = $this->db->select('*')->where('property_id',$row['property_id'])->get('property_images')->result_array();
									if(!empty($propertyImages))
									{
									  $fresh = array();
									  foreach($propertyImages as $rw)
									  {
										$fresh[] = $rw;  
									  }	
									  $row['property_images'] = $fresh;							  
									}
									$this->db->select('property_address.map_location,property_address.locality,property_address.pincode,property_address.city,property_address.state,property_address.address2,property_address.latitude,property_address.longitude,property.building_name');
									$this->db->join('property','property.property_id = property_address.property_id','left');
									$this->db->where('property_address.property_id',$row['property_id']);
									$row['propertyAddress'] = $this->db->get('property_address')->result_array();
								}
						$sendarray[] = $row;
					}
					return $sendarray;
				}
				
				public function deleteImage($id)
				{
					$delete = $this->db->where('id',$id)->delete('property_images'); 
				    return $delete?true:false; 
				}
				
			public function updateproperty()
			{  
				$sendarray = array();
				$property = array();
				$property_address = array();
				$property_images = array();
				$data = $this->input->post();
				$data['user_id'] = $this->session->userdata("aid");
                
				
							 
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
					if(!empty($data['building_name']))
					{
						$property['building_name'] =  $data['building_name'];
					}
					if(!empty($data['listing_by']))
					{
						$property['listing_by']    =  $data['listing_by'];
					}
					if(!empty($data['is_negotiable']))
					{
						$property['is_negotiable']          =  $data['is_negotiable'];
					}
					if(!empty($data['property_type']))
					{
						$property['property_type']          =  $data['property_type'];
					}
					
					if(!empty($data['property_address1']))
					{
						$property['property_address1']      =  $data['property_address1'];
					}
					if(!empty($data['property_address2']))
					{
						$property['property_address2']      =  $data['property_address2'];
					}
					if(!empty($data['property_address3']))
					{
						$property['property_address3']      =  $data['property_address3'];
					}
							
					if(!empty($data['dimension']))
					{
						$property['dimension']              =  $data['dimension'];
					}
					
					if(!empty($data['dimension_front']))
					{
						$property['dimension_front']        =  $data['dimension_front'];
					}
							
					if(!empty($data['dimension_depth']))
					{
						$property['dimension_depth']        =  $data['dimension_depth'];
					}
					
					if(!empty($data['min_plot_area']) || !empty($data['max_plot_area']))
					{
						if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
						{
							$property['min_plot_area']    =  $data['min_plot_area'];	
							$property['max_plot_area']    =  $data['max_plot_area'];
						}
						else
						{
							$property['min_plot_area']    =  $data['max_plot_area'];	
							$property['max_plot_area']    =  $data['max_plot_area'];
						}
						
						if(!empty($data['measure']))
						{
							$property['measure']    =  $data['measure'];	
						}
					}
							
					if(!empty($data['min_rate']) || !empty($data['max_rate']))
					{
						
						if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
						{
							$property['min_rate']    =  $data['min_rate'];	
							$property['max_rate']    =  $data['max_rate'];
						}
						else
						{
							$property['min_rate']    =  $data['max_rate'];	
							$property['max_rate']    =  $data['max_rate'];
						}
					}
							
					if(!empty($data['min_bedroom']) || !empty($data['max_bedroom']))
					{
						
						if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
						{
							$property['min_bedroom']    =  $data['min_bedroom'];	
							$property['max_bedroom']    =  $data['max_bedroom'];
						}
						else
						{
							$property['min_bedroom']    =  $data['max_bedroom'];	
							$property['max_bedroom']    =  $data['max_bedroom'];
						}
					}
					if(!empty($data['rera_approved']) && !empty($data['rera_approved'] == 1))
					{
						$property['rera_approved']   =  $data['rera_approved'];
								
						if(!empty($data['rera_no']))
						{
							$property['rera_no']    =  $data['rera_no'];
						}
					}
					elseif($data['rera_approved'] == 0)
					{
						$property['rera_approved']   =  $data['rera_approved'];
					}
							
					if(!empty($data['property_state']))
					{
						$property['property_state']          =  $data['property_state'];
					}
					if(!empty($data['property_city']))
					{
						$property['property_city']          =  $data['property_city'];
					}
					if(!empty($data['sell_type']))
					{
						$property['sell_type']              =  $data['sell_type'];
					}
					if(!empty($data['request_from']))
					{
						$property['request_from']           =  $data['request_from'];
					}
					
					if(!empty($data['user_id']))
					{
						$property['user_id']                =  $data['user_id'];
					}
					if(!empty($data['min_floor']) || !empty($data['max_floor']))
					{
				
						if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
						{
						    $property['min_floor']    =  $data['min_floor'];	
					        $property['max_floor']    =  $data['max_floor'];
						}
						else
						{
							$property['min_floor']    =  $data['max_floor'];	
					        $property['max_floor']    =  $data['max_floor'];
						}
					}
					if(!empty($data['min_lease_duration']) || !empty($data['max_lease_duration']))
					{
				
						if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
						{
						    $property['min_lease_duration']    =  $data['min_lease_duration'];	
					        $property['max_lease_duration']    =  $data['max_lease_duration'];
						}
						else
						{
							$property['min_lease_duration']    =  $data['max_lease_duration'];	
					        $property['max_lease_duration']    =  $data['max_lease_duration'];
						}
					}
					
					if(!empty($data['min_carpet_area']) || !empty($data['max_carpet_area']))
					{
				
						if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
						{
						    $property['min_carpet_area']    =  $data['min_carpet_area'];	
					        $property['max_carpet_area']    =  $data['max_carpet_area'];
						}
						else
						{
							$property['min_carpet_area']    =  $data['max_carpet_area'];	
					        $property['max_carpet_area']    =  $data['max_carpet_area'];
						}
					}
					
					if(!empty($data['is_include_dg_ups']))
					{
						$property['is_include_dg_ups']  =  $data['is_include_dg_ups'];
					}
					if(!empty($data['is_include_tax']))
					{
					    $property['is_include_tax']     =  $data['is_include_tax'];
					}
					
					if(!empty($data['min_buildup_area']) || !empty($data['max_buildup_area']))
					{
				
						if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
						{
						    $property['min_buildup_area']    =  $data['min_buildup_area'];	
					        $property['max_buildup_area']    =  $data['max_buildup_area'];
						}
						else
						{
							$property['min_buildup_area']    =  $data['max_carpet_area'];	
					        $property['max_buildup_area']    =  $data['max_buildup_area'];
						}
					}
					
					if(!empty($data['min_budget']) || !empty($data['max_budget']))
					{
				
						if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
						{
						    $property['min_budget']    =  $data['min_budget'];	
					        $property['max_budget']    =  $data['max_budget'];
						}
						else
						{
							$property['min_budget']    =  $data['max_budget'];	
					        $property['max_budget']    =  $data['max_budget'];
						}
					}
					
					if(!empty($data['min_open_parking']) || !empty($data['max_open_parking']))
					{
				
						if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
						{
						    $property['min_open_parking']    =  $data['min_open_parking'];	
					        $property['max_open_parking']    =  $data['max_open_parking'];
						}
						else
						{
							$property['min_open_parking']    =  $data['max_open_parking'];	
					        $property['max_open_parking']    =  $data['max_open_parking'];
						}
					}
					
					if(!empty($data['min_covered_parking']) || !empty($data['max_covered_parking']))
					{
				
						if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
						{
						    $property['min_covered_parking']    =  $data['min_covered_parking'];	
					        $property['max_covered_parking']    =  $data['max_covered_parking'];
						}
						else
						{
							$property['min_covered_parking']    =  $data['max_covered_parking'];	
					        $property['max_covered_parking']    =  $data['max_covered_parking'];
						}
					}
					
					if(!empty($data['min_ceiling_hight']) || !empty($data['max_ceiling_hight']))
					{
				
						if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
						{
						    $property['min_ceiling_hight']    =  $data['min_ceiling_hight'];	
					        $property['max_ceiling_hight']    =  $data['max_ceiling_hight'];
						}
						else
						{
							$property['min_ceiling_hight']    =  $data['max_ceiling_hight'];	
					        $property['max_ceiling_hight']    =  $data['max_ceiling_hight'];
						}
					}
					
					if(!empty($data['min_balcony']) || !empty($data['max_balcony']))
					{
				
						if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
						{
						    $property['min_balcony']    =  $data['min_balcony'];	
					        $property['max_balcony']    =  $data['max_balcony'];
						}
						else
						{
							$property['min_balcony']    =  $data['max_balcony'];	
					        $property['max_balcony']    =  $data['max_balcony'];
						}
					}
					
					if(!empty($data['min_bathroom']) || !empty($data['max_bathroom']))
					{
				
						if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
						{
						    $property['min_bathroom']    =  $data['min_bathroom'];	
					        $property['max_bathroom']    =  $data['max_bathroom'];
						}
						else
						{
							$property['min_bathroom']    =  $data['max_bathroom'];	
					        $property['max_bathroom']    =  $data['max_bathroom'];
						}
					}
					
					if(!empty($data['min_property_age']) || !empty($data['max_property_age']))
					{
				
						if($data['request_from'] ==  1 || $data['request_from'] ==  5 || $data['request_from'] == 6)
						{
						    $property['min_property_age']    =  $data['min_property_age'];	
					        $property['max_property_age']    =  $data['max_property_age'];
						}
						else
						{
							$property['min_property_age']    =  $data['max_property_age'];	
					        $property['max_property_age']    =  $data['max_property_age'];
						}
					}
					
					if(!empty($data['description']))
					{
					    $property['description']            =  $data['description'];
					}
					if(!empty($data['available_from_date']))
					{
						$property['available_from_date']    =  $data['available_from_date'];
					}
					if(!empty($data['available_from_week']))
					{
					    $property['available_from_week']    =  $data['available_from_week'];
					}
					
					if(!empty($data['entrance_width']))
					{
						$property['entrance_width']         =  $data['entrance_width'];
					}
					
			        if(!empty($data['lease_unit']))
					{
						$property['lease_unit']             =  $data['lease_unit'];
					}
					if(!empty($data['lease_period']))
					{
						$property['lease_period']           =  $data['lease_period'];
					}
	                
					if(!empty($data['security_deposit']))
					{
						$property['security_deposit']       =  $data['security_deposit'];
					}
			        if(!empty($data['maintenance_charge']))
					{
						$property['maintenance_charge']     =  $data['maintenance_charge'];
					}
					if(!empty($data['rent_increase']))
					{
						$property['rent_increase']          =  $data['rent_increase'];
					}
	                if(!empty($data['lockin_duration']))
					{
						$property['lockin_duration']        =  $data['lockin_duration'];
					}
					if(!empty($data['lockin_period']))
					{
						$property['lockin_period']          =  $data['lockin_period'];
					}
			        if(!empty($data['water_charge']))
					{
						$property['water_charge']           =  $data['water_charge'];
					}
					if(!empty($data['electricity_charge']))
					{
						$property['electricity_charge']     =  $data['electricity_charge'];
					}
					if(!empty($data['latitude']))
					{
						$property['latitude']       =  $data['latitude'];
					}
							
					if(!empty($data['longitude']))
					{
						$property['longitude']      =  $data['longitude'];
					}
			
					$this->db->where('property_id',$data['property_id'])->update('property',$property);
					$property_data = $this->db->where('property_id',$data['property_id'])->get('property')->row_array();
					$property_id  = $data['property_id'];
					
					if(!empty($property_id))
					{
							if(!empty($data['zone_type']))
							{
								$this->db->where('property_id',$property_id)->delete('zone_type');
								$filecount = count($data['zone_type']);
								for($i = 0; $i < $filecount; $i++)
								{
									$zone_type['property_id']  =  $property_id;
									$zone_type['zone_type']  =    $data['zone_type'][$i];
									$this->db->insert('zone_type',$zone_type);
								}
							}
							if(!empty($data['available_for']))
							{
						        $this->db->where('property_id',$property_id)->delete('available_for');
								$filecount = count($data['available_for']);

								for($i = 0; $i < $filecount; $i++)
								{
									$available_for['property_id']    =  $property_id;
									$available_for['available_for']  =  $data['available_for'][$i];
									
									$this->db->insert('available_for',$available_for);
								}
							}
							if(!empty($data['construction_status']))
							{
				
					            $this->db->where('property_id',$property_id)->delete('construction_status');
								$filecount = count($data['construction_status']);

								for($i = 0; $i < $filecount; $i++)
								{
									$construction_status['property_id']  =          $property_id;
									$construction_status['construction_status']  =  $data['construction_status'][$i];
									
									$this->db->insert('construction_status',$construction_status);
								}
							}
							if(!empty($data['furnishing_status']))
							{
						        $this->db->where('property_id',$property_id)->delete('furnishing_status');
								$filecount = count($data['furnishing_status']);

								for($i = 0; $i < $filecount; $i++)
								{
									$furnishing_status['property_id']  =  $property_id;
									$furnishing_status['furnishing_status']  =  $data['furnishing_status'][$i];
									
									$this->db->insert('furnishing_status',$furnishing_status);
								}
							}
							if(!empty($data['amenties']))
							{
								
					            $this->db->where('property_id',$property_id)->delete('amenities');
								$filecount = count($data['amenties']);

								for($i = 0; $i < $filecount; $i++)
								{
									$amenities['property_id']  =  $property_id;
									$amenities['amenities']    =  $data['amenties'][$i];
									
									$this->db->insert('amenities',$amenities);
								}
							}
							
							
							if(!empty($data['facing']))
							{
							   $this->db->where('property_id',$property_id)->delete('facing');
							   $filecount = count($data['facing']);

								for($i = 0; $i < $filecount; $i++)
								{
									$facing['property_id']  =  $property_id;
									$facing['facing']       =  $data['facing'][$i];
									
									$this->db->insert('facing',$facing);
								}
							}
							if(!empty($data['bhk']))
							{
			
							    $this->db->where('property_id',$property_id)->delete('bhk');
								$filecount = count($data['bhk']);

								for($i = 0; $i < $filecount; $i++)
								{
									$bhk['property_id']  =  $property_id;
									$bhk['bhk']          =  $data['bhk'][$i];
									
									$this->db->insert('bhk',$bhk);
								}
							}
							
							
							if(!empty($data['suitable_for']))
							{
						        $this->db->where('property_id',$property_id)->delete('suitable_for');
								$filecount = count($data['suitable_for']);

								for($i = 0; $i < $filecount; $i++)
								{
									$suitable_for['property_id']   =  $property_id;
									$suitable_for['suitable_for']  =  $data['suitable_for'][$i];
									
									$this->db->insert('suitable_for',$suitable_for);
								}
							}
							if(!empty($data['flooring']))
							{
					            $this->db->where('property_id',$property_id)->delete('flooring');
								$filecount = count($data['flooring']);

								for($i = 0; $i < $filecount; $i++)
								{
									$flooring['property_id']  =  $property_id;
									$flooring['flooring']     =  $data['flooring'][$i];
									
									$this->db->insert('flooring',$flooring);
								}
							}
							if(!empty($data['property_status']))
							{
							    $this->db->where('property_id',$property_id)->delete('property_status');
								$filecount = count($data['property_status']);

								for($i = 0; $i < $filecount; $i++)
								{
									$property_status['property_id']      =  $property_id;
									$property_status['property_status']  =  $data['property_status'][$i];
									
									$this->db->insert('property_status',$property_status);
								}
							}
							if(!empty($data['hub']))
							{
							    $this->db->where('property_id',$property_id)->delete('hub');
								$filecount = count($data['hub']);

								for($i = 0; $i < $filecount; $i++)
								{
									$hub['property_id']  =  $property_id;
									$hub['hub']          =  $data['hub'][$i];
									
									$this->db->insert('hub',$hub);
								}
							}
						
						if($data['request_from'] == 2 || $data['request_from'] == 3  || $data['request_from'] == 4 )
						{
						    if(!empty($_FILES['property_image']['name'][0]))
							{
								// $this->db->where('property_id',$property_id)->delete('property_images');
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
							
							if(!empty($data['map_location']))
							{
								$property_address['map_location']   =  $data['map_location'];
							}
							if(!empty($data['locality']))
							{
								$property_address['locality']       =  $data['locality'];
							}
							if(!empty($data['pincode']))
							{
								$property_address['pincode']        =  $data['pincode'];
							}
							if(!empty($data['property_city']))
							{
								$property_address['city']           =  $data['property_city'];
							}
							if(!empty($data['property_state']))
							{
								$property_address['state']          =  $data['property_state'];
							}
							if(!empty($data['address2']))
							{
								$property_address['address2']       =  $data['address2'];
							}
							
							if(!empty($data['latitude']))
							{
								$property_address['latitude']       =  $data['latitude'];
							}
							
							if(!empty($data['longitude']))
							{
								$property_address['longitude']      =  $data['longitude'];
							}
							
							$this->db->where('property_id',$property_id)->update('property_address', $property_address);
											
						}
	                }
					
					if(!empty($property_data) || !empty($property_images) || !empty($property_address))
					{
					    $sendarray['status']    =  1;
						
						if($data['request_from'] ==  1 )
						{
							$sendarray['message']    =  "success successfully updated buyer property .";
							$sendarray['redurl']     =  site_url("user/my_listing/looking_for/buy"); 
						}
						elseif($data['request_from'] ==  2)
						{
							$sendarray['message']    =  "success successfully updated seller property .";
							$sendarray['redurl']     =  site_url("user/my_listing/available_for/sell"); 
						}
						elseif($data['request_from'] ==  3)
						{
							$sendarray['message']    =  "success successfully updated landlord property .";
							$sendarray['redurl']     =  site_url("user/my_listing/available_for/rent_out");
						}
						elseif($data['request_from'] ==  4)
						{
							$sendarray['message']   =  "success successfully updated lessor property .";
							$sendarray['redurl']    =  site_url("user/my_listing/available_for/lease_out");
						}
						elseif($data['request_from'] ==  5)
						{
							$sendarray['message']   =  "success successfully updated tenant property .";
							$sendarray['redurl']    =  site_url("user/my_listing/looking_for/rent_in");
						}
						elseif($data['request_from'] ==  6)
						{
							$sendarray['message']    =  "success successfully updated lessee property .";
							$sendarray['redurl']     =  site_url("user/my_listing/looking_for/lease_in");
						}
					}
					else
					{
						$sendarray['status']    =  0;
					    $sendarray['message']   =  "oops something went wrong";
					   
					}
				}
				else
				{
					$sendarray['status']    =  0;
					$sendarray['message']   =  "oops all field required";
			
				}
			    return json_encode($sendarray, true);
			}
		}
		
		?>