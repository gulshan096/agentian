<?php $this->load->view('user/include/header'); ?>

<?php   
    $userid  = $this->session->userdata('aid');
	$post_price = $this->db->where('status',1)->get('wallet_system')->row()->post_price;
    $credit =  $this->db->select_sum("credit")
							  ->from("transaction")
							  ->where("user_id",$userid)
							  ->where("status",1)
							  ->get()->row_array();
					
							  
				    $debit =  $this->db->select_sum("debit")
							  ->from("transaction")
							  ->where("user_id",$userid)
							  ->where("status",1)
							  ->get()->row_array();
					 
		 $wallet =  $credit['credit'] - $debit['debit'];

         $rem_post = 	floor($wallet/$post_price);	 
   
?>
<div class="page-content">
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0">Dashboard</h4>
				</div>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-xl-3 col-sm-6">
				<div class="card bg-warning text-white">
					<div class="card-body"> 
						<a href="javascript:void(0)">
							<div class="d-flex text-muted">
								<div class="flex-shrink-0 me-3 align-self-center">
									<div id="radialchart-3" class="apex-charts" dir="ltr"></div>
								</div>
								<div class="flex-grow-1 overflow-hidden">
									<p class="mb-1">Available Wallet Balance</p>
									<h5 class="mb-3"><?php  echo $wallet; ?></h5>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			
			<div class="col-xl-3 col-sm-6">
				<div class="card bg-warning text-white">
					<div class="card-body">
						<a href="javascript:void(0)">
							<div class="d-flex text-muted">
								<div class="flex-shrink-0 me-3 align-self-center">
									<div id="radialchart-3" class="apex-charts" dir="ltr"></div>
								</div>
								<div class="flex-grow-1 overflow-hidden">
									<p class="mb-1">Used Wallet Balance</p>
									<h5 class="mb-3"><?php  echo $debit['debit'] ?></h5>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
            <div class="col-xl-3 col-sm-6">
				<div class="card bg-warning text-white">
					<div class="card-body">
						<a href="javascript:void(0)">
							<div class="d-flex text-muted">
								<div class="flex-shrink-0 me-3 align-self-center">
									<div id="radialchart-3" class="apex-charts" dir="ltr"></div>
								</div>
								<div class="flex-grow-1 overflow-hidden">
									<p class="mb-1">Total Post </p>
									<h5 class="mb-3"><?php  echo !empty($total_post)?$total_post:'0'; ?></h5>
									
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6">
				<div class="card bg-warning text-white">
					<div class="card-body">
						<a href="javascript:void(0)">
							<div class="d-flex text-muted">
								<div class="flex-shrink-0 me-3 align-self-center">
									<div id="radialchart-3" class="apex-charts" dir="ltr"></div>
								</div>
								<div class="flex-grow-1 overflow-hidden">
									<p class="mb-1">Available Post </p>
									<h5 class="mb-3"><?php  echo $rem_post; ?></h5>
									
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Latest Post</h5>
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
		</div>
	</div>
</div>
</div>
<?php $this->load->view('user/include/newfooter'); ?>