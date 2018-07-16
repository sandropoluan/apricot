<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pihak_ketiga

{

	protected $CI;

	public $recaptcha=array();
	public $disqus=array();
	public $google_analytics=array();

	public function __construct(){
		$this->CI =& get_instance();

	
		$this->data= array();

		$cache_pihak_ketiga=$this->CI->cache->file->get('pihak_ketiga');
		if($cache_pihak_ketiga === FALSE){
			$query=$this->CI->db->query("SELECT * FROM pihak_ketiga WHERE id='1' ");
			$query=$query->row();
			$this->CI->cache->file->save('pihak_ketiga',$query,6000000);
		} else {
			$query=$cache_pihak_ketiga;
		}


		$this->recaptcha=array(
 		"key"=>$query->recaptcha_key,
		"secret_key"=>$query->recaptcha_secret_key
			);

		$this->google_analytics=array(
			"script"=>$query->script_google_analytics
			);

		$this->disqus=array(
				 "unique_name"=>$query->disqus_unique_name
			);
	}


	public function get_recaptcha(){
		return $this->recaptcha;
	}

	public function get_disqus(){
		return $this->disqus;
	}

	public function google_analytics(){
		return $this->google_analytics;
	}
}