<script type="text/javascript">
  function change_approve(pending_item_id){
    $('#pending_item_id').val(pending_item_id);
  }
  $(document).ready( function () {
    $('.modal-new-design').hide();
  } );

  $(document).on('submit', '#apply_form', function(event){
          event.preventDefault();
          $('#apply_form #apply_button').attr('disabled',true);
          dataString = $('#apply_form').serialize();
          if($('.modal-new-design #image_name').val() == ''){
            alert_data('Error',"Please upload picture");
            $('#apply_form #apply_button').attr('disabled',false);
          }else{
              $.ajax({
                type:'POST',
                dataType:'JSON',
                url:`<?=base_url()?>`+'Admin/update_pending_image',
                data:dataString,
                success:function(data)
                {
                  if(data == 1){
                      $('.modal-new-design').hide();
                      var basedata = base_url+'admin/pending_application';
                      alert_data('Success',"Successfully approved",basedata);
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

    function upload_file(){
      $('#file').click();
    };
    $(document).on('change','#file', function(){

          upload();
    });

    function upload(){
        var form = $('#uploadForm')[0];
        var dataString = new FormData(form);
            var uploadtracing = $('#uploadForm');
            var pending_item_id = $('.modal-new-design #pending_item_id').val();
            $.ajax({
              type:'POST',
              dataType: "json",
              data: dataString,
              enctype: 'multipart/form-data',
              processData: false,
              contentType: false,
              cache: false,
              url: base_url+"Main/upload_bill_file/"+pending_item_id,
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
                  $('.modal-new-design #img_only').attr('src',data['path']);
                    $('.modal-new-design #image_name').val(data['file_data']);
                }
              },
              resetForm: true
            });

    }
</script>
<div class="modal-new-design">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <form style="display:none" id="uploadForm" method="POST" enctype="multipart/form-data">
          <input type="file" name ="file" id="file" accept="image/*">
        </form>
        <form id="apply_form">
          <div class="modal-header">
            <h4 class="modal-title">Apply</h4>
          </div>
          <div class="modal-body" style="height: 100vh;overflow: auto;">
            <div class="form-group">
              <label>Item Name:</label>
              <input type="text" class="form-control" name="item_name" id="item_name">
              <input type="hidden" name="pending_item_id" id="pending_item_id">
            </div>

            <div class="form-group">
              <label>Item Description:</label>
              <input type="text" class="form-control" name="item_description" id="item_description">              
            </div>

            <div class="form-group">
              <label>Item Price:</label>
              <input type="text" class="form-control" name="item_price" id="item_price">              
            </div>

            <div class="form-group">
              <label>Image:</label>
                <img src="" id="img_only" height="auto" width="100%">
                <div style="text-align: center;width:100%;">
                  <button type="button" class="btn btn-primary" onclick="upload_file()">Upload Image</button>
                </div>
              <input type="hidden" class="form-control" name="image_name" id="image_name">              
            </div>


            <div class="body"></div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="apply_button" default="">Submit</button>
            <button type="button" class="btn btn-default" onclick="modal_function_hide()">Close</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
          <div class="right_col" role="main"> 
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">         
                <div class = "x-panel">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Item Name</th>
                        <th>Item Description</th>
                        <th>Item Price</th>
                        <th>Downpayment</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach (get_all_application_v2() as $key => $row) { ?>
                      <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['item_name'];?></td>
                        <td><?php echo $row['item_description'];?></td>
                        <td><?php echo $row['item_price'];?></td>
                        <td><?php echo $row['min_downpayment'];?></td>        
                        <td><?php echo $row['message'];?></td>
                        <td>
                          <?php
                            $datareturn = array(
                              '0'               => 'Pending for Approval',
                              '1'               => 'Approved',
                              '2'               => 'Waiting for Approval (insert)',
                            );
                            echo $datareturn[$row['is_verified']];
                          ?>
                            
                        </td>
                        <td>
                          <?php if($row['image_name'] != ''){ ?>
                            <img height="auto" onclick="window.open(`<?=base_url()?>pending_upload/<?=$row['pending_item_id']?>/<?=$row['image_name']?>`, 'hello', 'width=100%,height=auto');" width="100%" src="<?=base_url()?>pending_upload/<?=$row['pending_item_id']?>/<?=$row['image_name']?>">
                          <?php }else{ ?>
                            No Image Uploaded
                          <?php } ?>
                        </td>
                        <td>
                          <?php if($row['is_verified'] == '0'){ ?>
                            <button onclick="change_approve(`<?=$row['pending_item_id']?>`);modal_function_show();" href="#" class="btn btn-success btn-sm">Approve</button>
                          <?php } ?>
                        </td>
                      </tr>
                   
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div> 



        <script type="text/javascript">
          $(document).ready( function () {
            $('#example1').DataTable();
          } );
        </script>


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