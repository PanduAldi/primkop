<div id="profil">
	<div class="alert-delay">
		<?php
			 echo $this->session->flashdata('add_success'); 
			 echo $this->session->flashdata('update_success');
			 echo $this->session->flashdata('delete_success');
			 echo $this->session->flashdata('piket_success');
		?>
	</div>
	<div class="well well-sm"><a href="<?php echo site_url('manager/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Manager</a></div>
	<div class="panel panel-info">
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Foto</th>
							<th>Bio</th>
						</tr>						
					</thead>
					<tbody>
						<?php $no=1; foreach ($manager->result() as $man): ?>
							<tr>
								<td width="20"><?php echo $no++ ?></td>
								<td width="150"><img src="<?php echo base_url('img/manager/'.$man->img) ?>" clas- width="150" height="200" alt="Foto"></td>
								<td width="500">
									<div class="alert-delay"><?php echo $this->session->flashdata('piket_success'.$man->id); ?></div>
									<p><strong>NIA : </strong> <?php echo $man->nia ?></p>
									<p><strong>Nama : </strong> <?php echo $man->nama ?></p>
									<p>Piket : 
										<select>
											<?php  
												$hari = array('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu');

												for ($i=0; $i < count($hari); $i++) { 
													
													$selected = ($man->piket == $hari[$i])?"selected":"";

													echo '<option value="'.$hari[$i].'" class="pilih_piket" kode="'.$man->id.'" '.$selected.'>'.$hari[$i].'</option>';
												}
											?>
										</select>

									</p>
									<p>
										<a href="<?php echo site_url('manager/update/'.$man->id) ?>">Edit</a> |
										<a href="#" class="hapus" kode="<?php echo $man->id ?>">Hapus</a> 
									</p>
								</td>
							</tr>	
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$(function()
	{
		$(".alert-delay").delay(1000).fadeOut(500);
	
		//delete manager
		$('.hapus').click(function(){
			var kode = $(this).attr('kode');
			$('#idhapus').val(kode);
			$("#modal-delete").modal('show');
		});

		$("#konfirmasi").click(function(){
			var kode = $("#idhapus").val();

			$.ajax({
				url : "<?php echo site_url('manager/delete') ?>",
				type : "POST",
				data : "id_manager="+kode,
				cache : false,
				success : function(html){
					location.reload();
				}
			})
		});

		// piket 
		$(".pilih_piket").click(function(){
			var kode = $(this).attr('kode');
			var hari = $(this).val();

			$.ajax({
				url : "<?php echo site_url('manager/update_piket') ?>",
				type : "POST",
				data : "kode="+kode+"&hari="+hari,
				cache : false,
				success : function(html){
					location.reload();
				}
			})
		});
	})
</script>