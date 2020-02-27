<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Po_model extends CI_Model {

	public function getAll()
	{
		$sql = "SELECT po_table.*, 	master_barang.nama_barang,
		 							master_barang.ct, 
		 							master_barang.cav, 
		 							master_barang.bruto, 
		 							master_barang.netto, 
		 							master_barang.bahan,
		 							master_barang.warna,
		 							master_barang.komposisi_1,
		 							master_barang.komposisi_2, 
		 							master_barang.total_mb_name, 
		 							master_barang.total_mb_val "
		."FROM po_table "
		."INNER JOIN master_barang ON po_table.part_no=master_barang.part_no ORDER BY id DESC";

		$res = $this->db->query($sql);
		return $res;

	}

	public function get_last_po()
	{
		$sql = "SELECT * FROM `po_table` where id =(SELECT MAX(id) FROM po_table)";
		$res = $this->db->query($sql);
		if ($res->num_rows()>0) {
			return $res->result()[0];
		}else{
			return false;
		}
	}

	public function get_by_no($po)
	{
		$sql = "SELECT po_table.*, 	master_barang.nama_barang,
		 							master_barang.ct, 
		 							master_barang.cav, 
		 							master_barang.bruto, 
		 							master_barang.netto, 
		 							master_barang.bahan,
		 							master_barang.warna,
		 							master_barang.komposisi_1,
		 							master_barang.komposisi_2, 
		 							master_barang.total_mb_name, 
		 							master_barang.total_mb_val "
		."FROM po_table "
		."INNER JOIN master_barang ON po_table.part_no=master_barang.part_no ".
		"where no_po='$po'";

		$res = $this->db->query($sql);
		if ($res->num_rows()>0) {
			return $res;
		}else{
			return false;
		}

	}

	public function insert($data)
	{
		//get data barang
		$this->db->where('part_no',$data['part_no']);
		$barang = $this->db->get('master_barang')->result()[0];

		if ($barang->bruto > 0 AND $barang->cav > 0) {
			$data['keb_total_m'] 	= $barang->bruto * $data['qty'] / $barang->cav / 1000;
			$data['keb_m1'] 		= $data['keb_total_m'] * $barang->komposisi_1;
			$data['keb_m2'] 		= $data['keb_total_m'] * $barang->komposisi_2;
			$data['keb_mb']			= $data['keb_total_m'] * $barang->total_mb_val * 1000;
		}else{
			$data['keb_total_m'] 	= 0;
			$data['keb_m1'] 		= 0;
			$data['keb_m2'] 		= 0;
		}

		$res = $this->db->insert('po_table',$data);
		if ($ress) {
			//insert production
			$this->db->insert('production',['no_po'=>$data['no_po'], 'part_no'=>$data['part_no'],'no_mesin'=>'-']);
		}
		return $res;
	}

	public function get_list_PO()
	{
		$sql = "SELECT DISTINCT no_po FROM po_table ORDER BY no_po desc";
		$res = $this->db->query($sql);
		return $res;
	}
}
