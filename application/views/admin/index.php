	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


<div class="right_col" role="main"> 
	<div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-12">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                  </div><!-- /.col -->
                  
                </div><!-- /.row -->
              </div>
  <div class="row">
  	<div class="col-xl-2 col-lg-2 col-md-4 col-6 col-xs-6 col-sm-6 col-xs-6">
	  	<div class="small-box bg-red">
	        <div class="inner">
	            <h3 id="employer_total_count"><?=count_dashboard_all('customer')?></h3>
	            <p>
	                Customer
	            </p>
	        </div>
	        <div class="icon">
	            <!-- <i class="fa fa-users"></i> -->
	        </div>
	        <a href="<?=base_url()?>admin/user" class="small-box-footer">
	            More info <i class="fa fa-arrow-circle-right"></i>
	        </a>
	    </div>
	</div>
	<div class="col-xl-2 col-lg-2 col-md-4 col-6 col-xs-6 col-sm-6 col-xs-6">
	  	<div class="small-box bg-white">
	        <div class="inner">
	            <h3 id="employer_total_count"><?=count_dashboard_all('verified')?></h3>
	            <p>
	                Verified Customer
	            </p>
	        </div>
	        <div class="icon">
	            <!-- <i class="fa fa-users"></i> -->
	        </div>
	        <a href="<?=base_url()?>admin/user" class="small-box-footer">
	            More info <i class="fa fa-arrow-circle-right"></i>
	        </a>
	    </div>
	</div>
	<div class="col-xl-2 col-lg-2 col-md-4 col-6 col-xs-6 col-sm-6 col-xs-6">
	  	<div class="small-box bg-blue">
	        <div class="inner">
	            <h3 id="employer_total_count"><?=count_dashboard_all('pending')?></h3>
	            <p>
	                Pending Customer
	            </p>
	        </div>
	        <div class="icon">
	            <!-- <i class="fa fa-users"></i> -->
	        </div>
	        <a href="<?=base_url()?>admin/user" class="small-box-footer">
	            More info <i class="fa fa-arrow-circle-right"></i>
	        </a>
	    </div>
	</div>
	<div class="col-xl-2 col-lg-2 col-md-4 col-6 col-xs-6 col-sm-6 col-xs-6">
	    <div class="small-box bg-green">
	        <div class="inner">
	            <h3 id="employer_total_count"><?=count_dashboard_all('product')?></h3>
	            <p>
	                Product
	            </p>
	        </div>
	        <div class="icon">
	            <!-- <i class="fa fa-users"></i> -->
	        </div>
	        <a href="<?=base_url()?>admin/branch" class="small-box-footer">
	            More info <i class="fa fa-arrow-circle-right"></i>
	        </a>
	    </div>
	</div>

	<div class="col-xl-2 col-lg-2 col-md-4 col-6 col-xs-6 col-sm-6 col-xs-6">
	    <div class="small-box bg-orange">
	        <div class="inner">
	            <h3 id="employer_total_count"><?=count_dashboard_all('pending_product')?></h3>
	            <p>
	                Pending Applications
	            </p>
	        </div>
	        <div class="icon">
	            <!-- <i class="fa fa-users"></i> -->
	        </div>
	        <a href="<?=base_url()?>admin/application" class="small-box-footer">
	            More info <i class="fa fa-arrow-circle-right"></i>
	        </a>
	    </div>
	</div>

	<div class="col-xl-2 col-lg-2 col-md-4 col-6 col-xs-6 col-sm-6 col-xs-6">
	    <div class="small-box bg-purple">
	        <div class="inner">
	            <h3 id="employer_total_count"><?=count_dashboard_all('pending_product_payment')?></h3>
	            <p>
	                Pending Payment
	            </p>
	        </div>
	        <div class="icon">
	            <!-- <i class="fa fa-users"></i> -->
	        </div>
	        <a href="<?=base_url()?>admin/application" class="small-box-footer">
	            More info <i class="fa fa-arrow-circle-right"></i>
	        </a>
	    </div>
	</div>

  </div>
  <div class="container-fluid">
  	<div class="box2 box-primary">
  		<div class="box-header with-border">
	        <h1>Product Sold</h1>
	        
	    </div><!-- /.box-header -->
	    <div class="box-body">
  			<div id="myChartLastYear" class="text-center"></div>
  		</div>
  	</div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){	
		$.ajax({
			type : 'POST',
			url: base_url+'Admin/getBarChartDataLastYear',
			data : {},
			dataType : 'json',
			success : function(res){
				// alert(JSON.stringify(res));
					Morris.Bar({
				      element: 'myChartLastYear',
				      data: res,
				      xkey: 'y',
				      ykeys: ['a', 'b'],
					  labels: ['2020', '2021'],

				    });
			}
		});
	});
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