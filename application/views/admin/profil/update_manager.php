<div class="panel panel-primary">
	<div class="panel-body">
		<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label for="" class="col-md-3 control-label">NIA :</label>
				<div class="col-md-3">
					<input type="text" name="nia" class="form-control" value="" />
					<?php echo form_error('nia') ?>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-3 control-label">Nama :</label>
				<div class="col-md-5">
					<input type="text" name="nama" class="form-control" />
					<?php echo form_error('nama') ?>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-3 control-label">Posisi Manager :</label>
				<div class="col-md-3">
					<select name="subdomain" class="form-control">
						<option value="">-- Pilih Posisi Tersedia -- </option>
						<?php foreach ($manager_choice as $manage): ?>
							<option value="<?php echo $manage->subdomain ?>"><?php echo $manage->subdomain ?></option>
						<?php endforeach ?>
					</select>
					<?php echo form_error('subdomain') ?>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-3 control-label">Hari Piket :</label>
				<div class="col-md-2">
					<select name="piket" class="form-control">
						<option value=""> --- jadwal piket -- </option>
						<?php  
							$hari = array('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu');
							for ($i=0; $i < count($hari) ; $i++) 
							{ 
								echo '<option value="'.$hari[$i].'">'.$hari[$i].'</option>';
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-3 control-label">Photo :</label>
				<div class="col-md-3">
					<input type="file" name="img" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-3 control-label"></label>
				<div class="col-md-3">
					<button class="btn btn-primary">Simpan</button>
					<a href="<?php echo site_url('manager') ?>" class="btn btn-danger">Batal</a>
				</div>
			</div>				
		</form>		
	</div>
</div>