<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_depan
{
	protected $CI;
	public $banner;

	public function __construct(){
		$this->CI =& get_instance();

		$data=$this->CI->db->query("SELECT * FROM banner_depan ORDER BY id DESC");

		$this->banner=$data->result_array();
	}


	public function get_banner(){
		return $this->banner;
	}

}