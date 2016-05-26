<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembilang {

public $terbilang="";
public $jml;
public $angka;
public $bilangan= array(0=>array('',''),1=>array("se","satu "),2=>array("dua ","dua "),3=>array("tiga ","tiga "),4=>array("empat ","empat "),5=>array("lima ","lima "),6=>array("enam ","enam "),7=>array("tujuh ","tujuh "),8=>array("delapan ","delapan "),9=>array("sembilan ","sembilan "));

public $set=array();



public function _set($angka){	

	$this->angka=$angka;

	$this->jml=strlen($angka);

	if($this->jml>0 AND $angka>0){
		
		if($this->jml>=($min=16) AND $this->jml<=($max=18)){
			//biliun
			$h=$this->ratus($this->angka,$this->jml,$min,$max);
			if ($h[1]==true) $this->terbilang.="biliun ";
			$this->_set($h[0]);

		} else if($this->jml>=($min=13) AND $this->jml<=($max=15)){
			//trilun
			$h=$this->ratus($this->angka,$this->jml,$min,$max);
			if ($h[1]==true) $this->terbilang.="triliun ";
			$this->_set($h[0]);


		} else if($this->jml>=($min=10) AND $this->jml<=($max=12)){
			//miliar
			$h=$this->ratus($this->angka,$this->jml,$min,$max);
			if ($h[1]==true) $this->terbilang.="miliar ";
			$this->_set($h[0]);



		} else if($this->jml>=($min=7) AND $this->jml<=($max=9)){
			//juta
			$h=$this->ratus($this->angka,$this->jml,$min,$max);
			if ($h[1]==true) $this->terbilang.="juta ";
			$this->_set($h[0]);



		}  else if($this->jml>=($min=4) AND $this->jml<=($max=6)){

			//ribu
			$h=$this->ratus($this->angka,$this->jml,$min,$max,true);
			if ($h[1]==true) $this->terbilang.="ribu ";
			$this->_set($h[0]);



		} else if($this->jml>=($min=1) AND $this->jml<=($max=3)) {
			//ratus
			$h=$this->ratus($this->angka,$this->jml,1,3);
			$this->_set($h[0]);

			//echo "lol";

		} 

	}





}

private function ratus($nilai,$jml,$min,$max,$an=false){
	$min-=1;
	$j=(strlen($nilai)>=1 AND strlen($nilai)<=3)?strlen($vall=substr($nilai,0)):strlen($vall=substr($nilai,0,-$min));
	$jml=count($arr=str_split($vall));

	$In=($an==true || $jml>1)?0:1;


	foreach ($arr as $key => $val) {
		
		$l=false;

		if($jml-$key==3){

			if( $val==0) {
				continue;
				}
			else
				{
			$l=true;
			$this->terbilang.=$this->bilangan[$val][$In];
			$this->terbilang.="ratus ";
			}

		} else if ($jml-$key==2){

			if( $val==0) {
				continue;
				}
			else
				{
			
			$l=true;
			$this->terbilang.=$this->bilangan[$val][$In];
			$this->terbilang.="puluh ";
		}

			
			
		} else if ($jml-$key<2){

			if( $val==0) {
				continue;
				}
			else
				{
			
			$l=true;
			$this->terbilang.=$this->bilangan[$val][$In];
	
			}
		} 

	}


return array((substr($nilai, $jml)),$l);


} 



}
