<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Profil
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
        <div class="box box-solid box-danger">
          <div class="box-header">
            <h3 class="box-title">My Profil</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form method="POST" action="<?php echo base_url('kreator/user/profil/'.$this->session->userdata('kreator_id')) ?>" role="form">
            <div class="box-body">
              <div class="form-group">
                <label>Nama</label>
                <?php echo form_error('nama'); ?>
                <input name="nama" type="text" class="form-control" placeholder="Nama" value="<?php echo set_value('nama', $this->session->userdata('kreator_nama')) ?>" >
              </div>
              <div class="form-group">
                <label>Email</label>
                <?php echo form_error('email'); ?>
                <input name="email" type="Email" class="form-control" placeholder="Email" value="<?php echo set_value('email', $this->session->userdata('kreator_email')) ?>">
              </div>
              <div class="form-group">
                <label>User Name</label>
                <?php echo form_error('username'); ?>
                <input name="username" type="text" class="form-control" placeholder="User Name" value="<?php echo set_value('username', $this->session->userdata('kreator_username')) ?>">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <?php echo form_error('alamat'); ?>
                <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="<?php echo set_value('alamat', $this->session->userdata('kreator_alamat')) ?>">
              </div>
              <div class="form-group">
                <label>No Telefon</label>
                <?php echo form_error('telefon'); ?>
                <input name="telefon" type="text" class="form-control" placeholder="No Telefon" value="<?php echo set_value('telefon', $this->session->userdata('kreator_telefon')) ?>">
              </div>
              <div class="form-group">
                <label>Password</label>
                <?php echo form_error('password'); ?>
                <input name="password" type="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group">
                <label>Confirm Password</label>
                <?php echo form_error('confirmpassword'); ?>
                <input name="confirmpassword" type="password" class="form-control" placeholder="Confrim Password">
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
