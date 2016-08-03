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
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!--notifikasi-->
        <!-- <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user"></i>
            <b><?php echo $this->session->userdata('customer_username'); ?></b> 
            <span class="caret"></span>            
          </a>
          <ul class="dropdown-menu">
            <li>
              
              <ul class="menu">
                <li>
                  <a href="<?php echo base_url();?>">
                    <i class="fa fa-home"></i> Home
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url('customer/user/profil');?>">
                    <i class="fa fa-edit"></i> Profil
                  </a>
                </li>
                <li class="divider">
                </li>
                <li>
                  <a href="<?php echo base_url('customer/auth/logout');?>">
                    <i class="fa fa-power-off"></i> Log Out
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li> -->
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="">
            <i class="fa fa-user"></i> <b><?php echo $this->session->userdata('customer_username'); ?></b> <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>"><i class="fa fa-home"></i> Home</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('customer/user/profil');?>"><i class="fa fa-edit"></i> Profil</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('customer/auth/logout');?>"><i class="fa fa-power-off"></i> Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>