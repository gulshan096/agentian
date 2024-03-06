<?php $this->load->view('user/include/header'); ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Delete Account</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Delete account</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-5">
                       <p> 
					      Welcome to Agentian, the ultimate app for all your property needs. Whether you're looking to buy, sell, rent, or lease, we've got you covered. Our user-friendly platform empowers buyers, sellers, landlords, tenants, lessors, and lessees to connect and fulfill their property requirements seamlessly.
                        </P>
						<p>
						For Buyers and Sellers:
						With Agentian, buying or selling a property has never been easier. Simply create an account, post your property requirements or listings, and connect with potential buyers or sellers. Our robust search filters and intuitive interface make it effortless to find your dream property or the perfect buyer.
                        </p>
						<p>
						For Landlords and Tenants:
						Landlords, showcase your properties for rent and attract potential tenants. List your properties with detailed descriptions, captivating images, and contact information to streamline the renting process. Tenants, post your requirements and let landlords find you. Find your ideal rental property and get in touch with landlords hassle-free.
                        </p>
						<p>
						For Lessors and Lessees:
						If you're a lessor, you can post your leasing offers and connect with lessees looking for the perfect rental opportunity. Lessees, on the other hand, can post their requirements and let lessors find them. Our platform facilitates smooth communication between lessors and lessees, making leasing a breeze.
                         </p>
						 
						 
						At Agentian, we prioritize user satisfaction and security. Rest assured, your personal information is handled with utmost care and kept secure. Our platform offers an interactive space where users can leave reviews, ratings, and engage in meaningful conversations to make informed decisions.

						Join the Agentian community today and experience the convenience of a comprehensive property marketplace at your fingertips. Whether you're a buyer, seller, landlord, tenant, lessor, or lessee, our app is your go-to solution for all your property needs. Get started and unlock endless possibilities in the world of real estate with Agentian.
                    </div> 				
                </div>
				<div class="mx-auto text-center">
				   <button class="btn btn-danger text-white w-50 delete_account" data-id='<?php echo $this->session->userdata('aid'); ?>'>Click here to delete your account</button>	
                </div>
			</div>
            <div style='clear:both;'></div>
        </div>
    </div>
</div>


<?php  $this->load->view('user/include/newfooter'); ?>

<script>
   
   $(document).ready(function(){
	   
	   $(".delete_account").click(function(){

        var  uid = $(this).data('id');
		  
        $.ajax({
			
			type:'POST',
			url:'<?php echo base_url('delete_post') ?>',
			data:{uid:uid},
			dataType:"json",
			success:function(data)
			{			
				if(data.status == 1)
				{
					alert(data.message);
					var url =   '<?php echo base_url('logout') ?>';
                    $(location).prop('href', url);
				}
                elseif(data.status == 0)
				{
					alert(data.message);
				}				
							
			}
	     });		  
		   
	   });
   });

</script>

