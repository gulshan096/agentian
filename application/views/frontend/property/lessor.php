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
        <div id="alert-container"></div>
        
        <div id="main-wrapper">
            
            <?php  $this->load->view('frontend/include/menu'); ?>
			<?php    $yes_no = array('1' => 'Yes', '0' => 'No'  ); ?>
			<?php  
			
			   $dimension_measure = array('Feet' => 'Feet', 'meter' => 'meter'  );
               $measure = array('Sqft' => 'Sqft', 'sqyard' => 'Sq Yard', 'acre'=> 'Acre'  );
			?>
            <!-- End Navigation -->
            <div class="clearfix"></div>
            <div id="app">
                <div class="page-title">
                    <div class="container text-center"><h4 class="text-white">Proerty For Lessor Out</h4></div>
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
                                                    <a href="<?php  echo base_url('post_property') ?>" class="text-success" >Go Back</a><span class="px-2" ><i class="fa fa-angle-double-right " aria-hidden="true"></i></span> <span style="color : #2540A2;" >Lease Out</span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="row">
										<div class="col-xl-12" >
											<div class="addform" id="addPost">
												<form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo !empty($getOneProperty)?site_url('user/property/updateproperty'):site_url('user/property/manageproperty'); ?>','#createForm1','#successMsg')">
													<input type="hidden" name="property_id" value="<?php echo !empty($getOneProperty['property_id'])?$getOneProperty['property_id']:''; ?>">
													<input type="hidden" name="request_from" value="4">
													<input type="hidden" name="pu_id" value="2" id="puid">
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
																		<label> Sell Type<span class="text-danger" >*</span></label>
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
																		<label> Listing By<span class="text-danger" >*</span></label>
																		<select class="form-control  listing_by" name="listing_by" >
																			<option value ="">Select</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label>Rera Approved <span class="text-danger" >*</span></label>
																		<select class="form-control " onchange="reraApproved()" name="rera_approved" required  id="rap">
																			<option value="">Select</option>
																			<?php
																			
																			if(!empty($yes_no))
																			{
																				foreach($yes_no as $key => $value)
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
																<div class="col-md-3 rn">
																	<div class="form-group mb-3">
																		<label>Rera No.<span class="text-danger" >*</span></label>
																		<input required   name="rera_no"   type="text" class="form-control mx-1"  />
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label>Project Name<span class="text-danger" >*</span></label>
																		<input name="project_name"  type="text" class="form-control mx-1" required />
																	</div>
																</div>
																<div class="row plot">
																	
																	<div class="col-md-3 ">
																		<div class="form-group mb-3">
																			<label>Plot Area </label>
																			<div class="d-flex">
																				<input value="<?php echo !empty($getOneProperty['max_plot_area'])?$getOneProperty['max_plot_area']:''; ?>" name="max_plot_area" type="text" class="form-control mx-1 num_check "  />
																				
																				<select name="measure" class="form-control">
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
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label>Rate (per sqft)<span class="text-danger" >*</span></label>
																			<input required   name="max_rate"  type="text" class="form-control mx-1 num_check"  />
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label>Price<span class="text-danger" >*</span></label>
																			<input required   name="max_budget"   type="text" class="form-control mx-1 num_check"  />
																		</div>
																	</div>
																	<div class="col-md-3  ">
																		<div class="form-group mb-3">
																			<label> Dimension <span class="text-danger" >*</span></label>
																			<div class="d-flex">
																				<input required  name="dimension_front" type="text" class="form-control mx-1 num_check " placeholder="Front" />
																				<input required  name="dimension_depth" type="text" class="form-control mx-1 num_check " placeholder="Depth" />
																				
																				<select name="dimension_measure" class="form-control" required>
																					<option value="meter">meter</option>
																					<option value="Feet">Feet</option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label> Amenities <span class="text-danger" >*</span></label>
																			<select class="form-control multi_select amenities" name="amenties[]" multiple required>
																				
																			</select>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label>Negotiable <span class="text-danger" >*</span></label>
																			<select class="form-control single_select" name="is_negotiable" required >
																				<option value="">Select</option>
																				<?php
																				
																				if(!empty($yes_no))
																				{
																				foreach($yes_no as $key => $value)
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
																<div class="row apartment">
																	
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label> Buildup Area</label>
																			<input name="max_buildup_area" type="text" class="num_check form-control mx-1 num_check"  />
																		</div>
																	</div>
																	<div class="col-md-3 c">
																		<div class="form-group mb-3">
																			<label> Carpet Area<span class="text-danger" >*</span></label>
																			<input  name="max_carpet_area"   type="text" class=" num_check form-control mx-1 num_check ct" required />
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label>Price<span class="text-danger" >*</span></label>
																			<input required   name="max_budget"   type="text" class="form-control mx-1 num_check"  />
																		</div>
																	</div>
																	<div class="col-md-3  ">
																		<div class="form-group mb-3">
																			<label> Bedroom <span class="text-danger" >*</span></label>
																			<div class="d-flex">
																				<input required value="<?php echo !empty($getOneProperty['max_bedroom'])?$getOneProperty['max_bedroom']:''; ?>" name="max_bedroom"    type="text" class="form-control mx-1 num_check rt"/>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3 r">
																		<div class="form-group mb-3">
																			<label> Bathroom<span class="text-danger" >*</span></label>
																			<input  name="max_bathroom"   type="text" class="num_check form-control mx-1 num_check rt"  required />
																		</div>
																	</div>
																	<div class="col-md-3 r">
																		<div class="form-group mb-3">
																			<label> Balcony <span class="text-danger" >*</span></label>
																			<input required  name="max_balcony"   type="text" class="num_check form-control mx-1 num_check rt"  />
																		</div>
																	</div>
																	
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label> Flooring<span class="text-danger" >*</span></label>
																			<select required class="form-control multi_select rt flooring"  name="flooring[]" multiple>
																				
																			</select>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label> Amenities <span class="text-danger" >*</span></label>
																			<select class="form-control multi_select amenities" name="amenties[]" multiple required>
																				
																			</select>
																		</div>
																	</div>
																	<div class="col-md-3 r">
																		<div class="form-group mb-3">
																			<label>Parking</label>
																			<input  name="max_open_parking"   type="text" class="num_check form-control mx-1 num_check rt" />
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label>Negotiable <span class="text-danger" >*</span></label>
																			<select class="form-control single_select" name="is_negotiable" required >
																				<option value="">Select</option>
																				<?php
																				
																				if(!empty($yes_no))
																				{
																					foreach($yes_no as $key => $value)
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
																
																<div class="row house">
																	
																	<div class="col-md-3 ">
																		<div class="form-group mb-3">
																			<label>Plot Area </label>
																			<div class="d-flex">
																				<input value="<?php echo !empty($getOneProperty['max_plot_area'])?$getOneProperty['max_plot_area']:''; ?>" name="max_plot_area" type="text" class="form-control mx-1 num_check "  />
																				
																				<select name="measure" class="form-control">
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
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label> Buildup Area</label>
																			<input name="max_buildup_area" type="text" class="num_check form-control mx-1 num_check"  />
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label>Price<span class="text-danger" >*</span></label>
																			<input required   name="max_budget"   type="text" class="form-control mx-1 num_check"  />
																		</div>
																	</div>
																	<div class="col-md-3  ">
																		<div class="form-group mb-3">
																			<label> Bedroom <span class="text-danger" >*</span></label>
																			<div class="d-flex">
																				<input required value="<?php echo !empty($getOneProperty['max_bedroom'])?$getOneProperty['max_bedroom']:''; ?>" name="max_bedroom"    type="text" class="form-control mx-1 num_check rt"/>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3 r">
																		<div class="form-group mb-3">
																			<label> Bathroom<span class="text-danger" >*</span></label>
																			<input  name="max_bathroom"   type="text" class="num_check form-control mx-1 num_check rt"  required />
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label> Flooring<span class="text-danger" >*</span></label>
																			<select required class="form-control multi_select rt flooring"  name="flooring[]" multiple>
																				
																			</select>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label> Amenities <span class="text-danger" >*</span></label>
																			<select class="form-control multi_select amenities" name="amenties[]" multiple required>
																				
																			</select>
																			
																		</div>
																	</div>
																	<div class="col-md-3  ">
																		<div class="form-group mb-3">
																			<label> Dimension <span class="text-danger" >*</span></label>
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
																	<div class="col-md-3 r">
																		<div class="form-group mb-3">
																			<label>Parking</label>
																			<input  name="max_open_parking"   type="text" class="num_check form-control mx-1 num_check rt" />
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label>Negotiable <span class="text-danger" >*</span></label>
																			<select class="form-control single_select" name="is_negotiable" required >
																				<option value="">Select</option>
																				<?php
																				
																				if(!empty($yes_no))
																				{
																					foreach($yes_no as $key => $value)
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
																<div class="row ossw">
																	
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label> Buildup Area</label>
																			<input name="max_buildup_area" type="text" class="num_check form-control mx-1 num_check"  />
																		</div>
																	</div>
																	<div class="col-md-3 c">
																		<div class="form-group mb-3">
																			<label> Carpet Area<span class="text-danger" >*</span></label>
																			<input  name="max_carpet_area"   type="text" class=" num_check form-control mx-1 num_check ct" required />
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label>Budget<span class="text-danger" >*</span></label>
																			<input required   name="max_budget"   type="text" class="form-control mx-1 num_check"  />
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label> Suitable For <span class="text-danger" >*</span></label>
																			<select class="form-control multi_select ct suitable_for" name="suitable_for[]" multiple required>
																				<option value ="">Select</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group mb-3">
																			<label> Hub <span class="text-danger" >*</span></label>
																			<select class="form-control multi_select ct hub" name="hub[]" multiple required>
																				<option value ="">Select</option>
																				
																			</select>
																		</div>
																	</div>
																	<div class="col-md-3  ">
																		<div class="form-group mb-3">
																			<label> Dimension <span class="text-danger" >*</span></label>
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
																	<div class="col-md-3 r">
																		<div class="form-group mb-3">
																			<label>Parking</label>
																			<input  name="max_open_parking"   type="text" class="num_check form-control mx-1 num_check rt" />
																		</div>
																	</div>
																</div>
																
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Facing <span class="text-danger" >*</span></label>
																		<select class="form-control multi_select facing" name="facing[]" multiple required>
																		
																		</select>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Property Status<span class="text-danger" >*</span></label>
																		<select class="form-control multi_select property_status"  name="property_status[]" multiple required>
																			
																		</select>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Description </label>
																		<input  name="description"  required type="text" class="form-control"  />
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
																		<label> Property State<span class="text-danger" >*</span></label>
																		<select required onchange="getCity();" class="form-control single_select " id="sid" name="property_state" required>
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
																		<label> Property City<span class="text-danger" >*</span></label>
																		<select required class="form-control  " id="cid" name="property_city" required>
																			<option value="">Select</option>
																		</select>
																	</div>
																</div>
																
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Pincode<span class="text-danger" >*</span></label>
																		<input required value="<?php echo !empty($propertyAddress['pincode'])?$propertyAddress['pincode']:''; ?>" name="pincode"   type="text" class="form-control mx-1 num_check" required />
																	</div>
																</div>

																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Office No/Floor<span class="text-danger" >*</span></label>
																		<input required value="<?php echo !empty($propertyAddress['map_location'])?$propertyAddress['map_location']:''; ?>" name="map_location"   type="text" class="form-control mx-1"  />
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label> Landmark<span class="text-danger" >*</span></label>
																		<input required value="<?php echo !empty($propertyAddress['locality'])?$propertyAddress['locality']:''; ?>" name="locality"   type="text" class="form-control mx-1"  />
																	</div>
																</div>
																
																 
																<div class="col-md-3">
																	<div class="form-group mb-3">
																		<label>Property Address<span class="text-danger" >*</span></label>
																		<input required value="<?php echo !empty($getOneProperty['property_address1'])?$getOneProperty['property_address1']:''; ?>" name="property_address1"  required type="text" class="form-control" required />
																	</div>
																</div>
													 
																<div style="clear:both;"></div>
															</div>
														</div>
													</div>
													
													<!----------Third------>
													<div class="col-12 my-3">
														<div class="d-sm-flex align-items-center justify-content-between p-2 rounded" style="background-color:#1B2C3F;">
															<h4 class="text-white">Property Images</h4>
															<div class="page-title-right">
																<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
																<i class="fa fa-plus-circle" aria-hidden="true"></i>
																</button>
															</div>
														</div>
													</div>
													<div class="card collapse" id="collapseExample3">
														<div class="card-body">
															<div class="row " >
																<div class="col-md-4">
																	<div class="form-group mb-3">
																	   (size 1900x500 *)
																	   <input type="file" name="property_image[]" class="form-control" multiple>
																		 <?php if(!empty($getOneProperty['property_images'])){ ?>
																		 <div class="gallery-img">
																			<?php foreach($getOneProperty['property_images'] as $imgRow){ ?>
																				<div class="img-box m-3" id="imgb_<?php echo $imgRow['id']; ?>">
																					<img src="<?php echo base_url(); ?><?php echo $imgRow['property_image']; ?>" class="img-fluid" width="100" height="100" >
																					<a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteImage('<?php echo $imgRow['id']; ?>')">delete</a>
																				</div>
																			<?php } ?>
																		 </div>
																		 <?php } ?>
																	</div>
																</div>
																
																<div style="clear:both;"></div>
															</div>
														</div>
													</div>
													
													<div class="col-md-12 mt-5">
														<div id="successMsg"></div>
														<button class="btn btn-success" type="submit" style="background-color:#0bb197;"><?php echo !empty($getFilterCategory['id'])?'Update':'Save'; ?></button>
														<button onclick="$('.addform').slideUp()" class="btn btn-outline-danger" type="button">Cancel</button>
													</div>
													<div style="clear:both;"></div>
												</form>
											</div>
											<div style='clear:both;'></div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
         
            <!-- ============================ Footer Start ================================== -->
            <?php  $this->load->view('frontend/include/footer'); ?>
			
        </body>
    </html>