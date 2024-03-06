<?php
  
	Class App_AuthenticationModel extends CI_Model
		{
			
			function __construct()
				{
					parent::__construct();
				}
				
			public function logout()
				{
					$senddata	=	array();
					//	$this->AuthenticationModel->add_activity("Logget out Successfully.",$logincheck['token'],$logincheck['usertype'],"App");
						$senddata['status']		=	1;
						$senddata['message']	=	"Something went wrong, Please try again later.";
					return json_encode($senddata);	
				}
				
			public function checklogin($action="")
				{
					$senddata	=	array();
						$senddata['status']		=	0;
						$senddata['message']	=	"Something went wrong, Please try again later.";
						
						// for mobile  https://stackoverflow.com/questions/26475885/authorization-header-missing-in-php-post-request
							if(isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION']))
								{
									$logintoken	=	$_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
													// $token	=	isset($logintoken[1])?$logintoken[1]:'0';
								}
								
							if(isset($_SERVER['HTTP_AUTHORIZATION']))
								{
									$logintoken	=	$_SERVER['HTTP_AUTHORIZATION'];
								}	
								
							$usertype	=	$this->input->post("usertype");	
								
						// for mobile
				
						// for website
						
							if(empty($usertype))
								{
									$usertype		=	$this->session->userdata('usertype');
								}

							if(empty($logintoken))
								{
									$logintoken		=	$this->session->userdata('logintoken');
								}
								
						// for website
						
						// for actual
							$logintoken	=	trim(str_replace("Basic ","",$logintoken));
								$logintoken	=	trim($logintoken);
								$logintoken	=	base64_decode($logintoken);
									$logintoken	=	explode(":",$logintoken);
									$userid	=	isset($logintoken[0])?$logintoken[0]:'0';
									$token	=	isset($logintoken[1])?$logintoken[1]:'0';

							$check_sql	=	"
												SELECT
													userid,usertype
												FROM
													`app_login`
												WHERE
														md5(userid) =	'$userid' 
													AND 
														`token` 	= 	'$token'
													AND
														`usertype` 	= 	'$usertype'
													AND
														`status` 	=	'1'
											"; 
								$check	=	$this->db->query($check_sql)->result_array();
								
									if(!empty($check))
										{
											// update the time for the session here
											
												define(	"S_USERID"		,	$check[0]['userid']	); 
												define(	"S_USERTYPE"	,	$usertype	);
									
									
									if($action=="logout")									
										{
											$logout_update = " , status = '0' ";
										} else {
											$logout_update = "";
										}
												
											
												$sql	=	"
																	UPDATE
																		`app_login`
																	SET
																		end_at			=	'".gettime4db()."'
																		$logout_update
																	WHERE
																			md5(userid) =	'$userid' 
																		AND 
																			token 		=	'$token'
																		AND
																			usertype 	=	'$usertype'
																"; 
																	$this->db->query($sql);
											
											// update the time for the session here
											$senddata['status']		=	1;
											$senddata['message']	=	"You are logged in.";
										} else {
											$senddata['message']	=	"You are not logged in, Please login again to continue.";
												exit(json_encode($senddata));
										}
								
								
						// for actual
				
				}
				
				
			public function dologin()
				{
					
					$senddata	=	array();
						$senddata['status']		=	0;
						$senddata['message']	=	"Something went wrong, Please try again later.";
					
					$username	=	$this->input->post('username');	
					$password	=	$this->input->post('password');	
					
						
						if(!empty($username) && !empty($password))
							{
								$password = md5($password);				
								
// traders data from here									
									
	$trader_sql		=	"
							SELECT 
								*
							FROM
								`traders`
							WHERE
									`password` = '$password' 
								AND
									(
											email = '$username' 
										OR 
											mobile = '$username' 
									)
						";
					
									
	$logincheck	=	$this->db->query($trader_sql)->result_array();
								
									if(!empty($logincheck))
										{
											$logincheck = $logincheck[0];
											
											
											
											
												if(!empty($logincheck['status']))
													{
														
														$lastlogin = gettime4db();
														
														
												$db_token = md5(time().rand(1111,9999));
														
											$app_token	=	md5($logincheck['tid']).":".$db_token;
												$app_token	=	base64_encode($app_token);
											
												$app_login = array();	
													$app_login['token']		=	$db_token;	
													$app_login['userid']	=	$logincheck['tid'];	
													$app_login['usertype']	=	"trader";
													$app_login['start_at']	=	$lastlogin;
													$app_login['end_at']	=	$lastlogin;
														
							if(isset($_POST['device']))
								{
									$app_login['device']		=	$_POST["device"]; 
								}
														$this->db->insert("app_login",$app_login);
														
						
						
								 $this->AuthenticationModel->add_activity("Logged in Successfully.",$logincheck['tid'],'trader','mobile');
														
														$senddata['token']		=	$app_token;	
														$senddata['usertype']	=	$app_login['usertype'];	
														$senddata['username']	=	$logincheck['name'];	
														$senddata['status']		=	1;
														$senddata['message']	=	"Success! You are logged in successfully.";
															return json_encode($senddata);
													} else {
														$senddata['message']	=	"Error! You are not allowed to login.";
															return json_encode($senddata);
													}
										} 
				
// traders data from here	


	
// employyee data from here	
	$administrator_sql	=	"
								SELECT 
									*
								FROM
									`administrator`
								WHERE
										`password` = '$password' 
									AND
										(
												email = '$username' 
											OR 
												mobile = '$username' 
										)
							";			
	$logincheck_emp	=	$this->db->query($administrator_sql)->result_array();  // for employyee					
	

				if(!empty($logincheck_emp))
					{
						$logincheck = $logincheck_emp[0];
						
						
						
						
							if(!empty($logincheck['status']))
								{
									
									$lastlogin = gettime4db();
									
									
							$db_token = md5(time().rand(1111,9999));
									
						$app_token	=	md5($logincheck['aid']).":".$db_token;
							$app_token	=	base64_encode($app_token);
						
							$app_login = array();	
								$app_login['token']		=	$db_token;	
								$app_login['userid']	=	$logincheck['aid'];	
								$app_login['usertype']	=	"employee";
								$app_login['start_at']	=	$lastlogin;
								$app_login['end_at']	=	$lastlogin;
														
							if(isset($_POST['device']))
								{
									$app_login['device']		=	$_POST["device"]; 
								}
									$this->db->insert("app_login",$app_login);
									
	
	
			 $this->AuthenticationModel->add_activity("Logged in Successfully.",$logincheck['aid'],'admin','mobile');
									
									$senddata['token']		=	$app_token;	
									$senddata['usertype']	=	$app_login['usertype'];	
									$senddata['username']	=	$logincheck['name'];	
									$senddata['status']		=	1;
									$senddata['message']	=	"Success! You are logged in successfully.";
										return json_encode($senddata);
								} else {
									$senddata['message']	=	"Error! You are not allowed to login.";
										return json_encode($senddata);
								}
					}	
// employyee data from here	
										
										
										{	
											$senddata['message']	=	"Error! Incorrect Login details.";
												return json_encode($senddata);
										}
										
										
								
							} else {
									$senddata['message']	=	"Username (Mobile No or Email) and password are required.";
									return json_encode($senddata);
							}
				}			
				
		}

?>