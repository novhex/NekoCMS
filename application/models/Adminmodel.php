<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminModel
 *
 * @author Novi
 */
class AdminModel extends CI_Model{
    //put your code here
    private $salt_key_encryption="c0d3!gN!t3r@Pp";
    private $project_url='';
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library(array('session','email'));
    }

    public function checkLoginDetails(){

       $username = $this->input->post('username');
       $password = $this->input->post('password');

       $query = $this->db->from('users');
       $query = $this->db->where('username', $username);
       $query = $this->db->where('password', $this->hashPassword($password));

       if($this->db->count_all_results()===1){
       $this->session->set_userdata('username',$username);
       $this->fetchUserInfo($username);

        return TRUE;
       }

    }

    public function fetchUserInfo($userName){

     $query = $this->db->query("SELECT * from users where username='$userName'");
      foreach($query->result_array() as $usrInfo){
       $newdata = array(
        'nickname'  => $usrInfo['name'],
        'logged_in' => TRUE,
        'display_photo'=>$usrInfo['profile_photo'],
        'bio'=>$usrInfo['short_motto'],
        'email'=>$usrInfo['email']
      );
        $this->session->set_userdata($newdata);
      }

    }

    public function get_categories(){
          if($this->hasCurrentLoggedIn()===FALSE){
          redirect(base_url().'admincontroller/index');
}

        $query= $this->db->get('pages');
        return $query->result_array();
    }

    public function hasCurrentLoggedIn(){

            $sessionData=$this->session->all_userdata();
            $currentSession= $this->session->userdata('username');
            if($currentSession==NULL){
                return FALSE;
            }else { return TRUE; }
    }


   public function  allnews($cfg_page,$offset){
  if($this->hasCurrentLoggedIn()===FALSE){
    redirect(base_url().'admincontroller/index');
}

    $query=$this->db->order_by("id", "DESC");
    $query=$this->db->get('news',$cfg_page,$offset);
    return $query->result_array();

}


   public function  allpages($cfg_page,$offset){
  if($this->hasCurrentLoggedIn()===FALSE){
      redirect(base_url().'admincontroller/index');
}

    $query=$this->db->order_by("id", "desc");
    $query=$this->db->get('pages',$cfg_page,$offset);
    return $query->result_array();

}


    public function page_get_autocomplete($search_data) {

     if($this->hasCurrentLoggedIn()===FALSE){
        redirect(base_url().'admincontroller/index');
   }
           $this->db->select('*');
           $this->db->like('page_name', $search_data);
           return $this->db->get('pages', 10);


       }

    public function page_get_defaultsearch(){

     if($this->hasCurrentLoggedIn()===FALSE){
        redirect(base_url().'admincontroller/index');
   }
           $this->db->select('*');
           return $this->db->get('pages');
   }

    public function get_autocomplete($search_data) {

     if($this->hasCurrentLoggedIn()===FALSE){
         redirect(base_url().'admincontroller/index');
   }
           $this->db->select('*');
           $this->db->like('title', $search_data);
           return $this->db->get('news', 10);


       }
    public function get_defaultsearch(){

      if($this->hasCurrentLoggedIn()===FALSE){
         redirect(base_url().'admincontroller/index');
    }
            $this->db->select('*');
            return $this->db->get('news');
    }

    public function fetch_unread_messages($cfg_page,$offset){

      if($this->hasCurrentLoggedIn()===FALSE){
         redirect(base_url().'admincontroller/index');
    }

    $query=$this->db->order_by("msgID", "DESC");
    $query=$this->db->get('visitor_messages',$cfg_page,$offset);
    return $query->result_array();


    }

    public function checkifmailExists($mail){

       $this->db->where('users.email', $mail);
      $this->db->from('users');
      return $this->db->count_all_results();
    }

   public function record_count() {
         if($this->hasCurrentLoggedIn()===FALSE){
    redirect(base_url().'admincontroller/index');
      }
        return $this->db->count_all("news");
    }

    public function unread_message_count(){
      if($this->hasCurrentLoggedIn()===FALSE){
        redirect(base_url().'admincontroller/index');
   }
   $this->db->where('visitor_messages.is_read', 'N');
    $this->db->from('visitor_messages');
    return $this->db->count_all_results();
    }

    public function set_news()
    {
          if($this->hasCurrentLoggedIn()===FALSE){
     redirect(base_url().'admincontroller/index');
}
    $slug = url_title($this->input->post('txt_title'), 'dash', TRUE);

    $data = array(
        'title' => ucfirst($this->input->post('txt_title')),
        'slug' => $slug,
        'text' => $this->input->post('txt_content'),
        'parent_category'=> $this->input->post('dropdownCateg'),
        'date_posted'=>str_replace("/","-",date("Y/m/d"))
    );

   if($this->db->insert('news', $data)==TRUE){

   }
   }

    public function viewnews($slug){
          if($this->hasCurrentLoggedIn()===FALSE){
        redirect(base_url().'admincontroller/index');
    }


    $query = $this->db->get_where('news', array('slug' => $slug));

            if($query->row_array()==NULL){
              return FALSE;
            }else{
            return $query->row_array();
          }
     }


  public function viewmsg($msgid){
      if($this->hasCurrentLoggedIn()===FALSE){
    redirect(base_url().'admincontroller/index');
    }


    $query = $this->db->get_where('visitor_messages', array('msgID' => $msgid));

        if($query->row_array()==NULL){
          return FALSE;
        }else{
          $data=array('is_read'=>'Y');
          $this->db->where('visitor_messages.msgID',$msgid);
          $this->db->update('visitor_messages',$data);
          return $query->row_array();
      }
}

    public function fetchNewsToEdit($slug){
      if($this->hasCurrentLoggedIn()===FALSE)
        {
           redirect(base_url().'admincontroller/index');
        }else {
        $query = $this->db->get_where('news', array('slug' => $slug));
            if($query->row_array()==NULL){
              show_404();
            }else{
            return $query->row_array();
          }
        }
    }

    public function fetchPageToEdit($page){
         if($this->hasCurrentLoggedIn()===FALSE)
        {
          redirect(base_url().'admincontroller/index');
        }else {
        $query = $this->db->get_where('pages', array('page_slug' => $page));
            if($query->row_array()==NULL){
              show_404();
            }else{
            return $query->row_array();
          }
        }

    }

    public function saveEditedNews() {
          if($this->hasCurrentLoggedIn()===FALSE){
        redirect(base_url().'admincontroller/index');
    }

     $slug = url_title($this->input->post('txt_title'), 'dash', TRUE);


    if($this->input->post('dropdownCateg')==='')
    {
         $data = array(
            'title' => $this->input->post('txt_title'),
            'text' => $this->input->post('txt_content'),
            'slug'=>$slug
        );
    }else{
      $data = array(
            'title' => $this->input->post('txt_title'),
            'text' => $this->input->post('txt_content'),
            'parent_category'=>$this->input->post('dropdownCateg'),
            'slug'=>$slug
        );
    }

    $this->db->where('news.slug',$this->input->post('txt_slug'));
    return $this->db->update('news', $data);

    }

  public function saveEditedPage(){
           if($this->hasCurrentLoggedIn()===FALSE){
         redirect(base_url().'admincontroller/index');
    }

      $slug=url_title($this->input->post('txt_pagetitle'),'dash',TRUE);

      $data=array(
        'page_name'=>$this->input->post('txt_pagetitle'),
        'page_description'=>$this->input->post('txt_pagedesc'),
        'page_slug'=>$slug
        );
      $this->db->where('pages.page_slug',$this->input->post('curr_slug'));
      $this->updatePageParentCategory($slug,$this->input->post('curr_slug'));
      return $this->db->update('pages',$data);
  }

public function updatesiteInfo($val){
  if($this->hasCurrentLoggedIn()===FALSE){
 redirect(base_url().'admincontroller/index');
}else{
  if($val===1){
    $this->updateBlogTitle($this->input->post('txt_site_title'));
    $this->updateBlogMeta($this->input->post('site_meta'));
    $this->updateBlogOwner($this->input->post('txt_site_owner'));
    $this->changeUsername($this->input->post('txtnewuser'));
    $this->changeNick($this->input->post('txtnewnick'));
    $this->changeBio($this->input->post('txtnewbio'));
    $this->changeEmail($this->input->post('txtnewmail'));
    $this->reloadSession($this->input->post('txtnewuser'),$this->input->post('txtnewnick'),$this->input->post('txtnewbio'),$this->input->post('txtnewmail'));
  }else{
    $this->updateBlogTitle($this->input->post('txt_site_title'));
    $this->updateBlogMeta($this->input->post('site_meta'));
    $this->updateBlogOwner($this->input->post('txt_site_owner'));
    $this->changeUsername($this->input->post('txtnewuser'));
    $this->changePassword($this->input->post('txtnewpass'));
    $this->changeNick($this->input->post('txtnewnick'));
    $this->changeEmail($this->input->post('txtnewmail'));
    $this->changeBio($this->input->post('txtnewbio'));
    $this->reloadSession($this->input->post('txtnewuser'),$this->input->post('txtnewnick'),$this->input->post('txtnewbio'),$this->input->post('txtnewmail'));

  }
}
}

public function updateUserPic($path){
  if($this->hasCurrentLoggedIn()===FALSE){
 redirect(base_url().'admincontroller/index');
}else{
  $this->resetDisplayPhotoSession($path);
  $data=array(
    'profile_photo'=>$path
    );
    $this->db->where('users.id',1);
    return $this->db->update('users',$data);
  }
}

public function resetDisplayPhotoSession($newpath){
  if($this->hasCurrentLoggedIn()===FALSE){
 redirect(base_url().'admincontroller/index');
}else{
  unset($_SESSION['display_photo']);
    $_SESSION['display_photo']=$newpath;
  }
}

public function reloadSession($newSessionName,$newSessionNickname,$newBio,$newEmail){
  if($this->hasCurrentLoggedIn()===FALSE){
 redirect(base_url().'admincontroller/index');
}else{
  unset($_SESSION['username']);
  unset($_SESSION['nickname']);
  unset($_SESSION['bio']);
  unset($_SESSION['email']);

  $_SESSION['nickname']=$newSessionNickname;
  $_SESSION['username']=$newSessionName;
  $_SESSION['bio']=$newBio;
  $_SESSION['email']=$newEmail;
}
}


public function changeBio($new_val){
  if($this->hasCurrentLoggedIn()===FALSE){
 redirect(base_url().'admincontroller/index');
}else{
  $data=array(
    'short_motto'=>$new_val
    );
    $this->db->where('users.id',1);
    return $this->db->update('users',$data);
  }
}

public function changeEmail($new_val){
  if($this->hasCurrentLoggedIn()===FALSE){
 redirect(base_url().'admincontroller/index');
}else{
  $data=array(
    'email'=>$new_val
    );
    $this->db->where('users.id',1);
    return $this->db->update('users',$data);
  }
}

public function changePassword($new_val){
  if($this->hasCurrentLoggedIn()===FALSE){
 redirect(base_url().'admincontroller/index');
}else{
  $data=array(
    'password'=>$this->hashPassword($new_val)
    );
    $this->db->where('users.id',1);
  return $this->db->update('users',$data);
}
}


public function changeNick($new_val){
  if($this->hasCurrentLoggedIn()===FALSE){
 redirect(base_url().'admincontroller/index');
}else{
  $data=array(
    'name'=>$new_val
    );
    $this->db->where('users.id',1);
  return $this->db->update('users',$data);
}
}

public function changeUsername($new_val){
  if($this->hasCurrentLoggedIn()===FALSE){
 redirect(base_url().'admincontroller/index');
}else{
  $data=array(
    'username'=>$new_val
    );
    $this->db->where('users.id',1);
  return $this->db->update('users',$data);
}
}

public function updateBlogTitle($new_val){

if($this->hasCurrentLoggedIn()===FALSE){
redirect(base_url().'admincontroller/index');
}else{
        $data=array(
          'configValue'=>$new_val
          );
          $this->db->where('blog_info.configID',1);
        return $this->db->update('blog_info',$data);
      }
}

public function updateBlogMeta($new_val){

        $data=array(
          'configValue'=>$new_val
          );
          $this->db->where('blog_info.configID',2);
        return $this->db->update('blog_info',$data);
}


public function updateBlogOwner($new_val){

        $data=array(
          'configValue'=>$new_val
          );
          $this->db->where('blog_info.configID',3);
        return $this->db->update('blog_info',$data);
}

public function updatePageParentCategory($new_slug,$old_slug){
         if($this->hasCurrentLoggedIn()===FALSE){
        redirect(base_url().'admincontroller/index');
    }else{
    $this->db->query("UPDATE  news SET parent_category = '$new_slug' WHERE parent_category = '$old_slug'");
  }
}

public function savepage() {
      if($this->hasCurrentLoggedIn()===FALSE){
     redirect(base_url().'admincontroller/index');
}
 $slug = url_title($this->input->post('txt_pagetitle'), 'dash', TRUE);
    $data=array(
      'page_name'=>  $this->input->post('txt_pagetitle'),
       'page_description'=> $this->input->post('txt_pagedesc'),
        'page_slug'=>$slug,
        'date_added'=>str_replace('/','-',date('Y/m/d'))

    );
    if($this->db->insert('pages',$data)===TRUE){
        redirect(base_url().'admincontroller/pages');
    }
}

    public function deletenews($slug){
    if($this->hasCurrentLoggedIn()===FALSE){
        redirect(base_url().'admincontroller/index');
    }else{
    $this->db->where('news.slug',$slug);
    return $this->db->delete('news');
    }
    }

public function delete_selected_message($id){
   if($this->hasCurrentLoggedIn()===FALSE){
  redirect(base_url().'admincontroller/index');
}else{
$this->db->where('visitor_messages.msgID',$id);
return $this->db->delete('visitor_messages');
}
}

    public function delete_selected_page($slug){
       if($this->hasCurrentLoggedIn()===FALSE){
      redirect(base_url().'admincontroller/index');
    }else{
    $this->db->where('pages.page_slug',$slug);
    return $this->db->delete('pages');
    }
  }

  public function getsite_meta_description(){
    if($this->hasCurrentLoggedIn()===FALSE){
   redirect(base_url().'admincontroller/index');
  }else{
  $this->db->where('blog_info.configID',2);
   $query=$this->db->get('blog_info');
   return $query->result_array();
  }
  }

public function countTotalVisitors(){
  if($this->hasCurrentLoggedIn()===FALSE){
 redirect(base_url().'admincontroller/index');
}else{
  return $this->db->count_all("visitor_count");
}
}


public function getsite_owner(){
  if($this->hasCurrentLoggedIn()===FALSE){
 redirect(base_url().'admincontroller/index');
}else{
  $this->db->where('blog_info.configID',3);
 $query=$this->db->get('blog_info');
 return $query->result_array();
}
}

public function getsite_title(){
  if($this->hasCurrentLoggedIn()===FALSE){
 redirect(base_url().'admincontroller/index');
}else{
   $this->db->where('blog_info.configID',1);
 $query=$this->db->get('blog_info');
 return $query->result_array();
}
}
   public function hashPassword($password){
        return sha1($this->salt_key_encryption.$password);
    }
}
