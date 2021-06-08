<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function deposit()
	{
		$this->db->select('deposit_tokopedia.*');
		$query = $this->db->get('deposit_tokopedia');
		return $query->result();
	}

	public function transaksi()
	{
		$this->db->select('transaksi_tokopedia.*');
		$query = $this->db->get('transaksi_tokopedia');
		return $query->result();
	}

	function delete($params ='')
    {
        $sql = "DELETE  FROM deposit_tokopedia WHERE id_deposit = ? ";
        return $this->db->query($sql, $params);	
    }

	function hapus_trx($params ='')
    {
        $sql = "DELETE  FROM transaksi_tokopedia WHERE id_trx = ? ";
        return $this->db->query($sql, $params);	
    }

	public function cek_transaksi()
	{
		$this->db->select('deposit_tokopedia.*, transaksi_tokopedia.invoice as invoice, transaksi_tokopedia.product_name, transaksi_tokopedia.price, transaksi_tokopedia.total_amount');
		// ->select("IF(deposit_tokopedia.status, deposit_tokopedia.invoice, NULL) as deposit_invoice", FALSE);
		$this->db->from('deposit_tokopedia');
		$this->db->join('transaksi_tokopedia', 'transaksi_tokopedia.invoice = deposit_tokopedia.invoice', 'RIGHT');
		$query = $this->db->get('');
		return $query->result(); 
	}
	// dashboard informasi
	public function deposupload()
	{
		$this->db->select('deposit_tokopedia.*');
		$query = $this->db->get('deposit_tokopedia');
		return $query->num_rows();
	}

	public function trxupload()
	{
		$this->db->select('transaksi_tokopedia.*');
		$query = $this->db->get('transaksi_tokopedia');
		return $query->num_rows();
	}

	function trx_deposit()
  	{
        $this->db->select('deposit_tokopedia.*, transaksi_tokopedia.invoice as invoice, transaksi_tokopedia.product_name, transaksi_tokopedia.price, transaksi_tokopedia.total_amount');
		$this->db->from('deposit_tokopedia');
		$this->db->join('transaksi_tokopedia', 'transaksi_tokopedia.invoice = deposit_tokopedia.invoice');
		$query = $this->db->get('');
		return $query->num_rows();
    }

	function depos_no()
  	{
		$this->db->select('count(*) AS total');
		$this->db->from('deposit_tokopedia');
		$this->db->join('transaksi_tokopedia', 'transaksi_tokopedia.invoice = deposit_tokopedia.invoice', 'RIGHT');
		$this->db->where('deposit_tokopedia.status', NULL);
		$data=$this->db->get();
		return $data->result_array();
    }

	function trx_no()
  	{
        $this->db->select('count(*) AS total');
		$this->db->from('deposit_tokopedia');
		$this->db->join('transaksi_tokopedia', 'transaksi_tokopedia.invoice = deposit_tokopedia.invoice', 'LEFT');
		$this->db->where('transaksi_tokopedia.invoice', NULL);
		$data=$this->db->get();
		return $data->result_array();
    }

}