<div class="right_col" role="main"> 
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">					
						<div class = "x-panel">
						 <table id="datatable" class="table table-striped table-bordered table-responsive">
							 <thead>
								<tr>
									<th>Fullname</th>
									<th>Activity</th>																
								</tr>
							 </thead>
							 <tbody>
									<?php
										foreach (get_history_data() as $key => $row) {
											
										
											$id=$row['log_id'];										
									?>  
								<tr>
									<td><?php echo ($row['fname'] != '')?$row['fname'].' '.$row['lname']:$row['name'];?></td>
									<td><?php echo $row['action']. " ".date("F d, Y - - h:i A", strtotime($row['date'])); ?></td>															
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
					                         <form method = "POST" action = "update_user.php"> 
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