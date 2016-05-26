<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends AN_Apricot

{

	function __construct(){
		parent::__construct();
	}

	public function detail($id=0){


	if($id>0 AND ($page=$this->pages->detail_page($id))!=FALSE){

				
		$data=$this->public_data;

		$data["informasi"]["title"]=$this->title->page($page["judul"]);
		$data["informasi"]["current_page"]="page";
		$data["informasi"]["uniqueid"]="page_".$id;
		$data["informasi"]["custom_javascript"]=$page["javascript"];

		$data["informasi"]["meta_keyword"]=$page["meta_keywords"]==""?$data["informasi"]["meta_keyword"]:$page["meta_keywords"];
		$data["informasi"]["meta_deskripsi"]=$page["meta_description"]==""?$data["informasi"]["meta_deskripsi"]:$page["meta_description"];

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];
		$data["informasi"]["og-description"]=$data["informasi"]["meta_deskripsi"];
		$data["informasi"]["og-image"]=$page["foto"]==""?$data["informasi"]["og-image"]:$page["foto"];


		$data["heading"]=$page['judul'];
		$data["page"]=$page;

		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/page",$data);
		$this->load->view($this->tema."/footer",$data);





				} else{
					show_404();
				}


	}

}