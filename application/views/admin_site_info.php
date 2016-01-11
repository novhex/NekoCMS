<?php
    $userData=$this->session->all_userdata();

 ?>
<div id="page-content-wrapper">
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-12">
                   <h1><span class='glyphicon glyphicon-info-sign'></span>&nbsp; Site Info &nbsp; <a href='#menu-toggle' class='btn btn-success'  style='width: 175px; height: 40px;' id='menu-toggle'><span class='glyphicon glyphicon-arrow-left'></span>&nbsp; Hide/Show Sidebar</a></h1>
                   <hr>
        <?php
           if(validation_errors()){
           echo "<div class='alert alert-danger' style='width:965px; height:200px;'><a class='close' data-dismiss='alert'>×</a>".validation_errors()."</div>";
           }
           if($this->session->flashdata('changes1')!=''){


            echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>×</a><strong>Info: </strong>".$this->session->flashdata('changes1')."</div>";

           }
           ?>

           <div class='row'>
               <div class='col-lg-12'>
                   <form id='defaultForm' method='POST' class='form-horizontal' action="<?php echo base_url('admincontroller/siteinfo');?>"  accept-charset="utf-8" enctype="multipart/form-data">
                         <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                   <div class='form-group'>
                       <div class='col-lg-4'>
                           <p style="color:green;"><span class='glyphicon glyphicon-info-sign'></span>&nbsp; Site Name *</p>
                           <?php foreach($site_title as $sitename):?>
                           <input value='<?php echo $sitename['configValue']; ?>' style='width:700px; height:35px; font-weight: bold; font-size: 20px;' id='txt_site_title' type='text' class='form-control' name='txt_site_title' placeholder='Site Title'/>
                         <?php endforeach; ?>
                       </div>
                   </div>

            <div class='form-group'>
                                   <div class='col-lg-4'>
                                       <p style="color:green;"><span class='glyphicon glyphicon-use'></span>&nbsp; Site Owner *</p>
                                       <?php foreach($site_owner as $siteowner):?>
                                       <input value='<?php echo $siteowner['configValue']; ?>' style='width:200px; height:35px; font-weight: bold; font-size: 20px;' id='txt_site_owner' type='text' class='form-control' name='txt_site_owner' placeholder='Site Owner'/>
                                     <?php endforeach; ?>
                                   </div>
                                   </div>
       <div class='form-group'>
                       <div class='col-lg-4'>
                           <p style="color:green;"><span class='glyphicon glyphicon-tag'></span>&nbsp; Site Description *</p>
                            <?php foreach($site_meta as $sitemeta): ?>
                              <textarea style="" name="site_meta" placeholder="Add some description of your site" class="form-control"><?php echo $sitemeta['configValue'];?></textarea>
                            <?php endforeach; ?>
                       </div>
                   </div>

                   <h1> <span class='glyphicon glyphicon-sunglasses'></span> Administrator Account </h1>
                   <label class='label label-danger'>[ Note: Leave " New Password " field empty if you don't want  to change your password but if it is the first time to run , please change the default password. ]</label>

                   <hr>

                   <div class='form-group'>
                   <div class='col-lg-4'>
                     <img onClick="$('#imgfile').click();" data-holder-rendered="true" src="<?php echo $userData['display_photo']; ?>" style="width: 150px; height: 150px;" data-src="holder.js/200x200" class="img-thumbnail" alt="default_user's photo">
                     <p style="color:green; cursor:pointer;" onClick="$('#imgfile').click();"><span class='glyphicon glyphicon-camera'></span>&nbsp; Click Camera Icon To Update Profile Photo *</p>
                     <input type="file" name="imgfile[]" style="display:none;"  id="imgfile" accept="image/*" class='form-control'/>
                     </div>
                   </div>

                    <div class='form-group'>
                    <div class='col-lg-4'>
                        <p style="color:green;"><span class='glyphicon glyphicon-envelope'></span>&nbsp; Email *</p>
                        <input placeholder='New Email' type='email' name='txtnewmail' id='txtnewmail' value='<?php echo $userData['email']; ?>' class='form-control' />
                      </div>
                    </div>

                   <div class='form-group'>
                   <div class='col-lg-4'>
                       <p style="color:green;"><span class='glyphicon glyphicon-star'></span>&nbsp; Full Name *</p>
                       <input placeholder='New Nickname' type='text' name='txtnewnick' id='txtnewnick' value='<?php echo $userData['nickname']; ?>' class='form-control' />
                     </div>
                   </div>


                   <div class='form-group'>
                   <div class='col-lg-4'>
                       <p style="color:green;"><span class='glyphicon glyphicon-user'></span>&nbsp; New Username *</p>
                       <input placeholder='New Username' type='text' name='txtnewuser' id='txtnewuser' value='<?php echo $userData['username']; ?>' class='form-control' />
                     </div>
                   </div>
                    <div class='form-group'>
                    <div class='col-lg-4'>
                        <p style="color:green;"><span class='glyphicon glyphicon-thumbs-up'></span>&nbsp; Short Bio (It will appear on your "About" Sidebar in Homepage)*</p>
                        <input placeholder='Short Bio..' type='text' name='txtnewbio' id='txtnewbio' value='<?php echo $userData['bio']; ?>' class='form-control' />
                      </div>
                    </div>

                    <div class='form-group'>
                    <div class='col-lg-4'>
                        <p style="color:green;"><span class='glyphicon glyphicon-lock'></span>&nbsp; New Password *</p>
                        <input type='password' placeholder='New Password'  name='txtnewpass' id='txtnewpass' value='' class='form-control' />
                      </div>
                    </div>

                      <div class='form-group'>
                    <div class='col-lg-4'>
                        <p style="color:green;"><span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp; Confirm New Password *</p>
                        <input type='password' placeholder='Please Confirm New Password'  name='txtnewpasscf' id='txtnewpasscf' value='' class='form-control' />
                      </div>
                    </div>



                   <div class='form-group'>
                       <label class='col-lg-3 control-label'></label>
                       <div class='col-lg-5' style='width:1000px; height:500px;'>

                        <br>
                        <button type='submit'  name='btn_publish' class='btn btn-success' style='width: 160px; font-weight: bold; font-size: 16px;'><span class='glyphicon glyphicon-ok'></span>&nbsp;<strong> Save Now </strong></button>

                       </div>
                   </div>
           </form>
       </div>
