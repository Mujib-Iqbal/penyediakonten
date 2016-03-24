<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Konten
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
        <h3 class="box-title">Daftar Konten</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="tabel" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Konten ID</th>
              <th>Job ID</th>
              <th>Kreator</th>
              <th>Nama</th>
              <th>Keterangan</th>
              <th>File</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($konten as $value): ?>
            <tr>
              <td><?=$value->konten_id?></td>
              <td><?=$value->job_id ?></td>
              <td><?=$value->kreator_nama?></td>
              <td><?=$value->konten_nama?></td>
              <td><?=$value->konten_keterangan?></td>
              <td><a href="<?=base_url('uploads/'.$value->konten_file) ?>"><?=$value->konten_file?></a></td>
              <td><?=ucwords($value->konten_status)?></td>
              <td>
                <a href="<?=base_url('dashboard/konten/detail/'.$value->konten_id)?>" class="btn btn-block btn-info btn-flat"><i class="fa fa-eye"></i></a>
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


