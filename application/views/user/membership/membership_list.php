<?php $this->load->view('user/include/header'); ?>
<div class="page-content">
	<div class="container-fluid">
		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0">Member Ship Plan</h4>
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Member Ship Plan</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<section id="pricing-section">
			<div class="container">
				<div class="row">
					<?php foreach($membership_plan as $mp){ ?> 
					<div class="col-lg-3 col-md-6 col-12">
						<div class="card pricing-wrap  standard-pr text-center p-3">
							<div class="pricing-header p-3 bg-info" >
								<h4 class="pr-title text-white"><?php echo $mp['plan_type'] ?></h4>
								<h6 class="pr-value text-danger"><span> <i class="fa fa-inr" aria-hidden="true"></i> </span> <?php echo $mp['price'] ?></h6>
							</div>
							<div class="card-body pricing-body">
								<ul>
									<li class="available"><span class="text-warning">Validity: </span> <?php echo $mp['validity'] ?>  <span>Days </span></li>
									<li class="available"><?php echo $mp['description'] ?> </li>
								</ul>
							</div>
							<div class="pricing-bottom">
								<a href="#" class="btn-pricing btn " style="background-color:#E1B056;">Choose Plan</a>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</section>
	</div>
</div>
<?php  $this->load->view('user/include/newfooter'); ?>