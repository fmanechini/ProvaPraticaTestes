<?php
	include 'db.php';
	
	$sql = "SELECT * FROM colecionavel WHERE id=$_GET[id]";
	
  	$con = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Atualizar Cliente</title>
	</head>
	<body>
		<h1>Atualizar Cliente</h1>
		<hr>
			<form method="post" action="">
				<?php if($dados = mysqli_fetch_array($con)) { ?>
				<table>
					<tr>
						<td>Nome:</td>
						<td><input type="text" name="nome" value=<?php echo $dados['nome']; ?>></td>
					</tr>
					<tr>
						<td>Tipo:</td>
						<td><input type="text" name="tipo" value=<?php echo $dados['tipo']; ?>></td>
					</tr>
					<tr>
						<td>Tempo:</td>
						<td><input type="text" name="tempo" value=<?php echo $dados['tempo']; ?>></td>
					</tr>
					<tr>
						<td>Proprietário:</td>
						<td><input type="text" name="id_colecionador" value=<?php echo $dados['id_colecionador']; ?>></td>
					</tr>
					<tr>
						<td>Detalhes:</td>
						<td><input type="text" name="detalhes" value=<?php echo $dados['detalhes']; ?>></td>
					</tr>
					<tr>
						<td>Quantidade:</td>
						<td><input type="text" name="quantidade" value=<?php echo $dados['quantidade']; ?>></td>
					</tr>
				</table>

				<?php
					if (!empty($_POST['nome'])and($_POST['tipo'])and($_POST['tempo'])and($_POST['id_colecionador'])and($_POST['detalhes'])and($_POST['quantidade'])){
                        $nome 	= $_POST['nome'];
                        $tipo 	= $_POST['tipo'];
                        $tempo = $_POST['tempo'];
                        $id_colecionador = $_POST['id_colecionador'];
                        $detalhes = $_POST['detalhes'];
                        $quantidade 	= $_POST['quantidade'];
						$id = $_GET['id'];
						$sql = mysqli_query($conexao,"UPDATE colecionador SET nome='$nome', tipo='$tipo', tempo='$tempo', id_colecionador='$id_colecionador', detalhes='$detalhes', quantidade='$quantidade'WHERE id=".$id);
						header("Location: http://localhost/crud/templates/lista.php");
				}
				?>
				
				
				<input type="submit" value="Atualizar">
				<?php } ?>
			</form>
		<a href="lista.php"><input type="submit" value="voltar"></a>
	</body>
</html>