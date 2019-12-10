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
    <h1>Cadastro de Colecionáveis</h1>
    <hr>
    <form method="post" name="cadastro" onsubmit="event.preventDefault(); validacao();">
        <table>
		<div id="add_to_me"></div>
            <tr>
                <td>Nome do Item:</td>
				<td><input type="text" name="nome"></td>
				
            </tr>
            <tr>
                <td>Tipo:</td>
                <td><input type="text" name="tipo"></td>
            </tr>
            <tr>
                <td>Tempo (em anos):</td>
                <td><input type="text" name="tempo"></td>
            </tr>
            <tr>
                <td>Proprietário:</td>
                <td><input type="text" name="id_colecionador"></td>
            </tr>
            <tr>
                <td>Detalhes:</td>
                <td><input type="text" name="detalhes"></td>
            </tr>
            <tr>
                <td>Quantidade:</td>
                <td><input type="text" name="quantidade"></td>
            </tr>
        </table>
        <input type="submit" value="Salvar">
    </form>

    <?php //inserindo as informações do cliente no banco de dados.
    if (!empty($_POST['nome']) and ($_POST['tipo']) and ($_POST['tempo']) and ($_POST['id_colecionador']) and ($_POST['detalhes']) and ($_POST['quantidade'])) {
        $nome   = $_POST['nome'];
        $tipo   = $_POST['tipo'];
        $tempo = $_POST['tempo'];
        $id_colecionador = $_POST['id_colecionador'];
        $detalhes = $_POST['detalhes'];
        $quantidade = $_POST['quantidade'];
		$erro = 0;
        $sql = mysqli_query($conexao, "INSERT INTO colecionavel(nome, tipo, tempo, id_colecionador, detalhes, quantidade)
                    VALUES('$nome','$tipo', '$tempo', '$id_colecionador', '$detalhes', '$quantidade')");
        //header("Location: http://localhost/crud/templates/lista.php");
		//adiciona uma mensagem de sucesso quando o cadastro é realizado com sucesso
        echo "<script>document.getElementById('add_to_me').innerHTML = \"<div class='alert alert-success' role='alert'> Cadastro Realizado com Sucesso</div>\"</script>";
    } 
    // $sql = mysql_query("DELETE FROM colecionavel WHERE id > 2");
    ?>
	<a href="../index.php"><input type="submit" value="voltar"></a>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
