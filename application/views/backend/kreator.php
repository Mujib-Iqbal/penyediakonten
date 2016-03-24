<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kreator
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
        <h3 class="box-title">Daftar Kreator</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="tabel" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>User Name</th>
              <th>Telefon</th>
              <th>Konten</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($kreator as $value) : ?>
            <tr>
              <td><?=$value->kreator_id ?></td>
              <td><?=$value->kreator_nama ?></td>
              <td><?=$value->kreator_username ?></td>
              <td><?=$value->kreator_telefon ?></td>
              <td><?=$value->kreator_konten ?></td>
              <td>
                <a class="btn btn-primary btn-flat"  href="<?=base_url('dashboard/kreator/edit/'.$value->kreator_id) ?>"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger btn-flat"  href="<?=base_url('dashboard/kreator/delete/'.$value->kreator_id) ?>"><i class="fa fa-trash-o"></i></a>
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
