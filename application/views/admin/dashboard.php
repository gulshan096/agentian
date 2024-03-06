<?php $this->load->view('admin/include/header'); ?>
<div class="page-content">
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0">Dashboard</h4>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			
			<div class="col-xl-2 col-sm-6">
				<div class="card">
					<div class="card-body">
						<a href="<?php echo base_url('administrator/request/buy'); ?>">
							<div class="d-flex text-muted">
								<div class="flex-shrink-0 me-3 align-self-center">
									<div id="radialchart-3" class="apex-charts" dir="ltr"></div>
								</div>
								<div class="flex-grow-1 overflow-hidden">
									<p class="mb-1">Buyer</p>
									<h5 class="mb-3"><?php echo $totalBuyRequest; ?></h5>
								</div>
							</div>
						</a>
					</div>
					
				</div>
				
			</div>
			
			<div class="col-xl-2 col-sm-6">
				<div class="card">
					<div class="card-body">
						<a href="<?php echo base_url('administrator/request/sell'); ?>">
							<div class="d-flex text-muted">
								<div class="flex-shrink-0 me-3 align-self-center">
									<div id="radialchart-3" class="apex-charts" dir="ltr"></div>
								</div>
								<div class="flex-grow-1 overflow-hidden">
									<p class="mb-1">Seller </p>
									<h5 class="mb-3"><?php echo $totalSellRequest; ?></h5>
									
								</div>
							</div>
						</a>
					</div>
					
				</div>
				
			</div>
			
			<div class="col-xl-2 col-sm-6">
				<div class="card">
					<div class="card-body">
						<a href="<?php echo base_url('administrator/request/rent'); ?>">
							<div class="d-flex text-muted">
								<div class="flex-shrink-0  me-3 align-self-center">
									<div class="avatar-sm">
										<div class="avatar-title bg-light rounded-circle text-primary font-size-20">
											<i class="ri-group-line"></i>
										</div>
									</div>
								</div>
								<div class="flex-grow-1 overflow-hidden">
									<p class="mb-1">Rent-in </p>
									<h5 class="mb-3"><?php echo $totalRentRequest; ?></h5>
									
								</div>
							</div>
						</a>
					</div>
					
				</div>
				
			</div>
			<div class="col-xl-2 col-sm-6">
				<div class="card">
					<div class="card-body">
						<a href="<?php echo base_url('administrator/request/landlord'); ?>">
							<div class="d-flex text-muted">
								<div class="flex-shrink-0  me-3 align-self-center">
									<div class="avatar-sm">
										<div class="avatar-title bg-light rounded-circle text-primary font-size-20">
											<i class="ri-group-line"></i>
										</div>
									</div>
								</div>
								<div class="flex-grow-1 overflow-hidden">
									<p class="mb-1">Rent-out</p>
									<h5 class="mb-3"><?php echo $totalLandlordRequest; ?></h5>
									
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xl-2 col-sm-6">
				<div class="card">
					<div class="card-body">
						<a href="<?php echo base_url('administrator/request/lease'); ?>">
							<div class="d-flex text-muted">
								<div class="flex-shrink-0  me-3 align-self-center">
									<div class="avatar-sm">
										<div class="avatar-title bg-light rounded-circle text-primary font-size-20">
											<i class="ri-group-line"></i>
										</div>
									</div>
								</div>
								<div class="flex-grow-1 overflow-hidden">
									<p class="mb-1">Lessee-in </p>
									<h5 class="mb-3"><?php echo $totalLesseeRequest; ?></h5>
									
								</div>
							</div>
						</a>
					</div>
					
				</div>
				
			</div>
			
			<div class="col-xl-2 col-sm-6">
				<div class="card">
					<div class="card-body">
						<a href="<?php echo base_url('administrator/request/lessor'); ?>">
							<div class="d-flex text-muted">
								<div class="flex-shrink-0  me-3 align-self-center">
									<div class="avatar-sm">
										<div class="avatar-title bg-light rounded-circle text-primary font-size-20">
											<i class="ri-group-line"></i>
										</div>
									</div>
								</div>
								<div class="flex-grow-1 overflow-hidden">
									<p class="mb-1">Lease-out</p>
									<h5 class="mb-3"><?php echo $totalLessorRequest; ?></h5>
									
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			
		</div>
		
		<div class="row">
			<div class="col-xl-4 d-none">
				<div class="card">
					<div class="card-body">
						<div class="d-flex  align-items-center">
							<div class="flex-grow-1">
								<h5 class="card-title">Latest Blog</h5>
							</div>
							<div class="flex-shrink-0">
								<select class="form-select form-select-sm mb-0 my-n1">
									<option value="MAY" selected="">May</option>
									<option value="AP">April</option>
									<option value="MA">March</option>
									<option value="FE">February</option>
									<option value="JA">January</option>
									<option value="DE">December</option>
								</select>
							</div>
						</div>
						<div>
							<div id="radialBar-chart" class="apex-charts" dir="ltr"></div>
						</div>
						<div class="row">
							<div class="col-4">
								<div class="social-source text-center mt-3">
									<div class="avatar-xs mx-auto mb-3">
										<span class="avatar-title rounded-circle bg-primary font-size-18">
											<i class="ri  ri-facebook-circle-fill text-white"></i>
										</span>
									</div>
									<h5 class="font-size-15">Completed</h5>
									<p class="text-muted mb-0">5245 sales</p>
								</div>
							</div>
							<div class="col-4">
								<div class="social-source text-center mt-3">
									<div class="avatar-xs mx-auto mb-3">
										<span class="avatar-title rounded-circle bg-info font-size-18">
											<i class="ri  ri-twitter-fill text-white"></i>
										</span>
									</div>
									<h5 class="font-size-15">Running</h5>
									<p class="text-muted mb-0">112 sales</p>
								</div>
							</div>
							<div class="col-4">
								<div class="social-source text-center mt-3">
									<div class="avatar-xs mx-auto mb-3">
										<span class="avatar-title rounded-circle bg-danger font-size-18">
											<i class="ri ri-instagram-line text-white"></i>
										</span>
									</div>
									<h5 class="font-size-15">Cancel</h5>
									<p class="text-muted mb-0">25 sales</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xl-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Latest Blogs</h5>
						<div class="table-responsive">
						<table class="table table-centered table-nowrap mb-0">
							<thead class=" bg-light">
								<tr>
									<th>Posted by</th>
									<th>Status</th>
									<th>Posted On</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(!empty($latestBlog))
									{
										foreach($latestBlog as $blog)
										{
								?>
								<tr>
									<td><?php echo $blog['name']  ?></td>
									<td><?php echo !empty($blog['status'])?"<button onclick='updatestatus(this);' t='blog' i='id' v='$blog[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='blog' i='id' v='$blog[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
									<td><?php echo date('d-m-Y',strtotime($blog['created']));  ?></td>
								</tr>
								<?php
																	}
								}
								
								?>
								
							</tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
			<!-- end col -->
			
			<div class="col-lg-6">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Latest Wishlist </h4>
						<div class="table-responsive">
						<table class="table table-centered table-nowrap mb-0">
							<thead class=" bg-light">
								<tr>
									<th>User</th>
									<th>Created</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(!empty($latestWishlist))
									{
										foreach($latestWishlist as $wishlist)
										{
								?>
								<tr>
									<td><?php echo $wishlist['name']  ?></td>
						
									<td><?php echo date('d-m-Y',strtotime($wishlist['created']));  ?></td>
								</tr>
								<?php
																	}
								}
								
								?>
								
							</tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row"><div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title mb-4">Latest Posts</h4>
					<div class="table-responsive">
						<table class="table table-centered table-nowrap mb-0">
							<thead class=" bg-light">
								<tr>
									<th>User</th>
									<th>Request From</th>
									<th>Category</th>
									<th>Sub category</th>
									<th>Status</th>
									<th>Created</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(!empty($latestRequest))
								{
									foreach($latestRequest as $row)
									{
								?>
								<tr>
									<td><?php echo $row['name']  ?></td>
									<td>
									<?php 
									
									  if($row['request_from'] == 1)
									  {
										    echo "Buyer";
									  }
									  elseif($row['request_from'] == 2)
									  {
										    echo "Seller";
									  }
                                      elseif($row['request_from'] == 3)
									  {
											echo "Rent-out";
									  }
                                      elseif($row['request_from'] == 4)
									  {
										    echo "Lease-out";	
									  }
                                      elseif($row['request_from'] == 5)
									  {
											echo "Rent-in";
									  }
                                      elseif($row['request_from'] == 6)
									  {
											echo "Lease-in";
									  }									  

									?>
									</td>
									<td><?php echo $row['category']  ?></td>
							        <td><?php echo $row['subcategory']  ?></td>
									<td><?php echo !empty($row['status'])?"<button onclick='updatestatus(this);' t='property' i='property_id' v='$row[property_id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='property' i='property_id' v='$row[property_id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
									<td><?php echo date('d-m-Y',strtotime($row['created']));  ?></td>
								</tr>
								<?php
								  }
								}
								
								?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php $this->load->view('admin/include/newfooter'); ?>