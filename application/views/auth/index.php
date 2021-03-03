<!-- Login FormStart -->
<section class="section auth-section bg-cover bg-dark">
    <div class="container bg">

        <form class="auth-form light-bg bg-light" action="<?= base_url("auth/doLogin") ?>" method="post">
            <h1>Login</h1>
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
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Username" name="username" value="">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" value="">
            </div>
            <div class="form-group">
                <label>Login Sebagai</label>
                <select name="sebagai" class="form-control" id="">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-custom primary btn-block">Login</button>
            </div>
            <p class="form-group text-center">Don't have an account? <a href="<?= base_url('auth/register') ?>" class="btn-link">Create One</a> </p>
        </form>
    </div>
</section>
<!-- Login Form End -->