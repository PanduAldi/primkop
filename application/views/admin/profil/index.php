<div id="artikel">
	<div class="delay_alert">
		<?php  
			echo $this->session->flashdata('add_success');
			echo $this->session->flashdata('update_success');
			echo $this->session->flashdata('delete_success');
		?>
	</div>
	<div class="well well-sm">
		<a href="<?php echo site_url('profil/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Profil</a>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered" id="datatable">
			<thead>
				<th>No</th>
				<th>Judul</th>
				<th>#</th>
			</thead>
			<tbody>
				<?php  
					$no = 1;
					foreach ($profil as $pr) {
						?>
						<tr>
							<td width="50"><?php echo $no++ ?></td>
							<td>
								<?php echo $pr->nama ?><br>
							</td>
							<td width="300">
								<a href="#" class="btn btn-warning"><i class="fa fa-search"></i> View</a>
								<a href="<?php echo site_url('profil/update/'.$pr->id) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
								<a href="#" class="btn btn-danger hapus" kode="<?php echo $pr->id ?>">Hapus</a>
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
				url : "<?php echo site_url('profil/delete') ?>",
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