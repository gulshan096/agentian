
		

<?php  $this->load->view('admin/include/header')  ?>
<style>
			img {
				  border: 1px solid #ddd;
				  border-radius: 4px;
				  padding: 5px;
				  width: 80px;
				}
		</style>
		
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Manage Vehicles</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Vehicles</a></li>
                                            <li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <style>
								<?php
										if(empty($openform))
											{
												echo " .addform { display:none; } ";		
											}
								?>
                        </style>

        			<div class="row" id="vehicleDetails" style="display:block;">
                       <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
										<div class="row" style="margin-bottom:2%;">
											<div class="col-md-5"  >
												<p id="msgBox" class="form-control" style="margin-top:0;"><b>Choose a Vehicle from list to assign to the order #65685</b></p>
											</div>
											<div class="col-md-1" style="margin-left:36%;max-width: 9%;">
												<a  class="btn btn-default" href="<?php echo base_url("administrator/activity/view/0"); ?>" style="background-color:#9fdfbf;margin-left: -361%;">Cancel</a>
											</div>
											<div class="col-md-2" style="max-width:14%;">
												<button type="button" class="btn btn-default" onclick="" style="background-color:#9fdfbf;margin-left:-207%;">Assign Maintenance</button>
											</div>
											<div class="col-md-3" style="max-width: 11%;margin-left:-27%;">
												<button type="button" class="btn btn-default" onclick="printMsg()" style="background-color:#9fdfbf;">Assign to Order</button>
											</div>
										</div>
										
					<div style='clear:both;'></div>
					<div class="row" style="width:100%;">
							<table id="tabeldatahere" class="table table-striped">
							<thead>
								<tr>
									<th><input type="checkbox" id="vehicle0"  name="vehicle1" value="Bike"></th>
									<th>Status</th>
									<th>Plate Number</th>
									<th>Type</th>
									<th>Driver</th>
									<th>Capacity</th>
								</tr>
							</thead>
									<tbody>
										<?php
											/*if(!empty($GetOrders))
												{	
												 foreach($GetOrders as $single)
													{ */
											            ?>
														     <tr>
																	<td><input type="checkbox" id="vehicle1"  name="vehicle1" onclick="<?php echo base_url("administrator/dispatch/view2/0"); ?>" value="Bike"></td>
																	<td><a class='fas fa-user-check' style='font-size:24px'><label style="font-family:georgia,garamond,serif;font-size:16px;font-style:arial;color:#22bb22;">Available</label></a></td>
																	<td><a class="fas fa-location-arrow" onclick="assignDriver()" style='font-size:24px'></a>3UNC68</td>
																	<td>Truck</td>
																	<td>Not Assigned</td>
																	<td>8,860</td>
															 </tr>
															 <tr>
															 		<td><input type="checkbox" id="vehicle2"  name="vehicle1" value="Bike"></td>
																	<td><a class='fas fa-user-check' style='font-size:24px'><label style="font-family:georgia,garamond,serif;font-size:16px;font-style:arial;color:#22bb22;">Available</label></a></td>
																	<td><a class="fas fa-location-arrow" style='font-size:24px'></a>5JK456</td>
																	<td>Van</td>
																	<td>Cubero Lucas</td>
																	<td>2,490</td>
															 </tr>
															 <tr>
															 		<td><input type="checkbox" id="vehicle3"  name="vehicle1" value="Bike"></td>
																	<td><a class='fas fa-user-check' style='font-size:24px'><label style="font-family:georgia,garamond,serif;font-size:16px;font-style:arial;color:#22bb22;">Available</label></a></td>
																	<td><a class="fas fa-location-arrow" style='font-size:24px'></a>7TYWEWR</td>
																	<td>Semi-Trailer Truck</td>
																	<td>Jarrod Russel</td>
																	<td>2,490</td>
															 </tr>
															 <tr>
															 		<td><input type="checkbox" id="vehicle4"  name="vehicle1" value="Bike"></td>
																	<td><a class='fas fa-user-check' style='font-size:24px'><label style="font-family:georgia,garamond,serif;font-size:16px;font-style:arial;color:#22bb22;">Available</label></a></td>
																	<td><a class="fas fa-location-arrow" style='font-size:24px'></a>67FFGGF</td>
																	<td>Van</td>
																	<td>Not Assigned</td>
																	<td>4,490</td>
															 </tr>
															 <tr>
															 		<td><input type="checkbox" id="vehicle3"  name="vehicle1" value="Bike"></td>
																	<td><a class='fas fa-user-check' style='font-size:24px'><label style="font-family:georgia,garamond,serif;font-size:16px;font-style:arial;color:#22bb22;">Available</label></a></td>
																	<td><a class="fas fa-location-arrow" style='font-size:24px'></a>7TYWEWR</td>
																	<td>Semi-Trailer Truck</td>
																	<td>Conall Paterson</td>
																	<td>5,490</td>
															 </tr>
																<tfoot>
																<tr>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td colspan="" style="float:right;">
																		<a class="fa fa-edit center" href="<?php echo base_url("administrator/orders/view2/0"); ?>"></a>
																	</td>
																</tr>
															  </tfoot>
															<?php
															/*}
															} */
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
						<!-----------------------Start of Assign Driver to Vehicle Details-------------------------------------------->
						<div class="row" id="driverToVehicle" style="display:none;">
							<div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
											<div class="row singleVehicle">
												<h4>Vehicles <i class='fas fa-angle-right' style='font-size:26px'></i> 6LK C74</h4>
												<div class="row" >
													<div class="col-md-6">
														<div class="row" >
															<div class="col-md-1" style="max-width: 0.333333%;"><i class='fas fa-circle' style='font-size:16px;color:#04aa6d;'></i></div>
															<div class="col-md-3" style="max-width: 19%;"><h5 style="color:#2e6ce5;">6LK C74</h5></div>
															<div class="col-md-3"><button style="border-radius:10px;color:#2e6ce5;border-color:#2e6ce5;">Assigned</button></div>
															<div class="col-md-5"><img src="<?php echo base_url("assets/image/p1.jpg"); ?>" style="width:40%;" alt="Paris"></div>
														</div>
														<div class="row" style="padding-left:3%;"><h6 style="color:#2e6ce5;">Assign to Order #1232434</h6></div>
														<div class="row" >
															<table class="table">
																<tbody>
																	<tr>
																		<td>Type</td>
																		<td>Box Truck</td>
																	</tr>
																		<td>Model,Year</td>
																		<td>Kenworth T270,2017</td>
																	</tr>
																	<tr>
																		<td>Fuel Economy</td>
																		<td>8.2 mpg</td>
																	</tr>
																	<tr>
																		<td>Average Speed</td>
																		<td>55 mph</td>
																	</tr>
																	<tr>
																		<td>Mileage</td>
																		<td>81,974 mi</td>
																	</tr>
																	<tr>
																		<td>Capacity</td>
																		<td>8,860 lb</td>
																	</tr>
															    </tbody>
															</table>
														</div>
														<div class="row" style="width:90%;border:groove 2px;">
															<div class="head row" class="form-control">
																<h3 style="font-size:25px;color:blue;">Driver</h3>
															</div>
															<div class="row" class="form-control">
																<b>Not Assigned</b>
															</div>
															<div class="row" class="form-control">
																<button class="form-control" style="width:50%;margin:10%;background-color:#2e6ce5;color:white;"><i class='far fa-user-circle' style="color:white;margin-right:10%;"></i>Assign a Driver</button>
															</div>
														</div>
													</div>
													<div class="col-md-6">
													<div class="row">
														<table class="table">
															<tbody>
																<tr>
																	<td><h4 style="color:#2e6ce5;">Maintenance</h4></td>
																	<td><h6 style="float:right;color:#2e6ce5;">View All<i class='fas fa-angle-right' style='font-size:26px'></i></h6></td>
																</tr>
																<tr>
																	<td><h6 style="color:#2e6ce5;">Last</h6></td>
																	<td><h6 style="float:right;color:#2e6ce5;">Tire Change 06/25/2020</h6></td>
																</tr>
																<tr>
																	<td><h6 style="color:#2e6ce5;">Planned</h6></td>
																	<td><h6 style="float:right;color:#2e6ce5;">Monthly Checkup 08/15/2020</h6></td>
																</tr>
																<tr>
																	<td colspan="2">
																		<button class="form-control" style="background-color:#2e6ce5;color:white;margin-left:25%;width:50%;">Schedule Maintenance</button>
																	</td>
																</tr>
															</tbody>
														</table>
														</div>
														<div class="row">
														<table class="table">
															<thead>
																<th><h4 style="color:#2e6ce5;">Recent Events</h4></th>
																<th></th>
																<th><h6 style="float:right;color:#2e6ce5;">View All<i class='fas fa-angle-right' style='font-size:26px'></i></h6></th>
															</thead>
															<thead>
																<th>Event Type</th>
																<th>Subject</th>
																<th>Generated On</th>
															</thead>
															<tbody>
																<tr>
																	<td><button type="button" class="btn btn-success" style="background-color:white;border-radius:20px;color:green;width:50%;"><i class="fa fa-check-circle" style="margin-top:4%;float:left;color:green"></i>Success</button></td>
																	<td>The Cargo Was delivered on time.</td>
																	<td>Yesterday at 8:11 pm</td>
																</tr>
																<tr>
																	<td><button type="button" class="btn btn-info" style="background-color:white;border-radius:20px;color:blue;width:50%;"><i class="fa fa-info-circle" style="color:blue;margin-top:4%;float:left;"></i>Info</button></td>
																	<td><h6 style="">New trip is started.</h6></td>
																	<td><h6 style="">Yesterday at 2:55 pm</h6></td>
																</tr>
																<tr>
																	<td><button type="button" class="btn btn-info" style="background-color:white;border-radius:20px;color:#eba834;width:50%;"><i class="fa fa-exclamation-circle" style="margin-top:4%;float:left;color:#eba834;"></i>Warning</button></td>
																	<td><h6 style="">Fuel Level is extremely low.</h6></td>
																	<td><h6 style="">08/15/2020 at 11:55 AM</h6></td>
																</tr>
															</tbody>
														</table>
														</div>
													</div>
												</div>
											</div>
											<!-- end of Single Vehicle Row -->
									</div>
									<!-- end card-body -->
							    </div>
								<!-- end card -->
							</div>
							 <!-- end col -->
						</div>
						<!-- end row -->
						<!-----------------------End of Single Vehicle Details-------------------------------------------->
                        
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <script>
					function printMsg(){ 
						
						document.getElementById("msgBox").innerHTML = '<p class="form-control" style="background-color:#9fdfbf;margin:1%;"><b>"The Vehicle 3UNC68 is assigned successfully to the Order #4729"</b></p>';
						setTimeout(() => {
							const msgBox = document.getElementById('msgBox');
							msgBox.style.display = 'none';
						}, 1000);
					}
					function assignDriver(){
						document.getElementById("vehicleDetails").style.display="none";
						document.getElementById("driverToVehicle").style.display="block";
					}
		        </script>
				
				<?php $this->load->view('admin/include/newfooter');  ?>
