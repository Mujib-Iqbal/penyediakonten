<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo base_url();?>" class="logo">
    <b>Konten</b>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user"></i> <b><?php echo $this->session->userdata('admin_username'); ?></b> <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>"><i class="fa fa-home"></i> Home</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('dashboard/admin/profil');?>"><i class="fa fa-edit"></i> Profil</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('dashboard/auth/logout');?>"><i class="fa fa-power-off"></i> Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>