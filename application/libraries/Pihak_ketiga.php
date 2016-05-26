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

		$query=$this->CI->db->query("SELECT * FROM pihak_ketiga WHERE id='1' ");

		$query=$query->row();
		$this->data= array();

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