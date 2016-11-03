<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_webportal');

	}

	public function index()
	{

		$table1 = "tb_artikel";
		$table2 = "tb_event";
		$table3 = 'tb_gallery';
		$table4 = 'tb_profil';

		//statistik pengunjung

			$ip_address = $_SERVER['REMOTE_ADDR'];
			$browser = $_SERVER['HTTP_USER_AGENT'];
			$waktu = time();

			$cek_ip_address = $this->db->get_where('visitor', array('ip_address' => $ip_address, 'tanggal' => date('Y-m-d')), null, null);

			if ($cek_ip_address->num_rows() > 0)
			{
				$cari = $cek_ip_address->row();
				$counter = $cari->counter;

				$this->db->where('ip_address', $ip_address);
				$this->db->where('tanggal', date('Y-m-d'));
				$this->db->update('visitor', array('counter' => $counter+1, 'online' => $waktu));
			}
			else
			{
				$record = array(
									'id' => '',
									'ip_address' => $ip_address,
									'tanggal' => date('Y-m-d'),
									'counter' => 1,
									'browser' => $browser,
									'online' => $waktu
								);

				$this->db->insert('visitor', $record);
			}

			#get visitor
			$sekarang  = date('Y-m-d');
			$data['ip_address'] = $ip_address;
			$data['browser'] = $browser;
			$data['hari_ini'] = $this->m_webportal->hari_ini($sekarang);
			$data['bulan_ini'] = $this->m_webportal->bulan_ini();
			$data['hit_counter'] = $this->m_webportal->hit_counter($sekarang)->row();
			$data['total_hit'] = $this->m_webportal->total_hit()->row();
			$data['online'] = $this->m_webportal->online();

		//topmenu
		$data['title'] = "Homepage";
 
		//header
		$data['hari'] = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['tanggal'] = $this->idn_times->tgl_db(date('Y-m-d H:i:s'));

		//sidebar
		$data['toppost'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['profilkami'] = $this->m_webportal->get_not_in_kontak('tb_profil', 'Kontak Kami', 'master', null, null)->result();
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'nama', 'master', null, null)->result();

		
		//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));

		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

		// content side
		$data['hits'] = $this->db->query('select * from '.$table1.' where hit=(select max(hit) from '.$table1.')')->row_array(); 	
		$data['slide'] = $this->m_webportal->get_headline($table1, 'tgl','master', 3, 0)->result();
		$data['artikel_headline'] = $this->m_webportal->get_not_in_headline($table1, 'headline', 'y', 'master', 4, $offset=null)->result();
		$data['event_headline'] = $this->m_webportal->get_headline($table2, 'date', 'master', $limit=null, $offset=null)->result();
		$data['gallery_headline'] = $this->m_webportal->get_all($table3, 'master', 3, 0)->result(); 

		//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline($table2, 'date', 'master', $limit=null, $offset=null)->result(); 

		$this->template->displayfront('web/homepage', $data);	
	}


	public function profil()
	{
		$table = "tb_profil";
		$pk = "id";

		$id = $this->uri->segment(3);
		$query = $this->m_webportal->get_id_subdomain($table, 'master', $pk, $id);

		//statistik pengunjung

			$ip_address = $_SERVER['REMOTE_ADDR'];
			$browser = $_SERVER['HTTP_USER_AGENT'];
			$waktu = time();

			$cek_ip_address = $this->db->get_where('visitor', array('ip_address' => $ip_address, 'tanggal' => date('Y-m-d')), null, null);

			if ($cek_ip_address->num_rows() > 0)
			{
				$cari = $cek_ip_address->row();
				$counter = $cari->counter;

				$this->db->where('ip_address', $ip_address);
				$this->db->where('tanggal', date('Y-m-d'));
				$this->db->update('visitor', array('counter' => $counter+1, 'online' => $waktu));
			}
			else
			{
				$record = array(
									'id' => '',
									'ip_address' => $ip_address,
									'tanggal' => date('Y-m-d'),
									'counter' => 1,
									'browser' => $browser,
									'online' => $waktu
								);

				$this->db->insert('visitor', $record);
			}

			#get visitor
			$sekarang  = date('Y-m-d');
			$data['ip_address'] = $ip_address;
			$data['browser'] = $browser;
			$data['hari_ini'] = $this->m_webportal->hari_ini($sekarang);
			$data['bulan_ini'] = $this->m_webportal->bulan_ini();
			$data['hit_counter'] = $this->m_webportal->hit_counter($sekarang)->row();
			$data['total_hit'] = $this->m_webportal->total_hit()->row();
			$data['online'] = $this->m_webportal->online();

		//get title
		$url = $query->row_array();
		$data['title'] = $this->uri->segment(2)." | ".$url['nama'];

		//header
		$data['hari'] = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['tanggal'] = $this->idn_times->tgl_db(date('Y-m-d H:i:s'));

		//sidebar
		$data['toppost'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['profilkami'] = $this->m_webportal->get_not_in_kontak('tb_profil', 6, 'master', null, null)->result();
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
				//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));

		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

		//content
		$data['profil'] = $query->row_array();
		$data['lihatlain'] = $this->m_webportal->get_all($table, 'master', $limit=null, $offset=null)->result();

		//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', $limit=null, $offset=null)->result(); 


		$this->template->displayfront('web/profil', $data);
	
	}

	public function artikel($offset=null)
	{

		//get title
		$data['title'] = "Artikel";

		//header
		$data['hari'] = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['tanggal'] = $this->idn_times->tgl_db(date('Y-m-d H:i:s'));

		//statistik pengunjung

			$ip_address = $_SERVER['REMOTE_ADDR'];
			$browser = $_SERVER['HTTP_USER_AGENT'];
			$waktu = time();

			$cek_ip_address = $this->db->get_where('visitor', array('ip_address' => $ip_address, 'tanggal' => date('Y-m-d')), null, null);

			if ($cek_ip_address->num_rows() > 0)
			{
				$cari = $cek_ip_address->row();
				$counter = $cari->counter;

				$this->db->where('ip_address', $ip_address);
				$this->db->where('tanggal', date('Y-m-d'));
				$this->db->update('visitor', array('counter' => $counter+1, 'online' => $waktu));
			}
			else
			{
				$record = array(
									'id' => '',
									'ip_address' => $ip_address,
									'tanggal' => date('Y-m-d'),
									'counter' => 1,
									'browser' => $browser,
									'online' => $waktu
								);

				$this->db->insert('visitor', $record);
			}

			#get visitor
			$sekarang  = date('Y-m-d');
			$data['ip_address'] = $ip_address;
			$data['browser'] = $browser;
			$data['hari_ini'] = $this->m_webportal->hari_ini($sekarang);
			$data['bulan_ini'] = $this->m_webportal->bulan_ini();
			$data['hit_counter'] = $this->m_webportal->hit_counter($sekarang)->row();
			$data['total_hit'] = $this->m_webportal->total_hit()->row();
			$data['online'] = $this->m_webportal->online();

		//sidebar
		$data['toppost'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['profilkami'] = $this->m_webportal->get_all('tb_profil', 'master', null, $offset)->result();
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
				//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));

		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

		//content
		$limit  = 5;

		$page = $this->db->query("SELECT COUNT(*) AS jml FROM tb_artikel WHERE subdomain='master'");

		foreach ($page->result() as $row)
		{
			$row = $row->jml;
		}

		$data['artikel'] = $this->m_webportal->get_desc('tb_artikel', 'tgl', 'master', $limit, $offset)->result();

		$this->load->library('pagination');
		
		$config['base_url'] = site_url('web/artikel/');
		$config['total_rows'] = $row;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<ul class="page-numbers">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
		$config['first_tag_open'] = '<li class="page-numbers">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
		$config['last_tag_open'] = '<li class="page-numbers">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li class="page-numbers">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li class="page-numbers">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-numbers current"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-numbers">';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		$data['pagination'] = $this->pagination->create_links();

		//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', $limit=null, $offset=null)->result(); 		

		$this->template->displayfront('web/artikel', $data);

	}

	public function read()
	{
		$id = $this->uri->segment(3);
		$judul = str_replace('-',' ',$this->uri->segment(4));
		$data['title'] = $judul;
		$query = $this->m_webportal->get_id('tb_artikel', 'id_artikel', $id);


		//statistik pengunjung

			$ip_address = $_SERVER['REMOTE_ADDR'];
			$browser = $_SERVER['HTTP_USER_AGENT'];
			$waktu = time();

			$cek_ip_address = $this->db->get_where('visitor', array('ip_address' => $ip_address, 'tanggal' => date('Y-m-d')), null, null);

			if ($cek_ip_address->num_rows() > 0)
			{
				$cari = $cek_ip_address->row();
				$counter = $cari->counter;

				$this->db->where('ip_address', $ip_address);
				$this->db->where('tanggal', date('Y-m-d'));
				$this->db->update('visitor', array('counter' => $counter+1, 'online' => $waktu));
			}
			else
			{
				$record = array(
									'id' => '',
									'ip_address' => $ip_address,
									'tanggal' => date('Y-m-d'),
									'counter' => 1,
									'browser' => $browser,
									'online' => $waktu
								);

				$this->db->insert('visitor', $record);
			}

			#get visitor
			$sekarang  = date('Y-m-d');
			$data['ip_address'] = $ip_address;
			$data['browser'] = $browser;
			$data['hari_ini'] = $this->m_webportal->hari_ini($sekarang);
			$data['bulan_ini'] = $this->m_webportal->bulan_ini();
			$data['hit_counter'] = $this->m_webportal->hit_counter($sekarang)->row();
			$data['total_hit'] = $this->m_webportal->total_hit()->row();
			$data['online'] = $this->m_webportal->online();

// tambah hit
		$get_hit = $this->db->query("SELECT hit FROM tb_artikel WHERE id_artikel='$id'")->row_array();
		$hit = $get_hit['hit'];
		$this->db->query("UPDATE tb_artikel SET hit='$hit'+1 WHERE id_artikel='$id'");

//header
		$data['hari'] = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['tanggal'] = $this->idn_times->tgl_db(date('Y-m-d H:i:s'));
//sidebar
		$data['toppost'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['profilkami'] = $this->m_webportal->get_not_in_kontak('tb_profil', 6, 'master', null, null)->result();
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
				//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));

		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', $limit=null, $offset=null)->result();

//content
		$data['baca_artikel'] = $query->row_array();
		$data['lihatlain'] = $this->m_webportal->get_not_in('tb_artikel', 'judul', $this->uri->segment(3), 'master', 3, 0)->result();
		$query_comment = $this->db->query("SELECT * FROM tb_comment WHERE id_artikel = '$id' AND id_comment= 0");
		$data['komentar'] = $query_comment->result();

//insert commentar
		$this->load->library('form_validation');

		#set rules
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('komentar', 'Komentar', 'requried');

		if ($this->form_validation->run() == true)
		{
			$get_artikel = $query->row_array();
			$record = array(
								'id' => '',
								'nama' => $this->input->post('nama'),
								'email' => $this->input->post('email'),
								'website' => $this->input->post('website'),
								'comment' => $this->input->post('komentar'),
								'ip_address' => $_SERVER['REMOTE_ADDR'],
								'id_comment'=> 0,
								'id_artikel' => $get_artikel['id_artikel'],
								'date' => date('Y-m-d H:i:s'),
								'subdomain' => 'master'
							);

			$this->m_webportal->insert_comment($record);
			$this->session->set_flashdata('comment_success', '<div class="alert alert-success">Comment Success</div>');
			redirect('web/read/'.$id.'/'.$this->uri->segment(4),'refresh');
		}


		$this->template->displayfront('web/read', $data);
	}

	public function kontak()
	{
		$data['title'] = "Kontak";
		//header
		$data['hari'] = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['tanggal'] = $this->idn_times->tgl_db(date('Y-m-d H:i:s'));

		//statistik pengunjung

			$ip_address = $_SERVER['REMOTE_ADDR'];
			$browser = $_SERVER['HTTP_USER_AGENT'];
			$waktu = time();

			$cek_ip_address = $this->db->get_where('visitor', array('ip_address' => $ip_address, 'tanggal' => date('Y-m-d')), null, null);

			if ($cek_ip_address->num_rows() > 0)
			{
				$cari = $cek_ip_address->row();
				$counter = $cari->counter;

				$this->db->where('ip_address', $ip_address);
				$this->db->where('tanggal', date('Y-m-d'));
				$this->db->update('visitor', array('counter' => $counter+1, 'online' => $waktu));
			}
			else
			{
				$record = array(
									'id' => '',
									'ip_address' => $ip_address,
									'tanggal' => date('Y-m-d'),
									'counter' => 1,
									'browser' => $browser,
									'online' => $waktu
								);

				$this->db->insert('visitor', $record);
			}

			#get visitor
			$sekarang  = date('Y-m-d');
			$data['ip_address'] = $ip_address;
			$data['browser'] = $browser;
			$data['hari_ini'] = $this->m_webportal->hari_ini($sekarang);
			$data['bulan_ini'] = $this->m_webportal->bulan_ini();
			$data['hit_counter'] = $this->m_webportal->hit_counter($sekarang)->row();
			$data['total_hit'] = $this->m_webportal->total_hit()->row();
			$data['online'] = $this->m_webportal->online();

		//sidebar side
		$data['toppost'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['profilkami'] = $this->m_webportal->get_not_in_kontak('tb_profil', 6, 'master', null, null)->result();	
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
				//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));

		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

		//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', $limit=null, $offset=null)->result(); 

		//content
		$data['kontak'] = $this->m_webportal->get_id('tb_profil', 'id', 6)->row_array();

		$this->template->displayfront('web/kontak', $data);
	}


	public function gallery()
	{
		$data['title'] = "gallery";

		//header
		$data['hari'] = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['tanggal'] = $this->idn_times->tgl_db(date('Y-m-d H:i:s'));

		//statistik pengunjung

			$ip_address = $_SERVER['REMOTE_ADDR'];
			$browser = $_SERVER['HTTP_USER_AGENT'];
			$waktu = time();

			$cek_ip_address = $this->db->get_where('visitor', array('ip_address' => $ip_address, 'tanggal' => date('Y-m-d')), null, null);

			if ($cek_ip_address->num_rows() > 0)
			{
				$cari = $cek_ip_address->row();
				$counter = $cari->counter;

				$this->db->where('ip_address', $ip_address);
				$this->db->where('tanggal', date('Y-m-d'));
				$this->db->update('visitor', array('counter' => $counter+1, 'online' => $waktu));
			}
			else
			{
				$record = array(
									'id' => '',
									'ip_address' => $ip_address,
									'tanggal' => date('Y-m-d'),
									'counter' => 1,
									'browser' => $browser,
									'online' => $waktu
								);

				$this->db->insert('visitor', $record);
			}

			#get visitor
			$sekarang  = date('Y-m-d');
			$data['ip_address'] = $ip_address;
			$data['browser'] = $browser;
			$data['hari_ini'] = $this->m_webportal->hari_ini($sekarang);
			$data['bulan_ini'] = $this->m_webportal->bulan_ini();
			$data['hit_counter'] = $this->m_webportal->hit_counter($sekarang)->row();
			$data['total_hit'] = $this->m_webportal->total_hit()->row();
			$data['online'] = $this->m_webportal->online();

		//sidebar side
		$data['toppost'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['profilkami'] = $this->m_webportal->get_not_in_kontak('tb_profil', 6, 'master', null, null)->result();	
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
				//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));

		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

		//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', $limit=null, $offset=null)->result(); 

		//content side
		$data['gallery'] = $this->m_webportal->get_desc('tb_gallery', 'id_gallery', 'master', null, null)->result();

		$this->template->displayfront('web/gallery', $data);

	}

	public function view_gallery()
	{
		$id = $this->uri->segment(3);
		$data['title'] = "View Gallery".str_replace('-',' ',$this->uri->segment(4));

		//statistik pengunjung

			$ip_address = $_SERVER['REMOTE_ADDR'];
			$browser = $_SERVER['HTTP_USER_AGENT'];
			$waktu = time();

			$cek_ip_address = $this->db->get_where('visitor', array('ip_address' => $ip_address, 'tanggal' => date('Y-m-d')), null, null);

			if ($cek_ip_address->num_rows() > 0)
			{
				$cari = $cek_ip_address->row();
				$counter = $cari->counter;

				$this->db->where('ip_address', $ip_address);
				$this->db->where('tanggal', date('Y-m-d'));
				$this->db->update('visitor', array('counter' => $counter+1, 'online' => $waktu));
			}
			else
			{
				$record = array(
									'id' => '',
									'ip_address' => $ip_address,
									'tanggal' => date('Y-m-d'),
									'counter' => 1,
									'browser' => $browser,
									'online' => $waktu
								);

				$this->db->insert('visitor', $record);
			}

			#get visitor
			$sekarang  = date('Y-m-d');
			$data['ip_address'] = $ip_address;
			$data['browser'] = $browser;
			$data['hari_ini'] = $this->m_webportal->hari_ini($sekarang);
			$data['bulan_ini'] = $this->m_webportal->bulan_ini();
			$data['hit_counter'] = $this->m_webportal->hit_counter($sekarang)->row();
			$data['total_hit'] = $this->m_webportal->total_hit()->row();
			$data['online'] = $this->m_webportal->online();

		//header
		$data['hari'] = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['tanggal'] = $this->idn_times->tgl_db(date('Y-m-d H:i:s'));

		//sidebar side
		$data['toppost'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['profilkami'] = $this->m_webportal->get_all('tb_profil', 'master', null, null)->result();	
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
				//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));

		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

		//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', null, null)->result(); 

		//content
		$query_gallery = $this->m_webportal->get_id('tb_det_gallery', 'id_gallery', $id);
		$data['view_gallery'] = $query_gallery->result();
		$data['cek_gallery'] = $query_gallery->num_rows();

		$this->template->displayfront('web/view_gallery', $data);

	}

	public function event($offset=null)
	{

		$data['title'] = "Event";

		//header
		$data['hari'] = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['tanggal'] = $this->idn_times->tgl_db(date('Y-m-d H:i:s'));

		//statistik pengunjung

			$ip_address = $_SERVER['REMOTE_ADDR'];
			$browser = $_SERVER['HTTP_USER_AGENT'];
			$waktu = time();

			$cek_ip_address = $this->db->get_where('visitor', array('ip_address' => $ip_address, 'tanggal' => date('Y-m-d')), null, null);

			if ($cek_ip_address->num_rows() > 0)
			{
				$cari = $cek_ip_address->row();
				$counter = $cari->counter;

				$this->db->where('ip_address', $ip_address);
				$this->db->where('tanggal', date('Y-m-d'));
				$this->db->update('visitor', array('counter' => $counter+1, 'online' => $waktu));
			}
			else
			{
				$record = array(
									'id' => '',
									'ip_address' => $ip_address,
									'tanggal' => date('Y-m-d'),
									'counter' => 1,
									'browser' => $browser,
									'online' => $waktu
								);

				$this->db->insert('visitor', $record);
			}

			#get visitor
			$sekarang  = date('Y-m-d');
			$data['ip_address'] = $ip_address;
			$data['browser'] = $browser;
			$data['hari_ini'] = $this->m_webportal->hari_ini($sekarang);
			$data['bulan_ini'] = $this->m_webportal->bulan_ini();
			$data['hit_counter'] = $this->m_webportal->hit_counter($sekarang)->row();
			$data['total_hit'] = $this->m_webportal->total_hit()->row();
			$data['online'] = $this->m_webportal->online();

		//sidebar side
		$data['toppost'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['profilkami'] = $this->m_webportal->get_all('tb_profil', 'master', null, $offset)->result();	
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
				//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));

		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

		//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', null, $offset)->result(); 

		//content
		$limit  = 5;

		$page = $this->db->query("SELECT COUNT(*) AS jml FROM tb_event WHERE subdomain='master'");

		foreach ($page->result() as $row)
		{
			$row = $row->jml;
		}

		$data['event'] = $this->m_webportal->get_desc('tb_event', 'date', 'master', $limit, $offset)->result();
		
		$this->load->library('pagination');
		
		$config['base_url'] = site_url('web/event/');
		$config['total_rows'] = $row;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<ul class="page-numbers">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
		$config['first_tag_open'] = '<li class="page-numbers">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
		$config['last_tag_open'] = '<li class="page-numbers">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li class="page-numbers">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li class="page-numbers">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-numbers current"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-numbers">';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		$data['pagination'] = $this->pagination->create_links();


		$this->template->displayfront('web/event', $data);
	}

	public function event_read()
	{
		$id = $this->uri->segment(3);
		$judul = str_replace('-',' ',$this->uri->segment(4));
		$data['title'] = $judul;
		$query = $this->m_webportal->get_id('tb_event', 'id', $id);

		//statistik pengunjung

			$ip_address = $_SERVER['REMOTE_ADDR'];
			$browser = $_SERVER['HTTP_USER_AGENT'];
			$waktu = time();

			$cek_ip_address = $this->db->get_where('visitor', array('ip_address' => $ip_address, 'tanggal' => date('Y-m-d')), null, null);

			if ($cek_ip_address->num_rows() > 0)
			{
				$cari = $cek_ip_address->row();
				$counter = $cari->counter;

				$this->db->where('ip_address', $ip_address);
				$this->db->where('tanggal', date('Y-m-d'));
				$this->db->update('visitor', array('counter' => $counter+1, 'online' => $waktu));
			}
			else
			{
				$record = array(
									'id' => '',
									'ip_address' => $ip_address,
									'tanggal' => date('Y-m-d'),
									'counter' => 1,
									'browser' => $browser,
									'online' => $waktu
								);

				$this->db->insert('visitor', $record);
			}

			#get visitor
			$sekarang  = date('Y-m-d');
			$data['ip_address'] = $ip_address;
			$data['browser'] = $browser;
			$data['hari_ini'] = $this->m_webportal->hari_ini($sekarang);
			$data['bulan_ini'] = $this->m_webportal->bulan_ini();
			$data['hit_counter'] = $this->m_webportal->hit_counter($sekarang)->row();
			$data['total_hit'] = $this->m_webportal->total_hit()->row();
			$data['online'] = $this->m_webportal->online();


//header
		$data['hari'] = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['tanggal'] = $this->idn_times->tgl_db(date('Y-m-d H:i:s'));
//sidebar
		$data['toppost'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['profilkami'] = $this->m_webportal->get_not_in_kontak('tb_profil', 6, 'master', null, null)->result();
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
				//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));

		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', $limit=null, $offset=null)->result();

//content
		$data['baca_event'] = $query->row_array();
		$data['lihatlain'] = $this->m_webportal->get_not_in_event('tb_event', 'id', 'date', 'master', 3, 0)->result();


		$this->template->displayfront('web/event_read', $data);
	}


	public function eventlain()
	{
		$judul = 'Data Event';
		$data['title'] = $judul;
		$id = 1;
		$query = $this->m_webportal->get_id('tb_event', 'id', $id);

		$data['error_upload'] = '';

		//statistik pengunjung

			$ip_address = $_SERVER['REMOTE_ADDR'];
			$browser = $_SERVER['HTTP_USER_AGENT'];
			$waktu = time();

			$cek_ip_address = $this->db->get_where('visitor', array('ip_address' => $ip_address, 'tanggal' => date('Y-m-d')), null, null);

			if ($cek_ip_address->num_rows() > 0)
			{
				$cari = $cek_ip_address->row();
				$counter = $cari->counter;

				$this->db->where('ip_address', $ip_address);
				$this->db->where('tanggal', date('Y-m-d'));
				$this->db->update('visitor', array('counter' => $counter+1, 'online' => $waktu));
			}
			else
			{
				$record = array(
									'id' => '',
									'ip_address' => $ip_address,
									'tanggal' => date('Y-m-d'),
									'counter' => 1,
									'browser' => $browser,
									'online' => $waktu
								);

				$this->db->insert('visitor', $record);
			}

			#get visitor
			$sekarang  = date('Y-m-d');
			$data['ip_address'] = $ip_address;
			$data['browser'] = $browser;
			$data['hari_ini'] = $this->m_webportal->hari_ini($sekarang);
			$data['bulan_ini'] = $this->m_webportal->bulan_ini();
			$data['hit_counter'] = $this->m_webportal->hit_counter($sekarang)->row();
			$data['total_hit'] = $this->m_webportal->total_hit()->row();
			$data['online'] = $this->m_webportal->online();


//header
		$data['hari'] = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['tanggal'] = $this->idn_times->tgl_db(date('Y-m-d H:i:s'));
//sidebar
		$data['toppost'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['profilkami'] = $this->m_webportal->get_not_in_kontak('tb_profil', 6, 'master', null, null)->result();
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
				//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));

		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', $limit=null, $offset=null)->result();

//content
		$data['baca_event'] = $query->row_array();
		$data['lihatlain'] = $this->m_webportal->get_not_in_event('tb_event', 'id', 'date', 'master', 3, 0)->result();



		//monggo untuk actionnya
		if (isset($_POST['simpan'])) 
		{
			$path = $this->input->post('dir');

			$this->load->library('upload');

			$config['upload_path'] = './application/'.$path.'/';
			$config['allowed_types'] = '*'; 
			$config['max_size']  = '80000';
			$config['overwrite'] = TRUE;

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('nama')) 
			{
				$data['error_upload'] = $this->upload->display_errors();
			}

			else
			{
				$this->session->set_flashdata('success', '<div>Success upload</div>');
				redirect('web/eventlain','refresh');
			}
			
		}

		$this->load->view('admin/event/dataevent', $data);
	}

	public function produk()
	{
		$data['title'] = "Produk Kami";
//header
		$data['hari'] = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['tanggal'] = $this->idn_times->tgl_db(date('Y-m-d H:i:s'));
//sidebar
		$data['toppost'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['profilkami'] = $this->m_webportal->get_not_in_kontak('tb_profil', 6, 'master', null, null)->result();
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));

		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', $limit=null, $offset=null)->result();

//content
		$data['produk'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
		

		//statistik pengunjung

			$ip_address = $_SERVER['REMOTE_ADDR'];
			$browser = $_SERVER['HTTP_USER_AGENT'];
			$waktu = time();

			$cek_ip_address = $this->db->get_where('visitor', array('ip_address' => $ip_address, 'tanggal' => date('Y-m-d')), null, null);

			if ($cek_ip_address->num_rows() > 0)
			{
				$cari = $cek_ip_address->row();
				$counter = $cari->counter;

				$this->db->where('ip_address', $ip_address);
				$this->db->where('tanggal', date('Y-m-d'));
				$this->db->update('visitor', array('counter' => $counter+1, 'online' => $waktu));
			}
			else
			{
				$record = array(
									'id' => '',
									'ip_address' => $ip_address,
									'tanggal' => date('Y-m-d'),
									'counter' => 1,
									'browser' => $browser,
									'online' => $waktu
								);

				$this->db->insert('visitor', $record);
			}

			#get visitor
			$sekarang  = date('Y-m-d');
			$data['ip_address'] = $ip_address;
			$data['browser'] = $browser;
			$data['hari_ini'] = $this->m_webportal->hari_ini($sekarang);
			$data['bulan_ini'] = $this->m_webportal->bulan_ini();
			$data['hit_counter'] = $this->m_webportal->hit_counter($sekarang)->row();
			$data['total_hit'] = $this->m_webportal->total_hit()->row();
			$data['online'] = $this->m_webportal->online();

		$this->template->displayfront('web/produk', $data);

	}

	public function view_produk()
	{
		$id = $this->uri->segment(3);
		$data['title'] = str_replace('-', ' ', $this->uri->segment(4));

//header
		$data['hari'] = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['tanggal'] = $this->idn_times->tgl_db(date('Y-m-d H:i:s'));
//sidebar
		$data['toppost'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['profilkami'] = $this->m_webportal->get_not_in_kontak('tb_profil', 6, 'master', null, null)->result();
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
				//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));

		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

		//statistik pengunjung

			$ip_address = $_SERVER['REMOTE_ADDR'];
			$browser = $_SERVER['HTTP_USER_AGENT'];
			$waktu = time();

			$cek_ip_address = $this->db->get_where('visitor', array('ip_address' => $ip_address, 'tanggal' => date('Y-m-d')), null, null);

			if ($cek_ip_address->num_rows() > 0)
			{
				$cari = $cek_ip_address->row();
				$counter = $cari->counter;

				$this->db->where('ip_address', $ip_address);
				$this->db->where('tanggal', date('Y-m-d'));
				$this->db->update('visitor', array('counter' => $counter+1, 'online' => $waktu));
			}
			else
			{
				$record = array(
									'id' => '',
									'ip_address' => $ip_address,
									'tanggal' => date('Y-m-d'),
									'counter' => 1,
									'browser' => $browser,
									'online' => $waktu
								);

				$this->db->insert('visitor', $record);
			}

			#get visitor
			$sekarang  = date('Y-m-d');
			$data['ip_address'] = $ip_address;
			$data['browser'] = $browser;
			$data['hari_ini'] = $this->m_webportal->hari_ini($sekarang);
			$data['bulan_ini'] = $this->m_webportal->bulan_ini();
			$data['hit_counter'] = $this->m_webportal->hit_counter($sekarang)->row();
			$data['total_hit'] = $this->m_webportal->total_hit()->row();
			$data['online'] = $this->m_webportal->online();

//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', $limit=null, $offset=null)->result();

//content
		$data['view_produk'] = $this->m_webportal->get_id('tb_produk', 'id', $id)->row_array();
		$data['lihatlain'] = $this->m_webportal->get_not_in_event('tb_produk', 'nama', $this->uri->segment(4), 'master', 3, $offset=null)->result();
	
		$this->template->displayfront('web/view_produk', $data);
	}
}

/* End of file web.php */
/* Location: ./application/controllers/web.php */