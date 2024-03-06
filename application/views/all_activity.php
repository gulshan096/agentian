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
                                    <h4 class="mb-sm-0">Manage Catalogue</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Catalogue</a></li>
                                            <li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                  <!-- end page title -->
                  <div class="row">
                       <div class="col-xl-12" >
                       
                                <div class="card">
                                    <div class="card-body">
											
											<div style='clear:both;'></div>
											<div class="table-responsive">
											<table id="tabeldatahere" class="table table-striped">
												<thead>
												
																	
														<tr>
															<!--th>Role</th-->
															<th>#</th>
															<th>User</th>
															<th>Email</th>
															<th>Mobile</th>
															<th>Description</th>
															<th>From IP</th>
															<th>Location</th>
															<th>Date Time</th>
														</tr>								
												</thead>
												<tbody>
												<?php	
												
												
											//		echo "<pre>"; print_r($Get_activity); echo "</pre>";
												
												if(!empty($Get_activity))
													{
														foreach($Get_activity as $singi)
															{
																?>
																		<tr>
																			<td><?php echo $singi['act_id']; ?></td>
																			<td><?php echo $singi['name']; ?></td>
																			<td><?php echo $singi['email']; ?></td>
																			<td><?php echo $singi['mobile']; ?></td>
																			<td><?php echo $singi['description']; ?></td>
																			<td><?php echo show_client_ip($singi['ip']);?></td>
																			<td><?php echo $singi['location']; ?></td>
																			<td><?php echo showtime4db($singi['added']);?></td>
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
						$('#tabeldatahere').DataTable({ pageLength:30,order: [[0, 'desc']], });
					} );
		</script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
		<script type = 'text/javascript' src = "<?php echo base_url("");?>js/common2022.js"></script>
		<?php
				$this->load->view('admin/include/eodcode');
		?>
    </body>
</html>
