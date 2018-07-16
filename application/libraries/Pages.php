<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages {

	protected $CI;

	function __construct(){

		$this->CI=& get_instance();



	}

	function detail_page($id){
		$id = intval($id);
		$cache_page=$this->CI->cache->file->get('page_'.$id);
		if($cache_page === FALSE){
			$data=$this->CI->db->query("SELECT page_id AS id, page_judul AS judul, page_url AS slug, page_isi AS isi, page_foto AS foto, page_javascript AS javascript ,page_meta_keywords AS meta_keywords, page_meta_description AS meta_description FROM pages WHERE page_id='$id' AND page_status='published' ");
			$data=array('jumlah'=>$data->num_rows(),'data'=>$data->row_array());
			$this->CI->cache->file->save('page_'.$id,$data,6000000);
		} else {
			$data=$cache_page;
		}		


		if($data['jumlah']>0){
			$hasil= $data['data'];
			$hasil['isi']= ($hasil['isi']);
			$hasil['javascript']= ($hasil['javascript']);
			$hasil['meta_keywords']=trim($hasil['meta_keywords']);
			$hasil['meta_description']=trim($hasil['meta_description']);
			$hasil['foto']=trim($hasil['foto']);

			return $hasil; 

		} else {
			return FALSE;
		}
	}

}