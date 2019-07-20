<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Riwayat</h1>

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
                        <th>Tanggal Keluar</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>No Kendaraan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal Keluar</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>No Kendaraan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($riwayat->result() as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->tgl_keluar; ?></td>
                            <td><?php echo $row->kode; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->no_kendaraan; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/admin/lengkap_riwayat/<?php echo $row->user_id; ?>/<?php echo $row->id; ?>" class="btn btn-info btn-xs" style="font-size: 10px;"><i class="fa fa-info-circle"></i> Lebih Lengkap</a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>