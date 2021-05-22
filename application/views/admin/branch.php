<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.1.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />

<!-- Include TUI CSS. -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tui-image-editor@3.2.2/dist/tui-image-editor.css">
<link rel="stylesheet" href="https://uicdn.toast.com/tui-color-picker/latest/tui-color-picker.css">

<!-- Include TUI Froala Editor CSS. -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/third_party/image_tui.min.css">

<!-- Include Froala Editor JS. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.1.0/js/froala_editor.pkgd.min.js"></script>

<!-- Include TUI and Fabric JS. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.6.7/fabric.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tui-code-snippet@1.4.0/dist/tui-code-snippet.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tui-image-editor@3.2.2/dist/tui-image-editor.min.js"></script>

<!-- Include Froala TUI plugin JS -->
<script src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/third_party/image_tui.min.js"></script>

<div class="right_col" role="main"> 
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class = "col-md-4 col-lg-4 col-xl-4 col-xs-12 col-sm-12 col-12">
						<div class="x_panel">
			                <div class="x_title">
			                    <h2>Add Product <i class = "fa fa-building"></i></h2>
			                 	<div class="clearfix"></div>
			                </div>
			                <div class="x_content">
			                    <form class="form-horizontal form-label-left" id="add_product">
			                    	<div class="form-group">
				                        <label class="col-md-12 col-sm-12 col-xs-12">Upload Image</label>
					                    <div class="col-md-12 col-sm-12 col-xs-12">    
					                        <img src="" id="img_only" height="auto" width="100%">
					                        <div style="text-align: center;width:100%;">
					                        	<button type="button" id="upload_file">Upload Image</button>
					                        </div>
					                    </div>
				                    </div>
				                    <div class="form-group">
				                        <label class="col-md-12 col-sm-12 col-xs-12">Product Code</label>
				                        <div class="col-md-12 col-sm-12 col-xs-12">
				                          	<input type="text" class="form-control" name = "serial" required="">
				                          	<span class="fa fa-buildi form-control-feedback right" aria-hidden="true" ></span>
				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <label class="col-md-12 col-sm-12 col-xs-12">Product Name</label>
				                        <div class="col-md-12 col-sm-12 col-xs-12">
				                          	<input type="text" style = "resize:none;" name = "prod_name" id="prod_name" class="form-control" required="">
				                          	<span class="fa fa-person form-control-feedback right" aria-hidden="true" ></span>
				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <label class="col-md-12 col-sm-12 col-xs-12">Product Descrption</label>
				                        <div class="col-md-12 col-sm-12 col-xs-12">
				                          	<textarea type="text" class="form-control" name = "prod_desc" id="prod_desc" required></textarea>
				                          	<span class="fa fa-phe form-control-feedback right" aria-hidden="true"></span>
				                        </div>
				                    </div>
				                    <script type="text/javascript">
				                    	new FroalaEditor('#add_product textarea#prod_desc', {
							                imageUploadURL: base_url+'Admin/upload_image',
							              })
				                    </script>
				                      
				                    <div class="form-group">
				                        <label class="col-md-12 col-sm-12 col-xs-12">Product Price</label>
				                        <div class="col-md-12 col-sm-12 col-xs-12">
				                          	<input type="number" step="0.01" class="form-control" name = "prod_price" required>
				                          	<input type="hidden" value="add" name="method">
				                          	<input type="hidden" value="<?=get_admin_data('branch_id')?>" name="branch_id">
				                          	<input type="hidden" name="image" id="image">
				                          	<span class="fa fa-phe form-control-feedback right" aria-hidden="true"></span>
				                        </div>
				                    </div>
				                      
				                     
				                    <div class="ln_solid"></div>

				                    <div class="form-group">
				                        <div class="col-md-9 col-md-offset-3">
				                        	<button name = "" class="btn btn-block btn-success"><i class = "fa fa-save"></i> Save</button>
				                        </div>
				                    </div>
			                    </form>
				                    	<form style="display:none" id="uploadForm" method="POST" enctype="multipart/form-data">
									   		<input type="file" name ="file" id="file" accept="image/*">
									 	</form>

			                    <script type="text/javascript">
			                    	$(window).ready(function(){
									    $('#upload_file').click(function(){
									      $('#file').click();
									    });
									});

								  	$(document).on('change','#file', function(){

								          upload();
								    });

								    function upload(){
								        var form = $('#uploadForm')[0];

								        // Create an FormData object
								        var dataString = new FormData(form);

								        // alert(dataString);
								            var uploadtracing = $('#uploadForm');
								            $.ajax({
								              type:'POST',
								              dataType: "json",
								              data: dataString,
								              enctype: 'multipart/form-data',
								              processData: false,
								              contentType: false,
								              cache: false,
								              // timeout: 600000,
								              url: base_url+"Admin/upload_file",
								              beforeSubmit: function(data){
								               
								              },
								              uploadProgress: function (event, position, total, progress){
								              },
								              success: function(data){
								                  if(data.status !== 'success'){

								                    if (data.msg == "<p>The filetype you are attempting to upload is not allowed.</p>") {
								                        var pop_msg = "<p>"+'Invalid file type upload files in PDF, or mp4 format only'+"</p>";
								                    }else{
								                        var pop_msg = data.msg;
								                    }

								                    alert_data('Error',pop_msg);


								                } else {
								                  $('#add_product #img_only').attr('src',data['path']);
									                  $('#add_product #image').val(data['file_data']);
								                }

								              },
								              resetForm: true
								            });

								    }
			                    	$(document).on('submit', '#add_product', function(event){
							          event.preventDefault();
							          
							          
							          dataString = $('#add_product').serialize();
							          var data = dataString;
							          if($('#image').val() == ''){
							          	alert_data('Error',"Please Upload Image");
							          }else{
								          $.ajax({
								            type:'POST',
								            dataType:'JSON',
								            url:`<?=base_url()?>`+'Admin/product_function',
								            data:data,
								            success:function(data)
								            {
								              if(data == 1){
								                  alert_data('Success',"Product Success Added");
								              }else{
							                	alert_data('Error',"Invalid Request");
								              }
								            },
								            error: function(XMLHttpRequest, textStatus, errorThrown) {

								                if (textStatus == 'timeout') {

								                alert_data('Error','Timeout Error');

								                } else {

								                alert_data('Error','Network problem. Please try again');

								                }
								              }

								          });
								      }
								    });

			                    </script>
			                </div>
			            </div>
					</div>
					<div class = "col-md-8 col-lg-8 col-xl-8 col-xs-12 col-sm-12 col-12">
						<div class = "x-panel" style="overflow: auto;width: 100%;">
						 <table id="datatable" class="table table-striped table-bordered">
							 <thead>
								<tr>
									<th>Product Code</th>
									<th>Product Name</th>
									<th>Description</th>
									<th>Image</th>
									<th>Price</th>
									<th>Action</th>									
								</tr>
							 </thead>
							 <tbody>
									<?php	
										foreach (get_all_product() as $key => $row1) {						
											$id=$row1['prod_id'];
											
									?>  
								<tr>
									<td><?php echo $row1['serial'];?></td>
									<td><?php echo $row1['prod_name'];?></td>
									<td><?php echo $row1['prod_desc'];?></td>
									<td>
										<img height="auto" width="100%" src="<?=base_url()?>Product/<?=$row1['image']?>">
											
									</td>
									<td><?php echo $row1['prod_price'];?></td>
									<td>
										<a href="#update<?php echo $id;?>" class="btn btn-success btn-xs" data-toggle = "modal" data-target="#update<?php echo $id;?>"><i class = "fa fa-pencil"></i> Edit</a>
										
									</td>
																
								</tr>
										<div id = "update<?=$id?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-sm">
						                      	<div class="modal-content">

						                        	<div class="modal-header">
						                          		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						                          <h4 class="modal-title" id="myModalLabel2">Edit Product Details</h4>
						                        </div>
						                        <div class="modal-body">
						                         <form id="edit_product<?=$id?>"> 
												   		<input type="hidden" name="prod_id" value="<?php echo $id;?>">
														<label>Product Code</label>
															<input type="text" name = "serial" class="form-control" value = "<?php echo $row1['serial'];?>">
															<br/>								
														<label>Product Name</label>
															<input type="text" name = "prod_name" class="form-control" value = "<?php echo $row1['prod_name'];?>">
															<br/>
														<!-- <label>Product Description</label>
															<input type="text" name = "prod_desc" class="form-control" value = "<?php echo $row1['prod_desc'];?>">
															<br/> -->
														<label>Product Price</label>
															<input type="text" name = "prod_price" class="form-control" value = "<?php echo $row1['prod_price'];?>">
															<input type="hidden" value="edit" name="method">
				                          					<input type="hidden" value="<?=get_admin_data('branch_id')?>" name="branch_id">
															<br/>

													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													<button  name = "update" class="btn btn-primary">Save changes</button>
												</form>
												</div>
						                        <div class="modal-footer">
						                          
						                        </div>
						                      </div>
						                    </div>
										</div>

										<script type="text/javascript">
								        	$(document).on('submit', '#edit_product<?=$id?>', function(event){
									          event.preventDefault();
									          
									          
									          dataString = $('#edit_product<?=$id?>').serialize();
									          var data = dataString;
									          $.ajax({
									            type:'POST',
									            dataType:'JSON',
									            url:`<?=base_url()?>`+'Admin/product_function',
									            data:data,
									            success:function(data)
									            {
									              if(data == 1){
									                  alert_data('Success',"Product Success Updated");
									              }else{
								                	alert_data('Error',"Invalid Request");
									              }
									            },
									            error: function(XMLHttpRequest, textStatus, errorThrown) {

									                if (textStatus == 'timeout') {

									                alert_data('Error','Timeout Error');

									                } else {

									                alert_data('Error','Network problem. Please try again');

									                }
									              }

									          });
									        });
								        </script>
								<?php }?>
							 </tbody>								
						 </table>
						</div>
					</div>
				</div>
			</div>
        </div>

        