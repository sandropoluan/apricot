<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Model {

	public $hasil;

	function __construct(){
		parent::__construct();
	}

	function get_page($id){
		if($id>0){
		$query=$this->db->query("SELECT * FROM pages WHERE page_id='$id'");
		if($query->num_rows()>0){
			$row=$query->row();
			$this->hasil= array(
				"id"=>$row->page_id,
				"judul"=>$row->page_judul,
				"foto"=>$row->page_foto,
				"url"=>$row->page_url,
				"isi"=>($row->page_isi),
				"javascript"=>($row->page_javascript),
				"status"=>$row->page_status,
				"keywords"=>$row->page_meta_keywords,
				"description"=>$row->page_meta_description
				);
			return true;
		} else {
			return false;
		}
	 } else {
	 	$this->hasil= array(
				"id"=>0,
				"judul"=>"",
				"foto"=>"",
				"url"=>"",
				"isi"=>"",
				"javascript"=>"",
				"status"=>"",
				"keywords"=>"",
				"description"=>""
	 		);
	 		return true;
	 }
	}

}