<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends AN_Apricot
{

	function __construct(){
		parent::__construct();
	}

	function article($keyword,$page=0){

		$keyword=trim(preg_replace("/[^A-Za-z0-9-_\s]/","",rawurldecode($keyword)));


		$this->load->library("pagination");

		$config['full_tag_open'] = "<nav> <ul class='pagination pagination-sm'>";
		$config['full_tag_close'] = "</ul> </nav>";


		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>";


		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>";

		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";

		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";		

		$config['cur_tag_open'] = "<li class='active'><a href='#'>";
		$config['cur_tag_close'] = "</a></li>";				

		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";



		$config['base_url']=baseURL($this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3));

		$config['uri_segment'] = 4;

		$config['total_rows']=$this->artikel->hitung_search_article($keyword);
		$config['per_page']=$this->system_info['max_tampil_artikel'];
		$this->pagination->initialize($config);


		$data=$this->public_data;
		$data["informasi"]["title"]=$this->title->search_article("Kata Kunci: ".$keyword);
		$data["informasi"]["current_page"]="pencarian-artikel";	
		$data["informasi"]["uniqueid"]="pencarian-artikel";

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];


		$data["heading"]="Pencarian '".$keyword."'";
		$data["semua_artikel"]=$this->artikel->search_article($keyword,$config['per_page'],$page);
		$data["pagination"]=$this->pagination->create_links();


		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/search_artikel",$data);
		$this->load->view($this->tema."/footer",$data);

		

	}

}