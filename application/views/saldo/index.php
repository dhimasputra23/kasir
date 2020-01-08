<!-- Begin Page Content -->
<div class="container-fluid">

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Saldo</h6>
      </div><br>
      <table cellpadding=10 style="margin-left: 34px;">
      <tr>
          <td colspan="3" class="text-center">
                     <!-- FLASH DATA -->    
                    <?php 
                    $dat = $this->session->flashdata('msg');
                        if($dat!=""){ ?>
                                <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$dat;?></div>
                    <?php } ?>  
          </td>
        </tr>
        <tr>
          <td width="200"><h5>Tanggal</h5></td>
          <td width="10"><h5>:</h5></td>
          <td><h5><?php $tgl=time();  date_default_timezone_set('Asia/Jakarta');  echo date('Y-m-d' , $tgl); ?></h5></td>
        </tr>
        <tr>
          <td width="200"><h5>SALDO </h5></td>
          <td width="10"><h5>:</h5></td>
          <td><h5>Rp. <?= number_format($data['saldo']); ?></h5></td>
        </tr>
        <?php if($this->session->userdata('level') == 'admin'){ ?>
        <tr>
          <td colspan="3" class="text-center"><br> 
            <a class="btn btn-primary"  href="#modal-saldo<?= $data['id']; ?>" data-toggle="modal"><span class="fas fa-fw fa-edit"></span>Edit Saldo</a>
          </td>
        </tr>
        <?php } ?>
      </table>
      <br>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
    

    <!---------------------------------------------EDIT Data---------------------------------------------->
    <div class="modal fade" id="modal-saldo<?= $data['id']; ?>">
      <div class="modal-dialog">
    
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Saldo</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
    
          <!-- Modal body -->
    
    
          <?php echo form_open('saldo/editSaldo') ?>
    
          <input type="hidden" readonly value="<?= $data['id']; ?>" name="id" class="form-control" >
          <div class="modal-body">
              <div class="form-group">
                  <label for="saldo">Saldo : </label>
                  <input type="number" id="saldo" name="saldo" value="<?= $data['saldo']; ?>" class="form-control" required="">
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
    
    