<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
    <script src="<?php echo base_url('jquery.min.js'); ?>"></script> <!-- Load file jquery -->

    <title>Laporan</title>

  </head>
  <body>

<div class="container">
  <div class="row">
    <div class="col-md-10">
        <h2>Data Transaksi</h2>
        <hr>
          <form method="get" action="">
            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="filter"><b>Filter Berdasarkan</b></label>
                <select id="filter" name="filter" class="form-control">
                  <option selected>Pilih</option>
                  <option value="1">Per Tanggal</option>
                  <option value="2">Per Bulan</option>
                  <option value="3">Per Tahun</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="tanggal"><small><b>Tanggal</b></small></label>
                <input type="text" id="tanggal" name="tanggal" class="form-control" class="input-tanggal" value="">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="bulan"><small><b>Bulan</b></small></label>
                <select class="form-control" id="name" name="name">
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
              <div class="form-group col-md-2">
                <label for="tahun"><small><b>Tahun</b></small></label>
                <select class="form-control" id="tahun" name="tahun">
                    <option value="">Pilih</option>
                    <?php
                        foreach($option_tahun as $data)
                        {
                          echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                        }

                     ?>
                </select>
              </div>
            </div>

            <button type="submit" class="btn btn-secondary btn-sm">Tampilkan</button>
            <a href="<?php echo base_url(); ?>" class="strectched-link" style="margin-left:20px">Reset Filter</a>
        </form>

<br>
<div class="notice">
  <b><?php echo $ket; ?></b>
</div>
<br>
<div class="print">
  <a href="<?php echo $url_cetak; ?>" class="strectched-link" style="padding-top: 40px">CETAK PDF</a><br/><br/>
</div>


    <table border="1" cellpadding="8">
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

        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
