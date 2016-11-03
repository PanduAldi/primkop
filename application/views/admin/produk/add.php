<!-- Form tambah artikel -->


<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Add Produk</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Media</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    	

		<div class="row">	
			<?php  
				echo form_error('nama');
				echo form_error('deskrpsi');
				echo $error_image;
				echo $error_resize;
			?>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="col-lg-9">
					<label for="" class="cotrol-label">Nama Produk :</label>
					<input type="text" name="nama" class="form-control" value="<?php echo $this->input->post('nama') ?>" autofocus>
					<br>
					<label for="" class="control-label">Intro :</label>
					<input type="text" name="intro" class="form-control" value="<?php echo $this->input->post('intro') ?>">
					<br>
					<label for="" class="control-label">Deskripsi Produk : </label>
					<textarea name="deskripsi" rows="20"><?php echo $this->input->post('deskripsi') ?></textarea>
				</div>
				<div class="col-lg-3">
					<div class="upload">
						<label for="" class="control-label">Image Produk : </label>
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