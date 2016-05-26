<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu {

	protected $CI;
	public $one_level_horizontal;
	public $one_level_vertikal;

	public function __construct(){
		$this->CI =& get_instance();


	$one_lev=$this->CI->db->query("SELECT menu_id AS id,
										  menu_child_nama AS nama,	
										  menu_child_url AS url,
										  menu_child_target AS target
	 FROM menu_child WHERE aktif='Y' AND menu_child_parent='0' AND menu_id='1' ORDER BY posisi ASC ");
	$this->one_level_horizontal=$one_lev->result_array();

	$one_lev2=$this->CI->db->query("SELECT menu_id AS id,
										  menu_child_nama AS nama,
										  menu_child_url AS url,
										  menu_child_target AS target
	 FROM menu_child WHERE aktif='Y' AND menu_child_parent='0' AND menu_id='2' ORDER BY posisi ASC ");
	$this->one_level_vertikal=$one_lev2->result_array();

	


	}




}