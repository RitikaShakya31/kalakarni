<aside class="sidebar sidebar-left">
  <div class="sidebar-content">
    <div class="aside-toolbar">
      <ul class="site-logo">
        <li>
          <!-- START LOGO -->
          <a href="<?php echo base_url('admin'); ?>">
            <div class="logo">
              <img src="<?= base_url() ?>/assets/img/logo.png" width="100px" />
            </div>
          </a>
        </li>
      </ul>
      <ul class="header-controls">
        <li class="nav-item menu-trigger">
          <button type="button" class="btn btn-link btn-menu" data-toggle-state="mini-sidebar" data-key="leftSideBar">
            <i class="fa fa-bars"></i>
          </button>
        </li>
      </ul>
    </div>
    <nav class="main-menu">
      <ul class="nav metismenu">
        <li>
          <a href="<?= base_url('admin'); ?>"><i class="fa fa-arrow-right"
              aria-hidden="true"></i><span>Dashboard</span></a>
        </li>

        <li class="nav-dropdown">
          <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-arrow-right"
              aria-hidden="true"></i><span>Order List</span></a>
          <ul class="collapse nav-sub" aria-expanded="true">
            <li>
              <a href="<?= base_url('admin_Dashboard/orderPlaced/0/cod'); ?>"><span>COD Orders </span></a>
            </li>

            <li>
              <a href="<?= base_url('admin_Dashboard/orderPlaced/1/online'); ?>"><span>Online Orders</span></a>
            </li>
          </ul>
        </li>

        <li class="nav-dropdown">
          <a href="<?= base_url('admin_Dashboard/view_category'); ?>"><i class="fa fa-arrow-right"
              aria-hidden="true"></i><span>Product Category</span></a>
        </li>
        <li class="nav-dropdown">
          <a href="<?= base_url('admin_Dashboard/view_subcategory'); ?>"><i class="fa fa-arrow-right"
              aria-hidden="true"></i><span>Product SubCategory</span></a>
        </li>
        <li>
          <a href="<?= base_url('admin_Dashboard/view_products'); ?>"><i class="fa fa-arrow-right"
              aria-hidden="true"></i><span>Products</span></a>
        </li>

        <li>
          <a href="<?= base_url('admin_Dashboard/registeredUser'); ?>"><i class="fa fa-arrow-right"
              aria-hidden="true"></i><span>Registered User</span></a>
        </li>

        <li>
          <a href="<?= base_url('admin_Dashboard/promocode'); ?>"><i class="fa fa-arrow-right"
              aria-hidden="true"></i><span>Promocode</span></a>
        </li>

        <li>
          <a href="<?= base_url('admin_Dashboard/contact_query'); ?>"><i class="fa fa-arrow-right"
              aria-hidden="true"></i><span>Contact Query</span></a>
        </li>
        <li>
          <a href="<?= base_url('admin_Dashboard/banner'); ?>"><i class="fa fa-arrow-right"
              aria-hidden="true"></i><span>Home Banner</span></a>
        </li>
        <li>
          <a href="<?= base_url('admin_Dashboard/budget'); ?>"><i class="fa fa-arrow-right"
              aria-hidden="true"></i><span>Home budget</span></a>
        </li>
        <li class="nav-dropdown">
          <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-arrow-right"
              aria-hidden="true"></i><span>Add On data</span></a>
          <ul class="collapse nav-sub" aria-expanded="true">
            <li>
              <a href="<?= base_url('admin_Dashboard/privacyPolicy'); ?>"><span>Privacy policy</span></a>
            </li>
            <li>
              <a href="<?= base_url('admin_Dashboard/terms'); ?>"><span>Terms & Condition</span></a>
            </li>
            <li>
              <a href="<?= base_url('admin_Dashboard/faq'); ?>"><span>FAQ</span></a>
            </li>
            <li>
              <a href="<?= base_url('admin_Dashboard/contactdetails'); ?>"><span>Contact Details </span></a>
            </li>
          </ul>
        </li>
        <li>
          <a href="<?= base_url('admin_Dashboard/length'); ?>"><i class="fa fa-arrow-right"
              aria-hidden="true"></i><span> Length</span></a>
        </li>
        <li>
          <a href="<?= base_url('admin_Dashboard/fabric'); ?>"><i class="fa fa-arrow-right"
              aria-hidden="true"></i><span>Fabric</span></a>
        </li>
        <li>
          <a href="<?= base_url('admin_Dashboard/pattern'); ?>"><i class="fa fa-arrow-right"
              aria-hidden="true"></i><span>Pattern</span></a>
        </li>
      </ul>
    </nav>
  </div>
</aside>