<?php $this->load->view('user/include/header'); ?>
<div class="page-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0">My All Chat</h4>
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Chats</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xl-12">
				<section class="message-area">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="chat-area">
									<!-- chatlist -->
									<div class="chatlist">
										<div class="modal-dialog-scrollable">
											<div class="modal-content">
												<div class="chat-header">
													<div class="msg-search">
														<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" aria-label="search">
													</div>
												</div>
												<div class="modal-body">
													<!-- chat-list -->
													<div class="chat-lists">
														<div class="tab-content" id="myTabContent">
															<div class="tab-pane fade show active" id="Open" role="tabpanel" aria-labelledby="Open-tab">
																<!-- chat-list -->
																<div class="chat-list">
																    <?php  
																	if(count($all_chat) > 0)
																	{
																	 $i= 0;	
																	foreach($all_chat as $row)
																	{
																	 $i++; 
																	?>
													   
																	<a href="#" class="d-flex align-items-center" onclick="get_message('<?php echo $i  ?>','<?php echo $row['property_id']  ?>','<?php echo $row['sender_id']  ?>','<?php echo $row['receiver_id']  ?>')" >
	
																		<div class="flex-shrink-0">
																			<img id="rimg_<?php echo $i ?>" class="img-fluid " style="max-with:75px !important; max-height:75px !important; border-radius:50%;" src="<?php echo  !empty($row['receiver_data']['image'])?base_url($row['receiver_data']['image']):'https://mehedihtml.com/chatbox/assets/img/user.png'; ?>" alt="user img">
																			<span class="active"></span>
																		</div>
																		<div class="flex-grow-1 ms-3">
																			<h3 id="rname_<?php echo $i ?>"><?php echo  $row['receiver_data']['name']; ?></h3>
																			<p  id="rstype_<?php echo $i ?>"><?php echo $row['property_type'].','.$row['sell_type']; ?></p> 
																		</div>
																	</a>
	                                                                <?php
																	}																	
																	}
																	
																	?>
																</div>
																<!-- chat-list -->
															</div>
														</div>
													</div>
													<!-- chat-list -->
												</div>
											</div>
										</div>
									</div>
									<!-- chatlist -->
									<!-- chatbox -->
									<div class="chatbox">
										<div class="modal-dialog-scrollable">
											<div class="modal-content">
												<div class="msg-head">
													<div class="row">
														<div class="col-8">
															<div class="d-flex align-items-center">
																<span class="chat-icon"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg" alt="image title"></span>
																<div class="flex-shrink-0">
																	<img id="mrimg" class="img-fluid" style="max-with:75px !important; max-height:75px !important; border-radius:50%;" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
																</div>
																<div class="flex-grow-1 ms-3">
																	<h3 id="mrname"></h3>
																	<p id="mrstype"></p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="modal-body">
													<div class="msg-body">
														<ul id="get_chat">
															
														</ul>
													</div>
												</div>
												<div class="send-box">
													<form id="createForm1" enctype="multipart/form-data" onsubmit="return send_message('<?php echo site_url('user/chat_controller/send_message'); ?>','#createForm1','#successMsg')" method="post">
														<input id="id" type="hidden">
														<input id="ssid" type="hidden" name="sender_id">
                                                        <input id="srid" type="hidden" name="receiver_id">
                                                        <input id="spid" type="hidden" name="property_id">
														<input id="msg" type="text" name="message" class="form-control" aria-label="message…" placeholder="Write message…">
														<button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button><br><br>
													</form>
												</div>
									
											</div>
										</div>
									</div>
									<!-- chatbox -->
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div style='clear:both;'></div>
		</div>
	</div>
</div>
<?php  $this->load->view('user/include/newfooter'); ?>

<script>

  var mrname  = $("#mrname").text();
  
  
  
  if(mrname == "")
  {
	$(".send-box").hide();
 
  }
  else
  {
	 $(".send-box").show();  
     
  }

</script>

<script>

jQuery(document).ready(function() {
$(".chat-list a").click(function() {
$(".chatbox").addClass('showbox');
return false;
});
$(".chat-icon").click(function() {
$(".chatbox").removeClass('showbox');
});
});
</script>


<script>
  function get_message(id,property_id,sender_id,receiver_id)
  {	 
     $(".send-box").show();  
     $("#spid").val(property_id);
	 $('#ssid').val(sender_id); 
	 $('#srid').val(receiver_id); 
	 $('#id').val(id); 
	 
	 var mrname  = $("#rname_"+id).text();
	 var mrstype = $('#rstype_'+id).text();
	 var mrimg   = $('#rimg_'+id).attr('src');
	 
	 $("#mrname").text(mrname);
	 $('#mrstype').text(mrstype);
	 $('#mrimg').attr('src',mrimg);
	 
	  $.ajax({
            type:'POST',
            url:'<?php echo base_url('user/Chat_controller/get_message') ?>',
            data:{property_id:property_id,sender_id:sender_id,receiver_id:receiver_id},
            success:function(data){
                   
                $('#get_chat').html(data);
            }
        });
		
	 
  }
</script>


<script>
 
                function send_message(url,formclass,resclass)	
				{ 
		              
                     var id = $("#id").val();					  
                     var property_id = $("#spid").val();
                     var sender_id = $("#ssid").val();
                     var receiver_id = $("#srid").val();
                      
					$(resclass).slideDown();
						$(resclass).html("<center><img src='"+baserelativepath+"loader.gif' style='max-width:32px;margin:3px auto;' /></center>");
					
		
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
                                           get_message(id,property_id,sender_id,receiver_id);
                                           $("#msg").val('');										   
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
		

</script>
