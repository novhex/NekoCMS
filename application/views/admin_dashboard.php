<?php
    $userData=$this->session->all_userdata();
    if($userData['username']==''){
        echo "<script>window.location='index'</script>";

    }
 ?>


     <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1><img onclick='' data-holder-rendered='true' src='<?php echo $userData['display_photo']; ?>' style='width: 100px; height: 100px;' data-src='holder.js/200x200' class="img-thumbnail" alt='' /> &nbsp; Welcome back <?php echo ucfirst($userData['nickname']); ?> &nbsp; <a href='#menu-toggle' class='btn btn-success'  style='width: 175px; height: 40px;' id='menu-toggle'><span class='glyphicon glyphicon-arrow-left'></span>&nbsp; Hide/Show Sidebar</a></h1>
</h1>
<hr>
                        <div class="panel panel-success">
                        <div class="panel-heading">
                          <h3 class="panel-title">Notification Centre</h3>
                        </div>
                        <div class="panel-body">
                        <?php

                        echo "<p><span class='glyphicon glyphicon-comment'></span> &nbsp; ".$message_count ." Unread Message(s) in your <a href='".base_url()."admincontroller/inbox'>inbox.</a></p>";
                        echo "<p><span class='glyphicon glyphicon-stats'></span> &nbsp;".$visitor_count. " Total Unique Visitor(s)</p>";
                        echo "<p><span class='glyphicon glyphicon-pushpin'></span> &nbsp;".$post_count." Total Posted Articles</p>";
                        ?>
                        </div>
                      </div>


                         </div>
                    </div>
                </div>
            </div>
