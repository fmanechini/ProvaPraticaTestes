<?php

use PHPUnit\Framework\TestCase;

class atualizacaoTest extends TestCase {
    //CT001 - teste para verificar se uma atualização é realizada com dados válidos
    public function teste_atualizacao_valido (): void {

        include_once $_SERVER['DOCUMENT_ROOT'].'templates/funcoesphp.php';

        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "cadastro";

        $conexao  = new MySQLi($host, $user, $pass, $banco);

        $array['nome'] = "camiseta homem de ferro";
        $array['tipo'] = "Objeto";
        $array['tempo'] = 11;
        $array['id_colecionador'] = 1;
        $array['detalhes'] = "camiseta homem de ferro";
        $array['quantidade'] = 5;
        $array_id['id'] = 1;

        $this->assertTrue(salvar_atualizacao($array,$conexao,$array_id));
    }
    //CT002 - teste para verificar se uma atualização dá erro quando nome é inválido
    public function teste_atualizacao_nome_invalido (): void {

        include_once $_SERVER['DOCUMENT_ROOT'].'templates/funcoesphp.php';

        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "cadastro";

        $conexao  = new MySQLi($host, $user, $pass, $banco);

        $array['nome'] = "";
        $array['tipo'] = "Objeto";
        $array['tempo'] = 11;
        $array['id_colecionador'] = 1;
        $array['detalhes'] = "camiseta homem de ferro";
        $array['quantidade'] = 5;
        $array_id['id'] = 1;

        $this->assertFalse(salvar_atualizacao($array,$conexao,$array_id));
    }

    //CT003 - teste para verificar se uma atualização dá erro quando tipo é inválido
    public function teste_atualizacao_tipo_invalido (): void {

        include_once $_SERVER['DOCUMENT_ROOT'].'templates/funcoesphp.php';

        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "cadastro";

        $conexao  = new MySQLi($host, $user, $pass, $banco);

        $array['nome'] = "camiseta do homem de ferro";
        $array['tipo'] = "";
        $array['tempo'] = 11;
        $array['id_colecionador'] = 1;
        $array['detalhes'] = "camiseta homem de ferro";
        $array['quantidade'] = 5;
        $array_id['id'] = 1;

        $this->assertFalse(salvar_atualizacao($array,$conexao,$array_id));
    }

    //CT004 - teste para verificar se uma atualização dá erro quando tempo é inválido
    public function teste_atualizacao_tempo_invalido (): void {

        include_once $_SERVER['DOCUMENT_ROOT'].'templates/funcoesphp.php';

        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "cadastro";

        $conexao  = new MySQLi($host, $user, $pass, $banco);

        $array['nome'] = "camiseta do homem de ferro";
        $array['tipo'] = "Camiseta";
        $array['tempo'] = "";
        $array['id_colecionador'] = 1;
        $array['detalhes'] = "camiseta homem de ferro";
        $array['quantidade'] = 5;
        $array_id['id'] = 1;

        $this->assertFalse(salvar_atualizacao($array,$conexao,$array_id));
    }

    //CT005 - teste para verificar se uma atualização dá erro quando colecionador é inválido
    public function teste_atualizacao_colecionador_invalido (): void {

        include_once $_SERVER['DOCUMENT_ROOT'].'templates/funcoesphp.php';

        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "cadastro";

        $conexao  = new MySQLi($host, $user, $pass, $banco);

        $array['nome'] = "camiseta do homem de ferro";
        $array['tipo'] = "Camiseta";
        $array['tempo'] = 11;
        $array['id_colecionador'] = "";
        $array['detalhes'] = "camiseta homem de ferro";
        $array['quantidade'] = 5;
        $array_id['id'] = 1;

        $this->assertFalse(salvar_atualizacao($array,$conexao,$array_id));
    }

    //CT006 - teste para verificar se uma atualização dá erro quando detalhes é inválido
    public function teste_atualizacao_detalhes_invalido (): void {

        include_once $_SERVER['DOCUMENT_ROOT'].'templates/funcoesphp.php';

        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "cadastro";

        $conexao  = new MySQLi($host, $user, $pass, $banco);

        $array['nome'] = "camiseta do homem de ferro";
        $array['tipo'] = "Camiseta";
        $array['tempo'] = 11;
        $array['id_colecionador'] = 1;
        $array['detalhes'] = "";
        $array['quantidade'] = 5;
        $array_id['id'] = 1;

        $this->assertFalse(salvar_atualizacao($array,$conexao,$array_id));
    }

    //CT007 - teste para verificar se uma atualização dá erro quando quantidade é inválido
    public function teste_atualizacao_quantidade_invalido (): void {

        include_once $_SERVER['DOCUMENT_ROOT'].'templates/funcoesphp.php';

        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "cadastro";

        $conexao  = new MySQLi($host, $user, $pass, $banco);

        $array['nome'] = "camiseta do homem de ferro";
        $array['tipo'] = "Camiseta";
        $array['tempo'] = 11;
        $array['id_colecionador'] = 1;
        $array['detalhes'] = "camiseta do homem de ferro";
        $array['quantidade'] = "";
        $array_id['id'] = 1;

        $this->assertFalse(salvar_atualizacao($array,$conexao,$array_id));
    }
}

?>