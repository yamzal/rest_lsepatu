
					<?php
						error_reporting(0);
						$b=$member->row_array();
					?>
					<table>
							<tr>
			                    <!-- <th style="width:200px;"></th> -->
			                    <th>Nama Member</th>

			                    <!-- <th>Stok</th> -->
			       </tr>

							<tr>
										<td><input type="text" name="nama_member" value="<?php echo $b['user_nama'];?>" style="width:300px;margin-right:5px;" class="form-control input-sm" readonly></td>
							</tr>
							
					</table>
