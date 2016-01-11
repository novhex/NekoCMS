<div class="container">



    </div> <!-- /container -->
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">

      </div>
      <div class="modal-body">
           <form action="<?php echo base_url()."admincontroller/forgotpassword"; ?>" class="form-signin" method="POST" accept-charset="utf-8">
        <h2 class="form-signin-heading">Enter Email</h2>
        <?php
        if(!empty(validation_errors()))
        {
            echo "<div class='alert alert-danger'><a class='close' data-dismiss='alert'>×</a><strong>Error: </strong>".validation_errors()."</div>";
        }
        ?>
        <p>Please enter your Email address. You will receive a new password via email.</p>

        <label for="inputUsermail">User Email</label>
        <input type="email" name="usermail" id="inputUsermail" class="form-control input-small" placeholder="User Email" />
        <div class="checkbox">
            <label>
          </label>
        </div>
        <button class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-lock"></span> &nbsp; Send New Password</button>
      </form>
      </div>
      <div class="modal-footer">
          <p> <?php echo anchor('https://fb.com/novhz.emo94','Developed by Novi'); ?></p>
      </div>
  </div>
  </div>
</div>
