<?php
foreach($article_contents as $articleinfo):
?>
<div class="container">
    <div class="page-header">
        <div class="clearfix">
            <div class="col-md-12">
                <div class="col-md-8 col-sm-6 col-xs-12">

                    <h1>Article &raquo; <small><?php echo  ucwords($slug); ?></small></h1>
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
<div class="row">
    <div class="col-xs-12">
        <h2></h2>
        <?php echo $articleinfo['text']; ?>
        <div class="text-center">
          <p> Share post: </p>
            <a href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=".base_url()."pages/article/".$articleinfo['slug']; ?>"><span class="glyphicon glyphicon-share"></span> Facebook &nbsp;</a>
            <a href="<?php echo "https://twitter.com/home?status=".base_url()."pages/article/".$articleinfo['slug']; ?>"><span class="glyphicon glyphicon-share"></span> Twitter &nbsp;</a>
            <a href="<?php echo "ttps://plus.google.com/share?url=".base_url()."pages/article/".$articleinfo['slug']; ?>"><span class="glyphicon glyphicon-share"></span> Google+ &nbsp;</a>
        </div>
    </div>
</div>

    <?php endforeach; ?>

      <hr />
</div>


    </div>
</div>
    </div>
