<div class="container">
    <div class="card">
        <div class="card-body">
            <a href="<?= base_url() ?>dashboard/admin/admin/tambahBuku" class="btn btn-primary mb-2 mt-2 float-right">
                tambah buku
            </a>
            <div class="table-responsive">
                <table class="table table-borderede" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">no</th>
                            <th scope="col">kode buku</th>
                            <th scope="col">nama buku</th>
                            <th scope="col">jenis</th>
                            <th scope="col">kondisi</th>
                            <th scope="col">gambar buku</th>
                            <th scope="col">stock</th>
                            <th scope="col">deskripsi</th>
                            <th>action</th>
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
                                <td><?= $data->nama_jenis ?></td>
                                <?php if ($data->kondisi == "baik") { ?>
                                    <td>baik</td>
                                <?php } else if ($data->kondisi == "kurang_baik") { ?>
                                    <td>kurang baik</td>
                                <?php } else if ($data->kondisi == "buruk") { ?>
                                    <td>buruk</td>
                                <?php } else { ?>
                                    <td>baik</td>
                                <?php } ?>

                                <td>
                                    <a href="#showModal" data-toggle="modal" class="btn btn-success lihat-gambar" data-id="<?= $data->id_buku ?>">
                                        lihat Gambar
                                    </a>
                                </td>
                                <td><?= $data->stock_buku ?></td>
                                <td style="width: 10em;overflow: hidden;text-overflow: ellipsis;"><?= $data->deskripsi_buku ?></td>
                                <td>
                                    <a href="<?= base_url() ?>dashboard/admin/admin/deleteBuku/<?= $data->id_buku ?>" class="badge badge-danger mr-1" onclick="return window.confirm('yakin?')">hapus</a>
                                    <a href="<?= base_url() ?>dashboard/admin/admin/editBuku/<?= $data->id_buku ?>" class="badge badge-primary">edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class=" modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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