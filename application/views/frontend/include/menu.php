
            <style>
			 
			@media screen and (max-width: 600px)
			{
			   .header.header-fixed
			   {
					animation-duration: .5s;
					animation-name: slideInDown;
					background: #fff;
					box-shadow: 0 5px 30px rgba(0, 22, 84, .1);
					-webkit-box-shadow: 0 5px 30px rgba(0, 22, 84, .1);
					position: fixed;
					top: 0;
					transition: .2s ease-in;
					width: 100%;
					z-index: 999;
				}
			}
             </style>
            <!-- ============================================================== -->
            <!-- Start Navigation -->
            <div class="header header-light head-shadow">
                <div class="container">
                    <nav id="navigation" class="navigation navigation-landscape">
                        <div class="nav-header">
                            <a class="nav-brand" href="<?php echo base_url(); ?>">
								<div class="alogo">
								   <img style="max-width:80px; max-height:80px;" class="logo" src="<?php echo base_url('assets/storage/general/new-logo.png') ?>" alt="">
								</div>
							</a>
							<div class="nav-toggle"></div>
                        </div>
                        <div class="nav-menus-wrapper" style="transition-property: none;">
                            <ul  class="nav-menu">
                                <li class=" menu-item-has-children">
                                    <a href="<?php echo base_url(); ?>" >Home</a>
                                </li>
                                <li>
								    <a href="JavaScript:Void(0);">Buy<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="<?php  echo base_url('user/property/for_buyer/1'); ?>">Buy</a></li>                                    
										<li><a href="<?php  echo base_url('user/property/for_tenant/5'); ?>">Rent In</a></li>                                    
										<li><a href="<?php  echo base_url('user/property/for_lessee/6'); ?>">Lease In</a></li>
									</ul>
								</li>
								<li>
								    <a href="JavaScript:Void(0);">Sell<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="<?php  echo base_url('user/property/for_seller/2'); ?>">Sell</a></li>                                    
										<li><a href="<?php  echo base_url('user/property/for_landlord/3'); ?>">Rent Out</a></li>                                    
										<li><a href="<?php  echo base_url('user/property/for_lessor/4'); ?>">Lease Out</a></li>
									</ul>
								</li>
                            <!--<li class=" menu-item-has-children">
                                    <a href="" >Buy Property</a>
                                </li>
								<li class=" menu-item-has-children">
                                    <a href="">Sell Property</a>
                                </li>
								<li class=" menu-item-has-children">
                                    <a href="" >Landlord</a>
                                 </li>
								 <li class=" menu-item-has-children">
                                    <a href="" >Lessor</a>
                                 </li>
                                 <li class=" menu-item-has-children">
                                    <a href="" >Tenant</a>
                                 </li>
								 <li class=" menu-item-has-children">
                                     <a href="" >Lessee</a>
                                 </li> !-->
                                 <li class="menu-item-has-children">
                                    <a href="<?php  echo base_url('about-us'); ?>" >About us</a>
                                 </li>
                                 <li class=" menu-item-has-children">
                                    <a href="<?php  echo base_url('contact'); ?>" >Contact us</a>  
                                 </li> 
                            </ul>
                            <ul class="nav-menu nav-menu-social align-to-right">
                                <li>
                                    <a href="<?php echo base_url().'post_property' ?>" class="text-success">
									<img src="assets/themes/resido/img/submit.svg" width="20" alt="" class="mr-2" /> Post Your Requirement</a>
                                </li>
								
								<?php 
									
									 if(!empty($this->session->userdata('aid')) )
									 {
										 $id = $this->session->userdata('aid');
												
										 $sql = "SELECT name FROM administrator where aid = $id and role = 2";
										 $query = $this->db->query($sql);
										 if($query->num_rows() > 0)
										 {
											    $userid  = $this->session->userdata('aid');
												$post_price = $this->db->where('status',1)->get('wallet_system')->row()->post_price;
												$credit =  $this->db->select_sum("credit")
																		  ->from("transaction")
																		  ->where("user_id",$userid)
																		  ->where("status",1)
																		  ->get()->row_array();
																
																		  
																$debit =  $this->db->select_sum("debit")
																		  ->from("transaction")
																		  ->where("user_id",$userid)
																		  ->where("status",1)
																		  ->get()->row_array();
																 
													 $wallet =  $credit['credit'] - $debit['debit'];

													 
								?>
											<li class=" menu-item-has-children">
												<a href="javascript:void(0)">
													<?php 
													
													    foreach ($query->result() as $row)
														{
															echo !empty($row->name)?$row->name:'Guest';
														}   
													?>
												</a>
												<ul  class="nav-dropdown nav-submenu">
													<li class="">
														<a href="<?php echo base_url('user/profile'); ?>" ><span><i class="fa-solid fa-user"></i></span> Profile</a>
													</li>
													<li class="">
														<a href="<?php echo base_url('user/dashboard') ?>" ><span><i class="fa-solid fa-gear"></i></span> Dashboard</a>
													</li>
													<li class="">
														<a href="javascript:void(0)" ><span><i class="fa-solid fa-wallet"></i> </span> <?php  echo !empty($wallet)?$wallet.'.00':'0.00'; ?></a>
													</li>

													<li class="">
														<a href="<?php echo base_url('logout') ?>" ><span><i class="fa-solid fa-power-off text-danger"></i></span> Logout</a>
													</li>
												</ul>
											</li>
											
                                   <?php
										 }
                                     }									   
								     else
									 {
									?>
										  <li class="add-listing">
										      <a href="<?php  echo base_url('login'); ?>"><img src="assets/themes/resido/img/user-light.svg" width="12" alt="" class="mr-2" />Sign In</a>
                                          </li>
								   <?php										
									 }
                                
								    ?>
                              </ul>
                            <div class="clearfix"></div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Navigation -->