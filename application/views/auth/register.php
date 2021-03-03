<section class="section auth-section bg-cover bg-dark">
    <div class="container">
        <form class="auth-form light-bg" method="post" style="background-image: url('assets/img/bg/5.jpg')">
            <h1>Register</h1>
            <?php
            if ($this->session->flashdata('message')) { ?>
                <div class="alert alert-warning alert-dismissible mt-3 fade show" role="alert">
                    <?= $this->session->flashdata('message') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php  }

            if (validation_errors()) { ?>
                <div class="alert alert-warning alert-dismissible mt-3 fade show" role="alert">
                    <?= validation_errors() ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <div class="form-group">
                <label>nama lengkap</label>
                <input type="text" class="form-control" placeholder="nama_lengkap" name="nama_lengkap" value="">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Username" name="username" value="">
            </div>
            <div class="form-group">
                <label>no hp</label>
                <input type="text" class="form-control" placeholder="no hp" name="telp" value="">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Email Address" name="email" value="">
            </div>
            <div class="form-group">
                <label>alamat</label>
                <input type="text" class="form-control" placeholder="alamat" name="alamat" value="">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" value="">
            </div>
            <div class="form-group">
                <label>Password Konfirmasi</label>
                <input type="password" class="form-control" placeholder="Password konfirmasi" name="passconf" value="">
            </div>
            <div class="auth-controls form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                    <label class="custom-control-label fw-400" for="rememberMe">Agree to our <a href="#" class="btn-link">terms &amp; conditions</a> </label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-custom primary btn-block">Sign Up</button>
            </div>
            <p class="form-group text-center">Already have an account? <a href="<?= base_url('auth') ?>" class="btn-link">Login</a> </p>
        </form>
    </div>
</section>