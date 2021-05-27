<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.1.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tui-image-editor@3.2.2/dist/tui-image-editor.css">
<link rel="stylesheet" href="https://uicdn.toast.com/tui-color-picker/latest/tui-color-picker.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/third_party/image_tui.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.1.0/js/froala_editor.pkgd.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.6.7/fabric.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tui-code-snippet@1.4.0/dist/tui-code-snippet.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tui-image-editor@3.2.2/dist/tui-image-editor.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/third_party/image_tui.min.js"></script>

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
              <label>Message:</label>
              <textarea value="" class="form-control" name="message" id="message"></textarea>
              <script type="text/javascript">
                new FroalaEditor('#apply_form textarea#message', {
                  imageUploadURL: base_url+'Admin/upload_image',
                });
              </script>
            </div>
            <div class="body"></div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-block btn-flat" id="apply_button" default="">Submit</button>
            <button type="button" class="btn btn-default" onclick="modal_function_hide()">Close</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
<script type="text/javascript">
  function show_product(pending_item_id,date_added,message){
    var html = '<p>Message: '+message+'</p>';
    html += '<p>Status: Wait for admin response</p>';
    html += '<p>Date Added: '+date_added+'</p>';
    Swal.fire({
    allowOutsideClick: false,
      html: html,
      title: '',
      icon: 'info',
      confirmButtonText: 'OK',
    })
  }

  $(document).ready( function () {
    $('.modal-new-design').hide();
  } );

  $(document).on('submit', '#apply_form', function(event){
          event.preventDefault();
          $('#apply_form #apply_button').attr('disabled',true);
          dataString = $('#apply_form').serialize();
          if($('.modal-new-design #message').val() == ''){
            alert_data('Error',"Please insert message");
            $('#apply_form #apply_button').attr('disabled',false);
          }else{
              $.ajax({
                type:'POST',
                dataType:'JSON',
                url:`<?=base_url()?>`+'Main/add_pending',
                data:dataString,
                success:function(data)
                {
                  if(data == 1){
                      $('.modal-new-design').hide();
                      var basedata = base_url+'manage?type=pending_item';
                      alert_data('Success',"Please Wait for the approval",basedata);
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
            
            
          }
            
        
    });

  function modal_function_show(){
    $('.modal-new-design').show();
  }

  function modal_function_hide(){
    $('.modal-new-design').hide();
  }
</script>

<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-12 d-flex flex-column justify-content-center">
          <section id="portfolio" class="portfolio">

            <div class="container" data-aos="fade-up">
              <div class="box box-primary">
                <div class="" style="width: 100%;text-align: right;">
                  <?php if(get_user_pending_item() == 0){ ?>
                    <?php if(apply_count_id_user_id(client_session_val()) == 0){ ?>
                      <a href="#" class="btn btn-info" onclick="modal_function_show();">Add</a>
                    <?php } ?>
                  <?php } ?>
                </div>
                <div class="box-header with-border">
                  <?php
                    $manage_data = "";
                    if(isset($_GET['type'])){
                      switch ($_GET['type']) {
                        case 'history':
                          $manage_data = "History";
                        break;
                        case 'for_payment':
                          $manage_data = "For Payment";
                        break;
                        case 'pending_item':
                          $manage_data = "Pending Item";
                        break;
                        
                        default:
                        break;
                      
                      }
                    }else{
                      $manage_data = 'Pending';
                    }
                  ?>
                  <h1>Transactions - <?=$manage_data?></h1>
                  <ul class="nav nav-tabs">
                    <li class="<?=isset($_GET['type'])?(($_GET['type'] == 'history')?'active':''):''?>"><a data-toggle="tab" href="<?=base_url()?>manage?type=history">History</a></li>
                    <li class="<?=isset($_GET['type'])?'':'active'?>"><a data-toggle="tab" href="<?=base_url()?>manage">Pending</a></li>
                    <li class="<?=isset($_GET['type'])?(($_GET['type'] == 'for_payment')?'active':''):''?>"><a data-toggle="tab" href="<?=base_url()?>manage?type=for_payment">For Payment</a></li>
                    <li class="<?=isset($_GET['type'])?(($_GET['type'] == 'pending_item')?'active':''):''?>"><a data-toggle="tab" href="<?=base_url()?>manage?type=pending_item">Pending Item</a></li>
                  </ul>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php if(!isset($_GET['type'])){ ?>
                    <?php if(count(get_all_product_ordered(0)) == 0){ ?>
                              <h1>No Data Yet</h1>
                      <?php } ?>
                      <?php if(count(get_all_product_ordered(0)) > 0){ ?>
                        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                          <?php foreach(get_all_product_ordered(0) AS $key => $value){ ?>
                            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                              <div class="portfolio-wrap">
                                <img src="<?=base_url()?>pending_upload/<?=$value['pending_item_id']?>/<?=$value['image_name']?>" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                  <h4><?=$value['item_name']?></h4>
                                  <div class="portfolio-links">
                                    <a href="<?=base_url()?>pending_upload/<?=$value['pending_item_id']?>/<?=$value['image_name']?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?=$value['item_name']?>"><i class="bi bi-plus"></i></a>
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
                  <?php }else{ ?>
                      <?php if($_GET['type'] == 'history'){ ?>
                        <?php if(count(get_all_product_ordered(1)) == 0){ ?>
                              <h1>No Data Yet</h1>
                        <?php } ?>
                        <?php if(count(get_all_product_ordered(1)) > 0){ ?>
                          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                            <?php foreach(get_all_product_ordered(1) AS $key => $value){ ?>
                              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                <div class="portfolio-wrap">
                                  <img src="<?=base_url()?>pending_upload/<?=$value['pending_item_id']?>/<?=$value['image_name']?>" class="img-fluid" alt="">
                                  <div class="portfolio-info">
                                    <h4><?=$value['item_name']?></h4>
                                    <div class="portfolio-links">
                                      <a href="<?=base_url()?>pending_upload/<?=$value['pending_item_id']?>/<?=$value['image_name']?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?=$value['item_name']?>"><i class="bi bi-plus"></i></a>
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
                      <?php }else if($_GET['type'] == 'for_payment'){ ?>
                        <?php if(count(get_all_product_ordered_admin(2)) == 0){ ?>
                              <h1>No Data Yet</h1>
                        <?php } ?>
                        <?php if(count(get_all_product_ordered_admin(2)) > 0){ ?>
                          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                            <?php foreach(get_all_product_ordered_admin(2) AS $key => $value){ ?>
                              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                <div class="portfolio-wrap">
                                  <?php if($value['image_name'] != ''){ ?>  
                                    <img src="<?=base_url()?>pending_upload/<?=$value['pending_item_id']?>/<?=$value['image_name']?>" class="img-fluid" alt="">
                                  <?php } ?>
                                  <div class="portfolio-info">
                                    <h4><?=$value['item_name']?></h4>
                                    <div class="portfolio-links">
                                      <?php if($value['image_name'] != ''){ ?>
                                        <a href="<?=base_url()?>pending_upload/<?=$value['pending_item_id']?>/<?=$value['image_name']?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?=$value['item_name']?>"><i class="bi bi-plus"></i></a>
                                        <a href="#" onclick="sweetalert_modal(`<?=$value['pending_item_id']?>`,`<?=$value['item_price']?>`,`<?=$value['min_downpayment']?>`,<?=$value['pending_item_id']?>)" title="More Details"><i class="bi bi-link"></i></a>
                                      <?php } ?>  
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php } ?>
                          </div>
                        <?php } ?>
                        <?php }else if($_GET['type'] == 'pending_item'){ ?>
                        <?php if(count(get_all_product_ordered_admin(0)) == 0){ ?>
                              <h1>No Data Yet</h1>
                        <?php } ?>
                        <?php if(count(get_all_product_ordered_admin(0)) > 0){ ?>
                          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                            <?php foreach(get_all_product_ordered_admin(0) AS $key => $value){ ?>
                              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                <div class="portfolio-wrap"> 
                                    <img src="<?=global_icon()?>" class="img-fluid" alt="">
                                  <div class="portfolio-info">
                                    <h4><?=$value['item_name']?></h4>
                                    <div class="portfolio-links">
                                        <a href="#" onclick="show_product(`<?=$value['pending_item_id']?>`,`<?=$value['date_added']?>`,`<?=$value['message']?>`);" title="<?=$value['item_name']?>"><i class="bi bi-plus"></i></a>
                                        
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php } ?>
                          </div>
                        <?php } ?>
                      <?php } ?>
                  <?php } ?>
                      
      
                </div><!-- /.box-body -->
              </div>
              
            </div>

          </section><!-- End Portfolio Section -->
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <script type="text/javascript">
    function sweetalert_modal(pending_item_id,item_price,min_downpayment,pending_item_id){
      Swal.fire({
        allowOutsideClick: false,
        title: 'Apply',
        html: `
        <form style="display:none" id="uploadForm" method="POST" enctype="multipart/form-data">
                        <input type="file" name ="file" id="file" accept="image/*">
                    </form>
              <form id="apply_form2">
                <div class="modal-body">
                  <div class="form-group">
                    <label class="">Upload Image</label>
                    
                      <img src="" id="img_only" height="auto" width="100%">
                      <div style="text-align: center;width:100%;">
                        <button type="button" class="btn btn-primary" onclick="upload_file()">Upload Image</button>
                      </div>
                  </div>
                  <div class="form-group">
                    <label>Total Payment:</label>
                    <input type="text" value="" class="form-control" name="total_payment" id="total_payment" required="" readonly="">
                    <input type="hidden" name="proof_image" id="proof_image">
                    <input type="hidden" name="pending_item_id" id="pending_item_id">
                  </div>
                  <div class="form-group">
                    <label>Downpayment:</label>
                    <input type="number" max="" value="0" class="form-control" name="downpayment" id="downpayment" required="">
                    <input type="hidden" value="" class="form-control" name="product_id" id="product_id" required="">
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
              </form>
        `,
        confirmButtonText: 'Submit',
        focusConfirm: false,
        preConfirm: () => {
          const total_payment = $('#apply_form2 #total_payment').val()
          const proof_image = $('#apply_form2 #proof_image').val()

          const downpayment = $('#apply_form2 #downpayment').val()
          const product_id = $('#apply_form2 #product_id').val()

          const message = $('#apply_form2 #message').val()
          const total_months = $('#apply_form2 #total_months').val()
          const pending_item_id = $('#apply_form2 #pending_item_id').val()

          const per_month_bill = $('#apply_form2 #per_month_bill').val()
          if (!total_payment) {
            Swal.showValidationMessage(`Please enter total payment`);
          }
          else if (!proof_image) {
            Swal.showValidationMessage(`Please enter proof image`);
          }

          else if (!downpayment) {
            Swal.showValidationMessage(`Please enter Downpayment`);
          }

          else if (!product_id) {
            Swal.showValidationMessage(`Please enter product_id`);
          }

          // else if (!message) {
          //   Swal.showValidationMessage(`Please enter message`);
          // }

          else if (!per_month_bill) {
            Swal.showValidationMessage(`Please enter per month bill`);
          }          
          return { 'total_payment': total_payment, 'proof_image': proof_image, 'downpayment':downpayment, 'product_id':product_id, 'message':message,'per_month_bill':per_month_bill }
        }
      }).then((result) => {
        dataString = $('#apply_form2').serialize();
          var data2 = dataString;
        $.ajax({
              type:'POST',
              dataType:'JSON',
              url:`<?=base_url()?>`+'Main/apply_form',
              data:data2,
              success:function(data)
              {
                if(data == 1){
                    $('.modal-new-design').hide();
                    var basedata = base_url+'manage?type=for_payment';
                    alert_data('Success',"Please Wait for the email approval",basedata);
                }else{
                  $('#apply_form #apply_button').attr('disabled',false);
                  // alert_data('Error',"Invalid Request");
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
      })

      $('#apply_form2 #product_id').val(pending_item_id);
      $('#apply_form2 #total_payment').val(item_price);
      $('#apply_form2 #downpayment').attr('min',min_downpayment);
      $('#apply_form2 #downpayment').val(min_downpayment);
      $('#apply_form2 #downpayment').attr('max',item_price);
      $('#apply_form2 #pending_item_id').val(pending_item_id);
      
      payment_per_month();
      
    }

    $(document).on('change keyup','#apply_form2 #downpayment', function(){
      payment_per_month();
    });

    $(document).on('change keyup','#apply_form2 #total_months', function(){
      payment_per_month();
    });

    function payment_per_month(){
      var prod_total = $('#apply_form2 #total_payment').val();
      var todivide = $('#apply_form2 #total_payment').val() - $('#apply_form2 #downpayment').val();
      var interest = todivide + (todivide * ($('#apply_form2 #total_months').val()/100));
      var toreturn = interest/$('#apply_form2 #total_months').val();
      $('#per_month_bill').val(toreturn); 
      if(parseFloat(prod_total) < parseFloat($('#apply_form2 #downpayment').val())){
        $('#apply_form2 #downpayment').val(0);
        payment_per_month();
      }
    }

    function upload_file(){
      $('#file').click();
    };
    $(document).on('change','#file', function(){

          upload();
    });

    function upload(){
        var form = $('#uploadForm')[0];

        // Create an FormData object
        var dataString = new FormData(form);

        // alert(dataString);
            var uploadtracing = $('#uploadForm');
            $.ajax({
              type:'POST',
              dataType: "json",
              data: dataString,
              enctype: 'multipart/form-data',
              processData: false,
              contentType: false,
              cache: false,
              // timeout: 600000,
              url: base_url+"Main/upload_bill_testing/"+$('#apply_form2 #product_id').val(),
              beforeSubmit: function(data){
               
              },
              uploadProgress: function (event, position, total, progress){
              },
              success: function(data){
                  if(data.status !== 'success'){

                    if (data.msg == "<p>The filetype you are attempting to upload is not allowed.</p>") {
                        var pop_msg = "<p>"+'Invalid file type upload files in PDF, or mp4 format only'+"</p>";
                    }else{
                        var pop_msg = data.msg;
                    }

                    alert_data('Error',pop_msg);


                } else {
                  $('#apply_form2 #img_only').attr('src',data['path']);
                    $('#apply_form2 #proof_image').val(data['file_data']);
                }

              },
              resetForm: true
            });

    }
  </script>