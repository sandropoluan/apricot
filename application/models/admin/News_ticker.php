<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_ticker extends CI_Model
{
	function __construct(){
		parent::__construct();
	}


	function get_news(){
		$query=$this->db->query("SELECT * FROM news_ticker ORDER BY id DESC");

		return $query->result_array();
	}
}