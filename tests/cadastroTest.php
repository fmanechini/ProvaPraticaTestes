<?php

use PHPUnit\Framework\TestCase;

class cadastroTest extends TestCase {
    //CT001 - teste para verificar se um cadastro é realizado com dados válidos
    public function teste_cadastro_valido (): void {

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

        $this->assertTrue(salvar_cadastro($array,$conexao));
    }
    //CT002 - teste para verificar se um cadastro retorna erro quando nome não é valido
    public function teste_cadastro_nome_invalido (): void {

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
        $array['quantidade'] = 2;

        $this->assertFalse(salvar_cadastro($array,$conexao));
    }

    //CT003 - teste para verificar se um cadastro retorna erro quando tipo não é valido
    public function teste_cadastro_tipo_invalido (): void {

        include_once $_SERVER['DOCUMENT_ROOT'].'templates/funcoesphp.php';

        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "cadastro";

        $conexao  = new MySQLi($host, $user, $pass, $banco);

        $array['nome'] = "camiseta homem de ferro";
        $array['tipo'] = "";
        $array['tempo'] = 11;
        $array['id_colecionador'] = 1;
        $array['detalhes'] = "camiseta homem de ferro";
        $array['quantidade'] = 2;

        $this->assertFalse(salvar_cadastro($array,$conexao));
    }

     //CT004 - teste para verificar se um cadastro retorna erro quando tempo não é valido
     public function teste_cadastro_tempo_invalido (): void {

        include_once $_SERVER['DOCUMENT_ROOT'].'templates/funcoesphp.php';

        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "cadastro";

        $conexao  = new MySQLi($host, $user, $pass, $banco);

        $array['nome'] = "camiseta homem de ferro";
        $array['tipo'] = "Camiseta";
        $array['tempo'] = "";
        $array['id_colecionador'] = 1;
        $array['detalhes'] = "camiseta homem de ferro";
        $array['quantidade'] = 2;

        $this->assertFalse(salvar_cadastro($array,$conexao));
    }

     //CT005 - teste para verificar se um cadastro retorna erro quando colecionador não é valido
     public function teste_cadastro_id_colecionador_invalido (): void {

        include_once $_SERVER['DOCUMENT_ROOT'].'templates/funcoesphp.php';

        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "cadastro";

        $conexao  = new MySQLi($host, $user, $pass, $banco);

        $array['nome'] = "camiseta homem de ferro";
        $array['tipo'] = "Camiseta";
        $array['tempo'] = 11;
        $array['id_colecionador'] = "";
        $array['detalhes'] = "camiseta homem de ferro";
        $array['quantidade'] = 2;

        $this->assertFalse(salvar_cadastro($array,$conexao));
    }

    //CT006 - teste para verificar se um cadastro retorna erro quando detalhes não é valido
    public function teste_cadastro_detalhes_invalido (): void {

        include_once $_SERVER['DOCUMENT_ROOT'].'templates/funcoesphp.php';

        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "cadastro";

        $conexao  = new MySQLi($host, $user, $pass, $banco);

        $array['nome'] = "camiseta homem de ferro";
        $array['tipo'] = "Camiseta";
        $array['tempo'] = 11;
        $array['id_colecionador'] = 1;
        $array['detalhes'] = "";
        $array['quantidade'] = 2;

        $this->assertFalse(salvar_cadastro($array,$conexao));
    }

    //CT007 - teste para verificar se um cadastro retorna erro quando quantidade não é valido
    public function teste_cadastro_quantidade_invalido (): void {

        include_once $_SERVER['DOCUMENT_ROOT'].'templates/funcoesphp.php';

        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "cadastro";

        $conexao  = new MySQLi($host, $user, $pass, $banco);

        $array['nome'] = "camiseta homem de ferro";
        $array['tipo'] = "Camiseta";
        $array['tempo'] = 11;
        $array['id_colecionador'] = 1;
        $array['detalhes'] = "camiseta homem de ferro";
        $array['quantidade'] = "";

        $this->assertFalse(salvar_cadastro($array,$conexao));
    }
}

?>