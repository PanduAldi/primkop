<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	var $table = "tb_event";
	var $pk = "id";

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('upload', 'form_validation', 'image_lib'));
		$this->load->model('m_webadmin');
		$this->cekLogin();
	}

	public function index()
	{
		$data['title'] = "Event";
		$data['event'] = $this->m_webadmin->get_by_subdomain($this->table, $this->session->userdata('subdomain'))->result();
		$this->template->display('admin/event/index', $data); 
	}

	public function add()
	{
		$data['title'] = "Add Event";
		//set_rules
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

		$data['error_image'] = "";
		$data['error_resize'] = "";

		if ($this->form_validation->run()==true)
		{
			$config['upload_path'] = './img/event/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '80000';
			$config['max_width']  = '3024';
			$config['max_height']  = '2768';
			
			$this->upload->initialize($config);	
			if (!$this->upload->do_upload('img'))
			{
				$data['error_image'] = $this->upload->display_errors();
			}
			else{
				$img = str_replace(' ', '_', $_FILES['img']['name']); 

				//resize
				$config['image_library'] = 'gd2';
				$config['source_image'] = './img/event/'.$img;
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['width'] = 500;
				$config['height'] = 300;

				$this->image_lib->initialize($config);
				if (!$this->image_lib->resize()) 
				{
					$data['error_resize'] = $this->image_lib->display_errors();
					unlink('img/event/'.$img);	
				}
				else
				{
					$record = array(
										'id' => '',
										'nama' => $this->input->post('nama'),
										'intro' => $this->input->post('intro'),
										'isi' => $this->input->post('isi'),
										'img' => $img,
										'date' => date('Y-m-d H:i:s'),
										'headline' => 'n',
										'publish' => $this->input->post('publish'),
										'subdomain' => $this->session->userdata('subdomain')
									);

					$this->m_webadmin->insertData($this->table, $record);
					$this->session->set_flashdata('add_success', '<div class="alert alert-success"><i class="fa fa-check"></i> Add success</div>');
					redirect('event','refresh');
				}
			}

		}

		$this->template->display('admin/event/add', $data);
 	}

 	public function update()
 	{
 		$data['title'] = "Update Event";
 		$id = $this->uri->segment(3);
 		$query = $this->m_webadmin->get_id($this->table, $this->pk, $id);

 		$data['error_resize'] = "";

 		// validation rules
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>'); 		

 		if ($this->form_validation->run() == true)
 		{
 			$config['upload_path'] = './img/event/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '80000';
			$config['max_width']  = '3024';
			$config['max_height']  = '2768';
			
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('img'))
			{
				$record = array(
									'nama' => $this->input->post('nama'),
									'intro' => $this->input->post('intro'),
									'publish' => $this->input->post('publish'),
									'isi' => $this->input->post('isi')
								);

				$this->m_webadmin->updateData($this->table, $record, $this->pk, $id);
				$this->session->set_flashdata('update_success', '<div class="alert alert-info"><i class="fa fa-check"></i> Update success</div>');
				redirect('event','refresh');
			}
			else 
			{	
				$img = str_replace(' ', '_', $_FILES['img']['name']);

				//resize
				$config['image_library'] = 'gd2';
				$config['source_image'] = './img/event/'.$img;
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['width'] = 500;
				$config['height'] = 300;

				$this->image_lib->initialize($config);

				if (!$this->image_lib->resize()) 
				{
					$data['error_resize'] = $this->image_lib->display_errors();
					unlink('img/event/'.$img);
				}
				else
				{

					$record = array(
										'nama' => $this->input->post('nama'),
										'intro' => $this->input->post('intro'),
										'isi' => $this->input->post('isi'),
										'publish' => $this->input->post('publish'),
										'img' => $img
									);
				
					$img_get = $query->row_array();
					unlink('img/event/'.$img_get['img']);					

					$this->m_webadmin->updateData($this->table, $record, $this->pk, $id);
					$this->session->set_flashdata('update_success', '<div class="alert alert-info"><i class="fa fa-check"></i> Update success</div>');
					redirect('event','refresh');
				}
			}
 		}

 		$data['event'] = $query->row_array();
 		$this->template->display('admin/event/update', $data);
 	}

	public function delete()
	{
		$id = $this->input->post('id_event');
		$img_get = $this->m_webadmin->get_id($this->table, $this->pk, $id)->row_array();
		unlink('img/event/'.$img_get['img']);

		$this->m_webadmin->deleteData($this->table, $this->pk, $id);
		$this->session->set_flashdata('delete_success', '<div class="alert alert-danger"><i class="fa fa-trash"></i> Delete success</div>');
	}


 	public function setHeadline()
 	{
 		$id = $this->input->post('kode');
 		$headline = $this->input->post('headline');

 		$this->m_webadmin->updateData($this->table, array('headline'=>$headline), $this->pk, $id);
 		$this->session->$this->session->set_flashdata('headline_success', '<div class="alert alert-success">Headline update success</div>');
 	}

 	public function ceklogin()
 	{
 		if ($this->session->userdata('islogin') == false)
 			redirect('auth','refresh');
 	}

}

/* End of file event.php */
/* Location: ./application/controllers/event.php */