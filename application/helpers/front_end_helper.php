<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('assets_url')){

	function assets_url($uri = '',$protocol = NULL){
		$CI =& get_instance();
		$tema="an-theme/";

	    $tema_aktif=$CI->db->get_where("tema",array("aktif"=>"Y"));
		if($tema_aktif->num_rows()>0){
			$data_tema=$tema_aktif->row();
			$tema.=$data_tema->nama_tema."/";
		} else {
			$tema.="default/";
		}

		$tema.="assets/";
		$tema.=$uri;

	return $CI->config->base_url($tema, $protocol);

	}

}

function img_artikel_url($uri = '',$thumb=false, $protocol = NULL)
	{
		$path="an-component/media/upload-gambar-artikel";
		if ($thumb==true){
			$path.="-thumbs";
		}
		$path.="/";
		return get_instance()->config->base_url($path.$uri, $protocol);
	}


function artikel_url($id,$slug='',$ctrl="artikel"){

 return get_instance()->config->base_url($ctrl.'/'.$id.'-'.$slug);

}

function galeri_url($id,$slug='',$ctrl="galeri"){

 return get_instance()->config->base_url($ctrl.'/'.$id.'-'.$slug);

}


function img_galeri_url($uri = '',$thumb=false, $protocol = NULL)
	{
		$path="an-component/media/upload-galeri";
		if ($thumb==true){
			$path.="-thumbs";
		}
		$path.="/";
		return get_instance()->config->base_url($path.$uri, $protocol);
	}



function tag_url($id,$slug='',$ctrl="tag"){
 return get_instance()->config->base_url($ctrl.'/'.$id.'-'.$slug);
}


function kategori_url($id,$slug='',$ctrl="kategori"){
 return get_instance()->config->base_url($ctrl.'/'.$id.'-'.$slug);
}

function kategori_galeri_url($id,$slug='',$ctrl="kategori-galeri"){
 return get_instance()->config->base_url($ctrl.'/'.$id.'-'.$slug);
}

function page_url($id,$slug=''){
 return get_instance()->config->base_url('page/'.$id.'-'.$slug);
}

function ambil_tag($tag){
	$CI=& get_instance();
	$tag=explode(',',$tag);
	$CI->db->where_in('id_tag',$tag);
	$data=$CI->db->get('tags');
	return $data->result_array();
}

function ambil_foto_galeri($id,$jumlah=false){
	$CI=& get_instance();

	$CI->db->order_by('id_foto','DESC');
	$data=$CI->db->get_where('foto_galeri',array('id_galeri'=>$id));
	return $jumlah==false?$data->result_array():$data->num_rows();
}

function ambil_foto_artikel($id,$jumlah=false){
	$CI=& get_instance();

	$CI->db->order_by('id_foto','DESC');
	$data=$CI->db->get_where('foto_artikel',array('id_artikel'=>$id));
	
	return $jumlah==false?$data->result_array():$data->num_rows();


}


function format_tanggal($tanggal,$jam=false){

 $tanggal_terbentuk="";

 $tanggal=explode(" ",$tanggal);

 $set1=explode("-",$tanggal[0]);


 switch ($set1[1]) {
 	case '01':
 		$tanggal_terbentuk.="January";
 		break;

 	case '02':
 		$tanggal_terbentuk.="February";
 		break;

 	case '03':
 		$tanggal_terbentuk.="March";
 		break;

 	case '04':
 		$tanggal_terbentuk.="April";
 		break;

 	case '05':
 		$tanggal_terbentuk.="May";
 		break;

 	case '06':
 		$tanggal_terbentuk.="June";
 		break;

 	case '07':
 		$tanggal_terbentuk.="July";
 		break;

 	case '08':
 		$tanggal_terbentuk.="August";
 		break;

 	case '09':
 		$tanggal_terbentuk.="September";
 		break;

 	case '10':
 		$tanggal_terbentuk.="Octobar";
 		break;

 	case '11':
 		$tanggal_terbentuk.="November";
 		break;

 	case '12':
 		$tanggal_terbentuk.="December";
 		break;



 }

 $tanggal_terbentuk.=" ".$set1[2];
 $tanggal_terbentuk.=",".$set1[0];

if($jam==true){
	$tanggal_terbentuk.=" ".$tanggal[1];
}
return $tanggal_terbentuk;
}


function cuma_tanggal($date){
	$pecah=explode(" ",$date);
	return $pecah[0];
}


function set_tag($data){
 return str_replace(array("&lt; "),array("&lt;"),$data);
}





function potong_text($text,$max=50,$dot=true){
	$data=strip_tags($text);
	$data=substr($data,0,$max);
	if($dot==true){
		$data.=" ...";
	}
	return $data;
}








function horizontal_menu($ul_class="",$li_class=""){
	$CI=& get_instance();


}