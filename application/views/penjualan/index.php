        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->

                              <!-- FLASH DATA -->
                              <?php 
      $dat = $this->session->flashdata('sukses');
          if($dat!=""){ ?>
                <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$dat;?>
                
                </div>
      <?php } ?> 

    <?php 
      $dat = $this->session->flashdata('msg');
          if($dat!=""){ ?>
                <div class="alert alert-success"><strong>Sukses! </strong> <?=$dat;?>
                  <a class="btn btn-info" href="<?php echo site_url('penjualan/cetak_faktur')?>" target="_blank"><span class="fa fa-print"></a>
                </div>
      <?php } ?>

      <?php 
      $dat = $this->session->flashdata('muka');
          if($dat!=""){ ?>
                <div class="alert alert-success"><strong>Sukses! </strong> <?=$dat;?>
             <a class="btn btn-info" href="<?php echo site_url('penjualan/cetak_faktur_dp')?>" target="_blank"><span class="fa fa-print"></span></a>
                </div>
      <?php } ?>               
  
         <!-- FLASH DATA -->    
         <?php 
      $dat1 = $this->session->flashdata('error');
          if($dat1!=""){ ?>
                <div id="notifikasi" class="alert alert-danger"><strong>Gagal !</strong> <?=$dat1;?></div>
      <?php } ?>      



          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Penjualan</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

          
            <div class="card-body">


            <?php echo form_open('Penjualan/add_to_cart') ?>
            
              <div class="table-responsive">
                <table width="100%;">
                  <tr>
                      <th>Nama Barang :</th>  
                      <th>
                        <input type="text" list="list_barang" autocomplete="off" name="nabar" id="nabar" class="form-control input-sm">
                        <datalist id="list_barang">
                          <?php foreach ($barang->result() as $barang): ?>
                           <option value="<?= $barang->barang_nama?>"><?= $barang->barang_nama ?></option>
                          <?php endforeach ?>
                        </datalist>
                      </th> 
                  </tr>
                </table>
                <div class="table-responsive">
                  <table width="100%" id="detail_barangku" cellpadding="6"></table>
                </div>
              </div> 
              </form>
              <hr>

              
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Harga Jual</th>
                      <th>Keterangan</th>
                      <th>Jumlah Beli</th>
                      <th>Sub Total</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Harga Jual</th>
                      <th>Keterangan</th>
                      <th>Jumlah Beli</th>
                      <th>Sub Total</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items): ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    <tr>
                         <td><?=$items['id'];?></td>
                         <td><?=$items['name'];?></td>
                         <td style="text-align:center;"><?=$items['satuan'];?></td>
                         <td style="text-align:right;"><?php echo number_format($items['amount']);?></td>
                         <td style="text-align:right;"><?php echo $items['disc'];?></td>
                         <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>
                        
                         <td style="text-align:center;"><a href="<?php base_url()?>penjualan/remove/<?=$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                    </tr>
                    
                    <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div> <!-- Table Responsive -->
              <br>
                
              <?php echo form_open('Penjualan/simpan_penjualan', ['id' => 'form-simpan-penjualan']) ?>
              <hr>
              <div class="table-responsive">
                <table width="100%">
                  <tr>
                    <th>No HP : <br>
                      <input type="text" name="no_hp" list="list_no" autocomplete="off" id="no_hp" class="form-control input-sm" style="width:350px;" required>
                      <datalist id="list_no">
                        <?php foreach ($nohp->result() as $nohp): ?>
                          <option value="<?= $nohp->no_hp?>"><?= $nohp->no_hp ?></option>
                        <?php endforeach ?>
                      </datalist>
                    </th>
                    <th><table width="100%" id="detail_customer"></table></th>
                  </tr>
                </table>
              </div>

              <br>
              <div class="table-responsive">
                <table width="100%" cellpadding="5">
                  <tr>
                    <th nowrap>Total Belanja(Rp) :</th>
                    <th nowrap style="text-align:right;min-width: 100px;"><input type="text" name="total2" value="<?php echo number_format($this->cart->total());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                      <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                    <th nowrap>Keterangan : </th>
                    <th style="text-align:right;"><input type="text"  id="diskon" name="diskon" class="diskon form-control input-sm" style="text-align:right;margin-bottom:5px;width:150px"  required></th>
                     
                    <th nowrap>Cara Bayar : </th>
                    <th style="text-align:right;min-width: 100px">
                      <select required name="bayar" id="bayar" class="form-control">
                          <option value="">-- Pilih Cara Bayar --</option>
                          <option value="Uang Muka">Uang Muka</option>
                          <option value="Lunas">Lunas</option>
                          <option value="Debit">Debit</option>
                          <option value="Kredit">Kredit</option>
                          <option value="Transfer">Transfer</option>
                          <option value="OVO">OVO</option>  
                      </select>
                    </th>
                  </tr>
                </table>
              </div>
              <br>
              <input type="hidden" name="destroy_cookie" value="">
              <div class="table-responsive">
                <table width="100%">
                  <tr>
                      <td nowrap style="padding-right: 20px"><button type="button" id="btn-simpan-penjualan" class="btn btn-success btn-lg"><i class="fa fa-print"></i> CETAK</button></td>
                      <td align="right">
                        <table cellpadding="5">
                          <tr>
                            <th nowrap>Total Yang Harus Dibayar (Rp)</th>
                            <th>:</th>
                            <th style="text-align:right;min-width: 100px"><input type="text" id="totbayar" value="0" min="0" name="totbayar" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                          </tr>
                          <tr>
                              <th nowrap>Tunai(Rp)</th>
                              <th>:</th>
                              <th style="text-align:right;min-width: 100px"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                          </tr>

                          <tr>
                              <th nowrap>Kembalian(Rp)</th>
                              <th>:</th>
                              <th style="text-align:right;min-width: 100px"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                          </tr>
                        </table>

                      </td>
                  </tr>
                </table>
              </div>
            
                
                </form>

              </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
  
      <!-- End of Main Content -->
     