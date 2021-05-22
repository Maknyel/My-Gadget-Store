

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-12 d-flex flex-column justify-content-center text-center">
          <div class="login-box-body">
            <h1 data-aos="fade-up">Login Form</h1>
            <div style="height: 100px;"></div>
            <form id="loginform">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Username" name="username" id="username" required="">                
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="">
               </span>
              </div>
              <div style="height: 10px;"></div>
             
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block btn-flat" name="login" default="">Sign In</button>
                </div><!-- /.col -->
            </form>

            

          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->



  <script type="text/javascript">
    $(document).on('submit', '#loginform', function(event){
          event.preventDefault();
          var username = $('#loginform #username').val();
          var password = $('#loginform #password').val();
          
          
          var data = {'username':username,'password':password};
          // alert_data('Success',JSON.stringify(data));
          $.ajax({
            type:'POST',
            dataType:'JSON',
            url:`<?=base_url()?>`+'Main/login_submit',
            data:data,
            success:function(data)
            {
              if(data != 0){
                  alert_data('Success',"You have successfully logged-in. Please wait while redirecting you to secure page.",'<?=base_url()?>');
                  
                  
                
              }else{
                alert_data('Error',"The username and password did not match",'');
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

