<?php $this->load->view('user/include/header'); ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Profile</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('user/dashboard/update_profile'); ?>','#createForm1','#successMsg')">
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
								<div class="col-md-6">
								    <label>Gender</label>
								    <select class="form-control" name="gender">
									<option value="">Select</option>
									  <?php 
									  $gender = array('1'=>'male','2'=>'female');
									  
									  foreach($gender as $k => $v)
									  {
										  if($getOneUser['gender'] == $k)
										  {
											?>
                                               <option value="<?php echo $k ?>" selected><?php echo $v ?></option>
                                            <?php											
										  }
										  else
										  {
											  ?>
                                               <option value="<?php echo $k ?>"><?php echo $v ?></option>
                                            <?php	
										  }
									  }
									  
									  
									  ?>
									 
								    </select>
								</div>
								<div class="col-md-6">
								    <label> Occupation </label>
									<input value="<?php echo isset($getOneUser['occupation'])?$getOneUser['occupation']:""; ?>" name="occupation"  required type="text" class="form-control"  />
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>State <span class="text-danger" >*</span></label>
										<select onchange="getCity()" class="form-control" id="sid" name="state" required>
											<option value ="">Select</option>
											<?php 
												
												  if(!empty($state))
												  {
													  foreach($state as $item)
													  { 
														  if($item['id'] == $getOneUser['state'])
														  {
															 ?>
															   <option value="<?php echo $item['id'] ?>" selected><?php echo $item['name'] ?></option>
															<?php  
														  }
														  else
														  {
															?>
													          <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                            <?php   
														  }  
													  }													
												  }
												  
											?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label> City <span class="text-danger" >*</span></label>
										<input type="hidden" value="<?php  echo $getOneUser['city'] ?>" id="pc">
										<select  class="form-control  " id="cid" name="city" required>
											<option value="">Select</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group mb-3">
										<label>Address</label>
										<textarea name="address" class="form-control" ><?php echo !empty($getOneUser['address'])?$getOneUser['address']:''; ?></textarea>
									</div>
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
							<div class="col-md-8">
								<div id="successMsg"></div>
								<button class="btn btn-success" type="submit" style="background-color:#0bb197;"><?php echo !empty($getOneCategory['id'])?'Update':'Save'; ?></button>
								<button onclick="$('.addform').slideUp()" class="btn btn-outline-danger" type="button">Cancel</button>
							</div>
							<div style="clear:both;"></div>
						</form>
                    </div> 
                </div>
            </div>
            <div style='clear:both;'></div>
        </div>
    </div>
</div>


<?php  $this->load->view('user/include/newfooter'); ?>

<?php 

        if(isset($getOneUser['state']))
		{
			?>
			<script> $("#sid").trigger("change"); </script>
			<?php
		}

?>

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