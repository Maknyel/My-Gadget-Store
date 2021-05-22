
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-12 d-flex flex-column justify-content-center">
          <section id="portfolio" class="portfolio">

            <div class="container" data-aos="fade-up">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h1>Transactions - <?=isset($_GET['type'])?'History':'Pending'?></h1>
                  <ul class="nav nav-tabs">
                    <li class="<?=isset($_GET['type'])?'':'active'?>"><a data-toggle="tab" href="<?=base_url()?>manage">Pending</a></li>
                    <li class="<?=isset($_GET['type'])?'active':''?>"><a data-toggle="tab" href="<?=base_url()?>manage?type=history">History</a></li>
                  </ul>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php if(count(get_all_product_ordered((isset($_GET['type'])?'1':'0'))) == 0){ ?>
                          <h1>No Data Yet</h1>
                  <?php }?>
                  <?php if(count(get_all_product_ordered((isset($_GET['type'])?'1':'0'))) > 0){ ?>
                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                      <?php foreach(get_all_product_ordered((isset($_GET['type'])?'1':'0')) AS $key => $value){ ?>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                          <div class="portfolio-wrap">
                            <img src="<?=base_url()?>Product/<?=$value['image']?>" class="img-fluid" alt="">
                            <div class="portfolio-info">
                              <h4><?=$value['prod_name']?></h4>
                              <div class="portfolio-links">
                                <a href="<?=base_url()?>Product/<?=$value['image']?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?=$value['prod_name']?>"><i class="bi bi-plus"></i></a>
                                <?php if($value['is_approved'] == '1'){ ?>
                                  <a href="<?=base_url()?>manage_bill/<?=$value['apply_for_item_id']?>" title="More Details"><i class="bi bi-link"></i></a>
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                    </div>
                  <?php } ?>
      
                </div><!-- /.box-body -->
              </div>
              
            </div>

          </section><!-- End Portfolio Section -->
        </div>
      </div>
    </div>

  </section><!-- End Hero -->