<?php $this->load->view('admin/include/header'); ?>
<div class="page-content">
	<div class="container-fluid">
		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0">Manage Comments</h4>
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Manage Comments</a></li>
							<li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!-- end page title -->
		<div class="row">
			<div class="col-xl-12" >
				
				<div class="card">
					<div class="card-body">
						
						<div style='clear:both;'></div>
						<table id="tabeldatahere" class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Author</th>
									<th>Property Name</th>
									<th>Rating</th>
									<th>Comments</th>
									<th>Submitted_On</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(!empty($GetComments))
								{
							     $i = 0;
								foreach($GetComments as $singi)
									{
								 $i++;		
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $singi['name']; ?></td>
									<td><?php echo $singi['building_name']; ?></td>
									<td><?php echo $singi['rating']; ?></td>
									<td><?php echo $singi['message']; ?></td>
									<td><?php echo showtime4db($singi['created']);?></td>
									<td><?php echo !empty($singi['status'])?"<button onclick='updatestatus(this);' t='feedback' i='id' v='$singi[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='feedback' i='id' v='$singi[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
									<td><a class="fa fa-edit" href="<?php echo base_url("administrator/comments/list/$singi[id]"); ?>"></a></td>
								</tr>
								<?php
								}
								}
								
								?>
							</tbody>
						</table>
						
					</div>
					<!-- end card-body -->
				</div>
				<!-- end card -->
			</div>
			<div style='clear:both;'></div>
			<!-- end col -->
		</div>
		<!-- end row -->
	</div>
	<!-- container-fluid -->
</div>
<!-- End Page-content -->
<?php $this->load->view('admin/include/newfooter'); ?>