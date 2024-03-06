<?php $this->load->view('admin/include/header'); ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Manage Property Request</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">All Property Request</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
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
                            <a class="btn btn-success" href="#" style="background-color:#0bb197;">Add New</a>
                        </div>
                        <div style='clear:both;'></div>
                        <table id="tabeldatahere" class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>Request From</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Budget</th>
                                    <th>User</th>
                                    <th>Is Feature</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php  
								if(!empty($getRequestProperty)) 
								{
								    $i = 0;	
                                 foreach($getRequestProperty as $row)
                                 {	
                                    $i++;							 
							    ?>
                                <tr>
                                    <td><?php echo !empty($row['request_from'])?$row['request_from']:''; ?></td>
                                    <td><?php echo !empty($row['category'])?$row['category']:''; ?></td>
                                    <td><?php echo !empty($row['subcategory'])?$row['subcategory']:''; ?></td>
                                    <td><?php echo !empty($row['property_state'])?$row['property_state']:''; ?></td>
                                    <td><?php echo !empty($row['property_city'])?$row['property_city']:''; ?></td>
                                    <td><?php echo !empty($row['budget'])?$row['budget']:''; ?></td>
                                    <td>
									<?php
									
									    foreach($row['administrator'] as $user) 
									    {
											echo $user['name'];
										}
									?>
									</td>
	                                <td><?php echo !empty($row['is_feature'])?"<button onclick='updatefeaturestatus(this);' t='property' i='property_id' v='$row[property_id]' s='1' type='button' class='btn btn-success'>Yes</button>":"<button onclick='updatefeaturestatus(this);' t='property' i='property_id' v='$row[property_id]' s='0' type='button' class='btn btn-danger'>No</button>"; ?></td>
                                    <td><?php echo !empty($row['status'])?"<button onclick='updatestatus(this);' t='property' i='property_id' v='$row[property_id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='property' i='property_id' v='$row[property_id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>  
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
<?php  $this->load->view('admin/include/newfooter'); ?>