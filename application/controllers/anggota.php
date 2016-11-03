<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation', 'email'));
		$this->load->model(array('safina_model', 'm_webportal'));
		$this->load->helper('email');

		if ($this->session->userdata('member_login') == false){
			$this->session->set_flashdata('session_end', '<div class="alert alert-danger">Ada Harus Login Terlebih Dahulu</div>');
			redirect('web','refresh');	
		}

	}

	public function index()
	{
		$data['title'] = "Beranda";

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
		$data['profilkami'] = $this->m_webportal->get_not_in_kontak('tb_profil', 6, 'master', null, null)->result();
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
		//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

		//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', $limit=null, $offset=null)->result();


		//show website 
		$this->template->displayfront('web/member/home', $data);
	}

	public function detail_anggota()
	{
		$id = $this->session->userdata('member_username');
		$data['title'] = "Detail Anggota";

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
		$data['profilkami'] = $this->m_webportal->get_not_in_kontak('tb_profil', 6, 'master', null, null)->result();
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
		//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

		//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', $limit=null, $offset=null)->result();
	

		//content
      	$data['profil'] = $this->safina_model->ambil_ojek_login($this->session->userdata('member_username'));	
	
      	//show website
      	$this->template->displayfront('web/member/detail_anggota', $data);
	}


	public function inbox()
	{
		$id = $this->session->userdata('member_username');
		$data['title'] = "Inbox";

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
		$data['profilkami'] = $this->m_webportal->get_not_in_kontak('tb_profil', 6, 'master', null, null)->result();
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
		
		//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

		//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', $limit=null, $offset=null)->result();

		// ini contentnya
		$query = $this->safina_model->ambil_pesan($id);
		$data['inbox'] = $query->result();
		$data['cek_inbox'] = $query->num_rows();

		$db3 = $this->load->database('db3', TRUE);
		$data['total'] = $db3->query("SELECT COUNT(id_pesan) AS total FROM pesan WHERE receiver='$id'")->row();

		//show websiteas
		$this->template->displayfront('web/member/inbox', $data);

	}

	public function lihatpesan()
	{
		$id = $this->uri->segment(3);
		$data['title'] = "Lihat pesan";

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
		$data['profilkami'] = $this->m_webportal->get_not_in_kontak('tb_profil', 6, 'master', null, null)->result();
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
		//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

		//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', $limit=null, $offset=null)->result();

		//content
		$data['lihatpesan'] = $this->safina_model->baca_pesan($id);

		//update baca
		$this->safina_model->update_baca(array('read' => 1), $id);

		$this->template->displayfront('web/member/lihat_pesan', $data);

	}

	public function kirimpesan()
	{
		$data['title'] = "Lihat pesan";

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
		$data['profilkami'] = $this->m_webportal->get_not_in_kontak('tb_profil', 6, 'master', null, null)->result();
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
		//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

		//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', $limit=null, $offset=null)->result();

		//content
		$data['pengirim'] = $this->session->userdata('member_username');

		$this->template->displayfront('web/member/kirim_pesan', $data);		



		// jika pesan di klik
		$this->form_validation->set_rules('pengirim', 'pengirim', 'required');
		$this->form_validation->set_rules('penerima', 'penerima', 'required');
		$this->form_validation->set_rules('subject', 'subject', 'required');
		$this->form_validation->set_rules('pesan', 'pesan', 'required');
		
		if ($this->form_validation->run() == true)
		{

			$jml = $this->safina_model->tampil_pesan();
			$no = $jml->num_rows();
			$kdpsn = $no + 1;
			$kodepsn = str_pad($kdpsn,5,"0", STR_PAD_LEFT);

			$record = array(
								'id_pesan' => $kodepsn,
								'date_sent' => date("d M Y h:i"),
								'sender' => $this->input->post('pengirim'),
								'receiver' => $this->input->post('penerima'),
								'subject' => $this->input->post('subject'),
								'pesan' => $this->input->post('pesan'),
								'read' => 0
							);

			$this->safina_model->kirim_pesan($record);
			$this->session->set_flashdata('terkirim', '<div class="alert alert-success"><i class="fa fa-check"></i> Pesan anda telah terkirim</div>');
			redirect('anggota/inbox','refresh');
		}
		else
		{
			$this->session->set_flashdata('wajib', '<div class="alert alert-danger">Semua form wajib di isi.</div>');
		}
			
	}
 
	public function balaspesan()
	{
		$id = $this->uri->segment(3);
		$data['title'] = "Balas Pesan";
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
		$data['profilkami'] = $this->m_webportal->get_not_in_kontak('tb_profil', 6, 'master', null, null)->result();
		$data['produkkami'] = $this->m_webportal->get_desc('tb_produk', 'id', 'master', null, null)->result();
		//menentukan piket
		$sekarang = $this->idn_times->hari_indo(date('Y-m-d H:i:s'));
		$data['manager_info'] = $this->m_webportal->get_id('tb_manager', 'piket', $sekarang)->row_array();

		//footer side
		$data['toppost_footer'] = $this->db->query("SELECT * FROM tb_artikel WHERE subdomain = 'master' ORDER BY hit DESC LIMIT 3")->result();
		$data['event_footer'] = $this->m_webportal->get_headline('tb_event', 'date', 'master', $limit=null, $offset=null)->result();

		//content
		$data['pengirim'] = $this->session->userdata('member_username');
		$data['pesan'] = $this->safina_model->baca_pesan($id);

		$this->template->displayfront('web/member/balas_pesan', $data);	

		// jika pesan di klik
		$this->form_validation->set_rules('pengirim', 'pengirim', 'required');
		$this->form_validation->set_rules('penerima', 'penerima', 'required');
		$this->form_validation->set_rules('subject', 'subject', 'required');
		$this->form_validation->set_rules('pesan', 'pesan', 'required');
		
		if ($this->form_validation->run() == true)
		{

			$jml = $this->safina_model->tampil_pesan();
			$no = $jml->num_rows();
			$kdpsn = $no + 1;
			$kodepsn = str_pad($kdpsn,5,"0", STR_PAD_LEFT);

			$record = array(
								'id_pesan' => $kodepsn,
								'date_sent' => date("d M Y h:i"),
								'sender' => $this->input->post('pengirim'),
								'receiver' => $this->input->post('penerima'),
								'subject' => $this->input->post('subject'),
								'pesan' => $this->input->post('pesan'),
								'read' => 0
							);

			$this->safina_model->kirim_pesan($record);
			$this->session->set_flashdata('terkirim', '<div class="alert alert-success"><i class="fa fa-check"></i> Balas pesan sukses...</div>');
			redirect('anggota/inbox','refresh');
		}
		else
		{
			$this->session->set_flashdata('wajib', '<div class="alert alert-danger">Semua form wajib di isi.</div>');
		}

	}

	public function deletepesan()
	{
		$id = $this->uri->segment(3);

		$this->safina_model->hapus_pesan($id);
		$this->session->set_flashdata('delete', '<div class="alert alert-danger"><i class="fa fa-check"></i> Hapus pesan sukses .. </div>');
		redirect('anggota/inbox','refresh');
	}

	public function cek_penerima()
	{
		$penerima = $this->input->post('penerima');

		$cek = $this->safina_model->cek_hp($penerima);
		
		if ($cek->num_rows() == 0) {
			echo "0|zonk";
		}
		else
		{
			echo "1|ada";
		}
	}

}

/* End of file anggota.php */
/* Location: ./application/controllers/anggota.php */