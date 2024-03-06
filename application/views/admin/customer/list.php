<?php $this->load->view('admin/include/header'); ?>
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Manage Customers</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Customers</a></li>
                                            <li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                  <!-- end page title -->
                  <div class="row">
                  <div id="successMsg" style="display:none;"><p class="form-control" style="background-color:#0bb197;color:white;width:50%;margin:1%;">Success:Customer has been added Successfully!!!</p></div>
                    <div class="col-xl-12" >
                          <div class="card addform" id="addCustomer" style="display:none;">
                              <div class="card-body">
                                <h3>New Customer</h3><br>
                                <form id="createForm" onsubmit="return dorequest('<?php echo site_url('administrator/Customer/saverecords'); ?>','#createForm','#successMsg')">
                                <div class="row">
                                    <!----------Column1--------------------->
                                        <div class="col-lg-6">
                                                <div class="row" style="margin-bottom:2%;">
                                                    <div class="col-md-3" style="width: 20.66667%;">Customer Type</div>
                                                    <div class="col-md-6">
                                                        <input type="radio"  name="customerType" value="business">
                                                        <label for="html">Business</label>
                                                        <input type="radio"  name="customerType" value="individual">
                                                        <label for="css">Individual</label>
                                                    </div>
                                                    <div class="row" style="margin-bottom:2%;">
                                                        <div class="col-md-2 " style="width: 20.66667%;">Primary Contact</div>
                                                        <div class="col-md-2" style="width: 21.66667%;">
                                                            <label  for="salutation">Salutation:</label>
                                                            <select  name="salutation" id="salutation">
                                                                <option value="Mr">Mr.</option>
                                                                <option value="Mrs">Mrs.</option>
                                                                <option value="Ms">Ms.</option>
                                                                <option value="Miss">Miss.</option>
                                                                <option value="Dr">Dr.</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-1" style="width:23.33333%;"><input type="text" name="firstname" placeholder="FirstName"></div>
                                                        <div class="col-md-1"><input type="text" name="lastname" placeholder="Lastname"></div>
                                                    </div>
                                                    <div class="row" style="margin-bottom:2%;">
                                                        <div class="col-md-2 " style="width: 20.66667%;">Display Name</div>
                                                        <div class="col-md-6 "><input type="text" name="displayName" placeholder="Display Name"></div>
                                                    </div>
                                                    <div class="row" style="margin-bottom:2%;">
                                                        <div class="col-md-2 " style="width: 20.66667%;">Customer Email</div>
                                                        <div class="col-md-6 "><input type="text" name="customerEmail" placeholder=""></div>
                                                    </div>
                                                    <div class="row" style="margin-bottom:2%;">
                                                        <div class="col-md-2 " style="width: 20.66667%;">Customer Phone</div>
                                                        <div class="col-md-1 " style="width: 23.33333%;"><input type="text" name="customerPhone" placeholder="Work Phone"></div>
                                                        <div class="col-md-2 " style="width: 22.66667%;;"><input type="text" name="otherPhoneNo" placeholder="Mobile"></div>
                                                        <div class="col-md-3 " >
                                                                <a href="#" name="add_more" onclick="toggle_add_more()">
                                                                <span class="toggle_add_more_class">Add More Details</span>
                                                                <span class="toggle_add_more_class" style="display:none;">Hide More Details</span>
                                                                </a>
                                                        </div>
                                                    </div>
                                                    <div class="row toggle_add_more_class" name="show_more" style="display:none;margin-left: 20.5%;">
                                                        <div class="row" style="margin-bottom:2%;">
                                                            <div class="col-md-2 " style="width: 23.66667%;">Skype Name/Number</div>
                                                            <div class="col-md-2 " style="width: 23.66667%;"><input type="text" name="skypeName" value=""></div>
                                                        </div>
                                                        <div class="row" style="margin-bottom:2%;">
                                                            <div class="col-md-2 " style="width: 23.66667%;">Designation</div>
                                                            <div class="col-md-2 " style="width: 23.66667%;"><input type="text" name="designation" value=""></div>
                                                        </div>
                                                        <div class="row" style="margin-bottom:2%;">
                                                            <div class="col-md-2 " style="width: 23.66667%;">Department</div>
                                                            <div class="col-md-2 " style="width: 23.66667%;"><input type="text" name="department" value=""></div>
                                                        </div>
                                                            <div class="row" style="margin-bottom:2%;">
                                                                <div class="col-md-2 " style="width: 23.66667%;">Website</div>
                                                                <div class="col-md-2 " style="width: 23.66667%;"><input type="text" name="website" value=""></div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                        </div>
                                    <!------------------Column1 End---------------------->
                                    <!------------------Column2 ---------------------->
                                        <div class="col-lg-6">
                                                <div class="row" style="margin-left: 25%;">
                                                        <ul >
                                                        <?php $tabs = array("OtherDetails", "Address", "Contact_Persons","Remarks");
                                                        for ($i = 0; $i < count($tabs); $i++) {
                                                            ?>
                                                                <li style='display:inline;'>
                                                                    <button type="button" onclick="tab_content('<?php echo $tabs[$i]; ?>')" style='background-color:#0bb197;color:white;border:0;border-radius:10px;'>
                                                                        <?php echo $tabs[$i]; ?>
                                                                    </button>
                                                                </li>
                                                            <?php
                                                                }
                                                            ?>
                                                        </ul>
                                                </div>
                                                <div class="row" id="OtherDetails" style="display:none;margin-left:10%;">
                                                    <div class="row" style="margin-bottom:2%;">
                                                        <div class="col-md-2" style="width: 20.66667%;">
                                                            GST Treatment:
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" value="" name="gst" placeholder="">
                                                        </div>
                                                        <div class="col-md-2" style="width: 20.66667%;margin-left: 4%;">
                                                            Tax Preference:
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" value="" name="tax_pref" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-bottom:2%;">
                                                        <div class="col-md-2" style="width: 20.66667%;">
                                                            GSTIN / UIN:
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" value="" name="gst_in" placeholder="">
                                                        </div>
                                                        <div class="col-md-2" style="width: 20.66667%;margin-left: 4%;">
                                                            Currency:
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" value="" name="currency" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-bottom:2%;">
                                                        <div class="col-md-2" style="width: 20.66667%;">
                                                            Place of Supply:
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" value="" name="supply" placeholder="">
                                                        </div>
                                                        <div class="col-md-2" style="width: 20.66667%;margin-left: 4%;">
                                                            Payment Terms:
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" value="" name="payment" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-bottom:2%;">
                                                        <div class="col-md-2" style="width: 20.66667%;">
                                                            Facebook:
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" value="" name="facebook" placeholder="">
                                                        </div>
                                                        <div class="col-md-2" style="width: 20.66667%;margin-left: 4%;">
                                                            Twitter:
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" value="" name="twitter" placeholder="">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="row" id="Address" style="display:none;margin-left:10%;">
                                            <div class="col-md-6" style="width:60%;border-style: groove;margin:1%;margin-left: 17%;">
                                            <div class="row">
                                                    <div class="col-md-12" style="margin:1%;"><b>Shiping Information</b></div>	
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="dealer_name" id="dealer_name" maxlength="100"  type="text" class="form-control"  />
                                                                        <label> Username*</label> 
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                    <input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="address" id="address" maxlength="100"  type="text" class="form-control"  />
                                                                    <label> Address Line1*</label> 
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                    <input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="town_name" id="town_name" maxlength="100"  type="text" class="form-control"  />
                                                    <label> Town*</label> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                <input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="country" id="country" maxlength="100"  type="text" class="form-control"  />
                                                <label> Country*</label> 
                                            </div>
                                        </div>
                                    </div>											
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="postcode" id="postcode" maxlength="100"  type="text" class="form-control"  />
                                                    <label> Postcode*</label> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input value="<?php echo isset($users['name'])?$users['name']:""; ?>" name="phone_no" id="phone_no" maxlength="100"  type="text" class="form-control"  />
                                                <label> Phone Number*</label> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                            <div class="row" id="Contact_Persons" style="display:none;">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center"><i class="fa fa-plus" id="addBtn" style="padding-right:20px;color:#86ebac;font-size:24px;"></i>Salutation</th>
                                                <th class="text-center">First_Name</th>
                                                <th class="text-center">Last_Name</th>
                                                <th class="text-center">Email_Address</th>
                                                <th class="text-center">Work_Phone</th>
                                                <th class="text-center">Mobile</th>
                                            </tr>
                                            </thead>
                                            <tbody id="tbody">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row" id="Custom_Fields" style="display:none;">
                                    <label>Custom_Fields</label>
                                </div>
                                <div class="row" id="Remarks" style="display:none;width: 50%; margin-left: 25%;">
                                    <label>Remarks (For Internal Use)</label>
                                    <textarea style="margin-left: 3%;"></textarea>
                                </div>
                                </div>
                            </div>                                 
                            <div style='margin-left:40%;width:60%;'>
							        <button class="btn btn-success" type="submit"  style="background-color:#0bb197;">Save</button>
                                    <button class="btn btn-success" type="button" onclick="hideCustomer()"  style="background-color:#0bb197;">Cancel</button>
						    </div>
                        </div>
                        </form>                                    
                        <!------------------Column2 End---------------------->
                        
                    </div>
                                <div class="card">
                                    <div class="card-body">
											<div style='float: right; margin-bottom: 10px;'>
												<a class="btn btn-success" onclick="addCustomer()" href="#" style="background-color:#0bb197;">Add New Customer</a>
											</div>
											<div style='clear:both;'></div>
                                            <div style="overflow-x:auto;">
											<table id="tabeldatahere" class="table table-striped">
												<thead>
													<tr>
														<!--th>Role</th-->
														<th>Name</th>
														<th>Type</th>
														<th>Email</th>
                                                        <th>Country</th>
														<th>Work_Phone</th>
														<th>RECEIVABLES</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>   
											<?php

                                            $query = $this->db->query("Select * from customer");

                                            foreach ($query->result() as $row)
                                            {
                                                echo "<tr>";
                                                if($row->firstname=='' && $row->lastname==''){
                                                    echo "<td >".$row->displayName."</td>";
                                                }else{
                                                    echo "<td >".$row->firstname." ".$row->lastname."</td>";
                                                }
                                                echo "<td>".$row->customerType."</td>";  
                                                echo "<td>".$row->customerEmail."</td>";
                                                echo "<td>".$row->country."</td>";
                                                echo "<td>".$row->phone_no."</td>"; 
                                                echo "<td></td>"; 
                                                echo "<td>
                                                            <a class='fa fa-envelope'></a>
                                                            <a class='fa fa-download'></a>
                                                            <a class='fa fa-trash'></a>
                                                            <a class='fa fa-edit'></a>
                                                        </td>";
                                                echo "</tr>";
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
<?php $this->load->view('admin/include/newfooter'); ?>



<script>
            function addCustomer(){
				document.getElementById("addCustomer").style.display='block';
			}
            function hideCustomer(){
                document.getElementById("addCustomer").style.display='none';
            }
			function createProduct(){
				document.getElementById("addCustomer").style.display = "none";
				document.getElementById("successMsg").style.display = "block";
				setTimeout(() => {
					const msgBox = document.getElementById('successMsg');
					msgBox.style.display = 'none';
				}, 1000);
			}	

			$(document).ready(function(){
			$('[data-toggle="mpn"]').tooltip();   
			});
			$(document).ready(function(){
			$('[data-toggle="upc"]').tooltip();   
			});
			$(document).ready(function(){
			$('[data-toggle="isbn"]').tooltip();   
			});
			$(document).ready(function(){
			$('[data-toggle="ean"]').tooltip();   
			});

            function tab_content($this){ 
                if($this=='OtherDetails'){
                        document.getElementById($this).style.display="block";
                        document.getElementById('Address').style.display="none";
                        document.getElementById('Custom_Fields').style.display="none";
                        document.getElementById('Remarks').style.display="none";
                        document.getElementById('Contact_Persons').style.display="none";
                }
                if($this=='Address'){
                        document.getElementById($this).style.display="block";
                        document.getElementById('OtherDetails').style.display="none";
                        document.getElementById('Custom_Fields').style.display="none";
                        document.getElementById('Remarks').style.display="none";
                        document.getElementById('Contact_Persons').style.display="none";
                }
                if($this=='Contact_Persons'){
                        document.getElementById($this).style.display="block";
                        document.getElementById('OtherDetails').style.display="none";
                        document.getElementById('Address').style.display="none";
                        document.getElementById('Remarks').style.display="none";
                        document.getElementById('Custom_Fields').style.display="none";
                }
                if($this=='Custom_Fields'){
                        document.getElementById($this).style.display="block";
                        document.getElementById('OtherDetails').style.display="none";
                        document.getElementById('Address').style.display="none";
                        document.getElementById('Remarks').style.display="none";
                        document.getElementById('Contact_Persons').style.display="none";
                }
                if($this=='Remarks'){
                        document.getElementById($this).style.display="block";
                        document.getElementById('OtherDetails').style.display="none";
                        document.getElementById('Address').style.display="none";
                        document.getElementById('Custom_Fields').style.display="none";
                        document.getElementById('Contact_Persons').style.display="none";
                }
                
            }
            function toggle_add_more()
                {
                    $(".toggle_add_more_class").slideToggle();
                }
            function add_more(){ 
                document.getElementById("show_more").style.display="block";
                document.getElementById("add_more").innerHTML='<a href="#" id="hide_more" onclick="hide_more()">Hide Details</a>';
            }
            function hide_more(){ 
                $("#show_more").toggle();
                alert("Hii");
            }
            function save(){
                document.getElementById("successMsg").style.display="block";
                document.getElementById("addCustomer").style.display="none";
                setTimeout(() => {
					const msgBox = document.getElementById('successMsg');
					msgBox.style.display = 'none';
				}, 2000);
            }

            $(document).ready(function () {
				  
                  // Denotes total number of rows
                  var rowIdx = 0;
              
                  // jQuery button click event to add a row
                  $('#addBtn').on('click', function () {
              
                    // Adding a row inside the tbody.
                    $('#tbody').append(`<tr id="R${++rowIdx}">
                         <td class="row-index text-center">
                                <label for="salutation"></label>
                                <select name="salutation" id="salutation" style="border:0;" >
                                <option value="Mr">Mr.</option>
                                <option value="Mrs">Mrs.</option>
                                <option value="Ms">Ms.</option>
                                <option value="Miss">Miss.</option>
                                <option value="Dr">Dr.</option>
                                </select>
                            </td>
                         <td>
                            <input value="" placeholder="" name="fname" maxlength="100" required type="text"  />
                         </td>
                         <td>
                            <input value="" placeholder="" name="lname" maxlength="100" required type="text"  />
                         </td>
                         <td>
                            <input value="" placeholder="" name="email" maxlength="100" required type="text"  />
                         </td>
                         <td>
                            <input value="" placeholder="" name="work_phone" maxlength="100" required type="text" />
                         </td>
                         <td>
                            <input value="" placeholder="" name="mobile" maxlength="100" required type="text"  />
                         </td>
                          <td class="text-center">
                            <button class="btn btn-danger remove"
                              type="button">Remove</button>
                          </td>
                          </tr>`);
                  });
              
                  // jQuery button click event to remove a row.
                  $('#tbody').on('click', '.remove', function () {
              
                    // Getting all the rows next to the row
                    // containing the clicked button
                    var child = $(this).closest('tr').nextAll();
              
                    // Iterating across all the rows 
                    // obtained to change the index
                    child.each(function () {
              
                      // Getting <tr> id.
                      var id = $(this).attr('id');
              
                      // Getting the <p> inside the .row-index class.
                      var idx = $(this).children('.row-index').children('p');
              
                      // Gets the row number from <tr> id.
                      var dig = parseInt(id.substring(1));
              
                      // Modifying row index.
                      idx.html(`Row ${dig - 1}`);
              
                      // Modifying row id.
                      $(this).attr('id', `R${dig - 1}`);
                    });
              
                    // Removing the current row.
                    $(this).closest('tr').remove();
              
                    // Decreasing total number of rows by 1.
                    rowIdx--;
                  });
                });
                
    //---------------------Ajax Save Data---------------------//

               
	function showresponse(showtype,showmessage,targetelement)
		{
			$(targetelement).fadeIn("slow");
				$(targetelement).html(showmessage);
					
					$(targetelement).addClass("alert");
					$(targetelement).removeClass("alert-success");
					$(targetelement).removeClass("alert-warning");
					$(targetelement).removeClass("alert-danger");
					
					switch(showtype)
						{
							case 1:
									$(targetelement).addClass("alert-success");
							break;
							case 2:
									$(targetelement).addClass("alert-warning");
							break;
							default:				
									$(targetelement).addClass("alert-danger");
							break;
						}
			return "";
		}


			function dorequest(url,formclass,resclass)	
				{  alert('Save');
					//$(resclass).html("<center><img src='"+BASE_RELATIVE_PATH+"loader.gif' style='max-width:32px;margin:3px auto;' /></center>");
					
						// var data = $(formclass).serializeArray();
						 
						 var form = $(formclass)[0];
						 var formData = new FormData(form);
						 
							$.ajax({
									type: "POST",
									async: true,
									cache: false,
									url: url,
									data: formData,
									processData: false,
									contentType: false,
									
									success: function (tempdata)
										{				
												if (tempdata.trim() != '') 
													{
														var values = JSON.parse(tempdata);
														showresponse(values.status,values.message,resclass);
														
														if ( typeof values.redurl !== 'undefined' && values.redurl !== '0' )
															{
																setTimeout(function(){
																	window.location.href	= values.redurl;	
																},786);
															}
														
													} else {
														showresponse(0,"Something went wrong, Please try again later.",resclass);
													}
										},
									cache: false
								}).fail(function (jqXHR, textStatus, error) {
									// Handle error here
									showresponse(0,"Something went wrong, Please try again later.",resclass);
								//	console.log(jqXHR.status);
								});

					return false;
				}

        //-------------------Ajax Save Data--------------//



		</script>
