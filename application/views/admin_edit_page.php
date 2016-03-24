



    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('neko-admin/index'); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Editing A Page</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Editing A Page</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Editing A Page</div>
                    <div class="panel-body">
                        <div class="col-md-12">
               <?php
                if(validation_errors()){
                echo "<div class='alert alert-danger' style='width:965px; height:85px;'><a class='close' data-dismiss='alert'>×</a>".validation_errors()."</div>"; 
                }
                ?>
                
                <div class='row'>
                    <div class='col-lg-12'>
                        <form id='defaultForm' method='post' class='form-horizontal' action='<?php echo base_url();?>neko-admin/editpage/<?php echo $page_to_edit['page_slug']; ?>' accept-charset="utf-8">
                       <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                        <div class='form-group'>
                            <div class='col-lg-4'>
                                <p style="color:green;"><span class='glyphicon glyphicon-info-sign'></span>&nbsp; Page Name *</p>
                                <input id='txt_pagetitle' type='text' class='form-control' name='txt_pagetitle' placeholder='Page Title' value="<?php echo $page_to_edit['page_name']; ?>" />
                                <input type='hidden' name='curr_slug' value='<?php echo $page_to_edit['page_slug'];?>' />
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-lg-4'>
                                <p style="color:green;"><span class='glyphicon glyphicon-align-justify'></span>&nbsp; Page Description *</p>
                                <textarea id='txt_pagedesc' class='form-control' name='txt_pagedesc' style='height: 100px; width:800px;' placeholder="Say something about this page...."><?php echo $page_to_edit['page_description']; ?></textarea>
                            </div>
                        </div>


                        <div class='form-group'>
                            <label class='col-lg-3 control-label'></label>
                            <div class='col-lg-5' style='width:1000px; height:500px;'>
                                <p style="color:green;"></p>                             <br>
                             <button type='submit' name='btn_publish' class='btn btn-success' style='width:160px; font-weight:bold; font-size:16px;'><span class='glyphicon glyphicon-ok'></span>&nbsp; <strong> Save Page ! </strong></button>
                         </div> 
                        </div>
                    </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->