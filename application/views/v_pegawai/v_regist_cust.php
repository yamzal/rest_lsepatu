<div class="container">
<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
<div class="card-body p-0">
  <!-- Nested Row within Card Body -->
  <!-- <div class="row"> -->
      <!-- <div class="col-lg"> -->
          <div class="p-4">
              <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Registrasi Customer</h1>
              </div>
              
            <?= $this->session->flashdata('message'); ?>
              <form class="needs-validation" method="post" action="<?= base_url('Pegawai/registCustomer'); ?>">
                  <div class="col-md-12 order-md-1">

                        <div class="row">
                          <div class="col-md-12 mb-3">
                            <label for="users_nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="users_nama" name="users_nama" value="<?= set_value('users_nama'); ?>">
                            <?= form_error('users_nama','<small class="text-danger ml-3">','</small>'); ?>
                            <div class="invalid-feedback"></div>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="users_email">Email <span class="text-muted"</span></label>
                          <input type="email" class="form-control" id="users_email" name="users_email" placeholder="you@example.com" value="<?= set_value('users_email'); ?>">
                            <?= form_error('users_email','<small class="text-danger ml-3">','</small>'); ?>
                          <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                          <label for="users_password1">Password</label>
                          <input type="password" class="form-control" id="users_password1" name="users_password1">
                          <?= form_error('users_password1','<small class="text-danger ml-3">','</small>'); ?>
                          <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                          <label for="users_password2">Ketik ulang password</label>
                          <input type="password" class="form-control" id="users_password2" name="users_password2">
                          <?= form_error('users_password1','<small class="text-danger ml-3">','</small>'); ?>
                          <div class="invalid-feedback"></div>

                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">registrasi</button>
                    </div>
                </form>
          </div>
      </div>
  </div>
</div>
</div>
</div>
