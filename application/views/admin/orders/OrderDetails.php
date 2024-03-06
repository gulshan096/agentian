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
		<style>
			img {
				  border: 1px solid #ddd;
				  border-radius: 4px;
				  padding: 5px;
				  width: 80px;
				}
		</style>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
                                    <h4 class="mb-sm-0">Order #4987 details <br> Payment via Credit Card/Debit Card/NetBanking OR UPI. Customer IP: 2401:4900:3136:347f:b4ce:329:564d:88da</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Party</a></li>
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
                              <div class="card-body" >
								<form action="<?php echo base_url('administrator/party/view/0'); ?>" method="POST" class="row">
									<input value="<?php echo !empty($users['id'])?$users['id']:0; ?>" name="party[id]" type="hidden" />
										 <div class="card">
												<div class="card-body">
													<div>
														Order #4987 details <br> Payment via Credit Card/Debit Card/NetBanking OR UPI. Customer IP: 2401:4900:3136:347f:b4ce:329:564d:88da
													</div>
												</div>
											</div>
									<div style="clear:both;"></div>
								</form>		
                           </div>
						</div>
                                <div class="card">
                                    <div class="card-body">
									<div class="row" style="width:80%;">
										<div class="col-md-4">
												<b>General</b><br><br>
												Date created:<br>
												2022-06-30<br><br>
												<div class="col-md-4">
															<b>Status:</b>
															<select name="currency" id="currency" class="form-control" style="width:150%;">
															  <option value="status">Status</option>
															  <option value="draft" >Draft</option>
															  <option value="pending"selected>Pending Payment</option>
															  <option value="ofd">Out for Delivery</option>
															  <option value="completed">Completed</option>
															</select>
												</div>
												<div class="col-md-4">
												<b>Customer</b> : 
														    <select name="currency" id="currency" class="form-control" style="width:150%;">
															  <option value="status">Ajay Sharma</option>
															  <option value="draft" >Pooja Swamy</option>
															  <option value="pending"selected>Ashok Kumar</option>
															  <option value="ofd">Rajiv Raj</option>
															  <option value="completed">Anshul Uppal</option>
															</select>
											    </div>
										</div>
										
										<div class="col-md-3" style="width: 33%;">
											<b>Billing:</b><br><br>
											<div id="billing" style="display:block;">
													Vivek Tibrewal<br>
													infront of head post office jharsuguda<br>
													jharsuguda 768201<br>
													Odisha<br><br>
													Email address:<br>
													<a href="">vivekjsg@gmail.com</a><br><br>
													Phone:<br>
													<a href="">9861920320</a>
											</div>
											<br><br>
										</div>
										<div class="col-md-3" style="width: 33%;">
											<b>Shipping:</b><br><br>
											Vivek Tibrewal<br>
											infront of head post office jharsuguda<br>
											jharsuguda 768201<br>
											Odisha
											<div id="approve_check" >
												<i class="fa fa-check" onclick="check()" style="float:left;padding-top:50px;color:green;">Approve</i>
											</div>
										</div>
										
										
									</div>	
									
										
                                    </div>
									<div class="row">
												<table id="tabeldatahere" class="table table-striped">
												<thead>
													<tr>
														<!--th>Role</th-->
														<th>Item</th>
														<th>Cost</th>
														<th>Qty</th>
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
											<td><img src="<?php echo base_url("assets/image/p1.jpg"); ?>" alt="Paris"></td>
											<td>₹150.00</td>
											<td>× 1</td>
											<td>₹150.00</td>
										</tr>
										<tr>
											<td><img src="<?php echo base_url("assets/image/p2.jpg"); ?>" alt="Paris"></td>
											<td>₹150.00</td>
											<td>× 1</td>
											<td>₹150.00</td>
										</tr>
										<tfoot>
										<tr>
										  <td></td>
										  <td></td>
										  <td></td>
										  <td colspan="" style="float:left;">
											Items Subtotal:<small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>₹300.00<br>
											Shipping:<small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>₹149.00<br>
											Order Total:<small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>₹449.00<br>
										  </td>
										</tr>
										<hr>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td colspan="" style="float:left;">
													   <b>Paid</b>:<small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>₹419.00<br>
July 28, 2022 via Credit Card/Debit Card/NetBanking OR UPI	
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
		<script>
		function check(){
			window.alert('Approved');
			
		}
		
		</script>
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
