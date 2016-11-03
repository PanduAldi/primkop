<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penulis extends CI_Controller {

	var $table = "tb_penulis";
	var $pk = "id";

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_webadmin');
	}

	public function index($limit=null, $offset=null)
	{
		$data['title'] = "Data Penulis/Author";
		$data['penulis'] = $this->m_webadmin->get_by_subdomain($this->table, $this->session->userdata('subdomain'))->result();

		$this->template->display('admin/penulis/index', $data);
	}

	public function add()
	{
		$data['title'] = "Add Penulis";
		$this->cekValidasi();

		if ($this->form_validation->run() == true) {
			
			$record = array(
							  'id' => '',
							  'kd_penulis' => $this->input->post('kd_penulis'),
							  'nama' => $this->input->post('nama'),
							  'tgl_join' => date('Y-m-d H:i:s'),
							  'email' => $this->input->post('email'),
							  'subdomain' => $this->session->userdata('subdomain')
						   );
			$this->m_webadmin->insertData($this->table, $record);
			$this->session->set_flashdata('add_success', '<div class="alert alert-success"><i class="fa fa-check"></i> Add success</div>');
			redirect('penulis','refresh');
		}

		$this->template->display('admin/penulis/add', $data);
	}

	public function update()
	{
		$data['title'] = "Edit Penulis";
		$id = $this->uri->segment(3);
		$this->cekValidasi();

		if ($this->form_validation->run() == true) {
			
			$record = array(
							  'id' => '',
							  'kd_penulis' => $this->input->post('kd_penulis'),
							  'nama' => $this->input->post('nama'),
							  'email' => $this->input->post('email')
							);
			$this->m_webadmin->updateData($this->table, $record, $this->pk, $id);
			$this->session->set_flashdata('update_success', '<div class="alert alert-info"><i class="fa fa-check"></i> Update success</div>');
			redirect('penulis','refresh');
		}

		$data['penulis'] = $this->m_webadmin->get_id($this->table, $this->pk, $id)->row_array();
		$this->template->display('admin/penulis/update', $data);
	}

	public function delete()
	{
		$id = $this->input->post('id_penulis');
		$this->db->where($this->pk, $id);
		$this->db->delete($this->table);
		$this->session->set_flashdata('delete_success', '<div class="alert alert-danger"><i class="fa fa-trash"></i> Delete Success</div>');
	}

	public function cekValidasi()
	{
		$this->form_validation->set_rules('kd_penulis', 'kd Penulis', 'required|max_length[2]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_error_delimiters('<div class="text-danger" data-animate="fadeInLeft">','</div>');
	}

	public function cekLogin()
	{
		if ($this->session->userdata('islogin') == false)
			redirect('auth','refresh');
	}

}

/* End of file penulis.php */
/* Location: ./application/controllers/penulis.php */