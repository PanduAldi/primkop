<!-- Form tambah artikel -->
<div class="row">
	<?php 
		echo form_error('judul');
	echo form_error('isi');
		echo form_error('status');
	?>

	<form action="" method="POST" enctype="multipart/form-data">
		<input type="hidden" value="<?php echo $artikel['id_artikel'] ?>" name="id_artikel">
		<div class="col-lg-9">
			<label for="" class="cotrol-label">Judul Artikel</label>
			<input type="text" name="judul" class="form-control" value="<?php echo $artikel['judul'] ?>" autofocus>
			<br>
			<label for="" class="control-label">Deskripsi Singkat :</label>
			<input type="text" name="intro" class="form-control" value="<?php echo $artikel['intro'] ?>">
			<br>
			<label for="" class="control-label">Artikel</label>
			<textarea name="isi" rows="20"><?php echo $artikel['isi'] ?></textarea>
		</div>
		<div class="col-lg-3">
			<div class="panel panel-success">
				<div class="panel-heading">
					Status Posting
				</div>
				<div class="panel-body">
					<?php  
						$status = array('y', 'n');
						for($i=0; $i < count($status); $i++) {
							$checked = ($artikel['publish']==$status[$i])?"checked":"";
							echo '<input type="radio" name="publish" value="'.$status[$i].'" '.$checked.'> '.ucwords($status[$i]).'<br />';
						}
					?>
				</div>
			</div>
			<div class="upload">
				<label for="" class="control-label">Gambar : </label>
				<input type="file" name="img" class="form-control" /><br>
				<img src="<?php echo base_url('img/artikel/'.$artikel['img']); ?>" alt="gambar" width="250" height="200">
			</div><br>
			<div class="well well-sm">
				<button class="btn btn-primary btn-block">Simpan Artikel</button>
				<button type="reset" class="btn btn-danger btn-block">Bersihkan</button>
				<a href="<?php echo site_url('artikel/index') ?>" class="btn btn-warning btn-block">Batalkan</a>
			</div>
		</div>
	</form>
</div>