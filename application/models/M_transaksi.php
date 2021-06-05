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
}