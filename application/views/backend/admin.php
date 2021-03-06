<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Admin
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
            <h3 class="box-title">Daftar Admin</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="tabel" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($admin as $value) : ?>
                <tr>
                  <td><?=$value->admin_id ?></td>
                  <td><?=$value->admin_nama ?></td>
                  <td><?=$value->admin_username ?></td>
                  <td><?=$value->admin_email ?></td>
                  <td>
                    <a class="btn btn-info btn-flat"  href="<?=base_url('dashboard/admin/detail/'.$value->admin_id) ?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-danger btn-flat"  href="<?=base_url('dashboard/admin/delete/'.$value->admin_id) ?>"><i class="fa fa-trash-o"></i></a>
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
</div>
