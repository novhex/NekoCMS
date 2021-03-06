<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Login</title>

<link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url('css/styles.css');?>" rel="stylesheet">
<link href="<?php echo base_url('css/font-awesome/css/font-awesome.css');?>" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" action="<?php echo base_url('neko-admin/login'); ?>" method="POST" accept-charset="utf-8">
						<fieldset>
						      <?php


        if(validation_errors()!='')
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
							<div class="form-group">
								<input style="text-align:center;" type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" >
							</div>
							<div class="form-group">
								 <input type="password" style="text-align:center;"  name="password" id="inputPassword" class="form-control" placeholder="Password">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button type="submit" class="btn btn-success"><i class="fa fa-lock"></i> Login</button>
							<a href="<?php echo base_url();?>" class="btn btn-success"><i class="fa fa-home"></i> Back to Main Page</a>
							<a href="<?php echo base_url('neko-admin/forgotpassword');?>" class="btn btn-success"><i class="fa fa-info-circle"></i> Forgot Password</a>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="<?php echo base_url('js/jquery.min.js');?>"></script>
	<script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>

	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
