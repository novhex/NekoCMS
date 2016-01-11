<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 *
 * @author Novi
 */
class Admincontroller extends CI_Controller {


    //put your code here

  private $project_url;
  private $dir_path="";
    public function __construct()
    {
        parent::__construct();
        $this->dir_path='./images/';
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('adminmodel');
        $this->load->library(array('pagination','table','form_validation','email'));

    }

    public function index(){
         if($this->adminmodel->hasCurrentLoggedIn()==TRUE){
           redirect(base_url().'admincontroller/dashboard');
    }
       $data['page_title']="Admin Login";
        $data['page_name']="login_page";
        $this->load->view('tpl/header',$data);
        $this->load->view('login_page');
        $this->load->view('tpl/footer',$data);
}

    public function login(){
     if($this->adminmodel->hasCurrentLoggedIn()==TRUE){
         redirect(base_url().'admincontroller/dashboard');
    }
    else{
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[45]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[45]');

    if ($this->form_validation->run() === FALSE)
    {
         $data['page_title']="Admin Login";
        $data['page_name']="login_page";
        $this->load->view('tpl/header',$data);
        $this->load->view('login_page');
        $this->load->view('tpl/footer',$data);


    }
    else{
         if($this->adminmodel->checkLoginDetails()==TRUE){

          redirect(base_url().'admincontroller/dashboard');
           }else{
               $this->session->set_flashdata('login_error','Invalid Username or Password...');
              redirect(base_url().'admincontroller/index');
           }

        }
    }

}


  public function logout(){
         $userData=$this->session->all_userdata();
         $array_items = array('username','__ci_last_regenerate','nickname','logged_in','display_photo');
         $this->session->unset_userdata($array_items);
         $this->session->set_flashdata('dc_notice','You are disconnected...');
       redirect(base_url().'admincontroller/index');
 }

public function inbox($offset=0){
    $data['page_title']="Dashboard  &raquo; Inbox";
    $data['page_name']="dashboard";

    /*$uri_segment = 5;
		$offset = $this->uri->segment($uri_segment);

    $config['base_url'] = base_url().'admincontroller/inbox';
    $config['total_rows'] =$this->adminmodel->unread_message_count();
    $config['per_page'] = 10;
    $config['num_links'] =$this->adminmodel->unread_message_count();
    $config['use_page_numbers'] = TRUE;
    $config['prev_link'] = '&laquo;';
    $config['next_link'] = '&raquo;';
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $this->pagination->initialize($config);
    $data['message_count']=$this->adminmodel->unread_message_count();
    $data['message_list']=$this->adminmodel->fetch_unread_messages(10,$offset);
    $this->load->view('tpl/header',$data);
    $this->load->view('tpl/sidebar');
    $this->load->view('admin_inbox',$data);
    $this->load->view('tpl/footer',$data);*/
	   $uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);

	  $config['base_url'] = base_url().'admincontroller/inbox';
    $config['total_rows'] =$this->adminmodel->unread_message_count();
 		$config['per_page'] = 10;
     $config['prev_link'] = '&laquo;';
     $config['next_link'] = '&raquo;';
     $config['full_tag_open'] = '<ul class="pagination">';
     $config['full_tag_close'] = '</ul>';
     $config['prev_link'] = '&laquo;';
     $config['prev_tag_open'] = '<li>';
     $config['prev_tag_close'] = '</li>';
     $config['next_tag_open'] = '<li>';
     $config['next_tag_close'] = '</li>';
     $config['cur_tag_open'] = '<li class="active"><a href="#">';
     $config['cur_tag_close'] = '</a></li>';
     $config['num_tag_open'] = '<li>';
     $config['num_tag_close'] = '</li>';
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
    $data['message_count']=$this->adminmodel->unread_message_count();
    $data['message_list']=$this->adminmodel->fetch_unread_messages(10,$offset);
    $this->load->view('tpl/header',$data);
    $this->load->view('tpl/sidebar');
    $this->load->view('admin_inbox',$data);
    $this->load->view('tpl/footer',$data);



}

public function dashboard(){
            $data['page_title']="Dashboard &raquo; Home";
            $data['page_name']="dashboard";
            $data['message_count']=$this->adminmodel->unread_message_count();
            $data['visitor_count']=$this->adminmodel->countTotalVisitors();
            $data['post_count']=$this->adminmodel->record_count();
            $this->load->view('tpl/header',$data);
            $this->load->view('tpl/sidebar');
            $this->load->view('admin_dashboard',$data);
            $this->load->view('tpl/footer',$data);

}



public function addpage() {
    $this->form_validation->set_rules('txt_pagedesc','Page Description','required|trim|max_length[200]');
    $this->form_validation->set_rules('txt_pagetitle','Page Name','required|min_length[4]|trim|max_length[21]');

    if($this->form_validation->run()===FALSE){
          $data['message_count']=$this->adminmodel->unread_message_count();
            $data['page_title']="Dashboard &raquo; Add New Page";
            $data['page_name']="dashboard";
            $this->load->view('tpl/header',$data);
            $this->load->view('tpl/sidebar');
            $this->load->view('admin_addpage');
            $this->load->view('tpl/footer',$data);
    }else{

        $this->adminmodel->savepage();
    }
}


public function addblog(){
   $this->form_validation->set_rules('txt_title', 'Blog Title', 'trim|required|min_length[12]|max_length[128]');
    $this->form_validation->set_rules('txt_content', 'Blog Content', 'trim|required');
    $this->form_validation->set_rules('dropdownCateg', 'Blog Category', 'required');

    if ($this->form_validation->run() === FALSE)
    {
            $data['page_title']="Dashboard &raquo; Add New Post ";
            $data['page_name']="dashboard";
            $data['message_count']=$this->adminmodel->unread_message_count();
            $data['page_categories']=$this->adminmodel->get_categories();
            $this->load->view('tpl/header',$data);
            $this->load->view('tpl/sidebar');
            $this->load->view('admin_addblog');
            $this->load->view('tpl/footer',$data);

    }else{
           $this->adminmodel->set_news();
           $this->session->set_flashdata('addblog_success','Blog Succesfully Posted');
         redirect(base_url().'admincontroller/posts');

    }
}


public function redirpage(){
  $page_number=$this->input->post('goto');
  if(!empty($page_number)){

   redirect(base_url().'admincontroller/posts/'.$page_number);
  }else{

     redirect(base_url().'admincontroller/posts');
  }
}



public function pages($offset=0){

    $data['page_title']="Dashboard &raquo; View All Pages";
    $data['page_name']="dashboard";
    $data['message_count']=$this->adminmodel->unread_message_count();
        $this->load->view('tpl/header',$data);
        $this->load->view('tpl/sidebar');

         $data['allpages']=$this->adminmodel->allpages(3,$offset);
        $this->load->view('admin_viewpages',$data);
        $this->load->view('tpl/footer',$data);
}

public function posts($offset=0){
        $data['page_title']="Dashboard &raquo; View All Post ";
        $data['page_name']="dashboard";
        $data['message_count']=$this->adminmodel->unread_message_count();
        $this->load->view('tpl/header',$data);
        $this->load->view('tpl/sidebar');
        $config['uri_segment'] = 3;
        $config['base_url'] = base_url().'admincontroller/posts';
        $config['total_rows'] =$this->adminmodel->record_count();
        $config['per_page'] = 10;
        $config['num_links'] =$this->adminmodel->record_count();
        $config['prev_link'] = '&laquo;';
        $config['next_link'] = '&raquo;';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['news']=$this->adminmodel->allnews(10,$offset);
        $this->load->view('admin_viewpost',$data);
        $this->load->view('tpl/footer',$data);
}

public function view($slug) {
    if(empty($slug))
  {
    redirect(base_url().'admincontroller/posts');
  }
  else{
            if($this->adminmodel->viewnews($slug)!=NULL){
      $data['news']=$this->adminmodel->viewnews($slug);
            $data['page_title']="Dashboard &raquo; Viewing  A Post ";
            $data['page_name']="dashboard";
            $data['message_count']=$this->adminmodel->unread_message_count();
            $this->load->view('tpl/header',$data);
            $this->load->view('tpl/sidebar');
            $this->load->view('admin_singlepostsview',$data);
            $this->load->view('tpl/footer',$data);
            }else{
               redirect(base_url().'admincontroller/posts');
            }
  }
}

public function edit($slug){
    if(empty($slug))
  {
redirect(base_url().'admincontroller/posts');
  }
  else{

    $this->form_validation->set_rules('txt_title', 'Blog Title', 'trim|required|min_length[12]|max_length[128]');
    $this->form_validation->set_rules('txt_content', 'Blog Content', 'trim|required');


    if ($this->form_validation->run() === FALSE)
    {
            $data['news']=$this->adminmodel->fetchNewsToEdit($slug);
            $data['page_title']="Dashboard &raquo; Editing  A Post ";
            $data['page_name']="dashboard";
            $data['message_count']=$this->adminmodel->unread_message_count();
             $data['page_categories']=$this->adminmodel->get_categories();
            $this->load->view('tpl/header',$data);
            $this->load->view('tpl/sidebar');
            $this->load->view('admin_edit_news',$data);
            $this->load->view('tpl/footer',$data);

    }else{
             $this->adminmodel->saveEditedNews();
             $this->session->set_flashdata('edit_success','Post Succesfully Edited');
        redirect(base_url().'admincontroller/posts');
   }
  }
}

public function editpage($page){
  if(empty($page)){
    redirect('admincontroller/pages');
  }else{
    //fetchPageToEdit
    $this->form_validation->set_rules('txt_pagedesc','Page Description','required|trim|max_length[200]');
    $this->form_validation->set_rules('txt_pagetitle','Page Name','required|min_length[4]|trim|max_length[45]');


      if($this->form_validation->run()===FALSE){
           $data['page_to_edit']=$this->adminmodel->fetchPageToEdit($page);
            $data['page_title']="Dashboard &raquo; Editing  A Page ";
            $data['page_name']="dashboard";
            $data['message_count']=$this->adminmodel->unread_message_count();
            $this->load->view('tpl/header',$data);
            $this->load->view('tpl/sidebar');
            $this->load->view('admin_edit_page',$data);
            $this->load->view('tpl/footer',$data);
      }else{
          $this->adminmodel->saveEditedPage();
          $this->session->set_flashdata('page_edit_success','Page Edited');
        redirect(base_url().'admincontroller/pages');
      }


  }
}

 public function pageautocomplete()
    {

       $search_data = $this->input->post('search_page');
        $query = $this->adminmodel->page_get_autocomplete($search_data);

        foreach ($query->result() as $row):


          $html="<h3><span class='glyphicon glyphicon-info-sign'></span> ".$row->page_name."</h3>";
          $html.="<h4><span class='glyphicon glyphicon-road'></span> Page URL: ".anchor("pages/section/".$row->page_slug,'')."</h4>";
          $html.="<div class='main'>Description: ".$row->page_description."</div>";
          $html.="<p><a href='". base_url()."admincontroller/editpage/".$row->page_slug."'><span class='glyphicon glyphicon-edit'></span> Edit Page</a> | <a  data-id='$row->page_slug' title='' class='open-DeleteDialog' href='#deleteDialog'><span class='glyphicon glyphicon-trash'></span> Delete Page</a></p>";
          echo $html;
        endforeach;
    }

    public function pagedefaultsearch(){

        $query = $this->adminmodel->page_get_defaultsearch();

        foreach ($query->result() as $row):


          $html="<h3><span class='glyphicon glyphicon-info-sign'></span> ".$row->page_name."</h3>";
          $html.="<h4><span class='glyphicon glyphicon-road'></span> Page URL: ".anchor("pages/section/".$row->page_slug,'')."</h4>";
          $html.="<div class='main'>Description: ".$row->page_description."</div>";
          $html.="<p><a href='". base_url()."admincontroller/editpage/".$row->page_slug."'><span class='glyphicon glyphicon-edit'></span> Edit Page</a> | <a  data-id='$row->page_slug' title='' class='open-DeleteDialog' href='#deleteDialog'><span class='glyphicon glyphicon-trash'></span> Delete Page</a></p>";
          echo $html;
        endforeach;
}

   public function autocomplete()
    {

       $search_data = $this->input->post('search_data');
        $query = $this->adminmodel->get_autocomplete($search_data);

        foreach ($query->result() as $row):

         $content = strip_tags($row->text);

            if (strlen($content) > 250) {

              $stringCut = substr($content, 0, 500);
              $string_to_replace=".....";
                $content= substr($stringCut, 0, strrpos($stringCut, ' '))."&nbsp;&nbsp;".$string_to_replace;

             }

          $html="<h3><span class='glyphicon glyphicon-info-sign'></span>&nbsp; ".$row->title."</h3>";
          $html.=" <strong><span class='glyphicon glyphicon-folder-open'></span>&nbsp; Parent Category: </strong><p>$row->parent_category</p>";
          $html.="<div class='main'>".$content."</div>";
          $html.="<p><a href='".base_url()."admincontroller/view/".$row->slug."'><span class='glyphicon glyphicon-eye-open'></span> View article</a> | <a href=".base_url()."admincontroller/edit/".$row->slug."><span class='glyphicon glyphicon-edit'></span> Edit article</a> | <a data-id=".$row->slug." title='' class='open-DeleteDialog' href='#deleteDialog'><span class='glyphicon glyphicon-trash'></span> Delete article</a></p>
          <hr>";
          echo $html;
        endforeach;
    }

public function defaultsearch(){

        $query = $this->adminmodel->get_defaultsearch();

        foreach ($query->result() as $row):
        $content = strip_tags($row->text);

            if (strlen($content) > 250) {

              $stringCut = substr($content, 0, 500);
              $string_to_replace=".....";
                $content= substr($stringCut, 0, strrpos($stringCut, ' '))."&nbsp;&nbsp;".$string_to_replace;

             }

          $html="<h3><span class='glyphicon glyphicon-info-sign'></span>&nbsp;".$row->title."</h3>";
          $html.=" <strong><span class='glyphicon glyphicon-folder-open'></span>&nbsp; Parent Category: </strong><p>$row->parent_category</p>";
          $html.="<div class='main'>".$content."</div>";
          $html.="<p><a href='".base_url()."admincontroller/view/".$row->slug."'><span class='glyphicon glyphicon-eye-open'></span> View article</a> | <a href=".base_url()."admincontroller/edit/".$row->slug."><span class='glyphicon glyphicon-edit'></span> Edit article</a> | <a data-id=".$row->slug." title='' class='open-DeleteDialog' href='#deleteDialog'><span class='glyphicon glyphicon-trash'></span> Delete article</a></p>
          <hr>";
          echo $html;
        endforeach;
}

public function siteinfoValidationRules($type){

    if($type===1){
      $this->form_validation->set_rules('txt_site_owner','Site Owner','required|trim|max_length[45]');
      $this->form_validation->set_rules('txt_site_title','Site Name','required|trim|max_length[45]');
      $this->form_validation->set_rules('site_meta','Site Meta','required|trim|max_length[160]');
      $this->form_validation->set_rules('txtnewuser','Username','required|trim|max_length[45]');
      $this->form_validation->set_rules('txtnewnick','Nickname','required|trim|max_length[45]');
      $this->form_validation->set_rules('txtnewbio','Bio','required|trim|max_length[100]');
      $this->form_validation->set_rules('txtnewmail','Email','required|trim|max_length[255]');
    }  else{
      $this->form_validation->set_rules('txt_site_owner','Site Owner','required|trim|max_length[45]');
      $this->form_validation->set_rules('txt_site_title','Site Name','required|trim|max_length[45]');
      $this->form_validation->set_rules('site_meta','Site Meta','required|trim|max_length[160]');
      $this->form_validation->set_rules('txtnewpass', 'Password', 'trim|required|min_length[6]');
      $this->form_validation->set_rules('txtnewuser','Username','required|trim|max_length[45]');
      $this->form_validation->set_rules('txtnewnick','Nickname','required|trim|max_length[45]');
      $this->form_validation->set_rules('txtnewbio','Bio','required|trim|max_length[100]');
      $this->form_validation->set_rules('txtnewmail','Email','required|trim|max_length[255]');
      $this->form_validation->set_rules('txtnewpasscf', 'Password Confirmation', 'trim|required|matches[txtnewpass]');
    }

}

public function uploadPhoto($source_file,$file_name,$project_url){
  if($source_file!=NULL){
 $rand_name=md5(mt_rand(1,999999999));
			if(isset($file_name)&&isset($source_file))
			{

					for($i=0; $i<count($source_file);$i++)
					{
						if(getimagesize($source_file[$i])>0) {
							$uploaded_state=move_uploaded_file($source_file[$i],$this->dir_path.$rand_name.$file_name[$i]);
              //update photo
              $this->adminmodel->updateUserPic($project_url.str_replace('./','',$this->dir_path).$rand_name.$file_name[$i]);
						}
					}

			}
    }
}



public function siteinfo(){

if(strlen($this->input->post('txtnewpass'))===0)
{
$this->siteinfoValidationRules(1);

}else{
$this->siteinfoValidationRules(0);

}

if($this->form_validation->run()===FALSE){
  $data['page_title']="Dashboard &raquo; Site Info";
  $data['page_name']="dashboard";
  $data['site_meta']=$this->adminmodel->getsite_meta_description();
  $data['site_owner']=$this->adminmodel->getsite_owner();
  $data['site_title']=$this->adminmodel-> getsite_title();
  $data['logged_user']=$_SESSION['username'];
  $data['message_count']=$this->adminmodel->unread_message_count();
  $this->load->view('tpl/header',$data);
  $this->load->view('tpl/sidebar');
  $this->load->view('admin_site_info');
  $this->load->view('tpl/footer',$data);
}else{
  if(strlen($this->input->post('txtnewpass'))===0){
    $this->adminmodel->updatesiteInfo(1);
    $this->uploadPhoto($_FILES['imgfile']['tmp_name'],$_FILES['imgfile']['name'],base_url());
 $this->session->set_flashdata('changes1','Changes has been saved.');
 redirect(base_url().'admincontroller/siteinfo');
  }else{
    $this->uploadPhoto($_FILES['imgfile']['tmp_name'],$_FILES['imgfile']['name'],base_url());
    $this->adminmodel->updatesiteInfo(0);
 $this->session->set_flashdata('changes2','Please Log in again with your new password...');
 redirect(base_url().'admincontroller/logout');
  }
}

}

public function showmessage($msgid){
  if(empty($msgid))
{
redirect(base_url().'admincontroller/inbox');
}
else{
          if($this->adminmodel->viewmsg($msgid)!=NULL){
          $data['msg_content']=$this->adminmodel->viewmsg($msgid);
          $data['page_title']="Dashboard &raquo; Viewing  A Message ";
          $data['page_name']="dashboard";
          $data['message_count']=$this->adminmodel->unread_message_count();
          $this->load->view('tpl/header',$data);
          $this->load->view('tpl/sidebar');
          $this->load->view('admin_viewmessage',$data);
          $this->load->view('tpl/footer',$data);
          }else{
             redirect(base_url().'admincontroller/inbox');
          }
}
}

public function forgotpassword(){
  $newpass=$this->createRandomPass();

$this->form_validation->set_rules('usermail','Email','required|trim');

if($this->form_validation->run()===FALSE){
  $data['page_title']="Password Recovery Wizard";
   $data['page_name']="forgotpass_page";
   $this->load->view('tpl/header',$data);
   $this->load->view('admin_forgotpassword');
   $this->load->view('tpl/footer',$data);
}else{
  if($this->adminmodel->checkifmailExists($this->input->post('usermail'))===1){
  $this->emailPassword($this->input->post('usermail'),$newpass);
  $this->adminmodel->changePassword($newpass);
  echo 'your newpassword is: '.$newpass;
}else{
  echo 'invalid email';
}
}

}

public function emailPassword($destinationEmail,$newPass){

    foreach($this->adminmodel->getsite_owner() as $siteOwner){}
    foreach($this->adminmodel->getsite_title() as $siteTitle){}



}

      public function createRandomPass() {
      $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890987654321";
    	srand((double)microtime()*1000000);
    	$i = 0;
    	$pass = '' ;
    	while ($i <= 7) {
    		$num = rand() % 33;
    		$tmp = substr($chars, $num, 1);
    		$pass = $pass . $tmp;
    		$i++;
    	}
    	return $pass;
}

public  function deletearticle($slug){
    $this->adminmodel->deletenews($slug);
    redirect(base_url().'admincontroller/posts');
}

public function deletemessage($msgid){
  $this->adminmodel->delete_selected_message($msgid);
  $this->session->set_flashdata('msgdelete_success','Message Succesfully Deleted');
  redirect(base_url().'admincontroller/inbox');
}
public function deletepage($slug){
    $this->adminmodel->delete_selected_page($slug);
    redirect(base_url().'admincontroller/pages');

}

}
