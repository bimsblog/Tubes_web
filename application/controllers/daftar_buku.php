<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpustakaan extends CI_Controller {

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
		$this->load->model('daftar_buku');
		$data['daftar_buku_list'] = $this->daftar_bukuodel->getDatadaftarbuku();
		$this->load->view('daftar_buku_admin', $data);
	}

	// Add a new item
	public function create()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('daftar_buku_model');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('tambah_daftar_buku_view');
		} 	
			else{
			$this->daftar_buku_model->insertdaftar_buku_admin();
			$this->load->view('tambah_daftar_buku_sukses');
			}
		}
		
	
	//Update one item
	public function update($id)
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');

		$this->load->model('daftar_buku_model');
		$data['daftar_buku_admin'] = $this->daftar_buku_model->getdaftarbuku($id);

		if ($this->form_validation->run()==FALSE)
		{
			$this->load->view('edit_perpustakaan_view',$data);
		}
		else
		{
			$this->daftar_buku_model->updateById($id);
			$this->load->view('edit_daftar_buku_sukses');
		}
	}

	//Delete one item
	public function delete($id)
	{
		$this->load->helper("url");
		$this->load->model("daftar_buku_model");
		$this->daftar_buku_model->delete($id);
		redirect('perpustakaan');
	}
}

/* End of file perpustakaan.php */
/* Location: ./application/controllers/perpustakaan.php */

 