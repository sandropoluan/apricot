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
Gunakan flag !important&singlequote;*/
')");
		}


		$query=$this->db->query("SELECT * FROM informasi WHERE id='1'");
		if($query->num_rows()>0){
			$row=$query->row();
			return array(
				"namaweb" =>$row->nama,
				"deskripsi"=>reversequote($row->deskripsi,"all"),
				"disclaimer"=>reversequote($row->disclaimer,"all"),
				"webprivacy"=>reversequote($row->webprivacy,"all"),
				"termcondition"=>reversequote($row->termcondition,"all"),
				"meta_keyword"=>$row->meta_keyword,
				
				"meta_deskripsi"=>$row->meta_deskripsi,
				"featured_image"=>$row->featured_image,
				"thumbnail_media"=>$row->thumbnail_media,
				"favicon"=>$row->favicon,
				"logo"=>$row->logo,
				"custom_css"=>reversequote($row->custom_css,"all"),
				"width_thumb_artikel"=>$row->width_thumb_artikel,
				"width_thumb_galeri"=>$row->width_thumb_galeri,
				"width_thumb_produk"=>$row->width_thumb_produk,
				"prefix_suffix_title"=>$row->prefix_suffix_title,
				"prefix_suffix_sebagai"=>$row->prefix_suffix_sebagai,
				"default_title"=>$row->default_title,
				"max_populer_artikel"=>$row->max_populer_artikel,
				"max_tampil_artikel"=>$row->max_tampil_artikel,
				"max_headline_artikel"=>$row->max_headline_artikel,
				"max_headline_galeri"=>$row->max_headline_galeri,
				"max_tampil_galeri"=>$row->max_tampil_galeri,
				"max_headline_produk"=>$row->max_headline_produk,
				"max_tampil_produk"=>$row->max_tampil_produk,
				"sleep_mode"=>$row->sleep_mode,
				"sleep_sampai"=>$row->sleep_sampai
				);
		}
	}

}