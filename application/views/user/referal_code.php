<?php $this->load->view('user/include/header'); ?>
<style>
 .rc{
	  position:relative;
	  top: 50%;
 }
</style>

<div class="page-content">
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0">Dashboard</h4>
				</div>
			</div>
		</div>
		<div class="row text-center mx-auto">
			<div class="col-xl-6 col-sm-12 mx-auto my-auto rc">
				<div class="card bg-success text-white">
					<div class="card-body"> 
						<a href="javascript:void(0)">
							<div class="d-flex text-muted">
								<div class="flex-shrink-0 me-3 align-self-center">
									<div id="radialchart-3" class="apex-charts" dir="ltr"></div>
								</div>
								<div class="flex-grow-1 overflow-hidden">
									<h3 class="mb-1 text-white">YOUR REFERAL CODE</h3>
									<h5 class="mb-3 bg-info text-white"><?php  echo $user_data['referal_code']; ?></h5>
								</div>
							</div>
						</a>
						
						<a class="btn btn-light ">CLICK BELOW LINK TO SHARE YOUR REFERAL CODE</a>
						
						<div class="text-center py-5">
						      <?php 
							    
								 $ref_amt = $this->db->where('status',1)->get('referal_code')->row_array();
							     $referal = $user_data['referal_code']; 
							     $appurl  = 'https://play.google.com/store/apps/details?id=app.agentian.in'; 
							     $text = "I’m inviting you to use AGENTIAN, a simple and secure Realestate app
								 by AGENTIAN. Here’s my code  " .$referal. " - just enter when firt signup. 
								 you will get a cashback on your wallet  ₹ " .$ref_amt['referal_amount']. " ";
                                 $wttext = $appurl."<br>".$text;
                                 $ttext = $appurl."<br>".$text;
                                 $mobile  = $user_data['mobile'];  
							     $whatsapp_url = "https://wa.me/".$mobile."?text=".$wttext;
							     $telegram_url = "https://t.me/share/url?url=".$appurl."&text=".$text." ";
							     $instagram_url = "https://t.me/share/url?url=".$appurl."&text=".$text." ";
								
								 $twitter_url = "https://twitter.com/intent/tweet?text=".$ttext;
							  ?>
						      
						      <a class="btn btn-light " href="<?php echo $whatsapp_url; ?>" target="_blank">
							      <span><i class="fa-brands fa-whatsapp text-success"></i></span>
								  <span>Whatsapp</span>	 
							  </a>
					
						      <a class="btn btn-light " href="<?php echo $telegram_url; ?>" target="_blank"> 
							      <span><i class="fa-brands fa-telegram text-info"></i></span>
                                  <span>Telegram</span>								  
							  </a>
				
						      <a class="btn btn-light " href="<?php echo $twitter_url; ?>" target="_blank"> 
							      <span><i class="fa-brands fa-twitter text-danger"></i></span>
								  <span>Twitter</span>
							  </a>
				
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php $this->load->view('user/include/newfooter'); ?>