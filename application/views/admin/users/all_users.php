<?php $this->load->view('admin/include/header'); ?>
<div class="page-content">
	<div class="container-fluid">
		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0">Manage All Users</h4>
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Manage Users</a></li>
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
						<form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('administrator/Users/update_profile'); ?>','#createForm1','#successMsg')">
							<input type="hidden" name="aid" value="<?php echo !empty($getOneUser['aid'])?$getOneUser['aid']:''; ?>">
							<div class="row col-md-8">
								<div class="col-md-6">
								    <label> Name*</label>
									<input value="<?php echo isset($getOneUser['name'])?$getOneUser['name']:""; ?>" name="name" maxlength="80" required type="text" class="form-control"  />
								</div>
								<div class="col-md-6">
								    <label>Email*</label>
									<input required value="<?php echo isset($getOneUser['email'])?$getOneUser['email']:""; ?>" name="email" maxlength="80"  type="text" class="form-control"  />
								</div>
								<div class="col-md-6">
								    <label>Mobile</label>
									<input value="<?php echo isset($getOneUser['mobile'])?$getOneUser['mobile']:""; ?>" name="mobile" maxlength="25" type="text" class="form-control"  />
								</div>
								
								<div class="col-md-3">
								   <label class="mt-3">
								     <?php
									
										$photourl = !empty($getOneUser['image'])?base_url($getOneUser['image']):
												
										"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";
							
									 ?>
	
									<label for="finput" class="cUploadImages">
										<img id="blah" style="max-width:500px; max-height:500px;" name="employee_image" src="<?php echo $photourl ; ?>" alt="upload Banner" />
										<br/>Employee Image
									</label>			
									<input type="file" value="<?php echo isset($getOneUser['image'])?$getOneUser['image']:""; ?>" name="employee_image" multiple="true" accept="image/*" id="finput" onchange="readURL(this);" class="d-none"/>
								   
								   </label>
											
									
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
							<a class="btn btn-success" href="<?php echo site_url('administrator/users/allusers/add'); ?>" style="background-color:#0bb197;">Add New</a>
						</div>
						<div style='clear:both;'></div>
						<table id="tabeldatahere" class="table table-striped">
							<thead class="text-center">
								<tr>
									<th>#</th>
									<th>User</th>
									<th>Wallet Balannce</th>
									<th>Total Post</th>
									<th>Email</th>
									<th>Image</th>
									<th>Phone</th>
									<th>Status</th>
									<th>Added on</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody class="text-center">
								<?php
							    if(!empty($getallUser))
								{
								$i = 0;
								foreach($getallUser as $row)
								{
								 $i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo !empty($row['name'])?$row['name']:''; ?></td>
									<td><?php echo !empty($row['wallet'])?$row['wallet']:'0.00'; ?></td>
									<td><?php echo !empty($row['total_post'])?$row['total_post']:'0.00'; ?></td>
									<td><?php echo !empty($row['email'])?$row['email']:''; ?></td>
									
									<td>
									<img  style="max-width:500px; max-height:500px;" 
									      src="<?php echo !empty($row['image'])?base_url($row['image']):	
										  "https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D"; ?>">
									</td>
									<td><?php echo !empty($row['mobile'])?$row['mobile']:''; ?></td>
									<td><?php echo !empty($row['status'])?"<button onclick='updatestatus(this);' t='administrator' i='aid' v='$row[aid]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='administrator' i='aid' v='$row[aid]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
									<td><?php echo !empty($row['added'])?showtime4db($row['added']):''; ?></td>
									<td><a href="<?php echo site_url('administrator/users/allusers/').$row['aid']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
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


    function readURL(input)
	{
	    if(input.files && input.files[0])
		{
		    var reader = new FileReader();
            reader.onload = function (e) {
			    $('#blah').attr('src', e.target.result);  
			};  
			reader.readAsDataURL(input.files[0]);
		}
	}
	
</script>