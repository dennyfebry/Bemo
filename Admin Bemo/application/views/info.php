<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Informasi Beranda</h1>

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
            <th>Bagian</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Terkahir di ubah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Bagian</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Terkahir di ubah</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          foreach ($info->result() as $row) {
            ?>
            <tr>
              <td><?php echo $row->bagian; ?></td>
              <td><?php echo $row->title; ?></td>
              <?php
              if ($row->bagian == 'logo') {
                ?>
                <td><img src="<?php echo base_url("public/img/" . $row->title); ?>" height="40" width="100"><?php echo $row->body; ?></td>
                <td><?php echo $row->perubahan; ?></td>
                <td><a href="<?php echo base_url(); ?>index.php/admin/upload/<?php echo $row->id; ?>" class="btn btn-primary btn-xs" style="font-size: 10px;"><i class="fa fa-edit"></i> Upload</a></td>
              <?php } else {
                ?>
                <td><?php echo $row->body; ?></td>
                <td><?php echo $row->perubahan; ?></td>
                <td><a href="<?php echo base_url(); ?>index.php/admin/ubah_info/<?php echo $row->id; ?>" class="btn btn-warning btn-xs" style="font-size: 10px;"><i class="fa fa-edit"></i> Ubah</a></td>

              <?php }
              ?>
            </tr>
          <?php
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>