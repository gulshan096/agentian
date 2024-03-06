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
                <div class="page-title">
                    <div class="container"></div>
                </div>
                <!-- ============================ All Property ================================== -->
                <section class="gray">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="filter_search_opt">
                                    <a href="javascript:void(0);" class="open_search_menu">Search Property<i
                                    class="ml-2 ti-menu"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 list-layout">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="item-sorting-box">
                                            <div class="item-sorting clearfix">
                                                <div class="left-column pull-left">
                                                    <h4 class="m-0">
                                                    Total   <?php echo count($property) ?> Results Found
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-12 col-md-12">
                                        <div class="item-sorting-box">
                                            <div class="item-sorting clearfix">
                                                <div class="">
                                                    <input type="text" class="form-control form-rounded" id="myinput" placeholder="search">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php
                                        
                                        if(count($property) > 0)
                                        {
                                        foreach($property as $gmp)
                                        {
                                        ?>
                                        <div class="col-lg-4 col-md-6 col-sm-12 res">
										   
                                            <div class="property-listing property-2 "
                                                data-lat="30.1548681"
                                                data-long="-85.7709976">
                                                <div class="listing-img-wrapper">
                                                    <div class="list-img-slide">
                                                        <div class="click ">
                                                            <?php
                                                            if(count($gmp['propertyImages']) > 0)
                                                            {
                                                            foreach($gmp['propertyImages'] as $pimg)
                                                            {
                                                            ?>
                                                            <div>
                                                                <a href="<?php echo base_url("property_details/").$gmp['property_id']; ?>">
                                                                    <img src="assets/storage/general/img-loading.jpg"
                                                                    data-src="<?php echo base_url().$pimg['property_image']; ?>"
                                                                    class="img-fluid mx-auto lazy" alt="4113 Holiday Drive"/>
                                                                </a>
                                                            </div>
                                                            <?php
                                                            }
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                            <div>
                                                                <a href="<?php echo base_url("property_details/").$gmp['property_id']; ?>">
                                                                    <img src="assets/storage/general/img-loading.jpg"
                                                                    data-src="https://resido.thesky9.com/storage/properties/p-3-400xauto.jpg"
                                                                    class="img-fluid mx-auto lazy" alt="4113 Holiday Drive"/>
                                                                </a>
                                                            </div>
                                                            <?php
                                                            }
                                                            
                                                            ?>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="listing-detail-wrapper">
												   <a href="<?php echo base_url("property_details/").$gmp['property_id']; ?>">
                                                    <div class="listing-short-detail-wrap">
                                                        <div class="listing-short-detail">
                                                            <div class="list-price d-flex justify-content-between">
                                                                <span>
                                                                    <span class="prt-types rent"><?php echo $gmp['building_name']; ?></span>
                                                                </span>
                                                                <h6 class="listing-card-info-price">
                                                                <i class="fa fa-inr text-dark"></i> 
																<?php  echo $gmp['min_budget'] != $gmp['max_budget'] ?$gmp['min_budget'].'-'.$gmp['max_budget']:$gmp['max_budget']; ?>
                                                                </h6>
                                                            </div>
                                                            <h4 class="listing-name">
                                                            <a href="<?php echo base_url("property_details/").$gmp['property_id']; ?>" class="prt-link-detail"
                                                            title="4113 Holiday Drive"><?php echo $gmp['property_area']; ?></a>
                                                            </h4>
                                                            
                                                        </div>
                                                    </div>
													</a>
                                                </div>
												
                                                <div class="price-features-wrapper">
												<a href="<?php echo base_url("property_details/").$gmp['property_id']; ?>">
                                                    <div class="list-fx-features">
                                                        <div class="listing-card-info-icon">
                                                            <div class="inc-fleat-icon">
                                                                <img src="assets/themes/resido/img/bed.svg" width="13" alt=""/>
                                                            </div>
                                                            <?php echo $gmp['sell_type']; ?>
                                                        </div>
                                                        
                                                        <div class="listing-card-info-icon">
                                                            <div class="inc-fleat-icon">
                                                                <img src="assets/themes/resido/img/bathtub.svg" width="13"
                                                                alt=""/>
                                                            </div>
                                                            <?php echo $gmp['property_type']; ?>
                                                        </div>
                                                        <div class="listing-card-info-icon">
                                                            <div class="inc-fleat-icon">
                                                                <img src="assets/themes/resido/img/move.svg" width="13" alt=""/>
                                                            </div>
                                                            <?php echo $gmp['requested_for']; ?>
                                                        </div>
                                                    </div>
													</a>
                                                </div>
                                                <div class="listing-detail-footer">
												    
                                                    <div class="footer-first">
													    <a href="<?php echo base_url("property_details/").$gmp['property_id']; ?>">
                                                        <div class="foot-location d-flex">
                                                            <span class="px-2"><i class="fa fa-map-marker text-info"></i></span>
                                                            <?php echo $gmp['property_state']." ,".$gmp['property_city'] ?>
                                                        </div>
														</a>
                                                    </div>
                                                    <div class="footer-flex">
                                                        <a href="<?php echo base_url("property_details/").$gmp['property_id']; ?>" class="prt-view">View</a>
                                                    </div>
													
                                                </div>

                                            </div>
                                        </div>
                                        <?php
                                        }
                                        }
                                        
                                        ?>
                                        
                                    </div>
                                    <!-- Pagination -->
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
				   
				   $("#myinput").on('keyup', function(){
					   
					 var value =  $(this).val().toLowerCase();
					 
				
					 
					 $(".res").filter(function(){
						 
						   $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1 );
						 
					 });
				   });
				   
			   });
			
			</script>
        </body>
    </html>