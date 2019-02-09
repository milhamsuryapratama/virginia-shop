<?php 
/**
 * 
 */
class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function history()
	{
		$data['title'] = "User History Transaksi - Virginia Shop";
		$session = $this->session->userdata('sessionUser');
		$data['jumlahCart'] = $this->db->get_where('order_temp', array('id_session' => $session))->num_rows();
		$data['cart'] = $this->App_model->dataCart($session);
		$data['kategori'] = $this->App_model->data_kategori();
		$data['history'] = $this->App_model->history_user($session);

		$this->load->view('virginia/header',$data);
		$this->load->view('virginia/history', $data);
		$this->load->view('virginia/footer');
	}

	public function orders ($kode)
	{	
		$data['title'] = "Order History - Virginia Shop";
		$session = $this->session->userdata('sessionUser');
		$data['jumlahCart'] = $this->db->get_where('order_temp', array('id_session' => $session))->num_rows();
		$data['cart'] = $this->App_model->dataCart($session);
		$data['kategori'] = $this->App_model->data_kategori();
		$data['trxDetail'] = $this->App_model->data_trx_detail_by_kode($kode);
		$this->load->view('virginia/header', $data);
		$this->load->view('virginia/order_detail', $data);
		$this->load->view('virginia/footer');
	}
}
 ?>