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
        <div class="box box-solid box-info">
          <div class="box-header">
            <h3 class="box-title">Tambah Kreator</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form method="POST" action="<?php echo base_url('dashboard/kreator/add') ?>" role="form">
            <div class="box-body">
              <div class="form-group">
                <label>Nama</label>
                <?php echo form_error('nama'); ?>
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama'); ?>">
              </div>
              <div class="form-group">
                <label>User Name</label>
                <?php echo form_error('username'); ?>
                <input type="text" class="form-control" name="username" placeholder="User Name" value="<?php echo set_value('username'); ?>">
              </div>
              <div class="form-group">
                <label>Konten</label> <br>
                <?php echo form_error('konten'); ?>
                <div class="btn-group">
                  <select name="konten" class="form-control">
                    <option value="teks" <?php if (set_value('konten') == 'teks')  echo 'selected'; ?>>Teks</option>
                    <option value="gambar" <?php if (set_value('konten') == 'gambar')  echo 'selected'; ?>>Gambar</option>
                    <option value="audio" <?php if (set_value('konten') == 'audio')  echo 'selected'; ?>>Audio</option>
                    <option value="video" <?php if (set_value('konten') == 'video')  echo 'selected'; ?>>Video</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>No. Telefon</label>
                <?php echo form_error('telefon'); ?>
                <input type="text" class="form-control" name="telefon" placeholder="No. Telefon" value="<?php echo set_value('telefon'); ?>">
              </div>
              <div class="form-group">
                <label>Email</label>
                <?php echo form_error('email'); ?>
                <input type="Email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <?php echo form_error('alamat'); ?>
                <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo set_value('alamat'); ?>">
              </div>
              <div class="form-group">
                <label>Password</label>
                <?php echo form_error('password'); ?>
                <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
              </div>
              <div class="form-group">
                <label>Konfirmasi Password</label>
                <?php echo form_error('confirmpassword'); ?>
                <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" value="<?php echo set_value('confirmpassword'); ?>">
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success">Tambahkan</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

