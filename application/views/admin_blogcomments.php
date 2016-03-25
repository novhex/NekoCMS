



    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('admincontroller/index'); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Blog Comments</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Blog Comments</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Comments</div>
                    <div class="panel-body">
                        <div class="col-md-12">

                            <div class="table-responsive">
                                    <table id="tbl_users_comments">
                                    <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Comment on </th>
                                        <th> Date Commented </th>
                                        <th> Is Aprroved? </th>
                                        <th> Options </th>
                                       </tr>
                                    </thead>

                                        <tbody>
                                            <?php $i=1; foreach($comments as $list): ?>
                                                <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $list['user_name'];?></td>
                                                <td><?php echo $list['user_email'];?></td>
                                                <td><?php echo $list['title']; ?></td>
                                                <td><?php echo date('F j, Y',strtotime($list['comment_date']));?></td>
                                                
                                                <td>
                                                <?php 
                                                    if($list['is_approved']==0){
                                                        echo "<label class='label label-warning'>Waiting for Approval</label>";
                                                    }else{
                                                        echo "<label class='label label-success'> Approved Comment</label>";
                                                    }
                                                ?>

                                                </td>

                                                <td>
                                                    <a data-commentid="<?php echo $list['c_id']; ?>" href="#" title="Approve this comment" class="approvecomment btn btn-success"><i class="fa fa-check"></i></a>
                                                    <a data-commentid="<?php echo $list['c_id']; ?>" href="#" title="Disapprove this comment" class="disapprovecomment btn btn-warning"><i class="fa fa-times"></i></a>
                                                    <a data-commentid="<?php echo $list['c_id']; ?>" href="#" title="View comment" class="viewcomment btn btn-primary"><i class="fa fa-search"></i></a>
                                                    <a data-commentid="<?php echo $list['c_id']; ?>" href="#" title="Delete this comment permanently" class="deletecomment btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                                </tr>

                                            <?php endforeach; ?>

                                        </tbody>

                                    </table>

                            </div>
                        
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->

    <script type="text/javascript">
    $(document).ready(function(){
        
            $("#tbl_users_comments").DataTable();

            $(document).on('click','.approvecomment',function(){
                    var id=this.dataset.commentid;

                    bootbox.confirm("Are you sure you want to approve this comment?",function(x){
                            if(x==true){
                                 $(ajax_comment_action(1,id));
                            }
                    });

            });

           $(document).on('click','.disapprovecomment',function(){
                    var id=this.dataset.commentid;

                    bootbox.confirm("Are you sure you want to disapprove this comment?",function(x){
                            if(x==true){
                                 $(ajax_comment_action(0,id));
                            }
                    });

            });


          $(document).on('click','.viewcomment',function(){
                var id = this.dataset.commentid;

                       popup = bootbox.dialog({
                        title: 'Comment',
                        message: "<center><img src='"+"<?php echo base_url('images/loader.gif'); ?>"+"'></center>",
                        size: 'large',
                        onEscape: function(){
                    }

                    });

                $.ajax({
                    url: "<?php echo base_url('neko-admin/viewcomment'); ?>",
                    data: "comment_id="+id,
                    type: "POST",
                    success:function(response){
                        popup.contents().find('.bootbox-body').html(response);
                    }
                });

          });
        
         $(document).on('click','.deletecomment',function(){
                    var id=this.dataset.commentid;

                    bootbox.confirm("Are you sure you want to delete this comment?",function(x){
                            if(x==true){
                                $(ajax_comment_action(2,id));
                            }
                    });

            });


         function ajax_comment_action(action,comment_id){
                $.ajax({
                    url: "<?php echo base_url('neko-admin/commentaction'); ?>",
                    data: "comment_action="+action+"&comment_id="+comment_id,
                    type: "POST",
                    success:function(response){
                        if(response==1){
                           window.location = "<?php echo base_url('neko-admin/comments'); ?>";
                        }
                    }   
                });
         }

    });
    </script>