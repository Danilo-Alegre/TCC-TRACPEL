<?php

//inicia sessão
session_start();

//conecta com o BD
require_once "../config/conexao.php";
$conexao = novaConexao();

//consulta da tabela usuários
$sql = "SELECT * FROM tblUsuario  WHERE usu_email = :e AND usu_senha = :s";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':e', $_POST['email']);
$stmt->bindValue(':s', $_POST['senha']);
$stmt->execute();
//armazena o resultado da consulta no vetor resultado
$resultado = $stmt->fetch();

//caso consulta retorne uma linha
//email e senha estão corretos
if ($stmt->rowCount() == 1) {
    $usuario = $resultado[1];
    $categoria = $resultado['usu_categoria'];
    $_SESSION['categoria'] = $categoria;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['logado'] = 'sim';
    $_SESSION['id'] = $resultado['id'];



    header('Location: main.php');


} else {
    $_SESSION['logado'] = 'nao';
    //redirecionamento para a página login, passa por parâmentros
    header('Location: login.php?login=erro');
}
