<!-- Static navbar -->

    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">

        <?php
                    //var_dump($nav_links);
                        foreach($nav_links as $links){
                             echo "<li><a href='".base_url()."pages/section/".$links['page_slug']."'><span class='glyphicon glyphicon-tag'></span> ".$links['page_name']."</a></li>";
                        }
                    ?>
                    <li><a href="<?php echo base_url()."pages/contactus"?>"><span class='glyphicon glyphicon-tag'></span> Contact</a></li>
</ul>
    </div>
</div>
</nav>