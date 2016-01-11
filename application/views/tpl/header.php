<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url()?>images/ci-icon.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dashboard-custom.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>tinymce/tinymce.min.js"></script>
    <?php
     echo "<script src='".base_url()."js/jquery.min.js'></script> \n";  
     echo "<script src='".base_url()."js/bootstrap-alert.js'></script> \n";  
     ?>
         <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
   
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/sticky_footer.css" rel="stylesheet">    
        <?php
            switch($page_name){
                case 'login_page';
                    echo "<link href='".base_url()."css/signin.css' rel='stylesheet'>";      
                break;
                
              case 'dashboard';
                    echo "<link href='".base_url()."css/sidebar.css' rel='stylesheet'>";      
                break;
            
                case 'addblog':
                       echo "<link href='".base_url()."css/sidebar.css' rel='stylesheet'>";
                       echo "<script src='".base_url()."js/bootstrap-alert.js'></script>";
                break;    
                
            }
        ?>
        
            <?php echo "<title>". $page_title ."</title>"; ?>
    
        </head>

    <body>

<script type="text/javascript">
  function showModal(){
  $('#myModal').modal('show')
  }
</script>
  
  
