<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends AN_Apricot

{


	function __construct(){
		parent::__construct();
	}

	
	function index(){

		$data=$this->public_data;

		$data["informasi"]["title"]=$this->title->privacy("Privacy");
		$data["informasi"]["current_page"]="privacy";
		$data["informasi"]["uniqueid"]="privacy";

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];

		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/privacy",$data);
		$this->load->view($this->tema."/footer",$data);


	}



}