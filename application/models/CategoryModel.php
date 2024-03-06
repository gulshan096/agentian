    <?php
        Class CategoryModel extends CI_Model
		{
			function __construct()
		    {
					parent::__construct();
					$this->load->library("session");
			}
		
			public function manageCategory()
			{
					$senddata = array();
					$senddata['status'] = 0;
					$senddata['message'] = "Something went wrong, Please try again later.";
					
					$category = $this->input->post();
					
			    if(!empty($category['id']))
				{
					$category['updated_at'] = date("Y-m-d H:m:i");	
					$this->db->where('id',$category['id']);
					$this->db->update('category',$category);	
					
					$senddata['status']   = 1;
					$senddata['redurl']   = site_url("administrator/category");
					$senddata['message']  = "category updated successfully";
					$senddata['data']     =  $bhk_type;	
			    }
			    else
			    {
					$this->db->insert('category', $category);	
					$senddata['status']   = 1;
					$senddata['redurl']   = site_url("administrator/category");
					$senddata['message']  = "category added successfully";	
					$senddata['data']     =  $filter_category;
			    }
			    return json_encode($senddata);
		    }
		
			public function getCategory($id)
			{
			       $this->db->where('id',$id);
                   $query = $this->db->get('category')->row_array();
                   return $query;			   
			}
			
			public function getAllCategory()
			{
				   return $this->db->get('category')->result_array();
			}
			
			public function manageSubCategory()
			{
					$senddata = array();
					$senddata['status'] = 0;
					$senddata['message'] = "Something went wrong, Please try again later.";
					$subcategory = $this->input->post();
					
			    if(!empty($subcategory['id']))
				{
					$subcategory['updated_at'] = date("Y-m-d H:m:i");	
					$this->db->where('id',$subcategory['id']);
					$this->db->update('subcategory',$subcategory);	
					
					$senddata['status']   = 1;
					$senddata['redurl']   = site_url("administrator/subcategory");
					$senddata['message']  = "updated successfully";
					$senddata['data']     =  $subcategory;	
			    }
			    else
			    {

					$this->db->insert('subcategory', $subcategory);	
					$senddata['status']   = 1;
					$senddata['redurl']   = site_url("administrator/subcategory");
					$senddata['message']  = "added successfully";	
					$senddata['data']     =  $subcategory;
			    }
			    return json_encode($senddata);
		    }
			
			public function getAllSubCategory()
			{
				return $this->db->select('category.category,subcategory.*')
				       ->join('category','category.id =subcategory.cat_id','left')
				      ->get('subcategory')->result_array();		
				 
			}
			
			public function getOneSubCategory($id)
			{
			    return $this->db->where('id',$id)->get('subcategory')->row_array();
                  		   
			}
			
			public function manageChildCategory()
			{
				$senddata = array();
				$finalarray = array();
				$senddata['status'] = 0;
				$senddata['message'] = "Something went wrong, Please try again later.";
				$post_val = $this->input->post();

               
				$array1 = array(
					
						 'cid' => $post_val['cid'],
						 'sid' => $post_val['sid'],
						 'fid' => $post_val['fid'],
						 'pu_id' => $post_val['pu_id'],
					);	
			          
		
			    if(!empty($post_val['id']))
				{
					$post_val['updated_at'] = date("Y-m-d H:m:i");	
					$this->db->where('id',$post_val['id'])->update('child_category',$array1);
                    $this->db->where('cc_id',$post_val['id'])->delete('field_data');
                    
                    if(!empty($post_val['child_category']) && count($post_val['child_category']) > 0)
					{
						for($i=0; $i <= count($post_val['child_category']); $i++)
						{
							 $array = array(
						 
							 'cc_id' => $post_val['id'],
							 'cid'   => $post_val['cid'],
							 'sid'   => $post_val['sid'],
							 'fid'   => $post_val['fid'],
							 'pu_id'   => $post_val['pu_id'],
							 'cc_name' => $post_val['child_category'][$i],
							
							);
							
							$this->db->insert('field_data', $array);
						}
					}					
					
					$senddata['status']   = 1;
					$senddata['redurl']   = site_url("administrator/childcategory");
					$senddata['message']  = "updated successfully";
					$senddata['data']     =  $post_val;	
			    }
			    else
			    {

		            $this->db->insert('child_category',$array1);
				    $insert_id = $this->db->insert_id();

                    if(!empty($post_val['child_category']) && count($post_val['child_category']) > 0)
					{
						for($i=0; $i <= count($post_val['child_category']); $i++)
						{
							 $array = array(
						 
							 'cc_id'   => $insert_id,
							 'cid'     => $post_val['cid'],
							 'sid'     => $post_val['sid'],
							 'fid'     => $post_val['fid'],
							 'pu_id'   => $post_val['pu_id'],
							 'cc_name' => $post_val['child_category'][$i],
							
							);
							
							$this->db->insert('field_data', $array);
						}
					}
					
					$senddata['status']   = 1;
					$senddata['redurl']   = site_url("administrator/childcategory");
					$senddata['message']  = "added successfully";	
					$senddata['data']     =  $post_val;
			    }
			    return json_encode($senddata);
			}
			
			public function getChildCategory($id)
			{
		      return $this->db->where('id',$id)->get('child_category')->row_array();
			}
			
			public function form_fields($id)
			{
				return $this->db->where('cc_id',$id)->get('field_data')->result_array();
			}
			
			public function getAllChildCategory()
			{
				return $this->db->select('pu_id,cc.id,cc.cid,cc.sid,cc.fid,c.category,sc.subcategory,fields.field_name,cc.status,cc.created_at')
				       ->join('category as c','c.id = cc.cid','left')
				       ->join('subcategory as sc','sc.id = cc.sid','left')
				       ->join('fields','fields.id = cc.fid','left')
					   ->get('child_category as cc')->result_array();
			}
			
			
			public function manageFormField()
			{
				$senddata = array();
				$senddata['status'] = 0;
				$senddata['message'] = "Something went wrong, Please try again later.";
				$fields = $this->input->post();
					
			    if(!empty($fields['id']))
				{
					$fields['updated_at'] = date("Y-m-d H:m:i");	
					$this->db->where('id',$fields['id']);
					$this->db->update('fields',$fields);	
					
					$senddata['status']   = 1;
					$senddata['redurl']   = site_url("administrator/form_field");
					$senddata['message']  = "updated successfully";
					$senddata['data']     =  $fields;	
			    }
			    else
			    {

					$this->db->insert('fields', $fields);	
					$senddata['status']   = 1;
					$senddata['redurl']   = site_url("administrator/form_field");
					$senddata['message']  = "added successfully";	
					$senddata['data']     =  $fields;
			    }
			    return json_encode($senddata);
			}
			
			public function getField($id)
			{
				return $this->db->where('id',$id)->get('fields')->row_array();
			}
			
			public function getAllField()
			{
			   return $this->db->get('fields')->result_array();	
			}
			
			
			public function getAjaxSubCategory()
			{
			   $categoryId = $this->input->post('categoryId');
			   $scid = $this->input->post('scid');

			   $query =$this->db->select('id,subcategory')->where('cat_id',$categoryId)->where('status',1)->get('subcategory')->result_array();
			   $output = '<option value="">select</option>'; 
			   
                foreach($query as $row)
			    {
				    if($scid != null && $scid == $row['id'])
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
			
			
			// Delete
			
			public function delete_category($id)
			{
				$senddata = array();
				$query  = $this->db->where('id',$id)->delete('category');
				          $this->db->where('cat_id',$id)->delete('subcategory');
						  $this->db->where('cid',$id)->delete('child_category');
						  $this->db->where('cid',$id)->delete('field_data');
				$this->session->set_flashdata('success', 'Deleted successfully');
				return $query ;	
			}
			
			public function delete_subcategory($id)
			{
				$senddata = array();
				$query  = $this->db->where('id',$id)->delete('subcategory');
				$this->db->where('sid',$id)->delete('child_category');
				$this->db->where('sid',$id)->delete('field_data');
				$this->session->set_flashdata('success', 'Deleted successfully');
				return $query ;	
			}
			

			public function delete_chid_category($id)
			{
				$senddata = array();
				$this->db->where('id',$id)->delete('child_category');
				$query  = $this->db->where('cc_id',$id)->delete('field_data');
				$this->session->set_flashdata('success', 'Deleted successfully');
				return $query ;	
			}
			
			public function delete_fields($id)
			{
				$query = $this->db->where('id',$id)->delete('fields');
				$this->session->set_flashdata('success', 'Deleted successfully');
				return $query ;	
			}
			
			
			public function property_user()
			{
			   return $this->db->get('property_user')->result_array();
			}
		
		}
		
	?>