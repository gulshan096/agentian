<?php
  
	    Class AuthenticationModel extends CI_Model
		{
			
			    function __construct()
				{
					parent::__construct();
				    $this->load->helper('common_helper');
				}
				
				
			    public function get_states()
				{
					return $this->db->query(" SELECT id,name FROM `loc_states` where country_id = 101 ORDER BY `loc_states`.`name` ASC ")->result_array();	
				}
				
			    public function add_activity($description,$userid,$usertype,$source="desktop")
				{
					$activity_log	=	array(); 
						$activity_log['description']	=	$description; 
						
							if(!isset($_COOKIE['IPINFO_USER_IP']))
								{
									$activity_log['ip']				=	get_client_ip(); 
									$activity_log['location']		=	"Location API Unavailable."; 
								} else {
									$activity_log['ip']				=	$_COOKIE['IPINFO_USER_IP']; 
									$activity_log['location']		=	$_COOKIE['IPINFO_USER_CITY']." ($_COOKIE[IPINFO_USER_REGION])"; 
								}
								
								
							if(isset($_POST['ip4mob']))
								{
									$activity_log['ip']			=	$_POST['ip4mob']; 
								}
								
							if(isset($_POST['ipcity']))
								{
									$activity_log['location']	=	$_POST["ipcity"]; 
								}
							if(isset($_POST['device']))
								{
									$activity_log['device']		=	$_POST["device"]; 
								}
						$USR_FULLVERSION = "";		
							if(isset($_COOKIE['USR_FULLVERSION']))
								{
									$USR_FULLVERSION	=	" ($_COOKIE[USR_FULLVERSION])"; 
								}
								
							if(isset($_COOKIE['USR_BROWSERNAME']))
								{
									$USR_BROWSERNAME	=	"$_COOKIE[USR_BROWSERNAME] $USR_FULLVERSION"; 
										$activity_log['device']		=	$USR_BROWSERNAME;
								}

							if(isset($_POST['ipcity']) && isset($_POST['ipregion']))
								{
									$activity_log['location']	=	" $_POST[ipcity] ($_POST[ipregion]) "; 
								}

						$activity_log['added']			=	gettime4db();
						$activity_log['source']			=	$source;
						$activity_log['userid']			=	$userid;
						$activity_log['usertype']		=	$usertype;	
						
					$this->db->insert("activity_log",$activity_log);
				}
				
			    public function checklogin()
				{
					$checklogin = $this->session->userdata();
					
					if(!empty($checklogin['aid']) && !empty($checklogin['mobile']) && !empty($checklogin['status']))
					{
						return true;	
					}
					redirect("administrator?login=no&token=".md5(time()));
					exit(0);
					return false;	
				}
				
				public function customer_checklogin()
				{
					$customer_checklogin = $this->session->userdata();
	
					if(!empty($customer_checklogin['aid']) && !empty($customer_checklogin['mobile']) && !empty($customer_checklogin['status'] == 1) && $customer_checklogin['role'] == 2 )
					{
						return true;	
					}
					redirect("login");
					exit(0);
					return false;	
				}
				
			    public function dologin()
				{
					
					$username	=	$this->input->post('username');	
					$password	=	$this->input->post('password');	
					
				    if(!empty($username) && !empty($password))
					{
						$password = md5($password);		 
						$logincheck	=	$this->db->query("SELECT * FROM `administrator`
										WHERE(`password`=	'$password' OR `otp` = '$password')
										AND(email = '$username' OR mobile = '$username' )
										AND(role = 1)")->result_array();
																			
							if(!empty($logincheck))
							{
							        $logincheck = $logincheck[0];
									$logincheck['token']	=	$logincheck['aid'];
									$logincheck['usertype']	=	"admin";
									if(!empty($logincheck['status']))
									{
												    $this->session->set_userdata($logincheck);
													$lastlogin = gettime4db();
						                            $this->db->query("UPDATE administrator SET lastlogin = '$lastlogin' ,  otp = '0' WHERE ( `password`	=	'$password' OR `otp` 	=	'$password' ) AND ( email = '$username' OR mobile = '$username' )  ");
					
								                    $this->add_activity("Logged in Successfully.",$logincheck['token'],$logincheck['usertype']);
														
												    echo "<div class='alert alert-success'>Success! You are logged in successfully.</div>";
													?>
															<script>
																setTimeout(function(){
																	window.location.href="<?php echo base_url('administrator/dashboard'); ?>";
																},786);
															</script>
													<?php
									} 
									else
									{
										echo "<div class='alert alert-danger'>Error! You are not allowed to login.</div>";
									}
							}
							else 
							{	         
								echo "<div class='alert alert-danger'>Error! Incorrect Login details.</div>";
							}	
					} 
					else 
					{
						echo "<div class='alert alert-danger'>Error! All Fields are required.</div>";
					}
				}			
				
		}

?>