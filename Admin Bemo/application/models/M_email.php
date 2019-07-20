<?php
class M_email extends CI_Model
{

    function update_aktif_akun($id)
    {
        $sql = $this->db->query("UPDATE pengguna SET aktif='1' WHERE id='$id';");
        return $sql;
        
     }

     public function lupa_password($id)
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

	function simpanlupa_password($id, $password)
	{
        $sql = $this->db->query("UPDATE pengguna SET password='$password' WHERE id='$id';");
        return $sql;
	}
}
