 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Hutang Karyawan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
     <!-- FLASH DATA -->    
     <?php 
      $dat = $this->session->flashdata('msg');
          if($dat!=""){ ?>
                <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$dat;?></div>
      <?php } ?>     
    <h6 class="m-0 font-weight-bold text-primary">Daftar Hutang Karyawan</h6>
  </div>
  <br>
  <div class="card-body">
    <center>
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_hutang_karyawan">
        (+) TAMBAH
      </button>
    </center><br>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Nominal</th>
            <th>Jumlah Bayar</th>
            <th>Hutang</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Nominal</th>
            <th>Jumlah Bayar</th>
            <th>Hutang</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
        <?php $no=1; foreach($data as $a){ ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $a['nama_karyawan']; ?></td>
            <td>Rp. <?= number_format($a['nominal']); ?></td>
            <td>Rp. <?= number_format($a['jumlah_bayar']); ?></td>
            <td>Rp. 
            <?php
                $tampung = $a['nominal']-$a['jumlah_bayar'];
                echo number_format($tampung);
            ?>
              </td>
            <td><?= $a['keterangan']; ?></td>
            <td><?= $a['status']; ?></td>
            <td><?= $a['tanggal']; ?></td>
            <td class="text-center">
              <a class="badge badge-success" href="#modal-edit<?= $a['id']; ?>" data-toggle="modal" title="Edit"><span class="fas fa-fw fa-edit"></span> Edit</a>
              <a class="badge badge-danger" href="#modal-hapus<?= $a['id']; ?>" data-toggle="modal" title="Hapus"><span class="fas fa-fw fa-trash"></span> Hapus</a>
           </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!---------------------------------------------Tambah Data---------------------------------------------->
<div class="modal fade" id="add_hutang_karyawan">
        <div class="modal-dialog">

          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Tambah Hutang Karyawan</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <?php echo form_open('Hutang_karyawan/tambah_data') ?>
            <div class="modal-body">

              <div class="form-group">
              <label for="Kategori">Karyawan : </label>
                  <select required name="karyawan" id="karyawan" class="form-control" required="">
                    <option value="">-------- Pilih --------</option>
                    <?php foreach($karyawan->result_array() as $x) { ?>
                          <option value="<?= $x['id']; ?>"><?= $x['nama']; ?></option>
                    <?php }?>
                  </select>
              </div>

              <div class="form-group">
                  <label for="nominal">Nominal Hutang : </label>
                  <input type="number" id="nominal" name="nominal" class="form-control" placeholder="Nominal Hutang" required>
              </div>

              <div class="form-group">
                  <label for="keterangan">Keterangan : </label>
                  <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" required>
              </div>

              <div class="form-group">
                  <label for="tanggal">Tanggal : </label>
                  <input type="date" id="tanggal" name="tanggal" class="form-control" required>
              </div>
 
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Simpan" />
            </div>
      </form>
          </div>
        </div>
      </div>
       <!---------------------------------------------Akhir Tambah Data---------------------------------------------->

       <!---------------------------------------------Edit Data---------------------------------------------->
       <?php $no=0; foreach($data as $x): $no++; ?>

      <div class="modal fade" id="modal-edit<?= $x['id']; ?>">
        <div class="modal-dialog">

          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Edit Hutang Karyawan</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <?php echo form_open('Hutang_karyawan/edit_data') ?>
            <input type="hidden" readonly value="<?= $x['id']; ?>" name="id" class="form-control" >
            <div class="modal-body">

              <div class="form-group">
              <label for="Kategori">Karyawan : </label>
                  <select required name="karyawan" id="karyawan" class="form-control" required="">
                    <?php foreach($karyawan->result_array() as $xx) { ?>
                        <?php if($xx['id'] == $x['id_karyawan']){ ?>
                          <option value="<?= $xx['id']; ?>" selected><?= $xx['nama']; ?></option>
                        <?php }else { ?>
                          <option value="<?= $xx['id']; ?>"><?= $xx['nama']; ?></option>
                        <?php } ?>
                    <?php }?>
                  </select>
              </div>

              <div class="form-group">
                  <label for="nominal">Nominal Hutang : </label>
                  <input type="number" id="nominal" name="nominal" class="form-control" value="<?= $x['nominal'] ?>" placeholder="Nominal Hutang" required>
              </div>

              <div class="form-group">
                  <label for="nominal">Jumlah Bayar: </label>
                  <input type="number" id="jumlah_bayar" name="jumlah_bayar" class="form-control" value="<?= $x['jumlah_bayar'] ?>" placeholder="Jumlah Bayar" required>
              </div>

              <div class="form-group">
                  <label for="keterangan">Keterangan : </label>
                  <input type="text" id="keterangan" name="keterangan" class="form-control" value="<?= $x['keterangan'] ?>" placeholder="Keterangan" required>
              </div>

              <div class="form-group">
              <label for="Kategori">Status : </label>
                  <select required name="status" id="status" class="form-control" required="">
                    <?php foreach($status as $v) { ?>
                        <?php if($v == $x['status']){ ?>
                          <option value="<?= $v; ?>" selected><?= $v; ?></option>
                        <?php }else { ?>
                          <option value="<?= $v; ?>"><?= $v; ?></option>
                        <?php } ?>
                    <?php }?>
                  </select>
              </div>
 
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Simpan" />
            </div>
      </form>
          </div>
        </div>
      </div>
      <?php endforeach;?>
       <!---------------------------------------------Akhir Edit Data---------------------------------------------->

       
        <!---------------------------------------------Hapus  Data---------------------------------------------->
        <?php $no=0; foreach($data as $x): $no++; ?>  
            
            <div class="modal fade" id="modal-hapus<?= $x['id']; ?>">
              <div class="modal-dialog">
            
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Hapus Hutang Karyawan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
            
                  <!-- Modal body -->
            
            
                  <?php echo form_open('Hutang_karyawan/hapus_data') ?>
            
                  <input type="hidden" readonly value="<?= $x['id']; ?>" name="id" class="form-control" >
                  <div class="modal-body">
                      <p>Apakah anda yakin menghapus data ?</strong>
                  </div>
            
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" id="submit" class="btn btn-danger" value="Hapus" />
                  </div>
            </form>
                </div>
              </div>
            </div>              
            <?php endforeach;?>
      <!---------------------------------------------Hapus  Data---------------------------------------------->
       