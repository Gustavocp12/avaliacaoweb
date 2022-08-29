<?php 

$hostname = "localhost";
$bd = "avaliacao";
$user = "root";
$password = "";


$con = mysqli_connect($hostname, $user, $password, $bd);

if (mysqli_connect_errno()) {
	echo "Falha ao se conectar!" . mysqli_connect_errno();
	exit();
}


?>