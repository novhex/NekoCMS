    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line"><?php echo ucwords($page_slug); ?></h4>

                </div>

            </div>
            <div class="row">

                    <?php if($categ_news!=NULL){ ?>
  <?php foreach ($categ_news as $categNews): ?>

      <div class="row">
          <div class="col-md-12">
              <h2> <?php echo $categNews['title']; ?></h2>

                <p><span class="glyphicon glyphicon-calendar"></span> Date Posted:  <?php echo date('F  j , Y',strtotime($categNews['date_posted'])); ?></p>
                <p><span class="glyphicon glyphicon-user"></span> Posted by: <?php echo $page_owner[0]['configValue'];?></p>
                <p><span class="glyphicon glyphicon-eye-open"></span> Views: <?php  echo $this->viewercounter->incrementViews($categNews['id']); ?></p>
            <?php
           $content = strip_tags($categNews['text']);

        if (strlen($content) > 250) {

          $stringCut = substr($content, 0, 500);
          $string_to_replace=".....";
            $content= substr($stringCut, 0, strrpos($stringCut, ' '))."&nbsp;&nbsp;".$string_to_replace;
            echo "<p align='justify'></br>".$content."</p>";
         }
        ?>
              <div class="text-center">
                  <a  class='btn btn-primary' href='<?php echo base_url('article').'/'.$categNews['slug'] ?>'><span class='glyphicon glyphicon-chevron-right'></span> View article</a>

              </div>
          </div>
      </div>

    <?php endforeach; }else{
      echo "<div class='alert alert-info'><strong>Info</strong> <p> No posts yet in this category</div>";
      }?>


<?php echo "<br><br><center><p> Page Navigation: ".$this->pagination->create_links()."</p></center>"; ?>

  </div>


        </div>
    </div>