<?php $this->load->view('admin/include/header'); ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">About </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage About</a></li>
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
                        <form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('administrator/Pages/manageBanner'); ?>','#createForm1','#successMsg')">
                            <input type="hidden" name="id" value="<?php echo !empty($get_one_banner['id'])?$get_one_banner['id']:''; ?>">
                          
                            
                            <div class="row">                           
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Device</label>
                                        <?php   
                                        
                                          $decice = array(1 =>'mobile', 2=>'desktop');
                                        ?>
                                        <select class="form-control" name="device" required>
                                          <option value="" >Select device</option>
                                          <?php  
                                             
                                             foreach($decice as $key=>$value)
                                             {
                                                if(isset($get_one_banner) && !empty($get_one_banner['device']) && $get_one_banner['device'] == $key)
                                                {
                                                  ?>
                                                       <option value="<?php  echo $key ?>" selected> <?php  echo $value ?></option>
                                                  <?php                                               
                                                }
                                                else
                                                {
                                                    ?>
                                                       <option value="<?php  echo $key ?>"> <?php  echo $value ?></option>
                                                  <?php 
                                                }                                               
                                             }
                                          ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Banner Image (size 1900x1000 *)</label>
                                        <input type="file" name="banner_img" class="form-control" <?php echo isset($get_one_banner['id'])?'':'required'; ?>>
                                    </div>
                                </div>
                                <?php  
                                
                                  if(isset($get_one_banner['banner_img']) && !empty($get_one_banner['banner_img']))
                                  {
                                     ?>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Image View</label><br>
                                        <img src="<?php echo base_url().$get_one_banner['banner_img'] ?>" style="max-width:200px; max-height:200px;">
                                    </div>
                                </div>
                                     <?php                                   
                                  }
                                
                                
                                ?>
                                <div style="clear:both;"></div>
                            </div>
                            <div class="col-md-6">
                                <div id="successMsg"></div>
                                <button class="btn btn-success" type="submit" style="background-color:#0bb197;"><?php echo !empty($get_one_banner['id'])?'Update':'Save'; ?></button>
                                <button onclick="$('.addform').slideUp()" class="btn btn-outline-danger" type="button">Cancel</button>
                            </div>
                            <div style="clear:both;"></div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div style='float: right; margin-bottom: 10px;'>
                            <a class="btn btn-success" href="<?php echo site_url('administrator/pages/banner/add'); ?>" style="background-color:#0bb197;">Add New</a>
                        </div>
                        <div style='clear:both;'></div>
                        <table id="tabeldatahere" class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>S.NO.</th>
                                    <th>Device</th>
                                    <th>Banner Image</th>
                                    <th>Status</th>
                                    <th>created</th>
                                    <th>Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php  
                                if(!empty($get_all_banner)) 
                                {
                                 $i = 0;    
                                 foreach($get_all_banner as $row)
                                 {  
                                  $i++;                              
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['device']==1?'Mobile':'Desktop'; ?></td>
                                    <td><img src="<?php echo base_url().$row['banner_img']; ?>" height="50" width="100"></td>
                                    <td><?php echo !empty($row['status'])?"<button onclick='updatestatus(this);' t='banner' i='id' v='$row[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='banner' i='id' v='$row[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
                                    <td><?php echo !empty($row['created'])?$row['created']:''; ?></td>
                                    <td><?php echo !empty($row['updated'])?$row['updated']:''; ?></td>
                                    <td><a href="<?php echo site_url('administrator/pages/banner/').$row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
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
