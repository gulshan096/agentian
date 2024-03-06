<?php $this->load->view('admin/include/header'); ?>
        <style>
			.box_header{
						border-radius: 0px;
						background-color:#0bb197;
						width: 300px;
						border: 0px groove blue;
						padding: 15px;
						margin: 0px;
						color:white;
						font-size:20px;
						text-align:left;
						}
			.box_body{
  						border-radius: 0px;background-color: white;width: 300px;border-style: ridge;
  						border-color: lightgrey;padding: 15px;margin: 0px;
					}
			.box_content{
						float:right;margin-top: -14px;font-size:35px;color:rgb(46 108 229);
						}
		</style>
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Manage Dispatch</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Dispatch</a></li>
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
                  <div class="row">
                       <div class="col-xl-12">
                          <div class="card addform">
                              <div class="card-body">
							  		<div class="col-md-3">	
										<div class="form-floating mb-3">
												<input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="dealer_name" maxlength="100" required type="text" class="form-control"  />
												<label>Timestamp*</label> 
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-floating mb-3">
												<input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="dealer_name" maxlength="100" required type="text" class="form-control"  />
												<label>Invoice No.*</label> 
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-floating mb-3">
												<input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="dealer_name" maxlength="100" required type="text" class="form-control"  />
												<label>Party Name*</label> 
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-floating mb-3">
											<input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="dealer_name" maxlength="100" required type="text" class="form-control"  />
											<label>Order No.*</label> 
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-floating mb-3">
												<input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="dealer_name" maxlength="100" required type="text" class="form-control"  />
												<label>Quantity*</label> 
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating mb-3">
												<input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="dealer_name" maxlength="100" required type="text" class="form-control"  />
												<label>Dispatched on*</label> 
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating mb-3">
												<input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="dealer_name" maxlength="100" required type="text" class="form-control"  />
												<label>Transporter Name*</label> 
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating mb-3">
												<input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="dealer_name" maxlength="100" required type="text" class="form-control"  />
												<label>Transporter Mobile No.*</label> 
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating mb-3">
												<input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="dealer_name" maxlength="100" required type="text" class="form-control"  />
												<label>Vehicle No.*</label> 
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating mb-3">
												<input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="dealer_name" maxlength="100" required type="text" class="form-control"  />
												<label>Location*</label> 
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating mb-3">
													<label for="currency" class="form-control" style="padding-top: 0.625rem;"> Dealer Type:</label>
													<select name="currency" id="currency" class="form-control">
													  <option value="INR">Dealer</option>
													  <option value="BND">Sub-Dealer</option>
													  <option value="BND" selected>Distributer</option>
													  <option value="BND">Trader</option>
													  <option value="BND">Retailer</option>
													</select>
											</div>
										</div>
										<div style='margin-left: 40%;margin-bottom: 10px;'>
											<a class="btn btn-success" href="" >Add Dispatch</a>
										</div>
									</div>
                           		</div>
						</div>
                        <div class="card">
                            <div class="card-body">
								<div class="row">
										<div class="col-md-8"></div>
										<div class="col-md-4 mb-2">
											<a class="btn btn-success" href="<?php echo base_url('administrator/dispatch/view1/new'); ?>" style="float:right;background-color:#0bb197;">Add New Dispatch</a>
										</div>
								</div>
								<div style='clear:both;'></div>
								<div class="row mb-5">
									<div class="col-md-4">
										<div class="box_header">Vehicles<i class='fas fa-angle-right' style='float:right;font-size:24px'></i></div>
										<div class="box_body">Total <p class="box_content">101</p></div>
										<div class="box_body">Available <p class="box_content" style="color:green">38</p></div>
										<div class="box_body">Out of Service <p class="box_content" style="color:red">3</p></div>
									</div>
									<div class="col-md-4">
										<div class="box_header">Drivers<i class='fas fa-angle-right' style='float:right;font-size:24px'></i></div>
										<div class="box_body">Total <p class="box_content">94</p></div>
										<div class="box_body">Available <p class="box_content" style="color:green">32</p></div>
										<div class="box_body">Banned <p class="box_content" style="color:red">2</p></div>
									</div>
										
									<div class="col-md-4">
										<div class="box_header">Trips<i class='fas fa-angle-right' style='float:right;font-size:24px'></i></div>
										<div class="box_body">Finished <p class="box_content">142</p></div>
										<div class="box_body">Live <p class="box_content" style="color:green">60</p></div>
										<div class="box_body">Cancelled <p class="box_content" style="color:red">4</p></div>
									</div>
								</div>
								<div class="row">
										<div class="col-md-4">
											<div class="box_header">Packages,Not Shipped<i class='fas fa-angle-right' style='float:right;font-size:24px'></i></div>
											<div class="box_body">Total <p class="box_content">101</p></div>
										</div>
										<div class="col-md-4">
											<div class="box_header">Shipped Packages<i class='fas fa-angle-right' style='float:right;font-size:24px'></i></div>
											<div class="box_body">Total <p class="box_content">101</p></div>
										</div>
										<div class="col-md-4">
											<div class="box_header">Delivered Packages<i class='fas fa-angle-right' style='float:right;font-size:24px'></i></div>
											<div class="box_body">Total <p class="box_content">101</p></div>
										</div>
								</div>
								
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

                <?php $this->load->view('admin/include/newfooter'); ?>
