<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $page_title; ?></title>

<link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url('css/styles.css');?>" rel="stylesheet">

<link rel="icon" href="<?php echo base_url('images/ci-icon.ico')?>">
<link href="<?php echo base_url('css/dataTable.css');?>" rel="stylesheet">
    


   
 

    <?php
     echo "<script src='".base_url()."js/jquery.min.js'></script> \n";  
     echo "<script src='".base_url()."js/bootstrap-alert.js'></script> \n";  
     ?>
         <script type="text/javascript" src="<?php echo base_url('tinymce/tinymce.min.js'); ?>"></script>
   		 <script src="<?php echo base_url('js/lumino.glyphs.js');?>"></script>
		 <script src="<?php echo base_url('js/bootbox.js');?>"></script>
         <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
         <script src="<?php echo base_url('js/dataTables.js');?>"></script>
   




<!--Icons-->


<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url('neko-admin'); ?>"><span>Neko</span>CMS</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>  <?php  echo $this->session->userdata('nickname');?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url('neko-admin/siteinfo');?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							
							<li><a href="<?php echo base_url('neko-admin/logout');?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>