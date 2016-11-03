<div class="panel panel-info">
	<div class="panel-heading">
		<i class="fa fa-edit"></i> Form Registrasi Anggota
	</div>
	<div class="panel-body">
		<div class="alert alert-info">Registrasi Berhasil! <br> Satu langkah lagi untuk menjadi anggota. Silahkan masukkan kode aktivasi yang telah dikirimkan melalui Email dan SMS.</div>
       
        <form action="<?php echo site_url();?>/member/aktivasi" method="post" name="frmReg" id="frmReg">
        <input  type="hidden" name="nia" value="<?php echo $this->session->userdata('nia');?>">
        <p><b>Masukkan Kode Aktivasi :</b></p>
        <input type="text" class="form-control" id="pasangkode" name="pasangkode" class="textfield" required autofocus/><br>
        
        <hr>
        <button type="submit" id="aktivasi" name="aktivasi" class="btn btn_green">
           <i class="glyphicon glyphicon-ok"></i> Aktifkan Akun
        </button>
	</div>
</div>