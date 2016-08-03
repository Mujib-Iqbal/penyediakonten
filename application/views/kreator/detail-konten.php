<!-- Right side column. Contains the navbar and content of the page -->
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
    <div class="box box-solid box-danger">
      <div class="box-header">
        <h3 class="box-title">Detail Konten</h3>
      </div><!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-hover">
          <tr>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <td><strong>Konten ID</strong></td>
            <td><strong>:</strong></td> 
            <td><?=$konten->konten_id?></td>
          </tr>
          <tr>
            <td><strong>Nama Konten</strong></td>
            <td><strong>:</strong></td>
            <td><?=$konten->konten_nama?></td>
          </tr>
          <tr>
            <td><strong>Keterangan</strong></td>
            <td><strong>:</strong> </td>
            <td><?=$konten->konten_keterangan?></td>
          </tr>
          <tr>
            <td><strong>File</strong></td>
            <td><strong>:</strong></td> 
            <td><a href="<?=base_url('uploads/'.$konten->konten_file) ?>"><?=$konten->konten_file?></a></td>
          </tr>
          <tr>
            <td><strong>Status</strong></td>
            <td><strong>:</strong></td> 
            <td><?=$konten->konten_status?></td>
          </tr>
          <tr>
            <td><strong>Komentar</strong></td>
            <td><strong>:</strong></td> 
            <td><?=$konten->konten_komentar?></td>
          </tr>
          <?php if($konten->konten_status == 'ditolak'): ?>
          <tr>

            <td><strong>Revisi Konten</strong></td>
            <td><strong>:</strong></td> 
            <td><a class="btn btn-warning btn-flat" href="<?=base_url('kreator/konten/resubmit/'.$konten->konten_id) ?>"><i class="fa fa-refresh"></i></a></td>
          <?php endif; ?>
        </tr>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->

  <!-- Chat box -->
  <div class="box box-solid box-danger">
    <div class="box-header">
      <i class="fa fa-comments-o"></i>
      <h3 class="box-title">Komentar</h3>
      <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
        <div class="btn-group" data-toggle="btn-toggle" >
          <!-- <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button> -->
        </div>
      </div>
    </div>
    <div class="box-body chat" id="chat-box">
      <!-- chat item -->
      <div class="item">
        <img src="dist/img/user4-128x128.jpg" alt="user image" class="online"/>
        <p class="message">
          <a href="#" class="name">
            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
            Mike Doe
          </a>
          I would like to meet you to discuss the latest news about
          the arrival of the new theme. They say it is going to be one the
          best themes on the market
        </p>
      </div><!-- /.item -->
      <!-- chat item -->
      <div class="item">
        <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline"/>
        <p class="message">
          <a href="#" class="name">
            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
            Alexander Pierce
          </a>
          I would like to meet you to discuss the latest news about
          the arrival of the new theme. They say it is going to be one the
          best themes on the market
        </p>
      </div><!-- /.item -->
      <!-- chat item -->
      <div class="item">
        <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline"/>
        <p class="message">
          <a href="#" class="name">
            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
            Susan Doe
          </a>
          I would like to meet you to discuss the latest news about
          the arrival of the new theme. They say it is going to be one the
          best themes on the market
        </p>
      </div><!-- /.item -->
    </div><!-- /.chat -->
    <div class="box-footer">
      <div class="input-group">
        <input class="form-control" placeholder="Masukkan komentar"/>
        <div class="input-group-btn">
          <button class="btn btn-success">Kirim</button>
        </div>
      </div>
    </div>
  </div><!-- /.box (chat box) -->
</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->


</div><!-- /.content-wrapper -->
<script type="text/javascript">
function outputUpdate(vol) {
  document.querySelector('#progressValue').value = vol+"%";
}
</script>
<style type="text/css">
output[for="progress"] {
  background: #000 none repeat scroll 0% 0%;
  color: #FFF;
  padding: 0.2rem;
}
</style>