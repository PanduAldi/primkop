<div id="artikel">
	<div class="delay_alert">
		<?php  
			echo $this->session->flashdata('add_success');
			echo $this->session->flashdata('update_success');
			echo $this->session->flashdata('delete_success');
		?>
	</div>
	<div class="well well-sm">
		<a href="<?php echo site_url('media/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add media</a>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered" id="datatable">
			<thead>
				<th>No</th>
				<th>Media File</th>
				<th>Path</th>
				<th>Date</th>
				<th>#</th>
			</thead>
			<tbody>
				<?php  
					$no = 1;
					foreach ($media as $m) {
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td>
								<?php echo $m->media_file ?><br>
							</td>
							<td><?php echo $m->path ?></td>
							<td><?php echo $m->tgl ?></td>
							<td>
								<a href="<?php echo site_url('media/update/'.$m->id) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
								<a href="#" class="btn btn-danger hapus" kode="<?php echo $m->id ?>">Hapus</a>
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
				url : "<?php echo site_url('media/delete') ?>",
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