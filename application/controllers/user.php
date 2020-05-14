<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct() {
		parent::__construct();
	}
	function index() {
		$this->load->view('v_sub_menu');
		$this->load->view('v_header');
		$this->load->view('coba');
		$this->load->view('v_footer');
	}
	function home() {
		$this->load->model('model_mobil');
		$data['list_mobil'] = $this->model_mobil->slider_mobil();
		$data_testimoni['testimoni'] = $this->get_testimoni();
		$this->load->view('v_sub_menu');
		$this->load->view('v_header'); 
		$this->load->view('menu');
		$this->load->view('p_slider', $data);
		$this->load->view('home', $data_testimoni);
		$this->load->view('v_footer');
	}
	function ganti_password(){
		$this->load->view('v_sub_menu');
		$this->load->view('v_header'); 
		$this->load->view('menu');
		$this->load->view('ganti_password');
		$this->load->view('v_footer');
	}
	function s() {
	$this->load->view('v_sub_menu');
	$this->load->view('v_header');
	$this->load->view('p_slider');
	$this->load->view('v_footer');
	}
	function login_user() {
		$this->load->view('v_sub_menu');
		$this->load->view('v_header');
		$this->load->view('login');
		$this->load->view('v_footer');
	}
	function registrasi() {
		$this->load->view('v_sub_menu');
		$this->load->view('v_header');
		$this->load->view('registrasi');
		$this->load->view('v_footer');
	}
	function login() {
		$this->load->view('v_sub_menu');
		$this->load->view('v_header');
		$this->load->view('login');
		$this->load->view('v_footer');
	}

	//============================================= FUNGSI PENDUKUNG =========================================================
	function get_testimoni(){
		$this->load->model('model_testimoni');
		$query=$this->model_testimoni->get_testimoni();
		return $query;
	}
	function cek_login() {
		$username=ifunsetempty($_POST,'username','');
		$password=ifunsetempty($_POST,'password','');
		$this->load->library('session');
		$this->load->model('model_user');
		$query=$this->model_user->login_user($username,md5($password));
		if($query->num_rows==1){
			$row=$query->first_row();
			$data1 = $this->session->set_userdata(array(
				"id_user"		=> $row->id_user,
				"username"		=> $row->username,
				"id_rental"		=> $row->id_rental,
				"logged_in"		=> 1
			));
			$data=array('success'=>true);
			}else{
				$data=array('success'=>false);
			}
		echo json_encode($data, $data1);
	}
	function logout(){
		 $this->session->sess_destroy();
		 redirect('/user/home');
	}
	//============================================= DATABASE =========================================================
	function insert_user() {
		//$this->load->helper('input_helper');			
		$params=array(
			ifunsetempty($_POST,'nama_depan',NULL),
			ifunsetempty($_POST,'nama_belakang',NULL),
			ifunsetempty($_POST,'email',NULL),
			ifunsetempty($_POST,'telp',NULL),
			ifunsetempty($_POST,'username',NULL),
			ifunsetempty($_POST,'password',NULL)
		);
		$this->load->model('model_user');
		$q = $this->model_user->insert_user($params);
		if($q){
			echo json_encode(array('success'=>TRUE));
		}else{
			echo json_encode(array('success'=>FALSE));
		}
	}
}
?>