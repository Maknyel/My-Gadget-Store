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
          <div style="height: 100px;"></div>
          


          <h1 data-aos="fade-up">How to loan?</h1>
          <ul>
            <li><h2 data-aos="fade-up" data-aos-delay="400">You must need valid IDs and another credential for loaning like payslip, electric bill and etc.</h2></li>
            <li><h2 data-aos="fade-up" data-aos-delay="400">Once your account is approved, you can apply for your item loaning and wait for the admin approval</h2></li>
            <li><h2 data-aos="fade-up" data-aos-delay="400">Once your loan item is approved, you can proceed to down payment, send your proof of payment and wait for admin approval</h2></li>
            <li><h2 data-aos="fade-up" data-aos-delay="400">Once your down payment is approved, the admin will give you the item or will deliver it to your current address</h2></li>
            <!-- <li><h2 data-aos="fade-up" data-aos-delay="400">Split the remaining balance into monthly installments</h2></li> -->
          </ul>
          
          
        </div>
        <div class="col-lg-6 hero-img" style="display:flex;align-items: center;" data-aos="zoom-out" data-aos-delay="200">
          <img src="<?=global_icon()?>" class="img-fluid" alt="">
        </div>
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

    <section id="infos" class="infos">

      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <p>What documents to bring?</p>
        </header>
        <div class="text-center">
          <ul>
            <li><i class="fa fa-check" aria-hidden="true"></i> You only need to bring at least 2 valid IDs</li>
            <li><i class="fa fa-check" aria-hidden="true"></i> At least 1 must be a primary ID</li>
            <li><i class="fa fa-check" aria-hidden="true"></i> At least 1 must contain your current address</li>
          </ul>
          <div class="row">
            <p class="pdesign">Primary IDs</p>
            <?php foreach (practice() as $value) { ?>
              <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="boxme">
                  <div class="boxcontent">
                    <div class="iconclass">
                      <i class="fa fa-id-card" aria-hidden="true"></i>
                    </div>
                    <div class="">
                      <?=$value?>
                    </div>  
                      
                  </div>
                </div>
              </div>
            <?php } ?>
              
          </div>
          <div class="row">
            <p class="pdesign">Secondary IDs</p>
            <?php foreach (practice1() as $value) { ?>
              <div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <div class="boxme1" style="text-align: left">
                  <div class="boxcontent">
                      <i class="fa fa-check" aria-hidden="true"></i>
                      <?=$value?>
                      
                  </div>
                </div>
              </div>
            <?php } ?>
              
          </div>

        </div>
      </div>
    </section>




  </main><!-- End #main -->
