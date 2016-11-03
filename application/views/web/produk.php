                        <div class="col col_12_of_12">
                            <!-- Page title -->
                            <h1 class="page_title">Produk Kami </h1><!-- End Page title -->
                            <!-- Row -->
                            <div class="row">
                                <?php foreach ($produk as $prod): ?>
                                <div class="col-lg-6 col-xs-12">
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_1">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="<?php echo site_url('web/view_produk/'.$prod->id.'/'.str_replace(' ','-', $prod->nama)) ?>" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="<?php echo site_url('web/view_produk/'.$prod->id.'/'.str_replace(' ','-', $prod->nama)) ?>"><img src="<?php echo base_url('img/produk/'.$prod->img) ?>" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="<?php echo site_url('web/view_produk/'.$prod->id.'/'.str_replace(' ','-', $prod->nama)) ?>">Lihat fetail Produk</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="<?php echo site_url('web/view_produk/'.$prod->id.'/'.str_replace(' ','-', $prod->nama)) ?>"><?php echo ucwords($prod->nama) ?></a></h4>
                                            <p><?php echo substr($prod->intro, 0, 150) ?> [...]</p>
                                        </div>
                                    </div><!-- End Layout post 1 -->                                  
                                </div>
                                <?php endforeach ?>
                                
                                <?php /** ?>
                                <div class="col col_6_of_12">
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_1">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="post_single.html"><img src="demo/500x500/6.jpg" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="blog.html">Music</a></span>
                                                <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti ed congue sodales</a></h4>
                                            <p>In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. Pellentesque venenatis velit ut feugia [...]</p>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                </div>
                                <div class="clearfix"></div>
                                <div class="col col_6_of_12">
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_1">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="post_single.html"><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="post_single.html"><img src="demo/500x500/7.jpg" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category"><a href="blog.html">Football</a></span>
                                                <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti ed congue sodales</a></h4>
                                            <p>In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. Pellentesque venenatis velit ut feugia [...]</p>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                </div>
                                <div class="col col_6_of_12">
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_1">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="post_single.html"><img src="demo/500x500/8.jpg" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="blog.html">Technology</a></span>
                                                <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti ed congue sodales</a></h4>
                                            <p>In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. Pellentesque venenatis velit ut feugia [...]</p>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                </div>
                                <div class="clearfix"></div>
                                <div class="col col_6_of_12">
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_1">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="post_single.html"><img src="demo/500x500/9.jpg" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="blog.html">Music</a></span>
                                                <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti ed congue sodales</a></h4>
                                            <p>In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. Pellentesque venenatis velit ut feugia [...]</p>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                </div>
                                <div class="col col_6_of_12">
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_1">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="post_single.html"><img src="demo/500x500/10.jpg" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="blog.html">Football</a></span>
                                                <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti ed congue sodales</a></h4>
                                            <p>In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. Pellentesque venenatis velit ut feugia [...]</p>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                </div>
                                <div class="clearfix"></div>
                                <div class="col col_6_of_12">
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_1">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="post_single.html"><img src="demo/500x500/12.jpg" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="blog.html">Business</a></span>
                                                <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti ed congue sodales</a></h4>
                                            <p>In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. Pellentesque venenatis velit ut feugia [...]</p>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                </div>
                                <div class="col col_6_of_12">
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_1">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="post_single.html"><img src="demo/500x500/13.jpg" alt="Post"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="blog.html">Football</a></span>
                                                <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti ed congue sodales</a></h4>
                                            <p>In et consequat nisi, at condimentum arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. Pellentesque venenatis velit ut feugia [...]</p>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                </div>
                                */ ?>
                            </div>
                            <!-- End Row -->
                        </div><!-- End Main content -->