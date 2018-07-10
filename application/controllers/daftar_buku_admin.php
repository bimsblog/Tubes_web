<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpustakaan_home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username']= $session_data ['username'];
			$data['level']= $session_data ['level'];
			$current_controller = $this->router->fetch_class();
			$this->load->library('acl');
			if (! $this->acl->is_public($current_controller))
			{
				if(! $this->acl->is_allowed($current_controller,$data['level']))
				{
					redirect('login/logout','refresh');
				}
			}
			else
			{
				redirect('login','refresh');
			}

			

		}

	}
	// List all your items
	public function index()
	{
		$this->load->helper('url','form');
		$this->load->model('daftar_buku_model');
		$data['daftar_buku_list'] = $this->daftar_buku_model->getDatadaftarbuku();
		$this->load->view('daftar_buku_admin', $data);
	}
}
?>