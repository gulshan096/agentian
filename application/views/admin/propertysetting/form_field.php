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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Form Fields</a></li>
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
                        <form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('administrator/PropertySetting/manageFormField'); ?>','#createForm1','#successMsg')">
                            <input type="hidden" name="id" value="<?php echo !empty($getField['id'])?$getField['id']:''; ?>">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label> Field Name *</label>
                                        <input value="<?php echo !empty($getField['field_name'])?$getField['field_name']:'';  ?>" name="field_name"  type="text" class="form-control" required />
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
							<div class="col-md-4" id="successMsg"></div>
                            <div class="col-md-12">
                                <div id="successMsg"></div>
                                <button class="btn btn-success" type="submit" style="background-color:#0bb197;"><?php echo !empty($getField['id'])?'Update':'Save'; ?></button>
                                <button onclick="$('.addform').slideUp()" class="btn btn-outline-danger" type="button">Cancel</button>
                            </div>
                            <div style="clear:both;"></div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div style='float: right; margin-bottom: 10px;'>
                           <a class="btn btn-success" href="<?php echo site_url('administrator/form_field/add'); ?>" style="background-color:#0bb197;">Add New</a> 
                        </div>
                        <div style='clear:both;'></div>
                        <table id="tabeldatahere" class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Field Name</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php  
								if(!empty($getAllField)) 
								{
								 $i = 0;	
                                 foreach($getAllField as $row)
                                 {	
                                  $i++;								 
							    ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo !empty($row['field_name'])?$row['field_name']:''; ?></td>
                                    <td><?php echo !empty($row['status'])?"<button onclick='updatestatus(this);' t='fields' i='id' v='$row[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='fields' i='id' v='$row[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
                                    <td><?php echo !empty($row['created_at'])?showtime4db($row['created_at']):''; ?></td>
                                    <td>
									   <a href="<?php echo site_url('administrator/form_field/').$row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
									</td>
                                </tr>
                                <?php
								 }
								}
								?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div style='clear:both;'></div>
        </div>
    </div>
</div>


<?php  $this->load->view('admin/include/newfooter'); ?>

<script>
	
	   <?php if($this->session->flashdata('success')){ ?>
	   
           toastr.success("<?php echo $this->session->flashdata('success'); ?>");
		 
       <?php }else if($this->session->flashdata('error')){  ?>
	   
          toastr.error("<?php echo $this->session->flashdata('error'); ?>");
		 
       <?php }else if($this->session->flashdata('warning')){  ?>

          toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
	
       <?php }else if($this->session->flashdata('info')){  ?>

         toastr.info("<?php echo $this->session->flashdata('info'); ?>");
	
      <?php } ?>
	
</script>