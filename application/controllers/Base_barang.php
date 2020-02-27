<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_barang extends CI_Controller {

	public function index()
	{
		$list_barang = $this->master_barang_model->get_all(TRUE,'DESC');
		$list_warna = $this->master_barang_model->get_list_warna();
		$data['list_barang'] = $list_barang->result();
		$data['list_warna']  = $list_warna->result();
		$d =[];
		$n = 0;
		foreach ($data['list_warna'] as $key) {
			$d[$n] = $key->warna;
			$n++;
		}
		$data['list_warna'] = $d;


		$this->load->view('admin/template/header',['title'=>'Database | Barang']);
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/base_barang/list_barang',$data);
		$this->load->view('admin/template/footer');
	}

	public function search_kd_barang()
	{
		$keyword = $this->input->post('kode_customer');

		$res = $this->master_barang_model->search_by_kd_cust($keyword);
		
		echo json_encode($res);
	}

	
}