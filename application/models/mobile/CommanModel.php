    <?php
        Class CommanModel extends CI_Model
		{
			function __construct()
		    {
				parent::__construct();
			}
			
			public function keyword_search()
			{
				$input = $this->input->post('input'); 
                $query = $this->db->select('property.*,ls.name as state, lc.name as city')
				         ->join('loc_states as ls','ls.id = property.property_state','left')
				         ->join('loc_cities as lc','lc.id = property.property_city','left')
				         ->like('property_address1',$input)
						 ->get('property')
						 ->result_array(); 
						
			   $output = '';
			   
			    foreach($query as $row)
				{
				  $output .='<option value="'.$row['property_id'].'">'.$row['property_address1'].','.$row['state'].','.$row['city'].'</option>'; 	
				}
				return json_encode($output);
			}
			
			public function enqueryFormSubmit()
			{
				$sendarray = array();	
				$post_val = $this->input->post();

				$query = $this->db->insert('contacts',$post_val);
				if($query)
				{
					$sendarray['status']  =  1;
					$sendarray['redurl']  =   site_url("contact");
				    $sendarray['message'] =  'successfully submited.';	
				}
				else
				{
				    $sendarray['status']  =  0;
					$sendarray['redurl']  =   site_url("contact");
				    $sendarray['message'] =  'Oops something went wrong.';	
				}
				return json_encode($sendarray);
			}
			
			
			public function check_wishlist($pid, $uid)
			{
				return $this->db->where('property_id',$pid)->where('user_id',$uid)->get('wishlist')->result_array();
			}
			
			public function addToWishlist()
			{
				$sendarray = array();
				$wishlist = $this->input->post();
				
				if($this->session->userdata('aid'))
				{
					$wishlist['user_id'] = $this->session->userdata('aid');
				}
				else
				{
					$wishlist['user_id']     = $this->input->post('user_id');
				}
				
				$query = $this->db->where('property_id',$wishlist['property_id'])->where('user_id',$wishlist['user_id'])->get('wishlist')->result_array();
				if(count($query) > 0)
				{
					$sendarray['status']  = 0;
                    $sendarray['message'] =  'already added wishlist';
				}
                else
				{
	                $this->db->insert('wishlist',$wishlist);
				    $sendarray['status'] = 1;
                    $sendarray['message'] =  'Successfuly add wishlist';
			
                }				
				
				return json_encode($sendarray);
		    } 

            public function removeFromWishlist()
			{
				
				$sendarray = array();
				$property_id = $this->input->post('property_id');
				
				if($this->session->userdata('aid'))
				{
					$user_id = $this->session->userdata('aid');
				}
				else
				{
					$user_id = $this->input->post('user_id');
				}
				$this->db->where('user_id',$user_id)->where('property_id',$property_id)->delete('wishlist');
				$sendarray['status']  = 1;
                $sendarray['message'] =  'Successfuly remove from wishlist';

				return json_encode($sendarray);
		    }

            public function getWishlist()
			{
				$sendarray   = array();
				$finalarray  = array();
				
				
			    $user_id        = $this->input->post('user_id');
				$requested_for  =  $this->input->post('requested_for');
			
				$this->db->where('user_id',$user_id);
				$query1 = $this->db->get('wishlist')->result_array();
				
				if(!empty($query1))
				{
				    foreach($query1 as $row)
				    {
						if(!empty($requested_for))
						{
						    $this->db->where('requested_for', $requested_for);
						}
	
					    $this->db->where('property_id',$row['property_id']);
				        $query = $this->db->get('property')->result_array();
					
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
								$row['sell_type'] = isset($sellType->sub_category)?$sellType->sub_category:"N/A";
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
							$sendarray['message'] =  'successfully get wishlist';
							$sendarray['data']    =  $finalarray;
						}
						else
						{
							$sendarray['status']  = 0;
					        $sendarray['message'] = 'not wishlist added';
					        $sendarray['data']    =  array();
						}    
				    }	
				}
				else
				{
					$sendarray['status']  = 0;
					$sendarray['message'] = 'not wishlist added';
					$sendarray['data']    =  array();
				}
				return json_encode($sendarray, true);	
			}	

            
			public function addFeedbackRating()
			{
                $sendarray = array();
				
				$feedback['property_id'] = $this->input->post('property_id');
				$feedback['user_id']     = $this->input->post('user_id');
				$feedback['rating']      = $this->input->post('rating');
				$feedback['message']     = $this->input->post('message');
				
				$this->db->insert('feedback',$feedback);
				
				$sendarray['status']  = 1;
                $sendarray['message'] =  'Your feedback submited successfully';
				
				return json_encode($sendarray);
			}
			
			
			public function getFeedbackRating()
			{
			    $sendarray = array();
			    $finalarray = array();
				
				$property_id   =   $this->input->post('property_id');
				
				$this->db->select('id,user_id,rating,message,created');
				$this->db->where('property_id',$property_id);
				$data = $this->db->get('feedback')->result_array();
				
				if(!empty($data))
				{
				
                    foreach($data as $row)
					{
						$this->db->select('name');
					    $this->db->where('aid',$row['user_id']);
					    $username = $this->db->get('administrator')->row_array();
					    $row['feedbacker']   =  $username['name'];
						
						$finalarry[] =  $row;
					}					
					
					$sendarray['status']  =  1;
                    $sendarray['message'] =  'feedback get successfully';
					$sendarray['data']    =  $finalarry;
				}
				else
				{
                    $sendarray['status']  =  0;
                    $sendarray['message'] =  'no feedback found';
					$sendarray['data']    =  array();
				}
                return json_encode($sendarray);
			}

            public function addTestimonial()
			{
                $sendarray = array();
				
				$testimonial['user_id']     = $this->input->post('user_id');
				$testimonial['message']     = $this->input->post('message');
				$testimonial['rating']      = $this->input->post('rating');
				
				
				
				$this->db->insert('testimonial',$testimonial);
				
				$sendarray['status']  = 1;
                $sendarray['message'] =  'Your testimonial submited successfully';
				
				return json_encode($sendarray);
			}
			
			public function getTestimonial()
			{
                $sendarray = array();
			    $finalarray = array();
				
				$data = $this->db->get('testimonial')->result_array();
				
				if(!empty($data))
				{
				
                    foreach($data as $row)
					{
						$this->db->select('name,image,state,city');
					    $this->db->where('aid',$row['user_id']);
					    $username = $this->db->get('administrator')->row_array();
					    $row['user_name']   =  $username['name'];
						$row['user_image']  =  $username['image'];
						$row['state']  =  $username['state'];
						$row['city']   =  $username['city'];
						
						
						if(!empty($row['state']))
						{
							$state = 	$this->db->select('name')->where('id',$row['state'])->get('loc_states')->row_array();
						    $row['state'] =  $state['name'];
						}
						if(!empty($row['city']))
						{
						  $city = 	$this->db->select('name')->where('id',$row['city'])->get('loc_cities')->row_array();
						  
						  $row['city'] =  $city['name'];
						}
						
						
						$finalarry[] =  $row;
					}					
					
					$sendarray['status']  =  1;
                    $sendarray['message'] =  'testimonial get successfully';
					$sendarray['data']    =  $finalarry;
				}
				else
				{
                    $sendarray['status']  =  0;
                    $sendarray['message'] =  'no testimonial found';
					$sendarray['data']    =  array();
				}
                return json_encode($sendarray);
			}
			
			
			public function updateUserToken()
			{
			  $sendarray = array();
			  $post_val  = $this->input->post();
			  
			  if(!empty($post_val['token']) && !empty($post_val['uid']))
			  {
				  $data = array(
			    
				    'token' => $post_val['token'],
				  );
				  
				  $this->db->where('aid',$post_val['uid']);
				  $this->db->update('administrator',$data);
				  $this->db->trans_complete();
				  
				  if($this->db->trans_status() === FALSE)
				  {
					$sendarray['status']  = 0;
					$sendarray['message'] = 'error';
					$sendarray['token']   =  array();
					
				  }
				  else
				  {
					$sendarray['status']  = 1;
					$sendarray['message'] = 'success';
					$sendarray['token']   = $post_val['token'];  
				  } 
			  }
			  else
			  {
				    $sendarray['status']  = 0;
					$sendarray['message'] = 'error all firld required.';
			   
			  }
              return json_encode($sendarray, true);
			  
			}
			
			
			public function getWishlist_web($requested_for)
			{
				$sendarray   = array();
				$finalarray  = array();
			
			    $user_id        =  $this->session->userdata('aid');
				$requested_for  =  $requested_for;
				
				$this->db->where('user_id',$user_id);
				$query1 = $this->db->get('wishlist')->result_array();
				
				if(!empty($query1))
				{
				    foreach($query1 as $row)
				    {
						if(!empty($requested_for))
						{
						    $this->db->where('requested_for', $requested_for);
						}
	
					    $this->db->where('property_id',$row['property_id']);
				        $query = $this->db->get('property')->result_array();
					
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
								$sellType = $this->db->select('category')->where('id',$row['sell_type'])->get('category')->row();
								$row['sell_type'] = isset($sellType->category)?$sellType->category:"N/A";
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
								
								$property_type = $this->db->select('subcategory')->where('id',$row['property_type'])->get('subcategory')->row();
								$row['property_type'] = isset($property_type->subcategory)?$property_type->subcategory:"N/A";  
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
							$sendarray['message'] =  'successfully get wishlist';
							$sendarray['data']    =  $finalarray;
						}
						else
						{
							$sendarray['status']  = 0;
					        $sendarray['message'] = 'not wishlist added';
					        $sendarray['data']    =  array();
						}    
				    }	
				}
				else
				{
					$sendarray['status']  = 0;
					$sendarray['message'] = 'not wishlist added';
					$sendarray['data']    =  array();
				}
				
			
				return json_encode($sendarray, true);	
			}
			
			
			 
		}
		
	?>