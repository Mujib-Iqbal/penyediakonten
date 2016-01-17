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
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">Edit Kreator</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form method="POST" action="<?php echo base_url('dashboard/kreator/edit/'.$kreator->kreator_id) ?>" role="form">
            <div class="box-body">
              <div class="form-group">
                <label>Nama</label>
                <?php echo form_error('nama'); ?>
                <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo set_value('nama', $kreator->kreator_nama); ?>">
              </div>
              <div class="form-group">
                <label>User Name</label>
                <?php echo form_error('username'); ?>
                <input type="text" class="form-control" name="username" placeholder="User Name" value="<?php echo set_value('username', $kreator->kreator_username); ?>" >
              </div>
              <div class="form-group">
                <label>Jenis Konten</label> <br>
                <?php echo form_error('konten'); ?>
                <div class="btn-group">
                  <select name="konten" class="form-control">
                    <option value="teks" <?php if (set_value('konten', $kreator->kreator_konten) == 'teks')  echo 'selected'; ?>>Teks</option>
                    <option value="gambar" <?php if (set_value('konten', $kreator->kreator_konten) == 'gambar')  echo 'selected'; ?>>Gambar</option>
                    <option value="audio" <?php if (set_value('konten', $kreator->kreator_konten) == 'audio')  echo 'selected'; ?>>Audio</option>
                    <option value="video" <?php if (set_value('konten', $kreator->kreator_konten) == 'video')  echo 'selected'; ?>>Video</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>No. Telefon</label>
                <?php echo form_error('telefon'); ?>
                <input type="text" class="form-control" name="telefon" placeholder="No Telefon" value="<?php echo set_value('telefon', $kreator->kreator_telefon); ?>">
              </div>
              <div class="form-group">
                <label>Email</label>
                <?php echo form_error('email'); ?>
                <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email', $kreator->kreator_email); ?>">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <?php echo form_error('alamat'); ?>
                <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo set_value('alamat', $kreator->kreator_alamat); ?>">
              </div>
              <!-- <div class="form-group">
                <label>Password</label>
                <?php echo form_error('password'); ?>
                <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password', $kreator->kreator_password); ?>">
              </div>
              <div class="form-group">
                <label>Konfirmasi Password</label>
                <?php echo form_error('confirmpassword'); ?>
                <input type="password" class="form-control" name="confirmpassword" placeholder="Konfirmasi Password" value="<?php echo set_value('password', $kreator->kreator_password); ?>">
              </div> -->
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success btn-flat">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

