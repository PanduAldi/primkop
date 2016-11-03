<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	var $table = 'tb_produk';
	var $pk = 'id';

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','upload', 'image_lib'));
		$this->load->model('m_webadmin');
		$this->cekLogin();
	}

	public function index()
	{
		$data['title'] = 'Produk';
		$data['produk'] = $this->m_webadmin->get_by_subdomain($this->table, $this->session->userdata('subdomain'))->result();
		$this->template->display('admin/produk/index', $data);
	}

	public function add()
	{
		$data['title'] = "Add Product";
		$this->cekValidasi();
			$data['error_image'] = "";
			$data['error_resize'] = "";

		if ($this->form_validation->run() == true) {
			

			// set upload
			$config['upload_path'] = './img/produk/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '80000';
			$config['max_width']  = '3024';
			$config['max_height']  = '2768';
			
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('img')){
				$data['error_image'] = $this->upload->display_errors();
			}
			else{
				
				//set file name
				$img = str_replace(" ", "_", $_FILES['img']['name']);

				//set_resize
                $config['image_library'] = "gd2";
                $config['source_image'] = "./img/produk/".$img;
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['width'] = 325;
                $config['height'] = 325;

				$this->image_lib->initialize($config);
				if (!$this->image_lib->resize())
				{
					$data['error'] = $this->image_lib->display_errors();
					unlink('img/produk/'.$img);
				}
				else
				{
					$record = array(
										'id' => '',
										'nama' => $this->input->post('nama'),
										'intro' => $this->input->post('intro'),
										'deskripsi' => $this->input->post('deskripsi'),
										'img' => $img, 
										'subdomain' => $this->session->userdata('subdomain')
									);

					$this->m_webadmin->insertData($this->table, $record);
					$this->session->set_flashdata('add_success', '<div class="alert alert-success"><i class="fa fa-check"></i> Add success</div>');
					redirect('produk', $data);
				}
			}
		}
			$data['media'] = $this->m_webadmin->get_by_subdomain('tb_media', $this->session->userdata('subdomain'))->result();
			$this->template->display('admin/produk/add', $data);

	}

	public function update()
	{
		$data['title'] = "Update Artikel";
		$id = $this->uri->segment(3);
		$query = $this->m_webadmin->get_id($this->table, $this->pk, $id);
		$data['error_resize'] = "";
	
		$this->cekValidasi();
		if ($this->form_validation->run() == true)
		{

			//upload
			$config['upload_path'] = './img/produk/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '80000';
			$config['max_width']  = '3024';
			$config['max_height']  = '2768';
			
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('img')){
				$record = array(
									'nama' => $this->input->post('nama'),
									'intro' => $this->input->post('intro'),
									'deskripsi' => $this->input->post('deskripsi')
								);

				$this->m_webadmin->updateData($this->table, $record, $this->pk, $id);
				$this->session->set_flashdata('update_success', '<div class="alert alert-info"><i class="fa fa-check"></i> Update Success</div>');
				redirect('produk','refresh');
			}
			else{

				//img name
				$img = str_replace(' ', '_', $_FILES['img']['name']);

				//resize set
				$config['image_library'] = 'gd2';
				$config['source_image'] = './img/produk/'.$img;
				$config['create_thumb'] = false;
				$config['maintain_ratio'] = false;
				$config['width'] = 325;
				$config['height'] = 325;

				$this->image_lib->initialize($config);
				if (!$this->image_lib->resize())
				{
					$data['error_resize'] = $this->image_lib->display_errors();
					unlink('img/produk/'.$img);
				}
				else
				{
					$record = array(
										'nama' => $this->input->post('nama'),
										'intro' => $this->input->pos('intro'),
										'deskripsi' => $this->input->post('deskripsi'),
										'img' => $img
									);

					//img dlete
					$img_get = $query->row_array();
					unlink('img/produk/'.$img_get['img']);

					$this->m_webadmin->updateData($this->table, $record, $this->pk, $id);
					$this->session->set_flashdata('update', '<div class="alert alert-info"><i class="fa fa-check"></i> Update success</div>');
					redirect('produk', $data);					
				}

			}
		}

			$data['media'] = $this->m_webadmin->get_by_subdomain('tb_media', $this->session->userdata('subdomain'))->result();
			$data['produk'] = $query->row_array();
			$this->template->display('admin/produk/update', $data);
	}

    public function delete()
    {
        $id = $this->input->post('id');
        $img_get = $this->m_webadmin->get_id($this->table, $this->pk, $id)->row_array();
        unlink('img/produk/'.$img_get['img']);

        $this->m_webadmin->deleteData($this->table, $this->pk, $id);
        $this->session->set_flashdata('delete_success', '<div class="alert alert-danger"><i class="fa fa-trash"></i> Delete success</div>');
    }

	public function cekValidasi()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger" data-animate="fadeInLeft">', '</div>');
	}


	public function cekLogin()
	{
		if ($this->session->userdata('islogin') == false)
			redirect('auth','refresh');
	}
}


/* End of file produk.php */
/* Location: ./application/controllers/produk.php */