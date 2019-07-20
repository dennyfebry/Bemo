<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ubah Informasi Beranda</h1>
<!-- DataTales-->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Data</h6>
    </div>
    <div class="card-body">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div style="color: red;"><?php echo (isset($message)) ? $message : ""; ?></div>
                    <?php echo form_open("admin/upload", array('enctype' => 'multipart/form-data'));  ?>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $info["id"]; ?>">
                    <input type="hidden" class="form-control" name="tanggal" min="2000-01-02" value="<?php echo date("Y-m-d h:i:sa"); ?>">
                    <input type="hidden" class="form-control" name="bagian" value="<?php echo $info["bagian"]; ?>" placeholder="Bagian" disabled>
                    <div class="form-group">
                        <label>Gambar Logo</label>
                        <input type="file" name="input_gambar">
                    </div>
                    <br>
                    <input type="submit" name="submit" value="Simpan">
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>