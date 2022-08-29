<?php

require('conexao.php');

$nomeP = $_POST['nomeP'];
$fabricante = $_POST['id_categoria'];
$categoria = $_POST['id_sub_categoria'];
$preco = $_POST['preco'];

$sq = "SELECT Nome_F FROM fabricante_categoria WHERE ID_FC = '$fabricante'";

$qry = mysqli_query($con, $sq);

$exib = mysqli_fetch_array($qry);

$nome = $exib[0];

$sql = "INSERT INTO produtos (Nome_P, Nome_F, Categoria, Preco, ID_FC) VALUES ('$nomeP', '$nome', '$categoria', '$preco', '$fabricante')";

if (mysqli_query($con, $sql)) {

	header('location: index.php');
	exit();
	
}else{
	echo "ERRO AO INSERIR DADOS!";
}





?>