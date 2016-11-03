<?php  
			  $kode = $ambil_data->kode_ojek;
			  $nama = $ambil_data->nama_lengkap;
			  $namakecil = $ambil_data->nama_kecil;
			  $ktp = $ambil_data->no_ktp;
			  $tmptlahir = $ambil_data->tmp_lahir;
			  $tgllahir = $ambil_data->tgl_lahir;
			  $hp = $ambil_data->no_hape;
			  $jenkel = $ambil_data->jenkel;
			  $email = $ambil_data->email;
			  $status = $ambil_data->status_nikah;
			  $pasangan = $ambil_data->pasangan;
			  $agama = $ambil_data->agama;
			  $goldar = $ambil_data->goldar;
			  $ayah = $ambil_data->ayah_kandung;
			  $ibu = $ambil_data->ibu_kandung;
			  $sim = $ambil_data->jenis_sim;
			  $nosim = $ambil_data->no_sim;
			  $pendidikan = $ambil_data->pendidikan;
			  $lembaga = $ambil_data->lembaga;
			  $jurusan = $ambil_data->jurusan;
			  $tahunmasuk = $ambil_data->tahun_masuk;
			  $tahunkeluar = $ambil_data->tahun_lulus;
			  $propinsi = $ambil_data->nama_prop;
			  $namakota = $ambil_data->nama_kota;
			  $kecamatan = $ambil_data->nama_kecamatan;
			  $kelurahan = $ambil_data->nama_kelurahan;
			  $dukuh = $ambil_data->dukuh;
			  $rt = $ambil_data->rt;
			  $rw = $ambil_data->rw;
			  $kodepos = $ambil_data->kodepos;
			  $alamatktp = $ambil_data->alamat_ktp;
			  $pekerjaan = $ambil_data->pekerjaan;

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Cetak Formulir Pendaftaran</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/cetak.css">
		<script type="text/javascript">
			function printWindow(){
	  			 bV = parseInt(navigator.appVersion)
	   				if (bV >= 4) window.print();
			}
		</script>	
	</head>
	<body onload="printWindow()">
		<!--<div class="title">
			PRIMKOP TJAKRA SURYA NUSANTARA<br>
			Jl. HOS. Tjokroaminoto<br>
			Ciledug, Tangerang-Banten <br>
		</div>-->
		<div class="content">
			<h3  style="text-align:center;">FORMULIR PENDAFTARAN<br>
ANGGOTA PRIMKOP CARAKA PRIMA SABHA
</h3>
      <table border="0" cellpadding="4" width="100%" style="text-transform:camelize;">
          <tr>
            <td><b>NO. Anggota</b></td>
            <td>:</td>
            <td colspan="4">
            <?php 
           
            /*$prop = substr($kode,0,2);
            $kota = substr($kode,2,2);
            $kec = substr($kode,4,2);
            $kel = substr($kode,6,4);
            $idangg = substr($kode,10,4);*/
            ?>
            <table border="1" cellpadding="3" style="border-collapse:collapse;">
             <tr>
              <!--<th><?php echo $prop;?></th>
              <th><?php echo $kota;?></th>
              <th><?php echo $kec;?></th>
              <th><?php echo $kel;?></th>
              <th><?php echo $idangg;?></th>-->

              <?php
               $pecah = str_split($kode);

               foreach($pecah as $row=>$value):
                echo '<th>'.$value.'</th>';
                endforeach;
              ?>
             </tr>
            </table>
            </td>
          </tr>
          
          <tr>
            <td>Nama Anggota</td>
            <td>:</td>
            <td colspan="4">
           	<?php echo $nama;?>
            </td>
          </tr>
          <tr>
            <td>Nama Kecil</td>
            <td>:</td>
            <td colspan="4">
           	<?php echo $namakecil;?>
            </td>
          </tr>
          <tr>
            <td>Tempat Lahir</td>
            <td>:</td>
            <td>
           	<?php echo $tmptlahir;?>
            </td>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td>
            <?php echo date($tgllahir, strtotime($tgllahir));?>
            </td>
          </tr>
           <tr>
            <td>No. HP</td>
            <td>:</td>
            <td colspan="4">
            <?php echo $hp;?>
            </td>
          </tr>
           <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td colspan="4">
            <?php echo $jenkel;?>
            </td>
          </tr>
           <tr>
            <td>Email</td>
            <td>:</td>
            <td colspan="4">
            <?php echo $namakecil;?>
            </td>
          </tr>
           <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td colspan="4">
            <?php echo $status;?>
            </td>
          </tr>
          <tr>
            <td>Nama Suami/Istri</td>
            <td>:</td>
            <td colspan="4">
            <?php echo $pasangan;?>
            </td>
          </tr>
          <tr>
            <td>Agama</td>
            <td>:</td>
            <td>
            <?php echo ucwords($agama);?>
            </td>
            <td>Gol. Darah</td>
            <td>:</td>
            <td>
            <?php echo $goldar;?>
            </td>
          </tr>
          <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td colspan="4">
            <?php echo $pekerjaan;?>
            </td>
          </tr>
          <tr>
            <td>Nama Ayah Kandung</td>
            <td>:</td>
            <td colspan="4">
            <?php echo $ayah;?>
            </td>
          </tr>

          <tr>
            <td>Nama Ibu Kandung</td>
            <td>:</td>
            <td colspan="4">
            <?php echo $ibu;?>
            </td>
          </tr>

          <tr>
           <td>Jenis SIM</td>
            <td>:</td>
            <td>
            <?php echo $sim;?>
            </td>
            <td>No. SIM</td>
            <td>:</td>
            <td>
            <?php echo $nosim;?>
            </td>
          </tr>
           <tr>
            <td>Pendidikan Terakhir</td>
            <td>:</td>
            <td colspan="4">
            <?php echo $pendidikan;?>
            </td>
          </tr>
          <tr>
            <td>&nbsp;a. Nama Lembaga</td>
            <td>:</td>
            <td colspan="4">
            <?php echo $lembaga;?>
            </td>
          </tr>
          <tr>
            <td>&nbsp;b. Jurusan</td>
            <td>:</td>
            <td colspan="4">
            <?php echo $jurusan;?>
            </td>
          </tr>
          <tr>
           <td>&nbsp;c. Tahun Masuk</td>
            <td>:</td>
            <td>
            <?php echo $tahunmasuk;?>
            </td>
            <td>Tahun Keluar</td>
            <td>:</td>
            <td>
            <?php echo $tahunkeluar;?>
            </td>
          </tr>
          <tr valign="top">
            <td>Alamat Domisili</td>
            <td>:</td>
            <td colspan="4">
              <table cellpadding="3" border="0" width="100%">
                <tr>
                  <td>Propinsi</td>
                  <td>:</td>
                  <td><?php echo ucwords($propinsi);?></td>
                </tr>
                <tr>
                  <td width="15%">Kabupaten/Kota</td>
                  <td width="1%">:</td>
                  <td width="45%"><?php echo ucwords($namakota);?></td>
                </tr>
                <tr>
                  <td width="15%">Kecamatan</td>
                  <td width="1%">:</td>
                  <td width="45%"><?php echo ucwords($kecamatan);?></td>
                </tr>
                <tr>
                  <td width="15%">Kelurahan</td>
                  <td width="1%">:</td>
                  <td width="45%"><?php echo ucwords($kelurahan);?></td>
                </tr>
              </table>
              <table cellpadding="3" border="0" width="100%">
                <tr>
                  <td>RT</td>
                  <td>:</td>
                  <td><?php echo $rt;?></td>
                  <td>RW</td>
                  <td>:</td>
                  <td><?php echo $rw;?></td>
                  <td>Kodepos</td>
                  <td>:</td>
                  <td><?php echo $kodepos;?></td>
                </tr>
                </table>
            </td>
          </tr>

          <tr>
            <td>Alamat KTP</td>
            <td>:</td>
            <td colspan="4">
            <?php echo $alamatktp;?>
            </td>
          </tr>

          <tr valign="top">
            <td colspan="6">Pas Foto
            </td>
          </tr>  
          <tr valign="top">
            <td colspan="6">

              <table border="0" width="100%">
                <tr valign="top">
                  <td width="30%">
                    <img src="<?php echo  base_url('img/upload/'.$ambil_data->foto) ?>" width="105" height="140">
                  </td>
                  <td width="70%">
                    <ol style="margin-top:-15px;">
                     <li><p align="justify">Saya mengajukan permohonan menjadi anggota Koperasi Caraka Prima Sabha dan siap tunduk dengan peraturan yang sudah ditentukan dalam AD/ART dan peraturan lain yang diterbitkan oleh Dewan Pengawas</p></li>
                    <li>
                    <p align="justify">Saya menyatakan bahwa data pribadi yang saya isikan diatas adalah benar.</p>
                    </li>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="6" align="right">
             
            </td>
          </tr>

      </table>

      <table width="100%">
       <tr>
          <td width="30%">
            &nbsp;
          </td>
          <td width="30%">
            &nbsp;
          </td>
          <td width="30%">
             <span style="text-transform:capitalize;"><?php echo strtolower($namakota);?></span>, <?php echo $this->idn_times->tgl_db($ambil_data->input_date)?>
          </td>
        </tr>
        <tr>
          <td width="30%">
            Koordinator Kecamatan
          </td>
          <td width="30%">
            Koordinator Desa
          </td>
          <td width="30%">
            Yang Mengajukan
          </td>
        </tr>
      </table>
		</div>
		<form action="" method="post">
          <input name="rtsubmit" id="irtubmit" value="" onclick="printWindow()" style="border: 0px solid rgb(0, 0, 0); background-color: rgb(255, 255, 255);" type="submit" />
        </form>
	</body>
</html>
<script type="text/javascript">
document.onkeydown = function(e){
if (e.keyCode==27){//--ESC--
	self.close();
	}
else if (e.keyCode==13){//--Tombol ENTER--
	 document.forms[0].rtsubmit.click();
	}
}
</script>