			<div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="<?php echo site_url('dashboard') ?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
							<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-sitemap"></i>

							<span class="menu-text">
								Profil
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo site_url('profil') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Profil Manajemen
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url('manager') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Manager
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>


					<li class="">
							<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>

							<span class="menu-text">
								Artikel
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo site_url('artikel') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Artikel List
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url('komentar') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Komentar Artikel
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>


					<li class="">
						<a href="<?php echo site_url('penulis') ?>">
							<i class="menu-icon fa fa-file"></i>
							<span class="menu-text"> Penulis </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo site_url('media') ?>">
							<i class="menu-icon fa fa-file-picture-o"></i>
							<span class="menu-text"> Media </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo site_url('gallery') ?>">
							<i class="menu-icon fa fa-image"></i>
							<span class="menu-text"> Gallery </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo site_url('event') ?>">
							<i class="menu-icon fa fa-rss"></i>
							<span class="menu-text"> Event </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo site_url('produk') ?>">
							<i class="menu-icon fa fa-shopping-cart"></i>
							<span class="menu-text"> Produk </span>
						</a>

						<b class="arrow"></b>
					</li>
					<!--
					<li class="active open">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Tables </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="active">
								<a href="tables.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Simple &amp; Dynamic
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jqgrid.html">
									<i class="menu-icon fa fa-caret-right"></i>
									jqGrid plugin
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					-->

				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>