<?php
class M_admin extends CI_Model
{
	public function jumlah_antrian()
	{
		$sql = $this->db->query("SELECT * FROM pesanan WHERE status IN (1,2)");
		return $sql;
	}

	public function jumlah_riwayat()
	{
		$sql = $this->db->query("SELECT * FROM pesanan WHERE status = '3'");
		return $sql;
	}

	public function jumlah_pengguna()
	{
		$sql = $this->db->query("SELECT * FROM pengguna WHERE akses = 'user'");
		return $sql;
	}

	public function jumlah_montir()
	{
		$sql = $this->db->query("SELECT id,nama,email FROM pengguna WHERE akses = 'montir'");
		return $sql;
	}

	public function info()
	{
		$sql = $this->db->query("SELECT * FROM info");
		return $sql;
	}

	public function ubah_info($id)
	{
		$this->db->select('*');
		$this->db->from('info');
		$this->db->where("id", $id);
		$sql = $this->db->get();
		if ($sql->num_rows() > 0) {
			$row = $sql->row_array();
			return $row;
		}
	}

	function simpanubah_info($id, $data)
	{
		$this->db->where("id", $id);
		$this->db->update('info', $data);
	}

	public function tips()
	{
		$sql = $this->db->query("SELECT * FROM daftar_servis");
		return $sql;
	}

	function simpan_tips($data)
	{
		$this->db->insert('daftar_servis', $data);
	}

	public function ubah_tips($id)
	{
		$this->db->select('*');
		$this->db->from('daftar_servis');
		$this->db->where("id", $id);
		$sql = $this->db->get();
		if ($sql->num_rows() > 0) {
			$row = $sql->row_array();
			return $row;
		}
	}

	function simpanubah_tips($id, $data)
	{
		$this->db->where("id", $id);
		$this->db->update('daftar_servis', $data);
	}

	function hapus_tips($id)
	{
		$this->db->where("id", $id);
		$this->db->delete('daftar_servis');
	}

	public function antrian()
	{
		$sql = $this->db->query("SELECT pesanan.id, pesanan.user_id, pengguna.nama, pengguna.no_kendaraan, pesanan.kode, pesanan.tgl_masuk, pesanan.tgl_keluar, pesanan.wkt_mulai, pesanan.wkt_selesai, pesanan.status FROM pengguna LEFT JOIN pesanan ON pengguna.id = pesanan.user_id WHERE pesanan.status IN (1,2) ORDER BY pesanan.tgl_masuk, pesanan.status DESC");
		return $sql;
	}

	public function konfirmasi_antrian($userID, $servisID)
	{
		$sql = $this->db->query("SELECT pesanan.id, pesanan.user_id, pesanan.montir_id, pengguna.nama, pengguna.no_kendaraan, pesanan.kode, pesanan.tgl_masuk, pesanan.status, pesanan.keterangan FROM pengguna LEFT JOIN pesanan ON pengguna.id = pesanan.user_id WHERE pesanan.id = '$servisID' AND pesanan.user_id = '$userID'");
		return $sql;
	}

	public function cek_montir($tanggal)
	{
		$sql = $this->db->query("SELECT pesanan.id, pesanan.montir_id, pengguna.nama, pesanan.kode, pesanan.tgl_masuk, pesanan.wkt_mulai, pesanan.wkt_selesai FROM pengguna LEFT JOIN pesanan ON pengguna.id = pesanan.montir_id WHERE pesanan.tgl_masuk = '$tanggal' AND pesanan.status = '2' ORDER BY pesanan.wkt_selesai DESC");
		return $sql;
	}

	public function konfirmasi_antrian_fix($id, $tgl_keluar, $wkt_mulai, $status)
	{
		$sql = $this->db->query("UPDATE pesanan SET tgl_keluar='$tgl_keluar', wkt_mulai='$wkt_mulai', status='$status' WHERE id='$id';");
		return $sql;
	}

	public function ubah_antrian($userID, $servisID)
	{
		$sql = $this->db->query("SELECT pesanan.id, pesanan.user_id, pesanan.montir_id, pengguna.nama, pengguna.no_kendaraan, pesanan.kode, pesanan.tgl_masuk, pesanan.tgl_keluar, pesanan.wkt_mulai, pesanan.wkt_selesai, pesanan.status, pesanan.keterangan FROM pengguna LEFT JOIN pesanan ON pengguna.id = pesanan.user_id WHERE pesanan.id = '$servisID' AND pesanan.user_id = '$userID'");
		return $sql;
	}

	public function simpanubah_antrian($id, $montir_id, $tgl_masuk, $tgl_keluar, $wkt_mulai, $wkt_selesai, $status, $keterangan)
	{
		$sql = $this->db->query("UPDATE pesanan SET montir_id='$montir_id',  tgl_masuk='$tgl_masuk', tgl_keluar='$tgl_keluar', wkt_mulai='$wkt_mulai', wkt_selesai='$wkt_selesai', status='$status', keterangan='$keterangan' WHERE id='$id';");
		return $sql;
	}

	public function lengkap_servis($userID, $servisID)
	{
		$sql = $this->db->query("SELECT servis.id, servis.pesanan_id, pengguna.nama, pesanan.tgl_masuk, pesanan.tgl_keluar, pesanan.kode, pesanan.keterangan, pesanan.wkt_mulai, pesanan.wkt_selesai, pesanan.status, daftar_servis.nama_servis, daftar_servis.waktu_pengerjaan, daftar_servis.harga FROM servis LEFT JOIN daftar_servis ON daftar_servis.kode_servis = servis.kode_servis LEFT JOIN pesanan ON pesanan.id = servis.pesanan_id LEFT JOIN pengguna ON pengguna.id = pesanan.montir_id WHERE pesanan.user_id = '$userID' AND servis.pesanan_id = '$servisID'");
		return $sql;
	}

	function simpan_servis($data)
	{
		$this->db->insert('servis', $data);
	}

	function hapus_servis($id)
	{
		$this->db->query("DELETE FROM servis WHERE id = '$id'");
	}

	function hapus_antrian($id)
	{
		$this->db->query("DELETE FROM pesanan WHERE id = '$id'");
	}

	public function riwayat()
	{
		$sql = $this->db->query("SELECT pesanan.id, pesanan.user_id, pengguna.nama, pengguna.no_kendaraan, pesanan.kode, pesanan.tgl_masuk, pesanan.tgl_keluar, pesanan.wkt_mulai, pesanan.wkt_selesai, pesanan.status FROM pengguna LEFT JOIN pesanan ON pengguna.id = pesanan.user_id WHERE pesanan.status = '3' ORDER BY pesanan.tgl_masuk, pesanan.status DESC");
		return $sql;
	}

	public function lengkap_riwayat($userID, $riwayatID)
	{
		$sql = $this->db->query("SELECT pengguna.nama, pesanan.tgl_masuk, pesanan.tgl_keluar, pesanan.kode, pesanan.keterangan, pesanan.wkt_mulai, pesanan.wkt_selesai, daftar_servis.nama_servis, daftar_servis.waktu_pengerjaan, daftar_servis.harga FROM servis LEFT JOIN daftar_servis ON daftar_servis.kode_servis = servis.kode_servis LEFT JOIN pesanan ON pesanan.id = servis.pesanan_id LEFT JOIN pengguna ON pengguna.id = pesanan.user_id WHERE pesanan.user_id = '$userID' AND servis.pesanan_id = '$riwayatID'");
		return $sql;
	}

	public function pengguna()
	{
		$sql = $this->db->query("SELECT * FROM pengguna WHERE akses = 'user';");
		return $sql;
	}

	public function montir()
	{
		$sql = $this->db->query("SELECT * FROM pengguna WHERE akses = 'montir';");
		return $sql;
	}

	public function simpan_tingkat_montir($email)
	{
		$sql = $this->db->query("UPDATE pengguna SET akses='montir' WHERE email='$email';");
		return $sql;
	}

	function simpan_pengguna($data)
	{
		$this->db->insert('pengguna', $data);
	}

	public function ubah_pengguna($id)
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where("id", $id);
		$sql = $this->db->get();
		if ($sql->num_rows() > 0) {
			$row = $sql->row_array();
			return $row;
		}
	}

	function simpanubah_pengguna($id, $data)
	{
		$this->db->where("id", $id);
		$this->db->update('pengguna', $data);
	}

	function hapus_pengguna($id)
	{
		$this->db->query("DELETE FROM pengguna WHERE id = '$id'");
	}
}
