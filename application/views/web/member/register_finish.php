<div class="panel panel-info">
	<div class="panel-heading">
		<i class="fa fa-edit"></i> Form Registrasi Anggota
	</div>
	<div class="panel-body">
		<div class="alert alert-success">Registrasi Berhasil! <br> Selamat akun anda telah aktif silahkan ke halaman login untuk dapat menggunakan fitur yang tersedia.</div>
		
		<br>
        <a href="<?php echo site_url();?>/member/cetak/<?php echo $nia ?>" title="cetak" target="_blank" class="btn btn_green"> <i class="fa fa-print"></i> Cetak
        </a>&nbsp;
        <a href="<?php echo site_url();?>/member/cetakpdf/<?php echo $nia ?>" title="Download PDF" target="_blank" class="btn btn_blue">
          <i class="fa fa-file-pdf-o"></i> Save
        </a>&nbsp;
	</div>
</div>