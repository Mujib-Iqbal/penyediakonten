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
        <div class="box box-solid box-info">
          <div class="box-header">
            <h3 class="box-title">Edit Admin</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form method="POST" action="<?php echo base_url('dashboard/admin/edit/'.$admin->admin_id) ?>" role="form">
            <div class="box-body">
              <div class="form-group">
                <label>Nama</label>
                <?php echo form_error('nama'); ?>
                <input type="text" class="form-control" placeholder="Nama" value="<?php echo set_value('nama', $admin->admin_nama); ?>" >
              </div>
              <div class="form-group">
                <label>Email</label>
                <?php echo form_error('email'); ?>
                <input type="Email" class="form-control" placeholder="Email" value="<?php echo set_value('email', $admin->admin_email); ?>">
              </div>
              <div class="form-group">
                <label>User Name</label>
                <?php echo form_error('username'); ?>
                <input type="text" class="form-control" placeholder="User Name" value="<?php echo set_value('username', $admin->admin_username); ?>">
              </div>
              <div class="form-group">
                <label>Password</label>
                <?php echo form_error('password'); ?>
                <input type="password" class="form-control" placeholder="Password" value="<?php echo set_value('password', $admin->admin_password); ?>">
              </div>
              <div class="form-group">
                <label>Confirm Password</label>
                <?php echo form_error('confirmpassword'); ?>
                <input type="password" class="form-control" placeholder="Confrim Password" value="<?php echo set_value('confirmpassword', $admin->admin_password); ?>">
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

