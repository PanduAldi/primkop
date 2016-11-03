<!-- JQuery set -->

<script>
	$(function(){

		//valid kawin
		$('#pasangan').attr('disabled', 'disabled');

		$('#kawin').change(function(){
			var kawin = $(this).val();

			if (kawin == 'Menikah') {
				$('#pasangan').attr({ 	
					'placeholder': 'Masukan nama pasangan'
				});
				$('#pasangan').removeAttr('disabled');
				$('#pasangan').focus();
			}
			else
			{
				$('#pasangan').attr({
					'disabled' : 'disabled',
					'placeholder': '',
				});
			}
		})

		//nomor hape validasi jika sudah ada
		$('#hp').blur(function(){
			var hp = $(this).val();

			$.ajax({
				url : "<?php echo site_url('member/cekhp') ?>",
				type : 'POST',
				data : 'hp='+hp,
				success : function(data){

					datanya = data.split("|");
					var cek = datanya[0];

					if (cek == 1) {
						$("#errorhp").html('Maaf No. HP yang anda masukan sudah terdaftar di sistem kami. Silahkan coba lagi');
						$("#hp").focus();
					}
					else
					{
						$("#errorhp").html('');
					}
				}
			})
		});

		// validasi email jika sudah dimasukan sistem
		$('#email').blur(function(){
			var email = $(this).val();

			$.ajax({
				url : "<?php echo site_url('member/cekemail') ?>",
				type : 'POST',
				data : 'email='+email,
				success : function(data){

					datanya = data.split("|");
					var cek = datanya[0];

					if (cek == 1) {
						$("#erroremail").html('Maaf email yang anda masukan sudah terdaftar di sistem kami. Silahkan coba lagi');
						$("#email").focus();
						
					}
					else
					{
						$("#erroremail").html('');
					}
				}
			})
		});

		//pilih kota
	});

	function pilkota()
	{
		$(function(){
			var prop = $("#propinsi").val();
			$("#tampilkota").html("Mencari data Kota ... ");
			$.ajax({
				url : "<?php echo site_url() ?>/member/tampilkota/"+prop,
				beforeSend : function(html){
					$("#tampilkota").html("Mencari data Kota ... ");
				},
				success : function(data){
					$("#tampilkota").html(data);
				}
			})	
		});	
	}

	function pilkec()
	{
		$(function(){
			var kota = $("#kota").val();

			$.ajax({
				url : "<?php echo site_url() ?>/member/tampilkecamatan/"+kota,
				beforeSend : function(html){
					$("#tampilkec").html("Mencari data Kecamatan ... ");
				},
				success : function(data){
					$("#tampilkec").html(data);
				}
			})
		});
	}

	function pilkel()
	{
		$(function(){
			var kec = $("#kecamatan").val();

			$.ajax({
				url : "<?php echo site_url() ?>/member/tampilkelurahan/"+kec,
				beforeSend : function(html){
					$("#tampilkel").html("Mecari data Kelurahan");
				},
				success : function(data){
					$("#tampilkel").html(data);
				}
			})
		});
	}
</script>

<!-- end -->

<div class="panel panel-info">
	<div class="panel-heading">
		<i class="fa fa-edit"></i> Form Registrasi Anggota
	</div>
	<div class="panel-body">
		<p>
			<strong class="text-danger">Perhatian Penting !</strong><br>
			Informasi keanggotaan yang anda isi harus benar agar anggota yang lain dapat menghubungi anda.
			<hr>
			<form action="<?php echo site_url('member/prosesregister') ?>" method="POST" name="daftar" id="daftar" class="form-horizontal">
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Nama Lengkap :</label>
					<div class="col-md-5">
						<input type="text" name="nama" class="form-control" required>
						<?php echo form_error('nama') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Nama Panggilan :</label>
					<div class="col-md-3">
						<input type="text" name="kecil" class="form-control" required>
						<?php echo form_error('kecil') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Jenis Kelamin :</label>
					<div class="col-md-3">
						<select name="jenkel" id="jenkel" class="form-control" required>
							<option value=""> -- Pilih Jenis_Kelamin --</option>
							<option value="L">Laki - laki</option>
							<option value="P">Perempuan</option>
						</select>
						<?php echo form_error('jenkel') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Status Perkawinan :</label>
					<div class="col-md-2">
			          <select name="kawin" id="kawin" class="form-control" required>
			              <option value="">-- Pilih --</option>
			              <option value="Lajang">Belum Menikah</option>
			              <option value="Menikah">Menikah</option>
			              <option value="Duda">Duda</option>
			              <option value="Janda">Janda</option>
			          </select>
			          <?php echo form_error('kawin') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Nama Pasangan :</label>
					<div class="col-md-4">
						<input type="text" id="pasangan" name="pasangan" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Tempat Lahir :</label>
					<div class="col-md-4">
						<input type="text" id="tempat" name="tempat" class="form-control" required />
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Tanggal Lahir :</label>
					<div class="col-md-9">
							<div class="row">
								<div class="col-md-2">
									<select name="tgl" id="tgl" class="form-control" required>
										<?php 
											for ($i=1; $i <= 31 ; $i++) { 
												echo '<option value="'.$i.'">'.$i.'</option>';
											}
										?>
									</select>
								</div>
								<div class="col-md-3">
									<select name="bln" id="bln" class="form-control" required>
										<?php  
											$arr_bln = array(
																'1' => 'Januari',
																'2' => 'Februari',
																'3' => 'Maret',
																'4' => 'April',
																'5' => 'Mei',
																'6' => 'Juni',
																'7' => 'Juli',
																'8' => 'Agustus',
																'9' => 'September',
																'10' => 'Oktober',
																'11' => 'November',
																'12' => 'Desember'
															);
											foreach ($arr_bln as $angka => $huruf) {
												echo '<option value="'.$angka.'">'.$huruf.'</option>';
											}
										?>
									</select>
								</div>
								<div class="col-md-3">
						          <select name="thn" id="thn" class="form-control" required>
						            <?php
						              for($i=1950;$i<=2020;$i++){
						                $selected = ($i == 1980)?'selected':'';
						                echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
						              }

						            ?>
						          </select>
								</div>
							</div>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Agama :</label>
					<div class="col-md-2">
			          <select name="agama" id="agama" class="form-control" requried>
			              <option value="">--Pilih--</option>
			              <option value="Islam">Islam</option>
			              <option value="Kristen">Kristen</option>
			              <option value="Katolik">Katolik</option>
			              <option value="Hindu">Hindu</option>
			              <option value="Konghucu">Konghucu</option>
			              <option value="Lainnya">Lainnya</option>
			          </select>
			          <?php echo form_error('agama') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Pekerjaan :</label>
					<div class="col-md-3">
						<input type="text" name="pekerjaan" id="pekerjaan" class="form-control">
						<?php echo form_error('pekerjaan') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Golongan Darah :</label>
					<div class="col-md-2">
				        <select name="goldar" id="goldar" class="form-control" required>
				          <option value="">--Pilih--</option>
				          <option value="A+">A+</option>
				          <option value="A-">A-</option>
				          <option value="B+">B+</option>
				          <option value="B-">B-</option>
				          <option value="AB+">AB+</option>
				          <option value="AB-">AB-</option>
				          <option value="O+">O+</option>
				          <option value="O-">O-</option>
				        </select>
				        <?php echo form_error('goldar') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Nama Ayah Kandung :</label>
					<div class="col-md-3">
						<input type="text" name="ayah" class="form-control" required>
						<?php echo form_error('ayah') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Nama Ibu Kandung :</label>
					<div class="col-md-3">
						<input type="text" name="ibu" class="form-control" required>
						<?php echo form_error('ibu') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Jenis SIM :</label>
					<div class="col-md-2">
						<select name="jensim" id="jensim" class="form-control">
			              <option value="">--Pilih--</option>
			              <option value="C">C</option>
			              <option value="A">A</option>
			              <option value="A-U">A Umum</option>
			              <option value="B1">B1</option>
			              <option value="B1-U">B1 Umum</option>
			              <option value="B2">B2</option>
			              <option value="B2-U">B2 Umum</option>
			              <option value="D">D</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">No. SIM :</label>
					<div class="col-md-4">
						<input type="text" name="sim" class="form-control" id="sim">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">No. KTP :</label>
					<div class="col-md-4">
						<input type="text" name="ktp" id="ktp" class="form-control" required>
						<?php echo form_error('ktp') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Propinsi :</label>
					<div class="col-md-3">
						<select name="propinsi" id="propinsi" class="form-control" onchange="pilkota()" required>
							<option value=""> -- Pilih --</option>
							<?php  
								foreach ($propinsi as $prop) {
									echo '<option value="'.$prop->kode_prop.'">'.$prop->nama_prop.'</option>';
								}
							?>
						</select>
						<?php echo form_error('propinsi') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Kabupaten / Kota :</label>
					<div class="col-md-3">
						<span id="tampilkota">
						<select name="kotapil" id="kotapil" class="form-control" />
							<option value="">-- Pilih --</option>
							<option value="">Jika kosong pilih dulu Propinsi</option>

						</select>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Kecamatan :</label>
					<div class="col-md-3" id="tampilkec">
						<select name="kecpil" id="kecpil" class="form-control">
							<option value=""> -- Pilih --</option>
							<option value=""> Jika kosong pilih dulu Kota / Kabupaten</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Kelurahan :</label>
					<div class="col-md-3" id="tampilkel">
						<select name="kelpil" id="kelpil" class="form-control">
							<option value=""> -- Pilih --</option>
							<option value="">Jika kosong pilih dulu Kecamatan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Dukuh / Jalan :</label>
					<div class="col-md-4">
						<input type="text" name="dukuh" id="dukuh" class="form-control" required>
						<?php echo form_error('dukuh') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">RT / RW :</label>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-3"><input type="text" name="rt" id="rt" class="form-control" placeholder="RT" required></div>
							<div class="col-md-3"><input type="text" name="rw" id="rw" class="form-control" placeholder="RW" required></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Kode Pos :</label>
					<div class="col-md-2">
						<input type="text" name="kodepos" id="kodepos" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Alamat KTP :</label>
					<div class="col-md-5">
						<textarea name="alamat_ktp" id="alamat_ktp" rows="4"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Jabatan :</label>
					<div class="col-md-3">
						<select name="jabatan" class="form-control" name="jabatan" id="jabatan" required>
			                <option value="">--Pilih Jabatan--</option>
			                <option value="anggota">Anggota</option>
			                <option value="korpus">Koordinator Pusat</option>
			                <option value="korda">Koordinator Daerah</option>
			                <option value="korwil">Koordinator Wilayah</option>
			                <option value="korcam">Koordinator Kecamatan</option>
			                <option value="kordes">Koordinator Desa</option>
			            </select>
			            <?php echo form_error('jabatan') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Pendidikan :</label>
					<div class="col-md-3">
			         <select id="sekolah" name="sekolah" class="form-control" required>
			            <option value="">--Pilih--</option>
			            <option value="Tidak / Belum Sekolah">Tidak / Belum Sekolah</option>
			            <option value="Tidak Tamat SD">Tidak Tamat SD</option>
			            <option value="SD/Sederajat">SD/Sederajat</option>
			            <option value="SMP/Sederajat">SMP/Sederajat</option>
			            <option value="SMA/Sederajat">SMA/Sederajat</option>
			            <option value="D1">D1</option>
			            <option value="D2">D2</option>
			            <option value="D3">D3</option>
			            <option value="D4">D4</option>
			            <option value="Strata 1">Strata 1</option>
			            <option value="Strata 2">Strata 2</option>
			            <option value="Strata 3">Strata 3</option>
			          </select>  
			          <?php echo form_error('sekolah') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Lembaga :</label>
					<div class="col-md-4">
						<input type="text" name="lembaga" id="lembaga" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Jurusan :</label>
					<div class="col-md-3">
						<input type="text" name="jurusan" id="jurusan" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Tahun Masuk :</label>
					<div class="col-md-2">
						<input type="text" name="masuk" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Tahun Keluar :</label>
					<div class="col-md-2">
						<input type="text" name="keluar" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Foto :</label>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-8"><input type="text" id="foto" name="foto" class="form-control" readonly="readonly" required></div>
							<div class="col-md-2"><?php echo anchor_popup('member/foto', 'Upload Foto', array('class'=>'btn btn_red'));?></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">No. HP :</label>
					<div class="col-md-4">
						<input type="text" name="hp" id="hp" class="form-control" placeholder="Contoh : 085693340555"  required>
						<div id="errorhp" class="text-danger"></div>
						<?php echo form_error('hp') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Email :</label>
					<div class="col-md-4">
						<input type="text" name="email" id="email" class="form-control" placeholder="Contoh : teamcaraka@gmail.com" required>
						<div id="erroremail" class="text-danger"></div>
						<?php echo form_error('email') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Password</label>
					<div class="col-md-5">
						<input type="password" name="password" id="password" class="form-control" required>
						<?php echo form_error('password') ?>
					</div>
				</div>
	</div>
	<div class="panel-footer">
		<button type="submit" onclick="return confirm('Apakah anda yakin dengan data yang anda tulis? Klik OK untuk melanjutkan!')" name="submit" id="submit" class="btn btn_blue"><i class="fa fa-group"></i> Daftar Anggota </button>
		</form>
	</div>

</div>