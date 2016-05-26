<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_kategori extends CI_Model {


	public $hasil="";

	function __construct (){
		parent::__construct();
	}


	public  function kategori(){
		$deep=1;
		$sql=$this->db->query("select * from kategori where id_parent='0' AND terhapus='N' order by id_kategori DESC");
 		$this->hasil.="<ul class='list_kategori level1'>";
		foreach ($sql->result_array() as $value) {
				$status=($value['aktif']=='Y')?"<i class='fa fa-times non_kategori' data-toggle='tooltip' data-placement='left' title='Non aktifkan Kategori ini'></i>":"<i class='fa fa-check akt_kategori' data-toggle='tooltip' data-placement='left' title='Aktifkan Kategori ini'></i>";
				$this->hasil.="<li class='level1' id='$value[id_kategori]'><div class='level1 label label-default cari' id='$value[id_kategori]' alt='1'><i class='fa fa-plus t_sub_kategori' data-toggle='tooltip' data-placement='left' title='Tambahkan sub kategori'></i>";
				$this->hasil.="<span class='judul_kategori'>".$value["nama_kategori"]."</span>";
				$this->hasil.="<form><input type='text' class='form-ubah-kategori' value='".$value["nama_kategori"]."' data-toggle='tooltip' data-placement='top' title='Tekan Enter untuk menyimpan'></form>";
				$this->hasil.="<i class='fa fa-edit edit_kat' data-toggle='tooltip' data-placement='top' title='Ubah Nama'></i>".$status."<i class='fa fa-trash hapus_kategori' id='$value[id_kategori]' data-toggle='tooltip' data-placement='right' title='Hapus Kategori ini'></i></div>";
				$this->anak_kategori($value["id_kategori"],$deep,"PAR_$value[id_kategori]");
				$this->hasil.="  </li>";
		}
		$this->hasil.='</ul>';

		return $this->hasil;
	}


	public function anak_kategori($id,$level='0',$pas_parrent){
			$deep=1+$level;
			$sql2=$this->db->query("select * from kategori where id_parent='$id' AND terhapus='N' order by id_kategori DESC" );
		//	if($sql2->num_rows()>0){
			$this->hasil.="<ul class='level$deep'>";
			foreach ($sql2->result_array() as  $value) {
				$status=($value['aktif']=='Y')?"<i class='fa fa-times non_kategori' data-toggle='tooltip' data-placement='left' title='Non aktifkan Kategori ini'></i>":"<i class='fa fa-check akt_kategori' data-toggle='tooltip' data-placement='left' title='Aktifkan Kategori ini'></i>";
				$this->hasil.="<li class='level$deep' id='$value[id_kategori]'><div class='level$deep $pas_parrent label label-default cari' id='$value[id_kategori]' alt='$deep'><i class='fa fa-plus t_sub_kategori' data-toggle='tooltip' data-placement='left' title='Tambahkan sub kategori	'></i>";
				$this->hasil.="<span class='judul_kategori'>".$value["nama_kategori"]."</span>";
				$this->hasil.="<form><input type='text' class='form-ubah-kategori' value='".$value["nama_kategori"]."' data-toggle='tooltip' data-placement='top' title='Tekan Enter untuk menyimpan'></form>";
				$this->hasil.=" <i class='fa fa-edit edit_kat' data-toggle='tooltip' data-placement='top' title='Ubah Nama'></i>".$status."<i class='fa fa-trash hapus_kategori' id='$value[id_kategori]' data-toggle='tooltip' data-placement='right' title='Hapus Kategori ini'></i></div>";
				$this->anak_kategori($value["id_kategori"],$deep,$pas_parrent." "."PAR_$value[id_kategori]");
				$this->hasil.="</li>";
			}
			$this->hasil.='</ul>';
			//	}
		}





}

