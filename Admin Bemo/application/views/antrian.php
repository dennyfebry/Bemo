<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Antrian</h1>

<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Tabel</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>No Kendaraan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>No Kendaraan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($antrian->result() as $row) {
                        if ($row->status == "1") {
                            $text = "Menunggu konfirmasi";
                        } else if ($row->status == "2") {
                            $text = "Sudah di konfirmasi dan proses perbaikan mobil";
                        } else {
                            $text = "Telah Selesai";
                        }
                        ?>

                        <tr>
                            <td><?php echo $row->tgl_masuk; ?></td>
                            <td><?php echo $row->kode; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->no_kendaraan; ?></td>
                            <td><?php echo $text; ?></td>
                            <td>
                                <?php
                                if ($row->status == "1") {
                                    ?>
                                    <a href="<?php echo base_url(); ?>index.php/admin/konfirmasi_antrian/<?php echo $row->user_id; ?>/<?php echo $row->id; ?>" class="btn btn-success btn-xs" style="font-size: 10px;"><i class="fa fa-check"></i> Konfirmasi</a>
                                    <a href="#hapus_antrian<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-danger btn-xs" style="font-size: 10px;"><i class="fa fa-trash"></i> Hapus</a>
                                <?php

                                } else if ($row->status == "2") {
                                    ?>
                                    <a href="<?php echo base_url(); ?>index.php/admin/ubah_antrian/<?php echo $row->user_id; ?>/<?php echo $row->id; ?>" class="btn btn-warning btn-xs" style="font-size: 10px;"><i class="fa fa-edit"></i> Selesai</a>
                                    <a href="<?php echo base_url(); ?>index.php/admin/lengkap_servis/<?php echo $row->user_id; ?>/<?php echo $row->id; ?>" class="btn btn-info btn-xs" style="font-size: 10px;"><i class="fa fa-info-circle"></i> Lebih Lengkap</a>
                                <?php

                                }
                                ?>
                            </td>
                        </tr>
                        <div id="hapus_antrian<?php echo $row->id; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Batalkan Antrian ?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Pilih "Ya" di bawah ini jika anda ingin membatalkan antrian.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/admin/hapus_antrian/<?php echo $row->id; ?>">Ya</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>