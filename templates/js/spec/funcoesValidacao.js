describe("funcoesValidacao", function() {

 
    describe("teste para verificar função isInt (verifica se numero é inteiro)", function(){
         
        //Spec for sum operation
        it("CT001 - testando isInt com um numero inteiro (2)", function() {
            expect(isInt(2)).toEqual(true);
        });

        it("CT002 - testando isInt com um numero não inteiro (2.5)", function() {
            expect(isInt(2.5)).toEqual(false);
        });

        it("CT003 - testando isInt com uma string ('bla')", function() {
            expect(isInt("bla")).toEqual(false);
        });
    });

    describe('teste para verificar funções de validação do formulário de cadastro e atualização', function () {

        beforeEach(function() {
            document.createElement('div');
            document.body.innerHTML +='<input type="text" class="form-control" placeholder="Insira o nome do colecionável" name="nome" value="umnomequalquer" id="nome">' 
                + '<div id="add_to_me"></div>'
                + '<select id="tipo" class="form-control" name="tipo">'
                + '<option value="Objeto">Objeto</option></select>'
                + '<input id="tempo" type="int" class="form-control" placeholder="Insira a idade do seu item" name="tempo" value="15">'
                + '<select id="colecionador" class="form-control" name="id_colecionador"><option value="1"</option></select>'
                + '<textarea id="detalhes" class="form-control" name="detalhes" id="exampleFormControlTextarea1" placeholder="Insira os detalhes do seu colecionavel" rows="3">Detalhes de algo</textarea>'
                + '<input id="quantidade" type="int" name="quantidade" class="form-control" placeholder="Insira a quantidade de itens" value="3">'
                + '<form name="cadastro" id="cadastro"></form>';
                spyOn(document.getElementsByName('cadastro')[0], "submit").and.returnValue(1);
    
        });
    
        // remove the html fixture from the DOM
        afterEach(function() {
            document.body.removeChild(document.getElementById('nome'));
            document.body.removeChild(document.getElementById('add_to_me'));
            document.body.removeChild(document.getElementById('tipo'));
            document.body.removeChild(document.getElementById('tempo'));
            document.body.removeChild(document.getElementById('colecionador'));
            document.body.removeChild(document.getElementById('detalhes'));
            document.body.removeChild(document.getElementById('quantidade'));
            document.body.removeChild(document.getElementById('cadastro'));
        });
    

        it("CT001 - teste com todos os valores válidos", function () {
            expect(validacao()).toEqual(true);
        });

        it("CT002 - teste com nome contendo numeros (teste11)", function () {
            document.getElementById("nome").value = "teste11";
            expect(validacao()).toEqual(false);
        });

        it("CT003 - teste com nome contendo somente espaços (  )", function () {
            document.getElementById("nome").value = "  ";
            expect(validacao()).toEqual(false);
        });

        it("CT004 - teste com nome contendo simbolos (teste$$$)", function () {
            document.getElementById("nome").value = "teste$$$";
            expect(validacao()).toEqual(false);
        });

        it("CT005 - teste com tipo não selecionado ( )", function () {
            document.getElementById("tipo").value = "";
            expect(validacao()).toEqual(false);
        });

        it("CT006 - teste com tempo com numero não inteiro (2.5)", function () {
            document.getElementById("tempo").value = 2.5;
            expect(validacao()).toEqual(false);
        });

        it("CT007 - teste com tempo com string (umastring)", function () {
            document.getElementById("tempo").value = "umastring";
            expect(validacao()).toEqual(false);
        });

        it("CT008 - teste com tempo vazio ( )", function () {
            document.getElementById("tempo").value = "";
            expect(validacao()).toEqual(false);
        });

        it("CT009 - teste com id_colecionador não selecionado ( )", function () {
            document.getElementById("colecionador").value = "";
            expect(validacao()).toEqual(false);
        });

        it("CT010 - teste com detalhes com menos de 3 caracteres (aa)", function () {
            document.getElementById("detalhes").value = "aa";
            expect(validacao()).toEqual(false);
        });

        it("CT011 - teste com detalhes vazio ( )", function () {
            document.getElementById("detalhes").value = "";
            expect(validacao()).toEqual(false);
        });

        it("CT012 - teste com quantidade vazia ( )", function () {
            document.getElementById("quantidade").value = "";
            expect(validacao()).toEqual(false);
        });

        it("CT013 - teste com quantidade não inteira (2.5)", function () {
            document.getElementById("quantidade").value = 2.5;
            expect(validacao()).toEqual(false);
        });

        it("CT014 - teste com quantidade com string (umastring)", function () {
            document.getElementById("quantidade").value = "umastring";
            expect(validacao()).toEqual(false);
        });
    });

    describe('teste para verificar funções de validação do formulário de busca', function () {

        beforeEach(function() {
            document.createElement('div');
            document.body.innerHTML +='<input id="busca" type="text" class="form-control" value="textobusca" name="busca">' 
                + '<input type="radio" name="tipo_busca" value="nome" id="radio_nome" class="custom-control-input">'
                + '<input type="radio" name="tipo_busca" value="tipo" id="radio_tipo" class="custom-control-input">'
                + '<input type="radio" name="tipo_busca" value="proprietario" id="radio_proprietario" class="custom-control-input">'
                + '<div id="add_to_me"></div>'
                + '<form name="form_busca" id="form_busca"></form>';
                spyOn(document.getElementsByName('form_busca')[0], "submit").and.returnValue(1);
    
        });
    
        // remove the html fixture from the DOM
        afterEach(function() {
            document.body.removeChild(document.getElementById('busca'));
            document.body.removeChild(document.getElementById('radio_nome'));
            document.body.removeChild(document.getElementById('radio_tipo'));
            document.body.removeChild(document.getElementById('radio_proprietario'));
            document.body.removeChild(document.getElementById('add_to_me'));
            document.body.removeChild(document.getElementById('form_busca'));
        });
    

        it("CT001 - teste com todos os valores válidos", function () {
            document.getElementById('radio_nome').checked = true;
            expect(validacao_busca()).toEqual(true);
        });

        it("CT002 - teste com nome vazio ( )", function () {
            document.getElementById('radio_nome').checked = true;
            document.getElementById("busca").value = ""
            expect(validacao_busca()).toEqual(false);
        });

        it("CT003 - teste com nome contendo numero (teste1)", function () {
            document.getElementById('radio_nome').checked = true;
            document.getElementById("busca").value = "teste1"
            expect(validacao_busca()).toEqual(false);
        });

        it("CT004 - teste com nome contendo espaços (  )", function () {
            document.getElementById('radio_nome').checked = true;
            document.getElementById("busca").value = "  "
            expect(validacao_busca()).toEqual(false);
        });

        it("CT005 - teste com nome contendo símbolos (teste$$)", function () {
            document.getElementById('radio_nome').checked = true;
            document.getElementById("busca").value = "teste$$"
            expect(validacao_busca()).toEqual(false);
        });

        it("CT006 - teste com o radio tipo selecionado", function () {
            document.getElementById('radio_tipo').checked = true;
            expect(validacao_busca()).toEqual(true);
        });

        it("CT007 - teste com o radio proprietário selecionado", function () {
            document.getElementById('radio_proprietario').checked = true;
            expect(validacao_busca()).toEqual(true);
        });

        it("CT008 - teste com nenhum radio selecionado", function () {
            document.getElementById('radio_nome').checked = false;
            document.getElementById('radio_tipo').checked = false;
            document.getElementById('radio_proprietario').checked = false;
            expect(validacao_busca()).toEqual(false);
        });

        
    });
         
    
});
