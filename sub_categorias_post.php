<?php 
include('conexao.php');

	$id_categoria = $_REQUEST['id_categoria'];
	
	$result_sub_cat = "SELECT * FROM fabricante_categoria WHERE ID_FC=$id_categoria";
	$resultado_sub_cat = mysqli_query($con, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_categorias_post[] = array(
			'ID_FC'	=> $row_sub_cat['ID_FC'],
			'Nome_C1' => utf8_encode($row_sub_cat['Nome_C1']),
			'Nome_C2' => utf8_encode($row_sub_cat['Nome_C2']),
			'Nome_C3' => utf8_encode($row_sub_cat['Nome_C3']),
		);
	}
	
	echo(json_encode($sub_categorias_post));

?>