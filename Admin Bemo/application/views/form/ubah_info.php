<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ubah Informasi Beranda</h1>
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Data</h6>
    </div>
    <div class="card-body">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form role="form" action="<?php echo base_url(); ?>index.php/admin/simpanubah_info" method="POST">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $info["id"]; ?>">
                        <input type="hidden" class="form-control" name="tanggal" min="2000-01-02" value="<?php echo date("Y-m-d h:i:sa"); ?>">
                        <div class="form-group">
                            <label>Bagian</label>
                            <input type="text" class="form-control" name="bagian" value="<?php echo $info["bagian"]; ?>" placeholder="Bagian" disabled>
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $info["title"]; ?>" placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <label>Isi Konten</label>
                            <input type="text" class="form-control" name="body" value="<?php echo $info["body"]; ?>" placeholder="Isi Konten">
                        </div>
                        <br>
                        <button type="submit" value="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>