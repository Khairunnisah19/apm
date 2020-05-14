<?php
class model_user extends CI_Model 
{

	function __construct() {
	}
	function insert_user($params) {
		//1 = admin, 2=user
		$q = $this->db->query("INSERT INTO user(nama_depan, nama_belakang, email, telp, username, password, url_pp, user_group) values(?,?,?,?,?,?,'',2)", array($params[0], $params[1], $params[2], $params[3], $params[4], md5($params[5])));
		return $q;
	}
	function login_user($username,$password){
		$q=$this->db->query("SELECT user.id_user, user.username, rental.id_rental FROM USER INNER JOIN rental ON user.id_user = rental.id_penjual WHERE user.username=? AND user.password=?",array($username,$password));
		return $q;
	}
	function ambil_mahasiswa_kategori($limit, $start, $kategori) {
		$query = $this->db->where('kategori', $kategori);
		$query = $this->db->get('tabel_mahasiswa', $limit, $start);
		return $query->result_array();
	}
	public function get_total() {
		$query = $this->db->get('tabel_mahasiswa');
		return $query->num_rows();
	}
	public function ambil_id($id) {
		$query = $this->db->where('id', $id);
		$query = $this->db->get('tabel_mahasiswa');
		return $query->first_row();
	}
	
	public function ubah($data_input, $id)
	{
	$this->db->trans_start();
	$this->db->where('id', $id);
	$this->db->update('tabel_mahasiswa', $data_input);
	$this->db->trans_complete();
	
	if($this->db->trans_status() === FALSE)
	{
	$pesan = array(
	'msg' => 'Data gagal dimasukkan',
	'success' => FALSE
	);
	} 
	else
	{
	$pesan = array(
	'msg' => 'Data berhasil dimasukkan',
	'success' => TRUE
	);
	}
	return json_encode($pesan);
	}
	
	function hapus($id)
	{
	$this->db->trans_start();
	$this->db->where('id', $id);
	$this->db->delete('tabel_mahasiswa');
	$this->db->trans_complete();
	
	if($this->db->trans_status() === FALSE)
	{
	$pesan = array(
	'msg' => 'Data gagal dihapus',
	'success' => FALSE
	);
	} 
	else
	{
	$pesan = array(
	'msg' => 'Data berhasil dihapus',
	'success' => TRUE
	);
	}
	return json_encode($pesan);
	}

}
?>