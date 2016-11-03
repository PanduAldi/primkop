                         <div class="col col_12_of_12">
                            <!-- Post -->
                            <article class="post">
                                <!-- Entry content -->
                                <div class="entry_content">
                                    <!-- Entry title -->
                                    <div class="alert-delay">
                                        <?php echo $this->session->flashdata('comment_success'); ?>                                        
                                    </div>
                                    <h1 class="entry_title"><?php echo ucwords($baca_artikel['judul']) ?></h1><!-- End Entry title -->
                                            <div class="item_meta clearfix">
                                                <span class="meta_date"><?php echo $this->idn_times->hari_indo($baca_artikel['tgl']).", ".$this->idn_times->tgl_db($baca_artikel['tgl'])." By. ".ucwords($baca_artikel['penulis']) ?></span>
                                            </div>
                                    <!-- Media -->
                                    <div class="entry_media">
                                        <span class="meta_likes"><a href="#"><i class="fa fa-heart"></i></a></span>
                                        <a href="<?php echo base_url('img/artikel/'.$baca_artikel['img']) ?>" class="popup_link"><img src="<?php echo base_url('img/artikel/'.$baca_artikel['img']) ?>" alt="Image"></a>
                                    </div><!-- End Media -->
                                    
                                    <?php echo $baca_artikel['isi'] ?>

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
                                    <h4><a href="blog.html">Lihat Artikel Terbaru</a></h4>
                                </div>
                            </div>
                            <div class="row"> 
                                
                                <?php foreach ($lihatlain as $lain): ?>
                                    
                                <div class="col col_4_of_12">
                                    <!-- Layout post 1 -->
                                    <div class="layout_post_1">
                                        <div class="item_thumb">
                                            <div class="thumb_icon">
                                                <a href="<?php echo site_url('web/read/'.$lain->id_artikel.'/'.str_replace(array(' ', ',', ':', '--', '"'), '-', $lain->judul)) ?>" jQuery><i class="fa fa-copy"></i></a>
                                            </div>
                                            <div class="thumb_hover">
                                                <a href="<?php echo site_url('web/read/'.$lain->id_artikel.'/'.str_replace(array(' ', ',', ':', '--', '"'), '-', $lain->judul)) ?>"><img src="<?php echo base_url('img/artikel/'.$lain->img) ?>" alt="Post" class="visible animated"></a>
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h4><a href="<?php echo site_url('web/read/'.$lain->id_artikel.'/'.str_replace(array(' ', ',', ':', '--', '"'), '-', $lain->judul)) ?>"><?php echo $lain->judul ?></a></h4>
                                            <div class="item_meta clearfix">
                                                <span class="meta_date"><?php echo $this->idn_times->hari_indo($lain->tgl).", ".$this->idn_times->tgl_db($lain->tgl) ?></span>
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
                            <!-- Comments -->
                            <div id="comments">
                                <div class="panel_title">
                                    <div>
                                        <h4><a href="blog.html">Kometar Anda</a></h4>
                                    </div>
                                </div>

                                <ol class="comment_list">
                                    <?php foreach ($komentar as $kom): ?>
                                        <li>
                                            <article>
                                                <div class="comment_overflow">
                                                    <div class="comment_meta">
                                                        <h5><a href="#"><?php echo $kom->nama ?></a></h5>
                                                        <span><?php echo $this->idn_times->hari_indo($kom->date).", ".$this->idn_times->tgl_db($kom->date) ?></span>
                                                    </div>
                                                    <div class="comment_content"><?php echo $kom->comment ?></div>
                                                </div>
                                            </article>
                                            <?php 
                                                $cek_komen = $this->db->query("SELECT * FROM tb_comment WHERE id_comment = '$kom->id'");
                                                if ($cek_komen->num_rows() > 0) {
                                                    $reply_comment = $this->db->query("SELECT * FROM tb_comment WHERE id_comment = '$kom->id'")->result();
                                                    foreach ($reply_comment as $reply) {
                                                    ?>
                                                    <ul class="children">
                                                        <li>
                                                            <article>
                                                                <div class="comment_overflow">
                                                                    <div class="comment_meta">
                                                                        <h5><a href="#"><?php echo $reply->nama ?> </a><span class="badge"><?php echo $reply->badge ?></span></h5>
                                                                        <span><?php echo $this->idn_times->hari_indo($kom->date).", ".$this->idn_times->tgl_db($kom->date) ?></span>
                                                                    </div>
                                                                    <div class="comment_content"><?php echo $reply->comment ?></div>
                                                                </div>
                                                            </article>
                                                        </li>
                                                    </ul>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                        </li>                                        
                                    <?php endforeach ?>
                                </ol>
                            </div><!-- End Comments -->
                            <!-- Respond -->
                            <div id="respond">
                                <h3>Komentar :</h3>
                                <form action="" method="POST">
                                    <p>
                                        <label>Name<span>*</span></label>
                                        <input type="text" name="nama">
                                    </p>
                                    <p>
                                        <label>Email<span>*</span></label>
                                        <input type="text" name="email">
                                    </p>
                                    <p>
                                        <label>Website <span>*</span></label>
                                        <input type="text" name="website">
                                    </p>
                                    <p>
                                        <label>Comment<span>*</span></label>
                                        <textarea name="komentar"></textarea>
                                    </p>
                                    <input name="submit" type="submit" id="submit" value="Post a comment" class="btn">
                                </form>
                            </div>
                            <!-- End Respond -->
                        </div><!-- End Main content -->


<script>
    $(function(){
        $(".alert-delay").delay(1000).fadeOut(500);
    })
</script>