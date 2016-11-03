                        <!-- Content slider -->
                        <div class="content_slider">
                            <ul>
                                <?php foreach ($slide as $sl): ?>
                                <!-- Item -->
                                <li>
                                    <img src="<?php echo base_url('img/artikel/'.$sl->img) ?>">
                                    <div class="slider_caption">
                                        <div class="thumb_link">
                                            <h3><a href="<?php echo site_url('web/read/'.$sl->id_artikel."/".str_replace(array(' ', '"',',',':','--'), '-', $sl->judul)) ?>"><?php echo $sl->judul ?></a></h3>
                                        </div>
                                    </div>
                                </li><!-- End Item -->  
                                <?php endforeach ?>
                                <?php /** ?>
                                <!-- Item -->
                                <li>
                                    <a href="post_single.html"><img src="<?php echo base_url() ?>assets/webportal/demo/content_slider/7.jpg" alt="Slider"></a>
                                    <div class="slider_caption">
                                        <div class="thumb_meta">
                                            <span class="category" jQuery><a href="blog.html">Technology</a></span>
                                            <span class="comments"><a href="post_single.html">358 Comments</a></span>
                                        </div>
                                        <div class="thumb_link">
                                            <h3><a href="post_single.html">Suspendisse porta quam eget nibh rhoncus eget ornare urna varius ed ut mauris augu uspendisse viverra elit libero</a></h3>
                                        </div>
                                    </div>
                                </li><!-- End Item -->
                                <!-- Item -->
                                <li>
                                    <a href="post_single.html"><img src="<?php echo base_url() ?>assets/webportal/demo/content_slider/5.jpg" alt="Slider"></a>
                                    <div class="slider_caption">
                                        <div class="thumb_meta">
                                            <span class="category" jQuery><a href="blog.html">Sport</a></span>
                                            <span class="comments"><a href="post_single.html">358 Comments</a></span>
                                        </div>
                                        <div class="thumb_link">
                                            <h3><a href="post_single.html">Suspendisse porta quam eget nibh rhoncus eget ornare urna varius ed ut mauris augu uspendisse viverra elit libero</a></h3>
                                        </div>
                                    </div>
                                </li><!-- End Item -->
                                **/ ?>
                            </ul>
                        </div><!-- End Content slider -->
                        <!-- Panel title -->
                        <div class="panel_title">
                            <div>
                                <h4><a href="<?php echo site_url('web/artikel/') ?>">News</a></h4>
                            </div>
                        </div><!-- End Panel title -->
                        <!-- Layout post 2 -->
                        <div class="row">
                            <?php foreach ($artikel_headline as $headline): ?>
                            <div class="col col_12_of_12">
                                <!-- Layout post 1 -->
                                <div class="layout_post_2 clearfix">
                                    <div class="item_thumb">
                                        <div class="thumb_icon">
                                            <a href="<?php echo site_url('web/read/'.$headline->id_artikel.'/'.str_replace(array(' ',',','"',':','--'), '-', $headline->judul)) ?>" jQuery><i class="fa fa-copy"></i></a>
                                        </div>
                                        <div class="thumb_hover">
                                            <a href="<?php echo site_url('web/read/'.$headline->id_artikel.'/'.str_replace(array(' ',',','"',':','--'), '-', $headline->judul)) ?>"><img src="<?php echo base_url('img/artikel/'.$headline->img) ?>" alt="Post"></a>
                                        </div>
                                        <div class="thumb_meta">
                                            <span class="category" jQuery><a href="<?php echo site_url('web/read/'.$headline->id_artikel.'/'.str_replace(array(' ',',','"',':','--'), '-', $headline->judul)) ?>">Read More</a></span>
                                        </div>
                                    </div>
                                    <div class="item_content">
                                        <h4><a href="<?php echo site_url('web/read/'.$headline->id_artikel.'/'.str_replace(array(' ',',','"',':','--'), '-', $headline->judul)) ?>"><?php echo $headline->judul ?></a></h4>
                                        <p><?php echo substr($headline->intro, 0, 250) ?> [...]</p>
                                        <div class="item_meta clearfix">
                                            <span class="meta_date"><?php echo $this->idn_times->hari_indo($headline->tgl).", ".$this->idn_times->tgl_db($headline->tgl) ?></span>
                                            <span><a href="#"><i class="fa fa-user"></i> By. <?php echo $headline->penulis ?></a></span>
                                        </div>
                                    </div>
                                </div><!-- End Layout post 1 -->
                            </div>
                            <?php endforeach ?>
                        </div><!-- End Layout post 2 -->
                        <div class="row">
                            <div class="panel_title" jQuery>
                                <div>
                                    <h4><a href="#">Event Kami</a></h4>
                                </div>
                            </div>
                            <?php foreach ($event_headline as $eh): ?>
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_2 clearfix">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="<?php echo site_url('web/event_read/'.$eh->id."/".str_replace(' ', '-', $eh->nama)) ?>" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="<?php echo site_url('web/event_read/'.$eh->id."/".str_replace(' ', '-', $eh->nama)) ?>"><img src="<?php echo base_url('img/event/'.$eh->img) ?>" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="<?php echo site_url('web/event_read/'.$eh->id.'/'.str_replace(' ', '-', $eh->nama)) ?>">Read more</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="<?php echo site_url('web/event_read/'.$eh->id.'/'.str_replace(' ', '-', $eh->nama)) ?>"><?php echo $eh->nama ?></a></h4>
                                            <p><?php echo substr($eh->intro, 0, 150) ?> [...]</p>
                                            <div class="item_meta clearfix">
                                            <span class="meta_date"><?php echo $this->idn_times->hari_indo($eh->date).", ".$this->idn_times->tgl_db($eh->date) ?></span>
                                        </div>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                            <?php endforeach ?>
                            <br>    
                            <?php /** ?>
                            <div class="col col_4_of_12">
                                <!-- Top review -->
                                <div class="top_review">
                                    <div class="item_content">
                                        <a class="hover_effect" href="#">
                                            <div class="result" jQuery><i class="fa fa-copy"></i></div>
                                            <img src="<?php echo base_url('img/event/'.$eh->img) ?>" alt="Post">
                                        </a>
                                        <h4><a href="post_single.html"><span class="format" jQuery>Travel</span>Curabitur et egestas ante ellentesque hendrerit</a></h4>
                                    </div>
                                    <div class="full_meta clearfix">
                                    </div>
                                    <div class="transition_line"></div>
                                </div><!-- End Top review -->
                            </div>
                            <div class="col col_4_of_12">
                                <!-- Top review -->
                                <div class="top_review">
                                    <div class="item_content">
                                        <a class="hover_effect" href="post_single.html">
                                            <div class="result" jQuery>3.0</div>
                                            <img src="<?php echo base_url() ?>assets/webportal/demo/500x500/10.jpg" alt="Post">
                                        </a>
                                        <h4><a href="post_single.html"><span class="format" jQuery>Sport</span>Curabitur et egestas ante ellentesque hendrerit</a></h4>
                                    </div>
                                    <div class="full_meta clearfix">
                                        <span class="meta_rating">
                                            <span jQuery><strong>3.00</strong></span>
                                        </span>
                                    </div>
                                    <div class="transition_line"></div>
                                </div><!-- End Top review -->
                            </div>
                            */ ?>

                        </div>
                        <?php /** ?>
                        <!-- Panel title -->
                        <div class="panel_title">
                            <div>
                                <h4><a href="blog.html">Music</a></h4>
                            </div>
                        </div><!-- End Panel title -->
                        <!-- Layout post 2 -->
                        <div class="row">
                            <div class="col col_12_of_12">
                                <!-- Layout post 1 -->
                                <div class="layout_post_2 clearfix">
                                    <div class="item_thumb">
                                        <div class="thumb_icon">
                                            <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                        </div>
                                        <div class="thumb_hover">
                                            <a href="post_single.html"><img src="<?php echo base_url() ?>assets/webportal/demo/500x300/3.jpg" alt="Post"></a>
                                        </div>
                                        <div class="thumb_meta">
                                            <span class="category" jQuery><a href="blog.html">Travel</a></span>
                                            <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                        </div>
                                    </div>
                                    <div class="item_content">
                                        <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti ed congue sodales hac habitasse platea dictumst</a></h4>
                                        <p>In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque.  In et consequat nisi, at condimentum arcu [...]</p>
                                        <div class="item_meta clearfix">
                                            <span class="meta_date">October 3, 2014</span>
                                            <span class="meta_likes"><a href="#">29</a></span>
                                        </div>
                                    </div>
                                </div><!-- End Layout post 1 -->
                            </div>
                            <div class="col col_12_of_12">
                                <!-- Layout post 1 -->
                                <div class="layout_post_2 clearfix">
                                    <div class="item_thumb">
                                        <div class="thumb_icon">
                                            <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                        </div>
                                        <div class="thumb_hover">
                                            <a href="post_single.html"><img src="<?php echo base_url() ?>assets/webportal/demo/500x300/6.jpg" alt="Post"></a>
                                        </div>
                                        <div class="thumb_meta">
                                            <span class="category" jQuery><a href="blog.html">Fashion</a></span>
                                            <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                        </div>
                                    </div>
                                    <div class="item_content">
                                        <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti ed congue sodales hac habitasse platea dictumst</a></h4>
                                        <p>In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque.  In et consequat nisi, at condimentum arcu [...]</p>
                                        <div class="item_meta clearfix">
                                            <span class="meta_date">October 3, 2014</span>
                                            <span class="meta_likes"><a href="#">29</a></span>
                                        </div>
                                    </div>
                                </div><!-- End Layout post 1 -->
                            </div>
                        </div><!-- End Layout post 2 -->
                        */ ?>                   
    
                        <!-- Panel title -->
                        <div class="panel_title">
                            <div>
                                <h4><a href="shop.html">Gallery</a></h4>
                            </div>
                        </div><!-- End Panel title -->
                        <!-- Products -->
                        <ul class="products clearfix">
                           <?php foreach ($gallery_headline as $gh): ?>
                            <!-- Product first -->
                            <li class="product">
                                <!-- Thumb -->
                                <div class="item_thumb">
                                    <h3><a href="<?php echo site_url('web/view_gallery/'.$gh->id_gallery.'/'.str_replace(' ', '-', $gh->nama)) ?>"><?php echo $gh->nama ?></a></h3>
                                    <div class="thumb_icon">
                                        <a href="<?php echo site_url('web/view_gallery/'.$gh->id_gallery.'/'.str_replace(' ', '-', $gh->nama)) ?>"><i class="fa fa-copy"></i></a>
                                    </div>
                                    <div class="thumb_hover">
                                        <a href="<?php echo site_url('web/view_gallery/'.$gh->id_gallery.'/'.str_replace(' ', '-', $gh->nama)) ?>"><img src="<?php echo base_url('img/thumb/'.$gh->thumb) ?>" alt="Post"></a>
                                    </div>
                                </div><!-- End Thumb -->
                            </li><!-- End Product first -->                               
                           <?php endforeach ?>

                            <?php /** ?>
                            <!-- Product -->
                            <li class="product">
                                <!-- Thumb -->
                                <div class="item_thumb">
                                    <h3><a href="shop_single.html">Flying Ninja</a></h3>
                                    <div class="thumb_icon">
                                        <a href="shop_single.html"><i class="fa fa-copy"></i></a>
                                    </div>
                                    <div class="thumb_hover">
                                        <a href="shop_single.html"><img src="<?php echo base_url() ?>assets/webportal/demo/325x325/2.jpg" alt="Post"></a>
                                    </div>
                                </div><!-- End Thumb -->
                                <!-- Info -->
                                <div class="info">
                                    <div class="item_meta clearfix">
                                        <span class="meta_rating" title="Rated 2.50 out of 5">
                                            <span jQuery>
                                                <strong>2.50</strong>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="price">
                                        <span class="amount">£12.00</span>
                                    </span>
                                </div><!-- End Info -->
                                <a href="shop_single.html" class="btn">Add to cart</a>
                            </li><!-- End Product -->
                            <!-- Product -->
                            <li class="product">
                                <!-- Thumb -->
                                <div class="item_thumb">
                                    <h3><a href="shop_single.html">Flying Ninja</a></h3>
                                    <div class="thumb_icon">
                                        <a href="shop_single.html"><i class="fa fa-copy"></i></a>
                                    </div>
                                    <div class="thumb_hover">
                                        <a href="shop_single.html"><img src="<?php echo base_url() ?>assets/webportal/demo/325x325/7.jpg" alt="Post"></a>
                                    </div>
                                </div><!-- End Thumb -->
                                <!-- Info -->
                                <div class="info">
                                    <div class="item_meta clearfix">
                                        <span class="meta_rating" title="Rated 2.00 out of 5">
                                            <span jQuery>
                                                <strong>2.00</strong>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="price">
                                        <span class="amount">£12.00</span>
                                    </span>
                                </div><!-- End Info -->
                                <a href="shop_single.html" class="btn">Add to cart</a>
                            </li><!-- End Product -->
                            <!-- Product last -->
                            <li class="product last">
                                <!-- Thumb -->
                                <div class="item_thumb">
                                    <h3><a href="shop_single.html">Flying Ninja</a></h3>
                                    <div class="thumb_icon">
                                        <a href="shop_single.html"><i class="fa fa-copy"></i></a>
                                    </div>
                                    <div class="thumb_hover">
                                        <a href="shop_single.html"><img src="<?php echo base_url() ?>assets/webportal/demo/325x325/4.jpg" alt="Post"></a>
                                    </div>
                                </div><!-- End Thumb -->
                                <!-- Info -->
                                <div class="info">
                                    <div class="item_meta clearfix">
                                        <span class="meta_rating" title="Rated 4.50 out of 5">
                                            <span jQuery>
                                                <strong>4.50</strong>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="price">
                                        <span class="amount">£12.00</span>
                                    </span>
                                </div><!-- End Info -->
                                <a href="shop_single.html" class="btn">Add to cart</a>
                            </li><!-- End Product last -->
                            */ ?>
                        </ul><!-- End Products -->