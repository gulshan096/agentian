<?php
Class ContactModel extends CI_Model
		{
			function __construct()
				{
					parent::__construct();
				}
			
			public function GetContact($id=0,$status=0)
				{
					if(!empty($id))
						{
						$temp	=	$this->db->query("SELECT * FROM `contact` ")->result_array();
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
						$this->db->from("contact");
					return $this->db->get()->result_array(); 
				}

		    public function saverecords()
				{  
					$senddata = array();
					$senddata['status'] = 0;
					$senddata['message'] = "Something went wrong, Please try again later.";
					$contact = $this->input->post('posts');
                    if(empty($contact['contact']))
					    {
								$senddata['message'] = "Contact is required.";
								return json_encode($senddata);
						}
                    else{
                            $postedby=$this->session->userdata('name');
                            $t=time();
                            $created= date("Y-m-d",$t);
                            $contacts_data  = array(
                                'pid'  =>   $contact['post'],
                                'page_id'  =>   $contact['pages'],
                                'postedby' => $postedby,
                                'comment' => $contact['comment'],
                                //'count' => '0',
                                'created' => $created,
                                'status' => '1'
                            );
                            if(!empty($contacts_data)){
                                 $this->db->insert('contacts', $contacts_data);
                                 $senddata['status'] = 1;
                                 $senddata['redurl'] = site_url("administrator/Contacts/view/new");
                                 $senddata['message'] = "Contacts added successfully";
                                 return json_encode($senddata);
                            }else{
                                $senddata['status'] = 2;
                                $senddata['message'] = "Contacts Not Added";
                                return json_encode($senddata);
                            }
                        }

						return json_encode($senddata);
				}  
				
		}
		
		?>