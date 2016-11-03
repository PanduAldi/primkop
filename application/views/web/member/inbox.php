<!-- Jquery -->
<script>
	$(function(){
		$(".delay").delay(2000).fadeOut(500);
	})
</script>
<!-- end -->

<div class="col col_12_of_12">
	<div class="panel panel-success">
		<div class="panel-heading">
			INBOX
		</div>
		<div class="panel-body">
			<div class="delay">
			<?php  
				echo $this->session->flashdata('delete');
				echo $this->session->flashdata('terkirim');
			?>
			</div>
			<a href="<?php echo site_url('anggota/kirimpesan') ?>" class="btn btn_green"><i class="fa fa-envelope"></i> Kirim Pesan</a>
			<br>
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>From</th>
							<th>Subject</th>
							<th>Date</th>
							<th>Tools</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if($cek_inbox == 0)
							{
								echo "<tr><td colspan='5' align='center'>Data masih kosong .. !!</td></tr>";
							} 
						?>
						<?php $no = 1; foreach ($inbox as $i): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td>
									<?php
										//cari nama pengirim
										$db2 = $this->load->database('db2', TRUE);
										$nama = $db2->get_where('jek_ojek', array('no_hape' => $i->sender))->row();

										echo $nama->nama_kecil;
									?>
								</td>
								<td><?php echo $i->subject ?></td>
								<td><?php echo $i->date_sent ?></td>
								<td>
									<?php 
										//cek baca pesan 
										if ($i->read == 1) {
											$btn = "btn btn_green";
											$baca = "fa fa-envelope";
										}
										elseif($i->read == 0)
										{
											$btn  = "btn btn_blue";
											$baca = "fa fa-envelope";
										}
									?>
									<a href="<?php echo site_url('anggota/lihatpesan/'.$i->id_pesan) ?>" class="<?php echo $btn ?>" ><i class="<?php echo $baca ?>"></i></a>
									<a href="<?php echo site_url('anggota/deletepesan/'.$i->id_pesan) ?>" onclick="return confirm('Apakah anda yakin menghapus data ini ?')" class="btn btn_red"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						<?php endforeach ?>
						<tr>
							<td colspan="5" align="center"><strong>Total Pesan : <?php echo $total->total ?> Pesan </strong></td>
						</tr>
					</tbody>
				</table>

				<div class="well well-sm">
					<p>Keterangan : </p>
					<p><a href="#" class="btn btn_blue"><i class="fa fa-envelope"></i></a> : Pesan yang belum di baca <br>
						<a href="#" class="btn btn_green"><i class="fa fa-envelope"></i></a> : Pesan yang sudah di baca
					</p>
				</div>
			</div>
		</div>
	</div>
</div>