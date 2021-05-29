<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$title?> </title>
    <link href="<?=global_icon()?>" rel="icon">
    <link href="<?=global_icon()?>" rel="apple-touch-icon">
    <link href="<?=base_url()?>assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <link href="<?=base_url()?>assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/admin/vendors/jquery/dist/jquery.min.js"></script>
    <link href="<?=base_url()?>assets/admin/build/css/custom.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/sweetalert/sweetalert2.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/sweetalert/sweetalert2.all.min.js" rel="stylesheet"></script>
    <script src="<?=base_url()?>assets/admin/vendors/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
      var base_url = `<?=base_url()?>`;
    </script>
    <style>
       h5,h6{
          text-align:center;
        }
      

        @media print {
          .btn-print {
            display:none !important;
          }
          .main-footer  {
          display:none !important;
          }
          .box.box-primary {
            border-top:none !important;
          }
          .nav_menu {
            display:none;
          }
          footer{
            display:none;
          }
        }
    </style>
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
                      location.reload();
                  }    
                      
                  
              });
        }
    </script>
    </head>




    <body class="nav-md">
      <div class="container body">
        <div class="main_container">
          <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
              <div class="navbar nav_title" style="border: 0;">
                <a href="#" class="site_title"><i class="fa fa-cog"></i> <span>Administrator</span></a>
              </div>
              <div class="clearfix"></div>
              <div class="profile clearfix">
                <div class="profile_pic">
                  <img src="<?=base_url()?>assets/admin/images/admin.png" alt="..." class="img-circle profile_img"> 
                </div>
                <div class="profile_info">
                  <span>Welcome</span>
                  <h2><?=get_admin_data('name')?></h2>
                </div>
              </div>

              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <ul class="nav side-menu">
                    <li><a href = "<?=base_url()?>admin"><i class="fa fa-file"></i> Dashboard<span class="fa fa-chevron-right"></span></a></li>
                    <li><a href = "<?=base_url()?>admin/application"><i class="fa fa-file"></i> Application<span class="fa fa-chevron-right"></span></a></li>
                    <li><a href = "<?=base_url()?>admin/pending_application"><i class="fa fa-file"></i> Pending Application<span class="fa fa-chevron-right"></span></a></li>      
                    <li><a href = "<?=base_url()?>admin/branch"><i class="fa fa-building"></i> Brand <span class="fa fa-chevron-right"></span></a></li>
                    <li><a href = "<?=base_url()?>admin/user"><i class="fa fa-users"></i> Customer <span class="fa fa-chevron-right"></span></a></li>
                    <!-- <li><a href = "<?=base_url()?>admin/history"><i class="fa fa-history"></i> History Log <span class="fa fa-chevron-right"></span></a></li>                   -->
                  </ul>
                </div>            
              </div>
              
              <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                  <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                  <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" href = "<?=base_url()?>admin/logout" title="Logout">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
              </div>
            
            </div>
          </div>

       
          <div class="top_nav">
            <div class="nav_menu">
              <nav>
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                 <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?=base_url()?>assets/admin/images/admin.png" alt=""><?=get_admin_data('name')?>
                      <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">    
                      <li><a href="<?=base_url()?>admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                  </li>               
                </ul>
              </nav>
            </div>
          </div>