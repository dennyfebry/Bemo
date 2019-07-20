<?php
class Logo extends CI_Model
{
    public function upload()
    {
        $config['upload_path'] = './public/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('input_gambar')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    // Fungsi untuk menyimpan data ke database
    public function save($upload)
    {
        $id = $this->input->post('id');
        $tanggal = $this->input->post('tanggal');
        $filename = $upload['file']['file_name'];
        $filesize = $upload['file']['file_size'];
        $filetype = $upload['file']['file_type'];

        $sql = $this->db->query("UPDATE info SET title='$filename', body='<br>$filesize KB<br>$filetype', perubahan='$tanggal' WHERE id='$id';");
        return $sql;
    }
}
