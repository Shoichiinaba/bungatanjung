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

	public function get_Shope($id_MP ='2')
	{
		  $this->db->select('toko.*');
			$this->db->where('id_MP', $id_MP);
			$query = $this->db->get('toko');
			return $query->result();
	}

  Function get_pedia($id_MP ='1')
		{
			$this->db->select('toko.*');
			$this->db->where('id_MP', $id_MP);
			$query = $this->db->get('toko');
			return $query->result();
		}

	public function simpan_trx($data)
	{
		$jumlah = count($data);

        if ($jumlah > 0) {
            $this->db->insert_batch('transaksi_tokopedia', $data);
        }
	}

  function delete($params ='')
    {
        $sql = "DELETE  FROM toko WHERE Id_toko = ? ";
        return $this->db->query($sql, $params);	
    }

	public function TOKPED(){ 
      
      $this->db->SELECT('RIGHT(toko.Id_toko,2) as kode', FALSE);
      $this->db->order_by('Id_toko','DESC');
      $this->db->limit(1);

      $query_ = $this->db->get('toko');
      if($query_->num_rows() <> 0) 
      {
        $data_ = $query_->row();
        $kode_ = intval($data_->kode) + 1;
      }
      else 
      {
        $kode_ = 1;
      }
      $kode_max_ = str_pad($kode_, 2, "0", STR_PAD_LEFT);
      $kode_jadi = "TKP-".$kode_max_;
      return $kode_jadi;
    }

	public function Shope(){ 
      
      $this->db->SELECT('RIGHT(toko.Id_toko,2) as kode', FALSE);
      $this->db->order_by('Id_toko','DESC');
      $this->db->limit(1);

      $query_ = $this->db->get('toko');
      if($query_->num_rows() <> 0) 
      {
        $data_ = $query_->row();
        $kode_ = intval($data_->kode) + 1;
      }
      else 
      {
        $kode_ = 1;
      }
      $kode_max_ = str_pad($kode_, 2, "0", STR_PAD_LEFT);
      $kode_jadi = "SPH-".$kode_max_;
      return $kode_jadi;
    }

	function tambah_tokped($Id_toko,$id_MP,$Nama_toko,$keterangan)
	{
        $hasil=$this->db->query("INSERT INTO toko(Id_toko,id_MP,Nama_toko,keterangan) VALUES ('$Id_toko','$id_MP','$Nama_toko','$keterangan')");
        return $hasil;
    }
}