<div class="container">
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> Library
                    <small class="float-right">Date: <?= date('Y-m-d') ?></small>
                </h4>
            </div>
            <!-- /.col -->
        </div>


        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Jumlah</th>
                            <th>Product</th>
                            <th>id data keranjang</th>
                            <th>Gambar Buku</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $i = 1;
                        foreach ($this->cart->contents() as $item) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $item['qty'] ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['id'] ?></td>
                                <td>
                                    <a href="#showModal" data-toggle="modal" class="btn btn-success lihat-gambar" data-id="<?= $item['option']['id_buku'] ?>">
                                        lihat Gambar
                                    </a>
                                </td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">


                <a href="<?= base_url() ?>/dashboard/user/peminjaman/submitCheckout" class="btn btn-success float-right">
                    <i class="far fa-check-square"></i> Submit
                </a>




                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                </button>
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

</div>