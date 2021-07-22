<?php if ($this->session->userdata('role') == 'Admin') { ?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="<?= base_url('assets/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="<?= base_url('assets/img/') . $user['foto']; ?>" class="img-circle elevation-2" alt="User Image" style="width : 50px; height :50px">
                        </div>
                        <div class="info">
                            <a href="<?= base_url('profile') ?>" class="d-block"><?= $user['name'] ?></a>
                        </div>
                    </div>

                    <li class="nav-item">
                        <a href="<?= base_url('admin') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">DATA MASTER</li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/supplier') ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Supplier
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                            <p>
                                Barang
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('barang') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Barang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('satuan/jenis') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jenis</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('satuan') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Satuan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">TRANSAKSI</li>
                    <li class="nav-item">
                        <a href="<?= base_url('pesanan') ?>" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Buat Pesanan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('transaksi') ?>" class="nav-link">
                            <i class="nav-icon fas fa-print"></i>
                            <p>Laporan Transaksi</p>
                        </a>
                    </li>
                    <li class="nav-header">SETTING</li>
                    <li class="nav-item">
                        <a href="<?= base_url('user') ?>" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>User Management</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('auth/logout') ?>" class="nav-link" id="logout">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Log Out</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
<?php } elseif ($this->session->userdata('role') == 'Gudang') { ?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="<?= base_url('assets/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="<?= base_url('assets/img/') . $user['foto']; ?>" class="img-circle elevation-2" alt="User Image" style="width : 50px; height :50px">
                        </div>
                        <div class="info">
                            <a href="<?= base_url('profile') ?>" class="d-block"><?= $user['name'] ?></a>
                        </div>
                    </div>

                    <li class="nav-item">
                        <a href="<?= base_url('gudang') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">DATA MASTER</li>
                    <li class="nav-item">
                        <a href="<?= base_url('gudang/supplier') ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Supplier
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('barang') ?>" class="nav-link">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <p>
                                Barang
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('auth/logout') ?>" class="nav-link" id="logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>Log Out</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
<?php } ?>