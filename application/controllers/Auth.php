<?php 
/**
 * 
 */
class Auth extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function register()
	{
		$data['title'] = "Register Form - Virginia Shop";
		$session = $this->session->userdata('sessionUser');
		$data['jumlahCart'] = $this->db->get_where('order_temp', array('id_session' => $session))->num_rows();
		$data['cart'] = $this->App_model->dataCart($session);
		$data['kategori'] = $this->App_model->data_kategori();

		$this->load->view('virginia/header', $data);
		$this->load->view('virginia/register');
		$this->load->view('virginia/footer');

		if (isset($_POST['register'])) {
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'email' => $this->input->post('password'),
				'waktu_daftar' => date('Y-m-d H:i:s'),
				'id_session' => md5($this->input->post('username'))
			);

			$pesan = "Halo ".$this->input->post('nama_lengkap')." , Selamat datang di toko kami Viriginia Shop. Kami menyediakan barang barang aksesoris terbaik di Bali dengan harga terjangkau. Terima kasih telah bergabung bersama kami, kami harap anda senang bergabung dengan kami. Kami ucapkan selamat datang di Virginia Shop (Pusat Aksesoris Terbaik di Bali) dan selamat berbelanja.";

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

			$query = $this->App_model->registerUser($data);
			if ($query) {
				$this->session->set_flashdata('registerSukses',"Register sukses. Silahkan periksa email anda untuk mendapatkan informasi. Dan anda bisa login disini ");
				redirect(base_url().'auth/login');
			}
		}
	}

	public function login()
	{
		$data['title'] = "Login Form - Virginia Shop";
		$session = $this->session->userdata('sessionUser');
		$data['jumlahCart'] = $this->db->get_where('order_temp', array('id_session' => $session))->num_rows();
		$data['cart'] = $this->App_model->dataCart($session);
		$data['kategori'] = $this->App_model->data_kategori();

		$this->load->view('virginia/header', $data);
		$this->load->view('virginia/login');
		$this->load->view('virginia/footer');

		if (isset($_POST['login'])) {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$where = array(
				'username' => $username,
				'password' => $password
			);

			$cek = $this->App_model->user_login('user',$where)->num_rows();

			if ($cek > 0) {
				$idSession = $this->db->query("SELECT * FROM user where username = '$username'")->row();

				$data_session = array(
					'namaUser' => $idSession->username,
					'status' => "userLoginSukses",
					'sessionUser' => $idSession->id_session
				);
				$this->session->set_userdata($data_session);
				redirect(base_url());
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
?>