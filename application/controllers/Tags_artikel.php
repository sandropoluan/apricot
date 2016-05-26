<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags_artikel extends AN_Apricot
{


	function __construct(){
		parent::__construct();
	}

    function detail($id=0,$page=0){
    	

    	if($id>0 AND ($tag=$this->tag->detail_tag($id))!=FALSE){



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




		$config['base_url']=baseURL($this->uri->segment(1)."/".$this->uri->segment(2));

		$config['uri_segment'] = 3;

		$config['total_rows']=$this->artikel->hitung_semua_artikel_per_tag($id);
		$config['per_page']=$this->system_info['max_tampil_artikel'];
		$this->pagination->initialize($config);


		$data=$this->public_data;
		$data["informasi"]["title"]="Tag ".$this->title->tag($tag['nama']);
		$data["informasi"]["current_page"]="artikel-per-tag";
		$data["informasi"]["uniqueid"]="tag_page";

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];


		$data["heading"]="Tag -".$tag['nama'];
		$data["semua_artikel"]=$this->artikel->artikel_per_tag($id,$config['per_page'],$page);
		$data["pagination"]=$this->pagination->create_links();
		


		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/artikel_per_kategori",$data);
		$this->load->view($this->tema."/footer",$data);


    	


    	} else {
    		echo "nope";
    	}


    }



}