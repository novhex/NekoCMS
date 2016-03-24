    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Contact Us</h4>

                </div>

            </div>
            <div class="row">
            <div class="col-md-4"></div>
                <div class="col-md-4">
                <?php
                        if($this->session->flashdata('form_submission_success')!=''){
                            echo "<p style='color:green;'>".$this->session->flashdata('form_submission_success')."</p>";
                        }

                        if($this->session->flashdata('form_submission_error')!=''){
                            echo "<p style='color:green;'>".$this->session->flashdata('form_submission_success')."</p>";
                        }
                ?>
                   <div class="Compose-Message">               
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Contact Form
                    </div>
                    <div class="panel-body">

                         
                        <form method="post" action="<?php echo base_url('pages/contactus');?>" accept-charset="utf-8">
                        <label><?php echo form_error('visitorName'); ?></label>
                        <input class="form-control" name="visitorName" id="visitorName"  type="text" placeholder="Your Name" class="form-control">

                        <label><?php echo form_error('emailAddress');?></label>
                         <input id="emailAddress" name="emailAddress" type="text" placeholder="Email Address" class="form-control">
                        <label><?php echo form_error('visitorMessage');?> </label>
                         <textarea class="form-control" id="visitorMessage" name="visitorMessage" placeholder="Enter your message for us here" rows="7"></textarea>
                         <br>
                         <label>Captcha Image</label>
                          <?php echo $image; ?><br>
                          <label><?php echo form_error('captcha');?></label>
                          <input id="captcha" name='captcha' type="text" placeholder="Enter Captcha Above" class="form-control">
                        <hr>
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-envelope"></span> Send Message </button>&nbsp;
                     </form>
                    </div>
                   
                </div>
                     </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>