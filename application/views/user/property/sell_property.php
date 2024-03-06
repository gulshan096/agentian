<?php $this->load->view('user/include/header'); ?>
<style>
.dt{
	border: none;
    outline: none;
}
</style>
<?php  
  $yes_no = array('1' =>'Yes','0' => 'No');
  $dimension_measure = array('Feet' => 'Feet', 'meter' => 'meter'  );
   $measure = array('Sqft' => 'Sqft', 'sqyard' => 'Sq Yard', 'acre'=> 'Acre'  );
   if(isset($getOneProperty))
   {
	  foreach($getOneProperty as $getOneProperty)
	  {}
	   ?>
	     <style>
		  #collapseExample, #collapseExample2, #collapseExample3{
			  display:block;
		  }
		 </style>
	   <?php
   }
   
   if(isset($getOneProperty) && !empty($getOneProperty['propertyAddress']))
   {
		foreach($getOneProperty['propertyAddress'] as $propertyAddress)
		{
							    
	    }											  
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
							   <a href="javascript: void(0);">Sell</a>
							</li>
                            <li class="breadcrumb-item ">
							   <a href="<?php echo base_url('user/my_listing/available_for'); ?>">Back</a>
							</li>
							
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
			<div class="col-xl-12" >
				<div class="addform" id="addPost">
					<form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo !empty($getOneProperty)?site_url('user/property/updateproperty'):site_url('user/property/manageproperty'); ?>','#createForm1','#successMsg')">
						<input type="hidden" name="property_id" value="<?php echo !empty($getOneProperty['property_id'])?$getOneProperty['property_id']:''; ?>">
						<input type="hidden" name="request_from" value="2">
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
									<div class="row">
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Sell Type<span class="text-danger" >*</span></label>
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
												<input id="scid" type="hidden" value="<?php  echo $getOneProperty['property_type'] ?>">
												<label> Property Type<span class="text-danger" >*</span></label>
												<select onchange="getChildCategory()" class="form-control" name="property_type" id="sub_cat" required>
													<option value="">Select</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Listing By <span class="text-danger" >*</span></label>       
                                                <input id="getListingBy"  type="hidden" value="<?php  echo isset($getOneProperty['listing_by'])?$getOneProperty['listing_by']:''; ?>">
												<select class="form-control listing_by multiple"  name="listing_by"  multiple required>
							                       <option value="">Select</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Facing <span class="text-danger" >*</span></label>
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
												<select class="form-control multiple facing" name="facing[]" multiple required>
													<option value="">Select</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Property Status<span class="text-danger" >*</span></label>
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
													<option value="">Select</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label>Rera Approved <span class="text-danger" >*</span></label>
												<select class="form-control " onchange="reraApproved()" name="rera_approved"  id="rap" required>
													<option value="">Select</option>
													<?php
													
													
													foreach($yes_no as $key => $value)
													{
														if(isset($getOneProperty['rera_approved']) == $key   && $getOneProperty['rera_approved'] !== null)
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
										<div class="col-md-3 rn">
											<div class="form-group mb-3">
												<label>Rera No.<span class="text-danger" >*</span></label>
												<input name="rera_no"  value="<?php  echo isset($getOneProperty['rera_no'])?$getOneProperty['rera_no']:''; ?>" type="text" class="form-control mx-1"  required/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label>Project Name</label>
												<input name="project_name"  value="<?php  echo isset($getOneProperty['project_name'])?$getOneProperty['project_name']:''; ?>" type="text" class="form-control mx-1" />
											</div>
										</div>
									</div>
									<div class="row plot">
					
										<div class="col-md-3 ">
											<div class="form-group mb-3">
												<label>Plot Area <span class="text-danger" >*</span> </label>
												<div class="d-flex">
													<input required value="<?php echo !empty($getOneProperty['max_plot_area'])?$getOneProperty['max_plot_area']:''; ?>" name="max_plot_area" type="text" class="form-control mx-1 num_check "  />
													
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
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label>Rate (per sqft)<span class="text-danger" >*</span></label>
												<input  value="<?php  echo isset($getOneProperty['max_rate'])?$getOneProperty['max_rate']:''; ?>"    name="max_rate"  type="text" class="form-control mx-1 num_check" required />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label>Price<span class="text-danger" >*</span></label>
												<input value="<?php  echo isset($getOneProperty['max_budget'])?$getOneProperty['max_budget']:''; ?>"  required   name="max_budget"   type="text" class="form-control mx-1 num_check"  />
											</div>
										</div>
										<div class="col-md-3  ">
											<div class="form-group mb-3">
												<label> Dimension <span class="text-danger" >*</span></label>
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
												<select class="form-control multiple amenities" name="amenties[]" multiple >
													<option value=""></option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label>Negotiable </label>
												<select class="form-control "  name="is_negotiable" >
													<option value="">Select</option>
													<?php
													
														foreach($yes_no as $key => $value)
														{
															if(isset($getOneProperty['is_negotiable']) == $key   && $getOneProperty['is_negotiable'] !== null)
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
									<div class="row apartment">
										
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Builtup Area (sqft)<span class="text-danger" >*</span></label>
												<input value="<?php echo !empty($getOneProperty['max_buildup_area'])?$getOneProperty['max_buildup_area']:''; ?>" name="max_buildup_area" type="text" class="num_check form-control mx-1 num_check"  required />
											</div>
										</div>
										<div class="col-md-3 c">
											<div class="form-group mb-3">
												<label> Carpet Area (sqft)<span class="text-danger" >*</span></label>
												<input value="<?php echo !empty($getOneProperty['max_carpet_area'])?$getOneProperty['max_carpet_area']:''; ?>"  name="max_carpet_area"   type="text" class=" num_check form-control mx-1 num_check ct" required />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label>Price<span class="text-danger" >*</span></label>
												<input value="<?php echo !empty($getOneProperty['max_budget'])?$getOneProperty['max_budget']:''; ?>" required   name="max_budget"   type="text" class="form-control mx-1 num_check"  required/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Bedroom <span class="text-danger" >*</span></label>
												<div class="d-flex">
													<input required value="<?php echo !empty($getOneProperty['max_bedroom'])?$getOneProperty['max_bedroom']:''; ?>" name="max_bedroom"    type="text" class="form-control mx-1 num_check rt"/>
												</div>
											</div>
										</div>
										<div class="col-md-3 r">
											<div class="form-group mb-3">
												<label> Bathroom </label>
												<input value="<?php echo !empty($getOneProperty['max_bathroom'])?$getOneProperty['max_bathroom']:''; ?>" name="max_bathroom" type="text" class="num_check form-control mx-1 num_check rt" />
											</div>
										</div>
										<div class="col-md-3 r">
											<div class="form-group mb-3">
												<label> Balcony </label>
												<input value="<?php echo !empty($getOneProperty['max_balcony'])?$getOneProperty['max_balcony']:''; ?>" name="max_balcony" type="text" class="num_check form-control mx-1 num_check rt" />
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
                                                                <input id="getFlooringA"  type="hidden" value="<?php  echo $final ?>">
                                                            <?php															
														 }															 
											
												      ?>
												<select class="form-control multiple flooring"  name="flooring[]" multiple>
							                       <option value="">Select</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
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
												<select class="form-control multiple amenities" name="amenties[]" multiple >
													<option value="">Select</option>
												</select>
											</div>
										</div>
										<div class="col-md-3 r">
											<div class="form-group mb-3">
												<label>Parking</label>
												<input value="<?php echo !empty($getOneProperty['max_open_parking'])?$getOneProperty['max_open_parking']:''; ?>"  name="max_open_parking"   type="text" class="num_check form-control mx-1 num_check rt" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label>Negotiable </label>
												<select class="form-control " name="is_negotiable" >
													<option value="">Select</option>
													<?php
													
														foreach($yes_no as $key => $value)
														{
															if(isset($getOneProperty['is_negotiable']) == $key   && $getOneProperty['is_negotiable'] !== null)
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
									
									<div class="row house">
										<div class="col-md-3 ">
											<div class="form-group mb-3">
												<label>Plot Area <span class="text-danger" >*</span></label>
												<div class="d-flex">
													<input required value="<?php echo !empty($getOneProperty['max_plot_area'])?$getOneProperty['max_plot_area']:''; ?>" name="max_plot_area" type="text" class="form-control mx-1 num_check "  />
													<select name="measure" class="form-control">
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
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Builtup Area (sqft)<span class="text-danger" >*</span></label>
												<input value="<?php echo !empty($getOneProperty['max_buildup_area'])?$getOneProperty['max_buildup_area']:''; ?>" required name="max_buildup_area" type="text" class="num_check form-control mx-1 num_check"  />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label>Price<span class="text-danger" >*</span></label>
												<input value="<?php echo !empty($getOneProperty['max_budget'])?$getOneProperty['max_budget']:''; ?>" required   name="max_budget"   type="text" class="form-control mx-1 num_check"  />
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
												<label> Bathroom</label>
												<input value="<?php echo !empty($getOneProperty['max_bathroom'])?$getOneProperty['max_bathroom']:''; ?>"  name="max_bathroom"   type="text" class="num_check form-control mx-1 num_check rt"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Flooring<span class="text-danger" >*</span></label>
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
                                                                <input id="getFlooringA"  type="hidden" value="<?php  echo $final ?>">
                                                            <?php															
														 }															 
											
												      ?>
												<select required class="form-control multiple flooring"  name="flooring[]" multiple>
									                 <option value="">Select</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
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
												<select class="form-control multiple amenities" name="amenties[]" multiple >
												     <option value="">Select</option>
												</select>
											</div>
										</div>
										<div class="col-md-3  ">
											<div class="form-group mb-3">
												<label> Dimension <span class="text-danger" >*</span></label>
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
										<div class="col-md-3 r">
											<div class="form-group mb-3">
												<label>Parking</label>
												<input value="<?php echo !empty($getOneProperty['max_open_parking'])?$getOneProperty['max_open_parking']:''; ?>"  name="max_open_parking"   type="text" class="num_check form-control mx-1 num_check rt" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label>Negotiable </label>
												<select class="form-control "  name="is_negotiable" >
													<option value="">Select</option>
													<?php
													
														foreach($yes_no as $key => $value)
														{
															if(isset($getOneProperty['is_negotiable']) == $key   && $getOneProperty['is_negotiable'] !== null)
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
									<div class="row ossw">
										
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Buildup Area(sqft) <span class="text-danger" >*</span></label>
												<input value="<?php echo !empty($getOneProperty['max_buildup_area'])?$getOneProperty['max_buildup_area']:''; ?>" name="max_buildup_area" type="text" class="num_check form-control mx-1 num_check" required />
											</div>
										</div>
										<div class="col-md-3 c">
											<div class="form-group mb-3">
												<label> Carpet Area<span class="text-danger" >*</span></label>
												<input value="<?php echo !empty($getOneProperty['max_carpet_area'])?$getOneProperty['max_carpet_area']:''; ?>"  name="max_carpet_area"   type="text" class=" num_check form-control mx-1 num_check ct" required />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label>Budget<span class="text-danger" >*</span></label>
												<input value="<?php echo !empty($getOneProperty['max_budget'])?$getOneProperty['max_budget']:''; ?>" required   name="max_budget"   type="text" class="form-control mx-1 num_check"  />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label> Suitable For </label>
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
												<select class="form-control multiple suitable_for" name="suitable_for[]" multiple >
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
										<div class="col-md-3  ">
											<div class="form-group mb-3">
												<label> Dimension <span class="text-danger" >*</span></label>
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
										<div class="col-md-3 r">
											<div class="form-group mb-3">
												<label>Parking</label>
												<input value="<?php echo !empty($getOneProperty['max_open_parking'])?$getOneProperty['max_open_parking']:''; ?>"  name="max_open_parking"   type="text" class="num_check form-control mx-1 num_check rt" />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group mb-3">
												<label> Description </label>
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
									<div class="col-md-3">
										<div class="form-group mb-3">
											<label>State<span class="text-danger" >*</span></label>
											<select onchange="getCity()" class="form-control " id="sid" name="property_state" required >
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
											<input type="hidden" value="<?php  echo $getOneProperty['property_city'] ?>" id="pc">
											<label>City <span class="text-danger" >*</span></label>
											<select class="form-control  " id="cid" name="property_city" required>
												<option value="">Select</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group mb-3">
											<label> Pincode <span class="text-danger" >*</span></label>
											<input value="<?php echo !empty($propertyAddress['pincode'])?$propertyAddress['pincode']:''; ?>"  name="pincode"   type="text" class="form-control mx-1 num_check" required />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group mb-3">
											<label> Office No/Floor<span class="text-danger" >*</span></label>
											<input value="<?php echo !empty($propertyAddress['map_location'])?$propertyAddress['map_location']:''; ?>"  name="map_location"   type="text" class="form-control mx-1 " required />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group mb-3">
											<label> Landmark<span class="text-danger" >*</span></label>
											<input value="<?php echo !empty($propertyAddress['locality'])?$propertyAddress['locality']:''; ?>"  name="locality"   type="text" class="form-control mx-1" required />
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group mb-3">
											<label>Property Address <span class="text-danger" >*</span></label>
											<input value="<?php echo !empty($getOneProperty['property_address1'])?$getOneProperty['property_address1']:''; ?>" name="property_address1" type="text" class="form-control" required/>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group mb-3">
											<label>Google Map Url</label>
											<input  value="<?php echo !empty($getOneProperty['map_url'])?$getOneProperty['map_url']:''; ?>"  name="map_url"  type="text" class="form-control" >
										</div>
									</div>
									<div style="clear:both;"></div>
								</div>
							</div>
						</div>
						
						<!----------Third------>
						<div class="col-12 my-3">
							<div class="d-sm-flex align-items-center justify-content-between p-2 rounded" style="background-color:#1B2C3F;">
								<h4 class="text-white">Property Images (1900x500)<span class="text-danger">*</span></h4>
								<div class="page-title-right">
									<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
									<i class="fa fa-plus-circle" aria-hidden="true"></i>
									</button>
								</div>
							</div>
						</div>
						<div class="card collapse" id="collapseExample3">
							<div class="card-body">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group mb-3">
											<input type="file" name="property_image[]" class="form-control" multiple >
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
<?php  $this->load->view('user/include/newfooter'); ?>

<?php  

  if(isset($getOneProperty['property_state']))
  {
	  ?>
	    <script>
		
		 $("#sid").trigger("change");
		 
	    </script>
	  <?php
  }
  
  if(isset($getOneProperty['sell_type']))
  {
	  ?> 
	    <script>
		 $("#category").trigger("change");
	    </script>
	  <?php
  }


?>




