

<?php $this->load->view('admin/include/header'); ?>
<style>
			img {
				  border: 1px solid #ddd;
				  border-radius: 4px;
				  padding: 5px;
				  width: 80px;
				}
		</style>
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Drivers</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Drivers</a></li>
                                            <li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <style>
								<?php
										if(empty($openform))
											{
												echo " .addform { display:none; } ";		
											}
								?>
                        </style>

        			<div class="row" >
                       <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div style="overflow-x:auto;">
                                                <table class="table table-striped">
                                                    <thead>
                                                            <th></th>
                                                            <th>Driver</th>
                                                            <th>Driver_Score</th>
                                                            <th>Phone</th>
                                                            <th>Vehicle_Assigned</th>
                                                            <th>CDL</th>
                                                            <th>Miles_Travelled</th>
                                                            <th>Plan_Trip</th>
                                                            <th>Driver_Behaviour</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 15%;"><img src="<?php echo base_url("assets/image/p1.jpg"); ?>"  alt="Paris"></td>
                                                            <td >Penn Michael</td>
                                                            <td>92</td>
                                                            <td>9879876545</td>
                                                            <td>6LK C74</td>
                                                            <td>Class B</td>
                                                            <td>81,598 mi</td>
                                                            <td><a href="#" data-toggle="modal" data-target="#planTrip"><i class='fas fa-truck' style='padding-left:30%;font-size:34px'></i></a></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 15%;"><img src="<?php echo base_url("assets/image/p1.jpg"); ?>"  alt="Paris"></td>
                                                            <td >Willson Michael</td>
                                                            <td>92</td>
                                                            <td>9009359697</td>
                                                            <td>8YTR C74</td>
                                                            <td>Class A</td>
                                                            <td>76,598 mi</td>
                                                            <td><a href="#" onclick=""><i class='fas fa-truck' style='padding-left:30%;font-size:34px'></i></a></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                        </div>		
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
