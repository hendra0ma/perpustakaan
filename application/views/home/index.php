<!-- Banner Start -->
<div class="banner dark-overlay" style="background-image: url('<?= base_url('assets/template') ?>/assets/img/banner/1.jpg')">

    <!-- Prev Arrow -->
    <i class="slider-prev fas fa-arrow-left slick-arrow"></i>
    <div class="container">

        <div class="banner-slider">
            <div class="banner-item text-center">
                <div class="banner-inner">
                    <h1 class="title text-white">Getting Education Became <span class="custom-primary">Easier</span> </h1>

                    <a href="<?= base_url() ?>/home/gallery" class="btn-custom primary shadow-none">Access Books Now <i class="fas fa-arrow-right"></i> </a>
                </div>
            </div>
            <div class="banner-item text-center">
                <div class="banner-inner">
                    <h1 class="title text-white">Learn The <span class="custom-primary">Books</span> And get new knowledge</h1>

                    <a href="<?= base_url() ?>/auth/register" class="btn-custom primary shadow-none">Join us <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

        </div>

    </div>
    <!-- Next Arrow -->
    <i class="slider-next fas fa-arrow-right slick-arrow"></i>
</div>
<!-- Banner End -->

<!-- Categories Section Start -->
<div class="section section-padding ct-categories ct-categories-2">
    <div class="container">
        <div class="row">
            <?php foreach ($buku as $data) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?= base_url() ?>dashboard/user/Peminjaman/getBuku/<?= $data->id_buku ?>" class="ct-category">
                        <div class="ct-category-img">
                            <img src="<?= base_url('assets/dashboard') ?>/docs/assets/img/upload/<?= $data->gambar_buku ?>" class="img-fluid img-thumbnail" alt="category">
                        </div>
                        <div class="ct-category-info">
                            <h5><?= $data->nama_buku ?></h5>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Categories Section End -->

<!-- About Start -->
<section class="section about-sec style-2 pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-wrapper">
                    <img src="<?= base_url('assets/template') ?>/assets/img/about-2.jpg" alt="image">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-title-wrap">
                    <h2 class="title">We Helps You <span class="custom-primary">To Open </span> your Mind</h2>
                    <h3 class="subtitle">Dengan buku kamu dapat mencari hal baru dan belajar hal baru</h3>
                </div>
                <div class="about-content">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="subtitle mb-0">
                                Mengapa kamu harus meminjam buku dari sini?
                            </p>
                            <ul>
                                <li>
                                    <span class="check">
                                        <i class="fas fa-check"></i>
                                    </span> Memudahkan
                                </li>
                                <li>
                                    <span class="check">
                                        <i class="fas fa-check"></i>
                                    </span> Lebih Aman
                                </li>
                                <li>
                                    <span class="check">
                                        <i class="fas fa-check"></i>
                                    </span> fleksibel
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="icon-box">
                                <span>
                                    <i class="flaticon-analytics"></i>
                                </span>
                                <p>Pelayanan lebih baik dan lebih maju</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- About End -->

<!-- Services Start -->
<section class="section section-padding service-sec pt-0">
    <div class="container">
        <div class="section-title-wrap section-header text-center">
            <h2 class="title">Jenis Buku</h2>
            <p>Apa saja jenis buku yang dapat kamu temukan?</p>
        </div>
        <div class="row">
            <?php foreach ($jenis_buku as $data) : ?>
                <div class="col-lg-4 col-md-6">
                    <div class="service-box style-2 mb-30">
                        <div class="d-flex align-items-center">
                            <div class="icon-box">
                                <i class="flaticon-atom"></i>
                            </div>
                            <div class="descr-box">
                                <h3>
                                    <a href="#"><?php echo $data->nama_jenis ?></a>
                                </h3>
                            </div>
                        </div>
                        <!-- <div class="extra-info">
                        <p class="mb-0">Lorem ipsum dolor si amet, dusino situ sint pertinac constituto, mir es dignsius quo great.Lorem Ipsum is simply dummy text of the printing</p>
                    </div> -->
                        <div class="service-link">
                            <a href="<?= base_url('home/daftarBukuPerJenis/' . $data->id_jenis) ?>">
                                <i class="fas fa-plus"></i>
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Services End -->

<!-- Video Style 3 Start -->
<section class="section video-style-3 bg-cover bg-center dark-overlay dark-overlay-2" style="background-image:url('<?= base_url('assets/template') ?>/assets/img/video-2.jpg')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="section-title-wrap">
                    <span class="secondary-title">
                        Get To Know Us
                    </span>
                    <h2 class="title text-white">Kami dapat membantu dalam mencari materi buku </h2>

                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="skill-wrapper">

                    <div class="section-title-wrap">
                        <span class="secondary-title">
                            Kredibelitas
                        </span>
                        <h2 class="title">Kepercayaan Dalam Meminjam Buku</h2>
                        <p class="subtitle mb-0">

                        </p>
                    </div>
                    <div class="progress-bars">
                        <div class="sigma_progress">
                            <h6>Siswa</h6>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                    <span></span>
                                </div>
                            </div>
                            <div class="sigma_progress-count">
                                <span>70%</span>
                            </div>
                        </div>
                        <div class="sigma_progress">
                            <h6>Guru</h6>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                    <span></span>
                                </div>
                            </div>
                            <div class="sigma_progress-count">
                                <span>85%</span>
                            </div>
                        </div>
                        <div class="sigma_progress">
                            <h6>Mahasiswa</h6>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                                    <span></span>
                                </div>
                            </div>
                            <div class="sigma_progress-count">
                                <span>55%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Video Style 3 End -->

<!-- Blog Posts Start -->
<section class="section section-padding posts">
    <div class="container">
        <div class="section-title-wrap section-header">
            <h2 class="title">Trending Books </h2>

        </div>
        <div class="row">



            <?php foreach ($bukuTrending as $data) : ?>
                <!-- Post Start -->
                <div class="col-lg-6 col-md-6">
                    <article class="post">
                        <div class="post-thumbnail">
                            <a href="blog-single-v1.html">
                                <img src="<?= base_url('assets/dashboard') ?>/docs/assets/img/upload/<?= $data->gambar_buku ?>" alt="blog post" class="img-fluid" style="height:300px;width:auto;">
                            </a>
                            <div class="post-meta">
                                <span></span>
                            </div>
                        </div>
                        <div class="post-categories">
                            <a href="<?= base_url() ?>dashboard/user/Peminjaman/getBuku/<?= $data->id_buku ?>">Get Book</a>
                        </div>
                        <div class="post-body">
                            <h5 class="post-title"><?= $data->nama_buku ?> </h5>
                            <p class="post-text"><?= $data->deskripsi_buku ?></p>
                        </div>
                    </article>
                </div>
                <!-- Post End -->
            <?php endforeach; ?>



        </div>
    </div>
</section>
<!-- Blog Posts End -->

<!-- Testimonials Start -->
<section class="section light-bg bg-cover" style="background-image:url('<?= base_url('assets/template') ?>/assets/img/bg/2.jpg')">
    <div class="container">
        <div class="section-title-wrap section-header text-center">
            <h2 class="title">Testimonials</h2>
        </div>

        <div class="ct-testimonials">
            <div class="ct-testimonials-slider">
                <div class="ct-testimonial-item">
                    <div class="ct-testimonial-item-inner">
                        <i class="flaticon-left-quote"></i>
                        <span>Hendra Maulidan</span>
                        <p>
                            Dengan belajar hal baru , kamu seperti menjelajahi dunia baru yang belum pernah kamu temukan .
                        </p>
                    </div>
                </div>
                <div class="ct-testimonial-item">
                    <div class="ct-testimonial-item-inner">
                        <i class="flaticon-left-quote"></i>
                        <span>Riski budiman</span>
                        <p>
                            Walaupun belajar itu terkadang membosankan , tetapi hanya dengan belajar kamu menjadi orang yang lebih tahu hal yang seru .
                        </p>
                    </div>
                </div>
            </div>
            <div class="ct-arrows">
                <i class="slider-prev fas fa-arrow-left slick-arrow"></i>
                <i class="slider-next fas fa-arrow-right slick-arrow"></i>
            </div>
        </div>

    </div>
</section>
<!-- Testimonials End -->

<!-- Instagram Start -->
<div class="insta-sec">
    <div class="container">
        <div class="section-title-wrap section-header text-center">
            <span><i class="fab fa-gallery"></i></span>
            <h2 class="title">Daily Gallery</h2>

        </div>
        <div class="row">
            <div class="col-lg col-md-4 col-sm-4 col-6 p-0">
                <a href="<?= base_url('assets/template') ?>/assets/img/ig/1.jpg" class="ct-ig-item image-popup">
                    <img src="<?= base_url('assets/template') ?>/assets/img/ig/1.jpg" alt="ig">
                </a>
            </div>
            <div class="col-lg col-md-4 col-sm-4 col-6 p-0">
                <a href="<?= base_url('assets/template') ?>/assets/img/ig/2.jpg" class="ct-ig-item image-popup">
                    <img src="<?= base_url('assets/template') ?>/assets/img/ig/2.jpg" alt="ig">
                </a>
            </div>
            <div class="col-lg col-sm-4 col-6 p-0">
                <a href="<?= base_url('assets/template') ?>/assets/img/ig/3.jpg" class="ct-ig-item image-popup">
                    <img src="<?= base_url('assets/template') ?>/assets/img/ig/3.jpg" alt="ig">
                </a>
            </div>
            <div class="col-lg col-md-4 col-sm-4 col-6 p-0">
                <a href="<?= base_url('assets/template') ?>/assets/img/ig/4.jpg" class="ct-ig-item image-popup">
                    <img src="<?= base_url('assets/template') ?>/assets/img/ig/4.jpg" alt="ig">
                </a>
            </div>
            <div class="col-lg col-md-4 col-sm-4 col-6 p-0">
                <a href="<?= base_url('assets/template') ?>/assets/img/ig/5.jpg" class="ct-ig-item image-popup">
                    <img src="<?= base_url('assets/template') ?>/assets/img/ig/5.jpg" alt="ig">
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Instagram Start -->