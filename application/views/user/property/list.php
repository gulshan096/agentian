<?php $this->load->view('admin/include/header'); ?>

<style>
			/*---------Slider----------*/
			.slidecontainer {
				width: 50%;
				}
				.slider {
				-webkit-appearance: none;
				width: 100%;
				height: 15px;
				border-radius: 5px;
				background: #d3d3d3;
				outline: none;
				opacity: 0.7;
				-webkit-transition: .2s;
				transition: opacity .2s;
				}
				.slider:hover {
				opacity: 1;
				}
				.slider::-webkit-slider-thumb {
				-webkit-appearance: none;
				appearance: none;
				width: 25px;
				height: 25px;
				border-radius: 50%;
				background: #04AA6D;
				cursor: pointer;
				}
				.slider::-moz-range-thumb {
				width: 25px;
				height: 25px;
				border-radius: 50%;
				background: #04AA6D;
				cursor: pointer;
				}
			/*---------Slider----------*/
			img {
				  border: 1px solid #ddd;
				  border-radius: 4px;
				  padding: 5px;
				  width: 80px;
				}
				.button1 {
					background-color: #0bb197; /* Green */
					border: none;
					color: white;
					padding: 10px;
					text-align: center;
					text-decoration: none;
					display: inline-block;
					font-size: 16px;
					margin: 4px 2px;
					cursor: pointer;
					width:40%;
					border-radius: 29px;
				}
			/*------------- Select Dropdown------------------ */
				 	select {
					/* styling */
					background-color: white;
					border: thin solid blue;
					border-radius: 4px;
					display: inline-block;
					font: inherit;
					line-height: 1.5em;
					padding: 0.5em 3.5em 0.5em 1em;
					/* reset */
					margin: 0;      
					-webkit-box-sizing: border-box;
					-moz-box-sizing: border-box;
					box-sizing: border-box;
					-webkit-appearance: none;
					-moz-appearance: none;
					}
					/* arrows */
					select.classic {
					background-image:
					linear-gradient(45deg, transparent 50%, blue 50%),
					linear-gradient(135deg, blue 50%, transparent 50%),
					linear-gradient(to right, skyblue, skyblue);
					background-position:
					calc(100% - 20px) calc(1em + 2px),
					calc(100% - 15px) calc(1em + 2px),
					100% 0;
					background-size:
					5px 5px,
					5px 5px,
					2.5em 2.5em;
					background-repeat: no-repeat;
					}
					select.classic:focus {
					background-image:
					linear-gradient(45deg, white 50%, transparent 50%),
					linear-gradient(135deg, transparent 50%, white 50%),
					linear-gradient(to right, gray, gray);
					background-position:
					calc(100% - 15px) 1em,
					calc(100% - 20px) 1em,
					100% 0;
					background-size:
					5px 5px,
					5px 5px,
					2.5em 2.5em;
					background-repeat: no-repeat;
					border-color: grey;
					outline: 0;
					}
					/*------------- Select Dropdown------------------ */
		</style>
		
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Manage Property</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Property</a></li>
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
							  <form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('administrator/Property/saverecords'); ?>','#createForm1','#successMsg')"> 
                                        <input value="<?php echo !empty($property['propertyId'])?$property['propertyId']:0; ?>" name="property[propertyId]" type="hidden" />
										<div class="row" style="margin-bottom:2%;">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-2">
																	<div class="row">
																		<label>Property Image </label>
																	</div>
																	<div class="row" >
																		<img onclick= " $('#employee_image').trigger('click'); " style="margin-bottom:5%;" id="employee_image_Preview" class="image-responsive" =" " src="<?php echo isset($administrator['image'])?base_url($administrator['image']):""; ?>"  onerror="this.src='<?php echo base_url("assets/preloader.png"); ?>';" />
																		<input type="file" id="employee_image" class="form-control" name="employee_image" accept="image/*" />
																	</div>
													</div>
													<div class="col-md-5">
																<div class="form-group mb-3">
																	<label>Property Title</label>
																	<input type="text" name="property['propertyTitle']" required class="form-control">
																</div>
																<div class="form-group mb-3">
																	<label>Zone Type</label>
																	<select class="form-control"  name="property[zoneType]" id="zoneType" required style="width:100%;">
																						<option value="Industrial">Select....</option>
																						<option value="Commercial">Commercial</option>
																						<option value="Industrial">Industrial</option>
																						<option value="Residential">Residential</option>
																						<option value="Special Economic Zone">Special Economic Zone</option>
																						<option value="Agriculture Zone">Agriculture Zone</option>
																						<option value="Others">Others</option>
																	</select>
																</div>
																<div class="form-group mb-3">
																	<label>Property Status</label>
																	<select class="form-control"  name="property[propertyStatus]" required style="width:100%;">
																					<option value="<?php echo isset($property['propertyStatus'])?$property['propertyStatus']:"Ready to Move" ?>">Ready to Move </option>
																					<option value="<?php echo isset($property['propertyStatus'])?$property['propertyStatus']:"Bareshell" ?>">Bareshell</option>
																					<option value="<?php echo isset($property['propertyStatus'])?$property['propertyStatus']:"Under Construction" ?>">Under Construction</option>
																	</select>
																</div>	
													</div>
													<div class="col-md-5">
														<div class="form-group mb-3">
																	<label>Property Available For</label>
																	<select class="form-control"  name="property[propertyAvailableFor]" id="propertyAvailableFor" required style="width:100%;">
																		<option value="<?php echo isset($property['propertyAvailableFor'])?$property['propertyAvailableFor']:"Buy" ?>">Buy</option>
																		<option value="<?php echo isset($property['propertyAvailableFor'])?$property['propertyAvailableFor']:"Sell" ?>">Sell</option>
																		<option value="<?php echo isset($property['propertyAvailableFor'])?$property['propertyAvailableFor']:"Rent" ?>">Rent</option>
																		<option value="<?php echo isset($property['propertyAvailableFor'])?$property['propertyAvailableFor']:"Lease" ?>">Lease</option>
																	</select>
														</div>
														<div class="form-group mb-3">
																	<label>Property Type</label>
																	<select class="form-control"  name="property[propertyType]" id="propertyTypeCommercial" disabled required style="width:100%;">
																		<option value="Office">Office</option>
																		<option value="Retail Shop">Retail Shop</option>
																		<option value="Showroom">Showroom</option>
																		<option value="Warehouse">Warehouse</option>
																		<option value="Plot">Plot</option>
																	</select>
																	<select class="form-control"  name="property[propertyType]" id="propertyTypeResidential" hidden  required style="width:100%;">
																		<option value="Apartment">Apartment</option>
																		<option value="Independent Floor">Independent Floor</option>
																		<option value="Independent House">Independent House</option>
																		<option value="Villa">Villa</option>
																		<option value="Plot">Plot</option>
																		<option value="Agriculture Land">Agriculture Land</option>
																	</select>
																	<select class="form-control"  name="property[propertyType]" id="propertyTypeIndustrial" hidden  required style="width:100%;">
																		<option value="Manufacturing Buildings">Manufacturing Buildings</option>
																		<option value="Light Assembly Buildings">Light Assembly Buildings</option>
																		<option value="Storage and Distribution Buildings">Storage and Distribution Buildings</option>
																		<option value="General Warehouse Buildings">General Warehouse Buildings</option>
																		<option value="Distribution Warehouse Buildings">Distribution Warehouse Buildings</option>
																		<option value="Truck Terminals">Truck Terminals</option>
																		<option value="Flex Space Buildings">Flex Space Buildings</option>
																		<option value="Datacentre Buildings">Datacentre Buildings</option>
																		<option value="Showroom Buildings">Showroom Buildings</option>
																	</select>
																	<select class="form-control"  name="property[propertyType]" id="propertyTypeSEZ" hidden  required style="width:100%;">
																		<option value="Airport based multiproduct">Airport based multiproduct</option>
																		<option value="Aviation/Aerospace/Animation & Gaming/Copper">Aviation/Aerospace/Animation & Gaming/Copper</option>
																		<option value="Beach & mineral/ metals">Beach & mineral/ metals</option>
																		<option value="Biotechnology">Biotechnology</option>
																		<option value="Building products/transport equipments/ceramic and glass">Building products/transport equipments/ceramic and glass</option>
																		<option value="Electronic product/Industries">Electronic product/Industries</option>
																		<option value="Engineering">Engineering</option>
																		<option value="Footwear/Leather">Footwear/Leather</option>
																		<option value="Food Processing">Food Processing</option>
																		<option value="Gems and Jewellery">Gems and Jewellery</option>
																		<option value="IT/ITES/Electronic Hardware/Semiconductor/Services">IT/ITES/Electronic Hardware/Semiconductor/Services</option>
																		<option value="Plastic processing">Plastic processing</option>
																	</select>
																	<input type="text" value="" id="propertyTypeOther" class="form-control" placeholder="Enter Property Type...." hidden required>
														</div>
														<div class="form-group mb-3">
															<label>Amenities</label>
															<select class="form-control"  name="property[amenities]" required style="width:100%;">
																				<option value="<?php echo isset($property['amenities'])?$property['amenities']:"Lift" ?>">Lift</option>
																				<option value="<?php echo isset($property['amenities'])?$property['amenities']:"Parking" ?>">Parking</option>
																				<option value="<?php echo isset($property['amenities'])?$property['amenities']:"Gym" ?>">Gym</option>
																				<option value="<?php echo isset($property['amenities'])?$property['amenities']:"Air Conditioning" ?>">Air Conditioning</option>
																				<option value="<?php echo isset($property['amenities'])?$property['amenities']:"Power Backup" ?>">Power Backup</option>
																				<option value="<?php echo isset($property['amenities'])?$property['amenities']:"Game Zone" ?>">Game Zone</option>
																				<option value="<?php echo isset($property['amenities'])?$property['amenities']:"Security" ?>">Security</option>
															</select>
														</div>
													</div>
												</div>
											</div>
										</div>	
										<div class="row">
												<div class="col-md-4">
													<div class="form-group mb-3">
															<label>Possession Date* </label>
															<input type="date" value="<?php echo isset($property['possessionDate'])?$property['possessionDate']:"" ?>"  name="property['possessionDate']" required  class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group mb-3"> 
														<label>Property Available From*</label> 
															<select class="form-control"  name="property[propertyAvailable]" required style="width:100%;">
																<option value="<?php echo isset($property['amenities'])?$property['amenities']:"Within 1week" ?>">Within 1week</option>
																<option value="<?php echo isset($property['amenities'])?$property['amenities']:"Within 2week" ?>">Within 2week</option>
																<option value="<?php echo isset($property['amenities'])?$property['amenities']:"Within 3week" ?>">Within 3week</option>
																<option value="<?php echo isset($property['amenities'])?$property['amenities']:"Within 1month" ?>">Within 1month</option>
															</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group mb-3">
														<label>Property City*</label>
															<select class="form-control"  name="property[propertyCity]" required style="width:100%;">
																<option value="<?php echo isset($property['propertyCity'])?$property['propertyCity']:"Within 1week" ?>">Pune</option>
																<option value="<?php echo isset($property['propertyCity'])?$property['propertyCity']:"Within 2week" ?>">Bangalore</option>
																<option value="<?php echo isset($property['propertyCity'])?$property['propertyCity']:"Within 3week" ?>">Raipur</option>
															</select>
													</div>
													<div class="row">
															<div style="clear:both;"></div>
													</div>		
												</div>
												<div class="col-md-4">
													<div class="form-group mb-3">
															<label>Furniture Status</label>
															<select class="form-control"  name="property[furnitureStatus]" required style="width:100%;">
																	<option value="<?php echo isset($property['furnitureStatus'])?$property['furnitureStatus']:"Fully Furnished" ?>">Ready to Move </option>
																	<option value="<?php echo isset($property['furnitureStatus'])?$property['furnitureStatus']:"Semi-Furnished" ?>">Semi-Furnished</option>
																	<option value="<?php echo isset($property['furnitureStatus'])?$property['furnitureStatus']:"Unfurnished" ?>">Unfurnished</option>
															</select>
													</div>
												</div>
												<div class="col-md-4">
																<div class="form-group mb-3">
																	<label>Property Area* </label>
																	<select class="form-control"  name="property[propertyArea]" required style="width:100%;">
																		<option value="<?php echo isset($property['propertyArea'])?$property['propertyArea']:"Shivaji Nagar" ?>">Shivaji Nagar</option>
																		<option value="<?php echo isset($property['propertyArea'])?$property['propertyArea']:"Akurdi" ?>">Akurdi</option>
																		<option value="<?php echo isset($property['propertyArea'])?$property['propertyArea']:"Anandnagar" ?>">Anandnagar</option>
																		<option value="<?php echo isset($property['propertyArea'])?$property['propertyArea']:"Nehrunagar" ?>">Nehrunagar</option>
																	</select>
																</div>
												</div>
												<div class="col-md-4">
																<div class="form-group mb-3">
																	<label>Construction Status* </label>
																	<select class="form-control"  name="property[constructionStatus]" required style="width:100%;">
																		<option value="<?php echo isset($property['constructionStatus'])?$property['constructionStatus']:"Move" ?>">Ready To Move</option>
																		<option value="<?php echo isset($property['constructionStatus'])?$property['constructionStatus']:"Under Construction" ?>">Under Construction</option>
																	</select>
																</div>
												</div>
												<div class="col-md-4">
													<div class="form-group mb-3">
														<label>Estate Type*</label>
														<select class="form-control"  name="property[estateType]" required style="width:100%;">
																	<option value="<?php echo isset($property['estateType'])?$property['estateType']:"Office" ?>">Office </option>
                                                                    <option value="<?php echo isset($property['estateType'])?$property['estateType']:"Retail Shop" ?>">Retail Shop</option>
                                                                    <option value="<?php echo isset($property['estateType'])?$property['estateType']:"Showroom" ?>">Showroom</option>
                                                                    <option value="<?php echo isset($property['estateType'])?$property['estateType']:"Warehouse" ?>">Warehouse</option>
																	<option value="<?php echo isset($property['estateType'])?$property['estateType']:"Plot" ?>">Plot</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
																<div class="form-group mb-3">
																	<label>Flooring* </label>
																	<select class="form-control"  name="property[flooringType]" required style="width:100%;">
																		<option value="<?php echo isset($property['flooringType'])?$property['flooringType']:"Marble" ?>">Marble</option>
																		<option value="<?php echo isset($property['flooringType'])?$property['flooringType']:"Concrete" ?>">Concrete</option>
																		<option value="<?php echo isset($property['flooringType'])?$property['flooringType']:"Granite" ?>">Granite</option>
																		<option value="<?php echo isset($property['flooringType'])?$property['flooringType']:"Ceramic" ?>">Ceramic</option>
																		<option value="<?php echo isset($property['flooringType'])?$property['flooringType']:"Cement" ?>">Cement</option>
																		<option value="<?php echo isset($property['flooringType'])?$property['flooringType']:"Others" ?>">Others</option>
																	</select>
																</div>
												</div>
												<div class="col-md-4">
													<div class="slidecontainer">
														<label for="amount">Expected Price:</label>
														<input type="range" min="1" max="100" value="56" name="property['expectedPrice']" class="slider" onclick="slider('expectedPrice')"  id="expectedPrice">
														<p>Value: <span id="amountexpectedPrice"></span></p>
													</div>
												</div>
												<!--- Slider Naot sending value through post method
												<div class="col-md-4">
													<div class="slidecontainer">
														<label for="amount">Maintenance Charge(Per Month):</label>
														<input type="range" min="1" max="100" value="" class="slider" name="property['maintenanceCharge']" onclick="slider('maintenanceCharge')" id="maintenanceCharge">
														<p>Value: <span id="amountmaintenanceCharge"></span></p>
													</div>
												</div>
												<div class="col-md-4">
													<div class="slidecontainer">
														<label for="amount">Security Deposit:</label>
														<input type="range" min="1" max="100" value="" class="slider" name="property['securityDeposit']" onclick="slider('securityDeposit')" id="securityDeposit">
														<p>Value: <span id="amountsecurityDeposit"></span></p>
													</div>
												</div>
												<div class="col-md-4">
													<div class="slidecontainer">
														<label for="amount">Property Age:</label>
														<input type="range" min="1" max="100" value="" class="slider" name="property['propertyAge']" onclick="slider('propertyAge')" id="propertyAge">
														<p>Value: <span id="amountpropertyAge"></span></p>
													</div>
												</div>
												<div class="col-md-4">
													<div class="slidecontainer">
														<label for="amount">Buid Up Area</label>
														<input type="range" min="1" max="100" value="" class="slider" name="property['BuildUpArea']" onclick="slider('BuildUpArea')" id="BuildUpArea">
														<p>Value: <span id="amountBuildUpArea"></span></p>
													</div>
												</div>
												<div class="col-md-4">
													<div class="slidecontainer">
														<label for="amount">Carpet Area</label>
														<input type="range" min="1" max="100" value="" class="slider" name="property['CarpetArea']" onclick="slider('CarpetArea')" id="CarpetArea">
														<p>Value: <span id="amountCarpetArea"></span></p>
													</div>
												</div>
												<div class="col-md-4">
													<div class="slidecontainer">
														<label for="amount">Floor No.</label>
														<input type="range" min="1" max="100" value="" name="property['floorNo']" onclick="slider('floorNo')" class="slider" id="floorNo">
														<p>Value: <span id="amountfloorNo"></span></p>
													</div>
												</div>  --->
												<div class="col-md-4">
																<div class="form-group mb-3">
																	<label>BHK* </label>
																	<select class="form-control"  name="property[propertyUnit]" required style="width:100%;">
																		<option value="<?php echo isset($property['propertyUnit'])?$property['propertyUnit']:"1 RK" ?>">1 RK</option>
																		<option value="<?php echo isset($property['propertyUnit'])?$property['propertyUnit']:"1 BHK" ?>">1 BHK</option>
																		<option value="<?php echo isset($property['propertyUnit'])?$property['propertyUnit']:"2 BHK" ?>">2 BHK</option>
																		<option value="<?php echo isset($property['propertyUnit'])?$property['propertyUnit']:"3 BHK" ?>">3 BHK</option>
																		<option value="<?php echo isset($property['propertyUnit'])?$property['propertyUnit']:"3+ BHK" ?>">3+ BHK</option>
																	</select>
																</div>
												</div>
												<div class="col-md-4">
													<div class="form-group mb-3">
															<label>Bathroom* </label>
															<select class="form-control"  name="property[bathroomUnit]" required style="width:100%;">
																<option value="<?php echo isset($property['bathroomUnit'])?$property['bathroomUnit']:"1BHK" ?>">1BHK</option>
																<option value="<?php echo isset($property['bathroomUnit'])?$property['bathroomUnit']:"2BHK" ?>">2BHK</option>
																<option value="<?php echo isset($property['bathroomUnit'])?$property['bathroomUnit']:"3BHK" ?>">3BHK</option>
															</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group mb-3">
														<label>Balcony* </label>
														<select class="form-control"  name="property[balconyUnit]" required style="width:100%;">
															<option value="<?php echo isset($property['balconyUnit'])?$property['balconyUnit']:"1" ?>">1</option>
															<option value="<?php echo isset($property['balconyUnit'])?$property['balconyUnit']:"2" ?>">2</option>
															<option value="<?php echo isset($property['balconyUnit'])?$property['balconyUnit']:"3" ?>">3</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group mb-3">
														<label>Covered Parking* </label>
															<select class="form-control"  name="property[coveredParking]" required style="width:100%;">
																<option value="<?php echo isset($property['coveredParking'])?$property['coveredParking']:"1" ?>">1</option>
																<option value="<?php echo isset($property['coveredParking'])?$property['coveredParking']:"2" ?>">2</option>
																<option value="<?php echo isset($property['coveredParking'])?$property['coveredParking']:"3" ?>">3</option>
															</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group mb-3">
														<label>Open Parking* </label>
															<select class="form-control"  name="property[openParking]" required style="width:100%;">
																	<option value="<?php echo isset($property['openParking'])?$property['openParking']:"1" ?>">1</option>
																	<option value="<?php echo isset($property['openParking'])?$property['openParking']:"2" ?>">2</option>
																	<option value="<?php echo isset($property['openParking'])?$property['openParking']:"3" ?>">3</option>
															</select>
													</div>
												</div>
												<div class="col-md-4">
																<div class="form-group mb-3">
																	<label>Facing* </label>
																	<select class="form-control"  name="property[propertyfacing]" required style="width:100%;">
																		<option value="<?php echo isset($property['propertyfacing'])?$property['propertyfacing']:"North" ?>">North</option>
																		<option value="<?php echo isset($property['propertyfacing'])?$property['propertyfacing']:"East" ?>">East</option>
																		<option value="<?php echo isset($property['propertyfacing'])?$property['propertyfacing']:"West" ?>">West</option>
																		<option value="<?php echo isset($property['propertyfacing'])?$property['propertyfacing']:"South" ?>">South</option>
																		<option value="<?php echo isset($property['propertyfacing'])?$property['propertyfacing']:"North-East" ?>">North-East</option>
																		<option value="<?php echo isset($property['propertyfacing'])?$property['propertyfacing']:"North-West" ?>">North-West</option>
																		<option value="<?php echo isset($property['propertyfacing'])?$property['propertyfacing']:"South-East" ?>">South-East</option>
																		<option value="<?php echo isset($property['propertyfacing'])?$property['propertyfacing']:"South-West" ?>">South-West</option>
																	</select>
																</div>
												</div>
												<div class="col-md-4">
																<div class="form-group mb-3">
																	<label>Available For* </label>
																	<select class="form-control"  name="property[availableFor]" required style="width:100%;">
																		<option value="<?php echo isset($property['availableFor'])?$property['availableFor']:"Family" ?>">Family</option>
																		<option value="<?php echo isset($property['availableFor'])?$property['availableFor']:"Bachelors" ?>">Bachelors</option>
																		<option value="<?php echo isset($property['availableFor'])?$property['availableFor']:"Company" ?>">Company</option>
																	</select>
																</div>
												</div>
												<div class="col-md-4">
																<div class="form-group mb-3">
																	<label>Negotiable*</label>
																	<select class="form-control"  name="property[negotiableProperty]" required style="width:100%;">
																		<option value="<?php echo isset($property['negotiableProperty'])?$property['negotiableProperty']:"Yes" ?>">Yes</option>
																		<option value="<?php echo isset($property['negotiableProperty'])?$property['negotiableProperty']:"No" ?>">No</option>
																	</select>
																</div>
												</div>
												<div class="col-md-4">
																<div class="form-group mb-3">
																	<label>Tax and Govt Charge Included?*</label>
																	<select class="form-control"  name="property[negotiableTax]" required style="width:100%;">
																		<option value="<?php echo isset($property['negotiableTax'])?$property['negotiableTax']:"Yes" ?>">Yes</option>
																		<option value="<?php echo isset($property['negotiableTax'])?$property['negotiableTax']:"No" ?>">No</option>
																	</select>
																</div>
												</div>
												<div class="col-md-4">
																<div class="form-group mb-3">
																	<label>DG and UPS Charge Included?* </label>
																	<select class="form-control"  name="property[negotiableDGUPS]" required style="width:100%;">
																		<option value="<?php echo isset($property['negotiableDGUPS'])?$property['negotiableDGUPS']:"Yes" ?>">Yes</option>
																		<option value="<?php echo isset($property['negotiableDGUPS'])?$property['negotiableDGUPS']:"No" ?>">No</option>
																	</select>
																</div>
												</div>
												<div class="col-md-4">
																<div class="form-group mb-3">
																	<label>Water charge included?*</label>
																	<select class="form-control"  name="property[negotiableWaterCharge]" required style="width:100%;">
																		<option value="<?php echo isset($property['negotiableWaterCharge'])?$property['negotiableWaterCharge']:"Yes" ?>">Yes</option>
																		<option value="<?php echo isset($property['negotiableWaterCharge'])?$property['negotiableWaterCharge']:"No" ?>">No</option>
																	</select>
																</div>
												</div>
												<div class="col-md-4">
																<div class="form-group mb-3">
																	<label>Suitable For*</label>
																	<select class="form-control"  name="property[suitableFor]" required style="width:100%;">
																		<option value="<?php echo isset($property['negotiableWaterCharge'])?$property['negotiableWaterCharge']:"Jewellery" ?>">Jewellery</option>
																		<option value="<?php echo isset($property['negotiableWaterCharge'])?$property['negotiableWaterCharge']:"Gym" ?>">Gym</option>
																		<option value="<?php echo isset($property['negotiableWaterCharge'])?$property['negotiableWaterCharge']:"Grocery" ?>">Grocery</option>
																		<option value="<?php echo isset($property['negotiableWaterCharge'])?$property['negotiableWaterCharge']:"Clinic" ?>">Clinic</option>
																		<option value="<?php echo isset($property['negotiableWaterCharge'])?$property['negotiableWaterCharge']:"Pharmacy" ?>">Pharmacy</option>
																		<option value="<?php echo isset($property['negotiableWaterCharge'])?$property['negotiableWaterCharge']:"Clothing" ?>">Clothing</option>
																		<option value="<?php echo isset($property['negotiableWaterCharge'])?$property['negotiableWaterCharge']:"Hardware" ?>">Hardware</option>
																		<option value="<?php echo isset($property['negotiableWaterCharge'])?$property['negotiableWaterCharge']:"Others" ?>">Others</option>
																	</select>
																</div>
												</div>
												<div class="col-md-4">
																<div class="form-group mb-3">
																	<label>Construction Type* </label>
																	<select class="form-control"  name="property[constructionType]" required style="width:100%;">
																		<option value="<?php echo isset($property['constructionType'])?$property['constructionType']:"Move" ?>">No Walls</option>
																		<option value="<?php echo isset($property['constructionType'])?$property['constructionType']:"Under Construction" ?>">Brick Walls</option>
																		<option value="<?php echo isset($property['constructionType'])?$property['constructionType']:"Move" ?>">Cemented Walls</option>
																		<option value="<?php echo isset($property['constructionType'])?$property['constructionType']:"Under Construction" ?>">Plastered Walls</option>
																	</select>
																</div>	
												</div>
												<div class="col-md-4">
																<div class="form-group mb-3">
																	<label>Entrance Width*</label>
																	<select class="form-control"  name="property[entranceWidth]" required style="width:100%;">
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"8ft" ?>">8ft</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"9ft" ?>">9ft</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"10ft" ?>">10ft</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"11ft" ?>">11ft</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"12ft" ?>">12ft</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"10ft" ?>">13ft</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"11ft" ?>">14ft</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"12ft" ?>">15ft</option>
																	</select>
																</div>
												</div>
												<div class="col-md-4">
																<div class="form-group mb-3">
																	<label>Ceiling Height*</label>
																	<select class="form-control"  name="property[ceilingHeight]" required style="width:100%;">
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"8ft" ?>">8ft</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"9ft" ?>">9ft</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"10ft" ?>">10ft</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"11ft" ?>">11ft</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"12ft" ?>">12ft</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"10ft" ?>">13ft</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"11ft" ?>">14ft</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"12ft" ?>">15ft</option>
																	</select>
																</div>
												</div>
												<div class="col-md-4">
													<div class="form-group mb-3">
																		<label>Hub*</label>
																		<select class="form-control"  name="property[hub]" required style="width:100%;">
																			<option value="<?php echo isset($property['hub'])?$property['hub']:"Mall" ?>">Mall</option>
																			<option value="<?php echo isset($property['hub'])?$property['hub']:"Market" ?>">Market</option>
																			<option value="<?php echo isset($property['hub'])?$property['hub']:"Retail Complex/Building" ?>">Retail Complex/Building</option>
																			<option value="<?php echo isset($property['hub'])?$property['hub']:"Commercial Project" ?>">Commercial Project</option>
																			<option value="<?php echo isset($property['hub'])?$property['hub']:"Others" ?>">Others</option>
																		</select>
													</div>
												</div>
												<div class="col-md-4">
																<div class="form-group mb-3">
																	<label>Located Near*</label>
																	<select class="form-control"  name="property[locatedNear]" required style="width:100%;">
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"Entrance" ?>">Entrance</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"Elevator" ?>">Elevator</option>
																		<option value="<?php echo isset($property['hub'])?$property['hub']:"Stairs" ?>">Stairs</option>
																	</select>
																</div>
												</div>
												<div style="clear:both;"></div>	
												</div>
												<div class="col-md-12 text-center">
													<div id="successMsg"></div>
														<button class="btn btn-success" type="submit" style="background-color:#0bb197;">Save</button>
														<button onclick="$('.addform').slideUp()" class="btn btn-outline-danger" type="button">Cancel</button>
												</div>	
											    <div style="clear:both;"></div>
											 </form>
                           				</div>
									</div>
                        <div class="card">
                                    <div class="card-body">
											<div style='float: right; margin-bottom: 10px;'>
												<a class="btn btn-success" href="<?php echo site_url('administrator/property/view/new'); ?>" style="background-color:#0bb197;">Add New</a>
											</div>
											<div style='clear:both;'></div>
											<div style="overflow-x:auto;">
											<table id="tabeldatahere" class="table table-striped">
													<thead>
														<tr>
																<th>#</th>
																<th>Property_Title</th>
																<th>PostedBy</th>
																<th>Sell_Rent</th>
																<th>Property_Status</th>
																<th>Zone_Type</th>
																<th>Property_Available_From</th>
																<th>Property_City</th>
																<th>Date</th>
																<th>Status</th>
																<th>Actions</th>
															</tr>								
													</thead>          
												<tbody>
													<?php		
													if(!empty($GetProperty))
														{
															foreach($GetProperty as $singi)
																{
																	?>
																			<tr>
																				<td><?php echo $singi['propertyId']; ?></td>
																				<td><?php echo $singi['propertyTitle']; ?></td>
																				<td><?php echo $singi['postedby']; ?></td>
																				<td><?php echo $singi['propertyType']; ?></td>
																				<td><?php echo $singi['propertyStatus']; ?></td>
																				<td><?php echo $singi['zoneType']; ?></td>
																				<td><?php echo $singi['propertyAvailable']; ?></td>
																				<td><?php echo $singi['propertyCity']; ?></td>
																				<td><?php echo showtime4db($singi['created']);?></td>
																				<td><?php echo !empty($singi['status'])?"<button onclick='updatestatus(this);' t='property' i='propertyId' v='$singi[propertyId]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='property' i='propertyId' v='$singi[propertyId]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
																				<td><a class="fa fa-edit" href="<?php echo base_url("administrator/property/view/$singi[propertyId]"); ?>"></a></td>
																			</tr>
																	<?php
																}
														}
													?>
												</tbody>
											</table>
										</div>
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
                <!-- End Page-content -->
				
				
				<script>
			$(document).ready(function(){
					$("select").change(function(){
					value=document.getElementById("zoneType").value;
					if(value=="Commercial"){
						$("#propertyTypeCommercial").removeAttr("disabled"); 
						$("#propertyTypeCommercial").removeAttr("hidden");
						$("#propertyTypeResidential").attr("hidden",true);
						$("#propertyTypeIndustrial").attr("hidden",true);
						$("#propertyTypeOther").attr("hidden",true);
						$("#propertyTypeSEZ").attr("hidden",true);
					}
					if(value=="Residential"){
						$("#propertyTypeResidential").removeAttr("hidden");
						$("#propertyTypeCommercial").attr("hidden",true);
						$("#propertyTypeIndustrial").attr("hidden",true);
						$("#propertyTypeSEZ").attr("hidden",true);
						$("#propertyTypeOther").attr("hidden",true);
					}
					if(value=="Industrial"){ 
						$("#propertyTypeIndustrial").removeAttr("hidden");
						$("#propertyTypeResidential").attr("hidden",true);
						$("#propertyTypeCommercial").attr("hidden",true);
						$("#propertyTypeSEZ").attr("hidden",true);
						$("#propertyTypeOther").attr("hidden",true);
					}
					if(value=="Others")
					{  
						$("#propertyTypeOther").removeAttr("hidden");
						$("#propertyTypeIndustrial").attr("hidden",true);
						$("#propertyTypeResidential").attr("hidden",true);
						$("#propertyTypeCommercial").attr("hidden",true);
						$("#propertyTypeSEZ").attr("hidden",true);
					}
					if(value=="Special Economic Zone"){
						$("#propertyTypeSEZ").removeAttr("hidden");
						$("#propertyTypeIndustrial").attr("hidden",true);
						$("#propertyTypeResidential").attr("hidden",true);
						$("#propertyTypeCommercial").attr("hidden",true);
						$("#propertyTypeOther").attr("hidden",true);
					}
					if(value=="Agriculture Zone"){
						$("#propertyTypeOther").removeAttr("hidden");
						$("#propertyTypeIndustrial").attr("hidden",true);
						$("#propertyTypeResidential").attr("hidden",true);
						$("#propertyTypeCommercial").attr("hidden",true);
						$("#propertyTypeSEZ").attr("hidden",true);
					}		
				});
			 });
			/*----Slider Range-------*/
				function slider(name){  
					var slider = document.getElementById(name);
					var output = document.getElementById("amount"+name);
					output.innerHTML = slider.value;
					slider.setAttribute("value",slider.value);
					slider.oninput = function() {  
					output.innerHTML = this.value;
					slider.value=this.value;
					slider.setAttribute("value",this.value);
				 }
			}
			/*--var slider = document.getElementById("myRange");
				var output = document.getElementById("amount");
				output.innerHTML = slider.value;
				
				slider.oninput = function() {  
				output.innerHTML = this.value;
				}
			----Slider Range---------*/
		</script>
                <?php $this->load->view('admin/include/newfooter'); ?>


