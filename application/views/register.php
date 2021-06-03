

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-12 d-flex flex-column justify-content-center text-center">
          <div class="login-box-body">
            <!-- <h1 data-aos="fade-up">Register Form</h1> -->
            <!-- <div style="height: 100px;"></div> -->
            <?php $token = sha1(mt_rand(1, 90000) . 'SALT'); ?>

            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Register Form</h3>
                </div>
                <h3 class="box-title">Valid Id's</h3>
                  <div class="card-body">
                    <form action="<?php echo base_url(); ?>Main/dragDropUpload_with_token/<?=$token?>" class="dropzone"></form>
                  </div>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" id="loginform">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="email">Fullname</label>
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Fullname" name="name" id="name" required="">
                        <input type="hidden" value="<?=$token?>" class="form-control" name="token_id" id="token_id" required="">                
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="email">Username</label>
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username" required="">                
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="email">Password</label>
                      <div class="form-group has-feedback">
                        <input type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" name="password" id="password" required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">  
                      <label for="email">Email address</label>
                      <div class="input-group ">
                          <input type="email" class="form-control pull-right" value="<?=get_all_additional_info_field('email')?>" id="email" name="email" placeholder="Email Address" required="">
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    <div class="col-md-4">  
                      <label for="birthdate">Birthday</label>
                      <div class="input-group ">
                          <input type="date" class="form-control pull-right" id="birthdate" max="<?=current_ph_date()?>" value="<?=get_all_additional_info_field('birthdate')?>" name="birthdate" required="">
                      </div><!-- /.input group -->
                    </div>
                    <div class="col-md-4">  
                      <label for="contact">Tel # and Cellphone #</label>
                      <div class="input-group ">
                          <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control pull-right" id="contact" value="<?=get_all_additional_info_field('contact')?>" name="contact" placeholder="Customer Contact #" required="">
                      </div><!-- /.input group -->
                    </div>
                  
                  </div><!--row-->  
                  <h3 class="box-title">Address</h3>
                  <div class="row">
                    <div class="">  
                      <label for="address">Present Home Address</label>
                      <div class="input-group ">
                          <textarea type="text" class="form-control pull-right" id="address" name="address" placeholder="Customer Complete Address" required=""><?=get_all_additional_info_field('address')?></textarea>
                      </div><!-- /.input group -->
                    </div>
                    <div class="" style="margin:10px 0px;">
                      <label for="house_status">House Status:</label>

                      <input type="radio" class="btn-check" name="house_status" onclick="changeradio('0')" id="option2" autocomplete="off" required="" value="owned" />
                      <label class="btn btn-secondary" for="option2">Owned</label>

                      <input type="radio" class="btn-check" name="house_status" onclick="changeradio('1')" id="option3" autocomplete="off" required="" value="rent" />
                      <label class="btn btn-secondary" for="option3">Rent</label>

                      <input type="number" min="0" class="form-control" style="margin:10px 0px;" id="date" value="<?=get_all_additional_info_field('years')?>" name="years" placeholder="# of years" required="">
                      <input type="text" class="form-control pull-right" id="rent" value="<?=get_all_additional_info_field('rent')?>" name="rent" placeholder="Landlord Name, Address, Contact Number">
                    </div>
                    
                    <h3 class="box-title">Employer</h3>
                    <div class="col-md-6">
                      <label for="emp_name">Name of Employer or Business</label>
                      <div class="input-group ">
                          <input type="text" class="form-control pull-right" id="emp_name" value="<?=get_all_additional_info_field('emp_name')?>" name="emp_name" placeholder="Employer Name or Business">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="emp_no">Employer/Business Contact #</label>
                      <div class="input-group ">
                          <input type="text" class="form-control pull-right" id="emp_no" value="<?=get_all_additional_info_field('emp_no')?>" name="emp_no" placeholder="Employer Name or Business Contact Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="emp_address">Employer or Business Address</label>
                      <div class="input-group ">
                          <input type="text" class="form-control pull-right" id="emp_address" value="<?=get_all_additional_info_field('emp_address')?>" name="emp_address" placeholder="Employer Name or Business Address">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="emp_year">Years Employed or in Business</label>
                      <div class="input-group ">
                          <input type="text" class="form-control pull-right" id="emp_year" value="<?=get_all_additional_info_field('emp_year')?>" name="emp_year" placeholder="Years of Employment/Business">
                        </div>  
                      </div>  
                    <div class="col-md-6">
                      <label for="occupation">Occupation</label>
                      <div class="input-group ">
                          <input type="text" class="form-control pull-right" id="occupation" value="<?=get_all_additional_info_field('occupation')?>" name="occupation" placeholder="Creditor's Occupation">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="salary">Monthly Salary/ Net Business Income</label>
                      <div class="input-group ">
                          <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control pull-right" id="salary" value="<?=get_all_additional_info_field('salary')?>" name="salary" placeholder="Monthly Salary/ Net Business Income">
                        </div>  
                      </div>   
                      <h3 class="box-title">Spouse</h3> 
                    <div class="col-md-6">
                      <label for="spouse">Spouse Name</label>
                      <div class="input-group ">
                          <input type="text" class="form-control pull-right" id="spouse" value="<?=get_all_additional_info_field('spouse')?>" name="spouse" placeholder="Complete Name of Spouse">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="spouse_no">Cellphone Number</label>
                      <div class="input-group ">
                          <input type="text" class="form-control pull-right" id="spouse_no" value="<?=get_all_additional_info_field('spouse_no')?>" name="spouse_no" placeholder="Spouse Contact Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>  
                      </div>    
                    <div class="col-md-6">
                      <label for="spouse_emp">Spouse Employer or Business</label>
                      <div class="input-group ">
                          <input type="text" class="form-control pull-right" id="spouse_emp" value="<?=get_all_additional_info_field('spouse_emp')?>" name="spouse_emp" placeholder="Spouse Employer or Business">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="spouse_details">Spouse Employer or Business Address &amp; Telephone Number</label>
                      <div class="input-group ">
                          <input type="text" class="form-control pull-right" id="spouse_details" value="<?=get_all_additional_info_field('spouse_details')?>" name="spouse_details" placeholder="Spouse Employer or Business Address &amp; Telephone Number">
                        </div>  
                      </div>  
                    <div class="">
                      <label for="spouse_income">Spouse Monthly Income</label>
                      <div class="input-group ">
                          <input type="text" class="form-control pull-right" id="spouse_income" value="<?=get_all_additional_info_field('spouse_income')?>" name="spouse_income" placeholder="Spouse Monthly Income">
                        </div>  
                      </div>
                      <h3 class="box-title">Co-Maker</h3>
                      <div class="col-md-6">
                      <label for="comaker">Name of Co-Maker </label>
                      <div class="input-group ">
                          <input type="text" class="form-control pull-right" id="comaker" value="<?=get_all_additional_info_field('comaker')?>" name="comaker" placeholder="Name of Co-Maker">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="comaker_details">Present Home Address &amp; Telephone # of Co-Maker</label>
                      <div class="input-group ">
                          <input type="text" class="form-control pull-right" id="comaker_details" value="<?=get_all_additional_info_field('comaker_details')?>" name="comaker_details" placeholder="Present Home Address &amp; Telephone # of Co-Maker">
                        </div>  
                      </div> 

                      
                    
                  </div><!--row-->     
                    <div class="">
                       <div class="">
                            <br><br>
                            <button class="btn btn-lg btn-primary pull-right" id="daterange-btn" name="">Submit</button>
                        </div>  
                    </div>  
          
                  </form> 

                
        
                </div><!-- /.box-body -->
              </div>
            

          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->



  <script type="text/javascript">
    function changeradio(value){
      if(value == '1'){
        $('#loginform #rent').show();  
      }else{
        $('#loginform #rent').hide();
      }
      
    }
    $(document).on('submit', '#loginform', function(event){
          event.preventDefault();
          dataString = $('#loginform').serialize();
          // alert_data('Success',JSON.stringify(data));
          $.ajax({
            type:'POST',
            dataType:'JSON',
            url:`<?=base_url()?>`+'Main/register_submit',
            data:dataString,
            success:function(data)
            {
              if(data == 1){
                  alert_data('Success',"You have successfully signed-up. Please wait while redirecting you to login page.",'<?=base_url()?>login');
              }else if(data == 2){
                alert_data('Error',"Username Exists",'');
              }else if(data == 3){
                alert_data('Error',"Please Upload atleast 2 valid Id",'');
              }else{
                alert_data('Error',"Error was encountered. please refresh the page",'');
              }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {

                if (textStatus == 'timeout') {

                alert_data('Error','Timeout Error','');

                } else {

                alert_data('Error','Network problem. Please try again','');

                }
              }

          });
        });
  </script>
