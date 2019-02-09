<?php 
/**
 * 
 */
class Login extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('virginia/administrator/header');
		$this->load->view('virginia/administrator/login');
		$this->load->view('virginia/administrator/footer');
	}

	public function admin_login()
	{
		if (isset($_POST['login'])) {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$where = array(
				'username' => $username,
				'password' => $password
			);

			$cek = $this->Admin_model->admin_login('admin',$where)->num_rows();

			if ($cek > 0) {
				$idSession = $this->db->query("SELECT * FROM admin where username = '$username'")->row();

				$session_admin = array(
					'namaAdmin' => $idSession->username,
					'statusAdmin' => "adminLoginSukses"
				);
				$this->session->set_userdata($session_admin);
				redirect(base_url().'administrator');
			}
		}
	}
}
?>