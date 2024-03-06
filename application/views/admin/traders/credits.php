<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $seo['title']; ?></title>
        <meta content="<?php echo $seo['description']; ?>" name="description" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo BASE_HTTP_REL_URL; ?>/favicon2.ico" />
        <!-- jvectormap -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />
        <!-- Bootstrap Css -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<!--Modal Links-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
		<!--Modal Links-->
		
		<style>
				label { font-weight: 400; }
				body { background: #f5f5f5; }
		</style>
		
    </head>

    <body data-sidebar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <?php echo $sidebarleft; ?>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
						<?php echo $sidemenu; ?>
						
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
							<!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
					
					
					<?php
							// echo "<pre>";  print_r($GetPartyTransaction); echo "</pre>"; 
							
							
							if(isset($GetDealers[$tid]))
								{
									
									?>
										
										
										
										
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">History For <?php echo $GetDealers[$tid]['name']; ?> (<?php echo $GetDealers[$tid]['type']; ?>)</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item "><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/traders/credits">Traders Credit</a></li>
                                            <li class="breadcrumb-item active"><a href="javascript: void(0);">
												<?php echo $GetDealers[$tid]['name']; ?>
											</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
									
                                <div class="card">
                                    <div class="card-body">
									
										
											<table id="tabelcreditdatahere" class="table table-striped">
											
												<thead>
													<tr>
														<th>#</th>
														<th>Value</th>
														<th>For Date</th>
														<th>Remark</th>
														<th>Added By</th>
													</tr>
												</thead>
												
												<tbody>
									
										<?php
										






 
											 
												if(!empty($GetPartyTransaction))
													{
														foreach($GetPartyTransaction as $s)
															{
																?>
																	<tr>
																		<td><?php echo $s['autoid']; ?></td>
																		<td>
																		
																			<?php 
																					if($s['type']=='credit')
																						{
																							echo "<b class='text-success'>+";
																						} else {
																							echo "<b class='text-danger'>-";
																						}
																			?>
																		
																				<?php echo $s['value']; ?>
																				
																			</b>	
																				
																		</td>
																		<td><?php echo date("d M, Y (D)",strtotime($s['fordate'])); ?></td>
																		<td><?php echo $s['remark']; ?></td>
																		<td>
																			Added by <?php echo $s['name']; ?> (<a href="tel:<?php echo $s['mobile']; ?>"><?php echo $s['mobile']; ?></a>) <br />on <?php echo showtime4db($s['added']); ?>
																		</td>
																	</tr>
																<?php
															}
													}
										?>
												</tbody>
												
											</table>
		
		<center>	
			<a class="btn btn-success btn-lg" href="javascript:void(0);" onclick="Open_Trader_Trans_Modal('credit','<?php echo $tid; ?>');"> <i class="fa fa-plus"></i> </a>
			<a class="btn btn-danger btn-lg" href="javascript:void(0);" onclick="Open_Trader_Trans_Modal('debit','<?php echo $tid; ?>');"> <i class="fa fa-minus"></i> </a>
			<a class="btn btn-warning btn-lg" href="<?php echo BASE_HTTP_REL_URL; ?>administrator/traders/credits"> Back to List </a>
		</center>	
											
									</div>
								</div>
									
									
									<?php
								}
							
					?>
					
					<?php echo $AddPartyCredits; ?>
					
					
					
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Manage Traders</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item "><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><a href="javascript: void(0);">Manage Traders</a></li>
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
											<div style='float: right; margin-bottom: 10px;'>
												
												
												
											</div>
											<div style='clear:both;'></div>
											<div style="overflow-x:auto;">
											<table id="tabeldatahere" class="table table-striped">
												<thead>
													<tr>
														<!--th>Role</th-->
														<th>#</th>
														<th>Trader</th>
														<th>Company</th>
														<th>Credit Limit</th>
														<th>Available Credit</th>
													</tr>
												</thead>
												<tbody>
		
									<?php
									
											if(!empty($GetDealers))
												{
													foreach($GetDealers as $single)
														{
															?>
																<tr>
																	<td><?php echo $single['tid']; ?></td>
																	<td>
																		<span class='name_<?php echo $single['tid']; ?>'><?php echo $single['name']; ?></span> (<small class='type_<?php echo $single['tid']; ?>'><?php echo $single['type']; ?></small>)
																		<br /> <i class="fa fa-envelope"></i>
																		<span><?php echo $single['email']; ?></span>
																		<br /> <i class="fa fa-phone"></i>
																		<span><?php echo $single['mobile']; ?></span>
																		
																		<small title="Added on"><br /> <i class="fa fa-calendar"></i> <?php echo showtime4db($single['added']);?></small>
																	</td>
																	<td><?php echo $single['company']; ?></td>
																	
																	<td>
																									
									<?php 
									
										$credit_limit	=	$single['credit_limit'];
											
											if(!empty($credit_limit))
												{
													echo '<h5 class="text-success">';
														echo number_format($credit_limit,0,".",","); 
													echo '</h5>';
												} else {
													echo '<h5 class="text-danger">0</h5>';
												}
									?>
																				
	<a title="Add Credit" onclick="Open_Trader_Credit_Modal('credit','<?php echo $single['tid']; ?>');" class="btn btn-sm btn-outline-info" href="javascript:void(0);">
		<i class='fa fa-edit '></i>
	</a>
										
																	</td>
																	<td>

				
									
									
									
																	
									<?php 
									
										
									
											if(!empty($credit_limit))
												{
													?>														
																	
		<h5 class="text-info"><?php
		
			
		
				$temp	=	$credit_limit+(isset($single['credit'])?$single['credit']:0)-(isset($single['debit'])?$single['debit']:0); 		
					echo number_format($temp,0,".",",");
				
		?></h5>																			
						
						<a title="Add Credit" onclick="Open_Trader_Trans_Modal('credit','<?php echo $single['tid']; ?>');" class="btn btn-sm btn-outline-success" href="javascript:void(0);"><i class='fa fa-plus '></i></a>
						
						<a title="Deduct Credit" onclick="Open_Trader_Trans_Modal('debit','<?php echo $single['tid']; ?>');" class="btn btn-sm btn-outline-danger" href="javascript:void(0);"><i class='fa fa-minus '></i></a>
						
						<a title="View History" class="btn btn-sm btn-outline-warning" href="<?php echo base_url("administrator/traders/credits/$single[tid]"."?show=transaction"); ?>"><i class='fa fa-eye '></i></a>

<span style="display:none;" class="avlbcrt_<?php echo $single['tid']; ?>"><?php echo $temp; ?></span>	
													<?php
												} else {
													?>
		<h5 class="text-danger">0</h5>											
	<a title="Add Credit" onclick="Open_Trader_Credit_Modal('credit','<?php echo $single['tid']; ?>');" class="btn btn-sm btn-outline-success" href="javascript:void(0);">
		<i class='fa fa-plus '></i>
	</a>
	
	<a title="View History" class="btn btn-sm btn-outline-warning" href="<?php echo base_url("administrator/traders/credits/$single[tid]"."?show=transaction"); ?>"><i class='fa fa-eye '></i></a>

													<?php
												}
									?>								
																	
		<span style="display:none;" class="credit_limit_<?php echo $single['tid']; ?>"><?php echo $credit_limit; ?></span>				
			
																	
																	</td>
																	
																</tr>
															<?php
														}
												}
									
									?>
									
									
												</tbody>
									 </table>
                                    </div>
								</div>
                                    <!-- end card-body -->
            

	<script>
	
			function Open_Trader_Credit_Modal(type,tid)
				{
					 $('#Trader_Credit_Modal input[name="tid"]').val(tid);
					 $("#Trader_Credit_Modal .type").html($(".type_"+tid).html());
					 $("#Trader_Credit_Modal .name").html($(".name_"+tid).html());
					 $("#Trader_Credit_Modal .credit_limit").val($(".credit_limit_"+tid).html());
					 
						$('#Trader_Credit_Modal').modal('show');
				}
				
			function Open_Trader_Trans_Modal(type,tid)
				{ 
					 $('#Trader_Trans_Modal input[name="tid"]').val(tid);
					 $("#Trader_Trans_Modal .type").html($(".type_"+tid).html());
					 $("#Trader_Trans_Modal .name").html($(".name_"+tid).html());
					 $("#Trader_Trans_Modal .credit_limit").val($(".credit_limit_"+tid).html());
					 
					 
					 
					 $('#Trader_Trans_Modal input[name="type"]').val(type);
						$(".avlbcrt").html(addCommas(Number($(".avlbcrt_"+tid).html())));
						$("#Trader_Trans_Modal .credit_limit").val($(".credit_limit_"+tid).html());
						
					$('#Trader_Trans_Modal').modal('show');	
				}
				
	</script>			
					
<!-- Modal -->
<form method="POST" class="modal fade" id="Trader_Credit_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span class='name'></span> (<span class='type'></span>)</h5>
        <button type="button" class="close" data-dismiss="modal" onclick=" $('#Trader_Credit_Modal').modal('hide'); " aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		
			
				<div class="form-group">
					<label>Credit Limit*</label>
					<input required type="number" name="credit_limit" class="form-control credit_limit" onkeyup="Cal_New_Credit();" />
				</div>
				
			<input type="hidden" value="0" name="tid" />
			<input type="hidden" value="<?php echo md5("add_credit"); ?>" name="add_credit" />
		
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</form>
<form method="POST" class="modal fade" id="Trader_Trans_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span class='name'></span> (<span class='type'></span>)</h5>
        <button type="button" class="close" data-dismiss="modal" onclick=" $('#Trader_Trans_Modal').modal('hide'); " aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		
			
				<div class="form-group d-none">
					<label>Credit Limit*</label>
					<input required type="number" name="credit_limit" class="form-control credit_limit" onkeyup="Cal_New_Credit();" />
				</div>
		
		<p> 
			<span class='text-danger'>Available Credit <b class='avlbcrt'></b> </span>
			<span class='text-success newcrt' style="display:none;">New Available Credit <b></b> </span>
		</p> 
        
			<input type="hidden" value="0" name="tid" />
			<input type="hidden" value="credit" name="type" />
			<input type="hidden" value="<?php echo md5("add_transaction"); ?>" name="add_transaction" />
			
			
				<div class="form-group">
					<label>Enter Value*</label>
					<input required type="number" name="value" class="form-control value_inp" onkeyup="Cal_New_Credit();" />
				</div>
				
				
				
				<div class="form-group">
					<label>Date*</label>
					<input required type="date" name="fordate" value="<?php echo date("Y-m-d"); ?>" class="form-control" />
				</div>
				<div class="form-group">
					<label>Remark</label>
					<input maxlength="90" type="text" name="remark" class="form-control" />
				</div>
			
		
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</form>		


				<script>
				
				
						function addCommas(nStr)
							{
								nStr += ''; x = nStr.split('.'); x1 = x[0]; x2 = x.length > 1 ? '.' + x[1] : ''; var rgx = /(\d+)(\d{3})/;
									while (rgx.test(x1)) { x1 = x1.replace(rgx, '$1' + ',' + '$2'); }
								return x1 + x2;
							}
				
							function Cal_New_Credit()
								{
									var value 			=	$(".value_inp").val();
									var credit_limit 	=	$(".credit_limit").val();
									$(".newcrt").slideDown();
									var avlbcrt	=	$("#Trader_Trans_Modal .avlbcrt").html();
									
										avlbcrt	=	avlbcrt.replace(",","");
										avlbcrt	=	avlbcrt.replace(",","");
										avlbcrt	=	avlbcrt.replace(",","");
										avlbcrt	=	avlbcrt.replace(",","");
										avlbcrt	=	avlbcrt.replace(",","");
										avlbcrt	=	avlbcrt.replace(",","");
										avlbcrt	=	avlbcrt.replace(",","");
									
										avlbcrt = Number(avlbcrt);
										credit_limit = Number(credit_limit);
										value = Number(value);
									var type=	$('#Trader_Trans_Modal input[name="type"]').val();	
										if(type=='credit')
											{
												var newcrt	=	avlbcrt + value;
											} else {
												var newcrt	=	avlbcrt - value;
											}
												$(".newcrt b").html(addCommas(credit_limit+newcrt));
								}
				</script>
	   
								   
								   
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

                <footer class="footer">
					<?php echo $footer; ?>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
				<?php echo $sidebarright; ?>
			<!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
 
        <!-- JAVASCRIPT -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts js -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- jquery.vectormap map -->
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>

        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
		<script>
			var REL_BASE_URL	=	"<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/";
			 
					$(document).ready( function () {
						$('#tabeldatahere').DataTable({  order: [[0, 'desc']], pageLength:25 });
						$('#tabelcreditdatahere').DataTable({  order: [[0, 'desc']], pageLength:25 });
					} );
			
		</script>
        <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>

		<?php
				$this->load->view('admin/include/eodcode');
		?>
    </body>
</html>
