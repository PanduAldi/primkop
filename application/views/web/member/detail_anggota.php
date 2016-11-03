<div class="col col_12_of_12">
	<div class="panel panel-success">
		<div class="panel-heading">
			Detail Profil Anggota
		</div>		
		<div class="panel-body">
			<table class="table_green">
				<tbody>
					<tr>
						<td width="150"><strong>No. Anggota</strong></td>
						<td width="10">:</td>
						<td><?php echo $profil->kode_ojek ?></td>
					</tr>
					<tr>
						<td><strong>Nama Lengkap</strong></td>
						<td>:</td>
						<td><?php echo $profil->nama_lengkap ?></td>
					</tr>	
					<tr>
						<td><strong>Tempat Lahir</strong></td>
						<td>:</td>
						<td><?php echo $profil->tmp_lahir ?></td>
					</tr>
					<tr>
						<td><strong>Tanggal Lahir</strong></td>
						<td>:</td>
						<td><?php echo $this->idn_times->tgl_db($profil->tgl_lahir); ?></td>
					</tr>
					<tr>
						<td><strong>Email</strong></td>
						<td>:</td>
						<td><?php echo $profil->email ?></td>
					</tr>		
					<tr>
						<td><strong>Nomor HP</strong></td>
						<td>:</td>
						<td><?php echo $profil->no_hape ?></td>
					</tr>
					<tr>
						<td><strong>Foto</strong></td>
						<td>:</td>
						<td><img src="<?php echo base_url('img/upload/'.$profil->foto) ?>" width="150" alt=""></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>