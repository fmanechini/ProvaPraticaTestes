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
    if (document.getElementsByName("tipo")[0].value == "") {
        document.getElementById("add_to_me").innerHTML = "<div class='alert alert-danger' role='alert'>Selecione um tipo</div>";
        document.getElementsByName("tipo")[0].focus();
        return false;
    }
    // Validação do tempo conferindo se é um numero inteiro
    if (!isInt(document.getElementsByName("tempo")[0].value)) {
        document.getElementById("add_to_me").innerHTML = "<div class='alert alert-danger' role='alert'> O tempo deve ser um número inteiro</div>";
        document.getElementsByName("tempo")[0].focus();
        return false;
    }
    if (document.getElementsByName("id_colecionador")[0].value == "") {
        document.getElementById("add_to_me").innerHTML = "<div class='alert alert-danger' role='alert'>Selecione um proprietário</div>";
        document.getElementsByName("id_colecionador")[0].focus();
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

function validacao_busca() {
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