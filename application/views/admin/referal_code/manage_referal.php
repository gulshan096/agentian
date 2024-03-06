<?php $this->load->view('admin/include/header'); ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Manage referal setting</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage referal</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12" >
               
                <div class="card addform" id="addPost">
                    <div class="card-body">
                        <form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('administrator/manage_referal_code'); ?>','#createForm1','#successMsg')">
                            <input type="hidden" name="id" value="<?php echo !empty($edit_referal['id'])?$edit_referal['id']:"";  ?>">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Referal Amount*</label> 
                                        <input value="<?php echo  !empty($edit_referal['referal_amount'])?$edit_referal['referal_amount']:"";  ?>" name="referal_amount"  type="text" class="form-control" placeholder="Enter" required />
                                    </div>
                                </div>
								
                                <div class="col-md-4">
                                    <button class="btn btn-success mt-4" type="submit" style="background-color:#0bb197"><?php echo !empty($edit_referal)?"Update":"Submit";  ?></button>
                                </div>
                            </div>
							<div class="col-md-4" id="successMsg"></div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        
                        <div style='clear:both;'></div>
                        <table id="tabeldatahere" class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Referal amount</th>
                                    <th>Status</th>
                                    <th>Created on</th>
                                    <th>Updated on</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php  
								if(!empty($referal_system)) 
								{
								 $i = 0;	
                                 foreach($referal_system as $row)
                                 {	
                                  $i++;								 
							    ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo !empty($row['referal_amount'])?$row['referal_amount']:''; ?></td>
    
                                    <td><?php echo !empty($row['status'])?"<button onclick='updatestatus(this);' t='referal_code' i='id' v='$row[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='referal_code' i='id' v='$row[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
                                    <td><?php echo !empty($row['created_at'])?showtime4db($row['created_at']):''; ?></td>
                                    <td><?php echo !empty($row['updated_at'])?showtime4db($row['updated_at']):''; ?></td>
                                    <td>
									   <a href="<?php echo site_url('administrator/referal_code_edit/').$row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
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


<?php  $this->load->view('admin/include/newfooter'); ?>


