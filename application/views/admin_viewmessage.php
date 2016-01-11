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
                        <h1><span class='glyphicon glyphicon-zoom-in'></span> Viewing Message</h1>
 <hr>

        <h3><span class='glyphicon glyphicon-comment'></span> From: <?php echo $msg_content['from']; ?></h3>
       <strong><span class='glyphicon glyphicon-time'></span> Date recieved: </strong><?php echo $msg_content['date_recieved']; ?>
       <br>
        <strong><span class='glyphicon glyphicon-sunglasses'></span> IP Address: </strong><?php echo $msg_content['ip_address']; ?>
        <div class="main">
            <hr>
                <?php echo $msg_content['body']; ?>
        </div>
        <hr>
                        <a href="<?php echo base_url()?>admincontroller/inbox"  style="width: 190px; height: 40px;" class="btn btn-success"><span class='glyphicon glyphicon-arrow-left'></span><strong> Return to inbox</strong><a>
                            <a href='#menu-toggle' class='btn btn-success'  style='width: 175px; height: 40px;' id='menu-toggle'><span class='glyphicon glyphicon-arrow-left'></span>&nbsp; <strong>Hide/Show Sidebar</strong></a>
                    </div>
                </div>
            </div>
        </div>
