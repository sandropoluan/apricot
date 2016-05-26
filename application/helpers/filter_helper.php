<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function filter($data){
	return $data;
}

function filterquote($data,$quote="single"){

	switch ($quote) {
		case "single":
			$data=str_replace("'", "&singlequote;",$data);
			return $data;
		break;

		case "double":
			$data=str_replace('"', '&quot;',$data);
			return $data;		
		break;

		case "back":
			$data=str_replace("`", "&backquote;",$data);
			return $data;			
		break;

		case "all":
			$data=str_replace(array("'",'"',"`"),array("&singlequote;","&doublequote;","&backquote;"),$data);
			return $data;
		break;
		
		default:
			$data=str_replace("'", "&singlequote;",$data);
			return $data;
		break;
	}

	$data=str_replace($data, "'", "&singlequote;");
	return $data;
}

function reversequote($data,$quote="single"){

	switch ($quote) {
		case "single":
			$data=str_replace("&singlequote;","'",$data);
			return $data;
		break;

		case "double":
			$data=str_replace('&doublequote;','"',$data);
			return $data;		
		break;

		case "back":
			$data=str_replace("&backquote;","`",$data);
			return $data;			
		break;

		case "all":
			$data=str_replace(array("&singlequote;","&doublequote;","&backquote;"),array("'",'"',"`"),$data);
			return $data;
		break;
		
		default:
			$data=str_replace("&singlequote;","'",$data);
			return $data;
		break;
	}

}

function changequote($data){
	$data=str_replace(array("'",'"',"\\","<",">"),array("’","”","\\\\","&lt;","&gt;"),$data);

	return $data; 
}