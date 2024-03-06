    <?php
        Class Membership_model extends CI_Model
		{
			function __construct()
		    {
				parent::__construct();
			}
			
		
			public function manage_membership_plan()
			{
			  $senddata = array();
			  $senddata['status'] = 0;
			  $senddata['message'] = "Something went wrong, Please try again later.";
			  
			  $post_val =  $this->input->post();
             
			  if(!empty($post_val['id']))
			  {
				$post_val['updated'] = date("Y-m-d H:m:i");
				$this->db->where('id',$post_val['id'])->update('membership',$post_val); 
              
                $senddata['status']   =  1;
				$senddata['redurl']   =  site_url("administrator/membership");
				$senddata['message']  =  "membership plan updated successfully";
				$senddata['data']     =  $post_val;			  
			  }
			  else
			  {
				$this->db->insert('membership',$post_val);
                $senddata['status']   =  1;
				$senddata['redurl']   =  site_url("administrator/membership");
				$senddata['message']  =  "membership plan added successfully";
				$senddata['data']     =  $post_val;				
			  }
			  return json_encode($senddata);
		    } 
			
			public function get_all_membership_plan()
			{
				$query = $this->db->get('membership')->result_array();
				return $query;
		    } 
			
			public function get_one_membership_plan($id)
			{
				$this->db->where('id',$id);
                $query = $this->db->get('membership')->row_array();
                return $query;
		    }
            public function remove_membership_plan()
			{
				
		    } 			
		}
		
	?>