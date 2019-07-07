
<!-- page content -->
<div class="container">
	<!-- page heading -->
 <div class="row">
   <div class="col-md-12">
      <div class="section">
        <!-- <div class="table-responsive"> -->
            <!-- <table  class="table table-bordered" style="font-size:13px;margin-top:10px;"> -->
          <title>Laporan</title>

          <link rel="stylesheet" href="<?php echo base_url('jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
          <script src="<?php echo base_url('jquery.min.js'); ?>"></script> <!-- Load file jquery -->

          <h2>Data Transaksi</h2>
    <form method="get" action="">
        <div class="form-row">
          <div class="form-group col-md-2">
              <label for=filter"">Filter Berdasarkan</label>
              <select name="filter" id="filter" class="form-control">
                  <option value="">Pilih</option>
                  <option value="1">Per Tanggal</option>
                  <option value="2">Per Bulan</option>
                  <option value="3">Per Tahun</option>
              </select>
          </div>
        </div>

          <div class="form-row">
              <div class="form-group col-md-2" id="form-tanggal">
                <label for="tanggal">Tanggal</label>
                <input type="text"  id="tanggal" name="tanggal" class="input-tanggal" class="form-control"/>
              </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-2" id="form-bulan">
              <label for="bulan">Bulan</label>
              <select id="bulan" name="bulan" class="form-control">
                  <option value="">Pilih</option>
                  <option value="1">Januari</option>
                  <option value="2">Februari</option>
                  <option value="3">Maret</option>
                  <option value="4">April</option>
                  <option value="5">Mei</option>
                  <option value="6">Juni</option>
                  <option value="7">Juli</option>
                  <option value="8">Agustus</option>
                  <option value="9">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
              </select>
            </div>
          </div>

        <div class="form-row">
          <div class="form-group col-md-2" id="form-tahun">
            <label for="tahun">Tahun</label>
            <select id="tahun" name="tahun" class="form-control">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select>
          </div>
        </div>

            <button type="submit">Tampilkan</button>
            <a href="<?php echo base_url(); ?>" style="margin-left:20px">Reset Filter</a>
    </form>
        <hr>

    <b><?php echo $ket; ?></b><br/><br/>
    <a href="<?php echo $url_cetak; ?>">CETAK PDF</a><br/><br/>
<!--    <a href="<?php// echo $url_cetak; ?>">PDF</a><br/><br/>-->

    <table class="table table-bordered" class="table-responsive" border="1" cellpadding="8">
    <tr>
        <th>No. Faktur</th>
        <th>Tanggal</th>
        <th>No. Faktur Transaksi Masuk</th>
        <th>Total Sepatu</th>
        <th>Total</th>
        <th>Jumlah Uang</th>
        <th>Kembalian</th>
        <th>ID Admin</th>
        <th>ID User</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No. Telpon</th>
    </tr>
    <?php
    if( ! empty($tbl_transaksi_keluar)){
    	$no = 1;
    	foreach($tbl_transaksi_keluar as $data){
            $tgl = date('d-m-Y', strtotime($data->tk_tanggal));

    		echo "<tr>";
        echo "<td>".$data->tk_nofak."</td>";
        echo "<td>".$tgl."</td>";
        echo "<td>".$data->tk_tm_nofak."</td>";
        echo "<td>".$data->tk_total_sepatu."</td>";
        echo "<td>".$data->tk_total."</td>";
        echo "<td>".$data->tk_jml_uang."</td>";
        echo "<td>".$data->tk_kembalian."</td>";
        echo "<td>".$data->tk_users_id_peg."</td>";
        echo "<td>".$data->tk_users_id_cus."</td>";
        echo "<td>".$data->tk_nama."</td>";
        echo "<td>".$data->tk_alamat."</td>";
        echo "<td>".$data->tk_no_telp."</td>";

        echo "</tr>";
    		$no++;
    	}
    }
    ?>

    <script src="<?php echo base_url('jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>

</table>

</body>
</html>
