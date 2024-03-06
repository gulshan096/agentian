<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $seo['title']; ?></title>
        <meta content="<?php echo $seo['description']; ?>" name="description" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo BASE_HTTP_REL_URL; ?>/favicon.ico" />
        
        <!-- jvectormap -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />

        <!-- Bootstrap Css -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

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
                                    <h4 class="mb-sm-0">Email Template</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Email Template</a></li>
                                            <li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
											
											
											
						<?php
							//echo $addmaster;
							$showform = $this->input->get('showform');
							if(!empty($showform))
							{
								$basepath = "assets/emailtheme/";
								
									if(isset($_POST['filepath']) && isset($_POST['content']))
										{
											$filetoedit = FCPATH.$basepath.$_POST['filepath'];
											if(file_exists($filetoedit))
												{
													file_put_contents($filetoedit,$_POST['content']);
												
													echo "<div class='alert alert-success'>".$_POST['filepath']." File Updated.</div>";
												}												
										}
								 
								
								?>
								
								
								
						<div class="row mb-lg-8pt addforms">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body p-24pt">
										<form method="POST" class="row">
											<div class="col-md-12">
												<input type="hidden" name="filepath" value="<?php echo $filepath = $this->input->get("filepath"); ?>" />				
															
															
													
												<div class="form-group">
													<label>Email Content</label>
													<textarea class="form-control reseto2blank " id="area3" rows="5" cols="3" type="text" name="content" placeholder="Enter Email Template"><?php echo file_get_contents(FCPATH.$basepath.$filepath); ?></textarea>
												</div>		
															
												
												<div class="form-group">
													<button type="submit" class="btn btn-primary mr-8pt">Save</button>
													<a href="<?php echo site_url("administrator/manageemailtemplate"); ?>" class="btn btn-outline-secondary ml-0">Cancel</a>
												</div>
											</div>     
											
											<div class="clearfix"></div>
										</form>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
								
								
								<?php
							
							}
						?>
						<div class="row mb-lg-8pt">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body p-24pt">
										<table id="tabeldatahere" class="table table-striped" style="width:100%">
											<thead>
												<tr>
													<th>Title</th>
													<th>Updated</th>
													<th>Edit</th>
													<th>view</th>
												</tr>
											</thead>
											<tbody>
											
									<?php
									
										$basepath = "assets/emailtheme/";
										
											$themearray = array();
											
												$themearray[1]['name']	=	"Customer Signup Email";
												$themearray[1]['file']	=	"signup.html";
												$themearray[2]['name']	=	"Vendor Signup Email";
												$themearray[2]['file']	=	"signup_vendor.html";
												$themearray[3]['name']	=	"Common Email";
												$themearray[3]['file']	=	"email.html";
												
										foreach($themearray as $single)
											{
												?>
											
										
												<tr>
													<th><?php echo $single['name']; ?></th>
													<th>
														<?php echo date("d M, Y h:iA",filemtime(FCPATH.$basepath.$single['file'])); ?>
													</th>
													<th>
														<a class="btn btn-primary" href="<?php echo site_url("administrator/manageemailtemplate?showform=1&filepath=".$single['file']); ?>"><i class="fa fa-edit"></i></a>
													</th>
													<th><a class="btn btn-warning" target="_M4U" href="<?php echo site_url($basepath.$single['file']); ?>"><i class="fa fa-eye"></i></a></th>
												</tr>
									<?php	
											}
									?>		
										
										
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
											
											

                                    </div>
                                    <!-- end card-body -->
                                   
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
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

    </body>
</html>
