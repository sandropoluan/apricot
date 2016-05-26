<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semua_galeri extends AN_Apricot
{
	function __construct(){
	 parent::__construct();
	}

	function semua($page=0){

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


		$config['uri_segment'] = 2;
		$config['base_url']=baseURL($this->uri->segment(1));
		$config['total_rows']=$this->galeri->hitung_semua_galeri();
		//$config['total_rows']=10;
		$config['per_page']=$this->system_info['max_tampil_galeri'];
		$this->pagination->initialize($config);

		$data=$this->public_data;
		$data["informasi"]["title"]=$this->title->semua_galeri();
		$data["informasi"]["current_page"]="semua-galeri";	
		$data["informasi"]["uniqueid"]="semua-galeri-page";

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];


		$data["heading"]="Semua Galeri";		
		$data["semua_galeri"]=$this->galeri->semua_galeri($config['per_page'],$page);
		$data["pagination"]=$this->pagination->create_links();

		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/semua_galeri",$data);
		$this->load->view($this->tema."/footer",$data);

	}


	function detail($id=0){

		if($id>0 AND ($galeri=$this->galeri->detail_galeri($id))!=false){

		$data=$this->public_data;
		$data["informasi"]["title"]=$this->title->galeri($galeri['nama']);
		$data["informasi"]["current_page"]="detail-galeri";
		$data["informasi"]["uniqueid"]="galeri_".$id;

		$data["informasi"]["meta_deskripsi"]=$galeri["meta_deskripsi"]==""?$data["informasi"]["meta_deskripsi"]:$galeri["meta_deskripsi"];


		$data["informasi"]["meta_keyword"]=$galeri["meta_keyword"]==""?$data["informasi"]["meta_keyword"]:$galeri["meta_keyword"];

		$data["informasi"]["og-type"]="website";
		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$galeri["nama"]==""?$data["informasi"]["title"]:$galeri["nama"];	

		$data["informasi"]["og-description"]=$galeri["og_deskripsi"]==""?$data["informasi"]["meta_deskripsi"]:$galeri["og_deskripsi"];

		$data["informasi"]["og-image"]=$galeri["og_image"]==""?img_galeri_url($galeri["foto"]):$galeri["og_image"];

		$data['galeri']=$galeri;

		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/detail_galeri",$data);
		$this->load->view($this->tema."/footer",$data);

		} else {
			show_404();
		}

	}


}