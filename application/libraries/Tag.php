<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag
{

	protected $CI;
	public $tags;

	function __construct(){

		$this->CI=& get_instance();

		$query=$this->CI->db->query("SELECT id_tag AS id, nama_tag AS nama, slug_tag AS slug FROM tags ORDER BY nama_tag ASC");

		$this->tags=$query->result_array();

	}


		public function detail_tag($id){
		$data=$this->CI->db->query("SELECT id_tag AS id, nama_tag AS nama, slug_tag AS slug FROM tags WHERE id_tag='$id'  ");

		if ($data->num_rows()>0){
			return $data->row_array();
		} else {
			return FALSE;
		}
	}


}