<?php
defined('BASEPATH') OR exit('No direct script access allowed');



function terbilang($angka){

	$bilangan= array(1=>array(0=>"satu",1=>"se"),2=>"dua",3=>"tiga",4=>"empat",5=>"lima",6=>"enam",7=>"tujuh",8=>"delapan",9=>"sembilan");

	$satuan= array(0=>"",1=>"puluh",2=>"ratus",3=>"ribu",4=>"juta",5=>"miliar");
	

	$set=str_split($angka);

	$jml=strlen($angka);

	$terbilang="";

	$hitung=0;

	foreach ($set as  $value) {
		
		if($jml>=16 AND $jml<=($max=18)){
			return $jml;
		} else if($jml>=13 AND $jml<=($max=15)){
			//trilun
		} else if($jml>=10 AND $jml<=($max=12)){
			//miliar
		} else if($jml>=7 AND $jml<=($max=9)){
			//juta
		}  else if($jml>=4 AND $jml<=($max=6)){
			//ribu
		} else {
			//ratus
		} 

	}

}


