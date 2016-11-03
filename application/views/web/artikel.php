                        <div class="col col_12_of_12">
                            <!-- Page title -->
                            <h1 class="page_title">Artikel</h1><!-- End Page title -->
                            <!-- Row -->
                            <div class="row">
                                <div class="col col_12_of_12">
                                    <?php foreach ($artikel as $art): ?>
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_2 clearfix">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="<?php echo site_url('web/read/'.$art->id_artikel."/".str_replace(array(' ',',',':','--'), '-', $art->judul)) ?>" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="<?php echo site_url('web/read/'.$art->id_artikel."/".str_replace(array(' ',',',':','--'), '-', $art->judul)) ?>"><img src="<?php echo base_url('img/artikel/'.$art->img) ?>" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="<?php echo site_url('web/read/'.$art->id_artikel.'/'.str_replace(array(' ',',',':','--'), '-', $art->judul)) ?>">Read more</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="<?php echo site_url('web/read/'.$art->id_artikel.'/'.str_replace(array(' ',',',':','--'), '-', $art->judul)) ?>"><?php echo $art->judul ?></a></h4>
                                            <p><?php echo substr($art->intro, 0, 350) ?> [...]</p>
                                            <div class="item_meta clearfix">
                                            <span class="meta_date"><?php echo $this->idn_times->hari_indo($art->tgl).", ".$this->idn_times->tgl_db($art->tgl) ?></span>
                                        </div>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                        
                                    <?php endforeach ?>
                                    
                                    <?php /** ?>
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_2 clearfix">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="post_single.html"><img src="demo/500x300/2.jpg" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="blog.html">Football</a></span>
                                                <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti ed congue sodales hac habitasse platea dictumst</a></h4>
                                            <p>In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. Pellentesque venenatis velit. In et consequat nisi, at condimentum arcu [...]</p>
                                            <div class="item_meta clearfix">
                                            <span class="meta_date">October 3, 2014</span>
                                            <span class="meta_likes"><a href="#">29</a></span>
                                        </div>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_2 clearfix">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="post_single.html"><img src="demo/500x300/3.jpg" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="blog.html">Football</a></span>
                                                <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti ed congue sodales hac habitasse platea dictumst</a></h4>
                                            <p>In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. Pellentesque venenatis velit. In et consequat nisi, at condimentum arcu [...]</p>
                                            <div class="item_meta clearfix">
                                            <span class="meta_date">October 3, 2014</span>
                                            <span class="meta_likes"><a href="#">29</a></span>
                                        </div>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_2 clearfix">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="post_single.html"><img src="demo/500x300/4.jpg" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="blog.html">Football</a></span>
                                                <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti ed congue sodales hac habitasse platea dictumst</a></h4>
                                            <p>In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. Pellentesque venenatis velit. In et consequat nisi, at condimentum arcu [...]</p>
                                            <div class="item_meta clearfix">
                                            <span class="meta_date">October 3, 2014</span>
                                            <span class="meta_likes"><a href="#">29</a></span>
                                        </div>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_2 clearfix">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="post_single.html"><img src="demo/500x300/6.jpg" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="blog.html">Football</a></span>
                                                <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti ed congue sodales hac habitasse platea dictumst</a></h4>
                                            <p>In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. Pellentesque venenatis velit. In et consequat nisi, at condimentum arcu [...]</p>
                                            <div class="item_meta clearfix">
                                            <span class="meta_date">October 3, 2014</span>
                                            <span class="meta_likes"><a href="#">29</a></span>
                                        </div>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_2 clearfix">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="post_single.html"><img src="demo/500x300/7.jpg" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="blog.html">Football</a></span>
                                                <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti ed congue sodales hac habitasse platea dictumst</a></h4>
                                            <p>In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. Pellentesque venenatis velit. In et consequat nisi, at condimentum arcu [...]</p>
                                            <div class="item_meta clearfix">
                                            <span class="meta_date">October 3, 2014</span>
                                            <span class="meta_likes"><a href="#">29</a></span>
                                        </div>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_2 clearfix">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="post_single.html"><img src="demo/500x300/8.jpg" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="blog.html">Football</a></span>
                                                <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti ed congue sodales hac habitasse platea dictumst</a></h4>
                                            <p>In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. Pellentesque venenatis velit. In et consequat nisi, at condimentum arcu [...]</p>
                                            <div class="item_meta clearfix">
                                            <span class="meta_date">October 3, 2014</span>
                                            <span class="meta_likes"><a href="#">29</a></span>
                                        </div>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                    */ ?>
                                </div>
                            </div>
                            <!-- Pagination -->
                            <?php echo $pagination ?>
                            <!-- End Pagination -->
                            <!-- End Row -->
                        </div><!-- End Main content -->