<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tingkatkan Montir</h1>
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tingkat Montir</h6>
    </div>
    <div class="card-body">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form role="form" action="<?php echo base_url(); ?>index.php/admin/simpan_tingkat_montir" method="POST">
                        <div class="form-group">
                            <label>Email Akun</label>
                            <select name="email">
                                <option value="">---Pilih Email---</option>
                                <?php
                                foreach ($montir->result() as $row) {
                                    ?>
                                    <option value="<?php echo $row->email; ?>"><?php echo $row->email; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" value="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>