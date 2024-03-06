<?php $this->load->view('admin/include/header'); ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Manage Location</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Cities</a></li>
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
                        <form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('administrator/Category/managecategory'); ?>','#createForm1','#successMsg')">
                            <input type="hidden" name="id" value="<?php echo !empty($getOneCategory['id'])?$getOneCategory['id']:''; ?>">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label> Category*</label>
                                        <input value="<?php echo !empty($getOneCategory['category'])?$getOneCategory['category']:''; ?>" name="category"  required type="text" class="form-control" placeholder="Enter Category Name" />
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <div class="col-md-12">
                                <div id="successMsg"></div>
                                <button class="btn btn-success" type="submit" style="background-color:#0bb197;"><?php echo !empty($getOneCategory['id'])?'Update':'Save'; ?></button>
                                <button onclick="$('.addform').slideUp()" class="btn btn-outline-danger" type="button">Cancel</button>
                            </div>
                            <div style="clear:both;"></div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div style='float: right; margin-bottom: 10px;'>
                            <a class="btn btn-success" href="<?php echo site_url('administrator/location/city/add'); ?>" style="background-color:#0bb197;">Add New</a>
                        </div>
                        <div style='clear:both;'></div>
                        <table id="tabeldatahere" class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>S.NO.</th>
                                    <th>City</th>
									<th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php  
								if(!empty($cities)) 
								{
								 $i = 0;	
                                 foreach($cities as $city)
                                 {	
                                  $i++;								 
							    ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo !empty($city['name'])?$city['name']:''; ?></td>
									<td><?php echo !empty($city['status'])?"<button onclick='updatestatus(this);' t='loc_cities' i='id' v='$city[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='loc_cities' i='id' v='$city[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
                                    <td><a class="fa fa-edit" href="<?php echo site_url('administrator/location/city').$city['id']; ?>"></a></td>
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