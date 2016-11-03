<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	var $table = 'tb_user';
	var $pk = "id_user";

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_webadmin');
		$this->cekLogin();
	}


	public function index()
	{
		$data['title'] = "Login Member";

		// cek validasi
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger" data-animate="fadeInLeft">', '</div>');

		if ($this->form_validation->run()==true) {
			# login act
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$cekAuth = $this->m_webadmin->auth($this->table, $username, $password);

			if ($cekAuth->num_rows() > 0)
			{
				// get record
				$get = $cekAuth->row_array();

				$this->session->set_userdata('islogin', true);
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('nama', $get['nama']);
				$this->session->set_userdata('id_user', $get['id']);
				$this->session->set_userdata('subdomain', $get['subdomain']);

				redirect('dashboard');
			}
			else
			{
				$this->session->set_flashdata('alert','<div class="alert alert-danger" data-animate="fadeInLeft"><i class="fa fa-ban"></i> Username atau password salah </div>');

			}
		}

		$this->load->view('admin/auth', $data);
	}

	public function cekLogin()
	{
		if ($this->session->userdata('islogin') == true)
			redirect('dashboard');
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */