<div id="artikel">
	<div class="delay_alert">
		<?php  
			echo $this->session->flashdata('add_success');
			echo $this->session->flashdata('update_success');
			echo $this->session->flashdata('delete_success');
			echo $this->session->flashdata('headline_success');
		?>
	</div>
	<div class="well well-sm">
		<a href="<?php echo site_url('event/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Event</a>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered" id="datatable">
			<thead>
				<th>No</th>
				<th>Nama</th>
				<th>Date</th>
				<th>Headline</th>
			</thead>
			<tbody>
				<?php  
					$no = 1;
					foreach ($event as $e) {
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td>
								<?php echo $e->nama ?><br>
								<a href="<?php echo site_url('event/update/'.$e->id) ?>"> Edit </a> &nbsp;|&nbsp;
								<a href="#" class="hapus" kode="<?php echo $e->id ?>">Hapus</a>
							</td>
							<td><?php echo $e->date ?></td>
							<td>
								<?php  
									if ($e->headline == 'y'){
										echo '<h4><p class="headline" kd_headline="'.$e->id.'" headline="n"><i class="fa fa-toggle-on"></i></p></h4>';
									} 
									elseif($e->headline == 'n')
									{
										echo '<h4><p class="headline" kd_headline="'.$e->id.'" headline="y"><i class="fa fa-toggle-off"></i></p></h4>';
									}
								?>
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
				url : "<?php echo site_url('event/delete') ?>",
				type : "POST",
				data : "id_event="+kode,
				cache : false,
				success : function(html){
					location.reload();
				}
			})
		});


		//headline
		$('.headline').click(function(){
			var kode = $(this).attr('kd_headline');
			var headline = $(this).attr('headline');

			$.ajax({
				url  : "<?php echo site_url('event/setHeadline') ?>",
				type : "POST",
				data : "kode="+kode+"&headline="+headline,
				cache : false,
				success : function(html){
					location.reload();
				}
			})
		});

	})
</script>