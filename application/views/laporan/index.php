        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Kategori</h1>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                              <!-- FLASH DATA -->    
    <?php 
      $dat = $this->session->flashdata('msg');
          if($dat!=""){ ?>
                <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$dat;?></div>
      <?php } ?>               
  
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th>No</th>
                      <th>Laporan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>No</th>
                      <th>Laporan</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>

                  <tr>
                        <td style="text-align:center;vertical-align:middle">1</td>
                        <td style="vertical-align:middle;">Laporan Data Barang</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-success" href="<?php echo site_url('laporan/lap_data_barang')?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                            <a class="btn btn-sm btn-info" href="<?php echo site_url('laporan/lap_data_barang')?>?preview=ya" target="_blank"><span class="fa fa-eye"></span> View</a>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;vertical-align:middle">2</td>
                        <td style="vertical-align:middle;">Laporan Stok Barang</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-success" href="<?php echo site_url('laporan/lap_stok_barang')?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                            <a class="btn btn-sm btn-info" href="<?php echo site_url('laporan/lap_stok_barang')?>?preview=ya" target="_blank"><span class="fa fa-eye"></span> View</a>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;vertical-align:middle">3</td>
                        <td style="vertical-align:middle;">Laporan Penjualan</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-success" href="<?php echo site_url('laporan/lap_data_penjualan')?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                            <a class="btn btn-sm btn-info" href="<?php echo site_url('laporan/lap_data_penjualan')?>?preview=ya" target="_blank"><span class="fa fa-eye"></span> View</a>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;vertical-align:middle">4</td>
                        <td style="vertical-align:middle;">Laporan Penjualan PerPeriode</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-success" href="#lap_jual_periode" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;vertical-align:middle">5</td>
                        <td style="vertical-align:middle;">Laporan Penjualan Per Barang</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-success" href="#lap_jual_barang" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;vertical-align:middle">6</td>
                        <td style="vertical-align:middle;">Laporan Penjualan Per Kategori Barang</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-success" href="#lap_penjualan_kat_barang" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                        </td>
                    </tr>

                     <tr>
                        <td style="text-align:center;vertical-align:middle">7</td>
                        <td style="vertical-align:middle;">Laporan Laba/Rugi</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-success" href="#lap_laba_rugi" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;vertical-align:middle">8</td>
                        <td style="vertical-align:middle;">Laporan Pengeluaran Toko</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-success" href="#lap_pengeluaran_toko" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;vertical-align:middle">9</td>
                        <td style="vertical-align:middle;">Laporan Hutang Karyawan</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-success" href="<?php echo site_url('laporan/lap_hutang_karyawan')?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                            <a class="btn btn-sm btn-info" href="<?php echo site_url('laporan/lap_hutang_karyawan')?>?preview=ya" target="_blank"><span class="fa fa-eye"></span> View</a>
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
  
      <!-- End of Main Content -->


<!---------------------------------------------Laporan Penjualan Periode--------------------------------------------->

<div class="modal fade" id="lap_jual_periode">
  <div class="modal-dialog">

    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Pilih Periode</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <?php echo form_open('Laporan/lap_penjualan_periode', ['target' => "_blank", 'method' => 'get']) ?>
      <div class="modal-body">

      <div class="form-group">
          <label class="control-label col-xs-3" >Tanggal Awal</label>
              <div class="col-xs-9">
                 <input type="date" class="form-control" name="tgl1" value="" placeholder="Tanggal" required>
             </div>
      </div>

      <div class="form-group">
          <label class="control-label col-xs-3" >Tanggal Akhir</label>
              <div class="col-xs-9">
                 <input type="date" class="form-control" name="tgl2" value="" placeholder="Tanggal" required>
             </div>
      </div>

        <div class="form-group">
          <label class="control-label col-xs-3" >Preview</label>
          <div class="col-xs-9">
            
            <select name="preview" class="form-control">
              <option value="">Tidak</option>
              <option value="ya">Ya</option>
            </select>

          </div>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button class="btn btn-success"><span class="fa fa-print"></span> Cetak</button>
      </div>
</form>
    </div>
  </div>
</div>

<!---------------------------------------------Laporan Penjualan Barang--------------------------------------------->

<div class="modal fade" id="lap_jual_barang">
  <div class="modal-dialog">

    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Pilih Barang</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <?php echo form_open('Laporan/lap_penjualan_barang', ['target' => "_blank", 'method' => 'get']) ?>
      <div class="modal-body">

      <div class="form-group">
              <label for="Kategori">Barang : </label>
                  <!-- <select required name="barang" id="barang" class="form-control">
                    <option value="">-- Pilih Barang --</option>
                    <?php foreach($data->result_array() as $x) { ?>
                          <option value="<?= $x['barang_id']; ?>"><?= $x['barang_nama']; ?></option>
                    <?php }?>
                  </select> -->
                  <input type="text" list="list_barang" autocomplete="off" name="barang" id="nabarku" class="form-control input-sm">
                        <datalist id="list_barang">
                          <?php foreach ($data->result_array() as $x): ?>
                           <option value="<?= $x['barang_id']; ?>"><?= $x['barang_nama']; ?></option>
                          <?php endforeach ?>
                  </datalist>
          </div>

        <div class="form-group">
          <label class="control-label col-xs-3" >Preview</label>
          <div class="col-xs-9">
            
            <select name="preview" class="form-control">
              <option value="">Tidak</option>
              <option value="ya">Ya</option>
            </select>

          </div>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button class="btn btn-success"><span class="fa fa-print"></span> Cetak</button>
      </div>
</form>
    </div>
  </div>
</div>

<!---------------------------------------------Laporan Penjualan Kategori Barang--------------------------------------------->

<div class="modal fade" id="lap_penjualan_kat_barang">
  <div class="modal-dialog">

    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Pilih Kategori Barang</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <?php echo form_open('Laporan/lap_penjualan_kat_barang', ['target' => "_blank", 'method' => 'get']) ?>
      <div class="modal-body">

      <div class="form-group">
              <label for="Kategori">Barang : </label>
                  <!-- <select required name="kat_barang" id="kat_barang" class="form-control">
                    <option value="">-- Pilih Kategori Barang --</option>
                    <?php foreach($kat->result_array() as $x) { ?>
                          <option value="<?= $x['kategori_id']; ?>"><?= $x['kategori_nama']; ?></option>
                    <?php }?>
                  </select> -->
                  <input type="text" list="list_barang2" autocomplete="off" name="kat_barang" id="kat_barang" class="form-control input-sm">
                        <datalist id="list_barang2">
                          <?php foreach ($kat->result_array() as $x): ?>
                           <option value="<?= $x['kategori_id']; ?>"><?= $x['kategori_nama']; ?></option>
                          <?php endforeach ?>
                  </datalist>
          </div>

        <div class="form-group">
          <label class="control-label col-xs-3" >Preview</label>
          <div class="col-xs-9">
            
            <select name="preview" class="form-control">
              <option value="">Tidak</option>
              <option value="ya">Ya</option>
            </select>

          </div>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button class="btn btn-success"><span class="fa fa-print"></span> Cetak</button>
      </div>
</form>
    </div>
  </div>
</div>


<!---------------------------------------------Laporan Penjualan Laba--------------------------------------------->
<div class="modal fade" id="lap_laba_rugi">
  <div class="modal-dialog">

    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Pilih Periode</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <?php echo form_open('Laporan/lap_laba_rugi', ['target' => "_blank", 'method' => 'get']) ?>
      <div class="modal-body">

      <div class="form-group">
          <label class="control-label col-xs-3" >Tanggal Awal</label>
              <div class="col-xs-9">
                 <input type="date" class="form-control" name="tgl1" value="" placeholder="Tanggal" required>
             </div>
      </div>

      <div class="form-group">
          <label class="control-label col-xs-3" >Tanggal Akhir</label>
              <div class="col-xs-9">
                 <input type="date" class="form-control" name="tgl2" value="" placeholder="Tanggal" required>
             </div>
      </div>

        <div class="form-group">
          <label class="control-label col-xs-3" >Preview</label>
          <div class="col-xs-9">
            
            <select name="preview" class="form-control">
              <option value="">Tidak</option>
              <option value="ya">Ya</option>
            </select>

          </div>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button class="btn btn-success" ><span class="fa fa-print"></span> Cetak</button>
      </div>
</form>
    </div>
  </div>
</div>


<!---------------------------------------------Laporan Pengeluaran Toko--------------------------------------------->
<div class="modal fade" id="lap_pengeluaran_toko">
  <div class="modal-dialog">

    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Pilih Periode</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <?php echo form_open('Laporan/lap_pengeluaran_toko', ['target' => "_blank", 'method' => 'get']) ?>
      <div class="modal-body">

      <div class="form-group">
          <label class="control-label col-xs-3" >Tanggal Awal</label>
              <div class="col-xs-9">
                 <input type="date" class="form-control" name="tgl1" value="" placeholder="Tanggal" required>
             </div>
      </div>

      <div class="form-group">
          <label class="control-label col-xs-3" >Tanggal Akhir</label>
              <div class="col-xs-9">
                 <input type="date" class="form-control" name="tgl2" value="" placeholder="Tanggal" required>
             </div>
      </div>

        <div class="form-group">
          <label class="control-label col-xs-3" >Preview</label>
          <div class="col-xs-9">
            
            <select name="preview" class="form-control">
              <option value="">Tidak</option>
              <option value="ya">Ya</option>
            </select>

          </div>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button class="btn btn-success" ><span class="fa fa-print"></span> Cetak</button>
      </div>
</form>
    </div>
  </div>
</div>
