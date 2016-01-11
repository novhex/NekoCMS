<!-- Ajax Search Javascript -->
<script>
function ajaxSearch() {
            var input_data = $('#search_page').val();
            if (input_data.length === 0) {

                 var post_data = {
                    'search_page': input_data,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>admincontroller/pagedefaultsearch",
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
                    'search_page': input_data,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>admincontroller/pageautocomplete",
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
    var pageId = _self.data('id');
  //$("#txtSlugId").val(myBookId);
    $('#del_link').attr('href', '<?php echo base_url(); ?>admincontroller/deletepage/'+pageId);
    $(_self.attr('href')).modal('show');
});
</script>

<!-- Main Div !-->
<div id='page-content-wrapper'>
            <div class='container-fluid'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <h1><span class='glyphicon glyphicon-list'></span>&nbsp; Your Pages &nbsp;  <a href='#menu-toggle' class='btn btn-success'  style='width: 175px; height: 40px;' id='menu-toggle'><span class='glyphicon glyphicon-arrow-left'></span>&nbsp; Hide/Show Sidebar</a></h1>

                           <form id='defaultForm' class='form-horizontal' method='POST'>

                        <div class='form-group'>
                            <div class='col-lg-4'>
                                <p style='color:green;'><span class='glyphicon glyphicon-search'></span>&nbsp; Quick Search Page Here: *</p>
                                     <input placeholder="Begin Searching Page Here.." class="form-control" name="search_page" id="search_page" type="text" onkeyup="ajaxSearch();">
                            </div>
                        </div>
                        </form>
                         <?php
                              if($this->session->flashdata('page_edit_success')!=''){
                          echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>×</a><strong>Info: </strong>".$this->session->flashdata('page_edit_success')."</div>";

                              }
                            ?>
                        <hr>

       <div id="suggestions">
            <div id="autoSuggestionsList">
                  <?php foreach ($allpages as $pages): ?>
                      <h3><span class="glyphicon glyphicon-info-sign"></span> <?php echo $pages['page_name']; ?></h3>
                      <h4><span class="glyphicon glyphicon-road"></span> Page URL: <?php echo anchor("pages/section/".$pages['page_slug'],''); ?></h4>
        <div class='main'>
                <?php echo "Description: ".$pages['page_description']; ?>
        </div>

               <p><a href='<?php  echo base_url().'admincontroller/editpage/'.$pages['page_slug'] ?>'><span class="glyphicon glyphicon-edit"></span> Edit Page</a> | <a  data-id="<?php echo $pages['page_slug'];?>" title="" class="open-DeleteDialog" href="#deleteDialog"><span class="glyphicon glyphicon-trash"></span> Delete Page</a></p>
<hr>
<?php endforeach ?>

            </div>
        </div>
       <p> <?php //echo $this->pagination->create_links(); ?></p>
<hr>


                    </div>
                </div>
            </div>
        </div>
<!-- Modal for delete page !-->
<div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-warning-sign"></span>  Confirm Delete Dialog</h4>
      </div>
      <div class="modal-body">
        <strong> Are you sure you want to delete this page? There is no redo!</strong>

      </div>
      <div class="modal-footer">
      <a id="del_link" class="btn btn-danger btn-ok">Yes</a>
    <a class="btn btn-primary" data-dismiss="modal">No</a>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
<!-- /.modal -->
