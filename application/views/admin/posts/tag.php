<?php $this->load->view('admin/include/header'); ?>
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Manage Tags</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Tags</a></li>
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
                        <div class="card addform" id="addTag">
                              <div class="card-body">
							  <form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('administrator/Posts/saverecords3'); ?>','#createForm1','#successMsg')">
										<input value="<?php echo !empty($tags['tid'])?$tags['tid']:0; ?>" name="tags[tid]" type="hidden" />
											<div class="row">
												<div class="col-md-6">
													<div class="form-group mb-3">
														<label>Name*</label> 
														<input value="<?php echo isset($tags['name'])?$tags['name']:""; ?>" name="tags[name]" maxlength="80" required type="text" class="form-control" placeholder="The name is how it appears on your site." />
													</div>			
										    <div class="row">
												<div class="col-md-12">
													<div class="form-group mb-3">
														<label> Slug* </label>
														<input value="<?php echo isset($tags['slug'])?$tags['slug']:""; ?>" name="tags[slug]" maxlength="80" required type="text" class="form-control" placeholder="The “slug” is the URL-friendly version of the name." />
													</div>
												</div>
														<div style="clear:both;"></div>
												</div>		
												</div>
												<div class="col-md-6">
													<div class="form-group mb-3">
														<label>Description</label> 
														<textarea maxlength="150" rows="1" name="tags[description]" maxlength="80" class="form-control"><?php echo isset($tags['description'])?$tags['description']:""; ?></textarea>
													</div>
												</div>
														<div style="clear:both;"></div>		
												</div>
												<div id="successMsg" style="display:none;"><p class="form-control" style="background-color:#0bb197;width:50%;margin:1%;">Success:Product has been added Successfully!!!</p></div>
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
												<a class="btn btn-success" href="<?php echo site_url('administrator/posts/view1/new'); ?>" style="background-color:#0bb197;">Add New</a>
											</div>
											<div style='clear:both;'></div>
											<div class="table-responsive">
											<table id="tabeldatahere" class="table table-striped">
												<thead>
														<tr>
															<!--th>Role</th-->
															<th>#</th>
															<th>Name</th>
															<th>Description</th>
															<th>Slug</th>
															<th>Status</th>
															<th>Date</th>
															<th>Actions</th>
														</tr>								
												</thead>
												<tbody>
												<?php		
												if(!empty($GetTag))
													{
														foreach($GetTag as $singi)
															{
																?>
																		<tr>
																			<td><?php echo $singi['tid']; ?></td>
																			<td><?php echo $singi['name']; ?></td>
																			<td><?php echo $singi['description']; ?></td>
																			<td><?php echo $singi['slug']; ?></td>
																			<td><?php echo !empty($singi['status'])?"<button onclick='updatestatus(this);' t='tag' i='tid' v='$singi[tid]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='tag' i='tid' v='$singi[tid]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
																			<td><?php echo showtime4db($singi['created']);?></td>
																			<td><a class="fa fa-edit" href="<?php echo base_url("administrator/posts/view1/$singi[tid]"); ?>"></a></td>
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
