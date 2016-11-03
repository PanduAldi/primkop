<script language="JavaScript"><!--
  function setForm(filelogo) {

      opener.document.daftar.foto.value = filelogo;
      self.close();
      return false;
  }
  //--></script>
<link href="<?php echo base_url();?>assets/webadmin/cerulean.css" rel="stylesheet">
    
<div class="container">
	<div class="row">
  		<div class="col-lg-12 col-md-12 col-xs-12">
    		<h3>Upload Sukses</h3>
        <hr>
    	  <?php echo $this->session->flashdata('pesan');?>
        <img src="<?php echo base_url();?>img/upload/<?php echo $namafile;?>"><br><br>
        <a href="#" class="btn btn-info btn-lg" onClick="javascript:return setForm('<?php echo $namafile;?>');">Pasang Foto!</a>
  	</div>
</div>
</div>