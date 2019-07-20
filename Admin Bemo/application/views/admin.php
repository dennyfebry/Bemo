<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
</div>

<!-- Content Row -->
<div class="row">
    <?php

    $i = 0;
    foreach ($antrian->result() as $row) {
        $i++;
    }

    $j = 0;
    foreach ($riwayat->result() as $row) {
        $j++;
    }

    $k = 0;
    foreach ($pengguna->result() as $row) {
        $k++;
    }

    $l = 0;
    foreach ($montir->result() as $row) {
        $l++;
    }
    ?>

    <!-- Card Antrian -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Antrian</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $i; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Riwayat Transaksi -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Riwayat</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $j; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-history fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Account Pelanggan -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pelanggan</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $k; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Account Montir -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Montir</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $l; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tools fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <!-- Area Chart -->
    <div class="col-xl-7 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Jumlah Data Antrian Setiap Pengguna</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!-- <div class="chart-area"> -->
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-bordered table-striped mb-0" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jumlah Servis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($jumlah->result() as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row->nama; ?></td>
                                    <td><?php echo $row->jumlah_servis; ?></td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-5 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Servis yang paling sering</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-bordered table-striped mb-0" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Servis</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($servis->result() as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row->nama_servis; ?></td>
                                    <td><?php echo $row->jumlah_servis; ?></td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <?php
            if (($date1 == true) && ($date2 == true)) { } else {
                $date1 = "";
                $date2 = "";
            }
            ?>
            <form class="form-inline" action="<?php echo site_url('Admin/index'); ?>" method="post">
                <div class="form-group">
                    <input class="form-control" type="date" name="date1" value="<?php echo $date1; ?>" />
                </div> s/d
                <div class="form-group">
                    <input class="form-control" type="date" name="date2" value="<?php echo $date2; ?>" />
                </div>
                <button type="submit" class="btn btn-primary" style="font-size: 12px;"><i class="fa fa-search"></i> Search</button>
            </form>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Merk Mobil</th>
                        <th>Model Mobil</th>
                        <th>No Kendaraan</th>
                        <th>Waktu Servis</th>
                        <th>Tanggal Servis</th>
                        <th>Servis</th>
                        <th>Total Harga Servis</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Merk Mobil</th>
                        <th>Model Mobil</th>
                        <th>No Kendaraan</th>
                        <th>Waktu Servis</th>
                        <th>Tanggal Servis</th>
                        <th>Servis</th>
                        <th>Total Harga Servis</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $i = 1;
                    $j = 1;
                    $id = 0;
                    $deskripsi = "";
                    foreach ($laporan->result() as $row) {
                        foreach ($harga->result() as $hg) {
                            if ($row->id != $id) {
                                $total_harga = 0;
                                $deskripsi = "";
                                $j = 1;
                            }
                            $id = $row->id;
                            if ($id == $hg->pesanan_id) {
                                $total_harga += $hg->harga;
                                $deskripsi .= $j . ". " . $hg->nama_servis . "<br>";
                                $j++;
                            }
                        }
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->merk_mobil; ?></td>
                            <td><?php echo $row->model_mobil; ?></td>
                            <td><?php echo $row->no_kendaraan; ?></td>
                            <td><?php echo $row->wkt_mulai; ?> - <?php echo $row->wkt_selesai; ?></td>
                            <td><?php echo $row->tgl_keluar; ?></td>
                            <td><?php echo $deskripsi; ?></td>
                            <td>Rp<?php echo number_format($total_harga, 0, ".", "."); ?></td>
                        </tr>
                        <?php
                        $i++;
                    } ?>
                </tbody>
            </table>
            <?php
            if (($date1 == true) && ($date2 == true)) {
                $A = "pdf/$date1/$date2";
            } else {
                $A = "pdf2";
            }
            ?>
            <a href="<?php echo $A ?>" class="btn btn-danger" style="font-size: 12px;color: white;"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>
</div>