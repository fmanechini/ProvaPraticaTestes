<?php
	include 'db.php';
	$sql = "SELECT * FROM colecionavel cv INNER JOIN colecionador cd ON cv.id_colecionador = cd.idColecionador ORDER BY cv.idColecionavel";
	$con = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Lista de Colecionáveis</title>
  </head>
  <body>
    <div class="container" style="margin-top:35px;">
		<h1>Lista de Colecionáveis</h1>
		<hr>
    <table border="3" width="100%" class="table">
			<tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Tipo</th>
            <th scope="col">Tempo</th>
            <th scope="col">Proprietário</th>
            <th scope="col">Detalhes</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Deletar</th>
            <th scope="col">Editar</th>
			</tr>
		<?php while($dados = mysqli_fetch_assoc($con)) { ?>
           <tbody>
				<tr>
					<td><?php echo $dados['idColecionavel']; ?></td>
					<td><?php echo $dados['nome']; ?></td>
					<td><?php echo $dados['tipo']; ?></td>
					<td><?php echo $dados['tempo']; ?></td>
					<td><?php echo $dados['nome_completo']; ?></td>
					<td><?php echo $dados['detalhes']; ?></td>
					<td><?php echo $dados['quantidade']; ?></td>
					<td><center><a href="del.php?id=<?php echo $dados['idColecionavel'] ?>"><input class="btn btn-dark" type="submit" value="DELETAR"></a></center></td>
					<td><center><a href="atualizar.php?id=<?php echo $dados['idColecionavel'] ?>"><input class="btn btn-dark" type="submit" value="EDITAR"></a></center></td>
            </tr>
            </tbody>
        <?php } ?>
    </table>

    <a href="../index.php"><input type="submit" class="btn btn-secondary btn-lg" value="voltar"></a>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</div>
</body>
</html>