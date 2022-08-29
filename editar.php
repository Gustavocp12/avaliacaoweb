<?php 

require('conexao.php');

$id = $_POST['id'];
$nomeP = $_POST['nomeP'];
$fabricante = $_POST['id_categoria'];
$categoria = $_POST['id_sub_categoria'];
$preco = $_POST['preco'];

$sq = "SELECT Nome_F FROM fabricante_categoria WHERE ID_FC = '$fabricante'";

$qry = mysqli_query($con, $sq);

$exib = mysqli_fetch_array($qry);

$nome = $exib[0];

$sql = "UPDATE produtos SET Nome_P='$nomeP', Nome_F='$nome', categoria='$categoria', Preco='$preco', ID_FC='$fabricante' WHERE ID_P = $id;";

if (mysqli_query($con, $sql)) {
	
	header('location: index.php');
	exit();

}else{
	echo "ERRO AO ATUALIZAR OS DADOS!";
}

exit();


?>