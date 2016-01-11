<?php
    $userData=$this->session->all_userdata();
    if($userData['username']==''){
        echo "<script>window.location='index'</script>";

    }
 ?>


<!-- Bootstrap Confirm  Delete Dialog JS!-->
<script>
$(document).on("click", ".open-DeleteDialog", function (e) {
    e.preventDefault();
    var _self = $(this);
    var msgId = _self.data('id');
  //$("#txtSlugId").val(myBookId);
    $('#del_link').attr('href', '<?php echo base_url(); ?>admincontroller/deletemessage/'+msgId);
    $(_self.attr('href')).modal('show');
});
</script>

     <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <h1>Messages &nbsp; <a href='#menu-toggle' class='btn btn-success'  style='width: 175px; height: 40px;' id='menu-toggle'><span class='glyphicon glyphicon-arrow-left'></span>&nbsp; Hide/Show Sidebar</a></h1>
                          <?php
                               if($this->session->flashdata('msgdelete_success')!=''){
                           echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>×</a><strong>Info: </strong>".$this->session->flashdata('msgdelete_success')."</div>";

                               }
                             ?>
<hr>

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
                          echo "<td>".$messageLists['date_recieved']."</td>";
                          if($messageLists['is_read']!=='N'){
                            echo "<td> <span class='label label-success'>Already Read</span></td>";
                          }else{
                          echo "<td> <span class='label label-warning'>Unread</span></td>";
                          }
    echo "<td><a  data-id='$messageLists[msgID]' title='' class='open-DeleteDialog' href='#deleteDialog'><span class='glyphicon glyphicon-trash'></span> Delete</a> | <a id='viewMsg' href='".base_url()."admincontroller/showmessage/$messageLists[msgID]'><span class='glyphicon glyphicon-zoom-in'></span> View</a></td>";
                          echo "</tr>";
                        endforeach;

                        ?>
                      </table>




                         </div>
                    </div>
                </div>
            </div>

            <!-- Modal for delete message !-->
            <div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-warning-sign"></span>  Confirm Delete Dialog</h4>
                  </div>
                  <div class="modal-body">
                    <strong> Are you sure you want to delete this message? There is no redo!</strong>

                  </div>
                  <div class="modal-footer">
                  <a id="del_link" class="btn btn-danger btn-ok">Yes</a>
                <a class="btn btn-primary" data-dismiss="modal">No</a>

                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            <!-- /.modal -->
