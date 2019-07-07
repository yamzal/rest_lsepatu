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


    <?php
		error_reporting(0);
		$tm=$kode_tm->row_array();
	?>


		<!-- Navigation -->
		<?php
					// $this->load->view('admin/navbar');
					// $this->load->view('V_partials/v_sidebar');
		 ?>


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Transaksi Keluar
                    <small>!</small>
                    <a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Cari Kode Transaksi Masuk</small></a>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">

                <form action="<?php echo base_url().'admin/transaksi_keluar'?>" method="post">
                    <table>
                        <tr>
                            <th>Kode Transaksi Masuk</th>
                        </tr>
                        <tr>
                            <th><input type="text" name="kode_tm" id="kode_tm" placeholder="Masukkan kode transaksi masuk" style="width:208px;" class="form-control input-sm"></th>
                        </tr>

                    </table>
                    <table>
                        <div id="detail_kode_tm" style="position:absolute;">

                        </div>
                    </table>
                    <br>



                    <h1><?php echo $tm['tm_status_bayar'];?></h1>
                    <br>
                </form>
                <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                    <thead>
                        <tr>
                            <th>Kode Transaksi Masuk</th>
                            <th>Nama paket</th>
                            <th style="text-align:center;">Satuan</th>
                            <th style="text-align:center;">Harga(Rp)</th>
                            <th style="text-align:center;">Qty</th>
                            <th style="text-align:center;">Sub Total</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
									//$no=0;
									foreach ($kode_dtm->result_array() as $a):
										//$no++;
										$id=$a['dtm_nofak'];
                            			$nama=$a['dtm_paket_nama'];
			                            $satuan=$a['dtm_satuan'];
			                            $Harga=$a['dtm_harga'];
			                            $Qty=$a['dtm_qty'];
			                            $Sub_Total=$a['dtm_total'];
									 ?>
                        <tr>
                            <td><?php echo $id;?></td>
                            <td><?php echo $nama;?></td>
                            <td style="text-align:center;"><?php echo $satuan;?></td>
                            <td style="text-align:center;"><?php echo number_format($Harga);?></td>
                            <td style="text-align:center;"><?php echo number_format($Qty);?></td>
                            <td style="text-align:center;"><?php echo number_format($Sub_Total);?></td>

                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <!-- <thead>
						<tr>
							<th>Kode Transaksi Masuk</th>
							<th>Nama paket</th>
							<th style="text-align:center;">Satuan</th>
                        	<th style="text-align:center;">Harga(Rp)</th>
                        	<th style="text-align:center;">Qty</th>
                        	<th style="text-align:center;">Sub Total</th>

						</tr>
					</thead>
					<tbody>


					<tr>
						<td><input type="" name="kode_dtm"></td>
						<td><input type="" name="nama_paket"></td>
						<td style="text-align:center;"><input type="satuan" name=""></td>
						<td style="text-align:center;"><input type="" name="harga"></td>
						<td style="text-align:center;"><input type="" name="qty"></td>
						<td style="text-align:center;"><input type="" name="subtotal"></td>

					</tr>

					</tbody> -->
                </table>

                <form action="<?php echo base_url().'admin/transaksi_keluar/simpan_transaksi_keluar'?>" method="post">
                    <table align="right">
                        <tr>
                            <!-- <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg"> Simpan</button></td> -->
                            <th style="width:140px;">Total Sepatu</th>
                            <th style="text-align:right;width:140px;"><input type="text" name="total_sepatu2" value="<?php echo $tm['tm_total_sepatu'];?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                            <input type="hidden" id="total_sepatu" name="total_sepatu" value="<?php echo $tm['tm_total_sepatu'];?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                        </tr>
                        <tr>
                            <!-- <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg"> Simpan</button></td> -->
                            <th style="width:140px;">Total Belanja(Rp)</th>
                            <th style="text-align:right;width:140px;"><input type="text" id="total" name="total" value="<?php echo $tm['tm_total'];?>" class="total form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                            <input type="hidden" id="total2" name="total2" value="<?php echo $tm['tm_total'];?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                        </tr>
                        <tr>
                            <th>Tunai(Rp)</th>
                            <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                            <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                        </tr>

                        <tr>
                            <th>Kembalian(Rp)</th>
                            <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="kembalian form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>


                        </tr>

                        <tr>
                            <!-- <th>ID Member</th> -->
                            <th style="text-align:right;"><input type="hidden" id="idm" name="idm" value="<?php echo $tm['tm_total'];?>" class="form-control input-sm" placeholder="" style="margin-bottom:5px;text-align:right;"></th>

                        </tr>
                        <tr>
                            <th>Atas Nama</th>
                            <th style="text-align:right;"><input type="text" id="nama" name="nama" value="<?php echo $tm['tm_nama'];?>" class="form-control input-sm" style="margin-bottom:5px;text-align:right;" required></th>
                        </tr>

                        <tr>
                            <!-- <th>ID Member</th> -->
                            <th style="text-align:right;"><input type="hidden" id="tm_nofak" name="tm_nofak" value="<?php echo $tm['tm_nofak'];?>" class="form-control input-sm" placeholder="" style="margin-bottom:5px;text-align:right;"></th>

                        </tr>

                        <tr align="right">
                            <th>
                                <br>
                            <td style="width:60px;"><button type="submit" class="btn btn-info btn-lg"> S I M P A N</button></td>
                            </th>
                        </tr>

                    </table>


                </form>
                <hr />
            </div>
            <!-- /.row -->

            <!-- ============ MODAL ADD ============ -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Data Transaksi Masuk!</h3>
                        </div>
                        <div div class="modal-body" style="overflow:scroll;height:500px;">
                            <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                                <thead>
                                    <tr>
                                        <th style="width:120px;">Kode Transaksi Masuk</th>
                                        <th style="width:30px;">Total Sepatu</th>
                                        <th style="width:150px;">Total Harga</th>
                                        <th style="width:100px;">Nama Pelanggan</th>
                                        <th style="width:100px;">Status</th>

                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
									$no=0;
									foreach ($data->result_array() as $a):
										$no++;
										$id=$a['tm_nofak'];
                            			$total_sepatu=$a['tm_total_sepatu'];
			                            $total=$a['tm_total'];

			                            $nama_pelanggan=$a['tm_nama'];
			                            $tm_status=$a['tm_status'];

									 ?>
                                    <tr>
                                        <td><?php echo $id;?></td>
                                        <td style="text-align:right;"><?php echo $total_sepatu;?></td>
                                        <td style="text-align:right;"><?php echo 'Rp '.number_format($total);?></td>
                                        <td style="text-align:right;"><?php echo $nama_pelanggan;?></td>
                                        <td style="text-align:right;"><?php echo $tm_status;?></td>

                                        <!-- <td><button type="submit" class="btn btn-sm btn-primary">Ok</button></td> -->
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

            <!-- ============ MODAL ADD =============== -->
            <div class="modal fade" id="lap_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                        </div>

                    </div>
                </div>
            </div>

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


    <script type="text/javascript">
        $(function() {
            $('#jml_uang').on("input", function() {
                var total = $('#total').val();
                var jumuang = $('#jml_uang').val();
                var hsl = jumuang.replace(/[^\d]/g, "");
                $('#jml_uang').val(hsl);
                $('#kembalian').val(hsl - total);
            })

        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        });

    </script>
    <script type="text/javascript">
        $(function() {
            $('.jml_uang').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ','
            });
            $('#.jml_uang2').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ''
            });
            $('#.kembalian').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ','
            });
            $('.total').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ','
            });
        });

    </script>

    <!-- <script type="text/javascript">
        $(document).ready(function(){
             $('#idm').on('input',function(){

                var kode=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('admin/transaksi_masuk/get_member')?>",
                    dataType : "JSON",
                    data : {kode: kode},
                    cache:false,
                    success: function(data){
                        $.each(data,function(user_id, user_nama, user_alamat, user_no_telp){
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
    </script> -->

    <!-- <script type="text/javascript">
        $(document).ready(function(){
             $('#kode_tm').on('input',function(){

                var kode_tm=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('admin/transaksi_keluar/get_detail_transaksi_masuk2')?>",
                    dataType : "JSON",
                    data : {kode_tm: kode_tm},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kode_tm, dtm_nofak, dtm_paket_nama, dtm_satuan, dtm_harga, dtm_qty, dtm_total){
                            $('[name="kode_dtm"]').val(data.dtm_nofak);
                            $('[name="nama_paket"]').val(data.dtm_paket_nama);
                            $('[name="satuan"]').val(data.dtm_satuan);
                            $('[name="harga"]').val(data.dtm_harga);
                            $('[name="qty"]').val(data.dtm_qty);
                            $('[name="subtotal"]').val(data.dtm_total);



                        });

                    }
                });
                return false;
           });

        });
    </script> -->

    <!-- <script type="text/javascript">
        $(document).ready(function(){
             $('#kode_tm').on('input',function(){

                var kode_tm=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('admin/transaksi_keluar/get_transaksi_masuk')?>",
                    dataType : "JSON",
                    data : {kode_tm: kode_tm},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kode_tm, tm_total_sepatu, tm_total, tm_user_id, tm_nama, tm_status_bayar){
                            $('[name="total_sepatu"]').val(data.tm_total_sepatu);
                            $('[name="total"]').val(data.tm_total);
                            $('[name="id_member"]').val(data.tm_user_id);
                            $('[name="nama"]').val(data.tm_nama);
                            $('[name="status_bayar"]').val(data.tm_status_bayar);


                        });

                    }
                });
                return false;
           });

        });
    </script> -->


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
</body>

</html>
