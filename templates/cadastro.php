<?php
include 'db.php';
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>CADASTRO</title>
</head>

<body>
	<div class="container" style="margin-top:35px;">
		<h1>Cadastro de Colecionáveis</h1>

		<hr>
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" class="form-control" placeholder="Insira seu nome" name="nome">
		</div>
		<div class="form-group">
			<label>Tipo:</label>
			<input type="select" class="form-control" placeholder="Insira o tipo do seu colecionavel" name="tipo">
		</div>
		<div class="form-group">
			<label>Tempo (em meses):</label>
			<input type="int" class="form-control" placeholder="Insira a idade do seu item">
		</div>

		<div class="form-group">
			<label>Quantidade:</label>
			<input type="int" name="quantidade" class="form-control" placeholder="Insira a quantidade do seu item">
		</div>
		<div class="form-group">
			<label>Detalhes:</label>
			<textarea class="form-control" name="detalhes" id="exampleFormControlTextarea1" placeholder="Insira os detalhes do seu colecionavel" rows="3"></textarea>
		</div>


		<input type="submit" class="btn btn-primary btn-lg" value="Salvar">
		</form>
		<a href="../index.php"><input type="submit" class="btn btn-secondary btn-lg" value="voltar"></a>

	</div>
	<?php //inserindo as informações do cliente no banco de dados.
	if (!empty($_POST['nome']) and ($_POST['tipo']) and ($_POST['tempo']) and ($_POST['id_colecionador']) and ($_POST['detalhes']) and ($_POST['quantidade'])) {
		$nome 	= $_POST['nome'];
		$tipo 	= $_POST['tipo'];
		$tempo = $_POST['tempo'];
		$id_colecionador = $_POST['id_colecionador'];
		$detalhes = $_POST['detalhes'];
		$quantidade 	= $_POST['quantidade'];
		$erro = 0;
		$sql = mysqli_query($conexao, "INSERT INTO colecionavel(nome, tipo, tempo, id_colecionador, detalhes, quantidade)
					VALUES('$nome','$tipo', '$tempo', '$id_colecionador', '$detalhes', '$quantidade')");
		//header("Location: http://localhost/crud/templates/lista.php");
		echo '<h1>CADASTRADO COM SUCESSO!</h1>';
	}
	// $sql = mysql_query("DELETE FROM colecionavel WHERE id > 2");
	?>




	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>