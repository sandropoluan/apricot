<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downloads extends AN_Apricot

{


	function __construct(){
		parent::__construct();
	}



	function list_download($page=0){

		$data=$this->public_data;
	

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
		$config['total_rows']=$this->db->count_all_results('download');

		$config['per_page']=$this->system_info['max_tampil_download'];

		$this->pagination->initialize($config);


		$data["informasi"]["title"]=$this->title->umum("Semua Download");
		$data["informasi"]["current_page"]="downloads";
		$data["informasi"]["uniqueid"]="downloads";

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];

		$data["heading"]="Semua Download";		
		$data["downloads"]=$this->db->order_by("id","desc")->limit($config['per_page'],$page)->get('download')->result_array();
		$data["pagination"]=$this->pagination->create_links();


		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/downloads",$data);
		$this->load->view($this->tema."/footer",$data);


	}



}