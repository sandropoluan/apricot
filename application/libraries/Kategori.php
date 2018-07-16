<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori {
	protected $CI;
	public $one_level_category_article;
	public $one_level_category_galeri;

	public function __construct(){
		$this->CI=& get_instance();


	}

	public function one_level_artikel(){
		$cache_one_level_category_article=$this->CI->cache->file->get('one_level_category_article');
		if($cache_one_level_category_article === FALSE){
			$data=$this->CI->db->query("SELECT 
			id_kategori AS id,
			nama_kategori AS nama,
			slug_kategori AS slug 
			FROM kategori
			WHERE aktif='Y' AND terhapus='N' AND id_parent='0'
			ORDER BY id_kategori DESC
			");			
			$data=$data->result_array();
			$this->CI->cache->file->save('one_level_category_article',$data,6000000);
			return $data;
		} else {
			return $cache_one_level_category_article;
		}
	}

	public function detail_kategori($id){
		$id = intval($id);
		$data=$this->CI->db->query("SELECT id_kategori AS id, nama_kategori AS nama, slug_kategori AS slug,id_parent FROM kategori WHERE id_kategori='$id' AND terhapus='N' AND aktif='Y' ");

		if ($data->num_rows()>0){
			return $data->row_array();
		} else {
			return FALSE;
		}
	}


	public function kategori_galeri(){

		$cache_one_level_category_galeri=$this->CI->cache->file->get('one_level_category_galeri');
		if($cache_one_level_category_galeri === FALSE){
			$data=$this->CI->db->query("SELECT id,
			nama_kategori AS nama, 
			slug_kategori AS slug
			FROM kategori_galeri WHERE aktif='Y' AND terhapus='N' ");	
			$data=$data->result_array();
			$this->CI->cache->file->save('one_level_category_galeri',$data,6000000);
			return $data;
		} else {
			return $cache_one_level_category_galeri;
		}
	
	}


	public function detail_kategori_galeri($id){
		$id = intval($id);
		$data=$this->CI->db->query("SELECT id,
			nama_kategori AS nama, 
			slug_kategori AS slug
			FROM kategori_galeri WHERE aktif='Y' AND terhapus='N' AND id='$id' ");

		if ($data->num_rows()>0){
			return $data->row_array();
		} else {
			return FALSE;
		}
	}


}