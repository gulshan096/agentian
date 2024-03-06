    <?php
        Class Chat_model extends CI_Model
		{
			function __construct()
		    {
				parent::__construct();
			}
			public function send_message()
			{
			   $sendarray = array();
			   $chating =  $this->input->post();
			   
			   
			   
               $this->db->insert('chating',$chating);
			   $this->db->trans_complete();
			
               if($this->db->trans_status() === TRUE)
			   {
				 
				 $this->send_push_notification($chating['sender_id'], $chating['receiver_id']);
				 
				 $sendarray['status'] = 1;  
				 $sendarray['message'] = "message sent successfully";  
			   }
               else
			   {
				  $sendarray['status'] = 0;  
				  $sendarray['message'] = "message not sent";
			   }
               return json_encode($sendarray , true);			   
		    }
			
			function send_push_notification($sender_id, $receiver_id)
			{
				
				$userval = $this->db->select('name,token')->where('aid',$receiver_id)->get('administrator')->row_array();
				$serverkey   = 'AAAAUjcYQvE:APA91bGcZt1Qon-wsWEMA4djxDSnedn-lyDPUYUV6tF5W_4BwjAgffVkUPhrQQM1I1y0edUgx2P5DKWrQNAY8WY-pzlGMNh14JSjr0f9QnOlXv--3lUflJB2dgNdNit8XbLOg-3iFxUn';
				$username    = $userval['name'];
				$deviceid    = $userval['token'];
				$title       = 'Property Chat';
				$imgurl      = 'https://demo3.sjainventures.com/agentian/assets/agentian_logo.jpg';
				$description = "hey " .$username. " you get some message";
				
				$data = array(
    			'registration_ids' => array (
                          $deviceid
                   ),
                 'notification' => 
                 		array(
                 		'body'  => $description,
                        'title' => $title,
                        "image" => $imgurl),
                        "data"  => array(
									"click_action"=> "FLUTTER_NOTIFICATION_CLICK",
									"sound"=> "default", 
									"status"=> "done"
									 )
                        ); 
						
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL,"https://fcm.googleapis.com/fcm/send");
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data));  //Post Fields
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: key='.$serverkey));
						$output = curl_exec ($ch);
						curl_close ($ch);
						return $output;
				

			}
            
            public function get_message()
			{
				$sendarray = array();
				$sender_id         = $this->input->post('sender_id');	
				$receiver_id       = $this->input->post('receiver_id');	
				$property_id       = $this->input->post('property_id');
				
				if(!empty($sender_id) && !empty($receiver_id) && !empty($property_id))
				{
					$sql = "select sender_id as id,message,created from chating
								WHERE
								property_id = ".$property_id."
								AND
								(
									sender_id  = ".$sender_id." AND receiver_id = ".$receiver_id." 
									 OR  
									receiver_id  = ".$sender_id."  AND sender_id = ".$receiver_id."  
								)";
					$chatings = $this->db->query($sql)->result_array();
								  
					if(!empty($chatings))
					{
					  $sendarray['status']  = 1;  
					  $sendarray['message'] = "get message";
					  $sendarray['data']    = $chatings;					 
					}
					else
					{
						$sendarray['status'] = 0;  
						$sendarray['message'] = "no message";
						$sendarray['data']   =  array();
					}
				}
				else
				{
					$sendarray['status'] = 0;  
				    $sendarray['message'] = "all field requied";
				    $sendarray['data']   =  array();
				}
				return json_encode($sendarray, true);
		    } 
            
            public function get_all_message()
			{
			    $sendarray = array();
				$final = array();
				if($this->session->userdata('aid'))
				{
					$myId = $this->session->userdata('aid');
				}
				else
				{
					$myId    = $this->input->post('user_id');
				}
				
					
					  
			    $sql = "select DISTINCT  property_id,sender_id,receiver_id  from chating 
				        WHERE
						sender_id  = ".$myId." OR receiver_id  = ".$myId."
						";
						 
				$query = $this->db->query($sql)->result_array();
				foreach($query as $key => $value)
				{
					$temp = $query[$key];
					foreach($query as $key2 => $value2)
					{
						
						if($key != $key2)
						{
							$temp2 = $query[$key2];
							if($temp['property_id'] == $temp2['property_id'] && $temp['sender_id'] == $temp2['receiver_id'] && $temp['receiver_id'] == $temp2['sender_id']  )
							{
							   unset($query[$key]);							   
							}
							
						}
					}
				}
				
							
				if(!empty($query))
				{
					foreach($query as $row)
					{
						if($myId == $row['receiver_id'])
						{
							$row['receiver_id'] = $row['sender_id'];
						}
						if($myId != $row['sender_id'])
						{
							$row['sender_id'] =  $myId;
						}
						
						$stype = $this->db->select('sell_type')->where('property_id',$row['property_id'])->get('property')->row_array();
						$ptype = $this->db->select('property_type')->where('property_id',$row['property_id'])->get('property')->row_array();
						
						$requested_for = $this->db->select('requested_for')->where('property_id',$row['property_id'])->get('property')->row_array();
						
						if($requested_for['requested_for'] == 1)
						{
							$row['min_budget'] = $this->db->select('min_budget')->where('property_id',$row['property_id'])->get('property')->row()->min_budget;
						    $row['max_budget'] = $this->db->select('max_budget')->where('property_id',$row['property_id'])->get('property')->row()->max_budget;
						}
						elseif($requested_for['requested_for'] == 2)
						{
							
						    $row['max_budget'] = $this->db->select('max_budget')->where('property_id',$row['property_id'])->get('property')->row()->max_budget;
						}
						$row['sender_data']   = $this->db->select('aid as sender_id,name,image')->where('aid',$row['sender_id'])->get('administrator')->row_array();
						$row['receiver_data'] = $this->db->select('aid as receiver_id,name,image')->where('aid',$row['receiver_id'])->get('administrator')->row_array();
						
						
						
						// $uid = $this->db->select('user_id')->where('property_id',$row['property_id'])->get('property')->row_array();
						
						// $userinfo = $this->db->select('aid as sender_id,name,image')->where('aid',$uid['user_id'])->get('administrator')->row_array();
						// $row['sender_data'] = $userinfo;
						
						$sellType = $this->db->select('sub_category')->where('id',$stype['sell_type'])->get('filter_subcategory')->row_array();
						$row['sell_type'] = $sellType['sub_category'];	
						
						$property_type = $this->db->select('child_category')->where('id',$ptype['property_type'])->get('filter_child_category')->row_array();
						$row['property_type'] = $property_type['child_category'];

						$proImg = $this->db->select('property_image')->where('property_id',$row['property_id'])->get('property_images')->row_array();
						$row['property_images'] =  $proImg['property_image'];
						
						$final[] =  $row;
					}
					
					$sendarray['status']  = 1;  
				    $sendarray['message'] = "get all message";
					$sendarray['data']    = $final;
				}
				else
				{
					$sendarray['status'] = 0;  
				    $sendarray['message'] = "no message";
				    $sendarray['data']   =  array();
				}
				return json_encode($sendarray, true);
				
			}
			
			
			public function get_message_web()
			{
				$sendarray = array();
				$sender_id         = $this->input->post('sender_id');	
				$receiver_id       = $this->input->post('receiver_id');	
				$property_id       = $this->input->post('property_id');
				
				if(!empty($sender_id) && !empty($receiver_id) && !empty($property_id))
				{
					$sql = "select sender_id as id,message,created from chating
								WHERE
								property_id = ".$property_id."
								AND
								(
									sender_id  = ".$sender_id." AND receiver_id = ".$receiver_id." 
									 OR  
									receiver_id  = ".$sender_id."  AND sender_id = ".$receiver_id."  

								)";
					
					$chatings = $this->db->query($sql)->result_array();
								  
					if(!empty($chatings))
					{
					  $sendarray['status']  = 1;  
					  $sendarray['message'] = "get message";
					  $sendarray['data']    = $chatings;					 
					}
					else
					{
						$sendarray['status'] = 0;  
						$sendarray['message'] = "no message";
						$sendarray['data']   =  array();
					}
				}
				else
				{
					$sendarray['status'] = 0;  
				    $sendarray['message'] = "all field requied";
				    $sendarray['data']   =  array();
				}
				return json_encode($sendarray, true);
		    } 

            			
		}
	?>