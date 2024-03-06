<!DOCTYPE html>
<html lang="en">
    <head>
        <?php  $this->load->view('frontend/include/header'); ?>
    </head>
    <body class="yellow-skin" >
        <div id="alert-container"></div>
        
        <div id="main-wrapper">
            
            <?php  $this->load->view('frontend/include/menu'); ?>
			<?php    $yes_no = array('1' => 'Yes', '0' => 'No'  ); ?>
            <!-- End Navigation -->
            <div class="clearfix"></div>
            <div id="app">
               
                <!-- ============================ All Property ================================== -->
                <section class="gray">
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12 list-layout">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="item-sorting-box">
                                            <div class="item-sorting clearfix">
                                                <div class="left-column pull-left">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                       
									    <section>
											<div class=" d-flex justify-content-center align-items-center">
												<div class="col-md-6">
													<div class="border border-3 border-primary"></div>
													<div class="card  bg-white box-shadow p-5">
														<div class="mb-4 text-center">
															<svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
																fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
																<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" /><path
																d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
															</svg>
														</div>
														<div class="text-center">
															<h1 class="" >Thank You !</h1>
															<p>Thank You, Successfully Post Your Property Details.</p>
															<a href="<?php echo base_url() ?>">
																<button class="btn btn-outline-primary">Back Home</button>
															</a>
														</div>
													</div>
												</div>
											</div>
									 </section>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
         
            <!-- ============================ Footer Start ================================== -->
            <?php  $this->load->view('frontend/include/footer'); ?>
			
			
			
        </body>
    </html>