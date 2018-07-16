<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_depan
{
	protected $CI;
	public $banner;

	public function __construct(){
		$this->CI =& get_instance();

		$cache_banner_depan=$this->CI->cache->file->get('banner_depan');
		if($cache_banner_depan === FALSE){
			$data=$this->CI->db->query("SELECT * FROM banner_depan ORDER BY id DESC");
			$this->banner=$data->result_array();

			$this->CI->cache->file->save('banner_depan',$this->banner,6000000);
		} else {
			$this->banner=$cache_banner_depan;
		}



	}


	public function get_banner(){
		return $this->banner;
	}

}