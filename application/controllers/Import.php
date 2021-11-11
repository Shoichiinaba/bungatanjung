<?php
defined('BASEPATH') or exit('No direct script access allowed');

//load Spout Library
require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Import extends AUTH_Controller
{
    var $template='template/index';

    function __construct()
    {
        parent::__construct();
        //load model
        $this->load->library('session');
        $this->load->model('M_import');
    }

    private function get_id_upload($id_toko){
        $this->db->trans_begin();
        $this->db->insert('histori_upload', array('id_toko' => $id_toko));
        $item_id = $this->db->insert_id();
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return 0;
        }else{
            $this->db->trans_commit();
            return $item_id;
        }
    }

    public function index()
    {
        //ketika button submit diklik
        if ($this->input->post('submit', TRUE) == 'upload') {
            $config['upload_path']      = './temp_doc/'; //siapkan path untuk upload file
            $config['allowed_types']    = 'xlsx|xls|csv'; //siapkan format file
            $config['file_name']        = 'deposit' . time(); //rename file yang diupload

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('excel')) {
                //fetch data upload
                $file   = $this->upload->data();

                $reader = ReaderEntityFactory::createXLSXReader(); //buat xlsx reader
                $reader = ReaderEntityFactory::createCSVReader(); //buat csvreader
                $reader->open('temp_doc/' . $file['file_name']); //open file xlsx yang baru saja diunggah

                $id_toko = $this->session->userdata('id_toko');

                $id_upload = $this->get_id_upload($id_toko);

                if ($id_upload){
                //looping pembacaat sheet dalam file
                    foreach ($reader->getSheetIterator() as $sheet) {
                        $numRow = 2;

                        //siapkan variabel array kosong untuk menampung variabel array data
                        $save   = array();

                        //looping pembacaan row dalam sheet
                        foreach ($sheet->getRowIterator() as $row) {

                            if ($numRow > 1) {
                                //ambil cell
                                $cells = $row->getCells();

                                $data = array(
                                    'date'              => $cells[0],
                                    'id_toko'           => $id_toko,
                                    'status'    	    => $cells[1],
                                    'invoice'     		=> $cells[2],
                                    'nominal'           => preg_replace('/\,|\./', '', $cells[3]),
                                    'balance'           => preg_replace('/\,|\./', '', $cells[4]),
                                    'id_upload'         => $id_upload
                                    // 'product_name'      => $cells[5],
                                    // 'price'             => $cells[6],
                                    // 'total_amount'     	=> $cells[7]
                                );

                                //tambahkan array $data ke $save
                                array_push($save, $data);
                            }

                            $numRow++;
                        }
                        //simpan data ke database
                        $this->M_import->simpan($save);

                        //tutup spout reader
                        $reader->close();

                        //hapus file yang sudah diupload
                        unlink('temp_doc/' . $file['file_name']);

                        //tampilkan pesan success dan redirect ulang ke index controller import
                        echo    '<script type="text/javascript">
                                alert(\'Data Deposit berhasil di Import\');
                                window.location.replace("' . base_url('Data_deposit') . '");
                            </script>';
                    }
                }else{
                     $this->session->set_flashdata('error', '<span class="glyphicon glyphicon-remove"></span> Gagal upload data ke deposit');
                }
            } else {
                // echo "Error :" . $this->upload->display_errors(); //tampilkan pesan error jika file gagal diupload
                $this->session->set_flashdata('error', '<span class="glyphicon glyphicon-remove"></span> Tidak Ada File Yg diupload');
				redirect($_SERVER['HTTP_REFERER']);
            }
        }

        $data['content'] = 'admin/import_deposit';
		$data['userdata'] 	= $this->userdata;
		$this->load->view($this->template, $data);
    }
    public function transaksi()
    {
        //ketika button submit diklik
        if ($this->input->post('submit', TRUE) == 'upload') {
            $config['upload_path']      = './temp_doc/'; //siapkan path untuk upload file
            $config['allowed_types']    = 'xlsx|xls'; //siapkan format file
            $config['file_name']        = 'transaksi' . time(); //rename file yang diupload

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('excel')) {
                //fetch data upload
                $file   = $this->upload->data();

                $reader = ReaderEntityFactory::createXLSXReader(); //buat xlsx reader
                $reader->open('temp_doc/' . $file['file_name']); //open file xlsx yang baru saja diunggah

                //looping pembacaat sheet dalam file
                foreach ($reader->getSheetIterator() as $sheet) {
                    $numRow = 1;

                    //siapkan variabel array kosong untuk menampung variabel array data
                    $save   = array();

                    //looping pembacaan row dalam sheet
                    foreach ($sheet->getRowIterator() as $row) {

                        if ($numRow > 1) {
                            //ambil cell
                            $cells = $row->getCells();

                            $data = array(
                                'count'              => $cells[0],
                                'order_id'    	     => $cells[1],
                                'invoice'            => $cells[2],
								'pagment_date'       => $cells[3],
                                'order_status'       => $cells[4],
                                'product_id'         => $cells[5],
                                'product_name'       => $cells[6],
								'quantity'           => $cells[7],
                                'SKU'     	         => $cells[8],
                                'notes'     		 => $cells[9],
                                'price'              => $cells[10],
								'discount_amount'    => $cells[11],
                                'subsidi_amount'     => $cells[12],
                                'customer_name'      => $cells[13],
                                'customer_phone'     => $cells[14],
								'recipient'          => $cells[15],
                                'recipient_number'   => $cells[16],
                                'recipient_address'  => $cells[17],
                                'courier'     	     => $cells[18],
                                'shipping_price_fee' => $cells[19],
                                'insurance'          => $cells[20],
								'total_shipping_fee' => $cells[21],
                                'total_amount'     	 => $cells[22],
                                'AWB'     	         => $cells[23],
                                'jenis_layanan'      => $cells[24],
                                'bebas_ongkir'       => $cells[25],
								'warehouse_origin'   => $cells[26],
                                'campaign_name'      => $cells[27]
                            );

                            //tambahkan array $data ke $save
                            array_push($save, $data);
                        }

                        $numRow++;
                    }
                    //simpan data ke database
                    $this->M_import->simpan_trx($save);

                    //tutup spout reader
                    $reader->close();

                    //hapus file yang sudah diupload
                    unlink('temp_doc/' . $file['file_name']);

                    //tampilkan pesan success dan redirect ulang ke index controller import
                    echo    '<script type="text/javascript">
                               alert(\'Data Deposit berhasil di Import\');
                               window.location.replace("' . base_url('Data_transaksi') . '");
                           </script>';
                }
            } else {
                // echo "Error :" . $this->upload->display_errors(); //tampilkan pesan error jika file gagal diupload
                $this->session->set_flashdata('error', '<span class="glyphicon glyphicon-remove"></span> Tidak Ada File Yg diupload');
				redirect($_SERVER['HTTP_REFERER']);
            }
        }

        $data['content'] = 'admin/import_transaksi';
		$data['userdata'] 	= $this->userdata;
		$this->load->view($this->template, $data);
    }
}
