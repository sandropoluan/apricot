<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_depan extends CI_Model
{
	function __construct(){
		parent::__construct();
	}


	function get_banner(){

		$query=$this->db->query("SELECT * FROM banner_depan ORDER BY id DESC");

		return $query->result_array();

	}
}