<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Servis Lengkap</h1>
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Servis Lengkap</h6>
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
                        $wkt_mulai = $row->wkt_mulai;
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
                    <div>Waktu Mulai : <?php echo $wkt_mulai; ?></div>
                    <div>Keterangan : <?php echo $keterangan; ?></div>
                    <div>Servis :</div>
                    <?php
                    $i = 1;
                    foreach ($servis->result() as $row) { ?>
                        <div><?php echo $i; ?>. <?php echo $row->nama_servis; ?> (Rp<?php echo number_format($row->harga, 0, ".", "."); ?>)<a href="<?php echo base_url(); ?>index.php/admin/hapus_servis/<?php echo $row->id; ?>" class="btn btn-danger btn-xs" style="font-size: 8px;"><i class="fa fa-trash"></i> X</a></div>
                        <?php
                        $i++;
                    }
                    ?>
                    <div>Durasi : <?php echo $jumlah_waktu; ?> menit</div>
                    <div>Total Harga : Rp<?php echo number_format($total_harga, 0, ".", "."); ?></div>
                    <br>
                    <a href="<?php echo base_url(); ?>index.php/admin/antrian" class="btn btn-info btn-xs" style="font-size: 10px;"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <a href="<?php echo base_url(); ?>index.php/admin/tambah_servis/<?php echo $row->pesanan_id; ?>" class="btn btn-primary btn-xs" style="font-size: 10px;"><i class="fas fa-plus "></i> Tambah Servis</a>
                </div>
            </div>
        </div>
    </div>