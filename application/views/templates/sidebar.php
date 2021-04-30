<?php if ($this->session->userdata('role_id') == 1) { ?>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="index.html">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>

                <hr class="sidebar-divider" style="margin: 0 1rem 1rem; border-top: 1px solid #eaecf4; border-top: 1px solid rgba(255, 255, 255, 0.15);">

                <div style="text-align: left;padding: 0 1rem;font-size: 0.80rem;color: rgba(255, 255, 255, 0.4)">Data Master</div>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="<?= base_url('admin/supplier') ?>">
                        <i class="fa fa-fw fa-users"></i>
                        <span class="nav-link-text">Supplier</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-file"></i>
                        <span class="nav-link-text">Example Pages</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                        <li>
                            <a href="login.html">Satuan Barang</a>
                        </li>
                        <li>
                            <a href="register.html">Jenis Barang</a>
                        </li>
                        <li>
                            <a href="<?= base_url('barang') ?>">Data Barang</a>
                        </li>
                        <li>
                            <a href="blank.html">Blank Page</a>
                        </li>
                    </ul>
                </li>

                <hr class="sidebar-divider" style="margin: 0 1rem 1rem; border-top: 1px solid #eaecf4; border-top: 1px solid rgba(255, 255, 255, 0.15);">

                <div style="text-align: left;padding: 0 1rem;font-size: 0.80rem;color: rgba(255, 255, 255, 0.4)">Transaksi</div>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                    <a class="nav-link" href="#">
                        <i class="fa fa-fw fa-link"></i>
                        <span class="nav-link-text">Laporan Pembelian</span>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - User Information -->
                <!-- <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline small text-capitalize">
                            Milla
                        </span>
                        <img class="img-profile rounded-circle" src="<?= base_url() ?>assets/profile/default.jpg" height="35" width="35">
                    </a>
                   
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="">
                            <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                            Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li> -->

            </ul>
        </div>
    </nav>

<?php } elseif ($this->session->userdata('role_id') == 2) { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

                <hr class="sidebar-divider" style="margin: 0 1rem 1rem; border-top: 1px solid #eaecf4; border-top: 1px solid rgba(255, 255, 255, 0.15);">
                <div style="text-align: left;padding: 0 1rem;font-size: 0.80rem;color: rgba(255, 255, 255, 0.4)">Data Master</div>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="<?= base_url('admin/supplier') ?>">
                        <i class="fa fa-fw fa-users"></i>
                        <span class="nav-link-text">Supplier</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-file"></i>
                        <span class="nav-link-text">Example Pages</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                        <li>
                            <a href="login.html">Satuan Barang</a>
                        </li>
                        <li>
                            <a href="register.html">Jenis Barang</a>
                        </li>
                        <li>
                            <a href="<?= base_url('barang') ?>">Stok Barang</a>
                        </li>
                        <li>
                            <a href="blank.html">Blank Page</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>

        </div>
    </nav>

<?php } ?>