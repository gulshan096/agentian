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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Lease Property Request</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12" >
              
                <div class="card">
                    <div class="card-body">
                        <div style='float: right; margin-bottom: 10px;'>
                            <a class="btn btn-success" href="<?php echo base_url('administrator/property/lessee/add') ?>" style="background-color:#0bb197;">Add New</a>
                        </div>
                        <div style='clear:both;'></div>
                        <table id="tabeldatahere" class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>Category</th>
                                    <th>Property Type</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
                                    <td><?php echo !empty($row['category'])?$row['category']:''; ?></td>
                                    <td><?php echo !empty($row['subcategory'])?$row['subcategory']:''; ?></td>
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
                                    <td><?php echo !empty($row['status'])?"<button onclick='updatestatus(this);' t='property' i='property_id' v='$row[property_id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='property' i='property_id' v='$row[property_id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
                                    <td><a href="<?php echo site_url('administrator/property/lessee/').$row['property_id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
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