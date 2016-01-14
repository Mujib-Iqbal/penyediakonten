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
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Profil</a></li>
            <li><a href="#tab_2" data-toggle="tab">Password</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <form method="POST" action="<?php echo base_url('kreator/user/profil/'.$this->session->userdata('kreator_id')) ?>" role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <?php echo form_error('nama'); ?>
                    <input type="text" class="form-control" placeholder="Nama" value="<?php echo set_value('nama', $this->session->userdata('kreator_nama')) ?>" >
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <?php echo form_error('email'); ?>
                    <input type="Email" class="form-control" placeholder="Email" value="<?php echo set_value('email', $this->session->userdata('kreator_email')) ?>">
                  </div>
                  <div class="form-group">
                    <label>User Name</label>
                    <?php echo form_error('username'); ?>
                    <input type="text" class="form-control" placeholder="User Name" value="<?php echo set_value('username', $this->session->userdata('kreator_username')) ?>">
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-success">Simpan</button>
                </div>
              </form>
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
              <form method="POST" action="<?php echo base_url('kreator/user/profil/'.$this->session->userdata('kreator_id')) ?>" role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label>Password</label>
                    <?php echo form_error('password'); ?>
                    <input type="password" class="form-control" placeholder="Password" value="<?php echo set_value('password', $this->session->userdata('kreator_password')) ?>">
                  </div>
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <?php echo form_error('confirmpassword'); ?>
                    <input type="password" class="form-control" placeholder="Confrim Password" value="<?php echo set_value('confirmpassword', $this->session->userdata('kreator_password')) ?>">
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-success">Simpan</button>
                </div>
              </form>
            </div><!-- /.tab-pane -->
          </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
      </div>
    </div>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

