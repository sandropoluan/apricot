<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends AN_Apricot

{


	function __construct(){
		parent::__construct();
  }
  
  function index(){
    $data=$this->public_data;

		$data["informasi"]["title"]=$this->title->umum("FAQ - Frequently Asked Questions");
		$data["informasi"]["current_page"]="faq";
		$data["informasi"]["uniqueid"]="faq";

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];
		$data["faq"]=semua_faq();

		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/faq",$data);
		$this->load->view($this->tema."/footer",$data);
  
  }


  function detail($id=0){
    $id = intval($id);
    $faq=faq($id);

    if($id > 0 && (!empty($faq))){

      $data=$this->public_data;
      $data["informasi"]["title"]=$this->title->umum($faq['pertanyaan']);
      $data["informasi"]["current_page"]="detail-faq";
      $data["informasi"]["uniqueid"]="faq_".$id;
  
      
  
      $data["informasi"]["og-type"]="website";
      $data["informasi"]["og-url"]=current_url();
      $data["informasi"]["og-title"]=$data["informasi"]["title"];
  
  
      $data['faq']=$faq;
  
      $this->load->view($this->tema."/header",$data);
      $this->load->view($this->tema."/detail_faq",$data);
      $this->load->view($this->tema."/footer",$data);

    } else {
      show_404();
    }
  }


}