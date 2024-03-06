    <!DOCTYPE html>
    <html lang="en">
		<head>
			<?php  $this->load->view('frontend/include/header'); ?>
			<style>
			.form-control{
				height: 40px !important;
				border: 1px solid #e1b056 !important;
			}
			.select2-container--default .select2-selection--multiple {
				border: 1px solid #e1b056 !important;
			}
			</style>
		</head>
		<body class="yellow-skin" >
			<div id="main-wrapper">
				<?php  $this->load->view('frontend/include/menu'); ?>
				<?php    $yes_no = array('1' => 'Yes', '0' => 'No'  ); ?>
				<?php  
			
				   $dimension_measure = array('Feet' => 'Feet', 'meter' => 'meter'  );
				   $measure = array('Sqft' => 'Sqft', 'sqyard' => 'Sq Yard', 'acre'=> 'Acre'  );
				?>
				<div id="app">
					<div class="page-title">
					   <div class="container text-center"><h4 class="text-white">Proerty For Lease</h4></div>
					</div>
					<!-- ============================ All Property ================================== -->
					<section class="gray">
						<div class="container">
							<div class="row">
								<div class="col-lg-12 col-md-12 list-layout">
									<div class="row justify-content-center">
										<div class="col-lg-12 col-md-12">
											<div class="item-sorting-box">
												<div class="item-sorting clearfix">
													<div class="left-column pull-left">
														<h4 class="m-0">
														<a href="<?php  echo base_url('post_property') ?>" class="text-success" >Go Back</a><span class="px-2" ><i class="fa fa-angle-double-right " aria-hidden="true"></i></span> <span style="color : #2540A2;" >Lease In</span>
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									<form id="createForm1"  onsubmit="return dorequest('<?php  echo site_url('user/property/manageproperty'); ?>','#createForm1','#successMsg')" enctype="multipart/form-data">
										<input type="hidden" name="request_from" value="6">
						                <input type="hidden" name="pu_id" value="1" id="puid">
										<div class="row">
											<div class="col-xl-12">
												 <div class="addform" id="addPost">
													 <div class="col-12 my-3">
														<div class="d-sm-flex align-items-center justify-content-between p-2 rounded" style="background-color:#1B2C3F;">
															<h4 class="text-white mb-sm-0">General Information</h4>
															<div class="page-title-right">
																<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
																	<i class="fa fa-plus-circle" aria-hidden="true"></i>
																</button>
															</div>
														</div>
													 </div>
												 </div>
											</div>
										</div>
										<div class="card collapse" id="collapseExample">
										   <div class="card-body">
											  <div class="row">
													  <div class="col-md-3">
														<div class="form-group mb-3">
															<label> Buy Type<span class="text-danger" >*</span></label>
															<select class="form-control" onchange="getSubCategory()" id="category" name="sell_type" required>
																<option value ="">Select</option>
																<?php
																					
																	  if(!empty($category))
																	  {
																		 foreach($category as $item)
																		 {
																			  if($item['id'] == $getOneProperty['id'])
																			  {
																					?>
																					<option value="<?php echo $item['id'] ?>" selected><?php echo $item['category'] ?></option>
																					<?php
																			  }
																			  else
																			  {
																					?>
																					<option value="<?php echo $item['id'] ?>"><?php echo $item['category'] ?></option>
																					<?php
																			  }
																		 }
																	  }
																?>
															</select>
														</div>
													  </div>
													  <div class="col-md-3">
														  <div class="form-group mb-3">
															 <label> Property Type<span class="text-danger" >*</span></label>
															 <select class="form-control" onchange="getChildCategory()" name="property_type" id="sub_cat" required>
																<option value ="">Select</option>
															 </select>
														  </div>
													  </div>
													  <div class="col-md-3">
															<div class="form-group mb-3">
																<label> Budget <span class="text-danger" >*</span></label>
																<div class="d-flex">
																	<input required id="getmin1"  name="min_budget"   type="text" class="form-control mx-1 num_check" placeholder="min" />
																	<input required id="getmax1"  name="max_budget"   type="text" class="form-control mx-1 num_check" placeholder="max" />
																</div>
															</div>
													  </div>
													  <div class="col-md-3">
															<div class="form-group mb-3">
																<label> Property Status<span class="text-danger" >*</span></label>
																<select class="form-control multi_select property_status"  name="property_status[]" multiple required>
																	<option value ="">Select</option>
																</select>
															</div>
													  </div>
													  <div class="col-md-3">
														     <div class="form-group mb-3">
																<label> Facing <span class="text-danger" >*</span></label>
																<select class="form-control multi_select facing" name="facing[]" multiple required>
																	<option value ="">Select</option>
																</select>
															</div>
													  </div>		
													  <div class="col-md-3">
														   <div class="form-group mb-3">
																<label> Description </label>
																<textarea name="description"  class="form-control" required></textarea>
														   </div>
													  </div>
												  </div>
												  <div class="row plot">
													 <div class="col-md-3 ">
														<div class="form-group mb-3">
															<label>Plot Area <span class="text-danger" >*</span></label>
															<div class="d-flex">
																<input required  name="min_plot_area" type="text" class="form-control mx-1 num_check " placeholder="min" />
																<input required  name="max_plot_area" type="text" class="form-control mx-1 num_check " placeholder="max" />
																
																<select name="measure" class="form-control" required>
																	<?php  
																						foreach($measure as $key => $value)
																						{
																							?>
																							 <option value="<?php echo $key ?>"><?php echo $value ?></option>
																							<?php												
																						}
																					?>
																</select>
															</div>
														</div>
													 </div>
												  </div>
												  <div class="row house">
													<div class="col-md-3 ">
														<div class="form-group mb-3">
															<label>Plot Area <span class="text-danger" >*</span></label>
															<div class="d-flex">
																<input required name="min_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="min" />
																<input required name="max_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="max" />
																
																<select required name="measure" class="form-control">
																	<?php  
																						foreach($measure as $key => $value)
																						{
																							?>
																							 <option value="<?php echo $key ?>"><?php echo $value ?></option>
																							<?php												
																						}
																					?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-3 ">
														<div class="form-group mb-3">
															<label>Builtup Area(sqft) <span class="text-danger" >*</span></label>
															<div class="d-flex">
																<input required  name="min_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="min" />
																<input required  name="max_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="max" />
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group mb-3">
															<label> Bedroom <span class="text-danger" >*</span></label>
															<div class="d-flex">
																<input required  name="min_bedroom"   type="text" class="form-control mx-1 num_check rt" placeholder="min" />
																<input required  name="max_bedroom"    type="text" class="form-control mx-1 num_check rt" placeholder="max" />
															</div>
														</div>
													</div>
													<div class="col-md-3  ">
														<div class="form-group mb-3">
															<label> Bathroom <span class="text-danger" >*</span></label>
															<div class="d-flex">
																<input required  name="min_bathroom"   type="text" class="form-control mx-1 num_check rt" placeholder="min" />
																<input required  name="max_bathroom"    type="text" class="form-control mx-1 num_check rt" placeholder="max" />
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group mb-3">
															<label> Flooring </label>
															<select  class="form-control   flooring multi_select"  name="flooring[]"  multiple>
																 <option value="">Select</option>
															</select>
														</div>
													</div>
													<div class="col-md-3 ">
														<div class="form-group mb-3">
															<label> Amenities </label>
															<select class="form-control  amenities multi_select" name="amenties[]" multiple >
																 <option value="">Select</option>
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group mb-3">
															<label> Dimension </label>
															<div class="d-flex">
																<input required  name="dimension_front" type="text" class="form-control mx-1 num_check " placeholder="Front" />
																<input required  name="dimension_depth" type="text" class="form-control mx-1 num_check " placeholder="Depth" />
																
																<select name="dimension_measure" class="form-control" required>
																	<?php
																				
																						if(!empty($dimension_measure))
																						{
																							foreach($dimension_measure as $key => $value)
																							{
																								?>
																								   <option value="<?php echo $key ?>"><?php echo $value ?></option>
																								<?php
																							}
																						}
																					?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group mb-3">
															<label> Parking </label>
															<div class="d-flex">
																<input name="min_open_parking"   type="text" class="form-control mx-1 num_check rt" placeholder="min" />
																<input name="max_open_parking"   type="text" class="form-control mx-1 num_check rt" placeholder="max"/>
															</div>
														</div>
													</div>
												</div>
												<div class="row apartment" >
													 <div class="col-md-3">
														<div class="form-group mb-3">
															<label>Builtup Area (sqft) <span class="text-danger" >*</span></label>
															<div class="d-flex">
																<input required  name="min_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="min" />
																<input required  name="max_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="max" />
															</div>
														</div>
													</div>
													<div class="col-md-3 ">
														<div class="form-group mb-3">
															<label> Carpet Area (sqft)</label>
															<div class="d-flex">
																<input name="min_carpet_area"    type="text" class="form-control mx-1 num_check ct" placeholder="min" />
																<input  name="max_carpet_area"    type="text" class="form-control mx-1 num_check ct" placeholder="max" />
															</div>
														</div>
													</div>
													<div class="col-md-3  ">
														<div class="form-group mb-3">
															<label> Dimension </label>
															<div class="d-flex">
																<input required  name="dimension_front" type="text" class="form-control mx-1 num_check " placeholder="Front" />
																<input required  name="dimension_depth" type="text" class="form-control mx-1 num_check " placeholder="Depth" />
																
																<select name="dimension_measure" class="form-control" required>
																	<?php
																				
																						if(!empty($dimension_measure))
																						{
																							foreach($dimension_measure as $key => $value)
																							{
																								?>
																								   <option value="<?php echo $key ?>"><?php echo $value ?></option>
																								<?php
																							}
																						}
																					?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-3  ">
														<div class="form-group mb-3">
															<label> Bedroom <span class="text-danger" >*</span></label>
															<div class="d-flex">
																<input required  name="min_bedroom"   type="text" class="form-control mx-1 num_check rt" placeholder="min" />
																<input required  name="max_bedroom"    type="text" class="form-control mx-1 num_check rt" placeholder="max" />
															</div>
														</div>
													</div>
													<div class="col-md-3  ">
														<div class="form-group mb-3">
															<label> Bathroom <span class="text-danger" >*</span></label>
															<div class="d-flex">
																<input required  name="min_bathroom"   type="text" class="form-control mx-1 num_check rt" placeholder="min" />
																<input required  name="max_bathroom"    type="text" class="form-control mx-1 num_check rt" placeholder="max" />
															</div>
														</div>
													</div>
													
													<div class="col-md-3 ">
														<div class="form-group mb-3">
															<label> Balcony </label>
															<div class="d-flex">
																<input  name="min_balcony"    type="text" class="form-control mx-1 num_check rt" placeholder="min" />
																<input  name="max_balcony"    type="text" class="form-control mx-1 num_check rt" placeholder="max" />
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group mb-3">
															<label> Flooring </label>
															<select  class="form-control   flooring multi_select"  name="flooring[]"  multiple>
																 <option value="">Select</option>
															</select>
														</div>
													</div>
													<div class="col-md-3 ">
														<div class="form-group mb-3">
															<label> Amenities </label>
															<select class="form-control  amenities multi_select" name="amenties[]" multiple >
																 <option value="">Select</option>
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group mb-3">
															<label> Parking </label>
															<div class="d-flex">
																<input  name="min_open_parking"    type="text" class="form-control mx-1 num_check rt" placeholder="min" />
																<input  name="max_open_parking"     type="text" class="form-control mx-1 num_check rt" placeholder="max"/>
															</div>
														</div>
													</div>
												</div>
												<div class="row ossw">
													<div class="col-md-3">
														<div class="form-group mb-3">
															<label>Builtup Area <span class="text-danger" >*</span></label>
															<div class="d-flex">
																<input required  name="min_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="min" />
																<input required  name="max_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="max" />
															</div>
														</div>
													</div>
													<div class="col-md-3 ">
														<div class="form-group mb-3">
															<label> Carpet Area (sqft)</label>
															<div class="d-flex">
																<input  name="min_carpet_area"    type="text" class="form-control mx-1 num_check ct" placeholder="min" />
																<input  name="max_carpet_area"    type="text" class="form-control mx-1 num_check ct" placeholder="max" />
															</div>
														</div>
													</div>
													<div class="col-md-3  ">
														<div class="form-group mb-3">
															<label> Dimension </label>
															<div class="d-flex">
																<input required  name="dimension_front" type="text" class="form-control mx-1 num_check " placeholder="Front" />
																<input required  name="dimension_depth" type="text" class="form-control mx-1 num_check " placeholder="Depth" />
																
																<select name="dimension_measure" class="form-control" required>
																	<?php
																				
																						if(!empty($dimension_measure))
																						{
																							foreach($dimension_measure as $key => $value)
																							{
																								?>
																								   <option value="<?php echo $key ?>"><?php echo $value ?></option>
																								<?php
																							}
																						}
																					?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group mb-3">
															<label> Suitable For <span class="text-danger" >*</span></label>
															<select class="form-control multi_select suitable_for" name="suitable_for[]" multiple required>
																<option value ="">Select</option>
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group mb-3">
															<label> Hub </label>
															<select class="form-control multi_select hub" name="hub[]" multiple >
																<option value ="">Select</option>
															</select>
														</div>
													</div>
												</div>
										   </div>
										</div>
										<div class="col-12 my-3">
											<div class="d-sm-flex align-items-center justify-content-between p-2 rounded" style="background-color:#1B2C3F;">
												<h4 class="text-white">Property Address</h4>
												<div class="page-title-right">
													<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
													<i class="fa fa-plus-circle" aria-hidden="true"></i>
													</button>
												</div>
											</div>
										</div>
										<div class="card collapse" id="collapseExample2">
										    <div class="card-body">
											     <div class="row">
												     <div class="col-md-4">
														<div class="form-group mb-3">
															<label> Property State <span class="text-danger" >*</span></label>
															<select onchange="getCity()" class="form-control " id="sid" name="property_state" required>
															      <option value ="">Select</option>
																			<?php 
																			
																			  if(!empty($state))
																			  {
																				  foreach($state as $item)
																				  {
																					if($item['id'] == $getOneProperty['property_state'])
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
													<div class="col-md-4">
														<div class="form-group mb-3">
															<label> Property City<span class="text-danger" >*</span></label>
															<select class="form-control" id="cid" name="property_city" required>
																<option value="">Select</option>
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group mb-3">
															<label>Property Location 1</label>
															<input name="property_address1"  type="text" class="form-control" >
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group mb-3">
															<label>Property Location 2</label>
															<input name="property_address2"  type="text" class="form-control" >
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group mb-3">
															<label>Property Location 3</label>
															<input name="property_address3"  type="text" class="form-control" >
														</div>
													</div>
												 </div>
											</div>
										</div>
										<div class="col-md-12 mt-5">
											<div id="successMsg"></div>
											<button class="btn btn-success" type="submit" style="background-color:#0bb197;">Save</button>
											<button onclick="$('.addform').slideUp()" class="btn btn-outline-danger" type="button">Cancel</button>
										</div>
									</form>	
								</div>
							</div>
						</div>
					</section>
				</div>
			 </div>
            <!-- ============================ Footer Start ================================== -->
            <?php  $this->load->view('frontend/include/footer'); ?>
			
        </body>
    </html>