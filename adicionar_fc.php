<?php

require('conexao.php');

$nomeF = $_POST['nomeF'];
$nomeC1 = $_POST['nomeC1'];
$nomeC2 = $_POST['nomeC2'];
$nomeC3 = $_POST['nomeC3'];

$sql = "INSERT INTO fabricante_categoria (Nome_F, Nome_C1, Nome_C2, Nome_C3) VALUES ('$nomeF', '$nomeC1', '$nomeC2', '$nomeC3')";

if (mysqli_query($con, $sql)) {

	header('location: index.php');
	exit();
	
}else{
	echo "ERRO AO INSERIR DADOS!";
}





?>