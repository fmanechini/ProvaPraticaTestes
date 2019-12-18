<?php

include 'db.php';
include 'funcoesphp.php';
// Query para selecionar o item que se deseja editar no banco de dados
$sql = "SELECT * FROM colecionavel WHERE idcolecionavel=$_GET[id]";
$con = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

$dados = mysqli_fetch_array($con);
$sql_opcao = "SELECT * FROM collectors WHERE registration=$dados[id_colecionador]";
$con_opcao = mysqli_query($conexao, $sql_opcao) or die(mysqli_error($conexao));
$dados_opcao = mysqli_fetch_array($con_opcao);

$sql_colecionador = "SELECT registration, fullName FROM collectors";
$con_colecionador = mysqli_query($conexao, $sql_colecionador) or die(mysqli_error($conexao));
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Atualizar Colecionável</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
<div class="container">
  <a class="navbar-brand" href="../index.php" style="flex-grow: 1">Início</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content : flex-end">
    
    <a class="navbar-brand" href="../templates/cadastro.php">Cadastrar</a>
    <a class="navbar-brand" href="../templates/lista.php">Listar</a>
    <a class="navbar-brand" href="../templates/busca.php">Buscar</a>

  </div>
  </div>
</nav>

    <div class="container" style="margin-top:35px;">
        <h1>Atualizar Colecionável</h1>
        <hr>
        <!-- quando enviar o form, ele executa a função de validação antes de fazer o submit -->
        <form method="post" name="cadastro" onsubmit="event.preventDefault(); validacao();">
            <div id="add_to_me"></div>
            <?php if ($dados) { ?>
                <div class="form-group" style="width :80%; margin:auto">
                    <label>Nome do Colecionável*:</label>
                    <input type="text" class="form-control" placeholder="" name="nome" value='<?php echo $dados['nome']; ?>'>
                </div>
                <div class="form-group" style="width :80%; margin:auto">
                    <label>Tipo*:</label>
                    <select class="form-control" name="tipo">
                        <option value="<?php echo $dados['tipo']; ?>" selected hidden><?php echo $dados['tipo']; ?></option>
                        <option value="Objeto">Objeto</option>
                        <option value="Camiseta">Camiseta</option>
                        <option value="Quadrinhos">Quadrinhos</option>
                    </select>
                </div>
                <div class="form-group" style="width :80%; margin:auto">
                    <label>Tempo (em meses)*:</label>
                    <input type="int" class="form-control" placeholder="" name="tempo" value=<?php echo $dados['tempo']; ?>>
                </div>
                <div class="form-group" style="width :80%; margin:auto">
                    <label>Proprietário*:</label>
                    <select class="form-control" name="id_colecionador">
                        <option value=<?php echo $dados_opcao['registration']; ?> selected hidden><?php echo $dados_opcao['fullName']; ?></option>
                        <?php while ($dados_colecionador = mysqli_fetch_assoc($con_colecionador)) { ?>
                            <option value=<?php echo $dados_colecionador['registration']; ?>><?php echo $dados_colecionador['fullName']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group" style="width :80%; margin:auto">
                    <label>Detalhes*:</label>
                    <textarea class="form-control" name="detalhes" id="exampleFormControlTextarea1" placeholder="Insira os detalhes do seu colecionavel" rows="3"><?php echo $dados['detalhes']; ?></textarea>
                </div>
                <div class="form-group" style="width :80%; margin:auto">
                    <label>Quantidade*:</label>
                    <input type="int" name="quantidade" class="form-control" placeholder="Insira a quantidade de itens" value=<?php echo $dados['quantidade']; ?>>
                </div>

                <?php
                    salvar_atualizacao($_POST, $conexao,$_GET);
                    ?>
                <div class="row justify-content-between" style="width :80%; margin: 20px auto">

                        <input type="submit" class="btn btn-primary btn-lg" value="Atualizar">
                <?php } ?>
        </form>
            <a href="lista.php" class="btn btn-secondary btn-lg">Voltar</a>
    </div>

    </div>

    <script src="js/funcoesValidacao.js" type="text/javascript"></script>
</body>

</html>