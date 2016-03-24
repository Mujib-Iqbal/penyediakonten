<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
  </section>
  <!-- Main content -->

  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <!-- <pre><?=var_dump ($order)?></pre> -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h4><b><?=$order ?></b><sup style="font-size: 60px"></sup></h4>
            <p>Total Order</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-cart-outline"></i>
          </div>
          <a href="<?php echo base_url('customer/order/view');?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h4><b><?=$konten ?></b><sup style="font-size: 60px"></sup></h4>
            <p>Total Konten</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="<?php echo base_url('customer/konten/view');?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
