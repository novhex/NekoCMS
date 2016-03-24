



    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('neko-admin/index'); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Blog List</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Blog List</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Blog List</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                                                     <form id='defaultForm' class='form-horizontal' method='POST'>

                        <div class='form-group'>
                            <div class='col-lg-12'>
                                <p><span class='glyphicon glyphicon-search'></span>&nbsp; Quick Search Post Here: *</p>
                                     <input placeholder="Begin Searching Post Here.." class="form-control" name="search_data" id="search_data" type="text" onkeyup="ajaxSearch();">
                            </div>
                        </div>
                        </form>

                       <?php
                        if($this->session->flashdata('edit_success')!=''){
                        echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>×</a><strong>Info: </strong>".$this->session->flashdata('edit_success')."</div>";

                        }
                       else if($this->session->flashdata('addblog_success')!=''){
                         echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>×</a><strong>Info: </strong>".$this->session->flashdata('addblog_success')."</div>";

                        }
                       ?>

                        <p><strong>Page Navigation:</strong> </p>
                        <p><?php echo $this->pagination->create_links(); ?></p>
                        


       <div id="suggestions">
            <div id="autoSuggestionsList">
                  <?php foreach ($news as $news_item): ?>
                      <h3><span class='glyphicon glyphicon-info-sign'></span>&nbsp; <?php echo $news_item['title'] ?></h3>
                      <strong><span class='glyphicon glyphicon-folder-open'></span>&nbsp; Parent Category: </strong><p><?php echo $news_item['parent_category'];?></p>
        <div class='main'>
                <?php
               $content = strip_tags($news_item['text']);

            if (strlen($content) > 250) {

              $stringCut = substr($content, 0, 500);
              $string_to_replace=".....";
                $content= substr($stringCut, 0, strrpos($stringCut, ' '))."&nbsp;&nbsp;".$string_to_replace;
                echo $content;
             }
            ?>


        </div>

        <p><a href='<?php echo base_url().'neko-admin/view/'.$news_item['slug'] ?>'><span class='glyphicon glyphicon-eye-open'></span> View article</a> | <a href='<?php  echo base_url().'neko-admin/edit/'.$news_item['slug'] ?>'><span class='glyphicon glyphicon-edit'></span> Edit article</a> | <a  data-id="<?php echo $news_item['slug'];?>" title="" class="deletepost" href="#"><span class="glyphicon glyphicon-trash"></span> Delete article</a></p>
<hr>
<?php endforeach ?>

            </div>
        </div>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->


    <!-- Ajax Search Javascript -->
<script>
function ajaxSearch() {
            var input_data = $('#search_data').val();
            if (input_data.length === 0) {

                 var post_data = {
                    'search_data': input_data,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('neko-admin/defaultsearch'); ?>",
                    data: post_data,
                    success: function(data) {
                        // return success
                        if (data.length > 0) {
                            $('#suggestions').show();
                            $('#autoSuggestionsList').addClass('auto_list');
                            $('#autoSuggestionsList').html(data);
                        }
                    }
                });

            } else {

                var post_data = {
                    'search_data': input_data,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('neko-admin/autocomplete'); ?>",
                    data: post_data,
                    success: function(data) {
                        // return success
                        if (data.length > 0) {
                            $('#suggestions').show();
                            $('#autoSuggestionsList').addClass('auto_list');
                            $('#autoSuggestionsList').html(data);
                        }
                    }
                });

            }
        }
     </script>

<!-- Bootstrap Confirm  Delete Dialog JS!-->
<script>

$(document).ready(function(){


    $(document).on('click','.deletepost',function(){

            var postid=this.dataset.id;

            bootbox.confirm("Are you sure you want to delete this blog?",function(x){
                if(x==true){
                    window.location="<?php  echo base_url('neko-admin/deletearticle');?>"+"/"+postid;
                }
            });
    });

});
</script>
