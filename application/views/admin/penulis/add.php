<div id="add">
	<div class="panel panel-primary">
		<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Kode Penulis :</label>
						<div class="col-md-2">
							<input type="text" name="kd_penulis" class="form-control">
							<?php echo form_error('kd_penulis') ?>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Nama :</label>
						<div class="col-md-5">
							<input type="text" name="nama" class="form-control">
							<?php echo form_error('nama') ?>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Email :</label>
						<div class="col-md-3">
							<input type="text" name="email" class="form-control">
						</div>
						<?php echo form_error('email') ?>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-3 control-label"></label>
						<div class="col-md-4">
							<button class="btn btn-primary">Simpan</button>
							<a href="<?php echo site_url('penulis') ?>" class="btn btn-danger">Batal</a>
						</div>
					</div>
				</form>
		</div>
	</div>
</div>