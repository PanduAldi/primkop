                    <div class="col col_3_of_12">
                        <!-- Widget Search widget -->
                        <div class="widget">
                            <div class="widget_title"><h3>Manager Piket</h3></div>
                            <div align="center">
                                <p><img src="<?php echo base_url('img/manager/'.$manager_info['img']) ?>" class="img-rounded" width="200" height="250" alt=""></p>
                                <p><strong><?php echo $manager_info['nama'] ?></strong> <br> <strong>NIA : <?php echo $manager_info['nia'] ?></strong></p>
                            </div>
                        </div><!-- End Widget Search widget -->
                        
                        <?php  
                            if ($this->session->userdata('member_login') == true)
                            {
                            ?>
                            <!-- Widget posts -->
                            <div class="widget">
                                <div class="widget_title"><h3>Menu Anggota :</h3></div>
                                <div class="tb_widget_posts_big clearfix">
                                    <div class="tb_widget_categories">
                                        <ul>
                                            <li><a href="<?php echo site_url('anggota') ?>">Beranda</a> </li>
                                            <li><a href="<?php echo site_url('anggota/detail_anggota') ?>">Detail Anggota</a> </li>
                                            <li><a href="<?php echo site_url('member/ganti_pass') ?>">Ganti Password</a> </li>
                                            <li><a href="<?php echo site_url('anggota/inbox') ?>">Inbox</a> </li>
                                            <li><a href="<?php echo site_url('member/logout') ?>">Logout</a></li>
                                        </ul>
                                    </div>
                                    <?php /** ?>
                                    <!-- Post item -->
                                    <div class="item clearfix">
                                        <div class="item_content">
                                            <h4><a href="post_single.html"><span class="format" jQuery>Live</span>Robin van Persie may lose Manchester United place after dip in belief</a></h4>
                                            <p>Aenean eu convallis elit. Quisque non felis vel tortor pellentesque consectetur vitae [...]</p>
                                            <div class="item_meta clearfix">
                                                <span class="meta_date">June 18, 2014</span>
                                                <span class="meta_comments"><a href="post_single.html">371</a></span>
                                                <span class="meta_likes"><a href="#">64</a></span>
                                            </div>
                                        </div>
                                    </div><!-- End Post item -->
                                    <!-- Post item -->
                                    <div class="item clearfix">
                                        <div class="item_content">
                                            <h4><a href="post_single.html"><span class="format" jQuery>Video</span>Arsène Wenger calls players naive after Arsenal lose to Manchester United</a></h4>
                                            <p>Aenean eu convallis elit. Quisque non felis vel tortor pellentesque consectetur vitae [...]</p>
                                            <div class="item_meta clearfix">
                                                <span class="meta_date">May 18, 2014</span>
                                                <span class="meta_comments"><a href="post_single.html">4571</a></span>
                                                <span class="meta_likes"><a href="#">356</a></span>
                                            </div>
                                        </div>
                                    </div><!-- End Post item -->
                                
                                    */ ?>
                                </div>
                            </div><!-- End Widget posts -->
                            <?php                                
                            }
                            else{
                        ?>

                        <!-- Widget posts -->
                        <div class="widget">
                            <div class="widget_title"><h3>Login Anggota :</h3></div>
                            <div class="tb_widget_posts_big clearfix">
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                            <?php echo $this->session->flashdata('error_login'); ?>
                                            <form action="<?php echo site_url('member/login') ?>" method="POST">
                                                <label class="control-label">Username :</label>
                                                <input type="text" class="form-control" name="username"><br>
                                                <label for="" class="control-label">Password</label>
                                                <input type="password" name="password" class="form-control">  
                                                <br>
                                                <button class="btn btn_blue"><i class="fa fa-sign-in"></i> Login</button>
                                            </form>
                                        <a href="<?php echo site_url('member/register') ?>"><i class="fa fa-pencil"></i> Registrasi Anggota</a><br>
                                        <a href="<?php echo site_url('member/lupa_password') ?>"><i class="fa fa-key"></i> Lupa Password</a>
                                        
                                    </div>
                                </div>
                                <?php /** ?>
                                <!-- Post item -->
                                <div class="item clearfix">
                                    <div class="item_content">
                                        <h4><a href="post_single.html"><span class="format" jQuery>Live</span>Robin van Persie may lose Manchester United place after dip in belief</a></h4>
                                        <p>Aenean eu convallis elit. Quisque non felis vel tortor pellentesque consectetur vitae [...]</p>
                                        <div class="item_meta clearfix">
                                            <span class="meta_date">June 18, 2014</span>
                                            <span class="meta_comments"><a href="post_single.html">371</a></span>
                                            <span class="meta_likes"><a href="#">64</a></span>
                                        </div>
                                    </div>
                                </div><!-- End Post item -->
                                <!-- Post item -->
                                <div class="item clearfix">
                                    <div class="item_content">
                                        <h4><a href="post_single.html"><span class="format" jQuery>Video</span>Arsène Wenger calls players naive after Arsenal lose to Manchester United</a></h4>
                                        <p>Aenean eu convallis elit. Quisque non felis vel tortor pellentesque consectetur vitae [...]</p>
                                        <div class="item_meta clearfix">
                                            <span class="meta_date">May 18, 2014</span>
                                            <span class="meta_comments"><a href="post_single.html">4571</a></span>
                                            <span class="meta_likes"><a href="#">356</a></span>
                                        </div>
                                    </div>
                                </div><!-- End Post item -->
                            
                                */ ?>
                            </div>
                        </div><!-- End Widget posts -->
                        <?php  
                            }
                        ?>

                        <!-- Widget recent posts -->
                        <div class="widget">
                            <div class="widget_title"><h3>Produk Kami</h3></div>
                            <div class="tb_widget_recent_list clearfix">
                                <?php foreach ($produkkami as $ef): ?>
                                <!-- Post item -->
                                <div class="item clearfix">
                                    <div class="item_thumb">
                                        <div class="thumb_icon">
                                            <a href="#"><i class="fa fa-copy"></i></a>
                                        </div>
                                        <div class="thumb_hover">
                                            <a href="<?php echo site_url('web/view_produk/'.$ef->id.'/'.str_replace(' ', '-', $ef->nama))  ?>"><img src="<?php echo base_url('img/produk/'.$ef->img) ?>" alt="Post"></a>
                                        </div>
                                    </div>
                                    <div class="item_content">
                                        <h4><a href="<?php echo site_url('web/view_produk/'.$ef->id.'/'.str_replace(' ', '-', $ef->nama)) ?>"><?php echo $ef->nama ?></a></h4>
                                        <div class="item_meta clearfix">
                                            <span><?php echo substr($ef->intro, 0, 100) ?></span>
                                        </div>
                                    </div>
                                </div><!-- End Post item -->                                        
                                <?php endforeach ?>
                                
                                <?php /**  ?>
                                <!-- Post item -->
                                <div class="item clearfix">
                                    <div class="item_thumb">
                                        <div class="thumb_icon">
                                            <a href="#"><i class="fa fa-copy"></i></a>
                                        </div>
                                        <div class="thumb_hover">
                                            <a href="#"><img src="<?php echo base_url() ?>assets/webportal/demo/500x500/10.jpg" alt="Post"></a>
                                        </div>
                                    </div>
                                    <div class="item_content">
                                        <h4><a href="#">Nam at maximus sed tempus est ultrices convallis</a></h4>
                                        <div class="item_meta clearfix">
                                            <span class="meta_date">October 3, 2014</span>
                                            <span class="meta_comments"><a href="#">6</a></span>
                                        </div>
                                    </div>
                                </div><!-- End Post item -->
                                <!-- Post item -->
                                <div class="item clearfix">
                                    <div class="item_thumb">
                                        <div class="thumb_icon">
                                            <a href="#"><i class="fa fa-copy"></i></a>
                                        </div>
                                        <div class="thumb_hover">
                                            <a href="#"><img src="<?php echo base_url() ?>assets/webportal/demo/500x500/9.jpg" alt="Post"></a>
                                        </div>
                                    </div>
                                    <div class="item_content">
                                        <h4><a href="#">Nam at maximus sed tempus est ultrices eget</a></h4>
                                        <div class="item_meta clearfix">
                                            <span class="meta_date">October 3, 2014</span>
                                            <span class="meta_comments"><a href="#">6</a></span>
                                        </div>
                                    </div>
                                </div><!-- End Post item -->
                                */ ?>
                            </div>
                        </div><!-- End Widget recent posts -->
                        
                        <?php /** ?>
                        <!-- Widget top rated -->
                        <div class="widget">
                            <div class="widget_title"><h3>Top Article</h3></div>
                            <div class="tb_widget_top_rated clearfix">
                                <?php $no = 1; foreach ($toppost as $tp): ?>
                                    
                                <div class="item clearfix">
                                    <div class="item_thumb clearfix">
                                        <a href="#"><img src="<?php echo base_url('img/artikel/'.$tp->img) ?>" alt="Post" class="visible animated"></a>
                                    </div>
                                    <div class="item_content">
                                        <h4><a href="#"><?php echo $tp->judul ?></a></h4>
                                    </div>
                                    <div class="order"><?php echo $no++ ?></div>
                                </div><!-- End Post item -->
                                <?php endforeach ?>
                            </div>
                        </div>
                        */ ?>

                        
                        <!-- End Widget top rated -->
                        <!-- Widget timeline -->
                        <?php /** ?>
                        <div class="widget">
                            <div class="widget_title"><h3>Timeline</h3></div>
                            <div class="tb_widget_timeline clearfix">
                                <!-- Article -->
                                <article>
                                    <span class="date">08/27/2014</span>
                                    <span class="time">11:19 AM</span>
                                    <div class="timeline_content">
                                        <i class="fa fa-clock-o" jQuery></i>
                                        <h3><a href="post_single.html">Progressively foster low-risk high-yield.</a></h3>
                                    </div>
                                </article><!-- End Article -->
                                <!-- Article -->
                                <article>
                                    <span class="date">11/27/2014</span>
                                    <span class="time">14:59 AM</span>
                                    <div class="timeline_content">
                                        <i class="fa fa-clock-o" jQuery></i>
                                        <h3><a href="post_single.html">How to make the perfect sweet potato casserole</a></h3>
                                    </div>
                                </article><!-- End Article -->
                                <!-- Article -->
                                <article>
                                    <span class="date">03/8/2014</span>
                                    <span class="time">08:50 AM</span>
                                    <div class="timeline_content">
                                        <i class="fa fa-clock-o" jQuery></i>
                                        <h3><a href="post_single.html">Monotonectally strategize interactive users.</a></h3>
                                    </div>
                                </article><!-- End Article -->
                                <!-- Article -->
                                <article>
                                    <span class="date">08/27/2014</span>
                                    <span class="time">11:19 AM</span>
                                    <div class="timeline_content">
                                        <i class="fa fa-clock-o" jQuery></i>
                                        <h3><a href="post_single.html">Progressively foster low-risk high-yield.</a></h3>
                                    </div>
                                </article><!-- End Article -->
                                <!-- Article -->
                                <article>
                                    <span class="date">08/27/2014</span>
                                    <span class="time">11:19 AM</span>
                                    <div class="timeline_content">
                                        <i class="fa fa-clock-o" jQuery></i>
                                        <h3><a href="post_single.html">Progressively foster low-risk high-yield.</a></h3>
                                    </div>
                                </article><!-- End Article -->
                                <!-- Article -->
                                <article>
                                    <span class="date">18/12/2013</span>
                                    <span class="time">14:00 PM</span>
                                    <div class="timeline_content">
                                        <i class="fa fa-clock-o" jQuery></i>
                                        <h3><a href="post_single.html">Uniquely parallel leadership via one-to-one.</a></h3>
                                    </div>
                                </article><!-- End Article -->
                                <!-- Article -->
                                <article>
                                    <span class="date">10/4/2014</span>
                                    <span class="time">19:06 AM</span>
                                    <div class="timeline_content">
                                        <i class="fa fa-clock-o" jQuery></i>
                                        <h3><a href="post_single.html">Efficiently restore prospective alignments.</a></h3>
                                    </div>
                                </article><!-- End Article -->
                            </div>
                        </div><!-- End Widget timeline -->
                        */ ?>
                        <!-- Widget Banners 125 -->
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
                        </div><!-- End Widget Banners 125 -->

                        <!-- Widget Social widget -->
                        <div class="widget">
                            <div class="widget_title"><h3>Media Sosial</h3></div>
                            <div class="tb_widget_socialize clearfix">
                                <a href="http://www.facebook.com/" target="_blank" class="icon facebook">
                                    <div class="symbol"><i class="fa fa-facebook"></i></div>
                                    <div class="text"><p>Facebook</p></div>
                                </a>
                                <a href="https://plus.google.com" target="_blank"  class="icon google">
                                    <div class="symbol"><i class="fa fa-google-plus"></i></div>
                                    <div class="text"><p>Google+</p></div>
                                </a>
                                <a href="http://www.twitter.com/" target="_blank"  class="icon twitter">
                                    <div class="symbol"><i class="fa fa-twitter"></i></div>
                                    <div class="text"><p>Twitter</p></div>
                                </a>
                                <a href="http://www.linkedin.com/" target="_blank"  class="icon linkedin">
                                    <div class="symbol"><i class="fa fa-linkedin"></i></div>
                                    <div class="text"><p>LinkedIn</p></div>
                                </a>
                            </div>
                        </div><!-- End Widget Social widget -->

                        <!-- Widget Social widget -->
                        <div class="widget">
                            <div class="widget_title"><h3>Statistik Pengunjung</h3></div>
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <p>
                                        <strong><i class="fa fa-child"></i> Hari ini : </strong> <?php echo $hari_ini; ?> <br>
                                        <strong><i class="fa fa-child"></i> Bulan ini : </strong> <?php echo $bulan_ini ?> <br>
                                        <strong><i class="fa fa-bar-chart"></i> Hit Counter : </strong> <?php echo $hit_counter->hit_counter ?> <br>
                                        <strong><i class="fa fa-area-chart"></i> Total Hits : </strong> <?php echo $total_hit->total_hit ?> <br>
                                        <strong><i class="fa fa-users"></i> User Online : </strong> <?php echo $online ?> User
                                    </p>
                                </div>
                            </div>
                        </div><!-- End Widget Social widget -->                        
                    </div><!-- End Sidebar -->