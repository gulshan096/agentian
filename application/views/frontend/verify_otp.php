<!DOCTYPE html>
<html lang="en">
    <head>
        <?php  $this->load->view('frontend/include/header'); ?>
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
                                        <h2 class="text-center">VERIFICATION</h2><br>
                                        <div class="login-form">
                                            <form onsubmit="return dorequest('<?php echo base_url('Authentication/verifyOtp'); ?>','.managesignupfrm','.managesignupres');" method="POST" class="managesignupfrm" class="simple-form">
                                                <div class="form-group">
                                                    <label>Enter OTP sent to your mobile number </label>
                                                    <div class="input-with-icon">
                                                        <input required  type="text" class="form-control" name="code" autofocus minimum="4" maximum="4">
                                                        <i class="ti-user"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-md full-width btn-theme-light-2 rounded">Verify OTP</button>
                                                </div>
											    <button type="button" class="btn btn-md text-primary resendOtp" data-to="<?php $this->session->userdata('mobile') ?>">Resend</button>
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
				   
				   $('.resendOtp').click(function(){
					   
					  var to = $(this).data('to');
					  
					  alert(to);
					   
				   });
				   
			   })
			</script>
        </body>
    </html>