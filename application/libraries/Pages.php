<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages {

	protected $CI;

	function __construct(){

		$this->CI=& get_instance();



	}

	function detail_page($id){
		$data=$this->CI->db->query("SELECT page_id AS id, page_judul AS judul, page_url AS slug, page_isi AS isi, page_foto AS foto, page_javascript AS javascript ,page_meta_keywords AS meta_keywords, page_meta_description AS meta_description FROM pages WHERE page_id='$id' AND page_status='published' ");

		if($data->num_rows()>0){
			$hasil= $data->row_array();
			$hasil['isi']= reversequote($hasil['isi'],'all');
			$hasil['javascript']= reversequote($hasil['javascript'],"all");
			$hasil['meta_keywords']=trim($hasil['meta_keywords']);
			$hasil['meta_description']=trim($hasil['meta_description']);
			$hasil['foto']=trim($hasil['foto']);


			return $hasil; 

		} else {
			return FALSE;
		}
	}

}