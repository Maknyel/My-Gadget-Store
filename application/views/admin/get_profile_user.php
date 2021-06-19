	<div class="right_col" role="main"> 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">         
                <div class = "">
                	<div class="box-primary">
		                <div class="box-header with-border">
		                  <h3 class="box-title">Personal Information - <?=get_user_data_admin($id,'name')?></h3>
		                </div>
		                <div class="box-body">
		                  <!-- Date range -->
		                  <form method="post" id="add_creator">
		                  <div class="row">
		                    <div class="col-md-4">  
		                      <label for="email">Email address</label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="email" class="form-control pull-right" value="<?=get_all_additional_info_field_view($id,'email')?>" id="email" name="email" placeholder="Email Address" required="">
		                        </div><!-- /.input group -->
		                      </div><!-- /.form group -->
		                    <div class="col-md-4">  
		                      <label for="birthdate">Birthday</label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="date" class="form-control pull-right" id="birthdate" max="<?=current_ph_date()?>" value="<?=get_all_additional_info_field_view($id,'birthdate')?>" name="birthdate" required="">
		                      </div><!-- /.input group -->
		                    </div>
		                    <div class="col-md-4">  
		                      <label for="contact">Tel # and Cellphone #</label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control pull-right" id="contact" value="<?=get_all_additional_info_field_view($id,'contact')?>" name="contact" placeholder="Customer Contact #" required="">
		                      </div><!-- /.input group -->
		                    </div>
		                  
		                  </div><!--row-->  
		                  <h3 class="box-title">Address</h3>
		                  <div class="row">
		                    <div class="col-md-12">  
		                      <label for="address">Address</label>
		                      <div class="input-group col-md-12">
		                          <textarea readonly="" type="text" class="form-control pull-right" id="address" name="address" placeholder="Customer Complete Address" required=""><?=get_all_additional_info_field_view($id,'address')?></textarea>
		                      </div><!-- /.input group -->
		                    </div>
		                    <div class="col-md-4">
		                      <label for="country">Country</label>
		                      <div class="form-group has-feedback">
		                        <input type="text" class="form-control" placeholder="Country" name="country" id="country" readonly="" value="<?=get_all_additional_info_field_view($id,'country')?>" required="">                
		                      </div>
		                    </div>
		                    <div class="col-md-4">
		                      <label for="province">Province</label>
		                      <div class="form-group has-feedback">
		                        <input type="text" class="form-control" placeholder="Province" name="province" id="province" readonly="" value="<?=get_all_additional_info_field_view($id,'province')?>" required="">                
		                      </div>
		                    </div>
		                    <div class="col-md-4">
		                      <label for="city">City</label>
		                      <div class="form-group has-feedback">
		                        <input type="text" class="form-control" placeholder="City" name="city" id="city" readonly="" value="<?=get_all_additional_info_field_view($id,'city')?>" required="">                
		                      </div>
		                    </div>
		                    
		                    <div class="col-md-4">
		                      <label for="barangay">Barangay</label>
		                      <div class="form-group has-feedback">
		                        <input type="text" class="form-control" placeholder="Barangay" name="barangay" id="barangay" readonly="" value="<?=get_all_additional_info_field_view($id,'barangay')?>" required="">                
		                      </div>
		                    </div>
		                    <div class="col-md-4">
		                      <label for="zip_code">Zipcode</label>
		                      <div class="form-group has-feedback">
		                        <input type="text" class="form-control" placeholder="Zipcode" name="zip_code" id="zip_code" readonly="" value="<?=get_all_additional_info_field_view($id,'zip_code')?>" required="">                
		                      </div>
		                    </div>
		                    <div class="col-md-12" style="margin:10px 0px;">
		                      <label for="house_status">House Status:</label>

		                      <input readonly type="text" class="form-control" name="house_status" value="<?=get_all_additional_info_field_view($id,'house_status')?>" id="option2" autocomplete="off" required="" value="owned" />
		                      
		                      <input readonly type="number" min="0" class="form-control" style="margin:10px 0px;" id="date" value="<?=get_all_additional_info_field_view($id,'years')?>" name="years" placeholder="# of years" required="">
		                      <input readonly type="text" class="form-control pull-right" id="rent" value="<?=get_all_additional_info_field_view($id,'rent')?>" name="rent" placeholder="Landlord Name, Address, Contact Number">
		                    </div>
		                    </div>
		                    <h3 class="box-title">Employer</h3>
		                    <div class="row">
		                    <div class="col-md-6">
		                      <label for="emp_name">Name of Employer or Business</label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="text" class="form-control pull-right" id="emp_name" value="<?=get_all_additional_info_field_view($id,'emp_name')?>" name="emp_name" placeholder="Employer Name or Business">
		                        </div>  
		                      </div>
		                    <div class="col-md-6">
		                      <label for="emp_no">Employer/Business Contact #</label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="text" class="form-control pull-right" id="emp_no" value="<?=get_all_additional_info_field_view($id,'emp_no')?>" name="emp_no" placeholder="Employer Name or Business Contact Number">
		                        </div>  
		                      </div>
		                    <div class="col-md-6">
		                      <label for="emp_address">Employer or Business Address</label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="text" class="form-control pull-right" id="emp_address" value="<?=get_all_additional_info_field_view($id,'emp_address')?>" name="emp_address" placeholder="Employer Name or Business Address">
		                        </div>  
		                      </div>
		                    <div class="col-md-6">
		                      <label for="emp_year">Years Employed or in Business</label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="text" class="form-control pull-right" id="emp_year" value="<?=get_all_additional_info_field_view($id,'emp_year')?>" name="emp_year" placeholder="Years of Employment/Business">
		                        </div>  
		                      </div>  
		                    <div class="col-md-6">
		                      <label for="occupation">Occupation</label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="text" class="form-control pull-right" id="occupation" value="<?=get_all_additional_info_field_view($id,'occupation')?>" name="occupation" placeholder="Creditor's Occupation">
		                        </div>  
		                      </div>
		                    <div class="col-md-6">
		                      <label for="salary">Monthly Salary/ Net Business Income</label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="text" class="form-control pull-right" id="salary" value="<?=get_all_additional_info_field_view($id,'salary')?>" name="salary" placeholder="Monthly Salary/ Net Business Income">
		                        </div>  
		                      </div>
		                      </div>

		                      <h3 class="box-title">Spouse</h3> 
		                    <div class="row">
		                    <div class="col-md-6">
		                      <label for="spouse">Spouse Name</label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="text" class="form-control pull-right" id="spouse" value="<?=get_all_additional_info_field_view($id,'spouse')?>" name="spouse" placeholder="Complete Name of Spouse">
		                        </div>  
		                      </div>
		                    <div class="col-md-6">
		                      <label for="spouse_no">Cellphone Number</label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="text" class="form-control pull-right" id="spouse_no" value="<?=get_all_additional_info_field_view($id,'spouse_no')?>" name="spouse_no" placeholder="Spouse Contact Number">
		                        </div>  
		                      </div>    
		                    <div class="col-md-6">
		                      <label for="spouse_emp">Spouse Employer or Business</label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="text" class="form-control pull-right" id="spouse_emp" value="<?=get_all_additional_info_field_view($id,'spouse_emp')?>" name="spouse_emp" placeholder="Spouse Employer or Business">
		                        </div>  
		                      </div>
		                    <div class="col-md-6">
		                      <label for="spouse_details">Spouse Employer or Business Address &amp; Telephone Number</label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="text" class="form-control pull-right" id="spouse_details" value="<?=get_all_additional_info_field_view($id,'spouse_details')?>" name="spouse_details" placeholder="Spouse Employer or Business Address &amp; Telephone Number">
		                        </div>  
		                      </div>  
		                    <div class="col-md-12">
		                      <label for="spouse_income">Spouse Monthly Income</label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="text" class="form-control pull-right" id="spouse_income" value="<?=get_all_additional_info_field_view($id,'spouse_income')?>" name="spouse_income" placeholder="Spouse Monthly Income">
		                          <input readonly type="hidden" class="form-control pull-right" id="user_id" value="<?=client_session_val()?>" name="user_id" placeholder="Spouse Monthly Income">
		                        </div>  
		                      </div>
		                      <h3 class="box-title">Co-Maker</h3>
		                      <div class="col-md-6">
		                      <label for="comaker">Name of Co-Maker </label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="text" class="form-control pull-right" id="comaker" value="<?=get_all_additional_info_field_view($id,'comaker')?>" name="comaker" placeholder="Name of Co-Maker">
		                        </div>  
		                      </div>
		                    <div class="col-md-6">
		                      <label for="comaker_details">Present Home Address &amp; Telephone # of Co-Maker</label>
		                      <div class="input-group col-md-12">
		                          <input readonly type="text" class="form-control pull-right" id="comaker_details" value="<?=get_all_additional_info_field_view($id,'comaker_details')?>" name="comaker_details" placeholder="Present Home Address &amp; Telephone # of Co-Maker">
		                        </div>  
		                      </div> 

		                      
		                    
		                  </div><!--row-->     
		                    
		                  </form> 

		                
		        
		                </div><!-- /.box-body -->
		             </div>
                </div>
                <div class=" box-primary">
	                <div class="box-header with-border">
	                  <h3 class="box-title">Valid Id's</h3>
	                  
	                  <section id="portfolio" class="portfolio">

	                    <div class="container" data-aos="fade-up">
	                      <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
	                        <?php foreach(get_all_my_ids_admin($id) AS $key => $value){ ?>
	                          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
	                            <div class="portfolio-wrap exp-img-wrapper">
	                              <img src="<?=base_url()?>User/<?=$value['user_id']?>/<?=$value['image_name']?>" class="img-fluid imgsrc" alt="">
	                              
	                            </div>
	                          </div>
	                          <?php } ?>
	                        </div>
	                      </div>
	                    </section>
	                </div>
	                <div class="box-body">
	                </div>
	                <div class="box-footer">
	                </div>
              	</div>

              	<div class=" box-primary">
	                <div class="box-header with-border">
	                  <h3 class="box-title">Comaker Valid Id's</h3>
	                  
	                  <section id="portfolio" class="portfolio">

	                    <div class="container" data-aos="fade-up">
	                      <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
	                        <?php foreach(get_all_my_ids_admin_comaker($id) AS $key => $value){ ?>
	                          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
	                            <div class="portfolio-wrap exp-img-wrapper">
	                              <img src="<?=base_url()?>User/comaker/<?=$value['user_id']?>/<?=$value['image_name']?>" class="img-fluid imgsrc" alt="">
	                              
	                            </div>
	                          </div>
	                          <?php } ?>
	                        </div>
	                      </div>
	                    </section>
	                </div>
	                <div class="box-body">
	                </div>
	                <div class="box-footer">
	                </div>
              	</div>


              	<div class=" box-primary">
	                <div class="box-header with-border">
	                  <h3 class="box-title">List of Loans</h3>
	                  
	                  <section id="portfolio" class="portfolio">

	                    <div class="container" data-aos="fade-up">
	                      <table id="datatable-buttons" class="table table-bordered table-striped">
		                    <thead>
		                      <tr>
		                        <th>Product</th>
		                        <th>Total Payment</th>
		                        <th>Downpayment</th>
		                        <th>Months</th>
		                        <th>Bills Per Month</th>
		                        <th>Status</th>
		                      </tr>
		                    </thead>
		                    <tbody>
		                      <?php foreach (get_all_application_own($id) as $key => $row) { ?>
		                      <tr>
		                        <td><?php echo $row['item_name'];?></td>
		                        <td><?php echo $row['total_payment'];?></td>
		                        <td><?php echo $row['downpayment'];?></td>
		                        <td><?php echo $row['total_months'];?></td>          
		                        <td><?php echo $row['per_month_bill'];?></td>
		                        <td><?php echo ($row['is_approved'] == '1')?'Approved':'Pending';?></td>
		                      </tr>
		                   
		                    <?php } ?>
		                  </tbody>
		                </table>
	                      </div>
	                    </section>
	                </div>
	                <div class="box-body">
	                </div>
	                <div class="box-footer">
	                </div>
              	</div>
            </div>
        </div>
    </div>

    <style type="text/css">
    	.img-fluid.imgsrc{
    		width: 100%!important;
		    position: absolute!important;
		    margin: auto;
		    height: auto!important;
		    bottom: -9999px;
		    right: -9999px;
		    top: -9999px;
		    left: -9999px;
    	}

    	.exp-img-wrapper {
		    width: 100%;
		    height: 230px;
		    overflow: hidden;
		    position: relative;
		}
    </style>