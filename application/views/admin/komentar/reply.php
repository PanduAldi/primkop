<div id="reply">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<i class="fa fa-reply"></i> Balas Komentar
		</div>
		<div class="panel-body">
			<div class="panel panel-primary">
				<div class="panel-body">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>Nama : </td>
								<td width="15">:</td>
								<td><?php echo $komentar['nama'] ?></td>
							</tr>
							<tr>
								<td>Komentar :</td>
								<td>:</td>
								<td><?php echo $komentar['comment'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-body">
					<form action="" method="POST">
					<label for="" class="control-label">Balas Komentar :</label>
					<textarea name="komentar" id="" class="form-control" rows="5"></textarea>
					<br>
					<button class="btn btn-primary"><i class="fa fa-reply"></i> Balas</button>
					<a href="<?php echo site_url('komentar') ?>" class="btn btn-danger"> Batal</a>
					</form>
				</div>
			</div>
		</div>	
	</div>
</div>