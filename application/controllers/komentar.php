<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

	var $table = "tb_comment";
	var $pk = "id";

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('upload', 'form_validation'));
		$this->load->model('m_webadmin');
		$this->cekLogin();

	}

	public function index()
	{
		$data['title'] = "Komentar";
		$data['komentar'] = $this->m_webadmin->get_comment($this->table, 0, $this->session->userdata('subdomain'))->result();
		$this->template->display('admin/komentar/index', $data);
	}

	public function reply()
	{
		$data['title'] = "Reply Comment";
		$id = $this->uri->segment(3);
		$query = $this->m_webadmin->get_id($this->table, $this->pk, $id);
		$data['komentar'] = $query->row_array();
		//set rules
		$this->form_validation->set_rules('komentar');

		if ($this->form_validation->run() == true)
		{
			$get_komen = $query->row_array();
			$record = array(
								'id' => '',
								'nama' => $this->session->userdata('username'),
								'badge' => 'admin',
								'id_artikel' => $get_komen['id_artikel'],
								'comment' => $this->input->post('komentar'),
								'id_comment' => $get_komen['id'],	
								'date' => date('Y-m-d H:i:s')
							);

			$this->m_webadmin->insertData($this->table, $record);
			$this->session->set_flashdata('reply_success', '<div class="alert alert-info"><i class="fa fa-check"></i> Reply Success</div>');
			redirect('komentar','refresh');
		}

		$this->template->display('admin/komentar/reply', $data);

 	}

	public function delete()
	{
		$id = $this->input->post('id');
		$get_reply = $this->m_webadmin->get_id($this->table, 'id_comment', $id)->result();
		
		foreach ($get_reply as $rep) 
		{
			$this->m_webadmin->deleteData($this->table, $this->pk, $rep->id);
		}

		$this->m_webadmin->deleteData($this->table, $this->pk, $id);
		$this->session->set_flashdata('delete_success', '<div class="alert alert-danger"><i class="fa fa-trash"></i> Delete success</div>');
	}

	public function cekLogin()
	{
		if ($this->session->userdata('islogin') == false)
			redirect('auth','refresh');
	}

	public function cekValidasi()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
	}

}

/* End of file profil.php */
/* Location: ./application/controllers/artikel.php */