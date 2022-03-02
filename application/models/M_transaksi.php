<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
	// start datatables
	var $column_order = array('date', 'status', 'invoice', 'nominal', 'balance'); //set column field database for datatable orderable
	var $column_search = array('date', 'status', 'invoice', 'nominal', 'balance'); //set column field database for datatable searchable
	var $order = array('date' => 'asc'); // default order

	private function _get_datatables_query()
	{
		$this->db->select('deposit_tokopedia.*, toko.id_toko AS id_toko, toko.Nama_toko');
		$this->db->from('deposit_tokopedia');
		$this->db->join('toko', 'deposit_tokopedia.id_toko = toko.id_toko');
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
		$this->db->from('deposit_tokopedia');
		return $this->db->count_all_results();
	}
	// end datatables

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

	function delete($params = '')
	{
		$sql = "DELETE  FROM deposit_tokopedia WHERE id_deposit = ? ";
		return $this->db->query($sql, $params);
	}

	function hapus_trx($params = '')
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
		$data = $this->db->get();
		return $data->result_array();
	}

	function jml_toko()
	{
		$this->db->select('toko.*');
		$query = $this->db->get('toko');
		return $query->num_rows();
	}
}
