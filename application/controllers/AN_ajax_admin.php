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
		$nilai=($this->input->post('value_k'));
		$slug=$this->slugify->slugify($nilai);

		if($par==0){
			$query=$this->db->insert("kategori",array('nama_kategori'=>$nilai,'slug_kategori'=>$slug));
		} else {
			$query=$this->db->insert("kategori",array('nama_kategori'=>$nilai,'slug_kategori'=>$slug,'id_parent'=>$par));
		}
		$last=$this->db->insert_id();
		$query2=$this->db->get_where('kategori',array('id_kategori'=>$last));
		$row=$query2->row();
		if($row->nama_kategori==$nilai){
			echo ($par==0)?'{"level":"1","id":"'.$row->id_kategori.'","nama":"'.$row->nama_kategori.'"}':'{"id":"'.$row->id_kategori.'","nama":"'.$row->nama_kategori.'","id_parrent":"'.$row->id_parent.'","turunann":"'.($this->input->post('legasi')).' PAR_'.$row->id_parent.'"}';
		}

		@hapus_cache('one_level_category_article');

	}

	function hapus_kategori(){

		$id=($this->input->post('id'));
		//$sql=$this->db->query("UPDATE kategori SET terhapus='Y' WHERE id_kategori='$id'");
		$sql=$this->db->where(array('id_kategori'=>$id))->update('kategori',array('terhapus'=>'Y'));

		//$query=$this->db->query("SELECT * FROM kategori WHERE id_kategori='$id' AND terhapus='N'");
		$query=$this->db->get_where('kategori',array('id_kategori'=>$id,'terhapus'=>'N'));
		$this->hapus_sub_kategori($id);
		@hapus_cache('one_level_category_article');
		if($query->num_rows()<1){
			echo "ok";
		}
	}

	function hapus_sub_kategori($id){
		@hapus_cache('one_level_category_article');
		//$sql2=$this->db->query("SELECT * FROM kategori WHERE id_parent='$id'");
		$sql2=$this->db->get_where('kategori',array('id_parent'=>$id));
		if($sql2->num_rows()>0){
			foreach($sql2->result_array() as $row2){
				//$this->db->query("UPDATE kategori SET terhapus='Y' WHERE id_kategori='$row2[id_kategori]'");
				$this->db->where(array('id_kategori'=>$row2['id_kategori']))->update('kategori',array('terhapus'=>'Y'));
				$this->hapus_sub_kategori($row2['id_kategori']);
			}
		}
	}

	
	function nonaktifkan_kategori(){
		@hapus_cache('one_level_category_article');
		$id=($this->input->post('id'));
		//$sql=$this->db->query("UPDATE kategori SET aktif='N' WHERE id_kategori='$id'");
		$sql=$this->db->where(array('id_kategori'=>$id))->update('kategori',array('aktif'=>'N'));

		echo "ok";

	}

	function aktifkan_kategori(){
		@hapus_cache('one_level_category_article');
		$id=($this->input->post('id_a'));
		//$sql=$this->db->query("UPDATE kategori SET aktif='Y' WHERE id_kategori='$id'");
		$sql=$this->db->where(array('id_kategori'=>$id))->update('kategori',array('aktif'=>'Y'));
		echo "ok";

	}

	function ubah_kategori(){
		@hapus_cache('one_level_category_article');
		$id=($this->input->post('id_kategori'));
		$nama=($this->input->post('nama_kategori'));		
		$slug=$this->slugify->slugify($nama);
		//$sql=$this->db->query("UPDATE kategori SET nama_kategori='$nama',slug_kategori='$slug' WHERE id_kategori='$id'");
		$sql=$this->db->where(array('id_kategori'=>$id))->update('kategori',array('nama_kategori'=>$nama,'slug_kategori'=>$slug));

		echo "ok";

	}



	function cek_new_username(){
		$username=trim(($this->input->post('username')));
		//$query=$this->db->query("SELECT * FROM user WHERE name_user='$username' AND terhapus='N' ");
		$query=$this->db->get_where('user',array('name_user'=>$username,'terhapus'=>'N'));
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
                	$sesi_form=($this->input->post('sesi'));
                	$token_foto=($this->input->post('token_foto'));
                	//$query=$this->db->query("INSERT into foto_user_tmp (nama_foto,token_foto,sesi_from) VALUES ('$nama','$token_foto','$sesi_form')");
                	$query=$this->db->insert('foto_user_tmp',array('nama_foto'=>$nama,'token_foto'=>$token_foto,'sesi_from'=>$sesi_form));
                	echo 'ok';
                }

	}

	function delete_foto_temp(){
		$token_foto=($this->input->post('foto_token'));
		//$query=$this->db->query("SELECT * FROM foto_user_tmp WHERE token_foto='$token_foto'");
		$query=$this->db->get_where('foto_user_tmp',array('token_foto'=>$token_foto));
		if($query->num_rows()>0){
			$row=$query->row();
			//$query2=$this->db->query("DELETE FROM foto_user_tmp WHERE token_foto='$token_foto'");
			$query2=$this->db->where(array('token_foto'=>$token_foto))->delete('foto_user_tmp');
			if($query){
				unlink(FCPATH."an-component/media/upload-user-avatar/".$row->nama_foto);
			}
		}

	}

	function new_admin(){

		$username=trim(($this->input->post("username")));
		$email=($this->input->post("email"));
		$nama=($this->input->post("nama"));
		$password=apricot_password(sha1(md5($this->input->post("password"))));
		$admin_level=($this->input->post("admin_level"));
		$sessi=($this->input->post("sessi"));
		$avatar=($this->input->post("avatar"));
		$level=($admin_level=="super")?"1":"0";
		$terdaftar=date("Y-m-d",now());

		//$user=$this->db->query("SELECT * FROM user WHERE name_user='$username' AND terhapus='N' ");
		$user=$this->db->get_where('user',array('name_user'=>$username,'terhapus'=>'N'));

		if($user->num_rows()>0){
			echo "taken";
		}else{
			$photo="";
			//$savatar=$this->db->query("SELECT * FROM foto_user_tmp WHERE sesi_from='$sessi'");
			$savatar=$this->db->get_where('foto_user_tmp',array('sesi_from'=>$sessi));
			if($avatar=="0"){
				if($savatar->num_rows()>0){
					foreach($savatar->result_array() as $row){
						//$this->db->query("DELETE FROM foto_user_tmp WHERE id_foto='$row[id_foto]'");
						$this->db->where(array('id_foto'=>$row['id_foto']))->delete('foto_user_tmp');
						unlink(FCPATH."an-component/media/upload-user-avatar/".$row["nama_foto"]);
					}
				}
				$photo="default.jpg";
				} else {
					$row2=$savatar->row();
					$photo=$row2->nama_foto;
					//$this->db->query("DELETE FROM foto_user_tmp WHERE sesi_from='$sessi'");
					$savatar=$this->db->delete('foto_user_tmp',array('sesi_from'=>$sessi));

				}
			//$query=$this->db->query("INSERT INTO user (name_user,nama_lengkap,email,password_user,level_user,avatar_user,terdaftar) VALUES ('$username','$nama','$email','$password','$level','$photo','$terdaftar')");
			$query=$this->db->insert('user',array('name_user'=>$username,
									 'nama_lengkap'=>$nama,
									 'email'=>$email,
									 'password_user'=>$password,
									 'level_user'=>$level,
									 'avatar_user'=>$photo,
									 'terdaftar'=>$terdaftar
									));
			if($query){
				echo "ok";
			}


		}

	}

	function edit_username(){
		$id=($this->input->post("id"));
		$username=trim(($this->input->post("username")));

		//$cocok=$this->db->query("SELECT * FROM user WHERE id_user='$id' AND name_user='$username' AND terhapus='N'");
		$cocok=$this->db->get_where('user',array('id_user'=>$id,'name_user'=>$username,'terhapus'=>'N'));

		if($cocok->num_rows()>0){
			echo "sama";
		}
		else {
			//$cari=$this->db->query("SELECT * FROM user WHERE name_user='$username' AND terhapus='N'");
			$cari=$this->db->get_where('user',array('name_user'=>$username,'terhapus'=>'N'));

			if($cari->num_rows()>0){
				echo "terpakai";
			}
			else {
				//$query=$this->db->query("UPDATE user SET name_user='$username' WHERE id_user='$id'");
				$query=$this->db->where(array('id_user'=>$id))->update('user',array('name_user'=>$username));
				if($query){
					echo "ok";
				}
			}
		}
	}


	function edit_fullname(){
		$id=($this->input->post("id"));
		$name=trim(($this->input->post("name")));
		//$query=$this->db->query("UPDATE user SET nama_lengkap='$name' WHERE id_user='$id'");
		$query=$this->db->where(array('id_user'=>$id))->update('user',array('nama_lengkap'=>$name));
		if($query){
			echo "ok";
		}
	}

	function edit_email(){
		$id=($this->input->post("id"));
		$email=trim(($this->input->post("email")));
		//$query=$this->db->query("UPDATE user SET email='$email' WHERE id_user='$id'");
		$query=$this->db->where(array('id_user'=>$id))->update('user',array('email'=>$email));
		if($query){
			echo "ok";
		}
	}

	function edit_level(){
		$id=($this->input->post("id"));
		$level=trim(($this->input->post("level")));
		//$query=$this->db->query("UPDATE user SET level_user='$level' WHERE id_user='$id'");
		$query=$this->db->where(array('id_user'=>$id))->update('user',array('level_user'=>$level));
		
		if($query){
			echo "ok";
		}
	}

	function edit_status(){
		$id=($this->input->post("id"));
		$status=trim(($this->input->post("status")));
		//$query=$this->db->query("UPDATE user SET status_user='$status' WHERE id_user='$id'");
		$query=$this->db->where(array('id_user'=>$id))->update('user',array('status_user'=>$status));
		if($query){
			echo "ok";
		}
	}

	function edit_password(){
		$id=$this->input->post("id");
		$password=apricot_password(sha1(md5($this->input->post("password"))));
		//$query=$this->db->query("UPDATE user SET password_user='$password' WHERE id_user='$id'");
		$query=$this->db->where(array('id_user'=>$id))->update('user',array('password_user'=>$password));
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
                	$id=($this->input->post('id')); //????????????
                	$nama=$this->upload->data('file_name');
                	$token_foto=($this->input->post('token_foto'));
                	//$query=$this->db->query("INSERT INTO foto_user_tmp (nama_foto,token_foto,id_user) VALUES ('$nama','$token_foto','$id')");
                	$query=$this->db->insert('foto_user_tmp',array('nama_foto'=>$nama,'token_foto'=>$token_foto,'id_user'=>$id));
                	echo 'ok';
                }

	}


	function ganti_user_avatar(){
		$id=($this->input->post("id"));
		//$cari=$this->db->query("SELECT * FROM foto_user_tmp WHERE id_user='$id' ORDER BY id_foto DESC");
		$cari=$this->db->order_by('id_foto','DESC')->get_where('foto_user_tmp',array('id_user'=>$id));

		if($cari->num_rows()>0){
			//$cari_foto_lama=$this->db->query("SELECT * FROM user WHERE id_user='$id'");
			$cari_foto_lama=$this->db->get_where('user',array('id_user'=>$id));

			$_row=$cari_foto_lama->row();
			$foto_lama=$_row->avatar_user;
			if($foto_lama!="dafault.jpg"){
				unlink(FCPATH."an-component/media/upload-user-avatar/".$foto_lama);
			}
			$row=$cari->row();

			//$query=$this->db->query("UPDATE user SET avatar_user='".$row->nama_foto."' WHERE id_user='$id' ");
			$query=$this->db->where(array('id_user'=>$id))->update('user',array('avatar_user'=>$row->nama_foto));

			//Hapus SEMUA yg punya ID user sama
			//$hapus=$this->db->query("DELETE FROM foto_user_tmp WHERE id_user='$id' ");
			$hapus=$this->db->delete('foto_user_tmp',array('id_user'=>$id));
			if($hapus){
				echo "ok";
			}
		}
	}

	function delete_user(){
		$id=($this->input->post("id"));
		//$query=$this->db->query("UPDATE user SET terhapus='Y' WHERE id_user='$id'");
		$query=$this->db->where(array('id_user'=>$id))->update('user',array('terhapus'=>'Y'));
		if($query){
			echo "ok";
		}
	}


	function new_tag(){
		$id=$this->session->userdata('id_user');
		$tag=($this->input->post("tag"));
		$slug=($this->input->post("slug"));
		//$query=$this->db->query("INSERT INTO tags (nama_tag,slug_tag,user_posting) VALUES ('$tag','$slug','$id')");
		$query=$this->db->insert('tags',array('nama_tag'=>$tag,'slug_tag'=>$slug,'user_posting'=>$id));
		@hapus_cache('semua_tag');
		$this->hapus_tags_cache();
		if($query){
			echo "ok";
		}
	}

	function edit_tag(){
		$id_user=($this->session->userdata('id_user'));
		$id=($this->input->post("id"));
		$val=($this->input->post("value"));
		$modul=($this->input->post("modul"));
		$aslug=($this->input->post("aSlug"));
		//$exe=($modul=="nama_tag")?"nama_tag":"slug_tag";
		//$exe2=($modul=="nama_tag")?",slug_tag='$aslug'":"";


		if($modul=="nama_tag"){
			$data=array('user_update'=>$id_user,'nama_tag'=>$val,'slug_tag'=>$aslug);
		} else {
			$data=array('user_update'=>$id_user,'slug_tag'=>$val);
		}

		//$query=$this->db->query("UPDATE tags SET $exe='$val' $exe2 ,user_update='$id_user' WHERE id_tag='$id'");
		$query=$this->db->where(array('id_tag'=>$id))->update('tags',$data);

		@hapus_cache('semua_tag');
		$this->hapus_tags_cache();
		if($query){
			echo "ok";
		}

	}

	function hapus_tag(){
		$id=($this->input->post("id"));
		//$query=$this->db->query("DELETE FROM tags WHERE id_tag='$id' ");
		$query=$this->db->delete('tags',array('id_tag'=>$id));

		@hapus_cache('semua_tag');
		$this->hapus_tags_cache();
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
                	$id=($this->input->post("id"));
                	$sesi=($this->input->post("sesi"));
                	$nama=$this->upload->data('file_name');
                	$token_foto=($this->input->post('token_foto'));

                	if($id==0){
                	//$query=$this->db->query("INSERT INTO foto_artikel_temp (nama_foto,token_foto,sesi_form,id_user) VALUES ('$nama','$token_foto','$sesi','$id')");
					$query=$this->db->insert('foto_artikel_temp',array('nama_foto'=>$nama,'token_foto'=>$token_foto,'sesi_form'=>$sesi,'id_user'=>$id));
					
                	} else {

					//$query=$this->db->query("INSERT INTO foto_artikel (id_artikel,nama_foto,token_foto) VALUES ('$id','$nama','$token_foto')");
					$query=$this->db->insert('foto_artikel',array('id_artikel'=>$id,'nama_foto'=>$nama,'token_foto'=>$token_foto));
					   
				}

               		$width_thumb=300;
					//$cari_width=$this->db->query("SELECT width_thumb_artikel FROM informasi WHERE id='1'");               		
					$cari_width=$this->db->get_where('informasi',array('id'=>1));               		
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
								//$search=$this->db->query("SELECT id_foto FROM foto_artikel WHERE token_foto='$token_foto' ");
								$search=$this->db->get_where('foto_artikel',array('token_foto'=>$token_foto));

								$dat=$search->row();
								$dat_id=$dat->id_foto;
								echo '{"gambar":"'.$nama.'","id":"'.$dat_id.'"}';
								}
							}
                }
	}

	function set_featured_image(){
		$id=($this->input->post("id"));
		$artikel_id=($this->input->post("artikel_id"));
		//$reset=$this->db->query("UPDATE foto_artikel SET featured='N' WHERE featured='Y' AND id_artikel='$artikel_id' ");
		$reset=$this->db->where(array('featured'=>'Y','id_artikel'=>$artikel_id))->update('foto_artikel',array('featured'=>'N'));

		//$update=$this->db->query("UPDATE foto_artikel SET featured='Y' WHERE id_foto='$id'");
		$update=$this->db->where(array('id_foto'=>$id))->update('foto_artikel',array('featured'=>'Y'));
	     echo "ok";
	}


	function delete_foto_artikel_temp(){
		$token_foto=($this->input->post("token"));

		//$query=$this->db->query("SELECT * FROM foto_artikel_temp WHERE token_foto='$token_foto' ");
		$query=$this->db->get_where('foto_artikel_temp',array('token_foto'=>$token_foto));

		if($query->num_rows()>0){
			$data=$query->row();
			$file=FCPATH."an-component/media/upload-gambar-artikel/".$data->nama_foto;
			$thumbnail=FCPATH."an-component/media/upload-gambar-artikel-thumbs/".$data->nama_foto;

			//$query2=$this->db->query("DELETE FROM foto_artikel_temp WHERE token_foto='$token_foto' ");
			$query2=$this->db->delete('foto_artikel_temp',array('token_foto'=>$token_foto));

			unlink($file);
			unlink($thumbnail);
		}
	}

	function submit_artikel($i=0){
		@hapus_cache('artikel_headline');
		@hapus_cache('artikel_populer');
		@hapus_cache('foto_artikel_'.$id);
		$judul=($this->input->post('judul'));
		$sesi=($this->input->post('sesi'));
		$id=($this->input->post('id'));
		$seo=($this->input->post('seo'));
		$isi=($this->input->post('isi'));
		$kategori=($this->input->post('kategori'));
		$tag=($this->input->post('tags'));
		$headline=($this->input->post('headline'));
		$editable=($this->input->post('editable'));
		$meta_description=($this->input->post('meta_description'));
		$meta_author=($this->input->post('meta_author'));
		$meta_keyword=($this->input->post('meta_keyword'));
		$og_description=($this->input->post('og_description'));
		$og_title=($this->input->post('og_title'));
		$og_image=($this->input->post('og_image'));
		$sesi_artikel=($this->input->post('sesi_artikel'));
		$aStatus=($this->input->post('aStatus'));

		$tanggal_posting=date("Y:m:d H:i:s",now());
		$id_user_input=$this->session->userdata('id_user');

		if($i==0){

			$stats=($this->input->post('returnDraft')=='true')?"draft":"publish";
			$was_published=($this->input->post('returnDraft')=='true')?"N":"Y";
			$tgl_posting=($this->input->post('returnDraft')=='true')?"0000-00-00 00:00:00":$tanggal_posting;
			//id masih kosong berati baru pertama kali posting

			//cek apakah sudah pernah ada sbg draft

			//$search=$this->db->query("SELECT * FROM artikel WHERE artikel_sesi_id='$sesi' ");
			$search=$this->db->get_where('artikel',array('artikel_sesi_id'=>$sesi));

			$data=array('artikel_judul'=>$judul,
						'artikel_isi'=>$isi,
						'artikel_kategori'=>$kategori,
						'artikel_tags'=>$tag,
						'artikel_sbg_headline'=>$headline,
						'artikel_tgl_posting'=>$tgl_posting,
						'artikel_id_user'=>$id_user_input,
						'artikel_editable'=>$editable,
						'artikel_seo_url'=>$seo,
						'artikel_meta_description'=>$meta_description,
						'artikel_meta_author'=>$meta_author,
						'artikel_meta_keyword'=>$meta_keyword,
						'artikel_og_image'=>$og_image,
						'artikel_og_title'=>$og_title,
						'artikel_og_description'=>$og_description,
						'artikel_status'=>$stats,
						'artikel_was_published'=>$was_published
			);

			if($search->num_rows()>0){
					$query=$this->db->where(array('artikel_sesi_id'=>$sesi))->update('artikel',$data);

			} else {
				//belum ada di draft
				$data['artikel_sesi_id']=$sesi;
				$query=$this->db->insert('artikel',$data);

				//memindahkan gambar ke artikel


			}

			//$tok=($this->input->post('returnDraft')=='true')?"artikel_sesi_id='$sesi'":"artikel_tgl_posting='$tanggal_posting'";	
			$tok=($this->input->post('returnDraft')=='true')?array('artikel_sesi_id'=>$sesi):array('artikel_tgl_posting'=>$tanggal_posting);

				//$sinc_artikel=$this->db->query("SELECT artikel_id FROM artikel WHERE $tok");
				$sinc_artikel=$this->db->select('artikel_id')->from('artikel')->where($tok)->get();
				if($sinc_artikel->num_rows()>0){
					$_id_artikel=$sinc_artikel->row();
					$_id_artikel=$_id_artikel->artikel_id;


					//$foto=$this->db->query("SELECT * FROM foto_artikel_temp WHERE sesi_form='$sesi'");
					$foto=$this->db->get_where('foto_artikel_temp',array('sesi_form'=>$sesi));

					if($foto->num_rows()>0){
						foreach($foto->result_array() as $data){

							//$this->db->query("INSERT INTO foto_artikel (id_artikel,nama_foto) VALUES ('$_id_artikel','$data[nama_foto]') ");
							$this->db->insert('foto_artikel',array(
								'id_artikel'=>$_id_artikel,
								'nama_foto'=>$data['nama_foto']
							));

							//delete row
							//$this->db->query("DELETE FROM foto_artikel_temp WHERE id_foto='$data[id_foto]'");
							$this->db->delete('foto_artikel_temp',array('id_foto'=>$data['id_foto']));
							
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

			$data=array('artikel_judul'=>$judul,
						'artikel_isi'=>$isi,
						'artikel_kategori'=>$kategori,
						'artikel_tags'=>$tag,
						'artikel_sbg_headline'=>$headline,
						'artikel_tgl_last_edit'=>$tanggal_posting,
						'artikel_id_user_last_edit'=>$id_user_input,
						'artikel_editable'=>$editable,
						'artikel_seo_url'=>$seo,
						'artikel_meta_description'=>$meta_description,
						'artikel_meta_author'=>$meta_author,
						'artikel_meta_keyword'=>$meta_keyword,
						'artikel_og_image'=>$og_image,
						'artikel_og_title'=>$og_title,
						'artikel_og_description'=>$og_description,
				);


				//$test=$this->db->query("SELECT * FROM artikel WHERE artikel_id='$id'");
				$test= $this->db->get_where("artikel",array('artikel_id'=>$id));
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
							$data['artikel_tgl_posting']=$tanggal_posting;
						} 
				} 

				$data['artikel_was_published']=$published;			
				$data['artikel_status']=$status;			
					
				$this->db->where(array('artikel_id'=>$id))->update('artikel',$data);

				echo $status;

		}


		



		

	}


	function delete_artikel(){
		$id=($this->input->post('id'));
		@hapus_cache('artikel_headline');
		@hapus_cache('artikel_populer');
		@hapus_cache('foto_artikel_'.$id);
		//$artikel_sql=$this->db->query("DELETE FROM artikel WHERE artikel_id='$id'");
		$artikel_sql=$this->db->delete('artikel',array('artikel_id'=>$id));

		//$foto_artikel=$this->db->query("SELECT * FROM foto_artikel WHERE id_artikel='$id'");
		$foto_artikel=$this->db->get_where('foto_artikel',array('id_artikel'=>$id));

		if($foto_artikel->num_rows()>0){
			foreach ($foto_artikel->result_array() as $row){
				//hapus file foto

				unlink(FCPATH."an-component/media/upload-gambar-artikel/".$row['nama_foto']);

				unlink(FCPATH."an-component/media/upload-gambar-artikel-thumbs/".$row['nama_foto']);

			}
			// hapus database foto
			//$this->db->query("DELETE FROM foto_artikel WHERE id_artikel='$id'");
			$this->db->delete('foto_artikel',array('id_artikel'=>$id));
		}

		echo 'ok';
	}

	function delete_atikel_foto(){
		@hapus_cache('artikel_headline');
		@hapus_cache('artikel_populer');
		$id=($this->input->post('id'));
		
		//$cari_foto=$this->db->query("SELECT * FROM foto_artikel WHERE id_foto='$id'");
		$cari_foto=$this->db->get_where('foto_artikel',array('id_foto'=>$id));

		if($cari_foto->num_rows()>0){
			$data=$cari_foto->row();
			//hapus file foto
				@hapus_cache('foto_artikel_'.$data->id_artikel);

				unlink(FCPATH."an-component/media/upload-gambar-artikel/".$data->nama_foto);

				unlink(FCPATH."an-component/media/upload-gambar-artikel-thumbs/".$data->nama_foto);

			//hapus  foto dari database
				//$query=$this->db->query("DELETE FROM foto_artikel WHERE id_foto='$id' ");
				$query=$this->db->delete('foto_artikel',array('id_foto'=>$id));
				if($query){
					echo "sukses";
				}

			
		} else {
			//error
			echo "deleted";
		}

	}

	function delete_multi_photos(){
		@hapus_cache('artikel_headline');
		@hapus_cache('artikel_populer');
		$id=explode(",",($this->input->post("id")));
		foreach ($id as $value) {
			//$cari=$this->db->query("SELECT * FROM foto_artikel WHERE id_foto='$value'");
			$cari=$this->db->get_where('foto_artikel',array('id_foto'=>$value));
			if($cari->num_rows()>0){
				$data=$cari->row();
				@hapus_cache('foto_artikel_'.$data->id_artikel);
				unlink(FCPATH."an-component/media/upload-gambar-artikel/".$data->nama_foto);

				unlink(FCPATH."an-component/media/upload-gambar-artikel-thumbs/".$data->nama_foto);
				//$this->db->query("DELETE FROM foto_artikel WHERE id_foto='$value'");
				$this->db->delete('foto_artikel',array('id_foto'=>$value));
			}
		}

		echo "ok";

	}

	function delete_media(){
		$value=($this->input->post('id'));
		//$cari=$this->db->query("SELECT * FROM foto_artikel WHERE id_foto='$value'");
		$cari=$this->db->get_where('foto_artikel',array('id_foto'=>$value));
			if($cari->num_rows()>0){
				$data=$cari->row();
				@hapus_cache('foto_artikel_'.$data->id_artikel);
				unlink(FCPATH."an-component/media/upload-gambar-artikel/".$data->nama_foto);

				unlink(FCPATH."an-component/media/upload-gambar-artikel-thumbs/".$data->nama_foto);
				//$this->db->query("DELETE FROM foto_artikel WHERE id_foto='$value'");
				$this->db->delete('foto_artikel',array('id_foto'=>$value));
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
		$nama=$this->input->post("nama");
		$deskripsi=$this->input->post("deskripsi");
		$favicon=$this->input->post("favicon");
		$logoweb=$this->input->post("logoweb");
		$disclaimer=$this->input->post("disclaimer");
		$termcondition=$this->input->post("termcondition");
		$privacy=$this->input->post("privacy");
		$metadescription=$this->input->post("metadescription");
		$metakeyword=$this->input->post("metakeyword");
		$thumbnail_sm=$this->input->post("thumbnail_sm");
		$customcss=$this->input->post("customcss");
		$featuredimage=$this->input->post("featuredimage");

		$thumb_artikel=$this->input->post("thumb_art");
		$thumb_galeri=$this->input->post("thumb_gal");
		$thumb_produk=$this->input->post("thumb_pro");

		$prefix_suffix_title=$this->input->post("prefix_suffix_title");
		$prefix_suffix_sebagai=$this->input->post("prefix_suffix_sebagai");
		$default_title=$this->input->post("default_title");

		$max_populer_artikel=$this->input->post("max_populer_artikel");
		$max_headline_artikel=$this->input->post("max_headline_artikel");
		$max_tampil_artikel=$this->input->post("max_tampil_artikel");
		$max_headline_galeri=$this->input->post("max_headline_galeri");
		$max_tampil_galeri=$this->input->post("max_tampil_galeri");
		$max_headline_produk=$this->input->post("max_headline_produk");
		$max_tampil_produk=$this->input->post("max_tampil_produk");

		$max_tampil_agenda=$this->input->post("max_tampil_agenda");
		$max_tampil_agenda_umum=$this->input->post("max_tampil_agenda_umum");
		$max_tampil_download=$this->input->post("max_tampil_download");
		$max_tampil_download_umum=$this->input->post("max_tampil_download_umum");

		$sleep_mode=$this->input->post("sleep_mode");
		$sleep_sampai=$this->input->post("sleep_sampai");


		$data=array(
				'nama'=>$nama,
				'deskripsi'=>$deskripsi,
				'disclaimer'=>$disclaimer,
				'webprivacy'=>$privacy,
				'termcondition'=>$termcondition,
				'meta_keyword'=>$metakeyword,
				'meta_deskripsi'=>$metadescription,
				'featured_image'=>$featuredimage,
				'thumbnail_media'=>$thumbnail_sm,
				'favicon'=>$favicon,
				'logo'=>$logoweb,
				'custom_css'=>$customcss,
				'width_thumb_artikel'=>$thumb_artikel,
				'width_thumb_galeri'=>$thumb_galeri,
				'width_thumb_produk'=>$thumb_produk,
				'default_title'=>$default_title,
				'prefix_suffix_sebagai'=>$prefix_suffix_sebagai,
				'prefix_suffix_title'=>$prefix_suffix_title,
				'max_populer_artikel'=>$max_populer_artikel,
				'max_headline_artikel'=>$max_headline_artikel,
				'max_tampil_artikel'=>$max_tampil_artikel,
				'max_headline_galeri'=>$max_headline_galeri,
				'max_tampil_galeri'=>$max_tampil_galeri,
				'max_headline_produk'=>$max_headline_produk,
				'max_tampil_produk'=>$max_tampil_produk,
				'sleep_sampai'=>$sleep_sampai,
				'max_tampil_agenda'=>$max_tampil_agenda,
				'max_tampil_agenda_umum'=>$max_tampil_agenda_umum,
				'max_tampil_download'=>$max_tampil_download,
				'max_tampil_download_umum'=>$max_tampil_download_umum,
				'sleep_mode'=>$sleep_mode

			);

		@hapus_cache('informasi_web');
		@hapus_cache('title_format');
		@hapus_cache('downloads_umum');
		@hapus_cache('artikel_headline');
		@hapus_cache('artikel_populer');
			
		$query=$this->db->where("id","1")->update("informasi",$data);
		if($query){
			echo "ok";
		}
	}


	function simpanbiodata(){
		$nama=($this->input->post("nama"));
		$fotobio=($this->input->post("fotobio"));
		$deskripsisingkat=($this->input->post("deskripsisingkat"));
		$deskripsi=($this->input->post("deskripsi"));
		$link_fb=($this->input->post("link-fb"));

		@hapus_cache('biodata_web');

		$query=$this->db->where(array('id'=>1))->update('biodata',array('nama'=>$nama,
																		'foto'=>$fotobio,
																		'deskripsi_singkat'=>$deskripsisingkat,
																		'deskripsi'=>$deskripsi,
																		'link_fb'=>$link_fb
																	));

		if($query){
		echo "ok";
		}

	}

	function page(){
		if($this->session->userdata("level_user")==1){
			$judul=($this->input->post("judul"));
			$id=($this->input->post("id"));
			$isi=($this->input->post("isi_page"));
			$url=($this->input->post("url"));
			$image=($this->input->post("image"));
			$status=($this->input->post("status"));
			$keywords=($this->input->post("keywords"));
			$description=($this->input->post("description"));
			$js=($this->input->post("js"));
			$user=($this->session->userdata("id_user"));
			$time=date("Y:m:d H:i:s",now());

			$data=array('page_judul'=>$judul,
						'page_url'=>$url,
						'page_isi'=>$isi,
						'page_foto'=>$image,
						'page_javascript'=>$js,
						'page_status'=>$status,
						'page_created'=>$time,
						'page_meta_keywords'=>$keywords,
						'page_meta_description'=>$description,
					);

			if($id==0){
				// "baru";
				$data['page_id_user']=$user;				
				//$query=$this->db->query("INSERT INTO pages (page_judul,page_url,page_isi,page_foto,page_javascript,page_status,page_id_user,page_created,page_meta_keywords,page_meta_description) VALUES ('$judul','$url','$isi','$image','$js','$status','$user','$time','$keywords','$description')");
				$query=$this->db->insert('pages',$data);
				$new_id=$this->db->insert_id();
				@hapus_cache('page_'.$new_id);
				echo $new_id;


			} else {
				// "update";
				$data['page_id_edit']=$user;
				
				//$query=$this->db->query("UPDATE pages SET page_judul='$judul',page_url='$url',page_isi='$isi',page_foto='$image',page_javascript='$js',page_status='$status',page_id_edit='$user',page_edited='$time',page_meta_keywords='$keywords',page_meta_description='$description' WHERE page_id='$id'");
				$this->db->where(array('page_id'=>$id))->update('pages',$data);
				@hapus_cache('page_'.$id);
				echo "ok";
			}

		}
	}


	function save_galeri(){
		$id=($this->input->post("id"));
		$nama=($this->input->post("nama"));
		$seo=($this->input->post("seo"));
		$deskripsi=($this->input->post("deskripsi"));
		$featured=($this->input->post("featured"));
		$status=($this->input->post("status"));
		$meta_keyword=($this->input->post("meta_keyword"));
		$meta_description=($this->input->post("meta_description"));
		$og_image=($this->input->post("og_image"));
		$og_description=($this->input->post("og_description"));
		$sesi=($this->input->post("sesi"));
		$kategori=($this->input->post("kategori"));
		$user=$this->session->userdata("id_user");
		$time=date("Y:m:d H:i:s",now());

		$data=array('galeri_nama'=>$nama,
					'galeri_deskripsi'=>$deskripsi,
					'galeri_feature_img'=>$featured,
					'galeri_url'=>$seo,
					'galeri_meta_keyword'=>$meta_keyword,
					'galeri_meta_deskripsi'=>$meta_description,
					'galeri_og_image'=>$og_image,
					'galeri_og_deskripsi'=>$og_description,
					'galeri_date'=>$time,
					'galeri_status'=>$status,
					'kategori_id'=>$kategori
				);

		if($id==0){
			$data['galeri_user']=$user;

			/*$query=$this->db->query("INSERT INTO galeri (galeri_nama,galeri_deskripsi,galeri_feature_img,galeri_url,galeri_meta_keyword,galeri_meta_deskripsi,galeri_og_image,galeri_og_deskripsi,galeri_date,galeri_user,galeri_status,kategori_id) VALUES ('$nama','$deskripsi','$featured','$seo','$meta_keyword','$meta_description','$og_image','$og_description','$time','$user','$status',$kategori)");*/
			$query=$this->db->insert('galeri',$data);
			$new_id=$this->db->insert_id();

			@hapus_cache('galeri_'.$new_id);
			@hapus_cache('fotos_galeri_'.$new_id);

			//$foto=$this->db->query("SELECT * FROM foto_galeri_temp WHERE sesi_form='$sesi' ORDER BY id_foto");
			$foto=$this->db->order_by('id_foto','desc')->get_where('foto_galeri_temp',array('sesi_form'=>$sesi));

			if($foto->num_rows()>0){
				foreach($foto->result_array() AS $data){
					//$this->db->query("INSERT INTO foto_galeri (id_galeri,nama_foto) VALUES ('$new_id','$data[nama_foto]')");
					$this->db->insert('foto_galeri',array('id_galeri'=>$new_id,'nama_foto'=>$data['nama_foto']));
				}
				//$this->db->query("DELETE FROM foto_galeri_temp WHERE sesi_form='$sesi'");
				$this->db->delete('foto_galeri_temp',array('sesi_form'=>$sesi));
				}

			echo $new_id;

		} else if($id>0){

			$data['galeri_user_edit']=$user;

			//$query=$this->db->query("UPDATE galeri SET galeri_nama='$nama', galeri_deskripsi='$deskripsi', galeri_feature_img='$featured',galeri_url='$seo', galeri_meta_keyword='$meta_keyword', galeri_meta_deskripsi='$meta_description', galeri_og_image='$og_image', galeri_og_deskripsi='$og_description', galeri_date_edit='$time', galeri_user_edit='$user', galeri_status='$status', kategori_id='$kategori' WHERE galeri_id='$id' ");

			$query=$this->db->where(array('galeri_id'=>$id))->update('galeri',$data);
			@hapus_cache('galeri_'.$id);
			@hapus_cache('fotos_galeri_'.$id);

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
 
                	$id=($this->input->post("id"));
                	$sesi=($this->input->post("sesi"));
                	$nama=$this->upload->data('file_name');
                	$token_foto=($this->input->post('token_foto'));

                	if($id==0){
									//$query=$this->db->query("INSERT INTO foto_galeri_temp (nama_foto,token_foto,sesi_form) VALUES ('$nama','$token_foto','$sesi')");
									$query=$this->db->insert('foto_galeri_temp',array(
										'nama_foto'=>$nama,
										'token_foto'=>$token_foto,
										'sesi_form'=>$sesi
									));
                	} else {
								  @hapus_cache('fotos_galeri_'.$id);	
									// $query=$this->db->query("INSERT INTO foto_galeri (id_galeri,nama_foto,token_foto) VALUES ('$id','$nama','$token_foto')");
									$query=$this->db->insert('foto_galeri',array(
										'id_galeri'=>$id,
										'nama_foto'=>$nama,
										'token_foto'=>$token_foto
									));
               		}


               		$width_thumb=300;
									//$cari_width=$this->db->query("SELECT width_thumb_galeri FROM informasi WHERE id='1'");
									$cari_width=$this->db->select('width_thumb_galeri')->from('informasi')->where(array('id'=>1))->get();
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
								//$search=$this->db->query("SELECT * FROM foto_galeri WHERE token_foto='$token_foto' ");
								$search=$this->db->get_where('foto_galeri',array('token_foto'=>$token_foto));
								$dat=$search->row();
								$dat_id=$dat->id_foto;
								//echo '{"gambar":"'.$nama.'","id":"'.$dat_id.'","deskripsi":"'.$dat->deskripsi_foto.'"}';
								echo json_encode(array(
									'gambar'=>$nama,
									'id'=>$dat_id,
									'deskripsi'=>$dat->deskripsi_foto
								));
								}
							}
                }
	}


	function delete_foto_galeri_temp(){
		$token_foto=($this->input->post("token"));
		//$query=$this->db->query("SELECT * FROM foto_galeri_temp WHERE token_foto='$token_foto' ");
		$query=$this->db->get_where('foto_galeri_temp',array('token_foto'=>$token_foto));
		if($query->num_rows()>0){
			$data=$query->row();
			$file=FCPATH."an-component/media/upload-galeri/".$data->nama_foto;
			$thumbnail=FCPATH."an-component/media/upload-galeri-thumbs/".$data->nama_foto;
			//$query2=$this->db->query("DELETE FROM foto_galeri_temp WHERE token_foto='$token_foto' ");
			$query2=$this->db->delete('foto_galeri_temp',array('token_foto'=>$token_foto));
			unlink($file);
			unlink($thumbnail);
		}
	}

	function delete_foto_galeri(){
		$id=($this->input->post("id"));
		@hapus_cache('fotos_galeri_'.$id);
		//$search=$this->db->query("SELECT * FROM foto_galeri WHERE id_foto='$id'");
		$search=$this->db->get_where('foto_galeri',array('id_foto'=>$id));
		if($search->num_rows()>0){
			$data=$search->row();
			$file=FCPATH."an-component/media/upload-galeri/".$data->nama_foto;
			$thumbnail=FCPATH."an-component/media/upload-galeri-thumbs/".$data->nama_foto;
			//$query2=$this->db->query("DELETE FROM foto_galeri WHERE id_foto='$id' ");
			$query2=$this->db->get_where('foto_galeri',array('id_foto'=>$id));
			unlink($file);
			unlink($thumbnail);
		}
		echo "ok";
	}


	function edit_deskripsi_galeri(){
		$id=($this->input->post("id"));
		@hapus_cache('fotos_galeri_'.$id);
		$deskripsi=($this->input->post("deskripsi"));
		//$query=$this->db->query("UPDATE foto_galeri SET deskripsi_foto='$deskripsi' WHERE id_foto='$id' ");
		$query=$this->db->where(array('id_foto'=>$id))->update('foto_galeri',array('deskripsi_foto'=>$deskripsi));
		echo "ok";
	}


	function delete_galeri(){
		$id=($this->input->post("id"));
		@hapus_cache('galeri_'.$id);
		@hapus_cache('fotos_galeri_'.$id);
		//$search=$this->db->query("SELECT * FROM galeri WHERE galeri_id='$id' ");
		$search=$this->db->get_where('galeri',array('galeri_id'=>$id));
		if($search->num_rows()>0){

			//$this->db->query("DELETE FROM galeri WHERE galeri_id='$id'");
			$this->db->delete('galeri',array('galeri_id'=>$id));

			//$foto=$this->db->query("SELECT * FROM foto_galeri WHERE id_galeri='$id'");
			$foto=$this->db->get_where('foto_galeri',array('id_galeri'=>$id));

			foreach ($foto->result_array() as  $value) {

				$file=FCPATH."an-component/media/upload-galeri/".$value['nama_foto'];
				$thumbnail=FCPATH."an-component/media/upload-galeri-thumbs/".$value['nama_foto'];
				unlink($file);
				unlink($thumbnail);
			}

			//$query=$this->db->query("DELETE FROM foto_galeri WHERE id_galeri='$id'");
			$query=$this->db->delete('foto_galeri',array('id_galeri'=>$id));
		}

		echo "ok";
	}


	function delete_page(){
		if($this->session->userdata("level_user")==1){
			$id=($this->input->post("id"));
			@hapus_cache('page_'.$id);
			//$query=$this->db->query("DELETE FROM pages WHERE page_id='$id'");
			$query=$this->db->delete('pages',array('page_id'=>$id));
			echo "ok";
		}
	}



	function cek_code_menu(){
		
		$code=($this->input->post("code"));
		//$query=$this->db->query("SELECT * FROM menu WHERE menu_code='$code'");
		$query=$this->db->get_where('menu',array('menu_code'=>$code));
		if($query->num_rows()>0){
			echo "taken";
		} else {
			echo "ok";
		}

	}



	function menu_baru(){
		$nama=($this->input->post("nama"));
		$code=($this->input->post("code"));
		$time=date("Y:m:d H:i:s",now());
		@hapus_cache('menu_one_level_vertikal');
		@hapus_cache('menu_one_level_horizontal');
		//$query=$this->db->query("INSERT INTO menu (menu_code,menu_nama,menu_created) VALUES ('$code','$nama','$time')");
		$query=$this->db->insert('menu',array(
			'menu_code'=>$code,
			'menu_nama'=>$nama,
			'menu_created'=>$time,
		));
		 if($query)
		 {
		 	echo $this->db->insert_id();
		 } else{
		 	echo $this->db->error();
		 }



	}

	function insert_new_menu(){
		$id=($this->input->post("id"));
		$nama=($this->input->post("nama"));
		$url=($this->input->post("url"));
		$code=($this->input->post("code"));
		$target=($this->input->post("target"));
		$posisi=($this->input->post("posisi"));
		@hapus_cache('menu_one_level_vertikal');
		@hapus_cache('menu_one_level_horizontal');

		//$query=$this->db->query("INSERT INTO menu_child (menu_id,menu_child_nama,menu_child_url,menu_child_target,menu_child_code,posisi) VALUES ('$id','$nama','$url','$target','$code','$posisi')");
		$query=$this->db->insert('menu_child',array(
			'menu_id'=>$id,
			'menu_child_nama'=>$nama,
			'menu_child_url'=>$url,
			'menu_child_target'=>$target,
			'menu_child_code'=>$code,
			'posisi'=>$posisi
		));
		if($query){

		echo json_encode(array("id"=>$this->db->insert_id(),"nama"=>$nama,"url"=>$url,"target"=>$target,"code"=>$code));

		} else {
			echo $this->db->error();
		}
		
	}


	function insert_new_sub_menu(){
		$id=($this->input->post("id"));
		$nama=($this->input->post("nama"));
		$url=($this->input->post("url"));
		$target=($this->input->post("target"));
		$posisi=($this->input->post("posisi"));
		$parent=($this->input->post("parent"));
		@hapus_cache('menu_one_level_vertikal');
		@hapus_cache('menu_one_level_horizontal');

		//$query=$this->db->query("INSERT INTO menu_child (menu_id,menu_child_nama,menu_child_url,menu_child_target,menu_child_parent,posisi) VALUES ('$parent','$nama','$url','$target','$id','$posisi')");
		$query=$this->db->insert('menu_child',array(
			'menu_id'=>$parent,
			'menu_child_nama'=>$nama,
			'menu_child_url'=>$url,
			'menu_child_target'=>$target,
			'menu_child_parent'=>$id,
			'posisi'=>$posisi
		));

		if($query){
		echo json_encode(array("id"=>$this->db->insert_id(),"nama"=>$nama,"url"=>$url,"target"=>$target,"code"=>""));
		} else {
			echo $this->db->error();
		}



	}



	public $collect_menu_child=array();

	function delete_menu_child(){

		$menu_id=($this->input->post("menu"));
		$id=($this->input->post("id"));

		//$query=$this->db->query("SELECT * FROM menu_child WHERE menu_id='$menu_id' AND menu_child_id='$id'  ");
		$query=$this->db->get_where('menu_child',array('menu_id'=>$menu_id,'menu_child_id'=>$id));
		@hapus_cache('menu_one_level_vertikal');
		@hapus_cache('menu_one_level_horizontal');

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
		//$query2=$this->db->query("SELECT menu_child_id FROM menu_child WHERE menu_id='$menu' AND menu_child_parent='$parent'");
		$query2=$this->db->select('menu_child_id')
						->from('menu_child')
						->where(array('menu_id'=>$menu,'menu_child_parent'=>$parent))
						->get();
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
		$id=($this->input->post("id"));
		$data=$this->input->post("data");
		$urutan=$this->input->post("urutan");
		@hapus_cache('menu_one_level_vertikal');
		@hapus_cache('menu_one_level_horizontal');
		
		foreach ($data as $key => $value) {
			$posisi=$urutan[$key];
			//$this->db->query("UPDATE menu_child SET menu_child_parent='$value',aktif='Y',posisi='$posisi' WHERE menu_child_id='$key' AND menu_id='$id'");
			$this->db->where(array('menu_child_id'=>$key,'menu_id'=>$id))
			->update('menu_child',array('menu_child_parent'=>$value,'aktif'=>'Y','posisi'=>$posisi));
		}

		echo "ok";
	}


	function update_menu(){

		$id=($this->input->post("id"));
		$nama=($this->input->post("nama"));
		$url=($this->input->post("url"));
		$target=($this->input->post("target"));
		$parent=($this->input->post("parent_id"));
		@hapus_cache('menu_one_level_vertikal');
		@hapus_cache('menu_one_level_horizontal');
		//$query=$this->db->query("UPDATE menu_child SET menu_child_nama='$nama',menu_child_url='$url',menu_child_target='$target' WHERE menu_id='$parent' AND menu_child_id='$id' ");
		$query=$this->db->where(array('menu_id'=>$parent,'menu_child_id'=>$id))
					->update('menu_child',array(
						'menu_child_nama'=>$nama,
						'menu_child_url'=>$url,
						'menu_child_target'=>$target
					));
		if($query){
			echo "ok";
		} else {
			echo $this->db->error();
		}

	}



	function hapus_group_menu(){

		$id=($this->input->post("id"));
		//$data=$this->db->query("SELECT menu_code FROM menu WHERE menu_id='$id'");
		$data=$this->db->select('menu_code')->from('menu')->where(array('menu_id'=>$id))->get();
		if($data->num_rows()>0){
			$q=$data->row();
			if($q->menu_code=='vertical' OR $q->menu_code=='horizontal'){
				echo "ini adalah menu default. Tidak dapat dihapus! <br>";
				echo "Code menu: ".$q->menu_code;
			} else {
				
				//delete main menu

				//$this->db->query("DELETE FROM menu WHERE menu_id='$id' ");
				$this->db->delete('menu',array('menu_id'=>$id));

				//$this->db->query("DELETE FROM menu_child WHERE menu_id='$id' ");
				$this->db->delete('menu_child',array('menu_id'=>$id));
				echo "ok";

			}
		} else {
			echo "data yang akan dihapus sudah tidak ada di database.";
		}

	}


	function new_kategori_galeri(){
		$nama=($this->input->post("nama"));
		$slug=$this->slugify->slugify($nama);

		//$this->db->query("INSERT INTO kategori_galeri (nama_kategori,slug_kategori) VALUES ('$nama','$slug')");
		$this->db->insert('kategori_galeri',array('nama_kategori'=>$nama,'slug_kategori'=>$slug));
		
		@hapus_cache('one_level_category_galeri');
		echo json_encode(array("id"=>$this->db->insert_id(),"nama"=>$nama));
	}


	function edit_kategori_galeri($modul){
		if($this->session->userdata('level_user')==1){
			@hapus_cache('one_level_category_galeri');
			$id=($this->input->post("id"));

			if($modul=="nama"){
				$nama=trim(($this->input->post("nama")));
				$slug=$this->slugify->slugify($nama);

				if($nama=="[error]"){
					echo "fail";
				} else {

					//$query=$this->db->query("UPDATE kategori_galeri SET nama_kategori='$nama', slug_kategori='$slug' WHERE id='$id'");
					$query=$this->db->where(array('id'=>$id))->update('kategori_galeri',array(
						'nama_kategori'=>$nama,
						'slug_kategori'=>$slug,
					));

					echo "ok";
				}
			} else if($modul=="hapus"){
				//$this->db->query("UPDATE kategori_galeri SET terhapus='Y' WHERE id='$id'");
				$this->db->where(array('id'=>$id))->update('kategori_galeri',array('terhapus'=>'Y'));
				echo "ok";
			} else if ($modul=='disable'){

				//$this->db->query("UPDATE kategori_galeri SET aktif='N'  WHERE id='$id'");
				$this->db->where(array('id'=>$id))->update('kategori_galeri',array('aktif'=>'N'));
				echo "ok";

			} else if ($modul=='enable'){
				//$this->db->query("UPDATE kategori_galeri SET aktif='Y'  WHERE id='$id'");
				$this->db->where(array('id'=>$id))->update('kategori_galeri',array('aktif'=>'Y'));
				echo "ok";
			} 

		}
	}


 	function new_kategori_produk(){
 		$nama=($this->input->post("nama"));
 		$parent=($this->input->post("parent"));
 		$slug=$this->slugify->slugify($nama);

 		$aktif="Y";
 		if($parent>0){
 			//$query=$this->db->query("SELECT * FROM kategori_produk WHERE id='$parent' AND aktif='Y'");
 			$query=$this->db->get_where('kategori_produk',array('id'=>$parent,'aktif'=>'Y'));
 			if($query->num_rows()<1){
 				$aktif='N';
 			}
 		}


		 //$this->db->query("INSERT INTO kategori_produk (nama_kategori,slug_kategori,parent_kategori,aktif) VALUES ('$nama','$slug','$parent','$aktif')");
		 $this->db->insert('kategori_produk',array(
			 'nama_kategori'=>$nama,
			 'slug_kategori'=>$slug,
			 'parent_kategori'=>$parent,
			 'aktif'=>$aktif
		 ));

 		echo json_encode(array("id"=>$this->db->insert_id(),"nama"=>$nama,"parent"=>$parent,"aktif"=>$aktif));

	}

	function update_kategori_produk(){
 		$id=($this->input->post("id"));
 		$nama=($this->input->post("nama"));	
 		$slug=$this->slugify->slugify($this->input->post("nama"));
		 
		//$this->db->query("UPDATE kategori_produk SET nama_kategori='$nama', slug_kategori='$slug' WHERE id='$id'");
		$this->db->where(array('id'=>$id))->update('kategori_produk',array('nama_kategori'=>$nama,'slug_kategori'=>$slug));		

 		echo json_encode(array("nama"=>$nama));
	}



	protected $child_kategori_produk=array();

	function aktif_kategori_produk(){
		$modul=($this->input->post("modul"));
		$id=($this->input->post("id"));
		//$query=$this->db->query("SELECT * FROM kategori_produk WHERE id='$id'");
		$query=$this->db->get_where('kategori_produk',array('id'=>$id));
		$context=($this->input->post("context"));

		if($query->num_rows()>0){

			$data=$query->row();

			$cek=true;

			if($context=="update"){
			//$query2=$this->db->query("SELECT * FROM kategori_produk WHERE id='".$data->parent_kategori."' AND aktif='Y'");
			$query2=$this->db->get_where('kategori_produk',array(
				'id'=>$data->parent_kategori,
				'aktif'=>'Y'
			));

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
					//$this->db->query("UPDATE kategori_produk SET aktif='$aksi' WHERE id='$v'");
					$this->db->where(array('id'=>$v))->update('kategori_produk',array('aktif'=>$aksi));
			}

			echo json_encode($this->child_kategori_produk);

		} else if ($context=="delete") {
			foreach ($this->child_kategori_produk as $v) {
					//$this->db->query("UPDATE kategori_produk SET terhapus='Y' WHERE id='$v'");
					$this->db->where(array('id'=>$v))->update('kategori_produk',array('terhapus'=>'Y'));
			}
			echo json_encode($this->child_kategori_produk);
		}
	}

	protected function cari_child_kategori_p($id){
		//$query=$this->db->query("SELECT * FROM kategori_produk WHERE parent_kategori='$id'");
		$query=$this->db->get_where('kategori_produk',array('parent_kategori'=>$id));
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
		"gambar"=>($this->input->post("gambar")),
		"header"=>($this->input->post("header")),
		"caption"=>($this->input->post("caption")),
		"link_href"=>($this->input->post("link")),
		"link_text"=>($this->input->post("text")),
		);

		$this->db->insert("banner_depan",$data);

		@hapus_cache('banner_depan');

		echo json_encode(array_merge($data,array("id"=>$this->db->insert_id())));

	}


	function update_banner_depan(){
		$id=($this->input->post("id"));
		$value=($this->input->post("nilai"));
		$modul=($this->input->post("modul"));

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
		@hapus_cache('banner_depan');

		$data["id"]=$id;
		$data["val"]=$value;

		echo json_encode($data);


	}

	function delete_banner_depan(){

		$id=($this->input->post("id"));
		$this->db->where("id",$id);
		$this->db->delete("banner_depan");
		@hapus_cache('banner_depan');		
		echo "{}";
	}



	function news_ticker(){

		$data=array("berita"=>($this->input->post('berita')),
					"link"=>($this->input->post('link')),
					"tanggal_posting"=>date("Y:m:d H:i:s",now())
			);

		$this->db->insert('news_ticker',$data);
		$data['id']=$this->db->insert_id();

		echo json_encode($data);

	}

	function update_news_ticker(){
		$modul=$this->input->post('modul');
		$id=($this->input->post('id'));
		$value=($this->input->post('nilai'));

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
		@hapus_cache('news_ticker');
		echo "{}";
	}


	function pihak_ketiga(){
		$this->db->where('id',1);
		$this->db->update('pihak_ketiga',$this->input->post());
		@hapus_cache('pihak_ketiga');
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
					"detail_faq",
					"disclaimer",
					"faq",
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
					"search_artikel",
					"agenda",
					"agendas",
					"download",
					"downloads"
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

				@hapus_cache('tema_aktif');
				echo json_encode(array("status"=>"success"));

			} else {

			echo json_encode(array("status"=>"error","pesan"=>"Tema Korup. Direktori tema tidak ditemukan"));

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
			@hapus_cache('tema_aktif');
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

	function update_smtp(){
		$nama=trim($this->input->post("nama"));
		$host=trim($this->input->post("host"));
		$user=trim($this->input->post("user"));
		$password=trim($this->input->post("password"));
		$port=trim($this->input->post("port"));
		$ssl_connection=trim($this->input->post("ssl_connection"));

		$input=array("user"=>$user,"host"=>$host,"password"=>$password,"nama"=>$nama,"port"=>$port,"ssl_connection"=>$ssl_connection);

		if ($password=="" || $password==" "){
			$input=array("user"=>$user,"host"=>$host,"nama"=>$nama,"port"=>$port,"ssl_connection"=>$ssl_connection);
		}

		$this->db->where("id","1")->update("smtp_email",$input);

		echo "{}";

	}

	function kirim_email(){

		$judul=$this->input->post("judul");
		$email=$this->input->post("email");
		$isi=$this->input->post("isi");

		$hasil=kirim_email($email,$judul,$isi);

		echo json_encode(array("pesan"=>$hasil));

	}



	function file_download(){
		$sesi=$this->input->post("sesi");
		$token=$this->input->post("token_file");
		$id=$this->input->post("id");

		$config["upload_path"]=FCPATH."/an-component/media/download/";
        $config['allowed_types']= '*';

		$this->load->library("upload",$config);

		if(! $this->upload->do_upload('userfile')){
			 echo $this->upload->display_errors();
		} else {
			$nama=$this->upload->data('file_name');
			$this->db->insert("download_temp",array("file"=>$nama,"token_file"=>$token,"sesi_form"=>$sesi));
			echo "berhasil";
		}
	}

	function delete_file_download_temp(){
		$token=$this->input->post('token');
		$data=$this->db->where("token_file",$token)->get("download_temp");
		if($data->num_rows()>0){
			$data=$data->row();
			if(file_exists($file=FCPATH."/an-component/media/download/".$data->file)){
				unlink($file);
			}

			$this->db->where("token_file",$token)->delete("download_temp");

		}
	}



	function proses_input_download(){
		$id=$this->input->post("id");
		$nama=$this->input->post("nama");
		$slug=$this->slugify->slugify($nama);
		$sesi=$this->input->post("sesi");
		$deskripsi=$this->input->post("deskripsi");

		$filee=$this->db->where("sesi_form",$sesi)->get('download_temp');

		$download=$this->db->where("id",$id)->get("download");
		if($id=="0" || $download->num_rows()<1){
			//baru
		$filee=$filee->row();
		$this->db->insert("download",array("nama_file"=>$nama,
																			"file"=>$filee->file,
																			"deskripsi"=>$deskripsi,
																			"slug"=>$slug
																		));
		$this->db->where("sesi_form",$sesi)->delete('download_temp');


		} else {
			$download=$download->row();
			//update
			if($filee->num_rows()>0){
				//replace foto
				$filee=$filee->row();

				if(file_exists($f=FCPATH."/an-component/media/download/".$download->file)){
					unlink($f);
				}

				$this->db->where("id",$id)->update("download",array("nama_file"=>$nama,
																														"file"=>$filee->file,
																														"deskripsi"=>$deskripsi,
																														"slug"=>$slug
																													));
				$this->db->where("sesi_form",$sesi)->delete('download_temp');


			} else {
				
				$this->db->where("id",$id)->update("download",array("nama_file"=>$nama,
																														"deskripsi"=>$deskripsi,
																														"slug"=>$slug
																													));

			}
		}

		foreach ($this->db->get("download_temp")->result_array() as $d) {
				if(file_exists($f=FCPATH."/an-component/media/download/".$d['file'])){
					unlink($f);
				}
		}

		$this->db->empty_table("download_temp");
		@hapus_cache('downloads_umum');
		echo "{}";
	}



	function hapus_download(){
		$id=$this->input->post("id");
		$data=$this->db->where("id",$id)->get("download");
		if($data->num_rows()>0){
			$data=$data->row();
			if(file_exists($f=FCPATH."/an-component/media/download/".$data->file)){
					unlink($f);
				}
				$this->db->where("id",$id)->delete("download");
		}
		@hapus_cache('downloads_umum');
		echo "{}";
	}


		function proses_update_password(){

		$id=$this->session->userdata('id_user');
		$password_lama=sha1(md5($this->input->post('password_lama')));
		$password_baru=apricot_password(sha1(md5($this->input->post('password_baru'))));

		//$user=$this->db->get_where("user",array("id_user"=>$id,"password_user"=>$password_lama));
		$user=$this->db->get_where("user",array("id_user"=>$id));

		if($user->num_rows()>0){
			$user = $user->row_array();
			if(password_verify($password_lama,$user['password_user'])){

				$this->db->where(array("id_user"=>$id))->update("user",array("password_user"=>$password_baru));
				$this->session->set_userdata("password_user",$password_baru);
				echo json_encode(array("status"=>"success"));
				
			} else {
				echo json_encode(array("status"=>"error","pesan"=>"Password lama Anda salah"));
			}

		} else {
			echo json_encode(array("status"=>"error","pesan"=>"User tidak ditemukan"));
		}

	}



	function input_agenda(){
		$id=$this->input->post("id");
		$judul=$this->input->post("judul");
		$slug=$this->slugify->slugify($judul);
		$foto=$this->input->post("foto");
		$deskripsi=$this->input->post("deskripsi");
		$tanggal_mulai=$this->input->post("tanggal_mulai");
		$tanggal_selesai=$this->input->post("tanggal_selesai");
		@hapus_cache('agendas_umum');
		if($id=="0"){			
			$this->db->insert("agenda",array("judul"=>$judul,'slug'=>$slug,"deskripsi"=>$deskripsi,"tanggal_mulai"=>$tanggal_mulai,"tanggal_selesai"=>$tanggal_selesai,"foto"=>$foto));
			$id= $this->db->insert_id();
			echo json_encode(array("status"=>"baru","id"=>$id));
			@hapus_cache('agenda_'.$id);
		} else {

			$this->db->where("id",$id)->update("agenda",array("judul"=>$judul,'slug'=>$slug,"deskripsi"=>$deskripsi,"tanggal_mulai"=>$tanggal_mulai,"tanggal_selesai"=>$tanggal_selesai,"foto"=>$foto));
			@hapus_cache('agenda_'.$id);
			echo json_encode(array("status"=>"update"));

		}


	}


	function hapus_agenda(){
		$id=$this->input->post("id");
		$this->db->where("id",$id)->delete("agenda");
		hapus_cache('agenda_'.$id);
		@hapus_cache('agendas_umum');
		echo "{}";

	}


	function hapus_cache(){
		$daftar_file=get_dir_file_info(FCPATH."application/cache",FALSE);
    foreach($daftar_file as $file){
     if(!($file['name']=='index.html' || $file['name']=='.htaccess')){
			@hapus_cache($file['name']);
		 }
    }
		echo json_encode(array());
	}

	function hapus_tags_cache(){
		$daftar_file=get_dir_file_info(FCPATH."application/cache",FALSE);
    foreach($daftar_file as $file){
		 $file_name= substr($file['name'],0,5);
		 if($file_name=='tags_'){
			hapus_cache($file['name']);
		 }
    }		
	}

	function hapus_faq(){
		$id=$this->input->post("id");
		$this->db->delete('faq',array('id'=>$id));
		@hapus_cache('semua_faq');
		@hapus_cache('faq_'.$id);
		echo json_encode(array());
	}


	function insert_faq(){
		$id=$this->input->post("id");
		$pertanyaan=$this->input->post("pertanyaan");
		$jawaban=$this->input->post("jawaban");
		$tanggal=date("Y:m:d H:i:s",now());
		$slug=$this->slugify->slugify($pertanyaan);
		$data=array(
			'pertanyaan'=>$pertanyaan,
			'jawaban'=>$jawaban,
			'slug'=>$slug,
		);

		if($id > 0){
			//update
			$this->db->where(array('id'=>$id))->update('faq',$data);
		} else {
			//new
			$data['tanggal']= $tanggal;
			$this->db->insert('faq',$data);
			$id= $this->db->insert_id();
		}

		@hapus_cache('semua_faq');
		@hapus_cache('faq_'.$id);

		echo json_encode(array('id'=>$id));

	}


	function hapus_group_banner(){
		$id= $this->input->post('id');
		@hapus_cache('group_banner_'.$id);
		$this->db->trans_begin();
		$this->db->delete('group_banner',array('id_group'=>$id));
		$this->db->delete('banner_item',array('id_group'=>$id));
		if($this->db->trans_status() === FALSE ){
			$this->db_>trans_rollback();
			echo "Terjadi error pada database";
		} else {
			$this->db->trans_commit();
			echo "{}";
		}
	}


	function submit_item_banner(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$data = $this->input->post('data');
		$tanggal=date("Y:m:d H:i:s",now());
		$this->db->trans_begin();
		$this->db->delete('banner_item',array('id_group'=>$id));
		if(!($id > 0)){
			//new
			$this->db->insert('group_banner',array(
				'nama'=> $nama,
				'tanggal'=>$tanggal
			));
			$id = $this->db->insert_id();			
		} else {
			$this->db->where(array('id_group'=>$id))->update('group_banner',array(
				'nama'=> $nama
			));		
		}
		
		$idx=0;
		foreach($data as $d){
			$data[$idx]['id_group']= $id;
			$idx++;
		}
		$this->db->insert_batch('banner_item',$data);
		if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			
			echo "Terjadi error dengan database";
		} else {
			$this->db->trans_commit();
			@hapus_cache('group_banner_'.$id);
			echo json_encode(array(
				'id'=>$id
			));
		}


	}

	function sesi(){
		echo $this->session->userdata('level_user');
	}


}
