<!--this is view index page-->

<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('Pegawai/editProfil'); ?>

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
                <label for="users_image" class="col-sm-2 col-form-label">Picture</label>
                <!-- <div class="col-sm-2 col-form-label">Picture</div> -->
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $users['users_image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="users_image" name="users_image">
                                <label class="custom-file-label" for="users_image">Choose file</label>
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
</div>
<!-- /.container-fluid -->
