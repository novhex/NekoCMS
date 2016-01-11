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
                        <h1><span class='glyphicon glyphicon-pencil'></span>&nbsp; Add New Blog Post &nbsp; <a href='#menu-toggle' class='btn btn-success'  style='width: 175px; height: 40px;' id='menu-toggle'><span class='glyphicon glyphicon-arrow-left'></span>&nbsp; Hide/Show Sidebar</a></h1>

                               <hr>    
                <?php
                if(validation_errors()){
                echo "<div class='alert alert-danger' style='width:965px; height:85px;'><a class='close' data-dismiss='alert'>×</a>".validation_errors()."</div>"; 
                }
                ?>
                
                <div class='row'>
                    <div class='col-lg-12'>
                        <form id='defaultForm' method='post' class='form-horizontal' action='<?php  echo base_url()."admincontroller/addblog"; ?>' accept-charset="utf-8">
                         <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      
                        <div class='form-group'>
                            <div class='col-lg-4'>
                                <p style="color:green;"><span class='glyphicon glyphicon-info-sign'></span>&nbsp; Blog Title *</p>
                                <input required  style='width:700px; height:35px; font-weight: bold; font-size: 20px;' id='txt_title' type='text' class='form-control' name='txt_title' placeholder='Blog Title'/>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-lg-4'>
                                <p style="color:green;"><span class='glyphicon glyphicon-tag'></span>&nbsp; Blog Category * </p>
                                <select required style='width:300px; height:35px; font-weight: bold; font-size: 17px;' id='dropdownCateg' type='text' class='form-control' name='dropdownCateg'>
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
                                <p style="color:green;"><span class='glyphicon glyphicon-align-justify'></span>&nbsp; Content *</p>
                                <textarea name='txt_content' placeholder='Enter text ...'  class="form-control"></textarea>
                             <br>
                             <button type='submit' name='btn_publish' class='btn btn-success' style='width:160px; font-weight:bold; font-size:16px;'><strong> <span class='glyphicon glyphicon-ok'></span>&nbsp; Post Now ! </strong></button>
                         </div> 
                        </div>
                    </form>
               </div>         
