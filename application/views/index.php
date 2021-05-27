  <?php if(client_session_val()){ ?>
    <?php if(user_info_count() == 0){ ?>
      <div style="position: fixed;bottom:0vh;width: 100vw;z-index: 99999999; margin-bottom: 0px;" class="alert alert-warning">
          <strong>Warning!</strong> Please complete your information. <a href="<?=base_url()?>profile?type=info">Click me</a>
      </div>
    <?php } ?>
  <?php } ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">How to loan?</h1>
          <ul>
            <li><h2 data-aos="fade-up" data-aos-delay="400">You must need valid IDs and another credential for loaning like payslip, meralco bill and etc.</h2></li>
            <li><h2 data-aos="fade-up" data-aos-delay="400">Once your account is approved, you can choose between our available items. You can note your specific items in terms of specs like color, sizes and etc.</h2></li>
          </ul>
          
          
        </div>
        <!-- <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200"> -->
          <!-- <img src="<?=base_url()?>assets/user_template/img/hero-img.png" class="img-fluid" alt=""> -->
        <!-- </div> -->
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
 







    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <p>List of Brands</p>
        </header>

        <!-- <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div> -->

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <?php foreach(get_all_product() AS $key => $value){ ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="<?=base_url()?>Product/<?=$value['image']?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?=$value['prod_name']?></h4>
                  <div class="portfolio-links">
                    <a href="<?=base_url()?>Product/<?=$value['image']?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?=$value['prod_name']?>"><i class="bi bi-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>



        </div>

      </div>

    </section><!-- End Portfolio Section -->




  </main><!-- End #main -->
