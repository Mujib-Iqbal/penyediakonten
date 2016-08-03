<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Konten
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
    <?php if ($error) : ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
  <?php endif; ?>
  <div class="box box-solid box-danger">
    <div class="box-header">
      <h3 class="box-title">Kirim Konten</h3>
    </div><!-- /.box-header -->

      <div class="box-body no-padding">
        <?php echo form_open_multipart('kreator/konten/submit');?>
        <div class="box-body">
          <div class="form-group">
            <label>Job ID</label> <br>
            <?php echo form_error('job'); ?>
            <div class="btn-group">
            <select name="job" class="form-control">
              <?php foreach($job as $value) : ?>
              <option value="<?=$value->job_id?>" <?php if (set_value('job') == $value->job_id)  echo 'selected'; ?>><?=$value->job_id?></option>
            <?php endforeach; ?>
          </select>
        </div>
            
          <p><i>Job ID adalah id job yang telah anda selesaikan. Konten akan dikirim bedasarkan ID job</i></p>
        </div>
        <div class="form-group">
          <label>Judul Konten</label>
          <?php echo form_error('nama'); ?>
          <input name="nama" class="form-control" placeholder="Nama" value="<?php echo set_value('nama'); ?>">
          <p><i>Silahkan isi dengan nama konten atau judul konten</i></p>
        </div>
        <div class="form-group">
          <label>Keterangan</label>
          <?php echo form_error('keterangan'); ?>
          <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan..."><?php echo set_value('keterangan'); ?></textarea>
          <p><i>Silahkan isi keterangan terkait konten yang anda kirim</i></p>
        </div>
        <div class="form-group">
          <label>Upload File</label>
          <?php echo form_error('file'); ?>
          <input name="file" type="file">
          <p><i>File yang dapat diupload: .docx .doc .zip .text .mp3 .mp4 .jpg .png</i></p>
        </div>
      </div><!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-success">Kirim </button>
      </div>
    </div>
  </form>
</div>
</div>
</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
