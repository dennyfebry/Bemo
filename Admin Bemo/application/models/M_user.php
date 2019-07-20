<?php
class M_user extends CI_Model
{
    public function user($user_id)
    {
        $sql = $this->db->query("SELECT pengguna.nama, pengguna.email FROM pengguna LEFT JOIN pesanan ON pengguna.id = pesanan.user_id WHERE pesanan.user_id = '$user_id'");
        return $sql;
    }

    public function montir($montir_id)
    {
        $sql = $this->db->query("SELECT pengguna.nama FROM pengguna LEFT JOIN pesanan ON pengguna.id = pesanan.montir_id WHERE pesanan.montir_id = '$montir_id'");
        return $sql;
    }

    public function jumlah_antrian_user()
    {
        $sql = $this->db->query("SELECT pengguna.nama, COUNT(pesanan.id) AS jumlah_servis FROM pengguna LEFT JOIN pesanan ON pengguna.id = pesanan.user_id WHERE pengguna.akses='user' GROUP BY pengguna.nama ORDER BY jumlah_servis DESC");
        return $sql;
    }

    public function jumlah_servis()
    {
        $sql = $this->db->query("SELECT daftar_servis.nama_servis, COUNT(servis.id) AS jumlah_servis FROM daftar_servis LEFT JOIN servis ON daftar_servis.kode_servis = servis.kode_servis GROUP BY daftar_servis.id ORDER BY jumlah_servis DESC");
        return $sql;
    }

    public function laporan()
    {
        $sql = $this->db->query("SELECT pesanan.id, pengguna.nama, pengguna.merk_mobil, pengguna.model_mobil, pengguna.no_kendaraan, pesanan.tgl_keluar, pesanan.wkt_mulai, pesanan.wkt_selesai FROM pengguna LEFT JOIN pesanan ON pengguna.id = pesanan.user_id WHERE pengguna.akses='user' AND pesanan.status='3' ORDER BY pesanan.tgl_keluar ASC");
        return $sql;
    }

    public function laporan_harga()
    {
        $sql = $this->db->query("SELECT servis.pesanan_id, daftar_servis.nama_servis, daftar_servis.waktu_pengerjaan, daftar_servis.harga FROM servis LEFT JOIN daftar_servis ON daftar_servis.kode_servis = servis.kode_servis ");
        return $sql;
    }

    public function search($date1, $date2)
    {
        $sql = $this->db->query("SELECT pesanan.id, pengguna.nama, pengguna.merk_mobil, pengguna.model_mobil, pengguna.no_kendaraan, pesanan.tgl_keluar, pesanan.wkt_mulai, pesanan.wkt_selesai FROM pengguna LEFT JOIN pesanan ON pengguna.id = pesanan.user_id WHERE pengguna.akses='user' AND pesanan.status='3' AND pesanan.tgl_keluar  between '$date1' and '$date2' ORDER BY pesanan.tgl_keluar ASC");
        return $sql;
    }
}
