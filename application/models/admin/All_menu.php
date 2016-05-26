<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class All_menu extends CI_Model {

	public $hasil;

	function __construct(){
		parent::__construct();
	}


	function get_all_menu(){
		$query1=$this->db->query("SELECT * FROM menu WHERE menu_id='1'");
		if($query1->num_rows()<1){
			$this->db->query("INSERT INTO menu (menu_id,menu_code,menu_nama) VALUES ('1','horizontal','utama') ");
		}

		$query2=$this->db->query("SELECT * FROM menu WHERE menu_id='2'");
		if($query2->num_rows()<1){
			$this->db->query("INSERT INTO menu (menu_id,menu_code,menu_nama) VALUES ('2','vertical','samping') ");
		}

		$query3=$this->db->query("SELECT * FROM menu WHERE menu_id='3'");
		if($query3->num_rows()<1){
			$this->db->query("INSERT INTO menu (menu_id,menu_code,menu_nama) VALUES ('3','vertical2','tambahan 1') ");
		}

		$query4=$this->db->query("SELECT * FROM menu WHERE menu_id='4'");
		if($query4->num_rows()<1){
			$this->db->query("INSERT INTO menu (menu_id,menu_code,menu_nama) VALUES ('4','vertical3','tambahan 2') ");
		}


		$query=$this->db->query("SELECT * FROM menu ORDER BY menu_id ASC");
		if($query->num_rows()>0){
			
			foreach($query->result_array() AS $data){
			
				$this->hasil.="<tr class='menu_tr' id='$data[menu_id]'>";
				$this->hasil.="<td>$data[menu_nama]</td>";
				$this->hasil.="<td>$data[menu_code]</td>";
				$this->hasil.="<td>$data[menu_created]</td>";
				$this->hasil.="<td><a href='".base_url()."admin/menu/$data[menu_id]'><i class='fa fa-edit' style='cursor:pointer'></i></a> &nbsp; <i style='cursor:pointer;color:red' class='fa fa-times-circle hapus-menu' id='$data[menu_id]'></i> </td>";
				$this->hasil.="</tr>";
			}

		}
	}


}