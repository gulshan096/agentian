<?php $this->load->view('admin/include/header'); ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Membership </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Membership</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12" >
			
                <style>
                <?php
                if(empty($openform))
                {
                echo " .addform { display:none; } ";
                }
                ?>
                </style>
                <div class="card addform" id="addPost">
                    <div class="card-body">
                        <form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('administrator/Membership_controller/manage_membership_plan'); ?>','#createForm1','#successMsg')">
                            <input type="hidden" name="id" value="<?php echo !empty($get_one_plan['id'])?$get_one_plan['id']:''; ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label> Plan Type*</label>
                                        <input value="<?php echo !empty($get_one_plan['plan_type'])?$get_one_plan['plan_type']:''; ?>" name="plan_type"  required type="text" class="form-control" placeholder="Enter Plan Type" />
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label> Price*</label>
                                        <input value="<?php echo !empty($get_one_plan['price'])?$get_one_plan['price']:''; ?>" name="price"  required type="text" class="form-control" placeholder="Enter Price" />
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label> Validity*</label>
                                        <input value="<?php echo !empty($get_one_plan['validity'])?$get_one_plan['validity']:''; ?>" name="validity"  required type="text" class="form-control" placeholder="Enter Validity" />
                                    </div>
                                </div>
							</div>
                            <div class="row">							
								<div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label> Description </label>
										<textarea name="description" class="form-control"><?php echo !empty($get_one_plan['description'])?$get_one_plan['description']:''; ?></textarea>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <div class="col-md-12">
                                <div id="successMsg"></div>
                                <button class="btn btn-success" type="submit" style="background-color:#0bb197;"><?php echo !empty($get_one_plan['id'])?'Update':'Save'; ?></button>
                                <button onclick="$('.addform').slideUp()" class="btn btn-outline-danger" type="button">Cancel</button>
                            </div>
                            <div style="clear:both;"></div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div style='float: right; margin-bottom: 10px;'>
                            <a class="btn btn-success" href="<?php echo site_url('administrator/membership/add'); ?>" style="background-color:#0bb197;">Add New</a>
                        </div>
                        <div style='clear:both;'></div>
                        <table id="tabeldatahere" class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>S.NO.</th>
                                    <th>Plan Type</th>
									<th>Price</th>
									<th>Validity</th>
									<th>Description</th>
									<th>Status</th>
									<th>created</th>
									<th>Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php  
								if(!empty($get_all_plan)) 
								{
								 $i = 0;	
                                 foreach($get_all_plan as $row)
                                 {	
                                  $i++;								 
							    ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo !empty($row['plan_type'])?$row['plan_type']:''; ?></td>
                                    <td><?php echo !empty($row['price'])?$row['price']:''; ?></td>
                                    <td><?php echo !empty($row['validity'])?$row['validity']:''; ?> Days</td>
                                    <td><?php echo !empty($row['description'])?$row['description']:''; ?></td>
									<td><?php echo !empty($row['status'])?"<button onclick='updatestatus(this);' t='membership' i='id' v='$row[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='membership' i='id' v='$row[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
                                    <td><?php echo !empty($row['created'])?$row['created']:''; ?></td>
                                    <td><?php echo !empty($row['updated'])?$row['updated']:''; ?></td>
									<td><a href="<?php echo site_url('administrator/membership/').$row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
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