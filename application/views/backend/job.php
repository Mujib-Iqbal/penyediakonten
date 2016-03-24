<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Job
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
      <?php if ($this->session->flashdata('success')) : ?>
      <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('danger')) : ?>
      <div class="alert alert-danger"><?php echo $this->session->flashdata('danger'); ?></div>
      <?php endif; ?>
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Daftar Job</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="tabel" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Job ID</th>
              <th>Order ID</th>
              <th>Paket</th>
              <th>Kreator</th>
              <th>Status</th>
              <th>Progress</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($job as $value) : ?>
            <tr>
              <td><?=$value->job_id ?></td>
              <td><a href="<?=base_url('dashboard/order/detail/'.$value->order_id) ?>"><?=$value->order_id ?></a></td>
              <td><?=$value->paket_nama ?></td>
              <td><?=$value->kreator_nama ?></td>
              <td><?=ucwords($value->job_status) ?></td>
              <td><?=(is_null($value->job_progress)) ? '-' : $value->job_progress ?></td>
              <td>
                <a class="btn btn-info btn-flat"  href="<?=base_url('dashboard/job/detail/'.$value->job_id) ?>"><i class="fa fa-eye"></i></a>
                <a class="btn btn-danger btn-flat"  href="<?=base_url('dashboard/job/delete/'.$value->job_id) ?>"><i class="fa fa-trash-o"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
