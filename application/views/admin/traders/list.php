<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $seo['title']; ?></title>
        <meta content="<?php echo $seo['description']; ?>" name="description" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo BASE_HTTP_REL_URL; ?>/favicon2.ico" />
        <!-- jvectormap -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />
        <!-- Bootstrap Css -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<!--Modal Links-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
		<!--Modal Links-->
		
		<style>
				label { font-weight: 400; }
				body { background: #f5f5f5; }
		</style>
		
    </head>

    <body data-sidebar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <?php echo $sidebarleft; ?>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
						<?php echo $sidemenu; ?>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
							<!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Manage Traders</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Traders</a></li>
                                            <li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                       
								<?php
										// echo " # $openform # ";
										if(empty($openform))
											{
												echo "  <style> .addform { display:none; }   </style>";		
											}
											
								?>
                        

                  <div class="row">
                       <div class="col-xl-12" >
						
                          <div class="card addform" id="newDealer">
                              <div class="card-body" >
							  
								<form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('administrator/Traders/saverecords?token='.md5(time())); ?>','#createForm1','#successMsg')">
								
									<input value="<?php echo !empty($traders['tid'])?$traders['tid']:0; ?>" name="traders[tid]" type="hidden" />
									
									
									
								<h6>Personal Information</h6>	
								<div class="row">	
									<div class="col-md-8">
										<div class="form-group mb-3" >
											<label> Select Vendor Type:*</label> 
											<select name="traders[type]" class="form-control" >
											
											
				
	<?php
			$Get_Trader_Types	=	Get_Trader_Types();
				foreach($Get_Trader_Types as $s)
					{
						echo " <option ".is_selected(!empty($traders['type'])?$traders['type']:'',$s)." value='$s'>$s</option>  ";
					}
	?>							
											</select>
										</div>
									
									
										<div class="form-group mb-3">
											<label> Full Name*</label> 
											<input value="<?php echo isset($traders['name'])?$traders['name']:""; ?>" name="traders[name]" maxlength="100"  type="text" class="form-control" required placeholder="Enter like Rahul" />
										</div>
									
									
									<div class="row">
										<div class="col-md-6">
										</div>
										<div class="col-md-6">
										</div>
												<div style="clear:both;"></div>
									</div>
									
									
									
									<div class="row">
										<div class="col-md-6">
											<div class="form-group mb-3">
												<label> Email*</label> 
												<input value="<?php echo isset($traders['email'])?$traders['email']:""; ?>" name="traders[email]" maxlength="100" required type="email" class="form-control" placeholder="Enter like user@gmail.com"  />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-3">
												<label> Landline No</label> 
												<input value="<?php echo isset($traders['name'])?$traders['name']:""; ?>" name="traders[landline]" maxlength="100" type="text" class="form-control"  placeholder="Enter like +91-771-200100" />
											</div>
										</div>
												<div style="clear:both;"></div>
									</div>
									
											
									</div>
											
										<div class="col-md-4">
											<label>Trader Image </label> 
											<img onclick= " $('#traders_image').trigger('click'); " id="traders_image_Preview" style="display: block; width: 100%; height: 165px; margin-bottom:5px; object-fit: contain;" src="<?php echo isset($traders['image'])?$traders['image']:""; ?>"  onerror="this.src='<?php echo base_url("assets/preloader.png"); ?>';" />
												<input type="file" id="traders_image" class="form-control" name="traders_image" accept="image/*" />
											
										</div>
									
									
									<script>
												$('#traders_image').change(function()
													{
														const file = this.files[0];
															// console.log(file);
																if (file)
																	{
																		let reader = new FileReader();
																		reader.onload = function(event)
																			{
																				/// console.log(event.target.result);
																					$('#traders_image_Preview').attr('src', event.target.result);
																			}
																reader.readAsDataURL(file);
													}
												  });
												  
												  
													
												  
									</script>
									
												<div style="clear:both;"></div>
												
												
										<h6 class='text-danger'>Login Info</h6>		
												
												
										<div class="col-md-4">
											<div class="form-group mb-3">
												<label> Mobile No*</label> 
												<input <?php if(empty($traders['whatsapp'])) { ?> onkeyup=" $('.whatsapp_inp').val(this.value); "  <?php } ?> value="<?php echo isset($traders['mobile'])?$traders['mobile']:""; ?>" name="traders[mobile]" required type="number" class="form-control" placeholder="Enter like 918770247522" />
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="form-group mb-3">
												<label> Password</label> 
												<input name="traders[password]" maxlength="100" type="text" class="form-control" placeholder="Enter Password for App Login" />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group mb-3">
												<label> WhatsApp No.</label> 
												<input value="<?php echo isset($traders['whatsapp'])?$traders['whatsapp']:""; ?>" name="traders[whatsapp]" type="number" class="form-control whatsapp_inp" placeholder="Enter like 918770247522"  />
											</div>
										</div>
										<div style="clear:both;"></div>
										
											<div class="col-md-4">
											
												<div class="form-group mb-3">
													<label>Date of Birth</label> 
													<input value="<?php echo isset($traders['dob'])?$traders['dob']:""; ?>" name="traders[dob]"  maxlength="100" type="date" class="form-control"  />
												</div>
												
											
												<div class="form-group mb-3">
													<label> Anniversary Date</label> 
													<input value="<?php echo isset($traders['anniversary'])?$traders['anniversary']:""; ?>" name="traders[anniversary]"  type="date" class="form-control"  />
												</div>
												
										</div>
										<div class="col-md-4">

											<div class="form-group mb-3">
												<label> Residential Address</label> 
												<textarea name="traders[resi_addrs]" rows="5" cols="50" class="form-control"><?php echo isset($traders['resi_addrs'])?$traders['resi_addrs']:""; ?></textarea>
											</div>
											
										</div>
										
										<div class="col-md-4">
										
											
											<div class="form-group mb-3">
												<label> Residential State</label> 
												<select name="traders[resi_state]" class="form-control">
													<option>State</option>
													
														<?php
																if(!empty($get_states))
																	{
																		foreach($get_states as $singi)
																			{
																				echo " <option ".( is_selected($singi['id'],$traders['resi_state'])?$traders['resi_state']:"" )." value='$singi[id]'>$singi[name]</option> ";
																			}
																	}
														?>
													
												</select>
											</div>
											
											
											<div class="form-group mb-3">
												<label> Residential City</label> 
												<input value="<?php echo isset($traders['resi_city'])?$traders['resi_city']:""; ?>" name="traders[resi_city]"  type="text" class="form-control"  />
											</div>
											
										
										</div>
										
										<div style="clear:both;"></div>
										
												
								</div>	
									
									
						<h6>Company Information</h6>	
									
								<div class="row">
								
									
										<div class="col-md-6">
											<div class="form-group mb-3">
												<label> Company Name</label> 
												<input value="<?php echo isset($traders['company'])?$traders['company']:""; ?>" name="traders[company]" maxlength="100" type="text" class="form-control"  />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-3">
												<label> GST Number</label> 
												<input value="<?php echo isset($traders['gst'])?$traders['gst']:""; ?>" name="traders[gst]" maxlength="100" type="text" class="form-control"  />
											</div>
										</div>
										
												<div style="clear:both;"></div>
										
										
										
												<div style="clear:both;"></div>
										
								
								
										<div class="col-md-4">
										
										
											<div class="form-group mb-3">
												<label> Supervisor Name*</label> 
												<input value="<?php echo isset($traders['supname'])?$traders['supname']:""; ?>" name="traders[supname]" maxlength="100" required type="text" class="form-control"  />
											</div>
										
											<div class="form-group mb-3">
												<label> Supervisor Mobile No.*</label> 
												<input value="<?php echo isset($traders['supmobile'])?$traders['supmobile']:""; ?>" name="traders[supmobile]" maxlength="100" required type="text" class="form-control"  />
											</div>
										
										</div>

										<div class="col-md-4">

											<div class="form-group mb-3">
												<label> Office Address</label> 
												<textarea name="traders[offi_addrs]" rows="5" cols="50" class="form-control"><?php echo isset($traders['offi_addrs'])?$traders['offi_addrs']:""; ?></textarea>
											</div>
											
										</div>
										
										<div class="col-md-4">
										
											
											<div class="form-group mb-3">
												<label> Office State</label> 
												<select name="traders[offi_state]" class="form-control">
													<option>State</option>
													
														<?php
																if(!empty($get_states))
																	{
																		foreach($get_states as $singi)
																			{
																				echo " <option ".( is_selected($singi['id'],$traders['offi_state'])?$traders['offi_state']:"" )." value='$singi[id]'>$singi[name]</option> ";
																			}
																	}
														?>
													
												</select>
											</div>
											
											
											<div class="form-group mb-3">
												<label> Office City</label> 
												<input value="<?php echo isset($traders['offi_city'])?$traders['offi_city']:""; ?>" name="traders[offi_city]"  type="text" class="form-control"  />
											</div>
											
										
										</div>
								
								</div>	
									

		
						<h6>Documents</h6>	
									
							<div class="card">
								<div class="card-body">
								
								
								
	<?php
		
			$file_array	=	array();
			
				$file_array['registration']['title'] 	=	"Company Registration Proof (Gumasta,Incorporation Certificate)";
				$file_array['registration']['allowed'] 	=	"* Allowed File Extensions: PDF, JPG, JPEG, DOC, DOCX";
				
				$file_array['gst']['title'] 			=	"Company GST";
				$file_array['gst']['allowed'] 			=	"* Allowed File Extensions: PDF, JPG, JPEG, DOC, DOCX";
				
				$file_array['pan']['title'] 			=	"Company PAN";
				$file_array['pan']['allowed'] 			=	"* Allowed File Extensions: PDF, JPG, JPEG, DOC, DOCX";
				
				$file_array['signature']['title'] 		=	"Signature ID Proof";
				$file_array['signature']['allowed'] 	=	"* Allowed File Extensions: PDF, JPG, JPEG, DOC, DOCX";
				
				$file_array['adhar_front']['title'] 	=	"Adhar Front";
				$file_array['adhar_front']['allowed'] 	=	"* Allowed File Extensions: PDF, JPG, JPEG, DOC, DOCX";
				
				$file_array['adhar_back']['title'] 		=	"Adhar Back";
				$file_array['adhar_back']['allowed'] 	=	"* Allowed File Extensions: PDF, JPG, JPEG, DOC, DOCX";
				
				
				$file_array['cancelled_cheque']['title'] 	=	"Cancelled Cheque";
				$file_array['cancelled_cheque']['allowed'] 	=	"* Allowed File Extensions: PDF, JPG, JPEG, DOC, DOCX";
				
		
	?>
								
							<div class="row">
							
								<?php
										foreach($file_array as $i=>$s)
											{
												?>
													<div class="col-md-6">
														<div class="form-group mb-3">
															<label>
																	<?php 
																			echo $s['title']; 
																	
																			if(!empty(!empty($traders['traders_docs'][$i])))
																				{
																					?>
																						<a class="btn btn-sm btn-warning" target="_BLANK" href="<?php echo base_url($traders['traders_docs'][$i]); ?>">
																							<i class="mdi mdi-eye"></i>
																						</a>
																					<?php
																				}
																	?>
																	
																		
															</label>
																<input class="form-control" type="file" name="<?php echo $i; ?>">
																	<p style="font-size:12px;"><?php echo $s['allowed']; ?></p>
														</div>
													</div>
												<?php
											}
								?>

							</div>

								
								
								</div>
							</div>		
										
										
										
										
										<div style="clear:both;"></div>
										
										<div id="successMsg" style="display:none;"><p class="form-control" style="background-color:#57bd72;width:50%;margin:1%;">Success:Dealer has been created Successfully!!!</p></div>
										
									<div style="clear:both;"></div>	
									<div class="col-md-12 text-center">
										
										
										<button class="btn btn-primary" type="submit"><?php echo !empty($traders['tid'])?"Update Trader":"Add Trader"; ?></button>
										<button onclick="$('.addform').slideUp()" class="btn btn-outline-danger" type="button">Cancel</button>
										
									</div>	
									<div style="clear:both;"></div>
										
										
								</form>		
                           </div>
						</div>
                                <div class="card">
                                    <div class="card-body">
											<div style='float: right; margin-bottom: 10px;'>
												<a class="btn btn-success" href="<?php echo base_url('administrator/traders/view/new'); ?>" style="background-color:#0bb197;">Add Dealer</a>
												
												
											</div>
											<div style='clear:both;'></div>
											<div style="overflow-x:auto;">
											<table id="tabeldatahere" class="table table-striped">
												<thead>
													<tr>
														<!--th>Role</th-->
														<th>#</th>
														<th>Type</th>
														<th>Name</th>
														<th>Email</th>
														<th>Mobile</th>
														<th>Company</th>
														<th>Supervisor</th>
														<th>Status</th>
														<th>Added</th>
														<th>Last Login</th>
													</tr>
												</thead>
												<tbody>
		
									<?php
									
											if(!empty($GetDealers))
												{
													foreach($GetDealers as $single)
														{
															?>
																<tr>
																	<td><?php echo $single['tid']; ?>
																	<a class="fa fa-edit" href="<?php echo base_url("administrator/traders/view/$single[tid]"); ?>"></a>
																	
																	</td>
																	<td><?php echo $single['type']; ?></td>
																	<td><?php echo $single['name']; ?></td>
																	<td><?php echo $single['email']; ?></td>
																	<td><?php echo $single['mobile']; ?></td>
																	<td><?php echo $single['company']; ?></td>
																	<td><?php echo $single['supname']; ?> / <?php echo $single['supmobile']; ?></td>
																	
																	<td><?php echo !empty($single['status'])?"<button onclick='updatestatus(this);' t='traders' i='tid' v='$single[tid]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='traders' i='tid' v='$single[tid]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
																	<td><?php echo showtime4db($single['added']);?></td>
																	<td><?php echo showtime4db($single['lastlogin']);?></td>
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

                <footer class="footer">
					<?php echo $footer; ?>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
				<?php echo $sidebarright; ?>
			<!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
 
        <!-- JAVASCRIPT -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts js -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- jquery.vectormap map -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>

        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
		<script>
			var REL_BASE_URL	=	"<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/";
			 
					$(document).ready( function () {
						$('#tabeldatahere').DataTable({ pageLength:30,order: [[0, 'desc']] });
					} );
			
		</script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>

		<?php
				$this->load->view('admin/include/eodcode');
		?>
    </body>
</html>