<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambah Servis</h1>
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
    </div>
    <div class="card-body">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form role="form" action="<?php echo base_url(); ?>index.php/admin/simpan_servis" method="POST">
                        <input type="hidden" class="form-control" name="pesanan_id" value="<?php echo $this->uri->segment(3); ?>">
                        <div class="form-group">
                            <label>Servis</label>
                            <select name="kode_servis">
                                <option value="">---Pilih Servis---</option>
                                <?php
                                foreach ($servis->result() as $row) {
                                    ?>
                                    <option value="<?php echo $row->kode_servis; ?>"><?php echo $row->nama_servis; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
                        <button type="submit" value="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>