<script>
	
	//cek apakah nohape ada di database
	$(function(){

		$("#penerima").blur(function()
		{
			var penerima = $(this).val();

			$.ajax({
				url : "<?php echo site_url('anggota/cek_penerima') ?>",
				type : "POST",
				data : "penerima="+penerima,
				success : function(data){

					ex = data.split("|");
					var cek = ex[0];

					if (cek == 0) {
						$("#pesanerror").attr('data-animate', 'fadeInLeft');
						$("#pesanerror").html("No HP yang anda input tidak terdaftar di database kami. Pastikan no HP adalah user terdaftar");
					
						if (penerima == "")
						{
							$("#pesanerror").attr('data-animate', 'fadeOut');
							$("#pesanerror").html("");
						}
					}
					else
					{
						$("#pesanerror").attr('data-animate', 'fadeOut');
						$("#pesanerror").html("");

						var pengirim = $("#pengirim").val();
						if (penerima == pengirim) 
						{
							$("#pesanerror").attr('data-animate', 'fadeInLeft');
							$("#pesanerror").html("Jangan gunakan nomor HP yang sama dengan pengirim");
						}
						else
						{
							$("#pesanerror").html('');
						}
					}
				}
			})

		})
	})
</script>

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
				<td><input type="text" name="penerima" id="penerima" class="form-control"><div class="text-danger" id="pesanerror"></div></td>
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
					<button class="btn btn_green"> Kirim Pesan</button>
					<a href="<?php echo site_url('anggota/inbox') ?>" class="btn btn_red">Batalkan & Kembali</a>
				</td>
			</tr>
			</form>
		</table>
	</div>
</div>