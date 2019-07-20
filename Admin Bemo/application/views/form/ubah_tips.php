<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ubah Tips Merawat Mobil</h1>
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Data</h6>
    </div>
    <div class="card-body">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form role="form" action="<?php echo base_url(); ?>index.php/admin/simpanubah_tips" method="POST">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $tips["id"]; ?>">
                        <div class="form-group">
                            <label>Bagian</label>
                            <select name="bagian">
                                <option value="Chassis/Body/Interior" <?php $tips["bagian"] == 'Chassis/Body/Interior' ? print "selected" : "" ?>>Chassis/Body/Interior</option>
                                <option value="Mesin" <?php $tips["bagian"] == 'Mesin' ? print "selected" : "" ?>>Mesin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kode Servis</label>
                            <input type="text" class="form-control" name="kode_servis" value="<?php echo $tips["kode_servis"]; ?>" placeholder="Kode Servis">
                        </div>
                        <div class="form-group">
                            <label>Nama Servis</label>
                            <input type="text" class="form-control" name="nama_servis" value="<?php echo $tips["nama_servis"]; ?>" placeholder="Nama Servis">
                        </div>
                        <div class="form-group">
                            <label>Waktu Pengerjaan (Menit)</label>
                            <input type="number" class="form-control" name="waktu_pengerjaan" value="<?php echo $tips["waktu_pengerjaan"]; ?>" placeholder="Waktu Pengerjaan">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" name="harga" value="<?php echo $tips["harga"]; ?>" placeholder="Harga">
                        </div>
                        <div class="form-group">
                            <label>Saran Setiap</label>
                            <input type="text" class="form-control" name="saran_setiap" value="<?php echo $tips["saran_setiap"]; ?>" placeholder="Saran Setiap">
                        </div>
                        <br>
                        <button type="submit" value="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>