<?php $this->load->view('user/include/header'); ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Property Looking For</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Looking For</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
              
                <div class="card">
                    <div class="card-body">
                        <div style='float: right; margin-bottom: 10px;'>
                           
                        </div>
                        <div style='clear:both;'></div>
                        <table id="tabeldatahere" class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>Posted For</th>
                                 
                                    <th>Category</th>
                                    <th>Property Type</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php  
								if(!empty($looking_for)) 
								{
								 $i = 0;	
                                 foreach($looking_for as $row)
                                 {	
                                  $i++;								 
							    ?>
                                <tr>
								    <td><?php echo !empty($row['request_from'])?$row['request_from']:'';?></td>
                                    
                                    <td><?php echo !empty($row['sell_type'])?$row['sell_type']:''; ?></td>
                                    <td><?php echo !empty($row['property_type'])?$row['property_type']:''; ?></td>
                                    <td><?php echo !empty($row['property_state'])?$row['property_state']:''; ?></td>
                                    <td><?php echo !empty($row['property_city'])?$row['property_city']:''; ?></td>
                                   
                                    <td>
									<?php 
									foreach($row['administrator'] as $user) 
									{
									  echo $user['name'];
									}
						
									?>
									</td>
									<td><?php echo !empty($row['status'] == 1)?"<button  type='button' class='btn btn-success'>Active</button>":"<button  type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
                                    
                                    <td><a class="btn btn-info" href="<?php echo base_url('property_details/').$row['property_id'] ?>">view</a></td>
                                    <td>
									
									<?php  
									
									 if($row['request_from'] == 'buy property')
									 {
									  ?>
										 <a href="<?php echo base_url('user/property/buy-property/').$row['property_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                      
									  <?php										
									 }
									 elseif($row['request_from'] == 'tenant')
									 {
									   ?>
										 <a href="<?php echo base_url('user/property/rent_in/').$row['property_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                       
									   <?php	 
									 }
									 elseif($row['request_from'] == 'lessee')
									 {
									  ?>
										 <a href="<?php echo base_url('user/property/lease_in/').$row['property_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                      
									  <?php		 
									 }
									
									
									?>
									
									
									</td>
                                </tr>
                                <?php
								 }
								}
								?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <div style='clear:both;'></div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>


<?php  $this->load->view('user/include/newfooter'); ?>

<?php  

// if($row['request_from'] == 1)
										// {
											// echo "Buy";
										// }
										// elseif($row['request_from'] == 2)
										// {
											// echo "Sell";
										// }
										// elseif($row['request_from'] == 3)
										// {
											// echo "Landlord";
										// }
										// elseif($row['request_from'] == 4)
										// {
											// echo "Lessor";
										// }
										// elseif($row['request_from'] == 5)
										// {
											// echo "Tenant";
										// }
										// elseif($row['request_from'] == 6)
										// {
											// echo "Lessee";
										// }

?>

