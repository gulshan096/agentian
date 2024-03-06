    <?php
        Class PostFilterModel extends CI_Model
		{
			function __construct()
		    {
				parent::__construct();
			}
			
			public function getChildCategory()
			{
				$finalarray = array();
				$temp = array();
				$sid   = $this->input->post('sub_cat');
				$pu_id = $this->input->post('pu_id');
				$field = $this->db->select('id as field_id')->get('fields')->result_array();

				
				$query = $this->db->select('cc.id,cc.sid,cc.fid,fields.field_name')
				         ->join('fields','fields.id = cc.fid','left')
				         ->where('pu_id',$pu_id)
						 ->where('sid',$sid)
						 ->get('child_category as cc')
						 ->result_array();
						    
				 foreach($query as $item)
				 {
					$fname = $item['fid'];					
					$item['data'] = $this->db->select('id,cc_name')->where('cc_id',$item['id'])
									->where('fid',$item['fid'])->get('field_data')->result_array();	
				    $finalarray[] = $item;
				 }
				 return json_encode($finalarray);
			}
			
			// Get sub categor
			public function getSubCat($catId)
			{
				$this->db->select('id,sub_category');
				$this->db->where('status',1);
				$this->db->where('cid',$catId);
				$query = $this->db->get('filter_subcategory')->result_array();
			    return $query;
			}
			
			public function getSubCatByCatId()
			{
				$sendarray = array();
				$finalarray = array();
				$query = $this->db->select('id,category as sub_category')->get('category')->result_array();
				
				
				// $category = $this->input->post('filter_category');
				if(!empty($query))
			    {
					// foreach($query as $row)
					// {
						// $row['sub_category'] = "";
						
						// array_push($finalarray , $row);
					// }
					// $query['sub_category'] = "";
				   // $this->db->select('filter_subcategory.id,filter_category.category,filter_subcategory.sub_category');
				   // $this->db->join('filter_category','filter_subcategory.cid = filter_category.id ','left');
				   // $this->db->where('filter_subcategory.status',1);
				   // $this->db->where('filter_category.category',$category);
				   // $query = $this->db->get('filter_subcategory')->result_array();

				  
					   $sendarray['status']  = 1;
					   $sendarray['message'] = "successfully get. ";
					   $sendarray['data']    = $query;
	
			    }
			    else
			    {
				   	   $sendarray['status']  = 0;
					   $sendarray['message'] = "not found.";
					   $sendarray['data']    =  array(); 
			    }			   
			    return json_encode($sendarray, true);
			}
			
			
			// Get child category
			
			public function getSubCategory()
			{
				$cid  = $this->input->post('cid');
				$sc_id = $this->input->post('sc_id');
				$query = $this->db->select('id,subcategory')->where('cat_id',$cid)->where('status',1)->get('subcategory')->result_array();
				
				$output = '<option value="">Select</option>'; 
			  
			    foreach($query as $row)
			    {
				    if($sc_id != null && $sc_id == $row['id'])
					{
						$output .='<option value="'.$row['id'].'" selected>'.$row['subcategory'].'</option>'; 
					}
					else
					{
					    $output .='<option value="'.$row['id'].'" >'.$row['subcategory'].'</option>'; 	
					}	
			    } 
				return json_encode($output, true);
				
			}
			
			public function getChildBySubCatId()
			{
		       $sendarray =  array();
		       $finalarray =  array();
			   $category = $this->input->post('category');
			   $sub_category = $this->input->post('sub_category');
			   $field_id = $this->input->post('field_id');
			   $puid = $this->input->post('puid');

               if(!empty($category) && !empty($sub_category) && !empty($field_id))
			   {
				   // $subcategory = $this->db->select('subcategory.id,category.category,subcategory.subcategory as sub_category')
					                // ->join('category','category.id = subcategory.cat_id','left')
                                    // ->where('subcategory.cat_id',$category)
								    // ->where('subcategory.status',1)
					                // ->get('subcategory')
					                // ->result_array();
				   $query = $this->db->select('field_data.id,,category.category,subcategory.subcategory as sub_category,field_data.cc_name as child_category,')
				             ->join('category','category.id = field_data.cid','left')
				             ->join('subcategory','subcategory.id = field_data.sid','left')
						     ->where('field_data.cid',$category)
						     ->where('field_data.sid',$sub_category)
						     ->where('field_data.fid',$field_id)
						     ->where('field_data.pu_id',$puid)
						     ->get('field_data')
						     ->result_array();
							 
					if(!empty($query))
					{
					   $sendarray['status']  = 1;
					   $sendarray['message'] = "successfully get data";
					   $sendarray['data']    = $query;
					}
					else
					{
						$sendarray['status']  = 0;
					   $sendarray['message'] = "not found";
					   $sendarray['data']    = array();
					}
			   }
			   elseif(!empty($category) && empty($sub_category) && empty($field_id) )
			   {
				     $subcategory = $this->db->select('subcategory.id,category.category,subcategory.subcategory as sub_category')
					                ->join('category','category.id = subcategory.cat_id','left')
                                    ->where('subcategory.cat_id',$category)
								    ->where('subcategory.status',1)
					                ->get('subcategory')
					                ->result_array();
					 if(!empty($subcategory))
					 {
						 foreach($subcategory as $row)
						 {
							 $row['child_category'] = "";
							 
							 array_push($finalarray, $row);
						 }
					   $sendarray['status']  = 1;
					   $sendarray['message'] = "successfully get data";
					   $sendarray['data']    = $finalarray;
					 }
					 else
					 {
					   $sendarray['status']  = 0;
					   $sendarray['message'] = "not found";
					   $sendarray['data']    = array();
					 }
			   }
			   // if(!empty($sub_category))
			   // {
				   // $this->db->select('filter_child_category.id,filter_subcategory.sub_category,filter_child_category.child_category,');
				   // $this->db->join('filter_subcategory','filter_child_category.sid = filter_subcategory.id ','left');
				   // $this->db->where('filter_subcategory.sub_category',$sub_category);
				   // $this->db->where('filter_child_category.status',1);
				   // $query = $this->db->get('filter_child_category')->result_array();

				   // if(!empty($query))
				   // {
					   // $sendarray['status']  = 1;
					   // $sendarray['message'] = "successfully get data";
					   // $sendarray['data']    = $query;
				   // }
				   // else
				   // {
					   // $sendarray['status']  = 0;
					   // $sendarray['message'] = "error oops something went wrong";
					   // $sendarray['data']    =  array();   
				   // }  
			   // }
			   // else
			   // {
				   // $sendarray['status']  = 0;
				   // $sendarray['message'] = "error all field required";
				   // $sendarray['data']    =  array();  
			   // }			   
			   return json_encode($sendarray, true);
		    }

            public function getCityByStateId()
			{
				
				$sendarray = array();
				
				$state_id = $this->input->post('state_id');
				$result = $this->db->select('id,name')
				                   ->where('state_id',$state_id)
				                   ->get('loc_cities')
				                   ->result_array();
				
				if(!empty($result))
				{
					$sendarray['status'] = 1;
					$sendarray['message'] = 'city get successfully';
					$sendarray['data'] = $result;
				}
				else
				{
					$sendarray['status'] = 0;
					$sendarray['message'] = 'city not found';
					$sendarray['data'] =  array();
				}
				
				return json_encode($sendarray, true);
			}

            public function getState()
			{
				
				$sendarray = array();
				
				$keyword = $this->input->post('keyword');
				if(!empty($keyword))
				{
					$result = $this->db->select('id,name')
					                   ->like('name',$keyword)
									   ->order_by('name', 'asc')
					                   ->get('loc_states')
									   ->result_array();
				}
				else
				{
					$result = $this->db->select('id,name') 
					                   ->order_by('name', 'asc')
					                   ->get('loc_states')
									   ->result_array();
				}
				
				
				if(!empty($result))
				{
					$sendarray['status'] = 1;
					$sendarray['message'] = 'state get successfully';
					$sendarray['data'] = $result;
				}
				else
				{
					$sendarray['status'] = 0;
					$sendarray['message'] = 'city not found';
					$sendarray['data'] =  array();
				}
				
				return json_encode($sendarray, true);
			}			
		}
		
	?>