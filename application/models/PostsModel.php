<?php
Class PostsModel extends CI_Model
		{
			function __construct()
				{
					parent::__construct();
				}

			public function GetPosts($id=0,$status=0)
				{
					if(!empty($id))
						{
						$temp	=	$this->db->query("SELECT * FROM `posts` where pid = '1'")->result_array();
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
						$this->db->from("posts");
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
										$senddata['message'] = $image['message']."Image Empty";
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
									$posts_data  = array(
										'title'  =>   $post['title'],
										'tags'   =>   $post['tags'],
										'categories'  =>  $post['categories'],
										'image'  => $post_img['image'],
										'postedby' => $postedby,
										'description'  => $post['description'],
										'created' => $created,
										'status' => '1'
									);
									if(!empty($posts_data)){
										$this->db->insert('posts', $posts_data);
										//$sql = $this->db->set($posts_data)->get_compiled_insert('posts');
										$senddata['status'] = 1;
										//$senddata['redurl'] = site_url("administrator/Posts/view/new");
										$senddata['message'] = "Posts added successfully"; 
										return json_encode($senddata);
									}
									else
									{
										$senddata['status'] = 2;
										$senddata['message'] = "Posts Not Added";
										return json_encode($senddata);
									}
							}
						return json_encode($senddata);
				}
				
				public function getAllPost()
				{
					$query = $this->db->select('blog.*,administrator.name')
					         ->join('administrator','administrator.aid = blog.user_id','left')
							 ->where('blog.status',1)
							 ->get('blog')
							 ->result_array();
							 
				    return $query;
				}
				
				public function getOnePost($id)
				{
					
				    return $this->db->where('id',$id)->get('blog')->row_array();	
				
				}
				
		    		
		}
?>