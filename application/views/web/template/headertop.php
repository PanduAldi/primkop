            <!-- Header meta -->
            <div class="header_meta">
                <div class="container">
                    <!-- Weather forecast -->
                    <div class="weather_forecast">
                        <i class="wi wi-day-clock-o"></i>
                        <span class="city"><?php echo $hari.", ".$tanggal; ?></span>
                    </div><!-- End Weather forecast -->
                    <!-- Top menu -->
                    <nav class="top_navigation" role="navigation">
                        <span class="top_navigation_toggle"><i class="fa fa-reorder"></i></span>
                        <ul class="menu">

                            <?php  
                                if ($this->session->userdata('member_login') == true)
                                {
                                    ?>
                                    <li><a href="#"><i class="fa fa-download"></i> Dowload Aplikasi Prima Jek</a></li>
                                    <li><a href="<?php echo site_url('member/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                                    <?php
                                }
                                else
                                {
                                    echo '<li><a href="#">Selamat Datang di Website Primkop Caraka</a></li>';
                                }
                            ?>
                            <!--
                            <li class="menu-item-has-children"><a href="#">Pages</a>
                                <span class="top_sub_menu_toggle"></span>
                                <ul class="sub-menu">
                                    <li><a href="page_404.html">404 Page</a></li>
                                    <li><a href="page_contact.html">Contact page</a></li>
                                    <li><a href="page_fullwidth.html">Fullwidth page</a></li>
                                    <li><a href="page_shortcodes.html">Shortcodes</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="blog.html">Blog</a>
                                <span class="top_sub_menu_toggle"></span>
                                <ul class="sub-menu">
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog_1.html">Blog 1</a></li>
                                    <li><a href="blog_2.html">Blog 2</a></li>
                                    <li><a href="blog_3.html">Blog 3</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="post_single.html">Post</a>
                                <span class="top_sub_menu_toggle"></span>
                                <ul class="sub-menu">
                                    <li><a href="post_single.html">Post image</a></li>
                                    <li><a href="post_gallery.html">Post gallery</a></li>
                                    <li><a href="post_video.html">Post video</a></li>
                                    <li><a href="post_audio.html">Post audio</a></li><li><a href="post_none.html">Post none</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="post_single.html">Shop</a>
                                <span class="top_sub_menu_toggle"></span>
                                <ul class="sub-menu">
                                    <li><a href="shop.html">Category shop</a></li>
                                    <li><a href="shop_single.html">Single product</a></li>
                                </ul>
                            </li>
                            -->
                            <li class="search_icon_form"><a href="#"><i class="fa fa-search"></i></a>
                                <div class="sub-search">
                                    <form>
                                        <input type="search" placeholder="Search...">
                                        <input type="submit" value="Search">
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </nav><!-- End Top menu -->
                </div>
            </div><!-- End Header meta -->