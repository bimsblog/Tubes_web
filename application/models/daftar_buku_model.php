<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_buku_model extends CI_Model {

 public function insertdaftarbuku()
 {
 	$tanggal            = $this->input->post('tanggalPengembalian');
 	$convert            = date('Y-m-d', strtotime($tanggal));
 	$object = array(
 		'nama' =>$this->input->post('nama'),
 		'keterangan' =>$this->input->post('keterangan'),
 		'tanggal' => $convert,
 		'harga' =>$this->input->post('harga'),
 );
 	$this->db->insert('user', $object);
 }

public function getDatadaftarbuku()
	{
		$query = $this->db->get("daftar_buku");
		return $query->result_array();
	}
public function getdaftarbuku($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get('user');
			return $query->result();
		}


		public function updateById($id)
		{
			$data = array(
				'nama' => $this->input->post('nama'),
				'keterangan' => $this->input->post('keterangan'),
				'tanggal' => $this->input->post('tanggalPengembalian'),
				'harga' => $this->input->post('harga'),
			);
			$this->db->where('id', $id);
			$this->db->update('user', $data);
		}

		public function delete($id) { 
         $query = $this->db->query("Delete from user where id=$id");
         } 
     

     public function save()
     {
     	$data= $this->input->post();
     	$this->db->insert('user', $data);
     }
          public function deleteGrid($id)
     {
     	$this->db->where('id', $id);
     	$this->db->delete('user');
     }
          public function updateGrid($id)
     {
     	$this->db->where('id', $id);
     	$data= $this->input->post();
     	$this->db->update('user', $data);
     }
 }



     





/* End of file pegawai_model.php */
/* Location: ./application/models/pegawai_model.php */
