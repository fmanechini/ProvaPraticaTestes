<?php

function salvar_cadastro($array, $conexao)
{

    if (!empty($array['nome']) and ($array['tipo']) and ($array['tempo']) and ($array['id_colecionador']) and ($array['detalhes']) and ($array['quantidade'])) {
        $nome   = $array['nome'];
        $tipo   = $array['tipo'];
        $tempo = $array['tempo'];
        $id_colecionador = $array['id_colecionador'];
        $detalhes = $array['detalhes'];
        $quantidade = $array['quantidade'];
        $erro = 0;
        $sql = mysqli_query($conexao, "INSERT INTO colecionavel(nome, tipo, tempo, id_colecionador, detalhes, quantidade)
                    VALUES('$nome','$tipo', '$tempo', '$id_colecionador', '$detalhes', '$quantidade')");
        //header("Location: http://localhost/crud/templates/lista.php");
        //adiciona uma mensagem de sucesso quando o cadastro é realizado com sucesso
        echo "<script>document.getElementById('add_to_me').innerHTML = \"<div class='alert alert-success' role='alert'> Cadastro Realizado com Sucesso</div>\"</script>";
        return true;
    }
    return false;
}

function salvar_atualizacao($array, $conexao, $array_id)
{
    if (!empty($array['nome']) and ($array['tipo']) and ($array['tempo']) and ($array['id_colecionador']) and ($array['detalhes']) and ($array['quantidade'])) {
        $nome     = $array['nome'];
        $tipo     = $array['tipo'];
        $tempo = $array['tempo'];
        $id_colecionador = $array['id_colecionador'];
        $detalhes = $array['detalhes'];
        $quantidade     = $array['quantidade'];
        $id = $array_id['id'];
        $sql = mysqli_query($conexao, "UPDATE colecionavel SET nome='$nome', tipo='$tipo', tempo='$tempo', id_colecionador='$id_colecionador', detalhes='$detalhes', quantidade='$quantidade'WHERE idcolecionavel=" . $id);
        //header("Location: http://localhost/provapraticatestes/templates/lista.php");
        //adiciona uma mensagem de sucesso quando o cadastro é realizado com sucesso
        echo "<script>document.getElementById('add_to_me').innerHTML = \"<div class='alert alert-success' role='alert'> Atualização Realizado com Sucesso</div>\"</script>";
        return true;
    }
    else {
        return false;
    }
}

function busca_lista_db($array, $conexao)
{
    if (isset($_POST['busca'])) {
        switch ($_POST['tipo_busca']) {
            case 'nome':
                $sql = "SELECT * FROM colecionavel cv INNER JOIN collectors cd ON cv.id_colecionador = cd.registration WHERE UPPER(cv.nome) LIKE UPPER('" . $_POST['busca'] . "%') ORDER BY cv.idColecionavel";
                $con = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
                break;
            case 'tipo':
                $sql = "SELECT * FROM colecionavel cv INNER JOIN collectors cd ON cv.id_colecionador = cd.registration WHERE UPPER(cv.tipo) LIKE UPPER('" . $_POST['busca'] . "%') ORDER BY cv.idColecionavel";
                $con = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
                break;
            case 'proprietario':
                $sql = "SELECT * FROM colecionavel cv INNER JOIN collectors cd ON cv.id_colecionador = cd.registration WHERE UPPER(cd.fullName) LIKE UPPER('" . $_POST['busca'] . "%') ORDER BY cv.idColecionavel";
                $con = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        }
        return $con;
    } else {
        $sql = "SELECT * FROM colecionavel cv INNER JOIN collectors cd ON cv.id_colecionador = cd.registration ORDER BY cv.idColecionavel";
        $con = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        return $con;
    }
}
