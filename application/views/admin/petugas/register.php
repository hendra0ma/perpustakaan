<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <div class="row  justify-content-center">
                            <div class="col-md-4">
                                <div class="register-box">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header text-center">
                                            <a href="<?= base_url() ?>dashboard/admin/petugas/index" class="h1"><b>Petugas</b></a>
                                        </div>
                                        <div class="card-body">
                                            <p class="login-box-msg">Daftar Petugas Baru</p>
                                            <form action="" method="post">

                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Full name" name="nama_petugas">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-user"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="badge text-danger"><?php echo form_error('nama_petugas'); ?></span>
                                                <div class="input-group mb-3">
                                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-envelope"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="badge text-danger"><?php echo form_error('email'); ?></span>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-user"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="badge text-danger"><?php echo form_error('username'); ?></span>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-lock"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="badge text-danger"><?php echo form_error('password'); ?></span>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" name="passconf" placeholder="Retype password">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-lock"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="badge text-danger"><?php echo form_error('passconf'); ?></span>
                                                <div class="row">
                                                    <div class="col-8">

                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-4">
                                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
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
            </div>
        </div>
    </div>
</div>