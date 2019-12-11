<?php

	include 'db.php';
	// Query para selecionar o item que se deseja editar no banco de dados
	$sql = "SELECT * FROM colecionavel WHERE idcolecionavel=$_GET[id]";
	
  	$con = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
?>
<!DOCTYPE html>
<html>
	<head>  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>Atualizar Colecionável</title>
	</head>
	<body>
    <div class="container" style="margin-top:35px;">
		<h1>Atualizar Colecionável</h1>
		<hr>
			<!-- quando enviar o form, ele executa a função de validação antes de fazer o submit -->
			<form method="post" name="cadastro" onsubmit="event.preventDefault(); validacao();">
			<div id="add_to_me"></div>
				<?php if($dados = mysqli_fetch_array($con)) { ?>
        <div class="form-group">
        <label>Nome:</label>
        <input type="text" class="form-control" placeholder="" name="nome" value=<?php echo $dados['nome']; ?>>
    </div>
    <div class="form-group">
        <label>Tipo:</label>
        <select class="form-control" name="tipo">
            <option value=<?php echo $dados['tipo']; ?> selected disabled hidden><?php echo $dados['tipo']; ?></option>
            <option value="Objeto">Objeto</option>
            <option value="Camiseta">Camiseta</option>
            <option value="Quadrinhos">Quadrinhos</option>
        </select>
    </div>
    <div class="form-group">
        <label>Tempo (em meses):</label>
        <input type="int" class="form-control" placeholder="" name="tempo" value=<?php echo $dados['tempo']; ?>>
    </div>
    <div class="form-group">
        <label>Proprietário:</label>
        <input type="select" class="form-control" placeholder="" name="id_colecionador" value=<?php echo $dados['id_colecionador']; ?>>
    </div>

    <div class="form-group">
        <label>Detalhes:</label>
        <textarea class="form-control" name="detalhes" id="exampleFormControlTextarea1" placeholder="Insira os detalhes do seu colecionavel" rows="3"><?php echo $dados['detalhes']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Quantidade:</label>
        <input type="int" name="quantidade" class="form-control" placeholder="" value=<?php echo $dados['quantidade']; ?>>
    </div>

				<?php
					if (!empty($_POST['nome'])and($_POST['tipo'])and($_POST['tempo'])and($_POST['id_colecionador'])and($_POST['detalhes'])and($_POST['quantidade'])){
                        $nome 	= $_POST['nome'];
                        $tipo 	= $_POST['tipo'];
                        $tempo = $_POST['tempo'];
                        $id_colecionador = $_POST['id_colecionador'];
                        $detalhes = $_POST['detalhes'];
                        $quantidade 	= $_POST['quantidade'];
						$id = $_GET['id'];
						$sql = mysqli_query($conexao,"UPDATE colecionavel SET nome='$nome', tipo='$tipo', tempo='$tempo', id_colecionador='$id_colecionador', detalhes='$detalhes', quantidade='$quantidade'WHERE idcolecionavel=".$id);
						header("Location: http://localhost/provapraticatestes/templates/lista.php");
						//adiciona uma mensagem de sucesso quando o cadastro é realizado com sucesso
						echo "<script>document.getElementById('add_to_me').innerHTML = \"<div class='alert alert-success' role='alert'> Cadastro Realizado com Sucesso</div>\"</script>";
				}
				?>
				
				    <input type="submit" class="btn btn-primary btn-lg" value="Atualizar">
        <?php } ?>
    </form>
		<a href="lista.php"><input type="submit" value="voltar" class="btn btn-secondary btn-lg"></a>

</div>
    
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