<div id="artikel">
	<div class="delay_alert">
		<?php  
			echo $this->session->flashdata('add_success');
			echo $this->session->flashdata('update_success');
			echo $this->session->flashdata('delete_success');
		?>
	</div>
	<div class="well well-sm">
		<a href="<?php echo site_url('produk/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Produk</a>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered" id="datatable">
			<thead>
				<th>No</th>
				<th>Nama Produk</th>
				<th>img</th>
				<th>#</th>
			</thead>
			<tbody>
				<?php  
					$no = 1;
					foreach ($produk as $prod) {
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td>
								<?php echo $prod->nama ?><br>
							</td>
							<td><img src="<?php echo base_url('img/produk/'.$prod->img) ?>" alt="produk" width="100" height="100"></td>
							<td>
								<a href="<?php echo site_url('caraka_it/produk/'.$prod->id."/".str_replace(' ','-', $prod->nama)) ?>" target="_blank" class="btn btn-info"><i class="fa fa-search"></i> View detail</a>
								<a href="<?php echo site_url('produk/update/'.$prod->id) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit </a>
								<a href="#" class="btn btn-danger hapus" kode="<?php echo $prod->id ?>"><i class="fa fa-trash"></i> Delete</a>								
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
				url : "<?php echo site_url('produk/delete') ?>",
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