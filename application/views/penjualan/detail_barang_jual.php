<?php 
						error_reporting(0);
						$b=$brg->row_array();
					?>
					
						<tr>
		                    <th nowrap>Kode Barang</th>
		                    <th nowrap>Satuan</th>
		                    <th nowrap>Stok</th>
		                    <th nowrap>Harga(Rp)</th>
		                    <th nowrap>Keterangan</th>
		                    <th nowrap>Jumlah</th>
		                </tr>
						<tr>
							<td nowrap><input type="text" name="kode_brg" value="<?php echo $b['barang_id'];?>" class="form-control input-sm" readonly></td>
		                    <td nowrap><input type="text" name="satuan" value="<?php echo $b['barang_satuan'];?>"  class="form-control input-sm" readonly></td>
		                    <td nowrap><input type="text" name="stok" value="<?php echo $b['barang_stok'];?>" style="margin-right:5px;min-width: 60px;" class="form-control input-sm" readonly></td>
		                    <td nowrap><input type="text" name="harjul" value="<?php echo number_format($b['barang_harjul']);?>" style="min-width: 60px;width:120px;margin-right:5px;text-align:right;" class="form-control input-sm" readonly></td>
		                    <td nowrap><input type="text" name="diskon" id="diskon"  class="form-control input-sm" ></td>
		                    <td nowrap><input type="number" name="qty" id="qty" value="1" min="1" max="999999999" class="form-control input-sm" required></td>
						</tr>
						<tr>
							<td nowrap colspan="6"><button type="submit" class="btn btn-sm btn-primary btn-block">Oke</button></td>
						</tr>
					