<?php
/*
 * Author @novi
 * @novhz0514@gmail.com
 * @facebook.com/novhz.emo94
 * @Class loader front end Script for Neko! CMS
 *  
 *  */
class classLoader {
    //put your code here
    
    private $classes_to_load=array(
        'controller/viewpost_controller.php',
        'controller/index_controller.php',
        'cfg/config.php',
        'controller/viewpost_controller.php',
        'tpl/blog_header.php',
        'controller/index_controller.php',
        'controller/categories_controller.php',
        'custom_classes/Pagination.php',
        'tpl/blog_footer.php'
       
    );
    public function __construct() {
        foreach($this->classes_to_load as $class){
            
            if(file_exists($class)==TRUE) {
                require_once $class;
               
                //echo "<p style='color:green;'>Debug Output: Included file: @ ".ROOT_PATH.$class."</p>";
            }else{
               // echo "<p style='color:red;'>Debug Output: File: ".$class. " was not found! check if file exists</p>";
            }
        }
    }
}
//initialize object for classLoader
$cLoaader=new classLoader();
