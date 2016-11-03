<div id="det_gallery">
	<div class="panel panel-primary">
		<div class="panel-body">
			<legend>Gallery <?php echo $gallery['nama'] ?></legend>
			<a href="<?php echo site_url('gallery/add_det_gallery/'.$gallery['id_gallery']) ?>" class="btn btn-success">Add image</a>
			<a href="<?php echo site_url('gallery') ?>" class="btn btn-primary btn-small pull-right"><i class="fa fa-angle-double-left"></i> Kembali</a>
			<div class="alert-delay">
				<?php  
					echo $this->session->flashdata('add_success');
					echo $this->session->flashdata('delete_success');
				?>
			</div>
			<br><br>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Image</th>
							<th>Caption</th>
							<th>
								#
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($det_gallery as $dg): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td width="300"><img src="<?php echo base_url('img/gallery/'.$dg->img) ?>" class="img-rounded" width="200" height="200" alt=""></td>
								<td><?php echo $dg->caption ?></td>
								<td><a href="#" class="btn btn-danger hapus" kode="<?php echo $dg->id ?>"><i class="fa fa-trash"></i> Hapus</a></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$(function(){
		$(".hapus").click(function(){
			var kode = $(this).attr('kode');
			$("#idhapus").val(kode);
			$("#modal-delete").modal('show');
		});

		$("#konfirmasi").click(function(){
			var kode = $("#idhapus").val();

			$.ajax({
				url : "<?php echo site_url('gallery/delete_gallery') ?>",
				type : "POST",
				data : "id="+kode,
				cache : false,
				success : function(html){
					location.reload();
				}
			});
		});

		$(".alert-delay").delay(2000).fadeOut(500);
	})
</script>