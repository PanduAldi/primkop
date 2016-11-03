<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

	var $table = "tb_manager";
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
		$data['title'] = "Data Manager";
		$data['manager'] = $this->m_webadmin->get_all($this->table, null, null);
		
		$this->template->display('admin/profil/manager', $data);
	}

	public function add()
	{
		$data['title'] = "Add Manager";

		//set rules
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nia', 'NIA', 'required');
		$this->form_validation->set_rules('subdomain', 'Posisi', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		$data['error_image'] = "";

		//data manager
		$data['manager_choice'] = $this->m_webadmin->get_all('tb_subdomain', null, null)->result();

		if ($this->form_validation->run() == true) 
		{

		//upload
			$config['upload_path'] = './img/manager/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '80000';
			$config['max_width']  = '2024';
			$config['max_height']  = '1168';
					
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('img')){
				$data = array('error' => $this->upload->display_errors());
			}
			else{
				$img = $_FILES['img']['name'];

				$record = array(
									'id' => '',
									'nia' => $this->input->post('nia'),
									'nama' => $this->input->post('nama'),
									'img' => $img,
									'subdomain' => $this->input->post('subdomain'),
									'piket' => $this->input->post('piket')
								);

				$this->m_webadmin->insertData($this->table, $record);
				$this->session->set_flashdata('add_success', '<div class="alert alert-success">Add success</div>');
				redirect('manager','refresh');
			}
		}

		$this->template->display('admin/profil/add_manager', $data);
	}

	public function update()
	{

		$data['title'] = "Update Manager";
		$id = $this->uri->segment(3);

		$this->form_validation->set_rules('nia', 'nia', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() == true)
		{
			//upload
			$config['upload_path'] = './img/manager/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '80000';
			$config['max_width']  = '2024';
			$config['max_height']  = '1768';
			

			$this->upload->initialize($config);
			if (!$this->upload->do_upload('img')){
				$record = array(
									'nia' => $this->input->post('nia'),
									'nama' => $this->input->post('nama')
								);

				$this->m_webadmin->updateData($this->table, $record, $this->pk, $id);
				$this->session->set_flashdata('update_success', '<div class="alert alert-info">Update success</div>');
				redirect('manager','refresh');
			}
			else{

				$img = str_replace(' ', '_', $_FILES['img']['name']);

				$record = array(
									'nia' => $this->input->post('nia'),
									'nama' => $this->input->post('nama'),
									'subdomain' => $this->input->post('subdomain'),
									'img' => $img
								);

				$img_get = $this->m_webadmin->get_id($this->table, $this->pk, $id)->row_array();
				unlink('img/media/'.$img_get['img']);

				$this->m_webadmin->updateData($this->table, $record, $this->pk, $id);
				$this->session->set_flashdata('update_success', '<div class="alert alert-info"><i class="fa fa-check"></i>Update Success</div>');
				redirect('manager','refresh');
			}
		}

		$data['manager'] = $this->m_webadmin->get_id($this->table, $this->pk, $id)->row_array();
		$this->template->display('admin/profil/update_manager', $data);
	}


	public function delete()
	{
		$id = $this->input->post('id_manager');
		$img_get = $this->m_webadmin->get_id($this->table, $this->pk, $id)->row_array();

		unlink('img/media/'.$img_get['img']);

		$this->m_webadmin->deleteData($this->table, $this->pk, $id);
		$this->session->set_flashdata('delete_success', '<div class="alert alert-danger">Delete success</div>');
	}

	public function update_piket()
	{
		$id = $this->input->post('kode');
		$piket = $this->input->post('hari');

		$this->m_webadmin->updateData($this->table, array('piket' => $piket), $this->pk, $id);
		$this->session->set_flashdata('piket_success'.$id, '<div class="alert alert-info">Update piket success</div>');
	}

	public function cekLogin()
	{
		if ($this->session->userdata('islogin') == false)
			redirect('auth','refresh');
	}

}

/* End of file manager.php */
/* Location: ./application/controllers/manager.php */