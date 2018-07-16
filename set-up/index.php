<!doctype html>
<?php 

function siteURL()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'].'/';
    return $protocol.$domainName;
}


$dir=$_SERVER['REQUEST_URI'];
$dir=trim($dir,"/");
$dir=explode("/", $dir);

$hasil="";
if(($j=count($dir))>2){
	for ($i=0; $i <= $j-2 ; $i++) { 
		$hasil.=$dir[$i].'/';
	}
} else if(count($dir)>1) {
	$hasil=$dir[0];

} else if(count($dir)==1){
	$hasil="";
}

$dir=trim($hasil,"/");

 ?>


<html>
<head>
	<title>Instalasi Apricot CMS</title>

<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/ionicons/css/ionicons.min.css">

<style type="text/css">

	body {
		background-color: #ccc;
	}

</style>

</head>
<body>

<div class="container">

	<div class='row' style="text-align: center">

		<h1><span style='color: #f39c12;'>Apricot</span> CMS</h1>

	</div>

	<div class='row'>

		<div class='col-md-8 col-md-offset-2' style="margin-bottom: 50px; background: #FFF;border-radius: 5px;">
 			
 			<div class="row" style="padding: 20px">

 				<div class='col-md-12'>

 					<div class="form-group" style="text-align: center; margin-bottom: 60px;">



 						<div style="display: inline-block" >
 							<i  style="font-size: 55px;" id='database-sesi' class="ion ion-information-circled"></i><br>
 							<span style='color: #3c8dbc;;font-weight: bold'>Database</span>
 						</div>

 						<div style="display: inline-block; margin: 0 70px 0 70px" >
 							<i  style="font-size: 45px;" id='informasi-sesi' class="ion ion-information-circled"></i><br>
 							<span style='color: #3c8dbc;font-weight: bold'>Informasi</span>
 						</div>

 						<div style="display: inline-block" >
 							<i  style="font-size: 45px;" id='selesai-sesi' class="ion ion-information-circled"></i> <br>
 							<span style='color: #3c8dbc;font-weight: bold'>Selesai</span>
 						</div>

 					</div>


 					<div class='form-database' >
					<div class='form-group'>
						<label>Host</label>
						<input type='text' class='form-control' id="host_database" value='localhost' />
					</div>

					<div class='form-group'>
						<label>Nama Database</label>
						<input type='text' class='form-control' id="nama_database" />
					</div>

					<div class='form-group'>
						<label>User Database</label>
						<input type='text' class='form-control' id="user_database" value='root' />
					</div>

					<div class='form-group'>
						<label>Password Database</label>
						<input type='text' class='form-control' id="password_database" />
					</div>

					<div class='form-group'>
						<button class="btn btn-info" id="cek-database">Lanjut</button>
					</div>

				</div>

				<div class="form-informasi" style="display: none">

					<div class="form-group">
						<label>Nama Website</label>
						<input type="text" class="form-control" id="nama_website" />
					</div>

					<div class="form-group">
						<label>Nama User (Nama Lengkap)</label>
						<input type="text" class="form-control" id="nama_user" />
					</div>

					<div class="form-group">
						<label>User Login</label>
						<input type="text" class="form-control" id="nama_user_login" value="admin" />
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" id="password_user" />
					</div>

					<div class="form-group">
						<label>Ulangi Password</label>
						<input type="password" class="form-control" id="ulangi_password" />
					</div>

					<div class="form-group">
						<label>Base URL</label>
						<input type="text" class="form-control" id="base_url" value="<?php echo siteURL(); ?>" />
					</div>

					<div class="form-group">
						<label>Directory</label>
						<input type="text" class="form-control" id="directory" value="<?php echo $dir; ?>" />
					</div>

					<div class="form-group">
						<button class="btn btn-primary" id="setting-informasi">Lanjut</button>
					</div>

				</div>


				<div class='form-finish' style="margin-top: 60px; text-align: center; display:none">

					<i class='ion ion-checkmark-round' style='font-size: 130px; color:green'></i><br>
					<span style="color:green;font-weight: bold">Aplikasi Berhasil Terinstal</span> 

					<br>
					<br>
					<br>
					<button class='btn btn-danger tombol-finish'>Finish! Klik tombol ini</button>
					<br>
					<br>
					<br>
					<div class="alert alert-success" role="alert"><strong>Langkah terakhir</strong>
						<br> 
						- Klik Tombol Finish diatas<br>
						- Hapus folder "set-up" <br><br><br>

						<STRONG>Terimah Kasih telah menggunakan aplikasi ini</STRONG>

					</div>

				</div>


 				</div>



 			</div>


		</div>

	</div>

</div>

<div class="modal fade" id="modalError">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Terjadi Kesalahan</h4>
      </div>
      <div class="modal-body">
        <p>Kesalahan:</p>
        <p><span class='kesalahan-status'></span></p>
        <p></p><p></p>
        <p>Silahkan Coba Lagi</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript" src="assets/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>


<script type="text/javascript">

	$(function(){

		var nama_database,
			host_database,
			user_database,
			password_database,

			nama_website,
			nama_user,
			nama_user_login,
			password_user,

			base_url,
			directory;



		$(document).on("click","#cek-database",function(){
			var _this=$(this);

			if($("#host_database").val()==""){
				alert("Masukan Host")
				return false;
			}

			if($("#nama_database").val()==""){
				alert("Masukan nama database");
				return false;
			}

			if(!_this[0].memproses){
				_this[0].memproses=true;
				_this.html("memproses...");

				var host=$("#host_database").val();
				var nama=$("#nama_database").val();
				var user=$("#user_database").val();
				var password=$("#password_database").val();

				$.ajax({
					type:"POST",
					data: {
						nama:nama,
						host:host,
						user:user,
						password:password
					},
					url: "cek_database.php",
					cache:false,
					dataType: "json",
					success: function(a){
						if(a.status=='error'){
							alert(a.pesan);
						} else {							
							nama_database=nama;
							host_database=host;
							user_database=user;
							password_database=password;

							$("#database-sesi").attr("class","ion ion-checkmark-circled").css("color","green");
							$(".form-database").slideUp();
							$(".form-informasi").slideDown();
							$("#informasi-sesi").css("font-size","55px");


						}
					},
					error: function(){
						alert("Terjadi kesalahan. Silahkan coba lagi ");
						_this.html("Lanjut");
						_this[0].memproses=false;
					},
					complete: function(){
						_this[0].memproses=false;	
						_this.html("Lanjut");

					}
				});

			}
		});


	$(document).on("click","#setting-informasi",function(){
		nama_website=$("#nama_website").val();
		nama_user=$("#nama_user").val();
		nama_user_login=$("#nama_user_login").val();
		password_user=$("#password_user").val();

		var ulangi_password=$("#ulangi_password").val();

		base_url=$("#base_url").val();
		directory=$("#directory").val();

		var _this=$(this);
		if(!_this[0].memproses){
			_this[0].memproses=true;

			if(nama_website==""){
				alert("Masukan nama website");
				_this[0].memproses=false;
				$("#nama_website").focus();
			} else if (nama_user==""){
				alert("Masukan nama lengkap kamu");
				_this[0].memproses=false;
				$("#nama_user").focus();
			} else if(nama_user_login==""){
				alert("Masukan nama user login");
				_this[0].memproses=false;
				$("#nama_user_login").focus();
			} else if(!/^[\w]+$/.test(nama_user_login)){
				alert("Hanya diperbolehkan huruf, angka dan underscore");
				_this[0].memproses=false;
				$("#nama_user_login").focus();			
			} else if(password_user.length<8){
				alert("Password minimal 8 karakter");
				_this[0].memproses=false;			
				$("#password_user").focus();		
			} else if (ulangi_password != password_user){
				alert("Password tidak sama");
				_this[0].memproses=false;	
				$("#ulangi_password").focus();
			} else {
				_this.html("Memproses...");
				
				$.ajax({
					type:"POST",
					url:"proses.php",
					data: {

					nama_database:nama_database,
					host_database:host_database,
					user_database:user_database,
					password_database:password_database,

					nama_website:nama_website,
					nama_user:nama_user,
					nama_user_login:nama_user_login,
					password_user:password_user,

					base_url:base_url,
					directory:directory

					},
					dataType: "json",
					cache:false,
					success: function(a){
						if(a.status=="error"){
							_this.html("Lanjut");
							_this[0].memproses=false;
							$(".kesalahan-status").html(a.responseText);
				  		$('#modalError').modal('show')
						} else {
							_this.html("Lanjut");
							_this[0].memproses=false;
							$("#informasi-sesi").attr("class","ion ion-checkmark-circled").css("color","green");
							$(".form-informasi").slideUp();
							$("#selesai-sesi").css("font-size","55px");
							$(".form-finish").slideDown();

						}
					},
					error: function(a,b,c){
					$(".kesalahan-status").html(a.responseText);
					$('#modalError').modal('show')
					_this.html("Lanjut");
					_this[0].memproses=false;	

					}, 
					complete: function(){

					}
				});

			}
		}
	})


	$(document).on("click",".tombol-finish",function(){
		_this=$(this);
		if(!_this[0].memproses){
			_this[0].memproses=true;
			$.ajax({
				type:"post",
				data:{akses:"ok"},
				url:"finish.php",
				cache:false,
				success: function(){
					window.location.href=base_url+directory;
				}
			})
		}
	});


	});

</script>


</body>
</html>