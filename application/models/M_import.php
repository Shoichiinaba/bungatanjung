<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_import extends CI_Model {

	public function simpan($data)
	{
		$jumlah = count($data);

        if ($jumlah > 0) {
            $this->db->insert_batch('deposit_tokopedia', $data);
        }
	}

	public function getData(){
		$this->db->select('*');
		return $this->db->get('deposit_tokopedia')->result_array();
	}

	public function simpan_trx($data)
	{
		$jumlah = count($data);

        if ($jumlah > 0) {
            $this->db->insert_batch('transaksi_tokopedia', $data);
        }
	}
}