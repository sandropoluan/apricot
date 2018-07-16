<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('assets_url')){

	function assets_url($uri = '',$protocol = NULL){
		$CI =& get_instance();
		$tema="an-theme/";

		$tema.=$CI->session->userdata('tema_aktif');

		$tema.="assets/";
		$tema.=$uri;

	return $CI->config->base_url($tema, $protocol);

	}

}

function ambil_foto_galeri_from_cache($id){
	$CI=& get_instance();
	$cache_foto_galeri=$CI->cache->file->get('fotos_galeri_'.$id);
	if($cache_foto_galeri === FALSE){
		$foto=$CI->db->query("SELECT id_foto AS id, nama_foto AS nama, deskripsi_foto AS deskripsi FROM foto_galeri WHERE id_galeri='$id' ORDER BY id_foto DESC");
		$foto=$foto->result_array();	
		$CI->cache->file->save('fotos_galeri_'.$id,$foto,6000000);
	} else {
		$foto=$cache_foto_galeri;
	}	

	return $foto;
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


function gambar_cluster($foto){
	return get_instance()->config->base_url("an-component/media/foto-cluster/$foto");
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

function faq_url($id,$slug=''){
	return get_instance()->config->base_url('faq/'.$id.'-'.$slug);
}

function download_url($id,$slug=''){
	return get_instance()->config->base_url('download/'.$id.'-'.$slug);
}

function agenda_url($id,$slug=''){
	return get_instance()->config->base_url('agenda/'.$id.'-'.$slug);
}

function do_download($id){
	return get_instance()->config->base_url('do_download/d/'.$id);
}

function ambil_tag($tag){
	$CI=& get_instance();
	$tag=explode(',',$tag);	
	$slug=implode('_',$tag);

	$cache = $CI->cache->file->get("tags_$slug");
	if($cache === FALSE){
		$CI->db->where_in('id_tag',$tag);
		$cache=$CI->db->get('tags')->result_array();
		$CI->cache->file->save("tags_$slug",$cache,6000000);
	} 
	return $cache;
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


function semua_faq(){
	$CI=& get_instance();
	$cache = $CI->cache->file->get('semua_faq');
	if($cache === FALSE){
		$query=$CI->db->order_by('id','desc')->get('faq');
		$cache=$query->result_array();
		$CI->cache->file->save('semua_faq',$cache,6000000);
	}
	return $cache;
}


function faq($id=0){
	$CI=& get_instance();
	$cache = $CI->cache->file->get('faq_'.$id);
	if($cache === FALSE){		
		$query=$CI->db->where(array('id'=>$id))->get('faq');
		if($query->num_rows()>0){
			$cache=$query->row_array();
		} else {
			$cache=array();
		}
		$CI->cache->file->save('faq_'.$id,$cache,6000000);
		
	}
	return $cache;	
}


function agenda($id=0){
	$CI=& get_instance();
	$cache = $CI->cache->file->get('agenda_'.$id);
	if($cache === FALSE){		
		$query=$CI->db->where(array('id'=>$id))->get('agenda');
		if($query->num_rows()>0){
			$cache=$query->row_array();
		} else {
			$cache=array();
		}
		$CI->cache->file->save('agenda_'.$id,$cache,6000000);
		
	}
	return $cache;	
}


function group_banner($id){
	$CI=& get_instance();
	$cache = $CI->cache->file->get('group_banner_'.$id);
	if($cache === FALSE){
		$query=$CI->db->order_by('id','asc')->where(array('id_group'=>$id))->get('banner_item');
		if($query->num_rows()>0){
			$cache=$query->result_array();
		} else {
			$cache=array();
		}
		$CI->cache->file->save('group_banner_'.$id,$cache,6000000);
	}
	return $cache;

}


function horizontal_menu($ul_class="",$li_class=""){
	$CI=& get_instance();


}
