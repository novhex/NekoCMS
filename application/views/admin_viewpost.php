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
                    url: "<?php echo base_url(); ?>admincontroller/defaultsearch",
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
                    url: "<?php echo base_url(); ?>admincontroller/autocomplete",
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
$(document).on("click", ".open-DeleteDialog", function (e) {
    e.preventDefault();
    var _self = $(this);
    var articleId = _self.data('id');
    $('#del_link').attr('href', '<?php echo base_url(); ?>admincontroller/deletearticle/'+articleId);
    $(_self.attr('href')).modal('show');
});
</script>




<!-- Main Div !-->
<div id='page-content-wrapper'>
            <div class='container-fluid'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <h1><span class='glyphicon glyphicon-eye-open'></span>&nbsp; Your Blogs  <a href='#menu-toggle' class='btn btn-success'  style='width: 175px; height: 40px;' id='menu-toggle'><span class='glyphicon glyphicon-arrow-left'></span> &nbsp;  Hide/Show Sidebar</a></h1>

                           <form id='defaultForm' class='form-horizontal' method='POST'>

                        <div class='form-group'>
                            <div class='col-lg-4'>
                                <p style='color:green;'><span class='glyphicon glyphicon-search'></span>&nbsp; Quick Search Post Here: *</p>
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
                        <hr>


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

        <p><a href='<?php echo base_url().'admincontroller/view/'.$news_item['slug'] ?>'><span class='glyphicon glyphicon-eye-open'></span> View article</a> | <a href='<?php  echo base_url().'admincontroller/edit/'.$news_item['slug'] ?>'><span class='glyphicon glyphicon-edit'></span> Edit article</a> | <a  data-id="<?php echo $news_item['slug'];?>" title="" class="open-DeleteDialog" href="#deleteDialog"><span class="glyphicon glyphicon-trash"></span> Delete article</a></p>
<hr>
<?php endforeach ?>

            </div>
        </div>

<hr>


                    </div>
                </div>
            </div>
        </div>



<!-- Modal for delete blog !-->
<div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-warning-sign"></span>  Confirm Delete Dialog</h4>
      </div>
      <div class="modal-body">
        <strong> Are you sure you want to delete this post? There is no redo!</strong>

      </div>
      <div class="modal-footer">
      <a id="del_link" class="btn btn-danger btn-ok">Yes</a>
    <a class="btn btn-primary" data-dismiss="modal">No</a>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
<!-- /.modal -->
