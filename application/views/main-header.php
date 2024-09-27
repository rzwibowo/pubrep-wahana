<div class="header ">
  <!-- START MOBILE SIDEBAR TOGGLE -->
  <a href="#" class="btn-link toggle-sidebar d-lg-none pg pg-menu" data-toggle="sidebar">
  </a>
  <!-- END MOBILE SIDEBAR TOGGLE -->
  <div class="">
    <div class="brand inline   m-l-10">
      <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" data-src="<?php echo base_url(); ?>assets/img/logo.png" data-src-retina="<?php echo base_url(); ?>assets/img/logo_2x.png" width="78" height="22">
    </div>
  </div>
  <div class="d-flex align-items-center">
    <!-- START User Info-->
    <div class="pull-left p-r-10 fs-14 font-heading d-lg-block d-none">
      <span class="semi-bold"><?php echo $this->session->userdata('nama') ?></span>
    </div>
    <div class="dropdown pull-right d-lg-block">
      <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="thumbnail-wrapper d32 circular inline">
        <img src="<?php echo base_url(); ?>assets/img/profiles/avatar.jpg" alt="" data-src="<?php echo base_url(); ?>assets/img/profiles/avatar.jpg" data-src-retina="<?php echo base_url(); ?>assets/img/profiles/avatar.jpg" width="32" height="32">
        </span>
      </button>
      <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
        <a href="<?php echo base_url(); ?>app/logout" class="clearfix bg-master-lighter dropdown-item">
          <span class="pull-left">Logout</span>
          <span class="pull-right"><i class="pg-power"></i></span>
        </a>
      </div>
    </div>
    <!-- END User Info-->
  </div>
</div>