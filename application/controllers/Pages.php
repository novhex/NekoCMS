<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pages
 *
 * @author Novi
 */
class Pages extends CI_Controller{
    //put your code here

    private $page_info=array();
    private $pageLinks=array();
    private $sectionPosts=array();
    private $article=array();

    public function __construct() {
            parent::__construct();
            $this->load->database();
            $this->load->library('settings');
            $this->load->helper(array('url','captcha'));
            $this->load->library(array('session','pagination','form_validation','user_agent'));
            $this->load->model('pagesmodel');

    }

    public function getUserIP(){
      $visitorIP=$this->input->ip_address();
      $this->pagesmodel->checkifIPexists($visitorIP);
    }

    public function index() {
           $this->getUserIP();
           $this->page_info['page_meta']=$this->pagesmodel->getsite_meta_description();
           $this->page_info['page_owner']=$this->pagesmodel->getsite_owner();
           $this->page_info['page_title']=$this->pagesmodel->getsite_title();
           $this->page_info['postcount']=$this->pagesmodel->countTotalPosts();
           $this->page_info['ownerphoto']=$this->pagesmodel->showOwnerProfile();
           $this->page_info['sidebarlinks']=$this->pagesmodel->sidebarLinks();
           $this->page_info['latest_articles']=$this->pagesmodel->latestArticles();
           $this->page_info['visitor_counter']=$this->pagesmodel->countTotalVisitors();
           $this->pageLinks['nav_links']=$this->pagesmodel->allpages();
           $this->load->view('mainui/tpl_home/header',$this->page_info);
           $this->load->view('mainui/tpl_home/sidebar',$this->pageLinks);
           $this->load->view('mainui/home',$this->page_info);
           $this->load->view('mainui/tpl_home/footer');
    }


  public function article($articleSlug){

        if(!empty($articleSlug)){
        if($this->pagesmodel->getarticletoView($articleSlug)!=NULL)  {
        $this->page_info['page_meta']=$this->pagesmodel->getsite_meta_description();
        $this->page_info['page_owner']=$this->pagesmodel->getsite_owner();
        $this->page_info['page_title']=$this->pagesmodel->getsite_title();
        $this->page_info['postcount']=$this->pagesmodel->countTotalPosts();
        $this->page_info['ownerphoto']=$this->pagesmodel->showOwnerProfile();
        $this->page_info['sidebarlinks']=$this->pagesmodel->sidebarLinks();
        $this->page_info['visitor_counter']=$this->pagesmodel->countTotalVisitors();
        $this->article['article_contents']=$this->pagesmodel->getarticletoView($articleSlug);
        $this->article['article_slug']=ucfirst(str_replace("-"," ",$articleSlug));
        $this->pageLinks['nav_links']=$this->pagesmodel->allpages();
        $this->page_info['slug']=ucfirst(str_replace("-"," ",$articleSlug));
        $this->load->view('mainui/tpl_home/header_article',$this->page_info);
        $this->load->view('mainui/tpl_home/sidebar',$this->pageLinks);
        $this->load->view('mainui/article',$this->article);
        $this->load->view('mainui/tpl_home/footer');

     }
     else{
        show_404();
     }
     }else{
        redirect(base_url()."pages/section");
     }
}

    public function section($pageSlug,$offset=0){

        if(!empty($pageSlug)){
          $uri_segment = 4;
          $offset = $this->uri->segment($uri_segment);
          $this->page_info['page_meta']=$this->pagesmodel->getsite_meta_description();
          $this->page_info['page_owner']=$this->pagesmodel->getsite_owner();
          $this->page_info['page_title']=$this->pagesmodel->getsite_title();
          $this->page_info['page_slug']=ucfirst(str_replace("-", " ", $pageSlug));
          $this->page_info['postcount']=$this->pagesmodel->countTotalPosts();
          $this->page_info['ownerphoto']=$this->pagesmodel->showOwnerProfile();
          $this->page_info['sidebarlinks']=$this->pagesmodel->sidebarLinks();
          $this->pageLinks['nav_links']=$this->pagesmodel->allpages();
          $this->page_info['visitor_counter']=$this->pagesmodel->countTotalVisitors();
          $config['base_url'] = base_url().'pages/section/'.$pageSlug;
          $config['total_rows'] =$this->pagesmodel->countpost_from_category($pageSlug);
          $config['per_page'] = 5;
          $config['use_page_numbers'] = TRUE ;
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
           $this->load->view('mainui/tpl_home/header_section',$this->page_info);
           $this->load->view('mainui/tpl_home/sidebar',$this->pageLinks);
           $this->sectionPosts['categ_news']=$this->pagesmodel->allpost_from_category($pageSlug,$offset,5);
           $this->load->view('mainui/section',$this->sectionPosts);
           $this->load->view('mainui/tpl_home/footer',$this->page_info);
        }else{
            redirect('pages/index');
        }

    }

    public function about(){
      echo "Error 404";

    }


   public function contactus(){

        $cap=$this->captchaGenerator();
        $this->form_validation->set_rules('visitorName','Vistor Name','required|max_length[45]|trim');
        $this->form_validation->set_rules('emailAddress','Email Address','required|trim');
        $this->form_validation->set_rules('visitorMessage','Vistor Message','required|trim|max_length[160]');
        $this->form_validation->set_rules('captcha','Captcha','required|trim');

        if ($this->form_validation->run() === FALSE)
        {
                  $this->page_info['page_meta']=$this->pagesmodel->getsite_meta_description();
                  $this->page_info['page_owner']=$this->pagesmodel->getsite_owner();
                  $this->page_info['page_title']=$this->pagesmodel->getsite_title();
                  $this->pageLinks['nav_links']=$this->pagesmodel->allpages();
                  $this->load->view('mainui/tpl_home/header',$this->page_info);
                  $this->load->view('mainui/tpl_home/sidebar',$this->pageLinks);
                  $this->load->view('mainui/contact',$cap);
                  $this->load->view('mainui/tpl_home/footer');

        }else {
        //submit form hehe
          if($this->pagesmodel->submitcontactform()===TRUE){
                  $this->session->set_flashdata('form_submission_success','Message Submitted! Thank You :-)');
                  redirect(base_url().'pages/index');
          }else{
                  $this->session->set_flashdata('form_submission_error','Invalid captcha. Message was not submitted');
                  redirect(base_url().'pages/index');
          }
        }

}

public function captchaGenerator()
            {
            $vals = array(

                    'img_path'      => './_tmp/',
                    'img_url'       => base_url().'_tmp/',
                    'colors'        => array(
                            'background' => array(0, 0, 0, 0),
                            'border' => array(255, 255, 255),
                            'text' => array(255, 255, 255, 1),
                            'grid' => array(102,202,302,402)
                    )
            );

            $cap = create_captcha($vals);
            $data = array(
                    'captcha_time'  => $cap['time'],
                    'ip_address'    => $this->input->ip_address(),
                    'word'          => $cap['word'],
                    'image_path'    => base_url()."_tmp/".$cap['word'].".jpg",

            );
            $query = $this->db->insert_string('captcha', $data);
            $this->db->query($query);

            return $cap;
}


          public function generateRandomWord(){
                          $chars = "abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
                          	srand((double)microtime()*1000000);
                          	$i = 0;
                          	$randword = '' ;
                          	while ($i <= 7) {
                          		$num = rand() % 33;
                          		$tmp = substr($chars, $num, 1);
                          		$randword = 	$randword . $tmp;
                          		$i++;
                          	}
                          	return 	$randword;
              }

          public function themeselection(){
            $theme=$this->input->post('cbtheme');

              if($_SESSION['usrtheme']==''){
                $_SESSION['usrtheme']="custom_theme/default.css";
              }
              switch($theme){

                case 'Purple Theme':
                    $_SESSION['usrtheme']="custom_theme/bayolet.css";
                    redirect(base_url());
                break;

                case 'Orange Theme':
                    $_SESSION['usrtheme']="custom_theme/oh-range.css";
                    redirect(base_url());
                break;

                case 'Red Theme':
                    $_SESSION['usrtheme']="custom_theme/ree-d.css";
                    redirect(base_url());
                break;

                case 'Maroon Theme':
                    $_SESSION['usrtheme']="custom_theme/mah-ron.css";
                    redirect(base_url());
                break;

                case 'Facebook Like':
                    $_SESSION['usrtheme']="custom_theme/fb-like.css";
                    redirect(base_url());
                break;
                  case 'Default Theme':
                      $_SESSION['usrtheme']="custom_theme/default.css";
                      redirect(base_url());
                  break;

                default:
                      redirect(base_url());
                break;
              }
          }
}
