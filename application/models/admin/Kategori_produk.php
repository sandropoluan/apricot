<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class Kategori_produk extends CI_Model{

	public $hasil;

	function __construct(){
		parent::__construct();
	}

	function get_kategori($id='0'){
		$query=$this->db->query("SELECT * FROM kategori_produk WHERE parent_kategori='$id' AND terhapus='N' ORDER BY id DESC");
		if($query->num_rows()>0){
			foreach ($query->result_array() as  $value) {

				$show=($value['aktif']=='Y')?"disable-kategori":"enable-kategori";
				
				$this->hasil.="<li data-id='$value[id]' >";

				$this->hasil.="<div class='panel-kat'>";

				$this->hasil.="<span class='nama-kategori' data-id='$value[id]' data-toggle='tooltip' data-placement='top' title='Klik untuk mengedit' >";
				$this->hasil.=$value['nama_kategori'];
				$this->hasil.="</span>";

				$this->hasil.="<input type='text' class='nama-kategori-field' data-id='$value[id]' value='$value[nama_kategori]' data-toggle='tooltip' data-placement='right' title='Tekan ENTER untuk simpan'>";


				$this->hasil.="<span class='panel-edit'>";

				$this->hasil.="<input type='text' data-id='$value[id]' class='kategori-baru-field' >";

				$this->hasil.="<i data-id='$value[id]' class='fa fa-plus sub-kategori-toggle' data-toggle='tooltip' data-placement='top' title='Sub kategori baru'></i>";


				$this->hasil.="<i data-id='$value[id]' class='fa fa-tasks' data-toggle='tooltip' data-placement='top' title='Atur spesifikasi'></i>";


				$this->hasil.="<i data-id='$value[id]' class='fa fa-eye $show' data-toggle='tooltip' data-placement='top' title='Aktif/nonaktif kategori'></i>";


				$this->hasil.="<i data-id='$value[id]' class='fa fa-close hapus-kategori-produk' data-toggle='tooltip' data-placement='top' title='Hapus kategori'></i>";

				$this->hasil.="</span>";

				$this->hasil.="</div>";

				$this->hasil.="<ul data-id='$value[id]' class='konten-list' >";
				$this->get_kategori($value['id']);
				$this->hasil.="</ul>";

				$this->hasil.="</li>";
			}
		} else {
			return;
		}
	}





}