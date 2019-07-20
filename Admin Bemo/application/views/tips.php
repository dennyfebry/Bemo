<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Tips Merawat Mobil</h1>

<!-- DataTales  -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Tabel</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="<?php echo base_url(); ?>index.php/admin/tambah_tips" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
            <br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Servis</th>
                        <th>Bagian</th>
                        <th>Nama Servis</th>
                        <th>Waktu Pengerjaan</th>
                        <th>Harga</th>
                        <th>Saran Setiap</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kode Servis</th>
                        <th>Bagian</th>
                        <th>Nama Servis</th>
                        <th>Waktu Pengerjaan</th>
                        <th>Harga</th>
                        <th>Saran Setiap</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($tips->result() as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->kode_servis; ?></td>
                            <td><?php echo $row->bagian; ?></td>
                            <td><?php echo $row->nama_servis; ?></td>
                            <td><?php echo $row->waktu_pengerjaan; ?> menit</td>
                            <td>Rp<?php echo number_format($row->harga, 0, ".", "."); ?></td>
                            <td><?php echo $row->saran_setiap; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/admin/ubah_tips/<?php echo $row->id; ?>" class="btn btn-warning btn-xs" style="font-size: 10px;"><i class="fa fa-edit"></i> Ubah</a>
                                <a href="#hapus_tips<?php echo $row->id; ?>" class="btn btn-danger btn-xs" style="font-size: 10px;" data-toggle="modal"><i class="fa fa-trash"></i> Hapus</a></td>

                        </tr>
                        <div id="hapus_tips<?php echo $row->id; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Data ?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Pilih "Ya" di bawah ini jika anda siap untuk menghapus data tips perawatan mobil.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/admin/hapus_tips/<?php echo $row->id; ?>">Ya</a>
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