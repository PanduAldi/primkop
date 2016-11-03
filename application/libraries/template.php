<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	protected $_CI;

	public function __construct()
	{
        $this->_CI =&get_instance();
	}

	public function display($template, $data=null)
	{

		$data['_content'] = $this->_CI->load->view($template, $data, true);
		$data['_header'] = $this->_CI->load->view('admin/template/header', $data, true);
		$data['_sidebar'] = $this->_CI->load->view('admin/template/sidebar', $data, true);
		$this->_CI->load->view('admin/template.php', $data);
	}

	public function displayfront($template, $data=null)
	{
		$data['_content'] = $this->_CI->load->view($template, $data, true);
		$data['_headertop'] = $this->_CI->load->view('web/template/headertop',$data, true);
		$data['_headerbottom'] = $this->_CI->load->view('web/template/headerbottom', $data, true);
		$data['_sidebar'] = $this->_CI->load->view('web/template/sidebar', $data, true);
		$this->_CI->load->view('web/template', $data);
	}	

 }

/* End of file template.php */
/* Location: ./application/libraries/template.php */
