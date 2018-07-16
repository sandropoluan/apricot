<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends AN_Apricot

{


	function __construct(){
		parent::__construct();
	}

	
	function detail($id){

		$download=$this->db->get_where("download",array("id"=>$id));
		if($download->num_rows()<1){
			show_404();
			exit;
		}



		$data=$this->public_data;

		$data["informasi"]["title"]=$this->title->umum("Download-".$download->row()->nama_file);
		$data["informasi"]["current_page"]="download";
		$data["informasi"]["uniqueid"]="download-".$id;

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];
		$data["download"]=$download->row_array();

		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/download",$data);
		$this->load->view($this->tema."/footer",$data);


	}



}