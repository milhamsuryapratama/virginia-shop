<?php 
/**
 * 
 */
class Administrator extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('statusAdmin') != 'adminLoginSukses'){
           redirect('login');
       }
	}

	public function index()		
	{
		$this->load->view('virginia/administrator/header');
		$this->load->view('virginia/administrator/navbar');
		$this->load->view('virginia/administrator/footer');
	}

	public function kategori()
	{
		$data['kategori'] = $this->App_model->data_kategori();
		$this->load->view('virginia/administrator/header');
		$this->load->view('virginia/administrator/navbar');
		$this->load->view('virginia/administrator/mod_kategori/kategori', $data);
		$this->load->view('virginia/administrator/footer');
	}

	public function tambah_kategori()
	{		

		if (isset($_POST['tambah'])) {
			$dataKategori = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
            'kategori_slug' => url_title($this->input->post('nama_kategori'), 'dash', TRUE)
        );

			$query = $this->Admin_model->tambah_data('kategori_produk',$dataKategori);
			if ($query) {
				redirect(base_url().'administrator/kategori');
			}
			
		} else {
			$this->load->view('virginia/administrator/header');
			$this->load->view('virginia/administrator/navbar');
			$this->load->view('virginia/administrator/mod_kategori/tambah');
			$this->load->view('virginia/administrator/footer');
		}
	}

	public function edit_kategori($id)
	{		

		if (isset($_POST['edit'])) {
			$idt = $this->input->post('id_kategori');
			$dataKategori = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
            'kategori_slug' => url_title($this->input->post('nama_kategori'), 'dash', TRUE)
       		);

			$query = $this->Admin_model->edit_data($idt,$dataKategori,'id_kategori_produk', 'kategori_produk');
			if ($query) {
				redirect(base_url().'administrator/kategori');
			}
			
		} else {
			$data['kategori'] = $this->Admin_model->get_data_by_id('kategori_produk',array('id_kategori_produk' => $id));

			$this->load->view('virginia/administrator/header');
			$this->load->view('virginia/administrator/navbar');
			$this->load->view('virginia/administrator/mod_kategori/edit', $data);
			$this->load->view('virginia/administrator/footer');
		}
	}

	public function hapus_kategori($id)
	{
		$this->Admin_model->hapus_data('kategori_produk','id_kategori_produk',$id);

    	redirect(base_url().'administrator/kategori');
	}

	public function produk()
	{
		$data['produk'] = $this->Admin_model->getProduk();
		$data['kategori'] = $this->App_model->data_kategori();

		$this->load->view('virginia/administrator/header');
		$this->load->view('virginia/administrator/navbar');
		$this->load->view('virginia/administrator/mod_produk/produk', $data);
		$this->load->view('virginia/administrator/footer');
	}

	public function tambah_produk()
	{
		$data['kategori'] = $this->App_model->data_kategori(); 
	    $data['title'] = "Tambah Produk";

	    $this->load->view('virginia/administrator/header');
		$this->load->view('virginia/administrator/navbar');
		$this->load->view('virginia/administrator/mod_produk/tambah', $data);
		$this->load->view('virginia/administrator/footer');

		if (isset($_POST['simpan_produk'])) {            

			$config['upload_path'] = 'asset/upload/gambar_produk';
			$config['allowed_types'] = '*';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar_produk');
			$file_name = $this->upload->data();

			$config['image_library']='gd2';
			$config['source_image']='asset/upload/gambar_produk/'.$file_name['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '50%';
			$config['width']= 600;
			$config['height']= 600;
			$config['new_image']= 'asset/upload/gambar_produk/'.$file_name['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();


			$dataProduk = array(
				'id_kategori_produk' => $this->input->post('kategori'),
				'nama_produk' => $this->input->post('nama_produk'),
				'produk_slug' => url_title($this->input->post('nama_produk'), 'dash', TRUE),
				'stok' => $this->input->post('stok'),
				'harga_konsumen' => $this->input->post('harga_konsumen'),
				'diskon' => $this->input->post('diskon'),
				'keterangan' => $this->input->post('keterangan'),
				'waktu_input' => date('Y-m-d H:i:s'),
				'gambar' => $file_name['file_name']
			);

			$query = $this->Admin_model->tambah_data('produk',$dataProduk);

			if ($query) {				
				redirect('administrator/produk');
			}
		}
	}

	public function edit_produk($id)
	{
		$data['kat'] = $this->App_model->data_kategori(); 
		$data['produk'] = $this->Admin_model->get_data_by_id('produk',array('id_produk' => $id));

	    $this->load->view('virginia/administrator/header');
		$this->load->view('virginia/administrator/navbar');
		$this->load->view('virginia/administrator/mod_produk/edit', $data);
		$this->load->view('virginia/administrator/footer');		

		if (isset($_POST['edit_produk'])) {
			$id_prdk = $this->input->post('id_produk');
			$config['upload_path'] = 'asset/upload/gambar_produk';
			$config['allowed_types'] = '*';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar_produk');
			$file_name = $this->upload->data();
			$data = array('gambar'=>$file_name['file_name']);

			$da = $this->Admin_model->getIdGambar($id_prdk);

			if (!empty($file_name['file_name'])) {
				$dataProduk = array(
					'id_kategori_produk' => $this->input->post('kategori'),
					'nama_produk' => $this->input->post('nama_produk'),
					'produk_slug' => url_title($this->input->post('nama_produk'), 'dash', TRUE),
					'stok' => $this->input->post('stok'),
					'harga_konsumen' => $this->input->post('harga_konsumen'),
					'diskon' => $this->input->post('diskon'),
					'keterangan' => $this->input->post('keterangan'),
					'waktu_input' => date('Y-m-d H:i:s'),
					'gambar' => $file_name['file_name']
				);
				$path = 'asset/upload/gambar_produk/';
	            @unlink($path.$da->gambar);
			} else {
				$dataProduk = array(
					'id_kategori_produk' => $this->input->post('kategori'),
					'nama_produk' => $this->input->post('nama_produk'),
					'produk_slug' => url_title($this->input->post('nama_produk'), 'dash', TRUE),
					'stok' => $this->input->post('stok'),
					'harga_konsumen' => $this->input->post('harga_konsumen'),
					'diskon' => $this->input->post('diskon'),
					'keterangan' => $this->input->post('keterangan'),
					'waktu_input' => date('Y-m-d H:i:s')
				);
			}

			// $query = $this->Admin_model->edit_produk($id_prdk,$file_name,$da);
			$query = $this->Admin_model->edit_data($id_prdk,$dataProduk,'id_produk', 'produk');

			if ($query) {
				redirect('administrator/produk');
			}
		} 
	}

	public function hapus_produk($id_produk)
	{
		$data = $this->Admin_model->getIdGambar($id_produk);
	    $path = 'asset/upload/gambar_produk/';
	    @unlink($path.$data->gambar);
	    if ($this->Admin_model->hapus_data('produk','id_produk',$id_produk) == TRUE) {
	        redirect('administrator/produk');
	    }
	}

	public function transaksi()
	{
		$data['transaksi'] = $this->Admin_model->get_data('transaksi','id_transaksi');
		$this->load->view('virginia/administrator/header');
		$this->load->view('virginia/administrator/navbar');
		$this->load->view('virginia/administrator/mod_transaksi/transaksi', $data);
		$this->load->view('virginia/administrator/footer');	
	}

	public function tracking($kode)
	{
		$data['trxDetail'] = $this->App_model->data_trx_detail_by_kode($kode);

		$this->load->view('virginia/administrator/header');
		$this->load->view('virginia/administrator/navbar');
		$this->load->view('virginia/administrator/mod_transaksi/tracking', $data);
		$this->load->view('virginia/administrator/footer');	
	}

	public function rekening()
	{
		$data['rekening'] = $this->Admin_model->get_data('rekening','id_rekening');
		$this->load->view('virginia/administrator/header');
		$this->load->view('virginia/administrator/navbar');
		$this->load->view('virginia/administrator/mod_rekening/rekening', $data);
		$this->load->view('virginia/administrator/footer');	
	}

	public function tambah_rekening()
	{
		$this->load->view('virginia/administrator/header');
		$this->load->view('virginia/administrator/navbar');
		$this->load->view('virginia/administrator/mod_rekening/tambah');
		$this->load->view('virginia/administrator/footer');

		if (isset($_POST['simpan'])) {
			$data_rekening = array(
				'nomor_rekening' => $this->input->post('nomor_rekening'),
				'nama_bank' => $this->input->post('nama_bank'),
				'nama_pemilik' => $this->input->post('nama_pemilik')
			);			

			$query = $this->Admin_model->tambah_data('rekening', $data_rekening);

			if ($query) {
				redirect(base_url().'administrator/rekening');
			}
		}
	}

	public function edit_rekening($id)
	{
		$data['rekening'] = $this->Admin_model->get_data_by_id('rekening',array('id_rekening' => $id));

		$this->load->view('virginia/administrator/header');
		$this->load->view('virginia/administrator/navbar');
		$this->load->view('virginia/administrator/mod_rekening/edit', $data);
		$this->load->view('virginia/administrator/footer');

		if (isset($_POST['edit'])) {
			$id = $this->input->post('id_rekening');

			$data_rekening = array(
				'nomor_rekening' => $this->input->post('nomor_rekening'),
				'nama_bank' => $this->input->post('nama_bank'),
				'nama_pemilik' => $this->input->post('nama_pemilik')
			);

			$query = $this->Admin_model->edit_data($id, $data_rekening, 'id_rekening', 'rekening');

			if ($query) {
				redirect(base_url().'administrator/rekening');
			}
		}
	}

	public function hapus_rekening($id)
	{
		$this->Admin_model->hapus_data('rekening','id_rekening',$id);
		redirect(base_url().'administrator/rekening');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'administrator');
	}
}
?>