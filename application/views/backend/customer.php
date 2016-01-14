<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Customer
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
            <h3 class="box-title">Lihat Customer</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="tabel" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>User Name</th>
                  <th>Telefon</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($customer as $value) : ?>
                <tr>
                  <td><?=$value->customer_id ?></td>
                  <td><?=$value->customer_nama ?></td>
                  <td><?=$value->customer_username ?></td>
                  <td><?=$value->customer_telefon ?></td>
                  <td><?=$value->customer_email ?></td>
                  <td>
                    <a class="btn btn-info btn-flat"  href="<?=base_url('dashboard/customer/detail/'.$value->customer_id) ?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-danger btn-flat"  href="<?=base_url('dashboard/customer/delete/'.$value->customer_id) ?>"><i class="fa fa-trash-o"></i></a>
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
