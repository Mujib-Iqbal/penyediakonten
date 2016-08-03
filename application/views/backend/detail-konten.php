<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail Konten
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
        <div class="box box-solid box-info">
          <div class="box-header">
            <h3 class="box-title">Detail Konten</h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
            <form role="form" action="<?=base_url('dashboard/konten/detail/'.$konten->konten_id)?>" method="post">
              <table class="table table-hover">
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th style="width: 400px"></th>
                </tr>
                <tr>
                  <td><strong>Konten ID</strong></td>
                  <td><strong>:</strong> </td> 
                  <td><?=$konten->konten_id?></td>
                  <td><strong>Kreator</strong></td>
                  <td><strong>:</strong> <?=$konten->kreator_nama?></td>
                </tr>
                <tr>
                  <td><strong>Download</strong></td>
                  <td><strong>:</strong></td> 
                  <td> <a href="<?=base_url('upload/'.$konten->konten_file)?>"><?=$konten->konten_file?></a> </td>
                  <td><strong>Telefon</strong></td>
                  <td><strong>:</strong> <?=$konten->kreator_telefon?></td>
                </tr>
               <!--  <tr>
                  <td><strong>Paket</strong></td>
                  <td><strong>:</strong></td>
                  <td> A2</td>
                </tr>
                <tr>
                  <td><strong>Jumlah</strong></td>
                  <td><strong>:</strong></td> 
                  <td>2</td>
                </tr> 
                <tr>
                  <td><strong>Download</strong></td>
                  <td><strong>:</strong></td> 
                  <td> <a href="#"> Link Download</a> </td>
                </tr> -->
                <tr>
                  <td><strong>Keterangan</strong></td>
                  <td><strong>:</strong> </td>
                  <td><?=$konten->konten_keterangan?></td>
                </tr>
                <tr>
                  <td><strong>Status Saat Ini</strong></td>
                  <td><strong>:</strong> </td>
                  <td><?=ucwords($konten->konten_status)?></td>
                </tr>
                <tr>
                  <td><strong>Komentar</strong></td>
                  <td><strong>:</strong></td> 
                  <td> <?php echo form_error('komentar'); ?><textarea name="komentar" class="form-control" rows="3" placeholder="Komentar..."><?=$konten->konten_komentar?></textarea></td>
                </tr>
                <tr>
                  <td><strong>Status</strong></td>
                  <td><strong>:</strong></td> 
                  <td><?php echo form_error('status'); ?>
                    <select name="status" class="form-control">
                        <option value="diterima" <?php if (set_value('status', $konten->konten_status) == 'diterima')  echo 'selected'; ?>>Terima</option>
                        <option value="ditolak" <?php if (set_value('status', $konten->konten_status) == 'ditolak')  echo 'selected'; ?>>Tolak</option>
                      </select>
                    </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td> 
                  <td><button type="submit" class="btn btn-success">Simpan</button></td>
                </tr>
              </table>
            </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="box box-solid box-info">
          <div class="box-header">
            <h3 class="box-title">Detail Order</h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-hover">
              <tr>
                <td><strong>Order ID</strong></td>
                <td><strong>:</strong></td>
                <td><a href="<?=base_url('dashboard/order/detail/'.$konten->order_id)?>"><?=$konten->order_id?></a></td>
              </tr>
              <tr>
                <td><strong>Customer</strong></td>
                <td><strong>:</strong></td>
                <td><?=$konten->customer_nama?></td>
              </tr>
              <tr>
                <td><strong>Date</strong></td>
                <td><strong>:</strong></td>
                <td><?=tanggal($konten->order_date)?></td>
              </tr>
              <!-- <tr>
                <td><strong>Paket</strong></td>
                <td><strong>:</strong></td>
                <td>A2</td>
              </tr> -->
              <tr>
                <td><strong>Jumlah</strong></td>
                <td><strong>:</strong></td>
                <td><?=$konten->order_jumlah?></td>
              </tr>
              <tr>
                <td><strong>Keterangan</strong></td>
                <td><strong>:</strong></td>
                <td><?=$konten->order_keterangan?></td>
              </tr>
              <tr>
                <td><strong>Total</strong></td>
                <td><strong>:</strong></td>
                <td><?=rupiah($konten->order_total)?></td>
              </tr>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

        <!-- Chat box -->
        <div class="box box-solid box-info">
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

