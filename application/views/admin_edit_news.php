 <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
        </script>

     <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1><span class='glyphicon glyphicon-edit'></span>&nbsp; Editing Blog: " <?php echo $news['title']; ?> " &nbsp; <a href='#menu-toggle' class='btn btn-success'  style='width: 175px; height: 40px;' id='menu-toggle'><span class='glyphicon glyphicon-arrow-left'></span>&nbsp; Hide/Show Sidebar</a></h1>
                        <hr>
             <?php
                if(validation_errors()){
                echo "<div class='alert alert-danger' style='width:965px; height:70px;'><a class='close' data-dismiss='alert'>×</a>".validation_errors()."</div>"; 
                }
                ?>
                
                <div class='row'>
                    <div class='col-lg-12'>
                        <form id='defaultForm' method='POST' class='form-horizontal' action="<?php echo base_url('admincontroller/edit')."/".$news['slug'];?>"  accept-charset="utf-8">
                         <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                        <div class='form-group'>
                            <div class='col-lg-4'>
                                <p style="color:green;"><span class='glyphicon glyphicon-info-sign'></span>&nbsp; Blog Title *</p>
                                <input type='hidden' name='txt_slug' value='<?php echo $news['slug'];?>' readonly='' />
                                <input value='<?php echo $news['title'];?>' style='width:965px; height:50px; font-weight: bold; font-size: 30px;' id='txt_title' type='text' class='form-control' name='txt_title' placeholder='Post Title'/>
                            </div>
                        </div>

                  <div class='form-group'>
                            <div class='col-lg-4'>
                                <p style="color:green;"><span class='glyphicon glyphicon-tag'></span>&nbsp; Blog Category (leave it blank if you dont wish to move the post to the other category) </p>
                                <select style='width:300px; height:35px; font-weight: bold; font-size: 17px;' id='dropdownCateg' type='text' class='form-control' name='dropdownCateg'>
                                 <option value=""></option> 
                                <?php
                                foreach($page_categories as $page_cat):
                                echo "<option value='".$page_cat['page_slug']."'>".$page_cat['page_description']."</option>";
                            endforeach;
                                ?>
                                </select>  
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class='col-lg-3 control-label'></label>
                            <div class='col-lg-5' style='width:1000px; height:500px;'>
                                 <p style="color:green;"><span class='glyphicon glyphicon-align-justify'></span>&nbsp;Content *</p>
                                <textarea name='txt_content' placeholder='Enter text ...' style='width:1000px; height:160px;'><?php echo $news['text'];?></textarea>
                             <br>
                             <button type='submit'  name='btn_publish' class='btn btn-success' style='width: 160px; font-weight: bold; font-size: 16px;'><span class='glyphicon glyphicon-ok'></span>&nbsp;<strong> Save Now </strong></button>

                            </div>
                        </div>
                </form>
            </div>
        
       
           