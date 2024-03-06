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
        
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<!--Modal Links-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
		<!--Modal Links-->
		<style>
			img {
				  border: 1px solid #ddd;
				  border-radius: 4px;
				  padding: 5px;
				  width: 80px;
				}
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
                                    <h4 class="mb-sm-0">Manage Orders</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Orders</a></li>
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
                                <div class="card">
                                    <div class="card-body">
											<div style='float: right; margin-bottom: 10px;'>
												<!--a class="btn btn-success" href="<?php echo base_url('administrator/orders/view/new'); ?>" >Add Order</a-->
											</div>
											<div style='clear:both;'></div>
											<div class="table-responsive">
											<table id="tabeldatahere" class="table table-striped">
												<thead>
													<tr>
														<!--th>Role</th-->
														<th>Date</th>
														<th>Order</th>
														<th>Customer</th>
														<th>Order_Status</th>
														<th>Invoiced</th>
														<th>Payment</th>
														<th>Packed</th>
														<th>Shipped</th>
														<th>Amount</th>
														<th>Actions</th>
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
											<td>
                                                 <a href="#"  data-toggle="modal" data-target="#myModal" style="color:#0bb197;">
													<span class="fa fa-eye"></span>
												 </a>											
												 June,22,2022
											</td>
											<td>#4719</td>
											<td>Anshul Uppal</td>
											<td><button type="button" class="btn btn-default">Cancelled</button></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td>₹349.00</td>
											<td>
												<a class="fa fa-edit" href="<?php echo base_url("administrator/orders/view2/0"); ?>" style="color:#0bb197;"></a>
												<a class='fas fa-shuttle-van' style='padding-left:10px;color:#0bb197;'></a>
											</td>
										</tr>
										<tr>
											<td>
													<a href="#"  data-toggle="modal" data-target="#myModal" style="color:#0bb197;">
													   <span class="fa fa-eye"></span>
												    </a>
													June,20,2022
											</td>
											<td>#4788</td>
											<td>Anshul Uppal</td>
											<td><button type="button" class="btn btn-default" >Cancelled</button></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td>₹414.00</td>
											<td>
												<a class="fa fa-edit" href="<?php echo base_url("administrator/orders/view2/0"); ?>" style="color:#0bb197;"></a>
												<a class='fas fa-shuttle-van' style='padding-left:10px;color:#0bb197;'></a>
												<a class="fa fa-cart-plus" href="<?php echo base_url("administrator/orders/view1/new"); ?>" style="font-size:20px;color:#0bb197;margin-left:7%;"></a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#"  data-toggle="modal" data-target="#myModal" style="color:#0bb197;">
												  <span class="fa fa-eye"></span>
												</a>
											Jun 27, 2022
											</td>
											<td>#4759</td>
											<td>Anshul Uppal</td>
											<td>
											<button type="button" class="btn btn-default" style="background-color:#0bb197;">Processing</button>
											</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td>₹449.00</td>
											<td>
												<a class="fa fa-edit" href="<?php echo base_url("administrator/orders/view2/0"); ?>" style="color:#0bb197;"></a>
												<a class='fas fa-shuttle-van' style='padding-left:10px;color:#0bb197;'></a>
											</td>
										</tr>
										<tr>
											<td>
													<a href="#"  data-toggle="modal" data-target="#myModal" style="color:#0bb197;">
													   <span class="fa fa-eye"></span>
												    </a>
											Jun 30, 2022
											</td>
											<td>#4729 </td>
											<td>Anshul Uppal</td>
											<td><button type="button" class="btn btn-default">Cancelled</button></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td>₹449.00</td>
											<td>
												<a class="fa fa-edit" href="<?php echo base_url("administrator/orders/view2/0"); ?>" style="color:#0bb197;"></a>
												<a  href="<?php echo base_url("administrator/dispatch/view2/0"); ?>"  style='padding-left:10px;color:#0bb197;'>
													<span class='fas fa-shuttle-van'></span>
												</a>
											</td>
										</tr>
									<?php
											/*}
									} */
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
		<!--- Modal Content Goes here------>
		
		<!-- Modal -->
		  <div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content" style="width: 90%;">
				<div class="modal-header">
				  <h2 style="float:left;">Order #4987</h2>
				  <h4 class="modal-title"> <button type="button" class="btn btn-default" style="float:right;background-color:#0bb197;">Cancelled</button></h4>
				</div>
				<div class="modal-body">
				<div class="row" style="padding-left:20%;padding-bottom:5%;">
					<img src="<?php echo base_url("assets/image/p1.jpg"); ?>" style="width:80%;" alt="Paris">
				</div>
				<div class="row" style="padding-left:10%;padding-bottom:5%;">
				  <div class="col-md-6">
					<b>Order Date</b>&nbsp : 22-07-2022<br>
					<b>Party Code</b>&nbsp : 1234555667<br>
					<b>Party Name</b>: LOREM IPSUM PVT LTD<br>
					<b>Material  </b>&nbsp&nbsp&nbsp&nbsp : Lorem Cement AC-GCBS<br>
				  </div>
				  <div class="col-md-6">
					<b>Quantity</b>      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: 50 <br>
					<b>Party City</b>    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: Lorem<br>
					<b>Document No</b>   &nbsp&nbsp: 2121321235<br>
					<b>Delivery Date</b> &nbsp&nbsp&nbsp:01-07-2022 <br><div style="padding-left:120px;">(Self-Delivery)</div>
				  </div>
				</div>
				<div class="row" style="width:95%;padding-left:10%;">
					<table id="tabeldatahere" class="table table-striped">
						   <thead>
									<tr>
										<th>Product</th>
										<th>Quantity</th>
										<th>Total</th>
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
										<td>Chandan Mala</td>
										<td>2</td>
										<td>₹200.00</td>
									</tr>
									<tr>
										<td>Decorative Mala Length - 18 CM</td>
										<td>2</td>
										<td>₹70.00</td>
									</tr>
							 <tfoot>
									<tr>
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
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			  </div>
			  
			</div>
		  </div>
		
		<!--- Modal Content Ends here------>

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
		
		<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script-->
		
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
		<?php
				$this->load->view('admin/include/eodcode');
		?>
    </body>
</html>
