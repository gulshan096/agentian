<?php
        if(!function_exists('iscommonhelper'))
		{

			function iscommonhelper()
			{
				return true;
			}
			
			function generate_referal_code($length = 8)
			{
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code = '';

				for ($i = 0; $i < $length; $i++)
				{
					$code .= $characters[rand(0, strlen($characters) - 1)];
				}
				$code .= time();

				return $code;
			   	
			}
			
            function split_my_data($data)
			{
				 $final = array();
				
                 $parts = explode("-", $data);
				 $final['min'] = $parts[0];
                 $final['max'] = $parts[1];
				 
				 return $final;
				 
			} 			
				
			// forunction for the trader types
			function Get_Trader_Types()
			{
				$array	=	array();
				$array[]	=	"Dealer";
				$array[]	=	"Sub-Dealer";
				$array[]	=	"Distributer";
				$array[]	=	"Retailer";
				return $array;
			}
			
			function show_client_ip($ip=0)
			{
				if(empty($ip))
				{
					$ip	=	get_client_ip();
				}
				return	"<a href='https://www.infobyip.com/ip-$ip.html' target='_BLANK'>$ip</a>";
			}
			
			function get_client_ip()
			{
					$ipaddress = '';
					if (getenv('HTTP_CLIENT_IP'))
						$ipaddress = getenv('HTTP_CLIENT_IP');
					else if(getenv('HTTP_X_FORWARDED_FOR'))
						$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
					else if(getenv('HTTP_X_FORWARDED'))
						$ipaddress = getenv('HTTP_X_FORWARDED');
					else if(getenv('HTTP_FORWARDED_FOR'))
						$ipaddress = getenv('HTTP_FORWARDED_FOR');
					else if(getenv('HTTP_FORWARDED'))
					   $ipaddress = getenv('HTTP_FORWARDED');
					else if(getenv('REMOTE_ADDR'))
						$ipaddress = getenv('REMOTE_ADDR');
					else
						$ipaddress = 'UNKNOWN';
					return $ipaddress;
			}
				
		// Function to get the client IP address
				
			function geturlword($string)
			{
					$string =  trim($string);
					if(!empty($string))
					{
						$string =  strtolower($string);
						$string = str_replace(" ","-",$string);
						$string = urlencode($string);
						$string = str_replace("--","-",$string);
						$string = str_replace("--","-",$string);
						$string = str_replace("--","-",$string);
						$string = str_replace("--","-",$string);
					}
					return $string;	
			}
				
				
			function checkallfileinfolder($folder=0)
			{
					$array	=	array();
					if(!empty($folder))
					{
						$folder	=	FCPATH."$folder";
						if ($handle = opendir($folder))
						{
							while(false !== ($entry = readdir($handle)))
							{
								if ($entry != "." && $entry != ".." && $entry != "index.php")
								{
									$array[]	=	"$entry";
								}
							}
							closedir($handle);
						}
					}
					return $array;	
			}
				
			function uploadimgfile($index,$folder="other",$prefix="other")
			{
					$target_dir  = FCPATH;  // try to put full physical path
					
						// identity accstatement address advtimg other
							$uploadOk	=	1;
								$senddata = array();
									$senddata['status']  	=	0;
									$senddata['data'] 		=	"NILL";
									$senddata['message'] 	=	"";
									
										if(!isset($_FILES[$index]))
											{
												$senddata['status']  	=	3;
												$senddata['data'] 		=	"No FIles selected.";
												return $senddata;
											}
											
											
									if (empty($_FILES[$index]['name']))
										{
												$senddata['status']  	=	3;
												return $senddata;
										}
									
						    $notallowed	=	array("php","js","css","html","exe","zip","txt","ppt");  
						       $allowed =   array("pdf", "pptx", "png", "jpg", "jpeg");
						$shownotallowed =	"PHP, JS, CSS, HTML fie is not allowed to upload.";
						$showallowed    =   "pdf pptx png jpg jpeg file is allowed to upload. ";
						$extension 		=	explode(".",basename($_FILES[$index]["name"]));
							$extension 	=	end($extension);
							$extension 	=	trim($extension);
							$extension 	=	strtolower($extension);
							$realfilnename 	=	basename($_FILES[$index]["name"]);
							$datetofolder 	=	date("Y/M/d");
							
							$datetofolder = strtolower($datetofolder);
				
								$checkdirectory = $target_dir."$folder/$datetofolder";
								
									if (!file_exists($checkdirectory))
										{
											mkdir($checkdirectory, 0777, true);
										}
				$filnename   = "$folder/$datetofolder/$prefix".md5(time().rand()).".$extension";
				
				$target_file = $target_dir . $filnename;
				
					if (in_array($extension, $notallowed))
						{
							$uploadOk = 0;
								$senddata['status']  = 0;
								$senddata['message'] = $shownotallowed;
							return $senddata;
						}
						
						if (in_array($extension, $allowed))
						{
								
					// Check file size
					
					if ($_FILES[$index]["size"] > (10485760/2))
						{
							$uploadOk = 0;
								$senddata['status']  = 0;
								$senddata['message'] = "Maximum File Upload size is 5MB.";
							return $senddata;
						}
			 
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0)
						{
								$senddata['status']  = 0;
								$senddata['message'] = "<b>Sorry!</b> There was an error uploading your file.2";
							return $senddata;
					// echo "Sorry, your file was not uploaded.";
			   // if everything is ok, try to upload file
						} else {
							if (move_uploaded_file($_FILES[$index]["tmp_name"], $target_file))
								{
				// echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
									$senddata['status']  = 1;
										$tempdata = array();
											$tempdata['name']   = $filnename;
											$tempdata['realname']  = $realfilnename;
										$senddata['data']  = $tempdata;
										$senddata['message'] = "File Uploaded successfully.";
									return $senddata;
								} else {
				// echo "Sorry, there was an error uploading your file.";
										$senddata['status']  = 0;
										$senddata['message'] = "<b>Sorry!</b> There was an error uploading your file.";
									return $senddata;
								}
						}
						}
						return $senddata;	
			}
				
			function is_selected($tmp1,$tmp2)
				{
					if($tmp1==$tmp2)
						{
							return "selected='selected'";
						} else {
							return "";
						}
				}
				
			function is_checked($tmp1,$tmp2)
				{
					if($tmp1==$tmp2)
						{
							return "checked='checked'";
						} else {
							return "";
						}
				}
				
				
			function gettime4db()
				{
					return date("Y-m-d H:i:s");	
				}

			function showtime4db($datetime)
				{
					if(empty($datetime)) return "N/A";
					return date("d M, Y  h:iA",strtotime($datetime));	
				}
				
				
			   				

			function checkmobile($mobile)
				{
					if(strlen($mobile)!=10)
						{
							return false;
						} else {
							return true;
						}
				}

			function checkemail($email)
				{
					if (!filter_var($email, FILTER_VALIDATE_EMAIL))
						{
							return false;
						} else {
							return true;
						}
				}
					function is_post_value($index,$default)
				{
					if(isset($_POST[$index]))
						{
							return $_POST[$index];
						} else {
							return $default;
						}
				}
				
		function sendhtmlemail($e_email,$e_subject,$e_message,$type=0)
			{
				if(empty($type))
					{ 
						$emailtheme = file_get_contents(FCPATH."assets/emailtheme/email.html");
					} else {
						$emailtheme = file_get_contents(FCPATH."assets/emailtheme/$type.html");
					}

					$e_message = str_replace("###CONTENT###",$e_message,$emailtheme);

						$headers = "From: " .EMAIL_FROM_NAME."<". strip_tags(EMAIL_FROM_EMAIL) .">". "\r\n";
						$headers .= "Reply-To: " .EMAIL_FROM_NAME."<". strip_tags(EMAIL_FROM_REPLY) .">". "\r\n";
						// $headers .= "CC: susan@example.com\r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

						return mail($e_email, $e_subject, $e_message, $headers);


				return true;

				require_once FCPATH.'assets/emailapi/class.phpmailer.php';
				require FCPATH.'assets/emailapi/send.php';
				return $e_response;
			}
			
		function sendsms($mobile,$sms,$type=0)
			{
				
				if(empty($type))
					{
						$smstheme = file_get_contents(FCPATH."assets/smstheme/common.txt");
					} else {
						$smstheme = file_get_contents(FCPATH."assets/smstheme/$type.txt");
					}
						$sms = str_replace("###CONTENT###",$sms,$smstheme);
  
				return 1;
			}
				
				
		}

?>