<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Konfirmasi Selesai Sevis</h1>
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Data</h6>
    </div>
    <div class="card-body">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <?php
                    $jumlah_waktu = 0;
                    $total_harga = 0;
                    foreach ($servis->result() as $row) {
                        $status = $row->status;
                        $kode = $row->kode;
                        $nama = $row->nama;
                        $tgl_masuk = $row->tgl_masuk;
                        $keterangan = $row->keterangan;
                        $jumlah_waktu += $row->waktu_pengerjaan;
                        $total_harga += $row->harga;
                    }
                    if ($status == "1") {
                        $text = "Belum di konfirmasi";
                    } else if ($status == "2") {
                        $text = "Sudah di konfirmasi dan proses perbaikan mobil";
                    } else {
                        $text = "Telah Selesai";
                    }
                    ?>
                    <div>Status: <?php echo $text; ?></div>
                    <div>Kode Antrian: <?php echo $kode; ?></div>
                    <div>Nama Montir : <?php echo $nama; ?></div>
                    <div>Tanggal : <?php echo $tgl_masuk; ?></div>
                    <div>Keterangan : <?php echo $keterangan; ?></div>
                    <div>Servis :</div>
                    <?php
                    $i = 1;
                    foreach ($servis->result() as $row) { ?>
                        <div><?php echo $i; ?>. <?php echo $row->nama_servis; ?> (Rp<?php echo number_format($row->harga, 0, ".", "."); ?>)</div>
                        <?php
                        $i++;
                    }
                    ?>
                    <div>Durasi : <?php echo $jumlah_waktu; ?> menit</div>
                    <div>Total Harga : Rp<?php echo number_format($total_harga, 0, ".", "."); ?></div>
                    <br><br>
                    <?php
                    foreach ($antrian->result() as $ro) {
                        ?>
                        <form role="form" action="<?php echo base_url(); ?>index.php/admin/simpanubah_antrian" method="POST">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $ro->id; ?>">
                            <input type="hidden" class="form-control" name="user_id" value="<?php echo $ro->user_id; ?>">
                            <!-- <input type="hidden" class="form-control" name="montir_id" value=""> -->
                            <div class="form-group">
                                <label>Kode Antrian</label>
                                <input type="hidden" class="form-control" name="kode" value="<?php echo $ro->kode; ?>">
                                <input type="text" class="form-control" name="kode" value="<?php echo $ro->kode; ?>" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label>Montir</label>
                                <select name="montir_id">
                                    <option value="1" <?php $ro->montir_id == '1' ? print "selected" : "" ?>>Ipin</option>
                                    <option value="2" <?php $ro->montir_id == '2' ? print "selected" : "" ?>>Budi</option>
                                    <option value="6" <?php $ro->montir_id == '6' ? print "selected" : "" ?>>Didi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $ro->nama; ?>" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label>No Kendaraan</label>
                                <input type="text" class="form-control" name="no_kendaraan" value="<?php echo $ro->no_kendaraan; ?>" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="date" class="form-control" name="tgl_masuk" value="<?php echo $ro->tgl_masuk; ?>">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Keluar</label>
                                <input type="date" class="form-control" name="tgl_keluar" value="<?php echo $ro->tgl_keluar; ?>">
                            </div>
                            <div class="form-group">
                                <label>Waktu Mulai</label>
                                <input type="text" id="time" name="wkt_mulai" class="form-control floating-label" value="<?php echo $ro->wkt_mulai; ?>" placeholder="Time">
                                <!-- <input type="time" class="form-control" name="wkt_mulai" value=""> -->
                            </div>
                            <div class="form-group">
                                <label>Waktu Selesai</label>
                                <input type="text" id="time2" name="wkt_selesai" class="form-control floating-label" value="<?php echo $ro->wkt_selesai; ?>" placeholder="Time">
                                <!-- <input type="time" class="form-control" name="wkt_selesai" value=""> -->
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" value="<?php echo $ro->keterangan; ?>" placeholder="Keterangan">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status">
                                    <option value="1" <?php $ro->status == '1' ? print "selected" : "" ?>>1 (Belum di konfirmasi)</option>
                                    <option value="2" <?php $ro->status == '2' ? print "selected" : "" ?>>2 (Telah di konfirmasi)</option>
                                    <option value="3" <?php $ro->status == '3' ? print "selected" : "" ?>>3 (Selesai)</option>
                                </select>
                            </div>
                            <br>
                        <?php
                        } ?>
                        <button type="submit" value="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>