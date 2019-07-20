<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ubah Akun Pengguna</h1>
<!-- DataTales -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Ubah Data</h6>
  </div>
  <div class="card-body">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
          <form role="form" action="<?php echo base_url(); ?>index.php/admin/simpanubah_pengguna" method="POST">
            <input type="hidden" class="form-control" name="id" value="<?php echo $pengguna["id"]; ?>">
            <input type="hidden" class="form-control" name="akses" value="<?php echo $pengguna["akses"]; ?>">
            <input type="hidden" class="form-control" name="aktif" value="<?php echo $pengguna["aktif"]; ?>">
            <input type="hidden" class="form-control" name="password" value="<?php echo $pengguna["password"]; ?>">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama" value="<?php echo $pengguna["nama"]; ?>" placeholder="Nama">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" name="email" value="<?php echo $pengguna["email"]; ?>" placeholder="Email">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat" value="<?php echo $pengguna["alamat"]; ?>" placeholder="Alamat">
            </div>
            <div class="form-group">
              <label>No HP</label>
              <input type="text" class="form-control" name="no_hp" value="<?php echo $pengguna["no_hp"]; ?>" placeholder="No HP">
            </div>
            <div class="form-group">
              <label>Merek Mobil</label>
              <input type="text" class="form-control" name="merk_mobil" value="<?php echo $pengguna["merk_mobil"]; ?>" placeholder="Merek Mobil">
            </div>
            <div class="form-group">
              <label>Model Mobil</label>
              <input type="text" class="form-control" name="model_mobil" value="<?php echo $pengguna["model_mobil"]; ?>" placeholder="Model Mobil">
            </div>
            <div class="form-group">
              <label>No Kendaraan</label>
              <input type="text" class="form-control" name="no_kendaraan" value="<?php echo $pengguna["no_kendaraan"]; ?>" placeholder="No Kendaraan">
            </div>
            <br>
            <button type="submit" value="submit" class="btn btn-success">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>