<?php

/**
* 
*/
defined('BASEPATH') or exit('Error!');

class Ajaxfrontend extends CI_Controller{
	
	private $str_output;

	public function __construct(){
		parent::__construct();

	}

	public function loadcomments(){
		$this->load->model('pagesmodel');

		$news_id = $this->input->post('newsID');
		
		$data=$this->pagesmodel->getNewsComments($news_id);

		foreach($data as $html_output):
			
		$this->str_output="<p><i class='fa fa-user'></i> Comment by: ".$html_output['user_name']." </p>";
		$this->str_output.="<p><i class='fa fa-calendar'></i> ".date('F  j, Y',strtotime($html_output['comment_date']));
		$this->str_output.="<p>".$html_output['comment']."</p><hr>";

		echo $this->str_output;


		endforeach;



		
	}
	
}