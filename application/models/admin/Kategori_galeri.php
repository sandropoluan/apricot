<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_galeri extends CI_Model{

	function __construct(){
		parent::__construct();
	}


	function get(){
		$query=$this->db->query("SELECT * FROM kategori_galeri WHERE terhapus='N' ORDER BY id DESC");

		return $query->result_array();
	}

}