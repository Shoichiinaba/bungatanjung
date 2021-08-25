<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function deposit()
	{
		$this->db->select('deposit_tokopedia.*, toko.id_toko AS id_toko, toko.Nama_toko');
    	$this->db->join('toko', 'deposit_tokopedia.id_toko = toko.id_toko');
    	$sql = $this->db->get('deposit_tokopedia');
    	return $sql->result();
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
		$query = $this->db->query("SELECT 
		IF(deposit_tokopedia.status IS NULL, '', deposit_tokopedia.date) as date,
		IF(deposit_tokopedia.status IS NULL, '', deposit_tokopedia.status) as status, 
		deposit_tokopedia.id_toko,
		toko.Nama_toko as Nama_toko,
		deposit_tokopedia.nominal, 
		deposit_tokopedia.balance, 
		IF(deposit_tokopedia.status IS NULL, '', deposit_tokopedia.invoice) as deposit_invoice, 
		transaksi_tokopedia.invoice as invoice, 
		transaksi_tokopedia.product_name, 
		transaksi_tokopedia.price, 
		transaksi_tokopedia.total_amount 
		FROM deposit_tokopedia 
		RIGHT JOIN transaksi_tokopedia ON deposit_tokopedia.invoice = transaksi_tokopedia.invoice
		LEFT JOIN toko ON deposit_tokopedia.id_toko = toko.Id_toko");
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

	function jml_toko()
  	{
        $this->db->select('toko.*');
		$query = $this->db->get('toko');
		return $query->num_rows();
    }

}