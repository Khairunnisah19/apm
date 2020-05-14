<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Blog extends CI_Controller 
	{
		function __construct(){
			parent::__construct();
			/*$this->load->model('files_model');
			$this->config =  array(
                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"]).'resource/img_mobil/',
                  'upload_url'      => base_url()."resource/img_mobil/",
                  'allowed_types'   => "gif|jpg|png|jpeg",
                  'overwrite'       => TRUE,id
                  'max_size'        => "1000KB",
                  'max_height'      => "768",
                  'max_width'       => "1024"  
                );
			*/
		}
		function index(){
			$this->load->model('model_artikel');
			$data['artikel'] = $this->model_artikel->fetch_artikel1(6, $this->uri->segment(3));
			$this->load->view('home', $data);
		}
		function daftar_isi(){
			$this->load->model('model_artikel');
			$data['datamobil'] = $this->model_artikel->get_mobiluser($id, 6, $this->uri->segment(3));
			$this->load->view('daftar_isi', $data);
		}
		function detailartikel(){
			$this->load->model('model_artikel');
			$data['artikel'] = $this->model_artikel->get_artikel($this->uri->segment(3));
			$this->load->view('artikel', $data);
		}
		function login(){
			$this->load->view('login');
		}
	}