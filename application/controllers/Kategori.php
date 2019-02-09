<?php 
/**
 * 
 */
class Kategori extends CI_Controller
{
	
	public function v($slug,$offset=0)
	{
		$data['title'] = "Kategori Produk - Virginia Shop";
		$data['kategori'] = $this->App_model->data_kategori();
		$ktgr = $this->App_model->get_data_by_params($slug);
		$jml_produk = count($ktgr);

		$data['offset']=$offset;
		$config['total_rows'] = $jml_produk;
		$config['base_url'] = base_url().'kategori/v/'.$ktgr[0]['kategori_slug'];
		$config['per_page'] = 1;
		$config['full_tag_open']="<ul class='pagination'>";
		$config['full_tag_close']="</ul>";
		$config['num_tag_open']="<li>";
		$config['num_tag_close']="</li>";
		$config['next_tag_open']="<li>";
		$config['next_tag_close']="</li>";
		$config['prev_tag_open']="<li>";
		$config['prev_tag_close']="</li>";
		$config['first_tag_open']="<li>";
		$config['first_tag_close']="</li>";
		$config['last_tag_open']="<li>";
		$config['last_tag_close']="</li>";
		$config['cur_tag_open']="<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close']="</a></li>";

		$this->pagination->initialize($config);
		$data['halaman'] = $this->pagination->create_links();

		$data['kat'] = $this->App_model->dataProduk_bySlug($slug,$config['per_page'],$offset);
		$session = $this->session->userdata('sessionUser');
		// $data['jumlahCart'] = $this->db->get_where('order_temp', array('id_session' => $session))->num_rows();
		$data['cart'] = $this->App_model->dataCart($session);
		$data['jumlahCart'] = count($data['cart']);
		$this->load->view('virginia/header', $data);
		$this->load->view('virginia/kategori', $data);
		$this->load->view('virginia/footer');
	}
}
?>