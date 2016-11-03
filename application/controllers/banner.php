<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	var $table  = 'tb_banner';
	var $pk     = 'id';

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('upload', 'form_validation', 'image_lib'));
		$this->load->model('m_webadmin');
		$this->cekLogin();
	}

	public function index()
	{
		$data['title'] = "Banner";
		$data['banner'] = $this->m_webadmin->get_by_subdomain;
		$this->template->display('admin/banner', $data);
	}

	public function add()
	{
		$data['title'] = "Add banner";
		$this->cekValidasi();

		//set error
		$data = array('error_image' => '');

		if ($this->form_validation->run() == true) 
		{
			$config['upload_path'] = './img/banner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '80000';
			$config['max_width']  = '2024';
			$config['max_height']  = '1468';
			
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('img')){
				$data = array('error_image' => $this->upload->display_errors());
			}
			else{

				$img = $_FILES['img']['name'];

				$record = array(
									'id'	=> '',
									'nama' 	=> $this->input->post('nama'),
									'img' 	=> $img,
									'link'	=> $this->input->post('link'),
									'publish' => $this->input->post('publish')
								);
 
				$this->m_webadmin->insertData($this->table, $record);
				$this->session->set_flashdata('add_success', '<div class="alert alert-success"><i class="fa fa-check"></i> Add banner success</div>');
				redirect('banner');
			}

			$this->template->display('admin/add', $data);
		}

	}


		public function update()
		{
			$data['title'] = "Update Banner";
			$id = $this->uri->segment(3);

			$this->cekValidasi();

			$query = $this->m_webadmin->get_id($this->table, $this->pk, $id);

			//error message
			$data['error_image'] = "";

			if ($this->form_validation->run() == true)
			{
				//upload img
				$config['upload_path'] = './img/banner/';
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_size'] = '80000';
				$config['max_width'] = '2045';
				$config['max_height'] = '1045';

				$this->upload->initialize($config);

				if (!$this->upload->do_upload('img'))
				{
					$record = array(
										'nama' => $this->input->post('nama'),
										'link' => $this->input->post('link')
									);

					$this->m_webadmin->updateData($this->table, $record, $this->pk, $id);
					$this->session->set_flashdata('update_success', '<div class="alert alert-info">Update success</div>');
					redirect('banner','refresh');
				}
				else
				{
					$img = $_FILES['img']['name'];

					//delete old img
					$get_image  = $query->row_array();
					unlink('img/banner/'.$get_image['img']);

					$record = array(
										'nama' => $this->input->post('nama'),
										'link' => $this->input->post('link'),
										'img' => $this->input->post('img')
									);

					$this->m_webadmin->updateData($this->table, $record, $this->pk, $id);
					$this->session->set_flashdata('update_success', '<div class="alert alert-info">Update success</div>');
					redirect('banner','refresh');
				}
			}

			$data['banner'] = $query->row_array();
			$this->template->display('admin/banner/update', $data);

		}

	public function delete()
	{
		$id  = $this->input->post('id_banner');
		$get_image = $this->m_webadmin->get_id($this->table, $this->pk, $id)->row_array();
		unlink('img/banner/'.$get_image['img']);

		$this->m_webadmin->deleteData($this->tabel, $this->pk, $id);
		$this->session->set_flashdata('delete_succses', '<div class="aler alert-danger"><i class="fa fa-trash"></i> Delete Success</div>');
	}

	public function cekValidasi()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('link', 'Link', 'required');
		$this->form_validation->set_rules('publish', 'publish', 'required');
	}

	public function cekLogin()
	{
		if ($this->session->userdata('islogin') == false)
			redirect('auth','refresh');

	}

}

/* End of file banner.php */
/* Location: ./application/controllers/banner.php */