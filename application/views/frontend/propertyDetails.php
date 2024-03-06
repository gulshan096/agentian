<!DOCTYPE html>
<html lang="en">
	<head>
		<?php  $this->load->view('frontend/include/header'); ?>
		<style>
		    #owl-demo .item img
		    {
			   display: block;
			   width: 100%;
			   height:100% !important;
			}
			#owl-demo .item
			{
			   height: 500px;
			}
			#sndBtn
			{
               display:none;			
			}
			@media screen and (max-width: 600px)
			{
			  #owl-demo .item
			  {
				height: auto !important;
			  }
			}
		</style>
		
	</head>
	<body class="yellow-skin" >
		<div id="alert-container"></div>
		<div id="main-wrapper">
			<?php  $this->load->view('frontend/include/menu'); ?>
			<div class="clearfix"></div>
			<div id="app">
			    <div id="owl-demo" class="owl-carousel owl-theme">
					<?php
					
						if(!empty($property_details['property_images']))
						{
							foreach($property_details['property_images'] as $pimg)
							{
					        ?>
								<div class="item">
									<img src="<?php echo base_url().$pimg; ?>"  alt="property image">
								</div>
					        <?php
							}
						}
						else
						{
					     ?>
							<div class="item">
								<img src="<?php  echo base_url('assets/storage/properties/p-6-autox610.jpg') ?>"  alt="property image">
							</div>
					     <?php
					    }
					
					?>
				</div>
				<section class="property-detail gray-simple">
					<div data-property-id="9"></div>
					<div class="container">
						<div class="row">
							<!-- property main detail -->
							<div class="col-lg-8 col-md-12 col-sm-12">
								<div class="property_block_wrap style-2 p-4">
									<div class="prt-detail-title-desc">
										<span class="prt-types font-weight-bold">For
											<?php
											if($property_details['request_from'] == 1)
											{
												echo "Buy";
											}
											elseif($property_details['request_from'] == 2)
											{
												echo "Sell";
											}
											elseif($property_details['request_from'] == 3)
											{
												echo "Rent Out";
											}
											elseif($property_details['request_from'] == 4)
											{
												echo "Lease Out";
											}
											elseif($property_details['request_from'] == 5)
											{
												echo "Rent In";
											}
											elseif($property_details['request_from'] == 6)
											{
												echo "Lease In";
											}
											
											?>
										</span>
										<h3><?php echo !empty($property_details['building_name'])?$property_details['building_name']:''; ?></h3>
										<span>
										  <i class="lni-map-marker"></i> 
										   <?php echo !empty($property_details['state'])?$property_details['state']:''; ?> , 
										   <?php echo !empty($property_details['city'])?$property_details['city']:''; ?> ,
										   <?php echo !empty($property_details['property_address1'])?$property_details['property_address1']:''; ?>
										  <?php echo !empty($property_details['property_area'])?$property_details['property_area']:''; ?>
										</span>
										<h3 class="prt-price-fix"><i class="fa fa-inr text-dark"></i> 
										    <?php  echo $property_details['min_budget'] != $property_details['max_budget'] ?$property_details['min_budget'].'-'.$property_details['max_budget']:$property_details['max_budget']; ?>
										</h3>
										<div class="list-fx-features"></div>
									</div>
								</div>
								<!-- Single Block Wrap - Features -->
								<div class="property_block_wrap style-2">
									<div class="property_block_wrap_header">
										<a data-bs-toggle="collapse" data-parent="#features" data-bs-target="#clOne" aria-controls="clOne"
											href="javascript:void(0);" aria-expanded="false">
											<h4 class="property_block_title">Basic Details &amp; Features</h4>
										</a>
									</div>
									<div id="clOne" class="panel-collapse collapse show" aria-labelledby="clOne">
										<div class="block-body">
											<ul class="detail_features">
												<?php
												
												if(!empty($property_details['max_plot_area']))
												{
												?>
												<li>
													<strong>Plot Area:</strong>
													<?php  echo $property_details['min_plot_area'] != $property_details['max_plot_area']?$property_details['min_plot_area'].'-'.$property_details['max_plot_area']:$property_details['max_plot_area']; ?>
												    <small> (<?php echo !empty($property_details['measure'])?$property_details['measure']:'' ?>) </small>
												</li>
												<?php
												}
												if(!empty($property_details['dimension_front']) && !empty($property_details['dimension_depth']))
												{
												?>
												<li>
													<strong>Dimension:</strong>
													Front- <?php  echo $property_details['dimension_front'];  ?>, Depth- <?php  echo $property_details['dimension_depth'];  ?>
												</li>
												<?php
												}
												if(!empty($property_details['max_bedroom']))
												{
												?>
												<li>
													<strong>Bedroom:</strong>
													<?php  echo $property_details['min_bedroom'] != $property_details['max_bedroom']?$property_details['min_bedroom'].'-'.$property_details['max_bedroom']:$property_details['max_bedroom']; ?>
												</li>
												<?php
												}
												if(!empty($property_details['max_bathroom']))
												{
												?>
												<li>
													<strong>Bathrooms:</strong>
													<?php  echo $property_details['min_bathroom'] != $property_details['max_bathroom'] ?$property_details['min_bathroom'].'-'.$property_details['max_bathroom']:$property_details['max_bathroom']; ?>
												</li>
												<?php
												}
												if(!empty($property_details['max_floor']))
												{
												?>
												<li>
													<strong>Floors:</strong>
													<?php  echo $property_details['min_floor'] != $property_details['max_floor'] ?$property_details['min_floor'].'-'.$property_details['max_floor']:$property_details['max_floor']; ?>
												</li>
												<?php
												}
												if(!empty($property_details['max_ceiling_hight']))
												{
												?>
												<li>
													<strong>Ceiling Hight:</strong>
													<?php  echo $property_details['min_ceiling_hight'] != $property_details['max_ceiling_hight'] ?$property_details['min_ceiling_hight'].'-'.$property_details['max_ceiling_hight']:$property_details['max_ceiling_hight']; ?>
												</li>
												<?php
												}
												if(!empty($property_details['max_property_age']))
												{
												?>
												<li>
													<strong>Property Age:</strong>
													
													<?php  echo $property_details['min_property_age'] != $property_details['max_property_age'] ?$property_details['min_property_age'].'-'.$property_details['max_property_age']:$property_details['max_property_age']; ?>
												</li>
												<?php
												}
												if(!empty($property_details['max_buildup_area']))
												{
												?>
												<li>
													<strong>Builtup Area:</strong>
													<?php  echo $property_details['min_buildup_area'] != $property_details['max_buildup_area'] ?$property_details['min_buildup_area'].'-'.$property_details['max_buildup_area']:$property_details['max_buildup_area']; ?>
												    <small>(sqft)</small>
												</li>
												<?php
												}
												if(!empty($property_details['lockin_period']))
												{
												?>
												<li>
													<strong>Lockin Period:</strong>
													<?php  echo $property_details['lockin_period']; ?>
												</li>
												<?php
												}
												if(!empty($property_details['max_covered_parking']))
												{
												?>
												<li>
													<strong>Covered Parking:</strong>
													
													<?php  echo $property_details['min_covered_parking'] != $property_details['max_covered_parking'] ?$property_details['min_covered_parking'].'-'.$property_details['max_covered_parking']:$property_details['max_covered_parking']; ?>
												</li>
												<?php
												}
												if(!empty($property_details['max_open_parking']))
												{
												?>
												<li>
													<strong>Open Parking:</strong>
										
													<?php  echo $property_details['min_open_parking'] != $property_details['max_open_parking'] ?$property_details['min_open_parking'].'-'.$property_details['max_open_parking']:$property_details['max_open_parking']; ?>
												</li>
												<?php
												}
												if(!empty($property_details['max_balcony']))
												{
												?>
												<li>
													<strong>Balcony:</strong>
												
													<?php  echo $property_details['min_balcony'] != $property_details['max_balcony'] ?$property_details['min_balcony'].'-'.$property_details['max_balcony']:$property_details['max_balcony']; ?>
												</li>
												<?php
												}
												if(!empty($property_details['property_type']))
												{
												?>
												<li>
													<strong>Property Type:</strong>
													<?php  echo $property_details['property_type']; ?>
												</li>
												<?php
												}
												if(!empty($property_details['listing_by']))
												{
												?>
												<li>
													<strong>Listing by:</strong>
													<?php  echo $property_details['listing_by']; ?>
												</li>
												<?php
												}
												if($property_details['is_negotiable'] != null)
												{
												?>
												<li>
													<strong>Negotiable:</strong>
													<?php  echo $property_details['is_negotiable'] == 1?'Yes':'No'; ?>
												</li>
												<?php
												}
												if(!empty($property_details['max_carpet_area']))
												{
												?>
												<li>
													<strong>Carpet Area:</strong>
								
													<?php  echo $property_details['min_carpet_area'] != $property_details['max_carpet_area'] ?$property_details['min_carpet_area'].'-'.$property_details['max_carpet_area']:$property_details['max_carpet_area']; ?>
												    <small>(sqft)</small>
												</li>
												<?php
												}
												if(!empty($property_details['is_include_tax']))
												{
												?>
												<li>
													<strong>Include Tax:</strong>
													<?php  echo $property_details['is_include_tax'] == 1?'Yes':'No'; ?>
												</li>
												<?php
												}
												if(!empty($property_details['is_include_dg_ups']))
												{
												?>
												<li>
													<strong>Include Dg UPS:</strong>
													<?php  echo $property_details['is_include_dg_ups'] == 1?'Yes':'No'; ?>
												</li>
												<?php
												}
												if(!empty($property_details['water_charge']))
												{
												?>
												<li>
													<strong>Water charge:</strong>
													<?php  echo $property_details['water_charge']==1?'Yes':'No'; ?>
												</li>
												<?php
												}
												if(!empty($property_details['electricity_charge']))
												{
												?>
												<li>
													<strong>Electricity charge:</strong>
													<?php  echo $property_details['electricity_charge']==1?'Yes':'No'; ?>
												</li>
												<?php
												}if(!empty($property_details['lockin_period']))
												{
												?>
												<li>
													<strong>Lockin period:</strong>
													<?php  echo $property_details['lockin_period']; ?>month
												</li>
												<?php
												}
												if(!empty($property_details['rent_increase']))
												{
												?>
												<li>
													<strong>Rent Increase:</strong>
													<?php  echo $property_details['rent_increase']; ?>
												</li>
												<?php
												}
												
												?>
											</ul>
										</div>
									</div>
								</div>
								<!-- Single Block Wrap -->
								<div class="property_block_wrap style-2">
									<div class="property_block_wrap_header">
										<a data-bs-toggle="collapse" data-parent="#dsrp" data-bs-target="#clTwo" aria-controls="clTwo"
											href="javascript:void(0);" aria-expanded="true"><h4
										class="property_block_title">Description</h4></a>
									</div>
									<div id="clTwo" class="panel-collapse collapse show">
										<div class="block-body">
											<p>
												<?php echo !empty($property_details['description'])?$property_details['description']:''; ?>
												
											</p>
											
										</div>
										
									</div>
								</div>
								<!-- Single Block Wrap - Amenities -->
								<!-- Single Block Wrap -->
								<div class="property_block_wrap style-2">
									<div class="property_block_wrap_header">
										<a data-bs-toggle="collapse" data-parent="#amen" data-bs-target="#clThree" aria-controls="clThree"
											href="javascript:void(0);" aria-expanded="true">
											<h4 class="property_block_title">Amenities</h4>
										</a>
									</div>
									<div id="clThree" class="panel-collapse collapse show">
										<div class="block-body">
											<ul class="avl-features third color">
												<?php
													if(!empty($property_details['amenities']))
													{
														foreach($property_details['amenities'] as $amen)
														{
												?>
												<li>
													<i class="icon  fas fa-check "></i>
													<span><?php echo $amen; ?></span>
												</li>
												<?php
												}
												}
												else
												{
												?>
												<li>
													<i class="icon  fas fa-check "></i>
													<span>Spa &amp; Massage</span>
												</li>
												<li>
													<i class="icon  fas fa-check "></i>
													<span>Wifi</span>
												</li>
												<?php
												}
												?>
												
												
											</ul>
										</div>
									</div>
								</div>
								<!-- Single Block Wrap - Video -->
								
								<!-- Single Block Wrap -->
								
								
							<!-- Single Block Wrap - Gallery -->
							<div class="property_block_wrap style-2">
								<div class="property_block_wrap_header">
									<a data-bs-toggle="collapse" data-parent="#clSev" data-bs-target="#clSev" aria-controls="clOne"
										href="javascript:void(0);" aria-expanded="true" class="collapsed">
										<h4 class="property_block_title"> Gallery</h4>
									</a>
								</div>
								<div id="clSev" class="panel-collapse collapse show">
									<div class="block-body">
										<ul class="list-gallery-inline">
											
											<?php
											
													if(!empty($property_details['property_images']))
													{
														foreach($property_details['property_images'] as $pimg)
														{
											?>
											<li>
												<a href="<?php echo base_url().$pimg; ?>"
													class="mfp-gallery">
													<img
													src="assets/storage/general/img-loading.jpg"
													data-src="<?php echo base_url().$pimg; ?>"
													class="img-fluid mx-auto lazy" alt="2811 Battery Place Northwest-0" />
												</a>
											</li>
											<?php
											}
											}
											else
											{
											?>
											<li>
												<a href="<?php echo base_url() ?>/assets/storage/properties/p-6.jpg"
													class="mfp-gallery">
													<img
													src="<?php echo base_url() ?>/assets/storage/general/img-loading.jpg"
													data-src="<?php echo base_url() ?>/assets/storage/properties/p-6-400xauto.jpg"
													class="img-fluid mx-auto lazy" alt="2811 Battery Place Northwest-0" />
												</a>
											</li>
											<?php
											}
											
											?>
											
										</ul>
									</div>
								</div>
							</div>
							<!-- Single Block Wrap - Nearby -->
							<?php
							
							if(count($property_details['flooring']) > 0)
							{
							?>
							<div class="property_block_wrap style-2">
								<div class="property_block_wrap_header">
									<a data-bs-toggle="collapse" data-parent="#nearby" data-bs-target="#cl13" aria-controls="cl13"
										href="javascript:void(0);" aria-expanded="true">
										<h4 class="property_block_title">Flooring</h4>
									</a>
								</div>
								<div id="cl13" class="panel-collapse collapse show">
									<div class="block-body">
										<div class="nearby-wrap">
											<div class="neary_section_list">
												<div class="neary_section">
													<?php
													
													foreach($property_details['flooring'] as $flooring)
													{
													?>
													 
													<div class="neary_section_first">
														<h4 class="nearby_place_title"><i class="fa fa-check-circle text-success  px-3"></i><?php echo $flooring; ?></h4>
													</div>
													<?php
													}
													
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<?php
							}
							
							?>
							
							
							<?php
							
							if(count($property_details['hub']) > 0)
							{
							?>
							<div class="property_block_wrap style-2">
								<div class="property_block_wrap_header">
									<a data-bs-toggle="collapse" data-parent="#nearby" data-bs-target="#cl19" aria-controls="cl19"
										href="javascript:void(0);" aria-expanded="true">
										<h4 class="property_block_title">HUB</h4>
									</a>
								</div>
								<div id="cl19" class="panel-collapse collapse show">
									<div class="block-body">
										<div class="nearby-wrap">
											<div class="neary_section_list">
												<div class="neary_section">
													<?php
													
													foreach($property_details['hub'] as $hub)
													{
													?>
													 
													<div class="neary_section_first">
														<h4 class="nearby_place_title"><i class="fa fa-check-circle px-3 text-success"></i><?php echo $hub; ?></h4>
													</div>
													<?php
													}
													
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							}
							
							?>
							
							
							<?php
							
							if(count($property_details['available_from']) > 0)
							{
							?>
							<div class="property_block_wrap style-2">
								<div class="property_block_wrap_header">
									<a data-bs-toggle="collapse" data-parent="#nearby" data-bs-target="#cl18" aria-controls="cl18"
										href="javascript:void(0);" aria-expanded="true">
										<h4 class="property_block_title">Available From</h4>
									</a>
								</div>
								<div id="cl18" class="panel-collapse collapse show">
									<div class="block-body">
										<div class="nearby-wrap">
											<div class="neary_section_list">
												<div class="neary_section">
													<?php
													
													foreach($property_details['available_from'] as $available_from)
													{
													?>
													<div class="neary_section_first">
														<h4 class="nearby_place_title"><i class="fa fa-check-circle text-success px-3"></i><?php echo $available_from; ?></h4>
													</div>
													<?php
													}
													
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							}
							
							?>
							
							
							<?php
							
							if(count($property_details['suitable_for']) > 0)
							{
							?>
							<div class="property_block_wrap style-2">
								<div class="property_block_wrap_header">
									<a data-bs-toggle="collapse" data-parent="#nearby" data-bs-target="#cl17" aria-controls="cl17"
										href="javascript:void(0);" aria-expanded="true">
										<h4 class="property_block_title">Suitable For</h4>
									</a>
								</div>
								<div id="cl17" class="panel-collapse collapse show">
									<div class="block-body">
										<div class="nearby-wrap">
											<div class="neary_section_list">
												<div class="neary_section">
													<?php
													
													foreach($property_details['suitable_for'] as $suitable_for)
													{
													?>
													<div class="neary_section_first">
														<h4 class="nearby_place_title"><i class="fa fa-check-circle text-success px-3"></i><?php echo $suitable_for; ?></h4>
													</div>
													<?php
													}
													
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							}
							
							?>
							
							<?php
							
							if(count($property_details['available_for']) > 0)
							{
							?>
							<div class="property_block_wrap style-2">
								<div class="property_block_wrap_header">
									<a data-bs-toggle="collapse" data-parent="#nearby" data-bs-target="#cl16" aria-controls="cl16"
										href="javascript:void(0);" aria-expanded="true">
										<h4 class="property_block_title">Available For</h4>
									</a>
								</div>
								<div id="cl16" class="panel-collapse collapse show">
									<div class="block-body">
										<div class="nearby-wrap">
											<div class="neary_section_list">
												<div class="neary_section">
													<?php
													
													foreach($property_details['available_for'] as $available_for)
													{
													?>
													<div class="neary_section_first">
														<h4 class="nearby_place_title"><i class="fa fa-check-circle text-success px-3"></i><?php echo $available_for; ?></h4>
													</div>
													<?php
													}
													
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							}
							
							?>
							
							
							<?php
							
							if(count($property_details['bhk']) > 0)
							{
							?>
							<div class="property_block_wrap style-2">
								<div class="property_block_wrap_header">
									<a data-bs-toggle="collapse" data-parent="#nearby" data-bs-target="#cl15" aria-controls="cl15"
										href="javascript:void(0);" aria-expanded="true">
										<h4 class="property_block_title">BHK</h4>
									</a>
								</div>
								<div id="cl15" class="panel-collapse collapse show">
									<div class="block-body">
										<div class="nearby-wrap">
											<div class="neary_section_list">
												<div class="neary_section">
													<?php
													
													foreach($property_details['bhk'] as $bhk)
													{
													?>
													<div class="neary_section_first">
														<h4 class="nearby_place_title"><i class="fa fa-check-circle text-success px-3"></i><?php echo $bhk; ?></h4>
													</div>
													<?php
													}
													
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							}
							
							?>
							
							
							<?php
							
							if(count($property_details['furnishing_status']) > 0)
							{
							?>
							<div class="property_block_wrap style-2">
								<div class="property_block_wrap_header">
									<a data-bs-toggle="collapse" data-parent="#nearby" data-bs-target="#cl14" aria-controls="cl14"
										href="javascript:void(0);" aria-expanded="true">
										<h4 class="property_block_title">Furnishing Status</h4>
									</a>
								</div>
								<div id="cl14" class="panel-collapse collapse show">
									<div class="block-body">
										<div class="nearby-wrap">
											<div class="neary_section_list">
												<div class="neary_section">
													<?php
													
													foreach($property_details['furnishing_status'] as $furnishing_status)
													{
													?>
													<div class="neary_section_first">
														<h4 class="nearby_place_title"><i class="fa fa-check-circle text-success px-3"></i><?php echo $furnishing_status; ?></h4>
													</div>
													<?php
													}
													
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							}
							?>
							
							
							<?php
							
							if(count($property_details['property_status']) > 0)
							{
							?>
							<div class="property_block_wrap style-2">
								<div class="property_block_wrap_header">
									<a data-bs-toggle="collapse" data-parent="#nearby" data-bs-target="#cl12" aria-controls="cl12"
										href="javascript:void(0);" aria-expanded="true">
										<h4 class="property_block_title">Property Status</h4>
									</a>
								</div>
								<div id="cl12" class="panel-collapse collapse show">
									<div class="block-body">
										<div class="nearby-wrap">
											<div class="neary_section_list">
												<div class="neary_section">
													<?php
													
													foreach($property_details['property_status'] as $property_status)
													{
													?>
													<div class="neary_section_first">
														<h4 class="nearby_place_title"><i class="fa fa-check-circle text-success px-3"></i><?php echo $property_status; ?></h4>
													</div>
													<?php
													}
													
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							}
							
							?>
							
							
							<?php
							
							if(count($property_details['construction_status']) > 0)
							{
							?>
							<div class="property_block_wrap style-2">
								<div class="property_block_wrap_header">
									<a data-bs-toggle="collapse" data-parent="#nearby" data-bs-target="#cl11" aria-controls="cl11"
										href="javascript:void(0);" aria-expanded="true">
										<h4 class="property_block_title">Construction Status</h4>
									</a>
								</div>
								<div id="cl11" class="panel-collapse collapse show">
									<div class="block-body">
										<div class="nearby-wrap">
											<div class="neary_section_list">
												<div class="neary_section">
													<?php
													
													foreach($property_details['construction_status'] as $construction_status)
													{
													?>
													<div class="neary_section_first">
														<h4 class="nearby_place_title"><i class="fa fa-check-circle text-success px-3"></i><?php echo $construction_status; ?></h4>
													</div>
													<?php
													}
													
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							}
							
							?>
							
							
							<?php
							
							if(count($property_details['facing']) > 0)
							{
							?>
							<div class="property_block_wrap style-2">
								<div class="property_block_wrap_header">
									<a data-bs-toggle="collapse" data-parent="#nearby" data-bs-target="#cl10" aria-controls="cl10"
										href="javascript:void(0);" aria-expanded="true">
										<h4 class="property_block_title">Facing</h4>
									</a>
								</div>
								<div id="cl10" class="panel-collapse collapse show">
									<div class="block-body">
										<div class="nearby-wrap">
											<div class="neary_section_list">
												<div class="neary_section">
													<?php
													
													foreach($property_details['facing'] as $facing)
													{
													?>
													<div class="neary_section_first">
														<h4 class="nearby_place_title"><i class="fa fa-check-circle text-success px-3"></i><?php echo $facing; ?></h4>
													</div>
													<?php
													}
													
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							}
							
							?>
							
							<?php
							
							if(count($property_details['zone_type']) > 0)
							{
							?>
							<div class="property_block_wrap style-2">
								<div class="property_block_wrap_header">
									<a data-bs-toggle="collapse" data-parent="#nearby" data-bs-target="#clNine" aria-controls="clNine"
										href="javascript:void(0);" aria-expanded="true">
										<h4 class="property_block_title">Zone Type</h4>
									</a>
								</div>
								<div id="clNine" class="panel-collapse collapse show">
									<div class="block-body">
										<div class="nearby-wrap">
											<div class="neary_section_list">
												<div class="neary_section">
													<?php
													
													foreach($property_details['zone_type'] as $ztype)
													{
													?>
													<div class="neary_section_first">
														<h4 class="nearby_place_title"><i class="fa fa-check-circle text-success px-3"></i><?php echo $ztype; ?></h4>
													</div>
													<?php
													}
													
													?>
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							}
							
							?>
							
							
							<!-- Single Review -->
							
						</div>
						<!-- property Sidebar -->
						<div class="col-lg-4 col-md-12 col-sm-12">
							<!-- Like And Share -->
							<div class="like_share_wrap b-0">
								<ul class="like_share_list justify-content-center">
									<li class="social_share_list">
									<?php foreach($property_details['administrator'] as $admin){} ?>
										<a href="https://wa.me/<?php echo $admin['mobile']  ?>?text=Hello Sir ,I Am Intersted In This Property <?php echo current_url();  ?>" target="_blank" class="btn btn-likes" data-bs-toggle="tooltip"
										data-original-title="Share"><i class="fas fa-share"></i>Share</a>
										<div class="social_share_panel">
										
										</div>
									</li>
									<li>
									   <form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo !empty($check_wishlist)?site_url('mobile/comman/removeFromWishlist'):site_url('mobile/comman/addToWishlist'); ?>','#createForm1','#successMsg')" method="post">
									    <input type="hidden" value="<?php  echo $property_details['property_id'] ?>" name="property_id">
										
										<?php  
										   
										   if(!empty($check_wishlist))
										   {
											
											 ?>
											    <button type="submit" class="btn btn-light tab" type="submit">
												  <i class="fas fa-heart text-danger"></i>
												   Save
												</button>
                                             <?php											 
										   }
										   else
										   {
											  ?>
											    <button type="submit" class="btn btn-light tab" type="submit">
												  <i class="fas fa-heart text-dark"></i>
												   Save
												</button>
                                             <?php 
										   }
			
										?>
										</form>
										
									</li>
									
								</ul>
								
								<span class="text-center text-info"><?php echo !empty($this->session->userdata('aid'))?'':'Please first login to add a wishlist'; ?></span>
							</div>
						
							<?php foreach($property_details['administrator'] as $admin){} ?>
							<div class="details-sidebar">
								<div class="page-content page-container" id="page-content" >
									<div class="padding">
										<div class="container d-flex justify-content-center">
											<div class="col-md-12" >
												<div class="card card-bordered" >
													<div class="card-header text-white" style="background-color:#E1B056;">
														<span class="card-title">
														   <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
														   <span><?php echo  $admin['name']; ?></span>
														</span>
														<a class="btn btn-xs " href="javascript:void(0)"><?php echo  $admin['mobile']; ?></a>
													</div>
													<div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height:400px !important;">
														<div class="media media-chat">
															
															<div class="media-body" id="get_chat">
																
															</div>
														</div>
														
														<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
															<div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
														</div>
														<div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
															<div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
														</div>
													</div>
													<div class="publisher bt-1 border-light">
													<form id="createForm2" enctype="multipart/form-data" onsubmit="return send_message_web('<?php echo site_url('user/chat_controller/send_message'); ?>','#createForm2','#successMsgs')" method="post">
														<img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
														<input id="uid" value="<?php echo $sender_id ?>"   type="hidden" name="sender_id">
                                                        <input value="<?php echo $receiver_id ?>" type="hidden" name="receiver_id">
                                                        <input value="<?php echo $property_id ?>" type="hidden" name="property_id">
														<input id="msg" name="message" class="publisher-input" type="text" placeholder="Write something">
														<button id="sndBtn" type="submit"  class="publisher-btn text-info"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
													</form>
													
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php 
								
								   if(!empty($property_details['map_url']))
								   {
									 ?>
									     <div class="property_block_wrap style-2">
												<div class="property_block_wrap_header">
													<a data-bs-toggle="collapse" data-parent="#loca" data-bs-target="#clSix" aria-controls="clSix"
														href="javascript:void(0);" aria-expanded="true" class="collapsed"><h4
													class="property_block_title">Location</h4></a>
												</div>
												<div id="clSix" class="panel-collapse collapse show">
													<div class="block-body">
														<div id="zxcvbnm">
															<div class="traffic-map-container">
															<div class="row justify-content-center">
																<div class="col-12">
																	<div id="traff" class="w-100 h-100">
																	
																	   <iframe src="https://maps.google.com/maps?q=<?php echo $property_details['latitude'] ?>,<?php echo $property_details['longitude'] ?>&hl=es;z=14&amp;output=embed" width="100%" height="100%" ></iframe>
																	
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>	 
										   
								     <?php
								   }
	
								?>
								</div>
							</div>
						</div>
					</div>
				</div>
					<div class="row"></div>
			    </section>
			</div>
	    </div>


	     <?php  $this->load->view('frontend/include/footer'); ?>
		 
		 <script>
     $(document).ready(function() {
		 get_message();
		
		 $("#msg").keyup(function(){
		  
			var word  =  $("#msg").val();
			  var value =  word.length; 
			  
			  if( value > 0)
			   {
				  
				  $("#sndBtn").show();	  
			   }
			   else
			   {
				  
				  $("#sndBtn").hide();	 
			   }
			  
			 });
			 
			 
			 $(".tab").click(function(){
				 
				 location.reload(true);			
				
			 });
			 
	});
   </script>
   <script>
   
    
   </script>   
  

	<script>
	$(document).ready(function() {

		$("#owl-demo").owlCarousel({

			navigation : true,

			slideSpeed : 300,
			paginationSpeed : 400,

			items : 1,
			itemsDesktop : false,
			itemsDesktopSmall : false,
			itemsTablet: false,
			itemsMobile : false

		});

	});
	</script>
	<script>
	
	  function get_message()
	  {	 
	      var property_id = '<?php  echo $property_id ?>';
	      var sender_id   = '<?php  echo $sender_id ?>';
	      var receiver_id = '<?php  echo $receiver_id ?>';
		  
		  $.ajax({
				type:'POST',
				url:'<?php echo base_url('Frontend/get_message_web') ?>',
				data:{property_id:property_id,sender_id:sender_id,receiver_id:receiver_id},
				success:function(data){
					   
					$('#get_chat').html(data);
				}
			});
	  }
	</script>
	
	<script>
	
                function send_message_web(url,formclass,resclass)	
				{ 
			             var uid =  $("#uid").val();
						 
		                 var baseurl =   "<?php echo base_url('loader.gif') ?>"; 
						 
						 if(uid == '')
						 {
							 alert('Please login first');
							 window.location.replace('<?php echo base_url("login");  ?>');
							 return false;
						 }
					 
						 var form = $(formclass)[0];
						 var formData = new FormData(form);
						 
							$.ajax({
									type: "POST",
									async: true,
									cache: false,
									url: url,
									data: formData,
									processData: false,
									contentType: false,
									
									success: function (tempdata)
										{	
										    $('#msg').val('');
                                       		get_message();
											
												if (tempdata.trim() != '') 
													{
														var values = JSON.parse(tempdata);
														showresponse(values.status,values.message,resclass);
														
														if ( typeof values.redurl !== 'undefined' && values.redurl !== '0' )
															{
																setTimeout(function(){
																	window.location.href	= values.redurl;	
																},786);
															}
														
													} else {
														showresponse(0,"Something went wrong, Please try again later.",resclass);
													}
										},
									cache: false
								}).fail(function (jqXHR, textStatus, error) {
									// Handle error here
									showresponse(0,"Something went wrong, Please try again later.",resclass);
								//	console.log(jqXHR.status);
								});
					return false;
				}
				
				
				
				 function showresponse(showtype,showmessage,targetelement)
				  {
						$(targetelement).fadeIn("slow");
							$(targetelement).html(showmessage);
								
								$(targetelement).addClass("alert");
								$(targetelement).removeClass("alert-success");
								$(targetelement).removeClass("alert-warning");
								$(targetelement).removeClass("alert-danger");
								$(targetelement).removeClass("alert-info");
								
								switch(showtype)
									{
										case 1:
												$(targetelement).addClass("alert-success");
										break;
										case 2:
												$(targetelement).addClass("alert-info");
										break;
										case 3:
												$(targetelement).addClass("alert-warning");
										break;
										default:				
												$(targetelement).addClass("alert-danger");
										break;
									}
						return "";
					}
		

</script>
	</body>
</html>