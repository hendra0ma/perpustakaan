<div class="container">
    <div class="card">
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
                <table class="table table-borderede" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Nama Buku</th>
                            <th scope="col">Peminjam</th>
                            <th scope="col">Petugas</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal Harus Kembali</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col">Jumlah Pinjam</th>

                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($lewatWaktuTenggang as $data) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $data->kode_buku ?></td>
                                <td><?= $data->nama_buku ?></td>
                                <td><?= $data->username ?></td>
                                <td><?= $data->nama_petugas ?></td>
                                <td><?= $data->tanggal_pinjam ?></td>
                                <td><?= $data->tanggal_harus_kembali ?></td>
                                <td><?= $data->tanggal_kembali ?></td>
                                <td><?= $data->jumlah_pinjam ?></td>
                                <td>
                                    <a href="<?= base_url() ?>dashboard/admin/peminjaman/actKembalikan/<?= $data->id_peminjaman ?>" class="badge badge-success">Di Kembalikan</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>