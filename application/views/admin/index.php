<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= $jumlah_jenis_buku ?></h3>

                    <p>Jenis Buku</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?= base_url() ?>/dashboard/admin/admin/jenisBuku" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= count($buku) ?></h3>

                    <p>Buku</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?= base_url() ?>/dashboard/admin/admin/dataBuku" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $jumlah_petugas ?></h3>

                    <p>Petugas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?= base_url() ?>/dashboard/admin/petugas/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3><?= $jumlah_user ?></h3>
                    <p>User</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderede" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">no</th>
                            <th scope="col">nama buku</th>
                            <th scope="col">jenis</th>
                            <th scope="col">gambar buku</th>
                            <th scope="col">deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($buku as $data) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $data->nama_buku ?></td>
                                <td><?= $data->nama_jenis ?></td>
                                <td><a href="#showModal" data-toggle="modal" class="btn btn-success lihat-gambar" data-id="<?= $data->id_buku ?>">
                                        lihat Gambar
                                    </a></td>
                                <td><?= $data->deskripsi_buku ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <center>
                        <img src="<?= base_url() ?>assets/dashboard/docs/assets/img/image-default.png" alt="Image Admin" class="img-fluid image" style="height:350px !important;border-radius:10px;">
                    </center>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>