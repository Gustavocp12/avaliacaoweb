<?php 

require('conexao.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilo-index-final.css">
	<title>Loja interativa</title>
	<style type="text/css">
			.carregando{
				color:#ff0000;
				display:none;
			}
		</style>
</head>
<body>

	<div class="corpo">
		
		<div class="fc">
		<h1 style="color: blue;">Fabricante e categoria</h1>
			<form method="POST" action="adicionar_fc.php">
				<label style="color: #005580; margin-left: 8px;">FABRICANTE</label><br>
				<input type="text" name="nomeF" id="caixa-1" placeholder="Nome do fabricante"><br>
				<label style="color: #005580; margin-left: 8px;">CATEGORIA</label><br>
				<input type="text" name="nomeC1" id="caixa-1" placeholder="Categoria 1"><br>
				<input type="text" name="nomeC2" id="caixa-1" placeholder="Categoria 2"><br>
				<input type="text" name="nomeC3" id="caixa-1" placeholder="Categoria 3"><br>
				<input type="submit" name="" value="Adicionar" id="btn-1">
			</form>
		</div>

		<div class="prod">
		<h1 style="color: blue;">Produtos</h1>
			<form method="POST" action="adicionar_prod.php">
				<label style="color: #005580; margin-left: 8px;">NOME DO PRODUTO</label><br>
				<input type="text" name="nomeP" id="caixa-2" placeholder="Nome do produto"><br>
				<label style="color: #005580; margin-left: 8px;">FABRICANTE</label><br>
				<select name="id_categoria" id="id_categoria" class="caixa-2">
					<option>Escolha</option>
					<?php

					$sq = "SELECT * FROM fabricante_categoria";
					$qry = mysqli_query($con, $sq);

					while ($exib = mysqli_fetch_array($qry)) {

						echo '<option value="'.$id = $exib[0].'">'.$nomeF = $exib[1].'</option>';

				 } ?>
				</select><br>
				<label style="color: #005580; margin-left: 8px;">CATEGORIA</label><br>
				<span class="carregando">Carregando...</span>
				<select  name="id_sub_categoria" id="id_sub_categoria" class="caixa-2">
					<option value="">Escolha</option>
				</select><br>
				<label style="color: #005580; margin-left: 8px;">PREÇO</label><br>
				<input type="number" name="preco" id="caixa-2" placeholder="Preço do produto"><br>
				<input type="submit" name="" value="Adicionar" id="btn-2">
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
		<center>
		<table style="margin-top: 100px; border: 3px solid black; border-radius: 2px;">
			<tr>
				<th>ID</th>
				<th>Nome Produto</th>
				<th>Fabricante</th>
				<th>Categoria</th>
				<th>Preço</th>
			</tr>

		<?php 

		$sql = "SELECT * FROM produtos";

		$query = mysqli_query($con, $sql);

		while ($exibir = mysqli_fetch_array($query)) {
			
			$id = $exibir[0];
			$nomeP = $exibir[1];
			$nomeF = $exibir[2];
			$categoria = $exibir[3];
			$preco = $exibir[4];
			$id_fc = $exibir[5];

		?>
			<tr>
				<th><?php echo $id_fc; ?></th>
				<th><?php echo $nomeP; ?></th>
				<th><?php echo $nomeF; ?></th>
				<th><?php echo $categoria; ?></th>
				<th>R$ <?php echo $preco; ?></th>
				<th>
				<form method="GET" action="editor.php">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="submit" name="" value="Editar" id="btn-3">
				</form>
				</th>
				<th>
				<form method="GET" action="excluir.php">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="submit" name="" value="Excluir" id="btn-3">
				</form>
				</th>
			</tr>
			<?php } ?>
		</table>
		</center>

	</div>

</body>
</html>