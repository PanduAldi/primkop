<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	var $table = "tb_gallery";
	var $pk  = "id_gallery";

 	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('upload', 'form_validation', 'image_lib'));
		$this->load->model('m_webadmin');
		$this->cekLogin();
	}

	public function index($limit=null, $offset=null)
	{
		$data['title'] = "Gallery";
		$data['gallery'] = $this->m_webadmin->get_by_subdomain($this->table, $this->session->userdata('subdomain'))->result();
		$this->template->display('admin/gallery/index', $data); 
	}

	public function add()
	{
		$data['title'] = 'Add Gallery';
		$data['error_image'] = "";
		$data['error_resize']= "";

		//validasi
		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() == true)
		{
			$config['upload_path'] = './img/thumb/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '80000';
			$config['max_width']  = '2024';
			$config['max_height']  = '1768';
			
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('thumb')){
				$data['error_image'] = $this->upload->display_errors();
			}
			else{
				$thumb = str_replace(' ', '_', $_FILES['thumb']['name']);

				//resize image
				$config['image_library'] = "gd2";
				$config['source_image'] = "./img/thumb/".$thumb;
				$config['create_thumb'] = false;
				$config['maintain_ratio'] = false;
				$config['width'] = 325;
				$config['height'] = 325;

				$this->image_lib->initialize($config);
				
				if (!$this->image_lib->resize())
				{
					$data['error_resize'] = $this->image_lib->display_errors();
					unlink('img/thumb/'.$thumb);
				}
				else
				{

					$record = array(
										'id_gallery' => '',
										'nama' => $this->input->post('nama'),
										'thumb' => $thumb,
										'subdomain' => $this->session->userdata('subdomain')
									);
				
					$this->m_webadmin->insertData($this->table, $record);
					$this->session->set_flashdata('add_success', '<div class="alert alert-success"><i class="fa fa-check"></i> Add success</div>');
					redirect('gallery','refresh');					
				}

			}

		}

		$this->template->display('admin/gallery/add', $data);
	}

	public function update()
	{
		$data['title'] = "Edit Gallery";
		$id = $this->uri->segment(3);
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$query = $this->m_webadmin->get_id($this->table, $this->pk, $id);

		$data['error_resize'] = "";

		if ($this->form_validation->run() == true)
		{
			$config['upload_path'] = './img/thumb/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '80000';
			$config['max_width']  = '2024';
			$config['max_height']  = '1768';
			
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('thumb')){
				$record = array('nama' => $this->input->post('nama'));
	
				$this->m_webadmin->updateData($this->table, $record, $this->pk, $id);
				$this->session->set_flashdata('update_success', '<div class="alert alert-info"><i class="fa fa-check"></i> Update Success</div>');
				redirect('gallery','refresh');
			}
			else{
				$thumb = str_replace(' ', '_', $_FILES['thumb']['name']);
				//resize image
				$config['image_library'] = "gd2";
				$config['source_image'] = "./img/thumb/".$thumb;
				$config['create_thumb'] = false;
				$config['maintain_ratio'] = false;
				$config['width'] = 325;
				$config['height'] = 325;

				$this->image_lib->initialize($config);
				
				if (!$this->image_lib->resize())
				{
					$data['error_resize'] = $this->image_lib->display_errors();
					unlink('img/thumb/'.$thumb);
				}
				else
				{

					$record = array(
										'nama' => $this->input->post('nama'),
										'thumb' => $thumb
									);
				
					//unlink
					$img_get = $query->row_array();
					unlink('img/thumb/'.$img_get['thumb']);
					$this->m_webadmin->updateData($this->table, $record, $this->pk, $id);
					$this->session->set_flashdata('update_success', '<div class="alert alert-success"><i class="fa fa-check"></i> Update success</div>');
					redirect('gallery','refresh');					
				}
			}
		}

		$data['gallery'] = $query->row_array();
		$this->template->display('admin/gallery/update', $data);
	}


	public function delete()
	{
		$id = $this->input->post('id');
		$cek_det_gallery = $this->m_webadmin->get_id('tb_det_gallery', $this->pk, $id);

		foreach ($cek_det_gallery->result() as $cek_det) 
		{
			unlink('img/gallery/'.$cek_det->img);
			$this->m_webadmin->deleteData('tb_det_gallery', 'id', $cek_det->id);
		}

		$img = $this->m_webadmin->get_id($this->table, $this->pk, $id)->row_array();
		unlink('img/thumb/'.$img['thumb']);

		$this->m_webadmin->deleteData($this->table, $this->pk, $id);
		$this->session->set_flashdata('delete_success', '<div class="alert alert-danger"><i class="fa fa-trash"></i> Delete Success</div>');
	}

	public function cekLogin()
	{
		if ($this->session->userdata('islogin')==false)
			redirect('auth','refresh');
	}

	public function det_gallery()
	{
		$data['title'] = "Detail Gallery";
		$id = $this->uri->segment(3);

		$data['gallery'] = $this->m_webadmin->get_id($this->table, $this->pk, $id)->row_array();
		$data['det_gallery'] = $this->m_webadmin->get_id('tb_det_gallery', $this->pk, $id)->result();
		$this->template->display('admin/gallery/det_gallery', $data);
	}

	public function add_det_gallery()
	{
		$data['title'] = "Add Image Gallery";
		$id = $this->uri->segment(3);

		//rules
		$this->form_validation->set_rules('caption', 'Caption', 'required');

		if ($this->form_validation->run()==true)
		{
			$config['upload_path'] = './img/gallery/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '80000';
			$config['max_width']  = '3024';
			$config['max_height']  = '2768';
			
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('img'))
			{
				$data['error_image'] = $this->upload->display_errors();
			}
			else
			{
				$img = str_replace(' ', '_', $_FILES['img']['name']);

				//resize image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './img/gallery/'.$img;
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['width'] = 900;
				$config['height'] = 500;

				$this->image_lib->initialize($config);
				if (!$this->image_lib->resize()) {
					$data['error_resize'] = $this->image_lib->display_errors();
				}
				else
				{

					$record = array(
										'id' => '',
										'id_gallery' => $id,
										'caption' => $this->input->post('caption'),
										'img' => $img
									);
				
					$this->m_webadmin->insertData('tb_det_gallery', $record);
					$this->session->set_flashdata('add_success', '<div class="alert alert-success"><i class="fa fa-check"></i> Add success</div>');
					redirect('gallery/det_gallery/'.$id,'refresh');
				}
			}

		}

		$this->template->display('admin/gallery/add_det_gallery', $data);
	}


	public function delete_gallery()
	{
		$id = $this->input->post('id');
		$img_get = $this->m_webadmin->get_id('tb_det_gallery', 'id', $id)->row_array();
		unlink('img/gallery/'.$img_get['img']);

		$this->m_webadmin->deleteData('tb_det_gallery', 'id', $id);
		$this->session->set_flashdata('delete_success', '<div class="alert alert-danger"><i class="fa fa-trash"></i> Delete success</div>');
	}
}