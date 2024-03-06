<?php $this->load->view('admin/include/header'); ?>

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Manage Report</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Report</a></li>
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

                  <div class="row">
                       <div class="col-xl-12">
                          <div class="card addform">
                              <div class="card-body">
								<form action="<?php echo base_url('administrator/users/view'); ?>" method="POST" class="row">
									<input value="<?php echo !empty($users['id'])?$users['id']:0; ?>" name="company[id]" type="hidden" />
									<div class="col-md-6">
										<small>&nbsp;</small>
										<div class="form-floating mb-3">
											<input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="company[name]" maxlength="80" required type="text" class="form-control"  />
											<label> Name*</label> 
										</div>
									</div>
									<!--<div class="col-md-6">
										<small>Will be used to check the Corporate user Email ID from this domain only. (For Example: gmail.com)</small>
										<div class="form-floating mb-3">
											<input value="<?php //echo isset($users['role'])?$users['role']:""; ?>" name="company[role]" maxlength="80" required type="text" class="form-control"  />
											<label>Company Domain/ URL for Email ID* </label>
										</div>
									</div>-->
									<div style="clear:both;"></div>
									<div class="col-md-6">
										<div class="form-floating mb-3">
											<input value="<?php echo isset($users['email'])?$users['email']:""; ?>" name="company[email]" maxlength="80"  type="text" class="form-control"  />
											<label>Email</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-floating mb-3"> 
											<input value="<?php echo isset($users['contact'])?$users['contact']:""; ?>" name="company[contact]" maxlength="25" type="text" class="form-control"  />
											<label>Contact/ Mobile</label>
										</div>
									</div>
									<div style="clear:both;"></div>
									<!--<div class="col-md-12">
										<div class="form-floating mb-3">
											<textarea name="company[other_info]" maxlength="255" type="text" class="form-control"><?php echo isset($users['other_info'])?$users['other_info']:""; ?></textarea>
											<label>Other Info</label>
										</div>
									</div>-->
											<div style="clear:both;"></div>	
									<div class="col-md-12 text-center">
										<button class="btn btn-primary" type="submit"><?php echo !empty($users['id'])?"Update Company":"Add Company"; ?></button>
									</div>	
									<div style="clear:both;"></div>
								</form>		
                           </div>
						</div>
                                <div class="card">
                                    <div class="card-body">
											
												<div style='clear:both;'></div>
											
											<table id="tabeldatahere" class="table table-striped">
												<thead>
													<tr>
														<th>ID</th>
														<th>CAR</th>
														<th>CUSTOMER</th>
														<th>CHECK IN</th>
														<th>CHECK OUT</th>
														<th>SERVICE STATUS</th>
														<th>REPORT</th>
													</tr>
												</thead>
												<tbody>
												<?php
$data=array(
array(
'id'    =>      '1',
'Car'      =>    'Acura(RDX) CG-04-NG-2698',
 'Customer'     =>     'Rahul Yadav (E: rahul@gmail.com/ (http://rahul@gmail.com/) M: +91-87702-47522)',
'Checkin'     =>    '24th Dec, 2021 (01:50PM)',
 'CheckOut'      =>  '4rd Dec, 2021 (02:55PM)',
 'ServiceStatus' => 'Completed',
 'Report'    =>   'Get Details',
),
array(
'id'    =>      '2',
 'Car'      =>    'Audi(A1) CG-02-MH-1958',
 'Customer'     =>      'Namrata Sahu (E: namrata@gmail.com/ (http://namrata@gmail.com/) M: +91-82510-90001)',
 'Checkin'     =>   '3rd Dec, 2021 (01:50PM)',
 'CheckOut'     => 'NA',
 'ServiceStatus'  =>  'Running',
 'Report' =>   'Get Details',
),
array(
'id'    =>      '3',
 'Car'       =>   'Audi(A1) CG-02-MH-1958',
 'Customer'    =>     'Mithlesh (E: Mithlesh@gmail.com/ (http://Mithlesh@gmail.com/) M: +91-85265-85648)',
 'Checkin'     =>    '23rd Dec, 2021 (04:19PM)',
 'CheckOut'      => ' NA',
 'ServiceStatus'  => 'Washing',
 'Report'    =>  'Get Details',
 ),
array(
'id'    =>      '4', 
'Car'      =>    'Acura(RDX) CG-04-NG-2698',
 'Customer'     =>     'Rahul Yadav (E: rahul@gmail.com/ (http://rahul@gmail.com/) M: +91-87702-47522)',
'Checkin'     =>    '24th Dec, 2021 (01:50PM)',
 'CheckOut'      =>  '4rd Dec, 2021 (02:55PM)',
 'ServiceStatus' => 'Completed',
 'Report'    =>   'Get Details',
),
array(
'id'    =>      '5',
 'Car'      =>    'Audi(A1) CG-02-MH-1958',
 'Customer'     =>      'Namrata Sahu (E: namrata@gmail.com/ (http://namrata@gmail.com/) M: +91-82510-90001)',
 'Checkin'     =>   '3rd Dec, 2021 (01:50PM)',
 'CheckOut'     => 'NA',
 'ServiceStatus'  =>  'Running',
 'Report' =>   'Get Details',
),
array(
'id'    =>      '6',
 'Car'       =>   'Audi(A1) CG-02-MH-1958',
 'Customer'    =>     'Mithlesh (E: Mithlesh@gmail.com/ (http://Mithlesh@gmail.com/) M: +91-85265-85648)',
 'Checkin'     =>    '23rd Dec, 2021 (04:19PM)',
 'CheckOut'      => ' NA',
 'ServiceStatus'  => 'Washing',
 'Report'    =>  'Get Details',
 ),
array(
'id'    =>      '7',
'Car'      =>    'Acura(RDX) CG-04-NG-2698',
 'Customer'     =>     'Rahul Yadav (E: rahul@gmail.com/ (http://rahul@gmail.com/) M: +91-87702-47522)',
'Checkin'     =>    '24th Dec, 2021 (01:50PM)',
 'CheckOut'      =>  '4rd Dec, 2021 (02:55PM)',
 'ServiceStatus' => 'Completed',
 'Report'    =>   'Get Details',
),
array(
'id'    =>      '8',
 'Car'      =>    'Audi(A1) CG-02-MH-1958',
 'Customer'     =>      'Namrata Sahu (E: namrata@gmail.com/ (http://namrata@gmail.com/) M: +91-82510-90001)',
 'Checkin'     =>   '3rd Dec, 2021 (01:50PM)',
 'CheckOut'     => 'NA',
 'ServiceStatus'  =>  'Running',
 'Report' =>   'Get Details',
),
array(
'id'    =>      '9',
 'Car'       =>   'Audi(A1) CG-02-MH-1958',
 'Customer'    =>     'Mithlesh (E: Mithlesh@gmail.com/ (http://Mithlesh@gmail.com/) M: +91-85265-85648)',
 'Checkin'     =>    '23rd Dec, 2021 (04:19PM)',
 'CheckOut'      => ' NA',
 'ServiceStatus'  => 'Washing',
 'Report'    =>  'Get Details',
 ),
array(
'id'    =>      '10',
'Car'      =>    'Acura(RDX) CG-04-NG-2698',
 'Customer'     =>     'Rahul Yadav (E: rahul@gmail.com/ (http://rahul@gmail.com/) M: +91-87702-47522)',
'Checkin'     =>    '24th Dec, 2021 (01:50PM)',
 'CheckOut'      =>  '4rd Dec, 2021 (02:55PM)',
 'ServiceStatus' => 'Completed',
 'Report'    =>   'Get Details',
),
array(
'id'    =>      '11',
 'Car'      =>    'Audi(A1) CG-02-MH-1958',
 'Customer'     =>      'Namrata Sahu (E: namrata@gmail.com/ (http://namrata@gmail.com/) M: +91-82510-90001)',
 'Checkin'     =>   '3rd Dec, 2021 (01:50PM)',
 'CheckOut'     => 'NA',
 'ServiceStatus'  =>  'Running',
 'Report' =>   'Get Details',
),
array(
'id'    =>      '12',
 'Car'       =>   'Audi(A1) CG-02-MH-1958',
 'Customer'    =>     'Mithlesh (E: Mithlesh@gmail.com/ (http://Mithlesh@gmail.com/) M: +91-85265-85648)',
 'Checkin'     =>    '23rd Dec, 2021 (04:19PM)',
 'CheckOut'      => ' NA',
 'ServiceStatus'  => 'Washing',
 'Report'    =>  ' Get Details',
 ),
);
												foreach($data as $d){ $i=1;?>
													<tr>
														<td><?php echo $d['id'];?></td>
														<td><?php echo $d['Car'];?></td> 
														<td><?php echo $d['Customer'];?></td>
														<td><?php echo $d['Checkin'];?></td>
														<td><?php echo $d['CheckOut'];?></td>
														<td><?php echo $d['ServiceStatus'];?></td>
														<td><input id="btnShow" type="button" value="Get Details"  class='btn btn-success' /></td>	
													</tr>
													<?php $i++; } ?>
												</tbody>
											</table>
                                    </div>
									 <div id="dialog" style="display: none">
										</div>
                                    <!-- end card-body -->
                                   
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
                 
				 <script type="text/javascript">
			$(function () {
				var fileName = "https://demo3.sjainventures.com/car_Inspection_admin/assets/admin/Car.pdf"; 
				$("#btnShow").click(function () {
					$("#dialog").dialog({
						modal: true,
						title: "Car Inspection.pdf",
						width: 540,
						height: 450,
						buttons: {
							Close: function () {
								$(this).dialog('close');
							}
						},
						open: function () {
							var object = "<object data=\"{FileName}\" type=\"application/pdf\" width=\"500px\" height=\"300px\">";
							object += "If you are unable to view file, you can download from <a href = \"{FileName}\">here</a>";
							object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
							object += "</object>";
							object = object.replace(/{FileName}/g, "" + fileName); 
							$("#dialog").html(object);
						}
					});
				});
			});
		</script>
                <?php $this->load->view('admin/include/newfooter'); ?>
