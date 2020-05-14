<?php
	class model_artikel extends CI_Model 
	{
		function __construct() {
			$this->load->database();
		}
		function jumlah_artikel1() {
			return $this->db->count_all('artikel');
		}
		function fetch_artikel1($limit, $start) {
			$query = $this->db->get('artikel', $limit, $start);
			if ($query->num_rows() > 0) {
				return $query->result();			
			}
	    }
		function slider_mobil(){
			$sql = "SELECT mobil.jenis_mobil, mobil.harga_sewa, mobil.alamat, mobil.foto1, rental.nama_rental FROM mobil INNER JOIN rental WHERE mobil.id_rental = rental.id_rental AND mobil.status='iklan'";
			$q = $this->db->query($sql);
			return $q->result_array();
		}
		function get_mobiluser($id, $limit, $start){
			$q= $this->db->query(("SELECT mobil.jenis_mobil, mobil.thn_pembelian, mobil.foto1, mobil.bahan_bakar, mobil.harga_sewa, mobil.ketersediaan, user.nama_depan, user.nama_belakang, user.poin, rental.rating, rental.tgl_bergabung, rental.nama_rental FROM mobil JOIN rental ON mobil.id_rental = rental.id_rental JOIN user ON rental.id_penjual = user.id_user WHERE rental.id_penjual = ? LIMIT ?,?"), array($id, $start, $limit));
			return $q;		
		}	
		

		function get_artikel($id){
			$q= $this->db->query(("SELECT * FROM artikel WHERE id = ?"), $id);
			return $q;		
		}		
	}
?>