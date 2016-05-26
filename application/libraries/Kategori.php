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

		$data=$this->CI->db->query("SELECT 
			id_kategori AS id,
			nama_kategori AS nama,
			slug_kategori AS slug 
			FROM kategori
			WHERE aktif='Y' AND terhapus='N' AND id_parent='0'
			ORDER BY id_kategori DESC
			");

		return	$this->one_level_category_article=$data->result_array();



	}

	public function detail_kategori($id){
		$data=$this->CI->db->query("SELECT id_kategori AS id, nama_kategori AS nama, slug_kategori AS slug,id_parent FROM kategori WHERE id_kategori='$id' AND terhapus='N' AND aktif='Y' ");

		if ($data->num_rows()>0){
			return $data->row_array();
		} else {
			return FALSE;
		}
	}


	public function kategori_galeri(){
		$data=$this->CI->db->query("SELECT id,
			nama_kategori AS nama, 
			slug_kategori AS slug
			FROM kategori_galeri WHERE aktif='Y' AND terhapus='N' ");

		return	$this->one_level_category_galeri=$data->result_array();


	}


	public function detail_kategori_galeri($id){
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