<!DOCTYPE html>
<html lang="en">
    <head>
        <?php  $this->load->view('frontend/include/header'); ?>
		
	 <style>
	     section {
			 
			 padding: 80px 0 !important;
		 }
		
	 </style>
    </head>
    <body class="yellow-skin" >
        <div id="alert-container"></div>
        
        <div id="main-wrapper">
            
            <?php  $this->load->view('frontend/include/menu'); ?>
            <!-- End Navigation -->
            <div class="clearfix"></div>
            <div id="app">
                <section>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="modal-content" id="registermodal">
                                    <div class="modal-body">
                                        <h2 class="text-center">Login your account</h2>
                                        <br>
                                        <div class="login-form">
                                            <form onsubmit="return dorequest('<?php echo base_url('Authentication/sendOtp'); ?>','.managesignupfrm','.managesignupres');" method="POST" class="managesignupfrm" class="simple-form">
                                                <div class="form-group">
                                                    <label>Mobile Number</label>
                                                    <div class="input-with-icon">
                                                        <input required  type="text" class="form-control" name="to" placeholder="Enter mobile">
                                                        <i class="ti-user"></i>
                                                    </div>
                                                </div>
												<div class="form-group">
												    <input type="checkbox" id="chkRcode">
                                                    <label for="chkRcode"> I have a referal code.</label><br>
													<input id ="dvPassport" type="text" class="form-control" name="referal_code" placeholder="Enter Referal Code">
												</div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-md full-width btn-theme-light-2 rounded">Login</button>
                                                </div>
												<div class="managesignupres col-12"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            
            <!-- ============================ Footer Start ================================== -->
            <?php  $this->load->view('frontend/include/footer'); ?>
			
			<script>
			    $(document).ready(function(){
					$("#dvPassport").hide();
					 $("#chkRcode").click(function ()
					 {
						if ($(this).is(":checked")) 
						{
							$("#dvPassport").show();
						} 
						else 
						{
							$("#dvPassport").hide();
			
						}
					});
				});
			</script>
			
        </body>
    </html>