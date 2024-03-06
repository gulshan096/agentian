<?php $this->load->view('admin/include/header'); ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Transaction</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Transaction</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
              
                <div class="card">
                    <div class="card-body">
                        <div style='float: right; margin-bottom: 10px;'>
                          
                        </div>
                        <div style='clear:both;'></div>
                        <table id="tabeldatahere" class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                 
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Credit</th>
                                    <th>Debit</th>
                                    <th>Available</th>
                                    <th>Status</th>
                                    <th>Ctreated</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php  
								if(!empty($transaction)) 
								{
								 $i = 0;	
                                 foreach($transaction as $row)
                                 {	
                                  $i++;								 
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo !empty($row['name'])?$row['name']:'';?></td>
										<td><?php echo !empty($row['email'])?$row['email']:''; ?></td>
										<td><?php echo !empty($row['mobile'])?$row['mobile']:''; ?></td>
										<td class="text-success"><?php echo !empty($row['credit'])?$row['credit']:'0'; ?></td>
										<td class="text-danger"><?php echo !empty($row['debit'])?$row['debit']:'0'; ?></td>
										<td class="text-primary"><?php echo !empty($row['available'])?$row['available']:''; ?></td>
										<td><?php echo !empty($row['status'] == 1)?"<button  type='button' class='btn btn-success'>success</button>":"<button  type='button' class='btn btn-danger'>Failed</button>"; ?></td>
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