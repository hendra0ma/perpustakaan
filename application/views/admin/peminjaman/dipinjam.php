<div class="container">
    <div class="row mb-2 mt-3">
        <div class="col-lg-2  col-md-2">
            <a href="#" class="btn btn-warning" onclick="return window.print()"><i class="fas fa-file-download"></i> Print</a>
        </div>
        <div class="col-lg-2 col-md-2">
            <a href="<?= base_url('dashboard/admin/export/generateBukuDipinjam') ?>" class="btn btn-light"><i class="fas fa-file"></i> Export PDF</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            By Admin
        </div>
        <div class="card-body">
            <?php if ($this->session->flashdata('message')) { ?>
                <div class="alert alert-success alert-dismissible mt-3 fade show text-light" role="alert">
                    <?= $this->session->flashdata('message') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php  } ?>
            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger alert-dismissible mt-3 fade show text-light" role="alert">
                    <ul>
                        <li><?= $this->session->flashdata('error') ?></li>
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php  } ?>
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Nama Buku</th>
                            <th scope="col">Peminjam</th>

                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal harus Kembali</th>
                            <th scope="col">Jumlah Pinjam</th>

                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dipinjam as $data) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $data->kode_buku ?></td>
                                <td><?= $data->nama_buku ?></td>
                                <td><?= $data->username ?></td>
                                <td><?= $data->tanggal_pinjam ?></td>
                                <td><?= $data->tanggal_harus_kembali ?></td>
                                <td><?= $data->jumlah_pinjam ?></td>
                                <td>
                                    <a href="<?= base_url() ?>dashboard/admin/peminjaman/actKembalikan/<?= $data->id_peminjaman ?>/dikembalikan" class="badge badge-success">Di Kembalikan</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            By petugas
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Nama Buku</th>
                            <th scope="col">Peminjam</th>
                            <th scope="col">petugas</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal harus Kembali</th>
                            <th scope="col">Jumlah Pinjam</th>
                            <th scope="col">Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dipinjamBypetugas as $data) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $data->kode_buku ?></td>
                                <td><?= $data->nama_buku ?></td>
                                <td><?= $data->username ?></td>
                                <td><?= $data->nama_petugas ?></td>
                                <td><?= $data->tanggal_pinjam ?></td>
                                <td><?= $data->tanggal_harus_kembali ?></td>
                                <td><?= $data->jumlah_pinjam ?></td>
                                <td>
                                    <a href="<?= base_url() ?>dashboard/admin/peminjaman/actKembalikan/<?= $data->id_peminjaman ?>/dikembalikan" class="badge badge-success">Di Kembalikan</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>