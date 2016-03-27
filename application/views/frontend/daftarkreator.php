<section class="title">
  <div class="container">
    <div class="row-fluid">
      <div class="span6">
        <h1>Daftar Kreator</h1>
      </div>
      <div class="span6">
        <ul class="breadcrumb pull-right">
          <!-- <li><a href="index.html">Home</a> <span class="divider">/</span></li>
          <li><a href="#">Pages</a> <span class="divider">/</span></li>
          <li class="active">Registration</li> -->
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- / .title -->       


<section id="registration-page" class="container">
  <form class="center" action="<?php echo base_url('daftar/kreator') ?>" method="POST" role="form">
    <fieldset class="registration-form">
      <div class="control-group">
        <!-- Nama Lengkap -->
        <!-- <label>Nama Lengkap</label> -->
        <?php echo form_error('nama'); ?>
        <div class="controls">
          <input type="text" id="nama" name="nama" placeholder="Nama" class="input-large" value="<?php echo set_value('nama'); ?>">
        </div>
      </div>

      <div class="control-group">
        <!-- Username -->
        <!-- <label>User Name</label> -->
        <?php echo form_error('username'); ?>
        <div class="controls">
          <input type="text" id="username" name="username" placeholder="Username" class="input-large" value="<?php echo set_value('username'); ?>">
        </div>
      </div>

      <div class="control-group">
        <!-- E-mail -->
        <!-- <label>E-mail</label> -->
        <?php echo form_error('email'); ?>
        <div class="controls">
          <input type="text" id="email" name="email" placeholder="E-mail" class="input-large" value="<?php echo set_value('email'); ?>">
        </div>
      </div>

      <div class="form-group">
        <label>Konten</label>
        <?php echo form_error('konten'); ?>
        <select class="form-control" name="konten">
          <option value="teks" <?php if (set_value('konten') == 'teks')  echo 'selected'; ?>>Teks</option>
          <option value="gambar" <?php if (set_value('konten') == 'gambar')  echo 'selected'; ?>>Gambar</option>
          <option value="audio" <?php if (set_value('konten') == 'audio')  echo 'selected'; ?>>Audio</option>
          <option value="video" <?php if (set_value('konten') == 'video')  echo 'selected'; ?>>Video</option>
        </select>
      </div>

      <div class="control-group">
        <!-- Password-->
        <!-- <label>Password</label> -->
        <?php echo form_error('password'); ?>
        <div class="controls">
          <input type="password" id="password" name="password" placeholder="Password" class="input-large" value="<?php echo set_value('password'); ?>">
        </div>
      </div>

      <div class="control-group">
        <!-- Confirm Password -->
        <!-- <label>Confirm Password</label> -->
        <?php echo form_error('confirmpassword'); ?>
        <div class="controls">
          <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Password (Confirm)" class="input-large" value="<?php echo set_value('confirmpassword'); ?>">
        </div>
      </div>

      <div class="control-group">
        <!-- Button -->
        <div class="controls">
          <button type="submit" class="btn btn-success btn-large btn-block">Daftar</button>
        </div>
      </div>
    </fieldset>
  </form>
</section>
  <!-- /#registration-page -->