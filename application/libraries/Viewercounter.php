<?php

defined('BASEPATH') or exit('Error!');

/**
* 
*/
class Viewercounter{
	
	private $CI;

	public function __construct(){
		
			$this->CI=&get_instance();
			$this->CI->load->model('pagesmodel');

	}

	public function incrementViews($post_id){

				$is_viewed = $this->CI->pagesmodel->checkIfAlreadyViewed($this->CI->input->ip_address(),$post_id);

				if($is_viewed==0){
					$this->CI->pagesmodel->incrementviews($this->CI->input->ip_address(),$post_id);
					return $is_viewed;
				}else{
					return $is_viewed;
				}
	}	


}