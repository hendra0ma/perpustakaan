<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorz - Tutor Blog HTML Template</title>

    <!-- Vendor Stylesheets -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/assets/css/plugins/slick-theme.css">
    <!-- Icon Fonts -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/assets/fonts/flaticon-2/flaticon.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Tutorz Style sheet -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/assets/css/style.css">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/template') ?>/favicon.ico">

</head>

<body>

    <!-- Preloader start -->
    <div class="ct-preloader">
        <img src="<?= base_url('assets/template') ?>/assets/img/preloader.svg" alt="preloader">
    </div>
    <!-- Preloader End -->

    <!-- Aside (Mobile Navigation) -->
    <aside class="main-aside">
        <a class="navbar-brand" href="index.html"> <img src="<?= base_url('assets/template') ?>/assets/img/logo.png" alt="logo"> </a>

        <div class="aside-scroll">
            <ul>
                <li class="menu-item">
                    <a href="<?= base_url('home/index') ?>">Home</a>
                </li>
                <li class="menu-item">
                    <a href="<?= base_url('home/index') ?>">Gallery</a>
                </li>
                <li class="menu-item">
                    <a href="<?= base_url('home/index') ?>">Contact Us</a>
                </li>
                <li class="menu-item menu-item-has-children">
                    <a href="#">Member</a>
                    <ul class="submenu">
                        <?php if ($this->session->userdata("autentikasi")) : ?>
                        <?php else : ?>
                            <li class="menu-item"> <a href="<?= base_url('auth') ?>">Login</a> </li>
                            <li class="menu-item"> <a href="<?= base_url('auth/register') ?>">Register</a> </li>
                        <?php endif ?>
                    </ul>
                </li>
            </ul>

        </div>

    </aside>
    <div class="aside-overlay aside-trigger"></div>

    <!-- Header Start -->
    <header class="main-header header-2 header-absolute">
        <nav class="navbar">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="index.html"> <img src="<?= base_url('assets/template') ?>/assets/img/logo-lg-light.png" alt="logo"> </a>
                <!-- Menu -->
                <ul class="navbar-nav">
                    <li class="menu-item">
                        <a href="<?= base_url('home/index') ?>">Home</a>
                    </li>
                    <li class="menu-item">
                        <a href="<?= base_url('home/gallery') ?>">Gallery</a>
                    </li>
                    <li class="menu-item">
                        <a href="<?= base_url('home/contactUs') ?>">Contact Us</a>
                    </li>
                    <li class="menu-item menu-item-has-children">
                        <a href="#">Member</a>
                        <ul class="submenu">
                            <?php if ($this->session->userdata("autentikasi")) : ?>
                                <li class="menu-item"> <a href="<?= base_url('auth/logout') ?>">logout</a> </li>
                                <li class="menu-item"> <a href="<?= base_url('auth') ?>">Profile</a> </li>
                            <?php else : ?>
                                <li class="menu-item"> <a href="<?= base_url('auth') ?>">Login</a> </li>
                                <li class="menu-item"> <a href="<?= base_url('auth/register') ?>">Register</a> </li>
                            <?php endif ?>
                        </ul>
                    </li>
                </ul>

                <!-- Toggler -->
                <div class="aside-toggler aside-trigger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </div>
        </nav>
    </header>
    <!-- Header End -->