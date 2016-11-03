<div class="panel panel-success">
	<div class="panel-heading">
		Tulis Pesan 
	</div>
	<div class="panel-body">
		<?php echo $this->session->flashdata('wajib'); ?>
		<table class="table_green">
			<form action="" method="post">
			<tr>
				<td width="100">Pengirim</td>
				<td width="10">:</td>
				<td width="500"><input type="text" value="<?php echo $pengirim  ?>" name="pengirim" id="pengirim" class="form-control" readonly></td>
			</tr>
			<tr>
				<td>Penerima</td>
				<td>:</td>
				<td><input type="text" name="penerima" id="penerima" class="form-control" value="<?php echo $pesan->sender ?>" readonly></td>
			</tr>
			<tr>
				<td>Subject</td>
				<td>:</td>
				<td><input type="text" name="subject" class="form-control"></td>
			</tr>
			<tr>
				<td>Isi Pesan</td>
				<td>:</td>
				<td><textarea class="form-control" name="pesan"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<button class="btn btn_green"> Balas Pesan</button>
				</td>
			</tr>
			</form>
		</table>
	</div>
</div>