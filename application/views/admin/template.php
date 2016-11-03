<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title ?></title>

		<meta name="description" content="Static &amp; Dynamic Tables" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/webadmin/ace_admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/webadmin/ace_admin/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/webadmin/ace_admin/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/webadmin/ace_admin/css/jquery.gritter.min.css" />

		<!-- Data Animate -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/data-animate.css">


		<!-- Growl CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/webadmin/jquery.growl/stylesheets/jquery.growl.css">

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/webadmin/ace_admin/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/webadmin/ace_admin/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url() ?>assets/webadmin/ace_admin/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url() ?>assets/webadmin/ace_admin/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url() ?>assets/webadmin/ace_admin/js/ace-extra.min.js"></script>
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url() ?>assets/webadmin/ace_admin/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?php echo base_url() ?>assets/webadmin/ace_admin/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url() ?>assets/webadmin/ace_admin/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo base_url() ?>assets/webadmin/ace_admin/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() ?>assets/webadmin/ace_admin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url() ?>assets/webadmin/ace_admin/js/bootstrap.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo base_url() ?>assets/webadmin/ace_admin/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url() ?>assets/webadmin/ace_admin/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		
		<?php echo $_header; ?>
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<?php echo $_sidebar ?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<?php  

								//definisi uri segment
								$segment1 = $this->uri->segment(1);
								$segment2 = $this->uri->segment(2);
								$segment3 = $this->uri->segment(3);

								if ($segment2 == null)
								{
									echo '<li>
											'.ucwords($segment1).'
										  </li>';
								}
								else if($segment3 == null)
								{
									echo '<li>
											<a href="'.site_url($segment1).'">'.ucwords($segment1).'</a>
										  </li>
										  <li>
											'.ucwords($segment2).'
										  </li>
										  ';

								} else {
									echo '<li>
											<a href="'.site_url($segment1).'">'.ucwords($segment1).'</a>
										  </li>
										  <li>
											'.ucwords($segment2).'
										  </li>
										  <li>
											'.ucwords($segment3).'
										  </li>';
								}
							?>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-primary ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								<?php echo $title ?>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<?php echo $_content ?>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120"
							<span class="blue bolder">Caraka IT Team</span>
							Application &copy; <?php echo date('Y') ?>
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<div class="modal fade" id="modal-delete">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3>Hapus Data</h3>
					</div>
					<div class="modal-body">
							<input type="hidden" name="idhapus" id="idhapus">
							<p>Anda Yakin Ingin Menghapus Data Ini?</p>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" id="konfirmasi">Hapus</button>
						<button class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>


		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url() ?>assets/webadmin/ace_admin/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() ?>assets/webadmin/ace_admin/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>assets/webadmin/ace_admin/js/dataTables.tableTools.min.js"></script>
		<script src="<?php echo base_url() ?>assets/webadmin/ace_admin/js/dataTables.colVis.min.js"></script>
		<script src="<?php echo base_url() ?>assets/webadmin/ace_admin/js/jquery.gritter.min.js"></script>
		<!-- TinyMCE -->
		<script src="<?php echo base_url() ?>assets/webadmin/tinymce/js/tinymce/tinymce.min.js"></script>
		<!-- jquery growl -->
		<script src="<?php echo base_url() ?>assets/webadmin/jquery.growl/javascripts/jquery.growl.js"></script>
		<!-- ace scripts -->
		<script src="<?php echo base_url() ?>assets/webadmin/ace_admin/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url() ?>assets/webadmin/ace_admin/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			$(function(){
				$("#datatable").dataTable();

				tinymce.init({
						selector: "textarea",
					    plugins: [
					        "advlist autolink lists link image charmap print preview anchor",
					        "searchreplace visualblocks code fullscreen",
					        "insertdatetime media table contextmenu paste"
					    ],
					    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
					});
			});
		</script>
	</body>
</html>
