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
            <li><h2 data-aos="fade-up" data-aos-delay="400">You must need valid IDs and another crrdiantial for loaning like payslip, meralco bill and etc.</h2></li>
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
          <p>List of Products</p>
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
                    <a href="<?=base_url()?>view/<?=$value['prod_id']?>" title="More Details"><i class="bi bi-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>



        </div>

      </div>

    </section><!-- End Portfolio Section -->




    <!-- ======= Recent Blog Posts Section ======= -->
    <!-- <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Blog</h2>
          <p>Recent posts form our Blog</p>
        </header>

        <div class="row">

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="<?=base_url()?>assets/user_template/img/blog/blog-1.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Tue, September 15</span>
              <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit</h3>
              <a href="blog-singe.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="<?=base_url()?>assets/user_template/img/blog/blog-2.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Fri, August 28</span>
              <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
              <a href="blog-singe.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="<?=base_url()?>assets/user_template/img/blog/blog-3.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Mon, July 11</span>
              <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
              <a href="blog-singe.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

        </div>

      </div>

    </section> --><!-- End Recent Blog Posts Section -->


  </main><!-- End #main -->
