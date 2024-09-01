<?php
function novaConexao() {
    $dsn = 'mysql:host=br612.hostgator.com.br;dbname=hubsap45_bd_tracpel';
    $usuario = 'hubsap45_tracpel_admin';
    $senha = 'tr@kp&!#0XIX';

    try
    {
        //cria objeto conexao da classe PDO
        $conexao = new PDO($dsn, $usuario, $senha);
        //retorna a conexão
        return $conexao;
    }
    catch (PDOException $e) 
    {
        echo 'Erro: ' . $e->getMessage();
    }
}

?>