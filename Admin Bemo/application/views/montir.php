<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Akun Montir</h1>

<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Tabel</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="<?php echo base_url(); ?>index.php/admin/tambah_montir" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
            <a href="<?php echo base_url(); ?>index.php/admin/tingkat_montir" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"> Tingkatkan Akun</a>
            <br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($montir->result() as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->aktif; ?></td>
                            <td><?php echo $row->alamat; ?></td>
                            <td><?php echo $row->no_hp; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/admin/ubah_montir/<?php echo $row->id; ?>" class="btn btn-warning btn-xs" style="font-size: 10px;"><i class="fa fa-edit"></i> Ubah</a>
                                <a href="#hapus_akun<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-danger btn-xs" style="font-size: 10px;"><i class="fa fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <div id="hapus_akun<?php echo $row->id; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Akun Montir ?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Pilih "Ya" di bawah ini jika anda ingin menghapus data akun montir.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/admin/hapus_montir/<?php echo $row->id; ?>">Ya</a>
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