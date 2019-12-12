<?php
include 'db.php';

$sql = "SELECT idcolecionador, nome_completo FROM colecionador";
$con = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
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
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
<div class="container">
  <a class="navbar-brand" href="../index.php" style="flex-grow: 1">Início</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content : flex-end">
    
    <form class="form-inline my-2 my-lg-0" style="width :80%; margin:1px" >
    <div class="col" style=>
      <input class="form-control" type="search" placeholder="Search" aria-label="Search" >
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    </div>
  </div>
  </div>
</nav>
 
  <div class="container" style="margin-top:35px;">
  
    <h1>Cadastro de Colecionáveis</h1>
    <hr>
    <form method="post" name="cadastro" onsubmit="event.preventDefault(); validacao();">
		<div id="add_to_me"></div>
      
      <div class="row" style="width :80%; margin:auto">
        <label>Nome do Colecionável:</label>
        <input type="text" class="form-control" placeholder="Insira o nome do colecionável" name="nome">
    </div>
    <div class="row" style="width :80%; margin:auto">
        <label>Tipo:</label>
        <select class="form-control" name="tipo">
            <option value="" selected disabled hidden>Selecione o tipo</option>
            <option value="Objeto">Objeto</option>
            <option value="Camiseta">Camiseta</option>
            <option value="Quadrinhos">Quadrinhos</option>
        </select>
    </div>
    <div class="row" style="width :80%; margin:auto">
        <label>Tempo (em meses):</label>
        <input type="int" class="form-control" placeholder="Insira a idade do seu item" name="tempo">
    </div>
    <div class="row" style="width :80%; margin:auto">
        <label>Proprietário:</label>
        <select class="form-control" name="id_colecionador">
        <option value="" selected disabled hidden>Selecione o proprietário</option>
        <?php while($dados = mysqli_fetch_assoc($con)) { ?>
            <option value=<?php echo $dados['idcolecionador']; ?>><?php echo $dados['nome_completo']; ?></option>
	    <?php } ?>
        </select>
    </div>

    <div class="row" style="width :80%; margin:auto">
        <label>Detalhes:</label>
        <textarea class="form-control" name="detalhes" id="exampleFormControlTextarea1" placeholder="Insira os detalhes do seu colecionavel" rows="3"></textarea>
    </div>

    <div class="row" style="width :80%; margin:auto">
        <label>Quantidade:</label>
        <input type="int" name="quantidade" class="form-control" placeholder="Insira a quantidade de itens">
    </div>

    <div class="row" style="width :80%; margin: 20px auto">
        <div class="col">
        <input type="submit" class="btn btn-primary btn-lg" value="Salvar">
        </div>
    </form>

        <div class="col">
            <a href="../index.php" class="btn btn-secondary btn-lg">Voltar</a>
        </div>
    </div>
</div>
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script>
    </script>
   </body>
</html>
