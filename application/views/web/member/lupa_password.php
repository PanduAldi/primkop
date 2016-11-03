<div class="col col_12_of_12">
	<div class="panel panel-success">
		<div class="panel-heading">
			<i class="fa fa-key"></i> Form Pemulihan Akun
		</div>
		<div class="panel-body">
			<?php 
				echo $this->session->flashdata('belum_terdaftar');
				echo $this->session->flashdata('email_success');
			?>
			<strong>Kami akan mengirimkan Pemulihan Akun ke Email anda. Anda dapat juga langsung menghubungi admin website di admin@primkop-caraka.co.id</strong>
			<hr>
			<form action="<?php echo site_url('member/sendemail') ?>" method="POST">
				<!-- 
				<div class="form-group">
					<label for="" class="col-md-4 control-label">Masukan Username anda / No. HP :</label>
					<div class="col-md-4">
						
					</div>
				</div>
				 -->
				<p><input type="text" name="nohape" class="form-control" placeholder="Masukan Username anda / No. HP"></p>
				<p><button class="btn btn_green">Kirim Email Pemulihan</button></p>
			</form>
		</div>
	</div>
</div>