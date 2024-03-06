<?php $this->load->view('user/include/header'); ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Property Avalable For</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Avalable For</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
              
                <div class="addform" id="addPost">
												<form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo !empty($getOneProperty)?site_url('user/property/updateproperty'):site_url('user/property/manageproperty'); ?>','#createForm1','#successMsg')">
													<input type="hidden" name="property_id" value="<?php echo !empty($getOneProperty['property_id'])?$getOneProperty['property_id']:''; ?>">
													<input type="hidden" name="request_from" value="1">
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
													<div class="card collapse" id="collapseExample">
														<div class="card-body">
															<div class="row " >
																 <div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Building Name</label>
																		<input value="<?php echo !empty($getOneProperty['building_name'])?$getOneProperty['building_name']:''; ?>" name="building_name"  required type="text" class="form-control" placeholder="" />
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Sell Type*</label>
																		<select class="form-control single_select" id="sell_type" name="sell_type" required>
																			<option value ="">Select</option>
																			<?php 
																			
																			  if(!empty($sell_type))
																			  {
																				  foreach($sell_type as $item)
																				  {
																					  if($item['id'] == $getOneProperty['sell_type'])
																					  {
																						 ?>
																						   <option value="<?php echo $item['id'] ?>" selected><?php echo $item['sub_category'] ?></option>
																						<?php  
																					  }
																					  else
																					  {
																						?>
																						   <option value="<?php echo $item['id'] ?>"><?php echo $item['sub_category'] ?></option>
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
																		<label> Property Type*</label>
																		<select class="form-control single_select" name="property_type" id="property_type" required>
																				<option value ="">Select</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Budget *</label>
																		<div class="d-flex">
																		   <input name="min_budget" value="<?php echo !empty($getOneProperty['min_budget'])?$getOneProperty['min_budget']:''; ?>"  type="text" class="form-control mx-1" placeholder="minimum" />
																		   <input name="max_budget" value="<?php echo !empty($getOneProperty['max_budget'])?$getOneProperty['max_budget']:''; ?>"  type="text" class="form-control mx-1" placeholder="maximum" />
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Zone Type *</label>
																		<select class="form-control multi_select" name="zone_type[]" multiple>
																		   <option value ="">Select</option>
																		   
																		   <?php 
																			
																			  if(!empty($zone_type))
																			  {
																				  foreach($zone_type as $item)
																				  {
																					 if(isset($getOneProperty['zone_type']) && !empty($getOneProperty['zone_type']))
																					 {
																						?>
																						   <option value="<?php echo $item['id'] ?>"  <?php echo in_array($item['id'],$getOneProperty['zone_type']) ? 'selected' : '' ;  ?>><?php echo $item['sub_category'] ?></option>   
																						
																						<?php 
																					 }
																					 else
																					 {
																						?>
																						   <option value="<?php echo $item['id'] ?>"><?php echo $item['sub_category'] ?></option>
																						   
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
																		<label> Property Status *</label>
																		<select class="form-control multi_select"  name="property_status[]" multiple>
																				<option value ="">Select</option>
																				<?php 
																			
																				  if(!empty($property_status))
																				  {
																					  foreach($property_status as $item)
																					  {
																						 if(isset($getOneProperty['property_status']) && !empty($getOneProperty['property_status']))
																						 {
																							?>
																							   <option value="<?php echo $item['id'] ?>"  <?php echo in_array($item['id'],$getOneProperty['property_status']) ? 'selected' : '' ;  ?>><?php echo $item['sub_category'] ?></option>   
																							<?php 
																						 }
																						 else
																						 {
																							?>
																							  <option value="<?php echo $item['id'] ?>"><?php echo $item['sub_category'] ?></option>
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
																		<label> Furnishing Status *</label>
																		<select class="form-control multi_select" name="furnishing_status[]" multiple>
																				<option value ="">Select</option>
																				<?php 
																			
																				  if(!empty($furnishing_status))
																				  {
																					  foreach($furnishing_status as $item)
																					  {
																						 if(isset($getOneProperty['furnishing_status']) && !empty($getOneProperty['furnishing_status']))
																						 {
																							?>
																							   <option value="<?php echo $item['id'] ?>"  <?php echo in_array($item['id'],$getOneProperty['furnishing_status']) ? 'selected' : '' ;  ?>><?php echo $item['sub_category'] ?></option>   
																							<?php 
																						 }
																						 else
																						 {
																							?>
																							   <option value="<?php echo $item['id'] ?>"><?php echo $item['sub_category'] ?></option>
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
																		<label> Property Age *</label>
																		<div class="d-flex">
																		   <input name="min_property_age" value="<?php echo !empty($getOneProperty['min_property_age'])?$getOneProperty['min_property_age']:''; ?>"   type="text" class="form-control mx-1" placeholder="minimum" />
																		   <input name="max_property_age" value="<?php echo !empty($getOneProperty['max_property_age'])?$getOneProperty['max_property_age']:''; ?>"   type="text" class="form-control mx-1" placeholder="maximum" />
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Buildup Area *</label>
																		<div class="d-flex">
																		   <input name="min_buildup_area" value="<?php echo !empty($getOneProperty['min_buildup_area'])?$getOneProperty['min_buildup_area']:''; ?>"   type="text" class="form-control mx-1" placeholder="minimum" />
																		   <input name="max_buildup_area" value="<?php echo !empty($getOneProperty['max_buildup_area'])?$getOneProperty['max_buildup_area']:''; ?>"   type="text" class="form-control mx-1" placeholder="maximum" />
																		</div>
																	
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Carpet Area *</label>
																		<div class="d-flex">
																		   <input name="min_carpet_area"  value="<?php echo !empty($getOneProperty['min_carpet_area'])?$getOneProperty['min_carpet_area']:''; ?>"  type="text" class="form-control mx-1" placeholder="minimum" />
																		   <input name="max_carpet_area"  value="<?php echo !empty($getOneProperty['max_carpet_area'])?$getOneProperty['max_carpet_area']:''; ?>"  type="text" class="form-control mx-1" placeholder="maximum" />
																		</div> 
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Suitable For *</label>
																		<select class="form-control multi_select" name="suitable_for[]" multiple>
																				<option value ="">Select</option>
																				<?php 
																			
																				  if(!empty($suitable_for))
																				  {
																					  foreach($suitable_for as $item)
																					  {
																						 if(isset($getOneProperty['suitable_for']) && !empty($getOneProperty['suitable_for']))
																						 {
																							?>
																							   <option value="<?php echo $item['id'] ?>"  <?php echo in_array($item['id'],$getOneProperty['suitable_for']) ? 'selected' : '' ;  ?>><?php echo $item['sub_category'] ?></option>   
																							<?php 
																						 }
																						 else
																						 {
																							?>
																							   <option value="<?php echo $item['id'] ?>"><?php echo $item['sub_category'] ?></option>
																							   
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
																		<label> Entrance Width *</label>
																		<div class="d-flex">
																		  <input name="min_entrance_width" value="<?php echo !empty($getOneProperty['min_entrance_width'])?$getOneProperty['min_entrance_width']:''; ?>"   type="text" class="form-control mx-1" placeholder="minimum" />
																		  <input name="max_entrance_width" value="<?php echo !empty($getOneProperty['max_entrance_width'])?$getOneProperty['max_entrance_width']:''; ?>"   type="text" class="form-control mx-1" placeholder="maximum" />
																		</div> 
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Ceiling Hight *</label>
																		<div class="d-flex">
																		  <input name="min_ceiling_hight" value="<?php echo !empty($getOneProperty['min_ceiling_hight'])?$getOneProperty['min_ceiling_hight']:''; ?>"   type="text" class="form-control mx-1" placeholder="minimum" />
																		  <input name="max_ceiling_hight" value="<?php echo !empty($getOneProperty['max_ceiling_hight'])?$getOneProperty['max_ceiling_hight']:''; ?>"   type="text" class="form-control mx-1" placeholder="maximum" />
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Located Near *</label>
																		
																		<input value="" name="located_near"  type="text" class="form-control" placeholder="" />
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> BHK *</label>
																		<select class="form-control multi_select" name="bhk[]" multiple>
																				<option value ="">Select</option>
																				<?php 
																			
																				  if(!empty($bhk))
																				  {
																					  foreach($bhk as $item)
																					  { 
																						 if(isset($getOneProperty['bhk']) && !empty($getOneProperty['bhk']))
																						 {
																							?>
																							   <option value="<?php echo $item['id'] ?>"  <?php echo in_array($item['id'],$getOneProperty['bhk']) ? 'selected' : '' ;  ?>><?php echo $item['sub_category'] ?></option>   
																							<?php 
																						 }
																						 else
																						 {
																							?>
																							   <option value="<?php echo $item['id'] ?>"><?php echo $item['sub_category'] ?></option>
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
																		<label> Floor *</label>
																		<div class="d-flex">
																		   <input name="min_floor" value="<?php echo !empty($getOneProperty['min_floor'])?$getOneProperty['min_floor']:''; ?>"  type="text" class="form-control mx-1" placeholder="minimum" />
																		   <input name="max_floor" value="<?php echo !empty($getOneProperty['max_floor'])?$getOneProperty['max_floor']:''; ?>"  type="text" class="form-control mx-1" placeholder="maximum" />
																		</div> 
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Bathroom *</label>
																		<div class="d-flex">
																		   <input name="min_bathroom" value="<?php echo !empty($getOneProperty['min_bathroom'])?$getOneProperty['min_bathroom']:''; ?>"   type="text" class="form-control mx-1" placeholder="minimum" />
																		   <input name="max_bathroom" value="<?php echo !empty($getOneProperty['max_bathroom'])?$getOneProperty['max_bathroom']:''; ?>"   type="text" class="form-control mx-1" placeholder="maximum" />
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Balcony *</label>
																		<div class="d-flex">
																		   <input name="min_balcony" value="<?php echo !empty($getOneProperty['min_balcony'])?$getOneProperty['min_balcony']:''; ?>"   type="text" class="form-control mx-1" placeholder="minimum" />
																		   <input name="max_balcony" value="<?php echo !empty($getOneProperty['max_balcony'])?$getOneProperty['max_balcony']:''; ?>"   type="text" class="form-control mx-1" placeholder="maximum" />
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Covered Parking *</label>
																		<div class="d-flex">
																		   <input name="min_covered_parking" value="<?php echo !empty($getOneProperty['min_covered_parking'])?$getOneProperty['min_covered_parking']:''; ?>"   type="text" class="form-control mx-1" placeholder="minimum" />
																		   <input name="max_covered_parking" value="<?php echo !empty($getOneProperty['max_covered_parking'])?$getOneProperty['max_covered_parking']:''; ?>"   type="text" class="form-control mx-1" placeholder="maximum" />
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Open Parking *</label>
																		<div class="d-flex">
																			<input name="min_open_parking"  value="<?php echo !empty($getOneProperty['min_open_parking'])?$getOneProperty['min_open_parking']:''; ?>"   type="text" class="form-control mx-1" placeholder="minimum" />
																			<input name="max_open_parking"  value="<?php echo !empty($getOneProperty['max_open_parking'])?$getOneProperty['max_open_parking']:''; ?>"   type="text" class="form-control mx-1" placeholder="maximum"/>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Hub *</label>
																		<select class="form-control multi_select" name="hub[]" multiple>
																				<option value ="">Select</option>
																				<?php 
																			
																				  if(!empty($hub))
																				  {
																					  foreach($hub as $item)
																					  {
																						 if(isset($getOneProperty['hub']) && !empty($getOneProperty['hub']))
																						 {
																							?>
																							   <option value="<?php echo $item['id'] ?>"  <?php echo in_array($item['id'],$getOneProperty['hub']) ? 'selected' : '' ;  ?>><?php echo $item['sub_category'] ?></option>   
																							<?php 
																						 }
																						 else
																						 {
																							?>
																							   <option value="<?php echo $item['id'] ?>"><?php echo $item['sub_category'] ?></option>
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
																		<label>Negotiable *</label>
																		<select class="form-control single_select" name="is_negotiable" >
																			<option value="">Select</option>
																			
																			<?php  
																			
																			   if(!empty($yes_no))
																			   {
																				   foreach($yes_no as $key => $value)
																				   {
																						 if(!empty($getOneProperty['is_negotiable']) && $getOneProperty['is_negotiable'] == $key)
																						 {
																							?>
																							   <option value="<?php echo $key ?>" selected><?php echo $value ?></option>   
																							<?php 
																						 }
																						 else
																						 {
																							?>
																							   <option value="<?php echo $key ?>"><?php echo $value ?></option>
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
																		<label>Tax & Govt. Charge include ? </label>
																		<select class="form-control single_select" name="is_include_tax">
																			<option value="">Select</option>
																			<?php  
																			
																			   if(!empty($yes_no))
																			   {
																				   foreach($yes_no as $key => $value)
																				   {
																						 if(!empty($getOneProperty['is_include_tax']) && $getOneProperty['is_include_tax'] == $key)
																						 {
																							?>
																							   <option value="<?php echo $key ?>" selected><?php echo $value ?></option>   
																							<?php 
																						 }
																						 else
																						 {
																							?>
																							   <option value="<?php echo $key ?>"><?php echo $value ?></option>
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
																		<label>DG & UPS Charge include ? </label>
																		<select class="form-control single_select" name="is_include_dg_ups">
																			<option value="">Select</option>
																			<?php  
																			
																			   if(!empty($yes_no))
																			   {
																				   foreach($yes_no as $key => $value)
																				   {
																						 if(!empty($getOneProperty['is_include_dg_ups']) && $getOneProperty['is_include_dg_ups'] == $key)
																						 {
																							?>
																							   <option value="<?php echo $key ?>" selected><?php echo $value ?></option>   
																							<?php 
																						 }
																						 else
																						 {
																							?>
																							   <option value="<?php echo $key ?>"><?php echo $value ?></option>
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
																		<label> Amenities *</label>
																		<select class="form-control multi_select" name="amenties[]" multiple>
																				
																				<?php 
																			
																				  if(!empty($amenities))
																				  {
																					  foreach($amenities as $item)
																					  {
																						if(isset($getOneProperty['amenities']) && !empty($getOneProperty['amenities']))
																						{
																						   ?>
																							 <option value="<?php echo $item['id'] ?>"  <?php echo in_array($item['id'],$getOneProperty['amenities']) ? 'selected' : '' ;  ?>><?php echo $item['sub_category'] ?></option>   
																						   <?php 
																						}
																						else
																						{
																							?>
																							 <option value="<?php echo $item['id'] ?>" ><?php echo $item['sub_category'] ?></option>   
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
																		<label> Description *</label>
																		<input value="<?php echo !empty($getOneProperty['description'])?$getOneProperty['description']:''; ?>" name="description"  required type="text" class="form-control" placeholder="" />
																	</div>
																</div>
																<div style="clear:both;"></div>
															</div>
														</div>
													</div>
													<!----------second------>
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
															<div class="row " >
																 <div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Property State *</label>
																		<select onchange="getCity()" class="form-control single_select " id="sid" name="property_state" required>
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
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Property City *</label>
																		<select  class="form-control single_select " id="cid" name="property_city" required>
																			<option value="">Select</option>
																
																		</select>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label>Property Area *</label>
																		<input required value="<?php echo !empty($getOneProperty['property_area'])?$getOneProperty['property_area']:''; ?>" name="property_area"  required type="text" class="form-control" placeholder="" />
																	</div>
																</div>
													 
																<div style="clear:both;"></div>
															</div>
														</div>
													</div>
													
													<div class="col-md-12 mt-5">
														<div id="successMsg"></div>
														<button class="btn btn-success" type="submit" style="background-color:#0bb197;"><?php echo !empty($getOneProperty['property_id'])?'Update':'Save'; ?></button>
														<button onclick="$('.addform').slideUp()" class="btn btn-outline-danger" type="button">Cancel</button>
													</div>
													<div style="clear:both;"></div>
												</form>
											</div>
            </div>
            <div style='clear:both;'></div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>


<?php  $this->load->view('user/include/newfooter'); ?>