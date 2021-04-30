<?php if ($this->session->userdata('role') == 'Admin') { ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- =========================================================== -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <a href="<?= base_url('admin/supplier'); ?>">
                  <h5 class="info-box-text">Data Supplier</h5>
                </a>
                <span class="info-box-number"><?= $jumlah; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="nav-icon fas fa-folder-open"></i></span>
              <div class="info-box-content">
                <a href="<?= base_url('barang'); ?>">
                  <h5 class="info-box-text">Data Barang</h5>
                </a>
                <span class="info-box-number"><?= $jml ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="nav-icon fas fa-users-cog"></i></span>
              <div class="info-box-content">
                <a href="<?= base_url('user'); ?>">
                  <h5 class="info-box-text">Data User</h5>
                </a>
                <span class="info-box-number"><?= $jmlh ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12 ">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-clipboard-list"></i></span>

              <div class="info-box-content">
                <a href="<?= base_url('pesanan'); ?>">
                  <h5 class="info-box-text">Buat Pesanan</h5>
                </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row mr-lg-5">
          <div class="col-md-3 col-sm-6 col-12 ml-lg-5 ">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-print"></i></span>
              <div class="info-box-content">
                <a href="<?= base_url('transaksi'); ?>">
                  <h5 class="info-box-text">Cetak Laporan</h5>
                </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        <!-- =========================================================== -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->
<?php } elseif ($this->session->userdata('role') == 'Gudang') { ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- =========================================================== -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <a href="<?= base_url('admin/supplier'); ?>">
                  <h5 class="info-box-text">Data Supplier</h5>
                </a>
                <span class="info-box-number"><?= $jumlah; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="nav-icon fas fa-folder-open"></i></span>
              <div class="info-box-content">
                <a href="<?= base_url('barang'); ?>">
                  <h5 class="info-box-text">Data Barang</h5>
                </a>
                <span class="info-box-number"><?= $jml ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- =========================================================== -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
<?php } ?>