<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends AN_Apricot

{


	function __construct(){
		parent::__construct();
	}

	
	function detail($id){

		$agenda = agenda($id);
		
		if(!$agenda){
			show_404();
			exit();
		}

		// $agenda=$this->db->get_where("agenda",array("id"=>$id));
		// if($agenda->num_rows()<1){
		// 	show_404();
		// 	exit;
		// }



		$data=$this->public_data;

		$data["informasi"]["title"]=$this->title->umum("Agenda - ".$agenda['judul']);
		$data["informasi"]["current_page"]="agenda";
		$data["informasi"]["uniqueid"]="agenda-".$id;

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];
		//$data["agenda"]=$agenda->row_array();
		$data["agenda"]=$agenda;

		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/agenda",$data);
		$this->load->view($this->tema."/footer",$data);


	}



}