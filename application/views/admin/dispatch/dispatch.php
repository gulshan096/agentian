
		
<?php $this->load->view('admin/include/header');  ?>

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
                  <div class="row">
					<div id="successMsg" style="display:none;"><p class="form-control" style="background-color:#0bb197;width:50%;margin:1%;">Success:Product has been added Successfully!!!</p></div>
                       <div class="col-xl-12" >
                          <div class="card addform" id="addDispatch" style="display:none;">
                              <div class="card-body">
								<form action="<?php echo base_url('administrator/dispatch/view1/0'); ?>" method="POST" class="row">
									<input value="<?php echo !empty($users['id'])?$users['id']:0; ?>" name="products[id]" type="hidden" />
										<div class="row" style="margin-bottom:1%;margin-left:3%;">
											<div class="col-md-2" style="width: 9.66667%;">
												<label>Customer Name</label>
											</div>
											<div class="col-md-6">
												<?php
													$customers = array ("Select Customer","Registered Customer","Oveseas customer","SEZ Customer","Deemed Export Customer","Unregistered Customer","Composition Registered Customer","Consumer Customer");
													echo '<select name="customer" id="customer" style="width: 40%;height: 100%;">';
													for ($row = 0; $row < 7; $row++) {
															echo '<option value="">'.$customers[$row].'</option>';
													}
													echo '</select>'; 
												?>
											</div>
										</div>
										<div class="row" style="margin-bottom:2%;margin-left:3%;">
												<div class="col-md-2" style="width: 9.66667%;">
													<label>Order No.</label>
												</div>
												<div class="col-md-6">
													<?php
														$orders = array ("Select Order","#1234","#34356","#566767","#986785","#689999","#7845666","#9007564");
														echo '<select name="order" id="order_no" style="width: 40%;height: 100%;" >';
														for ($row = 0; $row < 7; $row++) {
																echo '<option value="">'.$orders[$row].'</option>';
														}
														echo '</select>'; 
													?>
												</div>
										</div>
										
										<div class="row" id="show_onselect" style="width:100%;display:none;">
										<div class="row" style="margin-bottom:2%;margin-left:3%;">
												<div class="col-md-2" style="width: 9.66667%;">
													<label>Package Slip</label>
												</div>
												<div class="col-md-6">
													<?php $pkg = array ("PKG-1234","PKG-34356","PKG-566767","PKG-986785","PKG-689999","PKG-7845666","PKG-9007564"); ?>
													<input type="text" value="<?php echo $pkg[1]; ?>" style="width: 41%;height: 100%;margin-left: 6.5px;" >
												</div>
										</div>

										<div class="row" style="margin-bottom:2%;margin-left:3%;">
												<div class="col-md-2" style="width: 9.66667%;">
													<label>Date*</label>
												</div>
												<div class="col-md-6">
													<input type="date" value="<?php echo date("Y-m-d"); ?>" style="width: 41%;height: 100%;margin-left:6.5px;" >
												</div>
										</div>
										<!-- Toggle Button -->
										<div class="custom-control custom-switch" style="margin-left: 3%;">
											<input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
											<label class="custom-control-label" for="customSwitch1">You can manually include items to be dispatched from the  order by enabling the above option.</label>
											</div>
										<!-- Toggle Button -->
										<div class="table-responsive">
											<table class="table-bordered" style="width:60%;margin:2%;">
												<thead>
													<th style="">ITEMS & DESCRIPTION</th>
													<th style="text-align: center;">ORDERED</th>
													<th style="text-align: center;">Dispatched</th>
													<th style="text-align: center;">Quantity_To_Dispatch</th>
												</thead>
												<tbody>
													<tr>
														<td style="">Item1<br> Item 1 - Sales Description</td>
														<td style="text-align: center;">76265</td>
														<td style="text-align: center;">51781</td>
														<td style="width:15%;"><p style="float:right;">7451 <br> Stock on Hand:<br> undefined.00 Ltr<br><i class='fas fa-chevron-circle-down' style="margin-left: 84%;"></i></p></td>
													</tr>
													<tr>
														<td style="">Item2<br> Item 2 - Sales Description</td>
														<td style="text-align: center;">76265</td>
														<td style="text-align: center;">51781</td>
														<td style="width:15%;"><p style="float:right;">7451 <br> Stock on Hand:<br> undefined.00 Ltr<br><i class='fas fa-chevron-circle-down' style="margin-left: 84%;"></i></p></td>
													</tr>
													<tr>
														<td style="">Item3<br> Item 3 - Sales Description</td>
														<td style="text-align: center;">76265</td>
														<td style="text-align: center;">51781</td>
														<td style="width:15%;"><p style="float:right;">7451 <br> Stock on Hand:<br> undefined.00 Ltr<br><i class='fas fa-chevron-circle-down' style="margin-left: 84%;"></i></p></td>
													</tr>
													<tr>
														<td>Item4<br> Item 4 - Sales Description</td>
														<td style="text-align: center;">76265</td>
														<td style="text-align: center;">51781</td>
														<td style="width:15%;"><p style="float:right;">7451 <br> Stock on Hand:<br> undefined.00 Ltr<br><i class='fas fa-chevron-circle-down' style="margin-left: 84%;"></i></p></td>
													</tr>
												</tbody>											
											</table>
										</div>
										<div class="row" style="margin-left:1%;">
											<div class="col-md-12">
												<label for="InternalUse">Internal Use</label>
											</div><br>
											<div class="col-md-6">
												<textarea style="width: 57%;"></textarea>
											</div>
										</div>
										</div>
										
										
									<div style="clear:both;"></div>
									<div class="col-md-6"  style="margin-left: 20%;">
										
									</div>
									<div style="clear:both;"></div>	
									<div class="col-md-12 text-center">
										<button class="btn btn-primary" onclick="createDispatch()" type="submit" style="background-color:#0bb197;"><?php echo !empty($users['id'])?"Update Product":"Add Dispatch"; ?></button>
									</div>	
									<div style="clear:both;"></div>
								</form>		
                           </div>
						</div>
                                <div class="card">
                                    <div class="card-body">
											<div style='float: right; margin-bottom: 10px;'>
												<a class="btn btn-success" onclick="addDispatch()" href="#" style="background-color:#0bb197;">Add New Dispatch</a>
											</div>
											<div style='clear:both;'></div>
											<?php  ?>
											<div class="table-responsive">
											<table id="tabeldatahere" class="table table-striped">
												<thead>
													<tr>
														<!--th>Role</th-->
														<th>DispatchDate</th>
														<th>Dispatch#</th>
														<th>Carrier</th>
														<th>Order#</th>
														<th>Shipment_Date</th>
														<th>Customer_Name</th>
														<th>Quantity</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
											<tr>
												<td>22-3-2022</td>
												<td>#3456</td>
												<td></td>
												<td>#SO 001</td>
												<td>22-3-2022</td>
												<td>Shailendra Roy</td>
												<td>5 items</td>
												<td>
												<a class="fa fa-envelope"></a>
												<a class="fa fa-download"></a>
												<a class="fa fa-trash"></a>
												<a class="fa fa-edit"></a>
												<!--a class="fa fa-edit" href="<?php echo base_url("administrator/dispatch/view/0"); ?>"></a-->
												</td>
											</tr>
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
				
				<script>

			$(document).ready(function(){
			$("#order_no").change(function(){
				$("#show_onselect").toggle();
			});
			});

			function addDispatch(){
				document.getElementById("addDispatch").style.display='block';
			}
			function createDispatch(){
				document.getElementById("addDispatch").style.display = "none";
				document.getElementById("successMsg").style.display = "block";
				setTimeout(() => {
					const msgBox = document.getElementById('successMsg');
					msgBox.style.display = 'none';
				}, 1000);
			}	
			function non_taxable(){
				document.getElementById("Exemp").style.display = "block";
				document.getElementById("Exemp2").style.display = "block";
			}

			$(document).ready(function(){
			$('[data-toggle="mpn"]').tooltip();   
			});
			$(document).ready(function(){
			$('[data-toggle="upc"]').tooltip();   
			});
			$(document).ready(function(){
			$('[data-toggle="isbn"]').tooltip();   
			});
			$(document).ready(function(){
			$('[data-toggle="ean"]').tooltip();   
			});
			
		</script>
               <?php $this->load->view('admin/include/newfooter');  ?>
