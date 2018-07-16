<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Title {
	protected $CI;
	protected $prefix;
	protected $suffix;
	public $default;

	public function __construct(){
		$this->CI =& get_instance();


		$cache_title_format=$this->CI->cache->file->get('title_format');
		if($cache_title_format === FALSE){
			$this->CI->db->select("prefix_suffix_title,prefix_suffix_sebagai,default_title");
			$cari=$this->CI->db->get_where("informasi",array("id"=>1));	
			$data= $cari->row();
			$this->CI->cache->file->save('title_format',$data,6000000);
		} else {
			$data=$cache_title_format;
		}


		$this->default=$data->default_title;

		switch ($data->prefix_suffix_sebagai) {
			case 'prefix':
				$this->prefix=$data->prefix_suffix_title;
				break;

			case 'suffix':
				$this->suffix=$data->prefix_suffix_title;
				break;

		}


	}

	public function home(){
		return $this->prefix." ".$this->default." ".$this->suffix;
	}

	public function semua_artikel(){
		return $this->prefix." "."Semua artikel"." ".$this->suffix; 
	}

	public function artikel($title){

		return $this->prefix." ".$title." ".$this->suffix; 

	}


	public function semua_galeri(){
		return $this->prefix." "."Semua galeri"." ".$this->suffix; 
	}

	public function galeri($title){
		return $this->prefix." ".$title." ".$this->suffix; 
	}


	public function kategori($title){

		return $this->prefix." ".$title." ".$this->suffix; 

	}

	public function umum($title){

		return $this->prefix." ".$title." ".$this->suffix; 

	}
	

	public function tag($title){

		return $this->prefix." ".$title." ".$this->suffix; 

	}

	public function page($title){
		return $this->prefix." ".$title." ".$this->suffix; 		
	}

	public function about_us($title){
		return $this->prefix." ".$title." ".$this->suffix; 		
	}

	public function privacy($title){
		return $this->prefix." ".$title." ".$this->suffix; 		
	}

	public function disclaimer($title){
		return $this->prefix." ".$title." ".$this->suffix; 		
	}

	public function syarat_ketentuan($title){
		return $this->prefix." ".$title." ".$this->suffix; 		
	}

	public function search_article($title){
		return $this->prefix." ".$title." ".$this->suffix;
	}


}
