<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username']= $session_data ['username'];
			}
			else {
				redirect ('login','refresh');
			}
		
	}
	public function index()
	{
		$this->load->view('home');
	}

	public function daftarBukuAdmin()
	{
		// $this->load->view('daftar_buku_admin');
		$this->load->helper('url','form');
		$this->load->model('daftar_buku_model');
		$data['daftar_buku_list'] = $this->daftar_buku_model->getDatadaftarbuku();
		$this->load->view('daftar_buku_admin', $data);
	}
	
}
