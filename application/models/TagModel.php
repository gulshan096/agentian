<?php
Class TagModel extends CI_Model
		{
			function __construct()
				{
					parent::__construct();
				}
			
			public function GetTag($id=0,$status=0)
				{
					

					if(!empty($id))
						{
						$temp	=	$this->db->query("SELECT * FROM `tags` where tid = '1'")->result_array();
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
						$this->db->from("tags");
						return $this->db->get()->result_array(); 
				}

		    public function saverecords()
				{ 
					$senddata = array();
					$senddata['status'] = 0;
					$senddata['message'] = "Something went wrong, Please try again later.";
					$tag=$this->input->post('tags');
					if(empty($tag['name']))
						{
							$senddata['message'] = "Name is required.";
							return json_encode($senddata);
						}
						else
								{
									$t=time();
									$created= date("Y-m-d",$t);
									$tag_data  = array(
										'name'  =>   $tag['name'],
										'slug'  => $tag['slug'],
										'description'  => $tag['description'],
										'created' => $created,
										'status' => '1'
									);
									if(!empty($tag_data)){
										$this->db->insert('tags', $tag_data);
										//$sql = $this->db->set($tag_data)->get_compiled_insert('tags');
										$senddata['status'] = 1;
										$senddata['redurl'] = site_url("administrator/Posts/view2/new");
										$senddata['message'] = "Tags added successfully";
										return json_encode($senddata);
									}
									else{
										$senddata['status'] = 2;
										$senddata['message'] = "Tags Not Added ";
										return json_encode($senddata);
									}
								}
					return json_encode($senddata);
				}
				
				
		}
		
		?>