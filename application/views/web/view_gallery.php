                     <!-- Main content -->
                        <div class="col col_12_of_12">
                        <!-- Panel title -->
                        <div class="panel_title">
                            <div>
                                <h4><a href="#">Gallery Detail</a></h4>
                            </div>
                        </div><!-- End Panel title -->
                        	<div class="row">

                        		<?php 
                        			if ($cek_gallery > 0) {
                        				
	                        			foreach ($view_gallery as $gal){
			                        		?>        
                                            <div class="col-lg-4 col-md-6 col-xs-12">
                                                <div class="thumbnail">
                                                <a href="<?php echo base_url('img/gallery/'.$gal->img) ?>" class="popup_link"><img src="<?php echo base_url('img/gallery/'.$gal->img) ?>" alt="Post"></a>
                                                  <div class="caption">
                                                    <div class="well well-sm">
                                                    <h4 align="center"><?php echo $gal->caption ?></h4>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div> 
			                        		<?php
	                        			 	}                        			

                        			}
                        			else
                        			{
                        				echo "<h3>Gallery Tidak Ada .. !!</h3>";
                        			}
                        		?>
                        	</div>
                        </div><!-- End Main content -->