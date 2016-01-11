<div class="container">
        <div class="page-header">
            <div class="clearfix">
                <div class="col-md-12">
                    <div class="col-md-8 col-sm-6 col-xs-12">

                        <h1>Section &raquo; <small><?php echo ucwords($page_slug); ?></small></h1>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="clearfix">
            <div class="row wrap">
        <div class="col-sm-3">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Sidebar Menu</h2>
                    <div class="panel panel-default">

                      <?php foreach($page_owner as $owner): ?>
                        <div class="panel-heading"><span class="glyphicon glyphicon-question-sign"></span> About <?php echo $owner['configValue']; ?> </div>
                      <?php endforeach; ?>
                        <div class="panel-body">
                          <?php foreach($ownerphoto as $photo):?>
                          <img data-holder-rendered="true" src="<?php echo $photo['profile_photo']; ?>" style="width: 150px; height: 150px;" data-src="holder.js/200x200" class="img-thumbnail" alt="default_user's photo">

                          <p align='justify'><?php echo "<em>\" ".$photo['short_motto']." \"</em>"; ?></p>
                        <?php endforeach; ?>
                        </div>

                    </div>
                    <hr />
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="glyphicon glyphicon-stats"></span> Site Statistics</div>
                        <div class="panel-body">
                         <p><span class="glyphicon glyphicon-pushpin"></span> <?php echo $postcount; ?> Articles Posted</p>
                          <p><span class="glyphicon glyphicon-eye-open"></span> <?php echo $visitor_counter; ?>  Unique Visitors</p>
                        </div>

                    </div>

                    <hr />
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class='glyphicon glyphicon-link'></span> Quick Links</div>
                        <div class="panel-body">
                          <?php
                          foreach($sidebarlinks as $sidebar_links):
                            echo "<ul style='list-style-type:none;'>";
                            echo "<li> <a href='".base_url()."pages/section/".$sidebar_links['page_slug']."'><span class='glyphicon glyphicon-tags'></span> &nbsp; ".$sidebar_links['page_name']."</a></li>";
                            echo "</ul>";
                        endforeach;
                          ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    <div class="col-sm-9">
        <?php if($categ_news!=NULL){ ?>
  <?php foreach ($categ_news as $categNews): ?>

      <div class="row">
          <div class="col-xs-12">
              <h2> <?php echo $categNews['title']; ?></h2>
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
                  <a href='<?php echo base_url().'pages/article/'.$categNews['slug'] ?>'><span class='glyphicon glyphicon-chevron-right'></span> View article</a>

              </div>
          </div>
      </div>

    <?php endforeach; }else{
      echo "<div class='alert alert-info'><strong>Info</strong> <p> No posts yet in this category</div>";
      }?>

      <hr />
<?php echo "<center><p> Page Navigation: ".$this->pagination->create_links()."</p></center>"; ?>

  </div>


    </div>
</div>
    </div>
