<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Syarat_ketentuan extends AN_Apricot

{


	function __construct(){
		parent::__construct();
	}

	
	function index(){

		$data=$this->public_data;

		$data["informasi"]["title"]=$this->title->syarat_ketentuan("Syarat dan ketentuan");
		$data["informasi"]["current_page"]="syarat_ketentuan";
		$data["informasi"]["uniqueid"]="syarat_ketentuan";

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];

		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/syarat_ketentuan",$data);
		$this->load->view($this->tema."/footer",$data);


	}



}