
<!DOCTYPE html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php
        foreach($page_meta as $pagemeta):
      ?>
         <meta name="description" content="<?php echo $pagemeta['configValue']; ?>">
    <?php endforeach; ?>

    <?php
    foreach($page_owner as $pageowner):
    ?>
    <meta name="author" content="<?php echo $pageowner['configValue']?>">
    <?php
    endforeach;
    ?>


    <link rel="icon" href="<?php echo base_url();?>images/ci-icon.ico">
    <script src='<?php echo base_url();?>js/jquery.min.js'></script>
<script src='<?php echo base_url();?>js/bootstrap-alert.js'></script>
         <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/sticky_footer.css" rel="stylesheet">
        <?php
        if($_SESSION['usrtheme']!=''){
        echo "<link href='".base_url().$_SESSION['usrtheme']."' rel='stylesheet'>";
        }else{
        $_SESSION['usrtheme']=base_url()."custom_theme/default.css";
        }
        ?>

    <?php
        foreach($page_title as $pagetitle):
        ?>


        <title><?php echo $page_slug." &raquo; ".$pagetitle['configValue'] ." | ".$pagemeta['configValue']; ?></title>
        <?php endforeach; ?>
        </head>

    <body>
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo $pagetitle['configValue']; ?></a>
    </div>
