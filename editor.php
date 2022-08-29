<?php 

require('conexao.php');

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE ID_P = '$id'";

$query = mysqli_query($con, $sql);

$exibir = mysqli_fetch_array($query);

$nome = $exibir[1];
$preco = $exibir[4];


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilo-edit.css">
	<title>Produtos</title>
</head>
<body>

	<div class="corpo">
		
		<div class="form">
		<h1>Produtos</h1>
		<form method="POST" action="editar.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<label>NOME DO PRODUTO</label><br>
			<input type="text" name="nomeP" id="caixa-1" value="<?php echo $nome ?>"><br>
			<label>FABRICANTE</label><br>
			<select name="id_categoria" id="id_categoria" class="caixa-1">
				<option>Escolha</option>
					<?php

					$sq = "SELECT * FROM fabricante_categoria";
					$qry = mysqli_query($con, $sq);

					while ($exib = mysqli_fetch_array($qry)) {

						echo '<option value="'.$id = $exib[0].'">'.$nomeF = $exib[1].'</option>';

				 } ?>
				</select><br>
			<label>CATEGORIA</label><br>
				<select  name="id_sub_categoria" id="id_sub_categoria" class="caixa-1">
					<option value="">Escolha</option>
				</select><br>
			<label>PREÇO</label><br>
			<input type="number" name="preco" id="caixa-1" value="<?php echo $preco ?>"><br>
			<input type="submit" name="" id="btn-1" value="Salvar"><br>
		</form>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script type="text/javascript">
		  google.load("jquery", "1.4.2");
		</script>
		
		<script type="text/javascript">
		$(function(){
			$('#id_categoria').change(function(){
				if( $(this).val() ) {
					$('#id_sub_categoria').hide();
					$('.carregando').show();
					$.getJSON('sub_categorias_post.php?search=',{id_categoria: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].Nome_C1 + '">' + j[i].Nome_C1 + '</option>';
							options += '<option value="' + j[i].Nome_C2 + '">' + j[i].Nome_C2 + '</option>';
							options += '<option value="' + j[i].Nome_C3 + '">' + j[i].Nome_C3 + '</option>';
						}	
						$('#id_sub_categoria').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#id_sub_categoria').html('<option value="">– Escolha –</option>');
				}
			});
		});
		</script>
		</div>

	</div>

</body>
</html>