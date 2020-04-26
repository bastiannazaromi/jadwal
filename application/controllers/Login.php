<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Halaman Login';
		$data['page'] = 'login/login';
		$this->load->view('login/index', $data, FALSE);
	}
	public function proses()
	{
		$user = $this->input->post('email');
		$pass = $this->input->post('password');
		$this->load->model('M_login');
		$a = $this->M_login->cek_login($user, $pass);

		if ($a == "valid") {
			$this->session->set_flashdata('flash-success', 'Login berhasil');
			redirect('Dashboard', 'refresh');
		} else {
			redirect('Login', 'refresh');
		}
	}
	function logout()
	{
		$this->session->sess_destroy($this->session->userdata('data_login'));
		redirect('Login', 'refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */