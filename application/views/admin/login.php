<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$title?></title>

    <!-- Bootstrap -->
    <link href="<?=base_url()?>assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url()?>assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url()?>assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=base_url()?>assets/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url()?>assets/admin/build/css/custom.min.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/sweetalert/sweetalert2.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/sweetalert/sweetalert2.all.min.js" rel="stylesheet"></script>
  </head>

  <body class="login">
    <div>
    

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="loginform">
              <h1>Administrator Login</h1>
              <div>
                <input type="text" name = "username" id="username" class="form-control" placeholder="Username" required="true" />
              </div>
              <div>
                <input type="password" name = "password" id="password" class="form-control" placeholder="Password" required="true" />
              </div>
              <div>
                <button  class="btn btn-block btn-warning" name = "login"> Log in</button>
              
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="glyphicon glyphicon-home"></i> My Gadget Store </h1>
                  <p>© 2017 - <?=date('Y')?> All Rights Reserved </p>
                </div>
              </div>
            </form>
          </section>
        </div>

    
      </div>
    </div>
  </body>
<script src="<?=base_url()?>assets/admin/vendors/jquery/dist/jquery.min.js"></script>
  
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
            url:`<?=base_url()?>`+'Admin/login_submit',
            data:data,
            success:function(data)
            {
              if(data != 0){
                  alert_data('Success',"You have successfully logged-in. Please wait while redirecting you to secure page.");
                  setTimeout(function(){ 
                    window.location = `<?=base_url()?>admin`;
                  }, 3000);
                  
                
              }else{
                alert_data('Error',"The username and password did not match");
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
</html>


<script type="text/javascript">
function alert_data(title,content){
    if(title == "Success"){
            var contententity = "success";
        }else{
            var contententity = "error";    
        }
    Swal.fire({
        allowOutsideClick: false,
          text: content+'!',
          title: title,
          icon: contententity,
          confirmButtonText: 'OK',
        })
        .then(function() {
            if(title == "Success"){
                window.location = "<?=base_url()?>admin"
            }    
                
            
        });
  }
</script>