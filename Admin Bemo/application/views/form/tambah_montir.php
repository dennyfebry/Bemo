<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $h1 ?></h1>
<!-- DataTales -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $h6 ?></h6>
  </div>
  <div class="card-body">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
          <form role="form" action="<?php echo base_url(); ?>index.php/admin/simpan_montir" method="POST">
            <input type="hidden" class="form-control" name="id" value="">
            <input type="hidden" class="form-control" name="akses" value="montir">
            <input type="hidden" class="form-control" name="aktif" value="1">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama" value="" placeholder="Nama">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" name="email" value="" placeholder="Email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" value="" placeholder="Password">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat" value="" placeholder="Alamat">
            </div>
            <div class="form-group">
              <label>No HP</label>
              <input type="text" class="form-control" name="no_hp" value="" placeholder="No HP">
            </div>
            <input type="hidden" class="form-control" name="merk_mobil" value="">
            <input type="hidden" class="form-control" name="model_mobil" value="">
            <input type="hidden" class="form-control" name="no_kendaraan" value="">
            <br>
            <button type="submit" value="submit" class="btn btn-success">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>