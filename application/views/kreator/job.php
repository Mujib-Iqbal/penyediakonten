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
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">Daftar Job</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="tabel" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Job ID</th>
              <th>Paket</th>
              <th>Jumlah</th>
              <th>Jenis Konten</th>
              <th>Gaji</th>
              <th>Keterangan</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($job as $value) : ?>
            <tr>
              <td><?=$value->job_id ?></td>
              <td><?=$value->paket_nama ?></td>
              <td><?=$value->order_jumlah ?></td>
              <td><?=$value->konten_jenis ?></td>
              <td><?=(rupiah($value->order_total*($value->job_keuntungan/100))).' ('.$value->job_keuntungan.'% dari '.rupiah($value->order_total).')' ?></td>
              <td><?=$value->order_keterangan ?></td>
              <td><?=ucwords($value->job_status) ?></td>
              <td>
                <a class="btn btn-block btn-info btn-flat" href="<?=base_url('kreator/job/detail/'.$value->job_id) ?>"><i class="fa fa-eye"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

