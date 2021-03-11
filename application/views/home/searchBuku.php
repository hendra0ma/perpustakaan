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