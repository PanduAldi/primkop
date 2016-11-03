<div id="artikel">
	<div id="alert_delay">
		<?php  
			echo $this->session->flashdata('reply_success');
			echo $this->session->flashdata('delete_success');
		?>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered" id="datatable">
			<thead>
				<th>No</th>
				<th>Artikel</th>
				<th>User</th>
				<th>Komentar</th>
				<th>#</th>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					foreach ($komentar as $p) {
						?>
						<tr>
						 	<td><?php echo $no++ ?></td>
						 	<td><?php echo $p->judul ?></td>
						 	<td>
						 		<p>Nama : <?php echo $p->nama ?></p>
						 		<p>Email : <?php echo $p->email ?></p>
						 		<p>IP : <?php echo $p->ip_address ?></p>
						 	</td>
						 	<th><?php echo $p->comment ?></th>
						 	<td>
						 		<a href="<?php echo site_url('komentar/reply/'.$p->id) ?>" class="btn btn-primary"><i class="fa fa-reply"></i> Reply</a>
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
				url : "<?php echo site_url('komentar/delete') ?>",
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