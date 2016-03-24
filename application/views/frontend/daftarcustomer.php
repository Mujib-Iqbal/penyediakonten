<section class="title">
    <div class="container">
      <div class="row-fluid">
        <div class="span6">
          <h1>Daftar Customer</h1>
        </div>
      </div>
    </div>
  </section>
  <!-- / .title -->       


  <section id="registration-page" class="container">
    <form method="POST" class="center" action="<?php echo base_url('daftar/cust') ?>" role="form">
      <fieldset class="registration-form">
        <div class="control-group">
          <!-- Nama Lengkap -->
          <!-- <label>Nama Lengkap</label> -->
          <?php echo form_error('nama'); ?>
          <div class="controls">
            <input type="text"  name="nama" placeholder="Nama" class="input-xlarge" value="<?php echo set_value('nama'); ?>">
          </div>
        </div>

        <div class="control-group">
          <!-- Username -->
          <!-- <label>User Name</label> -->
          <?php echo form_error('username'); ?>
          <div class="controls">
            <input type="text" name="username" placeholder="Username" class="input-xlarge" value="<?php echo set_value('username'); ?>">
          </div>
        </div>

        <div class="control-group">
          <!-- E-mail -->
          <!-- <label>E-mail</label> -->
          <?php echo form_error('email'); ?>
          <div class="controls">
            <input type="text"  name="email" placeholder="E-mail" class="input-xlarge" value="<?php echo set_value('email'); ?>">
          </div>
        </div>

        <div class="control-group">
          <!-- Password-->
          <!-- <label>Password</label> -->
          <?php echo form_error('password'); ?>
          <div class="controls">
            <input type="password" name="password" placeholder="Password" class="input-xlarge" value="<?php echo set_value('password'); ?>">
          </div>
        </div>

        <div class="control-group">
          <!-- Confirm Password -->
          <!-- <label>Confirm Password</label> -->
          <?php echo form_error('confirmpassword'); ?>
          <div class="controls">
            <input type="password"  name="confirmpassword" placeholder="Password (Confirm)" class="input-xlarge" value="<?php echo set_value('confirmpassword'); ?>">
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