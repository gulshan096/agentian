    <?php
        Class PropertySettingModel extends CI_Model
		{
			function __construct()
		    {
					parent::__construct();
			}
			
			// Property Filter category
			public function manageFilterCategory()
			{
					$senddata = array();
					$senddata['status'] = 0;
					$senddata['message'] = "Something went wrong, Please try again later.";
					
					$filter_category = $this->input->post();
					
			    if(!empty($filter_category['id']))
				{
					$filter_category['updated'] = date("Y-m-d H:m:i");	
					$this->db->where('id',$filter_category['id']);
					$this->db->update('filter_category',$filter_category);	
					
					$senddata['status']   = 1;
					$senddata['redurl']   = site_url("administrator/property-setting/filter-category");
					$senddata['message']  = "filter_category updated successfully";
					$senddata['data']     =  $bhk_type;	
			    }
			    else
			    {
					$this->db->insert('filter_category', $filter_category);	
					$senddata['status']   = 1;
					$senddata['redurl']   = site_url("administrator/property-setting/filter-category");
					$senddata['message']  = "filter_category added successfully";	
					$senddata['data']     =  $filter_category;
			    }
			    return json_encode($senddata);
		    }
			

			public function getAllFilterCategory()
			{
				   $query = $this->db->get('filter_category')->result_array();
				   return $query;
			}
			
			
			
			public function getFilterCategory($id)
			{
			       $this->db->where('id',$id);
                   $query = $this->db->get('filter_category')->row_array();
                   return $query;			   
			}
			
			
			
	
			// Property Filter Sub category
			public function manageFilterSubCategory()
			{
					$senddata = array();
					$senddata['status'] = 0;
					$senddata['message'] = "Something went wrong, Please try again later.";
					
					$filtersubcategory = $this->input->post();
					

			    if(!empty($filtersubcategory['id']))
				{
					$filtersubcategory['updated'] = date("Y-m-d H:m:i");	
					$this->db->where('id',$filtersubcategory['id']);
					$this->db->update('filter_subcategory',$filtersubcategory);	
					
					$senddata['status']   = 1;
					$senddata['redurl']   = site_url("administrator/property-setting/filter-subcategory");
					$senddata['message']  = "zone type updated successfully";
					$senddata['data']     =  $filtersubcategory;	
			    }
			    else
			    {
					$this->db->insert('filter_subcategory', $filtersubcategory);	
					$senddata['status']   = 1;
					$senddata['redurl']   = site_url("administrator/property-setting/filter-subcategory");
					$senddata['message']  = "zone type added successfully";	
					$senddata['data']     =  $filtersubcategory;
			    }
			    return json_encode($senddata);
		    }
			
			
			
			
			
			public function getAllFilterSubCategory()
			{
				    $this->db->select('filter_category.category,filter_subcategory.*');
					$this->db->join('filter_category','filter_subcategory.cid = filter_category.id ','left');
				    $query = $this->db->get('filter_subcategory')->result_array();
				    return $query;
			}
			
			public function getFilterSubCategory($id)
			{
			       $this->db->where('id',$id);
                   $query = $this->db->get('filter_subcategory')->row_array();
                   return $query;			   
			}
			
			// Manage filter child category
			
		    public function manageFilterChildCategory()
			{
				    $senddata = array();
					$senddata['status'] = 0;
					$senddata['message'] = "Something went wrong, Please try again later.";
					
					$child_category = $this->input->post();
					
						
			    if(!empty($child_category['id']))
				{
					$child_category['updated'] = date("Y-m-d H:m:i");	
					$this->db->where('id',$child_category['id']);
					$this->db->update('filter_child_category',$child_category);	
					
					$senddata['status']   = 1;
					$senddata['redurl']   = site_url("administrator/property-setting/filter-childcategory");
					$senddata['message']  = "child category updated successfully";
					$senddata['data']     =  $child_category;	
			    }
			    else
			    {
					$this->db->insert('filter_child_category', $child_category);	
					$senddata['status']   = 1;
					$senddata['redurl']   = site_url("administrator/property-setting/filter-childcategory");
					$senddata['message']  = "child category added successfully";	
					$senddata['data']     =  $child_category;
			    }
			    return json_encode($senddata);
			}
			
			public function getAllFilterChildCategory()
			{
					$this->db->select('filter_category.category ,filter_subcategory.sub_category ,filter_child_category.*');
				    $this->db->join('filter_category','filter_child_category.cid = filter_category.id','left');
				    $this->db->join('filter_subcategory','filter_child_category.sid = filter_subcategory.id','left');
					$this->db->where('filter_child_category.status',1);
				    $query = $this->db->get('filter_child_category')->result_array();
				    return $query;
			}
			
			
			public function getFilterChildCategory($id)
			{
				   $this->db->where('id',$id);
                   $query = $this->db->get('filter_child_category')->row_array();
                   return $query;
			}
			
			public function getSubCategory()
			{
			   $categoryId = $this->input->post('categoryId');	
			   
			   $this->db->select('id,cid,sub_category');
			   $this->db->where('cid',$categoryId);
			   $this->db->where('status',1);
               $query = $this->db->get('filter_subcategory')->result_array();
			   
			   $output = '<option value="">select</option>'; 
			  
			    foreach($query as $row)
			    {
				  $output .='<option value="'.$row['sub_category'].'">'.$row['sub_category'].'</option>'; 
			    } 
				return $output;
			   
			}
			
		}
		
	?>