<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_web
{
	protected $CI;
	public $biodata=array();

	public function __construct(){
		
		$this->CI =& get_instance();

		$data=$this->CI->db->query("SELECT * FROM biodata WHERE id='1' ");

		$data=$data->row();

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