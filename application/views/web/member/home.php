<div class="col col_12_of_12">
	<div class="panel panel-success">
		<div class="panel-heading">
			Selamat Datang di Menu Anggota
		</div>
		<div class="panel-body">
			<?php echo $this->session->flashdata('session_end'); ?>
			<ul>
				<li>Hai, <?php echo $this->session->userdata('member_nama'); ?></li>
				<p>- Halaman ini digunakan untuk mengelola akun anda. <br>
				- Silahkan klik tombol dibawah untuk download aplikasi anda.</p>
			</ul>
			<div align="center">
				<h1><a href="" class="btn btn_blue btn-lg"><i class="fa fa-download"></i> Download Aplikasinya disini</a></h1>
			</div>
		</div>
	</div>
</div>