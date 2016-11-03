                         <div class="col col_12_of_12">
                            <!-- Post -->
                            <article class="post">
                                <!-- Entry content -->
                                <div class="entry_content">
                                    <!-- Entry title -->
                                    <h1 class="entry_title"><?php echo ucwords($baca_event['nama']) ?></h1><!-- End Entry title -->
                                            <div class="item_meta clearfix">
                                                <span class="meta_date"><?php echo $this->idn_times->hari_indo($baca_event['date']).", ".$this->idn_times->tgl_db($baca_event['date']) ?></span>
                                            </div>
                                    <!-- Media -->
                                    <div class="entry_media">
                                        <span class="meta_likes"><a href="#"><i class="fa fa-heart"></i></a></span>
                                        <a href="<?php echo base_url('img/event/'.$baca_event['img']) ?>" class="popup_link"><img src="<?php echo base_url('img/event/'.$baca_event['img']) ?>" alt="Image"></a>
                                    </div><!-- End Media -->
                                    
                                    <?php echo $baca_event['isi'] ?>

                                    <br>
                                    <em>Caraka Team</em>
                                    <br>
                                </div>
                                <br>
                                <!-- Editor review -->
                            </article><!-- End Post -->
                            <!-- You might also like -->
                            <div class="panel_title">
                                <div>
                                    <h4><a href="#">Lihat Yang Lain</a></h4>
                                </div>
                            </div>
                            <div class="row"> 
                                
                                <?php foreach ($lihatlain as $lain): ?>
                                    
                                <div class="col col_4_of_12">
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_1">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="<?php echo site_url('web/event_read/'.$lain->id.'/'.str_replace(array(' ',',',':','--'), '-', $lain->nama)) ?>" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="<?php echo site_url('web/event_read/'.$lain->id.'/'.str_replace(array(' ',',',':','--'), '-', $lain->nama)) ?>"><img src="<?php echo base_url('img/event/'.$lain->img) ?>" alt="Post" class="visible animated"></a>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="<?php echo site_url('web/event_read/'.$lain->id.'/'.str_replace(array(' ',',',':','--'), '-', $lain->nama)) ?>"><?php echo $lain->nama ?></a></h4>
                                            <div class="item_meta clearfix">
                                                <span class="meta_date"><?php echo $this->idn_times->hari_indo($lain->date).", ".$this->idn_times->tgl_db($lain->date) ?></span>
                                            </div>
                                            <p><?php echo substr($lain->intro, 0, 150) ?> [...]</p>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                </div>
                                <?php endforeach ?>
                                <?php /** ?>
                                <div class="col col_4_of_12">
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_1">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="post_single.html" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="post_single.html"><img src="demo/500x500/11.jpg" alt="Post" class="visible animated"></a>
                                            </div>
                                            <div class="thumb_meta">
                                                <span class="category" jQuery><a href="blog.html">Music</a></span>
                                                <span class="comments"><a href="post_single.html">15 Comments</a></span>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="post_single.html">Maecenas tempor volutpat commodo uspendisse potenti</a></h4>
                                            <div class="item_meta clearfix">
                                                <span class="meta_date">October 3, 2014</span>
                                                <span class="meta_likes"><a href="#">29</a></span>
                                            </div>
                                            <p>In et consequat nisi, at arcu. In hac habitasse platea dictumst. Fusce vestibulum tincidunt magna vitae scelerisque. Pellentesque venenatis velit ut feugia [...]</p>
                                        </div>
                                    </div><!-- End Layout post 1 -->
                                </div>
                                */ ?>
                             </div><!-- End You might also like -->
                            <!-- End Respond -->
                        </div><!-- End Main content -->