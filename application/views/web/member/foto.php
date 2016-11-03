<!DOCTYPE html>
<html>
	<head>
		<title>Form Upload Foto</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/webadmin/cerulean.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/webportal/css/fontawesome.css">
	</head>
	<body>
		
		<div class="row">
			<div class="container">
			<br>
				<div class="panel panel-danger">
					<div class="panel-heading">Upload Foto</div>
					<div class="panel-body">
					 	<?php echo $error;?>
						<?php echo form_open_multipart('member/prosesupload');?>
						<div class="alert alert-info">
							Ukuran file max 300x500 pixel dan 2MB
						</div>
						 <div class="form-group">
		                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">Pilih File<span class="required">*</span>
		                    </label>
		                    <div class="col-md-8 col-sm-8 col-xs-12">
		                        <input type="file" id="gambar" required="required" class="form-control col-md-7 col-xs-12" name="gambar">
		                    </div>
		                </div>
		                <div class="ln_solid"></div>
		                <div class="form-group">
		                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                                        
		                        <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-upload"></i> Upload Foto!</button>
		                        
		                    </div>
		                </div>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>