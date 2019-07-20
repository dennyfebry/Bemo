<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	var $template = 'template';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_user');
		$this->load->model('Logo');
		$this->load->library('email');
		$this->load->library('pdf_report');
	}

	public function index()
	{
		$date1 = $this->input->post('date1'); //YYYY-MM-DD
		$date2 = $this->input->post('date2');
		$data = array(
			'date1' => $date1,
			'date2' => $date2,
		);
		if ($date1 == "" || $date2 == "") {
			$data["laporan"] = $this->M_user->laporan();
			$data["harga"] = $this->M_user->laporan_harga();
		} else {
			$data["laporan"] = $this->M_user->search($date1, $date2);
			$data["harga"] = $this->M_user->laporan_harga();
		}
		$data["title"] = "Beranda - Admin Bemo";
		$data["antrian"] = $this->M_admin->jumlah_antrian();
		$data["riwayat"] = $this->M_admin->jumlah_riwayat();
		$data["pengguna"] = $this->M_admin->jumlah_pengguna();
		$data["montir"] = $this->M_admin->jumlah_montir();
		$data["jumlah"] = $this->M_user->jumlah_antrian_user();
		$data["servis"] = $this->M_user->jumlah_servis();
		// $data["laporan"] = $this->M_user->laporan();
		$data['content'] = 'admin';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}

	public function pdf()
	{
		$date1 =  $this->uri->segment(3);
		$date2 =  $this->uri->segment(4);
		$data["date1"] = $date1;
		$data["date2"] = $date2;
		if ($date1 == "" || $date2 == "") {
			$data["laporan"] = $this->M_user->laporan();
			$data["harga"] = $this->M_user->laporan_harga();
		} else {
			$data['laporan'] = $this->M_user->search($date1, $date2);
			$data["harga"] = $this->M_user->laporan_harga();
		}
		$this->load->view('laporan', $data);
	}

	public function pdf2()
	{
		$data["laporan"] = $this->M_user->laporan();
		$data["harga"] = $this->M_user->laporan_harga();
		$this->load->view('laporan2', $data);
	}


	public function info()
	{
		$data["title"] = "Info Beranda - Admin Bemo";
		$data["info"] = $this->M_admin->info();
		$data['content'] = 'info';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}

	public function ubah_info($id)
	{
		$data["title"] = "Info Beranda - Admin Bemo";
		$data['info'] = $this->M_admin->ubah_info($id);
		$data['content'] = 'form/ubah_info';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}

	public function upload()
	{
		$data = array();
		$id =  $this->uri->segment(3);

		if ($this->input->post('submit')) {
			$upload = $this->Logo->upload();
			if ($upload['result'] == "success") {
				$this->Logo->save($upload);
				redirect('admin/info');
			} else {
				$data['message'] = $upload['error'];
			}
		}

		$data["title"] = "Info Beranda - Admin Bemo";
		$data['info'] = $this->M_admin->ubah_info($id);
		$data['content'] = 'form/logo';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}


	public function simpanubah_info()
	{
		$id = $this->input->post('id');
		$perubahan = $this->input->post('tanggal');
		$title = $this->input->post('title');
		$body = $this->input->post('body');
		$data = array(
			'perubahan' => $perubahan,
			'title' => $title,
			'body' => $body
		);
		$this->M_admin->simpanubah_info($id, $data);
		redirect('Admin/info');
	}

	public function tips()
	{
		$data["title"] = "Tips Merawat Mobil - Admin Bemo";
		$data["tips"] = $this->M_admin->tips();
		$data['content'] = 'tips';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}

	public function tambah_tips()
	{
		$data["title"] = "Tips Merawat Mobil - Admin Bemo";
		$data["h1"] = "Tambah Tips Merawat Mobil";
		$data["h6"] = "Tambah Data";
		$data['content'] = 'form/tambah_tips';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('c_login/index');
		}
	}

	public function ubah_tips($id)
	{
		$data["title"] = "Tips Merawat Mobil - Admin Bemo";
		$data["h1"] = "Ubah Tips Merawat Mobil";
		$data["h6"] = "Ubah Data";
		$data['tips'] = $this->M_admin->ubah_tips($id);
		$data['content'] = 'form/ubah_tips';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}

	public function simpan_tips()
	{
		$id = $this->input->post('id');
		$bagian = $this->input->post('bagian');
		$kode_servis = $this->input->post('kode_servis');
		$nama_servis = $this->input->post('nama_servis');
		$waktu_pengerjaan = $this->input->post('waktu_pengerjaan');
		$harga = $this->input->post('harga');
		$saran_setiap = $this->input->post('saran_setiap');
		$data = array(
			'bagian' => $bagian,
			'kode_servis' => $kode_servis,
			'nama_servis' => $nama_servis,
			'waktu_pengerjaan' => $waktu_pengerjaan,
			'harga' => $harga,
			'saran_setiap' => $saran_setiap
		);
		$this->M_admin->simpan_tips($data);
		redirect('Admin/tips');
	}

	public function simpanubah_tips()
	{
		$id = $this->input->post('id');
		$bagian = $this->input->post('bagian');
		$kode_servis = $this->input->post('kode_servis');
		$nama_servis = $this->input->post('nama_servis');
		$waktu_pengerjaan = $this->input->post('waktu_pengerjaan');
		$harga = $this->input->post('harga');
		$saran_setiap = $this->input->post('saran_setiap');
		$data = array(
			'bagian' => $bagian,
			'kode_servis' => $kode_servis,
			'nama_servis' => $nama_servis,
			'waktu_pengerjaan' => $waktu_pengerjaan,
			'harga' => $harga,
			'saran_setiap' => $saran_setiap
		);
		$this->M_admin->simpanubah_tips($id, $data);
		redirect('Admin/tips');
	}

	public function hapus_tips($id)
	{
		$this->M_admin->hapus_tips($id);
		redirect('Admin/tips');
	}

	public function antrian()
	{
		$data["title"] = "Antrian - Admin Bemo";
		$data["antrian"] = $this->M_admin->antrian();
		$data['content'] = 'antrian';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}

	public function konfirmasi_antrian()
	{
		$userID =  $this->uri->segment(3);
		$servisID =  $this->uri->segment(4);
		$data["title"] = "Antrian - Admin Bemo";
		$data['antrian'] = $this->M_admin->konfirmasi_antrian($userID, $servisID);
		foreach ($data['antrian']->result() as $row) {
			$tanggal = $row->tgl_masuk;
			// $montir = $row->montir_id;
		}
		$data['cek_montir'] = $this->M_admin->cek_montir($tanggal);
		$data['content'] = 'form/konfirmasi_antrian';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}

	public function konfirmasi_antrian_fix()
	{
		$id = $this->input->post('id');
		$user_id = $this->input->post('user_id');
		$montir_id = $this->input->post('montir_id');
		$kode = $this->input->post('kode');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$tgl_keluar = $this->input->post('tgl_keluar');
		$wkt_mulai = $this->input->post('wkt_mulai');
		$keterangan = $this->input->post('keterangan');
		$status = $this->input->post('status');
		$data = array(
			'user_id' => $user_id,
			'montir_id' => $montir_id,
			'kode' => $kode,
			'tgl_masuk' => $tgl_masuk,
			'tgl_keluar' => $tgl_keluar,
			'wkt_mulai' => $wkt_mulai,
			'keterangan' => $keterangan,
			'status' => $status
		);

		$user = $this->M_user->user($user_id);
		foreach ($user->result() as $row) {
			$nama = $row->nama;
			$email = $row->email;
		}

		$montir = $this->M_user->montir($montir_id);
		foreach ($montir->result() as $ro) {
			$nama_montir = $ro->nama;
		}

		$this->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "noreply.bemo25@gmail.com";
		$config['smtp_pass'] = "bemo12345";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$this->email->initialize($config);
		$this->email->from('noreply.bemo25@gmail.com', 'Admin Bemo');
		$this->email->to($email);
		$this->email->subject('Konfirmasi Antrian');
		$message = '';
		$message .= 'Dear ' . $nama . ',<br/><br/>';
		$message .= 'Berikut kami infomasikan antrian servis mobil anda di Bengkel Martono:<br/><br/>';
		$message .= '<table style="text-align: left;">
		<tr>
		  <th>Kode Antrian</th>
		  <td style="text-align: right;">:</td>
		  <td>' . $kode . '</td>
		</tr>
		<tr>
		  <th>Nama Montir</th>
		  <td style="text-align: right;">:</td>
		  <td>' . $nama_montir . '</td>
		</tr>
		<tr>
		  <th>Tanggal</th>
		  <td style="text-align: right;">:</td>
		  <td>' . $tgl_masuk . '</td>
		</tr>
		<tr>
		  <th>Waktu</th>
		  <td style="text-align: right;">:</td>
		  <td>' . $wkt_mulai . ' - selesai</td>
		</tr>
	  </table><br/><br/>';
		$message .= 'Dan dimohon untuk datang sesuai jam yang telah ditentukan<br/><br/>';
		$message .= 'Terimakasih';
		$this->email->message($message);
		$this->email->send();
		$this->M_admin->konfirmasi_antrian_fix($id, $tgl_keluar, $wkt_mulai, $status);
		$url = base_url() . "index.php/admin/tambah_servis/" . $id;
		redirect($url);
	}

	public function ubah_antrian()
	{
		$userID =  $this->uri->segment(3);
		$servisID =  $this->uri->segment(4);
		$data["title"] = "Antrian - Admin Bemo";
		$data['antrian'] = $this->M_admin->ubah_antrian($userID, $servisID);
		$data["servis"] = $this->M_admin->lengkap_servis($userID, $servisID);
		$data['content'] = 'form/ubah_antrian';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}

	public function simpanubah_antrian()
	{
		$id = $this->input->post('id');
		$user_id = $this->input->post('user_id');
		$montir_id = $this->input->post('montir_id');
		$kode = $this->input->post('kode');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$tgl_keluar = $this->input->post('tgl_keluar');
		$wkt_mulai = $this->input->post('wkt_mulai');
		$wkt_selesai = $this->input->post('wkt_selesai');
		$keterangan = $this->input->post('keterangan');
		$status = $this->input->post('status');
		$data = array(
			'user_id' => $user_id,
			'montir_id' => $montir_id,
			'kode' => $kode,
			'tgl_masuk' => $tgl_masuk,
			'tgl_keluar' => $tgl_keluar,
			'wkt_mulai' => $wkt_mulai,
			'wkt_selesai' => $wkt_selesai,
			'keterangan' => $keterangan,
			'status' => $status
		);

		$user = $this->M_user->user($user_id);
		foreach ($user->result() as $row) {
			$nama = $row->nama;
			$email = $row->email;
		}

		$montir = $this->M_user->montir($montir_id);
		foreach ($montir->result() as $ro) {
			$nama_montir = $ro->nama;
		}

		$servis = $this->M_admin->lengkap_servis($user_id, $id);
		$jumlah_waktu = 0;
		$total_harga = 0;
		foreach ($servis->result() as $r) {
			$jumlah_waktu += $r->waktu_pengerjaan;
			$total_harga += $r->harga;
		}

		$i = 1;
		if ($status == '3') {
			$this->load->library('email');
			$config['protocol'] = "smtp";
			$config['smtp_host'] = "ssl://smtp.gmail.com";
			$config['smtp_port'] = "465";
			$config['smtp_user'] = "noreply.bemo25@gmail.com";
			$config['smtp_pass'] = "bemo12345";
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";
			$this->email->initialize($config);
			$this->email->from('noreply.bemo25@gmail.com', 'Admin Bemo');
			$this->email->to($email);
			$this->email->subject('Konfirmasi Antrian');
			$message = '';
			$message .= 'Dear ' . $nama . ',<br/><br/>';
			$message .= 'Berikut kami informasikankan bahwa mobil anda telah selesai di servis:<br/><br/>';
			$message .= '<table style="text-align: left;">
		<tr>
		  <th>Kode Servis</th>
		  <td style="text-align: right;">:</td>
		  <td> ' . $kode . '</td>
		</tr>
		<tr>
		  <th>Nama Montir</th>
		  <td style="text-align: right;">:</td>
		  <td> ' . $nama_montir . '</td>
		</tr>
		<tr>
		  <th>Tanggal </th>
		  <td style="text-align: right;">:</td>
		  <td> ' . $tgl_keluar . '</td>
		</tr>
		<tr>
		  <th>Waktu </th>
		  <td style="text-align: right;">:</td>
		  <td> ' . $wkt_mulai . ' - ' . $wkt_selesai . '</td>
		</tr>
		<tr>
		  <th>Keterangan</th>
		  <td style="text-align: right;">:</td>
		  <td> ' . $keterangan . '</td>
		</tr>
		<tr>
		  <th>Servis</th>
		  <td style="text-align: right;">:</td>
		  <td></td>
		</tr>';
			foreach ($servis->result() as $r) {
				$message .= '<div style="margin-left: 100px;">' . $i . '. ' . $r->nama_servis . '(Rp' . number_format($r->harga, 0, ".", ".") . ')</div>';
				$i++;
			}
			$message .= '<tr>
			<th>Durasi</th>
			<td style="text-align: right;">:</td>
			<td> ' . $jumlah_waktu . ' menit</td>
		  </tr>
		  <tr>
			<th>Total Harga</th>
			<td style="text-align: right;">:</td>
			<td> Rp' . number_format($total_harga, 0, ".", ".") . '</td>
		  </tr>';
			$message .= '</table><br/><br/>';
			$message .= 'Bila mobil anda tidak enak, jangan lupa untuk datang kembali...<br/>';
			$message .= 'Terimakasih';
			$this->email->message($message);
			$this->email->send();
		}
		$this->M_admin->simpanubah_antrian($id, $montir_id, $tgl_masuk, $tgl_keluar, $wkt_mulai, $wkt_selesai, $status, $keterangan);
		$userID = $user_id;
		$riwayatID = $id;
		$data["riwayat"] = $this->M_admin->lengkap_riwayat($userID, $riwayatID);
		$this->load->view('nota', $data);
		redirect('admin/antrian');
	}

	public function lengkap_servis()
	{
		$userID =  $this->uri->segment(3);
		$servisID =  $this->uri->segment(4);
		$data["title"] = "Servis Lengkap - Admin Bemo";
		$data["servis"] = $this->M_admin->lengkap_servis($userID, $servisID);
		$data['content'] = 'lengkap_servis';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}

	public function tambah_servis($pesanan_id)
	{
		$data["title"] = "Tambah Servis - Admin Bemo";
		$data["servis"] = $this->M_admin->tips();
		$data['content'] = 'form/tambah_servis';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data, $pesanan_id);
		} else {
			redirect('c_login/index');
		}
	}

	public function simpan_servis()
	{
		$pesanan_id = $this->input->post('pesanan_id');
		$kode_servis = $this->input->post('kode_servis');
		$tanggal = $this->input->post('tanggal');
		$data = array(
			'pesanan_id' => $pesanan_id,
			'kode_servis' => $kode_servis,
			'tanggal' => $tanggal
		);
		$this->M_admin->simpan_servis($data);
		redirect('Admin/antrian');
	}

	public function hapus_servis($id)
	{
		$this->M_admin->hapus_servis($id);
		redirect('Admin/antrian');
	}


	public function hapus_antrian($id)
	{
		$this->M_admin->hapus_antrian($id);
		redirect('Admin/antrian');
	}

	public function riwayat()
	{
		$data["title"] = "Riwayat - Admin Bemo";
		$data["riwayat"] = $this->M_admin->riwayat();
		$data['content'] = 'riwayat';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}

	public function lengkap_riwayat()
	{
		$userID =  $this->uri->segment(3);
		$riwayatID =  $this->uri->segment(4);
		$data["userID"] = $userID;
		$data["riwayatID"] = $riwayatID;
		$data["title"] = "Riwayat - Admin Bemo";
		$data["riwayat"] = $this->M_admin->lengkap_riwayat($userID, $riwayatID);
		$data['content'] = 'lengkap_riwayat';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}

	public function nota()
	{
		$userID =  $this->uri->segment(3);
		$riwayatID =  $this->uri->segment(4);
		$data["riwayat"] = $this->M_admin->lengkap_riwayat($userID, $riwayatID);
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view('nota', $data);
		} else {
			redirect('login/index');
		}
	}

	public function pengguna()
	{
		$data["title"] = "Akun Pengguna - Admin Bemo";
		$data["pengguna"] = $this->M_admin->pengguna();
		$data['content'] = 'pengguna';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}

	public function tambah_pengguna()
	{
		$data["title"] = "Akun Pengguna - Admin Bemo";
		$data["h1"] = "Tambah Akun Pengguna";
		$data["h6"] = "Tambah Data";
		$data['content'] = 'form/tambah_pengguna';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('c_login/index');
		}
	}

	public function ubah_pengguna($id)
	{
		$data["title"] = "Akun Pengguna - Admin Bemo";
		$data["h1"] = "Ubah Akun Pengguna";
		$data["h6"] = "Ubah Data";
		$data['pengguna'] = $this->M_admin->ubah_pengguna($id);
		$data['content'] = 'form/ubah_pengguna';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}

	public function simpan_pengguna()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$akses = $this->input->post('akses');
		$aktif = $this->input->post('aktif');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$merk_mobil = $this->input->post('merk_mobil');
		$model_mobil = $this->input->post('model_mobil');
		$no_kendaraan = $this->input->post('no_kendaraan');
		$data = array(
			'nama' => $nama,
			'email' => $email,
			'password' => $password,
			'akses' => $akses,
			'aktif' => $aktif,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'merk_mobil' => $merk_mobil,
			'model_mobil' => $model_mobil,
			'no_kendaraan' => $no_kendaraan
		);
		$this->M_admin->simpan_pengguna($data);
		redirect('Admin/pengguna');
	}

	public function simpanubah_pengguna()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$akses = $this->input->post('akses');
		$aktif = $this->input->post('aktif');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$merk_mobil = $this->input->post('merk_mobil');
		$model_mobil = $this->input->post('model_mobil');
		$no_kendaraan = $this->input->post('no_kendaraan');
		$data = array(
			'nama' => $nama,
			'email' => $email,
			'password' => $password,
			'akses' => $akses,
			'aktif' => $aktif,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'merk_mobil' => $merk_mobil,
			'model_mobil' => $model_mobil,
			'no_kendaraan' => $no_kendaraan
		);
		$this->M_admin->simpanubah_pengguna($id, $data);
		redirect('Admin/pengguna');
	}

	public function hapus_pengguna($id)
	{
		$this->M_admin->hapus_pengguna($id);
		redirect('Admin/pengguna');
	}

	public function montir()
	{
		$data["title"] = "Akun Montir - Admin Bemo";
		$data["montir"] = $this->M_admin->montir();
		$data['content'] = 'montir';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}

	public function tambah_montir()
	{
		$data["title"] = "Akun Montir - Admin Bemo";
		$data["h1"] = "Tambah Akun Montir";
		$data["h6"] = "Tambah Data";
		$data['content'] = 'form/tambah_montir';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('c_login/index');
		}
	}

	public function tingkat_montir()
	{
		$data["title"] = "Tingkatkan Akun - Admin Bemo";
		$data['montir'] = $this->M_admin->pengguna();
		$data['content'] = 'form/tingkat_montir';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('c_login/index');
		}
	}

	public function simpan_tingkat_montir()
	{
		$email = $this->input->post('email');
		$this->M_admin->simpan_tingkat_montir($email);
		redirect('Admin/montir');
	}

	public function ubah_montir($id)
	{
		$data["title"] = "Akun Montir - Admin Bemo";
		$data["h1"] = "Ubah Akun Montir";
		$data["h6"] = "Ubah Data";
		$data['montir'] = $this->M_admin->ubah_pengguna($id);
		$data['content'] = 'form/ubah_montir';
		if (isset($_SESSION['udhmasuk'])) {
			$this->load->view($this->template, $data);
		} else {
			redirect('login/index');
		}
	}

	public function simpan_montir()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$akses = $this->input->post('akses');
		$aktif = $this->input->post('aktif');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$merk_mobil = $this->input->post('merk_mobil');
		$model_mobil = $this->input->post('model_mobil');
		$no_kendaraan = $this->input->post('no_kendaraan');
		$data = array(
			'nama' => $nama,
			'email' => $email,
			'password' => $password,
			'akses' => $akses,
			'aktif' => $aktif,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'merk_mobil' => $merk_mobil,
			'model_mobil' => $model_mobil,
			'no_kendaraan' => $no_kendaraan
		);
		$this->M_admin->simpan_pengguna($data);
		redirect('Admin/montir');
	}

	public function simpanubah_montir()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$akses = $this->input->post('akses');
		$aktif = $this->input->post('aktif');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$merk_mobil = $this->input->post('merk_mobil');
		$model_mobil = $this->input->post('model_mobil');
		$no_kendaraan = $this->input->post('no_kendaraan');
		$data = array(
			'nama' => $nama,
			'email' => $email,
			'password' => $password,
			'akses' => $akses,
			'aktif' => $aktif,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'merk_mobil' => $merk_mobil,
			'model_mobil' => $model_mobil,
			'no_kendaraan' => $no_kendaraan
		);
		$this->M_admin->simpanubah_pengguna($id, $data);
		redirect('Admin/montir');
	}

	public function hapus_montir($id)
	{
		$this->M_admin->hapus_pengguna($id);
		redirect('Admin/montir');
	}
}
