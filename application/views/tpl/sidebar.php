<?php
    $userData=$this->session->all_userdata();
    if($userData['username']==''){
        echo "<script>window.location='index'</script>";

    }
 ?>
<div id='wrapper'>
        <!-- Sidebar -->

        <div id='sidebar-wrapper'>

            <ul class='sidebar-nav'>
                <li class='sidebar-brand'>
                    <a href='#'><span class='glyphicon glyphicon-cog'></span>&nbsp;
                    D A S H B O A R D
                    </a>
                </li>

                <li>

                  <a href='<?php echo base_url();?>admincontroller/addblog'> <span class='glyphicon glyphicon-pencil'></span> &nbsp; Write new blog</a>
                </li>

                 <li>
                <a href='<?php echo base_url();?>admincontroller/posts'> <span class='glyphicon glyphicon-eye-open'></span> &nbsp; View all  blogs</a>

                </li>


                  <li class='sidebar-brand'>
                    <a href='#'><span class='glyphicon glyphicon-cog'></span>&nbsp;
                    Pages Menu
                    </a>
                </li>

                <li>
                  <a href='<?php echo base_url();?>admincontroller/addpage'> <span class='glyphicon glyphicon-plus'></span> &nbsp; Add  a page</a>
                </li>
                <li>
                    <a href='<?php echo base_url();?>admincontroller/pages'> <span class='glyphicon glyphicon-list'></span> &nbsp; View all pages</a>
                </li>


             <li class='sidebar-brand'>
                    <a href='#'><span class='glyphicon glyphicon-cog'></span>&nbsp;
                            Misc. Settings
                    </a>

                    <li> <a href='<?php echo base_url();?>admincontroller/dashboard'> <span class='glyphicon glyphicon-home'></span> &nbsp; Dashboard Home</a></li>
            <li><a href='<?php echo base_url();?>admincontroller/inbox'><span class='glyphicon glyphicon-envelope'></span>&nbsp; Unread Messages(s) <?php   echo $message_count; ?></a></li>
            <li><a href='<?php echo base_url();?>admincontroller/siteinfo'><span class='glyphicon glyphicon-th'></span>&nbsp; Site Info</a></li>
                 <li> <a  onClick="showModal();" class="open-LogoutDialog" data-id="logout" href="#"> <span class="glyphicon glyphicon-off"></span> &nbsp; Logout <?php echo ucfirst($userData['nickname']); ?></a></li>
            </ul>
        </div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-warning-sign"></span>  Confirm Log-out Dialog</h4>
      </div>
      <div class="modal-body">
        <strong>Are you sure you want to Logout <?php echo ucfirst($userData['nickname']); ?>?</strong>

      </div>
      <div class="modal-footer">
      <a href="<?php echo base_url();?>admincontroller/logout" class="btn btn-danger btn-ok">Yes</a>
    <a class="btn btn-primary" data-dismiss="modal">No</a>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
