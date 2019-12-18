<?php
include 'db.php';
include 'funcoesphp.php';

$sql = "SELECT registration, fullName FROM collectors";
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

  <title>Cadastro de Colecionáveis</title>
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

    <h1>Cadastro de Colecionáveis</h1>
    <hr>
    <form method="post" name="cadastro" onsubmit="event.preventDefault(); validacao();">
      <div id="add_to_me"></div>

      <div class="row" style="width :80%; margin:auto">
        <label>Nome do Colecionável*:</label>
        <input type="text" class="form-control" placeholder="Insira o nome do colecionável" name="nome">
      </div>
      <div class="row" style="width :80%; margin:auto">
        <label>Tipo*:</label>
        <select class="form-control" name="tipo">
          <option value="" selected disabled hidden>Selecione o tipo</option>
          <option value="Objeto">Objeto</option>
          <option value="Camiseta">Camiseta</option>
          <option value="Quadrinhos">Quadrinhos</option>
        </select>
      </div>
      <div class="row" style="width :80%; margin:auto">
        <label>Tempo (em meses)*:</label>
        <input type="int" class="form-control" placeholder="Insira a idade do seu item" name="tempo">
      </div>
      <div class="row" style="width :80%; margin:auto">
        <label>Proprietário*:</label>
        <select class="form-control" name="id_colecionador">
          <option value="" selected disabled hidden>Selecione o proprietário</option>
          <?php while ($dados = mysqli_fetch_assoc($con)) { ?>
            <option value=<?php echo $dados['registration']; ?>><?php echo $dados['fullName']; ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="row" style="width :80%; margin:auto">
        <label>Detalhes*:</label>
        <textarea class="form-control" name="detalhes" id="exampleFormControlTextarea1" placeholder="Insira os detalhes do seu colecionavel" rows="3"></textarea>
      </div>

      <div class="row" style="width :80%; margin:auto">
        <label>Quantidade*:</label>
        <input type="int" name="quantidade" class="form-control" placeholder="Insira a quantidade de itens">
      </div>

      <div class="row justify-content-between" style="width :80%; margin: 20px auto">
        <input type="submit" class="btn btn-primary btn-lg" value="Salvar">
    </form>
    <a href="../index.php" class="btn btn-secondary btn-lg">Voltar</a>
  </div>
  </div>
  <?php //inserindo as informações do cliente no banco de dados.
  salvar_cadastro($_POST, $conexao);
  // $sql = mysql_query("DELETE FROM colecionavel WHERE id > 2");
  ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/funcoesValidacao.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
  </script>
</body>

</html>