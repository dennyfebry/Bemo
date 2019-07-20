<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{
	var $template = 'template';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_email');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data["title"] = "Verifikasi";
		$this->load->view('verifikasi', $data);
	}

	public function test()
	{
		$id =  $this->uri->segment(3);
		$this->M_email->update_aktif_akun($id);
		redirect('Email/index');
	}

	public function lupa()
	{
		$id =  $this->uri->segment(3);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]', [
			'min_length' => 'Password terlalu pendek'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
			'matches' => 'Password tidak cocok!'
		]);

		if ($this->form_validation->run() == false) {
			$data["title"] = "Lupa Password";
			$data['pengguna'] = $this->M_email->lupa_password($id);
			$this->load->view('lupa_password', $data);
		} else {
			$id = $this->input->post('id');
			$password = md5($this->input->post('password1'));
			$this->M_email->simpanlupa_password($id, $password);
			redirect('Email/sukses_ganti_pass');
		}
	}

	public function sukses_ganti_pass()
	{
		$data["title"] = "Sukses Ganti Password";
		$this->load->view('sukses', $data);
	}
}
