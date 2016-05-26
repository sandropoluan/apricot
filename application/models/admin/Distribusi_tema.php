<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi_tema extends CI_Model
{


	function __construct(){
		parent::__construct();
	}

	function get_tema(){

		$this->db->order_by("id","DESC");
		$tema=$this->db->get("tema");

		return $tema->result_array();

	}

}