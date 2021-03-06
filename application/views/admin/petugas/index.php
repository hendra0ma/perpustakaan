<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    <div class="card-body">
                        <?php if ($this->session->flashdata('message')) : ?>
                            <div class="alert alert-success alert-dismissible text-light fade show" role="alert">
                                <?= $this->session->flashdata('message') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table" id="datatable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">no</th>
                                        <th scope="col">Nama Petugas</th>
                                        <th scope="col">email</th>
                                        <th scope="col">username</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $i = 1;
                                    foreach ($petugas as $data) :
                                        // for ($a = 0; $a < 100; $a++) :
                                        // $faker = Faker\Factory::create();
                                    ?>

                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><?= $data->nama_petugas ?></td>
                                            <td><?= $data->email ?></td>
                                            <td><?= $data->username ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>dashboard/admin/petugas/delete/<?= $data->id_petugas ?>" class="badge badge-danger" onclick="return window.confirm('yakin?')">Delete</a>
                                                <?php if ($data->status != 2) : ?>

                                                    <a href="<?= base_url() ?>dashboard/admin/petugas/status/aktifkan/<?= $data->id_petugas ?>" class="badge badge-warning">Aktifkan</a>
                                                <?php else : ?>
                                                    <a href="<?= base_url() ?>dashboard/admin/petugas/status/nonaktifkan/<?= $data->id_petugas ?>" class="badge badge-success">Non Aktifkan</a>
                                                <?php endif ?>
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
    </div>
</div>