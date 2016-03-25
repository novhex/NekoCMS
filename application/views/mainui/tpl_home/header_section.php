<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
     <?php
        foreach($page_meta as $pagemeta):
      ?>
    <meta name="description" content="<?php echo $pagemeta['configValue']; ?>" />
     <?php endforeach; ?>

        <?php
        foreach($page_metakw as $pagemetakeywords):
      ?>
    <meta name="description" content="<?php echo $pagemetakeywords['configValue']; ?>" />
     <?php endforeach; ?>

    <?php
    foreach($page_owner as $pageowner):
    ?>
    <meta name="author" content="<?php echo $pageowner['configValue']?>" />
    <?php
    endforeach;
    ?>
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->

     <?php
        foreach($page_title as $pagetitle):
        ?> 
    <title><?php echo $page_slug." &raquo; ".$pagetitle['configValue']; ?></title>

    <?php endforeach; ?>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?php echo base_url('css/bootstrap.css');?>" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->

    <link href="<?php echo base_url('css/font-awesome/css/font-awesome.css');?>" rel="stylesheet">
    <!-- CUSTOM STYLE  -->
    <link href="<?php echo base_url('css/zontal.css');?>" rel="stylesheet" />

   
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

        <script src="<?php echo base_url('js/jquery.min.js');?>"></script>
         <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>


</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong></strong>
                    &nbsp;&nbsp;
                    <strong></strong>
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>">

                    <img src="<?php echo base_url('images/logo.png');?>" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                         
                        
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
  