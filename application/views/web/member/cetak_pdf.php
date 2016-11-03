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


$pdf = new FPDF('P', 'mm', array(215, 330));

$pdf->SetTitle('Formulir Pendaftaran', 'isUTF-8');
$pdf->AddPage();
$pdf->SetMargins('25','15','10');


$pdf->SetFont('Times','','14');
$pdf->SetX(45);
$pdf->Cell(130,8,'FORMULIR PENDAFTARAN',0,0,'C');
$pdf->Ln();
$pdf->Cell(170,8,'ANGGOTA PRIMKOP CARAKA PRIMA SABHA',0,0,'C');

$jml = strlen($kode);


$pdf->SetFont('Times','','11');
$pdf->Ln(17);
$pdf->Cell(35,8,'No. Anggota',0,0);
$pdf->Cell(10,8,':',0,0,'C');

$pecah = str_split($kode);
foreach($pecah as $row=>$value){

	$pdf->Cell(5,8,$value,1,0,'C');
}

$pdf->Ln(10);

$pdf->Cell(35,6,'Nama Lengkap',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(160,6,$nama);
$pdf->Ln();

$pdf->Cell(35,6,'Nama Kecil',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(160,6,$namakecil);
$pdf->Ln();

$pdf->Cell(35,6,'Nomor KTP',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(160,6,$ktp);
$pdf->Ln();

$pdf->Cell(35,6,'Tempat Lahir',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(40,6,$tmptlahir);
$pdf->Cell(25,6,'Tanggal Lahir',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(40,6,date('d/m/Y', strtotime($tgllahir)));
$pdf->Ln();

$pdf->Cell(35,6,'HP',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(160,6,$hp);
$pdf->Ln();

$pdf->Cell(35,6,'Jenis Kelamin',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(160,6,$jenkel);
$pdf->Ln();

$pdf->Cell(35,6,'Email',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(160,6,$email);
$pdf->Ln();

$pdf->Cell(35,6,'Status Perkawinan',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(160,6,$status);
$pdf->Ln();

$pdf->Cell(35,6,'Nama Suami / Istri',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(160,6,$pasangan);
$pdf->Ln();

$pdf->Cell(35,6,'Agama',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(40,6,$agama);
$pdf->Cell(25,6,'Gol. Darah',0,0);
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(40,6,$goldar);
$pdf->Ln();

$pdf->Cell(35,6,'Pekerjaan',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(160,6,$pekerjaan);
$pdf->Ln();

$pdf->Cell(35,6,'Nama Ayah Kandung',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(160,6,$ayah);
$pdf->Ln();

$pdf->Cell(35,6,'Nama Ibu Kandung',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(160,6,$ibu);
$pdf->Ln();

$pdf->Cell(35,6,'Jenis SIM',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(40,6,$sim);
$pdf->Cell(25,6,'No. SIM',0,0);
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(40,6,$nosim);
$pdf->Ln();

$pdf->Cell(35,6,'Pendidikan Terakhir',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(160,6,$pendidikan);
$pdf->Ln();

$pdf->SetX(30);
$pdf->Cell(30,6,'a. Nama Lembaga',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(160,6,$lembaga);
$pdf->Ln();

$pdf->SetX(30);
$pdf->Cell(30,6,'b. Jurusan',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(160,6,$jurusan);
$pdf->Ln();

$pdf->SetX(30);
$pdf->Cell(30,6,'c. Tahun Masuk',0,0);
$pdf->Cell(10,6,':',0,0,'C');
$pdf->Cell(35,6,$tahunmasuk);
$pdf->Cell(25,6,'Tahun Keluar',0,0);
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(40,6,$tahunkeluar);
$pdf->Ln(10);

$pdf->Cell(20,6,'Alamat Domisili',0,0);
$pdf->Cell(40,6,':',0,0,'C');
$pdf->Cell(35,6,'Propinsi',0,0);
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(60,6,$propinsi);

$pdf->Ln();

$pdf->SetX(85);
$pdf->Cell(35,6,'Kabupaten/Kota',0,0);
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(60,6,ucwords(strtolower($namakota)));

$pdf->Ln();

$pdf->SetX(85);
$pdf->Cell(35,6,'Kecamatan',0,0);
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(60,6,ucwords(strtolower($kecamatan)));

$pdf->Ln();

$pdf->SetX(85);
$pdf->Cell(35,6,'Kelurahan/Desa',0,0);
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(60,6,ucwords(strtolower($kelurahan)));

$pdf->Ln();

$pdf->SetX(85);
$pdf->Cell(35,6,'Dukuh/Jalan',0,0);
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(60,6,$dukuh);

$pdf->Ln();

$pdf->SetX(85);
$pdf->Cell(10,6,'RT',0,0);
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(20,6,$rt);
$pdf->Cell(10,6,'RW',0,0);
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(20,6,$rw);
$pdf->Cell(15,6,'Kodepos',0,0);
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(40,6,$kodepos);

$pdf->Ln(7);

$pdf->Cell(35,6,'Alamat KTP',0,0);
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(160,6,$alamatktp,0,0);

$pdf->Ln();

$pdf->Cell(35,6,'Pas Foto',0,0);
$pdf->Ln();

$pdf->Image('img/upload/'.$ambil_data->foto,'25','208','35','50');

$pdf->SetX(70);
$pdf->Cell(5,6,'1.',0,0);
$pdf->MultiCell(112,6, 'Saya mengajukan permohonan menjadi anggota Koperasi Caraka Prima Sabha dan siap tunduk dengan peraturan yang sudah ditentukan dalam AD/ART dan peraturan lain yang diterbitkan oleh Dewan Pengawas.',0,'J');
$pdf->Ln(3);

$pdf->SetX(70);
$pdf->Cell(5,6,'2.',0,0);
$pdf->MultiCell(112,6, 'Saya menyatakan bahwa data pribadi yang saya isikan diatas adalah benar.',0,'J');
$pdf->Ln();

$pdf->SetY(265);
$pdf->SetX(132);
$pdf->Cell(50,6,ucwords(strtolower($namakota)).', '.$this->idn_times->tgl_db($ambil_data->input_date),0,0);
$pdf->Ln();
$pdf->Cell(55,6,'Koordinator Kecamatan',0,0,'C');
$pdf->Cell(55,6,'Koordinator Desa',0,0,'C');
$pdf->Cell(55,6,'Yang Mengajukan',0,0,'C');
$pdf->Ln(30);




//the output
$pdf->Output('Formulir_Pendaftaran_'.$kode.'.pdf','I');

?>