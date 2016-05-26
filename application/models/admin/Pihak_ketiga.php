<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pihak_ketiga extends CI_Model

{

	function __construct(){
		parent::__construct();

	}


	function get_data(){

		$data=$this->db->query("SELECT * FROM pihak_ketiga WHERE id='1'");

		if($data->num_rows()<1){
			$this->db->query("INSERT INTO pihak_ketiga (id) VALUES ('1') ");

		 $data=$this->db->query("SELECT * FROM pihak_ketiga WHERE id='1'");

		}


		$data=$data->row();

		return array(
			"recaptcha_key"=>$data->recaptcha_key,
			"recaptcha_secret_key"=>$data->recaptcha_secret_key,
			"disqus_unique_name"=>$data->disqus_unique_name,
			"script_google_analytics"=>$data->script_google_analytics
			);

	}

}