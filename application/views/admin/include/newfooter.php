                <footer class="footer">
                    <script>
	                 var baserelativepath = "<?php echo BASE_HTTP_REL_URL; ?>";
                    </script>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                               &copy;<script>document.write(new Date().getFullYear())</script> 
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Powered by <a href="//sjain.io">Sjain Ventures</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->
        <!-- Right Sidebar -->
        <div class="right-bar">
            <?php $this->load->view('admin/include/sidebar-right'); ?>
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
	    <script src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/js/app.js?v=0.2"></script>
        <script type = 'text/javascript' src = "<?php echo base_url("");?>js/common2022.js"></script>
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/36.0.0/ckeditor.min.js" ></script>
       
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" ></script>
        
		
		
        <script>
			var REL_BASE_URL    =   "<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/";
			
			$(document).ready( function () {
			$('#tabeldatahere').DataTable({ pageLength:10 });
			} );
        </script>
		
		<script>
           
			$(document).ready(function(){
				
				 $('.multiple').select2({
					  multiple: true,
				 });
				 
				 $('.single').select2({
					   
				 });
			});
		</script>
		
		<script>
		    $(".rn").hide();
				function reraApproved()
				{
					var rap =$("#rap").val();
					if(rap == 1)
					{
						$(".rn").show();
					}
					else if(rap == 0)
					{
						$(".rn").hide();
						$(".rn :input").removeAttr("required");
					}
				}
				
				$(document).ready(function(){
					
					var cat = $("#category").val();
					
					if(cat == "")
					{
						$(".apartment, .house, .plot, .ossw").hide();
					}
				});
			
		
				function getChildCategory()
				{
				
					var sub_cat = $("#sub_cat").val();
					var pu_id = $("#puid").val();
					
					var getPropertyStatus = $("#getPropertyStatus").val();
					var getFlooringh      = $("#getFlooringh").val();
					var getAmenitiesH     = $("#getAmenitiesH").val();
					var getFlooringA      = $("#getFlooringA").val();
					
					var getAmenitiesA     = $("#getAmenitiesA").val();
					var getSuitableFor    = $("#getSuitableFor").val();
					var getHub            = $("#getHub").val();
					var getFacing         = $("#getFacing").val();
					var getListingBy      = $("#getListingBy").val();
					
		            if(typeof getSuitableFor === 'string')
					{
					  getSuitableFor    = getSuitableFor.split(",");
					} 
					else
					{
					  getSuitableFor = null;
					}
					
					if(typeof getHub === 'string')
					{
					   getHub   = $("#getHub").val().split(",");
					} 
					else
					{
					  getHub = null;
					}
					
					if(typeof getFacing === 'string')
					{
					  getFacing = $("#getFacing").val().split(",");
					} 
					else
					{
					  getFacing = null;
					}
					
					if(typeof getPropertyStatus === 'string')
					{
					  getPropertyStatus = $("#getPropertyStatus").val().split(",");
					} 
					else
					{
					  getPropertyStatus = null;
					}
					
					
					
					if(typeof getFlooringh === 'string')
					{
					  getFlooringh = $("#getFlooringh").val().split(",");
					} 
					else
					{
					  getFlooringh = null;
					}
					
					
					
					if(typeof getAmenitiesH === 'string')
					{
					  getAmenitiesH = $("#getAmenitiesH").val().split(",");
					} 
					else
					{
					  getAmenitiesH = null;
					}
					
					
					
					if(typeof getFlooringA === 'string')
					{
					  getFlooringA = $("#getFlooringA").val().split(",");
					} 
					else
					{
					  getFlooringA = null;
					}
					
					
					if(typeof getAmenitiesA === 'string')
					{
					  getAmenitiesA     = $("#getAmenitiesA").val().split(",");
					} 
					else
					{
					  getAmenitiesA = null;
					}
					
					
					            if(sub_cat == 1 || sub_cat == 2)
								{
									// apartment
									$(".apartment").show();
									$(".apartment :input").attr('disabled',false)
									
									$(".house, .ossw, .plot").hide();
									$(".house :input, .ossw :input, .plot :input").attr("disabled",true);
						
								}
								else if(sub_cat == 3 || sub_cat == 4)
								{
									// house
									$(".house").show();
									$(".house :input").attr('disabled',false)
									
									$(".apartment, .ossw, .plot").hide();
									$(".apartment :input , .ossw :input, .plot :input").attr('disabled',true);

								}
								else if(sub_cat == 5) 
								{
									// plot
									 $(".plot").show();
									 $(".plot :input").attr('disabled',false);
									
									 $(".house, .apartment, .ossw").hide();
									 $(".house :input, .apartment :input, .ossw :input").attr("disabled", true);
							
								}
								else if(sub_cat == 7 || sub_cat == 8 || sub_cat == 9 || sub_cat == 10 )
								{
									// ossw
									$(".ossw").show();
									$(".ossw :input").attr('disabled',false)
						
									$(".house, .apartment, .plot").hide();
									$(".house :input, .apartment :input, .plot :input").attr("disabled",true);
								}
					
								$.ajax({
									
								   type:'POST',
								   url:'<?php echo base_url('mobile/PostFilter/getChildCategory') ?>',
								   data:{sub_cat:sub_cat,pu_id:pu_id},
								   dataType:"json",
								   success:function(data)
								   {
									   
									   $.each(data,function(key, value){
										   
										   if(value.fid == 16)
										   {
												 var facing = " ";
												$.each(value.data,function(key2, value2){
													
													if (getFacing  && $.inArray(value2.id, getFacing) !== -1) 
													{
														facing += "<option value='" + value2.id + "' selected>" + value2.cc_name + "</option>";
													}
													else
													{
														facing += "<option value='" + value2.id + "'>" + value2.cc_name + "</option>";
													}
													
													
												})
												$(".facing").html(facing);    
										   }
										   else if(value.fid == 17)
										   {
												 var property_status = " ";
												 $.each(value.data,function(key2, value2){
													if (getPropertyStatus && $.inArray(value2.id, getPropertyStatus) !== -1) 
													{
													
														property_status += "<option value='" + value2.id + "' selected>" + value2.cc_name + "</option>";
													}
													else
													{
												
														property_status += "<option value='" + value2.id + "'>" + value2.cc_name + "</option>";
													}
													
												})
												$(".property_status").html(property_status);    
										   }
										   else if(value.fid == 18)
										   {
												 var flooring = " ";
											
												 $.each(value.data,function(key2, value2){
													
													if (getFlooringA && $.inArray(value2.id, getFlooringA) !== -1) 
													{
													
														flooring += "<option value='" + value2.id + "' selected>" + value2.cc_name + "</option>";
													}
													else
													{
												
														flooring += "<option value='" + value2.id + "'>" + value2.cc_name + "</option>";
													}
												})
												$(".flooring").html(flooring);    
										   }
										   else if(value.fid == 19)
										   {
												 var amenities = " ";
												 $.each(value.data,function(key2, value2){
													 
													if (getAmenitiesA && $.inArray(value2.id, getAmenitiesA) !== -1) 
													{
														amenities += "<option value='" + value2.id + "' selected>" + value2.cc_name + "</option>";
													}
													else
													{
														amenities += "<option value='" + value2.id + "'>" + value2.cc_name + "</option>";
													}
												})
												$(".amenities").html(amenities);    
										   } 
										   else if(value.fid == 20)
										   {
												 var suitable_for = "";
												 $.each(value.data,function(key2, value2){
													 
													if (getSuitableFor && $.inArray(value2.id, getSuitableFor) !== -1) 
													{
														suitable_for += "<option value='" + value2.id + "' selected>" + value2.cc_name + "</option>";
													}
													else
													{
														suitable_for += "<option value='" + value2.id + "'>" + value2.cc_name + "</option>";
													}
													
												})
												$(".suitable_for").html(suitable_for);    
										   } 
										   else if(value.fid == 21)
										   {
												var hub = " ";
												$.each(value.data,function(key2, value2){
													
													if (getHub && $.inArray(value2.id, getHub) !== -1) 
													{
														hub += "<option value='" + value2.id + "' selected>" + value2.cc_name + "</option>";
													}
													else
													{
														hub += "<option value='" + value2.id + "'>" + value2.cc_name + "</option>";
													}
													
												})
												$(".hub").html(hub);    
										   }
										   else if(value.fid == 22)
										   {
												var listing_by = "";
												$.each(value.data,function(key2, value2){
													
													if (getListingBy && value2.id === getListingBy) 
													{
														listing_by += "<option value='" + value2.id + "' selected>" + value2.cc_name + "</option>";
													}
													else
													{
														listing_by += "<option value='" + value2.id + "'>" + value2.cc_name + "</option>";
													}
												})
												$(".listing_by").html(listing_by);    
										   } 				   
									   });
								   }
							   });
				}
			
        </script>
	
		<script> 

		  $(".num_check").keyup(function(){
			 
			   this.value = this.value.replace(/[^0-9.]/g, ''); 
			   this.value = this.value.replace(/(\..*)\./g, '$1');	  
		  });
		 
		</script>
		<script>
			function getCity()
			{
				var pc = $("#pc").val();
				var property_city = pc != null?pc:0;
				var  stateId = $("#sid").val();
				$.ajax({
					type:'POST',
					url:'<?php echo base_url('administrator/Location/getCityByState') ?>',
					data:{stateId:stateId,property_city:property_city},
					dataType:"json",
					success:function(data){

					$('#cid').html(data);
					}
			  });
			}
	    </script>
		
		
		<script>

			   function getSubCategory()
			   {
					var scid = $("#scid").val();
					var sc_id = scid != null?scid:0;
					var cid = $("#category").val();
				   
					if(cid)
					{
						$.ajax({
						type:'POST',
						url:'<?php echo base_url('mobile/PostFilter/getSubCategory') ?>',
						data:{cid:cid,sc_id:sc_id},
						dataType:"json",
						success:function(data)
						{
						  $('#sub_cat').html(data);
						  $("#sub_cat").trigger("change");
						}
					  });
					}   
			   }
		</script>

		<script>
				function deleteImage(id){
					var result = confirm("Are you sure to delete?");
					if(result){
						$.post( "<?php echo base_url('administrator/property/deleteImage'); ?>", {id:id}, function(resp) {
							if(resp == 'ok'){
								$('#imgb_'+id).remove();
								alert('The image has been removed.');
							}else{
								alert('Some problem occurred, please try again.');
							}
						});
					}
				}
		</script>
        
        <?php $this->load->view('admin/include/eodcode'); ?>
    </body>
</html>