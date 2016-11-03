<div class="col col_12_of_12">
	<div class="panel panel-info">
		<div class="panel-heading">
			Ganti Password Anggota
		</div>
		<div class="panel-body">
			<div class="alert_delay">
				<?php  
					echo $this->session->flashdata('change_success');
					echo $this->session->flashdata('tidak_cocok');
				?>
			</div>
			<form action="" method="post" class="form-horizontal">
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Password Baru :</label>
					<div class="col-md-4">
						<input type="password" name="new" class="form-control">
						<?php echo form_error('new') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Konfirmasi Password :</label>
					<div class="col-md-4">
						<input type="password" name="conf" class="form-control">
						<?php echo form_error('conf') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Security Code :</label>
					<div class="col-md-4">
						<div style="background:#D6DE55;font-family:Tahoma;font-size:12px;font-weight:bold;padding:3px;overflow:auto;width:75px;text-align:center;"><?php echo $captcha ?></div>
						<input type="hidden" name="code" value="<?php echo $captcha ?>">  
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label"></label>
					<div class="col-md-3">
						<input type="text" name="input" class="form-control">
						<div>Security Code harus di isi</div>
					</div>
				</div>
				<div class="form_group">
					<label for="" class="col-md-3 control-label"></label>
					<div class="col-md-3">
						<button class="btn btn_green" id="simpan">Simpan Password</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Jquery Code -->
<script>
	
	$(function(){

		//delay
		$('.alert_delay').delay(3000).fadeOut(500);

		//loading
		$('#simpan').click(function(){
			$(this).html('<i class="fa fa-spinner fa-spin"></i> Tunggu ... ');
		});
	})

</script>