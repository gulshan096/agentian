	
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
                                    <h4 class="mb-sm-0">Manage Catalogue</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Catalogue</a></li>
                                            <li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                  <!-- end page title -->
                  <div class="row">
                       <div class="col-xl-12" >
                        <style>
								<?php
										if(empty($openform))
											{
												echo " .addform { display:none; } ";		
											}
								?>
                        </style>
                          <div class="card addform" id="addCatalogue">
                              <div class="card-body">
							  <form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('administrator/Catalogue/saverecords'); ?>','#createForm1','#successMsg')">
									<input value="<?php echo !empty($catalogue['cid'])?$catalogue['cid']:0; ?>" name="catalogue[cid]" type="hidden" />
									

							<div class="row">
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label> Title*</label> 
											<input value="<?php echo isset($catalogue['title'])?$catalogue['title']:""; ?>" name="catalogue[title]" maxlength="80" required type="text" class="form-control" placeholder="Enter Like ACC Cement" />
										</div>
										<div class="form-group mb-3">
											<label> Catalogue File* <small>PDF file only</small></label> 
											<input required name="cataloguefile" accept="application/pdf" type="file" class="form-control" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label> Featured Image <small>Image file only</small></label> 
											<input name="imageFile" accept="image/*" type="file" class="form-control" />
										</div>
										<div class="form-group mb-3">
											<label> Description</label> 
											<textarea maxlength="150" name="catalogue[description]" rows="1" class="form-control"><?php echo isset($catalogue['description'])?$catalogue['description']:""; ?></textarea>
										</div>
									</div>
									<div style="clear:both;"></div>		
							</div>
									<!--div id="successMsg" style="display:none;"><p class="form-control" style="background-color:#0bb197;width:50%;margin:1%;">Success:Catalogue has been added Successfully!!!</p></div-->
									<div class="col-md-12 text-center">
										<div id="successMsg"></div>
										<button class="btn btn-success" type="submit" style="background-color:#0bb197;">Save</button>
										<button onclick="$('.addform').slideUp()" class="btn btn-outline-danger" type="button">Cancel</button>
									</div>	
								    <div style="clear:both;"></div>
								</form>		
                           </div>
						</div>
                                <div class="card">
                                    <div class="card-body">
											<div style='float: right; margin-bottom: 10px;'>
												<a class="btn btn-success" href="<?php echo site_url('administrator/catalogue/view/new'); ?>" style="background-color:#0bb197;">Add New</a>
											</div>
											<div style='clear:both;'></div>
											<div class="table-responsive">
											<table id="tabeldatahere" class="table table-striped">
												<thead>
														<tr>
															<!--th>Role</th-->
															<th>#</th>
															<th>Title</th>
															<th>Featured Image</th>
															<th>Catalogue File</th>
															<th>Status</th>
															<th>Updated on</th>
															<th>Actions</th>
														</tr>								
												</thead>
												<tbody>
												<?php	
												if(!empty($GetCatalogue))
													{
														foreach($GetCatalogue as $singi)
															{
																?>
																		<tr>
																			<td><?php echo $singi['cid']; ?></td>
																			<td><?php echo $singi['title']; ?></td>
																			<td>
																				<a href="<?php echo base_url($singi['image']); ?>" target="_BLANK">
																					<img onerror="this.src='<?php echo base_url('assets/preloader.png'); ?>';" src="<?php echo base_url($singi['image']); ?>" style="max-width:100px;" />
																				</a>
																			</td>
																			
																			<td>
																				<a class="btn btn-sm btn-warning" href="<?php echo base_url($singi['file']); ?>" target="_BLANK">
																					<i class="mdi mdi-eye"></i>
																				</a>
																			</td>
																			
																			<td><?php echo !empty($singi['status'])?"<button onclick='updatestatus(this);' t='catalogue' i='cid' v='$singi[cid]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='catalogue' i='cid' v='$singi[cid]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
																			<td><?php echo showtime4db($singi['updated']);?></td>
																			<td><a class="fa fa-edit" href="<?php echo base_url("administrator/catalogue/view/$singi[cid]"); ?>"></a></td>
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
				
				
				<script>
			function addProduct(){
				document.getElementById("addProduct").style.display='block';
			}
			
		</script>
               <?php $this->load->view('admin/include/newfooter'); ?>
