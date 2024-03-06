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
                            <div class="col-md-12">
							    <h2 class="text-center">Terms and Condition</h2>
                                <div class="modal-content" id="registermodal">
                                    <div class="modal-body">
                                       
                                       <?php  
									   
									      if(!empty($terms_condition))
										  {
											 echo $terms_condition['content']; 
										  }
									   
									   ?>
									  
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
			  
			</script>
			
        </body>
    </html>