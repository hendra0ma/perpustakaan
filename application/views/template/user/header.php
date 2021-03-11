<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/dashboard') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/dashboard') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->

    <link rel="stylesheet" href="<?= base_url('assets/dashboard') ?>/dist/css/adminlte.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.23/r-2.2.7/datatables.min.css" />
     -->
    <link rel="stylesheet" href="<?= base_url("assets/dashboard/datatables/css/datatables.css") ?>">

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?= base_url('assets/dashboard') ?>/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->


                <!-- Messages Dropdown Menu -->

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-align-left"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="<?= base_url() ?>auth/logout" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">

                                <div class="media-body">

                                    <h3 class="dropdown-item-title">

                                        Logout

                                        <span class="float-right text-sm text-light"><i class="fas fa-sign-out-alt"></i></span>
                                    </h3>


                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('dashboard/user/user') ?>" class="brand-link">
                <img src="<?= base_url('assets/dashboard') ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><b>USER</b></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php if ($user->gambar == "") : ?>
                            <img src="<?= base_url() ?>assets/dashboard/docs/assets/img/image-default.png" class="img-circle elevation-2" alt="User Image">
                        <?php else : ?>
                            <img src="<?= base_url('assets/dashboard') ?>/docs/assets/img/upload/<?= $user->gambar ?>" class="img-circle elevation-2" alt="User Image">
                        <?php endif; ?>
                    </div>
                    <div class="info">
                        <a href="<?= base_url() ?>dashboard/user/auth/updateProfile" class="d-block"><?= $user->nama_lengkap ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->






                        <li class="nav-header">Menu</li>
                        <li class="nav-item">
                            <?php if ($this->uri->segment(3) == 'user' && $this->uri->segment(4) == '') : ?>
                                <a href="<?= base_url() ?>dashboard/user/user" class="nav-link active">
                                <?php else : ?>
                                    <a href="<?= base_url() ?>dashboard/user/user" class="nav-link">
                                    <?php endif; ?>
                                    <i class="nav-icon fas fa-calendar-alt"></i>
                                    <p>
                                        Home
                                    </p>
                                    </a>
                        </li>
                        <li class="nav-item">
                            <?php if ($this->uri->segment(3) == 'peminjaman' && $this->uri->segment(4) == 'checkout') : ?>
                                <a href="<?= base_url() ?>dashboard/user/peminjaman/checkout" class="nav-link active">
                                <?php else : ?>
                                    <a href="<?= base_url() ?>dashboard/user/peminjaman/checkout" class="nav-link">
                                    <?php endif; ?>
                                    <i class="nav-icon fas fa-shopping-cart"></i>
                                    <p>
                                        Checkout Page
                                    </p>
                                    </a>
                        </li>
                        <li class="nav-item">
                            <?php if ($this->uri->segment(3) == 'user' && $this->uri->segment(4) == 'bukuDipinjam') : ?>
                                <a href="<?= base_url() ?>dashboard/user/user/bukuDipinjam" class="nav-link active">
                                <?php else : ?>
                                    <a href="<?= base_url() ?>dashboard/user/user/bukuDipinjam" class="nav-link">
                                    <?php endif; ?>
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Buku Dipinjam
                                    </p>
                                    </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Profile
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <?php if ($this->uri->segment(3) == 'auth' && $this->uri->segment(4) == 'updateProfile') : ?>
                                        <a href="<?= base_url() ?>dashboard/user/auth/updateProfile" class="nav-link active">
                                        <?php else : ?>
                                            <a href="<?= base_url() ?>dashboard/user/auth/updateProfile" class="nav-link">
                                            <?php endif ?>
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>edit Profile</p>
                                            </a>
                                </li>
                                <li class="nav-item">
                                    <?php if ($this->uri->segment(4) == 'updatePass') : ?>
                                        <a href="<?= base_url() ?>dashboard/user/auth/updatePass/" class="nav-link active">
                                        <?php else : ?>
                                            <a href="<?= base_url() ?>dashboard/user/auth/updatePass/" class="nav-link">
                                            <?php endif ?>
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ganti Password</p>
                                            </a>
                                </li>

                            </ul>
                        </li>


                    </ul>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">