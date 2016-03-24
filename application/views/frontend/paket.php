<section class="title">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h1>Paket</h1>
            </div>
            <div class="span6">
                <ul class="breadcrumb pull-right">
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- / .title -->

<section id="pricing-table" class="container">
    <div class="center">
        <h2>Paket Paket Konten</h2>
        <p>Kami menyediakan berbagai paket paket konten yang sesuai dengan kebutuhan anda</p>
    </div>
    <h2 class="center"></h2>
    <?php $i = 1; ?>
    <?php foreach ($paket as $value) : ?>
    <?php if ($i == 1) : ?>
    <div class="row-fluid center clearfix">
    <?php endif; ?>
        <div class="span3">
            <ul class="plan plan3">
                <li class="plan-name">
                    <h3><?=$value->paket_nama; ?></h3>
                </li>
                <!-- <li class="plan-price">
                    <strong>$29</strong> / month
                </li> -->
                <li>
                    Konten <strong><?=$value->konten_jenis; ?></strong>
                </li>
                <li>
                    <strong><?=$value->paket_jangkawaktu; ?></strong>
                </li>
                <!-- <li>
                    <strong>400GB</strong> Bandwidth
                </li> -->
                <li>
                    <strong><?=$value->paket_jumlah; ?></strong> Buah
                </li>
                <li>
                    <strong>Rp<?=$value->paket_harga; ?></strong>
                </li>
                <li class="plan-action">
                    <a href="<?php echo base_url('customer/order/add');?>" class="btn btn-transparent">Order!</a>
                </li>
            </ul>
        </div>
    <?php if ($i == 4) : ?>
    <?php $i = 0; ?>
    </div>
    <hr>
    <?php endif; ?>
    <?php $i += 1; ?>
    <?php endforeach ?>
    <hr>
</div>
<hr>
<p>&nbsp;</p>
</section>