<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsticker
{

	protected $CI;

	function __construct(){
		$this->CI=& get_instance();


	}

	function get_news(){

		$data=$this->CI->db->query("SELECT id, berita, link, tanggal_posting AS tanggal FROM news_ticker ORDER BY id DESC");

		return $data->result_array();		
	}
}