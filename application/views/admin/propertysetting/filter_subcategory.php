<?php $this->load->view('admin/include/header'); ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Manage Property Setting</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Filter Sub category</a></li>
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
                        <form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('administrator/PropertySetting/manageFilterSubCategory'); ?>','#createForm1','#successMsg')">
                            <input type="hidden" name="id" value="<?php echo !empty($getFilterSubCategory['id'])?$getFilterSubCategory['id']:''; ?>">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label> Filter Category</label>
										<select class="form-control" name="cid" required>
										<option value="">Select  </option>
										  <?php  
										   
										   foreach($getAllFilterCategory as $category)
										   {
											  if($category['id'] == $getFilterSubCategory['cid'])
											  {
												?>
											      <option value="<?php echo $category['id'] ?>" selected><?php echo $category['category'] ?></option>
											   <?php  
											  }
                                              else
											  {
												?>
										          <option value="<?php echo $category['id'] ?>"><?php echo $category['category'] ?></option>
											   <?php  
											  }												  
										   }
										   
										  ?>
										</select>
                                    </div>
                                </div>
								<div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label> Sub category</label>
                                        <input value="<?php echo !empty($getFilterSubCategory['sub_category'])?$getFilterSubCategory['sub_category']:'';  ?>" name="sub_category"  required type="text" class="form-control" placeholder="Enter Zone Type" />
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <div class="col-md-12">
                                <div id="successMsg"></div>
                                <button class="btn btn-success" type="submit" style="background-color:#0bb197;"><?php echo !empty($getFilterSubCategory['id'])?'Update':'Save'; ?></button>
                                <button onclick="$('.addform').slideUp()" class="btn btn-outline-danger" type="button">Cancel</button>
                            </div>
                            <div style="clear:both;"></div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div style='float: right; margin-bottom: 10px;'>
                            <a class="btn btn-success" href="<?php echo site_url('administrator/property-setting/filter-subcategory/add'); ?>" style="background-color:#0bb197;">Add New</a>
                        </div>
                        <div style='clear:both;'></div>
                        <table id="tabeldatahere" class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php  
								if(!empty($getAllFilterSubCategory)) 
								{
								 $i = 0;	
                                 foreach($getAllFilterSubCategory as $row)
                                 {	
                                  $i++;								 
							    ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo !empty($row['category'])?$row['category']:''; ?></td>
                                    <td><?php echo !empty($row['sub_category'])?$row['sub_category']:''; ?></td>
                                    <td><?php echo !empty($row['status'])?"<button onclick='updatestatus(this);' t='zone_type' i='id' v='$row[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='zone_type' i='id' v='$row[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
                                    <td><?php echo !empty($row['created'])?showtime4db($row['created']):''; ?></td>
                                    <td><a class="fa fa-edit" href="<?php echo site_url('administrator/property-setting/filter-subcategory/').$row['id']; ?>"></a></td>
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