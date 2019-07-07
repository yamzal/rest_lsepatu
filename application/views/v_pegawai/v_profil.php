<!--this is view index page-->

<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profil/') . $users['users_image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $users['users_nama']; ?></h5>
                    <p class="card-text"><?= $users['users_email']; ?></p>
                    <!-- <p class="card-text"><small class="text-muted">Member sejak<?//=// date('d F Y', $users['users_tanggal']); ?></small></p> -->
                    <p class="card-text"><small class="text-muted">Member sejak <?= ($users['users_tanggal']); ?></small></p>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row"> -->
        <div class="col-lg-8 mt-5">

            <?= form_open_multipart('Pegawai/profil'); ?>

            <div class="form-group row">
                <label for="users_email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="users_email" name="users_email" value="<?= $users['users_email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="users_nama" class="col-sm-2 col-form-label">Fullname</label>
                <!-- <div class="col-sm-2 col-form-label">Fullname</div> -->

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="users_nama" name="users_nama" value="<?= $users['users_nama'];?>">
                    <?= form_error('users_nama', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="users_image" class="col-sm-2 col-form-label">Foto Profil</label>
                <!-- <div class="col-sm-2 col-form-label">Picture</div> -->
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profil/') . $users['users_image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="users_image" name="users_image">
                                <label class="custom-file-label" for="users_image">Pilih Foto</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>

            </form>

        </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>
