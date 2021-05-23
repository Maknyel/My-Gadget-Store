          <div class="right_col" role="main"> 
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">         
                <div class = "x-panel">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Product</th>
                        <th>Total Payment</th>
                        <th>Downpayment</th>
                        <th>Months</th>
                        <th>Bills Per Month</th>
                        <th>Status</th>
                        <th>Message</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach (get_all_application() as $key => $row) { ?>
                      <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['prod_name'];?></td>
                        <td><?php echo $row['total_payment'];?></td>
                        <td><?php echo $row['downpayment'];?></td>
                        <td><?php echo $row['total_months'];?></td>          
                        <td><?php echo $row['per_month_bill'];?></td>
                        <td><?php echo $row['message'];?></td>
                        <td><?php echo ($row['is_approved'] == '1')?'Approved':'Pending';?></td>
                        <td>
                          <!-- <a href="#updateordinance<?php echo $row['cust_id'];?>" data-target="#updateordinance<?php echo $row['cust_id'];?>" data-toggle="modal" class="small-box-footer"><i class="glyphicon glyphicon-edit text-orange"></i></a> -->
                          <?php if($row['is_approved'] == '0'){ ?>
                            <a href="<?=base_url()?>Admin/approve?id=<?php echo $row['apply_for_item_id'];?>&email=<?php echo $row['email'];?>&name=<?php echo $row['name'];?>" class="btn btn-success">Approve</a>
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