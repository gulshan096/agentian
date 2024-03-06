<?php
Class CustomerModel extends CI_Model
		{
			function __construct()
				{
					parent::__construct();
				}

				public function saverecords()
				{ 
						$senddata = array();
						$senddata['status'] = 0;
						$senddata['message'] = "Something went wrong, Pleae try again later.";

						
							
								if(empty($this->input->post('firstname')))
									{
										$senddata['message'] = "First name is required.";
										return json_encode($senddata);
									}
									else
									{
										$customer_data  = array(

											'customerType'  =>   $this->input->post('customerType'),
											'salutation'  =>   $this->input->post('salutation'),
											'firstname'  => $this->input->post('firstname'),
											'lastname'  =>   $this->input->post('lastname'),
											'displayName'  => $this->input->post('displayName'),
											'customerEmail'  =>   $this->input->post('customerEmail'),
											'customerPhone'  => $this->input->post('customerPhone'),
											'skypeName'  => $this->input->post('skypeName'),
											'designation'  =>   $this->input->post('designation'),
											'department'  =>   $this->input->post('department'),
											'website'  => $this->input->post('website'),
											'gst'  =>   $this->input->post('gst'),
											'tax_pref'  => $this->input->post('tax_pref'),
											'gst_in'  =>   $this->input->post('gst_in'),
											'currency'  => $this->input->post('currency'),
											'supply'  =>   $this->input->post('supply'),
											'payment'  =>  $this->input->post('payment'),
											'facebook'  => $this->input->post('facebook'),
											'twitter'  =>   $this->input->post('twitter'),
											'dealer_name'  => $this->input->post('dealer_name'),
											'town_name'  => $this->input->post('town_name'),
											'country'  =>   $this->input->post('country'),
											'postcode'  =>  $this->input->post('postcode'),
											'phone_no'  =>  $this->input->post('phone_no'),
											'otherPhoneNo' => $this->input->post('otherPhoneNo')

										);
										

										if(!empty($customer_data)){

											$this->db->insert('customer', $customer_data);

											//$sql = $this->db->set($customer_data)->get_compiled_insert('customer');
											$senddata['status'] = 1;
											$senddata['redurl'] = site_url("administrator/Customer/view/new");
											$senddata['message'] = "Record Added Successfully"; 
											
											return json_encode($senddata);
										}
										else{
											$senddata['status'] = 2;
											$senddata['message'] = "Record Not Added "; 

											return json_encode($senddata);
										}
									}			

				}
		}

		
		
		


		
		
		
		
		
		

		
		
		
		
		
		

		
