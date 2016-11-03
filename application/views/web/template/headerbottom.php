
            <!-- Header main -->
            <div id="header_main" class="sticky header_main">
                <div class="container">
                    <!-- Logo -->
                    <div class="site_brand">
                        <h2 id="site_title"><a href="<?php echo site_url('web') ?>"><img src="<?php echo base_url('img/logo_dharma.png') ?>" alt="">&nbsp;Primkop<span>Caraka</span></a></h2>
                        
                        <!--
                        <a href="#">
                            <img src="<?php echo base_url() ?>assets/webportal/images/TrendyBlog.png" alt="Logo">
                        </a>
                        -->
                    </div><!-- End Logo -->
                    <!-- Site navigation -->
                    <nav class="site_navigation" role="navigation">
                        <span class="site_navigation_toggle"><i class="fa fa-reorder"></i></span>
                        <ul class="menu">
                            <li><a href="<?php echo site_url('web') ?>">Beranda</a></li>
                            <li class="menu-item-has-children"><a href="#">Profil Kami</a>
                                <span class="site_sub_menu_toggle"></span>
                                <ul class="sub-menu" jQuery>
                                    <?php foreach ($profilkami as $m): ?>
                                         <li><a href="<?php echo site_url('web/profil/'.$m->id.'/'.str_replace(' ','-', $m->nama)) ?>"><?php echo $m->nama ?> </a></li>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                            <?php /** ?>
                            <li class="menu-item-has-children has_dt_mega_menu"><a href="#">Mega menu<div class="subtitle">Widget Menu</div></a>
                                <span class="site_sub_menu_toggle"></span>
                                <ul class="dt_mega_menu" jQuery>
                                    <li>
                                        <!-- Timeline widet -->
                                        <div class="widget">
                                            <div class="widget_title"><h3>Timeline</h3></div>
                                            <div class="tb_widget_timeline clearfix">
                                                <!-- Article -->
                                                <article>
                                                    <span class="date">08/27/2014</span>
                                                    <span class="time">11:19 AM</span>
                                                    <div class="timeline_content">
                                                        <i class="fa fa-clock-o" jQuery></i>
                                                        <h3><a href="#">Morbi malesuada non dui egestas quis</a></h3>
                                                    </div>
                                                </article><!-- End Article -->
                                                <!-- Article -->
                                                <article>
                                                    <span class="date">08/27/2014</span>
                                                    <span class="time">11:19 AM</span>
                                                    <div class="timeline_content">
                                                        <i class="fa fa-clock-o" jQuery></i>
                                                        <h3><a href="#">Morbi malesuada non dui egestas quis</a></h3>
                                                    </div>
                                                </article><!-- End Article -->
                                                <!-- Article -->
                                                <article>
                                                    <span class="date">08/27/2014</span>
                                                    <span class="time">11:19 AM</span>
                                                    <div class="timeline_content">
                                                        <i class="fa fa-clock-o" jQuery></i>
                                                        <h3><a href="#">Morbi malesuada non dui egestas quis</a></h3>
                                                    </div>
                                                </article><!-- End Article -->
                                                <!-- Article -->
                                                <article>
                                                    <span class="date">08/27/2014</span>
                                                    <span class="time">11:19 AM</span>
                                                    <div class="timeline_content">
                                                        <i class="fa fa-clock-o" jQuery></i>
                                                        <h3><a href="#">Morbi malesuada non dui egestas quis</a></h3>
                                                    </div>
                                                </article><!-- End Article -->
                                                <!-- Article -->
                                                <article>
                                                    <span class="date">08/27/2014</span>
                                                    <span class="time">11:19 AM</span>
                                                    <div class="timeline_content">
                                                        <i class="fa fa-clock-o" jQuery></i>
                                                        <h3><a href="#">Morbi malesuada non dui egestas quis</a></h3>
                                                    </div>
                                                </article><!-- End Article -->
                                                <!-- Article -->
                                                <article>
                                                    <span class="date">08/27/2014</span>
                                                    <span class="time">11:19 AM</span>
                                                    <div class="timeline_content">
                                                        <i class="fa fa-clock-o" jQuery></i>
                                                        <h3><a href="#">Morbi malesuada non dui egestas quis</a></h3>
                                                    </div>
                                                </article><!-- End Article -->
                                            </div>
                                        </div><!-- End Timeline widet -->
                                        <!-- Recent posts -->
                                        <div class="widget">
                                            <div class="widget_title"><h3>Recent posts</h3></div>
                                            <div class="tb_widget_recent_list clearfix">
                                                <!-- Post item -->
                                                <div class="item clearfix">
                                                    <div class="item_thumb">
                                                        <div class="thumb_icon">
                                                            <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                                        </div>
                                                        <div class="thumb_hover">
                                                            <a href="post_single.html"><img src="<?php echo base_url() ?>assets/webportal/demo/500x500/11.jpg" alt="Post"></a>
                                                        </div>
                                                    </div>
                                                    <div class="item_content">
                                                        <h4><a href="post_single.html">Nam at maximus sed tempus est ultrices</a></h4>
                                                        <div class="item_meta clearfix">
                                                            <span class="meta_date">October 3, 2014</span>
                                                            <span class="meta_comments"><a href="post_single.html">6</a></span>
                                                        </div>
                                                    </div>
                                                </div><!-- End Post item -->
                                                <!-- Post item -->
                                                <div class="item clearfix">
                                                    <div class="item_thumb">
                                                        <div class="thumb_icon">
                                                            <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                                        </div>
                                                        <div class="thumb_hover">
                                                            <a href="post_single.html"><img src="<?php echo base_url() ?>assets/webportal/demo/500x500/5.jpg" alt="Post"></a>
                                                        </div>
                                                    </div>
                                                    <div class="item_content">
                                                        <h4><a href="post_single.html">Nam at maximus sed tempus est ultrices eget</a></h4>
                                                        <div class="item_meta clearfix">
                                                            <span class="meta_date">October 3, 2014</span>
                                                            <span class="meta_comments"><a href="post_single.html">6</a></span>
                                                        </div>
                                                    </div>
                                                </div><!-- End Post item -->
                                                <!-- Post item -->
                                                <div class="item clearfix">
                                                    <div class="item_thumb">
                                                        <div class="thumb_icon">
                                                            <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                                        </div>
                                                        <div class="thumb_hover">
                                                            <a href="post_single.html"><img src="<?php echo base_url() ?>assets/webportal/demo/500x500/3.jpg" alt="Post"></a>
                                                        </div>
                                                    </div>
                                                    <div class="item_content">                                                        
                                                        <h4><a href="post_single.html">Nam at maximus sed tempus convallis eget</a></h4>
                                                        <div class="item_meta clearfix">
                                                            <span class="meta_date">October 3, 2014</span>
                                                            <span class="meta_comments"><a href="post_single.html">6</a></span>
                                                        </div>
                                                    </div>
                                                </div><!-- End Post item -->
                                            </div>
                                        </div><!-- End Recent posts -->
                                        <!-- Category widget -->
                                        <div class="widget">
                                            <div class="widget_title"><h3>Archive</h3></div>
                                            <div class="tb_widget_categories">
                                                <ul>
                                                    <li><a href="#">May</a> (159)</li>
                                                    <li><a href="#">January</a> (159)</li>
                                                    <li><a href="#">October</a> (159)</li>
                                                    <li><a href="#">September</a> (159)</li>
                                                    <li><a href="#">July</a> (159)</li>
                                                    <li><a href="#">June</a> (159)</li>
                                                    <li><a href="#">January</a> (159)</li>
                                                    <li><a href="#">October</a> (159)</li>
                                                    <li><a href="#">September</a> (159)</li>
                                                </ul>
                                            </div>
                                        </div><!-- End Category widget -->
                                        <!-- Banners -->
                                        <div class="widget">
                                            <div class="widget_title"><h3>Banner</h3></div>
                                            <div class="tb_widget_banner_125 clearfix">
                                                <a href="http://themeforest.net/user/different-themes/portfolio?ref=CodeoStudio" target="_blank">
                                                    <img src="<?php echo base_url() ?>assets/webportal/demo/125x125.png" alt="Banner">
                                                </a>
                                                <a href="http://themeforest.net/user/different-themes/portfolio?ref=CodeoStudio" target="_blank">
                                                    <img src="<?php echo base_url() ?>assets/webportal/demo/125x125.png" alt="Banner">
                                                </a>
                                                <a href="http://themeforest.net/user/different-themes/portfolio?ref=CodeoStudio" target="_blank">
                                                    <img src="<?php echo base_url() ?>assets/webportal/demo/125x125.png" alt="Banner">
                                                </a>
                                                <a href="http://themeforest.net/user/different-themes/portfolio?ref=CodeoStudio" target="_blank">
                                                    <img src="<?php echo base_url() ?>assets/webportal/demo/125x125.png" alt="Banner">
                                                </a>
                                            </div>
                                        </div><!-- End Banners -->
                                    </li>
                                </ul>
                            </li>
                            */ ?>
                            <li><a href="<?php echo site_url('web/artikel/') ?>">Artikel </a></li>
                            <li><a href="<?php echo site_url('web/gallery/') ?>">Gallery </a></li>
                            <li class="menu-item-has-children"><a href="#">Produk</a>
                                <span class="site_sub_menu_toggle"></span>
                                <ul class="sub-menu" jQuery>
                                    <?php foreach ($produkkami as $m): ?>
                                         <li><a href="<?php echo site_url('web/view_produk/'.$m->id.'/'.str_replace(' ','-', $m->nama)) ?>"><?php echo $m->nama ?> </a></li>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                            <li><a href="<?php echo site_url('web/event/') ?>">Event </a></li>
                            <li><a href="<?php echo site_url('web/kontak/') ?>">Kontak Kami </a></li>
                        </ul>
                    </nav><!-- End Site navigation -->
                </div>
            </div><!-- End Header main -->