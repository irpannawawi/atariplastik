<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

	public function insert()
	{
		$lokasi = $this->input->post('lokasi');
		$res = $this->lokasi_model->insert($lokasi);

		if ($res) {
			$this->session->set_flashdata('status',"Berhassil");
			redirect('admin/input_lokasi');
		}else{
			$this->session->set_flashdata('status',"Gagal");
			redirect('admin/input_lokasi');
		}
	}

	public function delete($id)
	{
		$res = $this->lokasi_model->delete($id);
		if ($res) {
			$this->session->set_flashdata('status',"Terhapus");
			redirect('admin/input_lokasi');
		}else{
			$this->session->set_flashdata('status',"Gagal");
			redirect('admin/input_lokasi');
		}
	}
}
