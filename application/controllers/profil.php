<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	var $table = "tb_profil";
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
		$data['title'] = "Profil";
		$data['profil'] = $this->m_webadmin->get_by_subdomain($this->table, $this->session->userdata('subdomain'))->result();
		$this->template->display('admin/profil/index', $data);
	}

	public function add()
	{
		$data['title'] = "Add Profil";
		$this->cekValidasi();

		if ($this->form_validation->run() == true) {
			$record = array(
								'id' => '',
								'nama' => $this->input->post('nama'),
								'isi' => $this->input->post('isi'),
								'subdomain' => $this->session->userdata('subdomain')
							);

			$this->m_webadmin->insertData($this->table, $record);
			$this->session->set_flashdata('add_success', '<div class="alert alert-success"><i class="fa fa-check"></i> Add Success</div>');
			redirect('profil','refresh');
		}

		$this->template->display('admin/profil/add', $data);

	}

	public function update()
	{
		$data['title'] = "Edit Profil";
		$id = $this->uri->segment(3);
		$query = $this->m_webadmin->get_id($this->table, $this->pk, $id);
		$this->cekValidasi();

		if ($this->form_validation->run() ==  true)
		{	// cari img untuk di hapus
			$record = array(
								'nama' => $this->input->post('nama'),
								'isi' => $this->input->post('isi')
							);
			
			$this->m_webadmin->updateData($this->table, $record, $this->pk, $id);
			$this->session->set_flashdata('update_success', '<div class="alert alert-info"><i class="fa fa-check"></i> Update success</div>');
			redirect('profil','refresh');

		}

		$data['profil'] = $query->row_array();
		$this->template->display('admin/profil/update', $data);
	}


	public function delete()
	{
		$id = $this->input->post('id');
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