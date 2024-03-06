<?php $this->load->view('admin/include/header'); ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Manage wallet setting</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage wallet</a></li>
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
                        <form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('administrator/wallet/manageWallet'); ?>','#createForm1','#successMsg')">
                            <input type="hidden" name="id" value="<?php echo !empty($edit_wallet['id'])?$edit_wallet['id']:"";  ?>">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Wallet Bonus Amount*</label>
                                        <input value="<?php echo  !empty($edit_wallet['wallet_bonus'])?$edit_wallet['wallet_bonus']:"";  ?>" name="wallet_bonus"  type="text" class="form-control" placeholder="Enter" required />
                                    </div>
                                </div>
								<div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Post Price *</label>
                                        <input value="<?php echo !empty($edit_wallet['post_price'])?$edit_wallet['post_price']:"";  ?>" name="post_price"  type="text" class="form-control" placeholder="Enter" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-success mt-4" type="submit" style="background-color:#0bb197"><?php echo !empty($edit_wallet)?"Update":"Submit";  ?></button>
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
                                    <th>Wallet Bonus Amount</th>
                                    <th>Post Price</th>
                                    <th>Status</th>
                                    <th>Created on</th>
                                    <th>Updated on</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php  
								if(!empty($wallet_system)) 
								{
								 $i = 0;	
                                 foreach($wallet_system as $row)
                                 {	
                                  $i++;								 
							    ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo !empty($row['wallet_bonus'])?$row['wallet_bonus']:''; ?></td>
                                    <td><?php echo !empty($row['post_price'])?$row['post_price']:''; ?></td>
                                    <td><?php echo !empty($row['status'])?"<button onclick='updatestatus(this);' t='wallet_system' i='id' v='$row[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='wallet_system' i='id' v='$row[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
                                    <td><?php echo !empty($row['created_at'])?showtime4db($row['created_at']):''; ?></td>
                                    <td><?php echo !empty($row['updated_at'])?showtime4db($row['updated_at']):''; ?></td>
                                    <td>
									   <a  href="<?php echo site_url('administrator/pages/wallet_edit/').$row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
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