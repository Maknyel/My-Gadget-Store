<div class="right_col" role="main"> 
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<!-- <div class = "col-md-4 col-lg-4 col-xl-4 col-xs-12 col-sm-12 col-12">
					  	<div class="x_panel">
		                  <div class="x_title">
		                    <h2>Add User</h2>
		                    <ul class="nav navbar-right panel_toolbox"> 
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>
		                  <div class="x_content">
		                    <br />
		                    <form class="form-horizontal form-label-left" id="add_user">
		                      <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-3" style = "font-size:11px;">Username</label>
		                        <div class="col-md-9 col-sm-9 col-xs-9">
		                          <input type="text" class="form-control" name = "username" required>
		                          <span class="fa fa-key form-control-feedback right" aria-hidden="true"required ></span>
		                        </div>
		                      </div>
		                      <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-3" style = "font-size:11px;">Password</label>
		                        <div class="col-md-9 col-sm-9 col-xs-9">
		                          <input type="password" name = "password" class="form-control" required>
		                          <span class="fa fa-key form-control-feedback right" aria-hidden="true" required></span>
		                        </div>
		                      </div>
		                      <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-3" style = "font-size:11px;">Full name</label>
		                        <div class="col-md-9 col-sm-9 col-xs-9">
		                          <input type="text" class="form-control" name = "name" required>
		                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		                        </div>
		                      </div>
							  <input type = "hidden" name = "status" value = "active">
		                      <div class="form-group" hidden="true">
		                        <label class="col-md-3 col-sm-3 col-xs-3" >Branch</label>
		                        <div class="col-md-9 col-sm-9 col-xs-9" hidden="true">
		                         <select  name = "branch_id" class = "form-control">
								 	<?php	
										foreach (get_all_branch() as $key => $row1) {
										$id=$row1['branch_id'];
									?>
									<option value = "<?php echo $row1['branch_id'];?>"><?php echo $row1['branch_name'];?></option>	
									<?php } ?>																 
								 </select>
								 <input type="hidden" value="add" name="method">
		                          <span class="fa form-control-feedback right" aria-hidden="true"></span>
		                        </div>
		                      </div>
		                      
		                     
		                      <div class="ln_solid"></div>

		                      <div class="form-group">
		                        <div class="col-md-9 col-md-offset-3">
		                        
		                          <button name = "" class="btn btn-block btn-success"><i class = "fa fa-save"></i> Save</button>
		                        </div>
		                      </div>

		                    </form>
		                  </div>
		                </div>
		                <script type="text/javascript">
			                    	
			                    	$(document).on('submit', '#add_user', function(event){
							          event.preventDefault();
							          
							          
							          dataString = $('#add_user').serialize();
							          var data = dataString;
							          $.ajax({
							            type:'POST',
							            dataType:'JSON',
							            url:`<?=base_url()?>`+'Admin/user_function',
							            data:data,
							            success:function(data)
							            {
							              if(data == 1){
							                  alert_data('Success',"User Success Added");
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
					<div class = "col-md-8 col-lg-8 col-xl-8 col-xs-12 col-sm-12 col-12"> -->
						<div class = "x-panel">
						 <table id="datatable" class="table table-striped table-bordered table-responsive">
							 <thead>
								<tr>
									<th>Fullname</th>
									<th>Branch Name</th>
									<th>Username</th>
									<th>Password</th>
									<th>Status</th>
									<!-- <th>Action</th>									 -->
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
									<td>****</td>
									<td><?php echo $row['status'];?></td>
									<!-- <td>
										<a href="#update<?php echo $id;?>" class="btn btn-success btn-xs" data-toggle = "modal" data-target="#update<?php echo $id;?>"><i class = "fa fa-pencil"></i> Edit</a>
										
									</td> -->
																
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
					<!-- </div> -->
				</div>
			</div>
        </div>