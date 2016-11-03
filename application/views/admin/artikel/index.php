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
		<a href="<?php echo site_url('artikel/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Artikel</a>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered" id="datatable">
			<thead>
				<th>No</th>
				<th>Judul</th>
				<th>Author</th>
				<th>Date</th>
				<th>Hit</th>
				<th>Headline</th>
			</thead>
			<tbody>
				<?php  
					$no = 1;
					foreach ($artikel as $a) {
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td>
								<?php echo $a->judul ?><br>
								<a href="<?php echo site_url('artikel/update/'.$a->id_artikel) ?>"> Edit </a> &nbsp;|&nbsp;
								<a href="#" class="hapus" kode="<?php echo $a->id_artikel ?>">Hapus</a>
							</td>
							<td><?php echo $a->kd_penulis.'-'.$a->penulis ?></td>
							<td><?php echo $a->tgl ?></td>
							<td><?php echo $a->hit ?></td>
							<td>
								<?php  
									if ($a->headline == 'y'){
										echo '<h4><p class="headline" kd_headline="'.$a->id_artikel.'" headline="n"><i class="fa fa-toggle-on"></i></p></h4>';
									} 
									elseif($a->headline == 'n')
									{
										echo '<h4><p class="headline" kd_headline="'.$a->id_artikel.'" headline="y"><i class="fa fa-toggle-off"></i></p></h4>';
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
				url : "<?php echo site_url('artikel/delete') ?>",
				type : "POST",
				data : "id_artikel="+kode,
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
				url  : "<?php echo site_url('artikel/setHeadline') ?>",
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