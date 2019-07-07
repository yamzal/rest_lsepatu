<?php
	//$this->load->view('v_partials/v_index_header');
?>

<!-- page content -->
<div class="container">
	<!-- page heading -->
	<div class="row">
		<div class="col-lg-12">
            <h1 class="page-header">Data Paket</h1>
		</div>

	</div>
    <div class="mainbody-section text-center">
        <div class="row">
					<div class="col-md-8">
                <!-- <div class="section"> -->
                <!-- <div class="table-responsive">
                    <table  class="table table-bordered table-hover" style="font-size:13px;margin-top:10px;">
                        <thead>
                            <tr>
                                <th style="text-align:center;">No</th>
                                <th style="text-align:center;">ID Paket</th>
                                <th style="text-align:center;">Nama paket</th>
                                <th style="text-align:center;">Satuan</th>
                                <th style="text-align:center;">Harga(Rp)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        </?php
                                $no = 1;
                                foreach($paket as $p){
                                ?>
                                <tr>
                                    <td style="text-align:center;"></?php echo $no++ ?></td>
                                    <td></?php echo $p->paket_id ?></td>
                                    <td></?php echo $p->paket_nama ?></td>
                                    <td></php echo $p->paket_satuan ?></td>
                                    <td></?php echo $p->paket_harga ?></td>
                                    <td>
                                        </?php echo anchor('admin/data_paket/edit/'.$p->paket_id,'Edit'); ?>
                                        </?php echo anchor('admin/data_paket/hapus/'.$p->paket_id,'Hapus'); ?>
                                    </td>
                                </tr>
                        </?php } ?>
                    </table>
                </div> -->
            <!-- </div> -->

						<table class="table table-bordered ml-3">
								<thead class="thead-dark">
										<tr>
												<th scope="col">No</th>
												<th scope="col">Nama Paket</th>
												<th scope="col">Satuan</th>
												<th scope="col">Harga(Rp)</th>
										</tr>
								</thead>

								<tbody>
								<?php
										$no = 1;
										foreach($paket as $p):
										?>
										<tr>
												<td style="text-align:center;"><?= $no++; ?></td>
												<td><?php echo $p->paket_nama ?></td>
												<td><?php echo $p->paket_satuan ?></td>
												<td><?php echo $p->paket_harga ?></td>
										</tr>
										<?php endforeach; ?>
								</tbody>
						</table>
    </div>
	</div>
</div>

<?php
	//$this->load->view('v_partials/v_index_footer');
?>
