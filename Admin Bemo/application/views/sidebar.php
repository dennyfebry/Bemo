<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>index.php/admin/index">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-car"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin <sup>Bemo</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url(); ?>index.php/admin/index">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Beranda</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Tabel
  </div>

  <!-- Nav Item -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-table"></i>
      <span>Informasi</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Screens:</h6>
        <a class="collapse-item" href="<?php echo base_url(); ?>index.php/admin/info">Info Beranda</a>
        <a class="collapse-item" href="<?php echo base_url(); ?>index.php/admin/tips">Tips Merawat Mobil</a>
      </div>
    </div>
  </li>

  <!-- Nav Item -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-table"></i>
      <span>Antrian</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Screens:</h6>
        <a class="collapse-item" href="<?php echo base_url(); ?>index.php/admin/antrian">Antrian</a>
        <a class="collapse-item" href="<?php echo base_url(); ?>index.php/admin/riwayat">Riwayat</a>
      </div>
    </div>
  </li>

  <!-- Nav Item -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-table"></i>
      <span>Akun</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Screens:</h6>
        <a class="collapse-item" href="<?php echo base_url(); ?>index.php/admin/pengguna">Akun Pengguna</a>
        <a class="collapse-item" href="<?php echo base_url(); ?>index.php/admin/montir">Akun Montir</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->