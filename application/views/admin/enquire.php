<?php $this->load->view('admin/include/header'); ?>
<div class="page-content">
	<div class="container-fluid">
		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0">Enquire</h4>
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Enquire list</a></li>
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
							<thead class="text-center">
								<tr>
							
									<th>Name</th>
									<th>Email</th>
									<th>Mobile</th>
									<th>Subject</th>
									<th>Message</th>
									<th>Created</th>
							
								</tr>
							</thead>
							<tbody class="text-center">
								<?php
							    if(!empty($enquire_list))
								{
					
								foreach($enquire_list as $row)
								{
				
								?>
								<tr>
									
									<td><?php echo !empty($row['name'])?$row['name']:''; ?></td>
									<td><?php echo !empty($row['email'])?$row['email']:''; ?></td>
									<td><?php echo !empty($row['phone'])?$row['phone']:''; ?></td>
									<td><?php echo !empty($row['subject'])?$row['subject']:''; ?></td>
									<td><?php echo !empty($row['content'])?$row['content']:''; ?></td>
									<td><?php echo !empty($row['created_at'])?showtime4db($row['created_at']):''; ?></td>
				
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
<?php  $this->load->view('admin/include/newfooter'); ?>

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