<!DOCTYPE html>
<html lang="en">
	<head>
		<?php  $this->load->view('frontend/include/header'); ?>
		
		<style>
		
		.my-cic{
			display : flex ;
			justify-content : center;
			flex-wrap: wrap;
			
		}
		
		.my_circle{
			width : 160px;
			height : 160px;
			background-color : #E1B056;
			color : white;
			border-radius : 50%;
			text-align : center;
			display : flex;
			align-items  : center;
			box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
			font-size : 20px;
			justify-content : center;
		}
		a{
			text-decoration : none;
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
													
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										
										<div class=" col-lg-2  my-cic">
											<a href="<?php echo base_url().'post_property/buy' ?>"> <p class="my_circle" >Buy </p></a>
										</div>
										<div class=" col-lg-2  my-cic ">
											<a href="<?php echo base_url().'post_property/tenant' ?>"> <p class="my_circle " >Rent In</p></a>
										</div>
										
										<div class=" col-lg-2  my-cic ">
											<a href="<?php echo base_url().'post_property/lessee' ?>"> <p class="my_circle " >Lease In</p></a>
										</div>
										
										<div class=" col-lg-2  my-cic ">
											<a href="<?php echo base_url().'post_property/sell' ?>"> <p class="my_circle " >Sell</p></a>
										</div>
										
										<div class=" col-lg-2  my-cic ">
											<a href="<?php echo base_url().'post_property/landlord' ?>"> <p class="my_circle " >Rent Out</p></a>
										</div>
										
										<div class=" col-lg-2  my-cic  ">
											<a href="<?php echo base_url().'post_property/lessor' ?>"> <p class="my_circle  " >Lease Out</p></a>
										</div>
										
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		
		<!-- ============================ Footer Start ================================== -->
		<?php  $this->load->view('frontend/include/footer'); ?>
	</body>
</html>