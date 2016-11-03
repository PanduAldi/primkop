<div id="artikel">
	<div id="alert_delay">
		<?php  
			echo $this->session->flashdata('add_success');
			echo $this->session->flashdata('update_success');
			echo $this->session->flashdata('delete_success');
		?>
	</div>
	<div class="well well-sm">
		<a href="<?php echo site_url('penulis/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Penulis</a>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered" id="datatable">
			<thead>
				<th>No</th>
				<th>Kode Penulis</th>
				<th>Nama</th>
				<th>Tgl Join</th>
				<th>Email</th>
				<th>#</th>
			</thead>
			<tbody>
				<?php  
					$no = 1;
					foreach ($penulis as $p) {
						?>
						<tr>
						 	<td><?php echo $no++ ?></td>
						 	<td><?php echo $p->kd_penulis ?></td>
						 	<td><?php echo $p->nama ?></td>
						 	<td><?php echo $p->tgl_join ?></td>
						 	<td><?php echo $p->email ?></td>
						 	<td>
						 		<a href="<?php echo site_url('penulis/update/'.$p->id) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
						 		<a href="#" class="btn btn-danger hapus" kode='<?php echo $p->id ?>'><i class="fa fa-trash"></i> Delete</a>
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
		$("#alert_delay").delay(1000).fadeOut(500);

		//delete data
		$('.hapus').click(function(){
			var kode = $(this).attr('kode');
			$("#idhapus").val(kode);
			$("#modal-delete").modal('show');
		});

		$("#konfirmasi").click(function(){
			var kode = $("#idhapus").val();

			$.ajax({
				url : "<?php echo site_url('penulis/delete') ?>",
				type : "POST",
				data : "id_penulis="+kode,
				cache : false,
				success : function(html){
					location.reload();
				}
			})
		});

	})
</script>