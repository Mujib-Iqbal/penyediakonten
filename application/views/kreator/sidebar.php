<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('kreator_nama'); ?></b></p>
        <a href=""><i class="fa fa-circle text-success"></i> kreator</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="<?php if ($this->uri->segment(2)=='dashboard') echo 'active'; ?>">
        <a href="<?php echo base_url('kreator/dashboard'); ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
        </a>
      </li>
      <li class="<?php if ($this->uri->segment(2)=='job' || $this->uri->segment(2)=='gaji') echo 'active'; ?> treeview">
        <a href="">
          <i class="fa fa-lightbulb-o"></i> <span>Job</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2)=='job' AND $this->uri->segment(3)=='view') echo 'active'; ?>"><a href="<?php echo base_url('kreator/job/view'); ?>"><i class="fa fa-server"></i> Lihat Job</a></li>
          <li class="<?php if ($this->uri->segment(2)=='gaji' AND $this->uri->segment(3)=='view') echo 'active'; ?>"><a href="<?=base_url('kreator/gaji/view')?>"><i class="fa  fa-desktop"></i>Lihat Gaji</a></li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(2)=='konten') echo 'active'; ?> treeview">
        <a href="">
          <i class="fa fa-gift"></i> <span>Konten</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2)=='konten' AND $this->uri->segment(3)=='submit') echo 'active'; ?>"><a href="<?php echo base_url('kreator/konten/submit'); ?>"><i class="fa fa-cloud"></i> Kirim Konten </a></li>
          <li class="<?php if ($this->uri->segment(2)=='konten' AND $this->uri->segment(3)=='view') echo 'active'; ?>"><a href="<?php echo base_url('kreator/konten/view'); ?>"><i class="fa fa-eye"></i> Lihat Konten </a></li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(2)=='user') echo 'active'; ?> treeview">
        <a href="<?php echo base_url('kreator/user/profil'); ?>">
          <i class="fa fa-male"></i> <span>Profil</span></i>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

