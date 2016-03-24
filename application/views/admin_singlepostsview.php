



    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('neko-admin/index'); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Viewing a Blog Post</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Viewing a Blog Post</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Viewing a Blog Post</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                                           
        <h3><span class='glyphicon glyphicon-book'></span> <?php echo $news['title'] ?></h3>
       <strong><span class='glyphicon glyphicon-calendar'></span> Date posted: </strong><?php echo date('F j, Y', strtotime($news['date_posted'])); ?>
        <div class="main">
         <br>
                <?php echo $news['text'] ?>
        </div>
        <hr>
                        <a href="<?php echo base_url('neko-admin/posts');?>"  class="btn btn-success"><span class='glyphicon glyphicon-arrow-left'></span><strong> Return to all posts</strong><a>
                         
                    </div>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->