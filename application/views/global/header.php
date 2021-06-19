<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$title?></title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=global_icon()?>" rel="icon">
  <link href="<?=global_icon()?>" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url()?>assets/user_template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/user_template/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/user_template/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/user_template/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/user_template/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/user_template/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="<?=base_url()?>assets/user_template/css/style.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/user_template/css/user.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/sweetalert/sweetalert2.css" rel="stylesheet">
  <script src="<?=base_url()?>assets/sweetalert/sweetalert2.all.min.js" rel="stylesheet"></script>
  <script src="<?=base_url()?>assets/admin/vendors/jquery/dist/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/dropzone/min/dropzone.min.css" />
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dropzone/min/dropzone.min.js"></script>



  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

  <!-- =======================================================
  * Template Name: FlexStart - v1.3.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<script type="text/javascript">
      var base_url = `<?=base_url()?>`;
    </script>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="<?=base_url()?>" class="logo d-flex align-items-center">
        <img src="<?=base_url()?>assets/user_template/img/logo.png" alt="">
        <span>My Gadget Store</span>
      </a>

      <nav id="navbar" class="navbar">
          
        <ul>
          <?php if(client_session_val()){ ?>
            <li class="dropdown" onmouseover="hover_notification();"><a href="#"><i class="fa fa-bell"></i><b id="notif_count"><?=notification_count_all()?></b></a>
              <ul style="height: 20vw;overflow: auto;">
                <?php foreach (get_all_notification() as $key => $value) { ?>
                  <li class="dropdown" style="<?=($value['is_read']==0)?'background:#d3d3d373':''?>">
                    <?php if($key != 0){ ?>
                      <hr>
                    <?php } ?>  
                      
                    <p style="word-break: break-word;padding: 10px;font-size: 10px;"><?=$value['message']?>
                    <br>
                    <?=$value['date_added']?></p>
                  </li>
                <?php } ?>
                
                
                
              </ul>
            </li>
          <?php } ?>
          <li><a class="nav-link scrollto active" href="<?=base_url()?>">Home</a></li>
          <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              
              <?php if(client_session_val()){ ?>
              <li class="dropdown"><a href="<?=base_url()?>manage">Manage</a></li>
              <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="<?=base_url()?>profile?type=profile">Change Profile</a></li>
                  <li><a href="<?=base_url()?>profile?type=info">Change Other Information</a></li>
                  <li><a href="<?=base_url()?>profile?type=password">Change Password</a></li>
                </ul>
              </li>
              <li><a href="<?=base_url()?>Main/logout">Logout</a></li>
              <?php }else{ ?>
                <li><a href="<?=base_url()?>login">Login</a></li>
                <li><a href="<?=base_url()?>register">Register</a></li>
              <?php } ?>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  