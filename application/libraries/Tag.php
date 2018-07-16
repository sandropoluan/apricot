<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag
{

	protected $CI;
	public $tags;

	function __construct(){

		$this->CI=& get_instance();

		$cache_semua_tag=$this->CI->cache->file->get('semua_tag');
		if($cache_semua_tag === FALSE){
			$query=$this->CI->db->query("SELECT id_tag AS id, nama_tag AS nama, slug_tag AS slug FROM tags ORDER BY nama_tag ASC");
			$this->tags=$query->result_array();

			$this->CI->cache->file->save('semua_tag',$this->tags,6000000);
		} else {
			$this->tags=$cache_semua_tag;
		}





	}


		public function detail_tag($id){
		$id = intval($id);
		$data=$this->CI->db->query("SELECT id_tag AS id, nama_tag AS nama, slug_tag AS slug FROM tags WHERE id_tag='$id'  ");

		if ($data->num_rows()>0){
			return $data->row_array();
		} else {
			return FALSE;
		}
	}


}