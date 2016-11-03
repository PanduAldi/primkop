<!-- Form tambah artikel -->
<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Add Article</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Media</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    	

		<div class="row">	
			<?php  
				echo form_error('judul');
				echo form_error('isi');
				echo form_error('status');
				echo $error_gambar;
				echo $error_resize;
			?>
			<div class="alert-delay">
				<?php echo $this->session->flashdata('required_img'); ?>
			</div>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="col-lg-9">
					<label for="" class="cotrol-label">Judul Artikel :</label>
					<input type="text" name="judul" class="form-control" value="<?php echo $this->input->post('judul') ?>" autofocus>
					<br>
					<label for="" class="control-label">Deskripsi Singkat :</label>
					<input type="text" name="intro" class="form-control" value="<?php echo $this->input->post('intro') ?>"> 
					<br>
					<label for="" class="control-label">Isi : </label>
					<textarea name="isi" rows="20"><?php echo $this->input->post('isi') ?></textarea>
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
									$checked = ($this->input->post('publish')==$status[$i])?"checked":"";
									echo '<input type="radio" name="publish" value="'.$status[$i].'" '.$checked.'> '.ucwords($status[$i]).'<br />';
								}
							?>
						</div>
					</div>
					<div class="panel panel-info">
						<div class="panel-heading">
							Penulis
						</div>
						<div class="panel-body">
							<p>Pilih penulis :</p>
							<select name="penulis" multiple class="form-control" required>
								<?php  
									foreach ($penulis as $p) {
										?>
										<option value="<?php echo $p->kd_penulis.'-'.$p->nama ?>"><?php echo ucwords($p->kd_penulis.'-'.$p->nama) ?></option>
										<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="upload">
						<label for="" class="control-label">img : </label>
						<input type="file" name="img" class="form-control" />
					</div><br>
					<div class="well well-sm">
						<button class="btn btn-primary btn-block">Simpan Artikel</button>
						<button type="reset" class="btn btn-danger btn-block">Bersihkan</button>
						<a href="<?php echo site_url('artikel/index') ?>" class="btn btn-warning btn-block">Batalkan</a>
					</div>
				</div>
			</form>
		</div>

    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
		<div class="table-responsive">
			<table class="table table-bordered" id="datatable">
				<thead>
					<th>No</th>
					<th>Media File</th>
					<th>Path</th>
				</thead>
				<tbody>
					<?php  
						$no = 1;
						foreach ($media as $m) {
							?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td width="300">
									<img src="<?php echo base_url('img/media/'.$m->media_file) ?>" width="200" height="100" alt=""><br>
								</td>
								<td><?php echo $m->path ?></td>
							</tr>
							<?php
						}
					?>
				</tbody>
			</table>
		</div>
    </div>
  </div>

</div>


<script>
	$(function(){
			//delay
			$(".alert-delay").delay(5000).hide(500);
	});	
</script>