<?php 

$host=$_POST['host'];
$database=$_POST['nama'];
$user=$_POST['user'];
$password=$_POST['password'];

try{

	$pdo= new PDO("mysql:host=$host;dbname=$database", $user, $password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	echo json_encode(array("status"=>"success"));

} catch(PDOException $e){

	echo json_encode(array('status'=>'error','pesan'=>$e->getMessage()));
}

?>