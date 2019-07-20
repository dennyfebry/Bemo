<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Riwayat Servis</h1>
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
                    // print_r($riwayat);
                    $jumlah_waktu = 0;
                    $total_harga = 0;
                    foreach ($riwayat->result() as $row) {
                        $kode = $row->kode;
                        $nama = $row->nama;
                        $tgl_masuk = $row->tgl_masuk;
                        $tgl_keluar = $row->tgl_keluar;
                        $wkt_mulai = $row->wkt_mulai;
                        $wkt_selesai = $row->wkt_selesai;
                        $keterangan = $row->keterangan;
                        $jumlah_waktu += $row->waktu_pengerjaan;
                        $total_harga += $row->harga;
                    }
                    ?>
                    <div>Kode Riwayat: <?php echo $kode; ?></div>
                    <div>Nama Pelanggan : <?php echo $nama; ?></div>
                    <div>Tanggal Masuk : <?php echo $tgl_masuk; ?></div>
                    <div>Tanggal Keluar : <?php echo $tgl_keluar; ?></div>
                    <div>Waktu : <?php echo $wkt_mulai; ?> - <?php echo $wkt_selesai; ?></div>
                    <div>Keterangan : <?php echo $keterangan; ?></div>
                    <div>Servis :</div>
                    <?php
                    $i = 1;
                    foreach ($riwayat->result() as $row) { ?>
                        <div><?php echo $i; ?>. <?php echo $row->nama_servis; ?> (Rp<?php echo number_format($row->harga, 0, ".", "."); ?>)</div>
                        <?php
                        $i++;
                    }
                    ?>
                    <div>Durasi : <?php echo $jumlah_waktu; ?> menit</div>
                    <div>Total Harga : Rp<?php echo number_format($total_harga, 0, ".", "."); ?></div>
                    <br>
                    <a href="<?php echo base_url(); ?>index.php/admin/riwayat" class="btn btn-info btn-xs" style="font-size: 10px;"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <a href="<?php echo base_url(); ?>index.php/admin/nota/<?= $userID ?>/<?= $riwayatID ?>" class="btn btn-danger btn-xs" style="font-size: 10px;color: white;"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
        </div>
    </div>