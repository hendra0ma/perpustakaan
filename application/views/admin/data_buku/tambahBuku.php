<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <strong>
                    <h2 class="alert alert-dark">Tambah Buku</h2>
                </strong>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
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
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_buku">nama Buku</label>
                            <input type="text" class="form-control" id="nama_buku" name="nama_buku" placeholder="nama buku">
                            <div class="badge text-danger"><?= form_error('nama_buku') ?></div>
                        </div>
                        <div class="form-group">
                            <label for="kode_buku">Kode Buku</label>
                            <input type="text" class="form-control" id="kode_buku" name="kode_buku" placeholder="kode buku">
                            <div class="badge text-danger"><?= form_error('kode_buku') ?></div>
                        </div>
                        <div class="form-group">
                            <label for="kondisi">kondisi buku</label>
                            <select  class="form-control" id="kondisi" name="kondisi" >
                                <option value="baik">baik</option>
                                <option value="kurang_baik">kurang baik</option>
                                <option value="buruk">buruk</option>
                            </select>
                            <div class="badge text-danger"><?= form_error('kondisi') ?></div>
                        </div>
                        <div class="form-group">
                            <label for="jenis">jenis</label>
                            <select class="form-control" id="jenis" name="id_jenis">
                                <?php foreach ($jenis_buku as $data) { ?>
                                    <option value="<?= $data->id_jenis ?>"><?= $data->nama_jenis ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputGroupFile01">Gambar Buku</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="gambar_buku">
                                <label class="custom-file-label" for="inputGroupFile01">Pilih gambar</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stock_buku">Stock buku</label>
                            <input type="number" class="form-control" id="stock_buku" name="stock_buku" placeholder="stock buku">
                            <div class="badge text-danger"><?= form_error('stock_buku') ?></div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_buku">deskripsi buku</label>
                            <textarea class="form-control" id="deskripsi_buku" name="deskripsi_buku" placeholder="deskripsi buku" cols="30" rows="10"></textarea>
                            <div class="badge text-danger"><?= form_error('deskripsi_buku') ?></div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <center>
                <img src="<?= base_url() ?>assets/dashboard/docs/assets/img/image-default.png" alt="Image Admin" class="img-fluid image" style="height:350px !important;border-radius:10px;">
            </center>
        </div>
    </div>

</div>