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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--ToolTip -->
			<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  			<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
		<!--ToolTip--->
		<style>
			img {
				  border: 1px solid #ddd;
				  border-radius: 4px;
				  padding: 5px;
				  width: 80px;
				}
		</style>
		<script>
			function addProduct(){
				document.getElementById("addProduct").style.display='block';
			}	
		</script>
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
                                    <h4 class="mb-sm-0">Manage Schemes</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Schemes</a></li>
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
                          <div class="card addform" id="addSchemes">
                              <div class="card-body">
							  <form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('administrator/Traders/saveSchemes'); ?>','#createForm1','#successMsg')">
									<input value="<?php echo !empty($schemes['sid'])?$schemes['sid']:0; ?>" name="schemes[sid]" type="hidden" />	

							<div class="row">
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label> Quantity*</label> 
											<input value="<?php echo isset($schemes['quantity'])?$schemes['quantity']:""; ?>" name="schemes[quantity]" maxlength="80" required type="number" class="form-control" placeholder="Enter Like 5000" />
										</div>
										<div class="form-group mb-3">
											<label> Bulk Fix Rate*<small>(In Rs)</small></label> 
											<input value="<?php echo isset($schemes['bulkRate'])?$schemes['bulkRate']:""; ?>" name="schemes[bulkRate]" maxlength="80" required type="number" class="form-control" placeholder="Enter Like Rs 10000" />
										</div>
                                        <div class="form-group mb-3">
											<label>Tenure*<small>(In Months)</small></label> 
											<input value="<?php echo isset($schemes['tenure'])?$schemes['tenure']:""; ?>" name="schemes[tenure]" maxlength="80" required type="number" class="form-control" placeholder="Enter Tenure " />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label>Rate Discount*</label> 
											<input value="<?php echo isset($schemes['rateDiscount'])?$schemes['rateDiscount']:""; ?>" name="schemes[rateDiscount]" maxlength="80" required type="number" class="form-control" placeholder="Enter Like 10%" />
										</div>
                                        <div class="form-group mb-3">
											<label>Cash Discount*</label> 
											<input value="<?php echo isset($schemes['cashDiscount'])?$schemes['cashDiscount']:""; ?>" name="schemes[cashDiscount]" maxlength="80" required type="number" class="form-control" placeholder="Enter Like 10%" />
										</div> 
									</div>
									<div style="clear:both;"></div>		
							</div>
									<!--div id="successMsg" style="display:none;"><p class="form-control" style="background-color:#0bb197;width:50%;margin:1%;">Success:Catalogue has been added Successfully!!!</p></div-->
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
												<a class="btn btn-success" href="<?php echo site_url('administrator/traders/schemes/new'); ?>" style="background-color:#0bb197;">Add New</a>
											</div>
											<div style='clear:both;'></div>
											<div class="table-responsive">
											<table id="tabeldatahere" class="table table-striped">
												<thead>
														<tr>
															<!--th>Role</th-->
															<th>#</th>
															<th>Quantity</th>
															<th>Rate_Discount</th>
															<th>Bulk_Fix_Rate</th>
															<th>Cash_Discount</th>
                                                            <th>Tenure</th>
                                                            <th>Status</th>
															<th>Actions</th>
														</tr>								
												</thead>
												<tbody>
												<?php	
												if(!empty($GetSchemes))
													{
														foreach($GetSchemes as $singi)
															{
																?>
																		<tr>
																			<td><?php echo $singi['sid']; ?></td>
																			<td><?php echo $singi['quantity']; ?></td>
																			<td><?php echo $singi['rateDiscount']; ?></td>
                                                                            <td><?php echo $singi['bulkRate']; ?></td>
                                                                            <td><?php echo $singi['cashDiscount']; ?></td>
                                                                            <td><?php echo $singi['tenure']; ?></td>
																			<td><?php echo !empty($singi['status'])?"<button onclick='updatestatus(this);' t='schemes' i='sid' v='$singi[sid]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='schemes' i='sid' v='$singi[sid]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
																			<td><?php echo showtime4db($singi['updated']);?></td>
																			<td><a class="fa fa-edit" href="<?php echo base_url("administrator/traders/schemes/$singi[sid]"); ?>"></a></td>
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
						$('#tabeldatahere').DataTable({ pageLength:30 });
					} );
		</script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
		<script type = 'text/javascript' src = "<?php echo base_url("");?>js/common2022.js"></script>
		<?php
				$this->load->view('admin/include/eodcode');
		?>
    </body>
</html>
