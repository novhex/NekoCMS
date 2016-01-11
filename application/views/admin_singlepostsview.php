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
                        <h1><span class='glyphicon glyphicon-zoom-in'></span> Viewing Post</h1>
 <hr>

        <h3><span class='glyphicon glyphicon-book'></span> <?php echo $news['title'] ?></h3>
       <strong><span class='glyphicon glyphicon-calendar'></span> Date posted: </strong><?php echo $news['date_posted']; ?>
        <div class="main">
            <hr>
                <?php echo $news['text'] ?>
        </div>
        <hr>
                        <a href="<?php echo base_url()?>admincontroller/posts"  style="width: 190px; height: 40px;" class="btn btn-success"><span class='glyphicon glyphicon-arrow-left'></span><strong> Return to all posts</strong><a>
                            <a href='#menu-toggle' class='btn btn-success'  style='width: 175px; height: 40px;' id='menu-toggle'><span class='glyphicon glyphicon-arrow-left'></span>&nbsp; <strong>Hide/Show Sidebar</strong></a>
                    </div>
                </div>
            </div>
        </div>
