<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_web {

	public $info=array();
	public $info_for_system=array();
	protected $CI;


	function __construct(){
		$this->CI=& get_instance();

		$cache_informasi_web=$this->CI->cache->file->get('informasi_web');
		if($cache_informasi_web === FALSE){			
			$data=$this->CI->db->get_where("informasi",array("id"=>1));
			$data=$data->row();
			$this->CI->cache->file->save('informasi_web',$data,6000000);
		} else {
			$data=$cache_informasi_web;
		}


		

		$this->info['title']=$data->default_title;
		$this->info["nama"]=$data->nama;

		$this->info["deskripsi"]=$data->deskripsi;
		$this->info["disclaimer"]=$data->disclaimer;
		$this->info["privacy"]=$data->webprivacy;
		$this->info["terms_conditions"]=$data->termcondition;

		$this->info["meta_keyword"]=$data->meta_keyword;
		$this->info["meta_deskripsi"]=$data->meta_deskripsi;

		$this->info["featured_image"]=$data->featured_image;

		$this->info["favicon"]=$data->favicon;
		$this->info["logo"]=$data->logo;
		$this->info["custom_css"]=$data->custom_css;
		$this->info["custom_javascript"]="";
		$this->info["current_page"]="";
		$this->info["uniqueid"]="";


		$this->info["og-url"]=baseURL();
		$this->info["og-type"]="website";
		$this->info["og-title"]=$data->default_title;
		$this->info["og-description"]=$data->meta_deskripsi;
		$this->info["og-site_name"]=$data->nama;
		$this->info["og-image"]=trim($data->thumbnail_media)==""?$data->featured_image:$data->thumbnail_media;
		$this->info["article-published_time"]="";



		$this->info_for_system["sleep_mode"]=$data->sleep_mode;
		$this->info_for_system["max_populer_artikel"]=$data->max_populer_artikel;
		$this->info_for_system["max_tampil_artikel"]=$data->max_tampil_artikel;
		$this->info_for_system["max_headline_artikel"]=$data->max_headline_artikel;
		$this->info_for_system["max_headline_galeri"]=$data->max_headline_galeri;
		$this->info_for_system["max_tampil_agenda"]=$data->max_tampil_agenda;
		$this->info_for_system["max_tampil_download"]=$data->max_tampil_download;
		$this->info_for_system["max_tampil_galeri"]=$data->max_tampil_galeri;
		$this->info_for_system["max_tampil_produk"]=$data->max_tampil_produk;
		$this->info_for_system["max_headline_produk"]=$data->max_headline_produk;

		
		$this->info_for_system["sleep_sampai"]=$data->sleep_sampai;

	}

	function get(){
		return $this->info;
	}

	function get_for_system(){
		return $this->info_for_system;
	}



}
