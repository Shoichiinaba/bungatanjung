<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_import extends CI_Model
{

  // start datatables
  var $column_order = array('count', 'order_id', 'pagement_date', 'order_status', 'product_id', 'product_name', 'quantity', 'SKU', 'notes', 'price', 'discount_amount'); //set column field database for datatable orderable
  var $column_search = array('count', 'order_id', 'pagement_date', 'order_status', 'product_id', 'product_name', 'quantity', 'SKU', 'notes', 'price', 'discount_amount'); //set column field database for datatable searchable
  var $order = array('count' => 'asc'); // default order

  private function _get_datatables_query()
  {
    $this->db->select('transaksi_tokopedia.*');
    $this->db->from('transaksi_tokopedia');
    $i = 0;
    foreach ($this->column_search as $item) { // loop column
      if (@$_POST['search']['value']) { // if datatable send POST for search
        if ($i === 0) { // first loop
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }
        if (count($this->column_search) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $i++;
    }

    if (isset($_POST['order'])) { // here order processing
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }
  function get_datatables()
  {
    $this->_get_datatables_query();
    if (@$_POST['length'] != -1)
      $this->db->limit(@$_POST['length'], @$_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }
  function count_filtered()
  {
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }
  function count_all()
  {
    $this->db->from('transaksi_tokopedia');
    return $this->db->count_all_results();
  }
  // end datatables


  public function simpan($data)
  {
    $jumlah = count($data);

    if ($jumlah > 0) {
      $this->db->insert_batch('deposit_tokopedia', $data);
    }
  }

  public function getData()
  {
    $this->db->select('*');
    return $this->db->get('deposit_tokopedia')->result_array();
  }

  public function get_data_temp($id_toko = '?')
  {
    # kode ke 2
    // SELECT b.id, b.id_toko, b.tgl_upload, b.tipe_histori, SUM(a.nominal) AS nominal, SUM(a.balance) AS balance  FROM `histori_upload` AS b, deposit_tokopedia a WHERE b.id = a.id_upload GROUP BY b.id
    // UNION ALL
    // SELECT b.id, b.id_toko, b.tgl_upload, b.tipe_histori, 0, SUM(a.price) AS balance  FROM `histori_upload` AS b, transaksi_tokopedia a WHERE b.id = a.id_upload GROUP BY b.id

    $this->db->select('b.id as id_upload, b.tgl_upload, b.id_toko');
    $this->db->select('COUNT(a.id_upload) as jumlah_data');
    $this->db->select('SUM(a.nominal) as total_nominal');
    $this->db->select('SUM(a.balance) as total_balance');
    $this->db->select('b.tipe_histori as tipe_histori');
    $this->db->from('deposit_tokopedia AS a, histori_upload AS b');
    $this->db->where('a.id_upload = b.id');
    if (strlen(trim($id_toko)) > 0) {
      $this->db->where("a.id_toko = '$id_toko'");
    }
    $this->db->group_by('a.id_upload');
    $query_deposit = $this->db->get_compiled_select();

    $this->db->select('b.id as id_upload, b.tgl_upload, b.id_toko');
    $this->db->select('COUNT(a.id_upload) as jumlah_data');
    $this->db->select('0');
    $this->db->select('SUM(a.price) as total_balance');
    $this->db->select('b.tipe_histori as tipe_histori');
    $this->db->from('transaksi_tokopedia AS a, histori_upload AS b');
    $this->db->where('a.id_upload = b.id');
    if (strlen(trim($id_toko)) > 0) {
      $this->db->where("a.id_toko = '$id_toko'");
    }
    $this->db->group_by('a.id_upload');
    $query_transaksi = $this->db->get_compiled_select();

    $query = $this->db->query($query_deposit . ' UNION ALL ' . $query_transaksi);
    // $sql = $query->db->get();
    return $query->result();
  }

  public function get_Shope($id_MP = '2')
  {
    $this->db->select('toko.*');
    $this->db->where('id_MP', $id_MP);
    $query = $this->db->get('toko');
    return $query->result();
  }

  function get_pedia($id_MP = '1')
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

  function delete($params = '')
  {
    $sql = "DELETE  FROM toko WHERE Id_toko = ? ";
    return $this->db->query($sql, $params);
  }

  function delete_temp($params = '')
  {
    $idHistory = $params;
    $this->db->where('id', $idHistory);
    $this->db->limit(1);
    $historyUploadData = $this->db->get('histori_upload');

    $sql = "DELETE  FROM histori_upload WHERE id = ? ";
    $hapusDataHistori = $this->db->query($sql, $params);
    if ($hapusDataHistori) {
      if ($historyUploadData->num_rows() > 0) {
        $result = $historyUploadData->result()[0]->tipe_histori;
        if ($result == 'deposit') {
          // hapus data deposit
          return $this->db->query("DELETE FROM deposit_tokopedia WHERE id_upload = ?", $idHistory);
        } else {
          // hapus data transaksi
          return $this->db->query("DELETE FROM transaksi_tokopedia WHERE id_upload = ?", $idHistory);
        }
      }
    }
  }

  public function TOKPED()
  {

    $this->db->SELECT('RIGHT(toko.Id_toko,2) as kode', FALSE);
    $this->db->order_by('Id_toko', 'DESC');
    $this->db->limit(1);

    $query_ = $this->db->get('toko');
    if ($query_->num_rows() <> 0) {
      $data_ = $query_->row();
      $kode_ = intval($data_->kode) + 1;
    } else {
      $kode_ = 1;
    }
    $kode_max_ = str_pad($kode_, 2, "0", STR_PAD_LEFT);
    $kode_jadi = "TKP-" . $kode_max_;
    return $kode_jadi;
  }

  public function Shope()
  {

    $this->db->SELECT('RIGHT(toko.Id_toko,2) as kode', FALSE);
    $this->db->order_by('Id_toko', 'DESC');
    $this->db->limit(1);

    $query_ = $this->db->get('toko');
    if ($query_->num_rows() <> 0) {
      $data_ = $query_->row();
      $kode_ = intval($data_->kode) + 1;
    } else {
      $kode_ = 1;
    }
    $kode_max_ = str_pad($kode_, 2, "0", STR_PAD_LEFT);
    $kode_jadi = "SPH-" . $kode_max_;
    return $kode_jadi;
  }

  function tambah_tokped($Id_toko, $id_MP, $Nama_toko, $keterangan)
  {
    $hasil = $this->db->query("INSERT INTO toko(Id_toko,id_MP,Nama_toko,keterangan) VALUES ('$Id_toko','$id_MP','$Nama_toko','$keterangan')");
    return $hasil;
  }
}
