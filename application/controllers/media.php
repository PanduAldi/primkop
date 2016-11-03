<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

	var $table = "tb_media";
	var $pk = 'id';

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('upload', 'form_validation'));
		$this->load->model('m_webadmin');
		$this->cekLogin();
	}

	public function index()
	{
		$data['title'] = "Media";
		$data['media'] = $this->m_webadmin->get_by_subdomain($this->table, $this->session->userdata('subdomain'))->result();
		$this->template->display('admin/media/index', $data);
	}

	public function add()
	{
		$data['title'] = "Add Media";
		$this->template->display('admin/media/add', $data);
	}

	public function uploadImg()
	{
			$config['upload_path'] = './img/media/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '3000';
			$config['max_width']  = '2024';
			$config['max_height']  = '1768';
			
			$this->upload->initialize($config);
			$this->upload->do_upload("img");
			$img = $this->upload->data();
			$path = base_url('img/media/'.$img['file_name']);
			$record = array(
								'id' => '',
								'media_file' => $img['file_name'],
								'path' => $path,
								'subdomain' => $this->session->userdata('subdomain'),
								'tgl' => date('Y-m-d H:i:s')
							);
			$this->m_webadmin->insertData($this->table, $record);
			$this->session->set_flashdata('add_success', '<div class="alert alert-success"><i class="fa fa-check"></i> Add success</div>');
			redirect('media','refresh');
	}

	public function update()
	{
		$data['title'] = 'Update Media';
		$id = $this->uri->segment(3);
		$query = $this->m_webadmin->get_id($this->table, $this->pk, $id);
		
		if (isset($_POST['edit'])) {
			$config['upload_path'] = './img/media/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000';
			$config['max_width']  = '2024';
			$config['max_height']  = '1768';
			
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('img')){
				redirect('media','refresh');
			}
			else{
				$img = $this->upload->data();
				$path = base_url('img/media/'.$img['file_name']);
		
				$record = array(
								'media_file' => $img['file_name'],
								'path' => $path,
								'tgl' => date('Y-m-d H:i:s')
							);

				$get_img = $query->row_array();
				unlink('img/media/'.$get_img['media_file']);
			}


			$this->m_webadmin->updateData($this->table, $record, $this->pk, $id);
			$this->session->set_flashdata('update_success', '<div class="alert alert-info"><i class="fa fa-check"></i> Update success</div>');
			redirect('media','refresh');
		}
		$data['media'] = $query->row_array();
		$this->template->display('admin/media/update', $data);
	}

	public function uploadUpdate()
	{

	}

	public function delete()
	{
		$id = $this->input->post('id');
		$get_img = $this->m_webadmin->get_id($this->table , $this->pk, $id)->row_array();
		unlink('img/media/'.$get_img['media_file']);

		$this->m_webadmin->deleteData($this->table, $this->pk, $id);
		$this->session->set_flashdata('delete_success', '<div class="alert alert-danger"><i class="fa fa-trash"></i> Delete success</div>');
	}

	public function cekLogin()
	{
		if ($this->session->userdata('islogin') == false)
			redirect('auth','refresh');
	}

}

/* End of file media.php */
/* Location: ./application/controllers/media.php */