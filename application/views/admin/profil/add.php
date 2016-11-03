<!-- Form tambah artikel -->
<div class="row">
	
	<?php  
		echo form_error('judul');
		echo form_error('isi');
		echo form_error('publish');
	?>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="col-lg-9">
			<label for="" class="cotrol-label">Judul :</label>
			<input type="text" name="nama" class="form-control" value="<?php echo $this->input->post('nama') ?>" autofocus>
			<br>
			<label for="" class="control-label">Isi : </label>
			<textarea name="isi" rows="20"><?php echo $this->input->post('isi') ?></textarea>
		</div>
		<div class="col-lg-3">
			<div class="panel panel-success">
				<div class="panel-heading">
					Publish ? 
				</div>
				<div class="panel-body">
					<?php  
						$status = array('y', 'n');
						for($i=0; $i < count($status); $i++) {
							$checked = ($this->input->post('publish')==$status[$i])?"checked":"";
							echo '<input type="radio" name="publish" value="'.$status[$i].'" '.$checked.'> '.ucwords($status[$i]).'<br />';
						}
					?>
				</div>
			</div><br>
			<div class="well well-sm">
				<button class="btn btn-primary btn-block">Simpan Artikel</button>
				<button type="reset" class="btn btn-danger btn-block">Bersihkan</button>
				<a href="<?php echo site_url('artikel/index') ?>" class="btn btn-warning btn-block">Batalkan</a>
			</div>
		</div>
	</form>
</div>

<script>
	$(function(){
			//delay
			$(".delay").delay(5000).hide(500);
	});	
</script>