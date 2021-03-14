<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
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
                    <div class="alert alert-danger alert-dismissible mt-3 fade show text-light" role="alert">
                        <?php echo validation_errors(); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php  } ?>

                <div class="card-body">
                    <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header text-center">
                                <a href="#" class="h3"><b>Ganti Password</b></a>
                            </div>
                            <div class="card-body" style="display: block;">

                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $user->id_user ?>">
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" placeholder="Password anda" name="passlatest">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="badge text-danger"></span>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" name="password" placeholder="password baru">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-unlock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="badge text-danger"></span>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" name="passconf" placeholder="konfirmasi password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-unlock-alt"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="badge text-danger"></span>
                                    <div class="row">
                                        <div class="col-8">

                                        </div>
                                        <!-- /.col -->
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                            </div>
                            <!-- /.form-box -->
                        </div><!-- /.card -->

                    </div>
                </div>
            </div>
        </div>
    </div>