<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends AN_Apricot

{


	function __construct(){
		parent::__construct();
	}

	
	function index(){

		$data=$this->public_data;

		$data["informasi"]["title"]=$this->title->about_us("Tentang Kami");
		$data["informasi"]["current_page"]="about-us";
		$data["informasi"]["uniqueid"]="about-us";

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];

		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/about_us",$data);
		$this->load->view($this->tema."/footer",$data);


	}



}