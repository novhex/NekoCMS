



    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('admincontroller/index'); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Dashboard Home</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard Home</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                           <svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large"><?php echo $post_count; ?></div>
                            <div class="text-muted">Blogs Posted</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-orange panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large"><?php echo $comment_count; ?></div>
                            <div class="text-muted">Comments</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-red panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large"><?php echo $visitor_count; ?></div>
                            <div class="text-muted">Page Views</div>
                        </div>
                    </div>
                </div>
            </div>

       <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                           <svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large"><?php echo $message_count; ?></div>
                            <div class="text-muted">New Messages</div>
                        </div>
                    </div>
                </div>
            </div>
        

        <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">About NekoCMS v 1.0.1 Beta</div>
                    <div class="panel-body">
                    <p> Developed by: <a target="_blank" href="https://fb.com/novhz.emo94"> Novi </a></p>
                    <p> Email : <a blank="_blank" href="mailto:kel_novi@mikelnoviblog.hol.es">kel_novi@mikelnoviblog.hol.es</a></p>
                    <p> Website: <a href="_blank" href="http://mikelnoviblog.hol.es">http://mikelnoviblog.hol.es</a>
                    </div>
                </div>
            </div>

    </div><!--/.main-->