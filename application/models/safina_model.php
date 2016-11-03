<?php
if(!defined('BASEPATH')) exit ('Ga boleh diakses langsung');

class Safina_model extends CI_Model{

      public function __construct(){
      parent::__construct();


      }
   /*
   @@ Main Function for Safina Model
   @@
   */   
      public function getData($table,$order,$paramorder,$num,$offset){
      $this->db->order_by($order,$paramorder);
      $query = $this->db->get($table,$num,$offset);
      return $query->result();
      }
      
      public function getEdit($table,$where,$param){
      $query = $this->db->get_where($table,array($where=>$param));
      return $query->row_array();
      }
      
      public function getDetail($table,$where,$param){
      $query = $this->db->get_where($table,array($where=>$param));
      return $query->row_array();
      }
      
      public function saveData($table,$data){
      $this->db->insert($table,$data);
      }
      
      
      public function saveEdit($table,$where,$data,$id){
      $this->db->where($where,$id);
      $this->db->update($table,$data);
      }
      
      public function deleteData($table,$where,$id){
      $this->db->where($where,$id);
      $this->db->delete($table);
      }
      
      public function searchData($pencarian,$katakunci,$order,$param,$table){
      $this->db->like($pencarian,$katakunci);
      $this->db->orderby($order,$param);
      $query = $this->db->get($table);
      return $query->result();
      }
      
      public function showOption($table){
      $query = $this->db->get($table);
      return $query->result();
      }
      
      /*
   @@ Additional Function for Safina Model
   @@ if you want to add function for safina model put the code is here.....
   */
   
      public function getSingledata($table,$order,$param){
      $this->db->order_by($order,$param);
      $query = $this->db->get($table);
      return $query->result();
      }
      
      function bersihin( $name ) { // Like sanitize_title, but with periods
		  $name = strtolower( $name );
		  $name = preg_replace("/&.+?;'/", "", $name); // kill entities
		  $name = str_replace( "_", "-", $name );
		  $name = preg_replace("/[^a-z0-9\s-]/", "", $name);
		  $name = preg_replace("/\s+/", "-", $name);
		  $name = preg_replace("|-+|", "-", $name);
		  $name = trim($name, "_");
		  return $name;
      }
      
      public function getDatawhere($table,$where,$value,$order,$param,$num,$offset){
      $this->db->where($where,$value);
      $this->db->order_by($order,$param);
      $query = $this->db->get($table,$num,$offset);
      return $query->result();
      }
      
      public function getPoling(){
      $this->db->order_by('no','DESC');
      $query = $this->db->get('quest');
      return $query->row_array();
      }
      
      public function listpol($num,$offset){
      $query = $this->db->query("SELECT quest.*, poll.* FROM quest, poll WHERE poll.id = quest.no");
      $this->db->limit($num,$offset);
      $this->db->order_by('quest.no','DESC');
      return $query->result();
      }
      
      public function getBanner($lokasi){
      $this->db->where('publish','1');
      $this->db->where('lokasi',$lokasi);
      $this->db->order_by('id','DESC');
      $query = $this->db->get('sam_advert');
      return $query->row_array();
      }


      //get berita
      function getNews($table,$order,$param,$where,$key,$num,$offset){
		  $this->db->order_by($order,$param);
		  $this->db->where($where,$key);
		  $this->db->limit($num,$offset);
		  $query = $this->db->get($table);
		  return $query->result();
		  }
		
		  function getNewsAll($table,$order,$param,$num,$offset){
		  $this->db->order_by($order,$param);
		  $query = $this->db->get($table,$num,$offset);
		  return $query->result();
		  }
		  
		  
		  //get component
		  function getMenu(){
		  $this->db->order_by('id','ASC');
		  $this->db->where('publish','1');
		  $query = $this->db->get('sam_page');
		  return $query->result();
		  }
		  
		  function getBanner1($table,$where,$key,$order,$param){
		  $this->db->where($where,$key);
		  $this->db->where('publish','1');
		  $this->db->order_by($order,$param);
		  $query = $this->db->get($table);
		  return $query->row_array();
		  }
		  
		  //get jumlah dalam kategori
		  function jumlahDalamkategori($id){
      $query = $this->db->query("SELECT iklan_produk.*, iklan_kategori.* FROM iklan_produk,iklan_kategori WHERE iklan_produk.produk_kategori = iklan_kategori.iklan_kat_id AND iklan_kat_id = '$id'");
      return $query->num_rows();
      }
      
      function jumlahDalamparent($id){
      $query = $this->db->query("SELECT iklan_produk.*, iklan_kategori.* FROM iklan_produk,iklan_kategori WHERE iklan_produk.produk_kategori = iklan_kategori.iklan_kat_id AND iklan_kat_parent = '$id'");
      return $query->num_rows();
      }
      
      
      //get perusahaan
      function getPerusahaan($id){
      $query = $this->db->query("SELECT iklan_perusahaan.*, iklan_kategori.* FROM iklan_perusahaan,iklan_kategori WHERE iklan_perusahaan.usaha_kategori=iklan_kategori.iklan_kat_id AND iklan_perusahaan.usaha_username='$id'");
      return $query->row_array();
      }
	  
	  function loadPerusahaan($num,$offset){
	  //$this->db->limit($num,$offset);
	  $this->db->order_by('usaha_id','DESC');
	  $this->db->limit($num,$offset);
      $query = $this->db->query("SELECT iklan_perusahaan.*, iklan_kategori.* FROM iklan_perusahaan,iklan_kategori WHERE iklan_perusahaan.usaha_kategori=iklan_kategori.iklan_kat_id");
      return $query->result();
      }
	  
	  
	  //getProduk
	  function getProduk($num,$offset)
	  {
	  $this->db->limit($num,$offset);
	  $this->db->order_by('iklan_produk.produk_id','DESC');
	  $query = $this->db->query("SELECT iklan_produk.*, iklan_kategori.* FROM iklan_produk,iklan_kategori WHERE iklan_produk.produk_kategori = iklan_kategori.iklan_kat_id");
	  return $query->result();
	  }
      
	  //get produk per kategori
	  function getprodukkategori($id,$num,$offset){
	  $query = $this->db->query("SELECT iklan_produk.*, iklan_kategori.* FROM iklan_produk,iklan_kategori WHERE iklan_produk.produk_kategori = iklan_kategori.iklan_kat_id AND iklan_kategori.iklan_kat_id = '$id' ORDER BY iklan_produk.produk_id DESC");
	  $this->db->limit($num,$offset);
	  return $query->result();
	  }
      
      //get komentar
      function getComment($id,$num,$offset){
		  $this->db->order_by('id','DESC');
		  $this->db->limit($num,$offset);
		  $query = $this->db->get_where('sam_komen',array('post_id' =>$id));
		  return $query->result();
		  }
	
	//get templateperuser
	function getTemplateuser($username){
	$query = $this->db->query("SELECT iklan_setting_member.*, iklan_template.* FROM iklan_setting_member,iklan_template WHERE iklan_setting_member.template = iklan_template.template_name AND iklan_setting_member.username = '$username'");
	return $query->row_array();
	}
	
	//get inbox per user
	function getinbox($username){
	$db3 = $this->load->database('db3', TRUE);
      $query = $db3->query("SELECT pesan.*, iklan_anggota.* FROM pesan,iklan_anggota WHERE pesan.receiver = iklan_anggota.member_username AND pesan.receiver = '$username'");
	return $query->result();
	}
	
	//get sender
	function getsender($sender)
	{
      $db3 = $this->load->database('db3', TRUE);
	$query = $this->db->query("SELECT pesan.*, iklan_anggota.* FROM pesan,iklan_anggota WHERE iklan_anggota.username = pesan.sender ");
	}
	
		  
		  
		  //generate code for security code
		  function generateCode($characters) {
      /* list all possible characters, similar looking characters and vowels have been removed */
      $possible = '123456789abcdfghjkmnpqrstvwxyz';
      $code = '';
      $i = 0;
      while ($i < $characters) {
      $code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
      $i++;
      }
      return $code;
      }
      
      
      //memformat no hape
      function hp($nohp)
      {
 $nohp = str_replace(" ","",$nohp);
 // kadang ada penulisan no hp 0811 239 345
 $nohp = str_replace("(","",$nohp);
 // kadang ada penulisan no hp (0274) 778787
 $nohp = str_replace(")","",$nohp);
 // kadang ada penulisan no hp (0274) 778787
 $nohp = str_replace(".","",$nohp);
 // kadang ada penulisan no hp 0811.239.345

 if(!preg_match('/[^+0-9]/',trim($nohp)))
 // cek apakah no hp mengandung karakter + dan 0-9
 {
 if(substr(trim($nohp), 0, 3)=='+62')
 // cek apakah no hp karakter 1-3 adalah +62
 {
 $hp = trim($nohp);
 }
 elseif(substr(trim($nohp), 0, 1)=='0')
 // cek apakah no hp karakter 1 adalah 0
 {
 $hp = '+62'.substr(trim($nohp), 1);
 }
 // fungsi trim() untuk menghilangan
 // spasi yang ada didepan/belakang
 }
 else
 {
 $hp = 'Format no hp yang dimasukkan tidak lengkap atau salah!';
 }
 print $hp;
 }
 
 
 function rupiah($uang)
        {
	       $rupiah="";
	       $panjang = strlen($uang);
	        while($panjang > 3)
	       {
		     $rupiah = "." . substr($uang,-3) . $rupiah;
		     $lebar=strlen($uang)-3;
		     $uang = substr($uang,0,$lebar);
		     $panjang = strlen($uang);
	       }
	       $rupiah = "Rp ".$uang.$rupiah.",-";
	       return $rupiah;
        }

function cleanp($data){
$clean = str_replace("<p>","",$data);
$clean = str_replace("</p>","",$data);
$clean = htmlspecialchars($clean);

return $clean;
}


function tampil_propinsi()
{
      $db2 = $this->load->database('db2', TRUE);
      $db2->order_by('kode_prop','ASC');
      $query = $db2->get('jek_propinsi');

      return $query->result();
}


      function tampil_kota($prop=null)
      {
            $db2 = $this->load->database('db2', TRUE);
            if($prop <> null){
                  $db2->where('prop_id', $prop);
            }

            $db2->order_by('nama_kota','ASC');
            $query = $db2->get('jek_kota');

            return $query->result();
      }


      function tampil_kecamatan($prop=null, $kota=null)
      {
            $db2 = $this->load->database('db2', TRUE);
            
            $exkota = explode(".", $kota);
            $db2->where('prop_id', $prop);
            $db2->where('kota_id', $exkota[1]);
      
            
            
            $db2->order_by('nama_kecamatan','ASC');
            $query = $db2->get('jek_kecamatan');

            return $query->result();
      }


      function tampil_kelurahan($prop=null, $kota=null, $kec=null)
      {
            $db2 = $this->load->database('db2', TRUE);
            $exkec = explode(".", $kec);
            $db2->where('prop_id', $exkec[0]);
            $db2->where('kota_id', $exkec[1]);
            $db2->where('kec_id', $exkec[2]);
            
            
            $db2->order_by('nama_kelurahan','ASC');
            $query = $db2->get('jek_kelurahan');

            return $query->result();
      }


      function simpan_ojek($data)
      {
             $db2 = $this->load->database('db2', TRUE);
             $db2->insert('jek_ojek', $data);
      }

      function update_ojek($data, $id)
      {
             $db2 = $this->load->database('db2', TRUE);
             $db2->where('kode_ojek', $id);
             $db2->update('jek_ojek', $data);
      }

      function update_ojek_login($data, $id)
      {
            $db2 = $this->load->database('db2', TRUE);
            $db2->where('no_hape', $id);
            $db2->update('jek_ojek', $data);  
      }


      function ambil_ojek($id)
      {
            $db2 = $this->load->database('db2', TRUE);
            $query = $db2->get_where('jek_ojek',array('kode_ojek'=> $id));

            return $query->row();
      }


      function ambil_ojek_login($id)
      {
            $db2 = $this->load->database('db2', TRUE);
            $query = $db2->get_where('jek_ojek',array('no_hape'=> $id));

            return $query->row();
            $db2->close();
      }


      function ambil_ojek_user($id)
      {
            $db2 = $this->load->database('db2', TRUE);
            $query = $db2->get_where('jek_ojek',array('no_hape'=> $id));

            return $query;
      }



      function cek_aktivasi($nia, $aktivasi)
      {
            $db2 = $this->load->database('db2', TRUE);
            $query = $db2->get_where('jek_ojek',array('kode_ojek'=> $nia, 'member_confirm_code'=>$aktivasi));

            return $query->num_rows();
      }



      function cek_recover($token, $nope)
      {

            $db2 = $this->load->database('db2', TRUE);
            $query = $db2->get_where('jek_ojek',array('no_hape'=> $nope, 'token_id'=>$token));

            return $query;

      }


      function simpan_pengguna($data)
      {
             $db2 = $this->load->database('db2', TRUE);
             $db2->insert('jek_users', $data);
      }


      function cek_koor($nama, $jabatan)
      {
             $db2 = $this->load->database('db2', TRUE);
             $query = $db2->get_where('jek_ojek', array('nama_lengkap'=>$nama, 'jabatan'=>$jabatan));

            return $query->num_rows();
      }


      function cek_email($email)
      {
            $db2 = $this->load->database('db2', TRUE);
            $query = $db2->get_where('jek_ojek', array('email'=>$email));

            return $query;
      }


      function cek_hp($hp)
      {
            $db2 = $this->load->database('db2', TRUE);
            $query = $db2->get_where('jek_ojek', array('no_hape'=>$hp));

            return $query;
      }


      function member_login($username, $password)
      {
            $db2 = $this->load->database('db2', TRUE);
            $query = $db2->get_where('jek_ojek', array('no_hape'=>$username, 'password'=>md5($password)));

            return $query;
      }

      public function member_aktif($username, $password, $aktif)
      {
            $db2 = $this->load->database('db2', TRUE);
            $db2->where('no_hape', $username);
            $db2->where('password', md5($password));
            $db2->where('member_aktif', $aktif);
            return $db2->get('jek_ojek')->num_rows();
      }

      public function ambil_pesan($penerima)
      {
            $db3 = $this->load->database('db3', TRUE);
            $db3->order_by('id_pesan', 'desc');
            $db3->where('receiver', $penerima);

            return $db3->get('pesan');
      }

      public function kirim_pesan($record)
      {
            $db3 = $this->load->database('db3', TRUE);
            $db3->insert('pesan', $record);
      }

      public function baca_pesan($pengirim)
      {
            $db3 = $this->load->database('db3', TRUE);
            return $db3->get_where('pesan', array('id_pesan' => $pengirim))->row();
      }

      public function tampil_pesan()
      {
            $db3 = $this->load->database('db3', TRUE);
            return $db3->get('pesan');
      }



      public function update_baca($data, $id_pesan)
      {
            $db3 = $this->load->database('db3', TRUE);
            $db3->where('id_pesan', $id_pesan);
            return $db3->update('pesan', $data);
      }

      public function hapus_pesan($id)
      {
            $db3 = $this->load->database('db3', TRUE);
            $db3->where('id_pesan', $id);
            return $db3->delete('pesan');
      }

      public function cetak($kode)
      {
            $db2 = $this->load->database('db2', TRUE);
           
            $db2->select('jek_ojek.*, jek_propinsi.nama_prop, jek_kota.nama_kota, jek_kecamatan.nama_kecamatan, jek_kelurahan.nama_kelurahan');
            $db2->from('jek_ojek');
            $db2->join('jek_propinsi', 'jek_propinsi.kode_prop = jek_ojek.propinsi', 'left');
            $db2->join('jek_kota', 'jek_kota.kode_kota = jek_ojek.kota', 'left');
            $db2->join('jek_kecamatan', 'jek_kecamatan.kode_kecamatan = jek_ojek.kecamatan', 'left');
            $db2->join('jek_kelurahan', 'jek_kelurahan.kode_kelurahan = jek_ojek.kelurahan', 'left');
            $db2->where('jek_ojek.kode_ojek', $kode);

            return $db2->get();
      }
//end of class


}

?>
