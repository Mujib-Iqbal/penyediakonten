 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pembayaran
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
        <div class="box box-solid box-success">
          <div class="box-header">
            <h3 class="box-title">Konfirmasi Pembayaran</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="POST" action="<?=base_url('customer/payment/confirm') ?>">
            <div class="box-body">
              <div class="form-group">
                <label>Order ID</label> <br>
                <?=form_error('order'); ?>
                <!-- Single button -->
                <div class="btn-group">
                  <select name="order" class="form-control">
                    <?php foreach ($order as $value) : ?>
                    <option value="<?=$value->order_id ?>"><?=$value->order_id ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <p><i>Order ID adalah id dari order anda. Pilih order ID yang telah anda bayar</i></p>
              </div>
              <div class="form-group">
                <label>Jumlah Uang</label>
                <?=form_error('jumlah'); ?>
                <input name="jumlah" type="text" class="form-control" placeholder="Jumlah Uang" value="<?=set_value('jumlah'); ?>">
                <p><i>Jumlah uang adalah jumlah uang yang telah ditransfer</i></p>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <?=form_error('keterangan'); ?>
                <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan"><?=set_value('keterangan'); ?></textarea>
                <p><i>Keterangan adalah keterangan ke rekening mana anda transfer. Misal: BCA, Mandiri, dll</i></p>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success btn-flat">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- /.row -->
  </section><!-- /.content -->
</div>