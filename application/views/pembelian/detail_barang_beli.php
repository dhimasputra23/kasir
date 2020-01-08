<?php 
						error_reporting(0);
						$b=$brg->row_array();
					?>
					
					
						<tr>
		                    <th nowrap>Kode Barang :</th>
		                    <th nowrap>Satuan :</th>
		                    <th nowrap>Harga Pokok :</th>
		                    <th nowrap>Harga Jual :</th>
		                    <th nowrap>Jumlah :</th>
		                </tr>
						<tr>
							
							<td nowrap><input type="text" name="kode_brg" value="<?php echo $b['barang_id'];?>"  class="form-control input-sm" readonly></td>
		                    <td nowrap><input type="text" name="satuan" value="<?php echo $b['barang_satuan'];?>"  class="form-control input-sm" readonly></td>
		                    <td nowrap><input type="text" name="harpok" value="<?php echo $b['barang_harpok'];?>"  class="form-control input-sm" required></td>
		                    <td nowrap><input type="text" name="harjul" value="<?php echo $b['barang_harjul'];?>"  class="form-control input-sm" required></td>
		                    <td nowrap><input type="text" name="jumlah" id="jumlah" class="form-control input-sm" style="width:90px;margin-right:5px;" required></td>
		                    
						</tr>
						<tr>
							<td nowrap colspan="6"><button type="submit" class="btn btn-sm btn-primary btn-block">Oke</button></td>
						</tr>
					

					