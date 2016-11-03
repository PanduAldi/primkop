<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

    var $table = "tb_artikel";
    var $pk = "id_artikel";

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('upload', 'form_validation', 'image_lib'));
        $this->load->model('m_webadmin');
        $this->cekLogin();
    }

    public function index()
    {
        $data['title'] = "Artikel";
        $data['artikel'] = $this->m_webadmin->get_by_subdomain($this->table, $this->session->userdata('subdomain'))->result();
        $this->template->display('admin/artikel/index', $data); 
    }

    public function add()
    {
        $data['title'] = "Add artikel";
        $this->cekValidasi();

        if ($this->form_validation->run()==true)
        {
            $config['upload_path'] = './img/artikel/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '8000';
            $config['max_width']  = '2024';
            $config['max_height']  = '1768';
            
            $this->upload->initialize($config); 
            if ($this->upload->do_upload('img')){
               // upload gambar
				$img = str_replace(' ', '_', $_FILES['img']['name']); 
		
                $config['image_library'] = "gd2";
                $config['source_image'] = "./img/artikel/".$img;
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['width'] = 848;
                $config['height'] = 420;

                $this->image_lib->initialize($config);

                if (!$this->image_lib->resize())
                {
                	$data['error_resize'] = $this->image_lib->display_errors();
                	unlink('img/artikel/'.$img);
                }
                else
                {
                    $penulis = explode("-", $this->input->post('penulis'));
                    $record = array(
                                        'id_artikel' => '',
                                        'judul' => $this->input->post('judul'),
                                        'isi' => $this->input->post('isi'),
                                        'publish' => $this->input->post('publish'),
                                        'img' => $img,
                                        'kd_penulis' => $penulis[0],
                                        'penulis' => $penulis[1],
                                        'tgl' => date('Y-m-d H:i:s'),
                                        'headline' => 'n',
                                        'intro' => $this->input->post('intro'),
                                        'hit' => 0,
                                        'subdomain' => $this->session->userdata('subdomain')
                                    );

                    $this->m_webadmin->insertData($this->table, $record);
                    $this->session->set_flashdata('add_success', '<div class="alert alert-success"><i class="fa fa-check"></i> Add success</div>');
                    redirect('artikel','refresh');
            	}
            }

            else
            {
            	$data['error_gambar'] = $this->upload->display_errors();
            }

        }

        $data['error_gambar'] = '';
        $data['error_resize'] = '';

        $data['penulis'] = $this->m_webadmin->get_by_subdomain('tb_penulis', $this->session->userdata('subdomain'))->result();
        $data['media'] = $this->m_webadmin->get_by_subdomain('tb_media', $this->session->userdata('subdomain'))->result();
        $this->template->display('admin/artikel/add', $data);
    }

    public function update()
    {
        $data['title'] = "Update Artikel";
        $id = $this->uri->segment(3);
        $query = $this->m_webadmin->get_id($this->table, $this->pk, $id);
        $this->cekValidasi();
        
        if ($this->form_validation->run() == true)
        {
            $config['upload_path'] = './img/artikel/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '8000';	
            $config['max_width']  = '3024';
            $config['max_height']  = '2768';
            
            $this->upload->initialize($config);
            if ($this->upload->do_upload('img'))
            {

                $img = $_FILES['img']['name'];
                
                $config['image_library'] = "gd2";
                $config['source_image'] = "./img/artikel/".$img;
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['width'] = 848;
                $config['height'] = 420;

                $this->image_lib->initialize($config);

                if (!$this->image_lib->resize())
                {
                    $this->session->set_flashdata('error_resize', '<div class="alert alert-danger">gagal resize</div>');
                    unlink('img/artikel/'.$img);
                }
                else
                {


                	$record = array(
                                    'judul' => $this->input->post('judul'),
                                    'isi' => $this->input->post('isi'),
                                    'publish' => $this->input->post('publish'),
                                    'intro' => $this->input->post('intro'),
                                    'img' => $img
                                );
            
    	            $img_get = $query->row_array();
	                unlink('img/artikel/'.$img_get['img']); 

		            $this->m_webadmin->updateData($this->table, $record, $this->pk, $id);
		            $this->session->set_flashdata('update_success', '<div class="alert alert-info"><i class="fa fa-check"></i> Update success</div>');
		            redirect('artikel','refresh');
                }

            }
            else 
            {   
                $record = array(
                                    'judul' => $this->input->post('judul'),
                                    'isi' => $this->input->post('isi'),
                                    'publish' => $this->input->post('publish'),
                                    'intro' => $this->input->post('intro')
                                );

	            $this->m_webadmin->updateData($this->table, $record, $this->pk, $id);
	            $this->session->set_flashdata('update_success', '<div class="alert alert-info"><i class="fa fa-check"></i> Update success</div>');
	            redirect('artikel','refresh');

            }

        }

        $data['artikel'] = $query->row_array();
        $this->template->display('admin/artikel/update', $data);
    }

    public function delete()
    {
        $id = $this->input->post('id_artikel');
        $img_get = $this->m_webadmin->get_id($this->table, $this->pk, $id)->row_array();
        unlink('img/artikel/'.$img_get['img']);

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

    public function cekValidasi()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('publish', 'Publish', 'required');
    }

}

/* End of file event.php */
/* Location: ./application/controllers/event.php */