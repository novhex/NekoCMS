<?php
    $userData=$this->session->all_userdata();
    if($userData['username']==''){
        echo "<script>window.location='index'</script>";

    }
 ?>



    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('admincontroller/index'); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Inbox</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Message Details</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Message Body</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                          <h3><span class='glyphicon glyphicon-comment'></span> From: <?php echo $msg_content['from']; ?></h3>
       <strong><span class='glyphicon glyphicon-time'></span> Date recieved: </strong><?php echo date('F  j, Y',strtotime($msg_content['date_recieved'])); ?>
       <br>
        <strong><span class='glyphicon glyphicon-info'></span> IP Address: </strong><?php echo $msg_content['ip_address']; ?>
            <br>
            <br>
               <p> <?php echo $msg_content['body']; ?></p>

                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->