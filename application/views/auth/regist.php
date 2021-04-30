   <div class="register-box">
       <div class="register-logo">
           <a href=""><b>BUAT AKUN</b></a>
       </div>

       <div class="card">
           <div class="card-body register-card-body">


               <form action="<?= base_url('auth/regist') ?>" method="post">
                   <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                   <div class="input-group mb-3">
                       <input class="form-control" id="name" name="name" type="text" aria-describedby="nameHelp" value="<?= set_value('name') ?>" placeholder="Nama">
                       <div class="input-group-append">
                           <div class="input-group-text">
                               <span class="fas fa-user"></span>
                           </div>
                       </div>
                   </div>
                   <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                   <div class="input-group mb-3">
                       <input class="form-control" id="username" name="username" type="text" aria-describedby="nameHelp" value="<?= set_value('username') ?>" placeholder="Username">
                       <div class="input-group-append">
                           <div class="input-group-text">
                               <span class="fas fa-user"></span>
                           </div>
                       </div>
                   </div>
                   <?= form_error('email', '<small class="text-danger ">', '</small>') ?>
                   <div class="input-group mb-3">
                       <input class="form-control" id="email" name="email" type="email" aria-describedby="emailHelp" value="<?= set_value('email') ?>" placeholder="Alamat Email">
                       <div class="input-group-append">
                           <div class="input-group-text">
                               <span class="fas fa-envelope"></span>
                           </div>
                       </div>
                   </div>
                   <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                   <div class="input-group mb-3">
                       <input class="form-control" id="password1" type="password" name="password1" placeholder="Password">
                       <div class="input-group-append">
                           <div class="input-group-text">
                               <span class="fas fa-lock"></span>
                           </div>
                       </div>
                   </div>
                   <div class="input-group mb-3">
                       <input class="form-control" id="password1=2" type="password" name="password2" placeholder="Konfirmasi Password">
                       <div class="input-group-append">
                           <div class="input-group-text">
                               <span class="fas fa-lock"></span>
                           </div>
                       </div>
                   </div>
                   <div class="row">
                       <!-- /.col -->
                       <div class="col-4">
                           <button type="submit" class="btn btn-primary btn-block">DAFTAR</button>
                       </div>
                       <!-- /.col -->
                   </div>
               </form>

               <a href="<?= base_url('auth') ?>" class="text-center">Sudah Punya Akun? LOGIN</a>
           </div>
           <!-- /.form-box -->
       </div><!-- /.card -->
   </div>