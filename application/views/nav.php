<nav>
  <div class="nav-wrapper">
    <ul class="left">
      <li>
        <a class="brand-logo">
          <?php
            echo $this->config->item('site_name');
            foreach ($pengaturan as $pengaturan) {
              echo " " . $pengaturan->namasekolah;
            }
          ?>
        </a>
      </li>
      <li>
        <a href="#" data-activates="side-nav" class="button-collapse show-on-large"><i class="material-icons"><img src="<?php echo base_url(); ?>public/img/ic_menu_white_36px.svg" alt="menu" /></i></a>
      </li>
    </ul>
    <ul class="right">
      <li><a href="<?php echo base_url() . index_page(); ?>/login/logout">Logout <?php echo $_SESSION['nama']; ?></a></li>
    </ul>
    <ul class="side-nav" id="side-nav">
      <?php /*<li><a href="<?php echo base_url() . index_page(); ?>">Dashboard</a></li> */?>
      <li><a href="<?php echo base_url() . index_page(); ?>/">Data Siswa</a></li>
      <li><a href="<?php echo base_url() . index_page(); ?>/kelas">Kelas</a></li>
      <li><a href="<?php echo base_url() . index_page(); ?>/pemasukan">Pemasukan</a></li>
      <li><a href="<?php echo base_url() . index_page(); ?>/pengeluaran">Pengeluaran</a></li>
      <li><a href="#" id="dropdown-kas" class="dropdown-button" data-activates="dropdown-kas-list">Transaksi</a></li>
      
      <?php if($_SESSION['role'] == 1) : ?><li><a href="<?php echo base_url() . index_page(); ?>/pengaturan">Pengaturan</a></li><?php endif; ?>
    </ul>
    <ul id="dropdown-kas-list" class="dropdown-content">
      <li><a href="<?php echo base_url() . index_page(); ?>/kas/saldo">Saldo</a></li>
      <li><a href="<?php echo base_url() . index_page(); ?>/pemasukan">Transaksi Siswa</a></li>
      <li><a href="<?php echo base_url() . index_page(); ?>/pemasukan/kelas/id/all">Transaksi Kelas</a></li>
    </ul>
  </div>
</nav>
<div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large red">
    <i class="large mdi-navigation-menu"></i>
  </a>
  <ul>
    <?php
      $param['controller']  = $this->router->fetch_class();
      $param['method']      = $this->router->fetch_method();
    ?>
    <?php if ($_SESSION['role'] == 1 && (
                                          ($param['controller'] == "pengeluaran" && $param['method'] == "index") ||
                                          ($param['controller'] == "pemasukan" && $param['method'] == "index") ||
                                          $param['controller'] == "kelas" ||
                                          $param['controller'] == "siswa")
                                          ) : ?>
    <li>
      <a href="#modal-tambah" class="btn-floating red modal-trigger">
        <i class="large material-icons"><img src="<?php echo base_url(); ?>/public/img/ic_add_white_24px.svg" alt="" /></i>
      </a>
    </li>
    <?php endif; ?>
    <li><a class="btn-floating blue darken-1" href="#" onclick="window.print()"><i class="material-icons"><img src="<?php echo base_url(); ?>/public/img/ic_print_white_24px.svg" alt="" /></i></a></li>
  </ul>
</div>
