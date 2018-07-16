<?php 

if(file_exists("../starting") AND isset($_POST['nama_database'])) {

$nama_database=$_POST['nama_database'];

$host_database=$_POST['host_database'];
$user_database=$_POST['user_database'];
$password_database=$_POST['password_database'];

$nama_website=$_POST['nama_website'];
$nama_user=$_POST['nama_user'];
$nama_user_login=$_POST['nama_user_login'];
$password_user=password_hash(sha1(md5($_POST['password_user'])),PASSWORD_BCRYPT);
$base_url=$_POST['base_url'];
$directory=trim($_POST['directory'],"/");


//$db = new mysqli($host_database,$user_database,$password_database,$nama_database);
$db = new PDO("mysql:host=$host_database;dbname=$nama_database", $user_database, $password_database);


$projectAddress = strlen(trim($directory))>0?rtrim($base_url,"/")."/".$directory : rtrim($base_url,"/");

$listString = array("http://localhost/apricot","http://localhost/cms");
//$forReplace = [$projectAddress,$projectAddress];

$templine = '';
$lines = file("db.sql");
foreach ($lines as $line)
{
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

$templine .= $line;
if (substr(trim($line), -1, 1) == ';')
{
		$templine = str_replace($listString,$projectAddress,$templine);

    $db->prepare($templine)->execute();
    $templine = '';
}
}
 


 $db->prepare("UPDATE informasi SET nama=:nama WHERE id=:id")->execute(array('nama'=>$nama_website,'id'=>1));

 $db->prepare("UPDATE user SET name_user=:name_user ,nama_lengkap=:nama_lengkap,
 password_user=:password_user, avatar_user=:avatar_user WHERE id_user=:id_user")
 ->execute(array('name_user'=>$nama_user_login,
		 'nama_lengkap'=>$nama_user,
		 'password_user'=> $password_user,
		 'avatar_user'=> 'default.jpg',
		 'id_user'=>1
		 ));

 $db->query("DROP TABLE `z_deleted`");


$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < 32; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}
$key= $randomString;






$init="../init.php";

$string="<?php

\$general = array(

		//Nama Server
		\"root_dir\"=>\"$base_url\",
	    \"didalamSubDomain\"=>false,

	    /*
	    Ini merupakan sub directory root project kamu.
	    Misalnya, jika project kamu berada didalam 
	    http://localhost/web-saya/,
	    isi nilainya dengan \"web-saya\".

	    begitupun berada didalam 
	    http://domainkamu.com/folder/subfolder/
	    isi nilainya dengan \"folder/subfolder\"
	    */
		\"sub_dir\"=>\"$directory\",



		\"encryption_key\"=>\"$key\",


		/*
		WIB : Asia/Jakarta
		WITA : Asia/Makassar
		WIT: Asia/Jayapura
		 */
		\"time_zone\"=>\"Asia/Jakarta\", //WIB

		//pengaturan database
		\"DB_hostname\"=>\"$host_database\",
		\"DB_username\"=>\"$user_database\",
		\"DB_password\"=>\"$password_database\",
		\"DB_database\"=>\"$nama_database\"
	);
";

$file=fopen($init, 'w');
fwrite($file, $string);
fclose($file);

/*
$db->query("UPDATE informasi
			SET nama='$nama_website' WHERE id='1'
	");

$db->query("UPDATE user
			SET name_user='$nama_user_login',
				nama_lengkap='$nama_user',
				password_user='$password_user',
				avatar_user='default.jpg' WHERE id_user='1' 
		");
*/

/*

function tableExists($pdo, $table) {


    try {
        $result = $pdo->query("SELECT 1 FROM $table LIMIT 1");
    } catch (Exception $e) {
        // We got an exception == table not found
        return FALSE;
    }

    return $result !== FALSE;
}



$updateInfo = false;

while ((tableExists($db,'informasi') == false) OR !$updateInfo) {
	if(tableExists($db,'informasi') == true){
	 //update
		$query= $db->prepare("SELECT * FROM informasi WHERE id=?");
		$hasil=$query->execute(array('1'));

		if($query->rowCount()>0){
			$infoQuery="UPDATE informasi SET nama=:nama WHERE id=:id";

			$coba= $db->prepare($infoQuery);
			$ll= $coba->execute(array('nama'=>$nama_website,'id'=>1));
			if($ll){	
				$query0= $db->prepare("SELECT * FROM informasi WHERE id=? AND nama=?");
				$hasil0=$query0->execute(array('1',$nama_website));
				if($query0->rowCount()>0){
					//echo "hasil ".$query0->rowCount();
					$updateInfo = true;
				}			
				
			}
			
		}

	}
}


//echo $update;

$updateUser = false;
while ((tableExists($db,'user') == false) OR !$updateUser) {
	if(tableExists($db,'user') == true){
		$query= $db->prepare("SELECT * FROM user WHERE id_user=?");
		$hasil=$query->execute(array('1'));

		if($query->rowCount()>0){
			 $userQuery= "UPDATE user SET name_user=:name_user ,nama_lengkap=:nama_lengkap,
			 password_user=:password_user, avatar_user=:avatar_user WHERE id_user=:id_user";
			 $proses=$db->prepare($userQuery);
			 $hm=$proses->execute(array('name_user'=>$nama_user_login,
												 'nama_lengkap'=>$nama_user,
												 'password_user'=> $password_user,
												 'avatar_user'=> 'default.jpg',
												 'id_user'=>1
												 ));
			if($hm){
				$query1= $db->prepare("SELECT * FROM user WHERE id_user=? AND name_users=?");
				$hasil1=$query1->execute(array('1',$nama_user_login));
				if($query->rowCount()>0){					
					$updateUser= true;	
				}
				
			}
	  }

	}

}
*/

		





//$db->close();

echo json_encode(array("status"=>"succses"));

}
?>
