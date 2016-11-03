<div id="tambah">
	<div class="panel panel-primary">
		<div class="panel-body">
			<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Caption :</label>
					<div class="col-md-4">
						<input type="text" name="caption" class="form-control" autofocus>
						<?php echo form_error('caption') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Image :</label>
					<div class="col-md-4">
						<input type="file" name="img" class="form-control" required>
						<p> Max. size 3Mb</p>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-3 control-label"></label>
					<div class="col-md-4">
						<button class="btn btn-primary">Simpan</button>
						<a href="<?php echo site_url('gallery') ?>" class="btn btn-danger">Batal</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>