
<!-- Modal -->
  <div class="modal-new-design">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <form id="apply_form">
          <div class="modal-header">
            <h4 class="modal-title">Apply</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Total Payment:</label>
              <input type="text" value="<?=$view_table['prod_price']?>" class="form-control" name="total_payment" id="total_payment" required="" readonly="">
            </div>
            <div class="form-group">
              <label>Downpayment:</label>
              <input type="number" max="<?=$view_table['prod_price']?>" min="0" max="<?=$view_table['prod_price']?>" value="0" class="form-control" name="downpayment" id="downpayment" required="">
              <input type="hidden" value="<?=$view_table['prod_id']?>" class="form-control" name="product_id" id="product_id" required="">
            </div>
            <div class="form-group">
              <label>Message:</label>
              <textarea class="form-control" name="message" id="message" required=""></textarea>
            </div>
            <div class="form-group">
              <label>Total Months:</label>
              <select class="form-control" name="total_months" id="total_months" required="">
                <option>3</option>
                <option>6</option>
                <option>9</option>
                <option>12</option>
              </select>                
            </div>

            <div class="form-group">
              <label>Per Month Bill:</label>
              <input type="text" class="form-control" name="per_month_bill" id="per_month_bill" required="" readonly="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-block btn-flat" id="apply_button" default="">Submit</button>
            <button type="button" class="btn btn-default" onclick="modal_function_hide()">Close</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up"><p><?=$view_table['prod_name']?></p></h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Price: ₱<?=$view_table['prod_price']?></h2>
          <?php if(client_session_val()){ ?>
            <?php if(apply_count() == 0){ ?>
                <?php if(get_user_additional_info_field(client_session_val(),'is_verified') == 1){ ?>
                  <?php if(apply_count_id_user_id(client_session_val()) == 0){ ?>
                    <h2 data-aos="fade-up" data-aos-delay="400"><button onclick="modal_function_show();" class="btn btn-primary" >Apply</button></h2>
                  <?php } ?>
                <?php } ?>
            <?php } ?>
          <?php } ?>
          <!-- <h2 data-aos="fade-up" data-aos-delay="400"><?=computefor_house($view_table['prod_price'],1,3)?></h2> -->
          
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="<?=base_url()?>product/<?=$view_table['image']?>" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
 







    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <h2 data-aos="fade-up" data-aos-delay="400"><?=$view_table['prod_desc']?></h2>

        

      </div>

    </section><!-- End Portfolio Section -->




  </main><!-- End #main -->


<script type="text/javascript">
    $(document).on('submit', '#apply_form', function(event){
          event.preventDefault();
          $('#apply_form #apply_button').attr('disabled',true);
          dataString = $('#apply_form').serialize();
          var data = dataString;
          // alert(JSON.stringify(data));
            $.ajax({
              type:'POST',
              dataType:'JSON',
              url:`<?=base_url()?>`+'Main/apply_form',
              data:data,
              success:function(data)
              {
                if(data == 1){
                    $('.modal-new-design').hide();
                    var basedata = base_url+'view/<?=$view_table['prod_id']?>';
                    alert_data('Success',"Please Wait for the email approval",basedata);
                }else{
                  $('#apply_form #apply_button').attr('disabled',false);
                  alert_data('Error',"Invalid Request");
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
    $(document).on('change keyup','#apply_form #downpayment', function(){
      payment_per_month();
    });

    $(document).on('change keyup','#apply_form #total_months', function(){
      payment_per_month();
    });

    function payment_per_month(){
      var prod_total = `<?=$view_table['prod_price']?>`;
      var todivide = `<?=$view_table['prod_price']?>` - $('#apply_form #downpayment').val();
      var interest = todivide + (todivide * .13);
      var toreturn = interest/$('#apply_form #total_months').val();
      $('#per_month_bill').val(toreturn); 
      if(parseFloat(prod_total) < parseFloat($('#apply_form #downpayment').val())){
        $('#apply_form #downpayment').val(0);
        payment_per_month();
      }
    }
    $( document ).ready(function() {
        $('.modal-new-design').hide();
        payment_per_month();
    });

    function modal_function_show(){
      $('.modal-new-design').show();
    }

    function modal_function_hide(){
      $('.modal-new-design').hide();
    }
</script>