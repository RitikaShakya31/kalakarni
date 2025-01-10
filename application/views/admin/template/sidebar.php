<div class="content-wrapper">
  <nav class="top-toolbar navbar navbar-mobile navbar-tablet">
    <ul class="navbar-nav nav-left">
      <li class="nav-item">
        <a href="javascript:void(0)" data-toggle-state="aside-left-open">
          <i class="fa fa-bars"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav nav-center site-logo">
      <li>
      <a href="<?php echo base_url('admin'); ?>">
                  <div class="logo">
                    <img src="<?= base_url() ?>/assets/img/logo.png" alt="logo" style="background-color: white;" class="lwidth" />
                  </div>
                </a>
      </li>
    </ul>
    <ul class="navbar-nav nav-right">
      <li class="nav-item">
        <a href="<?= base_url('admin/logout') ?>" class="btn" style="font-size: 20px;">
        Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- END LOGO WRAPPER -->
  <!-- START TOP TOOLBAR WRAPPER -->
  <nav class="top-toolbar navbar navbar-desktop flex-nowrap">
    <!-- START LEFT DROPDOWN MENUS -->
   
    <!-- END LEFT DROPDOWN MENUS -->
    <!-- START RIGHT TOOLBAR ICON MENUS -->
    <ul class="navbar-nav nav-right">
      <li class="nav-item">
     <a href="<?= base_url('admin/logout') ?>"><button type="submit" class="btn btn-secondary clear-form">Logout</button></a> 

      </li>
    </ul>
   
  </nav>