    <?php
        Class UsersModel extends CI_Model
		{
			function __construct()
		    {
				parent::__construct();
				$this->load->helper('file');
				$this->load->helper('common_helper');
			}
			
			public function verification()
			{
				  $sendarray = array();
				  
			      $mobile     = $this->input->post('to');
				  $authkey    = "389779AiUOneGnq3U63dba18bP1";
				  $sender     = "AGNTEN";
				  $DLT_TE_ID  = "1207167663013863576";
				  $message    = "##OTP## is your OTP for Login/Register from Agentian. OTP is valid for 60 Sec. Do not share this OTP with anyone.";
				  
				  
				  $is_deleted_user = $this->db->where('status',0)->where('mobile','91'.$mobile)->get('administrator')->result_array();
					  
					  if(count($is_deleted_user) > 0)
					  {
						  $sendarray['status']     =    0 ;
						  $sendarray['message']    =   'Your account has been deleted. please contact to admin.';
					      return  json_encode($sendarray);
					  }
				  
				  
				  $postData = array(
				    'authkey' => $authkey,
				    'sender' => $sender,
				    'DLT_TE_ID' => $DLT_TE_ID,
				    'mobiles' => "91".$mobile,
				    'message' => $message,
				  );
				  
				  $curl = curl_init();
				  
				  curl_setopt_array($curl, array(
				  CURLOPT_URL => 'http://api.msg91.com/api/sendotp.php',
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'POST',
				  CURLOPT_POSTFIELDS => $postData,
				  CURLOPT_HTTPHEADER => array(
					'Cookie: PHPSESSID=c7tfb12pfue30gvoeat03srm26'
				  ),
				));

				$response = curl_exec($curl);
				curl_close($curl);
				$decres = json_decode($response, true);
				if($decres['type'] == 'success')
				{
					$sendarray['status']       =    1 ;
					$sendarray['message']      =   'successfully send verification code';
				}
				if($decres['type'] == 'error')
				{
					$sendarray['status']       =    0 ;
					$sendarray['message']      =   'Your Otp "'.$decres['message'].'" ';
				}
                return  json_encode($sendarray, true);
			}
			
			public function verificationCheck()
			{
			      $sendarray   = array();
			      $user_wallet  = array();
				  $wallet       = $this->db->where('status',1)->get('wallet_system')->row_array();
			      $to           = $this->input->post('to');
			      $otp          = $this->input->post('code');
			      $referal_code = $this->input->post('referal_code');
				  $is_valid_rc = $this->db->where('referal_code',$referal_code)->get('administrator')->result_array();
				 
				  $mgb = '91'.$to;
				  $is_usr = $this->db->where('mobile',$mgb)->get('administrator')->row_array();
				
				  if(!empty($referal_code))
				  {
					  if(empty($is_usr) && empty($is_valid_rc))
					  {
						 $sendarray['status']       =    0 ;
						 $sendarray['message']      =   'invalid referal code.'; 
						 return json_encode($sendarray);
					  }
					  elseif(!empty($is_usr))
					  {
						 $sendarray['status']       =    0 ;
						 $sendarray['message']      =   'Only new user are aligible for referal code.';
          				 return json_encode($sendarray);		 
					  } 
				  }
				  
				 
				  $authkey      = "389779AiUOneGnq3U63dba18bP1";
				  $postData = array(
				    'authkey' => $authkey,
				    'mobile' => "91".$to,
				    'otp'     => $otp,
				  );
				 
				  $curl = curl_init();
				  curl_setopt_array($curl, array(
				  CURLOPT_URL => 'http://api.msg91.com/api/verifyRequestOTP.php',
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'POST',
				  CURLOPT_POSTFIELDS => $postData,
				  CURLOPT_HTTPHEADER => array(
					'Cookie: PHPSESSID=c7tfb12pfue30gvoeat03srm26'
				  ),
				));

				$response = curl_exec($curl);
				curl_close($curl);
				$decres = json_decode($response, true);
				if($decres['type'] == 'success')
				{
				   
					   $user =  $this->db->select('aid,mobile,name,email,referal_code,status')
					            ->where('mobile',$postData['mobile'])
							    ->get('administrator')
								->result_array();
                       if(count($user) >= 1)
					   {
                         $sendarray['status']     =    1 ;
						 $sendarray['to']         =   $user[0]['mobile'];
						 $sendarray['user_type']  =   'old user';
						 $sendarray['message']    =   'successfully verified otp';
						 $sendarray['userinfo']   =   $user;						 
					   }
					   else
					   {
							 
							  
							 // new_user 						  
							 $newuser['mobile'] =  $postData['mobile'];
							 $newuser['referal_code'] =  generate_referal_code();
							 $this->db->insert('administrator',$newuser); 
							 $uid = $this->db->insert_id();
							 
							 
							 
							 // add free bonus
							 $credited = array(
								
								'user_id'   =>  $uid,						
								'credit'    =>  !empty($wallet['wallet_bonus'])?$wallet['wallet_bonus']:'0',						
								'available' =>  !empty($wallet['wallet_bonus'])?$wallet['wallet_bonus']:'0',						
								'status'    =>  1,					
							  );
							 $this->db->insert('transaction',$credited); 
							 
							 // add referal bonus
							 if(!empty($referal_code))
							 {
									$referal_amount = $this->db->where('status',1)->get('referal_code')->row()->referal_amount; 
									$rc_uid = $this->db->where('referal_code',$referal_code)->get('administrator')->row()->aid; 
									$credit =  $this->db->select_sum("credit")
											   ->from("transaction")
											   ->where("user_id",$rc_uid)
											   ->where("status",1)
											   ->get()->row_array();
						
									$debit =  $this->db->select_sum("debit")
											  ->from("transaction")
											  ->where("user_id",$rc_uid)
											  ->where("status",1)
											  ->get()->row_array();
						 
									$wallet =  $credit['credit'] - $debit['debit'];
									
									$referal_cr = array(
								
									  'user_id'  =>  $rc_uid,						
									  'credit'   =>  $referal_amount,
									  'available'=>	 $wallet + $referal_amount,							  
									  'category' =>  2,					
									 );
				
									 $this->db->insert('transaction',$referal_cr);  
							 }
							 
							 $user = $this->db->select('aid,mobile,name,email,status')->where('aid',$uid)->get('administrator')->result_array();
							 
							 $sendarray['status']     =    1 ;
							 $sendarray['to']         =   $postData['mobile'];
							 $sendarray['user_type']  =   'new user';
							 $sendarray['message']    =   'successfully verified otp';
							 $sendarray['userinfo']   =   $user; 
					   }
				
				}
				elseif($decres['type'] == 'error')
				{
					echo "err";
					$sendarray['status']       =    0 ;
					$sendarray['message']      =   'Your Otp is "'.$decres['message'].'" ';
				}
                return  json_encode($sendarray, true);	
			}
			
			
            public function editProfile()
			{
				$sendarray = array();
				
				$userdata = $this->input->post();
				$aid = $userdata['aid'];
			
				$folderName = date('m-Y');
				$pathToUpload = 'assets/userprofile/images/' . $folderName;
									
				if ( ! file_exists($pathToUpload) )
				{
					$create = mkdir($pathToUpload, 0777);
					$createThumbsFolder = mkdir($pathToUpload . '/thumbs', 0777);
					if ( ! $create || ! $createThumbsFolder)
					return;
				}
													
				   
				    $config['upload_path'] = $pathToUpload;
				    $config['overwrite'] = TRUE;
				    $config['allowed_types'] = 'jpg|jpeg|png|gif';

			
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					
					if($this->upload->do_upload('image'))
					{
			
						$imageData = $this->upload->data();
					    $userdata['image'] =   $pathToUpload.'/'.$imageData['file_name'];
					}	
				
				$this->db->select('aid,name,email,mobile,image,state,city,address,status,added');
				$this->db->where('aid',$aid);
				$this->db->update('administrator',$userdata);
			
				
				$updateduser = $this->db->where('aid',$aid)->get('administrator')->row_array();
				
				if(!empty($updateduser))
				{
					$sendarray['status'] = 1;
					$sendarray['message'] = 'successfully updated user profile';
					$sendarray['data']    =  $updateduser;
				}
				else
				{
					$sendarray['status'] = 0;
					$sendarray['message'] = 'error oops not updated';
					$sendarray['data']    =  array();
				}
				return json_encode($sendarray, true);
			}
			
             public function getOneUser()
			 {
				$sendarray = array();
				$final = array();
                $post_price = $this->db->where('status',1)->get('wallet_system')->row()->post_price;
                $aid =  $this->input->post('aid');
				$userdata =  $this->db->select('aid,referal_code,name,email,mobile,image,state,city,address,status,added')->where('aid',$aid)->get('administrator')->row_array();
               
			   
					 $credit =  $this->db->select_sum("credit")
							    ->from("transaction")
							    ->where("user_id",$userdata['aid'])
							    ->where("status",1)
							    ->get()->row_array();
					
					 $debit =  $this->db->select_sum("debit")
						       ->from("transaction")
							   ->where("user_id",$userdata['aid'])
							   ->where("status",1)
							   ->get()->row_array();
					 
		             $wallet     =  $credit['credit'] - $debit['debit'];
                     $rem_post   = 	$wallet/$post_price;
				     $total_post = $this->db->where('user_id',$userdata['aid'])->get('property')->result_array();
					 
					 $userdata['available_balace']	= $wallet;		
					 $userdata['used_balace']	    = $debit['debit'];		
					 $userdata['available_post']	    = floor($rem_post);	
					 $userdata['total_post']	        = count($total_post);

                   
			   
					  
				if(!empty($userdata))
				{
					$sendarray['status'] = 1;
					$sendarray['message'] = 'successfully get user profile';
					$sendarray['data'] = $userdata;
				}
				else
				{
					$sendarray['status'] = 0;
					$sendarray['message'] = "oops we could't find and user";
					$sendarray['data'] =  array();
				}
               	return json_encode($sendarray, true);			
			 }

		}
		
	?>