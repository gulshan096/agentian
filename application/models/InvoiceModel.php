<?php
Class InvoiceModel extends CI_Model
		{
			function __construct()
				{
					parent::__construct();
				}
			
			public function GetInvoice($inv_id=0,$status=0)
				{
					
					if(!empty($inv_id))
						{
							$temp	=	$this->db->query("SELECT * FROM `invoice` where inv_id = '$inv_id'")->result_array();
							
								if(!empty($temp))
									{
										return $temp[0];
									}
										return array();
						}
						
							$this->db->select("invoice.*,traders.name,traders.email,traders.mobile,traders.type");
							
								$keyword	=	$this->input->post('keyword');
								
									if(!empty($keyword))
										{
											$this->db->where(" lower(invoice.name) like '%$keyword%' ");
										}
										
										$this->db->join("traders","traders.tid=invoice.tid","INNER");
										
									if(!empty($status))
										{
											$this->db->where("invoice.status",$status);
										}
											$this->db->from("invoice");
					    $tmp = $this->db->get()->result_array(); 
							echo $this->db->last_query();
						return $tmp; 
				}


		    public function saverecords()
				{ 
					$senddata = array();
					$senddata['status'] = 0;
					$senddata['message'] = "Something went wrong, Please try again later.";
					
                    $invoice	=	$this->input->post('invoice');

                    if(!empty($invoice))
                    {
                        $senddata = array();
                        $senddata['status'] = 1;
                        $senddata['message'] = "Successful";
                        
                                $logincheck	=	$this->session->userdata(); 
                                $invoice['updated']	=	gettime4db();
                              //  $invoicefile['tid']= (rand(10,100));

                                $file	=	uploadimgfile("invoicefile","assets/invoice","inv_");
									if(empty($file['status']))
										{
											$senddata['message'] = "Upload Invoice file";
											return json_encode($senddata);
										}
										if($file['status']==1)
										{
												// echo "heer"; exit(0);
												$invoice['file'] = $file['data']['name'];
										}
										
											if(!empty($invoice['fordate']))
												{
													$invoice['fordate']	=	date("Y-m-d",strtotime($invoice['fordate']));
												} else {
													$invoice['fordate']	=	0;
												}

                                if(empty($invoice['inv_id']))
                                {
                                    //$sql = $this->db->set($invoice)->get_compiled_insert('invoice');
                                        $invoice['added']	=	gettime4db();
                                        $this->db->insert('invoice', $invoice);
                                        $senddata['message'] = "Invoice ($invoice[inv_id]) Added successfully";

                                } else {
                                $this->db->where('inv_id', $invoice['inv_id']);										
                                $this->db->update('invoice', $invoice);
                                $senddata['message'] = "Invoice ($invoice[tid]) Updated successfully"; 
                                }
                            
                                $this->AuthenticationModel->add_activity($senddata['message'],$logincheck['token'],$logincheck['usertype']);
                            
                                $senddata['status'] = 1;
								$senddata['redurl'] = site_url("administrator/invoice/view");	
                        return json_encode($senddata);
                    }
					return json_encode($senddata);	
				}
				
		}
		
		?>