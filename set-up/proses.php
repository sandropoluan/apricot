<?php 

if(file_exists("../starting") AND isset($_POST['nama_database'])) {

$nama_database=$_POST['nama_database'];

$host_database=$_POST['host_database'];
$user_database=$_POST['user_database'];
$password_database=$_POST['password_database'];

$nama_website=$_POST['nama_website'];
$nama_user=$_POST['nama_user'];
$nama_user_login=$_POST['nama_user_login'];
$password_user=md5($_POST['password_user']);
$base_url=$_POST['base_url'];
$directory=$_POST['directory'];


$pdo = new PDO("mysql:host=$host_database;dbname=$nama_database", $user_database, $password_database);


$templine = '';
$lines = file("db.sql");
foreach ($lines as $line)
{
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

$templine .= $line;
if (substr(trim($line), -1, 1) == ';')
{
    $pdo->query($templine);
    $templine = '';
}
}
 

//update
$pdo->query("UPDATE informasi
			SET nama='$nama_website' WHERE id='1'
	");

$pdo->query("UPDATE user 
			SET name_user='$nama_user_login',
				nama_lengkap='$nama_user',
				password_user='$password_user',
				avatar_user='default.jpg' WHERE id_user='1' 
		");


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


echo json_encode(array("status"=>"succses"));

}
?>
