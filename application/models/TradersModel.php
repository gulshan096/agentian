<?php
Class TradersModel extends CI_Model
		{
			function __construct()
				{
					parent::__construct();
				}
			
			public function GetParty($tid=0,$status=0)
				{
					
					if(!empty($tid))
						{
							$temp	=	$this->db->query("SELECT * FROM `traders` where tid = '$tid'")->result_array();
								if(!empty($temp))
									{
										
										$traders_docs	=	$this->db->query("SELECT * FROM `traders_docs` where tid = '$tid'")->result_array();

											if(!empty($traders_docs))
												{
													$temp[0]['traders_docs']	=	$traders_docs[0];
												}
									
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
									
						$this->db->from("traders");
						
					return $this->db->get()->result_array();
				}
				
		    public function saverecords()
				{
					
					$senddata	=	array();
						$senddata['status'] 	=	0;
						$senddata['message']	=	"Something went wrong, Pleae try again later.";
					
							$traders	=	$this->input->post("traders");
					
					
						if(!empty($traders))
							{
								
								if (!filter_var($traders['email'], FILTER_VALIDATE_EMAIL))
									{
										 $senddata['message']	=	"$traders[email] is not valid, Please enter valid email address.";
											return json_encode($senddata); 
									//	return "<div class='alert alert-danger'></div>";
									}
								
								
						$temp	=	$this->db->query("SELECT name FROM `traders` where tid != '$traders[tid]' AND email = '$traders[email]'; ")->result_array();
								if(!empty($temp))
									{
										 $senddata['message']	=	"$traders[email] is already have account with name ".$temp[0]['name'].".";
											return json_encode($senddata); 
									}
									
						$temp	=	$this->db->query("SELECT name FROM `traders` where tid != '$traders[tid]' AND mobile = '$traders[mobile]'; ")->result_array();
								if(!empty($temp))
									{
										 $senddata['message']	=	"$traders[mobile] is already have account with name ".$temp[0]['name'].".";
											return json_encode($senddata); 
									}
								
								if(!empty($traders['tid']))
									{
										$this->db->where('tid',$traders['tid']);	
										$this->db->update('traders',$traders);	
											$message	=	"Trader $traders[name] Updated successfully.";
											$senddata['status'] 	=	2;
												
									} else {
										$traders['added']	=	gettime4db();
										$this->db->insert('traders',$traders);	
										
											$traders['tid']	=	$this->db->insert_id();
										
											$message	=	"Trader $traders[name] Added successfully.";
											$senddata['status'] 	=	1;
									}
									
									$senddata['message'] 	=	$message;
									
									// for traders documents
									
										$traders_docs	=	array();
											$traders_docs['tid']	=	$traders['tid'];
											
											
											
											
				$registration	=	uploadimgfile("registration","assets/traders","regi_");
					if(empty($registration['status'])) { $senddata['message'] = "Company Registration Proof Error: ".$registration['message']; return json_encode($senddata); }
						if($registration['status']==1) { $traders_docs['registration'] = $registration['data']['name']; }
						
				$gst	=	uploadimgfile("gst","assets/traders","gst_");
					if(empty($gst['status'])) { $senddata['message'] = "GST Error: ".$gst['message']; return json_encode($senddata); }
						if($gst['status']==1) { $traders_docs['gst'] = $gst['data']['name']; }
						
				$pan	=	uploadimgfile("pan","assets/traders","pan_");
					if(empty($pan['status'])) { $senddata['message'] = "PAN Error: ".$pan['message']; return json_encode($senddata); }
						if($pan['status']==1) { $traders_docs['pan'] = $pan['data']['name']; }
						
				$signature	=	uploadimgfile("signature","assets/traders","sign_");
					if(empty($signature['status'])) { $senddata['message'] = "Signature ID Proof Error: ".$signature['message']; return json_encode($senddata); }
						if($signature['status']==1) { $traders_docs['signature'] = $signature['data']['name']; }
						
				$adhar_front	=	uploadimgfile("adhar_front","assets/traders","adhar_f_");
					if(empty($adhar_front['status'])) { $senddata['message'] = "Adhar Front Error: ".$adhar_front['message']; return json_encode($senddata); }
						if($adhar_front['status']==1) { $traders_docs['adhar_front'] = $adhar_front['data']['name']; }
						
				$adhar_back	=	uploadimgfile("adhar_back","assets/traders","adhar_b_");
					if(empty($adhar_back['status'])) { $senddata['message'] = "Adhar Back Error: ".$adhar_back['message']; return json_encode($senddata); }
						if($adhar_back['status']==1) { $traders_docs['adhar_back'] = $adhar_back['data']['name']; }
						
				$cancelled_cheque	=	uploadimgfile("cancelled_cheque","assets/traders","cheque_");
					if(empty($cancelled_cheque['status'])) { $senddata['message'] = "Cancelled Cheque Error: ".$cancelled_cheque['message']; return json_encode($senddata); }
						if($cancelled_cheque['status']==1) { $traders_docs['cancelled_cheque'] = $cancelled_cheque['data']['name']; }
											
										//		
										$check	=	$this->db->query(" SELECT `tid` FROM `traders_docs` WHERE `tid` = '$traders[tid]' ")->result_array();
										
											if(!empty($check))
												{
													$this->db->where('tid',$traders['tid']);	
													$this->db->update('traders_docs',$traders_docs);	
												} else {
													$this->db->insert('traders_docs',$traders_docs);	
												}
									
										// for traders documents
									
										$senddata['redurl']		=	site_url('administrator/traders/view');
										$senddata['message']	=	$message;
									
							}
					return json_encode($senddata); 
				}
				public function GetSchemes($sid=0,$status=0)
				{
					if(!empty($sid))
						{
						$temp	=	$this->db->query("SELECT * FROM `schemes` where sid = '$sid'")->result_array();
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
						$this->db->from("schemes");
					return $this->db->get()->result_array(); 		
				}
				public function AddSchemes()
				{

					$senddata = array();
					$senddata['status'] = 0;
					$senddata['message'] = "Something went wrong, Pleae try again later.";
									
					$schemes	=	$this->input->post('schemes');
									
						if(!empty($schemes))
							{
								$senddata = array();
								$senddata['status'] = 1;
								$senddata['message'] = "Successful";
										
								$logincheck	=	$this->session->userdata(); 
								$schemes['updated']	=	gettime4db();

										if(empty($schemes['sid']))
									{
										 //$sql = $this->db->set($schemes)->get_compiled_insert('schemes');
											$schemes['added']	=	gettime4db();
											$this->db->insert('schemes', $schemes);
											$senddata['message'] = "Schemes ($schemes[quantity]) Added successfully";
										

									} else {
										$this->db->where('sid', $schemes['sid']);										
										$this->db->update('schemes', $schemes);
										$senddata['message'] = "Schemes ($schemes[quantity]) Updated successfully"; 
									}
									
										$this->AuthenticationModel->add_activity($senddata['message'],$logincheck['token'],$logincheck['usertype']);
									
										$senddata['status'] = 1;
										$senddata['redurl'] = site_url("administrator/traders/schemes");
										
								return json_encode($senddata);
							}
				}
		}
		
		?>