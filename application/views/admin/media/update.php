<div id="add_media">
	<div class="panel panel-primary">
		<div class="panel-body">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="col-md-4">
					<p>Max. file 3 Mb.</p>
					<?php echo form_error('img') ?>
					<input type="file" name="img" class="form-control" /><br>
					<div class="preview">
						<img src="<?php echo base_url('img/media/'.$media['media_file']) ?>" class="img-rounded" alt="">
					</div>
				</div>
				<button class="btn btn-primary" name="edit">Simpan</button>
				<a href="<?php echo site_url('media') ?>" class="btn btn-danger">Batal</a>
			</form>
		</div>
	</div>
</div>