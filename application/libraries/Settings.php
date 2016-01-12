<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Settings {
    private $CI;
    private $live_server_config = "RewriteEngine on \n RewriteBase / \n RewriteCond %{REQUEST_FILENAME} !-f \n
        RewriteCond %{REQUEST_FILENAME} !-d \n RewriteRule ^(.*)$ index.php?/$1 [L]";
    
    private $offline_server_config ="RewriteEngine on \n RewriteBase /ci_production \n RewriteCond %{REQUEST_FILENAME} !-f \n
        RewriteCond %{REQUEST_FILENAME} !-d \n RewriteRule ^(.*)$ index.php?/$1 [L]";


    public function __construct(){
       $this->CI=&get_instance();
       $this->CI->load->helper('url');
        $this->initHtaccess(); 
       
    }
    
    public  function initHtaccess(){
        if(file_exists("././.htaccess")){
        }else{
           $myfile = fopen("././.htaccess", "w") or die("Unable to open file!");
            if(strpos(base_url(),"http://localhost")!==false || strpos(base_url(),"http://127.0.0.1")!==false ){
                    fwrite($myfile,$this->offline_server_config);
            }else{
                    fwrite($myfile, $this->live_server_config);  
            }
            fclose($myfile);
        }
    }
}