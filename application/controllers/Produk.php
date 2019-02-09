<?php 
/**
 * 
 */
class Produk extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index($offset=0)
	{
		$data['title'] = "Semua Produk - Virginia Shop";
		$session = $this->session->userdata('sessionUser');		
		$data['cart'] = $this->App_model->dataCart($session);
		$data['jumlahCart'] = count($data['cart']);

		$jml_produk = count($this->Admin_model->get_data('produk','id_produk'));

		$data['offset']=$offset;
		$config['total_rows'] = $jml_produk;
		$config['base_url'] = base_url().'produk/index';
		$config['per_page'] = 4;
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

		$data['produk'] = $this->App_model->dataProduk($config['per_page'],$offset);

		$this->load->view('virginia/header', $data);
		$this->load->view('virginia/semua_produk', $data);
		$this->load->view('virginia/footer');
	}

	public function detail($slug)
	{
		$session = $this->session->userdata('sessionUser');
		$data['jumlahCart'] = $this->db->get_where('order_temp', array('id_session' => $session))->num_rows();
		$data['cart'] = $this->App_model->dataCart($session);
		$data['kategori'] = $this->App_model->data_kategori();
		$data['produkDetail'] = $this->App_model->data_produk_join_kategori_by_slug($slug);
		$data['produk'] = $this->App_model->data_produk_join_kategori();
		$data['title'] = $data['produkDetail']['nama_produk']." - Virginia Shop";
		$this->load->view('virginia/header', $data);
		$this->load->view('virginia/detail', $data);
		$this->load->view('virginia/footer');
	}

	public function cart()
	{
		$data['title'] = "User Cart - Virginia Shop";
		$session = $this->session->userdata('sessionUser');
		$data['jumlahCart'] = $this->db->get_where('order_temp', array('id_session' => $session))->num_rows();
		$data['cart'] = $this->App_model->dataCart($session);
		$data['kategori'] = $this->App_model->data_kategori();
		$data['jumlahCart'] = $this->db->get_where('order_temp', array('id_session' => $session))->num_rows();

		if (isset($_POST['checkout'])) {
			$session = $this->session->userdata('sessionUser');
			$id_produk = $this->input->post('id_produk');

			$getProduk = $this->App_model->dataProduk_byId($id_produk);

			$dataKeranjang = array(
				'id_produk' => $id_produk,
				'id_session' => $session,
				'jumlah' => $this->input->post('jumlah'),
				'harga_jual' => $getProduk['harga_konsumen'],
				'diskon' => $getProduk['diskon'],
				'total' => $getProduk['harga_konsumen'] * $this->input->post('jumlah'),
				'status' => 'N',
				'waktu_order_temp' => date('Y-m-d H:i:s')
			);

			$query = $this->App_model->tambahKeranjang($dataKeranjang);
			
			if ($query) {				
				$data['cart'] = $this->App_model->dataCart($session);
				$data['total'] = $this->App_model->totalBelanja($session);
				$data['jumlahCart'] = $this->db->get_where('order_temp', array('id_session' => $session))->num_rows();

				$this->load->view('virginia/header', $data);
				$this->load->view('virginia/cart', $data);
				$this->load->view('virginia/footer');
			}
		} else {
			$session = $this->session->userdata('sessionUser');
			$data['cart'] = $this->App_model->dataCart($session);
			$data['total'] = $this->App_model->totalBelanja($session);

			$this->load->view('virginia/header', $data);
			$this->load->view('virginia/cart', $data);
			$this->load->view('virginia/footer');
		}
	}

	public function checkout()
	{	
		$data['title'] = "User Transaksi Checkout - Virginia Shop";
		$session = $this->session->userdata('sessionUser');
		$data['jumlahCart'] = $this->db->get_where('order_temp', array('id_session' => $session))->num_rows();
		$data['cart'] = $this->App_model->dataCart($session);
		$data['kategori'] = $this->App_model->data_kategori();
		if (isset($_POST['checkout'])) {
			$session = $this->session->userdata('sessionUser');
			$data['total'] = $this->App_model->totalBelanja($session);
			$data['user'] = $this->App_model->data_user('user',$session);

			$this->load->view('virginia/header', $data);
			$this->load->view('virginia/checkout', $data);
			$this->load->view('virginia/footer');
		} else {
			redirect(base_url()."produk/cart");
		}
	}

	public function delete_cart($id)
	{
		$this->App_model->hapus_keranjang($id);

        redirect('produk/cart');
	}

	public function order()
	{
		$session = $this->session->userdata('sessionUser');		
		
		$data['kategori'] = $this->App_model->data_kategori();
		if (isset($_POST['order'])) {
			$kodeTrx = "trx-".time();
        	$session = $this->session->userdata('sessionUser');
        	$now = date('Y-m-d H:i:s');
        	$deadline_bayar = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($now)));

			$data = array(
				'kode_transaksi' => $kodeTrx,
				'id_pembeli' => $session,
				'nama_pembeli' => $this->input->post('nama_pembeli'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				'kode_pos' => $this->input->post('kodepos'),
				'no_hp' => $this->input->post('nohp'),
				'pesan' => $this->input->post('pesan'),
				'waktu_transaksi' => $now,
				'deadline_bayar' => $deadline_bayar
			);

			$query = $this->App_model->simpan_transaksi($data);

			$pesan = "
			<table>
				<tr>
					<td>Data Transaksi</td>
				</tr>
				<tr>
					<th>No</th>
					<th>Nama Produk</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Diskon</th>
					<th>Total</th>
				</tr>";

			if ($query) {
				$cart = $this->App_model->dataCart($session);

				$detail = array();
				$no = 1;
				for ($i=0; $i < count($cart) ; $i++) { 
					array_push($detail, array(
						'kode_transaksi' => $kodeTrx,
						'id_produk' => $cart[$i]['id_produk'],
						'jumlah' => $cart[$i]['jumlah'],
						'harga_jual' => $cart[$i]['harga_jual'],
						'diskon' => $cart[$i]['diskon'],
						'total' => $cart[$i]['total']						
					));
					$this->App_model->update_stok($cart[$i]['id_produk'],$cart[$i]['jumlah']);

					$pesan .= "
					<tr>
						<td>$no</td>
						<td>".$cart[$i]['nama_produk']."</td>
						<td>".$cart[$i]['jumlah']."</td>
						<td>Rp ".number_format($cart[$i]['harga_jual'],0)."</td>
						<td>".$cart[$i]['diskon']."%</td>
						<td>Rp ".number_format($cart[$i]['total'],0)."</td>
					</tr>";

					$no++;
				}

				$pesan .= "</table> <br><br> Pesanan Akan dikirim ke alamat <strong>".$this->input->post('alamat')."</strong>";
				$trx_detail = $this->db->insert_batch('transaksi_detail', $detail);
				if ($trx_detail) {

					$config = [
						'mailtype'  => 'html',
						'charset'   => 'utf-8',
						'protocol'  => 'smtp',
						'smtp_host' => 'ssl://smtp.gmail.com',
						'smtp_user' => 'myolshop.confirm@gmail.com',
						'smtp_pass' => 'kokrehnyobaataohmakpolabisa', 
						'smtp_port' => 465,
						'crlf'      => "\r\n",
						'newline'   => "\r\n"
					];

					$this->load->library('email', $config);
					$this->email->from('myolshop.confirm@gmail.com', 'ILHAM SURYA PRATAMA');
					$this->email->to($this->input->post('email')); 
					$this->email->subject('ILHAM SURYA PRATAMA | semprulshop');
					$this->email->message($pesan);
					$this->email->send();

					$data['title'] = "Order Sukses - Viriginia Shop";
					$data['cart'] = $this->App_model->dataCart($session);
					$data['cart'] = $this->App_model->dataCart($session);
					$data['rekening'] = $this->App_model->data_rekening();
					$data['total'] = $this->App_model->totalBelanja($session);
					$data['kode'] = $kodeTrx;
					$data['jumlahCart'] = $this->db->get_where('order_temp', array('id_session' => $session))->num_rows();
					$this->App_model->hapus_keranjang_by_session($session);

					$this->load->view('virginia/header', $data);
					$this->load->view('virginia/order_sukses', $data);
					$this->load->view('virginia/footer');
				}
			}
		} else {
			redirect(base_url().'produk/cart');
		}
	}

	// public function order_sukses()
	// {
	// 	$data['rekening'] = $this->App_model->data_rekening();
	// 	$data['jj'] = "HALO";
	// 	$this->load->view('virginia/header');
	// 	$this->load->view('virginia/order_sukses', $data);
	// 	$this->load->view('virginia/footer');
	// }

	public function kategori()
	{
		$data['title'] = "Kategori Produk - Virginia Shop";
		$data['kategori'] = $this->Admin_model->get_data('kategori_produk','id_kategori_produk');
		$session = $this->session->userdata('sessionUser');
		// $data['jumlahCart'] = $this->db->get_where('order_temp', array('id_session' => $session))->num_rows();
		
		$data['jumlahCart'] = count($data['cart']);
		$this->load->view('virginia/header', $data);
		$this->load->view('virginia/kategori', $data);
		$this->load->view('virginia/footer');
	}

}
 ?>