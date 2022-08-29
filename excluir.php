<?php 

require('conexao.php');

$id = $_GET['id'];

$sql = "DELETE FROM produtos WHERE ID_P = $id";

if (mysqli_query($con, $sql)) {

	header('location: index.php');
	exit();
	
}else{
	echo "ERRO AO EXCLUIR!";
}

?>