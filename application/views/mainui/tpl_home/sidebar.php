    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <?php  foreach($nav_links as $links){ 
                            
                         ?>
                            
                            <li><a href="<?php echo base_url('section').'/'.$links['page_slug'];?>"><?php echo $links['page_name']; ?></a></li>

                        <?php }?>
                            <li><a href="<?php echo base_url('contactus');?>">Contact</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>