<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_barang_model extends CI_Model {

	public function get_by_part($part_no)
	{
		$this->db->where('part_no',$part_no);
		$res = $this->db->get('master_barang');
		return $res;
	}

	public function get_all()
	{
		$this->db->limit(50,0);
		$res = $this->db->get('master_barang');
		return $res;
	}

	public function get_nama_plus_part_no()
	{
		$sql = "SELECT DISTINCT nama_barang, part_no, warna FROM master_barang ORDER BY nama_barang ASC";
		$res = $this->db->query($sql);
		return $res->result();
	}

	public function get_list_barang()
	{
		$sql = "SELECT DISTINCT nama_barang FROM master_barang ORDER BY nama_barang ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_list_cust()
	{
		$sql = "SELECT DISTINCT nama_customer FROM master_barang ORDER BY nama_customer ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_list_part_no()
	{
		$sql = "SELECT DISTINCT part_no FROM master_barang ORDER BY part_no ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_list_warna()
	{
		$sql = "SELECT DISTINCT warna FROM master_barang ORDER BY warna ASC";
		$res = $this->db->query($sql);
		return $res;
	}
	public function get_list_bahan()
	{
		$sql = "SELECT DISTINCT bahan FROM master_barang ORDER BY bahan ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_spesific($data)
	{
		$this->db->like($data);
		$res = $this->db->get('master_barang');
		return $res;
	}

}
