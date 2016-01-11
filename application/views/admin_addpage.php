<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Add New Page &nbsp; <a href='#menu-toggle' class='btn btn-success'  style='width: 175px; height: 40px;' id='menu-toggle'><span class='glyphicon glyphicon-arrow-left'></span>&nbsp; Hide/Show Sidebar</a></h1>

                               <hr>    
                <?php
                if(validation_errors()){
                echo "<div class='alert alert-danger' style='width:965px; height:85px;'><a class='close' data-dismiss='alert'>×</a>".validation_errors()."</div>"; 
                }
                ?>
                
                <div class='row'>
                    <div class='col-lg-12'>
                        <form id='defaultForm' method='post' class='form-horizontal' action='<?php echo base_url();?>admincontroller/addpage' accept-charset="utf-8">
                         <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                        <div class='form-group'>
                            <div class='col-lg-4'>
                                <p style="color:green;"><span class='glyphicon glyphicon-info-sign'></span>&nbsp; Page Name *</p>
                                <input id='txt_pagetitle' type='text' class='form-control' name='txt_pagetitle' placeholder='Page Title'/>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-lg-4'>
                                <p style="color:green;"><span class='glyphicon glyphicon-align-justify'></span>&nbsp; Page Description *</p>
                                <textarea id='txt_pagedesc' class='form-control' name='txt_pagedesc' style='height: 100px; width:800px;' placeholder="Say something about this page...."></textarea>
                            </div>
                        </div>


                        <div class='form-group'>
                            <label class='col-lg-3 control-label'></label>
                            <div class='col-lg-5' style='width:1000px; height:500px;'>
                                <p style="color:green;"></p>                             <br>
                             <button type='submit' name='btn_publish' class='btn btn-success' style='width:160px; font-weight:bold; font-size:16px;'><span class='glyphicon glyphicon-ok'></span>&nbsp; <strong> Add Page ! </strong></button>
                         </div> 
                        </div>
                    </form>
               </div>         
