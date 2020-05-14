<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class list_blog extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('model_artikel');
			$this->load->library('pagination');
			$config['per_page'] = 5;
			//$config['num_links'] = 9;
			$config['total_rows'] = $this->model_artikel->jumlah_artikel1();
			$config['base_url'] = base_url().'index.php/list_artikel/artikel1';
			$this->pagination->initialize($config);

		}
		function artikel1() {
			$data['results'] = $this->model_artikel->fetch_artikel1(5, $this->uri->segment(3));
			$data['hal'] = $this->pagination->create_links();
			//$this->load->view('v_sub_menu');
			//$this->load->view('v_header');
			$this->load->view("daftar_isi", $data);
			//$this->load->view('v_footer');
		}
}