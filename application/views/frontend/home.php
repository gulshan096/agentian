<!DOCTYPE html>
<html lang="en">
	<head>
		<?php  $this->load->view('frontend/include/header'); ?>
		<style>
		  .owl-carousel {
			  position: relative;
			}

			.owl-nav {
			  position: absolute;
			  top: 50%; 
			  width: 100%;
			  transform: translateY(-50%);
			  display: flex;
			  justify-content: space-between;
			  z-index: 1; 
			}
             			.owl-prev{
							position: relative;
							right: 50px;
						}
						
						.owl-next{
							position: relative;
							left: 50px;
						}
			.owl-prev,
			.owl-next {
			  width:50px;
			  height:50px;
			  font-size: 30px !important;
			  color: #000; 
			  cursor: pointer;
			  background-color: #fff !important;
			  padding:20px !important;
			}
		  #af{
			  
			  display:none
		  }
		  #afm{
			  
			  display:none
		  }
		
		   #owl-demo-blog .item .blog-thumb img{
				display: block;
				width: 100%;
				height:100% !important;
				
			}
			#owl-demo-blog .item .blog-thumb{
				height: 300px!important;
			}
			
			
			#owl-demo-feedback .item .blog-thumb img{
				display: block;
				width: 100%;
				height:100% !important;
				
			}
			#owl-demo-feedback .item .blog-thumb{
				height: 300px!important;
			}
			
			.lf,.af{
				display:none;
			}
			
			.lfm,.afm{
				display:none;
			}
			.wrapper{
			  display: inline-flex;
			  background: #fff;
			  width:  100%;
			  align-items: center;
			  justify-content: space-evenly;
			  border-radius: 5px;
			 
			}
			.wrapper .option{
			  background: #fff;
			  height: 85%;
			  width: 100%;
			  display: flex !important;
			  align-items: center;
			  justify-content: space-evenly;
			  margin: 0 10px;
			  border-radius: 5px;
			  cursor: pointer;
			  padding: 0 10px;
			  border: 2px solid lightgrey;
			  transition: all 0.3s ease;
			}
			.wrapper .option .dot{
			  height: 15px;
			  width: 15px;
			  background: #d9d9d9;
			  border-radius: 50%;
			  position: relative;
			}
			.wrapper .option .dot::before{
			  position: absolute;
			  content: "";
			  top: 4px;
			  left: 4px;
			  width: 12px;
			  height: 12px;
			  background: #E1B056;
			  border-radius: 50%;
			  opacity: 0;
			  transform: scale(1.5);
			  transition: all 0.3s ease;
			}
			input[type="radio"]{
			  display: none;
			}
			#option-1:checked:checked ~ .option-1,
			#option-2:checked:checked ~ .option-2,
			#option-3:checked:checked ~ .option-3,
			#option-4:checked:checked ~ .option-4,
			#option-5:checked:checked ~ .option-5,
			#option-6:checked:checked ~ .option-6,
			#option-7:checked:checked ~ .option-7,
			#option-8:checked:checked ~ .option-8,
			#option-9:checked:checked ~ .option-9,
			#option-10:checked:checked ~ .option-10
			{
			  border-color: #E1B056;
			  background: #E1B056;
			}
			
			
			#option-1m:checked:checked ~ .option-1m,
			#option-2m:checked:checked ~ .option-2m,
			#option-3m:checked:checked ~ .option-3m,
			#option-4m:checked:checked ~ .option-4m,
			#option-5m:checked:checked ~ .option-5m,
			#option-6m:checked:checked ~ .option-6m,
			#option-7m:checked:checked ~ .option-7m,
			#option-8m:checked:checked ~ .option-8m,
			#option-9m:checked:checked ~ .option-9m,
			#option-10m:checked:checked ~ .option-10m
			{
			  border-color: #E1B056;
			  background: #E1B056;
			}
		
			input[type='range'][name='budget']{
				
				text-color: black !important;
			}
			.my_banner {
				height: 500px;
			}
			
			@media screen and (max-width: 600px)
			{
			  .my_banner
			  {
				height: 100% !important;
			  }
			  
			   .header.header-fixed {
					animation-duration: .5s;
					animation-name: slideInDown;
					background: #fff;
					box-shadow: 0 5px 30px rgba(0, 22, 84, .1);
					-webkit-box-shadow: 0 5px 30px rgba(0, 22, 84, .1);
					position: fixed;
					top: 0;
					transition: .2s ease-in;
					width: 100%;
					z-index: 999
				}
			}
			
		</style>
	</head>
	<body class="yellow-skin" >
		<div id="alert-container"></div>
		<!--assets/storage/banners/banner-1.jpg !-->
		<div id="main-wrapper">
			<?php  $this->load->view('frontend/include/menu'); ?>
			<div class="clearfix"></div>
			<div id="app">
				<div id="ismain-homes">
					<div class="ck-content"> 
					<div>
					<div class="image-cove hero-banne" >
					    <img class="my_banner" src="<?php echo base_url().$banner['banner_img'] ?>" width="100%" height="50%">
						<div class="container">
						    
							<div class="hero-search-wrap-d">
							 <form  method="get" id="frmhomesearch" action="<?php echo site_url('search/searchProperty'); ?>" >
									<div class="hero-search-content side-form">
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group" id="rf">
												  <div class="wrapper">
												     <input type="radio"   name="requested_for" value="1" id="option-1" checked>
													 <label for="option-1" class="option option-1 inLabel"  >Buy </label>
													 <input type="radio"   name="requested_for" value="2" id="option-2" >
													 <label for="option-2" class="option option-2 inLabel">Sell</label>												 
												  </div>
												</div>
											</div>
											
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group" id="lf">
												  <div class="wrapper" >
												     <input type="radio"   name="request_from" value="1" id="option-3" checked>
													 <label for="option-3" class="option option-3 inLabel">For Buy</label>
													 <input type="radio"   name="request_from" value="5" id="option-4">
													 <label for="option-4" class="option option-4 inLabel">Rent-in</label>
                                                     <input type="radio"   name="request_from" value="6" id="option-5">
													 <label for="option-5" class="option option-5 inLabel">Lease-in</label> 													 
												  </div>
												</div>  
												<div class="form-group" id="af">
												  <div class="wrapper" >
												     <input type="radio"   name="request_from" value="2" id="option-6">
													 <label for="option-6" class="option option-6 inLabel">For Sell</label>
													 <input type="radio"   name="request_from" value="3" id="option-7">
													 <label for="option-7" class="option option-7 inLabel">Rent-out</label>
                                                     <input type="radio"   name="request_from" value="4" id="option-8">
													 <label for="option-8" class="option option-8 inLabel">Lease-out</label> 													 
												  </div>
												</div>
											</div>
										</div>
										<div class="row" style="margin  : 0 2px" >
							          		<div class="col-lg-3 col-md-6 col-sm-6">
												<div class="form-group">
													<button class="btn search-btn inLabel"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"  style="border-radius : 10px" >More <i class="fa fa-caret-down mx-2" aria-hidden="true"></i> </button>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group">
												    <select name="keyword"  class="form-control inLabel select2-search__field single_select" id="searchresult"  type="search" role="textbox" autocomplete="off" >
													     <option value="">Search</option>
													</select>
												</div>
											</div>
											<div class="col-lg-3 col-md-6 col-sm-6">
												<div class="form-group">
													<button class="btn search-btn inLabel" type="submit" style="border-radius : 10px" >Search</button>
												</div>
											</div>
                                         </div>
										 
										 <div class="row collapse" id="collapseExample" style="margin : 0 2px" >
										 
										 	<div class="col-lg-2 col-md-2 col-sm-2">
												<div class="form-group">
													<label>Categoery Type</label>
													<select id="property_cat" onchange="getSubCategory()"  name="category_type" class="form-control has-sub-category inLabel">
														<option value="">Select</option>
														<?php   
														    
															foreach($category as $cat)
															{
																 ?>
																   <option value="<?php echo $cat['id']  ?>"> <?php echo $cat['category']  ?> </option>
																 <?php
															}
														?>
													</select>
												</div>
											</div>
										 <div class="col-lg-2 col-md-2 col-sm-2">
												<div class="form-group">
													<label>Property Type</label>
													<select id="property_type"  name="property_type" class="form-control has-sub-category inLabel">
														<option value="">Select</option>
													</select>
												</div>
											</div>
										 	<div class="col-lg-2 col-md-2 col-sm-2">
												<div class="form-group">
													<label>State</label>
													<select class="form-control" name="property_state" id="sid">
													<option value="">State</option>
													  <?php  
													  
													    if(count($state) > 0)
														{
															foreach($state as $st)
														    {
															 ?>
                                                                 <option value="<?php echo $st['id']; ?>"><?php echo $st['name']; ?></option>
                                                             <?php															 
															}
														}
													
													  ?>
													  
													</select>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-2">
												<div class="form-group">
													<label>City</label>
													<select class="form-control city_id inLabel" name="property_city" id="cid" >
													 <option value="">city</option>
													</select>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-2">
												<div class="form-group">
													<label>Min Price</label>
													<input placeholder="min price"  onkeyup="value=value.replace(/[^\d]/g,'')" type="text" name="min_budget" style="height:47px !important" class="number form-control inLabel">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-2">
												<div class="form-group">
													<label>Max Price</label>
													<input placeholder="max price" onkeyup="value=value.replace(/[^\d]/g,'')" type="text" name="max_budget" style="height:47px !important" class="number form-control inLabel">
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							
							 <div class="hero-search-wrap-mob">
							    <form  method="get" id="frmhomesearch" action="<?php echo site_url('search/property'); ?>" >
									<div class="hero-search-content side-form">
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="form-group" id="rfm">
												  <div class="wrapper ">
												     <input type="radio"   name="requested_for" value="1" id="option-1m" checked>
													 <label for="option-1m" class="option option-1m">Buy </label>
													 <input type="radio"   name="requested_for" value="2" id="option-2m" >
													 <label for="option-2m" class="option option-2m">Sell</label> 
												  </div>
												</div>
											</div>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="form-group" id="lfm">
												  <div class="wrapper" >
												     <input type="radio"   name="request_from" value="1" id="option-3m">
													 <label for="option-3m" class="option option-3m">For Buy</label>
													 <input type="radio"   name="request_from" value="5" id="option-4m">
													 <label for="option-4m" class="option option-4m">Rent-In</label>
                                                     <input type="radio"   name="request_from" value="6" id="option-5m">
													 <label for="option-5m" class="option option-5m">Lease-In</label> 													 
												  </div>
												</div>  
												<div class="form-group" id="afm">
												  <div class="wrapper" >
												     <input type="radio"   name="request_from" value="2" id="option-6m">
													 <label for="option-6m" class="option option-6m">For Sell</label>
													 <input type="radio"   name="request_from" value="3" id="option-7m">
													 <label for="option-7m" class="option option-7m">Rent-out</label>
                                                     <input type="radio"   name="request_from" value="4" id="option-8m">
													 <label for="option-8m" class="option option-8m">Lease-out</label> 													 
												  </div>
												</div>
											</div>
										</div>
										<div class="row">
										    <div class="col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label>Category</label>
													<select id="property_cat_mob" onchange="getSubCategoryMob()"  name="category_type" class="form-control has-sub-category">
													
													
														<?php   
														    
															foreach($category as $cat)
															{
																 ?>
																   <option value="<?php echo $cat['id']  ?>"> <?php echo $cat['category']  ?> </option>
																 <?php
															}
														
														?>
													</select>
												</div>
											</div>
											<div class="col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label>Property Type</label>
													<select id="property_type_mob"  name="property_type" class="form-control has-sub-category">
														
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group">
													<label>State</label>
													<select class="form-control " name="property_state" id="sidm" >
											
													  <?php   
													    if(count($state) > 0)
														{
															foreach($state as $st)
														    {
															 ?>
                                                                 <option value="<?php echo $st['id']; ?>"><?php echo $st['name']; ?></option>
                                                             <?php															 
															}
														}
													     
													  ?>
													  
													</select>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group">
													<label>City</label>
													<select class="form-control city_id" name="property_city" id="cidm" >
													
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group">
													<label>Min Price</label>
													<input  onkeyup="value=value.replace(/[^\d]/g,'')" type="text" name="min_budget" style="height:47px !important" class="number form-control">
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group">
													<label>Max Price</label>
													<input onkeyup="value=value.replace(/[^\d]/g,'')" type="text" name="max_budget" style="height:47px !important" class="number form-control">
												</div>
											</div>
										</div> 
									</div>
									<div class="hero-search-actio">
										<button class="btn search-btn" type="submit">Search Result</button>
									</div>
									</form>
							    </div>
                            
							<!--Moblie-->
						</div>
					</div>
				</div>
				<div>
					<div class="raw-html-embed mt-auto">
						<section style ="padding  : 100px 0" >
							<div class="container">
								<div class="row justify-content-center">
									<div class="col-lg-7 col-md-10 text-center">
										<div class="sec-heading center">
											<h2>How It Works?</h2>
											<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 col-md-4">
										<div class="middle-icon-features-item">
											<div class="icon-features-wrap"><div class="middle-icon-large-features-box f-light-success"><i class="ti-receipt text-success"></i></div></div>
											<div class="middle-icon-features-content">
												<h4>Evaluate Property</h4>
												<p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-4">
										<div class="middle-icon-features-item">
											<div class="icon-features-wrap"><div class="middle-icon-large-features-box f-light-warning"><i class="ti-user text-warning"></i></div></div>
											<div class="middle-icon-features-content">
												<h4>Meet Your Agent</h4>
												<p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-4">
										<div class="middle-icon-features-item remove">
											<div class="icon-features-wrap"><div class="middle-icon-large-features-box f-light-blue"><i class="ti-shield text-blue"></i></div></div>
											<div class="middle-icon-features-content">
												<h4>Close The Deal</h4>
												<p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
				<div>
					
					<section class="bg-light ">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 text-center">
									<div class="sec-heading center">
										<h2>Featured Property</h2>
										<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12">
									<div id="owl-demo-feature" class="owl-carousel owl-theme">
										<!-- Single Property -->
										<?php 
										
										  if(count($featured_property) > 0)
										  {
											  foreach($featured_property as $fp)
											  {
												  ?>
												  
											  
										<div class="single-items">
										
											<div class="property-listing property-2 shadow-none border"
												data-lat="30.1548681"
												data-long="-85.7709976">
												
												<div class="listing-img-wrapper">
													<div class="list-img-slide">
														<div class="click ">
														   <?php  
														     if(count($fp['propertyImages']) > 0)
															 {
																 foreach($fp['propertyImages'] as $pimg)
																 {
																	 ?>
																	    <div>
																			<a href="<?php echo base_url("property_details/").$fp['property_id']; ?>">
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
																		<a href="<?php echo base_url("property_details/").$fp['property_id']; ?>">	
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
												<a href="<?php echo base_url("property_details/").$fp['property_id']; ?>">	
													<div class="listing-short-detail-wrap">
														<div class="listing-short-detail">
															<div class="list-price d-flex justify-content-between">
																<span>
																	<span class="prt-types rent"><?php echo $fp['building_name']; ?></span>
																</span>
																
																<h6 class="listing-card-info-price">
																<i class="fa fa-inr text-dark"></i>
                                                                  <?php  echo $fp['min_budget'] != $fp['max_budget'] ?$fp['min_budget'].'-'.$fp['max_budget']:$fp['max_budget']; ?>
																</h6>
															</div>
															<h4 class="listing-name">
															<a class="prt-link-detail"
															title="4113 Holiday Drive" href="<?php echo base_url("property_details/").$fp['property_id']; ?>">	
															<?php echo $fp['property_area']; ?></a>
															</h4>
															
														</div>
													</div>
													</a>
												</div>
												<div class="price-features-wrapper">
													<div class="list-fx-features">
													    <a href="<?php echo base_url("property_details/").$fp['property_id']; ?>">
														<div class="listing-card-info-icon">
															<div class="inc-fleat-icon">
																<img src="assets/themes/resido/img/bed.svg" width="13" alt=""/>
															</div>
															 <?php echo $fp['sell_type']; ?>
														</div>
														
														<div class="listing-card-info-icon">
															<div class="inc-fleat-icon">
																<img src="assets/themes/resido/img/bathtub.svg" width="13"
																alt=""/>
															</div>
															 <?php echo $fp['property_type']; ?>
														</div>
														<div class="listing-card-info-icon">
															<div class="inc-fleat-icon">
																<img src="assets/themes/resido/img/move.svg" width="13" alt=""/>
															</div>
															<?php echo $fp['requested_for']; ?>
														</div>
														</a>
													</div>
												</div>
												<div class="listing-detail-footer">
													<div class="footer-first">
													<a href="<?php echo base_url("property_details/").$fp['property_id']; ?>">
														<div class="foot-location d-flex">
															<img src="assets/themes/resido/img/pin.svg" width="18" style="width:20px;"
															alt="location"/>
															<?php echo $fp['property_state']." ,".$fp['property_city'] ?>
														</div>
														</a>
													</div>
													<div class="footer-flex">
														<a href="<?php echo base_url("property_details/").$fp['property_id']; ?>" class="prt-view">View</a>
													</div>
												</div>
											</div>
										
										</div>
										
										<?php
											  }
										  }
										
										?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 text-center">
									<a href="javascript:void(0)" class="btn btn-theme-light-2 rounded">More Properties</a>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div>
				<section id="looking_for">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-7 col-md-10 text-center">
								<div class="sec-heading center">
									<h2>Looking For</h2>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
								</div>
							</div>
						</div>
						<div class="row">
								<div class="col-lg-12 col-md-12">
									<div id="owl-demo-lf" class="owl-carousel owl-theme" >
										<!-- Single Property -->
								<?php 
										
								  if(count($looking_for) > 0)
								  {
									 foreach($looking_for as $plf)
									 {
									 ?>
										<div class="single-items">
											<div class="property-listing property-2 shadow-none border"
												data-lat="30.1548681"
												data-long="-85.7709976">
												<div class="listing-img-wrapper">
													<div class="list-img-slide">
														<div class="click ">
															<?php  
														     if(count($plf['propertyImages']) > 0)
															 {
																 foreach($plf['propertyImages'] as $pimg)
																 {
																	 ?>
																	    <div>
																			<a href="<?php echo base_url("property_details/").$plf['property_id']; ?>">
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
																		<a href="<?php echo base_url("property_details/").$plf['property_id']; ?>">
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
													<div class="listing-short-detail-wrap">
														<div class="listing-short-detail">
														<a class="prt-link-detail" href="<?php echo base_url("property_details/").$plf['property_id']; ?>">
															<div class="list-price d-flex justify-content-between">
																<span>
																	<span class="prt-types rent"><?php echo $plf['building_name']; ?></span>
																</span>
																<h6 class="listing-card-info-price">
																 <i class="fa fa-inr text-dark"></i>
															
								                                  <?php  echo $plf['min_budget'] != $plf['max_budget'] ?$plf['min_budget'].'-'.$plf['max_budget']:$plf['max_budget']; ?>								 
																</h6>
															</div>
															</a>
															<h4 class="listing-name">
															<a class="prt-link-detail" href="<?php echo base_url("property_details/").$plf['property_id']; ?>">
															<?php echo $plf['property_area']; ?></a>
															</h4>
														</div>
													</div>
												</div>
												<div class="price-features-wrapper">
													<div class="list-fx-features">
													<a class="prt-link-detail" href="<?php echo base_url("property_details/").$plf['property_id']; ?>">
														<div class="listing-card-info-icon">
															<div class="inc-fleat-icon">
																<img src="assets/themes/resido/img/bed.svg" width="13" alt=""/>
															</div>
															 <?php echo $plf['sell_type']; ?>
														</div>
														
														<div class="listing-card-info-icon">
															<div class="inc-fleat-icon">
																<img src="assets/themes/resido/img/bathtub.svg" width="13"
																alt=""/>
															</div>
															 <?php echo $plf['property_type']; ?>
														</div>
														<div class="listing-card-info-icon">
															<div class="inc-fleat-icon">
																<img src="assets/themes/resido/img/move.svg" width="13" alt=""/>
															</div>
															<?php echo $plf['requested_for']; ?>
														</div>
														</a>
													</div>
												</div>
												<div class="listing-detail-footer">
													<div class="footer-first">
													<a class="prt-link-detail" href="<?php echo base_url("property_details/").$plf['property_id']; ?>">
														<div class="foot-location d-flex">
															<img src="assets/themes/resido/img/pin.svg" width="18" style="width:20px;"
															alt="Hampton, Virginia"/>
															<?php echo $plf['property_state']." ,".$plf['property_city'] ?>
														</div>
													</a>
													</div>
													<div class="footer-flex">
														<a href="<?php echo base_url("property_details/").$plf['property_id']; ?>" class="prt-view">View</a>
													</div>
												</div>
											</div>
										</div>
									<?php
									 }
								   }
										
									?>	
									</div>
								</div>
							</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 text-center">
								<a href="<?php echo base_url("get_more_property?id=1");  ?>"
								class="btn btn-theme-light-2 rounded">Browse More Locations</a>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div>
				<section class="bg-light" id="available_for">
					<div class="container ">
						<div class="row justify-content-center">
							<div class="col-lg-7 col-md-10 text-center">
								<div class="sec-heading center">
									<h2>Available For</h2>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
								</div>
							</div>
						</div>
						<div class="row">
								<div class="col-lg-12 col-md-12">
									<div id="owl-demo-af" class="owl-carousel owl-theme">
										<!-- Single Property -->
								    <?php 
										
								  if(count($available_for) > 0)
								  {
									 foreach($available_for as $paf)
									 {
									 ?>
										<div class="single-items">
											<div class="property-listing property-2 shadow-none border"
												data-lat="30.1548681"
												data-long="-85.7709976">
												<div class="listing-img-wrapper">
													<div class="list-img-slide">
														<div class="click ">
															<?php  
														     if(count($paf['propertyImages']) > 0)
															 {
																 foreach($paf['propertyImages'] as $pimg)
																 {
																	 ?>
																	    <div>
																			<a href="<?php echo base_url("property_details/").$paf['property_id']; ?>">
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
																		<a href="<?php echo base_url("property_details/").$paf['property_id']; ?>">
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
													<div class="listing-short-detail-wrap">
														<div class="listing-short-detail">
														    <a href="<?php echo base_url("property_details/").$paf['property_id']; ?>" 
															class="prt-link-detail">
															<div class="list-price d-flex justify-content-between">
																<span>
																	<span class="prt-types rent"><?php echo $paf['building_name']; ?></span>
																</span>
																<h6 class="listing-card-info-price">
																<i class="fa fa-inr text-dark"></i> 
																<?php  echo $paf['min_budget'] != $paf['max_budget'] ?$paf['min_budget'].'-'.$paf['max_budget']:$paf['max_budget']; ?>
															
																</h6>
															</div>
															</a>
															<h4 class="listing-name">
															<a href="<?php echo base_url("property_details/").$paf['property_id']; ?>" 
															class="prt-link-detail"><?php echo $paf['property_area']; ?></a>
															</h4>
															
														</div>
													</div>
												</div>
												<div class="price-features-wrapper">
													<div class="list-fx-features">
													<a href="<?php echo base_url("property_details/").$paf['property_id']; ?>" >
														<div class="listing-card-info-icon">
															<div class="inc-fleat-icon">
																<img src="assets/themes/resido/img/bed.svg" width="13" alt=""/>
															</div>
															 <?php echo $paf['sell_type']; ?>
														</div>
														
														<div class="listing-card-info-icon">
															<div class="inc-fleat-icon">
																<img src="assets/themes/resido/img/bathtub.svg" width="13"
																alt=""/>
															</div>
															 <?php echo $paf['property_type']; ?>
														</div>
														<div class="listing-card-info-icon">
															<div class="inc-fleat-icon">
																<img src="assets/themes/resido/img/move.svg" width="13" alt=""/>
															</div>
															<?php echo $paf['requested_for']; ?>
														</div>
													</a>	
													</div>
												</div>
												<div class="listing-detail-footer">
													<div class="footer-first">
													<a href="<?php echo base_url("property_details/").$paf['property_id']; ?>" >
														<div class="foot-location d-flex">
															<img src="assets/themes/resido/img/pin.svg" width="18" style="width:20px;"
															alt="location"/>
															<?php echo $paf['property_state']." ,".$paf['property_city'] ?>
														</div>
													</a>
													</div>
													<div class="footer-flex">
														<a href="<?php echo base_url("property_details/").$paf['property_id']; ?>" class="prt-view">View</a>
													</div>
												</div>
											</div>
										</div>
									<?php
									 }
								   }
										
									?>		
									</div>
								</div>
							</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 text-center">
								<a href="<?php echo base_url("get_more_property?id=2");  ?>"
								class="btn btn-theme-light-2 rounded">Browse More Locations</a>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- <div>
				<section class="bg-orange">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-7 col-md-10 text-center">
								<div class="sec-heading center">
									<h2>Good Reviews By Customers</h2>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
								</div>
							</div>
						</div>
						<div class="row justify-content-center">
							<testimonials-component url="ajax/testimonials.html"></testimonials-component>
						</div>
					</div>
				</section>
			</div> -->
			<div>
				<section>
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-7 col-md-10 text-center">
								<div class="sec-heading center">
									<h2>Articles</h2>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
								</div>
							</div>
						</div>
						<div class="row">
                            <div class="col-sm-12">
                                <div class="scontent">
								   <div id="owl-demo-blog" class="owl-carousel owl-theme">
								   <?php
								   if(count($blogs) > 0)
								   {
									 foreach($blogs as $blog)
									 {
									 ?>
								      <div class="item">
										 <div class="blog-wrap-grid">
                                                <div class="blog-thumb">
                                                    <a href="#">
                                                        <img
                                                        data-src="<?php echo base_url().$blog['blog_image']; ?>"
                                                        src="assets/storage/general/img-loading.jpg"
                                                        alt="Average U.S. Rental Price Hits a Two-Year High" class="img-fluid thumb lazy">
                                                    </a>
                                                </div>
                                                <div class="blog-info">
                                                    <div class="post-meta">
                                                        <p class="d-inline-block">
                                                            <i class="fa fa-calendar"></i> <?php echo date('d-M-Y', strtotime($blog['created']))  ?> 
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="blog-body">
                                                    <h4 class="bl-title">
                                                    <a href="#" title="Average U.S. Rental Price Hits a Two-Year High">
                                                        <?php echo $blog['blog_title']; ?>
                                                    </a>
                                                    </h4>
                                                    <p style="-webkit-line-clamp: 3 !important;overflow: hidden;display: -webkit-box; height: 5.6em;"> <?php echo $blog['blog_description']; ?></p>
                                                    <!--<a href="#" class="bl-continue">Continue</a> !-->
                                                </div>
                                            </div>
									  </div>
									  <?php
									 }
								   }
									  
									  ?>
								   </div>
                                    <br>
                                </div>
                            </div>
                        </div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 text-center">
								<a href="javascript:void(0)"
								class="btn btn-theme-light-2 rounded">Browse More Locations</a>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div>
				<section class="bg-light">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-7 col-md-10 text-center">
								<div class="sec-heading center">
									<h2>Feedback</h2>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
								</div>
							</div>
						</div>
						<div class="row">
                            <div class="col-sm-12">
                                <div class="scontent">
								   <div id="owl-demo-feedback" class="owl-carousel owl-theme">
								   <?php
								   if(count($feedbacks) > 0)
								   {
									 foreach($feedbacks as $feedback)
									 {
									 ?>
								      <div class="item">
										 <div class="blog-wrap-grid">
                                                <div class="blog-thumb">
                                                    <a href="#">
                                                        <img
                                                        data-src="<?php echo base_url().$feedback['user_image']; ?>"
                                                        src="assets/storage/general/img-loading.jpg"
                                                        alt="" class="img-fluid thumb lazy">
                                                    </a>
                                                </div>
                                                <div class="blog-info">
                                                    <div class="post-meta">
                                                        <p class="d-inline-block">
                                                            <i class="fa fa-calendar"></i> <?php echo date('d-M-Y', strtotime($feedback['created']))  ?> 
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="blog-body">
                                                    <h4 class="bl-title">
                                                    <a href="#" title="">
                                                        <?php echo $feedback['user_name']; ?>
                                                    </a>
                                                    </h4>
													<!--<p>
													    <?php echo $feedback['message']; ?>
													</p>  !-->
                                                    <p>
													  <?php  
													  
													    if($feedback['rating'] == 1)
														{
															?>
															   <h4>
															   <i class="fa fa-star text-warning" aria-hidden="true"></i>
															   <i class="fa fa-star " aria-hidden="true"></i>
															   <i class="fa fa-star " aria-hidden="true"></i>
															   <i class="fa fa-star " aria-hidden="true"></i>
															   <i class="fa fa-star " aria-hidden="true"></i>
															   </h4>
															<?php
														}
													    elseif($feedback['rating'] == 2)
														{
															?>
															   <h4>
															   <i class="fa fa-star text-warning" aria-hidden="true"></i>
															   <i class="fa fa-star text-warning" aria-hidden="true"></i>
															   <i class="fa fa-star " aria-hidden="true"></i>
															   <i class="fa fa-star " aria-hidden="true"></i>
															   <i class="fa fa-star " aria-hidden="true"></i>
															   </h4>
															<?php
														}
														elseif($feedback['rating'] == 3)
														{
															?>
															   <h4>
															   <i class="fa fa-star text-warning" aria-hidden="true"></i>
															   <i class="fa fa-star text-warning" aria-hidden="true"></i>
															   <i class="fa fa-star text-warning" aria-hidden="true"></i>
															   <i class="fa fa-star " aria-hidden="true"></i>
															   <i class="fa fa-star " aria-hidden="true"></i>
															   </h4>
															<?php
														}
														elseif($feedback['rating'] == 4)
														{
															?>
															   <h4>
															   <i class="fa fa-star text-warning" aria-hidden="true"></i>
															   <i class="fa fa-star text-warning" aria-hidden="true"></i>
															   <i class="fa fa-star text-warning" aria-hidden="true"></i>
															   <i class="fa fa-star text-warning" aria-hidden="true"></i>
															   <i class="fa fa-star " aria-hidden="true"></i>
															   </h4>
															<?php
														}
														elseif($feedback['rating'] == 5)
														{
															?>
															   <h4>
															   <i class="fa fa-star text-warning" aria-hidden="true"></i>
															   <i class="fa fa-star text-warning" aria-hidden="true"></i>
															   <i class="fa fa-star text-warning" aria-hidden="true"></i>
															   <i class="fa fa-star text-warning" aria-hidden="true"></i>
															   <i class="fa fa-star text-warning" aria-hidden="true"></i>
															   </h4>
															<?php
														}
													  
													  ?>
													   
													</p>
                                                    <!--<a href="#" class="bl-continue">Continue</a> !-->
                                                </div>
                                            </div>
									  </div>
									  <?php
									 }
								   }
									  
									  ?>
								   </div>
                                    <br>
                                </div>
                            </div>
                        </div>
						
					</div>
				</section>
			</div>
		</div>
	</div>
</div>

<!-- ============================ Footer Start ================================== -->
<?php  $this->load->view('frontend/include/footer'); ?>

<script>
  

    function getSubCategory()
	{
		var cid = $("#property_cat").val();
		$.ajax({
			
		   type:'POST',
		   url:'<?php echo base_url('mobile/PostFilter/getSubCategory') ?>',
           data:{cid:cid},
		   dataType:"json",
		   success:function(data)
		   {
			  $('#property_type').html(data);
		   }
	  });
	}
	
	function getSubCategoryMob()
	{
		var cid = $("#property_cat_mob").val();
		$.ajax({
			
		   type:'POST',
		   url:'<?php echo base_url('mobile/PostFilter/getSubCategory') ?>',
           data:{cid:cid},
		   dataType:"json",
		   success:function(data)
		   {
			  $('#property_type_mob').html(data);
		   }
	  });
	}

    $(document).ready(function() {
	
	$('#sid').select2({
	  
	});
	$('#cid').select2({
	  
	});
	$('#property_type').select2({
	  
	});
	
	$('#property_cat').select2({
	  
	});
	
	$("#rf input[type='radio'][name='requested_for']").on('change', function() {
	  
	   var val = $(this).val();
	   
	   if(val == 2)
	   { 
		  $("#af").show();
		  $("#lf").hide();
		  
	   }
	   else if(val == 1)
	   {
		  $("#lf").show();
		  $("#af").hide();
	   }
	  
	});
	
	$("#rfm input[type='radio'][name='requested_for']").on('change', function() {
	  
	   var val = $(this).val();
	   
	   if(val == 2)
	   { 
		  $("#afm").show();
		  $("#lfm").hide();
		  
	   }
	   else if(val == 1)
	   {
		  $("#lfm").show();
		  $("#afm").hide();
	   }
	  
	});
	
    
	
	
	// $("input[type='radio'][name='sell_type']").on('change', function() {
	  
	    // var  subCatId = $(this).val();
        // if(subCatId){
            
            // $.ajax({
            // type:'POST',
            // url:'<?php echo base_url('mobile/PostFilter/getChildCat') ?>',
            // data:{subCatId:subCatId},
            // dataType:"json",
            // success:function(data){
                                
                // $('#property_type').html(data);
            // }
        // });
        // } 	
	  
	// });
	
   $('#sid').change(function(){
        var  stateId = $(this).val();
		
        if(stateId){
            
            $.ajax({
            type:'POST',
            url:'<?php echo base_url('administrator/Location/getCityByState') ?>',
            data:{stateId:stateId},
            dataType:"json",
            success:function(data){
                                
                $('#cid').html(data);
            }
        });
        }   
    });

$('#sidm').change(function(){
        var  stateId = $(this).val();
		
        if(stateId){
            
            $.ajax({
            type:'POST',
            url:'<?php echo base_url('administrator/Location/getCityByState') ?>',
            data:{stateId:stateId},
            dataType:"json",
            success:function(data){
                                
                $('#cidm').html(data);
            }
        });
        }   
    });		

 
  $("#owl-demo-blog").owlCarousel({
 
      navigation : true, // Show next and prev buttons
 
      slideSpeed : 300,
      paginationSpeed : 400,
 
     
      itemsDesktop : false,
      itemsDesktopSmall : false,
      itemsTablet: false,
      itemsMobile : false,
	  responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:3,
				nav:false
			},
			1000:{
				items:3,
				nav:true,
				loop:false
			}
		}
 
  });
 
});
</script>

<script>

$(document).ready(function() {
 
  $("#owl-demo-feedback").owlCarousel({
 
      navigation : true, // Show next and prev buttons
 
      slideSpeed : 300,
      paginationSpeed : 400,
 
      // items : 3, 
      itemsDesktop : false,
      itemsDesktopSmall : false,
      itemsTablet: false,
      itemsMobile : false,
	  responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:3,
				nav:false
			},
			1000:{
				items:3,
				nav:true,
				loop:true
			}
		}
	 
	  });
	  
	  $("#owl-demo-feature").owlCarousel({
 
		  navigation : true, // Show next and prev buttons
	 
		  slideSpeed : 300,
		  paginationSpeed : 400,
	 
		  // items : 3, 
		  itemsDesktop : false,
		  itemsDesktopSmall : false,
		  itemsTablet: false,
		  itemsMobile : false,
		  responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				600:{
					items:3,
					nav:false
				},
				1000:{
					items:3,
					nav:true,
					loop:true
				}
			}
	 
	  });
	  
	  
	  $("#owl-demo-af").owlCarousel({
 
		  navigation : true, // Show next and prev buttons
	 
		  slideSpeed : 300,
		  paginationSpeed : 400,
	 
		  // items : 3, 
		  itemsDesktop : false,
		  itemsDesktopSmall : false,
		  itemsTablet: false,
		  itemsMobile : false,
		  responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				600:{
					items:3,
					nav:false
				},
				1000:{
					items:3,
					nav:true,
					loop:true
				}
			}
	 
	  });
	  
	  
	  $("#owl-demo-lf").owlCarousel({
 
		  navigation : true, // Show next and prev buttons
	 
		  slideSpeed : 300,
		  paginationSpeed : 400,
	 
		  // items : 3, 
		  itemsDesktop : false,
		  itemsDesktopSmall : false,
		  itemsTablet: false,
		  itemsMobile : false,
		  responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				600:{
					items:3,
					nav:false
				},
				1000:{
					items:3,
					nav:true,
					loop:true
				}
			}
	 
	  });
	  
 
});
</script>

</body>
</html>