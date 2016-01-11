<div class="hidden-sm hidden-xs" style="clear:both; width:100%; height: 30px;"></div>




    <div id="footer">
        <div class="container">
            <div class="col-md-12">
              <?php
              foreach($page_title as $pagetitle):
              ?>
              <span class="pull-right"> &copy; <a href='<?php echo base_url(); ?>'> <?php echo $pagetitle['configValue']; ?> </a> | Developed by <a href='https://www.facebook.com/novhz.emo94' target='_blank'>Novi</a> | <a href='<?php echo base_url()."pages/contactus";?>' target='_blank'>Contact Site Admin</a>  | <a href='<?php echo base_url()."admincontroller/index"; ?>' >WebMaster Login</a></span>
              <br>
              <br>

              <?php endforeach; ?>
              <p>Select Theme:</p>
              <form action='<?php echo base_url()."pages/themeselection" ?>' method='POST' accept-charset='utf-8'>
		                       <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

              <select name='cbtheme' style='height:30px; width:200px;'>
              <option> Default Theme </option>
              <option> Purple Theme </option>
              <option> Orange Theme </option>
              <option> Red Theme </option>
              <option> Maroon Theme </option>
              <option> Facebook Like </option>
              </select>
              <button type='submit' class='btn btn-success' style='height:35px;'><span class='glyphicon glyphicon-check'></span> Apply Theme</button>
            </form>

            </div>
        </div>
    </div>

  </body>
</html>