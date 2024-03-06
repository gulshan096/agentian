    <?php
        Class FilterModel extends CI_Model
		{
			function __construct()
		    {
				parent::__construct();
			}
			public function filterProperty()
			{
				$finalarray = array();
				$sendarray = array();
				$post_val = $this->input->post();
				
				  if(!empty($post_val['amenities']))
				  {
					 $amenities         = json_decode($post_val['amenities'],true);
					 $amenitiesSubQuery = $this->db->select('property_id')->where_in('amenities',$amenities)->get_compiled_select('amenities');
				  
				  }
				  else
				  {
					 $amenitiesSubQuery = 1; 
				  }
				  
				  
		
				  if(!empty($post_val['zone_type']))
				  {
					$zone_type        = json_decode($post_val['zone_type'],true); 
                    $zoneTypeSubQuery = $this->db->select('property_id')->where_in('zone_type',$zone_type)->get_compiled_select('zone_type');					
				  }
				  else
				  {
					 $zoneTypeSubQuery = 1; 
				  }
				  
				  if(!empty($post_val['available_for']))
				  {
					 $available_for        = json_decode($post_val['available_for'],true);
					 $availableForSubQuery = $this->db->select('property_id')->where_in('available_for',$available_for)->get_compiled_select('available_for');					
				  }
				  else
				  {
					 $availableForSubQuery = 1; 
				  }
				  
				  if(!empty($post_val['construction_status']))
				  {
					 $construction_status   = json_decode($post_val['construction_status'],true);
					 $constructionStatusSubQuery = $this->db->select('property_id')->where_in('construction_status',$construction_status)->get_compiled_select('construction_status');					
				  }
				  else
				  {
					 $constructionStatusSubQuery = 1; 
				  }
				  
				  if(!empty($post_val['furnishing_status']))
				  {
					 $furnishing_status     = json_decode($post_val['furnishing_status'],true);	
                     $furnishingStatusSubQuery = $this->db->select('property_id')->where_in('furnishing_status',$furnishing_status)->get_compiled_select('furnishing_status');
				  				 
				  }
				  else
				  {
					 $furnishingStatusSubQuery = 1; 
				  }
				  
				  
				  
				  if(!empty($post_val['facing']))
				  {
					$facing         = json_decode($post_val['facing'],true);
					$facingSubQuery = $this->db->select('property_id')->where_in('facing',$facing)->get_compiled_select('facing');
				  				
				  }
				  else
				  {
					 $facingSubQuery = 1; 
				  }
				  if(!empty($post_val['bhk']))
				  {
					$bhk         = json_decode($post_val['bhk'],true);
					$bhkSubQuery = $this->db->select('property_id')->where_in('bhk',$bhk)->get_compiled_select('bhk');
				  				
				  }
				  else
				  {
					 $bhkSubQuery = 1; 
				  }
				  
				  if(!empty($post_val['suitable_for']))
				  {
					$suitable_for        = json_decode($post_val['suitable_for'],true);
					$suitableForSubQuery = $this->db->select('property_id')->where_in('suitable_for',$suitable_for)->get_compiled_select('suitable_for');
				  					
				  }
				  else
				  {
					 $suitableForSubQuery = 1; 
				  }
				  
				  if(!empty($post_val['flooring']))
				  {
					$flooring         = json_decode($post_val['flooring'],true);
					$flooringSubQuery = $this->db->select('property_id')->where_in('flooring',$flooring)->get_compiled_select('flooring');
				  		
				  }
				  else
				  {
					 $flooringSubQuery = 1; 
				  }
				  
				  if(!empty($post_val['property_status']))
				  {
					$property_status        = json_decode($post_val['property_status'],true);
					$propertyStatusSubQuery = $this->db->select('property_id')->where_in('property_status',$property_status)->get_compiled_select('property_status');
				  				
				  }
				  else
				  {
					 $propertyStatusSubQuery = 1; 
				  }
				  
				  if(!empty($post_val['hub']))
				  {
					$hub         = json_decode($post_val['hub'],true);
                    $hubSubQuery = $this->db->select('property_id')->where_in('hub',$hub)->get_compiled_select('hub');					
				  }
				  else
				  {
					 $hubSubQuery = 1; 
				  }
				  
				  if(empty($post_val['request_from']))
				  {
					$post_val['request_from'] = 1;  
				  }
				  if(empty($post_val['requested_for']))
				  {
					$post_val['requested_for'] = 1;  
				  }
				  
				  
				    $requested_for = $post_val['requested_for'];
				  
				  
				  
				    if(!empty($post_val['budget']))
					{
						$values = 	explode("-",$post_val['budget']);
						
					    $from = $values[0];
					    $to   = $values[1];
						$min_budget  =  $from;	
					    $max_budget  =  $to;
						
						if($post_val['requested_for'] == 1)
						{
						    $budget =  "max_budget <= ".$max_budget." ";	
						   
						}
						elseif($post_val['requested_for'] == 2)
						{
						
						    $budget =  " max_budget <= ".$max_budget." ";
						}
					}
					else
					{   
					    if($post_val['requested_for'] == 1)
						{
						    $budget =  1;	  
						}
						elseif($post_val['requested_for'] == 2)
						{
						    $budget =  1 ;
						}	
					}
					
					if(!empty($post_val['open_parking']))
					{
						$values = 	explode("-",$post_val['open_parking']);
						
					    $from = $values[0];
					    $to   = $values[1];
						$min_open_parking  =  $from;	
					    $max_open_parking  =  $to;
						
						if($post_val['requested_for'] == 1)
						{
						    $open_parking =  "max_open_parking <= ".$max_open_parking." ";	
						   
						}
						elseif($post_val['requested_for'] == 2)
						{
						
						    $open_parking =  " max_open_parking <= ".$max_open_parking." ";
						}
					}
					else
					{   
					    if($post_val['requested_for'] == 1)
						{
						    $open_parking =  1;	  
						}
						elseif($post_val['requested_for'] == 2)
						{
						    $open_parking =  1 ;
						}	
					}
					
					
					
					
					if(!empty($post_val['covered_parking']))
					{
						$values = 	explode("-",$post_val['covered_parking']);
						
					    $from = $values[0];
					    $to   = $values[1];
						$min_covered_parking  =  $from;	
					    $max_covered_parking  =  $to;
						
						if($post_val['requested_for'] == 1)
						{
						    $covered_parking =  "max_covered_parking <= ".$max_covered_parking." ";	
						   
						}
						elseif($post_val['requested_for'] == 2)
						{
						
						    $covered_parking =  " max_covered_parking <= ".$max_covered_parking." ";
						}
					}
					else
					{   
					    if($post_val['requested_for'] == 1)
						{
						    $covered_parking =  1;	  
						}
						elseif($post_val['requested_for'] == 2)
						{
						    $covered_parking =  1 ;
						}	
					}
					
					
					
					if(!empty($post_val['balcony']))
					{
						$values = 	explode("-",$post_val['balcony']);
						
					    $from = $values[0];
					    $to   = $values[1];
						$min_balcony  =  $from;	
					    $max_balcony  =  $to;
						
						if($post_val['requested_for'] == 1)
						{
						    $balcony =  "max_balcony <= ".$max_balcony." ";	
						   
						}
						elseif($post_val['requested_for'] == 2)
						{
						
						    $balcony =  " max_balcony <= ".$max_balcony." ";
						}
					}
					else
					{   
					    if($post_val['requested_for'] == 1)
						{
						    $balcony =  1;	  
						}
						elseif($post_val['requested_for'] == 2)
						{
						    $balcony =  1 ;
						}	
					}
					
					
					
					if(!empty($post_val['bathroom']))
					{
						$values = 	explode("-",$post_val['bathroom']);
						
					    $from = $values[0];
					    $to   = $values[1];
						$min_bathroom  =  $from;	
					    $max_bathroom  =  $to;
						
						if($post_val['requested_for'] == 1)
						{
						    $bathroom =  "max_bathroom <= ".$max_bathroom." ";	
						   
						}
						elseif($post_val['requested_for'] == 2)
						{
						
						    $bathroom =  " max_bathroom <= ".$max_bathroom." ";
						}
					}
					else
					{   
					    if($post_val['requested_for'] == 1)
						{
						    $bathroom = 1;	  
						}
						elseif($post_val['requested_for'] == 2)
						{
						    $bathroom = 1 ;
						}	
					}
					
					
					
					if(!empty($post_val['ceiling_hight']))
					{
						$values = 	explode("-",$post_val['ceiling_hight']);
						
					    $from = $values[0];
					    $to   = $values[1];
						$min_ceiling_hight  =  $from;	
					    $max_ceiling_hight  =  $to;
						
						if($post_val['requested_for'] == 1)
						{
						    $ceiling_hight =  "max_ceiling_hight <= ".$max_ceiling_hight." ";	
						   
						}
						elseif($post_val['requested_for'] == 2)
						{
						
						    $ceiling_hight =  " max_ceiling_hight <= ".$max_ceiling_hight." ";
						}
					}
					else
					{   
					    if($post_val['requested_for'] == 1)
						{
						    $ceiling_hight =  1;	  
						}
						elseif($post_val['requested_for'] == 2)
						{
						    $ceiling_hight = 1 ;
						}	
					}
					
					
					
					
					if(!empty($post_val['floor']))
					{
						$values = 	explode("-",$post_val['floor']);
						
					    $from = $values[0];
					    $to   = $values[1];
						$min_floor  =  $from;	
					    $max_floor  =  $to;
						
						if($post_val['requested_for'] == 1)
						{
						    $floors =  "max_floor <= ".$max_floor." ";	  
						}
						elseif($post_val['requested_for'] == 2)
						{
						    $floors =  " max_floor <= ".$max_floor." ";
						}
					}
					else
					{   
					    if($post_val['requested_for'] == 1)
						{
						    $floors =  1;	  
						}
						elseif($post_val['requested_for'] == 2)
						{
						    $floors =  1 ;
						}	
					}
					
					
					if(!empty($post_val['property_age']))
					{
						$values = 	explode("-",$post_val['property_age']);
						
					    $from = $values[0];
					    $to   = $values[1];
						$min_property_age  =  $from;	
					    $max_property_age  =  $to;
						
						if($post_val['requested_for'] == 1)
						{
						    $property_age =  "max_property_age <= ".$max_property_age." ";	  
						}
						elseif($post_val['requested_for'] == 2)
						{
						    $property_age =  "max_property_age <= ".$max_property_age." ";
						}
					}
					else
					{   
					    if($post_val['requested_for'] == 1)
						{
						    $property_age =  1;	  
						}
						elseif($post_val['requested_for'] == 2)
						{
						    $property_age =  1 ;
						}	
					}
					
					
					
					if(!empty($post_val['buildup_area']))
					{
						$values = 	explode("-",$post_val['buildup_area']);
						
					    $from = $values[0];
					    $to   = $values[1];
						$min_buildup_area  =  $from;	
					    $max_buildup_area  =  $to;
						
						if($post_val['requested_for'] == 1)
						{
						    $buildup_area =  "max_buildup_area <= ".$max_buildup_area." ";	  
						}
						elseif($post_val['requested_for'] == 2)
						{
						    $buildup_area =  " max_buildup_area <= ".$max_buildup_area." ";
						}
					}
					else
					{   
					    if($post_val['requested_for'] == 1)
						{
						    $buildup_area =  1;	  
						}
						elseif($post_val['requested_for'] == 2)
						{
						    $buildup_area =  1 ;
						}	
					}
					
					
					
					if(!empty($post_val['carpet_area']))
					{
						$values = 	explode("-",$post_val['carpet_area']);
						
					    $from = $values[0];
					    $to   = $values[1];
						$min_carpet_area  =  $from;	
					    $max_carpet_area  =  $to;
						
						if($post_val['requested_for'] == 1)
						{
						    $carpet_area =  "max_carpet_area <= ".$max_carpet_area." AND max_carpet_area != 0 ";	  
						}
						elseif($post_val['requested_for'] == 2)
						{
						    $carpet_area =  " max_carpet_area <= ".$max_carpet_area." AND max_carpet_area != 0 ";
						}
					}
					else
					{   
					    if($post_val['requested_for'] == 1)
						{
						    $carpet_area =  1;	  
						}
						elseif($post_val['requested_for'] == 2)
						{
						    $carpet_area =  1 ;
						}	
					}
					if(!empty($post_val['sell_type']))
					{
						$selltype = $post_val['sell_type'];
					}
					else
					{
						$selltype = 1;
					}
					
					if(!empty($post_val['request_from']))
					{
						$request_from = $post_val['request_from'];
					}
					else
					{
						$request_from = 1;
					}
					
					
				    $sql = "SELECT * FROM property WHERE requested_for = '".$requested_for."' 
				          AND
						  request_from = '".$request_from."' 
						  AND
						   sell_type = '".$selltype."' 
						  AND
						  ".$budget."
						  AND
						  ".$buildup_area." 
						  AND
							".$carpet_area." 
					      AND 
                              ".$open_parking."
						  AND 
							  ".$covered_parking."
                          AND 
							  ".$balcony."
						  AND 
							  ".$bathroom."
                          AND 
							  ".$ceiling_hight." 
						  AND 
							  ".$floors."
                          AND
							   							  
						  (
							  property_id IN (".$zoneTypeSubQuery.")
							  OR
							  property_id IN (".$suitableForSubQuery.")
							  OR
							  property_id IN (".$availableForSubQuery.")
							  OR
							  property_id IN (".$constructionStatusSubQuery.")
							  OR
							  property_id IN (".$furnishingStatusSubQuery.")
							  OR
							  property_id IN (".$amenitiesSubQuery.")
							  OR
							  property_id IN (".$facingSubQuery.")
							  OR
							  property_id IN (".$bhkSubQuery.")
							  OR
							  property_id IN (".$flooringSubQuery.")
							  OR
							  property_id IN (".$propertyStatusSubQuery.")
							  OR
							  property_id IN (".$hubSubQuery.")
                          						  
				          )";
						 
				  $query = $this->db->query($sql)->result_array();
				  
				  // echo count($query);
				  
				 
				  
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
								
								$property_type = $this->db->select('child_category')->where('id',$row['property_type'])->get('filter_child_category')->row();
								$row['property_type'] = isset($property_type->child_category)?$property_type->child_category:"";  
							}
							
							if(!empty($row['listing_by']))
							{
							
								$listing_by = $this->db->select('sub_category')->where('id',$row['listing_by'])->get('filter_subcategory')->row();
								
								$row['listing_by'] = isset($listing_by->sub_category)?$listing_by->sub_category:"";  
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
				  
		
				
				return json_encode($sendarray, true);
				        
		    } 			
		}
		
	?>