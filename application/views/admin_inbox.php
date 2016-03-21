



    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('admincontroller/index'); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Inbox</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Inbox</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Inbox</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                                                  <?php
                               if($this->session->flashdata('msgdelete_success')!=''){
                           echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>×</a><strong>Info: </strong>".$this->session->flashdata('msgdelete_success')."</div>";

                               }
                             ?>


<?php echo $this->pagination->create_links(); ?>
                        <table class="table table-condensed table-striped table-responsive" id="msgTable">
                            <tr>
                              <td> No. </td>
                                <td> From </td>
                                <td> Email </td>
                                <td> IP Address </td>
                                <td> Date Recieved </td>
                                <td> Message Status </td>
                                <td> Actions </td>
                            </tr>



                        <?php
                        foreach($message_list as $messageLists):
                          echo "<tr>";
                          echo "<td id='msgID'>".$messageLists['msgID']."</td>";
                          echo "<td>".$messageLists['from']."</td>";
                          echo "<td><a href='mailto:".$messageLists['visitor_email']."'>$messageLists[visitor_email]</a></td>";
                          echo "<td>".$messageLists['ip_address']."&nbsp; <a target='_blank' href='http://whatismyipaddress.com/ip/$messageLists[ip_address]'>IP Address Info</a></td>";
                          echo "<td>".date('F j, Y',strtotime($messageLists['date_recieved']))."</td>";
                          if($messageLists['is_read']!=='N'){
                            echo "<td> <span class='label label-success'>Already Read</span></td>";
                          }else{
                          echo "<td> <span class='label label-warning'>Unread</span></td>";
                          }
    echo "<td><a  data-id='$messageLists[msgID]' title='' class='deletemsg' href='#'><span class='glyphicon glyphicon-trash'></span> Delete</a> | <a id='viewMsg' href='".base_url()."admincontroller/showmessage/$messageLists[msgID]'><span class='glyphicon glyphicon-zoom-in'></span> View</a></td>";
                          echo "</tr>";
                        endforeach;

                        ?>
                      </table>



                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->
<?php
    $userData=$this->session->all_userdata();
    if($userData['username']==''){
        echo "<script>window.location='index'</script>";

    }
 ?>


<!-- Bootstrap Confirm  Delete Dialog JS!-->
<script>
$(document).ready(function(){

  $(document).on('click','.deletemsg',function(){
    var msgid =this.dataset.id;

       bootbox.confirm('Are you sure you want to delete this message',function(x){
        if(x==true){
          window.location="<?php echo base_url('admincontroller/deletemessage');?>"+"/"+msgid;
        }
    });

  });
   
});
</script>