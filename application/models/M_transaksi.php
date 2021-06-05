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
		$this->db->from('deposit_tokopedia');
		$this->db->join('transaksi_tokopedia', 'transaksi_tokopedia.invoice = deposit_tokopedia.invoice', 'right');
		$query = $this->db->get('');
		return $query->result();
	}


}