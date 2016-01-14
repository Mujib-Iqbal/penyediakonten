<!--Header-->
    <header class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a id="logo" class="pull-left" href="index.html"></a>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav">
                        <li class="<?php if ($this->uri->segment(1)=='home' OR $this->uri->segment(1)=='') echo 'active"'; ?>">
                            <a href="<?php echo base_url('home'); ?>">Home</a>
                        </li>
                        <li class="<?php if ($this->uri->segment(1)=='tentangkami' OR $this->uri->segment(1)=='') echo 'active"'; ?>">
                            <a href="<?php echo base_url('tentangkami'); ?>">Tentang Kami</a>
                        </li>
                        <li class="<?php if ($this->uri->segment(1)=='faq' OR $this->uri->segment(1)=='') echo 'active"'; ?>">
                            <a href="<?php echo base_url('faq'); ?>">FAQ</a>
                        </li>
                        <li class="<?php if ($this->uri->segment(1)=='paket' OR $this->uri->segment(1)=='') echo 'active"'; ?>">
                            <a href="<?php echo base_url('paket'); ?>">Paket</a>
                        </li>
                        <li class="<?php if ($this->uri->segment(1)=='karir' OR $this->uri->segment(1)=='') echo 'active"'; ?>">
                            <a href="<?php echo base_url('karir'); ?>">Karir</a>
                        </li> 
                        <li class="<?php if ($this->uri->segment(1)=='kontak' OR $this->uri->segment(1)=='') echo 'active"'; ?>">
                            <a href="<?php echo base_url('kontak'); ?>">Kontak</a>
                        </li>
                        <li class="login">
                            <a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a>
                        </li>
                    </ul>        
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </header>
    <!-- /header -->