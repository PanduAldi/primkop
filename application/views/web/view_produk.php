                        <!-- Main content -->
                        <div class="col col_12_of_12">
                            <!-- Product -->
                            <div class="product">
                                <!-- Images -->
                                <h1><?php echo $view_produk['nama'] ?></h1>
                                <div class="images" align="center">
                                    <a href="<?php echo base_url('img/produk/'.$view_produk['img']) ?>" class="popup_link"><img src="<?php echo base_url('img/produk/'.$view_produk['img']) ?>" class="img-rounded" alt="Product"></a>
                                </div><!-- End Images -->
                                <!-- Summary -->
                                <!-- Tabs -->
                                <div class="woocommerce-tabs">
                                    <div class="tab_content">
                                        <ul class="clearfix">
                                            <li><h4><a href="#tabs_1">Deskripsi Produk</a></h4></li>
                                        </ul>
                                        <div id="tabs_1">
                                            <h4><?php echo ucwords($view_produk['nama']) ?></h4>
                                            <?php echo $view_produk['deskripsi'] ?>
                                        </div>
                                    </div>
                                </div><!-- End Tabs -->
                                <!-- Related articles -->
                            <!-- You might also like -->
                            <br>
                            <div class="panel_title">
                                <div>
                                    <h4><a href="blog.html">Produk Lain</a></h4>
                                </div>
                            </div>
                            <div class="row"> 
                                
                                <?php foreach ($lihatlain as $lain): ?>
                                    
                                <div class="col col_4_of_12">
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_1">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="<?php echo site_url('web/view_produk/'.$lain->id.'/'.str_replace(' ', '-', $lain->nama)) ?>" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="<?php echo site_url('web/view_produk/'.$lain->id.'/'.str_replace(' ', '-', $lain->nama)) ?>"><img src="<?php echo base_url('img/produk/'.$lain->img) ?>" alt="Post" class="visible animated"></a>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="<?php echo site_url('web/view_produk/'.$lain->id.'/'.str_replace(' ', '-', $lain->nama)) ?>"><?php echo $lain->nama ?></a></h4>
                                            <p><?php echo substr($lain->intro, 0, 150) ?> [...]</p>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                </div>
                                <?php endforeach ?>
                             </div><!-- End You might also like -->                                
                            </div><!-- End Product -->
                        </div><!-- End Main content -->