<div class="right_col" role="main"> 
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
						<div class = "x-panel">
						 <table id="datatable" class="table table-striped table-bordered table-responsive">
							 <thead>
								<tr>
									<th>Fullname</th>
									<th>Branch Name</th>
									<th>Username</th>
									<th>Status</th>
									<th>Action</th>									
								</tr>
							 </thead>
							 <tbody>
									<?php	
										foreach (get_all_user_data() as $key => $row) {
										
											$id=$row['user_id'];
											
									?>  
								<tr>
									<td><?php echo $row['name'];?></td>
									<td><?php echo $row['branch_name'];?></td>
									<td><?php echo $row['username'];?></td>
									<td>
										<?php 
											if(get_user_additional_info_field_count($row['user_id']) > 0){
												echo 'Complete Information | ';
												echo (get_user_additional_info_field($row['user_id'],'is_verified') == '0')?'Not ':'';
												echo 'Verified';	
											}else{
												echo 'Information not yet complete';
											}
											
										?>
											
									</td>
									<td>
										<?php if(get_user_additional_info_field_count($row['user_id']) > 0){ ?>
											<a href="<?=base_url()?>admin/user_info/<?=$row['user_id']?>" class="btn btn-default btn-xs" target="_blank"><i class = "fa fa-eye"></i> View</a>
											<?php if(get_user_additional_info_field_count($row['user_id']) > 0){ ?>
												<?php if(get_user_additional_info_field($row['user_id'],'is_verified') == '0'){ ?>
													<a href="<?=base_url()?>Admin/verify_user?user_id=<?php echo $row['user_id'];?>&email=<?=get_user_additional_info_field($row['user_id'],'email')?>&name=<?php echo $row['name'];?>" class="btn btn-success btn-xs">Verify User</a>
												<?php } ?>
											<?php } ?>
										<?php } ?>	
									</td>
																
								</tr>
									<div id = "update<?php echo $id;?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
										 <div class="modal-dialog modal-sm">
					                      <div class="modal-content">

					                        <div class="modal-header">
					                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
					                          </button>
					                          <h4 class="modal-title" id="myModalLabel2">Edit User Details</h4>
					                        </div>
					                        <div class="modal-body">
					                         <form id="edit_user<?=$id?>"> 
											   <input type="hidden" name="user_id" value="<?php echo $id;?>">
													<label>Full name</label>
														<input type="text" name = "name" class="form-control" value = "<?php echo $row['name'];?>">
														<br/>								
													<label>Username</label>
														<input type="text" name = "username" class="form-control" value = "<?php echo $row['username'];?>">
														<br/>
													<label>Password</label>
														<input type="password" name = "password" class="form-control" placeholder="Enter to Change Password">
														<br/>
													<label>Status</label>
													<select name = "status" class = "form-control">
														<option value = "active">Active</option>
														<option value = "inactive">Inactive</option>						
													</select>
													<input type="hidden" value="edit" name="method">
														<br/>
													<label>Branch Name</label>
														<select name = "branch_id" class = "form-control">
															<option value = "<?php echo $row['branch_id'];?>"><?php echo $row['branch_name'];?></option>
															<option></option>
															<?php	
																foreach (get_all_branch() as $key => $row1) {
																$id3=$row1['branch_id'];
															?>
															<option value = "<?php echo $row1['branch_id'];?>"><?php echo $row1['branch_name'];?></option>
															<?php } ?>
															
														</select>
														<br/>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button  name = "update" class="btn btn-primary">Save changes</button>
											</form>

											<script type="text/javascript">
			                    	
						                    	$(document).on('submit', '#edit_user<?=$id?>', function(event){
										          event.preventDefault();
										          
										          
										          dataString = $('#edit_user<?=$id?>').serialize();
										          var data = dataString;
										          $.ajax({
										            type:'POST',
										            dataType:'JSON',
										            url:`<?=base_url()?>`+'Admin/user_function',
										            data:data,
										            success:function(data)
										            {
										              if(data == 1){
										                  alert_data('Success',"User Success Updated");
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

											</div>
					                        <div class="modal-footer">
					                          
					                        </div>
					                      </div>
					                    </div>
									</div>
								<?php }?>
							 </tbody>								
						 </table>
						</div>
				</div>
			</div>
        </div>