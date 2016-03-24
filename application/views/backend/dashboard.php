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
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h4><b><?=$order ?></b></h4>
            <p>Total Order</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-cart-outline"></i>
          </div>
          <a href="<?php echo base_url('dashboard/order/view');?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h4><b><?=rupiah($pendapatan->pendapatan_jumlah) ?></b><sup style="font-size: 20px"></sup></h4>
            <p>Total Pendapatan</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-briefcase-outline"></i>
          </div>
          <a href="<?php echo base_url('dashboard/pendapatan/view');?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h4><b><?=$customer ?></b></h4>
            <p>Total Customer</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="<?php echo base_url('dashboard/customer/view');?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h4><b><?=$kreator ?></b></h4>
            <p>Total Kreator</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="<?php echo base_url('dashboard/kreator/view');?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
