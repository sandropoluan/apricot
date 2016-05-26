<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class All_page extends CI_Model {

	public $hasil;

	function __construct(){
		parent::__construct();
	}

	function all_pages(){
		$query=$this->db->query("SELECT * FROM pages ORDER BY page_id DESC");

		if($query->num_rows()>0){
			$no=1;
			foreach($query->result_array() as $value){
				$url="<div class='input-group'>
				<span class='input-group-addon'><i class='fa fa-hand-o-up pilih-url' style='cursor:pointer'></i></span>
				<input type='text' class='form-control area-url' value='".base_url()."page/$value[page_id]-$value[page_url]'/><span class='input-group-addon'><a href='".base_url()."page/$value[page_id]-$value[page_url]' target='_blank'><i class='fa fa-mail-forward'></i></a></span>
				</div>";

				$this->hasil.="<tr>";
				$this->hasil.="<td>$value[page_judul]</td>";
				$this->hasil.="<td>$value[page_status]</td>";
				$this->hasil.="<td>$value[page_created]</td>";
				$this->hasil.="<td>$value[page_edited]</td>";
				$this->hasil.="<td>$url</td>";

				$this->hasil.="<td><a href='".base_url()."admin/page/$value[page_id]'><i class='fa fa-edit btn-edit-page'></i></a> &nbsp; <i style='cursor:pointer;color:red' class='fa fa-times-circle hapus-page' id='$value[page_id]'></i></td>";
				$this->hasil.="</tr>";

			}
		}

	}

}