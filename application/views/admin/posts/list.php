<?php $this->load->view('admin/include/header'); ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Manage Blog</h4>
                    <div class="page-title-right">
					    <a class="btn btn-success" href="<?php echo site_url('administrator/blog/list/add'); ?>" style="background-color:#0bb197;">Add New</a>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Blog List</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo BASE_HTTP_REL_URL; ?>administrator/dashboard">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
			
        </div>
		
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12" >
			
                <style>
                <?php
                if(empty($openform))
                {
                echo " .addform { display:none; } ";
                }
                ?>
                </style>
                <div class="card addform" id="addPost">
                    <div class="card-body">
					
                        <form id="createForm1" enctype="multipart/form-data" onsubmit="return dorequest('<?php echo site_url('administrator/Posts/addblog'); ?>','#createForm1','#successMsg')">
                            <input type="hidden" name="id" value="<?php echo !empty($getOneBlog['id'])?$getOneBlog['id']:''; ?>">
                            <div class="row">
							   <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label> Title </label>
										<input value="<?php echo !empty($getOneBlog['blog_title'])?$getOneBlog['blog_title']:''; ?>" name="blog_title" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="mt-3">
								     <?php
									
										$photourl = !empty($getOneBlog['blog_image'])?base_url($getOneBlog['blog_image']):
												
										"https://placehold.jp/18/99ccff/003366/180x140.png?text=Upload%20Image&amp;css=%7B%22font-weight%22%3A%22600%22%7D";
							
									 ?>
	
									<label for="finput" class="cUploadImages">
										<img id="blah" style="max-width:500px; max-height:500px;" name="blog_image" src="<?php echo $photourl ; ?>" alt="upload Banner" />
										<br/>Blog Image
									</label>			
									<input type="file" value="<?php echo isset($getOneBlog['blog_image'])?$getOneBlog['blog_image']:""; ?>" name="blog_image" multiple="true" accept="image/*" id="finput" onchange="readURL(this);" class="d-none"/>
								   
								   </label>
                                    </div>
                                </div>							
								<div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label> Page Content </label>
										<textarea id="tiny" name="content" class="form-control"><?php echo !empty($getOneBlog['blog_description'])?$getOneBlog['blog_description']:''; ?></textarea>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <div class="col-md-12">
                                <div id="successMsg"></div>
                                <button class="btn btn-success" type="submit" style="background-color:#0bb197;"><?php echo !empty($getOneBlog['page_id'])?'Update':'Save'; ?></button>
                                <button onclick="$('.addform').slideUp()" class="btn btn-outline-danger" type="button">Cancel</button>
                            </div>
                            <div style="clear:both;"></div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
					   
                        <div style='clear:both;'></div>
                        <table id="tabeldatahere" class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>S.NO.</th>
                                    <th>Posted By</th>
									<th>Title</th>
									<th>Image</th>
									<th>Description</th>
									<th>Status</th>
									<th>created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php  
								if(!empty($getAllPost)) 
								{
								 $i = 0;	
                                 foreach($getAllPost as $row)
                                 {	
                                  $i++;								 
							    ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo !empty($row['name'])?$row['name']:''; ?></td>
                                    <td><?php echo !empty($row['blog_title'])?$row['blog_title']:''; ?></td>
                                    <td><img width="200" height="50" src="<?php echo !empty($row['blog_image'])?base_url($row['blog_image']):''; ?>"></td>
                                    <td><?php echo !empty($row['blog_description'])?$row['blog_description']:''; ?></td>
									<td><?php echo !empty($row['status'])?"<button onclick='updatestatus(this);' t='blog' i='id' v='$row[id]' s='1' type='button' class='btn btn-success'>Active</button>":"<button onclick='updatestatus(this);' t='blog' i='id' v='$row[id]' s='0' type='button' class='btn btn-danger'>Inactive</button>"; ?></td>
                                    <td><?php echo !empty($row['created'])?date("d-m-Y", strtotime($row['created'])):''; ?></td>
									<td><a class="" href="<?php echo site_url('administrator/blog/list/').$row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                </tr>
                                <?php
								 }
								}
								?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div style='clear:both;'></div>
        </div>
    </div>
</div>


<?php  $this->load->view('admin/include/newfooter'); ?>
<script>

$(document).ready(function(){
   
	tinymce.init({
    selector: 'textarea#tiny',
	    setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    }	
  });
});
  
</script>


<script>


    function readURL(input)
	{
	    if(input.files && input.files[0])
		{
		    var reader = new FileReader();
            reader.onload = function (e) {
			    $('#blah').attr('src', e.target.result);  
			};  
			reader.readAsDataURL(input.files[0]);
		}
	}
	
</script>
