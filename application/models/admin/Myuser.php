<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Myuser extends CI_Model {

 public $id;
 public $name;
 public $password;
 public $level;
 public $avatar;

 function __construct (){
 	parent::__construct();
	$this->load->library('session');
 } 

 function set($id,$name,$password){


 	$query=$this->db->query("SELECT * from user where id_user='$id'and name_user='$name' and password_user='$password' and status_user='Y' and terhapus='N'");
 	if($query->num_rows()>0){
 	$row=$query->row();
 	$this->id=$row->id_user;
 	$this->name=$row->name_user;
 	$this->password=$row->password_user;
 	$this->level=$row->level_user;
 	$this->avatar=$row->avatar_user;
 	$data_sessi=array('login'=>true,
	 				  'id_user'=>$row->id_user,
	 				  'name_user'=>$row->name_user,
	 				  'password_user'=>$this->password,
	 				  'level_user'=>$this->level);
	 $this->session->set_userdata($data_sessi);


	 // mulai generate access security key
	 if(!$this->session->userdata("random_filemanager_key")){
	 	$karakter = 'abcdefghijklmnopqrstuvwxyz0123456789';
	 	$hasil = '';
		 for ($i = 0; $i < 10; $i++) {
		      $hasil .= $karakter[rand(0, strlen($karakter) - 1)];
		 }
		 $this->session->set_userdata(array("random_filemanager_key"=>$hasil));
	 };
	 
 	 return true;
 	}
 	else {
 		$data_sessi=array('login'=>false,
	 						'id_user'=>"",
	 						'name_user'=>"",
	 						'password_user'=>"");
	 	$this->session->set_userdata($data_sessi);
 		return false;
 	}
 }



}


?>