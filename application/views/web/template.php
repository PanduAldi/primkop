<!DOCTYPE html>
<html>
<head>
    <title>Primkop Caraka | <?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons -->
    <link rel="icon" href="<?php echo base_url('img/logo_dharma.png') ?>">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/webadmin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/webportal/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/webportal/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/webportal/css/weather.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/webportal/css/colors.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/webportal/css/typography.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/webportal/css/style.css">   
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/data-animate.css">


    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" media="(max-width:768px)" href="<?php echo base_url() ?>assets/webportal/css/responsive-0.css">
    <link rel="stylesheet" type="text/css" media="(min-width:769px) and (max-width:992px)" href="<?php echo base_url() ?>assets/webportal/css/responsive-768.css">
    <link rel="stylesheet" type="text/css" media="(min-width:993px) and (max-width:1200px)" href="<?php echo base_url() ?>assets/webportal/css/responsive-992.css">
    <link rel="stylesheet" type="text/css" media="(min-width:1201px)" href="<?php echo base_url() ?>assets/webportal/css/responsive-1200.css">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:300,300italic,400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    
<style type="text/css">
    a:link {text-decoration: none}
    a:visited {text-decoration: none}
    a:active {text-decoration: none}
</style>    
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webadmin/ace_admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webportal/js/jqueryscript.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webportal/js/jqueryuiscript.min.js"></script>
</head>
<body>
    <!-- Wrapper -->
    <div id="wrapper" class="wide">            
        <!-- Header -->
        <header id="header" role="banner">                
            <?php  
                echo $_headertop;
                echo $_headerbottom;
            ?>
        </header><!-- End Header -->
        <!-- Section -->
        <section>
            <div class="container">
                <div class="row">
                    <!-- Main content -->
                    <div class="col col_9_of_12">
                        <?php echo $_content; ?>
                    </div><!-- End Main content -->
                    <!-- Sidebar -->
                    <?php echo $_sidebar; ?>                      
                </div>

            </div>
        </section><!-- End Section -->
        <!-- Footer -->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col col_3_of_12">
                        <!-- Widget Text widget -->
                        <div class="widget">
                            <div class="widget_title"><h3>Sekretariat Kami :</h3></div>
                            <p>Jl. lasiyono Oetomo 1 </p>
                            <p>Blok C No. 2 Komplek Peruri</p>
                            <p>Ciledug - Tanggerang - Banten</p>
                        </div><!-- End Widget text widget -->
                        <!-- Widget Social widget -->
                        <div class="widget">
                            <div class="widget_title"><h3>Socialize</h3></div>
                            <div class="tb_widget_socialize clearfix">
                                <a href="http://www.facebook.com/" target="_blank" class="icon facebook">
                                    <div class="symbol"><i class="fa fa-facebook"></i></div>
                                    <div class="text"><p>Facebook</p></div>
                                </a>
                                <a href="https://plus.google.com" target="_blank"  class="icon google">
                                    <div class="symbol"><i class="fa fa-google-plus"></i></div>
                                    <div class="text"><p>Google+</p></div>
                                </a>
                            </div>
                        </div><!-- End Widget Social widget -->
                    </div>
                    <div class="col col_3_of_12">
                        <!-- Widget top rated -->
                        <div class="widget">
                            <div class="widget_title"><h3>Top Article</h3></div>
                            <div class="tb_widget_top_rated clearfix">
                                <?php $no=1; foreach ($toppost_footer as $post_foo): ?>
                                <!-- Post item -->
                                <div class="item clearfix">
                                    <div class="item_thumb clearfix">
                                        <a href="<?php echo site_url('web/read/'.$post_foo->id_artikel.'/'.str_replace(array(' ', ',', ':', '--', '"'), '-', $post_foo->judul)) ?>"><img src="<?php echo base_url('img/artikel/'.$post_foo->img) ?>" alt="Post"></a>
                                    </div>
                                    <div class="item_content">
                                        <div class="item_meta clearfix">
                                        </div>
                                        <h4><a href="<?php echo site_url('web/read/'.$post_foo->id_artikel.'/'.str_replace(array(' ', ',', ':', '--', '"'), '-', $post_foo->judul)) ?>"><?php echo $post_foo->judul ?></a></h4>
                                    </div>
                                    <div class="order"><?php echo $no++ ?></div>
                                </div><!-- End Post item -->                                    
                                <?php endforeach ?>

                                <?php /**  ?>
                                <!-- Post item -->
                                <div class="item clearfix">
                                    <div class="item_thumb clearfix">
                                        <a href="#"><img src="<?php echo base_url() ?>assets/webportal/demo/500x500/7.jpg" alt="Post"></a>
                                    </div>
                                    <div class="item_content">
                                        <div class="item_meta clearfix">
                                            <span class="meta_rating" title="Rated 3.00 out of 5">
                                                <span jQuery>
                                                    <strong>3.00</strong>
                                                </span>
                                            </span>
                                        </div>
                                        <h4><a href="#">Nam at maximus nisl sed tempus est</a></h4>
                                    </div>
                                    <div class="order">2</div>
                                </div><!-- End Post item -->
                                <!-- Post item -->
                                <div class="item clearfix">
                                    <div class="item_thumb clearfix">
                                        <a href="#"><img src="<?php echo base_url() ?>assets/webportal/demo/500x500/5.jpg" alt="Post"></a>
                                    </div>
                                    <div class="item_content">
                                        <div class="item_meta clearfix">
                                            <span class="meta_rating" title="Rated 1.50 out of 5">
                                                <span jQuery>
                                                    <strong>1.50</strong>
                                                </span>
                                            </span>
                                        </div>
                                        <h4><a href="#">Nam at maximus nisl sed tempus est</a></h4>
                                    </div>
                                    <div class="order">3</div>
                                </div><!-- End Post item -->
                                */ ?>
                            </div>
                        </div><!-- End widget top rated -->
                    </div>
                    <div class="col col_3_of_12">
                        <!-- Widget recent posts -->
                        <div class="widget">
                            <div class="widget_title"><h3>Event Kami</h3></div>
                            <div class="tb_widget_recent_list clearfix">
                                <?php foreach ($event_footer as $ef): ?>
                                <!-- Post item -->
                                <div class="item clearfix">
                                    <div class="item_thumb">
                                        <div class="thumb_icon">
                                            <a href="<?php echo site_url('web/event/'.$ef->id.'/'.str_replace(array(' ', ',', ':', '--', '"'), '-', $ef->nama)) ?>"><i class="fa fa-copy"></i></a>
                                        </div>
                                        <div class="thumb_hover">
                                            <a href="<?php echo site_url('web/event/'.$ef->id.'/'.str_replace(array(' ', ',', ':', '--', '"'), '-', $ef->nama)) ?>"><img src="<?php echo base_url('img/event/'.$ef->img) ?>" alt="Post"></a>
                                        </div>
                                    </div>
                                    <div class="item_content">
                                        <h4><a href="<?php echo site_url('web/event/'.$ef->id.'/'.str_replace(array(' ', ',', ':', '--', '"'), '-', $ef->nama)) ?>"><?php echo $ef->nama ?></a></h4>
                                        <div class="item_meta clearfix">
                                            <span class="meta_date"><?php echo $this->idn_times->hari_indo($ef->date).", ".$this->idn_times->tgl_db($ef->date) ?></span>
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
                    </div>
                    <div class="col col_3_of_12">
                        <div class="widget">
                            <div class="widget_title"><h3>Informasi Anda</h3></div>
                            <div class="tb_widget_categories">
                                <p>
                                    IP Address Anda : <?php echo $ip_address ?><br>
                                    Browser Anda : <?php echo $browser ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!-- End Footer -->
        <!-- Copyright -->
        <div id="copyright" role="contentinfo">
            <div class="container">
                <p><a href="https://www.facebook.com/PanduAldiaja" target="_blank"><em>Caraka IT Team</em></a> &copy; 2015 Powered by. TrendyBlog Template. All rights reserved. <a href="http://themeforest.net/user/different-themes/portfolio?ref=CodeoStudio" target="_blank">CodeoStudio</a></p>
            </div>
        </div><!-- End Copyright -->
    </div><!-- End Wrapper -->
    
    <!-- Scripts -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webportal/js/easing.min.js"></script>        
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webportal/js/smoothscroll.min.js"></script>        
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webportal/js/magnific.min.js"></script>        
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webportal/js/bxslider.min.js"></script>        
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webportal/js/fitvids.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webportal/js/viewportchecker.min.js"></script>        
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webportal/js/init.js"></script>        
</body>
</html>
