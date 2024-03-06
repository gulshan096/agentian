<?php $this->load->view('admin/include/header'); ?>
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Manage Administrator</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Administrator</a></li>
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
                                <?php echo $AddUsers; ?>
                                <div class="card addform">
                                    <div class="card-body">
                                        <form enctype="multipart/form-data" action="<?php echo base_url('administrator/users/view/'.$openform); ?>" method="POST" class="row">
                                            <input value="<?php echo !empty($administrator['aid'])?$administrator['aid']:0; ?>" name="administrator[aid]" type="hidden" />
                                            <?php
                                            $u_type = isset($administrator['u_type'])?$administrator['u_type']:"sales";
                                            ?>
                                            <div class="col-md-3">
                                                <label>Type</label>
                                                <select onchange="show_user_type(this.value);" class="form-control" name="administrator[u_type]">
                                                    <option value="">Select Type</option>
                                                    <option <?php echo is_selected('sales',$u_type); ?> value="sales">OK</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <label>Category</label>
                                                <select class="form-control" name="administrator[u_cati]">
                                                    <option value="">Select Category</option>
                                                    <?php
                                                    $u_cati = isset($administrator['u_cati'])?$administrator['u_cati']:"";
                                                    if(!empty($administrator_category))
                                                    {
                                                    foreach($administrator_category as $s)
                                                    {
                                                    echo "<option ".is_selected($u_cati,$s['id'])." value='$s[id]'>$s[title]</option>";
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Designation</label>
                                                <select class="form-control" name="administrator[u_desi]">
                                                    <option value="">Select Designation</option>
                                                    <?php
                                                    $u_desi = isset($administrator['u_desi'])?$administrator['u_desi']:"";
                                                    
                                                    if(!empty($administrator_designation))
                                                    {
                                                    foreach($administrator_designation as $s)
                                                    {
                                                    echo "<option ".is_selected($u_desi,$s['id'])." value='$s[id]'>$s[title]</option>";
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="m-2" style="clear:both;"></div>
                                            <div class="col-md-3">
                                                
                                                <label>Employee Image </label>
                                                <img onclick= " $('#employee_image').trigger('click'); " id="employee_image_Preview" class="image-responsive" =" " src="<?php echo BASE_HTTP_REL_URL; ?>assets/agentian_logo.jpg"  onerror="this.src='<?php echo base_url("assets/preloader.png"); ?>';" />
                                                <input type="file" id="employee_image" class="form-control" name="employee_image" accept="image/*" />
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input value="<?php echo isset($administrator['name'])?$administrator['name']:""; ?>" name="administrator[name]" maxlength="80" required type="text" class="form-control"  />
                                                    <label> Name*</label>
                                                </div>
                                                
                                                <div class="form-floating mb-3">
                                                    <input required value="<?php echo isset($administrator['email'])?$administrator['email']:""; ?>" name="administrator[email]" maxlength="80"  type="text" class="form-control"  />
                                                    <label>Email*</label>
                                                </div>
                                                
                                                <div class="form-floating mb-3">
                                                    <input value="<?php echo isset($administrator['mobile'])?$administrator['mobile']:""; ?>" name="administrator[mobile]" maxlength="25" type="text" class="form-control"  />
                                                    <label>Mobile</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input name="administrator[password]" maxlength="80" type="text" class="form-control"  />
                                                            <label>Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input name="confirm_password" maxlength="80" type="text" class="form-control"  />
                                                            <label>Confirm Password</label>
                                                        </div>
                                                    </div>
                                                    <div style="clear:both;"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="oth_emp_inp all_emp_inp form-group mb-3">
                                                    <label>Permission*</label>
                                                    <h4>
                                                    <div class="row">
                                                        <?php
                                                        if(!isset($_POST['administrator']['permission']))
                                                        {
                                                        $permission =   isset($administrator['permission'])?json_decode($administrator['permission'],true):array();
                                                        } else {
                                                        $permission =   $_POST['administrator']['permission'];
                                                        }
                                                        
                                                        $permission_list    =   array();
                                                        $permission_list['manage_subusers']         =   "Manage Sub Users";
                                                        $permission_list['manage_product']          =   "Manage Product";
                                                        $permission_list['manage_catalogue']        =   "Manage Catalogue";
                                                        $permission_list['manage_orders']           =   "Manage Orders";
                                                        $permission_list['manage_traders']          =   "Manage Traders";
                                                        $permission_list['manage_traders_credits']  =   "Manage Traders Credits";
                                                        $permission_list['manage_traders_schemes']  =   "Manage Traders Schemes";
                                                        $permission_list['manage_dispatch']         =   "Manage Dispatch";
                                                        $permission_list['manage_invoice']          =   "Manage Invoice Uploads";
                                                        $permission_list['view_log']                =   "View Activity Log";
                                                        $permission_list['view_attendance']         =   "Manage Attendance";
                                                        $permission_list['view_in_out']             =   "View Check in/ Out";
                                                        $permission_list['manage_complains']        =   "Manage Complains";
                                                        
                                                        if(!empty($permission_list))
                                                        {
                                                        foreach($permission_list as $i=>$v)
                                                        {
                                                        $checked = "";
                                                        if( is_array($permission) && in_array($i,$permission))
                                                        {
                                                        $checked    =   " checked = 'checked' ";
                                                        }
                                                        ?>
                                                        <div class="col-md-12">
                                                            <small class="mb-1">
                                                            <input <?php echo $checked; ?> type="checkbox" name="administrator[permission][]" value="<?php echo $i; ?>" />          <?php echo $v; ?>
                                                            </small>
                                                        </div>
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                        <div style="clear:both;"></div>
                                                    </div>
                                                    </h4>
                                                </div>
                                            </div>
                                            <script>
                                            $('#employee_image').change(function()
                                            {
                                            const file = this.files[0];
                                            if (file)
                                            {
                                            let reader = new FileReader();
                                            reader.onload = function(event)
                                            {
                                            $('#employee_image_Preview').attr('src', event.target.result);
                                            }
                                            reader.readAsDataURL(file);
                                            }
                                            });
                                            </script>
                                            <div style="clear:both;"></div>
                                            <div class="col-md-12 text-center">
                                                <button class="btn btn-primary" type="submit"><?php echo !empty($administrator['aid'])?"Update User":"Add User"; ?></button>
                                                <button onclick="$('.addform').slideUp()" class="btn btn-outline-danger" type="button">Cancel</button>
                                            </div>
                                            <div style="clear:both;"></div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div style='float: right; margin-bottom: 10px;'>
                                            <a class="btn btn-info" href="<?php echo base_url('administrator/users/view/new'); ?>" >Add</a>
                                            <?php
                                            $showinactive   =   $this->input->get("showinactive");
                                            if(!empty($showinactive))
                                            {
                                            ?>
                                            <a class="btn btn-success" href="<?php echo base_url('administrator/users/view'); ?>">Show Active Users</a>
                                            <?php
                                            } else {
                                            ?>
                                            <a class="btn btn-danger" href="<?php echo base_url('administrator/users/view?showinactive=1'); ?>">Show Inactive Users</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div style='clear:both;'></div>
                                        
                                        <table id="tabeldatahere" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>User</th>
                                                    
                                                    <th>Contact</th>
                                                    <th>Status</th>
                                                    <th>Added on</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(!empty($GetUsers))
                                                {
                                                foreach($GetUsers as $single)
                                                {
                                                ?>
                                                <tr>
                                                    <td><?php echo $single['aid'] ;?> <a class="fa fa-edit" href="<?php echo base_url("administrator/users/view/$single[aid]"); ?>"></a></td>
                                                    <td>
                                                        <span class="show_name_<?php echo $single['aid']; ?>"><?php echo $single['name']; ?></span>
                                                        <div class="text-danger">
                                                        </div>
                                                    </td>
                                                    
                                                    <td>
                                                        <i class="fa fa-envelope"></i>
                                                        <?php echo $single['email'] ;?>
                                                        <br />
                                                        <i class="fa fa-phone"></i>
                                                        <?php echo $single['mobile'] ;?>
                                                    </td>
                                                    <td><?php echo !empty($single['status'])?"<button onclick='updatestatus(this);' t='administrator' i='aid' v='$single[aid]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='administrator' i='aid' v='$single[aid]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
                                                    <td><?php echo showtime4db($single['added']);?></td>
													
                                                    
                                                </tr>
                                                <?php
                                                }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
                <?php $this->load->view('admin/include/newfooter'); ?>