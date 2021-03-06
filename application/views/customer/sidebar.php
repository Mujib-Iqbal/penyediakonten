<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('customer_nama'); ?></b></p>
        <a href=""><i class="fa fa-circle text-success"></i> customer</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="<?php if ($this->uri->segment(2)=='dashboard') echo 'active'; ?>">
        <a href="<?php echo base_url('customer/dashboard'); ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
        </a>
      </li>
      <li class="<?php if ($this->uri->segment(2)=='order') echo 'active'; ?>">
        <a href="#">
          <i class="fa fa-shopping-cart"></i> <span>Order</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2)=='order' AND $this->uri->segment(3)=='add') echo 'active'; ?>"><a href="<?php echo base_url('customer/order/add'); ?>"><i class="fa fa-plus-circle"></i> Buat Order</a></li>
          <li class="<?php if ($this->uri->segment(2)=='order' AND $this->uri->segment(3)=='view') echo 'active'; ?>"><a href="<?php echo base_url('customer/order/view'); ?>"><i class="fa fa-server"></i> Lihat Order</a></li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(2)=='payment') echo 'active'; ?>">
        <a href="#">
          <i class="fa fa-money"></i> <span>Pembayaran</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2)=='payment' AND $this->uri->segment(3)=='confirm') echo 'active'; ?>"><a href="<?php echo base_url('customer/payment/confirm'); ?>"><i class="fa fa-info"></i> Konfirmasi Pembayaran</a></li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(2)=='konten') echo 'active'; ?>">
        <a href="#">
          <i class="fa fa-gift"></i> <span>Konten</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2)=='konten' AND $this->uri->segment(3)=='view') echo 'active'; ?>"><a href="<?php echo base_url('customer/konten/view'); ?>"><i class="fa fa-server"></i> Lihat Konten </a></li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(2)=='user') echo 'active'; ?>">
        <a href="<?php echo base_url('customer/user/profil'); ?>">
          <i class="fa fa-male"></i> <span>Profil</span></i>
        </a>
        <!-- <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2)=='user' AND $this->uri->segment(3)=='profil') echo 'active'; ?>"><a href="<?php echo base_url('customer/user/profil'); ?>"><i class="fa fa-user"></i> My Profil </a></li>
        </ul> -->
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

