<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_web
{
	protected $CI;
	public $biodata=array();

	public function __construct(){
		
		$this->CI =& get_instance();

		$cache_biodata_web=$this->CI->cache->file->get('biodata_web');
		if($cache_biodata_web === FALSE){
			$data=$this->CI->db->query("SELECT * FROM biodata WHERE id='1' ");
			$data=$data->row();
			$this->CI->cache->file->save('biodata_web',$data,6000000);
		} else {
			$data=$cache_biodata_web;
		}


		$this->biodata['foto']=$data->foto;
		$this->biodata['nama']=$data->nama;
		$this->biodata['deskripsi_singkat']=$data->deskripsi_singkat;
		$this->biodata['deskripsi']=$data->deskripsi;
		$this->biodata['link-fb']=$data->link_fb;

	}

	public function get_biodata(){
		return $this->biodata;
	}
}