<footer>
                    <div class="pull-right">
                      Sales and Inventory System <a href="#"></a>
                    </div>
                    <div class="clearfix"></div>
                  </footer>
                </div>
              </div>
            </body>

    <!-- <script src="<?=base_url()?>assets/admin/vendors/jquery/dist/jquery.min.js"></script> -->
    <script src="<?=base_url()?>assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/fastclick/lib/fastclick.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/nprogress/nprogress.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/iCheck/icheck.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?=base_url()?>assets/admin/build/js/custom.min.js"></script>
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>

   <script type="text/javascript">
    function myWindow(i,t,wid,hei) {
      var day= new Date();
      var id = day.getTime();
      var w = (window.width); 
      var h = (window.height); 
      var params = 'width='+(w-50)+',height='+(h-50)+',scrollbars,resizable';

      var message='<html><head><title>'+i+'</title></head><body><h3 aligh="center">'+
      '<div align="center"><img src="'+i+'" border="0" alt="'+t+'"><br>\
      '+
      '<hr width="100&#37;" size="1"><form><input type="button" onclick="javascript:window.close();" value="Close Window"><br>\
      '+
      '<hr width="100%" size="1"></form></div></body></html>\
      ';

      var mywin = open('',id,params);
      mywin.document.write(msg);
      mywin.document.close();
    }
  </script>
  <script>
    function on(id,type) {
      $('#overlay.classingshow'+id+type).removeClass('showme');
    }
    function off(id,type) {
          $('#overlay.classingshow'+id+type).addClass('showme');
    }
  </script>
  <style>
    *{
      box-sizing: border-box;
    }
    .column1{
      float: left;
      width: 33:33%;
      padding: 5px;
    }
    .row1 :: after{
    content: "";
    clear: both;
    display: table;
    }

       #overlay {
      position: fixed;
      display: block;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0,0,0,0.5);
      z-index: 2;
      cursor: pointer;
    }

    .texting{
      position: absolute;
      top: 50%;
      left: 50%;
      font-size: 50px;
      color: white;
      transform: translate(-50%,-50%);
      -ms-transform: translate(-50%,-50%);
    }

    #overlay.showme{
      display: none;
    }

    .x-panel{
      overflow: auto;
      width: 100%;
    }
 </style>