<div id="add_media">
	<div class="panel panel-primary">
		<div class="panel-body">
			<form action="<?php echo site_url('media/uploadImg') ?>" method="POST" enctype="multipart/form-data">
				<div class="col-md-4">
					<p>Max. file 3 Mb.</p>
					<?php echo form_error('img') ?>
					<input type="file" name="img" class="form-control" />
				</div>
				<button class="btn btn-primary">Simpan</button>
				<a href="<?php echo site_url('media') ?>" class="btn btn-danger">Batal</a>
			</form>
		</div>
	</div>
</div>