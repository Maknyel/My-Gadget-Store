

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero  align-items-center">

    <div class="container" style="<?=($get['type'] == 'info')?'padding-top:20vh':''?>">
      <div class="row">
        <div class="col-lg-12 d-flex flex-column justify-content-center text-center">
          <div class="login-box-body">
            <?php if($get['type'] == 'profile'){ ?>
              <h1 data-aos="fade-up">Change Profile</h1>
              <div style="height: 100px;"></div>
              <form id="profile_form">
                <div class="form-group has-feedback">
                  <label>Fullname:</label>
                  <input type="text" class="form-control" value="<?=get_user_data('name')?>" placeholder="Fullname" name="name" id="name" required="">                
                </div>
                <div class="form-group has-feedback">
                  <label>Username:</label>
                  <input type="text" class="form-control" value="<?=get_user_data('username')?>" placeholder="Username" name="username" id="username" required="">                
                </div>
                <div style="height: 10px;"></div>
               
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="login" default="">Change Profile</button>
                  </div><!-- /.col -->
              </form>
             <?php }else if($get['type'] == 'password'){ ?>
              <h1 data-aos="fade-up">Change Password</h1>
              <div style="height: 100px;"></div>
              <form id="profile_form_password">
                <div class="form-group has-feedback">
                  <label>Current Password:</label>
                  <input type="password" class="form-control" placeholder="Current Password" name="c_password" id="c_password" required="">
                  <input type="hidden" class="form-control" value="<?=get_user_data('password')?>" name="current_password" id="current_password" required="">                
                </div>

                <div class="form-group has-feedback">
                  <label>New Password:</label>
                  <input type="password" class="form-control" placeholder="New Password" name="password" id="password" required="">                
                </div>

                <div class="form-group has-feedback">
                  <label>Retype Password:</label>
                  <input type="password" class="form-control" placeholder="Retype Password" name="retype_password" id="retype_password" required="">                
                </div>

                
                <div style="height: 10px;"></div>
               
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="login" default="">Change Password</button>
                  </div><!-- /.col -->
              </form>
            <?php }else if($get['type'] == 'info'){ ?>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Personal Information</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" id="add_creator">
                  <div class="row">
                    <div class="col-md-4">  
                      <label for="email">Email address</label>
                      <div class="input-group col-md-12">
                          <input type="email" class="form-control pull-right" value="<?=get_all_additional_info_field('email')?>" id="email" name="email" placeholder="Email Address" required="">
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    <div class="col-md-4">  
                      <label for="birthdate">Birthday</label>
                      <div class="input-group col-md-12">
                          <input type="date" class="form-control pull-right" id="birthdate" max="<?=current_ph_date()?>" value="<?=get_all_additional_info_field('birthdate')?>" name="birthdate" required="">
                      </div><!-- /.input group -->
                    </div>
                    <div class="col-md-4">  
                      <label for="contact">Tel # and Cellphone #</label>
                      <div class="input-group col-md-12">
                          <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control pull-right" id="contact" value="<?=get_all_additional_info_field('contact')?>" name="contact" placeholder="Customer Contact #" required="">
                      </div><!-- /.input group -->
                    </div>
                  
                  </div><!--row-->  
                  <h3 class="box-title">Address</h3>
                  <div class="row">
                    <div class="col-md-12">  
                      <label for="address">Present Home Address</label>
                      <div class="input-group col-md-12">
                          <textarea type="text" class="form-control pull-right" id="address" name="address" placeholder="Customer Complete Address" required=""><?=get_all_additional_info_field('address')?></textarea>
                      </div><!-- /.input group -->
                    </div>
                    <div class="col-md-12" style="margin:10px 0px;">
                      <label for="house_status">House Status:</label>

                      <input type="radio" class="btn-check" <?=(get_all_additional_info_field('house_status') == 'owned')?'checked':''?> name="house_status" onclick="changeradio('0')" id="option2" autocomplete="off" required="" value="owned" />
                      <label class="btn btn-secondary" for="option2">Owned</label>

                      <input type="radio" class="btn-check" <?=(get_all_additional_info_field('house_status') == 'rent')?'checked':''?> name="house_status" onclick="changeradio('1')" id="option3" autocomplete="off" required="" value="rent" />
                      <label class="btn btn-secondary" for="option3">Rent</label>

                      <input type="number" min="0" class="form-control" style="margin:10px 0px;" id="date" value="<?=get_all_additional_info_field('years')?>" name="years" placeholder="# of years" required="">
                      <input type="text" class="form-control pull-right" id="rent" value="<?=get_all_additional_info_field('rent')?>" name="rent" placeholder="Landlord Name, Address, Contact Number">
                    </div>
                    
                    <h3 class="box-title">Employer</h3>
                    <div class="col-md-6">
                      <label for="emp_name">Name of Employer or Business</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="emp_name" value="<?=get_all_additional_info_field('emp_name')?>" name="emp_name" placeholder="Employer Name or Business">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="emp_no">Employer/Business Contact #</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="emp_no" value="<?=get_all_additional_info_field('emp_no')?>" name="emp_no" placeholder="Employer Name or Business Contact Number">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="emp_address">Employer or Business Address</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="emp_address" value="<?=get_all_additional_info_field('emp_address')?>" name="emp_address" placeholder="Employer Name or Business Address">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="emp_year">Years Employed or in Business</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="emp_year" value="<?=get_all_additional_info_field('emp_year')?>" name="emp_year" placeholder="Years of Employment/Business">
                        </div>  
                      </div>  
                    <div class="col-md-6">
                      <label for="occupation">Occupation</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="occupation" value="<?=get_all_additional_info_field('occupation')?>" name="occupation" placeholder="Creditor's Occupation">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="salary">Monthly Salary/ Net Business Income</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="salary" value="<?=get_all_additional_info_field('salary')?>" name="salary" placeholder="Monthly Salary/ Net Business Income">
                        </div>  
                      </div>   
                      <h3 class="box-title">Spouse</h3> 
                    <div class="col-md-6">
                      <label for="spouse">Spouse Name</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="spouse" value="<?=get_all_additional_info_field('spouse')?>" name="spouse" placeholder="Complete Name of Spouse">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="spouse_no">Cellphone Number</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="spouse_no" value="<?=get_all_additional_info_field('spouse_no')?>" name="spouse_no" placeholder="Spouse Contact Number">
                        </div>  
                      </div>    
                    <div class="col-md-6">
                      <label for="spouse_emp">Spouse Employer or Business</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="spouse_emp" value="<?=get_all_additional_info_field('spouse_emp')?>" name="spouse_emp" placeholder="Spouse Employer or Business">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="spouse_details">Spouse Employer or Business Address &amp; Telephone Number</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="spouse_details" value="<?=get_all_additional_info_field('spouse_details')?>" name="spouse_details" placeholder="Spouse Employer or Business Address &amp; Telephone Number">
                        </div>  
                      </div>  
                    <div class="col-md-12">
                      <label for="spouse_income">Spouse Monthly Income</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="spouse_income" value="<?=get_all_additional_info_field('spouse_income')?>" name="spouse_income" placeholder="Spouse Monthly Income">
                          <input type="hidden" class="form-control pull-right" id="user_id" value="<?=client_session_val()?>" name="user_id" placeholder="Spouse Monthly Income">
                        </div>  
                      </div>
                      <h3 class="box-title">Co-Maker</h3>
                      <div class="col-md-6">
                      <label for="comaker">Name of Co-Maker </label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="comaker" value="<?=get_all_additional_info_field('comaker')?>" name="comaker" placeholder="Name of Co-Maker">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="comaker_details">Present Home Address &amp; Telephone # of Co-Maker</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="comaker_details" value="<?=get_all_additional_info_field('comaker_details')?>" name="comaker_details" placeholder="Present Home Address &amp; Telephone # of Co-Maker">
                        </div>  
                      </div> 

                      
                    
                  </div><!--row-->     
                    <div class="col-md-12">
                       <div class="col-md-12">
                            <br><br>
                            <button class="btn btn-lg btn-primary pull-right" id="daterange-btn" name="">Submit</button>
                        </div>  
                    </div>  
          
                  </form> 

                
        
                </div><!-- /.box-body -->
              </div>

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Valid Id's</h3>
                  <div class="card-body">
                    <form action="<?php echo base_url(); ?>Main/dragDropUpload" class="dropzone"></form>
                  </div>
                  
                  <section id="portfolio" class="portfolio">

                    <div class="container" data-aos="fade-up">
                      <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        <?php foreach(get_all_my_ids() AS $key => $value){ ?>
                          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                              <img src="<?=base_url()?>User/<?=$value['user_id']?>/<?=$value['image_name']?>" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <div class="portfolio-links">
                                  <a href="<?=base_url()?>User/<?=$value['user_id']?>/<?=$value['image_name']?>" data-gallery="portfolioGallery" class="portfokio-lightbox"><i class="bi bi-plus"></i></a>
                                  <a href="#" onclick="myiddelete(`<?=$value['image_id']?>`,`<?=$value['image_name']?>`);" class=""><i class="bi bi-trash"></i></a>
                                </div>
                              </div>
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
            <?php } ?>

            

          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->



  <script type="text/javascript">
    function myiddelete(image_id,image_name){
      if(confirm("do you want to delete this id?")){
        var data = {'image_id':image_id,'image_name':image_name};
          // alert_data('Success',JSON.stringify(data));
          $.ajax({
            type:'POST',
            dataType:'JSON',
            url:`<?=base_url()?>`+'Main/delete_image_data',
            data:data,
            success:function(data)
            {
              if(data == 1){
                  alert_data('Success',"Id Successfully Deleted",'<?=base_url()?>profile?type=<?=$get['type']?>');
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
      }else{
      }

    }
    function changeradio(value){
      if(value == '1'){
        $('#add_creator #rent').show();  
      }else{
        $('#add_creator #rent').hide();
      }
      
    }
    $(document).on('submit', '#profile_form', function(event){
          event.preventDefault();
          var username = $('#profile_form #username').val();
          var name = $('#profile_form #name').val();
          
          
          var data = {'username':username,'name':name};
          // alert_data('Success',JSON.stringify(data));
          $.ajax({
            type:'POST',
            dataType:'JSON',
            url:`<?=base_url()?>`+'Main/change_profile',
            data:data,
            success:function(data)
            {
              if(data == 1){
                  alert_data('Success',"Successfully Change Profile",'<?=base_url()?>profile?type=<?=$get['type']?>');
              }else if(data == 2){
                alert_data('Error',"Username Exists",'');
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

        $(document).on('submit', '#profile_form_password', function(event){
          event.preventDefault();
          var c_password = $('#profile_form_password #c_password').val();
          var current_password = $('#profile_form_password #current_password').val();
          var password = $('#profile_form_password #password').val();
          var retype_password = $('#profile_form_password #retype_password').val();
          
          
          
          var data = {'password':password};

          if(retype_password != password){
            alert_data('Error',"New Password and Retype password is not equal",'');
          }else{
            if(c_password != current_password){
              alert_data('Error',"Incorrect Password",'');
            }else{
              // alert_data('Success',JSON.stringify(data));
              $.ajax({
                type:'POST',
                dataType:'JSON',
                url:`<?=base_url()?>`+'Main/change_profile_password',
                data:data,
                success:function(data)
                {
                  if(data == 1){
                      alert_data('Success',"Successfully Change Password",'<?=base_url()?>profile?type=<?=$get['type']?>');
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
            } 
          }
          
        });

        $(document).on('submit', '#add_creator', function(event){
          event.preventDefault();
          dataString = $('#add_creator').serialize();
          
          $.ajax({
            type:'POST',
            dataType:'JSON',
            url:`<?=base_url()?>`+'Main/myadditionalinfo',
            data:dataString,
            success:function(data)
            {
              if(data == 1){
                      alert_data('Success',"Personal Information Successfully Updated",'<?=base_url()?>profile?type=<?=$get['type']?>');
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
