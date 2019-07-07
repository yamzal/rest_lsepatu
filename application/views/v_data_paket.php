
	<style media="screen">
			 th {
				text-align:center;
			}
	</style>


<!-- page content -->
<div class="container">
	<!-- page heading -->
	<div class="row">
		<div class="col-lg-12">
            <h1 class="page-header">Data Paket</h1>
						<?//php// echo anchor('admin/data_paket/tambah','Tambah Data'); ?>
		</div>
	</div>

    <div class="mainbody-section text-center">
        <div class="row">
					<div class="col-md-8">
					<table class="table table-bordered ml-3">
								<thead class="thead-dark">
										<tr class="text-center">
												<th>No</th>
												<th>ID Paket</th>
												<th>Nama Paket</th>
												<th>Satuan</th>
												<th>Harga (Rp)</th>
												<!-- <th scope="col">Aksi</th> -->
										</tr>
								</thead>
								<tbody>
										<?php
												$no = 1;
												foreach($paket as $p):
										?>
										<tr>
												<td style="text-align:center"><?= $no++; ?></td>
												<td><?php echo $p->paket_id ?></td>
												<td><?php echo $p->paket_nama ?></td>
												<td><?php echo $p->paket_satuan ?></td>
												<td><?php echo $p->paket_harga ?></td>
												<!-- <td>
														<a href="<?//= base_url('admin/data_paket/edit/'.$p->paket_id);  ?>" class="btn btn-success btn-sm mr-2">Edit</a>
														<a href="<?//= base_url('admin/data_paket/hapus/'.$p->paket_id);  ?>" class="btn btn-danger btn-sm">Hapus</a>
												</td> -->
										 </tr>
										 <?php endforeach; ?>
								</tbody>
					</table>
    </div>
	</div>
</div>
