<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['title'] = "Virginia Shop - Pusat Belanja Aksesoris Terbaik di Bali";
		$session = $this->session->userdata('sessionUser');
		$data['kategori'] = $this->App_model->data_kategori();
		$data['produk'] = $this->App_model->data_produk_join_kategori();
		$data['jumlahCart'] = $this->db->get_where('order_temp', array('id_session' => $session))->num_rows();
		$data['cart'] = $this->App_model->dataCart($session);
		$this->load->view('virginia/header', $data);
		// $this->load->view('virginia/kategori');
		$this->load->view('virginia/home', $data);
		$this->load->view('virginia/footer');
	}

	public function cari()
	{
		$keyword = $this->input->get('s');
		$kategori = $this->input->get('category');

		$session = $this->session->userdata('sessionUser');
		$data['kategori'] = $this->App_model->data_kategori();
		$data['produk'] = $this->App_model->cari_produk($keyword,$kategori);
		$data['jumlahCart'] = $this->db->get_where('order_temp', array('id_session' => $session))->num_rows();
		$data['cart'] = $this->App_model->dataCart($session);
		
		$this->load->view('virginia/header', $data);
		// $this->load->view('virginia/kategori');
		$this->load->view('virginia/home', $data);
		$this->load->view('virginia/footer');
	}

	public function homevir() 
	{
		$this->load->view('home');
	}

	public function categori()
	{
		$this->load->view('categori');
	}

	public function data_produk()
	{
		$produk = $this->db->query("SELECT * FROM produk JOIN kategori_produk ON kategori_produk.id_kategori_produk = produk.id_kategori_produk")->result_array();
		$this->output->set_content_type('application/json')->set_output(json_encode($produk));
	}

}
