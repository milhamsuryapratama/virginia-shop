<?php 
/**
 * 
 */
class Orders extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function konfirmasi()
	{	
		$session = $this->session->userdata('sessionUser');
		// $data['jumlahCart'] = $this->db->get_where('order_temp', array('id_session' => $session))->num_rows();
		$data['kategori'] = $this->App_model->data_kategori();
		$data['cart'] = $this->App_model->dataCart($session);
		$data['jumlahCart'] = count($data['cart']);
		$data['title']	= "Konfirmasi Transaksi - Virginia Shop";
		$this->load->view('virginia/header', $data);
		$this->load->view('virginia/konfirmasi', $data);
		$this->load->view('virginia/footer');
	}

	public function kofirmasi_detail()
	{
		if (isset($_POST['cek'])) {
			$kode = $this->input->post('kode');
			$session = $this->session->userdata('sessionUser');
			$data['cart'] = $this->App_model->dataCart($session);
			$data['jumlahCart'] = count($data['cart']);
			$cekConfirm = $this->db->get_where('konfirmasi', array('kode_transaksi' => $kode))->num_rows();
			$cek = $this->db->get_where('transaksi', array('kode_transaksi' => $kode))->num_rows();
			if ($cek > 0) {
				if ($cekConfirm > 0) {
					$this->session->set_flashdata('confirmError','Kode Transaksi Ini Telah Dikonfirmasi');
					redirect(base_url().'orders/konfirmasi');
				} else {
					$data['rekening'] = $this->App_model->data_rekening();
					$data['trx'] = $this->App_model->data_trx_by_kode($kode);
					$data['total'] = $this->App_model->total_belanja_by_kode($kode);
					$data['title'] = "Konfirmasi Pembayaran - Virginia Shop";

					$this->load->view('virginia/header', $data);
					$this->load->view('virginia/konfirmasi_detail', $data);
					$this->load->view('virginia/footer');
				}
			} else {
				$this->session->set_flashdata('confirmError','Kode Transaksi Salah');
				redirect(base_url().'orders/konfirmasi');
			}
		}
	}

	public function simpan()
	{
		$kode = $this->input->post('kode_transaksi');

		$config['upload_path'] = 'asset/upload/konfirmasi';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload('bukti_bayar');
        $file_name = $this->upload->data();

        $data = array(
        	'kode_transaksi' => $kode,
        	'total_transfer' => $this->input->post('total'),
        	'id_rekening' => $this->input->post('bank'),
        	'nama_pengirim' => $this->input->post('nama_pembeli'),
        	'bukti_transfer' => $file_name['file_name'],
        	'waktu_konfirmasi' => date('Y-m-d H:i:s')
        );

        $query = $this->App_model->simpan_konfirmasi($data);

        if ($query) {
        	$where = array(
        		'kode_transaksi' => $kode
        	);
        	$field = array(
        		'konfirmasi' => '1', 
        		'status_transaksi' => '1'
        	);
        	$this->App_model->update_status_transaksi('transaksi',$field, $where);
        	$this->session->set_flashdata('confirmSukses','Pesanan Anda Telah Dikonfirmasi dan Segera Diproses');
        	redirect(base_url().'user/orders/'.$kode);
        }
	}

}
 ?>