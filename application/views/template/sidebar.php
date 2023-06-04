<div class="container-fluid page-body-wrapper">

    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/index') ?>">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Master Data</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/produk') ?>">Produk</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/paket') ?>">Paket</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/status') ?>">Status</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                    <i class="icon-grid-2 menu-icon"></i>
                    <span class="menu-title">Pemesanan</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="tables">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link"
                                href="<?= base_url('admin/pemesanan') ?>">Pemesanan</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">User</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/my_profile') ?>">My
                                Profile</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html">Change Password
                            </a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('auth/logout') ?>">Logout</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>