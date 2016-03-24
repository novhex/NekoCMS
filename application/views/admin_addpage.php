



    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('neko-admin/index'); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Add Page Category</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Page Category</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Page Category</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                           <?php
                            if(validation_errors()){
                                 echo "<div class=''>".validation_errors()."</div>"; 
                            }
                             ?>
                
                        <form id="defaultForm" method="post" class="form-horizontal" action="<?php echo base_url('admincontroller/addpage');?>" accept-charset="utf-8">
                         <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                        <div class='form-group'>
                            <div class='col-lg-4'>
                                <p style=""><span class='glyphicon glyphicon-info-sign'></span>&nbsp; Page Name *</p>
                                <input id='txt_pagetitle' type='text' class='form-control' name='txt_pagetitle' placeholder='Page Title'/>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-lg-4'>
                                <p style=""><span class='glyphicon glyphicon-align-justify'></span>&nbsp; Page Description *</p>
                                <textarea id='txt_pagedesc' class='form-control' name='txt_pagedesc' style='' placeholder="Say something about this page...."></textarea>
                            </div>
                        </div>


                        <div class='form-group'>
                       
                            <div class='col-lg-4'>
                                <p style="color:green;"></p>                             <br>
                             <button type='submit' name='btn_publish' class='btn btn-success btn-lg btn-block'><span class='glyphicon glyphicon-ok'></span>&nbsp; <strong> Add Page </strong></button>
                         </div> 
                        </div>
                    </form>
               </div>         

                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->