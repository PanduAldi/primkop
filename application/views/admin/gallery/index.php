<div id="artikel">
	<div class="delay_alert">
		<?php  
			echo $this->session->flashdata('add_success');
			echo $this->session->flashdata('update_success');
			echo $this->session->flashdata('delete_success');
		?>
	</div>
	<div class="well well-sm">
		<a href="<?php echo site_url('gallery/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Gallery</a>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered" id="datatable">
			<thead>
				<th>No</th>
				<th>Nama Gallery</th>
				<th>Thumbnail</th>
				<th>#</th>
			</thead>
			<tbody>
				<?php  
					$no = 1;
					foreach ($gallery as $g) {
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td width="350">
								<?php echo $g->nama ?><br>
							</td>
							<td><img src="<?php echo base_url('img/thumb/'.$g->thumb) ?>" width="150" height="100" alt="thumbnail"></td>
							<td width="300">
								<a href="<?php echo site_url('gallery/det_gallery/'.$g->id_gallery) ?>" class="btn btn-success"><i class="fa fa-search"></i> View Gallery</a>
								<a href="<?php echo site_url('gallery/update/'.$g->id_gallery) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
								<a href="#" class="btn btn-danger hapus" kode="<?php echo $g->id_gallery ?>">Hapus</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>

<script>
	$(function(){
		$(".delay_alert").delay(1000).fadeOut(500);

		//delete data
		$('.hapus').click(function(){
			var kode = $(this).attr('kode');
			$("#idhapus").val(kode);
			$("#modal-delete").modal('show');
		});

		$("#konfirmasi").click(function(){
			var kode = $("#idhapus").val();

			$.ajax({
				url : "<?php echo site_url('gallery/delete') ?>",
				type : "POST",
				data : "id="+kode,
				cache : false,
				success : function(html){
					location.reload();
				}
			})
		});

	})
</script>