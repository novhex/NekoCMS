<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('admincontroller/index'); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Blog Pages List</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Blog Pages List</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Blog Pages List</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                                                

                           <form id='defaultForm' class='form-horizontal' method='POST'>

                        <div class='form-group'>
                            <div class='col-lg-12'>
                                <p><span class='glyphicon glyphicon-search'></span>&nbsp; Quick Search Page Here: *</p>
                                    <input placeholder="Begin Searching Page Here.." class="form-control" name="search_page" id="search_page" type="text" onkeyup="ajaxSearch();">
                            </div>
                        </div>
                        </form>
                         <?php
                              if($this->session->flashdata('page_edit_success')!=''){
                          echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>×</a><strong>Info: </strong>".$this->session->flashdata('page_edit_success')."</div>";

                              }
                            ?>

       <div id="suggestions">
            <div id="autoSuggestionsList">
                  <?php foreach ($allpages as $pages): ?>
                      <h3><span class="glyphicon glyphicon-info-sign"></span> <?php echo $pages['page_name']; ?></h3>
                      <h4><span class="glyphicon glyphicon-road"></span> Page URL: <?php echo anchor("pages/section/".$pages['page_slug'],''); ?></h4>
        <div class='main'>
                <?php echo "Description: ".$pages['page_description']; ?>
        </div>

               <p><a href='<?php  echo base_url().'admincontroller/editpage/'.$pages['page_slug'] ?>'><span class="glyphicon glyphicon-edit"></span> Edit Page</a> | <a  data-id="<?php echo $pages['page_slug'];?>" class="deletepage" href="#"><span class="glyphicon glyphicon-trash"></span> Delete Page</a></p>
    <hr>
            <?php endforeach ?>

            </div>
        </div>
       <p> <?php //echo $this->pagination->create_links(); ?></p>
<hr>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->

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
                    url: "<?php echo base_url('admincontroller/pagedefaultsearch'); ?>",
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
                    url: "<?php echo base_url('admincontroller/pageautocomplete'); ?>",
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


$(document).on('click','.deletepage',function(){
    var pageslug =this.dataset.id;

        bootbox.confirm("Are you sure",function(x){
            if(x==true){
                window.location = "<?php  echo base_url('admincontroller/deletepage');?>"+"/"+pageslug;
            }
        });
});



});

</script>
