<?php
	Class CommonModel extends CI_Model
		{
	
			function __construct()
				{
				   parent::__construct();
					//$this->load->helper('cookie');
				}
		
			
			public function Get_All_Activity($view="admin")
				{
					
						switch($view)
							{
								case "traders":	$view	=	"view_traders_activity";	break;
								case "admin": default:	$view	=	"view_admin_activity";	break;
							}
							
					$this->db->select("*");
					
						$show = $this->input->get("show");
						
							if(!empty($show) && $show=='activity')
								{
									
									// echo "<pre>"; print_r($this->session->userdata()); echo "</pre>"; exit(0);
									
									$this->db->where("userid",$this->session->userdata('aid'));
								}
						
					
						$this->db->from($view);
					return $this->db->get()->result_array();
				}
				
				
		
				
			public function get5notifaction()
				{
					$sql	=	"SELECT * FROM `activitylog` order by autoid DESC LIMIT 5"; 
						$data = $this->db->query($sql);
							$data = $data->result_array();
					if(!empty($data))		
						{
							foreach($data as $sin)	
							{
					?>
						<div class="p-2 list-group-item-1 list-group-item-action">
                            <span class="d-flex align-items-center mb-1">
                                <small class="text-black-50">
									<?php echo timeago($sin['ontime']); ?>
								</small>
                            </span>
                            <span class="d-flex">
                                <span class="flex d-flex flex-column">
                                    <span class="text-black-70">
										<?php echo ($sin['message']); ?>
									</span>
                                </span>
                            </span>
                        </div>
					<?php	
							}
						} 							
				}
				
			public function Get_activity($id=0,$status=0)
				{
					if(!empty($id))
						{
						$temp	=	$this->db->query("SELECT * FROM `activity_log` where id = '$id'")->result_array();
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
						$this->db->from("activity_log");
					return $this->db->get()->result_array();
				}
				
			public function add_activity($message,$userid=0,$usertype=0)
				{
					if(empty($userid))
						{
							$userid		=	$this->session->userdata('userid');	
							$utype 		=	$this->session->userdata('usertype');	
							$username 	=	$this->session->userdata('username');	
						}
						
							if(empty($username)) 	{	$username	=	"unknowkn"; 	}
							if(empty($utype))		{	$utype 		=	"unknowkn"; 	}
							if(empty($userid))  	{	$userid 	=	0;				}

						$array	=	array();
							$array['usertype'] 		=	$utype;
							$array['userid'] 		=	$userid;
							$array['description']	=	$message;
							$array['status'] 		=	1;
							$array['added'] 		=	gettime4db();
							$array['ip'] 			=	get_client_ip();
					$this->db->insert("activity_log",$array);			
				}
				
			
		}
?>