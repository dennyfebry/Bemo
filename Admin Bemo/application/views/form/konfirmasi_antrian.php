<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Konfirmasi Antrian</h1>
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Data</h6>
    </div>
    <div class="card-body">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <h6 class="m-0 font-weight-bold text-primary">Kesibukan Montir</h6>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Montir</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($cek_montir->result() as $ro) {
                                ?>
                                <tr>
                                    <td><?php echo $ro->nama; ?></td>
                                    <td><?php echo $ro->tgl_masuk; ?></td>
                                    <td><?php echo $ro->wkt_mulai; ?> - <?php echo $ro->wkt_selesai; ?></td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                    <br><br>
                    <?php
                    foreach ($antrian->result() as $row) {
                        ?>
                        <form role="form" action="<?php echo base_url(); ?>index.php/admin/konfirmasi_antrian_fix" method="POST">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $row->id; ?>">
                            <input type="hidden" class="form-control" name="user_id" value="<?php echo $row->user_id; ?>">
                            <input type="hidden" class="form-control" name="status" value="2">
                            <div class="form-group">
                                <label>Kode Antrian</label>
                                <input type="hidden" class="form-control" name="kode" value="<?php echo $row->kode; ?>">
                                <input type="text" class="form-control" name="kode" value="<?php echo $row->kode; ?>" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $row->nama; ?>" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label>No Kendaraan</label>
                                <input type="text" class="form-control" name="no_kendaraan" value="<?php echo $row->no_kendaraan; ?>" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="hidden" class="form-control" name="tgl_masuk" value="<?php echo $row->tgl_masuk; ?>">
                                <input type="date" class="form-control" name="tgl_masuk" value="<?php echo $row->tgl_masuk; ?>" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="hidden" class="form-control" name="keterangan" value="<?php echo $row->keterangan; ?>" placeholder="Keterangan">
                                <input type="text" class="form-control" name="keterangan" value="<?php echo $row->keterangan; ?>" placeholder="Keterangan" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label>Montir</label>
                                <select name="montir_id">
                                    <option value="1" <?php $row->montir_id == '1' ? print "selected" : "" ?>>Ipin</option>
                                    <option value="2" <?php $row->montir_id == '2' ? print "selected" : "" ?>>Budi</option>
                                    <option value="6" <?php $row->montir_id == '6' ? print "selected" : "" ?>>Didi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Keluar</label>
                                <input type="date" class="form-control" name="tgl_keluar" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="form-group">
                                <label>Waktu Mulai</label>
                                <input type="text" id="time" name="wkt_mulai" class="form-control floating-label" value="" placeholder="Time">
                            </div>
                            <br>
                        <?php
                        } ?>
                        <button type="submit" value="submit" class="btn btn-success">Selanjutnya</button>
                    </form>

                </div>
            </div>
        </div>
    </div>