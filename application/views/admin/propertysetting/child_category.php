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
							<li class="breadcrumb-item"><a href="javascript: void(0);">Child category</a></li>
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
						<form id="createForm1" onsubmit="return dorequest('<?php echo site_url('administrator/PropertySetting/manageChildCategory'); ?>','#createForm1','#successMsg')">
							<input type="hidden" name="id" value="<?php echo !empty($getChildCategory['id'])?$getChildCategory['id']:''; ?>">
							<div class="row">
							    <div class="col-md-3">
									<div class="form-group mb-3">
										<label>Type</label>
										<select class="form-control" name="pu_id" required>
											<option value="">Select  </option>
											<?php
											
												foreach($property_user as $type)
												{
													if($type['id'] == $getChildCategory['pu_id'])
													{
													?>
													<option value="<?php echo $type['id'] ?>" selected><?php echo $type['type'] ?></option>
													<?php
													}
													else
													{
													?>
													<option value="<?php echo $type['id'] ?>"><?php echo $type['type'] ?></option>
													<?php
													}
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group mb-3">
										<label>Category</label>
										<select class="form-control" name="cid" onchange="getSubCategory()" id="category" required>
											<option value="">Select  </option>
											<?php
											
												foreach($getAllCategory as $category)
												{
													if($category['id'] == $getChildCategory['cid'])
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
								
								<div class="col-md-3">
									<div class="form-group mb-3">
										<label> Sub category</label>
										<input type="hidden" value="<?php  echo $getChildCategory['sid'] ?>" id="scid">
										<select class="form-control" name="sid" id="sub_category" required>
											<option value="">Select  </option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group mb-3">
										<label>Form Field</label>
										<select class="form-control" name="fid" required>
											<option value="">Select  </option>
											<?php
											
											foreach($getAllField as $field)
											{
											if($field['id'] == $getChildCategory['fid'])
											{
											?>
											<option value="<?php echo $field['id'] ?>" selected><?php echo $field['field_name'] ?></option>
											<?php
											}
											else
											{
											?>
											<option value="<?php echo $field['id'] ?>"><?php echo $field['field_name'] ?></option>
											<?php
											}
											}
											
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group mb-3">
										
										<table class="table">
											<thead>
												<tr class="">
													<th class="text-left" >Child category<span class="text-danger">*</span></th>
													<th><a href="javascript:void(0)" class=""  id="add"><i class="fa text-success fa-plus-circle fa-2x"></i></a></th>
												</tr>
											</thead>
											<tbody id="mr">
												
												<?php
												if( isset($getChildCategory['id']) && count($form_fields) > 0)
												{
													foreach($form_fields as $item)
													{
													?>
													<tr class="">
														<td class="">
															<input name="child_category[]"  type="text" value="<?php echo $item['cc_name'] ?>" class="form-control" required>
														</td>
														<td>
															<a href="javascript:void(0)" class=""  id="rm"><i class="fa text-danger fa-times-circle fa-2x"></i></a>
														</td>
													</tr>
													<?php
													}
												}
												else
												{
													?>
													<tr class="">
														<td class="">
															<input name="child_category[]"  type="text" class="form-control" required>
														</td>
														<td>
															<a href="javascript:void(0)" class=""  id="rm"><i class="fa text-danger fa-times-circle fa-2x"></i></a>
														</td>
													</tr>
													<?php
												}
												
												?>
												
											</tbody>
										</table>
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>
							<div id="successMsg" class="col-md-8"></div>
							<div class="col-md-12">
								<div id="successMsg"></div>
								<button class="btn btn-success" type="submit" style="background-color:#0bb197;"><?php echo !empty($getChildCategory['id'])?'Update':'Save'; ?></button>
								<a href="<?php  echo base_url('administrator/childcategory') ?>">
								  <button onclick="$('.addform').slideUp()" class="btn btn-outline-danger" type="button">Cancel</button>
								</a>
							</div>
							<div style="clear:both;"></div>
						</form>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<div style='float: right; margin-bottom: 10px;'>
							<a class="btn btn-success" href="<?php echo site_url('administrator/childcategory/add'); ?>" style="background-color:#0bb197;">Add New</a>
						</div>
						<div style='clear:both;'></div>
						<table id="tabeldatahere" class="table table-striped">
							<thead class="text-center">
								<tr>
									<th>#</th>
									<th>Type</th>
									<th>Category</th>
									<th>Sub Category</th>
									<th>Field</th>
									<th>Status</th>
									<th>Created</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody class="text-center">
								<?php
								if(!empty($getAllChildCategory))
								{
									$i = 0;
									foreach($getAllChildCategory as $row)
									{
										$i++;
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo !empty($row['pu_id'] == 1)?'Buy':'Sell'; ?></td>
										<td><?php echo !empty($row['category'])?$row['category']:''; ?></td>
										<td><?php echo !empty($row['subcategory'])?$row['subcategory']:''; ?></td>
										<td><?php echo !empty($row['field_name'])?$row['field_name']:''; ?></td>
										<td><?php echo !empty($row['status'])?"<button onclick='updatestatus(this);' t='child_category' i='id' v='$row[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='child_category' i='id' v='$row[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
										<td><?php echo !empty($row['created_at'])?showtime4db($row['created_at']):''; ?></td>
										<td>
										   <a href="<?php echo site_url('administrator/childcategory/').$row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
										   <a href="<?php  echo base_url('administrator/delete_chid_category/').$row['id'] ?>"  onclick="return confirm('Are you sure you want to delete this item')"><i class="fa-solid fa-trash text-danger"></i></a>
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
    			$(document).ready(function(){
    				$("#add").click(function(){
    				var tr = '<tr class="">'+
    					
    					'<td class="" colspan=""><input name="child_category[]"  type="text" class="form-control" required></td>'+
    					'<td><a href="javascript:void(0)" class="" id="rm"><i class="fa text-danger fa-times-circle fa-2x"></i></a></td>'+
    				'</tr>'
    				$("#mr").append(tr);
    				});
    				$('#mr').on('click','#rm', function(){
    					
    				     $(this).parent().parent().remove();
    				});
    			});
    </script>
	
	<script>

        function getSubCategory()
		{
			 var scid = $("#scid").val();
			 var sc_id = scid != null?scid:0;
			 var categoryId =  $("#category").val();
			 
			 $.ajax({
				 
					type:'POST',
					url:'<?php echo base_url('administrator/Category/getAjaxSubCategory') ?>',
					data:{categoryId:categoryId,scid:sc_id},
					dataType:"json",
					success:function(data){
										
						$('#sub_category').html(data);

					}
				})
		}
		
	</script>
	
	
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
	
	
	<?php
	
		if(isset($getChildCategory['cid']))
		{
			?>
			<script> $("#category").trigger("change"); </script>
			<?php
		}

	?>
	
	
	