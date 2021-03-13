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

            <?php if (validation_errors()) { ?>
                <div class="alert alert-warning alert-dismissible mt-3 fade show" role="alert">
                    <?= validation_errors() ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <div class="row mb-2 mt-3">
                <div class="col-lg-2  col-md-2">
                    <a href="#" class="btn btn-warning" onclick="return window.print()"><i class="fas fa-file-download"></i> Print</a>
                </div>
                <div class="col-lg-2 col-md-2">
                    <a href="<?= base_url('dashboard/petugas/export/generateJenis') ?>" class="btn btn-light"><i class="fas fa-file"></i> Export PDF</a>
                </div>
                <div class="col-lg-2 col-md-2">
                    <a href="#showModal" id="tombol_tambah_jenis" data-toggle="modal" class="btn btn-primary mb-2 mt-2 float-right">
                        Tambah Jenis
                    </a>
                </div>
            </div>


            <div class="table-responsive">
                <table class="table table-borderede" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">no</th>
                            <th scope="col">jenis buku</th>

                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($jenis_buku as $data) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $data->nama_jenis ?></td>
                                <td> <?php
                                        $buku = $this->Buku_models->getBukuByidJenis($data->id_jenis);
                                        if (empty($buku)) : ?>
                                        <a href="<?= base_url() ?>dashboard/petugas/petugas/deleteJenis/<?= $data->id_jenis ?>" class="badge badge-danger mr-1" onclick="return window.confirm('yakin?')">hapus</a>
                                    <?php endif; ?>
                                    <a href="#showModal" data-toggle="modal" data-id="<?= $data->id_jenis ?>" class="badge badge-primary edit">edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php $buku = null; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class=" modal fade" id="showModal" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Tambah data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>dashboard/petugas/petugas/tambahJenis" method="post" id="formJenis">
                <div class="modal-body">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="nama_jenis">Nama Jenis</label>
                            <input type="hidden" value="" class="hidden id" name="id">
                            <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" placeholder="nama jenis">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="submit">
                </div>
            </form>
        </div>
    </div>
</div>