<style>
.metismenu li a span{
	color: #adb5bd !important;
	font-weight : bold;
}

 
</style>
<div id="sidebar-menu" class=""  >
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled " id="side-menu" style="color:red">
        <li class="menu-title">Menu</li>
		<li>
            <a href="<?php echo base_url('user/dashboard'); ?>" class="waves-effect">
                <i class="fa-solid fa-gauge"></i>
				<span class="badge rounded-pill bg-primary float-end"></span>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('user/profile'); ?>" class="waves-effect">
                <i class="fa-solid fa-user"></i><span
                class="badge rounded-pill bg-primary float-end"></span>
                <span>Profile </span>
            </a>
        </li>
		
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <!--i class="mdi mdi-account-circle-outline"></i-->
                <i class="fa-solid fa-user-plus"></i>
                <span>Memmber Ship</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="<?php echo base_url('user/membership'); ?>">Plans</a></li>
                <li><a href="<?php echo base_url('user/my_membership'); ?> ">My Member Ship</a></li>
            </ul>
        </li>
		<li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <!--i class="mdi mdi-account-circle-outline"></i-->
                <i class="fa-solid fa-house-user"></i>
                <span>My Listing</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <!--<li><a href="<?php echo base_url(); ?>user/my_listing/looking_for">Looking For</a></li>
                <li><a href="<?php echo base_url(); ?>user/my_listing/available_for">Available For</a></li> !-->
					<li>
					   <a href="javascript: void(0);" class="has-arrow waves-effect" >
				
						<span>Buy</span>
					   </a>
					   <ul class="sub-menu" aria-expanded="false">
							<li><a href="<?php echo base_url(); ?>user/my_listing/looking_for/buy">Buy</a></li>
							<li><a href="<?php echo base_url(); ?>user/my_listing/looking_for/rent_in">Rent In</a></li>
							<li><a href="<?php echo base_url(); ?>user/my_listing/looking_for/lease_in">Lease In</a></li>
					   </ul>
					</li>
					<li>
					   <a href="javascript: void(0);" class="has-arrow waves-effect" >
						
						<span>Sell</span>
					   </a>
					   <ul class="sub-menu" aria-expanded="false">
							<li><a href="<?php echo base_url(); ?>user/my_listing/available_for/sell">Sell</a></li>
							<li><a href="<?php echo base_url(); ?>user/my_listing/available_for/rent_out">Rent Out</a></li>
							<li><a href="<?php echo base_url(); ?>user/my_listing/available_for/lease_out">Lease Out</a></li>
					   </ul>
					</li>
             </ul>
        </li>
		<li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <!--i class="mdi mdi-account-circle-outline"></i-->
                <i class="fa-solid fa-heart"></i>
                <span>My Wishlist</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="<?php echo base_url(); ?>user/wishlist/looking_for">Looking For</a></li>
                <li><a href="<?php echo base_url(); ?>user/wishlist/available_for">Available For</a></li>
            </ul>
        </li>
        <li>
            <a href="<?php echo base_url('user/my_chat'); ?>" >
                <!--i class="mdi mdi-account-circle-outline"></i-->
                <i class="fa-solid fa-message"></i>
                <span>Chats</span>
            </a>
        </li>
		
		<li>
            <a href="<?php echo base_url('user/transaction'); ?>" >
                <!--i class="mdi mdi-account-circle-outline"></i-->
                <i class="fa-solid fa-money-bill-transfer"></i>
                <span>Transaction</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('about-us') ?>" >
                <!--i class="mdi mdi-account-circle-outline"></i-->
                <i class="fa-solid fa-eject"></i>
                <span>About</span>
            </a>
        </li>
		<li>
            <a href="<?php echo base_url('user/referal_code'); ?>" class="waves-effect">
                <i class="fa-solid fa-share"></i><span
                class="badge rounded-pill bg-primary float-end"></span>
                <span>Referal code </span>
            </a>
        </li>
    </ul>
</div>