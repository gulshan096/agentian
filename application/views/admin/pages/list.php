<?php $this->load->view('admin/include/header'); ?>
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Manage Pages</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Pages</a></li>
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
                        <div class="card addform" id="addPost">
                              <div class="card-body">
							  <form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('administrator/Pages/saverecords'); ?>','#createForm1','#successMsg')">
							  			<input value="<?php echo !empty($posts['pid'])?$posts['pid']:0; ?>" name="posts[pid]" type="hidden" />
											<div class="row">
												<div class="col-md-6">
													<div class="form-group mb-3">
														<label> Title*</label> 
														<input value="<?php echo isset($posts['title'])?$posts['title']:""; ?>" name="posts[title]" maxlength="80" required type="text" class="form-control" placeholder="Enter Like Events Agenda" />
													</div>
										<div class="row">
												<div class="col-md-6">
													<div class="form-group mb-3">
														<label>Posts* </label>
														<select class="form-control"  name="posts[post]" required style="width:210%;">
															<?php
																	$query = $this->db->get('posts');
																	foreach ($query->result() as $row)
																	{	
															?>
																	<option value="<?php echo isset($posts['post'])?$posts['post']:""; ?>"><?php echo $row->title; ?></option>
															<?php 
																	}
															?>	
														</select>
													</div>
												</div>
														<div style="clear:both;"></div>
												</div>		
												</div>
												<div class="col-md-6">
													<div class="form-group mb-3">
														<label>Image</label> 
														<input name="image" accept="image/*" maxlength="80" type="file" class="form-control" />
													</div>
													<div class="form-group mb-3">
														<label>Description</label> 
														<textarea maxlength="150" rows="1" name="posts[description]" maxlength="80" class="form-control"><?php echo isset($posts['description'])?$posts['description']:""; ?></textarea>
													</div>
												</div>
														<div style="clear:both;"></div>	
												</div>
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
												<a class="btn btn-success" href="<?php echo site_url('administrator/pages/view/new'); ?>" style="background-color:#0bb197;">Add New</a>
											</div>
											<div style='clear:both;'></div>
											<table id="tabeldatahere" class="table table-striped">
													<thead>
															<tr>
																<th>#</th>
																<th>Image</th>
																<th>Title</th>
																<th>Posted_By</th>
																<th>Posts</th>
																<th>Date</th>
																<th>Status</th>
																<th>Actions</th>
															</tr>								
													</thead>
												<tbody>
												<?php		
												if(!empty($GetPages))
													{
														foreach($GetPages as $singi)
															{
																?>
																		<tr>
																			<td></td>
																			<td>
																				<a href="<?php echo base_url($singi['image']); ?>" target="_BLANK">
																					<img onerror="this.src='<?php echo base_url('assets/preloader.png'); ?>';" src="<?php echo base_url($singi['image']); ?>" style="max-width:100px;" />
																				</a>
																			</td>
																			<td><?php echo $singi['name']; ?></td>
																			<td><?php echo $singi['postedby']; ?></td>
																			<td><?php echo $singi['posts']; ?></td>
																			<td><?php echo showtime4db($singi['created']);?></td>
																			<td><?php echo !empty($singi['status'])?"<button onclick='updatestatus(this);' t='posts' i='pid' v='' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='posts' i='pid' v='' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
																			<td><a href="<?php echo base_url("administrator/pages/view/"); ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
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
				
				
				<script>
					function addProduct(){
						document.getElementById("addProduct").style.display='block';
					}
				</script>
               <?php $this->load->view('admin/include/newfooter'); ?>
