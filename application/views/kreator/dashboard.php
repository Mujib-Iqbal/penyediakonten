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
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h4><b><?=$job ?></b></h4>
            <p>Total Job</p>
          </div>
          <div class="icon">
            <i class="ion ion-lightbulb"></i>
          </div>
          <a href="<?php echo base_url('kreator/job/view');?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h4><b><?=$konten ?></b></h4>
            <p>Total Konten</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="<?php echo base_url('kreator/konten/view');?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h4><b><?=rupiah($gaji->gaji_jumlah) ?></b><sup style="font-size: 20px"></sup></h4>
            <p>Total Gaji</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-briefcase-outline"></i>
          </div>
          <a href="<?php echo base_url('kreator/gaji/view');?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
