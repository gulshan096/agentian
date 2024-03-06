<?php
Class CatalogueModel extends CI_Model
		{
			function __construct()
				{
					parent::__construct();
				}
			
			public function GetCatalogue($cid=0,$status=0,$select="*")
				{
					if(!empty($cid))
						{
							$temp	=	$this->db->query("SELECT * FROM `catalogue` where cid = '$cid'")->result_array();
								if(!empty($temp))
									{
										return $temp[0];
									}
										return array();
						}
						
					$this->db->select($select);
						$keyword	=	$this->input->post('keyword');
						
							if(!empty($keyword))
								{
									$this->db->where(" lower(title) like '%$keyword%' ");
								}
								
							if(!empty($status))
								{
									$this->db->where("status",$status);
								}
						$this->db->from("catalogue");
					return $this->db->get()->result_array(); 
				}


		    public function saverecords()
				{ 
					$senddata = array();
					$senddata['status'] = 0;
					$senddata['message'] = "Something went wrong, Pleae try again later.";
									
					$catalogue	=	$this->input->post('catalogue');
									
						if(!empty($catalogue))
							{
								$senddata = array();
								$senddata['status'] = 0;
								$senddata['message'] = "Successful";

								$image	=	uploadimgfile("imageFile","assets/catalogue","img_");
									if(empty($image['status']))
										{ 
											$senddata['message'] = $image['message'];;
											return json_encode($senddata);
										}
									if($image['status']==1)
										{
												$catalogue['image'] = $image['data']['name'];
										}
										
										
								$cataloguefile	=	uploadimgfile("cataloguefile","assets/catalogue","cat_");
									if(empty($cataloguefile['status']))
										{ 
											$senddata['message'] = $cataloguefile['message'];
											return json_encode($senddata);
										}
									if($cataloguefile['status']==1)
										{
												$catalogue['file'] = $cataloguefile['data']['name'];
										}
										
									//	print_r($image);
										$logincheck	=	$this->session->userdata(); 
										$catalogue['updated']	=	gettime4db();

										if(empty($catalogue['cid']))
									{
										 //$sql = $this->db->set($catalogue)->get_compiled_insert('catalogue');
										$catalogue['added']	=	gettime4db();
										$senddata['status'] = 1;
										$this->db->insert('catalogue', $catalogue);
										$senddata['message'] = "Catalogue ($catalogue[title]) Added successfully";

									} else {
										$this->db->where('cid', $catalogue['cid']);										
										$this->db->update('catalogue', $catalogue);
										
										$senddata['status'] = 2;
										$senddata['message'] = "Catalogue ($catalogue[title]) Updated successfully"; 
									}
									
										$this->AuthenticationModel->add_activity($senddata['message'],$logincheck['token'],$logincheck['usertype']);
									
										$senddata['status'] = 1;
										$senddata['redurl'] = site_url("administrator/catalogue/view");
										
								return json_encode($senddata);
							}
									
				}
				
		}
		
		?>