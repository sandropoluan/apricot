<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Informasi extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function get_informasi(){

		$query1=$this->db->query("SELECT * FROM informasi WHERE id='1'");
		if($query1->num_rows()<1){
			$this->db->query("INSERT INTO informasi (id,custom_css) VALUES ('1','/*Masukan code CSS anda disini
Gunakan flag !important*/
')");
		}


		$query=$this->db->query("SELECT * FROM informasi WHERE id='1'");
		if($query->num_rows()>0){
			return $row=$query->row_array();
			
		}
	}

}