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

    <title>Busca de Colecionáveis</title>
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
  
    <h1>Busca de Colecionáveis</h1>
    <hr>
    <form method="post" name="form_busca" action="lista.php" onsubmit="event.preventDefault(); validacao();">
		<div id="add_to_me"></div>
      
      <div class="row" style="width :80%; margin:auto">
        <label>Termo de busca:</label>
        <input type="text" class="form-control" placeholder="Digite aqui" name="busca">
    </div>
    <div style="width :80%; margin:auto">
      <label style="margin-top : 10px">Buscar por:</label>
        <div class="custom-control custom-radio">
          <input type="radio" name="tipo_busca" value="nome" id="radio_nome" class="custom-control-input">
          <label class="custom-control-label" for="radio_nome">Nome</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" name="tipo_busca" value="tipo" id="radio_tipo" class="custom-control-input">
          <label class="custom-control-label" for="radio_tipo">Tipo</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" name="tipo_busca" value="proprietario" id="radio_proprietario" class="custom-control-input">
          <label class="custom-control-label" for="radio_proprietario">Proprietário</label>
        </div>
    </div>
    <div class="row" style="width :80%; margin: 20px auto">
        <div class="col">
        <input type="submit" class="btn btn-primary btn-lg" value="Buscar">
        </div>
    </form>

        <div class="col">
            <a href="../index.php" class="btn btn-secondary btn-lg">Voltar</a>
        </div>
    </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript">
        // função para conferir se um valor é um numero inteiro usada para validacao dos forms
        function validacao() {
            // Este é o padrão para validar se o nome não contém simbolos, numeros, somente espaços ou espaços duplos no meio do texto
            const re = /^[a-zA-ZáÁéÉíÍóÓúÚ](?!.*\s{2})([a-zA-ZáÁéÉíÍóÓúÚ\s]+).{0,100}[a-zA-ZáÁéÉíÍóÓúÚ]$/
            // Validação do termo de busca para não conter simbolos, numeros, somente espaços ou espaços duplos no meio do texto
            if (!re.test(document.getElementsByName("busca")[0].value)) {
                document.getElementById("add_to_me").innerHTML = "<div class='alert alert-danger' role='alert'>A busca não deve conter símbolos ou numeros e deve conter 3 ou mais caracteres</div>";
                document.getElementsByName("busca")[0].focus();
                return false;
            }
            // Validação do tipo da busca conferindo se foi selecionado
            if(document.getElementById('radio_nome').checked) {
                document.getElementsByName("form_busca")[0].submit(); 
                return true;
            }else if(document.getElementById('radio_tipo').checked) {
                document.getElementsByName("form_busca")[0].submit(); 
                return true;
            }else if(document.getElementById('radio_proprietario').checked) {
                document.getElementsByName("form_busca")[0].submit(); 
                return true;
            }else {
                document.getElementById("add_to_me").innerHTML = "<div class='alert alert-danger' role='alert'> Selecione uma opção de busca</div>";
                return false;
            }
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