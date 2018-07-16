<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AN_Apricot extends CI_Controller{

	protected $judul;
	protected $tema;
	protected $informasi;
	protected $artikel_populer;
	protected $system_info;
	protected $biodata;
	protected $menu_horizontal;
	protected $menu_vertikal;
	protected $kategori_artikel;
	protected $kategori_galeri;
	protected $tags;
	protected $news_ticker;
	protected $recaptcha;
	protected $google_analytics;
	protected $disqus;



	protected $public_data=array();

 
	public function __construct(){
		parent::__construct();

		$this->load->helper(array('tambahan','custom_url','front_end','filter','text'));

		$this->load->library("informasi_web");
		$this->system_info=$this->informasi_web->get_for_system();


		if($this->system_info["sleep_mode"]=="Y"){
			redirect("sleep");
			exit;
		}

		$this->informasi=$this->informasi_web->get();

		//aktifkan title
		$this->load->library(array("title","artikel","galeri","biodata_web","menu",'kategori','tag','newsticker','pihak_ketiga','pages'));

		//cari tema

		$cache_tema_aktif=$this->cache->file->get('tema_aktif');
		if($cache_tema_aktif === FALSE){
			$tema_aktif=$this->db->get_where("tema",array("aktif"=>"Y"));
			$tema_aktif=array('jumlah'=>$tema_aktif->num_rows(),'data'=>@$tema_aktif->row());
			$this->cache->file->save('tema_aktif',$tema_aktif,6000000);
		} else {
			$tema_aktif=$cache_tema_aktif;
		}
		

		if($tema_aktif['jumlah']>0){
			$data_tema=$tema_aktif['data'];
			$this->tema=$data_tema->nama_tema;
			$this->session->set_userdata("tema_aktif",$data_tema->nama_tema."/");
		} else {
			$this->session->set_userdata("tema_aktif","default/");
			$this->tema="default";
		}


	 $this->artikel_populer=$this->artikel->artikel_populer($this->system_info['max_populer_artikel']);
	 $this->biodata=$this->biodata_web->biodata;

	 $this->menu_horizontal=$this->menu->one_level_horizontal;
	 $this->menu_vertikal=$this->menu->one_level_vertikal;

	 $this->kategori_artikel=$this->kategori->one_level_artikel();
	 $this->kategori_galeri=$this->kategori->kategori_galeri();

	 $this->tags=$this->tag->tags;

	 $this->news_ticker=$this->newsticker->get_news();

	 $this->recaptcha=$this->pihak_ketiga->get_recaptcha();
	 $this->google_analytics=$this->pihak_ketiga->google_analytics();
	 $this->disqus=$this->pihak_ketiga->get_disqus();




	 $this->public_data=array(
			"kategori_artikel"=>$this->kategori_artikel,
			"kategori_galeri"=>$this->kategori_galeri,
			"menu_horizontal"=>$this->menu_horizontal,
			"menu_vertikal"=>$this->menu_vertikal,
			"informasi"=>$this->informasi,			
			"artikel_populer"=>$this->artikel_populer,
			"biodata"=>$this->biodata,
			"tags"=>$this->tags,
			"news_ticker"=>$this->news_ticker,
			"recaptcha"=>$this->recaptcha,
			"google_analytics"=>$this->google_analytics,
			"disqus"=>$this->disqus,
		 );
		 
	

	 $this->public_data["informasi"]["author"]=$this->biodata["nama"];
	 $this->public_data["informasi"]["article-author"]=$this->biodata["link-fb"];
	 $this->public_data["informasi"]["article-publisher"]=$this->biodata["link-fb"];
	 //$this->output->enable_profiler(TRUE);
	}








}
