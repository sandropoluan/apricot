<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class AN_ajax_admin extends CI_Controller
{


	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed :)');
		}  

		if(!$this->session->userdata("login")){
			exit("Akses Ditolak!");
		}
		
		$this->load->helper(array('filter','url','file','tambahan'));


		$this->load->library(array('Slugify','zip'));


		$this->load->model("admin/otorisasi");	

	}



	function new_kategori($par=0){
		$nilai=changequote($this->input->post('value_k'));
		$slug=$this->slugify->slugify($nilai);
		$sql=($par==0)?"INSERT INTO kategori (nama_kategori,slug_kategori) values ('$nilai','$slug')":"INSERT INTO kategori (nama_kategori,slug_kategori,id_parent) values ('$nilai','$slug','$par')";
		$query=$this->db->query($sql);
		$last=$this->db->insert_id();
		$query2=$this->db->query("select * from kategori where id_kategori='$last'");
		$row=$query2->row();
		if($row->nama_kategori==$nilai){
			echo ($par==0)?'{"level":"1","id":"'.$row->id_kategori.'","nama":"'.$row->nama_kategori.'"}':'{"id":"'.$row->id_kategori.'","nama":"'.$row->nama_kategori.'","id_parrent":"'.$row->id_parent.'","turunann":"'.changequote($this->input->post('legasi')).' PAR_'.$row->id_parent.'"}';
		}

	}

	function hapus_kategori(){
		/*
		Kenapa cuma update? gak sekalian datanya yang di hapus?   
		Ini diperlukan demi konsistensi data! ada skenario/kemungkinan buruk yang sudah	saya perhitungkan. Walaupun kecil kemungkinannya untuk terjadi, tetap saja itu nyata dan bisa terjadi.
		Untuk menekan peluang kemungkinan terjadi menjadi NOL, maka ini cara yang saya ambil.
		Saya gak bisa bilang apa skenarionya karena agak rumit untuk saya jelaskan.
		Just trust me, ini cara terbaik ;)   
		*/
		
		$id=changequote($this->input->post('id'));
		$sql=$this->db->query("UPDATE kategori SET terhapus='Y' WHERE id_kategori='$id'");
		$query=$this->db->query("SELECT * FROM kategori WHERE id_kategori='$id' AND terhapus='N'");
		$this->hapus_sub_kategori($id);
		if($query->num_rows()<1){
			echo "ok";
		}
	}

	function hapus_sub_kategori($id){
		$sql2=$this->db->query("SELECT * FROM kategori WHERE id_parent='$id'");
		if($sql2->num_rows()>0){
			foreach($sql2->result_array() as $row2){
				$this->db->query("UPDATE kategori SET terhapus='Y' WHERE id_kategori='$row2[id_kategori]'");
				$this->hapus_sub_kategori($row2['id_kategori']);
			}
		}
	}

	
	function nonaktifkan_kategori(){
		$id=changequote($this->input->post('id'));
		$sql=$this->db->query("UPDATE kategori SET aktif='N' WHERE id_kategori='$id'");
		$cek=$this->db->query("SELECT aktif FROM kategori WHERE id_kategori='$id' AND aktif='N'");
		if($cek->num_rows()>0){
			echo "ok";
		}
	}

	function aktifkan_kategori(){
		$id=changequote($this->input->post('id_a'));
		$sql=$this->db->query("UPDATE kategori SET aktif='Y' WHERE id_kategori='$id'");
		$cek=$this->db->query("SELECT aktif FROM kategori WHERE id_kategori='$id' AND aktif='Y'");
		if($cek->num_rows()>0){
			echo "ok";
		}
	}

	function ubah_kategori(){
		$id=changequote($this->input->post('id_kategori'));
		$nama=changequote($this->input->post('nama_kategori'));		
		$slug=$this->slugify->slugify($nama);
		$sql=$this->db->query("UPDATE kategori SET nama_kategori='$nama',slug_kategori='$slug' WHERE id_kategori='$id'");
		$cek=$this->db->query("SELECT aktif FROM kategori WHERE id_kategori='$id' AND nama_kategori='$nama'");
		if($cek->num_rows()>0){
			echo "ok";
		}
	}



	function cek_new_username(){
		$username=trim(changequote($this->input->post('username')));
		$query=$this->db->query("SELECT * FROM user WHERE name_user='$username' AND terhapus='N' ");
		if($query->num_rows()<1){
			echo "ok";
		} else{
			echo "terpakai";	
		} 
	}


	function avatar_new(){
		$config=array(
			"upload_path"=>FCPATH."an-component/media/upload-user-avatar/",
			"allowed_types"=>"gif|jpg|jpeg|png"
			);
		$this->load->library('upload', $config);
		 if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                       echo $error['error'];
                       echo "<br>";
                       echo base_url()."an-component/media/upload-user-avatar/";
                }
                else
                {

                	$nama=$this->upload->data('file_name');
                	$sesi_form=changequote($this->input->post('sesi'));
                	$token_foto=changequote($this->input->post('token_foto'));
                	$query=$this->db->query("INSERT into foto_user_tmp (nama_foto,token_foto,sesi_from) VALUES ('$nama','$token_foto','$sesi_form')");
                	echo 'ok';
                }

	}

	function delete_foto_temp(){
		$token_foto=changequote($this->input->post('foto_token'));
		$query=$this->db->query("SELECT * FROM foto_user_tmp WHERE token_foto='$token_foto'");
		if($query->num_rows()>0){
			$row=$query->row();
			$query2=$this->db->query("DELETE FROM foto_user_tmp WHERE token_foto='$token_foto'");
			if($query){
				unlink(FCPATH."an-component/media/upload-user-avatar/".$row->nama_foto);
			}
		}

	}

	function new_admin(){

		$username=trim(changequote($this->input->post("username")));
		$email=changequote($this->input->post("email"));
		$nama=changequote($this->input->post("nama"));
		$password=md5($this->input->post("password"));
		$admin_level=changequote($this->input->post("admin_level"));
		$sessi=changequote($this->input->post("sessi"));
		$avatar=changequote($this->input->post("avatar"));
		$level=($admin_level=="super")?"1":"0";
		$terdaftar=date("Y-m-d",now());

		$user=$this->db->query("SELECT * FROM user WHERE name_user='$username' AND terhapus='N' ");
		if($user->num_rows()>0){
			echo "taken";
		}else{
			$photo="";
			$savatar=$this->db->query("SELECT * FROM foto_user_tmp WHERE sesi_from='$sessi'");
			if($avatar=="0"){
				//echo "No avatar";
				if($savatar->num_rows()>0){
					foreach($savatar->result_array() as $row){
						$this->db->query("DELETE FROM foto_user_tmp WHERE id_foto='$row[id_foto]'");
						unlink(FCPATH."an-component/media/upload-user-avatar/".$row["nama_foto"]);
					}
				}
				$photo="default.jpg";
				} else {
					$row2=$savatar->row();
					$photo=$row2->nama_foto;
					$this->db->query("DELETE FROM foto_user_tmp WHERE sesi_from='$sessi'");

					//echo "ada avatar";
				}
			$query=$this->db->query("INSERT INTO user (name_user,nama_lengkap,email,password_user,level_user,avatar_user,terdaftar) VALUES ('$username','$nama','$email','$password','$level','$photo','$terdaftar')");
			if($query){
				echo "ok";
			}


		}

	}

	function edit_username(){
		$id=changequote($this->input->post("id"));
		$username=trim(changequote($this->input->post("username")));

		$cocok=$this->db->query("SELECT * FROM user WHERE id_user='$id' AND name_user='$username' AND terhapus='N'");
		if($cocok->num_rows()>0){
			echo "sama";
		}
		else {
			$cari=$this->db->query("SELECT * FROM user WHERE name_user='$username' AND terhapus='N'");
			if($cari->num_rows()>0){
				echo "terpakai";
			}
			else {
				$query=$this->db->query("UPDATE user SET name_user='$username' WHERE id_user='$id'");
				if($query){
					echo "ok";
				}
			}
		}
	}


	function edit_fullname(){
		$id=changequote($this->input->post("id"));
		$name=trim(changequote($this->input->post("name")));
		$query=$this->db->query("UPDATE user SET nama_lengkap='$name' WHERE id_user='$id'");
		if($query){
			echo "ok";
		}
	}

	function edit_email(){
		$id=changequote($this->input->post("id"));
		$email=trim(changequote($this->input->post("email")));
		$query=$this->db->query("UPDATE user SET email='$email' WHERE id_user='$id'");
		if($query){
			echo "ok";
		}
	}

	function edit_level(){
		$id=changequote($this->input->post("id"));
		$level=trim(changequote($this->input->post("level")));
		$query=$this->db->query("UPDATE user SET level_user='$level' WHERE id_user='$id'");
		if($query){
			echo "ok";
		}
	}

	function edit_status(){
		$id=changequote($this->input->post("id"));
		$status=trim(changequote($this->input->post("status")));
		$query=$this->db->query("UPDATE user SET status_user='$status' WHERE id_user='$id'");
		if($query){
			echo "ok";
		}
	}

	function edit_password(){
		$id=changequote($this->input->post("id"));
		$password=md5($this->input->post("password"));
		$query=$this->db->query("UPDATE user SET password_user='$password' WHERE id_user='$id'");
		if($query){
			echo "ok";
		}
	}

	function avatar_update(){
		
		$config=array(
			"upload_path"=>FCPATH."an-component/media/upload-user-avatar/",
			"allowed_types"=>"gif|jpg|jpeg|png"
			);
		$this->load->library('upload', $config);
		 if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                       echo $error['error'];
                }
                else
                {
                	$id=changequote($this->input->post('id')); //????????????
                	$nama=$this->upload->data('file_name');
                	$token_foto=changequote($this->input->post('token_foto'));
                	$query=$this->db->query("INSERT INTO foto_user_tmp (nama_foto,token_foto,id_user) VALUES ('$nama','$token_foto','$id')");
                	echo 'ok';
                }

	}


	function ganti_user_avatar(){
		$id=changequote($this->input->post("id"));
		$cari=$this->db->query("SELECT * FROM foto_user_tmp WHERE id_user='$id' ORDER BY id_foto DESC");
		if($cari->num_rows()>0){
			$cari_foto_lama=$this->db->query("SELECT * FROM user WHERE id_user='$id'");
			$_row=$cari_foto_lama->row();
			$foto_lama=$_row->avatar_user;
			if($foto_lama!="dafault.jpg"){
				unlink(FCPATH."an-component/media/upload-user-avatar/".$foto_lama);
			}
			$row=$cari->row();
			$query=$this->db->query("UPDATE user SET avatar_user='".$row->nama_foto."' WHERE id_user='$id' ");

			//Hapus SEMUA yg punya ID user sama
			$hapus=$this->db->query("DELETE FROM foto_user_tmp WHERE id_user='$id' ");
			if($hapus){
				echo "ok";
			}
		}
	}

	function delete_user(){
		$id=changequote($this->input->post("id"));
		$query=$this->db->query("UPDATE user SET terhapus='Y' WHERE id_user='$id'");
		if($query){
			echo "ok";
		}
	}


	function new_tag(){
		$id=$this->session->userdata('id_user');
		$tag=changequote($this->input->post("tag"));
		$slug=changequote($this->input->post("slug"));
		$query=$this->db->query("INSERT INTO tags (nama_tag,slug_tag,user_posting) VALUES ('$tag','$slug','$id')");
		if($query){
			echo "ok";
		}
	}

	function edit_tag(){
		$id_user=changequote($this->session->userdata('id_user'));
		$id=changequote($this->input->post("id"));
		$val=changequote($this->input->post("value"));
		$modul=changequote($this->input->post("modul"));
		$aslug=changequote($this->input->post("aSlug"));
		$exe=($modul=="nama_tag")?"nama_tag":"slug_tag";
		$exe2=($modul=="nama_tag")?",slug_tag='$aslug'":"";
		$query=$this->db->query("UPDATE tags SET $exe='$val' $exe2 ,user_update='$id_user' WHERE id_tag='$id'");
		if($query){
			echo "ok";
			//echo "id_user= $id_user <br> id=$id <br> val =$val <br> modul= $modul <br> exe= $exe";
		}

	}

	function hapus_tag(){
		$id=changequote($this->input->post("id"));
		$query=$this->db->query("DELETE FROM tags WHERE id_tag='$id' ");
		if($query){
			echo "ok";
		}
	}


	function foto_gallery_artikel(){

		$config=array(
			"upload_path"=>FCPATH."an-component/media/upload-gambar-artikel/",
			"allowed_types"=>"gif|jpg|jpeg|png"
			);
		$this->load->library('upload', $config);
		 if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                       echo $error['error'];
                }
                else
                {
                	//$id=$this->input->post('id');
                	$id=changequote($this->input->post("id"));
                	$sesi=changequote($this->input->post("sesi"));
                	$nama=$this->upload->data('file_name');
                	$token_foto=changequote($this->input->post('token_foto'));

                	if($id==0){
                	$query=$this->db->query("INSERT INTO foto_artikel_temp (nama_foto,token_foto,sesi_form,id_user) VALUES ('$nama','$token_foto','$sesi','$id')");
                	} else {
                	$query=$this->db->query("INSERT INTO foto_artikel (id_artikel,nama_foto,token_foto) VALUES ('$id','$nama','$token_foto')");
               		 }

               		$width_thumb=300;
					$cari_width=$this->db->query("SELECT width_thumb_artikel FROM informasi WHERE id='1'");               		
					if($cari_width->num_rows()>0){
						$datW=$cari_width->row();
						if($datW->width_thumb_artikel>99){
							$width_thumb=$datW->width_thumb_artikel;
						}
					}

                	$config2=array(
                		"source_image"=>$this->upload->data('full_path'),
                		"maintain_ratio"=>TRUE,
                		"new_image"=>FCPATH."an-component/media/upload-gambar-artikel-thumbs/",
                		//"create_thumb"=>TRUE,
                		"width"=>$width_thumb
                		);

                	$this->load->library('image_lib', $config2);
					$this->image_lib->resize();

                	if ( ! $this->image_lib->resize())
							{
							        echo $this->image_lib->display_errors();
							} else {
								if($id==0){
								echo "ok";
								} else {
								$search=$this->db->query("SELECT id_foto FROM foto_artikel WHERE token_foto='$token_foto' ");
								$dat=$search->row();
								$dat_id=$dat->id_foto;
								echo '{"gambar":"'.$nama.'","id":"'.$dat_id.'"}';
								}
								//echo $this->upload->data('full_path');
							}
                }
	}

	function set_featured_image(){
		$id=changequote($this->input->post("id"));
		$artikel_id=changequote($this->input->post("artikel_id"));
		$reset=$this->db->query("UPDATE foto_artikel SET featured='N' WHERE featured='Y' AND id_artikel='$artikel_id' ");
		$update=$this->db->query("UPDATE foto_artikel SET featured='Y' WHERE id_foto='$id'");
	     echo "ok";
	}


	function delete_foto_artikel_temp(){
		$token_foto=changequote($this->input->post("token"));
		$query=$this->db->query("SELECT * FROM foto_artikel_temp WHERE token_foto='$token_foto' ");
		if($query->num_rows()>0){
			$data=$query->row();
			$file=FCPATH."an-component/media/upload-gambar-artikel/".$data->nama_foto;
			$thumbnail=FCPATH."an-component/media/upload-gambar-artikel-thumbs/".$data->nama_foto;
			$query2=$this->db->query("DELETE FROM foto_artikel_temp WHERE token_foto='$token_foto' ");
			unlink($file);
			unlink($thumbnail);
		}
	}

	function submit_artikel($i=0){
		$judul=changequote($this->input->post('judul'));
		$sesi=changequote($this->input->post('sesi'));
		$id=changequote($this->input->post('id'));
		$seo=changequote($this->input->post('seo'));
		$isi=filterquote($this->input->post('isi'),"all");
		$kategori=changequote($this->input->post('kategori'));
		$tag=changequote($this->input->post('tags'));
		$headline=changequote($this->input->post('headline'));
		$editable=changequote($this->input->post('editable'));
		$meta_description=changequote($this->input->post('meta_description'));
		$meta_author=changequote($this->input->post('meta_author'));
		$meta_keyword=changequote($this->input->post('meta_keyword'));
		$og_description=changequote($this->input->post('og_description'));
		$og_title=changequote($this->input->post('og_title'));
		$og_image=changequote($this->input->post('og_image'));
		$sesi_artikel=changequote($this->input->post('sesi_artikel'));
		$aStatus=changequote($this->input->post('aStatus'));

		$tanggal_posting=date("Y:m:d H:i:s",now());
		$id_user_input=$this->session->userdata('id_user');

		if($i==0){

			$stats=($this->input->post('returnDraft')=='true')?"draft":"publish";
			$was_published=($this->input->post('returnDraft')=='true')?"N":"Y";
			$tgl_posting=($this->input->post('returnDraft')=='true')?"0000-00-00 00:00:00":$tanggal_posting;
			//id masih kosong berati baru pertama kali posting

			//cek apakah sudah pernah ada sbg draft
			$search=$this->db->query("SELECT * FROM artikel WHERE artikel_sesi_id='$sesi' ");
			if($search->num_rows()>0){
				$update="UPDATE artikel SET 
									artikel_judul='$judul',
									artikel_isi='$isi',
									artikel_kategori='$kategori',
									artikel_tags='$tag',
									artikel_sbg_headline='$headline',
									artikel_tgl_posting='$tgl_posting',
									artikel_id_user='$id_user_input',
									artikel_editable='$editable',
									artikel_seo_url='$seo',
									artikel_meta_description='$meta_description',
									artikel_meta_author='$meta_author',
									artikel_meta_keyword='$meta_keyword',
									artikel_og_image='$og_image',
									artikel_og_title='$og_title',
									artikel_og_description='$og_description',
									artikel_status='$stats',
									artikel_was_published='$was_published'
									WHERE
									artikel_sesi_id='$sesi'
							";
					$query=$this->db->query($update);
			} else {
				//belum ada di draft
				
				$ready= "INSERT INTO artikel (
									artikel_judul,
									artikel_isi,
									artikel_kategori,
									artikel_tags,
									artikel_sbg_headline,
									artikel_tgl_posting,
									artikel_id_user,
									artikel_editable,
									artikel_seo_url,
									artikel_meta_description,
									artikel_meta_author,
									artikel_meta_keyword,
									artikel_og_image,
									artikel_og_title,
									artikel_og_description,
									artikel_status,
									artikel_was_published,
									artikel_sesi_id) 
									VALUES (
									'$judul',
									'$isi',
									'$kategori',
									'$tag',
									'$headline',
									'$tgl_posting',
									'$id_user_input',
									'$editable',
									'$seo',
									'$meta_description',
									'$meta_author',
									'$meta_keyword',
									'$og_image',
									'$og_title',
									'$og_description',
									'$stats',
									'$was_published',
									'$sesi')";
		
				$query=$this->db->query($ready);

				//memindahkan gambar ke artikel


			}

			$tok=($this->input->post('returnDraft')=='true')?"artikel_sesi_id='$sesi'":"artikel_tgl_posting='$tanggal_posting'";	
				$sinc_artikel=$this->db->query("SELECT artikel_id FROM artikel WHERE $tok");
				if($sinc_artikel->num_rows()>0){
					$_id_artikel=$sinc_artikel->row();
					$_id_artikel=$_id_artikel->artikel_id;


					$foto=$this->db->query("SELECT * FROM foto_artikel_temp WHERE sesi_form='$sesi'");
					if($foto->num_rows()>0){
						foreach($foto->result_array() as $data){
							$this->db->query("INSERT INTO foto_artikel (id_artikel,nama_foto) VALUES ('$_id_artikel','$data[nama_foto]') ");
							//delete row
							$this->db->query("DELETE FROM foto_artikel_temp WHERE id_foto='$data[id_foto]'");
							
						}
					}
				}

				echo ($this->input->post('returnDraft')=='true')?"draftSaved":$_id_artikel; 			
			
		} 

		else if($i==1){
			//$status='draft';
		} 

		else if($i==2){
			//$status='publish';
		}

		else if($i==3){


		$test=$this->db->query("SELECT * FROM artikel WHERE artikel_id='$id'");
		$ddd=$test->row();

		if($this->input->post('returnDraft')=='true') {
			$status='draft';
			$add="";
			$published=($ddd->artikel_was_published=="Y")?"Y":"N";
		} else {
			$status='publish';			
			$published="Y";
			$add="";
			if($ddd->artikel_tgl_posting=='0000-00-00 00:00:00'){
					$add="artikel_tgl_posting='$tanggal_posting',";
				} 
		} 

			

		
		$update="UPDATE artikel SET 
									artikel_judul='$judul',
									artikel_isi='$isi',
									artikel_kategori='$kategori',
									artikel_tags='$tag',
									artikel_sbg_headline='$headline',
									$add
									artikel_tgl_last_edit='$tanggal_posting',
									artikel_id_user_last_edit='$id_user_input',
									artikel_editable='$editable',
									artikel_seo_url='$seo',
									artikel_meta_description='$meta_description',
									artikel_meta_author='$meta_author',
									artikel_meta_keyword='$meta_keyword',
									artikel_og_image='$og_image',
									artikel_og_title='$og_title',
									artikel_og_description='$og_description',
									artikel_status='$status',
									artikel_was_published='$published'
									WHERE
									artikel_id='$id';
							";
				$this->db->query($update);

							echo $status;

		}


		



		

	}


	function delete_artikel(){
		$id=changequote($this->input->post('id'));
		$artikel_sql=$this->db->query("DELETE FROM artikel WHERE artikel_id='$id'");
		$foto_artikel=$this->db->query("SELECT * FROM foto_artikel WHERE id_artikel='$id'");
		if($foto_artikel->num_rows()>0){
			foreach ($foto_artikel->result_array() as $row){
				//hapus file foto

				unlink(FCPATH."an-component/media/upload-gambar-artikel/".$row['nama_foto']);

				unlink(FCPATH."an-component/media/upload-gambar-artikel-thumbs/".$row['nama_foto']);

			}
			// hapus database foto
			$this->db->query("DELETE FROM foto_artikel WHERE id_artikel='$id'");
		}

		echo 'ok';
	}

	function delete_atikel_foto(){
		$id=changequote($this->input->post('id'));
		$cari_foto=$this->db->query("SELECT * FROM foto_artikel WHERE id_foto='$id'");
		if($cari_foto->num_rows()>0){
			$data=$cari_foto->row();
			//hapus file foto

				unlink(FCPATH."an-component/media/upload-gambar-artikel/".$data->nama_foto);

				unlink(FCPATH."an-component/media/upload-gambar-artikel-thumbs/".$data->nama_foto);

			//hapus  foto dari database
				$query=$this->db->query("DELETE FROM foto_artikel WHERE id_foto='$id' ");
				if($query){
					echo "sukses";
				}

			
		} else {
			//error
			echo "deleted";
		}

	}

	function delete_multi_photos(){
		$id=explode(",",changequote($this->input->post("id")));
		foreach ($id as $value) {
			$cari=$this->db->query("SELECT * FROM foto_artikel WHERE id_foto='$value'");
			if($cari->num_rows()>0){
				$data=$cari->row();

				unlink(FCPATH."an-component/media/upload-gambar-artikel/".$data->nama_foto);

				unlink(FCPATH."an-component/media/upload-gambar-artikel-thumbs/".$data->nama_foto);
				$this->db->query("DELETE FROM foto_artikel WHERE id_foto='$value'");
			}
		}

		echo "ok";

	}

	function delete_media(){
		$value=changequote($this->input->post('id'));
		$cari=$this->db->query("SELECT * FROM foto_artikel WHERE id_foto='$value'");
			if($cari->num_rows()>0){
				$data=$cari->row();

				unlink(FCPATH."an-component/media/upload-gambar-artikel/".$data->nama_foto);

				unlink(FCPATH."an-component/media/upload-gambar-artikel-thumbs/".$data->nama_foto);
				$this->db->query("DELETE FROM foto_artikel WHERE id_foto='$value'");
		}
		echo "ok";
	}


	function delete_media_pendukung(){
		$nama=$this->input->post('nama');
		unlink(FCPATH."an-component/media/upload-gambar-pendukung/".$nama);

		if(file_exists($dThumb=FCPATH."an-component/media/filemanager-thumbs/".$nama)){
		unlink($dThumb);
		}

		echo "ok";	
	}


	function upload_multiple_pendukung(){
		$config=array(
			"upload_path"=>FCPATH."an-component/media/upload-gambar-pendukung/",
			"allowed_types"=>"gif|jpg|jpeg|png"
			);
		$this->load->library('upload', $config);
		 if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                       echo $error['error'];
                }
                else
                {

                echo "ok";

                }


	}


	function upload_pop_up(){
		$config=array(
			"upload_path"=>FCPATH."an-component/media/upload-gambar-pendukung/",
			"allowed_types"=>"gif|jpg|jpeg|png"
			);
		$this->load->library('upload', $config);
		 if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                       echo $error['error'];
                }
                else
                {

                	echo $this->upload->data('file_name');
                	
                }
	}


	function simpaninformasi(){
		$nama=changequote($this->input->post("nama"));
		$deskripsi=filterquote($this->input->post("deskripsi"),"all");
		$favicon=changequote($this->input->post("favicon"));
		$logoweb=changequote($this->input->post("logoweb"));
		$disclaimer=filterquote($this->input->post("disclaimer"),"all");
		$termcondition=filterquote($this->input->post("termcondition"),"all");
		$privacy=filterquote($this->input->post("privacy"),"all");
		$metadescription=changequote($this->input->post("metadescription"));
		$metakeyword=changequote($this->input->post("metakeyword"));
		$thumbnail_sm=changequote($this->input->post("thumbnail_sm"));
		$customcss=filterquote($this->input->post("customcss"),"all");
		$featuredimage=changequote($this->input->post("featuredimage"));

		$thumb_artikel=changequote($this->input->post("thumb_art"));
		$thumb_galeri=changequote($this->input->post("thumb_gal"));
		$thumb_produk=changequote($this->input->post("thumb_pro"));

		$prefix_suffix_title=changequote($this->input->post("prefix_suffix_title"));
		$prefix_suffix_sebagai=changequote($this->input->post("prefix_suffix_sebagai"));
		$default_title=changequote($this->input->post("default_title"));

		$max_populer_artikel=changequote($this->input->post("max_populer_artikel"));
		$max_headline_artikel=changequote($this->input->post("max_headline_artikel"));
		$max_tampil_artikel=changequote($this->input->post("max_tampil_artikel"));
		$max_headline_galeri=changequote($this->input->post("max_headline_galeri"));
		$max_tampil_galeri=changequote($this->input->post("max_tampil_galeri"));
		$max_headline_produk=changequote($this->input->post("max_headline_produk"));
		$max_tampil_produk=changequote($this->input->post("max_tampil_produk"));

		$sleep_mode=changequote($this->input->post("sleep_mode"));
		$sleep_sampai=changequote($this->input->post("sleep_sampai"));


		$query=$this->db->query("UPDATE informasi SET 
				nama='$nama',
				deskripsi='$deskripsi',
				disclaimer='$disclaimer',
				webprivacy='$privacy',
				termcondition='$termcondition',
				meta_keyword='$metakeyword',
				meta_deskripsi='$metadescription',
				featured_image='$featuredimage',
				thumbnail_media='$thumbnail_sm',
				favicon='$favicon',
				logo='$logoweb',
				custom_css='$customcss',
				width_thumb_artikel='$thumb_artikel',
				width_thumb_galeri='$thumb_galeri',
				width_thumb_produk='$thumb_produk',
				default_title='$default_title',
				prefix_suffix_sebagai='$prefix_suffix_sebagai',
				prefix_suffix_title='$prefix_suffix_title',
				max_populer_artikel='$max_populer_artikel',
				max_headline_artikel='$max_headline_artikel',
				max_tampil_artikel='$max_tampil_artikel',
				max_headline_galeri='$max_headline_galeri',
				max_tampil_galeri='$max_tampil_galeri',
				max_headline_produk='$max_headline_produk',
				max_tampil_produk='$max_tampil_produk',
				sleep_sampai='$sleep_sampai',
				sleep_mode='$sleep_mode'



				 WHERE id=1
			");

		if($query){
			echo "ok";
		}
	}


	function simpanbiodata(){
		$nama=changequote($this->input->post("nama"));
		$fotobio=changequote($this->input->post("fotobio"));
		$deskripsisingkat=changequote($this->input->post("deskripsisingkat"));
		$deskripsi=filterquote($this->input->post("deskripsi"),"all");
		$link_fb=changequote($this->input->post("link-fb"));

		$query=$this->db->query("UPDATE biodata SET 
			nama='$nama',
			foto='$fotobio',
			deskripsi_singkat='$deskripsisingkat',
			deskripsi='$deskripsi',
			link_fb='$link_fb'
			WHERE id=1
			");

		if($query){
		echo "ok";
		}

	}

	function page(){
		if($this->session->userdata("level_user")==1){
			$judul=changequote($this->input->post("judul"));
			$id=changequote($this->input->post("id"));
			$isi=filterquote($this->input->post("isi_page"),"all");
			$url=changequote($this->input->post("url"));
			$image=changequote($this->input->post("image"));
			$status=changequote($this->input->post("status"));
			$keywords=changequote($this->input->post("keywords"));
			$description=changequote($this->input->post("description"));
			$js=filterquote($this->input->post("js"),"all");
			$user=changequote($this->session->userdata("id_user"));
			$time=date("Y:m:d H:i:s",now());


			if($id==0){
				// "baru";
				$query=$this->db->query("INSERT INTO pages (page_judul,page_url,page_isi,page_foto,page_javascript,page_status,page_id_user,page_created,page_meta_keywords,page_meta_description) VALUES ('$judul','$url','$isi','$image','$js','$status','$user','$time','$keywords','$description')");
				echo $this->db->insert_id();


			} else {
				// "update";
				$query=$this->db->query("UPDATE pages SET 
					page_judul='$judul',
					page_url='$url',
					page_isi='$isi',
					page_foto='$image',
					page_javascript='$js',
					page_status='$status',
					page_id_edit='$user',
					page_edited='$time',
					page_meta_keywords='$keywords',
					page_meta_description='$description'
					WHERE page_id='$id'
				 ");

				echo "ok";
			}

		}
	}


	function save_galeri(){
		$id=changequote($this->input->post("id"));
		$nama=changequote($this->input->post("nama"));
		$seo=changequote($this->input->post("seo"));
		$deskripsi=filterquote($this->input->post("deskripsi"),"all");
		$featured=changequote($this->input->post("featured"));
		$status=changequote($this->input->post("status"));
		$meta_keyword=changequote($this->input->post("meta_keyword"));
		$meta_description=changequote($this->input->post("meta_description"));
		$og_image=changequote($this->input->post("og_image"));
		$og_description=changequote($this->input->post("og_description"));
		$sesi=changequote($this->input->post("sesi"));
		$kategori=changequote($this->input->post("kategori"));
		$user=$this->session->userdata("id_user");
		$time=date("Y:m:d H:i:s",now());


		if($id==0){

			$query=$this->db->query("INSERT INTO galeri (galeri_nama,galeri_deskripsi,galeri_feature_img,galeri_url,galeri_meta_keyword,galeri_meta_deskripsi,galeri_og_image,galeri_og_deskripsi,galeri_date,galeri_user,galeri_status,kategori_id) VALUES ('$nama','$deskripsi','$featured','$seo','$meta_keyword','$meta_description','$og_image','$og_description','$time','$user','$status',$kategori)");
			$new_id=$this->db->insert_id();

			$foto=$this->db->query("SELECT * FROM foto_galeri_temp WHERE sesi_form='$sesi' ORDER BY id_foto");
			if($foto->num_rows()>0){
				foreach($foto->result_array() AS $data){
					$this->db->query("INSERT INTO foto_galeri (id_galeri,nama_foto) VALUES ('$new_id','$data[nama_foto]')");
				}
				$this->db->query("DELETE FROM foto_galeri_temp WHERE sesi_form='$sesi'");
				}

			echo $new_id;

		} else if($id>0){

			$query=$this->db->query("UPDATE galeri SET 
				galeri_nama='$nama',
				galeri_deskripsi='$deskripsi',
				galeri_feature_img='$featured',
				galeri_url='$seo',
				galeri_meta_keyword='$meta_keyword',
				galeri_meta_deskripsi='$meta_description',
				galeri_og_image='$og_image',
				galeri_og_deskripsi='$og_description',
				galeri_date_edit='$time',
				galeri_user_edit='$user',
				galeri_status='$status',
				kategori_id='$kategori'
				WHERE galeri_id='$id'
				");

			echo "ok";
		}
	}



	function foto_galeri(){

		$config=array(
			"upload_path"=>FCPATH."an-component/media/upload-galeri/",
			"allowed_types"=>"gif|jpg|jpeg|png"
			);
		$this->load->library('upload', $config);
		 if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                       echo $error['error'];
                }
                else
                {
 
                	$id=changequote($this->input->post("id"));
                	$sesi=changequote($this->input->post("sesi"));
                	$nama=$this->upload->data('file_name');
                	$token_foto=changequote($this->input->post('token_foto'));

                	if($id==0){
                	$query=$this->db->query("INSERT INTO foto_galeri_temp (nama_foto,token_foto,sesi_form) VALUES ('$nama','$token_foto','$sesi')");
                	} else {
                	$query=$this->db->query("INSERT INTO foto_galeri (id_galeri,nama_foto,token_foto) VALUES ('$id','$nama','$token_foto')");
               		 }


               		$width_thumb=300;
					$cari_width=$this->db->query("SELECT width_thumb_galeri FROM informasi WHERE id='1'");               		
					if($cari_width->num_rows()>0){
						$datW=$cari_width->row();
						if($datW->width_thumb_galeri>99){
							$width_thumb=$datW->width_thumb_galeri;
						}
					}

                	$config2=array(
                		"source_image"=>$this->upload->data('full_path'),
                		"maintain_ratio"=>TRUE,
                		"new_image"=>FCPATH."an-component/media/upload-galeri-thumbs/",
                		"width"=>$width_thumb
                		);

                	$this->load->library('image_lib', $config2);
					$this->image_lib->resize();

                	if ( ! $this->image_lib->resize())
							{
							        echo $this->image_lib->display_errors();
							} else {
								if($id==0){
								echo "ok";
								} else {
								$search=$this->db->query("SELECT * FROM foto_galeri WHERE token_foto='$token_foto' ");
								$dat=$search->row();
								$dat_id=$dat->id_foto;
								echo '{"gambar":"'.$nama.'","id":"'.$dat_id.'","deskripsi":"'.$dat->deskripsi_foto.'"}';
								}
							}
                }
	}


	function delete_foto_galeri_temp(){
		$token_foto=changequote($this->input->post("token"));
		$query=$this->db->query("SELECT * FROM foto_galeri_temp WHERE token_foto='$token_foto' ");
		if($query->num_rows()>0){
			$data=$query->row();
			$file=FCPATH."an-component/media/upload-galeri/".$data->nama_foto;
			$thumbnail=FCPATH."an-component/media/upload-galeri-thumbs/".$data->nama_foto;
			$query2=$this->db->query("DELETE FROM foto_galeri_temp WHERE token_foto='$token_foto' ");
			unlink($file);
			unlink($thumbnail);
		}
	}

	function delete_foto_galeri(){
		$id=changequote($this->input->post("id"));
		$search=$this->db->query("SELECT * FROM foto_galeri WHERE id_foto='$id'");
		if($search->num_rows()>0){
			$data=$search->row();
			$file=FCPATH."an-component/media/upload-galeri/".$data->nama_foto;
			$thumbnail=FCPATH."an-component/media/upload-galeri-thumbs/".$data->nama_foto;
			$query2=$this->db->query("DELETE FROM foto_galeri WHERE id_foto='$id' ");
			unlink($file);
			unlink($thumbnail);
		}
		echo "ok";
	}


	function edit_deskripsi_galeri(){
		$id=changequote($this->input->post("id"));
		$deskripsi=changequote($this->input->post("deskripsi"));
		$query=$this->db->query("UPDATE foto_galeri SET deskripsi_foto='$deskripsi' WHERE id_foto='$id' ");
		echo "ok";


	}


	function delete_galeri(){
		$id=changequote($this->input->post("id"));
		$search=$this->db->query("SELECT * FROM galeri WHERE galeri_id='$id' ");
		if($search->num_rows()>0){

			$this->db->query("DELETE FROM galeri WHERE galeri_id='$id'");

			$foto=$this->db->query("SELECT * FROM foto_galeri WHERE id_galeri='$id'");

			foreach ($foto->result_array() as  $value) {

				$file=FCPATH."an-component/media/upload-galeri/".$value['nama_foto'];
				$thumbnail=FCPATH."an-component/media/upload-galeri-thumbs/".$value['nama_foto'];

				unlink($file);
				unlink($thumbnail);

			}

			$query=$this->db->query("DELETE FROM foto_galeri WHERE id_galeri='$id'");
		}

		echo "ok";
	}


	function delete_page(){
		if($this->session->userdata("level_user")==1){
			$id=changequote($this->input->post("id"));
			$query=$this->db->query("DELETE FROM pages WHERE page_id='$id'");
			echo "ok";
		}
	}



	function cek_code_menu(){
		
		$code=changequote($this->input->post("code"));
		$query=$this->db->query("SELECT * FROM menu WHERE menu_code='$code'");
		if($query->num_rows()>0){
			echo "taken";
		} else {
			echo "ok";
		}

	}



	function menu_baru(){
		$nama=changequote($this->input->post("nama"));
		$code=changequote($this->input->post("code"));
		$time=date("Y:m:d H:i:s",now());
	
		 if($this->db->query("INSERT INTO menu (menu_code,menu_nama,menu_created) VALUES ('$code','$nama','$time')"))
		 {

		 	echo $this->db->insert_id();

		 } else{
		 	echo $this->db->error();
		 }



	}

	function insert_new_menu(){
		$id=changequote($this->input->post("id"));
		$nama=changequote($this->input->post("nama"));
		$url=changequote($this->input->post("url"));
		$code=changequote($this->input->post("code"));
		$target=changequote($this->input->post("target"));
		$posisi=changequote($this->input->post("posisi"));

		if($this->db->query("INSERT INTO menu_child (menu_id,menu_child_nama,menu_child_url,menu_child_target,menu_child_code,posisi) VALUES ('$id','$nama','$url','$target','$code','$posisi')")){

		echo json_encode(array("id"=>$this->db->insert_id(),"nama"=>$nama,"url"=>$url,"target"=>$target,"code"=>$code));

		} else {
			echo $this->db->error();
		}
		
	}


	function insert_new_sub_menu(){
		$id=changequote($this->input->post("id"));
		$nama=changequote($this->input->post("nama"));
		$url=changequote($this->input->post("url"));
		$target=changequote($this->input->post("target"));
		$posisi=changequote($this->input->post("posisi"));
		$parent=changequote($this->input->post("parent"));

		if($this->db->query("INSERT INTO menu_child (menu_id,menu_child_nama,menu_child_url,menu_child_target,menu_child_parent,posisi) VALUES ('$parent','$nama','$url','$target','$id','$posisi')")){

		echo json_encode(array("id"=>$this->db->insert_id(),"nama"=>$nama,"url"=>$url,"target"=>$target,"code"=>""));

		} else {
			echo $this->db->error();
		}



	}



	public $collect_menu_child=array();

	function delete_menu_child(){

		$menu_id=changequote($this->input->post("menu"));
		$id=changequote($this->input->post("id"));

		$query=$this->db->query("SELECT * FROM menu_child WHERE menu_id='$menu_id' AND menu_child_id='$id'  ");

		if($query->num_rows()>0){
			$row=$query->row();
			$this->collect_menu_child[]=$row->menu_child_id;

			$this->rec_delete_menu_child($menu_id,$row->menu_child_id);


			$this->db->where_in("menu_child_id",$this->collect_menu_child);
			$this->db->delete("menu_child");

			echo "ok";

		} else {
			echo "Menu yang ingin dihapus sudah tidak ada (sudah terhapus)";
		}



	}

	function rec_delete_menu_child($menu,$parent){
		$query2=$this->db->query("SELECT menu_child_id FROM menu_child WHERE menu_id='$menu' AND menu_child_parent='$parent'");
		if($query2->num_rows()>0){

			foreach ($query2->result_array() AS $data){

				$this->collect_menu_child[]=$data['menu_child_id'];
				$this->rec_delete_menu_child($menu,$data['menu_child_id']);
			}

		} else {
			//return;
		}

	}



	function atur_menu(){
		$id=changequote($this->input->post("id"));
		$data=$this->input->post("data");
		$urutan=$this->input->post("urutan");

		
		foreach ($data as $key => $value) {
			$posisi=$urutan[$key];
			$this->db->query("UPDATE menu_child SET menu_child_parent='$value',aktif='Y',posisi='$posisi' WHERE menu_child_id='$key' AND menu_id='$id'");
		}



		echo "ok";
	}


	function update_menu(){

		$id=changequote($this->input->post("id"));
		$nama=changequote($this->input->post("nama"));
		$url=changequote($this->input->post("url"));
		$target=changequote($this->input->post("target"));
		$parent=changequote($this->input->post("parent_id"));

		if($this->db->query("UPDATE menu_child SET menu_child_nama='$nama',menu_child_url='$url',menu_child_target='$target' WHERE menu_id='$parent' AND menu_child_id='$id' ")){

			echo "ok";

		} else {
			echo $this->db->error();
		}

	}



	function hapus_group_menu(){

		$id=changequote($this->input->post("id"));
		//delete main menu
		$data=$this->db->query("SELECT menu_code FROM menu WHERE menu_id='$id'");
		if($data->num_rows()>0){
			$q=$data->row();
			if($q->menu_code=='vertical' OR $q->menu_code=='horizontal'){
				echo "ini adalah menu default. Tidak dapat dihapus! <br>";
				echo "Code menu: ".$q->menu_code;
			} else {
				
				//delete main menu
				$this->db->query("DELETE FROM menu WHERE menu_id='$id' ");
				$this->db->query("DELETE FROM menu_child WHERE menu_id='$id' ");

				echo "ok";

			}
		} else {
			echo "data yang akan dihapus sudah tidak ada di database.";
		}

	}


	function new_kategori_galeri(){
		$nama=changequote($this->input->post("nama"));
		$slug=$this->slugify->slugify($nama);
		$this->db->query("INSERT INTO kategori_galeri (nama_kategori,slug_kategori) VALUES ('$nama','$slug')");
		echo json_encode(array("id"=>$this->db->insert_id(),"nama"=>$nama));
	}


	function edit_kategori_galeri($modul){
		if($this->session->userdata('level_user')==1){
			$id=changequote($this->input->post("id"));

			if($modul=="nama"){
				$nama=trim(changequote($this->input->post("nama")));
				$slug=$this->slugify->slugify($nama);

				if($nama=="[error]"){
					echo "fail";
				} else {

					$query=$this->db->query("UPDATE kategori_galeri SET nama_kategori='$nama', slug_kategori='$slug' WHERE id='$id'");

					echo "ok";
				}
			} else if($modul=="hapus"){
				$this->db->query("UPDATE kategori_galeri SET terhapus='Y' WHERE id='$id'");
				echo "ok";
			} else if ($modul=='disable'){

				$this->db->query("UPDATE kategori_galeri SET aktif='N'  WHERE id='$id'");
				echo "ok";

			} else if ($modul=='enable'){
				$this->db->query("UPDATE kategori_galeri SET aktif='Y'  WHERE id='$id'");
				echo "ok";
			} 

		}
	}


 	function new_kategori_produk(){
 		$nama=changequote($this->input->post("nama"));
 		$parent=changequote($this->input->post("parent"));
 		$slug=$this->slugify->slugify($nama);

 		$aktif="Y";
 		if($parent>0){
 			$query=$this->db->query("SELECT * FROM kategori_produk WHERE id='$parent' AND aktif='Y'");
 			if($query->num_rows()<1){
 				$aktif='N';
 			}
 		}


 		$this->db->query("INSERT INTO kategori_produk (nama_kategori,slug_kategori,parent_kategori,aktif) VALUES ('$nama','$slug','$parent','$aktif')");



 		echo json_encode(array("id"=>$this->db->insert_id(),"nama"=>$nama,"parent"=>$parent,"aktif"=>$aktif));

	}

	function update_kategori_produk(){
 		$id=changequote($this->input->post("id"));
 		$nama=changequote($this->input->post("nama"));	
 		$slug=$this->slugify->slugify($this->input->post("nama"));
 		$this->db->query("UPDATE kategori_produk SET nama_kategori='$nama', slug_kategori='$slug' WHERE id='$id'");
 		echo json_encode(array("nama"=>$nama));
	}



	protected $child_kategori_produk=array();

	function aktif_kategori_produk(){
		$modul=changequote($this->input->post("modul"));
		$id=changequote($this->input->post("id"));
		$query=$this->db->query("SELECT * FROM kategori_produk WHERE id='$id'");
		$context=changequote($this->input->post("context"));

		if($query->num_rows()>0){

			$data=$query->row();

			$cek=true;

			if($context=="update"){
			$query2=$this->db->query("SELECT * FROM kategori_produk WHERE id='".$data->parent_kategori."' AND aktif='Y'");
				if($query2->num_rows()>0 OR $data->parent_kategori=='0'){
					$cek=true;
				} else {
					$cek=false;
				}
			}
			if($cek==true){
			$this->child_kategori_produk[]=$data->id;
			$this->cari_child_kategori_p($id);
			}
		}

		if($context=="update"){
			$aksi=$modul=="disable"?"N":"Y";
			foreach ($this->child_kategori_produk as $v) {
					$this->db->query("UPDATE kategori_produk SET aktif='$aksi' WHERE id='$v'");
			}

			echo json_encode($this->child_kategori_produk);

		} else if ($context=="delete") {
			foreach ($this->child_kategori_produk as $v) {
					$this->db->query("UPDATE kategori_produk SET terhapus='Y' WHERE id='$v'");
			}
			echo json_encode($this->child_kategori_produk);
		}
	}

	protected function cari_child_kategori_p($id){
		$query=$this->db->query("SELECT * FROM kategori_produk WHERE parent_kategori='$id'");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $value) {
			 $this->child_kategori_produk[]=$value['id'];
			 $this->cari_child_kategori_p($value['id']);
			}
		} else {
			return;
		}
	}


	function new_banner_depan(){

		$data= array(
		"gambar"=>changequote($this->input->post("gambar")),
		"header"=>changequote($this->input->post("header")),
		"caption"=>changequote($this->input->post("caption")),
		"link_href"=>changequote($this->input->post("link")),
		"link_text"=>changequote($this->input->post("text")),
		);

		$this->db->insert("banner_depan",$data);

		echo json_encode(array_merge($data,array("id"=>$this->db->insert_id())));

	}


	function update_banner_depan(){
		$id=changequote($this->input->post("id"));
		$value=changequote($this->input->post("nilai"));
		$modul=changequote($this->input->post("modul"));

		$data= array();

		if($modul=="banner-header-field"){
			$data["header"]=$value;
		} else if($modul=="banner-caption-field"){
			$data["caption"]=$value;			
		} else if($modul=="banner-link-field"){
			$data["link_href"]=$value;	
		} else if($modul=="banner-link-text-field"){
			$data["link_text"]=$value;
		} else if($modul=="banner-gambar-field"){
			$data["gambar"]=$value;
		}


		$this->db->where("id",$id);
		$this->db->update("banner_depan",$data);

		$data["id"]=$id;
		$data["val"]=$value;

		echo json_encode($data);


	}

	function delete_banner_depan(){

		$id=changequote($this->input->post("id"));
		$this->db->where("id",$id);
		$this->db->delete("banner_depan");
		echo "{}";
	}



	function news_ticker(){

		$data=array("berita"=>changequote($this->input->post('berita')),
					"link"=>changequote($this->input->post('link')),
					"tanggal_posting"=>date("Y:m:d H:i:s",now())
			);

		$this->db->insert('news_ticker',$data);
		$data['id']=$this->db->insert_id();

		echo json_encode($data);

	}

	function update_news_ticker(){
		$modul=$this->input->post('modul');
		$id=changequote($this->input->post('id'));
		$value=changequote($this->input->post('nilai'));

	if($modul=='berita'){
		$this->db->where("id",$id);
		$this->db->update('news_ticker',array('berita'=>$value));
	} else if($modul=='link') {
		$this->db->where("id",$id);
		$this->db->update('news_ticker',array('link'=>$value));		
	}

	echo json_encode(array('id'=>$id,'value'=>$value));	

	}


	function delete_news_ticker(){

		$id=$this->input->post('id');

		$this->db->where('id',$id);
		$this->db->delete('news_ticker');
		echo "{}";
	}


	function pihak_ketiga(){
		$this->db->where('id',1);
		$this->db->update('pihak_ketiga',$this->input->post());

		echo "ok";
	}


	function baca_inbox(){
		$id=$this->input->post("id");
		$query=$this->db->get_where("kontak_masuk",array("id"=>$id));

		$data=$query->row_array();

		$this->db->where("id",$id);
		$this->db->update("kontak_masuk",array("dibaca"=>"Y"));

		$tgl=$data["tanggal"];
		$data["tanggal"]=date("F jS, Y",strtotime($tgl));
		$data["pesan"]=nl2br($data["pesan"]);

		echo json_encode($data);


	}

	function hapus_pesan(){
		$id=$this->input->post("id");
		$this->db->delete("kontak_masuk",array("id"=>$id));
		echo "{}";
	}


	function distribusi_tema(){

		
		$id_tema=$this->input->post("tema");
		$versi=$this->input->post("versi");
		$author=$this->input->post("author");
		$gmb=$this->input->post("gambar");
		$web=$this->input->post("web");

		$tema=$this->db->get_where("tema",array("id"=>$id_tema));

		$tema=$tema->row();

		$dir=FCPATH."distribusi_tema/temporary/".$tema->nama_tema;

		//buat directory pada temporary directory
		if(!file_exists($dir)){
			mkdir($dir);
		} else {
			delete_files($dir,true);
		}

		//buat direktory assets dan views
		mkdir($assets=$dir."/assets");
		mkdir($views=$dir."/views");

		//buat file index di folder assets
		$index=fopen("$assets/index.php","w");
		fclose($index);

		//sumber untuk dicopy
		$srcAssets=FCPATH."/an-theme/".$tema->nama_tema."/assets";
		$srcViews=APPPATH."/views/".$tema->nama_tema;

		//taru gambar
		$config['upload_path'] = $dir;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = 'screenshot';

		$this->load->library('upload', $config);
		$this->upload->do_upload('userfile');

		//mkdir($srcAssets);
		//lakukan pencopyan
		recurse_copy($srcAssets,$assets);
		recurse_copy($srcViews,$views);

		//buat file json
		$fileJson=fopen("$dir/tema.json", "w");
		//taru data didalam file
		$arrayJson=array(
			"nama"=>$tema->nama_tema,
			"versi"=>"$versi",
			"screenshot"=>$this->upload->data('file_name'),
			"author"=>$author,
			"web"=>$web
			);
		$input=file_put_contents("$dir/tema.json",json_encode($arrayJson));

		fclose($fileJson);

		$this->zip->read_dir($dir,false);
		$this->zip->archive($dir.".zip");

		//pindahkan zip file
		rename($dir.".zip",FCPATH."distribusi_tema/".$tema->nama_tema.".zip");
		//hapus temporary
		delete_files($dir,true);
		rmdir($dir);
		


		echo json_encode(array("tema"=>$id_tema,"versi"=>$versi,"gambar"=>$gmb,"link"=>base_url("distribusi_tema/".$tema->nama_tema.".zip")));
	


	}


	function tema_baru(){
		$nama=trim($this->input->post("nama"));
		if(strlen($nama)<7){

		echo json_encode(array("status"=>"error","pesan"=>"Karakter kurang! Minimal 7 huruf"));

		} else {

			$cari=$this->db->get_where("tema",array("nama_tema"=>$nama));
			if($cari->num_rows()>0){
				echo json_encode(array("status"=>"error","pesan"=>"Nama ini sudah digunakan"));
			} else {

				$viewsPHP= array(
					"about_us",
					"artikel_per_kategori",
					"artikel_per_tag",
					"detail_artikel",
					"disclaimer",
					"footer",
					"header",
					"home",
					"page",
					"privacy",
					"semua_artikel",
					"syarat_ketentuan",
					"detail_galeri",
					"semua_galeri",
					"galeri_per_kategori",
					"search_artikel"
					);


			$dirView=APPPATH."views/".$nama;
			if(!file_exists($dirView)){
				mkdir($dirView);
			} else {
				delete_files($dirView,true);
			}

			foreach ($viewsPHP as $view) {
				$file=fopen($dirView."/".$view.".php","w");
				fclose($file);
			}



			$dirAssets=FCPATH."an-theme/".$nama;
			if(!file_exists($dirAssets)){
				mkdir($dirAssets);
			} else {
				delete_files($dirAssets,true);
			}
			mkdir($dirAssets."/"."assets");
			copy(FCPATH."distribusi_tema/factory/screenshot.jpg",$dirAssets."/"."screenshot.jpg");

			$this->db->insert("tema",array("nama_tema"=>$nama,"versi"=>"1.0","aktif"=>"N","screenshot"=>"screenshot.jpg"));

			echo json_encode(array("status"=>"success","pesan"=>"<strong>Workspace Tema anda telah berhasil dibuat!</strong><br> Silahkan masukan file CSS, Js, dan asset asset lainnya didalam folder <em>'an-theme/$nama/assets/'</em><br> Dan silahkan edit tema anda didalam folder <em>'application/views/$nama/'</em>"));



			}

		}


	}


	function aktifkan_tema(){
		$id=$this->input->post("id");

		$tema=$this->db->get_where("tema",array("id"=>$id));
		if ($tema->num_rows()>0){
			$data=$tema->row();
			$nama=$data->nama_tema;

			//folder assets
			$assets=FCPATH."an-theme/".$nama."/assets";

			//folder views
			$views=APPPATH."views/".$nama;

			if(file_exists($assets) && file_exists($views)){

				$this->db->set("aktif","N");
				$this->db->where("aktif","Y");
				$this->db->update("tema");

				$this->db->set("aktif","Y");
				$this->db->where("id",$id);
				$this->db->update("tema");

				echo json_encode(array("status"=>"success"));

			} else {

			echo json_encode(array("status"=>"error","pesan"=>"Tema Korup. Direktori tema tidak ditemuka"));

			}

		} else {
			echo json_encode(array("status"=>"error","pesan"=>"Tema tidak ada didatabase"));
		}

	}


	function hapus_tema(){
		$id=$this->input->post("id");

		$tema=$this->db->get_where("tema",array("id"=>$id));

		if($tema->num_rows()>0){

			$data=$tema->row();
			$nama=$data->nama_tema;

			//folder assets
			$assets=FCPATH."an-theme/".$nama;

			//folder views
			$views=APPPATH."views/".$nama;

			if(file_exists($assets)){
				delete_files($assets,true);
				rmdir($assets);
			}	

			if(file_exists($views)){
				delete_files($views,true);
				rmdir($views);
			}

			$this->db->where("id",$id);
			$this->db->delete("tema");

			echo json_encode(array("status"=>"success","pesan"=>"Berhasil Menghapus tema"));


		} else {
			echo json_encode(array("status"=>"error","pesan"=>"Tema tidak ada didatabase"));

		}
	}


	function upload_tema_baru(){


		$dir= FCPATH."upload-tema";
		$config['upload_path'] = $dir;
		$config['allowed_types'] = 'zip';

		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('userfile')){
			echo json_encode(array("status"=>"error","pesan"=>$this->upload->display_errors()));
		} else {

		$nama_file=$this->upload->data('file_name');


			$zip_file=$dir."/".$nama_file;


			$nama_folder=$this->upload->data('raw_name');

			$folder_file=$dir."/".$nama_folder;

			$zip= new ZipArchive;
			$buka= $zip->open($zip_file);
			 if ($buka === TRUE){
			 	//extract file
			 	$zip->extractTo($dir);
			 	$zip->close();

			 	//cek apakah berhasil terekstract
			 	if (file_exists($folder_file)){
			 		//hapus file
			 		if(file_exists($zip_file)){
			 		unlink($zip_file);			 			
			 		}

			 		$json_file=$folder_file."/"."tema.json";

			 		if(file_exists($json_file)){
			 			$grab_json=file_get_contents($json_file);
			 			$info_tema= json_decode($grab_json,true);

			 			$cari=$this->db->get_where("tema",array("nama_tema"=>$info_tema['nama']));
			 			if($cari->num_rows()>0){
						 	//hapus folder
						 	delete_files($folder_file,true);
						 	rmdir($folder_file);
							echo json_encode(array("status"=>"error","pesan"=>"Tema dengan nama yang sama telah ditemukan masih terinstal. Uninstal dulu tema sebelumnya"));
			 				exit;
			 			}

			 	$assets_path=FCPATH."an-theme/".$nama_folder."/assets"; //assets
			 	$views_path=APPPATH."views/".$nama_folder; //views

			 	//buat path view dan aseets
			 	mkdir(FCPATH."an-theme/".$nama_folder);
			 	mkdir($assets_path);
			 	mkdir($views_path);

			 	//copy assets dan views
			 	recurse_copy($folder_file."/assets",$assets_path);
			 	recurse_copy($folder_file."/views",$views_path);

			 	//pindahkan screenshot
			 	rename($folder_file."/".$info_tema['screenshot'], FCPATH."an-theme/".$nama_folder."/".$info_tema['screenshot']);

			 	//hapus folder
			 	delete_files($folder_file,true);
			 	rmdir($folder_file);

			 	//maasukan ke database
			 	$this->db->insert("tema",array("nama_tema"=>$info_tema['nama'],"versi"=>$info_tema['versi'],"aktif"=>"N","author"=>$info_tema['author'],"web"=>$info_tema['web'],"screenshot"=>$info_tema['screenshot']));

			echo json_encode(array("status"=>"success","pesan"=>"Tema Terinstal"));

			 		} else {

			 delete_files(FCPATH."upload-tema",true);
			echo json_encode(array("status"=>"error","pesan"=>"File json tidak ditemukan"));

			 		}


			 	} else {

			 delete_files(FCPATH."upload-tema",true);
			echo json_encode(array("status"=>"error","pesan"=>"Gagal terekstract"));

			 	}

			//echo json_encode(array("status"=>"success","pesan"=>"$nama_file"));

			 } else {

			echo json_encode(array("status"=>"error","pesan"=>"File tidak bisa dibuka"));

			 }

			//echo json_encode(array("status"=>"error","pesan"=>$nama_file));

		}


	}

	function sesi(){
		echo $this->session->userdata('level_user');
	}


}