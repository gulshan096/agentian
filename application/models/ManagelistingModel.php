    <?php
        Class ManagelistingModel extends CI_Model
		{
			function __construct()
		    {
				parent::__construct();
			}
			
			public function getRequestProperty($request_from)
			{
					   $finalarray = array();
					   if($request_from != "all" )
					   {
						  $property = $this->db->where('request_from', $request_from)->get('property')->result_array();   
					   }
					   else
					   {
						  $property = $this->db->get('property')->result_array();   
					   }
					   
			            foreach($property as $row)
						{
							if($row['request_from'] == 1)
							{
								$row['request_from'] = 'Buy';
							}
							elseif($row['request_from'] == 2)
							{
								$row['request_from'] = 'Sell';
							}
							elseif($row['request_from'] == 3)
							{
								$row['request_from'] = 'Rent-out'; 
							}
							elseif($row['request_from'] == 4)
							{
								$row['request_from'] = 'lease-out';
							}
							elseif($row['request_from'] == 5)
							{
								$row['request_from'] = 'Rent-in';
							}
							elseif($row['request_from'] == 6)
							{
								$row['request_from'] = 'lease-in';
							}
							
							if(!empty($row['sell_type']))
							{
								$category = $this->db->select('category')->where('id',$row['sell_type'])->get('category')->row();
								$row['category'] = isset($category->category)?$category->category:"N/A";
							}
							
							if(!empty($row['property_type']))
							{
								$subcategory = $this->db->select('subcategory')->where('id',$row['property_type'])->get('subcategory')->row();
								$row['subcategory'] = isset($subcategory->subcategory)?$subcategory->subcategory:"N/A";
							}
							
							if(!empty($row['property_state']))
							{
								$property_state = $this->db->select('name')->where('id',$row['property_state'])->get('loc_states')->row();
							
								$row['property_state'] =  isset($property_state->name)?$property_state->name:"N/A";  
							}
							if(!empty($row['property_city']))
							{
								$property_city = $this->db->select('name')->where('id', $row['property_city'])->get('loc_cities')->row();
								$row['property_city'] = isset($property_city->name)?$property_city->name:"N/A"; 
							}
							if(!empty($row['property_type']))
							{
								
								$property_type = $this->db->select('child_category')->where('id',$row['property_type'])->get('filter_child_category')->row();
								$row['property_type'] = isset($property_type->child_category)?$property_type->child_category:"N/A";  
							}
							
							if(!empty($row['listing_by']))
							{
								$listing_by = $this->db->select('sub_category')->where('id',$row['listing_by'])->get('filter_subcategory')->row();
								$row['listing_by'] = isset($listing_by->sub_category)?$listing_by->sub_category:"N/A";  
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
										$final_available_for = $this->db->select('sub_category')->where_in('id', $temp_available_for)->get('filter_subcategory')->result_array();
										foreach($final_available_for as $rw)
										{
											$fresh_available_for[]  =  $rw['sub_category'];  
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
										$final_flooring = $this->db->select('sub_category')->where_in('id', $temp_flooring)->get('filter_subcategory')->result_array();
										foreach($final_flooring as $rw)
										{
											$fresh_flooring[]  =  $rw['sub_category'];  
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
										$final_property_status = $this->db->select('sub_category')->where_in('id', $temp_property_status)->get('filter_subcategory')->result_array();
										foreach($final_property_status as $rw)
										{
											$fresh_property_status[]  =  $rw['sub_category'];  
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
										$final_zone_type = $this->db->select('sub_category')->where_in('id', $temp_zone_type)->get('filter_subcategory')->result_array();
										foreach($final_zone_type as $rw)
										{
											$fresh_zone_type[]  =  $rw['sub_category'];  
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
										$final_construction_status = $this->db->select('sub_category')->where_in('id', $temp_construction_status)->get('filter_subcategory')->result_array();
										foreach($final_construction_status as $rw)
										{
											$fresh_construction_status[]  =  $rw['sub_category'];  
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
										$final_furnishing_status = $this->db->select('sub_category')->where_in('id', $temp_furnishing_status)->get('filter_subcategory')->result_array();
										foreach($final_furnishing_status as $rw)
										{
											$fresh_furnishing_status[]  =  $rw['sub_category'];  
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
										$final_bhk = $this->db->select('sub_category')->where_in('id', $temp_bhk)->get('filter_subcategory')->result_array();
										foreach($final_bhk as $rw)
										{
											$fresh_bhk[]  =  $rw['sub_category'];  
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
										$final_facing = $this->db->select('sub_category')->where_in('id', $temp_facing)->get('filter_subcategory')->result_array();
										foreach($final_facing as $rw)
										{
											$fresh_facing[]  =  $rw['sub_category'];  
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
										$final_hub = $this->db->select('sub_category')->where_in('id', $temp_hub)->get('filter_subcategory')->result_array();
										foreach($final_hub as $rw)
										{
											$fresh_hub[]  =  $rw['sub_category'];  
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
										$final_suitable_for = $this->db->select('sub_category')->where_in('id', $temp_suitable_for)->get('filter_subcategory')->result_array();
										foreach($final_suitable_for as $rw)
										{
											$fresh_suitable_for[]  =  $rw['sub_category'];  
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
										$final_amenities = $this->db->select('sub_category')->where_in('id', $temp_amenities)->get('filter_subcategory')->result_array();
										foreach($final_amenities as $rw)
										{
											$fresh_amenities[]  =  $rw['sub_category'];  
										}
										
									}
								}
                                $row['amenities'] = $fresh_amenities;								
							}
							
							
							
							
							if($row['requested_for'] == 1)
							{
								$row['requested_for'] = "Buyer" ;
							} 
							else
							{
								$row['requested_for'] = "Seller";
							}
							
							$this->db->select('property_image');
							$this->db->where('property_id',$row['property_id']);
							$row['propertyImages'] = $this->db->get('property_images')->result_array();
						
							$this->db->select('map_location,locality,pincode,city,state,address2');
							$this->db->where('property_id',$row['property_id']);
							$row['propertyAddress'] = $this->db->get('property_address')->result_array();
							
							$this->db->select('name,email,mobile,image');
							$this->db->where('aid',$row['user_id']);
							$row['administrator'] = $this->db->get('administrator')->result_array();
							
							$finalarray[]  =  $row;	
						}
			         return $finalarray;
		    }			
		}
		
	?>