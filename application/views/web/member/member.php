<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array(array('form_validation', 'email')));
		$this->load->model(array('m_webportal', 'safina_model'));
	
	}

	public function index()
	{
		redirect('web','refresh');	
	}	

	public function login()
	{
		//set usernnya dulu
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		//set_validasi
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Passoword', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() == true)
		{

			$cek = $this->safina_model->member_login($username, $password);

			if ($cek->num_rows() <> 0)
			{

				$member_aktif = 1;
				$cek_member = $this->safina_model->member_aktif($username, $password, $member_aktif);

				if ($cek_member == 0) 
				{
					$this->session->set_flashdata('error_login', '<div class="alert alert-danger"><i class="fa fa-ban"></i> Akun anda belum diaktifasi. Silahkan cek email anda untuk mengaktivasi akun Anda.</div>');
					redirect('web','refresh');					
				}
				else
				{

					$data = $cek->row();

					//set session
					$this->session->set_userdata('member_login', true);
					$this->session->set_userdata('member_username', $data->no_hape);
					$this->session->set_userdata('nohape', $data->no_hape);
					$this->session->set_userdata('member_nama', $data->nama_lengkap);
					$this->session->set_userdata('member_jabatan', $data->jabatan);
				
					redirect('anggota');
				}
			}
			else
			{
				$this->session->set_flashdata('error_login', '<div class="alert alert-danger"><i class="fa fa-ban"></i> User/Pass Salah</div>');
				redirect('web','refresh');
			}			
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		?>
			<script>
				alert("Logout success");
				location.href = "<?php echo site_url('web') ?>";
			</script>
		<?php
	}

	public function ganti_pass()
	{
		$data['title'] = "Lupa Pasword"; 

		if ($this->session->userdata('member_login') == false)
		{
			redirect('web','refresh');
		}

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
			$this->form_validation->set_rules('new', 'New Password', 'required|match[conf]');
			$this->form_validation->set_rules('conf', 'Password Konfirmasi', 'required');

			if ($this->form_validation->run() == true) 
			{
				if ($this->input->post('code') != $this->input->post('input')) 
				{
					$this->session->set_flashdata('tidak_cocok', '<div class="alert alert-danger">Securty Code yang Anda masukan salah. Coba kembali.</div>');
					redirect('member/ganti_pass','refresh');
				}
				else
				{

					$id_member = $this->safina_model->ambil_ojek_login($this->session->userdata('member_username'));

					$record  = array('password' => md5($this->input->post('new')));
					$this->safina_model->update_ojek($record, $id_member->kode_ojek);

					$this->session->set_flashdata('change_success', '<div class="alert alert-success"><i class="fa fa-check"></i> Password berhasil diganti</div>');
					redirect('member/ganti_pass','refresh');
				}
			}

		$data['captcha'] = $this->safina_model->generateCode(6);

		//show_website 
		$this->template->displayfront('web/member/ganti_pass', $data);

	}	

	public function lupa_password()
	{
		$data['title'] = "Lupa Password";

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

		//show_website 
		$this->template->displayfront('web/member/lupa_password', $data);

	}

	public function sendemail()
	{
		$id = $this->input->post('nohape');
		$now = date('Y-m-d H:i:s');
		$cek = $this->safina_model->ambil_ojek_user($id);

		if ($cek->num_rows() == 0)
		{
			$this->session->set_flashdata('belum_terdaftar', '<div class="alert alert-danger">Mohon maaf.. Username atau No. HP yang Anda Masukan belum terdaftar di sistem kami</div>');
			redirect('member/lupa_password','refresh');
		}
		else
		{
			//input token dulu
			$res = $cek->row();
			$token = md5($res->member_confirm_code." ".$now);

			$record = array('token_id' => $token);
			$this->safina_model->update_ojek($record, $res->kode_ojek);

			//kirim emailnya
			$config['wordwrap'] = TRUE;
			$this->email->initialize($config);

			$this->email->from('admin@primkop-caraka.co.id', 'Team Caraka Pusat');
			$this->email->to($res->email);
			$this->email->subject('Pemulihan Akun Anda');
			$text = 'Silahkan klik link dibawah ini untuk melakukan pemulihan akun anda :
			
			'.site_url().'/member/recoverakun/'.$token.'/'.$id.'


			Terima Kasih,
			Regrads,

			Team Caraka Pusat
				     ';

			$this->email->message($text);
			$this->email->send();

			#pesan setelah kirim
			$this->session->set_flashdata('email_success', '<div class="alert alert-success"><i class="fa fa-check"></i> Kami sudah mengirimkan email untuk melakukan proses penggantian password. Silahkan cek email anda.</div>');
			redirect('member/lupa_password','refresh');
		}
	}

	public function recoverakun()
	{
		$token = $this->uri->segment(3);
		$nope = $this->uri->segment(4);

		if (!$token || empty($token))
		{
			redirect('web','refresh');
		}
		else
		{
			$cek = $this->safina_model->cek_recover($token, $nope);

			if ($cek->num_rows() == 0)
			{
				?>
				<script>
					alert("Token has expired. Please try again!!");
					location.href = "<?php echo base_url() ?>";
				</script>
				<?php
			}
			else
			{
				$data = $cek->row();

				$this->session->set_userdata('member_login', true);
				$this->session->set_userdata('member_username', $data->no_hape);
				$this->session->set_userdata('nohape', $data->no_hape);
				$this->session->set_userdata('member_nama', $data->nama_lengkap);
				$this->session->set_userdata('member_jabatan', $data->jabatan);

				redirect('member/ganti_pass','refresh');
			}
		}
	}

	/**
	 * - Register / pendaftaran anggota
	 * - Fungsi untuk mencari propinsi, kota/kab, kecamatan, desa/kelurahan
	 */

	public function register()
	{

		$data['title'] = "Registrasi Anggota";

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
		$data['captcha'] = $this->safina_model->generateCode(6);
		$data['propinsi'] = $this->safina_model->tampil_propinsi();

		$this->template->displayfront('web/member/register', $data);

	}

	public function cekhp()
	{
		$id = $this->input->post('hp');
		$cek = $this->safina_model->cek_hp($id);

		if ($cek->num_rows() == 0)
		{
			echo "0|tidak ada";
		}
		else
		{
			echo "1|ada";
		}
	}

	public function cekemail()
	{
		$email = $this->input->post('email');
		$cek = $this->safina_model->cek_email($email);

		if ($cek->num_rows() == 0)
		{
			echo "0|tidak ada";
		}
		else
		{
			echo "1|ada";
		}
	}

	public function tampilkota($prop=null)
	{
		if (empty($prop) || $prop == null)
		{
			echo "data tidak ditemukan";
		}
		else
		{
			$ex = explode(".", $prop);
			$prop = $ex[0];
			$data = $this->safina_model->tampil_kota($prop);

			if (!empty($data))
			{
				echo '<select name="kota" id="kota" class="form-control" onchange="pilkec()">
						<option value=""> -- Pilih --</option>';
						foreach ($data as $d) {
							echo '<option value="'.$d->kode_kota.'">'.$d->nama_kota.'</option>';
						}
				echo '</select>';
			}
			else
			{
				echo "Data tidak ditemukan";
			}
		}
	}

	public function tampilkecamatan($kota=null)
	{
		if (empty($kota) || $kota == null)
		{
			echo "Tidak ada";
		}
		else
		{
			$ex = explode(".", $kota);
			$prop = $ex[0];
			$data  = $this->safina_model->tampil_kecamatan($prop, $kota);

			if (!empty($data))
			{
				echo '<select name="kecamatan" id="kecamatan" class="form-control" onchange="pilkel()">
						<option value=""> -- Pilih --</option>';
						foreach ($data as $d) {
							echo '<option value="'.$d->kode_kecamatan.'">'.$d->nama_kecamatan.'</option>';
						}
				echo '</select>';
			}
			else
			{
				echo "Data tidak ditemukan..";
			}
		}
	}

	public function tampilkelurahan($kec=null)
	{
		if (empty($kec) || $kec == null)
		{
			echo "Tidak ada..";
		}
		else
		{
			$ex = explode(".", $kec);
			$prop = $ex[0];
			$kota = $ex[1];

			$data = $this->safina_model->tampil_kelurahan($prop, $kota, $kec);
			
			if (!empty($data))
			{
				echo '<select name="kelurahan" id="kelurahan" class="form-control" >
						<option value=""> -- Pilih --</option>';
						foreach ($data as $d) {
							echo '<option value="'.$d->kode_kelurahan.'">'.$d->nama_kelurahan.'</option>';
						}
				echo '</select>';
			}
			else
			{
				echo "Data tidak ditemukan..";
			}
		}
	}

	public function foto()
	{
	    $data['error'] = '';

	    $this->load->view('web/member/foto', $data);
	}

	public function prosesupload()
	{
	    $config['upload_path'] = './img/upload/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['max_width'] = 1000;
	    $config['max_height'] = 1000;
	    $config['max_size'] = 5000;
	    $config['overwrite'] = TRUE;
	    $config['remove_spaces'] = TRUE;

	    $this->load->library('upload');
	    $this->upload->initialize($config); 
	    
	      $gambar = $this->input->post('gambar');

	      if($this->upload->do_upload('gambar')){

	        $dataimg = $this->upload->data();
	        $data['namafile'] = $dataimg['file_name'];

	        
	        $this->load->view('web/member/foto_sukses', $data);

	      }else{
	        $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');

	        $this->load->view('web/member/foto', $data);
	      }  
	}


	public function prosesregister()
	{

	            $this->load->library('fungsiku');

	            $nama = $this->input->post('nama');
	            $kecil = $this->input->post('kecil');
	            $tempat = $this->input->post('tempat');
	            $jenkel = $this->input->post('jenkel');
	            $tgl = $this->input->post('tgl');
	            $bln = $this->input->post('bln');
	            $thn = $this->input->post('thn');
	            $tgllahir = $thn."-".$bln."-".$tgl;
	            $agama = $this->input->post('agama');
	            $goldar = $this->input->post('goldar');
	            $ayah = $this->input->post('ayah');
	            $ibu = $this->input->post('ibu');
	            $hp = $this->input->post('hp');
	            $ktp = $this->input->post('ktp');
	            $email = $this->input->post('email');
	            $propinsi = $this->input->post('propinsi');
	            $kota = $this->input->post('kota');
	            $kecamatan = $this->input->post('kecamatan');
	            $kelurahan = $this->input->post('kelurahan');
	            $dukuh = $this->input->post('dukuh');
	            $rt = $this->input->post('rt');
	            $rw = $this->input->post('rw');
	            $kode_pos = $this->input->post('kodepos');
	            $alamat_ktp = $this->input->post('alamat_ktp');
	            $sekolah = $this->input->post('sekolah');
	            $lembaga = $this->input->post('lembaga');
	            $jurusan = $this->input->post('jurusan');
	            $masuk = $this->input->post('masuk');
	            $keluar = $this->input->post('keluar');
	            $foto = $this->input->post('foto');
	            $password = $this->input->post('password');


	            $kawin = $this->input->post('kawin');
	            $pasangan = $this->input->post('pasangan');
	            $pekerjaan = $this->input->post('pekerjaan');
	            $jensim = $this->input->post('jensim');
	            $sim = $this->input->post('sim');
	            $jabatan = $this->input->post('jabatan');

	            //pecah kode
	              $exprop = explode(".", $propinsi);
	              $kodeprop = $exprop[0];

	              $exkota = explode(".", $kota);
	              $kodekota = $exkota[1];

	              $exkec = explode(".", $kecamatan);
	              $kodekec = $exkec[2];

	              $exkel = explode(".", $kelurahan);
	              $kodekel = $exkel[3]; 

	            $kode = $this->fungsiku->gen_ojek_code('jek_ojek','kode_ojek', $kelurahan, $kodeprop, $kodekota, $kodekec, $kodekel);

	            $konfirm_kode = md5($kode);
	            $now = date('Y-m-d h:i:s');

	            $data = array(
	                  'nama_lengkap'=>$nama,
	                  'nama_kecil'=>$kecil,
	                  'tmp_lahir'=>$tempat,
	                  'tgl_lahir'=>$tgllahir,
	                  'jenkel'=>$jenkel,
	                  'goldar'=>$goldar,
	                  'agama'=>$agama,
	                  'ibu_kandung'=>$ibu,
	                  'ayah_kandung'=>$ayah,
	                  'no_hape'=>$hp,
	                  'no_ktp'=>$ktp,
	                  'email'=>$email,
	                  'propinsi'=>$propinsi,
	                  'kota'=>$kota,
	                  'kecamatan'=>$kecamatan,
	                  'kelurahan'=>$kelurahan,
	                  'dukuh'=>$dukuh,
	                  'rt'=>$rt,
	                  'rw'=>$rw,
	                  'kodepos' => $kode_pos,
	                  'alamat_ktp' => $alamat_ktp,
	                  'jabatan'=>$jabatan,
	                  'pendidikan'=>$sekolah,
	                  'lembaga'=>$lembaga,
	                  'jurusan'=>$jurusan,
	                  'tahun_lulus'=>$keluar,
	                  'tahun_masuk'=>$masuk,
	                  'status_nikah'=>$kawin,
	                  'pasangan'=>$pasangan,
	                  'pekerjaan'=>$pekerjaan,
	                  'jenis_sim'=>$jensim,
	                  'no_sim'=>$sim,
	                  'foto'=>$foto,
	                  'input_date'=>$now,
	                  'member_aktif'=>0,
	                  'kode_ojek'=>$kode,
	                  'password'=>md5($password)
	                  );
		          
		            $this->safina_model->simpan_ojek($data);

		            if($jabatan <> "anggota" || $jabatan <> "kordes"){

		            $data = array(
		                  'username'=> $hp,
		                  'password'=>md5($password),
		                  'nama_lengkap'=>$nama,
		                  'role'=>$jabatan,
		                  'status'=>1,
		                  'foto'=>$foto);

		            $this->safina_model->simpan_pengguna($data);

		        	}  

			        $this->session->set_userdata('nia', $kode);
			        $this->session->set_userdata('nohape', $hp);
			        $this->session->set_userdata('jabatan',$jabatan);

			        redirect('member/step2/');
	}

	public function step2()
	{

		$data['title'] = "Langkah kedua";

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
		$data['nia'] = $this->session->userdata('nia');
		$data['nohape'] = $this->session->userdata('nohape');
		$data['jabatan'] = $this->session->userdata('jabatan');

		//show website
		$this->template->displayfront('web/member/register_step2', $data);

		if (isset($_POST['submit']))
		{
            $kordes = $this->input->post('kordes');
            $korcam = $this->input->post('korcam');
            $korwil = $this->input->post('korwil');
            $korda = $this->input->post('korda');
            $korpus = $this->input->post('korpus');
            $jabatan = $this->session->userdata('jabatan');
            $bpkkop = $this->input->post('bpkkop');
            $bpkbangsa = $this->input->post('bpkbangsa');

                  if($jabatan == "anggota"){
                              
                              $sqlkordes = $this->safina_model->cek_koor($kordes, 'kordes');
                              
                              $sqlkorcam = $this->safina_model->cek_koor($korcam, 'korcam');
                              
                              
                              if($sqlkordes == 0){
                               
                                ?>
                                <script>
                                 alert('Maaf nama KORDES yang anda maksud tidak tersedia. Silahkan coba lagi...');
                                 history.go(-1);
                                </script>  
                               <?php
                              } elseif($sqlkorcam == 0){
                                 ?>
                                <script>
                                 alert('Maaf nama KORCAM yang anda maksud tidak tersedia. Silahkan coba lagi...');
                                 history.go(-1);
                                </script>  
                                <?php
                              }else{
                               
                                redirect('member/finishreg');
                              }

                        }elseif($jabatan == "kordes" ){

                              $sqlkorcam = $this->safina_model->cek_koor($korcam, 'korcam');
                              
                              $sqlkorwil = $this->safina_model->cek_koor($korwil, 'korwil');
                              
                              //$cek = @mysql_num_rows($query);
                              
                              
                              if($sqlkorcam == 0){
                               
                                ?>
                                <script>
                                 alert('Maaf nama KORCAM yang anda maksud tidak tersedia. Silahkan coba lagi...');
                                 history.go(-1);
                                </script>  
                               <?php
                              } else if($sqlkorwil == 0){
                                 ?>
                                <script>
                                 alert('Maaf nama KORWIL yang anda maksud tidak tersedia. Silahkan coba lagi...');
                                 history.go(-1);
                                </script>  
                                <?php
                              }else{
                                redirect('member/finishreg');
                              }

                        }elseif($jabatan == "korcam"){


                              $sqlkorwil = $this->safina_model->cek_koor($korwil, 'korwil');
                              
                              $sqlkorda = $this->safina_model->cek_koor($korda, 'korda');
                              
                              //$cek = @mysql_num_rows($query);
                              
                              
                              if($sqlkorwil == 0){
                              
                                ?>
                                <script>
                                 alert('Maaf nama KORWIL yang anda maksud tidak tersedia. Silahkan coba lagi...');
                                 history.go(-1);
                                </script>  
                               <?php
                              } else if(mysql_num_rows($sqlkorda) == 0){
                                 ?>
                                <script>
                                 alert('Maaf nama KORCDA yang anda maksud tidak tersedia. Silahkan coba lagi...');
                                 history.go(-1);
                                </script>  
                                <?php
                              }else{
                               
                                redirect('member/finishreg');
                              }
                              

                        }elseif($jabatan == "korwil"){

                              $sqlkorda = $this->safina_model->cek_koor($korda, 'korda');
                              
                              $sqlkorpus = $this->safina_model->cek_koor($korpus, 'korpus');
                              
                              //$cek = @mysql_num_rows($query);
                              
                              
                              if(mysql_num_rows($sqlkorda) == 0){
                               
                                ?>
                                <script>
                                 alert('Maaf nama KORDA yang anda maksud tidak tersedia. Silahkan coba lagi...');
                                 history.go(-1);
                                </script>  
                               <?php
                              } elseif(mysql_num_rows($sqlkorpus) == 0){
                                 ?>
                                <script>
                                 alert('Maaf nama KORPUS yang anda maksud tidak tersedia. Silahkan coba lagi... <?php echo $korpus;?>');
                                 history.go(-1);
                                </script>  
                                <?php
                              }else{
                                 redirect('member/finishreg');
                              }


                        }elseif($jabatan == "korda"){

                              /*$sqlkorpus = @mysql_query("SELECT * FROM jek_ojek WHERE nama_lengkap = '$korpus'") or die(mysql_error());
                              
                              //$cek = @mysql_num_rows($query);
                              
                              
                              if(mysql_num_rows($sqlkorpus) == 0){
                                 ?>
                                <script>
                                 alert('Maaf nama KORPUS yang anda maksud tidak tersedia. Silahkan coba lagi... <?php echo $korpus;?>');
                                 history.go(-1);
                                </script>  
                                <?php
                              }else{
                                $_SESSION['kode'] = $xcode; 
                                $_SESSION['jabatan'] = $jabatan;
                                header("Location:?tjakra=finishreg");
                              }*/
                              
                              if($bpkkop <> "HOS Tjokroaminoto"){
                               
                                ?>
                                <script>
                                 alert('Maaf nama BAPAK KOPERASI salah. Silahkan coba lagi...');
                                 history.go(-1);
                                </script>  
                               <?php
                              } elseif($bpkbangsa <> "HOS Tjokroaminoto"){
                                 ?>
                                <script>
                                 alert('Maaf nama BAPAK BANGSA salah. Silahkan coba lagi...');
                                 history.go(-1);
                                </script>  
                                <?php
                              }else{
                               redirect('member/finishreg');
                              }


                        }elseif($jabatan=="korpus"){

                              if($bpkkop <> "HOS Tjokroaminoto"){
                               
                                ?>
                                <script>
                                 alert('Maaf nama BAPAK KOPERASI salah. Silahkan coba lagi...');
                                 history.go(-1);
                                </script>  
                               <?php
                              } elseif($bpkbangsa <> "HOS Tjokroaminoto"){
                                 ?>
                                <script>
                                 alert('Maaf nama BAPAK BANGSA salah. Silahkan coba lagi...');
                                 history.go(-1);
                                </script>  
                                <?php
                              }else{
                                redirect('member/finishreg');
                              }
                              

                  		}
        }
	}

	public function finishreg()
	{
		$data['title'] = "Aktivasi Anggota";

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

		//show website
		$this->template->displayfront('web/member/register_aktivasi', $data);



		// kirim kode aktivasi ke email dan SMS
			$this->load->library('fungsiku');

			$nia = $this->session->userdata('nia');
			$now = date("Y-m-d H:i:s");
			$kombinasi = $nia."".$now;
			$kodeaktiv = $this->fungsiku->activation_code(md5($kombinasi), 6);

			// input kode aktivasinya
			$record = array('member_confirm_code' => $kodeaktiv); 
			$this->safina_model->update_ojek($record, $nia);

			$ojek = $this->safina_model->ambil_ojek($nia);

			$nama = $ojek->nama_lengkap;
			$email = $ojek->email;
			$aktivasi = $kodeaktiv;
			$nohape = $ojek->no_hape;

			// kirim email
			$config['wordwrap'] = TRUE;
			$this->email->initialize($config);

			$this->email->from('admin@primkop-caraka.co.id', 'Team Caraka Pusat');
			$this->email->to($email);
			$this->email->subject('Aktivasi Akun');
			$text = "Selamat Bergabung $nama,
			
			Berikut data registrasi anda : 
			NIA  : $nia
			Nama Lengkap : $nama
			Alamat email : $email
			HP / Telp : $nohape
			Kode Aktivasi : $aktivasi

			Masukan kode aktivasi tersebut untuk mengaktifkan akun anda.

			Terima Kasih,
			Regrads


			Team Caraka Pusat";

			$this->email->message($text);
			$this->email->send();

	}

	// ini ketika user klik tomol submit di form aktivasi
	public function aktivasi()
	{
		$data['title'] = "Registrasi Selesai";

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

		//konfirmasi aktivasi
		$nia = $this->input->post('nia');
		$kodeaktivasi = $this->input->post('pasangkode');

		$query = $this->safina_model->cek_aktivasi($nia, $kodeaktivasi);

		if ($query == 1)
		{
			$update_ojek = array('member_aktif' => 1);
			$this->safina_model->update_ojek($update_ojek, $nia);
			$data['nia'] = $nia;

			$this->template->displayfront('web/member/register_finish', $data);
		}
		else
		{
                ?>
                <script type="text/javascript">
                  alert('Maaf kode aktivasi salah. Silahkan coba lagi.');
                  history.go(-1);
                </script>
                <?php				
		}
	}

	public function cetak()
	{
		$nia = $this->uri->segment(3);

		$cek_query = $this->safina_model->cetak($nia);

		
			$data['ambil_data'] = $cek_query->row();

			//tampilkan
			$this->load->view('web/member/cetak', $data);
		
	}

	/**
	 * End register 
	 */
}

/* End of file  */
/* Location: ./application/controllers/ */