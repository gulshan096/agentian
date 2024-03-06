<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $seo['title']; ?></title>
        <meta content="<?php echo $seo['description']; ?>" name="description" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo BASE_HTTP_REL_URL; ?>favicon2.ico" />

        <!-- Bootstrap Css -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/app.min.css?v=0.1" id="app-style" rel="stylesheet" type="text/css" />		
		<style>	
			.logohere { height: 110px ; max-width: 100%; object-fit: contain; }
		</style>
    </head>

    <body class="bg-pattern">
        <div class="bg-overlay"></div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="">
                                    <div class="text-center">
                                        <a href="<?php echo BASE_HTTP_REL_URL; ?>" class="" style="margin:20px">
										<h2><?php echo APP_NAME; ?></h2>
                                        <!-- <img src="<?php echo BASE_HTTP_REL_URL; ?>assets/logo.png" alt="" class="auth-logo logo-dark mx-auto logohere" />
                                            <img src="<?php echo BASE_HTTP_REL_URL; ?>assets/logo.png" alt="" height="24" class="auth-logo logo-light mx-auto logohere" />--> 
                                        </a>
                                    </div>
                                    <!-- end row -->
                                  <br>
                                     <form class="form-horizontal togglefrm dologinfrm" method="POST" onsubmit="return do_login();">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label" for="username">Email or Mobile</label>
                                                    <input required name="username" type="text" class="form-control" id="username" placeholder="Enter Email or Mobile" />
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label" for="userpassword">Password</label>
                                                    <input required name="password" type="password" class="form-control" id="userpassword" placeholder="Enter Password" />
                                                </div>

                                                <div class="dologinres"></div>
												
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="keepmelogin" class="form-check-input" id="customControlInline" />
                                                            <label class="form-label" class="form-check-label" for="customControlInline">Remember me</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-md-end mt-3 mt-md-0">
                                                            <a href="#" onclick="$('.togglefrm').toggle();" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-grid mt-4">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
									
                                    <form style="display:none;" class="form-horizontal togglefrm dofrgpswfrm" method="POST" onsubmit="return dofrgpswfrm();">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">  
                                                    <label class="form-label" for="username">Email</label>
                                                    <input required name="username" type="text" class="form-control" id="username" placeholder="Enter Email" />
                                                </div>
                                                <div class="dofrgpswres"></div>
                                                <div class="d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit">		Submit
													</button>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-12">
                                                        <div class="text-md-end mt-3 mt-md-0">
                                                            <a href="#" onclick="$('.togglefrm').toggle();" class="text-muted"><i class="mdi mdi-lock"></i> Return to Login!</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p class="text-white-50">&copy;<script>document.write(new Date().getFullYear())</script> <a href="<?php echo BASE_HTTP_REL_URL; ?>"><?php echo APP_NAME; ?></a>. Developed  by <a href="https://sjain.io/" target="_BLANK">Sjain</a></p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->
		
		
		
<script>
	var baserelativepath = "<?php echo BASE_HTTP_REL_URL; ?>";
</script>

        <!-- JAVASCRIPT -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/node-waves/waves.min.js"></script>

        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js"></script> 
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/sjain_logged.js?v=0.01"></script> 
		
		
        
		
		<?php
				$this->load->view('admin/include/eodcode');
		?>
    </body>
</html>
