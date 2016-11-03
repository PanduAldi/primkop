<div class="panel panel-success">
	<div class="panel-heading">
		Lihat Pesan <?php echo $lihatpesan->sender ?>
	</div>
	<div class="panel-body">
		<table class="table_green">
			<tr>
				<td colspan="3" align="right"><a href="<?php echo site_url('anggota/inbox') ?>" class="btn btn_blue"><i class="fa fa-angle-double-left"></i> Kembali</a></td>
			</tr>
			<tr>
				<td width="100">Pengirim</td>
				<td width="10">:</td>
				<td width="500"><input type="text" value="<?php echo $lihatpesan->sender ?>" class="form-control" disabled></td>
			</tr>
			<tr>
				<td>Subject</td>
				<td>:</td>
				<td><input type="text" value="<?php echo $lihatpesan->subject ?>" class="form-control" disabled></td>
			</tr>
			<tr>
				<td>Tanngal Pesan</td>
				<td>:</td>
				<td><input type="text" value="<?php echo $lihatpesan->date_sent ?>" class="form-control" disabled></td>
			</tr>
			<tr>
				<td>Isi Pesan</td>
				<td>:</td>
				<td><textarea class="form-control" disabled><?php echo $lihatpesan->pesan ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<a href="<?php echo site_url('anggota/balaspesan/'.$lihatpesan->id_pesan) ?>" class="btn btn_blue"><i class="fa fa-reply"></i> Balas Pesan</a>
					<a href="<?php echo site_url('anggota/deletepesan/'.$lihatpesan->id_pesan) ?>" class="btn btn_red"><i class="fa fa-trash"></i> Hapus Pesan</a>
				</td>
			</tr>
		</table>
	</div>
</div>