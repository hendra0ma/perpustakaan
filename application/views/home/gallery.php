<!-- Subheader Start -->
<div class="subheader bg-cover dark-overlay dark-overlay-2" style="background-image: url('<?= base_url('assets/template') ?>/assets/img/subheader.jpg')">
    <div class="container">
        <div class="subheader-inner">
            <h1>Books</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Books</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="shape-1"></div>
    <div class="shape-2"></div>
    <div class="shape-3"></div>
</div>
<!-- Subheader End -->

<section class="section section-padding posts">
    <div class="container">

        <div class="row">

            <div class="col-lg-8">

                <!-- Toggle & Filter Start -->
                <div class="filter-wrapper">
                    <div class="view-toggler">
                        <i class="fas fa-th toggle-grid active"></i>
                        <i class="fas fa-th-list toggle-list"></i>
                    </div>
                    <input type="text" placeholder="Cari buku" name="cari" class="form-control">
                    <button class="btn btn-primary ml-3 cari">
                        cari
                    </button>


                </div>
                <!-- Toggle & Filter End -->

                <div class="row">
                    <!-- Product Start -->
                    <div class="col-md-12 mb-4">
                        <?php if ($this->session->flashdata('message')) { ?>
                            <div class="alert alert-success alert-dismissible mt-3 fade show text-dark" role="alert">
                                <?= $this->session->flashdata('message') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php  } ?>
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger alert-dismissible mt-3 fade show text-dark" role="alert">
                                <ul>
                                    <li><?= $this->session->flashdata('error') ?></li>
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php  } ?>
                        <?php if ($this->session->userdata('id_level') == 1) : ?>
                            <span class="alert alert-dark">
                                Buku Yang anda pinjam adalah <?= $this->cart->total_items() ?> item.
                            </span>
                            <a href="<?= base_url('dashboard/user/peminjaman/checkout') ?>" class="btn btn-lg btn-dark ml-3">keranjang</a>
                        <?php endif ?>
                    </div>
                    <div class="container-hasil">
                        <?php foreach ($buku as $data) : ?>
                            <div class="col-md-6">
                                <div class="ct-product">
                                    <div class="ct-product-thumbnail">
                                        <img src="<?= base_url('assets/dashboard') ?>/docs/assets/img/upload/<?= $data->gambar_buku ?>" class="img-fluid" alt="category" style="height:300px;">
                                        <div class="ct-product-controls">
                                            <a href="<?= base_url() ?>dashboard/user/Peminjaman/getBuku/<?= $data->id_buku ?>" class="btn-custom secondary">Get Now <i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="ct-product-body">
                                        <h5 class="product-title"> <a href="product-details.html">Nib Pen </a> </h5>
                                        <p class="product-price custom-secondary"><?= $data->nama_buku ?></p>
                                        <p class="product-text"><?= $data->deskripsi_buku ?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Product End -->
                        <?php endforeach; ?>
                    </div>

                </div>


            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4">

                <div class="sidebar">

                    <div class="sidebar-widget">
                        <h5>Top Jenis Buku</h5>
                        <?php foreach ($jenis_buku as $data) : ?>
                            <article class="media card">

                                <div class="media-body  card-body">
                                    <h6> <a href="<?= base_url('home/daftarBukuPerJenis/' . $data->id_jenis) ?>"><?= $data->nama_jenis ?></a> </h6>
                                    <div class="ct-rating">
                                    </div>

                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>

                </div>

            </div>
            <!-- Sidebar End -->

        </div>

    </div>
</section>


<!-- Instagram Start -->
<div class="insta-sec section pb-0">
    <div class="container">
        <div class="section-title-wrap section-header text-center">
            <span><i class="fab fa-instagram"></i></span>
            <h2 class="title">Tutorly Insta </h2>
            <p>@ mallvent</p>
        </div>
        <div class="row">
            <div class="col-lg col-md-4 col-sm-4 col-6 p-0">
                <a href="assets/img/ig/1.jpg" class="ct-ig-item image-popup">
                    <img src="<?= base_url('assets/template') ?>/assets/img/ig/1.jpg" alt="ig">
                </a>
            </div>
            <div class="col-lg col-md-4 col-sm-4 col-6 p-0">
                <a href="assets/img/ig/2.jpg" class="ct-ig-item image-popup">
                    <img src="<?= base_url('assets/template') ?>/assets/img/ig/2.jpg" alt="ig">
                </a>
            </div>
            <div class="col-lg col-sm-4 col-6 p-0">
                <a href="assets/img/ig/3.jpg" class="ct-ig-item image-popup">
                    <img src="<?= base_url('assets/template') ?>/assets/img/ig/3.jpg" alt="ig">
                </a>
            </div>
            <div class="col-lg col-md-4 col-sm-4 col-6 p-0">
                <a href="assets/img/ig/4.jpg" class="ct-ig-item image-popup">
                    <img src="<?= base_url('assets/template') ?>/assets/img/ig/4.jpg" alt="ig">
                </a>
            </div>
            <div class="col-lg col-md-4 col-sm-4 col-6 p-0">
                <a href="assets/img/ig/5.jpg" class="ct-ig-item image-popup">
                    <img src="<?= base_url('assets/template') ?>/assets/img/ig/5.jpg" alt="ig">
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Instagram Start -->