<style>
 img{
	 border:none;
 }
</style>
<div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box text-center">
                            <a href="<?php echo BASE_HTTP_REL_URL; ?>administartor/dashboard" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url('assets/storage/general/new-logo.png') ?>" alt="logo-sm-dark" style="max-width:80px; max-height:80px;" />
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url('assets/storage/general/new-logo.png') ?>" alt="logo-dark" style="max-width:80px; max-height:80px;" />
                                </span>
                            </a>
                            <a href="<?php echo BASE_HTTP_REL_URL; ?>administartor/dashboard" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url('assets/storage/general/new-logo.png') ?>" alt="logo-sm-light" style="max-width:80px; max-height:80px;" />
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url('assets/storage/general/new-logo.png') ?>" alt="logo-light" style="max-width:80px; max-height:80px;" />
                                </span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>
                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="ri-search-line"></span>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex">
                         <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">  
                                <form class="p-3">
                                    <div class="mb-3 m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line"></i>
                            </button>
                        </div>

                        <div class="dropdown d-none">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-notification-3-line"></i>
                                <span class="noti-dot"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0"> Notifications </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="small"> View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="<?php echo base_url("administrator/dispatch/view2/0"); ?>" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class='fas fa-shuttle-van'></i>
                                                    </span>
                                                </div>
                                            </div>                                
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1"><b>New Order #12334</b></h6>
                                                <hr>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-3"><b>Order:GGBS(Ground Granulated Blast Furnace Gas)</b></p>
                                                    <p class="mb-2"><b>Requested Delivery:07/18/2020,7:00 PM</b></p>
                                                    <p class="mb-1"><b>Party Name: Lorem Ipsum Pvt. LTD</b></p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> Just Now</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="mdi mdi-reload-alert"></i>
                                                    </span>
                                                </div>
                                            </div>                                
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Checkout</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">A Car has been checked-out.</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="mdi mdi-reload-alert"></i>
                                                    </span>
                                                </div>
                                            </div>                                
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Login</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">User Scott Logged in</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2 border-top">
                                    <div class="d-grid">
                                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                            <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
								
								<!--img class="rounded-circle header-profile-user" src="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/images/users/avatar-2.jpg" alt="Header Avatar" /-->
								
								<i class="mdi mdi-account-circle-outline rounded-circle header-profile-user"></i>
								
                                <span class="d-none d-xl-inline-block ms-1"><?php echo $this->session->userdata('name'); ?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item
                                <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
								-->
                                <a class="dropdown-item" href="<?php echo site_url("administrator/all_activity/admin?show=activity"); ?>"><i class="ri-wallet-2-line align-middle me-1"></i> My Activity</a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="<?php echo BASE_HTTP_REL_URL; ?>administrator/logout"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="mdi mdi-cog"></i>
                            </button>
                        </div>

                    </div>
                </div>