    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Latest Blog Post</h4>

                </div>

            </div>
            <div class="row">
<?php foreach ($latest_articles as $latest): ?>

                          <div class="col-xs-12">
          <h2> <?php echo $latest['title']; ?></h2>
                          <p><span class="glyphicon glyphicon-calendar"></span> Date Posted:  <?php echo date('F  j , Y',strtotime($latest['date_posted'])); ?></p>
                <p><span class="glyphicon glyphicon-user"></span> Posted by: <?php echo $page_owner[0]['configValue'];?></p>
        <?php
       $content = strip_tags($latest['text']);

    if (strlen($content) > 250) {

      $stringCut = substr($content, 0, 500);
      $string_to_replace=".....";
        $content= substr($stringCut, 0, strrpos($stringCut, ' '))."&nbsp;&nbsp;".$string_to_replace;
        echo "<p align='justify'></br>".$content."</p>";
     }
    ?>
          <div class="text-center">
              <a  class='btn btn-primary' href='<?php echo base_url('article').'/'.$latest['slug'] ?>'><span class='glyphicon glyphicon-chevron-right'></span> View article</a>

          </div>
      </div>
<?php endforeach; ?>
            </div>
        </div>
    </div>