<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class All_galeri extends CI_Model{

	public $hasil;

	function __construct(){
		parent::__construct();
	}


	function get_galeri(){
		$query=$this->db->query("SELECT * FROM galeri ORDER BY galeri_id DESC");
		if($query->num_rows()>0){
			foreach ($query->result_array() AS $data){
				$this->hasil.="<tr>";
				$this->hasil.="<td>$data[galeri_nama]</td>";
				$this->hasil.="<td>$data[galeri_status]</td>";
				$this->hasil.="<td>$data[galeri_date]</td>";
				$this->hasil.="<td>$data[galeri_date_edit]</td>";
				$this->hasil.="<td>URL</td>";
				$this->hasil.="<td><a href='".base_url()."admin/galeri/$data[galeri_id]'><i class='fa fa-edit' style='cursor:pointer'></i></a> &nbsp; <i style='cursor:pointer;color:red' class='fa fa-times-circle hapus-galeri' id='$data[galeri_id]'></i> </td>";
				$this->hasil.="</tr>";
			}
		}
	}

}