<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class All_tags extends CI_Model{
	public $hasil="";
	function __construct(){
		parent::__construct();
	}

	function get_tags(){
		$query=$this->db->query("SELECT * FROM tags ORDER BY id_tag DESC");
		if($query->num_rows()>0){
			$data=$query->result_array();
			$no=1;
			foreach($data as $val){
				$this->hasil.="<tr id='$val[id_tag]'>";

				$this->hasil.="<th class='no'>";
				$this->hasil.=$no;
				$this->hasil.="</th>";

				$this->hasil.="<td class='nama_tag'>";
				$this->hasil.="<span>".$val["nama_tag"]."</span><form><input type='text' ></form>";
				$this->hasil.="</td>";

				$this->hasil.="<td class='slug_tag'>";
				$this->hasil.="<span>".$val["slug_tag"]."</span><form><input type='text' ></form>";
				$this->hasil.="</td>";

				$this->hasil.="<td class='hapus_tag'>";
				$this->hasil.="<button class='btn btn-danger btn-xs'><i class='glyphicon glyphicon-remove-circle'></i> Hapus</button>";
				$this->hasil.="</td>";

				$this->hasil.="</tr>";
				$no++;
			}
		}
	}


}



?>