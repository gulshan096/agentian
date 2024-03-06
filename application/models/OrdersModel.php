<?php
Class OrdersModel extends CI_Model
		{
			function __construct()
				{
					parent::__construct();
				}
			
			public function GetProducts($pid=0,$status=0,$select="*")
				{
					
					if(!empty($pid))
						{
						$temp	=	$this->db->query("SELECT * FROM `products` where pid = '$pid'")->result_array();
						if(!empty($temp))
						{
							return $temp[0];
						}
						return array();
						}
						$this->db->select($select);
						$keyword	=	$this->input->post('keyword');
						if(!empty($keyword))
						{
							$this->db->where(" lower(title) like '%$keyword%' ");
						}
						if(!empty($status))
						{
							$this->db->where("status",$status);
						}
						$this->db->from("products");
					return $this->db->get()->result_array(); 
				}

		    public function getdetails()
				{
					$senddata = array();
						$senddata['status'] 			= 0;
						$senddata['message'] 			= "Something went wrong, Please try again later.";
						$senddata['traders'] 			= array();
						$senddata['orders'] 			= array();
						$senddata['orders_products'] 	= array();
						
					$ord_id				=	$this->input->post('ord_id');	
					
						if(empty($ord_id))
							{
								$senddata['message'] 	= "Unable to get the order Details.";
								return json_encode($senddata);	
							}
							
							
	$senddata['orders']				=	$this->db->query(" SELECT * FROM orders WHERE ord_id = '$ord_id'; ")->result_array(); 
	
	
						if(empty($senddata['orders']))
							{
								$senddata['message'] 	= "Unable to get the order Details.";
								return json_encode($senddata);	
							}
							
							
						$senddata['status'] 	= 1;
						$senddata['message'] 	= "Details of the Order.";
	
	$senddata['orders_products']	=	$this->db->query(" SELECT  products.pid,products.title,orders_products.qty,orders_products.rate FROM `orders_products`  INNER JOIN products ON orders_products.pid = products.pid WHERE orders_products.ord_id = '$ord_id'; ")->result_array(); 
	
		$senddata['orders'] = $senddata['orders'][0];
	
		$tid	=	$senddata['orders']['tid']; 
	
	$senddata['traders']	=	$this->db->query(" SELECT name,email,mobile,company FROM traders WHERE tid = '$tid' ")->result_array();
					
		if(!empty($senddata['traders']))
			{
				$senddata['traders']	=	$senddata['traders'][0];
			}
					
						return json_encode($senddata);		
						
				}

		    public function getlist()
				{
					$senddata = array();
						$senddata['status'] 	= 0;
						$senddata['message'] 	= "Something went wrong, Please try again later.";
						
							
						if(S_USERTYPE!="trader")
							{
								$sql	=	"
												SELECT 
													traders.name,traders.company,traders.email,traders.mobile,
													orders.ord_id,orders.prd_qty,orders.prd_total,orders.added,orders.status
												FROM
													`orders`
												INNER JOIN
													traders
												ON
													traders.tid = orders.tid 
												WHERE 
													orders.added_id = '".S_USERID."'
											"; 
								$senddata['message']	=	"Trader's Orders from Employee";
							} else {
								$senddata['message']	=	"Trader's Orders";
								$sql	=	"
												SELECT 
													orders.ord_id,orders.prd_qty,orders.prd_total,orders.added,orders.status
												FROM
													`orders`
												WHERE 
													orders.tid = '".S_USERID."'
											"; 
							}
								
						$senddata['status'] 	= 1;
						$senddata['data'] 	= $this->db->query($sql)->result_array();
						
					return json_encode($senddata);	
				}
				
		    public function create()
				{
					$senddata = array();
						$senddata['status'] 	= 0;
						$senddata['message'] 	= "Something went wrong, Please try again later.";

							if(!empty($_POST))
								{
									file_put_contents(FCPATH."/test.txt",json_encode($_POST));
								}

						$orders				=	$this->input->post('orders');
						$sent_orders_products	=	$this->input->post('orders_products');
						
						if(S_USERTYPE=="trader")
							{
								$orders['tid'] = S_USERID;
							}
						
							if(empty($orders['tid']))
								{
									$senddata['message'] 	= "Unable to get the Vendor Details, Please select the Vendor.";
									return json_encode($senddata);	
								}

					$pid	=	json_decode($sent_orders_products['pid'],true);
					$rate	=	json_decode($sent_orders_products['rate'],true);
					$qty	=	json_decode($sent_orders_products['qty'],true);

				if(count($pid)<1)
							{
								$senddata['message'] 	= "Please select at-least one Materail.";
									return json_encode($senddata);	
							}
						
								
								
							if(empty($orders['bil_ads']))
								{
									$senddata['message'] 	= "Billing Address is required.";
									return json_encode($senddata);	
								}
								
							if(empty($orders['ship_ads']))
								{
									$senddata['message'] 	= "Shipping Address is required.";
									return json_encode($senddata);	
								}


								$orders['prd_qty']		=	array_sum($qty);
								$orders['prd_total']	=	array_sum($rate);


								$orders['added_id']		=	S_USERID; 
								$orders['added_by']		=	S_USERTYPE; 
								$orders['added']		=	gettime4db(); 
								$orders['updated']		=	gettime4db(); 
								
									$this->db->insert("orders",$orders);
									
										$ord_id	=	$this->db->insert_id();
										
										
									if(empty($ord_id))	
										{
											return json_encode($senddata);	
										}
										
									foreach($pid as $i=>$v)
										{
											$orders_products	=	array(); // 				
												$orders_products['ord_id']	=	$ord_id;
												$orders_products['pid']		=	$v;
												$orders_products['rate']	=	$rate[$i];
												$orders_products['qty']		=	$qty[$i];
												$orders_products['added']	=	gettime4db();
											$this->db->insert("orders_products",$orders_products);
										}
										
									$traders_transaction	=	array();
										$traders_transaction['tid']		=	$orders['tid'];
										$traders_transaction['value']	=	array_sum($rate);
										$traders_transaction['type']	=	"debit";
										$traders_transaction['remark']	=	"Order #$ord_id Created.";
										$traders_transaction['fordate']	=	date('Y-m-d');
										$orders_products['added']		=	gettime4db();
										$orders_products['updated']		=	gettime4db();
										
										
										if(S_USERTYPE=="treader")
											{
												$orders_products['tid'] = S_USERID;
											} else {
												$orders_products['aid'] = 0;
											}
										
										 
										
										
											$senddata['status'] 	=	1;
											$senddata['message'] 	= 	"Order created with ID $ord_id.";
							
					return json_encode($senddata);	
				}
				
				
		}
		
		?>