<?php $this->load->view('admin/include/header'); ?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Post New Property</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="ri-group-line"></i>
                                    </div>
                                </div>
                            </div>
							<a href="<?php echo base_url('administrator/property/buy-property/add') ?>">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class=""></p>
                                <h5 class="mb-3">Buy </h5>
                            </div>
							</a>
                        </div>
                    </div>
                </div>
            </div>
			 <div class="col-xl-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="ri-group-line"></i>
                                    </div>
                                </div>
                            </div>
							<a href="<?php echo base_url('administrator/property/tenant/add') ?>">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class=""></p>
                                <h5 class="mb-3">Rent In</h5>
                            </div>
							</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="ri-group-line"></i>
                                    </div>
                                </div>
                            </div>
							<a href="<?php echo base_url('administrator/property/lessee/add') ?>">
                            <div class="flex-grow-1 overflow-hidden">
                                <p></p>
                                <h5 class="mb-3">Lease In</h5>
                            </div>
							</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="ri-group-line"></i>
                                    </div>
                                </div>
                            </div>
							<a href="<?php echo base_url('administrator/property/sell-property/add') ?>">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class=""></p>
                                <h5 class="mb-3">Sell </h5>
                            </div>
							</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="ri-group-line"></i>
                                    </div>
                                </div>
                            </div>
							<a href="<?php echo base_url('administrator/property/landlord/add') ?>">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class=""> </p>
                                <h5 class="mb-3">Rent Out</h5>
                            </div>
							</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0  me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="ri-group-line"></i>
                                    </div>
                                </div>
                            </div>
							<a href="<?php echo base_url('administrator/property/lessor/add') ?>">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class=""></p>
                                <h5 class="mb-3">Lease Out</h5>
                            </div>
							</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="simplebar-placeholder" style="width: auto; height: 369px;"></div>
    </div>
    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
        <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;">
        </div>
    </div>
    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
        <div class="simplebar-scrollbar" style="height: 223px; transform: translate3d(0px, 64px, 0px); display: block;">
        </div>
    </div>
</div>
<?php $this->load->view('admin/include/newfooter'); ?>