<?php
	include 'db.php';
  include 'funcoesphp.php';
  
  $con = busca_lista_db($_POST,$conexao);
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="../index.php" style="flex-grow: 1">Início</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
    <h1>Lista de Colecionáveis</h1>
    <hr>
    <?php if(isset($_POST['busca'])) {
        if( mysqli_num_rows($con) == 0) {
          echo "<div class='alert alert-danger' role='alert'>Não foi encontrado nenhum colecionável</div>";
        }
        else {
          echo "<div class='alert alert-primary' role='alert'>A busca pelo termo " .$_POST['busca']." retornou os seguintes colecionáveis</div>";        
        }
      }
      ?>
    <div class="container" style="margin-top:35px;">
        <table border="3" width="100%" class="table">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Tipo</th>
                <th scope="col">Tempo</th>
                <th scope="col">Proprietário</th>
                <th scope="col">Detalhes</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Editar</th>
                <th scope="col">Apagar</th>
            </tr>
            <?php while($dados = mysqli_fetch_assoc($con)) { ?>
            <tbody>
                <tr>
                    <td><?php echo $dados['idColecionavel']; ?></td>
                    <td><?php echo $dados['nome']; ?></td>
                    <td><?php echo $dados['tipo']; ?></td>
                    <td><?php echo $dados['tempo']; ?></td>
                    <td><?php echo $dados['fullName']; ?></td>
                    <td><?php echo $dados['detalhes']; ?></td>
                    <td><?php echo $dados['quantidade']; ?></td>
                    <td>
                        <center><a href="atualizar.php?id=<?php echo $dados['idColecionavel'] ?>"><input
                                    class="btn btn-primary" type="submit" value="Editar"></a></center>
                    </td>
                    <td>
                        <center><a href="del.php?id=<?php echo $dados['idColecionavel'] ?>"><input
                                    class="btn btn-danger" type="submit" value="Apagar"></a></center>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    
    <div class="row justify-content-between" style="width :100%; margin: 20px auto">

            <a href="../templates/busca.php"><input type="submit" class="btn btn-primary btn-lg"
                    value="Buscar Colecionável" style="margin-bottom: 20px"></a>


            <a href="../index.php"><input type="submit" class="btn btn-secondary btn-lg" value="Voltar"
                    style="margin-bottom: 20px"></a>

    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    </div>
</body>

</html>