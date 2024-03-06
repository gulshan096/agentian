<?php $this->load->view('admin/include/header'); ?>
<?php

$yes_no = array('1' => 'Yes', '0' => 'No'  );
$dimension_measure = array('Feet' => 'Feet', 'meter' => 'meter'  );
$measure = array('Sqft' => 'Sqft', 'sqyard' => 'Sq Yard', 'acre'=> 'Acre'  );
if(isset($getOneProperty))
{
	foreach($getOneProperty as $getOneProperty)
	{
	   
	}
?>
<style>
	#collapseExample, #collapseExample2{
		display:block;
	}
</style>
<?php
}
?>

<div class="page-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0">Manage Property</h4>
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item active">
								<a href="javascript: void(0);">Buy Property</a>
							</li>
							<li class="breadcrumb-item ">
								<a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/property/add">Property</a>
							</li>
							<li class="breadcrumb-item ">
								<a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a>
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12" >
				<div class="addform" id="addPost">
					<form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo !empty($getOneProperty)?site_url('administrator/property/updateproperty'):site_url('administrator/property/manageproperty'); ?>','#createForm1','#successMsg')">
						<input type="hidden" name="property_id" value="<?php echo !empty($getOneProperty['property_id'])?$getOneProperty['property_id']:''; ?>">
						<input type="hidden" name="request_from" value="1">
						<input type="hidden" name="pu_id" value="1" id="puid">
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
												<label> Buy Type<span class="text-danger" >*</span></label>
												<select onchange="getSubCategory()" class="form-control " id="category" name="sell_type" required>
													<option value ="">Select</option>
													<?php
													
													if(!empty($category))
													{
														foreach($category as $item)
														{
															if($item['id'] == $getOneProperty['sell_type'])
															{
																?>
																   <option value="<?php echo $item['id'] ?>" selected><?php echo $item['category'] ?></option>
																<?php
															}
															else
															{
																?>
																   <option value="<?php echo $item['id'] ?>" ><?php echo $item['category'] ?></option>
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
												<input id="scid" type="hidden" value="<?php  echo !empty($getOneProperty['property_type'])?$getOneProperty['property_type']:''; ?>">
												<label> Property Type<span class="text-danger" >*</span></label>
												<select onchange="getChildCategory()" class="form-control" name="property_type" id="sub_cat" required>
													<option value="">Select</option>
												</select>
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Budget <span class="text-danger" >*</span></label>
												<div class="d-flex">
													<input required id="getmin1" required value="<?php echo !empty($getOneProperty['min_budget'])?$getOneProperty['min_budget']:''; ?>" name="min_budget"   type="text" class="form-control mx-1 num_check" placeholder="min" />
													<input required id="getmax1" required value="<?php echo !empty($getOneProperty['max_budget'])?$getOneProperty['max_budget']:''; ?>" name="max_budget"   type="text" class="form-control mx-1 num_check" placeholder="max" />
												</div>
											</div>
										</div>
										<div class="col-md-3 ">
											<div class="form-group mb-3">
												<label> Property Status <span class="text-danger" >*</span></label>
												     <?php  
												            
												         if(isset($getOneProperty['property_status']) && !empty($getOneProperty['property_status']))
														 {
															 $property_status = array();
															   foreach($getOneProperty['property_status'] as $k => $v)
															   {
																   $property_status[] =  $v;
															   }
                                                               $final =  implode(',',$property_status); 
                                                            ?>
                                                                <input id="getPropertyStatus"  type="hidden" value="<?php  echo $final ?>">
                                                            <?php															
														 }															 
											
												      ?>
												<select class="form-control multiple property_status"  name="property_status[]" multiple required>
													<option value ="">Select</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row plot">
										<div class="col-md-3 ">
											<div class="form-group mb-3">
												<label>Plot Area <span class="text-danger" >*</span></label>
												<div class="d-flex">
													<input required value="<?php echo !empty($getOneProperty['min_plot_area'])?$getOneProperty['min_plot_area']:''; ?>" name="min_plot_area" type="text" class="form-control mx-1 num_check " placeholder="min" />
													<input required value="<?php echo !empty($getOneProperty['max_plot_area'])?$getOneProperty['max_plot_area']:''; ?>" name="max_plot_area" type="text" class="form-control mx-1 num_check " placeholder="max" />
													
													<select name="measure" class="form-control" required>
														<?php  
														 
															foreach($measure as $key => $value)
															{
																if(isset($getOneProperty['measure']) == $key   && $getOneProperty['measure'] !== null)
																{
																	?>
																	   <option value="<?php echo $key ?>"  selected><?php echo $value ?></option>
																	<?php
																}
																else
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
									</div>
									
									<div class="row house">
										<div class="col-md-3 ">
											<div class="form-group mb-3">
												<label>Plot Area <span class="text-danger" >*</span></label>
												<div class="d-flex">
													<input required value="<?php echo !empty($getOneProperty['min_plot_area'])?$getOneProperty['min_buildup_area']:''; ?>" name="min_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="min" />
													<input required value="<?php echo !empty($getOneProperty['max_plot_area'])?$getOneProperty['max_buildup_area']:''; ?>" name="max_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="max" />
													
													<select required name="measure" class="form-control">
														<?php  
														 
															foreach($measure as $key => $value)
															{
																if(isset($getOneProperty['measure']) == $key   && $getOneProperty['measure'] !== null)
																{
																	?>
																	   <option value="<?php echo $key ?>"  selected><?php echo $value ?></option>
																	<?php
																}
																else
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
										<div class="col-md-3 ">
											<div class="form-group mb-3">
												<label>Builtup Area(sqft) <span class="text-danger" >*</span></label>
												<div class="d-flex">
													<input required value="<?php echo !empty($getOneProperty['min_buildup_area'])?$getOneProperty['min_buildup_area']:''; ?>" name="min_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="min" />
													<input required value="<?php echo !empty($getOneProperty['max_buildup_area'])?$getOneProperty['max_buildup_area']:''; ?>" name="max_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="max" />
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Bedroom <span class="text-danger" >*</span></label>
												<div class="d-flex">
													<input required value="<?php echo !empty($getOneProperty['min_bedroom'])?$getOneProperty['min_bedroom']:''; ?>" name="min_bedroom"   type="text" class="form-control mx-1 num_check rt" placeholder="min" />
													<input required value="<?php echo !empty($getOneProperty['max_bedroom'])?$getOneProperty['max_bedroom']:''; ?>" name="max_bedroom"    type="text" class="form-control mx-1 num_check rt" placeholder="max" />
												</div>
											</div>
										</div>
										<div class="col-md-3  ">
											<div class="form-group mb-3">
												<label> Bathroom <span class="text-danger" >*</span></label>
												<div class="d-flex">
													<input required value="<?php echo !empty($getOneProperty['min_bathroom'])?$getOneProperty['min_bathroom']:''; ?>" name="min_bathroom"   type="text" class="form-control mx-1 num_check rt" placeholder="min" />
													<input required value="<?php echo !empty($getOneProperty['max_bathroom'])?$getOneProperty['max_bathroom']:''; ?>" name="max_bathroom"    type="text" class="form-control mx-1 num_check rt" placeholder="max" />
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Flooring </label>
												     <?php  
												            
												         if(isset($getOneProperty['flooring']) && !empty($getOneProperty['flooring']))
														 {
															 $flooring = array();
															   foreach($getOneProperty['flooring'] as $k => $v)
															   {
																   $flooring[] =  $v;
															   }
                                                                $final =  implode(',',$flooring); 
                                                            ?>
                                                                <input id="getFlooringh"  type="hidden" value="<?php  echo $final ?>">
                                                            <?php															
														 }															 
											
												      ?>
												
												<select  class="form-control   flooring multiple"  name="flooring[]"  multiple>
													 <option value="">Select</option>
												</select>
											</div>
										</div>
										<div class="col-md-3 ">
											<div class="form-group mb-3">
												<label> Amenities </label>
												      <?php  
												            
												         if(isset($getOneProperty['amenities']) && !empty($getOneProperty['amenities']))
														 {
															 $amenities = array();
															   foreach($getOneProperty['amenities'] as $k => $v)
															   {
																   $amenities[] =  $v;
															   }
                                                                $final =  implode(',',$amenities); 
                                                            ?>
                                                                <input id="getAmenitiesH"  type="hidden" value="<?php  echo $final ?>">
                                                            <?php															
														 }															 
											
												      ?>
												<select class="form-control  amenities multiple" name="amenties[]" multiple >
													 <option value="">Select</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Dimension </label>
												<div class="d-flex">
													<input value="<?php echo !empty($getOneProperty['dimension_front'])?$getOneProperty['dimension_front']:''; ?>" required  name="dimension_front" type="text" class="form-control mx-1 num_check " placeholder="Front" />
													<input value="<?php echo !empty($getOneProperty['dimension_depth'])?$getOneProperty['dimension_depth']:''; ?>" required  name="dimension_depth" type="text" class="form-control mx-1 num_check " placeholder="Depth" />														
													<select name="dimension_measure" class="form-control" required>
														
														<?php  
														 
														foreach($dimension_measure as $key => $value)
														{
															if(isset($getOneProperty['dimension_measure']) == $key   && $getOneProperty['dimension_measure'] !== null)
															{
																?>
																   <option value="<?php echo $key ?>"  selected><?php echo $value ?></option>
																<?php
															}
															else
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
													<input value="<?php echo !empty($getOneProperty['min_open_parking'])?$getOneProperty['min_open_parking']:''; ?>" name="min_open_parking"    type="text" class="form-control mx-1 num_check rt" placeholder="min" />
													<input value="<?php echo !empty($getOneProperty['max_open_parking'])?$getOneProperty['max_open_parking']:''; ?>" name="max_open_parking"     type="text" class="form-control mx-1 num_check rt" placeholder="max"/>
												</div>
											</div>
										</div>
									</div>
									<div class="row apartment">
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label>Builtup Area (sqft) <span class="text-danger" >*</span></label>
												<div class="d-flex">
													<input required value="<?php echo !empty($getOneProperty['min_buildup_area'])?$getOneProperty['min_buildup_area']:''; ?>" name="min_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="min" />
													<input required value="<?php echo !empty($getOneProperty['max_buildup_area'])?$getOneProperty['max_buildup_area']:''; ?>" name="max_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="max" />
												</div>
											</div>
										</div>
										<div class="col-md-3 ">
											<div class="form-group mb-3">
												<label> Carpet Area (sqft)</label>
												<div class="d-flex">
													<input value="<?php echo !empty($getOneProperty['min_carpet_area'])?$getOneProperty['min_carpet_area']:''; ?>" name="min_carpet_area"    type="text" class="form-control mx-1 num_check ct" placeholder="min" />
													<input value="<?php echo !empty($getOneProperty['max_carpet_area'])?$getOneProperty['max_carpet_area']:''; ?>" name="max_carpet_area"    type="text" class="form-control mx-1 num_check ct" placeholder="max" />
												</div>
											</div>
										</div>
										<div class="col-md-3  ">
											<div class="form-group mb-3">
												<label> Dimension </label>
												<div class="d-flex">
													<input value="<?php echo !empty($getOneProperty['dimension_front'])?$getOneProperty['dimension_front']:''; ?>" required  name="dimension_front" type="text" class="form-control mx-1 num_check " placeholder="Front" />
													<input value="<?php echo !empty($getOneProperty['dimension_depth'])?$getOneProperty['dimension_depth']:''; ?>" required  name="dimension_depth" type="text" class="form-control mx-1 num_check " placeholder="Depth" />														
													<select name="dimension_measure" class="form-control" required>
														
														<?php  
														 
														foreach($dimension_measure as $key => $value)
														{
															if(isset($getOneProperty['dimension_measure']) == $key   && $getOneProperty['dimension_measure'] !== null)
															{
																?>
																   <option value="<?php echo $key ?>"  selected><?php echo $value ?></option>
																<?php
															}
															else
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
													<input required value="<?php echo !empty($getOneProperty['min_bedroom'])?$getOneProperty['min_bedroom']:''; ?>" name="min_bedroom"   type="text" class="form-control mx-1 num_check rt" placeholder="min" />
													<input required value="<?php echo !empty($getOneProperty['max_bedroom'])?$getOneProperty['max_bedroom']:''; ?>" name="max_bedroom"    type="text" class="form-control mx-1 num_check rt" placeholder="max" />
												</div>
											</div>
										</div>
										<div class="col-md-3  ">
											<div class="form-group mb-3">
												<label> Bathroom <span class="text-danger" >*</span></label>
												<div class="d-flex">
													<input required value="<?php echo !empty($getOneProperty['min_bathroom'])?$getOneProperty['min_bathroom']:''; ?>" name="min_bathroom"   type="text" class="form-control mx-1 num_check rt" placeholder="min" />
													<input required value="<?php echo !empty($getOneProperty['max_bathroom'])?$getOneProperty['max_bathroom']:''; ?>" name="max_bathroom"    type="text" class="form-control mx-1 num_check rt" placeholder="max" />
												</div>
											</div>
										</div>
										
										<div class="col-md-3 ">
											<div class="form-group mb-3">
												<label> Balcony </label>
												<div class="d-flex">
													<input value="<?php echo !empty($getOneProperty['min_balcony'])?$getOneProperty['min_balcony']:''; ?>" name="min_balcony"    type="text" class="form-control mx-1 num_check rt" placeholder="min" />
													<input value="<?php echo !empty($getOneProperty['max_balcony'])?$getOneProperty['max_balcony']:''; ?>" name="max_balcony"    type="text" class="form-control mx-1 num_check rt" placeholder="max" />
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Flooring </label>
												     <?php  
												            
												         if(isset($getOneProperty['flooring']) && !empty($getOneProperty['flooring']))
														 {
															   $flooring = array();
															   foreach($getOneProperty['flooring'] as $k => $v)
															   {
																    $flooring[] =  $v;
															
                                                               }
															   
															     $final =  implode(',',$flooring); 
															   
																 ?>
                                                                   <input type="hidden" id="getFlooringA" value="<?php echo $final ?>"> 
                                                                <?php	  
															
                                                            														
														 }															 
											
												      ?>
												
												<select  class="form-control   flooring multiple"  name="flooring[]"  multiple>
													 <option value="">Select</option>
												</select>
											</div>
										</div>
										<div class="col-md-3 ">
											<div class="form-group mb-3">
												<label> Amenities </label>
												      <?php  
												            
												         if(isset($getOneProperty['amenities']) && !empty($getOneProperty['amenities']))
														 {
															 $amenities = array();
															   foreach($getOneProperty['amenities'] as $k => $v)
															   {
																   $amenities[] =  $v;
															   }
                                                              $final =  implode(',',$amenities); 
                                                            ?>
                                                                <input id="getAmenitiesA"  type="hidden" value="<?php  echo $final ?>">
                                                            <?php															
														 }															 
											
												      ?>
												<select class="form-control  amenities multiple" name="amenties[]" multiple >
													 <option value="">Select</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Parking </label>
												<div class="d-flex">
													<input value="<?php echo !empty($getOneProperty['min_open_parking'])?$getOneProperty['min_open_parking']:''; ?>" name="min_open_parking"    type="text" class="form-control mx-1 num_check rt" placeholder="min" />
													<input value="<?php echo !empty($getOneProperty['max_open_parking'])?$getOneProperty['max_open_parking']:''; ?>" name="max_open_parking"     type="text" class="form-control mx-1 num_check rt" placeholder="max"/>
												</div>
											</div>
										</div>
									</div>
									<div class="row ossw">
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label>Builtup Area <span class="text-danger" >*</span></label>
												<div class="d-flex">
													<input required value="<?php echo !empty($getOneProperty['min_buildup_area'])?$getOneProperty['min_buildup_area']:''; ?>" name="min_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="min" />
													<input required value="<?php echo !empty($getOneProperty['max_buildup_area'])?$getOneProperty['max_buildup_area']:''; ?>" name="max_buildup_area" type="text" class="form-control mx-1 num_check " placeholder="max" />
												</div>
											</div>
										</div>
										<div class="col-md-3 ">
											<div class="form-group mb-3">
												<label> Carpet Area (sqft)</label>
												<div class="d-flex">
													<input value="<?php echo !empty($getOneProperty['min_carpet_area'])?$getOneProperty['min_carpet_area']:''; ?>" name="min_carpet_area"    type="text" class="form-control mx-1 num_check ct" placeholder="min" />
													<input value="<?php echo !empty($getOneProperty['max_carpet_area'])?$getOneProperty['max_carpet_area']:''; ?>" name="max_carpet_area"    type="text" class="form-control mx-1 num_check ct" placeholder="max" />
												</div>
											</div>
										</div>
										<div class="col-md-3  ">
											<div class="form-group mb-3">
												<label> Dimension </label>
												<div class="d-flex">
													<input value="<?php echo !empty($getOneProperty['dimension_front'])?$getOneProperty['dimension_front']:''; ?>" required  name="dimension_front" type="text" class="form-control mx-1 num_check " placeholder="Front" />
													<input value="<?php echo !empty($getOneProperty['dimension_depth'])?$getOneProperty['dimension_depth']:''; ?>" required  name="dimension_depth" type="text" class="form-control mx-1 num_check " placeholder="Depth" />														
													<select name="dimension_measure" class="form-control" required>
														
														<?php  
														 
														foreach($dimension_measure as $key => $value)
														{
															if(isset($getOneProperty['dimension_measure']) == $key   && $getOneProperty['dimension_measure'] !== null)
															{
																?>
																   <option value="<?php echo $key ?>"  selected><?php echo $value ?></option>
																<?php
															}
															else
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
												    <?php  
												            
												         if(isset($getOneProperty['suitable_for']) && !empty($getOneProperty['suitable_for']))
														 {
															 $suitable_for = array();
															   foreach($getOneProperty['suitable_for'] as $k => $v)
															   {
																   $suitable_for[] =  $v;
															   }
                                                                $final =  implode(',',$suitable_for); 
                                                            ?>
                                                                <input id="getSuitableFor"  type="hidden" value="<?php  echo $final ?>">
                                                            <?php															
														 }															 
											
												      ?>
												<select class="form-control multiple suitable_for" name="suitable_for[]" multiple required>
													<option value ="">Select</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Hub </label>
												
												      <?php  
												            
												         if(isset($getOneProperty['hub']) && !empty($getOneProperty['hub']))
														 {
															 $hub = array();
															   foreach($getOneProperty['hub'] as $k => $v)
															   {
																   $hub[] =  $v;
															   }
                                                                $final =  implode(',',$hub); 
                                                            ?>
                                                                <input id="getHub"  type="hidden" value="<?php  echo $final ?>">
                                                            <?php															
														 }															 
											
												      ?>
												<select class="form-control multiple hub" name="hub[]" multiple >
													<option value ="">Select</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3 ">
											<div class="form-group mb-3">
												<label> Facing </label>
												     <?php  
												            
												         if(isset($getOneProperty['facing']) && !empty($getOneProperty['facing']))
														 {
															 $facing = array();
															   foreach($getOneProperty['facing'] as $k => $v)
															   {
																   $facing[] =  $v;
															   }
                                                                $final =  implode(',',$facing); 
                                                            ?>
                                                                <input id="getFacing"  type="hidden" value="<?php  echo $final ?>">
                                                            <?php															
														 }															 
											
												      ?>
												<select class="form-control multiple facing" name="facing[]" multiple>
													<option value="">Select</option>
												</select>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group mb-3">
												<label> Description</label>
												<textarea name="description" class="form-control"> <?php echo !empty($getOneProperty['description'])?$getOneProperty['description']:'';  ?> </textarea>
											</div>
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
									<div class="col-md-4">
										<div class="form-group mb-3">
											<label> Property State <span class="text-danger" >*</span></label>
											<select onchange="getCity()" class="form-control" id="sid" name="property_state" required>
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
											<label> Property City <span class="text-danger" >*</span></label>
											<input type="hidden" value="<?php  echo !empty($getOneProperty['property_city'])?$getOneProperty['property_city']:'' ?>" id="pc">
											<select  class="form-control  " id="cid" name="property_city" required>
												<option value="">Select</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group mb-3">
											<label>Property Location 1</label>
											<input  value="<?php echo !empty($getOneProperty['property_address1'])?$getOneProperty['property_address1']:''; ?>"  name="property_address1"  type="text" class="form-control" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group mb-3">
											<label>Property Location 2</label>
											<input  value="<?php echo !empty($getOneProperty['property_address2'])?$getOneProperty['property_address2']:''; ?>"  name="property_address2"  type="text" class="form-control" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group mb-3">
											<label>Property Location 3</label>
											<input  value="<?php echo !empty($getOneProperty['property_address3'])?$getOneProperty['property_address3']:''; ?>"  name="property_address3"  type="text" class="form-control" >
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
				<div style='clear:both;'></div>
			</div>
		</div>
	</div>
</div>
<?php  $this->load->view('admin/include/newfooter'); ?>

	
	
	<?php
	
		if(isset($getOneProperty['property_state']))
		{
			?>
			<script> $("#sid").trigger("change"); </script>
			<?php
		}


		if(isset($getOneProperty['sell_type']))
		{
			?>
				<script> $("#category").trigger("change"); </script>
			<?php
		}

	?>