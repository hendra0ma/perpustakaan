<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= $jumlah_dipinjam ?></h3>

                    <p>Jumlah Buku Dipinjam</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?= base_url() ?>/dashboard/admin/admin/jenisBuku" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <!-- ./col -->

        <!-- ./col -->
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">


                <div class="table-responsive">
                    <table class="table table-borderede" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Buku</th>
                                <th scope="col">Nama Buku</th>
                                <th scope="col">Gambar Buku</th>
                                <th scope="col">Peminjam</th>

                                <th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Tanggal Harus Kembali</th>
                                <th scope="col">Tanggal Kembali</th>
                                <th scope="col">Jumlah Pinjam</th>
                                <th scope="col">status</th>
                                <th scope="col">action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($buku as $data) : ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $data->kode_buku ?></td>
                                    <td><?= $data->nama_buku ?></td>
                                    <td><a href="#showModal" data-toggle="modal" class="btn btn-success lihat-gambar" data-id="<?= $data->id_buku ?>">
                                            lihat Gambar
                                        </a></td>
                                    <td><?= $data->nama_lengkap ?></td>

                                    <td><?= $data->tanggal_pinjam ?></td>
                                    <td><?= $data->tanggal_harus_kembali ?></td>
                                    <td><?= $data->tanggal_kembali ?></td>
                                    <td><?= $data->jumlah_pinjam ?></td>
                                    <td>
                                        <?php
                                        if ($data->status_peminjaman == null) { ?>
                                            <div class="badge badge-secondary">belum di acc</div>
                                        <?php } else if ($data->status_peminjaman == "dipinjam") { ?>
                                            <div class="badge badge-primary">Sedang anda pinjam</div>
                                        <?php } else if ($data->status_peminjaman == "dikembalikan") { ?>
                                            <div class="badge badge-success">buku telah anda kembalikan</div>
                                        <?php } else if ($data->status_peminjaman == "lewatTenggangWaktu") { ?>
                                            <div class="badge badge-success">buku telah lewat tenggang waktu</div>
                                        <?php } else echo "error"; ?>
                                    </td>
                                    <td>
                                        <?php if ($data->status_peminjaman == null) { ?>
                                            <a href="<?= base_url() ?>dashboard/user/peminjaman/cancelAcc/<?= $data->id_peminjaman ?>" class="badge badge-danger">
                                                delete
                                            </a>
                                        <?php } ?>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

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