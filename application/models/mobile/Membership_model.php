    <?php
        Class Membership_model extends CI_Model
		{
			function __construct()
		    {
				parent::__construct();
			}
			
			public function membership_plan()
			{
				
		    }
			
			public function manage_membership_plan()
			{
				
		    } 
			
			public function get_all_membership_plan()
			{
				
				$sendarray = array();
				
				$query = $this->db->where('status',1)->get('membership')->result_array();
				
				if(!empty($query))
				{
					$sendarray['status']   = 1;
					$sendarray['message']  = 'successfully get all plan';
					$sendarray['data']     =  $query;
					
				}
				else
				{
					$sendarray['status']   = 0;
					$sendarray['message']  = 'oops empty data';
					$sendarray['data']     = array();
				}
				return json_encode($sendarray, true);
				
				
		    } 
			
			public function get_one_membership_plan()
			{
				
		    }
            public function remove_membership_plan()
			{
				
		    } 			
		}
		
	?>