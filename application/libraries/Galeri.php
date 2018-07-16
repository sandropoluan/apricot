<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri
{

	protected $CI;

	function __construct(){

		$this->CI =& get_instance();


	}


	function semua_galeri($limit,$offset){
		$limit = intval($limit);
		$offset = intval($offset);

		$data=$this->CI->db->query("SELECT galeri.galeri_id AS id,
			galeri.galeri_nama AS nama,
			galeri.galeri_deskripsi AS deskripsi,			
			galeri.galeri_url AS slug,
			galeri.galeri_meta_keyword AS meta_keyword,
			galeri.galeri_meta_deskripsi AS meta_deskripsi,
			galeri.galeri_og_image AS og_image,
			galeri.galeri_og_deskripsi AS og_deskripsi,
			galeri.galeri_date AS tanggal,
			galeri.galeri_date_edit AS tanggal_edit,
			kategori_galeri.id AS id_kategori,
			kategori_galeri.nama_kategori,
			kategori_galeri.slug_kategori,
		    user.nama_lengkap AS nama_admin,
		    user.id_user AS id_admin,
		    foto_galeri.nama_foto AS foto
		    FROM galeri,kategori_galeri,user,foto_galeri
		    WHERE galeri.galeri_status='publish' AND kategori_galeri.aktif='Y' AND kategori_galeri.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND galeri.galeri_user=user.id_user AND galeri.kategori_id=kategori_galeri.id AND foto_galeri.id_foto=(SELECT MAX(id_foto) FROM foto_galeri WHERE foto_galeri.id_galeri=galeri.galeri_id ) ORDER BY galeri.galeri_id DESC LIMIT $offset,$limit
			");

		return $data->result_array();
	}


	function hitung_semua_galeri(){

		$data=$this->CI->db->query("SELECT galeri.galeri_id AS id,
			galeri.galeri_nama AS nama,
			galeri.galeri_deskripsi AS deskripsi,			
			galeri.galeri_url AS slug,
			galeri.galeri_meta_keyword AS meta_keyword,
			galeri.galeri_meta_deskripsi AS meta_deskripsi,
			galeri.galeri_og_image AS og_image,
			galeri.galeri_og_deskripsi AS og_deskripsi,
			galeri.galeri_date AS tanggal,
			galeri.galeri_date_edit AS tanggal_edit,
			kategori_galeri.id AS id_kategori,
			kategori_galeri.nama_kategori,
			kategori_galeri.slug_kategori,
		    user.nama_lengkap AS nama_admin,
		    user.id_user AS id_admin,
		    foto_galeri.nama_foto AS foto
		    FROM galeri,kategori_galeri,user,foto_galeri
		    WHERE galeri.galeri_status='publish' AND kategori_galeri.aktif='Y' AND kategori_galeri.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND galeri.galeri_user=user.id_user AND galeri.kategori_id=kategori_galeri.id AND foto_galeri.id_foto=(SELECT MAX(id_foto) FROM foto_galeri WHERE foto_galeri.id_galeri=galeri.galeri_id )
			");

		return $data->num_rows();


	}


	function galeri_per_kategori($id_kategori,$limit,$offset){
		$id_kategori = intval($id_kategori);
		$limit = intval($limit);
		$offset = intval($offset);

		$data=$this->CI->db->query("SELECT galeri.galeri_id AS id,
			galeri.galeri_nama AS nama,
			galeri.galeri_deskripsi AS deskripsi,			
			galeri.galeri_url AS slug,
			galeri.galeri_meta_keyword AS meta_keyword,
			galeri.galeri_meta_deskripsi AS meta_deskripsi,
			galeri.galeri_og_image AS og_image,
			galeri.galeri_og_deskripsi AS og_deskripsi,
			galeri.galeri_date AS tanggal,
			galeri.galeri_date_edit AS tanggal_edit,
			kategori_galeri.id AS id_kategori,
			kategori_galeri.nama_kategori,
			kategori_galeri.slug_kategori,
		    user.nama_lengkap AS nama_admin,
		    user.id_user AS id_admin,
		    foto_galeri.nama_foto AS foto
		    FROM galeri,kategori_galeri,user,foto_galeri
		    WHERE galeri.kategori_id='$id_kategori' AND galeri.galeri_status='publish' AND kategori_galeri.aktif='Y' AND kategori_galeri.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND galeri.galeri_user=user.id_user AND galeri.kategori_id=kategori_galeri.id AND foto_galeri.id_foto=(SELECT MAX(id_foto) FROM foto_galeri WHERE foto_galeri.id_galeri=galeri.galeri_id ) ORDER BY galeri.galeri_id DESC LIMIT $offset,$limit
			");

		return $data->result_array();
	}


	function hitung_galeri_per_kategori($id_kategori){
		$id_kategori=intval($id_kategori);

		$data=$this->CI->db->query("SELECT galeri.galeri_id AS id,
			galeri.galeri_nama AS nama,
			galeri.galeri_deskripsi AS deskripsi,			
			galeri.galeri_url AS slug,
			galeri.galeri_meta_keyword AS meta_keyword,
			galeri.galeri_meta_deskripsi AS meta_deskripsi,
			galeri.galeri_og_image AS og_image,
			galeri.galeri_og_deskripsi AS og_deskripsi,
			galeri.galeri_date AS tanggal,
			galeri.galeri_date_edit AS tanggal_edit,
			kategori_galeri.id AS id_kategori,
			kategori_galeri.nama_kategori,
			kategori_galeri.slug_kategori,
		    user.nama_lengkap AS nama_admin,
		    user.id_user AS id_admin,
		    foto_galeri.nama_foto AS foto
		    FROM galeri,kategori_galeri,user,foto_galeri
		    WHERE galeri.kategori_id='$id_kategori' AND galeri.galeri_status='publish' AND kategori_galeri.aktif='Y' AND kategori_galeri.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND galeri.galeri_user=user.id_user AND galeri.kategori_id=kategori_galeri.id AND foto_galeri.id_foto=(SELECT MAX(id_foto) FROM foto_galeri WHERE foto_galeri.id_galeri=galeri.galeri_id ) ORDER BY galeri.galeri_id DESC
			");

		return $data->num_rows();
	}



	function detail_galeri($id){
		$id = intval($id);

		$cache_galeri=$this->CI->cache->file->get('galeri_'.$id);
		if($cache_galeri === FALSE){

			$data=$this->CI->db->query("SELECT galeri.galeri_id AS id,
			galeri.galeri_nama AS nama,
			galeri.galeri_deskripsi AS deskripsi,
			galeri.galeri_url AS slug,
			galeri.galeri_meta_keyword AS meta_keyword,
			galeri.galeri_meta_deskripsi AS meta_deskripsi,
			galeri.galeri_og_image AS og_image,
			galeri.galeri_og_deskripsi AS og_deskripsi,
			galeri.galeri_date AS tanggal,
			galeri.galeri_date_edit AS tanggal_edit,
			kategori_galeri.id AS id_kategori,
			kategori_galeri.nama_kategori,
			kategori_galeri.slug_kategori,
		    user.nama_lengkap AS nama_admin,
		    user.id_user AS id_admin,
		    foto_galeri.nama_foto AS foto
		    FROM galeri,kategori_galeri,user,foto_galeri
		    WHERE galeri.galeri_id='$id' AND galeri.galeri_status='publish' AND kategori_galeri.aktif='Y' AND kategori_galeri.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND galeri.galeri_user=user.id_user AND galeri.kategori_id=kategori_galeri.id AND foto_galeri.id_foto=(SELECT MAX(id_foto) FROM foto_galeri WHERE foto_galeri.id_galeri=galeri.galeri_id )
			");
			$data=array('jumlah'=>$data->num_rows(),'data'=>$data->row_array());
			$this->CI->cache->file->save('galeri_'.$id,$data,6000000);

		} else {
			$data=$cache_galeri;
		}	

		if($data['jumlah']>0){

			$data=$data['data'];

			$cache_foto_galeri=$this->CI->cache->file->get('fotos_galeri_'.$id);
			if($cache_foto_galeri === FALSE){
				$foto=$this->CI->db->query("SELECT id_foto AS id, nama_foto AS nama, deskripsi_foto AS deskripsi FROM foto_galeri WHERE id_galeri='$id' ORDER BY id_foto DESC");
				$foto=$foto->result_array();	
				$this->CI->cache->file->save('fotos_galeri_'.$id,$foto,6000000);
			} else {
				$foto=$cache_foto_galeri;
			}			


			$data['galeri']=$foto;
			$data['deskripsi']=($data['deskripsi']);
			$data['og_image']=trim($data['og_image']);
			$data['og_deskripsi']=trim($data['og_deskripsi']);
			$data['meta_keyword']=trim($data['meta_keyword']);
			$data['meta_deskripsi']=trim($data['meta_deskripsi']);

			return $data;

		} else {
			return false;
		}

	}

}