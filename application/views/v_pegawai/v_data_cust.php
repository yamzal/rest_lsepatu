<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="description" content="Produk By instagram.com/farhan_rizal_h/">
    <meta name="author" content="Farhan Rizal Hidayat">

    <title><?= $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?= base_url().'assets/css/style.css'?>" rel="stylesheet">
    <link href="<?= base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?= base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?= base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?= base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">

</head>

<body>

<?php
$this->load->view('v_partials/v_sidebar');
?>

    <!-- page content -->
    <div class="container">
        <!-- page heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $title; ?></h1>

            </div>
        </div>

        <div class="mainbody-section text-center">
            <div class="row">
                <div class="section">
                    <table class="table table-bordered ml-3">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Customer</th>
                                <th scope="col">Tanggal Daftar</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Email</th>
                                <th scope="col">Foto</th>
                                <!-- <th scope="col">Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        $no = 1;
                        foreach($customer as $c):
                        ?>
                            <tr>
                                <td style="text-align:center;"><?= $no++; ?></td>
                                <td><?= $c['users_id']; ?></td>
                                <td><?= $c['users_tanggal']; ?></td>
                                <td><?= $c['users_nama']; ?></td>
                                <td><?= $c['users_email']; ?></td>
                                <td>
                                  <?//= base_url('assets/img/profil/') . $c['users_image']; ?>

                                  <img class="rounded-circle" style="width:70px"  src="<?= base_url('assets/img/profil/') . $c['users_image']; ?>">
                                </td>
                                <!-- <td>
                                    <a href="<?//= base_url('admin/data_pengeluaran/edit/'.$p->pengeluaran_id);  ?>" class="btn btn-success btn-sm mr-2">Edit</a>
                                    <a href="<?//= base_url('admin/data_pengeluaran/hapus/'.$p->pengeluaran_id);  ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td> -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="<?= base_url().'assets/js/jquery.js'?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="<?= base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?= base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?= base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?= base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?= base_url().'assets/js/jquery.price_format.min.js'?>"></script>
    <script src="<?= base_url().'assets/js/moment.js'?>"></script>
    <script src="<?= base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>

</body>

</html>
