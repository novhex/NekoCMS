<div class="container">



    </div> <!-- /container -->
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">

      </div>
      <div class="modal-body">
           <form action="<?php echo base_url()."admincontroller/login"; ?>" class="form-signin" method="POST" accept-charset="utf-8">
             <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

        <h2 class="form-signin-heading">Please sign in</h2>

        <?php


        if(!empty(validation_errors()))
        {
            echo "<div class='alert alert-danger'><a class='close' data-dismiss='alert'>×</a><strong>Error: </strong>".validation_errors()."</div>";
        }

        if($this->session->flashdata('login_error')!=''){
        echo "<div class='alert alert-danger'><a class='close' data-dismiss='alert'>×</a><strong>Error: </strong>".$this->session->flashdata('login_error')."</div>";
        }

        if($this->session->flashdata('dc_notice')!=''){
        echo "<div class='alert alert-info'><a class='close' data-dismiss='alert'>×</a><strong>Info: </strong>".$this->session->flashdata('dc_notice')."</div>";
        }
        if($this->session->flashdata('changes2')!=''){
        echo "<div class='alert alert-info'><a class='close' data-dismiss='alert'>×</a><strong>Info: </strong>".$this->session->flashdata('changes2')."</div>";
        }
        ?>
        <label for="inputUsername">Username</label>
        <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" >

        <label for="inputPassword">Password</label>
        <input type="password"  name="password" id="inputPassword" class="form-control" placeholder="Password">
        <div class="checkbox">
            <label>
          </label>
        </div>
        <button class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-lock"></span> &nbsp; Sign in</button>
        <a href="<?php echo base_url()."admincontroller/forgotpassword";?>"  class="btn btn-lg btn-success btn-block"><span class="glyphicon glyphicon-exclamation-sign"></span> &nbsp; Forgot Password ?</a>
      </form>
      </div>
      <div class="modal-footer">
          <p> <span class='glyphicon glyphicon-home'></span>&nbsp;  <?php echo anchor(base_url(),'Return Home');?> | <span class='glyphicon glyphicon-qrcode'></span> &nbsp; <?php echo anchor('https://fb.com/novhz.emo94','Developed by Novi'); ?></p>
      </div>
  </div>
  </div>
</div>
