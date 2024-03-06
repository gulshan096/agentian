<?php
Class CommentsModel extends CI_Model
		{
			function __construct()
			{
					parent::__construct();
			}
			
			public function GetComments()
			{
				$this->db->select('administrator.name,property.building_name,feedback.*');
                $this->db->join('administrator','administrator.aid = feedback.user_id','left');
                $this->db->join('property','property.property_id   = feedback.property_id','left');
                $this->db->order_by('feedback.created','desc');
                return $this->db->get('feedback')->result_array();				
			}

		    public function saverecords()
				{  
					$senddata = array();
					$senddata['status'] = 0;
					$senddata['message'] = "Something went wrong, Please try again later.";
					$comment = $this->input->post('posts');
                    if(empty($comment['comment']))
					    {
								$senddata['message'] = "Comment is required.";
								return json_encode($senddata);
						}
                    else{
                            $postedby=$this->session->userdata('name');
                            $t=time();
                            $created= date("Y-m-d",$t);
                            $comments_data  = array(
                                'pid'  =>   $comment['post'],
                                'page_id'  =>   $comment['pages'],
                                'postedby' => $postedby,
                                'comment' => $comment['comment'],
                                //'count' => '0',
                                'created' => $created,
                                'status' => '1'
                            );
                            if(!empty($comments_data)){
                                 $this->db->insert('comments', $comments_data);
                                //$sql = $this->db->set($comments_data)->get_compiled_insert('comments');
                                 $senddata['status'] = 1;
                                 $senddata['redurl'] = site_url("administrator/Comments/view/new");
                                 $senddata['message'] = "Comments added successfully";
                                 return json_encode($senddata);
                            }else{
                                $senddata['status'] = 2;
                                $senddata['message'] = "Comments Not Added";
                                return json_encode($senddata);
                            }
                        }

						return json_encode($senddata);
				}  
				
		}
		
		?>