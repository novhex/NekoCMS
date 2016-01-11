
     <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">


<style>
    .header {
        color: #36A0FF;
        font-size: 27px;
        padding: 10px;
    }

    .bigicon {
        font-size: 35px;
        color: #36A0FF;
    }
</style>

       <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="<?php echo base_url();?>pages/contactus" accept-charset="utf-8">
                    <input type='hidden' id='time' name='time' value='<?php echo $time; ?>' />
                    <fieldset>
                        <legend class="text-center header">Contact Us</legend>
                          <?php
                            if(validation_errors()!=''){
                            echo "<div class='alert alert-danger'><a class='close' data-dismiss='alert'>×</a>".validation_errors()."</div>";
                            }
                          ?>
                      
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input class="form-control" name="visitorName" id="visitorName"  type="text" placeholder="Your Name" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="emailAddress" name="emailAddress" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>



                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="visitorMessage" name="visitorMessage" placeholder="Enter your message for us here" rows="7"></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                              <?php echo $image; ?>
                            </div>
                        </div>

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                              <div class="col-md-8">
                                  <input id="captcha" name='captcha' type="text" placeholder="Enter Captcha Above" class="form-control">
                              </div>
                          </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                              <button type="submit" id="btnSubmitMessage" name="btnSubmitMessage" class="btn btn-success"><span class="glyphicon glyphicon-envelope"></span>&nbsp; Submit Message</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
