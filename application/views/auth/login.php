<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>LOGIN</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">

            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('auth') ?>" method="post">
                <?= form_error('username', '<small class="text-danger ">', '</small>'); ?>
                <div class="input-group mb-3">
                    <input class="form-control" id="username" name="username" type="text" aria-describedby="emailHelp" value="<?= set_value('username') ?>" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password', '<small class="text-danger ">', '</small>'); ?>
                <div class="input-group mb-3">
                    <input class="form-control" id="password" name="password" type="password" value="<?= set_value('password') ?>" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="forgot-password.html">Lupa PAssword</a>
            </p>
            <p class="mb-0">
                <a href="<?= base_url('auth/regist') ?>" class="text-center">Buat Akun?</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->