<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="description" content="Produk By instagram.com/farhan_rizal_h/">
    <meta name="author" content="Farhan Rizal Hidayat">
    <title>Transaksi Penjualan</title>


    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">


</head>

<body>

    <!-- Navigation -->
    <?php
    // $this->load->view('admin/navbar');
    // $this->load->view('V_partials/v_sidebar');
    ?>


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-12">
                <center>flashdata()</center>
                <h1 class="page-header">Transaksi Masuk
                    <small>!</small>
                    <a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Cari Paket!</small></a>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo base_url().'admin/transaksi_masuk/add_to_cart'?>" method="post">
                    <table>
                        <tr>
                            <th>Kode Paket</th>
                        </tr>
                        <tr>
                            <th><input type="text" name="kode_paket" id="kode_paket" placeholder="Masukkan kode paket" class="form-control input-sm"></th>
                        </tr>

                    </table>
                    <table>
                        <div id="detail_paket" style="position:absolute;">

                        </div>
                    </table>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </form>
                <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                    <thead>
                        <tr>
                            <th>Kode paket</th>
                            <th>Nama paket</th>
                            <th style="text-align:center;">Satuan</th>
                            <th style="text-align:center;">Harga(Rp)</th>
                            <th style="text-align:center;">Qty</th>
                            <th style="text-align:center;">Sub Total</th>
                            <th style="width:75px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($this->cart->contents() as $items): ?>
                        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                        <tr>
                            <td><?=$items['id'];?></td>
                            <td><?=$items['name'];?></td>
                            <td style="text-align:center;"><?=$items['satuan'];?></td>
                            <td style="text-align:center;"><?php echo number_format($items['price']);?></td>
                            <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                            <td style="text-align:center;"><?php echo number_format($items['subtotal']);?></td>
                            <td style="text-align:center;"><a href="<?php echo base_url().'admin/transaksi_masuk/remove/'.$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form action="<?php echo base_url().'admin/transaksi_masuk/simpan_transaksi_masuk'?>" method="post">
                    <table align="right">
                        <tr>
                            <!-- <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg"> Simpan</button></td> -->
                            <th style="width:140px;">Total Sepatu</th>
                            <th style="text-align:right;width:140px;"><input type="text" name="total_sepatu" value="<?php echo number_format($this->cart->total_items());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                            <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                        </tr>
                        <tr>
                            <!-- <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg"> Simpan</button></td> -->
                            <th style="width:140px;">Total Belanja(Rp)</th>
                            <th style="text-align:right;width:140px;"><input type="text" name="total" value="<?php echo number_format($this->cart->total());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                            <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <th style="text-align:right;"><input type="text" id="keterangan" name="keterangan" class="form-control input-sm" style="text-align:right;margin-bottom:5px;"></th>
                            <!-- <th style=""><textarea name="keterangan" class="form-control" rows="3"></textarea></th> -->

                        </tr>
                        <tr>
                            <th>ID Member</th>
                            <th style="text-align:right;"><input type="text" id="id_member" name="id_member" class="form-control input-sm" placeholder="Jika tidak ada isi 0" value="0" style="margin-bottom:5px;"></th>

                        </tr>
                        <tr>
                            <th>Nama</th>
                            <th style="text-align:right;"><input type="text" id="nama" name="nama" class="form-control input-sm" style="margin-bottom:5px;" required></th>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th style="text-align:right;"><input type="text" id="alamat" name="alamat" class="form-control input-sm" style="margin-bottom:5px;" required></th>
                        </tr>
                        <tr>
                            <th>No Telp/WA</th>
                            <th style="text-align:right;"><input type="text" id="telp" name="telp" class="form-control input-sm" style="margin-bottom:5px;" required></th>
                        </tr>

                        <tr align="right">
                            <th>
                                <br>
                            <td style="width:60px;"><button type="submit" class="btn btn-info btn-lg"> S I M P A N</button></td>
                            </th>

                        </tr>


                      <!-- <tr>
                    <th></th>
                    <th>Kembalian(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                    </tr> -->
                    </table>


                </form>
              </hr>
            </div>
            <!-- /.row -->

            <!-- ============ MODAL ADD ============ -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Data Paket</h3>
                        </div>
                        <div div class="modal-body" style="overflow:scroll;height:500px;">
                            <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                                <thead>
                                    <tr>
                                        <!-- <th style="text-align:center;width:40px;">No</th> -->
                                        <th style="width:120px;">Kode Paket</th>
                                        <th style="width:240px;">Nama Paket</th>
                                        <th>Satuan</th>
                                        <th style="width:100px;">Harga </th>

                                        <th style="width:100px;text-align:center;">Aksi</th>

                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
									$no=0;
									foreach ($data->result_array() as $a):
										$no++;
										$id=$a['paket_id'];
                            			$nm=$a['paket_nama'];
			                            $satuan=$a['paket_satuan'];
			                            $harga=$a['paket_harga'];

									 ?>
                                    <tr>
                                        <!-- <td style="text-align:center;"><?php echo $no;?></td> -->
                                        <td><?php echo $id;?></td>
                                        <td><?php echo $nm;?></td>
                                        <td style="text-align:center;"><?php echo $satuan;?></td>
                                        <td style="text-align:right;"><?php echo 'Rp '.number_format($harga);?></td>
                                        <!-- <td style="text-align:center;"><?php echo $stok;?></td> -->
                                        <td style="text-align:center;">
                                            <form action="<?php echo base_url().'admin/transaksi_masuk/add_to_cart'?>" method="post">
                                                <input type="hidden" name="kode_paket" value="<?php echo $id?>">
                                                <input type="hidden" name="paket_nama" value="<?php echo $nm;?>">
                                                <input type="hidden" name="satuan" value="<?php echo $satuan;?>">

                                                <input type="hidden" name="harga" value="<?php echo number_format($harga);?>">

                                                <input type="hidden" name="qty" value="1" required>
                                                <button type="submit" class="btn btn-xs btn-info" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--END MODAL-->

        </div>

    </div>
    <!-- /.container -->




    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <hr>
                <p style="text-align:center;">Copyright &copy; <?php echo '2019';?> by Farhan</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>










    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>


    <!-- <script type="text/javascript">
        $(document).ready(function(){
             $('#kode').on('input',function(){

                var kode=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('admin/transaksi_masuk/get_barang')?>",
                    dataType : "JSON",
                    data : {kode: kode},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kode, nama_barang, harga, satuan){
                            $('[name="nama"]').val(data.nama_barang);
                            $('[name="harga"]').val(data.harga);
                            $('[name="satuan"]').val(data.satuan);

                        });

                    }
                });
                return false;
           });

        });
    </script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#idm').on('input', function() {

                var kode = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('admin/transaksi_masuk/get_member')?>",
                    dataType: "JSON",
                    data: {
                        kode: kode
                    },
                    cache: false,
                    success: function(data) {
                        $.each(data, function(user_id, user_nama, user_alamat, user_no_telp) {
                            //$('[name="id_member"]').val(data.user_id);
                            $('[name="nama"]').val(data.user_nama);
                            $('[name="alamat"]').val(data.user_alamat);
                            $('[name="telp"]').val(data.user_no_telp);

                        });

                    }
                });
                return false;
            });

        });

    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        });

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            //Ajax kabupaten/kota insert
            $("#kode_paket").focus();
            $("#kode_paket").on("input", function() {
                var kopak = {
                    kode_paket: $(this).val()
                };
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url().'admin/transaksi_masuk/get_paket';?>",
                    data: kopak,
                    success: function(msg) {
                        $('#detail_paket').html(msg);
                    }
                });
            });

            // $("#kode_brg").keypress(function(e){
            //     if(e.which==13){
            //         $("#jumlah").focus();
            //     }
            // });
        });

    </script>


    </script>
</body>
</html>
