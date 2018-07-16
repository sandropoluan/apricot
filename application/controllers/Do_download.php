<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Do_download extends CI_Controller

{


	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('download');
	}

	
	function d($id){

		$download=$this->db->get_where("download",array("id"=>$id));
		if($download->num_rows()<1){
			echo "FILE NOT FOUND";
			exit;
		}

		$total_download=(int)$download->row()->jumlah_download+1;
		$this->db->where('id',$id)->update('download',array('jumlah_download'=>$total_download));

		$download=$download->row_array();

		force_download(FCPATH."/an-component/media/download/".$download['file'],NULL);



	}



}