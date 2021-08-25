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

  public function get_data_temp($id_toko = '?'){
    // SELECT 
    // b.tgl_upload, 
    // b.id_toko, 
    // count(a.id_upload) as jumlah_data, 
    // SUM(a.nominal) as total_nominal, 
    // SUM(a.balance) as total_balance 
    // FROM deposit_tokopedia a, histori_upload b WHERE a.id_upload = b.id GROUP BY a.id_upload
		$this->db->select('b.id as id_upload, b.tgl_upload, b.id_toko');
    $this->db->select('COUNT(a.id_upload) as jumlah_data');
    $this->db->select('SUM(a.nominal) as total_nominal');
    $this->db->select('SUM(a.balance) as total_balance');
    $this->db->from('deposit_tokopedia AS a, histori_upload AS b');
    $this->db->where('a.id_upload = b.id');
    $this->db->where("a.id_toko = '$id_toko'");
    $this->db->group_by('a.id_upload');
    $sql = $this->db->get();
    return $sql->result();
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

  function delete_temp($params ='')
    {
        $sql = "DELETE  FROM histori_upload WHERE id = ? ";
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