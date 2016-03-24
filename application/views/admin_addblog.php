

 <script type="text/javascript">
              tinymce.init({
          selector: 'textarea',
          height: 250,
          theme: 'modern',
          plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
          ],
          toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
          toolbar2: 'print preview media | forecolor backcolor emoticons',
          image_advtab: true,
          templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
          ],
          content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
          ]
         });
        </script>


    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('neko-admin/index'); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Dashboard Add New Blog</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add New Blog</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
           
                <div class="panel panel-default">
                    <div class="panel-heading">New Blog Entry</div>
                    <div class="panel-body">
                        <div class="col-md-12">
             
                            <form role="form" accept-charset="utf-8" method="POST" action="<?php  echo base_url('admincontroller/addblog'); ?>">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-group">
                                     <label style="color:red;"><?php echo form_error('txt_title');?></label>
                                    <input  name='txt_title'  id='txt_title' class="form-control" placeholder="Blog Title">
                                </div>
                                                                
                                <div class="form-group">
                                     <label style="color:red;"><?php echo form_error('dropdownCateg'); ?></label>
                                      <select id='dropdownCateg' type='text' class='form-control' name='dropdownCateg'>
                                 <option value="">Select Category</option> 
                                <?php
                                foreach($page_categories as $page_cat):
                                echo "<option value='".$page_cat['page_slug']."'>".ucwords(str_replace("-"," ",$page_cat['page_slug']))."</option>";
                                endforeach;
                                ?>
                                </select> 
                                </div>
                                

                                
                                <div class="form-group">
                                    <label style="color:red;"><?php echo form_error('txt_content');?></label>
                                    <textarea name='txt_content' class="form-control" rows="3"></textarea>
                                </div>
                                
                           
                                
                                <button type="submit" class="btn btn-success btn-lg btn-block">Post Blog</button>
                            
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->