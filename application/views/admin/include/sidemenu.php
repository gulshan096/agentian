<style>
.metismenu li a span{
	color: #adb5bd !important;
	font-weight : bold;
}
</style>
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>
        <li>
            <a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard" class="waves-effect">
                <i class="fa-solid fa-gauge"></i>
				<span class="badge rounded-pill bg-primary float-end"></span>
                <span>Dashboard</span>
            </a>
        </li>
	
		<li>
            <a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/pages/wallet" class="waves-effect">
                <i class="fa-solid fa-wallet"></i><span
                class="badge rounded-pill bg-primary float-end"></span>
                <span>Wallet</span>
            </a>
        </li>
		<li>
            <a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/referal_code" class="waves-effect">
                <i class="fa-solid fa-share"></i><span
                class="badge rounded-pill bg-primary float-end"></span>
                <span>Referal code</span>
            </a>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="fa-solid fa-sliders"></i>
                <span>Banner</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/pages/banner">List All</a></li>
                <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/pages/banner/add">Add new</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
              
                <i class="fa-solid fa-user"></i>
                <span>Users</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li>
					<a href="<?php echo base_url('administrator/users/allusers'); ?>" class="waves-effect">
				
						<i class='fas fa-house-user' style='font-size:14px'></i>
						<span>All users</span>
					</a>	
				</li>
		
            </ul>
        </li>
       
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <!--i class="mdi mdi-account-circle-outline"></i-->
                <i class="fa-solid fa-bars"></i>
                <span>Property Setting</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">

				<li><a href="<?php echo base_url('administrator/category'); ?>">Category</a></li>
				<li><a href="<?php echo base_url('administrator/subcategory'); ?>">Sub Category</a></li>
				<li><a href="<?php echo base_url('administrator/form_field'); ?>">Fields</a></li>
				<li><a href="<?php echo base_url('administrator/childcategory'); ?>">Child Category</a></li>
            </ul>
        </li>
		<li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <!--i class="mdi mdi-account-circle-outline"></i-->
                <i class="fa-solid fa-person-circle-plus"></i>
                <span>Membership Plan</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="<?php echo base_url('administrator/membership'); ?>">Settings</a></li>    
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="fa-solid fa-house"></i>
                <span>Manage listing</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
				<li>
				   <a href="javascript: void(0);" class="has-arrow waves-effect">
						<span>Buy Request</span>
					</a>
					<ul class="sub-menu" aria-expanded="false">
					    <li><a href="<?php echo base_url('administrator/request/buy'); ?>">Buy </a></li>
						<li><a href="<?php echo base_url('administrator/request/rent'); ?>">Rent-in </a></li>
				        <li><a href="<?php echo base_url('administrator/request/lease'); ?>">Lease-in </a></li>
					</ul>
				</li>
				
				<li>
				   <a href="javascript: void(0);" class="has-arrow waves-effect">
						<span>Sell Request</span>
					</a>
					<ul class="sub-menu" aria-expanded="false">
					     <li><a href="<?php echo base_url('administrator/request/sell'); ?>">Sell </a></li>
                         <li><a href="<?php echo base_url('administrator/request/landlord'); ?>">Rent-out </a></li>
                         <li><a href="<?php echo base_url('administrator/request/lessor'); ?>">Lease-out </a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url('administrator/request/all'); ?>">List All</a></li>
                <li><a href="<?php echo base_url('administrator/property/add'); ?>">Add new</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="fa-regular fa-file"></i>
                <span>Pages</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="<?php echo base_url('administrator/pages/about-us'); ?>">About Us</a></li>
                <li><a href="<?php echo base_url('administrator/pages/faq'); ?>">FAQ</a></li>
                <li><a href="<?php echo base_url('administrator/pages/help'); ?>">Help</a></li>
                <li><a href="<?php echo base_url('administrator/pages/contact-us'); ?>">Contact Us</a></li>
                <li><a href="<?php echo base_url('administrator/pages/terms-condition'); ?>">Terms & Condition</a></li>
                <li><a href="<?php echo base_url('administrator/pages/privacy-policy'); ?>">Privacy Policy</a></li>
            </ul>
        </li>
        <li>
            <a href="<?php echo base_url('administrator/transaction'); ?>">
             
                <i class="fa-solid fa-money-bill-transfer"></i>
                <span>Transaction</span>
            </a>
        </li> 
        <li>
            <a href="javascript: void(0);">
                
                <i class="fa-brands fa-blogger-b"></i>
                <span>Blog</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                
                <li><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/blog/list/add">All Posts</a></li>
            </ul>
        </li>
		<li>
            <a href="<?php echo base_url('administrator/enquire'); ?>">
             
                <i class="fa-solid fa-envelope"></i>
                <span>Enquire</span>
            </a>
        </li> 
    </ul>
</div>