<?php
include 'db.php';

$sql = "SELECT * FROM colecionavel WHERE id=$_GET[id]";

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

    <title>Atualizar Cadastro</title>
</head>

<div class="container" style="margin-top:35px;">
    <h1>Atualizar Cadastros</h1>

    <hr>
    <div class="form-group">
        <label>Nome:</label>
        <input type="text" class="form-control" placeholder="" name="nome">
    </div>
    <div class="form-group">
        <label>Tipo:</label>
        <input type="select" class="form-control" placeholder="" name="tipo">
    </div>
    <div class="form-group">
        <label>Tempo (em meses):</label>
        <input type="int" class="form-control" placeholder="">
    </div>

    <div class="form-group">
        <label>Quantidade:</label>
        <input type="int" name="quantidade" class="form-control" placeholder="">
    </div>
    <div class="form-group">
        <label>Detalhes:</label>
        <textarea class="form-control" name="detalhes" id="exampleFormControlTextarea1"
                  placeholder="Insira os detalhes do seu colecionavel" rows="3"></textarea>
    </div>


    <input type="submit" class="btn btn-primary btn-lg" value="Salvar">
    </form>
    <a href="../index.php"><input type="submit" class="btn btn-secondary btn-lg" value="voltar"></a>

</div>

<?php
if (!empty($_POST['nome']) and ($_POST['tipo']) and ($_POST['tempo']) and ($_POST['id_colecionador']) and ($_POST['detalhes']) and ($_POST['quantidade'])) {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $tempo = $_POST['tempo'];
    $id_colecionador = $_POST['id_colecionador'];
    $detalhes = $_POST['detalhes'];
    $quantidade = $_POST['quantidade'];
    $id = $_GET['id'];
    $sql = mysqli_query($conexao, "UPDATE colecionador SET nome='$nome', tipo='$tipo', tempo='$tempo', id_colecionador='$id_colecionador', detalhes='$detalhes', quantidade='$quantidade'WHERE id=" . $id);
    header("Location: http://localhost/crud/templates/lista.php");
}
?>



<?php ?>
</form>
</body>
</html>