<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construc()
	{
		parent::__Construct();
	}

	public function index()
	{
		redirect('admin/dashboard');
	}
	public function dashboard()
	{
		empty($this->session->role)?redirect('auth'):'';
		$barang_masuk 	= $this->produksi_model->get_this_month();
		$barang_keluar 	= $this->produksi_model->get_this_month();
		$users			= $this->user_model->get();

		$data['jumlah_barang_masuk'] 	= $barang_masuk->num_rows();
		$data['jumlah_barang_keluar'] 	= $barang_keluar->num_rows();
		$data['jumlah_user'	]			= $users->num_rows();
		$data['title'] 					= "Admin";
		$this->load->view('admin/dashboard_page',$data);
	}

	public function po()
	{
		$po = $this->po_model->getAll();
		$data['po_list']  = $po->result();
		$this->load->view('admin/template/header',['title'=>"Input PO"]);
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/po_page',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah_po()
	{
		$master_barang 	= $this->master_barang_model->get_all();
		$po 			= $this->po_model->getAll();

		$list_nama_barang 	= $this->master_barang_model->get_list_barang();
		$list_nama_customer = $this->master_barang_model->get_list_cust();
		$list_part_no 		= $this->master_barang_model->get_list_part_no();
		$list_warna 		= $this->master_barang_model->get_list_warna();
		$list_bahan 		= $this->master_barang_model->get_list_bahan();
		$last_po			= $this->po_model->get_last_po();
		$data['list_nama_barang'] 	= $list_nama_barang->result();
		$data['list_nama_customer'] = $list_nama_customer->result();
		$data['list_part_no']		= $list_part_no->result();
		$data['list_bahan']			= $list_bahan->result();
		$data['list_warna']			= $list_warna->result();
		$data['master_barang']		= $master_barang->result();
		$data['po']					= $po->result();
		$data['last_po']			= $last_po;
		$data['list_barang']		= $this->master_barang_model->get_nama_plus_part_no();

		$this->load->view('admin/template/header',['title'=>'Tambah PO']);
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/tambah_po_page',$data);
		$this->load->view('admin/template/footer');
	}

	public function act_input_po()
	{
		$data['no_po'] 			= $this->input->post('po');
		$data['no_po_customer']	= $this->input->post('po_customer');
		$data['part_no'] 			= $this->input->post('part_no');
		$data['tanggal_po'] 	= $this->input->post('tanggal_po');
		$data['nama_customer'] 	= $this->input->post('customer');	
		$data['qty'] = $data['blnc_prod'] = $this->input->post('qty');
		//insert PO
		$po = $this->po_model->insert($data);


		if ($po) {
			$prod = $this->produksi_model->insert_production($data['no_po'], $data['part_no']);
			if ($prod) {
				redirect('admin/po');
			}else{
				print_r($prod->error);
			}
		}else{
			print_r($po);
		}

	}

	public function barang_filtered()
	{
		$part_no 		= $this->input->post('part_no');
		$nama_barang 	= $this->input->post('nama_barang');
		$nama_cust 		= $this->input->post('nama_cust');
		$warna 			= $this->input->post('warna');
		$bahan 			= $this->input->post('bahan');

		$clause_parm = [
			'part_no'=>$part_no,
			'nama_barang'=>$nama_barang,
			'nama_customer'=>$nama_cust,
			'warna'=>$warna,
			'bahan'=>$bahan
		];
		$barang = $this->master_barang_model->get_spesific($clause_parm);
		$data['barang'] = $barang->result();
		$this->load->view('admin/tb_barang_filtered',$data);
	}

	public function print_po()
	{
		$master_barang 	= $this->master_barang_model->get_all();
		$po 			= $this->po_model->getAll();

		$list_no_po 	= $this->po_model->get_list_po();
		$data['list_no_po'] 	= $list_no_po->result();

		$this->load->view('admin/template/header',['title'=>'Print PO']);
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/print_po_page',$data);
		$this->load->view('admin/template/footer');
	}

	public function po_table()
	{
		$po = $this->input->post('no_po');
		//print_r($po);die;
		$result_po = $this->po_model->get_By_no($po);
		$data['list_po'] =$result_po->result();	
		$this->load->view('admin/po_table_for_print',$data);
	}

	public function po_detail()
	{
		$po = $this->input->post('no_po');
		
		$result_po = $this->po_model->get_By_no($po);
		
		header('Content-type: application/json');
		echo json_encode($result_po->result_array()[0]);
	}

	public function users()
	{
		$data['title'] 			= "Admin | Extras";
		$users 					= $this->user_model->get();
		$data['users'] 			= $users->result();
		$data['jumlah_user'] 	= $users->num_rows();
		$this->load->view('admin/tb_users_page',$data);
	}

	public function adduser()
	{
		$data['title'] 			= "Admin | Extras";
		$this->load->view('admin/adduser_page',$data);
	}

	public function edit_user($id)
	{
		$data['title'] 					= "Admin | Extras";
		$user = $this->user_model->get_by_id($id);
		$data['user'] = $user->result()[0];
		$this->load->view('admin/edit_user_page',$data);
	}
}