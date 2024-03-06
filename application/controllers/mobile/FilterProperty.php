    <?php

		defined('BASEPATH') OR exit('No direct script access allowed');

		class FilterProperty extends CI_Controller
		{

			function __construct()
			{
				parent::__construct();
				$this->load->model('mobile/FilterModel');
			}
					
			function filter()  
			{
				echo $this->FilterModel->filterProperty(); 
			}	
		}
	?>