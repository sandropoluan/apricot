<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Media extends CI_Model{
	protected $result;
	protected $result2;

	function __construct(){
		parent::__construct();
	}

	function all_media(){
		$query=$this->db->query("SELECT * FROM foto_artikel,artikel,user WHERE foto_artikel.id_artikel=artikel.artikel_id AND user.id_user=artikel.artikel_id_user ORDER BY id_foto DESC");
		if($query->num_rows()>0){
			$delete="";
			
			foreach($query->result_array() as $data){
				if($data['artikel_id_user']==$this->session->userdata('id_user') OR $data['artikel_editable']=='Y' OR $this->session->userdata('level_user')==1 ){
					$delete="<i style='cursor:pointer;color:red' class='fa fa-times-circle hapus-media' id='$data[id_foto]'></i>";
				} else {
					$delete="";
				}

				$this->result.="<tr><td>$data[nama_foto]</td><td>$data[artikel_judul] </td><td>
				<div class='input-group'>
				 <div class='input-group-addon'><i class='fa fa-hand-o-up pilih' style='cursor:pointer'></i></div>
				<input type='text' class='form-control area-url' value='".base_url()."an-component/media/upload-gambar-artikel/$data[nama_foto]'/>
				<div class='input-group-addon'><a href='".base_url()."an-component/media/upload-gambar-artikel/$data[nama_foto]' target='_blank'><i class='fa fa-mail-forward'></i></a><a href='".base_url()."an-component/media/upload-gambar-artikel-thumbs/$data[nama_foto]' target='_blank'><small><small><small><i class='fa fa-mail-forward'></i></small></small></small></a></div>
				</div>
				</td><td>$delete</td></tr>";

				
			} 

			return $this->result;
		}

	}

	function foto_pendukung(){
		$daftar_foto=get_dir_file_info(FCPATH."an-component/media/upload-gambar-pendukung/",FALSE);
		 
                  foreach($daftar_foto as $data2){
                    $ukuran=byte_format($data2['size']);
                    $date=mdate('%Y-%m-%d / %h:%i %a',$data2['date']);
										//$date=$data2['date'];
										  if($data2['name'] == 'index.html'){
												continue;
											}
                      $this->result2.="<tr>
                              <td>$data2[name]</td>
                              <td>$ukuran</td>
                              <td>$date</td>
                              <td><div class='input-group'>
 <div class='input-group-addon'><i class='fa fa-hand-o-up pilih' style='cursor:pointer'></i></div>
<input type='text' class='form-control area-url' value='".base_url()."an-component/media/upload-gambar-pendukung/$data2[name]'/>
<div class='input-group-addon'><a href='".base_url()."an-component/media/upload-gambar-pendukung/$data2[name]' target='_blank'><i class='fa fa-mail-forward'></i></a></div>
</div></td>
                              <td> <i style='cursor:pointer;color:red' class='fa fa-times-circle hapus-pendukung' title='$data2[name]'></i> </td>
                            </tr>";
                     
                    }

                  return $this->result2;
	}



}