<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Paket
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
          <h3 class="box-title">Daftar Paket</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="tabel" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Paket</th>
                <th>Jenis konten</th>
                <th>Jangka Waktu</th>
                <th>Harga</th>
                <th>Jumlah Konten</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($paket as $value) : ?>
              <tr>
                <td><?=$value->paket_id; ?></td>
                <td><?=$value->paket_nama; ?></td>
                <td><?=$value->konten_jenis; ?></td>
                <td><?=$value->paket_jangkawaktu; ?></td>
                <td><?=$value->paket_harga; ?></td>
                <td><?=$value->paket_jumlah; ?></td>
                <td>
                  <a class="btn btn-primary btn-flat" href="<?=base_url('dashboard/paket/edit/'.$value->paket_id) ?>"><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-danger btn-flat"  href="<?=base_url('dashboard/paket/delete/'.$value->paket_id) ?>"><i class="fa fa-trash-o"></i></a>
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
