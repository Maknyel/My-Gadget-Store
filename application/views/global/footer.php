
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-12 col-md-12 footer-info">
            <a href="<?=base_url()?>" class="logo d-flex align-items-center">
              <img src="<?=base_url()?>assets/user_template/img/logo.png" alt="">
              <span><?=$title?></span>
            </a>
            <h1>Terms and agreement</h1>
            <p>Dear our beloved creditors, please be informed that this store needs your valid IDs and credentials for loaning. a 100 peso will be charged automatically for your late payment. if unable to pay for two consecutive months we will increase interest rate and endorse your third party collections agency. you cant apply loan for two at a time. Doable cash and Gcash payment. sending proof of payment such as picture or screenshots are acceptable. Once you already settle you first loan, you can now enjoy free apply for another loan. Thankyou</p>
            <!-- <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
            </div> -->

            <div style="height: 20px"></div>
            <h1 data-aos="fade-up">About Us</h1>
          
            <p>Mr. Niel Lopez us the owner of the store. Store was established 3 years ago at Arellano Street Lessandra Heights Molino IV, Bacoor Cavite</p>
            <p>Store gives interest based on terms chosen, 3mos (3%), 6mos (6%), 9mos (9%), 12mos (12%)</p>
            <p>100 pesos penalty for late payment</p>
          </div>

          <div class="col-lg-2 col-6 footer-links" style="display: none;">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links" style="display: none;">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start" style="display: none;">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span><?=$title?></span></strong>. All Rights Reserved <?=date('Y')?>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?=base_url()?>assets/user_template/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="<?=base_url()?>assets/user_template/vendor/aos/aos.js"></script>
  <script src="<?=base_url()?>assets/user_template/vendor/php-email-form/validate.js"></script>
  <script src="<?=base_url()?>assets/user_template/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?=base_url()?>assets/user_template/vendor/purecounter/purecounter.js"></script>
  <script src="<?=base_url()?>assets/user_template/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?=base_url()?>assets/user_template/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url()?>assets/user_template/js/main.js"></script>

</body>

</html>

<script type="text/javascript">
  function hover_notification(){
        $.ajax({
            type:'POST',
            dataType:'JSON',
            url:`<?=base_url()?>`+'Main/delete_all_notif',
            data:{},
            success:function(data)
            {
              $('#notif_count').html(0);
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
function alert_data(title,content,redirect){
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
                window.location = redirect
            }    
                
            
        });
  }
</script>

<style type="text/css">
  .boxme {
      background-color: rgb(255, 255, 255);
      border: 1px solid #F4F4F4;
      border-radius: 10px;
      box-shadow: 0 3px 15px 0 rgb(206 206 206 / 50%);
      padding: 1.25em;
      margin: 10px;
  }

  .iconclass{
    font-size: 50px;
  }

  .pdesign{
    font-size: 30px;
    background: white;
    
  }

  ul{
    list-style: none;
  }
</style>