<div class="right_col" role="main"> 
  <div class="row">
      <!-- <div class="modal-new-design">
          <div class="modal-dialog">
          
            <div class="modal-content">
              
                <form style="display:none" id="uploadForm" method="POST" enctype="multipart/form-data">
                              <input type="file" name ="file" id="file" accept="image/*">
                          </form>
              <form id="apply_form">
                <div class="modal-header">
                  <h4 class="modal-title">Pay Bill</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label class="">Upload Image</label>
                    
                      <img src="" id="img_only" height="auto" width="100%">
                      <div style="text-align: center;width:100%;">
                        <button type="button" class="btn btn-primary" id="upload_file">Upload Image</button>
                      </div>
                  </div>
                  <div class="form-group">
                    <label>Amount:</label>
                    <input type="number" min="0" value="0" class="form-control" name="downpayment" id="downpayment" required="">
                    <input type="hidden" class="form-control" name="apply_for_item_computation" id="apply_for_item_computation" required="">
                    <input type="hidden" name="image" id="image">
                    <input type="hidden" name="apply_for_item_id" id="apply_for_item_id" value="<?=$id?>">
                    <input type="hidden" name="computation" id="computation">
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-block btn-flat" id="apply_button" default="">Submit</button>
                  <button type="button" class="btn btn-default" onclick="modal_function_hide()">Close</button>
                </div>
              </form>
            </div>
            
          </div>
        </div> -->

      <section id="hero"  style="overflow: auto;width: 100%;">

          <div class="container">
            <div class="row">
              <div class="col-lg-12 d-flex flex-column justify-content-center">
                <section id="portfolio" class="portfolio">

                  <div class="container" data-aos="fade-up">
                    <div class="row">
                      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 col-12">
                        <div class="box2 box-primary">
                          <div class="box-header with-border">
                            <h1>Transactions - <?=$manage['item_name']?></h1>
                            
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            <table class="table table-bordered" id="table_id">
                              <thead>  
                                <tr>
                                  <th>Date Must Pay</th>
                                  <th>Amount</th>
                                  <th>Proof</th>
                                  <th>Amount Payed</th>
                                  <th>Date Payed</th>
                                  <th>Status</th>
                                  <th>Option</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($get_data as $key => $value) { ?>
                                  <tr>
                                    <td><?=$value['datetime_expected_to_pay']?></td>
                                    <td>₱<?=$value['computation']?></td>
                                    <td><?php if($value['proof_image'] != ''){ ?><img onclick="window.open(`<?=base_url()?>Bill/<?=$value['apply_for_item_computation']?>/<?=$value['proof_image']?>`, 'hello', 'width=100%,height=auto');" src="<?=base_url()?>Bill/<?=$value['apply_for_item_computation']?>/<?=$value['proof_image']?>" width="50px" height="auto"><?php } ?></td>
                                    <td><?=($value['amount_payed'] != '')?'₱'.$value['amount_payed']:''?></td>
                                    <td><?=$value['datetime_pay']?></td>
                                    <td><?=($value['is_payed'] == '1')?'Paid':(($value['is_payed'] == '2')?'Waiting to confirm':'Pending')?></td>
                                    <td>
                                      <?php if($value['is_payed'] == 2){ ?>
                                        <a href="#" class="btn btn-success" onclick="confirm_function(`<?=$value['apply_for_item_computation']?>`,`<?=$value['apply_for_item_id']?>`);">Confirm</a>
                                      <?php } ?>
                                    </td>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                
                          </div><!-- /.box-body -->
                        </div>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12">
                        <div class="box2 box-primary">
                          <div class="box-header with-border">
                            <h3>Transactions info</h3>
                            <p><b>Product Name: </b><?=$manage['item_name']?></p>
                            <p><b>Downpayment: </b>₱<?=$manage['downpayment']?></p>
                            <p><b>Product Total Price: ₱</b><?=$manage['total_payment']?></p>
                            <p><b>Bill Per month: </b>₱<?=$manage['per_month_bill']?></p>
                            <p><b>Date Avail: </b><?=$manage['date_added']?></p>
                            <p><b>Status: </b><?=($manage['is_ok'] == '1')?'Finished':'Pending'?></p>
                            <p><b>Balance: </b>
                            <?php 
                              $bal = 0;
                              foreach ($get_data as $key => $value) {
                                if($value['is_payed'] != 1){  
                                  $bal = $bal + $value['computation'];
                                }
                              }
                              echo $bal;
                            ?>
                          </p>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </section><!-- End Portfolio Section -->
              </div>
            </div>
          </div>

        </section><!-- End Hero -->

        <script type="text/javascript">
          function confirm_function(apply_for_item_computation,apply_for_item_id){
            if(confirm("Are you sure you want to confirm this bill?")){
                $.ajax({
                    type:'POST',
                    dataType:'JSON',
                    url:`<?=base_url()?>`+'Admin/confirm_bill',
                    data:{'apply_for_item_computation':apply_for_item_computation,'apply_for_item_id':apply_for_item_id},
                    success:function(data)
                    {
                      if(data == 1){
                          var basedata = base_url+'report/<?=$id?>';
                          alert_data('Success',"Bill Approved",basedata);
                      }else{
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
          }
          function upload_file(apply_for_item_computation,computation){
            // $('#apply_form #downpayment').attr('min',computation);
            $('#apply_form #computation').val(computation);
            $('#apply_form #apply_for_item_computation').val(apply_for_item_computation);
          }

          $(document).on('submit', '#apply_form', function(event){
                event.preventDefault();
                $('#apply_form #apply_button').attr('disabled',true);
                dataString = $('#apply_form').serialize();
                var data = dataString;
                // alert(JSON.stringify(data));
                if($('.modal-new-design #image').val(data['file_data']) == ''){
                  alert_data('Error',"Please Upload Image");
                }else{
                  $.ajax({
                    type:'POST',
                    dataType:'JSON',
                    url:`<?=base_url()?>`+'Main/bill_form',
                    data:data,
                    success:function(data)
                    {
                      if(data == 1){
                          $('.modal-new-design').hide();
                          var basedata = base_url+'manage_bill/<?=$id?>';
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
                }
                  
              
          });

          $(document).ready( function () {
            $('#table_id').DataTable();
            $('.modal-new-design').hide();
          } );
          function modal_function_show(){
            $('.modal-new-design').show();
          }

          function modal_function_hide(){
            $('.modal-new-design').hide();
          }
        </script>
  </div>
</div>



<style type="text/css">
  .box2.box-primary {
    border-top-color: #2db8eb;
  }

  .box2 {
      position: relative;
      border-radius: 3px;
      background: #ffffff;
      border-top: 3px solid #d2d6de;
      margin-bottom: 20px;
      width: 100%;
      box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
  }

  .box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
  }

  .box-header {
      color: #444;
      display: block;
      padding: 10px;
      position: relative;
  }

  .modal-new-design{
        position: fixed;
    height: 100vh;
    width: 100vw;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #00000047;
  }

  .modal-new-design .modal-dialog{
    width: 80vw;
    max-width: 1000px;
  }
</style>