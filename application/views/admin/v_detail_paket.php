
					<?php
						error_reporting(0);
						$b=$paket->row_array();
					?>
					<table>
								<tr>
				                    <!-- <th style="width:200px;"></th> -->
				                    <th>Nama Paket</th>

				                    <!-- <th>Stok</th> -->
				        </tr>
								<tr>
														<!-- <td style="width:200px;"></th> -->
														<td><input type="text" name="paket_nama" value="<?php echo $b['paket_nama'];?>" style="width:300px;margin-right:5px;" class="form-control input-sm" readonly></td>

				                    <!-- <td><input type="text" name="stok" value="<?php echo $b['barang_stok'];?>" style="width:40px;margin-right:5px;" class="form-control input-sm" readonly></td> -->

				                    <!-- <td><input type="number" name="diskon" id="diskon" value="0" min="0" class="form-control input-sm" style="width:130px;margin-right:5px;" required></td> -->

								</tr>
					</table>
					<table>
							<tr>
									<th>Satuan</th>
									<th>Harga(Rp)</th>
									<!-- <th>Diskon(Rp)</th> -->
				          <th>Jumlah</th>
							</tr>
							<tr>
								<td><input type="text" name="satuan" value="<?php echo $b['paket_satuan'];?>" style="width:100px;margin-right:5px;" class="form-control input-sm" readonly></td>
								<td><input type="text" name="harga" value="<?php echo number_format($b['paket_harga']);?>" style="width:120px;margin-right:5px;text-align:right;" class="form-control input-sm" readonly></td>
								<td><input type="number" name="qty" id="qty" value="1" min="1" max="" class="form-control input-sm" style="width:50px;margin-right:5px;" required></td>
			                    <td><button type="submit" class="btn btn-sm btn-primary">Ok</button></td>
							</tr>
					</table>
