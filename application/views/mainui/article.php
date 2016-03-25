<?php
foreach($article_contents as $articleinfo):

?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php
                    if($this->session->flashdata('comment_submitted')!=''){
                        echo "<div class='alert alert-info'>".$this->session->flashdata('comment_submitted')."</div>";
                    }
                ?>
                    <h4 class="page-head-line"><?php echo  ucwords($slug); ?></h4>

                </div>

            </div>
            <div class="row">

                <div class="col-md-12">
                <p><span class="glyphicon glyphicon-calendar"></span> Date Posted:  <?php echo date('F  j , Y',strtotime($articleinfo['date_posted'])); ?></p>
                <p><span class="glyphicon glyphicon-user"></span> Posted by: <?php  echo $page_owner[0]['configValue'];?></p>
                <p><span class="glyphicon glyphicon-eye-open"></span> Views: <?php  echo $this->viewercounter->incrementViews($articleinfo['id']); ?></p>

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

        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                         <h3> Comments: </h3>
<hr>
                         <div id="comments">
                         
                         </div>
                      
                    </div>
            </div>
         
            <div class="col-md-6">
                    <div class="well">
                            <h4> Your comment </h4>
                             <form action="" method="POST" accept-charset="utf-8">
                             <input type="hidden" name="news_id" id="news_id" value="<?php echo $articleinfo['id']; ?>" />
                            <label><?php echo form_error('username'); ?></label>
                            <input type="text" name="username" class="form-control" placeholder="Enter Your Name" value="<?php echo set_value('username');?>" />
                            <label><?php echo form_error('email_add'); ?></label>
                            <input type="text" name="email_add" placeholder="Email Address" class="form-control" value="<?php echo set_value('email_add'); ?>"/>
                            <label><?php echo form_error('comment');?></label>
                            <textarea class="form-control" placeholder="Your comment (500 characters only)" name="comment"><?php echo set_value('comment'); ?></textarea>
                            
                            <br>
                            <div class="alert alert-info"><i class="fa fa-info"></i> Your comment will be checked first by administrator before it will appear in this section</div>
                            <button class="btn btn-primary"><i class="fa fa-plus"></i> Submit Comment</button>
                             </form>
                    </div>
            </div>
            
        </div>
    </div>

      <?php endforeach; ?>

      <script src="<?php echo base_url('js/nekocms.js'); ?>"></script>
      
      <script type="text/javascript">

    $(document).ready(function(){

         var newsID = $("#news_id").val();
         $(set_base_url("<?php echo base_url(); ?>"));
         $(loadComments(newsID));

    });
      </script>