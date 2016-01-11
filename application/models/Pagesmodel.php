<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PagesModel
 *
 * @author Novi
 */
class PagesModel extends CI_Model{
    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('user_agent');
    }

    public function allpages(){

        $query= $this->db->order_by('pages.page_description',"ASC");
        $query= $this->db->get('pages');
        return $query->result_array();
    }

    public function checkifIPexists($ip){
      $this->db->from('visitor_count');
      $this->db->where('visitor_count.visitor_ip',$ip);
      $db_results=$this->db->get();
      $results=$db_results->result();
      $numrows=$db_results->num_rows();

        if($numrows>=1){
          //Current IP already visited the site
        }else{
          $data=array('visitor_ip'=>$ip,
          'date_visited'=>str_replace("/","-",date("Y/m/d")),
          'ip_details'=>  'Browser Name: '.$this->agent->browser().' Browser Version: '.$this->agent->version().' Operating System: '.$this->agent->platform(),
          );
        return $this->db->insert('visitor_count', $data);
        }
    }

    public function latestArticles(){
      $query= $this->db->order_by('news.date_posted',"DESC");
      $query= $this->db->get('news',3,0);
      return $query->result_array();
    }

    public function sidebarLinks(){
      $query= $this->db->order_by('pages.page_description',"DESC");
      $query= $this->db->get('pages',5,0);
      return $query->result_array();
    }

    public function countTotalPosts(){
      return $this->db->count_all("news");
    }

    public function countTotalVisitors(){
      return $this->db->count_all("visitor_count");
    }

    public function showOwnerProfile(){
      $query=$this->db->where('users.id',1);
      $query=$this->db->get('users');
      return $query->result_array();
    }

    public function showOwnerMotto(){

    }
    public function allpost_from_category($parentSlug,$offset,$limit){
    $this->db->where('news.parent_category',$parentSlug);
    $this->db->order_by("news.id", "DESC");
    $query=$this->db->get('news',$limit,$offset);
    return $query->result_array();

   }

   public function getarticletoView($slug){
     $this->db->where('news.slug',$slug);
     $query=$this->db->get('news');
     return $query->result_array();

   }

   public function countpost_from_category($parentSlug){
        $this->db->from('news');
        $this->db->where('news.parent_category',$parentSlug);
        $db_results=$this->db->get();
        $results=$db_results->result();
        $numrows=$db_results->num_rows();
        return $numrows;
   }

   public function getsite_meta_description(){
   $this->db->where('blog_info.configID',2);
    $query=$this->db->get('blog_info');
    return $query->result_array();

   }

   public function getsite_owner(){
     $this->db->where('blog_info.configID',3);
    $query=$this->db->get('blog_info');
    return $query->result_array();
   }

   public function getsite_title(){
      $this->db->where('blog_info.configID',1);
    $query=$this->db->get('blog_info');
    return $query->result_array();
   }

   public function submitcontactform(){

if($this->validateCaptcha()===TRUE){
     $data = array(
         'visitor_email' => $this->input->post('emailAddress'),
         'body' => $this->input->post('visitorMessage'),
         'from' => $this->input->post('visitorName'),
         'ip_address' => $this->input->ip_address(),
         'is_read'=> 'N',
         'date_recieved'=>str_replace("/","-",date("Y/m/d"))
     );
      $this->db->insert('visitor_messages', $data);
      return TRUE;
     }
     else{
       echo "invalid captcha. message not submitted";
       return FALSE;
     }
   }

   public function validateCaptcha(){

               $submittedCaptcha = $this->input->post('captcha');

               $query = $this->db->from('captcha');
               $query = $this->db->where('captcha.word',  $submittedCaptcha);


               if($this->db->count_all_results()===1){

                 $this->db->where('captcha.word', $submittedCaptcha);
                 $this->db->delete('captcha');
                 unlink('./_tmp/'.$this->input->post('time').'.jpg');
                 $this->emptyTmpDir();
                 return TRUE;
             }

             else
             {
               $this->db->where('captcha.word', $submittedCaptcha);
               $this->db->delete('captcha');
               unlink('./_tmp/'.$this->input->post('time').'.jpg');
               $this->emptyTmpDir();
               return FALSE;
             }
   }

  public function emptyTmpDir(){
        $files = glob('./_tmp/*'); // get all file names
        foreach($files as $file){ // iterate files
          if(is_file($file))
            unlink($file); // delete file
        }
  }
}
