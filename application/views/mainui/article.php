<?php
foreach($article_contents as $articleinfo):
?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line"><?php echo  ucwords($slug); ?></h4>

                </div>

            </div>
            <div class="row">

                <div class="col-md-12">
                <p><span class="glyphicon glyphicon-calendar"></span> Date Posted:  <?php echo date('F  j , Y',strtotime($articleinfo['date_posted'])); ?></p>
                <p><span class="glyphicon glyphicon-user"></span> Posted by: <?php echo $page_owner[0]['configValue'];?></p>

                <p><?php echo $articleinfo['text']; ?></p>


                </div>

            </div>

 <div class="text-center">
 <p style="font-weight:bold;"> Because sharing is caring :)</p>

                        <a href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=".base_url()."article/".$articleinfo['slug']; ?>" class="btn btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>&nbsp; Facebook</a>
                        <a href="<?php echo "ttps://plus.google.com/share?url=".base_url()."article/".$articleinfo['slug']; ?>" class="btn btn-social btn-google">
                            <i class="fa fa-google-plus"></i>&nbsp; Google +</a>
                        <a href="<?php echo "https://twitter.com/home?status=".base_url()."article/".$articleinfo['slug']; ?>" class="btn btn-social btn-twitter">
                            <i class="fa fa-twitter"></i>&nbsp; Twitter </a>
                       
                    </div>
           
        </div>
    </div>
      <?php endforeach; ?>