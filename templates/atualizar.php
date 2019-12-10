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
			<form method="post" name="cadastro" onsubmit="event.preventDefault(); validacao();">
			<div id="add_to_me"></div>
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
						//adiciona uma mensagem de sucesso quando o cadastro é realizado com sucesso
						echo "<script>document.getElementById('add_to_me').innerHTML = \"<div class='alert alert-success' role='alert'> Cadastro Realizado com Sucesso</div>\"</script>";
				}
				?>
				
				
				<input type="submit" value="Atualizar">
				<?php } ?>
			</form>
		<a href="lista.php"><input type="submit" value="voltar"></a>
		<script type="text/javascript">
        // função para conferir se um valor é um numero inteiro usada para validacao dos forms
        function isInt(value) {
            var x;
            if (isNaN(value)) {
                return false;
            }
            x = parseFloat(value);
            return (x | 0) === x;
        }

        function validacao() {
            // Este é o padrão para validar se o nome não contém simbolos, numeros, somente espaços ou espaços duplos no meio do texto
            const re = /^[a-zA-ZáÁéÉíÍóÓúÚ](?!.*\s{2})([a-zA-ZáÁéÉíÍóÓúÚ\s]+).{0,100}[a-zA-ZáÁéÉíÍóÓúÚ]$/
            // Validação do nome para não conter simbolos, numeros, somente espaços ou espaços duplos no meio do texto
            if (!re.test(document.getElementsByName("nome")[0].value)) {
                document.getElementById("add_to_me").innerHTML = "<div class='alert alert-danger' role='alert'>O nome não deve conter símbolos ou numeros e deve conter 3 ou mais caracteres</div>";
                document.getElementsByName("nome")[0].focus();
                return false;
            }
            // Validação do tempo conferindo se é um numero inteiro
            if (!isInt(document.getElementsByName("tempo")[0].value)) {
                document.getElementById("add_to_me").innerHTML = "<div class='alert alert-danger' role='alert'> O tempo deve ser um número inteiro</div>";
                document.getElementsByName("tempo")[0].focus();
                return false;
            }
            // Validacao dos detalhes verificando se possui pelo menos 3 caracteres
            if ((document.getElementsByName("detalhes")[0].value).length < 3) {
                document.getElementById("add_to_me").innerHTML = "<div class='alert alert-danger' role='alert'> Este campo deve conter mais de 3 caracteres</div>";
                document.getElementsByName("detalhes")[0].focus();
                return false;

            }
            // Validação da quantidade conferindo se é um numero inteiro
            if (!isInt(document.getElementsByName("quantidade")[0].value)) {
                document.getElementById("add_to_me").innerHTML = "<div class='alert alert-danger' role='alert'> A quantidade deve ser um número inteiro</div>";
                document.getElementsByName("quantidade")[0].focus();
                return false;
            }
			document.getElementsByName("cadastro")[0].submit(); 
            return true;

        }
    </script>
	</body>
</html>