<?php $this->load->view('user/include/header'); ?>
<div class="page-content">
	<div class="container-fluid">
		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0">My Member Ship</h4>
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">My Member Ship</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<section id="pricing-section">
			<div class="container">
				<div class="row">
					
					<div class="col-lg-3 col-md-6 col-12">
						<div class="card pricing-wrap  standard-pr text-center p-3">
							<div class="pricing-header p-3 bg-info" >
								<h4 class="pr-title text-white">Basic Plan</h4>
								<h6 class="pr-value text-danger"><span> <i class="fa fa-inr" aria-hidden="true"></i> </span> Free</h6>
							</div>
							<div class="card-body pricing-body">
								<ul>
									<li class="available"><span class="text-warning">Validity:</span> Currently Unlimited  <span>Days </span></li>
									<li class="available"> We offering you free to add,sell,buy your property. </li>
								</ul>
							</div>
							<div class="pricing-bottom">
								<a href="#" class="btn-pricing btn " style="background-color:#E1B056;">Choose Plan</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<?php  $this->load->view('user/include/newfooter'); ?>
<script>
function readURL(input)
	{
	if(input.files && input.files[0])
		{
		var reader = new FileReader();
reader.onload = function (e) {
			$('#blah').attr('src', e.target.result);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
	
</script>