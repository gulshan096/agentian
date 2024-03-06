<?php
        Class PagesModel extends CI_Model
		{
			function __construct()
			{
				parent::__construct();
			}
			
			public function GetPages($id=0,$status=0)
			{
					if(!empty($id))
					{
						$temp	=	$this->db->query("SELECT * FROM `pages` ")->result_array();
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
						$this->db->from("pages");
					return $this->db->get()->result_array(); 
			}

		    public function saverecords()
			{ 
					$senddata = array();
					$senddata['status'] = 0;
					$senddata['message'] = "Something went wrong, Please try again later.";
					$post = $this->input->post('posts');
						if(empty($post['title']))
							{
								$senddata['message'] = "Title is required.";
								return json_encode($senddata);
							}
						else
							{
								$image	=	uploadimgfile("image","assets/posts","pos_");
								if(empty($image['status']))
									{
										$senddata['message'] = $image['message'];
										return json_encode($senddata);
									}
								if($image['status']==1)
									{
										    // echo "heer"; exit(0);
											$post_img['image'] = $image['data']['name'];
									}
									$postedby=$this->session->userdata('name');
									$t=time();
									$created= date("Y-m-d",$t);
									$pages_data  = array(
										'name'  =>   $post['title'],
										'image'  => $post_img['image'],
										'postedby' => $postedby,
										'posts' => $post['post'],
										'count' => '0',
										'description'  => $post['description'],
										'created' => $created,
										'status' => '1'
									);
									if(!empty($pages_data)){
										$this->db->insert('pages', $pages_data);
										//$sql = $this->db->set($pages_data)->get_compiled_insert('pages');
										$senddata['status'] = 1;
										$senddata['redurl'] = site_url("administrator/Pages/view/new");
										$senddata['message'] = "Pages added successfully"; 
										return json_encode($senddata);
									}else{
										$senddata['status'] = 2;
										$senddata['message'] = "Pages Not Added";
										return json_encode($senddata);
									}
							}
						return json_encode($senddata);
				}
				
				// FAQ PAGE
				public function manageFaq()
				{
					$senddata = array();
					$senddata['status'] = 0;
					$senddata['message'] = "Something went wrong, Please try again later.";
					  
					$post_val =  $this->input->post();
					 
					if(!empty($post_val['id']))
					 {
						$post_val['updated'] = date("Y-m-d H:m:i");
						$this->db->where('id',$post_val['id'])->update('faq',$post_val); 
					  
						$senddata['status']   =  1;
						$senddata['redurl']   =  site_url("administrator/pages/faq");
						$senddata['message']  =  "faq updated successfully";
						$senddata['data']     =  $post_val;			  
					}
					else
					{
						$this->db->insert('faq',$post_val);
						$senddata['status']   =  1;
						$senddata['redurl']   =  site_url("administrator/pages/faq");
						$senddata['message']  =  "faq added successfully";
						$senddata['data']     =  $post_val;				
					}
					return json_encode($senddata);
				}
				
				public function getAllFaq()
				{
					$query = $this->db->get('faq')->result_array();
				    return $query;
				}
				
				public function getOneFaq($id)
				{
					$this->db->where('id',$id);
					$query = $this->db->get('faq')->row_array();
					return $query;
				}
				
				public function getAllFaqForMobile()
				{ 
				    $sendarray = array();
					$query = $this->db->get('faq')->result_array();
					
					if(!empty($query))
					{
					    $sendarray['status']   =  1;
						$sendarray['message']  =  "faq get successfully";
						$sendarray['data']     =  $query;	
					}
					else
					{
						$sendarray['status']   =  0;
						$sendarray['message']  =  "no faq found.";
						$sendarray['data']     =  array();
					}
				    return json_encode($sendarray, true);
				}
				
				
				// ABOUT PAGE
				public function managePages()
				{
					$senddata = array();
					$senddata['status'] = 0;
					$senddata['message'] = "Something went wrong, Please try again later.";
					  
					$post_val =  $this->input->post();
					$pagename =  $this->input->post('name');
				
					
					if(!empty($post_val['page_id']))
					 {
						$post_val['updated'] = date("Y-m-d H:m:i");
						$this->db->where('page_id',$post_val['page_id'])->update('pages',$post_val); 
					  
						$senddata['status']   =  1;
						if($pagename == 'about')
						{
							$senddata['redurl']   =  site_url("administrator/pages/about-us");
						}
						elseif($pagename == 'help')
						{
							$senddata['redurl']   =  site_url("administrator/pages/help");
						}
						$senddata['message']  =  $pagename."page updated successfully"; 
						$senddata['data']     =  $post_val;			  
					}
					else
					{
						$pagecount = $this->db->where('name',$pagename)->get('pages')->num_rows();
						
						if($pagecount == 1 || $pagecount > 0)
						{
							
						    $senddata['status']   =  0;
							if($pagename == 'about')
							{
								$senddata['redurl']   =  site_url("administrator/pages/about-us");
							}
							elseif($pagename == 'help')
							{
								$senddata['redurl']   =  site_url("administrator/pages/help");
							}
							elseif($pagename == 'privacy_policy')
							{
								$senddata['redurl']   =  site_url("administrator/pages/privacy-policy");
							}
							elseif($pagename == 'term_condition')
							{
								$senddata['redurl']   =  site_url("administrator/pages/terms-condition");
							}
						    
						    $senddata['message']  =  $pagename."page already added! you can edit page."; 
						    $senddata['data']     =  $post_val;	
						}
						else
						{
							$this->db->insert('pages',$post_val);
						    $senddata['status']   =  1;
						    if($pagename == 'about')
							{
								$senddata['redurl']   =  site_url("administrator/pages/about-us");
							}
							elseif($pagename == 'help')
							{
								$senddata['redurl']   =  site_url("administrator/pages/help");
							}
							elseif($pagename == 'privacy_policy')
							{
								$senddata['redurl']   =  site_url("administrator/pages/privacy-policy");
							}
							elseif($pagename == 'term_condition')
							{
								$senddata['redurl']   =  site_url("administrator/pages/terms-condition");
							}
						    $senddata['message']  =  $pagename."page added successfully";
						    $senddata['data']     =  $post_val;	
						}
									
					}
					return json_encode($senddata);
				}
				
				public function getPageContent($p, $v)
				{
				   	$query = $this->db->where($v,$p)->where('status',1)->get('pages')->result_array();
				    return $query;
				}
				public function getOnePageContent($id)
				{
				   	$query = $this->db->where('page_id',$id)->where('status',1)->get('pages')->row_array();
				    return $query;
				}
				
				public function manageBanner()
				{
					$senddata = array();
					$senddata['status'] = 0;
					$senddata['message'] = "Something went wrong, Please try again later.";
					$post_val =  $this->input->post();
					
					if(empty($post_val['id']) && $post_val['device'] == 2)
					{
						$dbcheck = $this->db->where('device',$post_val['device'])->get('banner')->result_array();
						if(count($dbcheck) > 0)
						{
							$senddata['status'] = 0;
							$senddata['message'] = "Desktop Banner image already exist.";
							return json_encode($senddata);
						}
					}
					
					if(!empty($_FILES['banner_img']['name']))
					{
						    $file = $_FILES['banner_img']['tmp_name'];
						    list($width, $height) = getimagesize($file);
						
							if($post_val['device'] === '1')
							{
								if($width < "450" || $width > "450" || $height > "250" || $height < "250")
								{
									$senddata['message'] = "mobile banner image size must be 450 x 250 pixels.";
									$senddata['status'] = 0;
									return json_encode($senddata);
								}	
							}
							elseif($post_val['device'] === '2')
							{
								if($width < "1900" || $width > "1900" || $height > "500" || $height < "500")
								{
									$senddata['message'] = "desktop banner image size must be 1900 x 500 pixels.";
									$senddata['status'] = 0;
									return json_encode($senddata);
								}
							}
				
							$folderName = date('m-Y');
							$pathToUpload = 'assets/banner/' . $folderName;
												
							if( ! file_exists($pathToUpload) )
							{
								$create = mkdir($pathToUpload, 0777);
								$createThumbsFolder = mkdir($pathToUpload . '/thumbs', 0777);
								if ( ! $create || ! $createThumbsFolder)
								return;
							}					
					
							$config['upload_path'] = $pathToUpload;
							$config['overwrite'] = TRUE;
							$config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
							$this->load->library('upload', $config);
							$this->upload->initialize($config);
							
							if($this->upload->do_upload('banner_img'))
							{
								$imageData = $this->upload->data();
								$post_val['banner_img']  =   $pathToUpload.'/'.$imageData['file_name'];
							}	
					}
					
					if(!empty($post_val['id']))
					 {
						$post_val['updated'] = date("Y-m-d H:m:i");
						$post_val['status']  =  1;
						$this->db->where('id',$post_val['id'])->update('banner',$post_val); 
					  
						$senddata['status']   =  1;
						$senddata['redurl']   =  site_url("administrator/pages/banner");
						$senddata['message']  =  "banner updated successfully";
						$senddata['data']     =  $post_val;			  
					}
					else
					{
						$post_val['status']  =  1;
						$this->db->insert('banner',$post_val);
						$senddata['status']   =  1;
						$senddata['redurl']   =  site_url("administrator/pages/banner");
						$senddata['message']  =  "banner added successfully";
						$senddata['data']     =  $post_val;				
					}
					return json_encode($senddata);
				}
				
				public function getAllBanner()
				{
					$query = $this->db->get('banner')->result_array();
				    return $query;
				}
				
				public function getOneBanner($id)
				{
					$this->db->where('id',$id);
					$query = $this->db->get('banner')->row_array();
					return $query;
				}
				
				public function getAllBannerForMobile()
				{ 
				    $sendarray = array();
					$query = $this->db->where('status',1)->get('banner')->result_array();
					
					if(!empty($query))
					{
					    $sendarray['status']   =  1;
						$sendarray['message']  =  "banner get successfully";
						$sendarray['data']     =  $query;	
					}
					else
					{
						$sendarray['status']   =  0;
						$sendarray['message']  =  "no banner found.";
						$sendarray['data']     =  array();
					}
				    return json_encode($sendarray, true);
				}
				
				public function getPageByName()
				{
					$sendarray = array();
					
					$pagename = $this->input->post('page_name');
					$query = $this->db->select('page_id,name,content,mobile,email,status,created,updated')->where('name',$pagename)->where('status',1)->get('pages')->result_array();
					
					if(!empty($query))
					{
					    $sendarray['status']   =  1;
						$sendarray['message']  =  "page get successfully";
						$sendarray['data']     =  $query;	
					}
					else
					{
						$sendarray['status']   =  0;
						$sendarray['message']  =  "no page found.";
						$sendarray['data']     =  array();
					}
				    return json_encode($sendarray, true);
				}
					
		}
		
		?>