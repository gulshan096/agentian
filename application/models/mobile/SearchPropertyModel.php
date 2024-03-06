    <?php
        Class SearchPropertyModel extends CI_Model
		{
			function __construct()
		    {
				parent::__construct();
			}
			public function searchProperty()
			{
			
		        $sendarray   = array();
				$finalarray  = array();
				
			    $property  =  $this->input->post();
				
					if(!empty($property['requested_for']))
					{
						$this->db->where('requested_for',$property['requested_for']);
					}
					if(!empty($property['request_from']))
					{
						$this->db->where('request_from',$property['request_from']);
					}
					if(!empty($property['sell_type']))
					{
						$this->db->where('sell_type',$property['sell_type']);
					}
					if(!empty($property['property_type']))
					{
						$this->db->where('property_type',$property['property_type']);
					}
					if(!empty($property['listing_by']))
					{
						$this->db->where('listing_by',$property['listing_by']);
					}
					if(!empty($property['property_state']))
					{
						$this->db->where('property_state',$property['property_state']);
					}
					if(!empty($property['property_city']))
					{
						$this->db->where('property_city',$property['property_city']);
					}
					if(!empty($property['budget']))
					{
						$values = 	explode("-",$property['budget']);
						
					    $from = $values[0];
					    $to   = $values[1];
						$min_budget  =  $from;	
					    $max_budget  =  $to;
						
						if($property['requested_for'] == 1)
						{
						   $this->db->where('min_budget >=',$min_budget);	
						   $this->db->where('max_budget <=',$max_budget);	
						}
						elseif($property['requested_for'] == 2)
						{
						
						    $this->db->where('max_budget <=',$max_budget);
						}
						
					}
				    $query = $this->db->get('property')->result_array();
					
					if(!empty($query))
					{
						foreach($query as $row)
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
								$sellType = $this->db->select('sub_category')->where('id',$row['sell_type'])->get('filter_subcategory')->row();
								$row['sell_type'] = isset($sellType->sub_category)?$sellType->sub_category:"";
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
				
					  $sendarray['status']  =  1;
				      $sendarray['message'] =  "successfully get data."; 
					  $sendarray['data']    =  $finalarray;	
					}
					else
					{
					  $sendarray['status']  =  0;
				      $sendarray['message'] =  "not find any record."; 
					  $sendarray['data']    =   array();	
					}
	
				return json_encode($sendarray, true);
		    }

            public function searchByUserCategory($webrequested_for = 0, $limit = 0)
			{

			    $sendarray  = array();
				$finalarray = array();	
				
				$user_id        =  $this->input->post('user_id');
				$request_from   =  $this->input->post('request_from');
				$requested_for  =  $this->input->post('requested_for');
	
				
				if(!empty($request_from) || !empty($user_id) || !empty($requested_for) || !empty($webrequested_for) || !empty($limit))
				{
				
				  if(!empty($user_id) && !empty($requested_for))
				  {
					$this->db->where('user_id', $user_id);
                    $this->db->where('requested_for', $requested_for);					
				  }
				  elseif(!empty($request_from))
				  {
					$this->db->where('request_from', $request_from);  
				  }
				  elseif(!empty($requested_for))
				  {
					$this->db->where('requested_for', $requested_for);  
				  }
				  elseif(!empty($user_id))
				  {
					$this->db->where('user_id', $user_id);  
				  }
				  elseif(!empty($webrequested_for) && !empty($limit) )
				  {
					 $this->db->where('requested_for', $webrequested_for);
                     $this->db->limit($limit);					 
				  }
				  elseif(!empty($webrequested_for))
				  {
					 $this->db->where('requested_for', $webrequested_for);				 
				  }
                  			  
				  $this->db->where('status',1); 
				  $query = $this->db->get('property')->result_array();
				  
					if(!empty($query))
					{
						foreach($query as $row)
						{
                            $row['request_from_id'] = $row['request_from'];
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
								$sellType = $this->db->select('category')
								            ->where('id',$row['sell_type'])
											->get('category')->row();
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
							$sendarray['message'] =  "oops could't find  property";
							$sendarray['data']    =   array();
					}						 			  
				}
				else
				{
					$sendarray['status']  =  0;
					$sendarray['message'] =  "oops all field are required"; 
					$sendarray['data']    =   array();
				}
				return json_encode($sendarray, true);
			}	
		}
		
	?>