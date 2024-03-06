    <?php
        Class BlogModel extends CI_Model
		{
			function __construct()
		    {
				parent::__construct();
				$this->load->helper('common_helper');
			}
			
			public function addblog()
			{
				$sendarray = array();
				
		        $post_val = $this->input->post();
				
				        if(!empty($_FILES['blog_image']['name']))
						{
								$image = uploadimgfile("blog_image","assets/blog/images","pre");
								if($image['status']==0)
								{
									$senddata['message'] = $image['message']; 
									return json_encode($senddata);
								}

								if($image['status']==1)
								{
									$post_val['blog_image'] = $image['data']['name'];
								}						
						}
				    if(!empty($post_val['id']))
					{
						$post_val['status']  = 1;
						$post_valblog['updated']  = date('Y-m-d h:i:s');;
						$this->db->where('id',$post_val['id']);
					    $result = $this->db->update('blog',$post_val);
					
					    $sendarray['status'] = 1 ;
					    $sendarray['message'] = 'blog updated successfully';
					}
					else
					{
						$post_val['status']  = 1;
					    $result = $this->db->insert('blog',$post_val);
					
					    $sendarray['status'] = 1 ;
					    $sendarray['message'] = 'blog added successfully';
					}
				    return json_encode($sendarray, true);
		    } 

            public function getAllblog()
			{
				
			    $sendarray = array();
			    $finalarray = array();
				
				$this->db->where('status',1);
				$data = $this->db->get('blog')->result_array();
				
				if(!empty($data))
				{
                    foreach($data as $row)
					{
						$this->db->select('name');
					    $this->db->where('aid',$row['user_id']);
					    $username = $this->db->get('administrator')->row_array();
					    $row['posted_by']   =  $username['name'];
						
						$finalarry[] =  $row;
					}					
					
					$sendarray['status']  =  1;
                    $sendarray['message'] =  'blog get successfully';
					$sendarray['data']    =  $finalarry;
				}
				else
				{
                    $sendarray['status']  =  0;
                    $sendarray['message'] =  'no blogs found';
					$sendarray['data']    =  array();
				}
                return json_encode($sendarray);
			}
			
			public function getOneBlog()
			{
				$sendarray = array();
				
		        $blog_id = $this->input->post('blog_id');
				
				$this->db->where('id',$blog_id);
				$data = $this->db->get('blog')->row_array();
				
				if(!empty($data))
				{
                   
					$this->db->select('name');
					$this->db->where('aid',$data['user_id']);
					$username = $this->db->get('administrator')->row_array();
					$data['posted_by']   =  $username['name'];
					
					$sendarray['status']  =  1;
                    $sendarray['message'] =  'successfully get blog';
					$sendarray['data']    =  $data;
				}
				else
				{
                    $sendarray['status']  =  0;
                    $sendarray['message'] =  'no blogs found';
					$sendarray['data']    =  array();
				}
                return json_encode($sendarray);
			}
						
		}
		
	?>